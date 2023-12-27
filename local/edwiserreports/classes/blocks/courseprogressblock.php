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
 * Reports abstract block will define here to which will extend for each repoers blocks
 *
 * @package     local_edwiserreports
 * @copyright   2019 wisdmlabs <support@wisdmlabs.com>
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace local_edwiserreports\blocks;

use local_edwiserreports\block_base;
use local_edwiserreports\utility;
use context_course;
use moodle_url;
use stdClass;
use cache;

/**
 * Course progress block.
 */
class courseprogressblock extends block_base {

    /**
     * Return true if current block is graphical block.
     *
     * @return boolean
     */
    public function is_graphical() {
        return true;
    }

    /**
     * Preapre layout for each block
     * @return object Response object
     */
    public function get_layout() {
        global $CFG;

        // Layout related data.
        $this->layout->id = 'courseprogressblock';
        $this->layout->name = get_string('courseprogress', 'local_edwiserreports');
        $this->layout->info = get_string('courseprogressblockhelp', 'local_edwiserreports');

        // Check capability of allcoursessummary.
        $capname = 'report/edwiserreports_allcoursessummary:view';
        if (has_capability($capname, \context_system::instance()) || can_view_block($capname)) {
            $this->layout->morelink = new moodle_url($CFG->wwwroot . "/local/edwiserreports/allcoursessummary.php");
        }

        // To add export links.
        $this->layout->downloadlinks = $this->get_block_download_options(true);

        $this->layout->filters = $this->get_filter();

        // Add block view in layout.
        $this->layout->blockview = $this->render_block('courseprogressblock', $this->block);

        // Set block edit capabilities.
        $this->set_block_edit_capabilities($this->layout->id);

        // Return blocks layout.
        return $this->layout;
    }

    /**
     * Prepare active users block filters
     * @return array filters array
     */
    public function get_filter() {
        global $OUTPUT, $USER, $COURSE, $USER, $DB;

        $courses = $this->get_courses_of_user($USER->id);

        unset($courses[SITEID]);

        $course = reset($courses);

        $courses[$course->id]->selected = true;

        // Generate group filter data.
        $groupfilter = false;
        if ($course && $groups = $this->get_groups($course->id)) {
            $groupfilter = $groups;
        }

        $this->block->hascourses = count($courses) > 0;

        if (!$this->block->hascourses) {
            return '';
        }

        return $OUTPUT->render_from_template('local_edwiserreports/blocks/courseprogressblockfilters', [
            'cohort' => $this->get_cohorts(),
            'groups' => $groupfilter,
            'courses' => array_values($courses)
        ]);
    }

    /**
     * Get reports data for Course Progress block
     * @param  object $params Parameters
     * @return object         Response object
     */
    public function get_data($params = false) {
        $courseid = isset($params->course) ? $params->course : false;
        $cohortid = isset($params->cohort) ? $params->cohort : false;
        $groupid = isset($params->group) ? $params->group : false;

        $tabledata = isset($params->tabledata) && $params->tabledata;
        // Make cache for courseprogress block.
        $cache = cache::make("local_edwiserreports", "courseprogress");
        $cachekey = $this->generate_cache_key('courseprogress', $courseid, $cohortid);

        // If cache not set for course progress.
        if ((!$response = $cache->get($cachekey)) || $tabledata) {
            // Get all courses for dropdown.
            $course = get_course($courseid);
            $coursecontext = context_course::instance($courseid);

            // Get only students.
            $enrolledstudents = \local_edwiserreports\utility::get_enrolled_students(
                $courseid,
                $coursecontext,
                $cohortid,
                $groupid
            );

            // Get response.
            $response = new stdClass();
            list($progress, $average) = $this->get_completion_with_percentage(
                $course,
                $enrolledstudents,
                $tabledata
            );
            if (array_sum($progress) == 0) {
                $progress = [];
                $average = 0;
            }
            $response->data = $progress;
            $response->average = $average;
            $response->tooltip = [
                'single' => 'student',
                'plural' => 'students'
            ];

            // Set cache to get data for course progress.
            $cache->set($cachekey, $response);
        }

        // Return response.
        return $response;
    }

    /**
     * Get completion with percentage
     * (0%, 20%, 40%, 60%, 80%, 100%)
     * @param  object $course   Course Object
     * @param  array  $users    Users Object
     * @return array            Array of completion with percentage
     */
    public function get_completion_with_percentage($course, $users, $tabledata = false) {
        $completions = \local_edwiserreports\utility::get_course_completion($course->id);

        // Default grade scores.
        $completedusers = [
            '0% - 20%' => 0,
            '21% - 40%' => 0,
            '41% - 60%' => 0,
            '61% - 80%' => 0,
            '81% - 100%' => 0
        ];

        $completed = 0;
        $total = 0;
        $count = 0;
        foreach ($users as $user) {
            $count++;
            // If not set the completion then this user is not completed.
            if (!isset($completions[$user->id])) {
                $completedusers['0% - 20%']++;
            } else {
                $progress = $completions[$user->id]->completion;
                $total += $progress;
                switch(true) {
                    case $progress <= 20:
                        $completedusers['0% - 20%']++;
                        break;
                    case $progress <= 40:
                        $completedusers['21% - 40%']++;
                        break;
                    case $progress <= 60:
                        $completedusers['41% - 60%']++;
                        break;
                    case $progress <= 80;
                        $completedusers['61% - 80%']++;
                        break;
                    default:
                        $completedusers['81% - 100%']++;
                        break;
                }
                if ($progress == 100) {
                    $completed++;
                }
            }
        }
        if ($tabledata) {
            $completedusers['completed'] = $completed;
        }
        return [array_values($completedusers), $total == 0 ? 0 : $total / $count];
    }

    /**
     * Get Exportable data for Course Progress Block
     * @param  string $filter     Filter to apply on data
     * @param  bool   $filterdata If enabled then filter data
     * @return array          Array of exportable data
     */
    public function get_exportable_data_block($filter, $filterdata = true) {
        global $DB;
        // Filter object.
        $filter = json_decode($filter);

        if ($filterdata == false) {
            $filter->cohort = 0;
            $filter->group = 0;
        }

        $data = $this->get_data($filter);
        $data->hascourses = count($DB->get_records('course')) > 0;
        return $data;
    }

    /**
     * Get modal table based on filter and range
     *
     * @param object $filter    Filters
     * @param string $range     Selected range
     *
     * @return string html table
     */
    public function get_modal_table($filter, $range) {
        global $DB;

        $params = [];
        $rangecondition = "";

        // Map range with conditions.
        switch ($range) {
            case "0to20":
                $rangecondition = "(ecp.progress IS NULL
                                    OR ecp.progress <= :mingrades)";
                $params['mingrades'] = 20;
                break;
            case "21to40":
                $rangecondition = "ecp.progress > :mingrades
                          AND ecp.progress <= :maxgrades";
                $params['mingrades'] = 20;
                $params['maxgrades'] = 40;
                break;
            case "41to60":
                $rangecondition = "ecp.progress > :mingrades
                          AND ecp.progress <= :maxgrades";
                $params['mingrades'] = 40;
                $params['maxgrades'] = 60;
                break;
            case "61to80":
                $rangecondition = "ecp.progress > :mingrades
                          AND ecp.progress <= :maxgrades";
                $params['mingrades'] = 60;
                $params['maxgrades'] = 80;
                break;
            case "81to100":
                $rangecondition = "ecp.progress > :maxgrades";
                $params['maxgrades'] = 80;
                break;
        }

        $content = '';
        $header = [
            get_string('student', 'local_edwiserreports'),
            get_string('email', 'local_edwiserreports'),
            get_string('progress', 'local_edwiserreports')
        ];
        $rows = [];

        $userstable = utility::create_temp_table('temp_cpmt_u', array_keys(
            $this->get_user_from_cohort_course_group($filter->cohort, $filter->course, $filter->group)
        ));

        $fullname = $DB->sql_fullname('u.firstname', 'u.lastname');
        $sql = "SELECT $fullname fullname, u.email, ecp.progress
                  FROM {edwreports_course_progress} ecp
                  JOIN {{$userstable}} ut ON ecp.userid = ut.tempid
                  JOIN {user} u ON ut.tempid = u.id
                 WHERE $rangecondition
                   AND ecp.courseid = :course";
        $params['course'] = $filter->course;
        $records = $DB->get_recordset_sql($sql, $params);
        if ($records->valid()) {
            foreach ($records as $record) {
                $rows[] = [
                    $record->fullname,
                    $record->email,
                    round($record->progress, 2) . '%'
                ];
            }
        }
        utility::drop_temp_table($userstable);
        return [
            'content' => $content,
            'header' => $header,
            'rows' => $rows,
            'searchicon' => \local_edwiserreports\utility::image_icon('actions/search'),
            'placeholder' => get_string('searchuser', 'local_edwiserreports')
        ];
    }
}
