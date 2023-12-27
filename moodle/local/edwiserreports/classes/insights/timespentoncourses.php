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
 * Insight cards logic for timespentoncourses insight.
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
 * Trait for timespentoncourses
 */
trait timespentoncourses {

    /**
     * Get students timespent on courses in given period.
     *
     * @param int    $startdate   Start date.
     * @param int    $enddate     End date.
     * @param string $coursetable Course table.
     *
     * @return int
     */
    private function get_timespent_on_courses($startdate, $enddate, $coursetable) {
        global $DB;

        $sql = "SELECT SUM(eal.timespent)
                  FROM {edwreports_activity_log} eal
                  JOIN {{$coursetable}} c ON eal.course = c.tempid
                 WHERE eal.datecreated BETWEEN :startdate AND :enddate";
        $params = array(
            'startdate' => $startdate,
            'enddate' => $enddate
        );

        return $DB->get_field_sql($sql, $params);
    }


    /**
     * Get students timespent on courses in given period.
     *
     * @param int    $startdate   Start date.
     * @param int    $enddate     End date.
     * @param string $coursetable Course table.
     *
     * @return int
     */
    private function get_timespent_on_course($startdate, $enddate, $courseid, $userstable) {
        global $DB;

        $sql = "SELECT SUM(eal.timespent)
                  FROM {edwreports_activity_log} eal
                  JOIN {{$userstable}} u ON eal.userid = u.tempid
                 WHERE eal.datecreated BETWEEN :startdate AND :enddate
                   AND eal.course = :course";
        $params = array(
            'startdate' => $startdate,
            'enddate' => $enddate,
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
    public function get_timespentoncourses_data_old(
        $startdate,
        $enddate,
        $oldstartdate,
        $oldenddate
    ) {
        global $DB;
        
        $blockbase = new block_base();
        $userid = $blockbase->get_current_user();
        $courses = $blockbase->get_courses_of_user($userid);

        $currenttimespent = 0;
        $oldtimespent = 0;

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

                $currenttimespent += $this->get_timespent_on_course($startdate, $enddate, $course->id, $userstable);
                $oldtimespent += $this->get_timespent_on_course($oldstartdate, $oldenddate, $course->id, $userstable);

                // Drop temporary table.
                utility::drop_temp_table($userstable);
            }

            // Temporary course table.
            $coursetable = utility::create_temp_table('tmp_i_c', array_keys($nonrestrictedcourses));
            $currenttimespent = $this->get_timespent_on_courses($startdate, $enddate, $coursetable);
            $oldtimespent = $this->get_timespent_on_courses($oldstartdate, $oldenddate, $coursetable);

            // Drop temporary table.
            utility::drop_temp_table($coursetable);

            return [$currenttimespent, $oldtimespent];
        }

        // Temporary course table.
        $coursetable = utility::create_temp_table('tmp_i_c', array_keys($courses));

        $currenttimespent = $this->get_timespent_on_courses($startdate, $enddate, $coursetable);
        $oldtimespent = $this->get_timespent_on_courses($oldstartdate, $oldenddate, $coursetable);

        // Drop temporary table.
        utility::drop_temp_table($coursetable);

        return [$currenttimespent, $oldtimespent];

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
    public function get_timespentoncourses_data(
        $startdate,
        $enddate,
        $oldstartdate,
        $oldenddate
    ) {

        $blockbase = new block_base();
        $userid = $blockbase->get_current_user();
        $courses = $blockbase->get_courses_of_user($userid);

        $currenttimespent = 0;
        $oldtimespent = 0;

        if (!has_capability('moodle/site:accessallgroups', context_system::instance())) {
            foreach ($courses as $course) {
                // Get only enrolled student.
                $enrolledstudents = \local_edwiserreports\utility::get_enrolled_students($course->id);
                $enrolments = count($enrolledstudents);
                if (!$enrolments && !is_siteadmin()) {
                    continue;
                }
                // Create temporary users table.
                $userstable = utility::create_temp_table('tmp_acs_u', array_keys($enrolledstudents));

                $currenttimespent += $this->get_timespent_on_course($startdate, $enddate, $course->id, $userstable);
                $oldtimespent += $this->get_timespent_on_course($oldstartdate, $oldenddate, $course->id, $userstable);

                // Drop temporary table.
                utility::drop_temp_table($userstable);
            }

            return [$currenttimespent, $oldtimespent];
        }

        // Temporary course table.
        $coursetable = utility::create_temp_table('tmp_i_c', array_keys($courses));

        $currenttimespent = $this->get_timespent_on_courses($startdate, $enddate, $coursetable);
        $oldtimespent = $this->get_timespent_on_courses($oldstartdate, $oldenddate, $coursetable);

        // Drop temporary table.
        utility::drop_temp_table($coursetable);

        return [$currenttimespent, $oldtimespent];

    }


}
