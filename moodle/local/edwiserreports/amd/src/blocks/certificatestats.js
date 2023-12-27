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
 * Certificate block.
 *
 * @package     local_edwiserreports
 * @copyright   2022 Wisdmlabs <support@wisdmlabs.com>
 * @author      Yogesh Shirsath
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
/* eslint-disable no-console */
define('local_edwiserreports/blocks/certificatestats', [
    'jquery',
    'local_edwiserreports/defaultconfig',
    'local_edwiserreports/common',
], function(
    $,
    CFG,
    common
) {

    /**
     * Selectors.
     */
    var SELECTOR = {
        PANEL: '#certificatesblock',
        COHORT: '.cohort-select',
        TABLE: '#certificatesblock table',
        SEARCH: '.table-search-input input',
        USERS: '#certificatesblock table a.modal-trigger',
        FORMFILTER: '#certificatesblock .download-links [name="filter"]'
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
     * Promises list.
     */
    let PROMISE = {
        /**
         * Get timespent on site using filters.
         * @param {Object} filter Filter data
         * @returns {PROMISE}
         */
        GET_CERTIFICATES: function(filter) {
            return $.ajax({
                url: CFG.requestUrl,
                type: CFG.requestType,
                dataType: CFG.requestDataType,
                data: {
                    action: 'get_certificates_data_ajax',
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

        PROMISE.GET_CERTIFICATES(filter).done(function(response) {
                if (dataTable !== null) {
                    dataTable.destroy();
                }
                dataTable = $(SELECTOR.TABLE).DataTable({
                    responsive: true,
                    data: response.data,
                    dom: '<"edwiserreports-table"<t><"table-pagination"p>>',
                    columns: [
                        { "data": "name" },
                        { "data": "coursename" },
                        { "data": "issued" },
                        { "data": "notissued" }
                    ],
                    columnDefs: [{
                        "targets": [0, 1],
                        "className": "text-left"
                    }, {
                        "targets": "_all",
                        "className": "text-center",
                    }],
                    language: {
                        info: M.util.get_string('tableinfo', 'local_edwiserreports'),
                        infoEmpty: M.util.get_string('infoempty', 'local_edwiserreports'),
                        emptyTable: M.util.get_string('nocertificates', 'local_edwiserreports'),
                        zeroRecords: M.util.get_string('zerorecords', 'local_edwiserreports'),
                        paginate: {
                            previous: " ",
                            next: " "
                        }
                    },
                    drawCallback: function() {
                        common.stylePaginationButton(this);
                    },
                    lengthChange: false,
                    bInfo: false
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

        // Block not present on page.
        if ($(SELECTOR.PANEL).length === 0) {
            return;
        }
        $(SELECTOR.FORMFILTER).val(JSON.stringify(filter));

        // Enable select2 on cohort filter.
        $(SELECTOR.PANEL).find('.singleselect').select2();

        loadData();

        // On change of cohort filter.
        $('body').on('change', `${SELECTOR.PANEL} ${SELECTOR.COHORT}`, function() {
            let cohort = $(this).val();
            filter.cohort = cohort;
            $(SELECTOR.PANEL).find('.download-links input[name="cohortid"]').val(cohort);
            loadData();
        });

        // Search in table.
        $('body').on('input', `${SELECTOR.PANEL} ${SELECTOR.SEARCH}`, function() {
            dataTable.columns(0).search($(this).val()).draw();
        });
    }

    // Must return the init function
    return {
        init: init
    };
});
