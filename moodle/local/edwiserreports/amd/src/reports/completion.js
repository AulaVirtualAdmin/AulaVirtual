/**
 * Course Completion report page.
 *
 * @package     local_edwiserreports
 * @author      Yogesh Shirsath
 * @copyright   2022 wisdmlabs <support@wisdmlabs.com>
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
define('local_edwiserreports/reports/completion', [
    'jquery',
    'core/ajax',
    'core/notification',
    'local_edwiserreports/common',
    'local_edwiserreports/defaultconfig',
    'local_edwiserreports/select2',
    'local_edwiserreports/flatpickr'
], function($, Ajax, Notification, common, CFG) {

    /**
     * Selectors list.
     */
    var SELECTOR = {
        PAGE: ".report-content",
        EXPORT: ".report-export",
        COHORT: ".report-content .cohort-select",
        COURSE: ".report-content .course-select",
        GROUP: ".report-content .group-select",
        EXCLUDE: '.report-content .exclude-select',
        INACTIVE: '.report-content .inactive-select',
        PROGRESS: '.report-content .progress-select',
        GRADE: '.report-content .grade-select',
        LENGTH: ".report-content .length-select",
        SEARCH: ".report-content .table-search-input input",
        PAGETITLE: ".report-header .page-title h2",
        FORMFILTER: '.report-content .download-links [name="filter"]',
        DATE: '.edwiserreports-calendar',
        DATEMENU: '.edwiserreports-calendar + .dropdown-menu',
        DATEITEM: '.edwiserreports-calendar + .dropdown-menu .dropdown-item',
        DATEPICKER: '.edwiserreports-calendar + .dropdown-menu .dropdown-calendar',
        DATEPICKERINPUT: '.edwiserreports-calendar + .dropdown-menu .flatpickr',
        SUMMARY: '#wdm-completion-individual .summary-card'
    };

    /**
     * Filter object.
     */
    var filter = {
        cohort: 0,
        course: null,
        group: 0,
        exclude: [],
        enrolment: 'all',
        inactive: 'all',
        progress: 'all',
        grade: 'all',
        groupname: '',
        cohortname :'',
        dir: $('html').attr('dir')    };

    /**
     * Flat picker object.
     */
    let flatpickr = null;

    /**
     * Datatable object.
     */
    var dataTable = null;

    /**
     * Promise lists.
     */
    let PROMISES = {
        /**
         * Get all courses summary table data based on filters.
         * @returns {PROMISE}
         */
        GET_DATA: function() {
            return $.ajax({
                url: CFG.requestUrl,
                type: CFG.requestType,
                dataType: CFG.requestDataType,
                data: {
                    action: 'get_completion_data_ajax',
                    sesskey: M.local_edwiserreports.secret,
                    lang: $('html').attr('lang'),
                    data: JSON.stringify(filter)
                },
            });
        },
        /**
         * Get summary card data.
         *
         * @param   {Integer}   courseid    Course id
         * @param   {String}    cohortid   Cohort id all/id
         * @param   {String}    groupid   group id all/id
         * @returns {PROMISE}
         */
        GET_SUMMARY_CARD_DATA: function(filter) {
            return Ajax.call([{
                methodname: 'local_edwiserreports_get_summary_card_data',
                args: {
                    report: "\\local_edwiserreports\\blocks\\completionblock",
                    filters: JSON.stringify(filter)
                }
            }], false)[0];
        }
    };

    /**
     * After Select Custom date get active users details.
     */
    function customDateSelected() {
        let date = $(SELECTOR.DATEPICKERINPUT).val(); // Y-m-d format
        let dateAlternate = $(SELECTOR.DATEPICKERINPUT).next().val().replace("to", "-"); // d M Y format

        
    // RTL support
        // Split string in 2 parts
        let stringarr = dateAlternate.split('-');
        // Formating date for rtl
        if(filter.dir == 'rtl'){
            // format for rtl : yyyy mm dd
            let startdate = stringarr[0].split(' ');
            let enddate = stringarr[1].split(' ');

            startdate = startdate[2] + ' ' + startdate[1] + ' ' + startdate[0];
            enddate = enddate[3] + ' ' + enddate[2] + ' ' + enddate[1];
            dateAlternate = enddate + '-' + startdate;

            // Making direction ltr for date selector and aligning text to right
            $(SELECTOR.DATE).css({'direction':'ltr','text-align': 'right'});
            $(SELECTOR.DATEPICKERINPUT).css({'direction':'ltr','text-align': 'right'});
        }

        $(SELECTOR.DATEPICKERINPUT).next().val(dateAlternate);

        /* If correct date is not selected then return false */
        if (!date.includes(" to ")) {
            flatpickr.clear();
            return;
        }

        // Set active class to custom date selector item.
        $(SELECTOR.DATEITEM).removeClass('active');
        $(SELECTOR.DATEITEM + '.custom').addClass('active');

        // Show custom date to dropdown button.
        $(SELECTOR.DATE).html(dateAlternate);

        filter.enrolment = date;

        // Get summary card data
        filter.groupname = $(SELECTOR.GROUP).find(`option:selected`).text();
        filter.cohortname = $(SELECTOR.COHORT).find(`option:selected`).text();

        PROMISES.GET_SUMMARY_CARD_DATA(filter)
        .done(function(response) {
            response = JSON.parse(response);
            common.refreshSummarycard('group', response, SELECTOR.SUMMARY, function() {
            //     initializeDatatable();
            });
        });

        initializeDatatable();
        common.updateTimeLabel(date);
    }

    /**
     * Get Course Completion
     */
    function initializeDatatable() {
        common.loader.show(SELECTOR.PAGE);

        // Updated export filter values.
        filter.dir = $('html').attr('dir');
        $(SELECTOR.FORMFILTER).val(JSON.stringify(filter));
        
        $(SELECTOR.PAGE).find('.download-links input[name="filter"]').val(JSON.stringify(filter));
        let statuses = [
            `<span class="danger-tag">${M.util.get_string('notyetstarted', 'core_completion')}</span>`,
            `<span class="success-tag">${M.util.get_string('completed', 'core_completion')}</span>`,
            `<span class="warning-tag">${M.util.get_string('inprogress', 'core_completion')}</span>`
        ];
        let never = M.util.get_string('never', 'local_edwiserreports');

        PROMISES.GET_DATA(filter).done(function(response) {
            if (dataTable != null) {
                dataTable.destroy();
            }
            $(SELECTOR.PAGETITLE).text(response.name);
            dataTable = $(SELECTOR.PAGE).find(".table").DataTable({
                dom: '<"edwiserreports-table"<"table-filter d-flex"i><t><"table-pagination"p>>',
                data: response.data,
                pageLength: $(SELECTOR.LENGTH).val(),
                deferRendering: true,
                language: {
                    info: M.util.get_string('tableinfo', 'local_edwiserreports'),
                    infoEmpty: M.util.get_string('infoempty', 'local_edwiserreports'),
                    emptyTable: M.util.get_string('nostudentsenrolled', 'local_edwiserreports'),
                    zeroRecords: M.util.get_string('zerorecords', 'local_edwiserreports'),
                    paginate: {
                        previous: " ",
                        next: " "
                    }
                },
                columnDefs: [
                    { className: "fixed-column", targets: 0 },
                    { className: "text-left", targets: [0, 1, 2] },
                    { className: "text-center", targets: "_all" }
                ],
                columns: [
                    { data: "learner", width: "12rem" },
                    { data: "email" },
                    {
                        data: "status",
                        render: function(data) {
                            return statuses[data];
                        },
                        width: "4rem"
                    },
                    {
                        data: "enrolledon",
                        render: function(data) { 
                            let tempdate = common.formatDate(new Date(data * 1000), "d MMM yyyy");
                            let rtl = $('html').attr('dir') == 'rtl' ? 1 : 0

                            if(rtl){
                                tempdate = common.formatDate(new Date(data * 1000), "yyyy MMM d");
                            }
                            return `<p class="erp-time-rtl"><span class="d-none">${data}</span>` +
                                (data == 0 ? '-' : tempdate) + '</p>';
                        },
                        width: "10rem"
                    },
                    {
                        data: "completedon",
                        render: function(data) {
                            let tempdate = common.formatDate(new Date(data * 1000), "d MMM yyyy");
                            let rtl = $('html').attr('dir') == 'rtl' ? 1 : 0

                            if(rtl){
                                tempdate = common.formatDate(new Date(data * 1000), "yyyy MMM d");
                            }
                            return `<p class="erp-time-rtl"><span class="d-none">${data}</span>` +
                                (data == 0 ? '-' : tempdate) + '</p>';
                        },
                        width: "10rem"
                    },
                    {
                        data: "lastaccess",
                        render: function(data) {

                            let tempdate = common.formatDate(new Date(data * 1000), "d MMM yyyy hh:mm TT").substring(0,11) + '<br>' + common.formatDate(new Date(data * 1000), "d MMM yyyy hh:mm TT").substring(11,20);
                            let rtl = $('html').attr('dir') == 'rtl' ? 1 : 0

                            if(rtl){
                                tempdate = common.formatDate(new Date(data * 1000), "TT mm:hh yyyy MMM d").substring(8, 20) + '<br>' + common.formatDate(new Date(data * 1000), "TT mm:hh yyyy MMM d").substring(0,8);
                            }

                            return `<p class="erp-time-rtl"><span class="d-none">${data}</span>` +
                                (data == 0 ? never : tempdate) + '</p>';
                        },
                        width: "10rem"
                    },
                    { data: "progress" },
                    { data: "grade" },
                    { data: "completedactivities", width: "5rem" },
                    { data: "assignment", width: "6rem" },
                    { data: "quiz", width: "5rem" },
                    { data: "scorm", width: "5rem" },
                    { data: "visits", width: "2rem" },
                    {
                        data: "timespent",
                        render: function(data) {
                            return common.timeFormatter(data);
                        }
                    }
                ],
                drawCallback: function() {
                    common.stylePaginationButton(this);
                },
                initComplete: function() {
                    common.loader.hide(SELECTOR.PAGE);
                }
            });
            dataTable.columns(0).search($(SELECTOR.SEARCH).val());
            dataTable.page.len($(SELECTOR.LENGTH).val()).draw();
        }).fail(function(ex) {
            Notification.exception(ex);
            common.loader.hide(SELECTOR.PAGE);
        });
    }

    /**
     * Reload filters.
     */
    function reloadFilter(types, cohort, course, callback) {
        common.loader.show(SELECTOR.PAGE);
        common.reloadFilter(
            SELECTOR.PAGE,
            types,
            cohort,
            course,
            0,
            callback
        );
    }

    /* eslint-disable no-unused-vars */
    /**
     * Initialize
     * @param {integer} CONTEXTID Current page context id
     */
    function init(CONTEXTID) {

        filter.dir = $('html').attr('dir');

        // Show time period in table info.
        common.updateTimeLabel('all');

        common.handleSearchInput();

        // Initialize select2.
        $(SELECTOR.PAGE).find('.singleselect').not(SELECTOR.EXCLUDE).select2();
        $(SELECTOR.EXCLUDE).select2({
            placeholder: M.util.get_string('exclude', 'local_edwiserreports'),
            allowClear: true
        });

        flatpickr = $(SELECTOR.DATEPICKERINPUT).flatpickr({
            mode: 'range',
            altInput: true,
            altFormat: "d M Y",
            dateFormat: "Y-m-d",
            maxDate: "today",
            appendTo: $(SELECTOR.DATEPICKER).get(0),
            onOpen: function() {
                $(SELECTOR.DATEMENU).addClass('withcalendar');
                setTimeout(function() {
                    if ($(SELECTOR.DATEMENU).offset().left < $(SELECTOR.PAGE).parent().offset().left) {
                        $(SELECTOR.DATEMENU).css('left', $(SELECTOR.DATEMENU).closest('.filter-selector').css('padding-left'));
                    }
                }, 500);
            },
            onChange: function() {
                if ($(SELECTOR.DATEMENU).offset().left < $(SELECTOR.PAGE).parent().offset().left) {
                    $(SELECTOR.DATEMENU).css('left', $(SELECTOR.DATEMENU).closest('.filter-selector').css('padding-left'));
                }
            },
            onClose: function() {
                $(SELECTOR.DATEMENU).removeClass('withcalendar');
                customDateSelected();
            }
        });


        /* Date selector listener */
        $('body').on('click', SELECTOR.DATEITEM + ":not(.custom)", function() {
            // Set custom selected item as active.
            $(SELECTOR.DATEITEM).removeClass('active');
            $(this).addClass('active');

            // Show selected item on dropdown button.
            $(SELECTOR.DATE).html($(this).text());

            // Clear custom date.
            flatpickr.clear();

            filter.enrolment = $(this).data('value');

            // Get summary card data
            filter.groupname = $(SELECTOR.GROUP).find(`option:selected`).text();
            filter.cohortname = $(SELECTOR.COHORT).find(`option:selected`).text();
            PROMISES.GET_SUMMARY_CARD_DATA(filter)
            .done(function(response) {
                response = JSON.parse(response);
                common.refreshSummarycard('group', response, SELECTOR.SUMMARY, function() {
                //     initializeDatatable();
                });
            });

            initializeDatatable();
            common.updateTimeLabel(filter.enrolment);
        });

        // Get course id
        filter.course = $(SELECTOR.COURSE).val();

        // Select cohort filter for completion table.
        $('body').on('change', SELECTOR.COHORT, function() {
            filter.cohort = $(this).val();
            filter.group = 0;

            reloadFilter(['course', 'noallcourses'], filter.cohort, filter.course, function() {
                // if ($(SELECTOR.COURSE).find(`option[value="${filter.course}"]`).length == 0) {
                    filter.course = $(SELECTOR.COURSE).find(`option:first`).attr('value');
                // }
                reloadFilter(['group'], filter.cohort, filter.course, function() {
                    initializeDatatable();
                    // setTimeout(function() {
                        // Get summary card data
                        filter.groupname = $(SELECTOR.GROUP).find(`option:selected`).text();
                        filter.cohortname = $(SELECTOR.COHORT).find(`option:selected`).text();
                        PROMISES.GET_SUMMARY_CARD_DATA(filter)
                        .done(function(response) {
                            response = JSON.parse(response);
                            common.refreshSummarycard('group', response, SELECTOR.SUMMARY, function() {
                            //     initializeDatatable();
                            });
                        });
                    // }, 500);
                });
            });



        });

        // Select course filter for completion table.
        $('body').on('change', SELECTOR.COURSE, function() {
            filter.course = $(this).val();
            filter.group = 0;

            // Get summary card data
            filter.groupname = $(SELECTOR.GROUP).find(`option:selected`).text();
            filter.cohortname = $(SELECTOR.COHORT).find(`option:selected`).text();

            PROMISES.GET_SUMMARY_CARD_DATA(filter)
            .done(function(response) {
                response = JSON.parse(response);
                common.refreshSummarycard('group', response, SELECTOR.SUMMARY, function() {
                //     initializeDatatable();
                });
            });


            reloadFilter(['group'], filter.cohort, filter.course, function() {
                initializeDatatable();
            });
        });

        // Select group filter for completion table.
        $('body').on('change', SELECTOR.GROUP, function() {
            filter.group = $(this).val();

            // Get summary card data
            filter.groupname = $(SELECTOR.GROUP).find(`option:selected`).text();
            filter.cohortname = $(SELECTOR.COHORT).find(`option:selected`).text();

            PROMISES.GET_SUMMARY_CARD_DATA(filter)
            .done(function(response) {
                response = JSON.parse(response);
                common.refreshSummarycard('group', response, SELECTOR.SUMMARY, function() {
                //     initializeDatatable();
                });
            });

            initializeDatatable();
            
        });

        // Observer length change.
        $('body').on('change', SELECTOR.LENGTH, function() {
            dataTable.page.len(this.value).draw();
        });

        // Search in table.
        $('body').on('input', SELECTOR.SEARCH, function() {
            dataTable.column(0).search(this.value).draw();
        });

        // Observer exclude change.
        $('body').on('change', SELECTOR.EXCLUDE, function() {
            filter.exclude = $(this).val();
            $(this).toggleClass('notselected', filter.exclude.length == 0);
            $(this).toggleClass('selected', filter.exclude.length != 0);
            // Display none to inactive users if exclude is selected.
            $(SELECTOR.INACTIVE).closest('.filter-selector')
                .toggle(filter.exclude.indexOf('2') == -1 && filter.exclude.indexOf('3') == -1);
            initializeDatatable();
        });

        // Observer progress change.
        $('body').on('change', SELECTOR.PROGRESS, function() {
            filter.progress = $(this).val();
            initializeDatatable();
        });

        // Observer inactive users change.
        $('body').on('change', SELECTOR.INACTIVE, function() {
            filter.inactive = $(this).val();
            initializeDatatable();
        });

        // Observer grade change.
        $('body').on('change', SELECTOR.GRADE, function() {
            filter.grade = $(this).val();
            initializeDatatable();
        });

        initializeDatatable();
    }

    return {
        init: function(CONTEXTID) {
            $(document).ready(function() {
                init(CONTEXTID);
            });
        }
    };

});
