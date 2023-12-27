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
 * Course Activities Summary report page.
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
use core_course_category;
use moodle_exception;
use html_writer;
use moodle_url;

// Requiring constants.
require_once($CFG->dirroot . '/local/edwiserreports/classes/constants.php');

class courseactivitiessummary extends base {
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
                    'item' => get_string('courseactivitiessummary', 'local_edwiserreports')
                )
            )
        );
    }

    /**
     * Get filter data
     *
     * @param  int   $activecourse Active course from url.
     * @return array
     */
    public function get_filter($activecourse) {
        $courses = $this->bb->get_courses_of_user();

        unset($courses[SITEID]);

        if ($activecourse == 0) {
            $activecourse = reset($courses)->id;
        }

        // Invalid course.
        if (!isset($courses[$activecourse])) {
            throw new moodle_exception('invalidcourse', 'core_error');
        }

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
        $courses[$activecourse]->selected = 'selected';
        
        // Creating new array for courses to store multilang supported names in it
        $courselist = array();

        foreach ($courses as $id => $course) {
            $courselist[$course->id] = $course;
            $courselist[$course->id]->fullname = format_string($course->fullname, true, ['context' => \context_system::instance()]);
            $coursecategories[$course->category]['visible'] = true;
            $coursecategories[$course->category]['courses'][] = $course;
        }

        return [
            'activecourse' => $activecourse,
            'courses' => $courses,
            'coursecategories' => array_values($coursecategories),
            'sections' => $this->get_sections($activecourse),
            'modules' => $this->get_modules($activecourse),
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
    public function get_users($filters, $tablename = 'tmp_cas_tf') {
        global $DB;
        $userid = $this->bb->get_current_user();

        // User fields.
        $fields = 'u.id, ' . $DB->sql_fullname("u.firstname", "u.lastname") . ' AS fullname';

        // All users.
        $allusers = $this->bb->get_user_from_cohort_course_group(0, $filters->course, $filters->group, $userid);

        // User temporary table.
        $usertable = utility::create_temp_table($tablename, array_keys($allusers));

        $params = [
            'action' => 'viewed',
            'courseid' => $filters->course
        ];
        $condition = "";
        $conditions = [];

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

        $lslaction = $DB->sql_compare_text('lsl.action');
        $sql = "SELECT DISTINCT $fields
                  FROM {{$usertable}} ut
                  JOIN {user_enrolments} ue ON ue.userid = ut.tempid
                  JOIN {enrol} e ON ue.enrolid = e.id AND e.courseid = :course
                  JOIN {user} u ON ue.userid = u.id
             LEFT JOIN (SELECT lsl.userid, MAX(lsl.timecreated) lastaccess
                          FROM {logstore_standard_log} lsl
                         WHERE $lslaction = :action
                           AND lsl.courseid = :courseid
                      GROUP BY lsl.userid) logs ON u.id = logs.userid
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
        if ($filters->course == 0 || !$DB->get_record('course', ['id' => $filters->course])) {
            throw new moodle_exception('invalidcourse', 'core_error');
        }

        $rtl = isset($filters->dir) && $filters->dir == 'rtl' ? 1 : 0;
        $users = $this->get_users($filters, 'tmp_cas_tf1');
        $usercount = count($users);

        // Temporary users table.
        $userstable = utility::create_temp_table('tmp_cats_u', array_keys($users));

        $sql = "SELECT cm.id
                  FROM {course_modules} cm
                  JOIN {modules} m ON cm.module = m.id
                 WHERE cm.course = :course";
        $params = ['course' => $filters->course];
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
        $sql = "SELECT cm.id, COUNT(cmc.completionstate) completion
                  FROM {{$userstable}} ut
             LEFT JOIN {course_modules_completion} cmc ON ut.tempid = cmc.userid
                  JOIN {course_modules} cm ON cm.id = cmc.coursemoduleid
                 WHERE cm.course = ? AND cmc.completionstate > 0
              GROUP BY cm.id";
        $completions = $DB->get_records_sql($sql, [$filters->course]);

        // Calculating grades.
        $sql = "SELECT cm.id, gi.grademax, gi.gradepass, MAX(gg.finalgrade) highestgrade, MIN(gg.finalgrade) lowestgrade,
                       SUM(gg.finalgrade)/COUNT(gg.finalgrade) avggrades
                  FROM {{$userstable}} ut
                  JOIN {grade_grades} gg ON ut.tempid = gg.userid
                  JOIN {grade_items} gi ON gi.id = gg.itemid
                  JOIN {course_modules} cm ON cm.course = :course1
                                           AND cm.instance = gi.iteminstance
                                           AND gi.itemtype = :itemtype
                  JOIN {modules} m ON cm.module = m.id AND m.name = gi.itemmodule
                 WHERE cm.course = :course
              GROUP BY cm.id, gi.grademax, gi.gradepass";
        $grades = $DB->get_records_sql($sql, ['course' => $filters->course, 'course1' => $filters->course, 'itemtype' => "mod"]);


        // Calculating timespent.
        $sql = "SELECT cm.id, SUM(eal.timespent) totaltime
                  FROM {{$userstable}} ut
             LEFT JOIN {edwreports_activity_log} eal ON ut.tempid = eal.userid
                  JOIN {course_modules} cm ON cm.course = eal.course AND cm.id = eal.activity
                  JOIN {modules} m ON cm.module = m.id
                 WHERE cm.course = :course
              GROUP BY cm.id
        ";
        $timespent = $DB->get_records_sql($sql, ['course' => $filters->course]);

        // Calculating visits.
        $target = $DB->sql_compare_text('lsl.target');
        $sql = "SELECT lsl.contextinstanceid, COUNT(lsl.id) visits
                  FROM {{$userstable}} ut
             LEFT JOIN {logstore_standard_log} lsl ON ut.tempid = lsl.userid
                 WHERE lsl.courseid = :courseid AND lsl.action = :action
                   AND (($target = :course) OR ($target = :coursemodule AND lsl.objecttable IS NOT NULL))
              GROUP BY lsl.contextinstanceid";
        $visits = $DB->get_records_sql($sql, [
            'courseid' => $filters->course,
            'action' => 'viewed',
            'course' => 'course',
            'coursemodule' => 'course_module'
        ]);

        $response = [];

        // Add header when exporting data.
        if (!$table) {
            $header = [
                get_string('activity'),
                get_string('type', 'core_search'),
                get_string('status'),
                get_string('learnerscompleted', 'local_edwiserreports'),
                get_string('completionrate', 'local_edwiserreports'),
                get_string('maxgrade', 'core_grades'),
                get_string('passgrade', 'local_edwiserreports'),
                get_string('averagegrade', 'local_edwiserreports'),
                get_string('aggregatemax', 'core_grades'),
                get_string('aggregatemin', 'core_grades'),
                get_string('totaltimespent', 'local_edwiserreports'),
                get_string('averagetimespent', 'local_edwiserreports'),
                get_string('totalvisits', 'local_edwiserreports'),
                get_string('averagevisits', 'local_edwiserreports'),
            ];
            if(isset($filters->dir) && $filters->dir == 'rtl' ){
                $header = array_reverse($header);
            }
            $response[] = $header;
        }

        $cms = get_fast_modinfo($filters->course)->get_cms();
        $search = html_writer::tag('i', '', ['class' => 'fa fa-search-plus']);
        $statuses = [
            get_string('notyetstarted', 'core_completion'),
            get_string('completed', 'core_completion'),
            get_string('inprogress', 'core_completion')
        ];
        foreach (array_keys($coursemodules) as $cmid) {
            if (!isset($cms[$cmid])) {
                continue;
            }
            $cm = $cms[$cmid];
            $name = format_string($cm->name, true, ['context' => \context_system::instance()]);

            if ($table) {
                $name .= html_writer::link(
                    new moodle_url(
                        "/local/edwiserreports/courseactivitycompletion.php",
                        array(
                            "course" => $filters->course,
                            "cm" => $cmid
                        )
                    ),
                    $search,
                    array(
                        'style' => 'margin-left: 0.5rem;'
                    )
                );
            }
            $totaltime = isset($timespent[$cmid]) ? $timespent[$cmid]->totaltime : 0;
            if (isset($grades[$cm->id])) {
                $grade = $grades[$cm->id];
            } else {
                $grade = (object) [
                    'grademax' => 0,
                    'gradepass' => 0,
                    'highestgrade' => 0,
                    'lowestgrade' => 0,
                    'avggrades' => 0
                ];
            }

            if ($usercount == 0) {
                $activity = [
                    'activity' => $name, // Activity name.
                    'type' => get_string('pluginname', 'mod_' . $cm->modname),
                    'status' => 0, // Status: completed, not yet started, in progress.
                    'learnerscompleted' => 0, // Number of Learners completed activity.
                    'completionrate' => 0,
                    'maxgrade' => round($grade->grademax, 2),
                    'passgrade' => round($grade->gradepass, 2),
                    'averagegrade' => 0,
                    'highestgrade' => 0,
                    'lowestgrade' => 0,
                    'totaltimespent' => 0,
                    'averagetimespent' => 0,
                    'totalvisits' => 0,
                    'averagevisits' => 0
                ];
                $response[] = $activity;
                continue;
            }

            // Visits on course module.
            $visit = isset($visits[$cm->id]) ? $visits[$cm->id]->visits : 0;

            // Completion.
            $completion = isset($completions[$cm->id]) ? $completions[$cm->id]->completion : 0;

            // Status.
            switch (true) {
                case !isset($completions[$cm->id]) || $completion == 0:
                    $status = 0;
                    break;
                case $completion == $usercount :
                    $status = 1;
                    break;
                case $completion > 0:
                    $status = 2;
                    break;
                default:
                    $status = 0;
                    break;
            }
            $averagetime = $totaltime == 0 ? 0 : ceil($totaltime / $usercount);

            $data = [
                'activity' => $name, // Activity name.
                'type' => get_string('pluginname', 'mod_' . $cm->modname),
                'status' => $status, // Status: completed, not yet started, in progress.
                'learnerscompleted' => $completion, // Number of Learners completed activity.
                'completionrate' => $completion == 0 ? 0 : round(($completion / $usercount) * 100, 2) . '%',
                'maxgrade' => round($grade->grademax, 2),
                'passgrade' => round($grade->gradepass, 2),
                'averagegrade' => round($grade->avggrades, 2),
                'highestgrade' => round($grade->highestgrade, 2),
                'lowestgrade' => round($grade->lowestgrade, 2),
                'totaltimespent' => $table ? $totaltime : ($rtl ? date('s:i:H', mktime(0, 0, $totaltime)) : date('H:i:s', mktime(0, 0, $totaltime))),
                'averagetimespent' => $table ? $averagetime : ($rtl ? date('s:i:H', mktime(0, 0, $averagetime)) : date('H:i:s', mktime(0, 0, $averagetime))),
                'totalvisits' => $visit,
                'averagevisits' => $visit == 0 ? 0 : ceil($visit / $usercount)
            ];
            if (!$table) {
                $data['status'] = $statuses[$data['status']];
            }
            if(isset($filters->dir) && $filters->dir == 'rtl' && !$table ){
                $data = array_reverse($data);
            }
            $response[] = $table ? $data : array_values($data);
        }

        // Drop temporary tables.
        utility::drop_temp_table($userstable);
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
        $filter = json_decode($filter);
        if (!$filterdata) {
            $filter['section'] = 'all';
            $filter['module'] = 'all';
            $filter['group'] = 0;
            $filter['enrolment'] = 'all';
            $filter['exclude'] = [];
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

    /**
     * Get Exportable data for Course Completion Page
     * @param  object $filters    Filter string
     * @param  bool   $filterdata If enabled then filter data
     * @return array              Array of LP Stats
     */
    public function get_summary_data($filters, $filterdata = true) {
        global $DB, $CFG, $PAGE;

        $filters->module = isset($filters->module) ? $filters->module : 'all';
        $filters->section = isset($filters->section) ? $filters->section : 0;
        $filters->group = isset($filters->group) ? $filters->group : 0;
        $filters->enrolment = isset($filters->enrolment) ? $filters->enrolment : 'all';
        $sectionname = isset($filters->sectionname) ? $filters->sectionname : '';
        $activityname = isset($filters->activityname) ? $filters->activityname : '';
        $groupname = isset($filters->groupname) ? $filters->groupname : '';
        $tags = array();
        $rtl = isset($filters->dir) ? $filters->dir : get_string('thisdirection', 'langconfig');
        $rtl = $rtl == 'rtl' ? 1: 0;

        // Thess filters are Not included in the summary card.
        $filters->cohort = 0;
        $filters->exclude = [];
        $sectionsql = '';
        $modulesql = '';
        $params = array();
        $countparams = array();
        $timeparams = array();
        if ($filters->section != 0) {
            $sectionsql .= " AND cm.section = :section";
            $countparams['section'] = $filters->section;
            $params['section'] = $filters->section;
            $timeparams['section'] = $filters->section;
            $totalsections = 1;
            $tags[] = $rtl ? array( 'tag' => $sectionname . ' : ' . get_string('section', 'local_edwiserreports')) : array( 'tag' => get_string('section', 'local_edwiserreports') . ' : ' . $sectionname );

        }

        if ($filters->module != 'all') {
            $modulesql .= " AND m.name = :module";
            $params['module'] = $filters->module;
            $countparams['module'] = $filters->module;
            $timeparams['module'] = $filters->module;
            $tags[] = $rtl ?  array( 'tag' => $activityname . ' : ' . get_string('activitytype', 'local_edwiserreports') ) : array( 'tag' => get_string('activitytype', 'local_edwiserreports') . ' : ' . $activityname );
        }

        if($filters->group){
            $tags[] = $rtl ? array( 'tag' => $groupname . ' : ' . get_string('group', 'local_edwiserreports') ) : array( 'tag' => get_string('group', 'local_edwiserreports') . ' : ' . $groupname );
        }

        // Invalid course.
        if ($filters->course == 0 || !$DB->get_record('course', ['id' => $filters->course])) {
            throw new moodle_exception('invalidcourse', 'core_error');
        }

        $users = $this->get_users($filters);

        // Temporary users table.
        $userstable = utility::create_temp_table('tmp_cas_u', array_keys($users));

        $sql = "SELECT cm.id moduleid
                  FROM {course_modules} cm
                  JOIN {modules} m ON cm.module = m.id
                 WHERE cm.course = :course
                    $sectionsql
                    $modulesql
                 ";
        $countparams['course'] = $filters->course;

        $totalactivities = $DB->get_records_sql($sql, $countparams);
        $totalmodules = is_array($totalactivities) ? array_keys($totalactivities) : 0;
        $totalmodulesquery = '';
        
        if(count($totalmodules)){
            $totalmodulesquery = "AND lsl.contextinstanceid IN(". implode(', ', $totalmodules) .")";
        }

        // If no section is selected then show whole course data
        if(!empty($sectionsql) || !empty($modulesql)){
            // Calculating timespent.
            $sql = "SELECT cm.course, SUM(eal.timespent) totaltime
                FROM {{$userstable}} ut
                LEFT JOIN {edwreports_activity_log} eal ON ut.tempid = eal.userid
                JOIN {course_modules} cm ON cm.course = eal.course AND cm.id = eal.activity $sectionsql
                JOIN {modules} m ON cm.module = m.id $modulesql
                WHERE cm.course = :courseid
                GROUP BY cm.course
            ";
            $timeparams['courseid'] = $filters->course;
            $timespent = $DB->get_record_sql($sql, $timeparams);

            // Calculating visits.
            $target = $DB->sql_compare_text('lsl.target');
            $sql = "SELECT COUNT(lsl.id) visits
                    FROM {{$userstable}} ut
                LEFT JOIN {logstore_standard_log} lsl ON ut.tempid = lsl.userid
                    WHERE lsl.courseid = :courseid
                            $totalmodulesquery
                            AND lsl.action = :action
                            AND (($target = :course) OR ($target = :coursemodule AND lsl.objecttable IS NOT NULL))
                ";

            $visits = $DB->get_record_sql($sql, [
                'courseid' => $filters->course,
                'action' => 'viewed',
                'course' => 'course',
                'coursemodule' => 'course_module'
            ]);

        } else {
            // Calculating timespent.
            $sql = "SELECT eal.course, SUM(eal.timespent) totaltime
                FROM {{$userstable}} ut
                LEFT JOIN {edwreports_activity_log} eal ON ut.tempid = eal.userid
                WHERE eal.course = :courseid
                GROUP BY eal.course
            ";
            $timeparams['courseid'] = $filters->course;
            $timespent = $DB->get_record_sql($sql, $timeparams);

            // Calculating visits.
            $target = $DB->sql_compare_text('lsl.target');
            $sql = "SELECT COUNT(lsl.id) visits
                    FROM {{$userstable}} ut
                LEFT JOIN {logstore_standard_log} lsl ON ut.tempid = lsl.userid
                    WHERE lsl.courseid = :courseid
                            AND lsl.action = :action
                            AND (($target = :course) OR ($target = :coursemodule AND lsl.objecttable IS NOT NULL))
                ";

            $visits = $DB->get_record_sql($sql, [
                'courseid' => $filters->course,
                'action' => 'viewed',
                'course' => 'course',
                'coursemodule' => 'course_module'
            ]);

        }
        
        // Progress
        $sql = "SELECT ecp.courseid, SUM(ecp.progress) totalprogress
                    FROM {{$userstable}} ut
                    LEFT JOIN {edwreports_course_progress} ecp ON ut.tempid = ecp.userid
                    WHERE ecp.courseid = :courseid
                    GROUP BY ecp.courseid
                    ";
        $progress = $DB->get_record_sql($sql, [
            'courseid' => $filters->course
        ]);

        // Get sections count
        $sql = "SELECT cm.section, COUNT(cm.id) mods
                FROM {course_modules} cm
                WHERE cm.course = :course
                GROUP BY cm.section";
        $mods = $DB->get_records_sql($sql, ['course' => $filters->course]);

        $enrolled = count($users);
        $visits = $visits->visits > 0 ? $visits->visits : 0;
        $avgvisits = $enrolled > 0 ? round($visits / $enrolled, 2) : 0;
        $avgprogress = $enrolled > 0 ?  round($progress->totalprogress / $enrolled, 2) : 0;
        $avgtimespent = $enrolled > 0 && isset($timespent->totaltime) ?  round($timespent->totaltime / $enrolled, 2) : 0;
        $avgtimespent = $rtl ? date('s:i:H', mktime(0, 0, $avgtimespent)) : date('H:i:s', mktime(0, 0, $avgtimespent));
        $totaltimespent = isset($timespent->totaltime) ? ($rtl ? date('s:i:H', mktime(0, 0, $timespent->totaltime)) : date('H:i:s', mktime(0, 0, $timespent->totaltime))) : 0;
        // As this returns section with 'all' option also
        $totalsections = count($mods);

        $course = $DB->get_record('course', ['id' => $filters->course]);
        // Get category.
        $category = core_course_category::get($course->category);

        // Drop temp table
        utility::drop_temp_table($userstable);

        $footer = array(
            array(                    
                'icon'  => file_get_contents($CFG->dirroot . '/local/edwiserreports/pix/summary-card/totalsections.svg'),
                'title' => get_string('totalsections', 'local_edwiserreports'),
                'data'  => $totalsections
            ),
            array(                    
                'icon'  => file_get_contents($CFG->dirroot . '/local/edwiserreports/pix/summary-card/totalactivities.svg'),
                'title' => get_string('totalactivities', 'local_edwiserreports'),
                'data'  => count($totalmodules)
            )
        );

        if ($filters->section == 0 && $filters->module == 'all') {
            $footer[] = array(                    
                'icon'  => file_get_contents($CFG->dirroot . '/local/edwiserreports/pix/summary-card/progress.svg'),
                'title' => get_string('avgprogress', 'local_edwiserreports'),
                'data'  => $avgprogress . '%'
            );
        }

        return array(
            'header' => array(
                'course' => true,
                'coursename' => format_string($course->fullname, true, ['context' => \context_system::instance()]),
                'category' => format_string($category->get_formatted_name(), true, ['context' => \context_system::instance()]),
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
            'footer' => $footer
        );
    }


}
