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
namespace local_edwiserreports;

defined('MOODLE_INTERNAL') || die();

require_once($CFG->libdir."/csvlib.class.php");
require_once($CFG->libdir."/excellib.class.php");
require_once($CFG->libdir."/pdflib.php");
require_once($CFG->dirroot."/local/edwiserreports/lib.php");
require_once($CFG->dirroot."/local/edwiserreports/locallib.php");

use MoodleExcelWorkbook;
use csv_export_writer;
use context_user;
use html_writer;
use xmldb_table;
use core_user;
use moodle_url;
use stdClass;

/**
 * Class to export data.
 */
class export {
    /**
     * Export data in this format
     * @var string
     */
    public $format = null;

    /**
     * Region to download reports
     * This may be block or report
     * @var string
     */
    public $region = null;

    /**
     * Action to get data for specific block
     * @var string
     */
    public $blockname = null;

    /**
     * Constructor to create export object
     * @param string $format    Type os export object
     * @param string $region    Region
     * @param string $blockname Name of block
     */
    public function __construct($format, $region, $blockname) {
        $this->format = $format;
        $this->region = $region;
        $this->blockname = $blockname;
    }

    /**
     * Get postfix for filename from block.
     *
     * @param string $filter
     *
     * @return string
     */
    public function data_export_file_postfix($filter) {
        if ($this->region == 'report') {
            return '';
        }
        // Check if class file exist.
        if (strpos($this->blockname, 'customreportsblock') !== false) {
            $params = explode('-', $this->blockname);
            $classname = isset($params[0]) ? $params[0] : '';
            $filter = isset($params[1]) ? $params[1] : '';
        } else {
            $classname = $this->blockname;
        }
        $classname = '\\local_edwiserreports\\blocks\\' . $classname;
        if (!class_exists($classname)) {
            debugging('Class file dosn\'t exist ' . $classname);
        }

        $blockbase = new $classname();
        return $blockbase->get_exportable_data_block_file_postfix($filter);
    }

    /**
     * Export data
     * @param string $filename File name to export data
     * @param array  $data     Data to be export
     * @param array  $options  Options for pdf export
     */
    public function data_export($filename, $data, $options = null) {
        switch($this->format) {
            case "csv":
                $this->data_export_csv($filename, $data);
                break;
            case "excel":
                $this->data_export_excel($filename, $data);
                break;
            case "pdf":
                $this->data_export_pdf($filename, $data, $options);
                break;
            case "email":
                $this->data_export_email($filename, $data, $options);
                break;
            case "emailscheduled":
                $this->data_export_emailscheduled($filename);
                break;
        }
    }

    /**
     * Export data in CSV format
     * @param string $filename File name to export data
     * @param array  $data    Data to be export
     */
    public function data_export_csv($filename, $data) {
        csv_export_writer::download_array($filename, $data);
    }

    /**
     * Data to to print in json ecoded format.
     * @param array  $data    Data to be export
     * @param string $message Message to print out
     * @param bool   $status  Status for output
     */
    public function prepare_output($data, $message, $status) {
        $res = new stdClass();
        $res->status = $status;
        $res->message = $message;
        $res->data = $data;

        // Print Output.
        echo json_encode($res);
    }

    /**
     * Export data in Excel format
     * @param string $filename File name to export data
     * @param array  $data    Data to be export
     */
    public function data_export_excel($filename, $data) {
        // Creating a workbook.
        $workbook = new MoodleExcelWorkbook("-");

        // Adding the worksheet.
        $myxls = $workbook->add_worksheet($this->region . "_" . $this->blockname);

        foreach ($data as $rownum => $row) {
            foreach ($row as $colnum => $val) {
                $myxls->write_string($rownum, $colnum, $val);
            }
        }

        // Sending HTTP headers.
        $workbook->send($filename);
        // Close the workbook.
        $workbook->close();
    }

    /**
     * Export data in Pdf format
     * @param string $filename File name to export data
     * @param array  $data     Data to be export
     * @param array  $options  Options for pdf export
     *                         Supported options
     *                         orientation: p - Portrait
     *                                      l - Landscape
     */
    public function data_export_pdf($filename, $data, $options = null) {
        global $CFG;

        $filename .= '.pdf';

        $orientation = 'p';
        $format = 'A4';
        $content = '';
        if ($options != null) {
            if (isset($options['orientation'])) {
                $orientation = $options['orientation'];
            }
            if (isset($options['format'])) {
                $format = $options['format'];
            }
            if (isset($options['content'])) {
                $content = $options['content'];
            }
        }

        

        // Removing limit.
        raise_memory_limit(MEMORY_HUGE);
        ini_set('memory_limit', '-1');



        // Generate HTML to export.
        ob_start();
        $html = $this->get_html_for_pdf2($data, $content);
        ob_clean();

        

        require_once($CFG->libdir.'/pdflib.php');
        $pdf = new \pdf($orientation, 'pt', $format);
        $pdf->SetPrintHeader(false);
        $pdf->SetPrintFooter(false);
        $pdf->AddPage();
        $pdf->WriteHTML($html, true, false, false, false, '');
        

        $pdf->Output($filename, 'D');


        die;
    }

    /**
     * Genereate csv file to export
     * @param  string $filename Filename
     * @param  array $data Data to render
     * @return string File path
     */
    public function generate_csv_file($filename, $data) {
        global $USER, $CFG;

        $context = context_user::instance($USER->id);
        $fs = get_file_storage();

        // Prepare file record object.
        $fileinfo = array(
            'contextid' => $context->id, // ID of context.
            'component' => 'local_edwiserreports',     // Usually = table name.
            'filearea' => 'downloadreport',     // Usually = table name.
            'itemid' => 0,               // Usually = ID of row in table.
            'filepath' => '/',           // Any path beginning and ending in /.
            'filename' => $filename); // Any filename..

        // Create csv data.
        $csvdata = csv_export_writer::print_array($data, 'comma', '"', true);

        // Get file if already exist.
        $file = $fs->get_file(
            $fileinfo['contextid'],
            $fileinfo['component'],
            $fileinfo['filearea'],
            $fileinfo['itemid'],
            $fileinfo['filepath'],
            $fileinfo['filename']
        );

        // Delete it if it exists.
        if ($file) {
            $file->delete();
        }

        // Create file containing text 'hello world'.
        $file = $fs->create_file_from_string($fileinfo, $csvdata);

        // Copy content to temporary file.
        $filepath = $CFG->tempdir . '/' . $filename;
        $file->copy_content_to($filepath);

        // Delete file when content has been copied.
        if ($file) {
            $file->delete();
        }

        return $filepath;
    }

    /**
     * Generate pdf file for email
     *
     * @param string $filename Filename
     * @param array  $data     Data for file
     *
     * @return string File path
     */
    public function generate_pdf_file($filename, $data, $options) {
        global $CFG;

        $orientation = 'p';
        $format = 'A4';
        $content = '';
        if ($options != null) {
            if (isset($options['orientation'])) {
                $orientation = $options['orientation'];
            }
            if (isset($options['format'])) {
                $format = $options['format'];
            }
            if (isset($options['content'])) {
                $content = $options['content'];
            }
        }

        $filepath = make_temp_directory('edwiserreports/export/' . random_string(5)) . '/' . $filename;

        // Generate HTML to export.
        ob_start();
        $html = $this->get_html_for_pdf2($data, $content);
        ob_clean();

        require_once($CFG->libdir.'/pdflib.php');
        $pdf = new \pdf($orientation, 'pt', $format);
        $pdf->SetPrintHeader(false);
        $pdf->SetPrintFooter(false);
        $pdf->AddPage();
        $pdf->WriteHTML($html, true, false, false, false, '');
        $pdf->Output($filepath, 'F');

        return $filepath;
    }

    /**
     * Export data in Excel format
     * @param string $filename File name to export data
     * @param array  $data    Data to be export
     */
    public function generate_excel_file($filename, $data) {
        global $CFG;

        require_once($CFG->dirroot . '/lib/filelib.php');

        $curl = new \curl();

        $content = $curl->post(
            $CFG->wwwroot . '/local/edwiserreports/arraytoxlsx.php',
            array(
                'filename' => $filename,
                'data' => json_encode($data)
            )
        );

        $filepath = make_temp_directory('edwiserreports/export/' . random_string(5)) . '/' . $filename;

        file_put_contents($filepath, $content);

        return $filepath;
    }

    /**
     * Store graphical data and return link to view graph.
     *
     * @param string $blockname Block name
     * @param string $format    Exporting format type
     * @param string $filename  File name for exported data
     * @param array  $data      Exported data
     *
     * @return string Link to download graph with stored data.
     */
    public function graphical_data($blockname, $format, $filename, $data) {
        global $DB;

        // Generate unique download key.
        $col = $DB->sql_compare_text('download');
        $val = $DB->sql_compare_text(':download');
        $sql = "SELECT id FROM {edwreports_graph_data} WHERE $col = $val";
        do {
            $download = random_string(10);
        } while ($DB->get_record_sql($sql, array('download' => $download)));

        $DB->insert_record('edwreports_graph_data', [
            'timecreated' => time(),
            'blockname' => $blockname,
            'download' => $download,
            'format' => $format,
            'filename' => $filename,
            'data' => json_encode($data)
        ]);
        return html_writer::link(
            new moodle_url('/local/edwiserreports/graph.php', [
                'download' => $download,
                'format' => $format
            ]),
            get_string('link', 'local_edwiserreports'),
            ['target' => '_blank']
        );
    }

    /**
     * Export data email to user
     * @param  string $filename File name to export data
     * @param  array  $data     Data to be export
     */
    public function data_export_email($filename, $data, $options) {
        global $USER;
        $recuser = $USER;
        $senduser = core_user::get_noreply_user();

        $graphical = optional_param('esrgraphical', false, PARAM_BOOL);

        // Get email data from submited form.
        $emailids = trim(optional_param("esrrecepient", false, PARAM_TEXT));
        $subject = trim(optional_param("esrsubject", false, PARAM_TEXT));

        // Optional parameter causing issue because this is an array.
        $contenttext = optional_param('esrmessage', '', PARAM_RAW);
        $contenttext = str_replace("\n", "<br>", $contenttext);

        // If subject is not set the get default subject.
        if (!$subject && $subject == '') {
            $subject = get_string($this->blockname . "exportheader", "local_edwiserreports");
        }

        // Exporting format.
        $format = required_param('esrformat', PARAM_TEXT);

        if ($graphical) {
            $contenttext .= "<br>" . get_string(
                'exportlink',
                'local_edwiserreports',
                $this->graphical_data(str_replace('block', '', $this->blockname), $format, $filename, $data)
            );
            $filename = '';
            $filepath = '';
        } else {
            switch($format) {
                case 'csv':
                    // Generate csv file.
                    $filename .= ".csv";
                    $filepath = $this->generate_csv_file($filename, $data);
                    break;
                case 'pdf':
                    // Generate pdf file.
                    $filename .= ".pdf";
                    $filepath = $this->generate_pdf_file($filename, $data, $options);
                    break;
                case 'excel':
                    // Generate pdf file.
                    $filename .= ".xlsx";
                    $filepath = $this->generate_excel_file($filename, $data);
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

            // If failed then return error.
            $res = new stdClass();
            $res->error = false;
            $res->errormsg = get_string('emailsent', 'local_edwiserreports');
            echo json_encode($res);
        } else {
            // If failed then return error.
            $res = new stdClass();
            $res->error = true;
            $res->errormsg = get_string('emailnotsent', 'local_edwiserreports');
            echo json_encode($res);
        }

        if (!$graphical) {
            // Remove file after email sending process.
            unlink($filepath);
        }
    }

    /**
     * Save data scheduled email for users
     * @param string $filename file name to export data
     */
    public function data_export_emailscheduled($filename) {
        global $DB;
        $response = new stdClass();
        $response->error = false;

        $data = new stdClass();
        $data->blockname = $this->blockname;
        $data->component = $this->region;

        $table = "edwreports_schedemails";
        $blockcompare = $DB->sql_compare_text('blockname');
        $componentcompare = $DB->sql_compare_text('component');
        $sql = "SELECT id, emaildata FROM {edwreports_schedemails}
            WHERE $blockcompare LIKE :blockname
            AND $componentcompare LIKE :component";
        if ($rec = $DB->get_record_sql($sql, (array)$data)) {
            $data->id = $rec->id;
            list($id, $data->emaildata) = $this->get_email_data($rec->emaildata);
            $DB->update_record($table, $data);
        } else {
            list($id, $data->emaildata) = $this->get_email_data();
            $DB->insert_record($table, $data);
        }

        // Return data in json format.
        echo json_encode($response);
    }

    /**
     * Get scheduled email data
     * @param  string $emaildata Encoded email data
     * @return array             Decoded email data
     */
    private function get_email_data($emaildata = false) {
        // Generate default email information array.
        $graphical = optional_param('esrgraphical', false, PARAM_BOOL);
        $defaultformat = $graphical ? 'pdfimage' : 'csv';
        $emailinfo = array(
            'esrname' => required_param("esrname", PARAM_TEXT),
            'esrgraphical' => $graphical,
            'esrformat' => optional_param('esrformat', $defaultformat, PARAM_TEXT),
            'esrfilterdata' => optional_param('esrfilterdata', false, PARAM_BOOL),
            'esremailenable' => optional_param("esremailenable", false, PARAM_TEXT),
            'esrrecepient' => required_param("esrrecepient", PARAM_TEXT),
            'esrsubject' => optional_param("esrsubject", '', PARAM_TEXT),
            'esrmessage' => optional_param("esrmessage", '', PARAM_TEXT),
            'esrduration' => optional_param("esrduration", 0, PARAM_TEXT),
            'esrtime' => optional_param("esrtime", 0, PARAM_TEXT),
            'esrlastrun' => false,
            'esrnextrun' => false,
            'reportparams' => array(
                'filter' => optional_param("filter", false, PARAM_TEXT),
                'blockname' => $this->blockname,
                'region' => optional_param("region", false, PARAM_TEXT)
            )
        );

        // Calculate Next Run.
        list($fequency, $nextrun) = local_edwiserreports_get_email_schedule_next_run(
            $emailinfo["esrduration"],
            $emailinfo["esrtime"]
        );

        $emailinfo["esrnextrun"] = $nextrun;
        $emailinfo["esrfrequency"] = $fequency;

        // Get previous data and update.
        if (!$emaildata = json_decode($emaildata)) {
            $emaildata = array($emailinfo);
        } else if (is_array($emaildata)) {
            $esrid = optional_param("esrid", false, PARAM_INT);
            if ($esrid < 0) {
                $emaildata[] = $emailinfo;
            } else {
                $emaildata[$esrid] = $emailinfo;
            }
        }

        // Return array if of data and encoded email data.
        return array((count($emaildata) - 1), json_encode($emaildata));
    }

    /**
     * Get HTML Content to export
     * @param  array  $data     Array of exportable Data
     * @param  string $content  Additional content to show on pdf file.
     * @return string           HTML String
     */
    public function get_html_for_pdf2($data, $content) {
        global $DB;

        // RTL format
        $filter = optional_param("filter", 0, PARAM_RAW);
        $filter = json_decode($filter);
        $rtl = isset($filter->dir) && $filter->dir == 'rtl' ? 1 : 0;
        
        $headerrow = array_shift($data);
        if (strpos($this->blockname, 'customreportsblock') !== false) {
            $params = explode('-', $this->blockname);
            $filter = isset($params[1]) ? $params[1] : '';
            $header = get_string('customreport', 'local_edwiserreports');
            if ($field = $DB->get_field('edwreports_custom_reports', 'fullname', array('id' => $filter))) {
                $header .= ' - ' . $field;
            }
            if (count($headerrow) > 10) {
                $help = get_string('customreportexportpdfnote', 'local_edwiserreports');
            } else {
                $help = '';
            }
        } else {
            $header = get_string($this->blockname . "exportheader", "local_edwiserreports");
            $help = get_string($this->blockname . "exporthelp", "local_edwiserreports");
        }

        // Adding additional content with help.
        if (!empty($content)) {
            $help .= '<br><br>' . $content;
        }

        // Generate HTML to export.
        $html = html_writer::tag("h1",
            $header,
            array(
                "style" => "width:100%; text-align:center;"
            )
        );

        $htmlhelp = html_writer::tag("p",
            $help
        );

        if($rtl){
            $htmlhelp = html_writer::tag("p",
                $help,
                array(
                    "style" => "direction:rtl; text-align:right;"
                )
            );
        }

        $html .= $htmlhelp;
        $html .= '<table style="font-size: 11px;" border="1px" cellpadding="3">';

        $html .= '<tr nobr="true">';
        foreach ($headerrow as $cell) {
            $html .= '<th bgcolor="#ddd" style="font-weight: bold">' . $cell . '</th>';
        }
        $html .= '</tr>';
        foreach ($data as $row) {
            $html .= '<tr nobr="true">';
            foreach ($row as $cell) {
                $html .= '<td>' . $cell . '</td>';
            }
            $html .= '</tr>';
        }

        $html .= '</table>';
        $html = str_replace("\n", "", $html);
        return $html;
    }

    /**
     * Check if current block is graphical block.
     * Created mainly for send_scheduled_emails task.
     *
     * @return boolean
     */
    public function is_graphical() {
        if ($this->region == 'report') {
            return false;
        }

        // Check if class file exist.
        if (strpos($this->blockname, 'customreportsblock') !== false) {
            return false;
        }

        $classname = '\\local_edwiserreports\\blocks\\' . $this->blockname;
        if (!class_exists($classname)) {
            return false;
        }

        $block = new $classname();

        return $block->is_graphical();
    }

    /**
     * Get exportable data to export
     * @param  array  $filter     Filter parameter
     * @param  string $filename   File name
     * @param  bool   $filterdata If enabled then filter data
     * @return array|object             Return array for table. Return object for table and options for pdf only.
     */
    public function get_exportable_data($filter, $filename, $filterdata = true) {
        $export = null;

        switch ($this->region) {
            case "block":
                $export = $this->exportable_data_block($this->blockname, $filter, $filterdata);
                break;
            case "report":
                $export = $this->exportable_data_report($this->blockname, $filter, $filterdata);
                break;
        }

        if ($filterdata == false) {
            $filename = $this->region . '_' . $this->blockname . '_unfiltered';
        }

        return [$filename, $export];
    }

    /**
     * Get exportable data for dashboard block
     * @param  string $blockname  Block to get exportable data
     * @param  string $filter     Filter to get data
     * @param  bool   $filterdata If enabled then filter data
     * @return array              Array of exportable data
     */
    private function exportable_data_block($blockname, $filter, $filterdata) {

        // Check if class file exist.
        if (strpos($blockname, 'customreportsblock') !== false) {
            $params = explode('-', $blockname);
            $classname = isset($params[0]) ? $params[0] : '';
            $filter = isset($params[1]) ? $params[1] : '';
        } else {
            $classname = $blockname;
        }

        $classname = '\\local_edwiserreports\\blocks\\' . $classname;
        if (!class_exists($classname)) {
            debugging('Class file dosn\'t exist ' . $classname);
        }

        $block = new $classname();

        return $block->get_exportable_data_block($filter, $filterdata);
    }

    /**
     * Get exportable data for individual page
     * @param  string $name       Name of report to get exportable data
     * @param  string $filter     Filter to get data
     * @param  bool   $filterdata If enabled then filter data.
     * @return array              Array of exportable data
     */
    private function exportable_data_report($name, $filter, $filterdata = true) {
        switch ($name) {
            case "activeusersblock":
                return \local_edwiserreports\blocks\activeusersblock::get_exportable_data_report($filter, $filterdata);
            case "allcoursessummary":
                return \local_edwiserreports\reports\allcoursessummary::get_exportable_data_report($filter, $filterdata);
            case "certificatesblock":
                return \local_edwiserreports\blocks\certificatesblock::get_exportable_data_report($filter, $filterdata);
            case "completionblock":
                return \local_edwiserreports\blocks\completionblock::get_exportable_data_report($filter, $filterdata);
            case "studentengagement":
                return \local_edwiserreports\blocks\studentengagement::get_exportable_data_report($filter, $filterdata);
            case 'courseactivitiessummary':
                return \local_edwiserreports\reports\courseactivitiessummary::get_exportable_data_report($filter, $filterdata);
            case 'learnercourseprogress':
                return \local_edwiserreports\reports\learnercourseprogress::get_exportable_data_report($filter, $filterdata);
            case 'learnercourseactivities':
                return \local_edwiserreports\reports\learnercourseactivities::get_exportable_data_report($filter, $filterdata);
            case 'courseactivitycompletion':
                return \local_edwiserreports\reports\courseactivitycompletion::get_exportable_data_report($filter, $filterdata);
            default:
                return null;
        }
    }

    /**
     * Temporary table for lp and courses relation
     * @param  string $tablename table name
     * @param  string $lpdb      learning programs join query
     * @param  array  $params    params for learning programs join query
     * @return bool              true
     */
    public function create_temp_table($tablename, $lpdb, $params) {
        global $DB;
        $dbman = $DB->get_manager();

        // Create table schema.
        $table = new xmldb_table($tablename);
        $table->add_field('id', XMLDB_TYPE_INTEGER, 10, null, XMLDB_NOTNULL, XMLDB_SEQUENCE);
        $table->add_field('lpid', XMLDB_TYPE_INTEGER, 10, null, null, false);
        $table->add_field('courseid', XMLDB_TYPE_INTEGER, 10, null, null, false);
        $table->add_key('id', XMLDB_KEY_PRIMARY, array('id'));

        if ($dbman->table_exists($tablename)) {
            $dbman->drop_table($table);
        }

        $dbman->create_temp_table($table);
        // Get courses from selected lps.
        $sql = "SELECT id, courses FROM {wdm_learning_program} WHERE id ".$lpdb;
        $records = $DB->get_records_sql($sql, (array) $params);
        $temparray = array();
        // Iterate and add new entry in table for each course with respect to lp.
        array_map(function($value) use (&$temparray) {
            if ($value->courses != null) {
                $courseids = json_decode($value->courses);
                foreach ($courseids as $id) {
                    array_push($temparray, array("lpid" => $value->id, "courseid" => $id));
                }
            }
        }, $records);

        $DB->insert_records($tablename, $temparray);
        return true;
    }

    /**
     * Delete temporary created table
     * @param string $tablename Table name
     */
    public function drop_table($tablename) {
        global $DB;

        $dbman = $DB->get_manager();

        $table = new \xmldb_table($tablename);

        if ($dbman->table_exists($tablename)) {
            $dbman->drop_table($table);
        }
    }
}
