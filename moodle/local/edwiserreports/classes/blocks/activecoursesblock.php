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

use local_edwiserreports\block_base;
use local_edwiserreports\utility;
use context_course;
use stdClass;
use cache;

/**
 * Class Acive Users Block. To get the data related to active users block.
 */
class activecoursesblock extends block_base {

    /**
     * Initialize the block.
     */
    public function __construct() {
        parent::__construct();
        $this->cache = cache::make('local_edwiserreports', 'activecourses');
    }
    /**
     * Preapre layout for active courses block
     * @return object Layout object
     */
    public function get_layout() {

        // Layout related data.
        $this->layout->id = 'activecoursesblock';
        $this->layout->name = get_string('activecoursesheader', 'local_edwiserreports');
        $this->layout->info = get_string('activecoursesblockhelp', 'local_edwiserreports');
        $this->layout->downloadlinks = $this->get_block_download_options();
        $this->layout->filters = $this->get_filters();

        // Block related data.
        $this->block->displaytype = 'line-chart';

        // Add block view in layout.
        $this->layout->blockview = $this->render_block('activecoursesblock', $this->block);
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
        return $OUTPUT->render_from_template('local_edwiserreports/blocks/activecoursesblockfilters', [
            'cohort' => $this->get_cohorts(),
            'searchicon' => $this->image_icon('actions/search'),
            'placeholder' => get_string('searchcourse', 'local_edwiserreports')
        ]);
    }

    /**
     * Filter active courses data based on enrolled courses.
     *
     * @param array $data Data to be filtered.
     *
     * @return array
     */
    public function filter_active_courses($data) {
        $courses = $this->get_courses_of_user();
        $courses = array_keys($courses);
        $filtered = [];
        foreach ($data as $key => $value) {
            if (in_array($key, $courses)) {
                $filtered[] = $value;
            }
        }
        return $filtered;
    }

    /**
     * Get Data for Active Courses
     * @param  object $params Parameteres
     * @return object         Response for Active Courses
     */
    public function get_data($params = false) {
        // Cohort id.
        $cohort = $params->cohort;

        $response = new stdClass();

        if (!$data = $this->cache->get('activecoursesdata-' . $cohort)) {
            $data = get_config('local_edwiserreports', 'activecoursesdata');
            if ($cohort != 0 || !$data || !$data = json_decode($data, true)) {
                $data = $this->get_course_data($cohort);
            } else {
                $data = $this->filter_active_courses($data);
            }
            $this->cache->set('activecoursesdata', $data);
        }

        $response->data = $data;
        return $response;
    }

    /**
     * Get Active Courses data
     * @param  int   $cohort Cohort id
     * @return array         Array of course active records
     */
    public function get_course_data($cohort) {
        global $DB;

        $courses = $this->get_courses_of_user();

        $count = 1;
        $response = array();

        $params = array("progress" => 100);

        $cohortjoin = '';
        if ($cohort) {
            $cohortjoin = 'JOIN {cohort_members} cm ON cm.userid = ecp.userid AND cm.cohortid = :cohortid
                           JOIN {cohort} c ON c.id = cm.cohortid AND c.visible = 1';
            $params["cohortid"] = $cohort;
        }

        // Calculate Completion Count for All Course.
        $sql = "SELECT ecp.courseid, COUNT(ecp.userid) AS users
            FROM {edwreports_course_progress} ecp
            $cohortjoin
            WHERE ecp.progress = :progress
            GROUP BY ecp.courseid";
        // Get records with 100% completions.
        $coursecompletion = $DB->get_records_sql($sql, $params);

        foreach ($courses as $course) {
            // If moodle course then return false.
            if ($course->id == 1) {
                continue;
            }

            // Get Course Context.
            $coursecontext = context_course::instance($course->id);

            // Get Enrolled users
            // 'moodle/course:isincompletionreports' - this capability is allowed to only students.
            $enrolledstudents = utility::get_enrolled_students($course->id, $coursecontext, $cohort);
            if (empty($enrolledstudents)) {
                continue;
            }

            // Create a record for responce.
            $res = array(
                $count++,
                $course->fullname
            );

            $res[] = count($enrolledstudents);

            // Get Completion count.
            if (!isset($coursecompletion[$course->id])) {
                $completedusers = 0;
            } else {
                $completedusers = $coursecompletion[$course->id]->users;
            }

            $res[] = self::get_courseview_count($course->id, array_keys($enrolledstudents), $cohort);
            $res[] = $completedusers;
            $response[] = $res;
        }
        return $response;
    }

    /**
     * Get Course View Count by users
     * @param  int   $courseid    Course Id
     * @param  array $studentsids Array of enrolled uesers id
     * @param  int   $cohort      Cohort id
     * @return int                Number of course views by users
     */
    public static function get_courseview_count($courseid, $studentsids, $cohort) {
        global $DB;

        $userstable = '';
        if (!empty($studentsids)) {
            // Create a temporary table for enrolled users.
            $userstable = utility::create_temp_table('tmp_ac_u', $studentsids);
        }

        $params = [
            'courseid' => $courseid,
            'action' => 'viewed'
        ];

        $cohortjoin = '';
        if ($cohort) {
            $cohortjoin = 'JOIN {cohort_members} cm ON cm.userid = lsl.userid AND cm.cohortid = :cohortid
                           JOIN {cohort} c ON c.id = cm.cohortid AND c.visible = 1';
            $params['cohortid'] = $cohort;
        }

        $sqlcourseview = "SELECT COUNT(DISTINCT lsl.userid) as usercount
            FROM {logstore_standard_log} lsl
            JOIN {{$userstable}} ut ON lsl.userid = ut.tempid
            $cohortjoin
            WHERE lsl.action = :action
            AND lsl.courseid = :courseid";

        $views = $DB->get_record_sql($sqlcourseview, $params);

        if (!empty($studentsids)) {
            // Drop temporary table.
            utility::drop_temp_table($userstable);
        }
        return $views->usercount;
    }

    /**
     * Get headers for Active Courses Block
     * @return array Array of header of course block
     */
    public static function get_header() {
        $header = array(
            get_string("coursename", "local_edwiserreports"),
            get_string("enrolments", "local_edwiserreports"),
            get_string("visits", "local_edwiserreports"),
            get_string("completions", "local_edwiserreports"),
        );
        return $header;
    }

    /**
     * Get Exportable data for Active Courses Block
     * @param  string $filter     Filter to apply on data
     * @param  bool   $filterdata If enabled then filter data
     * @return array Array of exportable data
     */
    public static function get_exportable_data_block($filter, $filterdata = true) {

        if ($filterdata) {
            $cohortid = optional_param("cohortid", 0, PARAM_INT);
        } else {
            $cohortid = 0;
        }
        $filter = json_decode($filter);
        $rtl = 0;
        if(isset($filter->dir) && $filter->dir == 'rtl'){
            $rtl = 1;
        }

        $export = array();
        $header = $rtl ? array_reverse(self::get_header()) : self::get_header();

        $classobj = new self();
        $activecoursesdata = $classobj->get_data((object)[
            'cohort' => $cohortid
        ]);

        $exportdata = array_map(function ($data) {
            array_splice($data, 0, 1);
            // $data = $rtl ? array_reverse($data) : $data;
            return $data;
        }, $activecoursesdata->data);

        $newdata = [];
        if($rtl){
            foreach ($exportdata as $data) {
                $newdata[] = array_reverse($data);
            }
        } else{
            $newdata = $exportdata;
        }
        

        $export = array_merge(
            array($header),
            $newdata
        );

        return $export;
    }
}
