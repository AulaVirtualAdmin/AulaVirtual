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
 * Course Engagement block.
 *
 * @package     local_edwiserreports
 * @copyright   2022 Wisdmlabs <support@wisdmlabs.com>
 * @author      Yogesh Shirsath
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
/* eslint-disable no-console */
define('local_edwiserreports/blocks/courseengagement', [
    'jquery',
    'core/modal_factory',
    'core/modal_events',
    'core/fragment',
    'local_edwiserreports/defaultconfig',
    'local_edwiserreports/common',
], function(
    $,
    ModalFactory,
    ModalEvents,
    Fragment,
    CFG,
    common
) {

    /**
     * Selectors.
     */
    var SELECTOR = {
        PANEL: '#courseengagementblock',
        COHORT: '.cohort-select',
        TABLE: '#courseengagementblock table',
        SEARCH: '.table-search-input input',
        FORMFILTER: '#courseengagementblock .download-links [name="filter"]',
        USERS: '#courseengagementblock table a.modal-trigger',
        MODALSEARCH: '.courseengage-modal .table-search-input input'
    };

    /**
     * Filter.
     */
    var filter = {
        cohort: 0,
        dir: $('html').attr('dir')
    };

    /**
     * Data table object.
     */
    var dataTable = null;

    /**
     * Table object of modal table.
     */
    var modalTable = null;

    /**
     * Promises list.
     */
    let PROMISE = {
        /**
         * Get timespent on site using filters.
         * @param {Object} filter Filter data
         * @returns {PROMISE}
         */
        GET_COURSEENGAGEMENT: function(filter) {
            return $.ajax({
                url: CFG.requestUrl,
                type: CFG.requestType,
                dataType: CFG.requestDataType,
                data: {
                    action: 'get_courseengagement_data_ajax',
                    secret: M.local_edwiserreports.secret,
                    lang: $('html').attr('lang'),
                    data: JSON.stringify({
                        filter: filter
                    })
                },
            });
        }
    };

    /**
     * Load data to dataTable using ajax.
     */
    function loadData() {
        // Show loader.
        common.loader.show(SELECTOR.PANEL);

        PROMISE.GET_COURSEENGAGEMENT(filter).done(function(response) {
                if (dataTable !== null) {
                    dataTable.destroy();
                }
                dataTable = $(SELECTOR.TABLE).DataTable({
                    data: response.data,
                    dom: '<"edwiserreports-table"<t><"table-pagination"p>>',
                    columnDefs: [
                        { className: "fixed-column", targets: 0 },
                        { className: "text-left", targets: [0, 1] },
                        { className: "text-right", targets: "_all" }
                    ],
                    columns: [
                        { "data": "coursename", width: "15rem" },
                        { "data": "category", width: "17rem" },
                        { "data": "enrolment" },
                        { "data": "coursecompleted" },
                        { "data": "completionspercentage" },
                        { "data": "visited" },
                        { "data": "averagevisits" },
                        { "data": "timespent" },
                        { "data": "averagetimespent" }
                    ],
                    info: false,
                    language: {
                        infoEmpty: M.util.get_string('infoempty', 'local_edwiserreports'),
                        emptyTable: M.util.get_string('nocourses', 'local_edwiserreports'),
                        zeroRecords: M.util.get_string('zerorecords', 'local_edwiserreports'),
                        paginate: {
                            previous: " ",
                            next: " "
                        }
                    },
                    drawCallback: function() {
                        common.stylePaginationButton(this);
                    }
                });
            })
            .fail(function(data) {
                console.log(data);
            })
            .always(function() {
                // Hide loader.
                common.loader.hide(SELECTOR.PANEL);
            });

    }

    /**
     * Initialize
     * @param {function} invalidUser Callback function
     */
    function init(invalidUser) {

        // Updated export filter values.
        filter.dir = $('html').attr('dir');
        $(SELECTOR.FORMFILTER).val(JSON.stringify(filter));

        // Block not present on page.
        if ($(SELECTOR.PANEL).length === 0) {
            return;
        }
        // Enable select2 on cohort filter.
        $(SELECTOR.PANEL).find('.singleselect').select2();

        loadData();

        // On change of cohort filter.
        $('body').on('change', `${SELECTOR.PANEL} ${SELECTOR.COHORT}`, function() {
            var cohort = $(this).val();
            filter.cohort = cohort;
            $(SELECTOR.PANEL).find('.download-links input[name="cohortid"]').val(cohort);
            loadData();
        });

        // Search in table.
        $('body').on('input', `${SELECTOR.PANEL} ${SELECTOR.SEARCH}`, function() {
            dataTable.columns(0).search($(this).val()).draw();
        });

        // Search in modal table.
        $('body').on('input', SELECTOR.MODALSEARCH, function() {
            modalTable.search(this.value).draw();
        });

        // Show users list in modal on number click.
        $(document).on('click', SELECTOR.USERS, function() {
            var action = $(this).data("action");
            var courseid = $(this).data("courseid");
            var coursename = $(this).data("coursename");
            var cohortid = $(SELECTOR.PANEL).find(SELECTOR.COHORT).length ? $(SELECTOR.PANEL).find(SELECTOR.COHORT).val() : 0;
            var ModalRoot = null;

            // eslint-disable-next-line promise/catch-or-return
            ModalFactory.create({
                body: Fragment.loadFragment(
                    'local_edwiserreports',
                    'userslist',
                    1, {
                        page: 'courseengage',
                        courseid: courseid,
                        action: action,
                        cohortid: cohortid
                    }
                )
            }).then(function(modal) {
                ModalRoot = modal.getRoot();
                modal.getBody().addClass('courseengage-modal');
                ModalRoot.find('.modal-dialog').addClass('modal-lg');
                modal.setTitle(coursename);
                modal.show();
                ModalRoot.on(ModalEvents.hidden, function() {
                    modal.destroy();
                });

                ModalRoot.on(ModalEvents.shown, function() {
                    $(window).resize();
                });

                ModalRoot.on(ModalEvents.bodyRendered, function() {
                    var ModalTable = ModalRoot.find(".modal-table");

                    // If empty then remove colspan
                    if (ModalTable.find("tbody").hasClass("empty")) {
                        ModalTable.find("tbody").empty();
                    }

                    // Create dataTable for userslist
                    modalTable = ModalTable.DataTable({
                        language: {
                            info: M.util.get_string('tableinfo', 'local_edwiserreports'),
                            infoEmpty: M.util.get_string('infoempty', 'local_edwiserreports'),
                            emptyTable: M.util.get_string('nousers', 'local_edwiserreports'),
                            zeroRecords: M.util.get_string('zerorecords', 'local_edwiserreports'),
                            paginate: {
                                previous: " ",
                                next: " "
                            }
                        },
                        dom: '<"edwiserreports-table"i<t><"table-pagination"p>>',
                        drawCallback: function() {
                            common.stylePaginationButton(this);
                        },
                        lengthChange: false
                    });
                });
                return;
            });
        });
    }

    // Must return the init function
    return {
        init: init
    };
});
