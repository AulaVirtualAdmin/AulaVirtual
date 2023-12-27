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
 * Plugin administration pages are defined here.
 *
 * @package     local_edwiserreports
 * @copyright   2022 Wisdmlabs <support@wisdmlabs.com>
 * @author      Yogesh Shirsath
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
define([
    'jquery',
    'core/modal_factory',
    'core/notification',
    './events',
    './common',
    './email',
    './defaultconfig',
    './insights',
    './modal-migration',
    './blocks/siteaccess',
    './blocks/activecourses',
    './blocks/activeusers',
    './blocks/courseprogress',
    './blocks/inactiveusers',
    './blocks/realtimeusers',
    './blocks/todaysactivity',
    './blocks/grade',
    './blocks/visitsonsite',
    './blocks/timespentonsite',
    './blocks/timespentoncourse',
    './blocks/courseactivitystatus',
    './blocks/learnercourseprogress',
    './blocks/learnertimespentonsite',
    './blocks/courseengagement',
    './blocks/certificatestats'
], function(
    $,
    ModalFactory,
    Notification,
    EdwiserReportsEvents,
    common,
    email,
    CFG,
    insights,
    Migration,
    siteAccess,
    activeCourses,
    activeUsers,
    courseProgress,
    inactiveUsers,
    realTimeUsers,
    todaysActivity,
    grade,
    visitsonsite,
    timespentonsite,
    timespentoncourse,
    courseactivitystatus,
    learnercourseprogress,
    learnertimespentonsite,
    courseengagement,
    certificatestats
) {

    /**
     * Selector list.
     */
    var SELECTOR = {
        ROOT: '#wdm-edwiserreports',
        EXPORT: '#wdm-edwiserreports .export-options',
        DATESELECTED: '.selected-period',
        DATE: '.edwiserreports-header .edwiserreports-calendar',
        DATEMENU: '.edwiserreports-header .edwiserreports-calendar + .dropdown-menu',
        DATEITEM: '.edwiserreports-header .edwiserreports-calendar + .dropdown-menu .dropdown-item',
        DATEPICKER: '.edwiserreports-header .edwiserreports-calendar + .dropdown-menu .dropdown-calendar',
        DATEPICKERINPUT: '.edwiserreports-header .edwiserreports-calendar + .dropdown-menu .flatpickr'
    };

    /**
     * Promises.
     */
    var PROMISE = {
        /**
         * Get time period label to show in the header.
         * @param {String} timeperiod Time period.
         * @returns {Promise}
         */
        GET_TIMEPERIOD_LABEL: function(timeperiod) {
            return $.ajax({
                url: CFG.requestUrl,
                type: CFG.requestType,
                dataType: CFG.requestDataType,
                data: {
                    action: 'get_timeperiod_label_data_ajax',
                    secret: M.local_edwiserreports.secret,
                    lang: $('html').attr('lang'),
                    data: timeperiod
                }
            });
        },

        /**
         * Get data for graph export using download key.
         * @param {String} download Download key for graph records
         * @returns {Promise}
         */
        GET_EXPORT_DATA_FOR_GRAPH: function(download) {
            return $.ajax({
                url: CFG.requestUrl,
                type: CFG.requestType,
                dataType: CFG.requestDataType,
                data: {
                    action: 'get_export_data_for_graph',
                    lang: $('html').attr('lang'),
                    download: download
                }
            })
        }
    };

    /**
     * Blocks list.
     */
    var blocks = [
        siteAccess,
        activeCourses,
        activeUsers,
        courseProgress,
        inactiveUsers,
        realTimeUsers,
        todaysActivity,
        grade,
        visitsonsite,
        timespentonsite,
        timespentoncourse,
        courseactivitystatus,
        learnercourseprogress,
        learnertimespentonsite,
        courseengagement,
        certificatestats
    ];

    /**
     * Flat picker custom date.
     */
    let flatpickr = null;

    /**
     * This function will show validation error in block card.
     * @param {String} blockid Block id
     * @param {Object} response User validation response
     */
    function validateUser(blockid, response) {
        $(`#${blockid} .panel-body`).html(response.exception.message);
    }

    /**
     * Show time duration in header.
     * @param {String} date Time period.
     */
    function showTimeLabel(date) {
        PROMISE.GET_TIMEPERIOD_LABEL(date).done(function(response) {
            let startdate = new Date(response.startdate * 86400000);
            let enddate = new Date(response.enddate * 86400000);
            let startDay = startdate.getDate();
            startDay = startDay < 10 ? '0' + startDay : startDay;
            let endDay = enddate.getDate();
            endDay = endDay < 10 ? '0' + endDay : endDay;

            let customdate = `${startDay} ${startdate.toLocaleString('default', { month: 'long' })} ${startdate.getFullYear()}` + ' - ' +
            `${endDay} ${enddate.toLocaleString('default', { month: 'long' })} ${enddate.getFullYear()}`;
            // RTL support
            let dirattr = $('html').attr('dir');
            // Formating date for rtl
            if(dirattr == 'rtl'){
                // format for rtl : yyyy mm dd

                startdate = startdate.getFullYear() + ' ' + startdate.toLocaleString('default', { month: 'long' }) + ' ' + startDay;
                enddate = enddate.getFullYear() + ' ' + enddate.toLocaleString('default', { month: 'long' }) + ' ' + endDay;
                customdate = enddate + '-' + startdate;
                

                // Making direction ltr for date selector and aligning text to right
                $(SELECTOR.DATE).css({'direction':'ltr','text-align': 'right'});
                $(SELECTOR.DATEPICKERINPUT).css({'direction':'ltr','text-align': 'right'});
            }

            $(SELECTOR.DATESELECTED).html(customdate);

            // $(SELECTOR.DATESELECTED).html('<div style="display:flex;"><div>' + `${startDay} ${startdate.toLocaleString('default', { month: 'long' })} ${startdate.getFullYear()}` + '</div> - <div>' +
            // `${endDay} ${enddate.toLocaleString('default', { month: 'long' })} ${enddate.getFullYear()}` + '</div></div>');

        }).fail(function(ex) {
            Notification.exception(ex);
        });
    }

    /**
     * Throw an event with date change data.
     * @param {String} date  Date
     * @param {String} label Date label
     */
    function throwDateEvent(date, label) {
        let dateChangeEvent = new CustomEvent(EdwiserReportsEvents.DATECHANGE, {
            detail: {
                date: date
            }
        });
        document.dispatchEvent(dateChangeEvent);
        showTimeLabel(date, label);
    }

    /**
     * After Select Custom date get active users details.
     */
    function customDateSelected() {
        let date = $(SELECTOR.DATEPICKERINPUT).val(); // Y-m-d format
        let dateAlternate = $(SELECTOR.DATEPICKERINPUT).next().val().replace("to", "-"); // d M Y format

        // RTL support
        let dirattr = $('html').attr('dir');
        // Split string in 2 parts
        let stringarr = dateAlternate.split('-');
        // Formating date for rtl
        if(dirattr == 'rtl'){
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

        $(SELECTOR.DATEPICKERINPUT).next().val($.trim(dateAlternate));

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

        // Throw date change event.
        throwDateEvent(date, dateAlternate);
    }

    /**
     * Init main.js
     */
    var init = function() {
        $(document).ready(function() {

            // Initialize schedule email modal.
            email.init();

            // Initialize insights.
            insights.init();

            let currentDate = $(SELECTOR.DATEITEM + '.active').data('value');

            // Show time period in header.
            showTimeLabel(
                currentDate,
                $(SELECTOR.DATEITEM + '.active').text()
            );

            common.handleSearchInput();

            blocks.forEach(block => {
                block.init(validateUser, currentDate);
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
                    $(SELECTOR.DATE).dropdown('update');
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

                // Throw date change event.
                throwDateEvent($(this).data('value'), $(this).text());
            });

            common.exportDropdownHandler(SELECTOR.EXPORT);
        });
    };

    function initMigration() {
        ModalFactory.create({
            type: Migration.TYPE
        }, $('#create'));
    }

    /**
     * Download graph as image.
     * @param {String} download Download key
     * @param {String} block    Block name
     * @param {String} format   Exporting format
     * @param {String} filename Exporting filename
     */
    function download(download, block, format, filename) {
        $(document).ready(function() {
            require(['local_edwiserreports/blocks/' + block], function(amd) {
                PROMISE.GET_EXPORT_DATA_FOR_GRAPH(download)
                    .done(function(response) {
                        amd.download(format, filename, response);
                    });
            });
        });
    }

    // Must return the init function
    return {
        init: init,
        initMigration: initMigration,
        download: download
    };
});
