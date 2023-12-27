
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.
/**
 * Learner course progress report page.
 *
 * @package     local_edwiserreports
 * @author      Yogesh Shirsath
 * @copyright   2022 Wisdmlabs <support@wisdmlabs.com>
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
define('local_edwiserreports/reports/learnercourseactivities', [
    'jquery',
    'core/notification',
    'core/ajax',
    'local_edwiserreports/common',
    'local_edwiserreports/defaultconfig',
    'local_edwiserreports/select2',
    'local_edwiserreports/flatpickr'
], function(
    $,
    Notification,
    Ajax,
    common,
    CFG
) {

    /**
     * Selector
     */
    var SELECTOR = {
        PAGE: '#learnercourseactivities',
        SEARCH: '#learnercourseactivities .table-search-input input',
        COURSE: '#learnercourseactivities .course-select',
        STUDENT: '#learnercourseactivities .student-select',
        SECTION: '#learnercourseactivities .section-select',
        MODULE: '#learnercourseactivities .module-select',
        SUMMARY: '#learnercourseactivities .summary-card',
        COMPLETION: '#learnercourseactivities .completion-select',
        LENGTH: '#learnercourseactivities .length-select',
        LEARNER: '#learnercourseactivities .student-select',
        TABLE: '#learnercourseactivities table',
        FORMFILTER: '#learnercourseactivities .download-links [name="filter"]',
        DATE: '.edwiserreports-calendar',
        DATEMENU: '.edwiserreports-calendar + .dropdown-menu',
        DATEITEM: '.edwiserreports-calendar + .dropdown-menu .dropdown-item',
        DATEPICKER: '.edwiserreports-calendar + .dropdown-menu .dropdown-calendar',
        DATEPICKERINPUT: '.edwiserreports-calendar + .dropdown-menu .flatpickr'
    };

    /**
     * Datatable object.
     */
    var dataTable = null;

    /**
     * Filter object.
     */
    var filter = {
        learner: null,
        course: null,
        section: 0,
        module: 'all',
        completion: 'all',
        enrolment: 'all',
        dir: $('html').attr('dir'),
        rtl: $('html').attr('dir') == 'rtl' ? 1 : 0
    };

    /**
     * All promises.
     */
    var PROMISE = {
        /**
         * Get learner course activities table data based on filters.
         * @param {Object} filter Filter data
         * @returns {PROMISE}
         */
        GET_DATA: function(filter) {
            return $.ajax({
                url: CFG.requestUrl,
                type: CFG.requestType,
                dataType: CFG.requestDataType,
                data: {
                    action: 'get_learnercourseactivities_data',
                    secret: M.local_edwiserreports.secret,
                    lang: $('html').attr('lang'),
                    data: JSON.stringify(filter)
                },
            });
        },
        /**
         * Get filter data.
         *
         * @param   {Array}     types       Type of filters to get
         * @param   {Integer}   courseid    Course id
         * @param   {String}    sectionid   Section id all/id
         * @returns {PROMISE}
         */
        GET_FILTER_DATA: function(types, courseid, sectionid) {
            return Ajax.call([{
                methodname: 'local_edwiserreports_get_filter_data',
                args: {
                    types: types,
                    course: courseid,
                    section: sectionid
                }
            }], false)[0];
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
                    report: "\\local_edwiserreports\\reports\\learnercourseactivities",
                    filters: JSON.stringify(filter)
                }
            }], false)[0];
        }
    }

    /**
     * Initialize datable.
     */
    function initializeDatatable() {
        common.loader.show(SELECTOR.PAGE);
       
        setTimeout(function() {
            let rtl = $('html').attr('dir') == 'rtl' ? 1 : 0;

            lastaccess = $('.learner-course-activties-lastaccess').data('date');
            // M.util.get_string('tableinfo', 'local_edwiserreports')
            lastaccess = lastaccess == 0 ? M.util.get_string('never', 'local_edwiserreports') : (rtl ? common.formatDate(new Date(lastaccess * 1000), "TT mm:hh  yyyy MMM d") : common.formatDate(new Date(lastaccess * 1000), "d MMM yyyy hh:mm TT"));
            $('.learner-course-activties-lastaccess').text(lastaccess);
            $('.learner-course-activties-lastaccess').css('display', 'inherit');
        }, 1500);

        // Updated export filter values.
        filter.dir = $('html').attr('dir');
        $(SELECTOR.FORMFILTER).val(JSON.stringify(filter));
        let statuses = [
            `<span class="danger-tag">${M.util.get_string('notyetstarted', 'core_completion')}</span>`,
            `<span class="success-tag">${M.util.get_string('completed', 'core_completion')}</span>`,
            `<span class="warning-tag">${M.util.get_string('inprogress', 'core_completion')}</span>`
        ];

        PROMISE.GET_DATA(filter)
            .done(function(response) {
                if (dataTable !== null) {
                    dataTable.destroy();
                    dataTable = null;
                }
                let never = M.util.get_string('never', 'local_edwiserreports');
                dataTable = $(SELECTOR.TABLE).DataTable({
                    data: response,
                    paging: true,
                    deferRendering: true,
                    columnDefs: [
                        { className: "fixed-column", targets: 0 },
                        { className: "text-left", targets: [0, 1] },
                        { className: "text-center", targets: "_all" }
                    ],
                    columns: [
                        { data: 'activity', width: "14rem" },
                        { data: 'type' },
                        {
                            data: 'status',
                            render: function(data) {
                                return statuses[data];
                            },
                            width: "4rem"
                        },
                        {
                            data: 'completedon',
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
                        { data: 'grade' },
                        {
                            data: 'gradedon',
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
                        { data: 'attempts' },
                        { data: 'highestgrade', width: "4rem" },
                        { data: 'lowestgrade', width: "4rem" },
                        {
                            data: 'firstaccess',
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
                        {
                            data: 'lastaccess',
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
                        { data: 'visits' },
                        {
                            data: 'timespent',
                            render: function(data) {
                                return common.timeFormatter(data);
                            }
                        },
                    ],
                    dom: '<"edwiserreports-table"i<t><"table-pagination"p>>',
                    language: {
                        info: M.util.get_string('tableinfo', 'local_edwiserreports'),
                        infoEmpty: M.util.get_string('infoempty', 'local_edwiserreports'),
                        emptyTable: M.util.get_string('emptytable', 'local_edwiserreports'),
                        zeroRecords: M.util.get_string('zerorecords', 'local_edwiserreports'),
                        paginate: {
                            previous: " ",
                            next: " "
                        }
                    },
                    drawCallback: function() {
                        common.stylePaginationButton(this);
                        common.loader.hide(SELECTOR.PAGE);
                    }
                });
                dataTable.columns(0).search($(SELECTOR.SEARCH).val());
                dataTable.page.len($(SELECTOR.LENGTH).val()).draw();
            })
            .fail(function(ex) {
                Notification.exception(ex);
                common.loader.hide(SELECTOR.PAGE);
            });
    }

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

        // Fetching summary card data here
        PROMISE.GET_SUMMARY_CARD_DATA(filter)
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
     * Initialize
     */
    function init() {
        
        // Show time period in table info.
        common.updateTimeLabel('all');

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

            // Fetching summary card data here
            PROMISE.GET_SUMMARY_CARD_DATA(filter)
            .done(function(response) {
                response = JSON.parse(response);
                common.refreshSummarycard('group', response, SELECTOR.SUMMARY, function() {
                //     initializeDatatable();
                });
            });

            initializeDatatable();
            common.updateTimeLabel(filter.enrolment);
        });

        
        filter = JSON.parse($(SELECTOR.FORMFILTER).val());

        // Initialize select2.
        $(SELECTOR.COURSE).select2({
            templateResult: function(state) {
                if (!state.id) {
                    return state.text;
                }
                var $state = $(
                    '<span class="pl-3 d-block">' + state.text + '</span>'
                );
                return $state;
            }
        });

        $(SELECTOR.PAGE).find('.singleselect').not(SELECTOR.COURSE).select2();

        // Observer course change.
        $('body').on('change', SELECTOR.COURSE, function() {
            filter.course = $(this).val();
            filter.section = 0;
            filter.module = 'all';
            filter.learner = null;

            // common.loader.show(SELECTOR.PAGE);
            common.reloadFilter(
            SELECTOR.PAGE, ['student', 'section', 'module', 'noallusers'],
            0,
            filter.course,
            0,
            function() {
                if ($(SELECTOR.LEARNER).find('option:first-child').length) {
                    filter.learner = $(SELECTOR.LEARNER).find('option:first-child').attr('value');
                }
                initializeDatatable();
                setTimeout(function() {

                    // Fetching summary card data here
                    PROMISE.GET_SUMMARY_CARD_DATA(filter)
                    .done(function(response) {
                        response = JSON.parse(response);
                        common.refreshSummarycard('group', response, SELECTOR.SUMMARY, function() {
                            let rtl = $('html').attr('dir') == 'rtl' ? 1 : 0;
                            lastaccess = $('.learner-course-activties-lastaccess').data('date');
                            // M.util.get_string('tableinfo', 'local_edwiserreports')
                            lastaccess = lastaccess == 0 ? M.util.get_string('never', 'local_edwiserreports') : (rtl ? common.formatDate(new Date(lastaccess * 1000), "TT mm:hh  yyyy MMM d") : common.formatDate(new Date(lastaccess * 1000), "d MMM yyyy hh:mm TT"));
                            // lastaccess = lastaccess == 0 ? M.util.get_string('never', 'local_edwiserreports') : common.formatDate(new Date(lastaccess * 1000), "d MMM yyyy hh:mm TT");
                            $('.learner-course-activties-lastaccess').text(lastaccess);
                            $('.learner-course-activties-lastaccess').css('display', 'inherit');
                            // lastaccess = $('.learner-course-activties-lastaccess').data('date');
                        });
                    });
                }, 500);

                setTimeout(function() {
                    lastaccess = $('.learner-course-activties-lastaccess').data('date');
                            // M.util.get_string('tableinfo', 'local_edwiserreports')
                    lastaccess = lastaccess == 0 ? M.util.get_string('never', 'local_edwiserreports') : (rtl ? common.formatDate(new Date(lastaccess * 1000), "TT mm:hh  yyyy MMM d") : common.formatDate(new Date(lastaccess * 1000), "d MMM yyyy hh:mm TT"));
                    // lastaccess = $('.learner-course-activties-lastaccess').data('date');
                    // lastaccess = lastaccess == 0 ? M.util.get_string('never', 'local_edwiserreports') : common.formatDate(new Date(lastaccess * 1000), "d MMM yyyy hh:mm TT");
                    $('.learner-course-activties-lastaccess').text(lastaccess);
                    $('.learner-course-activties-lastaccess').css('display', 'inherit');
                }, 1500);

            });

        });

        // Observer learner change.
        $('body').on('change', SELECTOR.LEARNER, function() {
            filter.learner = $(this).val();
            initializeDatatable();

            setTimeout(function() {
                // Fetching summary card data here
                PROMISE.GET_SUMMARY_CARD_DATA(filter)
                .done(function(response) {
                    response = JSON.parse(response);
                    common.refreshSummarycard('group', response, SELECTOR.SUMMARY, function() {
                    });
                });
            }, 500);

            
        });

        // Observer section change.
        $('body').on('change', SELECTOR.SECTION, function() {
            filter.section = $(this).val();
            filter.module = 'all';

            PROMISE.GET_FILTER_DATA(['module'], filter.course, filter.section)
                .done(function(response) {
                    response = JSON.parse(response);
                    common.refreshFilter('module', response.module, SELECTOR.PAGE, function() {
                        initializeDatatable();
                    });
                });
            initializeDatatable();

            // Fetching summary card data here
            PROMISE.GET_SUMMARY_CARD_DATA(filter)
            .done(function(response) {
                response = JSON.parse(response);
                common.refreshSummarycard('group', response, SELECTOR.SUMMARY, function() {
                });
            });

            
            setTimeout(function() {
                lastaccess = $('.learner-course-activties-lastaccess').data('date');
                            // M.util.get_string('tableinfo', 'local_edwiserreports')
                lastaccess = lastaccess == 0 ? M.util.get_string('never', 'local_edwiserreports') : (rtl ? common.formatDate(new Date(lastaccess * 1000), "TT mm:hh  yyyy MMM d") : common.formatDate(new Date(lastaccess * 1000), "d MMM yyyy hh:mm TT"));
                    
                // lastaccess = $('.learner-course-activties-lastaccess').data('date');
                // lastaccess = lastaccess == 0 ? M.util.get_string('never', 'local_edwiserreports') : common.formatDate(new Date(lastaccess * 1000), "d MMM yyyy hh:mm TT");
                $('.learner-course-activties-lastaccess').text(lastaccess);
                $('.learner-course-activties-lastaccess').css('display', 'inherit');
            }, 600);

        });

        // Observer module change.
        $('body').on('change', SELECTOR.MODULE, function() {
            filter.module = $(this).val();
            initializeDatatable();
        });

        // Observer completion change.
        $('body').on('change', SELECTOR.COMPLETION, function() {
            filter.completion = $(this).val();
            initializeDatatable();
        });

        // Search in table.
        $('body').on('input', SELECTOR.SEARCH, function() {
            dataTable.column(0).search(this.value).draw();
        });

        // Observer length change.
        $('body').on('change', SELECTOR.LENGTH, function() {
            dataTable.page.len(this.value).draw();
        });


        initializeDatatable();
        common.handleSearchInput();

        // Handle report page capability manager.
        common.handleReportCapability();
    }

    return {
        init: function() {
            $(document).ready(function() {
                init();
            });
        }
    };

});
