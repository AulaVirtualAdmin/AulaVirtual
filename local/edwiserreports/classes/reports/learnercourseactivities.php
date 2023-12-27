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
 * Learner course activities report page.
 *
 * @package     local_edwiserreports
 * @category    reports
 * @author      Yogesh Shirsath
 * @copyright   2022 Wisdmlabs <support@wisdmlabs.com>
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace local_edwiserreports\reports;

use core_course_category;
use moodle_exception;
use html_writer;
use moodle_url;
use core_user;

class learnercourseactivities extends base {

    /**
     * Get Breadcrumbs for Course All courses summary
     * @return object Breadcrumbs for All courses summary
     */
    public function get_breadcrumb() {
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
                    'item' => html_writer::link(
                        new moodle_url(
                            "/local/edwiserreports/learnercourseprogress.php",
                        ),
                        get_string('learnercourseprogress', 'local_edwiserreports'),
                        array(
                            'style' => 'margin-left: 0.5rem;'
                        )
                    )
                ),
                array(
                    'item' => get_string('learnercourseactivities', 'local_edwiserreports')
                )
            )
        );
    }

    /**
     * Get filter data
     *
     * @param  int   $activecourse  Active course from url.
     * @param  int   $activelearner    Active user from url.
     * @return array
     */
    public function get_filter($activecourse, $activelearner = 0) {
        global $USER;

        $courses = $this->bb->get_courses_of_user();
        unset($courses[SITEID]);

        if ($activecourse == 0) {
            $activecourse = reset($courses)->id;
        }

        // Invalid course.
        if (!isset($courses[$activecourse])) {
            throw new moodle_exception('invalidcourse', 'core_error');
        }

        $courses[$activecourse]->selected = 'selected';

        $users = $this->bb->get_user_from_cohort_course_group(0, $activecourse, 0, $USER->id);

        if ($activelearner == 0 && !empty($users)) {
            $activelearner = reset($users)->id;
        }

        // Invalid user.
        if (isset($users[$activelearner])) {
            $users[$activelearner]->selected = 'selected';
        }

        $categories = core_course_category::make_categories_list();
        $coursecategories = [];
        foreach ($categories as $id => $name) {
            $coursecategories[$id] = [
                'id' => $id,
                'name' => $name,
                'visible' => false,
                'courses' => []
            ];
        }
        $courses[$activecourse]->selected = 'selected';
        foreach ($courses as $id => $course) {
            $coursecategories[$course->category]['visible'] = true;
            $coursecategories[$course->category]['courses'][] = $course;
        }

        return [
            'activecourse' => $activecourse,
            'activelearner' => $activelearner,
            'students' => array_values($users),
            'coursecategories' => array_values($coursecategories),
            'sections' => $this->get_sections($activecourse),
            'modules' => $this->get_modules($activecourse)
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

        // Invalid course.
        if ($filters->course == 0 || !$DB->get_record('course', ['id' => $filters->course])) {
            throw new moodle_exception('invalidcourse', 'core_error');
        }

        // Invalid user.
        if ($filters->learner != 0 && !$DB->get_record('user', ['id' => $filters->learner])) {
            throw new moodle_exception('invaliduser', 'core_error');
        }

        $rtl = isset($filters->dir) && $filters->dir == 'rtl' ? 1 : 0;
        $params = ['course' => $filters->course, 'userid' => $filters->learner];
        $datesql = '';
        if (isset($filters->enrolment) && $filters->enrolment !== 'all') {
            list($starttime, $endtime) = $this->bb->get_date_range($filters->enrolment);
            $datesql = ' AND floor(cmc.timemodified / 86400) between :starttime AND :endtime';
            $params['starttime'] = floor($starttime / 86400);
            $params['endtime'] = floor($endtime / 86400);
        }

        $sql = "SELECT cm.id, cmc.timemodified completedon
                  FROM {course_modules} cm
                  JOIN {modules} m ON cm.module = m.id
             LEFT JOIN {course_modules_completion} cmc ON cm.id = cmc.coursemoduleid
                 WHERE cm.course = :course
                 AND cmc.userid = :userid
                 $datesql";

        if ($filters->section != 0) {
            $sql .= " AND cm.section = :section";
            $params['section'] = $filters->section;
        }
        if ($filters->module != 'all') {
            $sql .= " AND m.name = :module";
            $params['module'] = $filters->module;
        }
        $coursemodules = $DB->get_records_sql($sql, $params);

        // Calculating completion.
        $sql = "SELECT cm.id, cmc.timemodified completedon
                  FROM {course_modules} cm
             LEFT JOIN {course_modules_completion} cmc ON cm.id = cmc.coursemoduleid
                 WHERE cm.course = :course
                   AND cmc.userid = :userid
                   AND cmc.completionstate > 0";
        $completions = $DB->get_records_sql($sql, ['course' => $filters->course, 'userid' => $filters->learner]);

        // Calculating grades and timespent.
        // $sql = "SELECT cm.id, gg.finalgrade, gg.timemodified, SUM(eal.timespent) timespent
        $sql = "SELECT cm.id, gg.finalgrade, gg.timemodified, SUM(eal.timespent) timespent
                  FROM {course_modules} cm
                  JOIN {modules} m ON cm.module = m.id
                  LEFT JOIN {edwreports_activity_log} eal ON cm.course = eal.course
                                                    AND cm.id = eal.activity
                                                    AND eal.userid = :userid
             LEFT JOIN {grade_items} gi ON cm.course = gi.courseid
                                       AND m.name = gi.itemmodule
                                       AND cm.instance = gi.iteminstance
                                       AND gi.itemtype = :type
             LEFT JOIN {grade_grades} gg ON gi.id = gg.itemid
                                        AND gg.userid = :userid1
                 WHERE cm.course = :course
              GROUP BY cm.id, gg.finalgrade, gg.timemodified
        ";
        $gradetimes = $DB->get_records_sql($sql, [
            'course' => $filters->course,
            'userid' => $filters->learner,
            'userid1' => $filters->learner,
            'type' => "mod"
        ]);



        // Calculating visits.
        $target = $DB->sql_compare_text('lsl.target');
        $sql = "SELECT lsl.contextinstanceid,
                        MAX(lsl.timecreated) lastaccess,
                        MIN(lsl.timecreated) firstaccess,
                       COUNT(lsl.id) visits
                  FROM {logstore_standard_log} lsl
                 WHERE lsl.courseid = :course
                   AND lsl.userid = :userid
                   AND $target = :coursemodule AND lsl.objecttable IS NOT NULL
              GROUP BY lsl.contextinstanceid";
        $visits = $DB->get_records_sql($sql, [
            'course' => $filters->course,
            'action' => 'viewed',
            'userid' => $filters->learner,
            'coursemodule' => 'course_module',
        ]);


        $quizid = $DB->get_field('modules', 'id', ['name' => 'quiz']);

        // Quiz submissions.
        $sql = "SELECT cm.id, q.sumgrades, q.grade, COUNT(qa.id) attempts, MAX(qa.sumgrades) highest, MIN(qa.sumgrades) lowest
                  FROM {course_modules} cm
                  JOIN {quiz} q ON cm.instance = q.id AND cm.course = q.course
                  JOIN {quiz_attempts} qa ON cm.instance = qa.quiz
                 WHERE cm.course = :course
                   AND cm.module = :module
                   AND qa.userid = :userid
              GROUP BY cm.id, q.sumgrades, q.grade";
        $quizattempts = $DB->get_records_sql($sql, [
            'course' => $filters->course,
            'module' => $quizid,
            'userid' => $filters->learner
        ]);

        $response = [];
        if (!$table) {
            $header = [
                get_string('activity', 'local_edwiserreports'),
                get_string('type', 'core_search'),
                get_string('status'),
                get_string('completedon', 'local_edwiserreports'),
                get_string('grade', 'core_grades'),
                get_string('gradedon', 'local_edwiserreports'),
                get_string('attempts', 'local_edwiserreports'),
                get_string('aggregatemax', 'core_grades'),
                get_string('aggregatemin', 'core_grades'),
                get_string('firstaccess', 'local_edwiserreports'),
                get_string('lastaccess', 'local_edwiserreports'),
                get_string('visits', 'local_edwiserreports'),
                get_string('timespent', 'local_edwiserreports')
            ];
            if(isset($filters->dir) && $filters->dir == 'rtl' ){
                $header = array_reverse($header);
            }
            $response[] = $header;
        }
        $never = get_string('never', 'local_edwiserreports');
        $statuses = [
            get_string('notyetstarted', 'core_completion'),
            get_string('completed', 'core_completion'),
            get_string('inprogress', 'core_completion')
        ];

        $cms = get_fast_modinfo($filters->course)->get_cms();

        foreach (array_keys($coursemodules) as $cmid) {
            if (!isset($cms[$cmid])) {
                continue;
            }
            $cm = $cms[$cmid];

            // Visit.
            if (isset($visits[$cmid])) {
                $visit = $visits[$cmid];
            } else {
                $visit = (object) [
                    'visits' => 0,
                    'firstaccess' => 0,
                    'lastaccess' => 0
                ];
            }

            switch (true) {
                case isset($completions[$cmid]):
                    $completion = $completions[$cmid]->completedon;
                    $status = 1;
                    break;
                case $visit->visits > 0:
                    $completion = 0;
                    $status = 2;
                    break;
                case $visit->visits == 0:
                    $completion = 0;
                    $status = 0;
                    break;
            }

            if ($filters->completion == "completed_y" && $completion == '-') {
                // Skip non completed activities when completion filter set to Completed activities only.
                continue;
            } else if ($filters->completion == "completed_n" && $completion != '-') {
                // Skip completed activities when completion filter set to Non completed activities only.
                continue;
            }

            // Grade and timespent.
            if (isset($gradetimes[$cmid])) {
                $gradetime = $gradetimes[$cmid];
            } else {
                $gradetime = (object) [
                    'finalgrade' => 0,
                    'timemodified' => 0,
                    'timespent' => 0
                ];
            }

            switch (true) {
                case isset($quizattempts[$cmid]):
                    $attempt = $quizattempts[$cmid];
                    $attempts = $attempt->attempts;
                    $highestgrade = $attempt->highest / $attempt->sumgrades * $attempt->grade;
                    $lowestgrade = $attempt->lowest / $attempt->sumgrades * $attempt->grade;
                    break;
                case isset($completions[$cmid]):
                    $attempts = 1;
                    $highestgrade = $lowestgrade = $gradetime->finalgrade;
                    break;
                default:
                    $attempts = 0;
                    $highestgrade = $lowestgrade = 0;
                    break;
            }
            $completedon = $completion;
            $gradedon = (empty($gradetime->timemodified) ? 0 : $gradetime->timemodified);
            $firstaccess = ($visit->visits > 0 ? $visit->firstaccess : 0);
            $lastaccess = ($visit->visits > 0 ? $visit->lastaccess : 0);
            $timespent = $gradetime->timespent;

            if(!$table){
                $completedon = $completion == 0 ? '-' : ($rtl ? date("Y M d", $completion) : date("d M Y", $completion));
                $gradedon = empty($gradetime->timemodified) ? '-' : ($rtl ? date("Y M d", $gradetime->timemodified) : date("d M Y", $gradetime->timemodified));
                $firstaccess = $visit->visits > 0 ? ($rtl ? date("A i:h Y M d", $visit->firstaccess) : date("d M Y h:i A", $visit->firstaccess)) : $never;
                $lastaccess = $visit->visits > 0 ? ($rtl ? date("A i:h Y M d", $visit->lastaccess) : date("d M Y h:i A", $visit->lastaccess)) : $never;
                $timespent = $rtl ? date('s:i:H', mktime(0, 0, $gradetime->timespent)) : date('H:i:s', mktime(0, 0, $gradetime->timespent));
            }

            $data = [
                'activity' => format_string($cm->name, true, ['context' => \context_system::instance()]),
                'type' => get_string('pluginname', 'mod_' . $cm->modname),
                'status' => $table ? $status : $statuses[$status],
                'completedon' => $completedon,
                'grade' => round($gradetime->finalgrade, 2),
                'gradedon' => $gradedon,
                'attempts' => $attempts,
                'highestgrade' => round($highestgrade, 2),
                'lowestgrade' => round($lowestgrade, 2),
                'firstaccess' => $firstaccess,
                'lastaccess' => $lastaccess,
                'visits' => $visit->visits,
                'timespent' => $timespent,
            ];
            if(isset($filters->dir) && $filters->dir == 'rtl' && !$table ){
                $data = array_reverse($data);
            }
            $response[] = $table ? $data : array_values($data);
        }

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
            $filter["section"] = "all";
            $filter["module"] = "all";
            $filter["completion"] = "all";
        }

        $course = $DB->get_record('course', ['id' => $filter->course]);
        if (empty($course)) {
            throw new moodle_exception('invalidcourse', 'core_error');
        }

        $user = $DB->get_record('user', ['id' => $filter->learner]);
        if (empty($course)) {
            throw new moodle_exception('invaliduser', 'core_error');
        }
        $content = get_string('learnercourseactivitiespdfcontent', 'local_edwiserreports', [
            'course' => format_string($course->fullname, true, ['context' => \context_system::instance()]),
            'student' => fullname($user)
        ]);
        if(isset($filter->dir) && $filter->dir == 'rtl' ){
            $content = get_string('learnercourseactivitiespdfcontent', 'local_edwiserreports', [
                'course' => format_string($course->fullname, true, ['context' => \context_system::instance()]),
                'student' => fullname($user)
            ]);
        }

        $obj = new self();
        return (object) [
            'data' => $obj->get_data($filter, false),
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
    public function get_summary_data($filters, $filterdata = true) {
        global $DB, $CFG;

        $rtl = isset($filters->dir) ? $filters->dir : get_string('thisdirection', 'langconfig');
        $rtl = $rtl == 'rtl' ? 1: 0;

        // Invalid course.
        if ($filters->course == 0 || !$DB->get_record('course', ['id' => $filters->course])) {
            throw new moodle_exception('invalidcourse', 'core_error');
        }

        // Invalid user.
        if ($filters->learner != 0 && !$DB->get_record('user', ['id' => $filters->learner])) {
            throw new moodle_exception('invaliduser', 'core_error');
        }


        $params = ['course' => $filters->course, 'userid' => $filters->learner];
        // $params = ['course' => $filters->course];

        $datesql = '';
        if (isset($filters->enrolment) && $filters->enrolment !== 'all') {
            list($starttime, $endtime) = $this->bb->get_date_range($filters->enrolment);
            $datesql = ' AND floor(cmc.timemodified / 86400) between :starttime AND :endtime';
            $params['starttime'] = floor($starttime / 86400);
            $params['endtime'] = floor($endtime / 86400);
        }

        $sql = "SELECT cm.id, cmc.timemodified completedon
                    FROM {course_modules} cm
                    JOIN {modules} m ON cm.module = m.id
                LEFT JOIN {course_modules_completion} cmc ON cm.id = cmc.coursemoduleid
                    WHERE cm.course = :course
                    AND cmc.userid = :userid
                    $datesql";

        if (isset($filters->section) && $filters->section != 0) {
            $sql .= " AND cm.section = :section";
            $params['section'] = $filters->section;
        }
        if (isset($filters->module) && $filters->module != 'all') {
            $sql .= " AND m.name = :module";
            $params['module'] = $filters->module;
        }
        $coursemodules = $DB->get_records_sql($sql, $params);
        $totalmodules = is_array($coursemodules) ? array_keys($coursemodules) : 0;
        $totalmodulesquery = '';
        $timespentmodulequery = '';
        if(count($totalmodules) && isset($filters->section) && $filters->section != 0){
            $totalmodulesquery = "AND lsl.contextinstanceid IN(". implode(', ', $totalmodules) .")";
            $timespentmodulequery = "AND cm.id IN(". implode(', ', $totalmodules) .")";
        }
        $sql = "SELECT ue.userid,
                        c.fullname,
                       ue.timestart enrolledon,
                       SUM(logs.visits) visits,
                       SUM(gg.finalgrade) finalgrade,
                       SUM(gg.rawgrademax) rawgrademax,
                       SUM(ecp.completiontime) completiontime
                  FROM {course} c 
                  JOIN {enrol} e ON c.id = e.courseid
                  JOIN {user_enrolments} ue ON e.id = ue.enrolid
                  JOIN {edwreports_course_progress} ecp ON c.id = ecp.courseid AND ue.userid = ecp.userid
                  JOIN {grade_items} gi ON gi.courseid = :course AND gi.itemtype = :itemtype
                  LEFT JOIN {grade_grades} gg ON gi.id = gg.itemid AND ue.userid = gg.userid
                  LEFT JOIN (SELECT lsl.courseid courseid,
                        COUNT(lsl.id) visits,
                        MAX(lsl.timecreated) lastaccess
                    FROM {logstore_standard_log} lsl
                    JOIN {course} ct ON lsl.courseid = ct.id
                    WHERE lsl.userid = :userid AND lsl.action = :action
                        AND ((lsl.target = 'course') OR (lsl.target = 'course_module' AND lsl.objecttable IS NOT NULL))
                        $totalmodulesquery
                    GROUP BY courseid) logs ON logs.courseid = c.id
                WHERE ue.userid = :learner AND c.id = :courseid
                GROUP BY ue.userid, c.fullname, ue.timestart";

        $params = array(
            'itemtype' => 'course',
            'action' => 'viewed',
            'courseid' => $filters->course,
            'course' => $filters->course,
            'userid' => $filters->learner,
            'learner' => $filters->learner
        );

        // $users = $DB->get_records_sql($sql, $params);
        $data = $DB->get_record_sql($sql, $params);

        // Calculating timespent.
        $sql = "SELECT cm.course,
                        SUM(eal.timespent) timespent
                    FROM {course_modules} cm
                    JOIN {modules} m ON cm.module = m.id
                    JOIN {edwreports_activity_log} eal ON eal.course = :courseid
                                                    AND cm.id = eal.activity
                                                    AND eal.userid = :userid
                    WHERE cm.course = :course
                    $timespentmodulequery
                    GROUP BY cm.course
                    ";
        $timespent = $DB->get_record_sql($sql, [
            'course' => $filters->course,
            'courseid' => $filters->course,
            'userid' => $filters->learner,
            'userid1' => $filters->learner,
            'type' => "mod"
        ]);

        $spenttime = isset($timespent->timespent) ? date('H:i:s', mktime(0, 0, $timespent->timespent)) : '00:00:00';


        // calculating visits
        $target = $DB->sql_compare_text('lsl.target');
        $sql = "SELECT lsl.courseid courseid,
                    COUNT(lsl.id) visits,
                    MAX(lsl.timecreated) lastaccess
                FROM {logstore_standard_log} lsl
                WHERE lsl.userid = :userid
                    AND lsl.courseid = :courseid
                    AND lsl.action = :action
                   AND (($target = :course) OR ($target = :coursemodule AND lsl.objecttable IS NOT NULL))
                GROUP BY lsl.courseid";
        $visitsdata = $DB->get_record_sql($sql, [
            'action' => 'viewed',
            'course' => 'course',
            'coursemodule' => 'course_module',
            'courseid' => $filters->course,
            'userid' => $filters->learner,
        ]);

        $visits = isset($data->visits) && $data->visits > 0 ? $data->visits : 0;
        $lastaccess = empty($visitsdata->lastaccess) ? 0 : $visitsdata->lastaccess;

        if (!isset($filters->section) || $filters->section == 0) {
            $sql = "SELECT eal.course, SUM(eal.timespent) totaltime
                FROM {edwreports_activity_log} eal 
                WHERE eal.course = :courseid
                AND eal.userid = :userid
                GROUP BY eal.course
            ";
            $timespent = $DB->get_record_sql($sql, array('courseid' => $filters->course, 'userid' => $filters->learner));
            $spenttime = isset($timespent->totaltime) ? ($rtl ? date('s:i:H', mktime(0, 0, $timespent->totaltime)) : date('H:i:s', mktime(0, 0, $timespent->totaltime))) : '00:00:00';
            $visits = isset($visitsdata->visits) && $visitsdata->visits > 0 ? $visitsdata->visits : 0;
        }
        //  Calculating grades
        $sql = "SELECT cm.course,
                        SUM(gg.finalgrade) finalgrade,
                        SUM(gg.rawgrademax) rawgrademax
                FROM {course_modules} cm
                JOIN {modules} m ON cm.module = m.id
                LEFT JOIN {grade_items} gi ON gi.courseid = :courseid1
                            AND m.name = gi.itemmodule
                            AND cm.instance = gi.iteminstance
                            AND gi.itemtype = :type
                LEFT JOIN {grade_grades} gg ON gi.id = gg.itemid
                                AND gg.userid = :userid1
                WHERE cm.course = :course AND gg.finalgrade IS NOT NULL
                $timespentmodulequery
                GROUP BY cm.course
        ";
        $gradetimes = $DB->get_record_sql($sql, [
        'course' => $filters->course,
        'courseid' => $filters->course,
        'courseid1' => $filters->course,
        'userid' => $filters->learner,
        'userid1' => $filters->learner,
        'type' => "mod"
        ]);

        $marks = isset($gradetimes->finalgrade) && $gradetimes->finalgrade > 0 ? round($gradetimes->finalgrade, 2) : 0;
        $fullname = isset($data->fullname) ? $data->fullname : '';
        $gradepercentage = isset($gradetimes->rawgrademax) &&  $gradetimes->rawgrademax > 0 ? round($gradetimes->finalgrade / $gradetimes->rawgrademax * 100, 2) : 0;
        $customheader = '<div class="mb-1 summary-card-subtitle">
                            <span class="font-weight-bold">'. get_string('course', 'local_edwiserreports') .' : </span>
                            <span> '. format_string($fullname, true, ['context' => \context_system::instance()]) .' </span>
                        </div>';

        $user = core_user::get_user($filters->learner);
        $firstname = isset($user->firstname) ? $user->firstname : ''; 
        $lastname = isset($user->lastname) ? $user->lastname : '';
        $name = $firstname . ' ' . $lastname;
        $enrolledon = empty($data->enrolledon) ? get_string('never', 'local_edwiserreports') : ($rtl ? date("Y M d", $data->enrolledon) : date("d M Y", $data->enrolledon));
        
        $sql = "SELECT ue.status status
                    FROM {user_enrolments} ue
                    LEFT JOIN {enrol} e ON e.id = ue.enrolid
                    WHERE ue.userid = :userid AND e.courseid = :courseid";
        $status = $DB->get_record_sql($sql, [
            'courseid' => $filters->course,
            'userid' => $filters->learner
        ]);

        // optimized code.
        // Calculating grades and timespent.
        $sql = "SELECT cm.id,
                    gg.finalgrade finalgrade,
                    gg.rawgrademax rawgrademax
            FROM {course_modules} cm
            JOIN {modules} m ON cm.module = m.id
            JOIN {grade_items} gi ON gi.courseid = :course
                        AND m.name = gi.itemmodule
                        AND cm.instance = gi.iteminstance
                        AND gi.itemtype = 'mod'
            JOIN {grade_grades} gg ON gi.id = gg.itemid
                            AND gg.userid = :userid
            WHERE cm.course = :course1 AND gg.finalgrade IS NOT NULL
        ";
        $gradetimes = $DB->get_records_sql($sql, [
            'course' => $filters->course,
            'course1' => $filters->course,
            'userid' => $filters->learner,
            'userid1' => $filters->learner,
            'type' => "mod"
        ]);

        $marks = 0;
        $maxgradetotal = 0;
        foreach (array_keys($coursemodules) as $cmid) {
            // Grade and timespent.
            if (isset($gradetimes[$cmid])) {
                $gradetime = $gradetimes[$cmid];
            } else {
                $gradetime = (object) [
                    'finalgrade' => 0,
                    'rawgrademax' => 0,
                    'timespent' => 0
                ];
            }

            $marks += $gradetime->finalgrade;
            $maxgradetotal += $gradetime->rawgrademax;
        }

        $gradepercentage = $maxgradetotal > 0 && $marks > 0 ? round($marks / $maxgradetotal * 100, 2) : 0;

        if(isset($status->status) && !$status->status){
            $active = '<span class="text-success p-1 pl-2 pr-2 ml-2" style="border-radius: 3px;background: #e8f8e5; font-size:12px;">' . get_string('active', 'local_edwiserreports').' </span>';
        } else {
            $active = '<span class="text-danger p-1 pl-2 pr-2 ml-2" style="border-radius: 3px;background-color: rgb(255, 228, 230); font-size:12px;">'. get_string('suspended', 'local_edwiserreports').'</span>';
        }

        return array(
            'header' => array(
                'learner' => true,
                'learnername' => $name,
                'isactive' => $active,
                'lastaccess' => "<span class='learner-course-activties-lastaccess' data-date='".$lastaccess."'>" . $lastaccess . '</span>',
                'customheaderinfo' => $customheader
            ),
            'body' => array(
                array(
                    'title'   => get_string('visitsoncourse', 'local_edwiserreports'),
                    'data' => $visits
                ),
                array(
                    'title'   => get_string('enrolmentdate', 'local_edwiserreports'),
                    'data' => '<label style="direction:ltr;">' . $enrolledon . '</label>'
                )
            ),
            'footer' => array(
                array(                    
                    'icon'  => file_get_contents($CFG->dirroot . '/local/edwiserreports/pix/summary-card/time.svg'),
                    'title' => get_string('timespent', 'local_edwiserreports'),
                    'data'  => '<label style="direction:ltr;">' . $spenttime . '</label>'
                ),
                array(                    
                    'icon'  => file_get_contents($CFG->dirroot . '/local/edwiserreports/pix/summary-card/marks.svg'),
                    'title' => get_string('marks', 'local_edwiserreports'),
                    'data'  => round($marks, 2)
                ),
                array(                    
                    'icon'  => file_get_contents($CFG->dirroot . '/local/edwiserreports/pix/summary-card/grade.svg'),
                    'title' => get_string('grade', 'local_edwiserreports'),
                    'data'  => $gradepercentage . '%'
                )
            )
        );
    }
}
