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
 * Course Activity Compeltion report page.
 *
 * @package     local_edwiserreports
 * @category    reports
 * @author      Yogesh Shirsath
 * @copyright   2022 Wisdmlabs <support@wisdmlabs.com>
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace local_edwiserreports\reports;

use local_edwiserreports\utility;
use core_course_category;
use moodle_exception;
use html_writer;
use moodle_url;

class courseactivitycompletion extends base {
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
                            "/local/edwiserreports/allcoursessummary.php",
                        ),
                        get_string('allcoursessummary', 'local_edwiserreports'),
                        array(
                            'style' => 'margin-left: 0.5rem;'
                        )
                    )
                ),
                array(
                    'item' => html_writer::link(
                        new moodle_url(
                            "/local/edwiserreports/courseactivitiessummary.php",
                        ),
                        get_string('courseactivitiessummary', 'local_edwiserreports'),
                        array(
                            'style' => 'margin-left: 0.5rem;'
                        )
                    )
                ),
                array(
                    'item' => get_string('courseactivitycompletion', 'local_edwiserreports')
                )
            )
        );
    }

    /**
     * Get filter data
     *
     * @param  int      $activecourse Active course from url.
     * @param  int      $activecm Active course module type from url.
     * @return array
     */
    public function get_filter($activecourse, $activecm) {
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

        // Get course modules.
        $cms = $this->get_cms($activecourse);
        if ($activecm == 0) {
            $activecm = reset($cms)['id'];
        }

        // Invalid course module.
        if (!isset($cms[$activecm])) {
            throw new moodle_exception('invalidcoursemodule', 'core_error');
        }
        $cms[$activecm]['selected'] = 'selected';

        $categories = core_course_category::make_categories_list();
        $coursecategories = [];
        foreach ($categories as $id => $name) {
            $coursecategories[$id] = [
                'id' => $id,
                'name' => format_string($name, true, ['context' => \context_system::instance()]),
                'visible' => false,
                'courses' => []
            ];
        }
        foreach ($courses as $id => $course) {
            $courselist[$course->id] = $course;
            $courselist[$course->id]->fullname = format_string($course->fullname, true, ['context' => \context_system::instance()]);
            $coursecategories[$course->category]['visible'] = true;
            $coursecategories[$course->category]['courses'][] = $course;
        }

        return [
            'activecourse' => $activecourse,
            'activecm' => $activecm,
            'courses' => $courses,
            'coursecategories' => array_values($coursecategories),
            'cms' => array_values($cms),
            'groups' => $this->bb->get_groups($activecourse)
        ];
    }

    /**
     * Get users for table with filters.
     *
     * @param object $filters Filters
     *
     * @return array
     */
    public function get_users($filters, $tablename = 'tmp_cac_uf') {
        global $DB;
        $userid = $this->bb->get_current_user();

        // User fields.
        $fields = 'u.id, ' . $DB->sql_fullname("u.firstname", "u.lastname") . ' AS fullname';

        // All users.
        $allusers = $this->bb->get_user_from_cohort_course_group(0, $filters->course, $filters->group, $userid);

        // User temporary table.
        $usertable = utility::create_temp_table($tablename, array_keys($allusers));

        $params = [];
        $condition = "";
        $conditions = [];

        if ($filters->enrolment !== 'all') {
            list($starttime, $endtime) = $this->bb->get_date_range($filters->enrolment);
            $conditions['enrolment'] = 'floor(ue.timestart / 86400) between :starttime AND :endtime';
            $params['starttime'] = floor($starttime / 86400);
            $params['endtime'] = floor($endtime / 86400);
        }

        if (!empty($conditions)) {
            $condition = " WHERE " . implode(" AND ", $conditions);
        } else {
            // Drop temporary table.
            utility::drop_temp_table($usertable);
            return $allusers;
        }

        $sql = "SELECT DISTINCT $fields
                  FROM {{$usertable}} ut
                  JOIN {user_enrolments} ue ON ue.userid = ut.tempid
                  JOIN {enrol} e ON ue.enrolid = e.id AND e.courseid = :course
                  JOIN {user} u ON ue.userid = u.id
                  $condition";
        $params['course'] = $filters->course;
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
        global $DB;

        // Invalid course.
        if ($filters->course == 0 || !$course = $DB->get_record('course', ['id' => $filters->course])) {
            throw new moodle_exception('invalidcourse', 'core_error');
        }

        $rtl = isset($filters->dir) && $filters->dir == 'rtl' ? 1 : 0;

        // Invalid course module.
        $cms = $this->get_cms($filters->course);
        if ($filters->cm == 0 || !isset($cms[$filters->cm])) {
            throw new moodle_exception('invalidcoursemodule', 'core_error');
        }
        $cm = $cms[$filters->cm];

        $users = $this->get_users($filters, 'tmp_cac_uf1');

        // Temporary users table.
        $userstable = utility::create_temp_table('tmp_cac_u', array_keys($users));

        $response = [];

        // Add header when exporting data.
        if (!$table) {
            $header = [
                get_string('learner', 'local_edwiserreports'),
                get_string('email', 'local_edwiserreports'),
                get_string('status', 'local_edwiserreports'),
                get_string('completedon', 'local_edwiserreports'),
                get_string('grade', 'local_edwiserreports'),
                get_string('gradedon', 'local_edwiserreports'),
                get_string('firstaccess', 'local_edwiserreports'),
                get_string('lastaccess', 'local_edwiserreports'),
                get_string('visits', 'local_edwiserreports'),
                get_string('timespent', 'local_edwiserreports'),
            ];
            if(isset($filters->dir) && $filters->dir == 'rtl' ){
                $header = array_reverse($header);
            }
            $response[] = $header;
        }

        // User fields.
        $fullname = $DB->sql_fullname("u.firstname", "u.lastname") . ' fullname';
        $itemmodule = $DB->sql_compare_text('gi.itemmodule');
        if (!$ggitemid = $DB->get_field_sql(
            "SELECT gi.id
               FROM {grade_items} gi
              WHERE gi.courseid = :gicourse
                AND gi.itemtype = :itemtype
                AND $itemmodule = :itemmodule
                AND gi.iteminstance = :iteminstance",
            [
                'gicourse' => $filters->course,
                'itemtype' => 'mod',
                'itemmodule' => $cm['modname'],
                'iteminstance' => $cm['instance']
            ],
            IGNORE_MULTIPLE
        )) {
            $ggitemid = 0;
        }

        $sql = "SELECT u.id,
                       $fullname,
                       u.email,
                       CASE
                            WHEN cmc.completionstate > 0 THEN :completed
                            WHEN lsl.firstaccess IS NULL THEN :notstarted
                            ELSE :inprogress
                       END completionstatus,
                       cmc.timemodified completiontime,
                       gg.finalgrade,
                       CASE
                            WHEN gg.finalgrade IS NOT NULL THEN gg.timemodified
                            ELSE NULL
                       END gradedon,
                       lsl.visits,
                       lsl.firstaccess,
                       lsl.lastaccess,
                       eal.timespent
                  FROM {{$userstable}} ut
                  JOIN {user} u ON ut.tempid = u.id
             LEFT JOIN {course_modules_completion} cmc ON u.id = cmc.userid
                                                       AND cmc.coursemoduleid = :cmid
             LEFT JOIN {grade_grades} gg ON gg.itemid = :ggitemid AND u.id = gg.userid
             LEFT JOIN (SELECT lsl.userid, count(lsl.id) visits, MIN(lsl.timecreated) firstaccess, MAX(lsl.timecreated) lastaccess
                          FROM {logstore_standard_log} lsl
                         WHERE lsl.courseid = :lslcourse
                           AND lsl.component = :lslcomponent
                           AND lsl.target = :lsltarget
                           AND lsl.action = :lslaction
                           AND lsl.objectid = :lslobjectid
                           AND lsl.objecttable IS NOT NULL
                      GROUP BY lsl.userid) lsl ON u.id = lsl.userid
             LEFT JOIN (SELECT eal.userid, SUM(eal.timespent) timespent
                          FROM {edwreports_activity_log} eal
                         WHERE eal.course = :ealcourse
                           AND eal.activity = :ealactivity
                      GROUP BY eal.userid) eal ON u.id = eal.userid";
        $params = [
            'notstarted' => 0,
            'completed' => 1,
            'inprogress' => 2,
            'cmid' => $cm['id'],
            'ggitemid' => $ggitemid,
            'lslcourse' => $filters->course,
            'lslcomponent' => 'mod_' . $cm['modname'],
            'lsltarget' => 'course_module',
            'lslaction' => 'viewed',
            'lslobjectid' => $cm['instance'],
            'ealcourse' => $filters->course,
            'ealactivity' => $cm['id']
        ];
        $users = $DB->get_records_sql($sql, $params);

        $status = [
            get_string('notyetstarted', 'core_completion'),
            get_string('completed', 'core_completion'),
            get_string('inprogress', 'core_completion')
        ];
        if ($table) {
            foreach ($users as $user) {
                $response[] = [
                    'learner' => $user->fullname,
                    'email' => $user->email,
                    'status' => $user->completionstatus,
                    'completedon' => (empty($user->completiontime) ? 0 : $user->completiontime),
                    'grade' => $user->finalgrade == null ? '-' : round($user->finalgrade, 2),
                    'gradedon' => (empty($user->gradedon) ? 0 : $user->gradedon),
                    'firstaccess' => (empty($user->firstaccess) ? 0 : $user->firstaccess),
                    'lastaccess' => (empty($user->lastaccess) ? 0 : $user->lastaccess),
                    'visits' => empty($user->visits) ? '-' : $user->visits,
                    'timespent' => $user->timespent
                ];
            }
        } else {
            foreach ($users as $user) {
                $data = [
                    $user->fullname, // Learner.
                    $user->email, // Email.
                    $status[$user->completionstatus], // Status.
                    (empty($user->completiontime) ? '-' : ( $rtl ? date("Y M d", $user->completiontime) : date("d M Y", $user->completiontime))), // Completed on.
                    $user->finalgrade == null ? '-' : round($user->finalgrade, 2), // Grade.
                    (empty($user->gradedon) ? '-' : ( $rtl ? date("Y M d", $user->gradedon) : date("d M Y", $user->gradedon))), // Graded on.
                    (empty($user->firstaccess) ? '-' : ( $rtl ? date("A i:h Y M d", $user->firstaccess) : date("d M Y h:i A", $user->firstaccess))), // First access.
                    (empty($user->lastaccess) ? '-' : ( $rtl ? date("A i:h Y M d", $user->lastaccess) : date("d M Y h:i A", $user->lastaccess))), // Last access.
                    empty($user->visits) ? '-' : $user->visits, // Visits.
                    ( $rtl ? date('s:i:H', mktime(0, 0, $user->timespent)) : date('H:i:s', mktime(0, 0, $user->timespent))), // Timespent.
                ];
                // $data = [
                //     $user->fullname, // Learner.
                //     $user->email, // Email.
                //     $status[$user->completionstatus], // Status.
                //     (empty($user->completiontime) ? '-' : date("d M Y", $user->completiontime)), // Completed on.
                //     $user->finalgrade == null ? '-' : round($user->finalgrade, 2), // Grade.
                //     (empty($user->gradedon) ? '-' : date("d M Y", $user->gradedon)), // Graded on.
                //     (empty($user->firstaccess) ? '-' : date("d M Y h:i A", $user->firstaccess)), // First access.
                //     (empty($user->lastaccess) ? '-' : date("d M Y h:i A", $user->lastaccess)), // Last access.
                //     empty($user->visits) ? '-' : $user->visits, // Visits.
                //     date('H:i:s', mktime(0, 0, $user->timespent)), // Timespent.
                // ];
                if(isset($filters->dir) && $filters->dir == 'rtl' && !$table ){
                    $data = array_reverse($data);
                }
                $response[] = $data;
            }
        }

        // Drop temporary tables.
        utility::drop_temp_table($userstable);
        if ($table) {
            return $response;
        }
        return [
            'data' => $response,
            'course' => format_string($course->fullname, true, ['context' => \context_system::instance()]),
            'activity' => $cm['name']
        ];
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
            $filter['group'] = 0;
            $filter['enrolment'] = 'all';
        }
        $obj = new self();
        $data = $obj->get_data($filter, false);
        $content = get_string('course') . ': ' . format_string($data['course'], true, ['context' => \context_system::instance()]) .
        '<br>' . get_string('activity', 'local_edwiserreports') . ': ' . format_string($data['activity'], true, ['context' => \context_system::instance()]);
        if(isset($filter->dir) && $filter->dir == 'rtl' ){
            $content =   format_string($data['course'], true, ['context' => \context_system::instance()]) . ': ' . get_string('course') . '<br>' . 
            format_string($data['activity'], true, ['context' => \context_system::instance()]) . ': ' .get_string('activity', 'local_edwiserreports');
        }

        return (object) [
            'data' => $data['data'],
            'options' => [
                'content' => $content,
                'format' => 'a3',
                'orientation' => 'l',
            ]
        ];
    }


    /**
     * Get Exportable data for Course Completion Page
     * @param  object $filters    Filter string
     * @param  bool   $filterdata If enabled then filter data
     * @return array              Array of LP Stats
     */
    public function get_summary_data($filters) {
        global $DB, $CFG;
        $rtl = isset($filters->dir) ? $filters->dir : get_string('thisdirection', 'langconfig');
        $rtl = $rtl == 'rtl' ? 1: 0;

        // $filters = new stdClass();
        $filters->cohort = 0;
        $filters->module = 0;
        $filters->activity = isset($filters->activity) ? $filters->activity : 0;
        $filters->group = isset($filters->group) ? $filters->group : 0;
        $filters->enrolment = isset($filters->enrolment) ? $filters->enrolment : 'all';
        $groupname = isset($filters->groupname) ? $filters->groupname : '';

        $tags = array();

        // Invalid course.
        if ($filters->course == 0 || !$DB->get_record('course', ['id' => $filters->course])) {
            throw new moodle_exception('invalidcourse', 'core_error');
        }

        if($filters->group){
            $tags[] = $rtl ? array( 'tag' => $groupname  . ' : ' . get_string('group', 'local_edwiserreports')) : array( 'tag' => get_string('group', 'local_edwiserreports') . ' : ' . $groupname );
        }
        // Invalid course module.
        $cms = $this->get_cms($filters->course);

        if ($filters->cm == 0 || !isset($cms[$filters->cm])) {
            throw new moodle_exception('invalidcoursemodule', 'core_error');
        }
        $cm = $cms[$filters->cm];


        $itemmodule = $DB->sql_compare_text('gi.itemmodule');
        if (!$ggitemid = $DB->get_field_sql(
            "SELECT gi.id
               FROM {grade_items} gi
              WHERE gi.courseid = :gicourse
                AND gi.itemtype = :itemtype
                AND $itemmodule = :itemmodule
                AND gi.iteminstance = :iteminstance",
            [
                'gicourse' => $filters->course,
                'itemtype' => 'mod',
                'itemmodule' => $cm['modname'],
                'iteminstance' => $cm['instance']
            ],
            IGNORE_MULTIPLE
        )) {
            $ggitemid = 0;
        }

        $users = $this->get_users($filters);

        // Temporary users table.
        $userstable = utility::create_temp_table('tmp_cas_u', array_keys($users));

        $sql = "SELECT DISTINCT u.id,
                    SUM(CASE
                        WHEN cmc.completionstate > 0 THEN 1
                    END) completed
                FROM {course_modules_completion} cmc
                LEFT JOIN {{$userstable}} u ON u.id = cmc.userid 
                LEFT JOIN {user_enrolments} ue ON ue.userid = u.tempid
                LEFT JOIN {enrol} e ON e.courseid = :courseid AND e.id = ue.enrolid 
                WHERE cmc.coursemoduleid = :cmid
                GROUP BY u.id
                ";

        $sql = "SELECT 
                    SUM(CASE
                        WHEN cmc.completionstate > 0 THEN 1
                    END) completed
                FROM {{$userstable}} u  
                LEFT JOIN {course_modules_completion} cmc ON u.tempid = cmc.userid
                LEFT JOIN {course_modules} cm ON cm.course = :courseid AND cmc.coursemoduleid = cm.id
                WHERE cmc.coursemoduleid = :cmid
                ";

        $params = array(
            'courseid' => $filters->course,
            'course' => $filters->course,
            'course1' => $filters->course,
            'ggitemid' => $ggitemid,
            'cmid' => $filters->cm
        );

        $data = $DB->get_record_sql($sql, $params);

        $modulesql = '';
        $timemodulesql = '';
        $timeparams = array();
        if ($filters->cm != 0) {
            $modulesql .= " AND cm.id = :module";
            $timemodulesql .= " AND eal.activity = :module";

            $timeparams['module'] = $filters->cm;
            $gradeparams['module'] = $filters->cm;
        }

        $sql = "SELECT lsl.courseid,
                    COUNT(lsl.courseid) visits
                FROM {{$userstable}} u 
                LEFT JOIN  {logstore_standard_log} lsl ON lsl.userid = u.tempid
                WHERE lsl.courseid = :lslcourse
                           AND lsl.target = 'course_module'
                           AND lsl.action = 'viewed'
                           AND lsl.objectid = :lslobjectid
                           AND lsl.courseid = :course
                           AND lsl.objecttable IS NOT NULL
                GROUP BY lsl.courseid";
            $params = [
            'lslcourse' => $filters->course,
            'lslobjectid' => $cm['instance'],
            'course' => $filters->course
            ];

        $visits = $DB->get_record_sql($sql, $params);

        // Calculating timespent.
        $sql = "SELECT SUM(eal.timespent) totaltime
            FROM {{$userstable}} ut
            LEFT JOIN {edwreports_activity_log} eal ON ut.tempid = eal.userid
            WHERE eal.course = :courseid
            $timemodulesql
        ";
        $timeparams['courseid'] = $filters->course;
        $timespent = $DB->get_record_sql($sql, $timeparams);

        // Calculating grades.
        $sql = "SELECT gi.courseid, gi.grademax,
                        gi.gradepass,
                        MAX(gg.finalgrade) highestgrade,
                        MIN(gg.finalgrade) lowestgrade,
                        SUM(gg.finalgrade) totalgrade,
                       SUM(gg.finalgrade)/COUNT(gg.finalgrade) avggrades
                  FROM {{$userstable}} ut
                  JOIN {grade_grades} gg ON ut.tempid = gg.userid
                  JOIN {grade_items} gi ON gi.id = gg.itemid
                  JOIN {course_modules} cm ON cm.course = gi.courseid
                                           AND cm.instance = gi.iteminstance
                                           AND gi.itemtype = :itemtype
                                           $modulesql
                  JOIN {modules} m ON cm.module = m.id AND m.name = gi.itemmodule
                 WHERE cm.course = :course
              GROUP BY gi.courseid, gi.grademax, gi.gradepass";
        $gradeparams['course'] = $filters->course;
        $gradeparams['itemtype'] = "mod";
        $grades = $DB->get_record_sql($sql, $gradeparams, IGNORE_MULTIPLE);

        // Drop Temporary table.
        utility::drop_temp_table($userstable);

        $enrolled = count($users);
        $visits = isset($visits->visits) ? $visits->visits : 0; 
        $avgvisits = $enrolled == 0 ? 0 : round($visits / $enrolled, 2);
        $totaltimespent = isset($timespent->totaltime) ? $timespent->totaltime : 0;
        $avgtimespent = $enrolled == 0 ? 0 : round($totaltimespent / $enrolled, 2);
        $avgtimespent = $rtl ? date('s:i:H', mktime(0, 0, $avgtimespent)) : date('H:i:s', mktime(0, 0, $avgtimespent));
        $completionrate = $enrolled == 0 ? 0 : round(($data->completed / $enrolled) * 100, 2) . '%';
        $totaltimespent = $rtl ? date('s:i:H', mktime(0, 0, $totaltimespent)) : date('H:i:s', mktime(0, 0, $totaltimespent));

        $avggrade = isset($grades->totalgrade) ? round($grades->totalgrade / $enrolled, 2) : 0;
        $maxgrade = isset($grades->highestgrade) ? round($grades->highestgrade) : 0;
        $mingrade = isset($grades->lowestgrade) ? round($grades->lowestgrade) : 0;
        $passgrade = isset($grades->grademax) && $grades->grademax > 0 ?  round(($grades->gradepass / $grades->grademax) * 100 , 2) : 0;

        $course = $DB->get_record('course', ['id' => $filters->course]);

        $customheader = '<div>
                            <div class="mb-1 summary-card-subtitle">
                                <span class="font-weight-bold">'. get_string('course', 'local_edwiserreports') .' : </span>
                                <span> '. format_string($course->fullname, true, ['context' => \context_system::instance()]) .' </span>
                            </div>
                            <div class="summary-card-title font-weight-bold">
                                '. format_string($cm['name'], true, ['context' => \context_system::instance()]) .'
                            </div>
                        </div>';

        return array(
            'header' => array(
                'customheaderinfo' => $customheader,
                'filtertags' => $rtl ? array_reverse($tags) : $tags
            ),
            'body' => array(
                array(
                    'title'   => get_string('totalvisits', 'local_edwiserreports'),
                    'data' => $visits
                ),
                array(
                    'title'   => get_string('avgvisits', 'local_edwiserreports'),
                    'data' => ceil($avgvisits)
                ),
                array(
                    'title'   => get_string('totaltimespent', 'local_edwiserreports'),
                    'data' => '<label style="direction:ltr;">' . $totaltimespent . '</label>'
                ),
                array(
                    'title'   => get_string('avgtimespent', 'local_edwiserreports'),
                    'data' => '<label style="direction:ltr;">' . $avgtimespent . '</label>'
                )
            ),
            'footer' => array(
                array(                    
                    'icon'  => file_get_contents($CFG->dirroot . '/local/edwiserreports/pix/summary-card/passgrade.svg'),
                    'title' => get_string('passgrade', 'local_edwiserreports'),
                    'data'  =>  $passgrade . '%'
                ),
                array(                    
                    'icon'  => file_get_contents($CFG->dirroot . '/local/edwiserreports/pix/summary-card/grade.svg'),
                    'title' => get_string('avggrade', 'local_edwiserreports'),
                    'data'  => $avggrade
                ),
                array(                    
                    'icon'  => file_get_contents($CFG->dirroot . '/local/edwiserreports/pix/summary-card/highgrade.svg'),
                    'title' => get_string('highgrade', 'local_edwiserreports'),
                    'data'  => $maxgrade
                ),
                array(                    
                    'icon'  => file_get_contents($CFG->dirroot . '/local/edwiserreports/pix/summary-card/lowgrade.svg'),
                    'title' => get_string('lowgrade', 'local_edwiserreports'),
                    'data'  => $mingrade
                ),
                array(
                    'icon'  => file_get_contents($CFG->dirroot . '/local/edwiserreports/pix/summary-card/progress.svg'),
                    'title' => get_string('completionrate', 'local_edwiserreports'),
                    'data'  => $completionrate
                )
            )
        );
    }



}
