<?php
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
 * @category    admin
 * @copyright   2019 wisdmlabs <support@wisdmlabs.com>
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace local_edwiserreports\task;

defined('MOODLE_INTERNAL') || die;

require_once($CFG->dirroot."/local/edwiserreports/classes/export.php");

use core_user;
use Exception;
use stdClass;
use local_edwiserreports\export;

defined('MOODLE_INTERNAL') || die();

/**
 * Scheduled Task to Update Report Plugin Table.
 */
class send_scheduled_emails extends \core\task\scheduled_task {

    /**
     * Can run cron task.
     *
     * @return boolean
     */
    public function can_run(): bool {
        return true;
    }

    /**
     * Return the task's name as shown in admin screens.
     *
     * @return string
     */
    public function get_name() {
        return get_string('sendscheduledemails', 'local_edwiserreports');
    }

    /**
     * Execute the task.
     */
    public function execute() {
        global $DB;

        $timenow = time();

        // Get data from table.
        $table = "edwreports_schedemails";
        $records = $DB->get_records($table);
        mtrace(get_string('sendingscheduledemails', 'local_edwiserreports'));
        foreach ($records as $key => $record) {

            // Removing orphaned records.
            if ($record->component == 'block' && stripos($record->blockname, 'customreportsblock') === false) {
                if (!$DB->get_record_sql(
                    "SELECT *
                       FROM {edwreports_blocks}
                      WHERE " .
                      $DB->sql_compare_text('classname') . ' = ' . $DB->sql_compare_text(':blockname'),
                      array('blockname' => $record->blockname))) {
                    mtrace("--------------------------------------------------------------------------------");
                    mtrace("Invalid block " . $record->blockname .". Removing the record.");
                    $DB->delete_records($table, array('id' => $key));
                    continue;
                }
            }

            // Skip if customcert plugin is not installed.
            if ($record->blockname == 'certificatesblock') {
                if (!array_key_exists("customcert", \core_plugin_manager::instance()->get_installed_plugins('mod'))) {
                    mtrace("--------------------------------------------------------------------------------");
                    mtrace('Custom Certificates plugin is not installed.');
                    continue;
                }
            }

            $blockname = $record->blockname;

            // Get block name.
            if ($record->blockname == 'completionblock') {
                $taskname = get_string(
                    str_replace('block', '', $record->blockname) . 'header',
                    'local_edwiserreports',
                    ['coursename' => '']
                );
            } else if (stripos($record->blockname, 'customreportsblock') === false) {
                $taskname = get_string(str_replace('block', '', $record->blockname) . 'header', 'local_edwiserreports');
            } else {
                $taskname = get_string('customreport', 'local_edwiserreports');
            }

            // If it dosent have email data.
            $emaildata = json_decode($record->emaildata);

            if (!$emaildata) {
                mtrace("--------------------------------------------------------------------------------");
                mtrace("Email data is invalid for: " . $blockname .". Please reschedule the email.");
                continue;
            }

            // If dta is not an array.
            if (!is_array($emaildata)) {
                mtrace("--------------------------------------------------------------------------------");
                mtrace("Email data is invalid for: " . $blockname .". Please reschedule the email.");
                continue;
            }

            // If empty then continue.
            if (empty($emaildata)) {
                mtrace("--------------------------------------------------------------------------------");
                mtrace("Email data is invalid for: " . $blockname .". Please reschedule the email.");
                continue;
            }

            foreach ($emaildata as $k => $email) {
                $filter = $email->reportparams->filter;
                $region = $email->reportparams->region;

                mtrace("--------------------------------------------------------------------------------");

                if ($record->blockname == 'completionblock') {
                    $coursename = '';
                    $decfilter = json_decode($filter);
                    if ($course = $DB->get_record('course', array('id' => $decfilter->course))) {
                        $coursename = format_string($course->fullname, true, ['context' => \context_system::instance()]);
                    }
                    $taskname = get_string(
                        str_replace('block', '', $record->blockname) . 'header',
                        'local_edwiserreports',
                        ['coursename' => $coursename]
                    );
                }
                mtrace("Task\t: ". $taskname ."");
                mtrace("Name\t: ".$email->esrname);

                // Not scheduled for this time.
                if ($timenow < $email->esrnextrun) {
                    mtrace("Scheduled to run at: " . date('Y-m-d H:i:s', $email->esrnextrun));
                    continue;
                }

                // Disabled.
                if (!$email->esremailenable) {
                    mtrace("Is Disabled");
                    continue;
                }

                // If reports parameters are not set.
                if (!isset($email->reportparams)) {
                    mtrace("No reports param");
                    continue;
                }

                $export = new export("email", $region, $blockname);

                $filterdata = isset($email->esrfilterdata) ? $email->esrfilterdata : true;

                // Get filename.
                $filename = local_edwiserreports_prepare_export_filename([
                    "region" => $region,
                    "blockname" => $blockname,
                    "date" => date("d_M_y", time()),
                    'filter' => $filter
                ]);

                try {
                    list($filename, $data) = $export->get_exportable_data($filter, $filename, $filterdata);

                    if ($filterdata) {
                        // Filename.
                        $filename .= $export->data_export_file_postfix($filter);
                    }

                    $options = null;

                    // If exported data is object.
                    if (gettype($data) == "object") {
                        if (isset($data->options)) {
                            $options = $data->options;
                        }
                        $data = $data->data;
                    }

                    // If data exist then send emails.
                    if ($data) {
                        mtrace(get_string('sending', 'local_edwiserreports') . ' ' . $email->esrname);
                        ob_start();

                        // If email successfully sent.
                        $this->send_sceduled_email($export, $filename, $taskname, $data, $email, $options);

                        $email->esrlastrun = time();

                        $esrduration = $email->esrduration;
                        $esrtime = $email->esrtime;
                        list($frequency, $schedtime) = local_edwiserreports_get_email_schedule_next_run($esrduration, $esrtime);
                        $email->esrnextrun = $schedtime;
                        $emaildata[$k] = $email;
                        ob_clean();
                        mtrace("Email sent successfully");
                    }
                } catch (Exception $ex) {
                    // Catching and Print error to make sure other tasks get executed properly.
                    echo "<pre>";
                    print_r($ex);
                    echo "</pre>";
                }
            }

            $record->emaildata = json_encode($emaildata);
            $DB->update_record($table, $record);
        }
        mtrace("--------------------------------------------------------------------------------");
    }

    /**
     * Send Shcedule Email
     *
     * @param  object $export    Export object
     * @param  string $filename  Filename
     * @param  object $data      Data to export
     * @param  object $emailinfo Email information
     */
    private function send_sceduled_email($export, $filename, $fallbacksubject, $data, $emailinfo, $options) {
        global $USER;

        $blockname = $emailinfo->reportparams->blockname;

        $recuser = $USER;

        // Handling issue with suspended account. This is scheduled email and has to be sent.
        $recuser->suspended = 0;

        $senduser = core_user::get_noreply_user();

        // Get email data from submited form.
        $emailids = trim($emailinfo->esrrecepient);
        $subject = trim($emailinfo->esrsubject);

        // Optional parameter causing issue because this is an array.
        $contenttext = trim($emailinfo->esrmessage);

        // If subject is not set the get default subject.
        if (!$subject && $subject == '') {
            $subject = $fallbacksubject;
        }

        // Get content text to send emails.
        if ($contenttext == '') {
            $contenttext = get_string(
                stripos($blockname, 'customreportsblock') === false ? $blockname . "exporthelp" : 'customreport',
                "local_edwiserreports"
            );
        }

        $contenttext = str_replace("\n", "<br>", $contenttext);

        // Is graphical.
        if (isset($emailinfo->esrgraphical)) {
            $graphical = $emailinfo->esrgraphical == true;
        } else {
            $graphical = $export->is_graphical();
        }

        // Default format.
        $defaultformat = $graphical ? 'pdfimage' : 'csv';

        // Exporting format.
        $format = isset($emailinfo->esrformat) ? $emailinfo->esrformat : $defaultformat;

        if ($graphical) {
            $blockname = $export->blockname;
            $contenttext .= "<br>" . get_string(
                'exportlink',
                'local_edwiserreports',
                $export->graphical_data(str_replace('block', '', $blockname), $format, $filename, $data)
            );
            $filename = '';
            $filepath = '';
        } else {
            switch($format) {
                case 'csv':
                    // Generate csv file.
                    $filename .= ".csv";
                    $filepath = $export->generate_csv_file($filename, $data);
                    break;
                case 'pdf':
                    // Generate pdf file.
                    $filename .= ".pdf";
                    $filepath = $export->generate_pdf_file($filename, $data, $options);
                    break;
                case 'excel':
                    // Generate pdf file.
                    $filename .= ".xlsx";
                    $filepath = $export->generate_excel_file($filename, $data);
                    break;
            }
        }

        // Send emails foreach email ids.
        if ($emailids && $emailids !== '') {
            // Process in background and dont show message in console.
            ob_start();
            $emailids = explode(";", $emailids);
            foreach ($emailids as $emailcommaids) {
                foreach (explode(",", $emailcommaids) as $emailid) {
                    // Trim email id if white spaces are added.
                    $recuser->email = trim($emailid);

                    // Send email to user.
                    email_to_user(
                        $recuser,
                        $senduser,
                        $subject,
                        '',
                        $contenttext,
                        $filepath,
                        $filename
                    );
                }
            }
            ob_end_clean();
        }

        if (!$graphical) {
            // Remove file after email sending process.
            unlink($filepath);
        }
    }
}
