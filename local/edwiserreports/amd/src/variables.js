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
 * @copyright   2021 wisdmlabs <support@wisdmlabs.com>
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
/* eslint-disable camelcase */
// eslint-disable-next-line no-unused-vars
define(['jquery'], function($) {
    return {
        pluginPage: $("#wdm-edwiserreports"),
        requestUrl: M.cfg.wwwroot + '/local/edwiserreports/request_handler.php',
        requestType: 'GET',
        requestDataType: 'json',
        whiteColor: "rgba(255, 255, 255, 0.8)",
        todaysActivityBlock: "#todaysactivityblock #apex-chart-todays-activity",
        activeUsersBlock: "#activeusersblock #apex-chart-active-users",
        courseProgressBlock: "#courseprogressblock #apex-chart-course-progress",
        month_1: "JAN",
        month_2: "FEB",
        month_3: "MAR",
        month_4: "APR",
        month_5: "MAY",
        month_6: "JUN",
        month_7: "JUL",
        month_8: "AUG",
        month_9: "SEP",
        month_10: "OCT",
        month_11: "NOV",
        month_12: "DEC",
        clock12_0: "12:00 AM",
        clock12_1: "01:00 AM",
        clock12_2: "02:00 AM",
        clock12_3: "03:00 AM",
        clock12_4: "04:00 AM",
        clock12_5: "05:00 AM",
        clock12_6: "06:00 AM",
        clock12_7: "07:00 AM",
        clock12_8: "08:00 AM",
        clock12_9: "09:00 AM",
        clock12_10: "10:00 AM",
        clock12_11: "11:00 AM",
        clock12_12: "12:00 PM",
        clock12_13: "01:00 PM",
        clock12_14: "02:00 PM",
        clock12_15: "03:00 PM",
        clock12_16: "04:00 PM",
        clock12_17: "05:00 PM",
        clock12_18: "06:00 PM",
        clock12_19: "07:00 PM",
        clock12_20: "08:00 PM",
        clock12_21: "09:00 PM",
        clock12_22: "10:00 PM",
        clock12_23: "11:00 PM",


        exportUrlLink: " .dropdown-menu[aria-labelledby='export-dropdown'] .dropdown-item",
        cohortFilterBtn: "#cohortfilter",
        cohortFilterItem: "#cohortfilter ~ .dropdown-menu .dropdown-item",

        // Export Variable
        cohortReplaceFlag: "C",
        filterReplaceFlag: "F",

        // Plugin component
        component: 'local_edwiserreports',

        // Get scheduled email context
        getScheduledEmailFormContext: function() {
            return {
                timesdropdown: [{
                        timestring: "12:00 AM",
                        value: 0
                    },
                    {
                        timestring: "01:00 AM",
                        value: 1
                    },
                    {
                        timestring: "02:00 AM",
                        value: 2
                    },
                    {
                        timestring: "03:00 AM",
                        value: 3
                    },
                    {
                        timestring: "04:00 AM",
                        value: 4
                    },
                    {
                        timestring: "05:00 AM",
                        value: 5
                    },
                    {
                        timestring: "06:00 AM",
                        value: 6
                    },
                    {
                        timestring: "07:00 AM",
                        value: 7
                    },
                    {
                        timestring: "08:00 AM",
                        value: 8
                    },
                    {
                        timestring: "09:00 AM",
                        value: 9
                    },
                    {
                        timestring: "10:00 AM",
                        value: 10
                    },
                    {
                        timestring: "11:00 AM",
                        value: 11
                    },
                    {
                        timestring: "12:00 PM",
                        value: 12
                    },
                    {
                        timestring: "01:00 PM",
                        value: 13
                    },
                    {
                        timestring: "02:00 PM",
                        value: 14
                    },
                    {
                        timestring: "03:00 PM",
                        value: 15
                    },
                    {
                        timestring: "04:00 PM",
                        value: 16
                    },
                    {
                        timestring: "05:00 PM",
                        value: 17
                    },
                    {
                        timestring: "06:00 PM",
                        value: 18
                    },
                    {
                        timestring: "07:00 PM",
                        value: 19
                    },
                    {
                        timestring: "08:00 PM",
                        value: 20
                    },
                    {
                        timestring: "09:00 PM",
                        value: 21
                    },
                    {
                        timestring: "10:00 PM",
                        value: 22
                    },
                    {
                        timestring: "11:00 PM",
                        value: 23
                    },
                ],
                daysdropdown: [{
                        string: 1,
                        value: 1,
                    },
                    {
                        string: 2,
                        value: 2,
                    },
                    {
                        string: 3,
                        value: 3,
                    },
                    {
                        string: 4,
                        value: 4,
                    },
                    {
                        string: 5,
                        value: 5,
                    },
                    {
                        string: 6,
                        value: 6,
                    },
                    {
                        string: 7,
                        value: 7,
                    },
                    {
                        string: 8,
                        value: 8,
                    },
                    {
                        string: 9,
                        value: 9,
                    },
                    {
                        string: 10,
                        value: 10
                    },
                    {
                        string: 11,
                        value: 11
                    },
                    {
                        string: 12,
                        value: 12
                    },
                    {
                        string: 13,
                        value: 13
                    },
                    {
                        string: 14,
                        value: 14
                    },
                    {
                        string: 15,
                        value: 15
                    },
                    {
                        string: 16,
                        value: 16
                    },

                    {
                        string: 17,
                        value: 17
                    },
                    {
                        string: 18,
                        value: 18
                    },
                    {
                        string: 19,
                        value: 19
                    },
                    {
                        string: 20,
                        value: 20
                    },
                    {
                        string: 21,
                        value: 21
                    },
                    {
                        string: 22,
                        value: 22
                    },
                    {
                        string: 23,
                        value: 23
                    },
                    {
                        string: 24,
                        value: 24
                    },
                    {
                        string: 25,
                        value: 25
                    },
                    {
                        string: 26,
                        value: 26
                    },
                    {
                        string: 27,
                        value: 27
                    },
                    {
                        string: 28,
                        value: 28
                    },
                    {
                        string: 29,
                        value: 29
                    },
                    {
                        string: 30,
                        value: 30
                    },
                    {
                        string: 31,
                        value: 31
                    }
                ]
            };
        },

        // Change the export URL for export buttons
        changeExportUrl: function(filter, exportUrlLink, flag) {
            $(exportUrlLink).each(function() {
                var oldUrl = this.href;
                if (flag == "F") {
                    if (oldUrl.search(/filter=(.*)&/) > -1) {
                        oldUrl = oldUrl.replace(/filter=(.*)&/, "filter=" + filter + "&");
                    } else {
                        oldUrl = oldUrl.replace(/filter=(.*)/, "filter=" + filter);
                    }
                } else if (flag == "C") {
                    oldUrl = oldUrl.replace(/cohortid=(.*)/, "cohortid=" + filter);
                }
                $(this)[0].href = oldUrl;
            });
        },

        // Function to get the details from the URL
        // eslint-disable-next-line consistent-return
        getUrlParameter: function(sParam) {
            var sPageURL = decodeURIComponent(window.location.search.substring(1)),
                sURLVariables = sPageURL.split('&'),
                sParameterName,
                i;

            for (i = 0; i < sURLVariables.length; i++) {
                sParameterName = sURLVariables[i].split('=');

                if (sParameterName[0] === sParam) {
                    return sParameterName[1] === undefined ? true : sParameterName[1];
                }
            }
        },

        generateUrl: function(url, params) {
            var completeUrl = url + "?";
            var isfirst = true;

            $.each(params, function(idx, param) {
                if (isfirst) {
                    isfirst = false;
                } else {
                    completeUrl += "&";
                }
                completeUrl += idx + "=" + param;
            });
            return completeUrl;
        },

        // Get URL Params
        getUrlParams: function(url, paramKey) {
            var vars = {};
            url.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m, key, value) {
                vars[key] = value;
            });
            return vars[paramKey];
        },

        getEmailModalHeader: function(blockname, emailtype) {
            var modalHeader = "";
            switch (emailtype) {
                case 1:
                    modalHeader = "Schedule Emails for ";
                    break;
                default:
                    modalHeader = "Send ";
            }

            switch (blockname) {
                case "activeusers":
                    modalHeader += "Active Users";
                    break;
                case "activecourses":
                    modalHeader += "Popular Courses";
                    break;
                case "courseprogress":
                    modalHeader += "Course Progress";
                    break;
                case "certificates":
                    modalHeader += "Certificates";
                    break;
                case "courseengage":
                    modalHeader += "Course Engagement";
                    break;
                case "completion":
                    modalHeader += "Course Completion";
                    break;
            }

            if (modalHeader != "Send " && emailtype != 1) {
                modalHeader += " Reports";
            }

            return modalHeader;
        }
    };
});
