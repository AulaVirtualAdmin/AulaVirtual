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
use html_writer;
use moodle_url;


/**
 * Active users block.
 */
class studentengagement extends block_base {
    /**
     * Get Breadcrumbs for Course Completion
     * @return object Breadcrumbs for Course Completion
     */
    public function get_breadcrumb() {

        return array(
            'items' => array(
                array(
                    'item' => get_string('alllearnersummary', 'local_edwiserreports')
                )
            )
        );
    }

    /**
     * Prepare active users block filters
     * @return array filters array
     */
    public function get_studentengagement_courses() {
        global $USER, $COURSE, $USER, $DB;

        $courses = $this->get_courses_of_user($USER->id);

        unset($courses[$COURSE->id]);

        array_unshift($courses, (object)[
            'id' => 0,
            'fullname' => get_string('fulllistofcourses')
        ]);

        return $courses;
    }

    /**
     * Get users for more details table.
     *
     * @param int       $cohort         Cohort id
     * @param array     $coursetable    Courses table name
     * @param int       $group          Group id
     * @param int       $inactive       Filter user based on lastaccess
     * @param string    $enrolment      Date range to filter based on enrolment
     * @param string    $search         Search query
     * @param int       $start          Starting row index of page
     * @param int       $length         Number of roows per page
     * @param object    $order          Ordering of records. Supported columns[Student, Email, Status, Last access on]
     *
     * @return array
     */
    private function get_table_users($cohort, $course, $group, $inactive, $enrolment, $search, $start, $length, $order) {
        global $DB;

        $users = $this->get_user_from_cohort_course_group($cohort, $course, $group);

        // Creating temporary table.
        $userstable = utility::create_temp_table('tmp_segt_u', array_keys($users));
        $params = [];
        $condition = '';
        $logstorejoin = '';
        $fullname = $DB->sql_fullname("u.firstname", "u.lastname");
        $fields = [
            "DISTINCT u.id",
            $fullname . " student",
            "u.email"
        ];

        if ($enrolment !== 'all') {
            list($starttime, $endtime) = $this->get_date_range($enrolment);
            $conditions['enrolment'] = 'floor(ue.timestart / 86400) BETWEEN :starttime AND :endtime';
            $params['starttime'] = floor($starttime / 86400);
            $params['endtime'] = floor($endtime / 86400);
        }

        $searchquery = '';
        if (trim($search) !== '') {
            $params['search'] = "%$search%";
            $searchquery = 'AND ' . $DB->sql_like($fullname, ':search', false);
        }

        if ($course == 0) {
            $fields[] = $status = "u.suspended";
        } else {
            $fields[] = "ue.status suspended";
            $status = "ue.status";
            $conditions['enrolcompare'] = "e.courseid = :encourse";
            $params['encourse'] = $course;
        }

        $dir = $order->dir;

        // Get users by their inactiveusers.
        $actioncol = $DB->sql_compare_text('lsl.action');
        if ($course == 0) {
            $logstorejoin = "LEFT JOIN (SELECT lsl.userid, MAX(lsl.timecreated) lastaccess
                                     FROM {logstore_standard_log} lsl
                                    WHERE $actioncol = :lslaction
                                    GROUP BY lsl.userid) lsl ON u.id = lsl.userid";
        } else {
            $logstorejoin = "LEFT JOIN (SELECT lsl.userid, MAX(lsl.timecreated) lastaccess
                                     FROM {logstore_standard_log} lsl
                                    WHERE lsl.courseid = :lslcourse
                                      AND $actioncol = :lslaction
                                    GROUP BY lsl.userid) lsl ON u.id = lsl.userid";
            $params['lslcourse'] = $course;
        }
        $params['lslaction'] = 'viewed';
        $conditions['inactiveusers'] = "(lsl.lastaccess < :lastaccess OR lsl.lastaccess IS NULL)";
        $fields[] = "lsl.lastaccess";
        switch ($inactive) {
            case 1:
                $params['lastaccess'] = time() - (86400 * 7);
                break;
            case 2:
                $params['lastaccess'] = time() - (86400 * 14);
                break;
            case 3:
                $params['lastaccess'] = time() - (86400 * 30);
                break;
            case 4:
                $params['lastaccess'] = time() - (86400 * 365);
                break;
            default:
                unset($conditions['inactiveusers']);
                break;
        }

        // Ordering using column.
        switch ($order->column) {
            case 0:
                $col = $fullname;
                break;
            case 1:
                $col = "u.email";
                break;
            case 2:
                $col = $status;
                break;
            case 3:
                $col = "lsl.lastaccess";
                break;
        }

        if (!empty($conditions)) {
            $condition = " WHERE " .implode(" AND ", $conditions);
        }

        $fields = implode(", ", $fields);

        $sql = "SELECT $fields
                  FROM {enrol} e
                  JOIN {user_enrolments} ue ON e.id = ue.enrolid
                  JOIN {{$userstable}} ut ON ue.userid = ut.tempid
                  JOIN {user} u ON ut.tempid = u.id $searchquery
                  $logstorejoin
                  $condition
                  ORDER BY $col $dir";
        $users = $DB->get_records_sql($sql, $params, $start, $length);

        $countsql = "SELECT count(DISTINCT u.id)
                       FROM {enrol} e
                       JOIN {user_enrolments} ue ON e.id = ue.enrolid
                       JOIN {{$userstable}} ut ON ue.userid = ut.tempid
                       JOIN {user} u ON ut.tempid = u.id
                       $logstorejoin
                       $condition
                       ";
        $count = $DB->count_records_sql($countsql, $params);

        $countsql = "SELECT count(DISTINCT u.id)
                       FROM {enrol} e
                       JOIN {user_enrolments} ue ON e.id = ue.enrolid
                       JOIN {{$userstable}} ut ON ue.userid = ut.tempid
                       JOIN {user} u ON ut.tempid = u.id $searchquery
                       $logstorejoin
                       $condition
                       ";
        $countfiltered = $DB->count_records_sql($countsql, $params);

        // Drop temporary table.
        utility::drop_temp_table($userstable);

        return [$users, $count, $countfiltered];
    }

    /**
     * Get total timespent on lms data for table.
     *
     * @param string $userstable User table name
     *
     * @return array
     */
    private function get_table_timespentonmls($userstable) {
        global $DB;
        $sql = "SELECT al.userid id, sum(" . $DB->sql_cast_char2int("al.timespent") . ") timespent
                  FROM {{$userstable}} u
                  JOIN {edwreports_activity_log} al ON u.tempid = al.userid
                 GROUP BY al.userid";
        return $DB->get_records_sql($sql);
    }

    /**
     * Get total timespent on course data for table.
     *
     * @param string $userstable    User table name
     * @param string $coursetable   Course table name
     *
     * @return array
     */
    private function get_table_timespentoncourse($userstable, $coursetable) {
        global $DB;
        $sql = "SELECT al.userid id, sum(" . $DB->sql_cast_char2int("al.timespent") . ") timespent
                  FROM {{$coursetable}} ct
                  JOIN {edwreports_activity_log} al ON ct.tempid = al.course
                  JOIN {{$userstable}} ut ON ut.tempid = al.userid
                 GROUP BY al.userid";
        return $DB->get_records_sql($sql);
    }

    /**
     * Get total number of activities completed in course data for table.
     *
     * @param string $userstable    User table name
     * @param string $coursetable   Course table name
     *
     * @return array
     */
    private function get_table_activitiescompleted($usertable, $coursetable) {
        global $DB;
        $sql = "SELECT u.tempid id, count(cmc.id) completed
                FROM {{$coursetable}} ct
                JOIN {course_modules} cm ON ct.tempid = cm.course
                JOIN {course_modules_completion} cmc ON cm.id = cmc.coursemoduleid
                JOIN {{$usertable}} u ON cmc.userid = u.tempid
               WHERE cmc.completionstate <> 0
               GROUP BY u.tempid";
        return $DB->get_records_sql($sql);
    }

    /**
     * Get visits count on course data for table.
     *
     * @param string $userstable    User table name
     * @param string $coursetable   Course table name
     *
     * @return array
     */
    private function get_table_visitsoncourse($usertable, $coursetable) {
        global $DB;
        $params = [
            'action' => 'viewed',
            'course' => 'course',
            'coursemodule' => 'course_module'
        ];
        $target = $DB->sql_compare_text('l.target');
        $sql = "SELECT l.userid id, count(l.id) visits, MAX(l.timecreated) lastaccess
                  FROM {{$coursetable}} ct
                  JOIN {logstore_standard_log} l ON ct.tempid = l.courseid
                  JOIN {{$usertable}} ut ON ut.tempid = l.userid
                 WHERE l.action = :action
                   AND (($target = :course) OR ($target = :coursemodule AND l.objecttable IS NOT NULL))
                 GROUP BY l.userid";
        return $DB->get_records_sql($sql, $params);
    }

    /**
     * Get exportable data for report.
     *
     * @param string $userstable    User table name
     * @param string $coursetable   Course table name
     *
     * @return array
     */
    public function get_course_progress($userstable, $coursetable, $courseid = 0) {
        global $DB;

        if ($courseid == 0) {
            $sql = "SELECT ecp.userid,
                            COUNT(ecp.courseid) enrolledcourses,
                            SUM(CASE
                                WHEN ecp.progress BETWEEN 1 AND 99 THEN 1
                                ELSE 0
                            END) inprogresscourses,
                            SUM(CASE
                                WHEN ecp.progress = 100 THEN 1
                                ELSE 0
                            END) completedcourses,
                            SUM(ecp.progress) completionprogress
                      FROM {{$coursetable}} ct
                      JOIN {edwreports_course_progress} ecp ON ct.tempid = ecp.courseid
                      JOIN {{$userstable}} ut ON ecp.userid = ut.tempid
                      GROUP BY ecp.userid";
            $userprogress = $DB->get_records_sql($sql);
            foreach ($userprogress as $key => $data) {
                $data->completionprogress = $data->enrolledcourses == 0 ? 0 : $data->completionprogress / $data->enrolledcourses;
                $userprogress[$key] = $data;
            }
        } else {
            $sql = "SELECT ecp.userid,
                            1 enrolledcourses,
                            CASE
                                WHEN ecp.progress BETWEEN 1 AND 99 THEN 1
                                ELSE 0
                            END inprogresscourses,
                            CASE
                                WHEN ecp.progress = 100 THEN 1
                                ELSE 0
                            END completedcourses,
                            ecp.progress completionprogress
                      FROM {edwreports_course_progress} ecp
                      JOIN {{$userstable}} ut ON ecp.userid = ut.tempid
                     WHERE ecp.courseid = :courseid";
            $userprogress = $DB->get_records_sql($sql, ['courseid' => $courseid]);
        }
        return $userprogress;
    }

    /**
     * Get module completion details of students like assignment, quiz and scorm.
     *
     * @param string $userstable    User table name
     * @param string $coursetable   Course table name
     *
     * @return array
     */
    public function get_students_modules_completion($usertable, $coursetable) {
        global $DB;

        $assignid = $DB->get_field('modules', 'id', ['name' => 'assign']);
        $quizid = $DB->get_field('modules', 'id', ['name' => 'quiz']);
        $scormid = $DB->get_field('modules', 'id', ['name' => 'scorm']);

        $params = array(
            'assign' => $assignid,
            'quiz' => $quizid,
            'scorm' => $scormid,
            'assign1' => $assignid,
            'quiz1' => $quizid,
            'scorm1' => $scormid
        );

        $sql = "SELECT cmc.userid,
                SUM(CASE
                        WHEN cm.module = :assign THEN 1
                        ELSE 0
                    END) assign,
                SUM(CASE
                        WHEN cm.module = :quiz THEN 1
                        ELSE 0
                    END) quiz,
                SUM(CASE
                        WHEN cm.module = :scorm THEN 1
                        ELSE 0
                    END) scorm
                FROM {course_modules} cm
                JOIN {{$coursetable}} ct ON cm.course = ct.tempid
                JOIN {course_modules_completion} cmc ON cm.id = cmc.coursemoduleid
                JOIN {{$usertable}} ut ON cmc.userid = ut.tempid
               WHERE cm.module IN (:assign1, :quiz1, :scorm1)
                 AND cmc.completionstate > 0
               GROUP BY cmc.userid";

        $usersmodulecompletion = $DB->get_records_sql($sql, $params);
        return $usersmodulecompletion;
    }

    /**
     * Get users grades
     *
     * @param string $userstable    User table name
     * @param string $coursetable   Course table name
     *
     * @return array           Users Data Array
     */
    public function get_users_grades($usertable, $coursetable) {
        global $DB;

        $sql = "SELECT gg.userid, SUM(gg.finalgrade) grade
                  FROM {{$coursetable}} ct
                  JOIN {grade_items} gi ON ct.tempid = gi.courseid
                  JOIN {grade_grades} gg ON gi.id = gg.itemid
                  JOIN {{$usertable}} ut ON ut.tempid = gg.userid
                 WHERE gg.finalgrade IS NOT null
                   AND gi.itemtype = :itemtype
              GROUP BY gg.userid";

        return $DB->get_records_sql($sql, ['itemtype' => 'course']);
    }

    /**
     * Get student engagement table data based on filters
     *
     * @param object $filter Table filters.
     *
     * @return array
     */
    public function get_table_data($filter) {
        global $COURSE;

        $cohort = isset($filter->cohort) ? (int)$filter->cohort : 0;
        $course = (int)$filter->course;
        $group = isset($filter->group) ? (int)$filter->group : 0;
        $inactive = (int)$filter->inactive;
        $enrolment = $filter->enrolment;
        $search = $filter->search;
        $start = (int)$filter->start;
        $length = (int)$filter->length;
        $table = isset($filter->table) ? $filter->table : true;
        $rtl = isset($filter->dir) && $filter->dir == 'rtl' ? 1 : 0;
        $order = isset($filter->order) ? $filter->order : (object)['column' => 0, 'dir' => 'asc'];

        $userid = $this->get_current_user();

        if ($course === 0) {
            $courses = $this->get_courses_of_user($userid);
            unset($courses[$COURSE->id]);
        } else {
            $courses = [$course => 'Dummy'];
        }

        list($users, $count, $countfiltered) = $this->get_table_users(
            $cohort,
            $course,
            $group,
            $inactive,
            $enrolment,
            $search,
            $start,
            $length,
            $order
        );

        // Temporary course table.
        $coursetable = utility::create_temp_table('tmp_se_c', array_keys($courses));

        // Temporary user table.
        $usertable = utility::create_temp_table('tmp_se_u', array_keys($users));

        $timespentonlms = $this->get_table_timespentonmls($usertable);
        $timespentoncourse = $this->get_table_timespentoncourse($usertable, $coursetable);
        $activitiescompleted = $this->get_table_activitiescompleted($usertable, $coursetable);
        $visitsoncourse = $this->get_table_visitsoncourse($usertable, $coursetable);
        $userprogress = $this->get_course_progress($usertable, $coursetable, $course);
        $usersmodulecompletion = $this->get_students_modules_completion($usertable, $coursetable);
        $usergrades = $this->get_users_grades($usertable, $coursetable);

        $status = array(
            get_string('active', 'local_edwiserreports'),
            get_string('suspended', 'local_edwiserreports'),
        );

        $never = get_string('never', 'local_edwiserreports');
        $response = [];
        $defaultprogress = (object)[
            'enrolledcourses' => 0,
            'inprogresscourses' => 0,
            'completedcourses' => 0,
            'completionprogress' => 0
        ];
        $defaultcompletion = (object) [
            'assign' => 0,
            'quiz' => 0,
            'scorm' => 0,
        ];
        $defaultvisits = (object) [
            'lastaccess' => 0,
            'visits' => 0,
        ];
        $search = html_writer::tag('i', '', ['class' => 'fa fa-search-plus']);
        foreach ($users as $key => $user) {
            if (!isset($userprogress[$key])) {
                $userprogress[$key] = $defaultprogress;
            }
            $progress = $userprogress[$key];
            if (!isset($usersmodulecompletion[$key])) {
                $usersmodulecompletion[$key] = $defaultcompletion;
            }
            $completion = $usersmodulecompletion[$key];
            if (!isset($visitsoncourse[$key])) {
                $visitsoncourse[$key] = $defaultvisits;
            }
            $visits = $visitsoncourse[$key];
            $data = [
                'student' => $user->student,
                'email' => $user->email,
                'status' => $table ? $user->suspended : $status[$user->suspended]
            ];
            $data['lastaccesson'] = $user->lastaccess == 0 ? $never : ($rtl  ? '<div style="direction:ltr;">'. date('Y M d', $user->lastaccess) . '<br>' . date('A i:h', $user->lastaccess) . '</div>' : date('d M Y h:i A', $user->lastaccess));

            if ($course == 0 || $table) {
                $data['enrolledcourses'] = $progress->enrolledcourses;
                $data['inprogresscourses'] = $progress->inprogresscourses;
                $data['completedcourses'] = $progress->completedcourses;
            }
            $data['completionprogress'] = round($progress->completionprogress, 2) . '%';
            $data['totalgrade'] = isset($usergrades[$key]) ? round($usergrades[$key]->grade, 2) : 0;
            $data['timespentonlms'] = isset($timespentonlms[$key]) ? $timespentonlms[$key]->timespent : 0;
            $data['timespentoncourse'] = isset($timespentoncourse[$key]) ? $timespentoncourse[$key]->timespent : 0;
            $data['activitiescompleted'] = isset($activitiescompleted[$key]) ? $activitiescompleted[$key]->completed : 0;
            $data['visitsoncourse'] = $visits->visits;
            $data['completedassignments'] = $completion->assign;
            $data['completedquizzes'] = $completion->quiz;
            $data['completedscorms'] = $completion->scorm;
            if (!$table) {
                $data['timespentonlms'] = $rtl ? date('s:i:H', mktime(0, 0, $data['timespentonlms'])) : date('H:i:s', mktime(0, 0, $data['timespentonlms']));
                $data['timespentoncourse'] = $rtl ? date('s:i:H', mktime(0, 0, $data['timespentoncourse'])) : date('H:i:s', mktime(0, 0, $data['timespentoncourse']));
            } else {
                $data['enrolledcourses'] .= html_writer::link(
                    new moodle_url(
                        "/local/edwiserreports/learnercourseprogress.php",
                        array("learner" => $key)
                    ),
                    $search,
                    array(
                        'style' => 'margin-left: 0.5rem;'
                    )
                );
            }
            unset($users[$key]);
            if(isset($filter->dir) && $filter->dir == 'rtl' && !$table ){
                $data = array_reverse($data);
            }
            $response[] = $table ? $data : array_values($data);
        }

        // Droppping course table.
        utility::drop_temp_table($coursetable);

        // Droppping user table.
        utility::drop_temp_table($usertable);

        return [
            "data" => $response,
            "recordsTotal" => $count,
            "recordsFiltered" => $countfiltered
        ];
    }

    /**
     * Get exportable data for report.
     * @param  string $filter     Filter to apply on data
     * @param  bool   $filterdata If enabled then filter data
     * @return array
     */
    public static function get_exportable_data_report($filter, $filterdata = true) {
        $filter = json_decode($filter);
        if (!$filterdata) {
            $filter->cohort = 0;
            $filter->course = 0;
            $filter->group = 0;
        }

        $filter->search = "";
        $filter->start = 0;
        $filter->length = 0;
        $filter->table = false;


        $obj = new self();

        $header = [
            get_string('student', 'local_edwiserreports'),
            get_string('email', 'local_edwiserreports'),
            get_string('status', 'local_edwiserreports'),
            get_string('lastaccesson', 'local_edwiserreports')
        ];

        if ($filter->course == 0) {
            $header = array_merge($header, [
                get_string('enrolledcourses', 'local_edwiserreports'),
                get_string('inprogresscourse', 'local_edwiserreports'),
                get_string('completecourse', 'local_edwiserreports')
            ]);
        }
        $header = array_merge($header, [
            get_string('completionprogress', 'local_edwiserreports'),
            get_string('totalgrade', 'local_edwiserreports'),
            get_string('timespentonlms', 'local_edwiserreports'),
            get_string('timespentoncourse', 'local_edwiserreports'),
            get_string('activitiescompleted', 'local_edwiserreports'),
            get_string('visitsoncourse', 'local_edwiserreports'),
            get_string('completedassign', 'local_edwiserreports'),
            get_string('completedquiz', 'local_edwiserreports'),
            get_string('completedscorm', 'local_edwiserreports')
        ]);

        if(isset($filter->dir) && $filter->dir == 'rtl'){
            $header = array_reverse($header);
        }

        $data = $obj->get_table_data($filter)['data'];
        array_unshift($data, $header);

        return (object) [
            'data' => $data,
            'options' => [
                'format' => 'a4',
                'orientation' => 'l',
            ]
        ];
    }


    
    /**
     * Get Exportable data for Course Completion Page
     * @param  string $filters    Filter string
     * @param  bool   $filterdata If enabled then filter data
     * @return array              Array of LP Stats
     */
    public function get_summary_data($filters, $filterdata = true) {
        global $DB, $CFG, $COURSE;

        $filters->course = isset($filters->course) ? (int)$filters->course : 0;
        $filters->cohort = isset($filters->cohort) ? (int)$filters->cohort : 0;
        $filters->group = isset($filters->group) ? (int)$filters->group : 0;
        $filters->module = 0;
        $filters->activity = 0;
        $filters->search = "";
        $filters->start = 0;
        $filters->length = 0;
        $filters->table = false;
        $filters->inactive = 'all';
        $filters->enrolment = isset($filters->enrolment) ? $filters->enrolment : 'all';
        $filters->order = (object)['column' => 0, 'dir' => 'asc'];
        $rtl = isset($filters->dir) ? $filters->dir : get_string('thisdirection', 'langconfig');
        $rtl = $rtl == 'rtl' ? 1: 0;

        $userid = $this->get_current_user();

        list($users, $count, $countfiltered) = $this->get_table_users(
            $filters->cohort,
            $filters->course,
            $filters->group,
            $filters->inactive,
            $filters->enrolment,
            $filters->search,
            $filters->start,
            $filters->length,
            $filters->order
        );

        $params = array();
        $logdatesql = '';
        if ($filters->enrolment !== 'all') {
            list($starttime, $endtime) = $this->get_date_range($filters->enrolment);
            $timedatesql = ' WHERE floor(eal.timestart / 86400) between :starttime AND :endtime';
            $logdatesql = ' AND floor(lsl.timecreated / 86400) between :starttime AND :endtime';
            $params['starttime'] = floor($starttime / 86400);
            $params['endtime'] = floor($endtime / 86400);
        }

        if ($filters->course === 0) {
            $courses = $this->get_courses_of_user($userid);
            unset($courses[$COURSE->id]);
        } else {
            // $courses = [$course => 'Dummy'];
            $courses = array($filters->course => array('id' => $filters->course));
        }

        // Temporary course table.
        $coursetable = utility::create_temp_table('tmp_se_c', array_keys($courses));

        // Temporary user table.
        $usertable = utility::create_temp_table('tmp_se_u', array_keys($users));


        // Timespent on site.
        $sql = "SELECT SUM(eal.timespent) timespent
                FROM {edwreports_activity_log} eal
                JOIN {{$usertable}} ut ON eal.userid = ut.tempid 
                JOIN {{$coursetable}} ct ON ct.tempid = eal.course
                ";
        $timespentonsite = $DB->get_record_sql($sql, $params);

        // Total visits.
        $params['course'] = 'course';
        $params['coursemodule'] = 'course_module';
        $target = $DB->sql_compare_text('lsl.target');
        $sql = "SELECT COUNT(lsl.courseid) visits
                FROM {logstore_standard_log} lsl
                JOIN {{$usertable}} ut ON lsl.userid = ut.tempid 
                JOIN {{$coursetable}} ct ON lsl.courseid = ct.tempid
                WHERE lsl.action = 'viewed'
                   AND (($target = :course) OR ($target = :coursemodule AND lsl.objecttable IS NOT NULL))
                ";
        $visits = $DB->get_record_sql($sql, $params);

        // Drop userstable
        utility::drop_temp_table($usertable);

        $enrolled = count($users);
        $visits = $visits->visits ? $visits->visits : 0;
        $avgvisits = $enrolled > 0 ? round($visits / $enrolled, 2) : 0;
        $avgtimespent = isset($timespentonsite->timespent) && $enrolled > 0 ? round($timespentonsite->timespent / $enrolled, 2) : 0;
        $spenttime = isset($timespentonsite->timespent) ? ($rtl ? date('s:i:H', mktime(0, 0, $timespentonsite->timespent)) : date('H:i:s', mktime(0, 0, $timespentonsite->timespent)) ) : '00:00:00';
        $avgtimespent = $rtl ? date('s:i:H', mktime(0, 0, $avgtimespent)) : date('H:i:s', mktime(0, 0, $avgtimespent));

        return array(
            'body' => array(
                array(
                    'title'   => get_string('totalvisits', 'local_edwiserreports'),
                    'data' => $visits
                ),
                array(
                    'title'   => get_string('avgvisits', 'local_edwiserreports'),
                    'data' => ceil($avgvisits)
                )
            ),
            'footer' => array(
                array(                    
                    'icon'  => file_get_contents($CFG->dirroot . '/local/edwiserreports/pix/summary-card/learners.svg'),
                    'title' => get_string('totallearners', 'local_edwiserreports'),
                    'data'  => $count
                ),
                array(                    
                    'icon'  => file_get_contents($CFG->dirroot . '/local/edwiserreports/pix/summary-card/time.svg'),
                    'title' => get_string('totaltimespentoncourse', 'local_edwiserreports'),
                    'data'  => '<label style="direction:ltr;">' . $spenttime . '</label>'
                ),
                array(                    
                    'icon'  => file_get_contents($CFG->dirroot . '/local/edwiserreports/pix/summary-card/avgtime.svg'),
                    'title' => get_string('avgtimespentoncourse', 'local_edwiserreports'),
                    'data'  => '<label style="direction:ltr;">' . $avgtimespent . '</label>'
                )
            )
        );
    }
}
