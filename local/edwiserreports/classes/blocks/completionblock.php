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

defined('MOODLE_INTERNAL') || die;
use local_edwiserreports\block_base;
use local_edwiserreports\utility;
use moodle_exception;
use html_writer;
use moodle_url;
use stdClass;
use core_course_category;

// Requiring constants.
require_once($CFG->dirroot . '/local/edwiserreports/classes/constants.php');

/**
 * Class Course Completion Block. To get the data related to active users block.
 */
class completionblock extends block_base {
    /**
     * Get Breadcrumbs for Course Completion
     * @return object Breadcrumbs for Course Completion
     */
    public function get_breadcrumb() {

        return array(
            'items' => array(
                array(
                    'item' => html_writer::link(
                        new moodle_url(
                            "/local/edwiserreports/allcoursessummary.php",
                        ),
                        get_string('allcoursessummary', 'local_edwiserreports'),
                        array(
                            'style' => 'margin-left: 0.5rem;'
                        )
                    )
                ),
                array(
                    'item' => get_string('coursecompletion', 'local_edwiserreports')
                )
            )
        );
    }

    /**
     * Get Data for Course Completion
     * @param  object filters Filters
     * @return object         Response for Course Completion
     */
    public function get_completion_data($filters) {
        global $DB;
        // Invalid course.
        if (empty($filters->course) || !$course = $DB->get_record('course', ['id' => $filters->course])) {
            throw new moodle_exception('invalidcourse', 'core_error');
        }
        $response = new stdClass();
        $response->data = $this->get_completions($filters);
        $response->name = get_string('completionheader', 'local_edwiserreports', ['coursename' => format_string($course->fullname, true, ['context' => \context_system::instance()])]);
        return $response;
    }

    /**
     * Get Course Completion data
     * @param  int   $filter Filter
     * @param  bool  $table  If true then data is for table.
     * @return array         Array of users with course Completion
     */
    public function get_completions($filters, $table = true) {
        global $DB;

        $assignid = $DB->get_field('modules', 'id', ['name' => 'assign']);
        $quizid = $DB->get_field('modules', 'id', ['name' => 'quiz']);
        $scormid = $DB->get_field('modules', 'id', ['name' => 'scorm']);
        $rtl = isset($filters->dir) && $filters->dir == 'rtl' ? 1 : 0;

        $conditions = [];
        $params = [
            'notstarted' => 0,
            'completed' => 1,
            'inprogress' => 2,
            'course' => $filters->course,
            'courseid' => $filters->course,
            'courseid1' => $filters->course,
            'courseid2' => $filters->course,
            'assign' => $assignid,
            'quiz' => $quizid,
            'scorm' => $scormid,
            'assign1' => $assignid,
            'quiz1' => $quizid,
            'scorm1' => $scormid,
            'itemtype' => 'course',
            'action' => 'viewed'
        ];

        // Exclude filter.
        if (array_search(SUSPENDEDUSERS, $filters->exclude) !== false) {
            $conditions['suspended'] = "u.suspended = :suspended";
            $conditions['uesuspended'] = "ue.status = :uesuspended";
            $params['suspended'] = $params['uesuspended'] = 0;
        }

        $excludeinactive = false;
        if (array_search(INACTIVESINCE1YEAR, $filters->exclude) !== false) {
            $conditions['inactive'] = "logs.lastaccess > :lastaccess";
            $params['lastaccess'] = time() - (86400 * 365);
            $excludeinactive = true;
        }

        if (array_search(INACTIVESINCE1MONTH, $filters->exclude) !== false) {
            $conditions['inactive'] = "logs.lastaccess > :lastaccess";
            $params['lastaccess'] = time() - (86400 * 30);
            $excludeinactive = true;
        }
        if ($filters->inactive != 0 && $excludeinactive == false) {
            // Get users by their inactive.
            $conditions['inactive'] = "(logs.lastaccess < :lastaccess1 OR logs.lastaccess IS NULL)";
            switch ($filters->inactive) {
                case 1:
                    $params['lastaccess1'] = time() - (86400 * 7);
                    break;
                case 2:
                    $params['lastaccess1'] = time() - (86400 * 14);
                    break;
                case 3:
                    $params['lastaccess1'] = time() - (86400 * 30);
                    break;
                case 4:
                    $params['lastaccess1'] = time() - (86400 * 365);
                    break;
                default:
                    unset($conditions['inactive']);
                    break;
            }
        }

        if ($filters->enrolment !== 'all') {
            list($starttime, $endtime) = $this->get_date_range($filters->enrolment);
            $conditions['enrolment'] = 'floor(ue.timestart / 86400) between :starttime AND :endtime';
            $params['starttime'] = floor($starttime / 86400);
            $params['endtime'] = floor($endtime / 86400);
        }

        // Get users by their progress.
        $progress = [
            1 => "ecp.progress = 0",
            2 => "ecp.progress <= 20",
            3 => "ecp.progress > 20 AND ecp.progress <= 40",
            4 => "ecp.progress > 40 AND ecp.progress <= 60",
            5 => "ecp.progress > 60 AND ecp.progress <= 80",
            6 => "ecp.progress > 80",
            7 => "ecp.progress = 100"
        ];
        if (isset($progress[$filters->progress])) {
            $conditions['progress'] = $progress[$filters->progress];
        }

        // Get users by their GRADE.
        $grades = [
            1 => "(gg.finalgrade / gg.rawgrademax * 100) <= 20",
            2 => "(gg.finalgrade / gg.rawgrademax * 100) > 20 AND (gg.finalgrade / gg.rawgrademax * 100) <= 40",
            3 => "(gg.finalgrade / gg.rawgrademax * 100) > 40 AND (gg.finalgrade / gg.rawgrademax * 100) <= 60",
            4 => "(gg.finalgrade / gg.rawgrademax * 100) > 60 AND (gg.finalgrade / gg.rawgrademax * 100) <= 80",
            5 => "(gg.finalgrade / gg.rawgrademax * 100) > 80",
        ];
        if (isset($grades[$filters->grade])) {
            $conditions['grade'] = $grades[$filters->grade];
        }

        $condition = "";
        if (!empty($conditions)) {
            $condition = " AND " . implode(" AND ", $conditions);
        }

        // Get only enrolled students.
        $enrolledstudents = utility::get_enrolled_students($filters->course, false, $filters->cohort, $filters->group);

        $usertable = utility::create_temp_table("cc_u", array_keys($enrolledstudents));

        $fullname = $DB->sql_fullname("u.firstname", "u.lastname");
        $target = $DB->sql_compare_text('lsl.target');

        $sql = " SELECT u.id,
                        u.email,
                        $fullname fullname,
                        e.enrol,
                        ue.timecreated enrolledon,
                        ecp.progress,
                        CASE
                            WHEN ecp.progress = 100 THEN :completed
                            WHEN ecp.progress = 0 THEN :notstarted
                            ELSE :inprogress
                        END cstatus,
                        ecp.completiontime completedon,
                        (gg.finalgrade / gg.rawgrademax * 100) grade,
                        logs.visits,
                        logs.lastaccess,
                        ecp.totalmodules,
                        timelog.timespent,
                        completions.assign,
                        completions.quiz,
                        completions.scorm
                   FROM {{$usertable}} ut
                   JOIN {user} u ON ut.tempid = u.id
                   JOIN {user_enrolments} ue ON ue.userid = ut.tempid
                   JOIN {enrol} e ON e.id = ue.enrolid
                   JOIN {course} c ON c.id = e.courseid
                   JOIN {edwreports_course_progress} ecp ON c.id = ecp.courseid AND u.id = ecp.userid
              LEFT JOIN (SELECT lsl.userid, COUNT(lsl.courseid) visits, MAX(lsl.timecreated) lastaccess
                           FROM {logstore_standard_log} lsl
                          WHERE lsl.courseid = :courseid
                            AND lsl.action = :action
                            AND (($target = 'course') OR ($target = 'course_module' AND lsl.objecttable IS NOT NULL))
                       GROUP BY lsl.userid, lsl.courseid) logs ON u.id = logs.userid
              LEFT JOIN {grade_items} gi ON c.id = gi.courseid AND gi.itemtype = :itemtype
              LEFT JOIN {grade_grades} gg ON gi.id = gg.itemid AND u.id = gg.userid
              LEFT JOIN (SELECT eal.userid, SUM(eal.timespent) timespent
                           FROM {edwreports_activity_log} eal
                          WHERE eal.course = :courseid1
                       GROUP BY eal.userid ) timelog ON u.id = timelog.userid
              LEFT JOIN (SELECT cmc.userid,
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
                           JOIN {course_modules_completion} cmc ON cm.id = cmc.coursemoduleid
                          WHERE cm.course = :courseid2
                            AND cm.module IN (:assign1, :quiz1, :scorm1)
                            AND cmc.completionstate > 0
                       GROUP BY cmc.userid) completions ON u.id = completions.userid
                  WHERE c.id = :course
                    AND u.deleted = 0
                    $condition";

        $users = $DB->get_records_sql($sql, $params);


        $never = get_string("never");
        $response = array();
        $statuses = [
            get_string('notyetstarted', 'core_completion'),
            get_string('completed', 'core_completion'),
            get_string('inprogress', 'core_completion')
        ];
        if ($table) {
            $search = html_writer::tag('i', '', ['class' => 'fa fa-search-plus']);
            foreach ($users as $key => $user) {
                $link = html_writer::link(
                    new moodle_url("/local/edwiserreports/learnercourseactivities.php", array(
                        'course' => $filters->course,
                        'learner' => $user->id
                    )),
                    $search,
                    array(
                        'style' => 'margin-left: 0.5rem;'
                    )
                );

                $response[] = [
                    'learner' => $user->fullname,
                    'email' => $user->email,
                    'status' => $user->cstatus,
                    'enrolledon' => $user->enrolledon,
                    'completedon' => (empty($user->completedon) ? 0 : $user->completedon),
                    'lastaccess' => (empty($user->lastaccess) ? 0 : $user->lastaccess),
                    'progress' => round($user->progress, 2) . '%' . $link,
                    'grade' => round($user->grade, 2) . '%',
                    'completedactivities' => $user->totalmodules . $link,
                    'assignment' => empty($user->assign) ? 0 : $user->assign,
                    'quiz' => empty($user->quiz) ? 0 : $user->quiz,
                    'scorm' => empty($user->scorm) ? 0 : $user->scorm,
                    'visits' => empty($user->visits) ? 0 : $user->visits,
                    'timespent' => empty($user->timespent) ? 0 : $user->timespent
                ];
                unset($users[$key]);
            }
        } else {
            $header = [
                get_string('learner', 'local_edwiserreports'),
                get_string('email', 'local_edwiserreports'),
                get_string('status', 'local_edwiserreports'),
                get_string('enrolledon', 'local_edwiserreports'),
                get_string('completedon', 'local_edwiserreports'),
                get_string('lastaccess', 'local_edwiserreports'),
                get_string('progress', 'local_edwiserreports'),
                get_string('grade', 'local_edwiserreports'),
                get_string('completedactivities', 'local_edwiserreports'),
                get_string('completedassignments', 'local_edwiserreports'),
                get_string('completedquizzes', 'local_edwiserreports'),
                get_string('completedscorms', 'local_edwiserreports'),
                get_string('totalvisits', 'local_edwiserreports'),
                get_string('timespent', 'local_edwiserreports')
            ];
            if(isset($filters->dir) && $filters->dir == 'rtl' ){
                $header = array_reverse($header);
            }
            $response[] = $header;

            $search = html_writer::tag('i', '', ['class' => 'fa fa-search-plus']);
            foreach ($users as $key => $user) {
                $assignment = empty($user->assign) ? 0 : $user->assign;
                $quiz = empty($user->quiz) ? 0 : $user->quiz;
                $scorm = empty($user->scorm) ? 0 : $user->scorm;
                $visits = empty($user->visits) ? 0 : $user->visits;
                $timespent = empty($user->timespent) ? 0 : ( $rtl ? date('s:i:H', mktime(0, 0, $user->timespent)) : date('H:i:s', mktime(0, 0, $user->timespent)));
                $completedon = empty($user->completedon) ? '-' : ($rtl ? date("Y M d", $user->completedon) : date("d M Y", $user->completedon));
                $lastaccess = empty($user->lastaccess) ? $never : ($rtl ? date('A i:h Y M d', $user->lastaccess) : date('d M Y h:i A', $user->lastaccess));

                $data = [
                    $user->fullname, // Learner.
                    $user->email, // Email.
                    $statuses[$user->cstatus], // Status.
                    date("d M Y", $user->enrolledon), // Enrolled on.
                    $completedon, // Completed on.
                    $lastaccess, // Last access.
                    round($user->progress, 2) . '%', // Progress.
                    round($user->grade, 2) . '%', // Grade.
                    $user->totalmodules, // Completed activities.
                    $assignment, // Assignment.
                    $quiz, // Quiz.
                    $scorm, // Scorm.
                    $visits, // Visits.
                    $timespent, // Timespent.
                ];

                if(isset($filters->dir) && $filters->dir == 'rtl' ){
                    $data = array_reverse($data);
                }
                $response[] = $data;
                unset($users[$key]);
            }
        }

        // Drop temporary table.
        utility::drop_temp_table($usertable);
        return $response;
    }

    /**
     * Get Exportable data for Course Completion Page
     * @param  string $filters    Filter string
     * @param  bool   $filterdata If enabled then filter data
     * @return array              Array of LP Stats
     */
    public static function get_exportable_data_report($filters, $filterdata = true) {
        global $DB;
        $filters = json_decode($filters);

        if ($filterdata == false) {
            $filters->cohort = 0;
            $filters->group = 0;
            $filters->exclude = [];
            $filters->inactive = 0;
            $filters->progress = 0;
            $filters->grade = 0;
            $filters->enrolment = 'all';
        }

        $course = $DB->get_record('course', ['id' => $filters->course]);
        if (empty($course)) {
            throw new moodle_exception('invalidcourse', 'core_error');
        }
        $obj = new self();
        $completions = $obj->get_completions($filters, false);

        $content = get_string('course', 'local_edwiserreports') . ': ' . format_string($course->fullname, true, ['context' => \context_system::instance()]);
        if(isset($filter->dir) && $filter->dir == 'rtl' ){
            $content = format_string($course->fullname, true, ['context' => \context_system::instance()]) . ': ' . get_string('course', 'local_edwiserreports');
        }

        return (object) [
            'data' => $completions,
            'options' => [
                'content' => $content,
                'format' => 'a1',
                'orientation' => 'l',
            ]
        ];
    }

    /**
     * Get Exportable data for Course Completion Page
     * @param  object $filters    Filters object
     * @param  bool   $filterdata If enabled then filter data
     * @return array              Array of LP Stats
     */
    public function get_summary_data($filters) {
        global $DB, $CFG;

        $filters->cohort = isset($filters->cohort) ? $filters->cohort : 0;
        $filters->group = isset($filters->group) ? $filters->group : 0;
        $groupname = isset($filters->groupname) ? $filters->groupname : '';
        $cohortname = isset($filters->cohortname) ? $filters->cohortname : '';
        $rtl = isset($filters->dir) ? $filters->dir : get_string('thisdirection', 'langconfig');
        $rtl = $rtl == 'rtl' ? 1: 0;

        $tags = array();

        $date = array();
        if (isset($filters->enrolment) && $filters->enrolment !== 'all') {
            list($starttime, $endtime) = $this->get_date_range($filters->enrolment);
            $date = array('starttime' => $starttime, 'endtime' => $endtime);
        }

        if($filters->cohort){
            $tags[] = $rtl ? array( 'tag' => $cohortname . ' : ' . get_string('cohort', 'local_edwiserreports')) : array( 'tag' => get_string('cohort', 'local_edwiserreports') . ' : ' . $cohortname );
        }
        if($filters->group){
            $tags[] = $rtl ? array( 'tag' => $groupname . ' : ' . get_string('group', 'local_edwiserreports')) : array( 'tag' => get_string('group', 'local_edwiserreports') . ' : ' . $groupname );
        }
        
        // Get only enrolled students.
        $enrolledstudents = utility::get_enrolled_students($filters->course, false, $filters->cohort, $filters->group, 'u.*', $date);
        $usertable = utility::create_temp_table("cc_u", array_keys($enrolledstudents));
        $target = $DB->sql_compare_text('lsl.target');
        $sql = "SELECT c.id,
                    c.startdate,
                    c.fullname,
                    c.category,
                    SUM( logs.visits) visits
                FROM {{$usertable}} ut
                LEFT JOIN {course} c ON c.id = :courseid
                LEFT JOIN (SELECT lsl.userid,
                        COUNT(lsl.courseid) visits,
                        MAX(lsl.timecreated) lastaccess
                    FROM {logstore_standard_log} lsl
                    WHERE lsl.action = 'viewed' 
                            AND lsl.courseid = :course
                            AND (($target = :coursetarget) OR ($target = :coursemodule AND lsl.objecttable IS NOT NULL))
                    GROUP BY lsl.userid) logs ON ut.tempid = logs.userid
                GROUP BY c.id, c.startdate,
                    c.fullname,
                    c.category";
        $params = array(
            'courseid' => $filters->course,
            'course' => $filters->course,
            'coursetarget' => 'course',
            'coursemodule' => 'course_module'
        );
        $data = $DB->get_record_sql($sql, $params);

        // Calculating timespent.
        $sql = "SELECT eal.course, SUM(eal.timespent) totaltime
            FROM {{$usertable}} ut
            LEFT JOIN {edwreports_activity_log} eal ON ut.tempid = eal.userid
            WHERE eal.course = :courseid
            GROUP BY eal.course
        ";
        $params = array('courseid' => $filters->course);
        $timespent = $DB->get_record_sql($sql, $params);

        // Calculating totalprogress.
        $sql = "SELECT
                    SUM(ecp.progress) totalprogress,
                    SUM(CASE
                        WHEN ecp.progress = 100 THEN 1
                        ELSE 0
                    END) completed
                FROM {{$usertable}} ut
                JOIN {edwreports_course_progress} ecp ON ut.tempid = ecp.userid
                WHERE ecp.courseid = :courseid";
        $params = array('courseid' => $filters->course);
        $completions = $DB->get_record_sql($sql, $params);

        // Calculating grades
        $sql = "SELECT gi.courseid, SUM(gg.finalgrade) totalgrades,
                       SUM(gg.finalgrade / gg.rawgrademax * 100) grade
                FROM {{$usertable}} ut
                LEFT JOIN {grade_grades} gg ON gg.userid = ut.tempid
                LEFT JOIN {grade_items} gi ON gi.id = gg.itemid
                WHERE gg.finalgrade IS NOT null
                AND gi.itemtype = 'course'
                AND gi.courseid = :courseid
                GROUP BY gi.courseid";        
        $params = array('courseid' => $filters->course);
        $grades = $DB->get_record_sql($sql, $params);

        // DROP userstable
        utility::drop_temp_table($usertable);

        $enrolled = count($enrolledstudents);
        $avgvisits = isset($data->visits) || $enrolled > 0 ? round($data->visits / $enrolled, 2) : 0;
        $timespent = isset($timespent->totaltime) ? $timespent->totaltime : 0;
        $avgtimespent = $enrolled > 0 ? round($timespent / $enrolled, 2) : 0;
        $avgtimespent = $rtl ? date('s:i:H', mktime(0, 0, $avgtimespent)) : date('H:i:s', mktime(0, 0, $avgtimespent));
        $timespent = $rtl ? date('s:i:H', mktime(0, 0, $timespent)) : date('H:i:s', mktime(0, 0, $timespent));
        $avggrade = isset($grades->grade) && $enrolled > 0 ? round($grades->grade / $enrolled, 2) : 0;
        $visits = isset($data->visits) ? $data->visits : 0;
        $completed = isset($completions->completed) ? $completions->completed : 0;
        $totalprogress = isset($completions->totalprogress) ? $completions->totalprogress : 0;
        $avgprogress = $enrolled > 0 ? round($totalprogress / $enrolled, 2) : 0;

        $course = $DB->get_record('course', ['id' => $filters->course]);
        $startdate = empty($course->startdate) ? get_string('never', 'local_edwiserreports') : ( $rtl ? date("A i:h Y M d", $course->startdate) : date("d M Y h:i A", $course->startdate));

        // Get category.
        $category = core_course_category::get($course->category);

        return array(
            'header' => array(
                'course' => true,
                'coursename' => format_string($course->fullname, true, ['context' => \context_system::instance()]),
                'category' => $category->get_formatted_name(),
                'filtertags' => $rtl ? array_reverse($tags) : $tags
            ),
            'body' => array(
                array(
                    'title' => get_string('startdate', 'local_edwiserreports'),
                    'data' => '<label style="direction:ltr;">' . $startdate . '<label>'
                ),
                array(
                    'title' => get_string('totalvisits', 'local_edwiserreports'),
                    'data' => $visits
                ),
                array(
                    'title' => get_string('avgvisits', 'local_edwiserreports'),
                    'data' => ceil($avgvisits)
                ),
                array(
                    'title' => get_string('totaltimespent', 'local_edwiserreports'),
                    'data' => '<label style="direction:ltr;">' . $timespent . '</label>'
                ),
                array(
                    'title' => get_string('avgtimespent', 'local_edwiserreports'),
                    'data' => '<label style="direction:ltr;">' . $avgtimespent . '<label>'
                )
            ),
            'footer' => array(
                array(
                    'icon'  => file_get_contents($CFG->dirroot . '/local/edwiserreports/pix/summary-card/enrolled.svg'),
                    'title' => get_string('enrolled', 'local_edwiserreports'),
                    'data'  => $enrolled
                ),
                array(
                    'icon'  => file_get_contents($CFG->dirroot . '/local/edwiserreports/pix/summary-card/completed.svg'),
                    'title' => get_string('completed', 'local_edwiserreports'),
                    'data'  => $completed
                ),
                array(
                    'icon'  => file_get_contents($CFG->dirroot . '/local/edwiserreports/pix/summary-card/progress.svg'),
                    'title' => get_string('avgprogress', 'local_edwiserreports'),
                    'data'  => $avgprogress . ' %'
                ),
                array(
                    'icon'  => file_get_contents($CFG->dirroot . '/local/edwiserreports/pix/summary-card/grade.svg'),
                    'title' => get_string('avggrade', 'local_edwiserreports'),
                    'data'  => $avggrade . ' %'
                )
            )
        );
    }
}
