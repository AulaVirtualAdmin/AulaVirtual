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
 * Insight cards logic for coursecompletions insight.
 *
 * @package     local_edwiserreports
 * @copyright   2022 wisdmlabs <support@wisdmlabs.com>
 * @author      Yogesh Shirsath
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace local_edwiserreports\insights;

use local_edwiserreports\block_base;
use local_edwiserreports\utility;
use context_system;

/**
 * Trait for coursecompletions
 */
trait coursecompletions {

    /**
     * Get completions data in given period.
     *
     * @param int $startdate Start date timestamp.
     * @param int $enddate   End date timestamp.
     *
     * @return int
     */
    private function get_completions($startdate, $enddate, $coursetable) {
        global $DB;

        $sql = "SELECT COUNT(cc.completiontime) as usercount
                  FROM {edwreports_course_progress} cc
                  JOIN {{$coursetable}} ct ON cc.courseid = ct.tempid
                 WHERE cc.completiontime IS NOT NULL
                   AND FLOOR(cc.completiontime / 86400) BETWEEN :starttime AND :endtime";
        $params = array(
            'starttime' => $startdate,
            'endtime' => $enddate
        );
        return $DB->get_field_sql($sql, $params);
    }


    /**
     * Get completions data in given period.
     *
     * @param int $startdate Start date timestamp.
     * @param int $enddate   End date timestamp.
     *
     * @return int
     */
    private function get_course_completions($startdate, $enddate, $courseid, $userstable) {
        global $DB;

        $sql = "SELECT COUNT(cc.completiontime) as usercount
                  FROM {edwreports_course_progress} cc
                  JOIN {{$userstable}} ut ON cc.userid = ut.tempid
                 WHERE cc.completiontime IS NOT NULL
                   AND cc.courseid = :course
                   AND FLOOR(cc.completiontime / 86400) BETWEEN :starttime AND :endtime";
        $params = array(
            'starttime' => $startdate,
            'endtime' => $enddate,
            'course' => $courseid
        );
        return $DB->get_field_sql($sql, $params);
    }

    /**
     * Get new registration insight data
     *
     * @param int   $startdate      Start date.
     * @param int   $enddate        End date.
     * @param int   $oldstartdate   Old start date.
     * @param int   $oldenddate     Old end date.
     *
     * @return array
     */
    public function get_coursecompletions_data(
        $startdate,
        $enddate,
        $oldstartdate,
        $oldenddate
    ) {
        global $DB;

        $blockbase = new block_base();
        $userid = $blockbase->get_current_user();
        $courses = $blockbase->get_courses_of_user($userid);

        $currentcompletions = 0;
        $oldcompletions = 0;

        if (!has_capability('moodle/site:accessallgroups', context_system::instance())) {
            // Get restricted and non restricted courses.
            // Then get restricted courses data.
            // Get non restricted courses data and then merege both data
            $allrestrictcourses = $DB->get_records('course', array('groupmode' => 1), '', 'id');
            $nonrestrictedcourses = array_diff_key($courses, $allrestrictcourses);
            $restrictedcourses = array_diff_key($courses, $nonrestrictedcourses);

            foreach ($restrictedcourses as $course) {
                // Get only enrolled student.
                $enrolledstudents = \local_edwiserreports\utility::get_enrolled_students($course->id);
                $enrolments = count($enrolledstudents);
                if (!$enrolments && !is_siteadmin()) {
                    continue;
                }
                // Create temporary users table.
                $userstable = utility::create_temp_table('tmp_acs_u', array_keys($enrolledstudents));

                $currentcompletions += $this->get_course_completions($startdate, $enddate, $course->id, $userstable);
                $oldcompletions += $this->get_course_completions($oldstartdate, $oldenddate, $course->id, $userstable);

                // Drop temporary table.
                utility::drop_temp_table($userstable);
            }

            // Temporary course table.
            $coursetable = utility::create_temp_table('tmp_i_cc', array_keys($nonrestrictedcourses));
            $currentcompletions += $this->get_completions($startdate, $enddate, $coursetable);
            $oldcompletions += $this->get_completions($oldstartdate, $oldenddate, $coursetable);

            // Drop temporary table.
            utility::drop_temp_table($coursetable);

            return [$currentcompletions, $oldcompletions];
        }

        // Temporary course table.
        $coursetable = utility::create_temp_table('tmp_i_cc', array_keys($courses));

        $currentcompletions = $this->get_completions($startdate, $enddate, $coursetable);
        $oldcompletions = $this->get_completions($oldstartdate, $oldenddate, $coursetable);

        // Drop temporary table.
        utility::drop_temp_table($coursetable);

        return [$currentcompletions, $oldcompletions];
    }
}
