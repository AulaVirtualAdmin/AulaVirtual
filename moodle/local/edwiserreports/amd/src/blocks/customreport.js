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
 * Custom Report block.
 *
 * @package     local_edwiserreports
 * @copyright   2022 Wisdmlabs <support@wisdmlabs.com>
 * @author      Yogesh Shirsath
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

define('local_edwiserreports/blocks/customreport', [
    'jquery',
    'core/notification',
    '../common',
    '../defaultconfig'
], function(
    $,
    Notification,
    common,
    CFG
) {

    /**
     * Promise list to fetch data.
     */
    let PROMISE = {
        GET_DATA: function(params) {
            return $.ajax({
                url: CFG.requestUrl,
                type: CFG.requestType,
                dataType: CFG.requestDataType,
                data: {
                    action: 'get_customreports_data_ajax',
                    secret: M.local_edwiserreports.secret,
                    lang: $('html').attr('lang'),
                    data: params,
                    filter: JSON.stringify(filter)
                }
            });
        }
    };

    /**
     * Filter object.
     */
    var filter = {
        dir: $('html').attr('dir')
    };


    /**
     * Initialise custom report block
     * @param {String} id Block id
     * @param {String} params Report parameters
     */
    function init(id, params) {
        var tableId = `#${id} table.customreportdata`;
        var searchTable = `#${id}  .table-search-input input`;
        // Calling common blocks editing function to show change capability popup
        common.setupBlockEditing('.erp-custom-edit-settings');
        common.loader.show($(tableId).closest('[id^="customreportsblock"]'));
        PROMISE.GET_DATA(params)
            .done(function(response) {
                if (response.success) {
                    // let tableId = `#${id} table.customreportdata`;
                    var data = JSON.parse(response.data);
                    var table = $(tableId).DataTable({
                        columns: data.columns,
                        dom: '<"edwiserreports-table"<"table-wrapper"t><"table-pagination"p>>',
                        data: data.reportsdata,
                        bInfo: false,
                        lengthChange: false,
                        language: {
                            info: M.util.get_string('tableinfo', 'local_edwiserreports'),
                            infoEmpty: M.util.get_string('infoempty', 'local_edwiserreports'),
                            emptyTable: M.util.get_string('nodata', 'local_edwiserreports'),
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

                    // Search in table.
                    $('body').on('input', searchTable, function() {
                        table.search(this.value).draw();
                    });
                }
                // uodating form filter.
                var parentid = $(tableId).closest('[id^="customreportsblock"]').attr('id');
                $('#' + parentid + ' .download-links [name="filter"]').val(JSON.stringify(filter));

                // RTL support for arrows
                setTimeout(function(){
                    var attr = $('html').attr('dir');
                    // For some browsers, `attr` is undefined; for others,
                    // `attr` is false.  Check for both.
                    if (typeof attr !== 'undefined' && attr !== false && attr == 'rtl') {
                        $('.edwiserreports-table .page-item.next a:before').css({'border-left': '11px solid transparent', 'border-bottom': '6px solid transparent','border-top': '6px solid transparent','border-left-color': '#ccc','border-right-width': '0px'});
                        $('.edwiserreports-table .page-item.previous a:before').css({'border-bottom': '6px solid transparent','border-top': '6px solid transparent','border-right':' 10px solid transparent','border-right-color': '#ccc','border-left-width': '0px'});
                    }
                }, 1000);

                // all themes support for arrows
                setTimeout(function(){
                    // removing datatbles next previous blank as it can not be done by thier attributes
                    $('.edwiserreports-table .page-item.next a').empty();
                    $('.edwiserreports-table .page-item.previous a').empty();
        
                }, 2000);


                common.loader.hide($(tableId).closest('[id^="customreportsblock"]'));
            }).fail(Notification.exception);
    }

    return {
        init: function(id, params) {
            $(document).ready(function() {
                init(id, params);
            });
        }
    }
});
