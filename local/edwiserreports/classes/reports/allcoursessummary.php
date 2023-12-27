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
 * All Courses Summary report page.
 *
 * @package     local_edwiserreports
 * @category    reports
 * @author      Yogesh Shirsath
 * @copyright   2022 Wisdmlabs <support@wisdmlabs.com>
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace local_edwiserreports\reports;

defined('MOODLE_INTERNAL') || die;

use local_edwiserreports\utility;
use context_course;
use html_writer;
use moodle_url;

// Requiring constants.
require_once($CFG->dirroot . '/local/edwiserreports/classes/constants.php');

class allcoursessummary extends base {
    /**
     * Get Breadcrumbs for Course All courses summary
     * @return object Breadcrumbs for All courses summary
     */
    public function get_breadcrumb() {

        return array(
            'items' => array(
                array(
                    'item' => get_string('allcoursessummary', 'local_edwiserreports')
                )
            )
        );
    }

    /**
     * Get course and group filter for courseprogress report.
     * @param
     * @return array course-group filter
     */
    public function get_group_filter($cohort = 0) {
        global $DB, $USER, $COURSE;
        $nogroup = 1;

        if (!$this->bb->get_default_group_filter()) {
            return false;
        }

        $courses = $this->bb->get_courses_of_cohort_and_user($cohort, $USER->id);

        unset($courses[$COURSE->id]);

        // Course temp table.
        $coursetable = utility::create_temp_table('tmp_cp_f', array_keys($courses));

        // All groups.
        $groups = $DB->get_records_sql(
            "SELECT DISTINCT(g.id), c.id as courseid, c.fullname as coursename, g.name
               FROM {{$coursetable}} ct
               JOIN {groups} g ON g.courseid = ct.tempid
               JOIN {groups_members} gm ON g.id = gm.groupid
               JOIN {course} c ON c.id = g.courseid
            ORDER BY c.id, g.name ASC
            "
        );

        // Drop temp table.
        utility::drop_temp_table($coursetable);

        // Course groups.
        $coursegroups = array();

        // Generate Course - Group array.
        foreach ($groups as $group) {
            $courseid = $group->courseid;
            $coursecontext = context_course::instance($group->courseid);
            $course = $DB->get_record('course', array('id' => $courseid));
            $skipgroup = 0;

            // Check if current user has capability and then also check if course has groups setting set as SEPARATE GROUPS.
            if (!has_capability('moodle/site:accessallgroups', $coursecontext) && 1 == $course->groupmode) {
                // Get teacher groups in course.
                $teachergroups = groups_get_user_groups($courseid, $USER->id);
                $skipgroup = 1;

                $nogroup = 0;

                if (in_array($group->id, $teachergroups[0])) {
                    $skipgroup = 0;
                }
            }
            if (!$skipgroup) {
                if (!isset($coursegroups[$group->courseid])) {
                    $coursegroups[$group->courseid] = [];
                }
                $coursegroups[$group->courseid][] = [
                    'id' => $group->courseid . ',' . $group->id,
                    'name' => format_string($group->coursename, true, ['context' => \context_system::instance()]) . ' - ' . format_string($group->name, true, ['context' => \context_system::instance()])
                ];
            }

        }

        // Final group array which can be used in filter.
        $finalgroups = [];
        foreach ($coursegroups as $course => $groups) {
            foreach ($groups as $group) {
                $finalgroups[] = $group;
            }
            if (!empty(\local_edwiserreports\utility::get_enrolled_students($course, false, 0, -1)) && $nogroup) {
                $finalgroups[] = [
                    'id' => $course . ',' . (-1),
                    'name' => format_string($courses[$course]->fullname, true, ['context' => \context_system::instance()]) . ' - ' . get_string('nogroups', 'local_edwiserreports')
                ];
            }
        }

        if (empty($finalgroups)) {
            return false;
        }

        // Add all groups option.
        array_unshift($finalgroups, (object)[
            'id' => 0,
            'name' => get_string('allgroups', 'local_edwiserreports')
        ]);

        return ['groups' => $finalgroups];
    }

    /**
     * Get filter data
     *
     * @param  int   $activecourse Active course from url.
     * @return array
     */
    public function get_filter() {
        return [
            'cohorts' => local_edwiserreports_get_cohort_filter(),
            'groups' => $this->get_group_filter()
        ];
    }

    /**
     * Get users for table with filters.
     *
     * @param object $filters Filters
     *
     * @return array
     */
    public function get_users($filters, $course, $group) {
        global $DB;

        $userid = $this->bb->get_current_user();

        // All users.
        $allusers = $this->bb->get_user_from_cohort_course_group($filters->cohort, $course, $group, $userid);

        // User temporary table.
        $usertable = utility::create_temp_table('tmp_acs_uf', array_keys($allusers));

        $params = [
            'action' => 'viewed'
        ];
        $condition = "";
        $conditions = [];

        if ($filters->enrolment !== 'all') {
            list($starttime, $endtime) = $this->bb->get_date_range($filters->enrolment);
            $conditions['enrolment'] = 'floor(ue.timestart / 86400) between :starttime AND :endtime';
            $params['starttime'] = floor($starttime / 86400);
            $params['endtime'] = floor($endtime / 86400);
        }

        if (array_search(SUSPENDEDUSERS, $filters->exclude) !== false) {
            $conditions['suspended'] = "u.suspended = :suspended";
            $conditions['uesuspended'] = "ue.status = :uesuspended";
            $params['suspended'] = $params['uesuspended'] = 0;
        }

        if (array_search(INACTIVESINCE1YEAR, $filters->exclude) !== false) {
            $conditions['inactive'] = "logs.lastaccess > :lastaccess";
            $params['lastaccess'] = time() - (86400 * 365);
        }

        if (array_search(INACTIVESINCE1MONTH, $filters->exclude) !== false) {
            $conditions['inactive'] = "logs.lastaccess > :lastaccess";
            $params['lastaccess'] = time() - (86400 * 30);
        }

        $logcoursecondition = "";
        if ($course != 0) {
            $logcoursecondition = " AND lsl.courseid = :courseid";
            $params['courseid'] = $course;
        }

        if (!empty($conditions)) {
            $condition = " WHERE " . implode(" AND ", $conditions);
        } else {
            // Drop temporary table.
            utility::drop_temp_table($usertable);
            return $allusers;
        }

        $lslaction = $DB->sql_compare_text('lsl.action');
        $sql = "SELECT DISTINCT u.id
                  FROM {{$usertable}} ut
                  JOIN {user_enrolments} ue ON ue.userid = ut.tempid
                  JOIN {enrol} e ON ue.enrolid = e.id AND e.courseid = :course
                  JOIN {user} u ON ue.userid = u.id
             LEFT JOIN (SELECT lsl.userid, MAX(lsl.timecreated) lastaccess
                          FROM {logstore_standard_log} lsl
                         WHERE $lslaction = :action
                               $logcoursecondition
                      GROUP BY lsl.userid) logs ON u.id = logs.userid
                  $condition";
        $params['course'] = $course;
        $users = $DB->get_records_sql($sql, $params);

        // Drop temporary table.
        utility::drop_temp_table($usertable);
        return $users;
    }

    /**
     * Get data for table/export.
     *
     * @param object  $filters  Filters object
     * @param boolean $table    True if need data for table.
     *
     * @return array
     */
    public function get_data($filters, $table = true) {
        global $COURSE, $DB;
        $cohortid = isset($filters->cohort) ? $filters->cohort : 0;
        $coursegroup = isset($filters->coursegroup) ? $filters->coursegroup : 0;
        $rtl = $filters->dir == 'rtl' ? 1 : 0;

        if ($coursegroup == 0) {
            $course = 0;
            $group = 0;
        } else {
            list($course, $group) = explode(',', $coursegroup);
        }

        if ($course == 0) {
            $courses = $this->bb->get_courses_of_user();
            unset($courses[$COURSE->id]);
        } else {
            $courses = [$course => $DB->get_record('course', array('id' => $course))];
        }

        // Get all categories once instead of gettuing it coursewise.
        $categories = $DB->get_records_sql('SELECT id, name FROM {course_categories}');

        $response = array();

        // Add header to response when exporting data.
        if (!$table) {
            $header =  [
                get_string("coursename", "local_edwiserreports"),
                get_string("category", "local_edwiserreports"),
                get_string("enrolled", "local_edwiserreports"),
                get_string("completed", "local_edwiserreports"),
                get_string("notstarted", "local_edwiserreports"),
                get_string("inprogress", "local_edwiserreports"),
                get_string("atleastoneactivitystarted", "local_edwiserreports"),
                get_string("totalactivities", "local_edwiserreports"),
                get_string("avgprogress", "local_edwiserreports"),
                get_string("avggrade", "local_edwiserreports"),
                get_string("highestgrade", "local_edwiserreports"),
                get_string("lowestgrade", "local_edwiserreports"),
                get_string("totaltimespent", "local_edwiserreports"),
                get_string("avgtimespent", "local_edwiserreports"),
            ];

            if(isset($filters->dir) && $filters->dir == 'rtl' ){
                $header = array_reverse($header);
            }
            $response[] = $header;

        }
        $totalactivities = $DB->get_records_sql(
            "SELECT cm.course, COUNT(cm.id) total
               FROM {course_modules} cm
              WHERE cm.completion > 0
              GROUP BY cm.course"
        );
        $search = html_writer::tag('i', '', ['class' => 'fa fa-search-plus']);
        foreach ($courses as $course) {
            $data = [];

            // Get only enrolled student.
            $users = $this->get_users($filters, $course->id, $group);
            $enrolments = count($users);
            if (!$enrolments && !is_siteadmin()) {
                continue;
            }

            // Create temporary users table.
            $userstable = utility::create_temp_table('tmp_acs_u', array_keys($users));

            // Get total spent time for all courses.
            $timespent = $this->get_course_timespent($course->id, $userstable);

            // Get completions.
            if (!$completions = $this->get_course_completions($course->id, $userstable)) {
                $completions = (object) [
                    'completed' => 0,
                    'notstarted' => 0,
                    'inprogress' => 0,
                    'atleastonestarted' => 0,
                    'totalprogress' => 0
                ];
            }

            // Get users grades.
            if (!$usergrades = $this->get_users_grades($course->id, $userstable)) {
                $usergrades = (object) [
                    'highestgrade' => 0,
                    'lowestgrade' => 0,
                    'avggrades' => 0
                ];
            } else {
                $usergrades->avggrades = round($usergrades->totalgrades / $usergrades->grades, 2);
            }

            // Assign response data.
            $data['coursename'] = format_string($course->fullname, true, ['context' => \context_system::instance()]);

            // Getting Category name.
            $data['category'] = format_string($categories[$course->category]->name, true, ['context' => \context_system::instance()]);
            $data['enrolments'] = $enrolments;
            if ($table) {
                $data['enrolments'] .= html_writer::link(
                    new moodle_url(
                        "/local/edwiserreports/completion.php",
                        array("courseid" => $course->id)
                    ),
                    $search,
                    array(
                        'style' => 'margin-left: 0.5rem;'
                    )
                );
            }
            $data['completed'] = $completions->completed;
            $data['notstarted'] = $completions->notstarted;
            $data['inprogress'] = $completions->inprogress;
            $data['atleastoneactivitystarted'] = $completions->atleastonestarted;
            $data['totalactivities'] = isset($totalactivities[$course->id]->total) ? $totalactivities[$course->id]->total : 0;
            if ($table && $data['totalactivities'] != 0) {
                $data['totalactivities'] .= html_writer::link(
                    new moodle_url(
                        "/local/edwiserreports/courseactivitiessummary.php",
                        array("course" => $course->id)
                    ),
                    $search,
                    array(
                        'style' => 'margin-left: 0.5rem;'
                    )
                );
            }

            $data['avgprogress'] = $enrolments == 0 ? 0 : round($completions->totalprogress / $enrolments, 2) . '%';
            $data['avggrade'] = round($usergrades->avggrades, 2);
            $data['highestgrade'] = round($usergrades->highestgrade, 2);
            $data['lowestgrade'] = round($usergrades->lowestgrade, 2);
            $data['totaltimespent'] = $timespent;
            $data['avgtimespent'] = ($enrolments == 0) ? 0 : ceil($timespent / $enrolments);
            if (!$table) {
                $data['totaltimespent'] = $rtl ? date('s:i:H', mktime(0, 0, $data['totaltimespent'])) : date('H:i:s', mktime(0, 0, $data['totaltimespent']));
                $data['avgtimespent'] = $rtl ? date('s:i:H', mktime(0, 0, $data['avgtimespent'])) : date('H:i:s', mktime(0, 0, $data['avgtimespent']));
            }

            // Drop temporary table.
            utility::drop_temp_table($userstable);
            if(isset($filters->dir) && $filters->dir == 'rtl' && !$table ){
                $data = array_reverse($data);
            }
            $response[] = $table ? $data : array_values($data);
        }




        // Return response.
        return $response;

    }

    /**
     * Get course module completions.
     *
     * @param int       $course     Course id
     * @param string    $userstable Temporary users table.
     *
     * @return object
     */
    public function get_course_completions($course, $userstable) {
        global $DB;

        $sql = "SELECT SUM(ecp.progress) totalprogress,
                        SUM(CASE
                               WHEN ecp.progress = 100 THEN 1
                               ELSE 0
                            END) completed,
                        SUM(CASE
                               WHEN ecp.totalmodules = 0 THEN 1
                               ELSE 0
                            END) notstarted,
                        SUM(CASE
                               WHEN ecp.progress < 100 AND ecp.progress > 0 THEN 1
                               ELSE 0
                            END) inprogress,
                        SUM(CASE
                               WHEN ecp.totalmodules > 0 THEN 1
                               ELSE 0
                            END) atleastonestarted
                  FROM {edwreports_course_progress} ecp
                  JOIN {{$userstable}} ut ON ecp.userid = ut.tempid
                 WHERE ecp.courseid = :course
                 GROUP BY ecp.courseid";

        $params = array('course' => $course);

        return $DB->get_record_sql($sql, $params);
    }

    /**
     * Get course spenttime
     * @param   int     $course     Course id
     * @param   string  $userstable Temporary users table
     * @return  int                 Users time spent on course
     */
    public function get_course_timespent($course, $userstable) {
        global $DB;

        $sql = "SELECT SUM(eal.timespent) timespent
                  FROM {edwreports_activity_log} eal
                  JOIN {{$userstable}} ut ON eal.userid = ut.tempid
                 WHERE eal.course = :course
                 GROUP BY eal.course";

        $params = array('course' => $course);

        return $DB->get_field_sql($sql, $params);
    }

    /**
     * Get users grades
     * @param  int      $course     Course id
     * @param  string   $userstable Temporary users table
     * @return object
     */
    public function get_users_grades($courseid, $userstable) {
        global $DB;

        $sql = "SELECT MAX(gg.finalgrade) highestgrade,
                       MIN(gg.finalgrade) lowestgrade,
                       SUM(gg.finalgrade) totalgrades,
                       COUNT(gg.finalgrade) grades
                  FROM {grade_items} gi
             LEFT JOIN {grade_grades} gg ON gi.id = gg.itemid
                  JOIN {{$userstable}} ut ON gg.userid = ut.tempid
                 WHERE gg.finalgrade IS NOT null
                   AND gi.courseid = :courseid
                   AND gi.itemtype = :itemtype
                 GROUP BY gi.courseid";
        $params = array('courseid' => $courseid, 'itemtype' => 'course');

        return $DB->get_record_sql($sql, $params);
    }

    /**
     * Get exportable data report for course activities summaryt
     *
     * @param string    $filter     Filter to apply on data
     * @param bool      $filterdata If true then only filtered data will be export`
     *
     * @return array                Returning filtered exported data
     */
    public static function get_exportable_data_report($filter, $filterdata) {
        $filter = json_decode($filter);
        if (!$filterdata) {
            $filter['cohort'] = 0;
            $filter['coursegroup'] = 0;
        }
        $obj = new self();
        return (object) [
            'data' => $obj->get_data($filter, false),
            'options' => [
                'format' => 'a3',
                'orientation' => 'l',
            ]
        ];
    }
}
