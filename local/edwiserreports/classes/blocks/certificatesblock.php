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

namespace local_edwiserreports\blocks;

defined('MOODLE_INTERNAL') || die();

use local_edwiserreports\block_base;
use local_edwiserreports\utility;
use context_module;
use context_system;
use context_course;
use html_writer;
use moodle_url;
use core_user;
use stdClass;
use cache;

require_once($CFG->dirroot.'/grade/report/grader/lib.php');

/**
 * Class Certifictes Block. To get the data for certificates.
 */
class certificatesblock extends block_base {

    /**
     * Initialize the block.
     */
    public function __construct() {
        parent::__construct();
        $this->cache = cache::make('local_edwiserreports', 'certificates');
    }

    /**
     * Preapre layout for each block
     * @return object Layout object
     */
    public function get_layout() {
        global $CFG;

        if (!local_edwiserreports_has_plugin("mod", "customcert")) {
            return false;
        }

        // Layout related data.
        $this->layout->id = 'certificatesblock';
        $this->layout->name = get_string('certificatestatsheader', 'local_edwiserreports');
        $this->layout->info = get_string('certificatestatsblockhelp', 'local_edwiserreports');
        $this->layout->morelink = new moodle_url($CFG->wwwroot . "/local/edwiserreports/certificates.php");
        $this->layout->downloadlinks = $this->get_block_download_options();
        $this->layout->filters = $this->get_filters();

        // Block related data.
        $this->block->displaytype = 'line-chart';

        // Add block view in layout.
        $this->layout->blockview = $this->render_block('certificatestatsblock', $this->block);

        // Set block edit capabilities.
        $this->set_block_edit_capabilities($this->layout->id);

        // Return blocks layout.
        return $this->layout;
    }

    /**
     * Prepare Inactive users filter
     * @return string Filter HTML content
     */
    public function get_filters() {
        global $OUTPUT;
        return $OUTPUT->render_from_template('local_edwiserreports/blocks/certificatesblockfilters', [
            'cohort' => $this->get_cohorts(),
            'searchicon' => $this->image_icon('actions/search'),
            'placeholder' => get_string('searchcertificates', 'local_edwiserreports')
        ]);
    }

    /**
     * Get data for certificates block
     * @param  object $params Parameters
     * @return object         Response object for Certificates Block
     */
    public function get_data($params = false) {
        $cohort = $params->cohort;

        $response = new stdClass();
        $response->data = new stdClass();
        // Get response from cache.
        if (!$response = $this->cache->get('response-' . $cohort)) {
            $response = new stdClass();
            if (isset($params->certificateid)) {
                $response->data = $this->get_issued_users($params->certificateid, $cohort)->data;
            } else {
                $response->data = $this->get_certificate_list($cohort);
            }
            // Set cache for certificate response.
            $this->cache->set('response', $response);
        }

        return $response;
    }

    /**
     * Get all certificates list with details for certificates block
     * @param  int   $cohort Cohort id
     * @return array         Array of Certifcates
     */
    public function get_certificate_list($cohort) {
        global $DB;

        $cohortjoin = '';
        if ($cohort) {
            $cohortjoin = 'JOIN {cohort_members} cm ON cm.userid = ci.userid AND cm.cohortid = :cohortid
                        JOIN {cohort} c ON c.id = cm.cohortid AND c.visible = 1';
        }

        $courses = $this->get_courses_of_user();
        // Temporary course table.
        $coursetable = utility::create_temp_table('tmp_c_c', array_keys($courses));

        $certificates = array();
        $customcert = $DB->get_records_sql(
            "SELECT c.*
            FROM {customcert} c
            JOIN {{$coursetable}} ct ON c.course = ct.tempid"
        );

        utility::drop_temp_table($coursetable);

        $sqlcm = "SELECT cm.id FROM {course_modules} cm
                    JOIN {modules} m ON m.id = cm.module
                   WHERE cm.course = :course
                     AND cm.instance = :certificate
                     AND m.name = :name";
        foreach ($customcert as $certificate) {
            $course = get_course($certificate->course);
            $cm = $DB->get_record_sql($sqlcm, array(
                'course' => $certificate->course,
                'certificate' => $certificate->id,
                'name' => 'customcert'
            ), IGNORE_MULTIPLE);

            $modulecontext = context_module::instance($cm->id);
            // Get only enrolled students.
            $enrolledusers = \local_edwiserreports\utility::get_enrolled_students($certificate->course, $modulecontext, $cohort);

            $sql = "SELECT ci.*
                      FROM {customcert_issues} ci
                      $cohortjoin
                     WHERE ci.customcertid = :customcertid";
            $params['customcertid'] = $certificate->id;

            // Cohort params.
            if ($cohort) {
                $params["cohortid"] = $cohort;
            }

            $issued = $DB->get_records_sql($sql, $params);
            // Number of perople who can view certificates.
            $notawareded = 0;
            foreach ($enrolledusers as $user) {
                $canmanage = has_capability('mod/customcert:manage', $modulecontext, $user);
                // These people can manage the certificates.
                if ($canmanage) {
                    continue;
                }
                // These people can only view the certificates.
                $awarded = false;
                foreach ($issued as $issue) {
                    if ($issue->userid === $user->id) {
                        $awarded = true;
                    }
                }

                if (!$awarded) {
                    $notawareded++;
                }
            }

            $certificates[] = array(
                "id" => $certificate->id,
                "name" => format_string($certificate->name, true, ['context' => \context_system::instance()]),
                "coursename" => format_string($course->fullname, true, ['context' => \context_course::instance($course->id)]),
                "issued" => count($issued),
                "notissued" => $notawareded
            );
        }

        return $certificates;
    }

    /**
     * Get a certificates details for certificate page
     * @param  int    $certid   Certificate id
     * @param  int    $cohortid Cohort id
     * @param  int    $table    If data is not to be exported and will be shown in browser table
     * @return object           Certifcates details object
     */
    public function get_issued_users($certid, $cohortid = false, $table = 1) {
        global $DB;

        $cachekey = "certificates-userslist-" . $certid . "-" . $cohortid;

        $response = new stdClass();
        // Get certificates details from cache.
        if (!$issuedcert = $this->cache->get($cachekey)) {
            $certificate = $DB->get_record("customcert", array("id" => $certid));
            $course = get_course($certificate->course);

            $params = [
                'customcertid' => $certid
            ];

            // Cohort sql.
            $cohortjoin = '';
            if ($cohortid) {
                $cohortjoin = 'JOIN {cohort_members} cm ON cm.userid = ci.userid AND cm.cohortid = :cohortid
                            JOIN {cohort} c ON c.id = cm.cohortid AND c.visible = 1';
                $params['cohortid'] = $cohortid;
            }
            $sql = "SELECT ci.*
                      FROM {customcert_issues} ci
                      $cohortjoin
                     WHERE ci.customcertid = :customcertid";

            $issued = $DB->get_recordset_sql($sql, $params);
            $issuedcert = array();

            foreach ($issued as $issue) {
                $issuedcert[] = $this->get_certinfo($course, $issue, $table);
            }

            // Set cache for issued certificates.
            $this->cache->set($cachekey, $issuedcert);
        }
        $response->data = $issuedcert;

        return $response;
    }

    /**
     * Get Certificate Information
     * @param  object $course stdClass object of course
     * @param  object $issue  stdClass object of issued certificates
     * @return object         Certificate information
     */
    public function get_certinfo($course, $issue, $table) {
        global $DB;
        $data = optional_param("data", 0, PARAM_RAW);
        $data = json_decode($data);
        $filter = isset($data->filter) ? $data->filter : array();

        // $filter = json_decode($filter);
        // $rtl = $rtl ? $rtl : (isset($filter->dir) && $filter->dir == 'rtl' ? 1 : 0);
        $rtl = get_string('thisdirection', 'langconfig') == 'rtl' ? 1 : 0;

        $enrolsql = "SELECT ue.id, ue.timemodified
            FROM {user_enrolments} ue
            JOIN {enrol} e ON (e.id = ue.enrolid AND e.courseid = :courseid)
            JOIN {user} u ON u.id = ue.userid
            WHERE ue.userid = :userid AND u.deleted = 0";

        $certinfo = array();
        $user = core_user::get_user($issue->userid);

        $params = array('courseid' => $course->id, 'userid' => $issue->userid);
        $gradeval = 0;
        $grade = \local_edwiserreports\utility::get_grades($course->id, $issue->userid);
        if ($grade) {
            $gradeval = round($grade->finalgrade / $grade->grademax * 100, 2);
        }

        $enrolment = $DB->get_record_sql($enrolsql, $params, IGNORE_MULTIPLE);
        $enrolmentdate = get_string("notenrolled", "local_edwiserreports");
        $progressper = 0;
        if ($enrolment) {
            $enrolmentdate = $rtl ? '<div style="direction:ltr;">' . date("y M d", $enrolment->timemodified) . '</div>' : date("d M y", $enrolment->timemodified);
            if(!$table){
                $enrolmentdate = $rtl ? date("y M d", $enrolment->timemodified) : date("d M y", $enrolment->timemodified);
            }
            
            $completion = \local_edwiserreports\utility::get_course_completion_info($course, $user->id);

            if (isset($completion["progresspercentage"])) {
                $progressper = $completion["progresspercentage"];
            }
        }

        /* Pie Progress for Course Progress */
        $courseprogresshtml = html_writer::div(
            html_writer::span(
                $progressper . "%",
                "pie-progress-number font-size-14"
            ),
            "pie-progress pie-progress-sm",
            array(
                "data-plugin" => "pieProgress",
                "role" => "progressbar",
                "data-goal" => "$progressper",
                "aria-valuenow" => "$progressper",
                "data-barcolor" => "#28c0de",
                "aria-valuemin" => "0",
                "aria-valuemax" => "100",
                "data-barsize" => "2",
                "data-size" => "60",
            )
        );

        /* Certificates Object */
        $certinfo = new stdClass();
        $certinfo->username = fullname($user);
        $certinfo->email = $user->email;
        $certinfo->issuedate = $rtl ? '<div style="direction:ltr;">' . date("y M d", $issue->timecreated) . '</div>' : date("d M y", $issue->timecreated);
        
        if(!$table){
            $certinfo->issuedate = $rtl ? date("y M d", $issue->timecreated) : date("d M y", $issue->timecreated);
        }

        $certinfo->dateenrolled = $enrolmentdate;
        $certinfo->grade = $gradeval . '%';
        $certinfo->courseprogress = $courseprogresshtml;
        return $certinfo;
    }

    /**
     * Get headers for certificates block
     * @return [array] Array of headers of certificates block
     */
    public static function get_headers() {
        $headers = array(
            get_string("name", "local_edwiserreports"),
            get_string("coursename", "local_edwiserreports"),
            get_string("issued", "local_edwiserreports"),
            get_string("notissued", "local_edwiserreports")
        );
        return $headers;
    }

    /**
     * Get headers for certificates block
     * @return [array] Array of headers of certificates block
     */
    public static function get_headers_report() {
        $headers = array(
            get_string("username", "local_edwiserreports"),
            get_string("useremail", "local_edwiserreports"),
            get_string("dateofissue", "local_edwiserreports"),
            get_string("dateofenrol", "local_edwiserreports"),
            get_string("grade", "local_edwiserreports"),
            get_string("courseprogress", "local_edwiserreports")
        );
        return $headers;
    }

    /**
     * Get exportable data for certificatesblock
     * @param  string $filter     Filter to apply on data
     * @param  bool   $filterdata If enabled then filter data
     * @return array              Array certificates information
     */
    public static function get_exportable_data_block($filter, $filterdata = true) {
        $filter = json_decode($filter);
        // $rtl = isset($filter->dir) && $filter->dir == 'rtl' ? 1 : 0;
        $rtl = get_string('thisdirection', 'langconfig') == 'rtl' ? 1 : 0;


        if ($filterdata) {
            $cohort = optional_param('cohortid', 0, PARAM_INT);
        } else {
            $cohort = 0;
        }
        $cert = new self();
        $certificates = $cert->get_certificate_list($cohort);
        foreach ($certificates as $key => $certificate) {
            unset($certificate["id"]);
            $certificates[$key] = $rtl ? array_reverse(array_values($certificate)) : array_values($certificate);
        }
        $header = $rtl ? array(array_reverse(self::get_headers())) : array(self::get_headers());

        $certificates = array_merge(
            $header,
            $certificates
        );
        return $certificates;
    }

    /**
     * Get exportable data for certificates report
     * @param  int   $certid     Certificate id
     * @param  bool  $filterdata If enabled then filter data
     * @return array             Array certificates information
     */
    public static function get_exportable_data_report($certid, $filterdata = true) {

        $cohortid = optional_param("cohortid", 0, PARAM_INT);
        $filter = optional_param("filter", 0, PARAM_TEXT);
        $filter = json_decode($filter);
        // $rtl = isset($filter->dir) && $filter->dir == 'rtl' ? 1 : 0;
        $rtl = get_string('thisdirection', 'langconfig') == 'rtl' ? 1 : 0;

        $certid = $filter->certificateid;

        if ($filterdata == false) {
            $cohortid = 0;
        }

        $blockobj = new self();
        $record = $blockobj->get_issued_users($certid, $cohortid, 0);

        $users = array();

        foreach ($record->data as $key => $user) {
            $user->courseprogress = strip_tags($user->courseprogress);
            $users[$key] = $rtl ? array_values(array_reverse((array) $user)) : array_values((array) $user);
        }
        $header = $rtl ? array(array_reverse(self::get_headers_report())) : array(self::get_headers_report());

        $out = array_merge(
            $header,
            $users
        );

        return (object) [
            'data' => $out,
            'options' => [
                'orientation' => 'l',
            ]
        ];
    }
}
