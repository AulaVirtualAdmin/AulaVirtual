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
 * Learner course progress report page.
 *
 * @package     local_edwiserreports
 * @category    reports
 * @author      Yogesh Shirsath
 * @copyright   2022 Wisdmlabs <support@wisdmlabs.com>
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace local_edwiserreports\reports;

defined('MOODLE_INTERNAL') || die();

require_once($CFG->dirroot . '/local/edwiserreports/lib.php');

use local_edwiserreports\utility;
use moodle_exception;
use context_system;
use html_writer;
use moodle_url;
use core_user;

class learnercourseprogress extends base {
    /**
     * Get Breadcrumbs for Course All courses summary
     * @return object Breadcrumbs for All courses summary
     */
    public function get_breadcrumb($filters) {

        $userid = $this->bb->get_current_user();
        $learner = isset($filters->learner) ? $filters->learner : $userid;

        $islearner = $this->is_learner($userid);
        if(!$islearner){
            return array(
                'items' => array(
                    array(
                        'item' => html_writer::link(
                            new moodle_url(
                                "/local/edwiserreports/studentengagement.php",
                            ),
                            get_string('alllearnersummary', 'local_edwiserreports'),
                            array(
                                'style' => 'margin-left: 0.5rem;'
                            )
                        )
                    ),
                    array(
                        'item' => get_string('learnercourseprogress', 'local_edwiserreports')
                    )
                )
            );
        }
        return array(
            'items' => array(
                array(
                    'item' => get_string('learnercourseprogress', 'local_edwiserreports')
                )
            )
        );
    }

    /**
     * Check if current user is learner of have higher capability.
     *
     * @param int $userid User id
     *
     * @return boolean
     */
    public function is_learner($userid = null) {
        global $USER;
        if ($userid == null) {
            $userid = $USER->id;
        }
        $learner = false;
        // Get context.
        $context = context_system::instance();
        $learnercap = 'report/edwiserreports_learner:view';
        $teachmancap = 'report/edwiserreports_learnercourseprogress:view';
        switch (true) {
            // Check capability other than student. Like manager or teacher.
            case has_capability($teachmancap, $context, $userid) || can_view_block($teachmancap, $userid):
                $learner = false;
                // Check if user has access to any group.
                $blockbase = new \local_edwiserreports\block_base();
                if (empty($blockbase->get_courses_of_user($USER->id))) {
                    throw new moodle_exception('noaccess', 'local_edwiserreports');
                }
                break;
            // Check capability for student.
            case has_capability($learnercap, $context, $userid) || can_view_block($learnercap, $userid):
                $learner = true;
                // Check if user has access to any group.
                if (empty(enrol_get_users_courses($USER->id))) {
                    throw new moodle_exception('noaccess', 'local_edwiserreports');
                }
                break;
            default:
                throw new moodle_exception(get_string('noaccess', 'local_edwiserreports'));
        }
        return $learner;
    }

    /**
     * Get filter data
     *
     * @param  int   $activecourse Active course from url.
     * @return array
     */
    public function get_filter($activelearner = 0) {
        global $USER;
        $courses = $this->bb->get_courses_of_user();
        unset($courses[SITEID]);
        $users = $this->bb->get_users_of_courses($USER->id, $courses);

        if ($activelearner == 0) {
            $activelearner = reset($users)->id;
        }

        // Invalid user.
        if (!isset($users[$activelearner])) {
            throw new moodle_exception('invaliduser', 'core_error');
        }

        $users[$activelearner]->selected = 'selected';

        return [
            'activelearner' => $activelearner,
            'learners' => array_values($users),
        ];
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
        global $DB;
        $userid = $this->bb->get_current_user();
        $learner = isset($filters->learner) ? $filters->learner : $userid;
        $rtl = isset($filters->dir) && $filters->dir == 'rtl' ? 1 : 0;
        $islearner = $this->is_learner($userid);

        // Invalid user.
        if (empty($learner) || !$DB->get_record('user', ['id' => $learner])) {
            throw new moodle_exception('invaliduser', 'core_error');
        }
        $learnercourses = enrol_get_users_courses($learner);
        if (isset($filters->learner)) {
            $usercourses = $this->bb->get_courses_of_user($userid);
            $allowedcourses = array_intersect(array_keys($learnercourses), array_keys($usercourses));
        } else {
            $allowedcourses = array_keys($learnercourses);
        }

        // Create course temporary table.
        $coursetable = utility::create_temp_table('tmp_lcp_c', $allowedcourses);

        $sql = "SELECT c.id,
                       c.fullname,
                       CASE
                            WHEN ecp.progress = 100 THEN :completed
                            WHEN ecp.progress = 0 THEN :notstarted
                            ELSE :inprogress
                       END coursestatus,
                       ue.timestart enrolledon,
                       ecp.progress,
                       gg.finalgrade,
                       ecp.totalmodules,
                       ecp.completiontime,
                       ecp.completablemods
                  FROM {{$coursetable}} ct
                  JOIN {course} c ON ct.tempid = c.id
                  JOIN {enrol} e ON c.id = e.courseid
                  JOIN {user_enrolments} ue ON e.id = ue.enrolid
                  JOIN {edwreports_course_progress} ecp ON c.id = ecp.courseid AND ue.userid = ecp.userid
                  JOIN {grade_items} gi ON c.id = gi.courseid AND gi.itemtype = :itemtype
             LEFT JOIN {grade_grades} gg ON gi.id = gg.itemid AND ue.userid = gg.userid
                 WHERE ue.userid = :learner
        ";
        $params = [
            'learner' => $learner,
            'itemtype' => 'course',
            'notstarted' => 0,
            'completed' => 1,
            'inprogress' => 2,
        ];

        if ($filters->enrolment !== 'all') {
            list($starttime, $endtime) = $this->bb->get_date_range($filters->enrolment);
            $sql .= ' AND floor(ue.timestart / 86400) between :starttime AND :endtime';
            $params['starttime'] = floor($starttime / 86400);
            $params['endtime'] = floor($endtime / 86400);
        }

        $courses = $DB->get_records_sql($sql, $params);

        // Timespent.
        $sql = "SELECT eal.course id, SUM(eal.timespent) timespent
                  FROM {{$coursetable}} ct
             LEFT JOIN {edwreports_activity_log} eal ON ct.tempid = eal.course
                 WHERE eal.userid = :userid
                 GROUP BY eal.course";
        $timespents = $DB->get_records_sql($sql, ['userid' => $learner]);

        // Calculating visits.
        $target = $DB->sql_compare_text('lsl.target');
        $sql = "SELECT ct.tempid id, COUNT(lsl.id) visits, MAX(lsl.timecreated) lastaccess
                  FROM {logstore_standard_log} lsl
                  JOIN {{$coursetable}} ct ON lsl.courseid = ct.tempid
                 WHERE lsl.userid = :userid AND lsl.action = :action
                   AND (($target = :course) OR ($target = :coursemodule AND lsl.objecttable IS NOT NULL))
                 GROUP BY ct.tempid";
        $visits = $DB->get_records_sql($sql, [
            'userid' => $learner,
            'action' => 'viewed',
            'course' => 'course',
            'coursemodule' => 'course_module'
        ]);





        // Attempted activities.
        $sql = "SELECT ct.tempid id, COUNT(DISTINCT lsl.contextinstanceid) attempt
                  FROM {{$coursetable}} ct
                  JOIN {course_modules} cm ON ct.tempid = cm.course
             LEFT JOIN {logstore_standard_log} lsl ON lsl.courseid = ct.tempid
                 WHERE lsl.userid = :userid
                   AND lsl.action = :logaction
                   AND lsl.contextlevel = :contextlevel
                 GROUP BY ct.tempid";
        $attempts = $DB->get_records_sql($sql, ['userid' => $learner, 'logaction' => 'viewed', 'contextlevel' => CONTEXT_MODULE]);

        $response = [];
        if (!$table) {
            $header = [
                get_string('course'),
                get_string('status'),
                get_string('enrolledon', 'local_edwiserreports'),
                get_string('completedon', 'local_edwiserreports'),
                get_string('lastaccess', 'local_edwiserreports'),
                get_string('progress', 'core_search'),
                get_string('grade', 'core_grades'),
                get_string('totalactivities', 'local_edwiserreports'),
                get_string('completedactivities', 'local_edwiserreports'),
                get_string('attemptedactivities', 'local_edwiserreports'),
                get_string('visits', 'local_edwiserreports'),
                get_string('timespent', 'local_edwiserreports')
            ];
            if(isset($filters->dir) && $filters->dir == 'rtl' ){
                $header = array_reverse($header);
            }
            $response[] = $header;
        }
        $status = [
            get_string('notyetstarted', 'core_completion'),
            get_string('completed', 'core_completion'),
            get_string('inprogress', 'core_completion')
        ];
        $never = get_string('never', 'local_edwiserreports');
        $search = html_writer::tag('i', '', ['class' => 'fa fa-search-plus']);
        if ($table) {
            foreach ($courses as $id => $course) {
                if (!isset($visits[$id])) {
                    $visits[$id] = (object) ['visits' => 0, 'lastaccess' => 0];
                }
                if (!isset($attempts[$id])) {
                    $attempts[$id] = (object) ['attemp' => 0];
                }
                $timespent = isset($timespents[$id]) ? $timespents[$id]->timespent : 0;
                if (!$islearner) {
                    $course->completablemods .= html_writer::link(
                        new moodle_url("/local/edwiserreports/learnercourseactivities.php", array(
                            'course' => $id,
                            'learner' => $learner
                        )),
                        $search,
                        array(
                            'style' => 'margin-left: 0.5rem;'
                        )
                    );
                }
                $response[] = [
                    "course" => format_string($course->fullname, true, ['context' => \context_system::instance()]),
                    "status" => $course->coursestatus,
                    "enrolledon" => $course->enrolledon,
                    "completedon" => isset($course->completiontime) ? $course->completiontime : '',
                    "lastaccess" => isset($visits[$id]->lastaccess) ? $visits[$id]->lastaccess : '',
                    "progress" => round($course->progress, 2) . '%',
                    "grade" => round($course->finalgrade, 2),
                    "totalactivities" => $course->completablemods,
                    "completedactivities" => $course->totalmodules,
                    "attemptedactivities" => isset($attempts[$id]->attempt) ? $attempts[$id]->attempt : 0,
                    "visits" => $visits[$id]->visits,
                    "timespent" => $timespent
                ];
            }
        } else {
            foreach ($courses as $id => $course) {
                if (!isset($visits[$id])) {
                    $visits[$id] = (object) ['visits' => 0, 'lastaccess' => 0];
                }
                if (!isset($attempts[$id])) {
                    $attempts[$id] = (object) ['attempt' => 0];
                }
                $timespent = isset($timespents[$id]) ? $timespents[$id]->timespent : 0;
                $data = [
                    format_string($course->fullname, true, ['context' => \context_system::instance()]), // Course.
                    $status[$course->coursestatus], // Status.
                    $rtl ? date("Y M d", $course->enrolledon) : date("d M Y", $course->enrolledon), // Enrolled on.
                    $course->completiontime == null ? '-' : ( $rtl ? date("Y M d", $course->completiontime) : date("d M Y", $course->completiontime)), // Completed on.
                    empty($visits[$id]->lastaccess) ? $never : ( $rtl ? date("A i:h Y M d", $visits[$id]->lastaccess) : date("d M Y h:i A", $visits[$id]->lastaccess)), // Last access.
                    round($course->progress, 2) . '%', // Progress.
                    round($course->finalgrade, 2), // Grade.
                    $course->completablemods, // Total activities.
                    $course->totalmodules, // Completed activities.
                    $attempts[$id]->attempt, // Attempted activities.
                    $visits[$id]->visits, // Visits.
                    $rtl ? date('s:i:H', mktime(0, 0, $timespent)) : date('H:i:s', mktime(0, 0, $timespent)) // Timespent.
                ];
                if(isset($filters->dir) && $filters->dir == 'rtl' && !$table ){
                    $data = array_reverse($data);
                }
                $response[] = $data;
            }
        }

        // Drop temporary tables.
        utility::drop_temp_table($coursetable);

        return $response;
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
        global $DB;
        $filter = json_decode($filter);
        if (!$filterdata) {
            $filter['enrolment'] = 'all';
        }
        $user = $DB->get_record('user', ['id' => $filter->learner]);
        if (empty($user)) {
            throw new moodle_exception('invaliduser', 'core_error');
        }

        $content = get_string('student', 'local_edwiserreports') . ': ' . fullname($user);
        if(isset($filter->dir) && $filter->dir == 'rtl' ){
            $content = fullname($user) . ': ' . get_string('student', 'local_edwiserreports');
        }

        return (object) [
            'data' => (new self())->get_data($filter, false),
            'options' => [
                'content' => $content,
                'format' => 'a3',
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
    public function get_summary_data($filters) {
        global $DB, $CFG;
        $rtl = isset($filters->dir) ? $filters->dir : get_string('thisdirection', 'langconfig');
        $rtl = $rtl == 'rtl' ? 1: 0;

        $filters->cohort = 0;
        $filters->module = 0;
        $filters->activity = 0;
        $filters->enrolment = isset($filters->enrolment) ? $filters->enrolment : 'all';

        $userid = $this->bb->get_current_user();
        $learner = isset($filters->learner) ? $filters->learner : $userid;
        $learnercourses = enrol_get_users_courses($learner);

        if (isset($filters->learner)) {
            $usercourses = $this->bb->get_courses_of_user($userid);
            $allowedcourses = array_intersect(array_keys($learnercourses), array_keys($usercourses));
        } else {
            $allowedcourses = array_keys($learnercourses);
        }

        $enrolledcourses = count($allowedcourses);

        // Create course temporary table.
        $coursetable = utility::create_temp_table('tmp_lcp_c', $allowedcourses);

        $params = array(
            'itemtype' => 'course',
            'action' => 'viewed',
            'userid' => $learner,
            'learner' => $learner
        );

        $datesql = '';
        $sitetimedatesql = '';
        // $logdatesql = '';
        if ($filters->enrolment !== 'all') {
            list($starttime, $endtime) = $this->bb->get_date_range($filters->enrolment);
            $datesql = ' AND floor(ue.timestart / 86400) between :starttime AND :endtime';
            $sitetimedatesql = ' AND floor(eal.timestart / 86400) between :starttime AND :endtime';
            // $logdatesql = ' AND floor(lsl.timecreated / 86400) between :starttime AND :endtime';
            $params['starttime'] = floor($starttime / 86400);
            $params['endtime'] = floor($endtime / 86400);

            $sql = "SELECT ct.tempid
                  FROM {{$coursetable}} ct
                  JOIN {enrol} e ON ct.tempid = e.courseid
                  JOIN {user_enrolments} ue ON e.id = ue.enrolid
                WHERE ue.userid = :userid
                AND floor(ue.timestart / 86400) between :starttime AND :endtime ";

            $courses = $DB->get_records_sql($sql, $params);
            $courses = array_keys($courses);
            $enrolledcourses = count($courses);

            // Drop coursetable.
            utility::drop_temp_table($coursetable);

            // Create course temporary table.
            $coursetable = utility::create_temp_table('tmp_lcp_c', $courses);
        }

        $sql = "SELECT ue.userid,
                       SUM(ecp.progress) progress,
                       SUM(gg.finalgrade) finalgrade,
                       SUM(gg.rawgrademax) rawgrademax
                  FROM {{$coursetable}} ct
                  JOIN {enrol} e ON ct.tempid = e.courseid
                  JOIN {user_enrolments} ue ON e.id = ue.enrolid
                  JOIN {edwreports_course_progress} ecp ON ct.tempid = ecp.courseid AND ue.userid = ecp.userid
                  JOIN {grade_items} gi ON ct.tempid = gi.courseid AND gi.itemtype = :itemtype
                  LEFT JOIN {grade_grades} gg ON gi.id = gg.itemid AND ue.userid = gg.userid
                WHERE ue.userid = :learner
                $datesql
                GROUP BY ue.userid";

        $data = $DB->get_record_sql($sql, $params);

        // Timespent on site.
        $sql = "SELECT eal.userid, SUM(eal.timespent) timespent
                FROM {edwreports_activity_log} eal
                WHERE eal.userid = :userid
                GROUP BY eal.userid";
        $timespentonsite = $DB->get_record_sql($sql, $params);

        // Timespent on course.
        $sql = "SELECT eal.userid, SUM(eal.timespent) timespent
                FROM {{$coursetable}} ct
                LEFT JOIN {edwreports_activity_log} eal ON ct.tempid = eal.course 
                WHERE eal.userid = :userid
                GROUP BY eal.userid";
        $timespentoncourse = $DB->get_record_sql($sql, $params);

        // Visits on site.
        $sql = "SELECT lsl.userid,
                    COUNT(DISTINCT lsl.id) visits,
                    MAX(lsl.timecreated) lastaccess
                FROM {logstore_standard_log} lsl
                JOIN {{$coursetable}} ct ON lsl.courseid = ct.tempid
                WHERE lsl.userid = :userid
                    AND lsl.action = :action
                    AND ((lsl.target = 'course') OR (lsl.target = 'course_module'
                    AND lsl.objecttable IS NOT NULL))
                GROUP BY lsl.userid";
        $logs = $DB->get_record_sql($sql, $params);


        // Drop coursetable.
        utility::drop_temp_table($coursetable);

        $avgprogress = $enrolledcourses > 0 ? round($data->progress / $enrolledcourses, 2) : 0;
        $gradepercentage = isset($data->rawgrademax) && $data->rawgrademax > 0 ? round($data->finalgrade / $data->rawgrademax * 100, 2) : 0;
        $coursetimespent = isset($timespentoncourse->timespent) ? ($rtl ? date('s:i:H', mktime(0, 0, $timespentoncourse->timespent)) : date('H:i:s', mktime(0, 0, $timespentoncourse->timespent))) : '00:00:00';
        $sitetimespent = isset($timespentonsite->timespent) ? ($rtl ? date('s:i:H', mktime(0, 0, $timespentonsite->timespent)) : date('H:i:s', mktime(0, 0, $timespentonsite->timespent))) : '00:00:00';
        $visits = isset($logs->visits) && $logs->visits > 0 ? $logs->visits : 0;
        $marks = isset($data->finalgrade) && $data->finalgrade > 0 ? round($data->finalgrade, 2) : 0;

        $user = core_user::get_user($learner);
        $name = $user->firstname . ' ' . $user->lastname;
        $lastaccess = empty($user->lastaccess) ? get_string('never', 'local_edwiserreports') : date("d M Y h:i A", $user->lastaccess);

        if(isset($user->suspended) && !$user->suspended){
            $active = '<span class="text-success p-1 pl-2 pr-2 ml-2" style="border-radius: 3px;background: #e8f8e5; font-size:12px;">' . get_string('active', 'local_edwiserreports').' </span>';
        } else {
            $active = '<span class="text-danger p-1 pl-2 pr-2 ml-2" style="border-radius: 3px;background-color: rgb(255, 228, 230); font-size:12px;">'. get_string('suspended', 'local_edwiserreports').'</span>';
        }

        return array(
            'header' => array(
                'learner' => true,
                'learnername' => $name,
                'isactive' => $active,
                'lastaccess' => $lastaccess
            ),
            'body' => array(
                array(
                    'title'   => get_string('visitsoncourse', 'local_edwiserreports'),
                    'data' => $visits
                ),
                array(
                    'title'   => get_string('timespentoncourseheader', 'local_edwiserreports'),
                    'data' => '<label style="direction:ltr;">' . $coursetimespent . '</label>'
                ),
                array(
                    'title'   => get_string('timespentonsite', 'local_edwiserreports'),
                    'data' => '<label style="direction:ltr;">' . $sitetimespent . '</label>'
                )
            ),
            'footer' => array(
                array(
                    'icon'  => file_get_contents($CFG->dirroot . '/local/edwiserreports/pix/summary-card/enrolledcourses.svg'),
                    'title' => get_string('enrolledcourses', 'local_edwiserreports'),
                    'data'  => $enrolledcourses
                ),
                array(
                    'icon'  => file_get_contents($CFG->dirroot . '/local/edwiserreports/pix/summary-card/completed.svg'),
                    'title' => get_string('completionprogress', 'local_edwiserreports'),
                    'data'  => $avgprogress . '%'
                ),
                array(
                    'icon'  => file_get_contents($CFG->dirroot . '/local/edwiserreports/pix/summary-card/totalmarks.svg'),
                    'title' => get_string('totalmarks', 'local_edwiserreports'),
                    'data'  => $marks
                ),
                array(
                    'icon'  => file_get_contents($CFG->dirroot . '/local/edwiserreports/pix/summary-card/grade.svg'),
                    'title' => get_string('totalgrade', 'local_edwiserreports'),
                    'data'  => $gradepercentage . '%'
                )
            )
        );
    }




}
