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
    'core/notification',
    'core/modal_factory',
    'core/fragment',
    'core/modal_events',
    './common',
    './variables'
], function(
    $,
    Notification,
    ModalFactory,
    Fragment,
    ModalEvents,
    common,
    v
) {
    var emailListTable = null;
    /**
     * Email Shcedule Modal Related Psrametres start
     */
    // Form root
    var formRoot = '#scheduletab';

    /**
     * Selectors list.
     */
    var SELECTOR = {
        // Dropdowns.
        DROPDOWNS: formRoot + ' .dropdown a.dropdown-item',
        DROPDOWNSELECTOR: 'button.dropdown-toggle',

        // Duration dropdown selectors.
        DURATIONSELECTOR: formRoot + ' .dropdown.duration-dropdown a.dropdown-item',
        DURATIONINPUT: formRoot + ' input[name="esrduration"]',

        // Times dropdown selector.
        TIMESDROPDOWNBTN: formRoot + ' .date-filters .dropdown:not(.duration-dropdown) button.dropdown-toggle',
        TIMESDROPDOWNLINK: formRoot + ' .date-filters .dropdown:not(.duration-dropdown) a.dropdown-item',
        DAILYDROPDOWNBTN: formRoot + ' .dropdown.daily-dropdown button.dropdown-toggle',
        WEEKLYDROPDOWNBTN: formRoot + ' .dropdown.weekly-dropdown button.dropdown-toggle',
        MONTHLYDROPDOWNBTN: formRoot + ' .dropdown.monthly-dropdown button.dropdown-toggle',
        TIMEINPUT: formRoot + ' input[name="esrtime"]',

        // Format Dropdown.
        FORMATSELECTOR: formRoot + ' .dropdown.format-dropdown a.dropdown-item',

        // For email schedule setting.
        EDITBTN: "#listemailstab .esr-email-sched-edit",
        DELETEBTN: "#listemailstab .esr-email-sched-delete",
        EMAILLISTTOGGLESWITCH: "#listemailstab .esr-email-toggle",

        // Tabs.
        TABS: '[data-plugin="tabs"] .nav-link, [data-plugin="tabs"] .tab-pane',
        FORMTAB: '[aria-controls="scheduletab"], #scheduletab',
        FORMLISTTAB: '[href="#listemailstab"]',
        LISTSEARCH: '#listemailstab .table-search-input input',

        // Schedule email dropdown.
        SCHEDULEDEMAILDROPDOWN: '.download-links button[value="email"]',

        // Inputs.
        ID: '[name="esrid"]',
        NAME: '[name="esrname"]',
        SUBJECT: '[name="esrsubject"]',
        RECEPIENT: '[name="esrrecepient"]',
        BLOCKNAME: '[name="blockname"]',
        REGION: '[name="region"]',
        FILTERDATA: '[name="esrfilterdata"]',
        FORMAT: '[name="esrformat"]',
        GRAPHICAL: '[name="esrgraphical"]',

        // Form actions.
        RESET: '[data-action="reset"]',
        SAVE: '[data-action="save"]',
        SEND: '[data-action="send"]'
    };

    // Regular expression for email validation.
    var emailRegex = /^[a-zA-Z0-9]+[a-zA-Z0-9+_.-]+[a-zA-Z0-9]+@[a-zA-Z0-9]+[a-zA-Z0-9.-]*\.[a-zA-Z]{2,}$/;

    /**
     * Render all emails in modal
     * @param {object} data Data for datatable
     * @param {Object} modal Modal object
     * @return {Object} Datatable object
     */
    function renderAllScheduledEmails(data, modal) {
        var table = modal.getRoot().find("#esr-shceduled-emails");

        // Resize event to adjust datatable when click on the all list tab
        // Not able to call resize when ajax completed
        // So got the temporary solution
        $(document).on('click', SELECTOR.FORMLISTTAB, function() {
            $(window).resize();
        });

        // Create datatable
        return table.DataTable({
            ajax: {
                url: v.requestUrl + '?sesskey=' + data.sesskey,
                type: v.requestType,
                data: {
                    action: 'get_scheduled_emails_ajax',
                    data: JSON.stringify({
                        blockname: data.block,
                        region: data.region
                    })
                }
            },
            dom: '<"edwiserreports-table"i<t><"table-pagination"p>>',
            language: {
                info: M.util.get_string('tableinfo', 'local_edwiserreports'),
                infoEmpty: M.util.get_string('infoempty', 'local_edwiserreports'),
                emptyTable: M.util.get_string('noscheduleemails', 'local_edwiserreports'),
                zeroRecords: M.util.get_string('zerorecords', 'local_edwiserreports'),
                sClass: 'text-center',
                paginate: {
                    previous: " ",
                    next: " "
                }
            },
            drawCallback: function() {
                common.stylePaginationButton(this);
            },
            order: [
                [2, "asc"]
            ],
            columns: [{
                "data": "esrname",
                "orderable": true
            }, {
                "data": "esrnextrun",
                "orderable": true
            }, {
                "data": "esrfrequency",
                "orderable": true
            }, {
                "data": "esrmanage",
                "orderable": false
            }],
            responsive: true,
            lengthChange: false,
        });
    }

    /**
     * Validate email shceduled form
     * @param  {object} form Form object
     * @param  {object} errorBox Box to show error
     * @return {boolean} Return form validation status
     */
    function validateEmailScheduledForm(form, errorBox) {
        var esrname = form.find(SELECTOR.NAME).val();
        var esrsubject = form.find(SELECTOR.SUBJECT).val();
        var valid = true;
        if (esrname == "" || esrsubject == "") {
            errorBox.html(M.util.get_string('emptyerrormsg', 'local_edwiserreports')).show();
            valid = false;
        }
        if (!validateEmails(form.find(SELECTOR.RECEPIENT).val())) {
            valid = false;
            errorBox.html(M.util.get_string('emailinvaliderrormsg', 'local_edwiserreports')).show();
        }
        return valid;
    }

    /**
     * Update dropdown button text
     * @param  {object} _this click object
     */
    function updateDropdownBtnText(_this) {
        var val = $(_this).data('value');
        var text = $(_this).text();
        var dropdownBtn = $(_this).closest(".dropdown").find(SELECTOR.DROPDOWNSELECTOR);

        // Set button values
        dropdownBtn.text(text);
        dropdownBtn.data("value", val);
    }

    /**
     * Duration dropdown init
     * @param {object} _this click object
     * @param {Object} root Modal root obuject
     */
    function durationDropdownInit(_this, root) {
        var val = $(_this).data('value');

        root.find(SELECTOR.DURATIONINPUT).val(val);
        $(SELECTOR.TIMESDROPDOWNBTN).hide();

        // Show only selected dropdown
        var subDropdown = null;
        switch (val) {
            case 1: // Weekly
                subDropdown = $(SELECTOR.WEEKLYDROPDOWNBTN);
                break;
            case 2: // Monthly
                subDropdown = $(SELECTOR.MONTHLYDROPDOWNBTN);
                break;
            default: // Daily
                subDropdown = $(SELECTOR.DAILYDROPDOWNBTN);
        }

        // Show subdropdown
        subDropdown.show();

        // Set values to hidden input fieds
        var timeval = subDropdown.data("value");
        $(SELECTOR.TIMEINPUT).val(timeval);
    }

    /**
     * Email schedle setting session initialization
     * @param {object} _this click object
     * @param {Object} root Modal root obuject
     */
    function emailScheduleSettingInit(_this, root) {
        var id = $(_this).data("id");
        var blockname = $(_this).data("blockname");
        var region = $(_this).data("region");

        $.ajax({
            url: v.requestUrl,
            type: v.requestType,
            sesskey: $(_this).data("sesskey"),
            data: {
                action: 'get_scheduled_email_detail_ajax',
                sesskey: $(_this).data("sesskey"),
                data: JSON.stringify({
                    id: id,
                    blockname: blockname,
                    region: region
                })
            }
        }).done(function(response) {
            response = JSON.parse(response);
            if (!response.error) {
                setEmailSheduleFormValues(response, _this, root);

                root.find(SELECTOR.TABS).removeClass("active show");
                root.find(SELECTOR.FORMTAB).addClass("active show");
            } else {
                console.log(response);
            }
        }).fail(Notification.exception);
    }

    /**
     * Set email shcedule values in form
     * @param {Object} response Response object
     * @param {object} _this click object
     * @param {Object} root Modal root obuject
     */
    function setEmailSheduleFormValues(response, _this, root) {
        var esrDurationVal = null;
        var esrTimeVal = null;

        $.each(response.data, function(idx, val) {
            if (typeof val === 'object') {
                // Set block value name
                root.find(SELECTOR.BLOCKNAME).val(val.blockname);
                root.find(SELECTOR.REGION).val(val.region);
                return;
            }
            switch (idx) {
                case "esrduration":
                    esrDurationVal = val;
                    // Trigger click event
                    root.find('.duration-dropdown .dropdown-item[data-value="' + val + '"]').click();
                case "esrtime":
                    esrTimeVal = val;
                    break;
                case "esremailenable":
                case "esrfilterdata":
                    root.find('input[name="' + idx + '"]').prop("checked", val);
                    break;
                case "esrformat":
                    root.find('.format-dropdown .dropdown-item[data-value="' + val + '"]').click();
                    break;
                default:
                    // Set values for input text.
                    if (root.find('[name="' + idx + '"]').val(val).length) {
                        root.find('[name="' + idx + '"]').trigger('input');
                    }
                    break;
            }
        });

        // Handling newly added filterdata option.
        if (response.data.esrfilterdata === undefined) {
            root.find(SELECTOR.FILTERDATA).prop("checked", true);
        }

        // Handling newly added filterdata option.
        if (response.data.esrformat === undefined) {
            let format = root.find(SELECTOR.GRAPHICAL).val() == 1 ? 'pdfimage' : 'csv';
            root.find('.format-dropdown .dropdown-item[data-value="' + format + '"]').click();
        }

        // Subdropdown click event
        var subSelectedDropdpown = '.dropdown-item[data-value="' + esrTimeVal + '"]';

        // Show only selected dropdown
        var subDropdown = null;
        switch (esrDurationVal) {
            case "1": // Weekly
                subDropdown = $(".weekly-dropdown");
                break;
            case "2": // Monthly
                subDropdown = $(".monthly-dropdown");
                break;
            default: // Daily
                subDropdown = $(".daily-dropdown");
        }

        // Trigger click event
        subDropdown.find(subSelectedDropdpown).click();
    }

    /**
     * Delete Scheduled email
     * @param {Object} data Data for email
     * @param {object} root Modal root object
     * @param {Object} modal Modal object
     */
    function emailScheduleDeleteInit(data, root, modal) {
        var id = data.id;
        var blockname = data.block;
        var region = data.region;
        var errorBox = root.find(".esr-form-error");
        common.loader.show('body');

        $.ajax({
            url: v.requestUrl,
            type: v.requestType,
            sesskey: data.sesskey,
            data: {
                action: 'delete_scheduled_email_ajax',
                sesskey: data.sesskey,
                data: JSON.stringify({
                    id: id,
                    blockname: blockname,
                    region: region
                })
            }
        }).done(function(response) {
            if (!response.error) {
                if (emailListTable) {
                    emailListTable.destroy();
                }
                emailListTable = renderAllScheduledEmails(data, modal);
                errorBox.html(M.util.get_string('deletesuccessmsg', 'local_edwiserreports'));
            } else {
                errorBox.html(M.util.get_string('deleteerrormsg', 'local_edwiserreports'));
            }
        }).fail(Notification.exception).always(function() {
            errorBox.delay(3000).fadeOut('slow');
            common.loader.hide('body');
        });
    }

    /* eslint-disable no-unused-vars */
    /**
     * Change scheduled email status
     * @param {Object} data Data for email
     * @param {object} root Modal root object
     * @param {Object} modal Modal object
     */
    function changeScheduledEmailStatusInit(data, root, modal) {
        /* eslint-enable no-unused-vars */
        var id = data.id;
        var blockname = data.block;
        var region = data.region;
        var sesskey = data.sesskey;

        var errorBox = root.find(".esr-form-error");

        $.ajax({
            url: v.requestUrl,
            type: v.requestType,
            data: {
                action: 'change_scheduled_email_status_ajax',
                sesskey: sesskey,
                data: JSON.stringify({
                    id: id,
                    blockname: blockname,
                    region: region
                })
            }
        }).done(function(response) {
            let switchElement = root.find('.esr-manage-scheduled-emails .esr-switch[data-id="' + data.id + '"]');
            response = JSON.parse(response);
            if (switchElement.attr('data-value') == "0") {
                switchElement.attr('data-value', 'on');
            } else {
                switchElement.attr('data-value', '0');
            }
            if (!response.error) {
                errorBox.html(response.successmsg);
                errorBox.show();
                errorBox.delay(3000).fadeOut('slow');
            } else {
                errorBox.html(response.errormsg);
                errorBox.show();
                errorBox.delay(3000).fadeOut('slow');
            }
        });
    }

    /**
     * Email list table events.
     * @param {Object} data Data for email
     * @param {object} root Modal root object
     * @param {Object} modal Modal object
     */
    function emailListInit(data, root, modal) {
        // When setting button clicked then
        root.on('click', SELECTOR.EDITBTN, function() {
            emailScheduleSettingInit(this, root);
        });

        // When delete button clicked then
        root.on('click', SELECTOR.DELETEBTN, function(e) {
            data.id = $(this).data("id");
            Notification.confirm(
                M.util.get_string('confirmemailremovaltitle', 'local_edwiserreports'),
                M.util.get_string('confirmemailremovalquestion', 'local_edwiserreports'),
                M.util.get_string('yes', 'moodle'),
                M.util.get_string('no', 'moodle'),
                $.proxy(function() {
                    emailScheduleDeleteInit(data, root, modal);
                }, e.currentTarget)
            );
        });

        // When toggle switch clicked then
        root.on('click', SELECTOR.EMAILLISTTOGGLESWITCH, function() {
            data.id = $(this).data("id");
            changeScheduledEmailStatusInit(data, root, modal);
        });
    }

    /**
     * Manage schedule emails form initialization
     * @param {Object} data Data for email
     * @param {object} root Modal root object
     * @param {Object} modal Modal object
     */
    function emailScheduleFormInit(data, root, modal) {
        // If dropdown selected then update the button text
        root.on('click', SELECTOR.DROPDOWNS, function() {
            updateDropdownBtnText(this);
        });

        // Select duration for email schedule
        root.on('click', SELECTOR.DURATIONSELECTOR, function() {
            durationDropdownInit(this, root);
        });

        // Select time for schedule
        root.on('click', SELECTOR.TIMESDROPDOWNLINK, function() {
            root.find(SELECTOR.TIMEINPUT).val($(this).data('value'));
        });

        // Select format.
        root.on('click', SELECTOR.FORMATSELECTOR, function() {
            root.find(SELECTOR.FORMAT).val($(this).data('value'));
        });

        // On save perform operation
        root.on('click', SELECTOR.SAVE, function() {
            var errorBox = root.find(".esr-form-error");
            common.loader.show('body');

            if (validateEmailScheduledForm(root.find("form"), errorBox)) {
                var filter = data.filter;
                var cohortid = data.cohortid;
                var block = data.block;
                var url = M.cfg.wwwroot + "/local/edwiserreports/download.php?type=emailscheduled&filter=" +
                    filter + "&cohortid=" + cohortid + "&block=" + block;

                // Send ajax to save the scheduled email
                $.ajax({
                    url: url,
                    type: "POST",
                    data: root.find("form").serialize()
                }).done(function(response) {
                    response = $.parseJSON(response);

                    // If error then log the error
                    if (response.error) {
                        errorBox.html(M.util.get_string('scheduleerrormsg', 'local_edwiserreports')).show();
                        console.log(response.error);
                    } else {
                        if (emailListTable) {
                            emailListTable.destroy();
                        }
                        emailListTable = renderAllScheduledEmails(data, modal);
                        errorBox.html(M.util.get_string('schedulesuccessmsg', 'local_edwiserreports')).show();
                    }
                }).fail(Notification.exception).always(function() {
                    setTimeout(function() {
                        errorBox.fadeOut('slow');
                    }, 3000);
                    common.loader.hide('body');
                });
            } else {
                common.loader.hide('body');
            }
        });

        // Send the notification immidiatly
        root.on('click', SELECTOR.SEND, function() {
            sendMailToUser(data, this, root);
        });

        // Reset scheduled form
        root.on('click', SELECTOR.RESET, function() {

            // Resetting inputs.
            root.find('[type="text"], textarea').val('').trigger('input');

            // Resetting formats.
            let formats = root.find('.format-dropdown .dropdown-item');
            console.log(formats);
            if (formats.closest('[data-value="csv"]').length) {
                formats.closest('[data-value="csv"]').trigger('click');
            } else {
                formats.closest('[data-value="pdfimage"]').trigger('click');
            }

            // Resetting time selectors.
            $('.date-filters .dropdown .dropdown-item:nth-child(1)').trigger('click')

            // Resetting email selector.
            root.find('[type="checkbox"]').prop("checked", true)
                .each(function(index, element) {
                    $(element).trigger("input");
                });
            root.find(SELECTOR.ID).val(-1);
        });
    }

    /**
     * Send mail to user
     * @param {Object} data Data for email
     * @param {object} _this anchor tag
     * @param {object} root Modal root object
     */
    function sendMailToUser(data, _this, root) {
        var filter = data.filter;
        var cohortid = data.cohortid;
        var block = data.block;
        var errorBox = root.find(".esr-form-error");
        errorBox.html('').show();
        common.loader.show(root.closest('.modal'), 'position-fixed');

        $.ajax({
            url: M.cfg.wwwroot + "/local/edwiserreports/download.php?type=email&filter=" +
                filter + "&cohortid=" + cohortid + "&block=" + block,
            type: "POST",
            data: root.find('form').serialize()
        }).done(function(response) {
            response = $.parseJSON(response);
            if (response.error) {
                errorBox.html('<div class="alert alert-danger"><b>ERROR:</b>' + response.errormsg + '</div>');
            } else {
                errorBox.html('<div class="alert alert-success"><b>Success:</b>' + response.errormsg + '</div>');
            }
        }).fail(function(response) {
            errorBox.html('<div class="alert alert-danger"><b>ERROR:</b>' + response.errormsg + '</div>');
        }).always(function() {
            errorBox.delay(3000).fadeOut('slow');
            common.loader.hide(root.closest('.modal'));
        });
    }

    /**
     * Validate comma separated emails.
     * @param {String} emails Comma separated emails
     * @param {Boolean} highlight Highlight error if email is invalid
     * @return {Boolean}
     */
    function validateEmails(emails, highlight = true) {
        var valid = true;
        var domElement = $(SELECTOR.RECEPIENT).get(0);
        var duplicates = [],
            duplicate;
        emails.replaceAll(' ', '').replaceAll(';', ',').split(',')
            .forEach(email => {
                if (duplicates[email] != undefined) {
                    duplicate = true;
                }
                duplicates[email] = true;
                valid = valid && emailRegex.test(email);
            });
        if (duplicate) {
            if (highlight) {
                domElement.setCustomValidity('Invalid email');
                $(domElement).next().text(M.util.get_string('duplicateemail', 'local_edwiserreports'));
            }
            return false;
        }
        if (!valid) {
            if (emails == '') {
                domElement.setCustomValidity('');
                $(domElement).next().text('');
            } else if (highlight) {
                domElement.setCustomValidity('Invalid email');
                $(domElement).next().text(M.util.get_string('invalidemail', 'local_edwiserreports'));
            }
            return false;
        }
        if (highlight) {
            domElement.setCustomValidity('');
        }
        return true;
    }

    /**
     * Initialize email functionality.
     */
    function init() {
        // Validating email field of schedule email form.
        $(document).on('input', SELECTOR.RECEPIENT, function() {
            validateEmails($(this).val());
        });

        // Validating schedule email form fields.
        $(document).on('input', `${SELECTOR.NAME}, ${SELECTOR.RECEPIENT}, ${SELECTOR.SUBJECT}`, function() {
            var name = $(SELECTOR.NAME).val() == "";
            var recepient = !validateEmails($(SELECTOR.RECEPIENT).val(), false);
            var subject = $(SELECTOR.SUBJECT).val() == "";
            var invalid = name || recepient || subject;
            $(this).closest('.fitem').addClass('was-validated');
            $(formRoot).find(`${SELECTOR.SAVE}, ${SELECTOR.SEND}`).prop('disabled', invalid);
            $(formRoot + ' .form-group.fitem').toggleClass('disabled', invalid);
        });

        // Highlight invalid input.
        $(document).on('blur', `${SELECTOR.NAME}, ${SELECTOR.RECEPIENT}, ${SELECTOR.SUBJECT}`, function() {
            $(this).closest('.fitem').addClass('was-validated');
        });

        /**
         * Schedule emails to send reports.
         */
        $(document).on("click", SELECTOR.SCHEDULEDEMAILDROPDOWN, function() {
            var data = v.getScheduledEmailFormContext();
            data.graphical = $(this).is('[data-type="graphical"]');
            var form = $(this).closest('form');
            var formData = form.serializeArray();
            $(formData).each(function($k, $d) {
                data[$d.name] = $d.value;
            });

            var modalTitle = M.util.get_string('scheduleemailfor', 'local_edwiserreports');
            if (data.block.includes("customreportsblock")) {
                modalTitle += ' ' + $('#' + data.block).data('blockname');
            } else {
                modalTitle += ' ' + M.util.get_string(data.block + 'exportheader', 'local_edwiserreports');
            }

            ModalFactory.create({
                    title: modalTitle,
                    body: Fragment.loadFragment(
                        'local_edwiserreports',
                        'email_schedule_tabs',
                        1, {
                            data: JSON.stringify(data)
                        }
                    )
                })
                .done(function(modal) {
                    var root = modal.getRoot();
                    root.find('.modal-header').addClass('border-bottom-0');
                    root.find('.modal-title').addClass('h4 font-weight-600');
                    modal.modal.addClass("modal-lg");

                    root.on(ModalEvents.bodyRendered, function() {
                        root.find(SELECTOR.BLOCKNAME).val(data.blockname);
                        root.find(SELECTOR.REGION).val(data.region);
                        root.find('[name="sesskey"]').val(data.sesskey);
                        emailListTable = renderAllScheduledEmails(data, modal);
                    });

                    root.on(ModalEvents.hidden, function() {
                        modal.destroy();
                    });

                    emailScheduleFormInit(data, root, modal);
                    emailListInit(data, root, modal);
                    modal.show();
                });
        });

        // Search in table.
        $(document).on('input', SELECTOR.LISTSEARCH, function() {
            emailListTable.search(this.value).draw();
        });
    }
    return {
        init: init
    }
});
