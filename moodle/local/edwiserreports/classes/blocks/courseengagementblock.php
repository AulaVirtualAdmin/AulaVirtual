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
 * Block layout and ajax service methods are defined in this file.
 *
 * @package     local_edwiserreports
 * @author      Yogesh Shirsath
 * @copyright   2022 wisdmlabs <support@wisdmlabs.com>
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace local_edwiserreports\blocks;

use local_edwiserreports\block_base;
use local_edwiserreports\utility;
use completion_info;
use context_course;
use html_writer;
use html_table;
use moodle_url;
use stdClass;

/**
 * Class courseengagement Block. To get the data related to courseengagement block.
 */
class courseengagementblock extends block_base {

    /**
     * Preapre layout for courseengagement block
     * @return object Layout object
     */
    public function get_layout() {
        global $CFG;

        // Layout related data.
        $this->layout->id = 'courseengagementblock';
        $this->layout->name = get_string('courseengagementheader', 'local_edwiserreports');
        $this->layout->info = get_string('courseengagementblockhelp', 'local_edwiserreports');

        // To add export links.
        $this->layout->downloadlinks = $this->get_block_download_options();

        // Add block view in layout.
        $this->layout->blockview = $this->render_block('courseengagementblock', $this->block);

        // Add filters.
        $this->layout->filters = $this->get_filter();

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
        global $OUTPUT;

        return $OUTPUT->render_from_template('local_edwiserreports/blocks/courseengagementblockfilters', [
            'cohort' => $this->get_cohorts(),
            'searchicon' => $this->image_icon('actions/search'),
            'placeholder' => get_string('searchcourse', 'local_edwiserreports')
        ]);
    }

    /**
     * Use this method to return data for block.
     * Get Data for block
     * @param  object $params Parameteres
     * @return object         Response
     */
    public function get_data($params = false) {
        $cohortid = $params->cohort;
        $response = new stdClass();
        $response->data = $this->get_courseengage($cohortid);
        return $response;
    }

    /**
     * Get timespent on courses.
     *
     * @param stdClass $course   Course object for filtering
     * @param int      $cohortid Cohort id to filter users by cohort
     *
     * @return array Courses list with timespent.
     */
    public function get_timespent_on_course($course, $cohortid) {
        global $DB, $CFG;
        $dir = get_string('thisdirection', 'langconfig');
        $rtl = $rtl ? $rtl : ($dir == 'rtl' ? 1 : 0);

        $usersdata = new stdClass();
        $usersdata->head = array(
            get_string("name", "local_edwiserreports"),
            get_string("email", "local_edwiserreports"),
            get_string("timespent", "local_edwiserreports")
        );

        $usersdata->data = array();

        $users = \local_edwiserreports\utility::get_enrolled_students($course->id, false, $cohortid);

        if (empty($users)) {
            return $usersdata;
        }

        $userstable = utility::create_temp_table('tmp_ce_u', array_keys($users));

        $params = array();

        $alternatenames = [];
        if ($CFG->branch < 311) {
            $alternatenames = get_all_user_name_fields(true, 'u');
        } else {
            foreach (\core_user\fields::get_name_fields() as $field) {
                $alternatenames[] = 'u.' . $field;
            }
            $alternatenames = implode(', ', $alternatenames);
        }

        $sql = "SELECT al.userid, $alternatenames, u.email, SUM(al.timespent) AS timespent
                  FROM {edwreports_activity_log} al
                  JOIN {{$userstable}} ut ON al.userid = ut.tempid
                  JOIN {user} u ON u.id = al.userid
                  WHERE al.course = :courseid
                  GROUP BY al.userid, $alternatenames, u.email";
        $params["courseid"] = $course->id;
        $users = $DB->get_recordset_sql($sql, $params);

        if ($users->valid()) {
            foreach ($users as $user) {
                $spenttime = $rtl ? '<div style="direction:ltr;">' . date('s:i:H', mktime(0, 0, $user->timespent)) . '</div>' : date('H:i:s', mktime(0, 0, $user->timespent));
                $usersdata->data[] = array(
                    fullname($user),
                    $user->email,
                    $spenttime
                );
            }
        }

        // Drop table.
        utility::drop_temp_table($userstable);
        return $usersdata;
    }

    /**
     * Get timespent on courses.
     *
     * @param int $cohortid Cohort id to filter users by cohort
     *
     * @return array Courses list with timespent.
     */
    public function get_timespent($cohortid) {
        global $DB;
        $params = array(
            'context' => CONTEXT_COURSE,
            'courseid' => SITEID
        );

        $roleids = $DB->get_records('role', array('archetype' => 'student'));

        list($insql, $inparams) = $DB->get_in_or_equal(array_keys($roleids), SQL_PARAMS_NAMED, 'role', true, true);

        $params = array_merge($params, $inparams);

        $cohortjoin = '';
        $cohortcondition = '';
        if ($cohortid) {
            $cohortjoin = 'JOIN {cohort_members} cm ON cm.userid = al.userid
                           JOIN {cohort} c ON c.id = cm.cohortid AND c.visible = 1';
            $cohortcondition = 'AND cm.cohortid = :cohortid';
            $params["cohortid"] = $cohortid;
        }
        $sql = "SELECT al.course, SUM(al.timespent) AS timespent
                  FROM {edwreports_activity_log} al
                  JOIN {context} ctx ON al.course = ctx.instanceid
                                     AND ctx.contextlevel = :context
                  JOIN {role_assignments} ra ON ra.contextid = ctx.id
                                             AND al.userid = ra.userid
                                             AND ra.roleid $insql
                  JOIN {user} u ON al.userid = u.id
                  $cohortjoin
                 WHERE al.course NOT IN (0, :courseid)
                   AND u.deleted = 0
                  $cohortcondition
                  GROUP BY al.course";
        return $DB->get_records_sql($sql, $params);
    }

    /**
     * Get Course Engagement Data
     * @param  int   $cohortid Cohort id
     * @return array           Array of course engagement
     */
    public function get_courseengage($cohortid, $rtl=0) {
        global $DB;

        $engagedata = array();
        $userid = $this->get_current_user();
        $courses = $this->get_courses_of_user($userid);
        $categories = $DB->get_records_sql('SELECT id, name FROM {course_categories}');
        unset($courses[SITEID]);
        $params = array();
        $cohortjoin = '';
        $cohortcondition = '';
        if ($cohortid) {
            $cohortjoin = 'JOIN {cohort_members} cm ON cm.userid = u.id';
            $cohortcondition = 'AND cm.cohortid = :cohortid';
            $params["cohortid"] = $cohortid;
        }

        $fields = 'c.courseid, COUNT(c.userid) AS usercount';
        $completionsql = "SELECT $fields
            FROM {edwreports_course_progress} c
            JOIN {user} u ON u.id = c.userid  $cohortjoin
            WHERE c.progress >= :completionstart
            AND c.progress <= :completionend
            AND u.deleted = 0
            $cohortcondition
            GROUP BY c.courseid";

        // Calculate 50% Completion Count for Courses.
        $params["completionstart"] = 50;
        $params["completionend"] = 99;

        // Calculate 100% Completion Count for Courses.
        $params["completionstart"] = 100.00;
        $params["completionend"] = 100.00;
        $completion = $DB->get_records_sql($completionsql, $params);

        // Calculate timespent for courses.
        $coursestimespent = $this->get_timespent($cohortid);

        $params["completedactivities"] = 1;
        foreach ($courses as $course) {
            $completed = 0;
            if (isset($completion[$course->id])) {
                $completed = $completion[$course->id]->usercount;
            }

            $timespent = 0;
            if (isset($coursestimespent[$course->id])) {
                $timespent = $coursestimespent[$course->id]->timespent;
            }

            $courseengageresp = $this->get_engagement(
                $course,
                $cohortid,
                $categories[$course->category]->name,
                $completed,
                $timespent,
                $rtl
            );
            if ($courseengageresp) {
                $engagedata[] = $courseengageresp;
            }
        }
        return $engagedata;
    }

    /**
     * Get Users who visited the Course
     * @param  Integer $courseid Course ID to get all visits
     * @param  Integer $cohortid Cohort id
     * @param  Bool    $count    If count is true then return count of users
     * @return Array             Array of Users ID who visited the course
     */
    public function get_course_visites($courseid, $cohortid, $count = false) {
        global $DB;

        $params = array(
            "courseid" => $courseid,
            "action" => "viewed"
        );

        $select = "";
        $groupby = "";
        if ($count == true) {
            $select = "COUNT(l.userid) AS usercount";
        } else {
            $select = "u.id, u.firstname, u.lastname, u.email, COUNT(l.userid) AS visits";
            $groupby = "GROUP BY u.id, u.firstname, u.lastname, u.email";
        }

        // Filtering users.
        $users = $this->get_user_from_cohort_course_group($cohortid, $courseid, 0, $this->get_current_user());

        // Temporary filtering table.
        $userstable = utility::create_temp_table('tmp_au_f', array_keys($users));

        $sql = "SELECT $select
                  FROM {logstore_standard_log} l
                  JOIN {user} u ON u.id = l.userid
                  JOIN {{$userstable}} ut ON u.id = ut.tempid
                 WHERE l.action = :action
                   AND l.courseid = :courseid
                   AND u.deleted = 0
                 $groupby";
        if ($count == true) {
            $records = $DB->get_record_sql($sql, $params)->usercount;
        } else {
            $records = $DB->get_records_sql($sql, $params);
        }

        // Drop temporary table.
        utility::drop_temp_table($userstable);
        return $records;
    }

    /**
     * Get Course Engagement for a course
     * @param object $course    Course object
     * @param int    $cohortid  Cohort id
     * @param string $category  Category name
     * @param int    $completed Number of users who completed course
     * @param int    $timespent Total time spent in course
     * @return object           Engagement data
     */
    public function get_engagement($course, $cohortid, $category, $completed, $timespent, $rtl) {
        global $CFG;

        $data = optional_param("data", 0, PARAM_RAW);
        $data = json_decode($data);
        $filter = isset($data->filter) ? $data->filter : array();
        $rtl = $rtl ? $rtl : (isset($filter->dir) && $filter->dir == 'rtl' ? 1 : 0);

        // Get only enrolled students.
        $enrolledstudents = \local_edwiserreports\utility::get_enrolled_students($course->id, false, $cohortid);
        $totalenrolled = count($enrolledstudents);

        // Generate course url.
        $courseurl = new moodle_url(
            "/local/edwiserreports/completion.php",
            array(
                'courseid' => $course->id
            )
        );

        // Create engagement object.
        $engagement = new stdClass();

        // Get course name with course url.
        $engagement->coursename = html_writer::tag('a', format_string($course->fullname, true, ['context' => \context_system::instance()]), ['href' => $courseurl, 'class' => 'course-link']);

        // Course category.
        $engagement->category = format_string($category, true, ['context' => \context_system::instance()]);

        // Generate enrolments link.
        $engagement->enrolment = $this->get_course_engagement_link(
            "enrolment",
            $course,
            $totalenrolled
        );

        // Generate course completion link.
        $engagement->coursecompleted = $this->get_course_engagement_link(
            "coursecompleted",
            $course,
            $completed
        );

        // Calculate completion percentage.
        $engagement->completionspercentage = $this->get_course_engagement_link(
            "coursecompleted",
            $course,
            (($totalenrolled && $completed) ? round(($completed / $totalenrolled) * 100, 2) : 0) . '%'
        );

        // Generate visits link.
        $engagement->visited = $this->get_course_engagement_link(
            "visited",
            $course,
            $this->get_course_visites($course->id, $cohortid, true)
        );

        // Generate average visits per student.
        $coursevisits = $this->get_course_visites($course->id, $cohortid);
        $visits = array_sum(array_column($coursevisits, 'visits'));

        $engagement->averagevisits = $visits && $totalenrolled ? round($visits / $totalenrolled, 2) : 0;

        // Generate timespent link.
        $engagement->timespent = $this->get_course_engagement_link(
            "timespent",
            $course,
            $timespent > 0 ? ( $rtl ? date('s:i:H', mktime(0, 0, $timespent)) : date('H:i:s', mktime(0, 0, $timespent))) : 0
        );

        // Generate Average timespent on course.
        if ($timespent > 0) {
            $averagetimespent = $totalenrolled > 0 ? round($timespent / $totalenrolled) : 0;
            $engagement->averagetimespent = $averagetimespent > 0 ? ( $rtl ? date('s:i:H', mktime(0, 0, $averagetimespent)) : date('H:i:s', mktime(0, 0, $averagetimespent))) : 0;
        } else {
            $engagement->averagetimespent = 0;
        }

        // Return engagement object.
        return $engagement;
    }

    /**
     * Get Visited users in a course
     * @param  object $course   Course Object
     * @param  object $cohortid Cohort id
     * @return array            Array of users list
     */
    public function get_visited_users($course, $cohortid) {
        $users = $this->get_course_visites($course->id, $cohortid);
        $usersdata = new stdClass();
        $usersdata->head = array(
            get_string("name", "local_edwiserreports"),
            get_string("email", "local_edwiserreports"),
            get_string("visits", "local_edwiserreports")
        );

        $usersdata->data = array();
        foreach ($users as $user) {
            $usersdata->data[] = array(
                $user->firstname . ' ' . $user->lastname,
                $user->email,
                $user->visits
            );
        }
        return $usersdata;
    }


    /**
     * Get Engagement Attributes
     * @param  string $attrname Attribute name
     * @param  object $course   Course object
     * @param  string $val      Value for link
     * @return string           HTML link
     */
    public static function get_course_engagement_link($attrname, $course, $val) {
        return html_writer::link("javascript:void(0)", $val,
            array(
                "class" => "modal-trigger",
                "data-courseid" => $course->id,
                "data-coursename" => format_string($course->fullname, true, ['context' => \context_system::instance()]),
                "data-action" => $attrname
            )
        );
    }

    /**
     * Get Enrolled users in a course
     * @param  object $course   Course Object
     * @param  object $cohortid Cohort id
     * @return array            Array of users list
     */
    public function get_enrolled_users($course, $cohortid) {
        $users = \local_edwiserreports\utility::get_enrolled_students($course->id, false, $cohortid);

        $usersdata = new stdClass();
        $usersdata->head = array(
            get_string("name", "local_edwiserreports"),
            get_string("email", "local_edwiserreports")
        );

        $usersdata->data = array();
        foreach ($users as $user) {
            $usersdata->data[] = array(
                fullname($user),
                $user->email,
            );
        }
        return $usersdata;
    }

    /**
     * Get Course Completion Information about a course
     * @param  Object  $course Course Object
     * @param  Integer $userid User Id
     * @return Array           Array of completion information
     */
    public static function get_course_completion_info($course = false, $userid = false) {
        global $COURSE, $USER;
        if (!$course) {
            $course = $COURSE;
        }

        if (!$userid) {
            $userid = $USER->id;
        }

        // Default completions is 0.
        $completioninfo = array(
            'totalactivities' => 0,
            'completedactivities' => 0,
            'progresspercentage' => 0
        );

        $coursecontext = context_course::instance($course->id);
        if (is_enrolled($coursecontext, $userid)) {
            $completion = new completion_info($course);

            if ($completion->is_enabled()) {
                $percentage = \core_completion\progress::get_course_progress_percentage($course, $userid);
                $modules = $completion->get_activities();
                $completioninfo['totalactivities'] = count($modules);
                $completioninfo['completedactivities'] = 0;
                if (!is_null($percentage)) {
                    $percentage = floor($percentage);
                    if ($percentage == 100) {
                        $completioninfo['progresspercentage'] = 100;
                        $completioninfo['completedactivities'] = count($modules);
                    } else if ($percentage > 0 && $percentage < 100) {
                        $completioninfo['progresspercentage'] = $percentage;
                        foreach ($modules as $module) {
                            $data = $completion->get_data($module, false, $userid);
                            if ($data->completionstate) {
                                $completioninfo['completedactivities']++;
                            }
                        }
                    } else {
                        $completioninfo['progresspercentage'] = 0;
                    }
                } else {
                    $completioninfo['progresspercentage'] = 0;
                }
            }
        }
        return $completioninfo;
    }

    /**
     * Get Users Who have complted atleast one activity in a course
     * @param  Object $course   Course
     * @param  Array  $users    Enrolled Users
     * @return Array            Array of Users ID who have completed a activity
     */
    public function users_completed_a_module($course, $users) {
        $records = array();

        foreach ($users as $user) {
            $completion = $this->get_course_completion_info($course, $user->id);
            if ($completion["completedactivities"] > 0) {
                $records[] = $user;
            }
        }

        return $records;
    }

    /**
     * Get users who have completed an activity
     * @param  object $course   Course Object
     * @param  object $cohortid Cohort id
     * @return array            Array of users list
     */
    public function get_users_started_an_activity($course, $cohortid) {
        $enrolledusers = \local_edwiserreports\utility::get_enrolled_students($course->id, false, $cohortid);
        $users = $this->users_completed_a_module($course, $enrolledusers);
        $usersdata = new stdClass();
        $usersdata->head = array(
            get_string("name", "local_edwiserreports"),
            get_string("email", "local_edwiserreports")
        );

        $usersdata->data = array();
        foreach ($users as $user) {
            $usersdata->data[] = array(
                fullname($user),
                $user->email,
            );
        }
        return $usersdata;
    }

    /**
     * Get users who have completed half of the course
     * @param  object $course   Course Object
     * @param  object $cohortid Cohort id
     * @return array            Array of users list
     */
    public function get_users_completed_half_courses($course, $cohortid) {
        $enrolledusers = \local_edwiserreports\utility::get_enrolled_students($course->id, false, $cohortid);

        // Get completions.
        $compobj = new \local_edwiserreports\completions();
        $completions = $compobj->get_course_completions($course->id);

        $usersdata = new stdClass();
        $usersdata->head = array(
            get_string("name", "local_edwiserreports"),
            get_string("email", "local_edwiserreports")
        );

        $usersdata->data = array();
        foreach ($enrolledusers as $user) {
            $progress = isset($completions[$user->id]->completion) ? $completions[$user->id]->completion : 0;
            if ($progress >= 50 && $progress < 100) {
                $usersdata->data[] = array(
                    fullname($user),
                    $user->email,
                );
            }
        }
        return $usersdata;
    }

    /**
     * Get users who have completed the course
     * @param  object $course   Course Object
     * @param  int    $cohortid Cohort id
     * @return array            Array of users list
     */
    public function get_users_completed_courses($course, $cohortid) {
        $enrolledusers = \local_edwiserreports\utility::get_enrolled_students($course->id, false, $cohortid);

        // Get completions.
        $compobj = new \local_edwiserreports\completions();
        $completions = $compobj->get_course_completions($course->id);

        $usersdata = new stdClass();
        $usersdata->head = array(
            get_string("name", "local_edwiserreports"),
            get_string("email", "local_edwiserreports")
        );

        $usersdata->data = array();
        foreach ($enrolledusers as $user) {
            $progress = isset($completions[$user->id]->completion) ? $completions[$user->id]->completion : 0;
            if ($progress == 100) {
                $usersdata->data[] = array(
                    fullname($user),
                    $user->email,
                );
            }
        }
        return $usersdata;
    }

    /**
     * Get Users list
     * @param  int    $courseid Course ID
     * @param  string $action   Action to get Users Data
     * @param  object $cohortid Cohort id
     * @return array            Array of users list
     */
    public function get_userslist($courseid, $action, $cohortid) {
        $course = get_course($courseid);

        switch($action) {
            case "enrolment":
                $usersdata = $this->get_enrolled_users($course, $cohortid);
                break;
            case "visited":
                $usersdata = $this->get_visited_users($course, $cohortid);
                break;
            case "activitystart":
                $usersdata = $this->get_users_started_an_activity($course, $cohortid);
                break;
            case "completedhalf":
                $usersdata = $this->get_users_completed_half_courses($course, $cohortid);
                break;
            case "coursecompleted":
                $usersdata = $this->get_users_completed_courses($course, $cohortid);
                break;
            case "timespent":
                $usersdata = $this->get_timespent_on_course($course, $cohortid);
                break;
        }
        return $usersdata;
    }

    /**
     * Get HTML table for userslist
     * @param  int    $courseid Course ID
     * @param  string $action   Action to get Users Data
     * @param  object $cohortid Cohort id
     * @return array            Array of users list
     */
    public function get_userslist_table($courseid, $action, $cohortid) {
        global $OUTPUT;
        $context = new stdClass;
        $context->searchicon = \local_edwiserreports\utility::image_icon('actions/search');
        $context->placeholder = get_string('searchuser', 'local_edwiserreports');
        $context->length = [10, 25, 50, 100];
        $filter = $OUTPUT->render_from_template('local_edwiserreports/common-table-search-filter', $context);

        $table = new html_table();
        $table->attributes = array (
            "class" => "modal-table table",
            "style" => "min-width: 100%;",
        );

        // Get userslist to display.
        $data = (object) $this->get_userslist($courseid, $action, $cohortid);

        $table->head = $data->head;
        if (!empty($data->data)) {
            $table->data = $data->data;
        }
        return $filter . html_writer::table($table);
    }

    /**
     * Get Header for report
     * @return array Header array
     */
    public function get_header_report() {
        $header = array(
            get_string('coursename', 'local_edwiserreports'),
            get_string('categoryname', 'local_edwiserreports'),
            get_string('enrolments', 'local_edwiserreports'),
            get_string('completed', 'local_edwiserreports'),
            get_string('completionspercentage', 'local_edwiserreports'),
            get_string('totalvisits', 'local_edwiserreports'),
            get_string('averagevisits', 'local_edwiserreports'),
            get_string('timespent', 'local_edwiserreports'),
            get_string('averagetimespent', 'local_edwiserreports')
        );
        return $header;
    }

    /**
     * If block is exporting any data then include this method.
     * Get Exportable data for courseengagement Block
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

        $self = new self();
        $export = [];
        $export[] = $rtl ? array_reverse($self->get_header_report()) : $self->get_header_report();

        $data = $self->get_courseengage($cohortid, $rtl);
        foreach ($data as $val) {
            $row = array();
            foreach ($val as $v) {
                $row[] = strip_tags($v);
            }
            $export[] = $rtl ? array_reverse($row) : $row;
        }
        $response = (object)[
            'data' => $export,
            'options' => [
                'orientation' => 'l',
            ]
        ];
        switch (current_language()) {
            case 'de':
            case 'es':
            case 'pl':
                $response->options['format'] = 'a1';
                break;
            case 'fr':
                $response->options['format'] = 'a2';
                break;
            case 'en':
                $response->options['format'] = 'a3';
                break;
        }
        return $response;
    }
}
