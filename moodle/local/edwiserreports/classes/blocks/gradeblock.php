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
 * @copyright   2021 wisdmlabs <support@wisdmlabs.com>
 * @author      Yogesh Shirsath
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace local_edwiserreports\blocks;

use local_edwiserreports\controller\authentication;
use local_edwiserreports\block_base;
use local_edwiserreports\utility;
use html_writer;
use moodle_url;
use core_text;
use cache;

/**
 * Active users block.
 */
class gradeblock extends block_base {
    /**
     * Get the first site access data.
     *
     * @var null
     */
    public $firstsiteaccess;

    /**
     * Current time
     *
     * @var int
     */
    public $enddate;

    /**
     * No. of labels for active users.
     *
     * @var int
     */
    public $xlabelcount;

    /**
     * Cache
     *
     * @var object
     */
    public $cache;

    /**
     * Dates main array.
     *
     * @var array
     */
    public $dates = [];

    /**
     * Instantiate object
     *
     * @param int $blockid Block id
     */
    public function __construct($blockid = false) {
        parent::__construct($blockid);
        // Set cache for block.
        $this->sessioncache = cache::make('local_edwiserreports', 'grade_session');
    }

    /**
     * Return true if current block is graphical block.
     *
     * @return boolean
     */
    public function is_graphical() {
        return true;
    }

    /**
     * Preapre layout for each block
     * @return object Layout
     */
    public function get_layout() {
        global $CFG;

        // Layout related data.
        $this->layout->id = 'gradeblock';
        $this->layout->name = get_string('gradeheader', 'local_edwiserreports');
        $this->layout->info = get_string('gradeblockhelp', 'local_edwiserreports');
        $this->layout->filters = $this->get_filter();

        // Check capability of learnercourseactivities.
        $capname = 'report/edwiserreports_learnercourseactivities:view';
        if (has_capability($capname, \context_system::instance()) || can_view_block($capname)) {
            $this->layout->morelink = new moodle_url($CFG->wwwroot . "/local/edwiserreports/learnercourseactivities.php");
        }

        // To add export links.
        $this->layout->downloadlinks = $this->get_block_download_options(true);

        $this->layout->filter = '0-0-0-0';
        $this->layout->cohortid = 0;

        // Add block view in layout.
        $this->layout->blockview = $this->render_block('gradeblock', $this->block);

        // Set block edit capabilities.
        $this->set_block_edit_capabilities($this->layout->id);

        // Return blocks layout.
        return $this->layout;
    }

    /**
     * Prepare active users block filters
     * @param  $onlycourses Return only courses dropdown for current user.
     * @return array filters array
     */
    public function get_filter($onlycourses = false) {
        global $OUTPUT, $USER, $COURSE, $USER;

        $courses = $this->get_courses_of_user($USER->id);

        unset($courses[$COURSE->id]);

        $users = $this->get_users_of_courses($USER->id, $courses);

        array_unshift($users, (object)[
            'id' => 0,
            'fullname' => get_string('allusers', 'search')
        ]);

        array_unshift($courses, (object)[
            'id' => 0,
            'fullname' => get_string('fulllistofcourses')
        ]);

        // Return only courses array if $onlycourses is true.
        if ($onlycourses == true) {
            return $courses;
        }
        return $OUTPUT->render_from_template('local_edwiserreports/blocks/gradeblockfilters', [
            'cohort' => $this->get_cohorts(),
            'group' => $this->get_default_group_filter(),
            'courses' => $courses,
            'students' => $users
        ]);
    }

    /**
     * Generate cache key for blocks
     * @param  string $blockname Block name
     * @param  string $filter    Filter
     * @param  int    $cohortid  Cohort id
     * @return string            Cache key
     */
    public function generate_cache_key($blockname, $filter, $cohortid = 0) {
        $cachekey = $blockname . "-" . $filter . "-";

        if ($cohortid) {
            $cachekey .= $cohortid;
        } else {
            $cachekey .= "all";
        }

        return $cachekey;
    }

    /**
     * Get grade scores for pie chart based on query.
     *
     * @param array  $gradescores   Default grade scores
     * @param string $sql           SQL query
     * @param array  $params        Parameters for SQL query
     *
     * @return array
     */
    private function get_grade_scores($gradescores, $sql, $params) {
        global $DB;
        $grades = $DB->get_recordset_sql($sql, $params);
        if (!$grades->valid()) {
            return [$gradescores, 0];
        }
        $total = 0;
        $count = 0;
        foreach ($grades as $grade) {
            $count++;
            $total += $grade->grade;
            switch(true) {
                case $grade->grade === null || $grade->grade <= 20:
                    $index = '0% - 20%';
                    break;
                case $grade->grade <= 40:
                    $index = '21% - 40%';
                    break;
                case $grade->grade <= 60:
                    $index = '41% - 60%';
                    break;
                case $grade->grade <= 80;
                    $index = '61% - 80%';
                    break;
                default:
                    $index = '81% - 100%';
                    break;
            }
            $gradescores[$index]++;
        }
        return [$gradescores, $total == 0 ? 0 : $total / $count];
    }

    /**
     * Get pie chart data
     *
     * @param object $filter Block filters
     *
     * @return array
     */
    public function get_graph_data($filter) {
        $cohort = isset($filter->cohort) ? $filter->cohort : 0;
        $course = $filter->course;
        $group = $filter->group;
        $userid = $filter->student;

        $cachekey = $this->generate_cache_key('grade', implode('-', [$cohort, $course, $group, $userid]));

        if (!$response = $this->sessioncache->get($cachekey)) {
            if ($course == 0) {
                $courses = $this->get_courses_of_user($this->get_current_user());
                unset($courses[SITEID]);
            }

            if ($userid == 0) {
                $users = $this->get_user_from_cohort_course_group($cohort, $course, $group, $this->get_current_user());
            }

            $params = [];

            // Default grade scores.
            $gradescores = [
                '0% - 20%' => 0,
                '21% - 40%' => 0,
                '41% - 60%' => 0,
                '61% - 80%' => 0,
                '81% - 100%' => 0
            ];

            if ($course == 0) {
                // Temporary course table.
                $coursetable = utility::create_temp_table('tmp_gb_c', array_keys($courses));
            }

            if ($userid == 0) {
                // Temporary user table.
                $userstable = utility::create_temp_table('tmp_gb_u', array_keys($users));
            }
            switch (true) {
                case $course == 0 && $userid == 0:
                    // Students grade categories.
                    $sql = "SELECT (gg.finalgrade / gg.rawgrademax * 100) grade
                              FROM {{$coursetable}} ct
                              JOIN {grade_items} gi ON ct.tempid = gi.courseid
                              JOIN {grade_grades} gg ON gi.id = gg.itemid
                              JOIN {{$userstable}} ut ON ut.tempid = gg.userid
                             WHERE gi.itemtype = :itemtype";
                    $params['itemtype'] = 'course';
                    $header = 'studentgrades';
                    $tooltip = [
                        'single' => 'student',
                        'plural' => 'students'
                    ];
                    break;
                case $course != 0 && $userid == 0:
                    // Students grade categories.
                    $sql = "SELECT (gg.finalgrade / gg.rawgrademax * 100) grade
                              FROM {{$userstable}} ut
                              JOIN {grade_grades} gg ON ut.tempid = gg.userid
                              JOIN {grade_items} gi ON gi.id = gg.itemid
                             WHERE gi.itemtype = :itemtype
                               AND gi.courseid = :course";
                    $params['itemtype'] = 'course';
                    $params['course'] = $course;
                    $header = 'studentgrades';
                    $tooltip = [
                        'single' => 'student',
                        'plural' => 'students'
                    ];
                    break;
                case $course == 0 && $userid != 0:
                    // Courses grade categories.
                    $sql = "SELECT (gg.finalgrade / gg.rawgrademax * 100) grade
                              FROM {{$coursetable}} ct
                              JOIN {grade_items} gi ON ct.tempid = gi.courseid
                              JOIN {grade_grades} gg ON gi.id = gg.itemid
                             WHERE gi.itemtype = :itemtype
                               AND gg.userid = :userid";
                    $params['itemtype'] = 'course';
                    $params['userid'] = $userid;
                    $header = 'coursegrades';
                    $tooltip = [
                        'single' => 'course',
                        'plural' => 'courses'
                    ];
                    break;
                case $course != 0 && $userid != 0:
                    // Activity grade categories.
                    $sql = "SELECT (gg.finalgrade / gg.rawgrademax * 100) grade
                              FROM {grade_items} gi
                              JOIN {grade_grades} gg ON gi.id = gg.itemid
                             WHERE gi.itemtype = :itemtype
                               AND gg.userid = :userid
                               AND gi.courseid = :course";
                    $params['itemtype'] = 'mod';
                    $params['userid'] = $userid;
                    $params['course'] = $course;
                    $header = 'activitygrades';
                    $tooltip = [
                        'single' => 'activity',
                        'plural' => 'activities'
                    ];
                    break;
            }
            [$gradescores, $average] = $this->get_grade_scores($gradescores, $sql, $params);
            $labels = array_keys($gradescores);
            $grades = array_values($gradescores);
            if (array_sum($grades) == 0) {
                $grades = [];
                $labels = [];
            }
            if ($course == 0) {
                // Drop temporary table.
                utility::drop_temp_table($coursetable);
            }
            if ($userid == 0) {
                // Drop temporary table.
                utility::drop_temp_table($userstable);
            }
            $response = [
                'labels' => $labels,
                'grades' => $grades,
                'header' => $header,
                'tooltip' => $tooltip,
                'average' => $average
            ];
            $this->sessioncache->set($cachekey, $response);
        }
        return $response;
    }

    /**
     * Get additional filename content for export
     *
     * @param string $filter Filter object
     *
     * @return string
     */
    public function get_exportable_data_block_file_postfix($filter) {
        global $DB;
        $filter = json_decode($filter);
        $filename = '';
        $courseid = $filter->course;
        $userid = $filter->student;
        if ($courseid != 0 && $course = $DB->get_record('course', array('id' => $courseid))) {
            $filename .= '-' . clean_param($course->fullname, PARAM_FILE);
        }
        if ($userid != 0 && $user = $DB->get_record('user', array('id' => $userid))) {
            $filename .= '-' . clean_param(fullname($user), PARAM_FILE);
        }
        return $filename;
    }

    /**
     * Get exportable data for block
     * @param  string $filter     Filter to apply on data
     * @param  bool   $filterdata If enabled then filter data
     * @return array
     */
    public function get_exportable_data_block($filter, $filterdata = true) {
        // Filter object.
        $filter = json_decode($filter);

        if (!isset($filter->cohort)) {
            $filter->cohort = 0;
        }

        if ($filterdata == false) {
            $filter->cohort = 0;
            $filter->course = 0;
            $filter->group = 0;
            $filter->student = 0;
        }

        return $this->get_graph_data($filter);
    }

    /**
     * Get modal table based on filter and range
     *
     * @param object $filter    Filters
     * @param string $range     Selected range
     *
     * @return string html table
     */
    public function get_modal_table($filter, $range) {
        global $DB;

        $params = [];
        $rangecondition = "";

        // Map range with conditions.
        switch ($range) {
            case "0to20":
                $rangecondition = "((gg.finalgrade / gg.rawgrademax * 100) IS NULL
                                    OR (gg.finalgrade / gg.rawgrademax * 100) <= :mingrades)";
                $params['mingrades'] = 20;
                break;
            case "21to40":
                $rangecondition = "(gg.finalgrade / gg.rawgrademax * 100) > :mingrades
                          AND (gg.finalgrade / gg.rawgrademax * 100) <= :maxgrades";
                $params['mingrades'] = 20;
                $params['maxgrades'] = 40;
                break;
            case "41to60":
                $rangecondition = "(gg.finalgrade / gg.rawgrademax * 100) > :mingrades
                          AND (gg.finalgrade / gg.rawgrademax * 100) <= :maxgrades";
                $params['mingrades'] = 40;
                $params['maxgrades'] = 60;
                break;
            case "61to80":
                $rangecondition = "(gg.finalgrade / gg.rawgrademax * 100) > :mingrades
                          AND (gg.finalgrade / gg.rawgrademax * 100) <= :maxgrades";
                $params['mingrades'] = 60;
                $params['maxgrades'] = 80;
                break;
            case "81to100":
                $rangecondition = "(gg.finalgrade / gg.rawgrademax * 100) > :maxgrades";
                $params['maxgrades'] = 80;
                break;
        }

        $courses = [];
        if ($filter->course == 0) {
            $courses = $this->get_courses_of_user($this->get_current_user());
            unset($courses[SITEID]);
        } else {
            $courses = [$filter->course => $DB->get_record('course', ['id' => $filter->course])];
        }

        $content = '';
        $header = [];
        $rows = [];
        switch (true) {
            // When all students are selected.
            case $filter->student == 0:
                $header = [get_string('student', 'local_edwiserreports'), get_string('email', 'local_edwiserreports')];
                if ($filter->course == 0) {
                    $header[] = get_string('course', 'local_edwiserreports');
                } else {
                    $content = get_string('course', 'local_edwiserreports') . ': ' . format_string(reset($courses)->fullname, true, ['context' => \context_system::instance()]);
                }
                $header[] = get_string('grade', 'local_edwiserreports');
                foreach ($courses as $course) {
                    $userstable = utility::create_temp_table('temp_gb_mt', array_keys(
                        $this->get_user_from_cohort_course_group($filter->cohort, $course->id, $filter->group))
                    );
                    // Students grade categories.
                    $fullname = $DB->sql_fullname('u.firstname', 'u.lastname');
                    $sql = "SELECT $fullname fullname, u.email, (gg.finalgrade / gg.rawgrademax * 100) grade
                              FROM {{$userstable}} ut
                              JOIN {user} u ON ut.tempid = u.id
                              JOIN {grade_grades} gg ON ut.tempid = gg.userid
                              JOIN {grade_items} gi ON gg.itemid = gi.id
                             WHERE $rangecondition
                               AND gi.itemtype = :itemtype
                               AND gi.courseid = :course";
                    $params['itemtype'] = 'course';
                    $params['course'] = $course->id;
                    $records = $DB->get_recordset_sql($sql, $params);
                    if (!$records->valid()) {
                        utility::drop_temp_table($userstable);
                        continue;
                    }
                    if ($filter->course == 0) {
                        foreach ($records as $record) {
                            $rows[] = [
                                $record->fullname,
                                $record->email,
                                $course->fullname,
                                $record->grade == 0 ? 0 : round($record->grade, 2) . '%'
                            ];
                        }
                    } else {
                        foreach ($records as $record) {
                            $rows[] = [
                                $record->fullname,
                                $record->email,
                                $record->grade == 0 ? 0 : round($record->grade, 2) . '%'
                            ];
                        }
                    }
                    utility::drop_temp_table($userstable);
                }
                break;
            // Any student and All courses selected.
            case $filter->course == 0:
                $header = [
                    get_string('course', 'local_edwiserreports'),
                    get_string('grade', 'local_edwiserreports')
                ];
                $content = get_string('student', 'local_edwiserreports') . ': ' .
                fullname($DB->get_record('user', ['id' => $filter->student]));
                foreach ($courses as $course) {
                    // Students grade categories.
                    $sql = "SELECT (gg.finalgrade / gg.rawgrademax * 100) grade
                              FROM {grade_grades} gg
                              JOIN {grade_items} gi ON gg.itemid = gi.id
                                                    AND gi.itemtype = :itemtype
                                                    AND gi.courseid = :course
                             WHERE $rangecondition
                               AND gg.userid = :userid";
                    $params['itemtype'] = 'course';
                    $params['course'] = $course->id;
                    $params['userid'] = $filter->student;
                    $records = $DB->get_recordset_sql($sql, $params);

                    if (!$records->valid()) {
                        continue;
                    }
                    foreach ($records as $record) {
                        $rows[] = [
                            format_string($course->fullname, true, ['context' => \context_system::instance()]),
                            $record->grade == 0 ? 0 : round($record->grade, 2) . '%'
                        ];
                    }
                }
                break;
            // When student and course is selected.
            default:
                $cms = get_fast_modinfo($filter->course)->get_cms();
                $content = get_string('course', 'local_edwiserreports') . ': ' . format_string(reset($courses)->fullname, true, ['context' => \context_system::instance()]).
                '<br>' . get_string('student', 'local_edwiserreports') . ': ' .
                fullname($DB->get_record('user', ['id' => $filter->student]));
                $header = [
                    get_string('activityname', 'local_edwiserreports'),
                    get_string('grade', 'local_edwiserreports')
                ];
                // Students grade categories.
                $fullname = $DB->sql_fullname('u.firstname', 'u.lastname');
                $sql = "SELECT cm.id, (gg.finalgrade / gg.rawgrademax * 100) grade
                          FROM {grade_items} gi
                          JOIN {modules} m ON gi.itemmodule = m.name
                          JOIN {course_modules} cm ON gi.courseid = cm.course
                                                  AND gi.iteminstance = cm.instance
                                                  AND gi.itemtype = :itemtype
                                                  AND m.id = cm.module
                          JOIN {grade_grades} gg ON gg.itemid = gi.id
                         WHERE $rangecondition
                           AND gg.userid = :userid
                           AND gi.courseid = :course";
                $params['itemtype'] = 'mod';
                $params['course'] = $filter->course;
                $params['userid'] = $filter->student;
                $records = $DB->get_recordset_sql($sql, $params);
                if (!$records->valid()) {
                    break;
                }
                foreach ($records as $record) {
                    $rows[] = [
                        $cms[$record->id]->name,
                        $record->grade == 0 ? 0 : round($record->grade, 2) . '%'
                    ];
                }
                break;
        }

        return [
            'content' => $content,
            'header' => $header,
            'rows' => $rows,
            'searchicon' => \local_edwiserreports\utility::image_icon('actions/search'),
            'placeholder' => get_string('searchuser', 'local_edwiserreports')
        ];
    }
}
