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
use moodle_url;
use cache;
/**
 * Class Visits on site. To get the data related to Visits on site.
 */
class courseactivitystatusblock extends block_base {

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
     * Active users block labels
     *
     * @var array
     */
    public $labels;

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
        // Set cache for student engagement block.
        $this->sessioncache = cache::make('local_edwiserreports', 'courseactivitystatus');
        $this->precalculated = get_config('local_edwiserreports', 'precalculated');
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
     * Preapre layout for Visits on site
     * @return object Layout object
     */
    public function get_layout() {
        global $CFG;

        // Layout related data.
        $this->layout->id = 'courseactivitystatusblock';
        $this->layout->name = get_string('courseactivitystatusheader', 'local_edwiserreports');
        $this->layout->info = get_string('courseactivitystatusblockhelp', 'local_edwiserreports');
        $this->layout->filters = $this->get_filter();
        $this->layout->filter = 'last7days-0-0-0-0';
        $this->layout->morelink = new moodle_url($CFG->wwwroot . "/local/edwiserreports/studentengagement.php");

        // To add export links.
        $this->layout->downloadlinks = $this->get_block_download_options(true);

        // Add block view in layout.
        $this->layout->blockview = $this->render_block('courseactivitystatusblock', $this->block);

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
        global $OUTPUT, $USER, $COURSE, $USER, $DB;

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

        return $OUTPUT->render_from_template('local_edwiserreports/blocks/courseactivitystatusblockfilters', [
            'cohort' => $this->get_cohorts(),
            'group' => $this->get_default_group_filter(),
            'courses' => $courses,
            'students' => $users
        ]);
    }

    /**
     * Generate labels and dates array for graph
     *
     * @param string $timeperiod Filter time period Last 7 Days/Weekly/Monthly/Yearly or custom dates.
     */
    private function generate_labels($timeperiod) {
        $this->dates = [];
        $this->labels = [];

        // Get start and end date.
        list($this->startdate, $this->enddate, $this->xlabelcount) = $this->get_date_range($timeperiod);

        // Get all lables.
        for ($i = $this->xlabelcount; $i >= 0; $i--) {
            $time = $this->enddate - $i * LOCAL_SITEREPORT_ONEDAY;
            $this->dates[floor($time / LOCAL_SITEREPORT_ONEDAY)] = 0;
            $this->labels[] = $time * 1000;
        }
    }

    /**
     * Calculate insight data for active users block.
     *
     * @param object $filter      Filter
     * @param string $coursetable Temporary Course table name
     * @param string $userstable  Temporary User table name
     * @param object $data        Response data
     *
     * @return object
     */
    public function calculate_insight($filter, $coursetable, $userstable, $data) {
        global $DB;
        $totalcompletion = 0;
        $count = 0;
        foreach ($data['completions'] as $completion) {
            $totalcompletion += $completion;
            $count ++;
        }

        $averagecompletions = $totalcompletion == 0 ? 0 : round($totalcompletion / $count);

        $insight = [
            'insight' => [
                'title' => 'averagecompletion',
                'value' => $averagecompletions
            ],
            'details' => [
                'data' => [[
                    'title' => 'totalassignment',
                    'value' => array_sum($data['submissions'])
                ], [
                    'title' => 'totalcompletion',
                    'value' => $totalcompletion
                ]]
            ]
        ];

        $userid = $filter->student;
        $cohort = $filter->cohort;
        $course = $filter->course;
        $group = $filter->group;
        $timeperiod = $filter->date;

        list($startdate, $enddate) = $this->get_old_date_range(
            $timeperiod,
            $this->startdate,
            $this->enddate
        );

        $params = [
            'startdate' => floor($startdate / 86400),
            'enddate' => floor($enddate / 86400)
        ];

        // Cohort join.
        $cohortjoin = '';
        if ($cohort != 0) {
            $cohortjoin = "JOIN {cohort_members} chm ON chm.userid = cmc.userid AND chm.cohortid = :cohort";
            $params['cohort'] = $cohort;
        }

        // Group join.
        $nongroup = "";
        $groupjoin = "";
        switch ($group) {
            case 0:
                break;
            case -1:
                $nongroup = "AND cmc.userid NOT IN (
                    SELECT gm.userid
                    FROM {groups} g
                    JOIN {groups_members} gm ON g.id = gm.groupid
                    WHERE g.courseid = :gcourseid
                )";
                $params['gcourseid'] = $course;
                break;
            default:
                $groupjoin = "JOIN {groups_members} gm ON cmc.userid = gm.userid AND gm.groupid = :group";
                $params['group'] = $group;
                break;
        }

        $sql = "SELECT count(cmc.id) AS completed
                  FROM {{$coursetable}} ct
                  JOIN {course_modules} cm ON ct.tempid = cm.course
                  JOIN {course_modules_completion} cmc ON cm.id = cmc.coursemoduleid $nongroup
                  JOIN {{$userstable}} ut ON cmc.userid = ut.tempid
                  $cohortjoin
                  $groupjoin
                 WHERE cmc.completionstate <> 0
                   AND floor(cmc.timemodified / 86400) BETWEEN :startdate AND :enddate";

        if ($userid !== 0) { // User is selected in dropdown.
            $sql .= ' AND cmc.userid = :userid ';
            $params['userid'] = $userid;
        }

        $count = $params['enddate'] - $params['startdate'] + 1;

        $oldcompletions = $DB->get_field_sql($sql, $params);
        $oldaveragecompletions = $oldcompletions == 0 ? 0 : ($count == 0 ? : round($oldcompletions / $count));
        $insight = $this->calculate_insight_difference($insight, $averagecompletions, $oldaveragecompletions);
        return $insight;
    }

    /**
     * Use this method to return data for block.
     * Get Data for block
     * @param  object $filter Filter object
     * @return object         Response
     */
    public function get_data($filter = false) {
        global $DB;
        $cohort = $filter->cohort;
        $course = $filter->course;
        $group = $filter->group;
        $userid = $filter->student;
        $timeperiod = $filter->date;
        $insight = isset($filter->insight) ? $filter->insight : true;
        $implode = implode('-', [$timeperiod, $cohort, $course, $group, $userid]);
        $cachekey = $this->generate_cache_key(
            'studentengagement',
            'courseactivitystatus-' . $implode
        );

        $this->generate_labels($timeperiod);

        // Preserving dates.
        $dates = $this->dates;

        if (!$response = $this->sessioncache->get($cachekey)) {
            $params = [
                'startdate' => $this->startdate - 86400,
                'enddate' => $this->enddate + 86400,
                'status' => 'submitted'
            ];

            if ($course == 0) {
                $courses = $this->get_courses_of_user($this->get_current_user());
            } else {
                $courses = [$course => 'Dummy'];
            }
            // Temporary course table.
            $coursetable = utility::create_temp_table('tmp_cas_c', array_keys($courses));

            if ($userid == 0) {
                $users = $this->get_user_from_cohort_course_group($cohort, $course, $group, $this->get_current_user());
            } else {
                $users = [$userid => 'Dummy'];
            }
            // Temporary user table.
            $userstable = utility::create_temp_table('tmp_cas_u', array_keys($users));

            switch ($implode . '-' . $this->precalculated) {
                case 'last7days-0-0-0-0-1':
                case 'weekly-0-0-0-0-1':
                case 'monthly-0-0-0-0-1':
                case 'yearly-0-0-0-0-1':
                    $subsql = "SELECT esd.datecreated subdate, sum(" . $DB->sql_cast_char2int("esd.datavalue", true) . ") submission
                                 FROM {{$coursetable}} ct
                                 JOIN {edwreports_summary_detailed} esd ON ct.tempid = esd.course
                                WHERE " . $DB->sql_compare_text('datakey', 255) . " = " .
                                $DB->sql_compare_text(':subdatakey', 255) . "
                                GROUP BY esd.datecreated";
                    $params['subdatakey'] = 'studentengagement-courseactivity-submissions';

                    $comsql = "SELECT esd.datecreated subdate, sum(" . $DB->sql_cast_char2int("esd.datavalue", true) . ") completed
                                 FROM {{$coursetable}} ct
                                 JOIN {edwreports_summary_detailed} esd ON ct.tempid = esd.course
                                WHERE " . $DB->sql_compare_text('esd.datakey', 255) . " = " .
                                $DB->sql_compare_text(':comdatakey', 255) . "
                                GROUP BY esd.datecreated";
                    $params['comdatakey'] = 'studentengagement-courseactivity-completions';
                    break;
                default:
                    $cohortjoin = "";
                    if ($cohort != 0) {
                        $cohortjoin = "JOIN {cohort_members} chm ON asub.userid = chm.userid AND chm.cohortid = :cohort";
                        $params['cohort'] = $cohort;
                    }
                    // Group join.
                    $nongroup = "";
                    $groupjoin = "";
                    switch ($group) {
                        case 0:
                            break;
                        case -1:
                            $nongroup = "AND asub.userid NOT IN (
                                SELECT gm.userid
                                FROM {groups} g
                                JOIN {groups_members} gm ON g.id = gm.groupid
                                WHERE g.courseid = :gcourseid
                            )";
                            $params['gcourseid'] = $course;
                            break;
                        default:
                            $groupjoin = "JOIN {groups_members} gm ON asub.userid = gm.userid AND gm.groupid = :group";
                            $params['group'] = $group;
                            break;
                    }
                    $asubstatus = $DB->sql_compare_text('asub.status', 255);
                    $subsql = "SELECT floor(asub.timecreated / 86400) subdate, count(asub.id) submission
                              FROM {{$coursetable}} ct
                              JOIN {assign} a ON ct.tempid = a.course
                              JOIN {assign_submission} asub ON a.id = asub.assignment AND $asubstatus = :status $nongroup
                              JOIN {{$userstable}} ut ON asub.userid = ut.tempid
                              $cohortjoin
                              $groupjoin
                             WHERE asub.timecreated >= :startdate
                               AND asub.timecreated <= :enddate ";
                    $cohortjoin = "";
                    if ($cohort != 0) {
                        $cohortjoin = "JOIN {cohort_members} chm ON cmc.userid = chm.userid AND chm.cohortid = :cohort";
                    }

                    // Group join.
                    $nongroup = "";
                    $groupjoin = "";
                    switch ($group) {
                        case 0:
                            break;
                        case -1:
                            $nongroup = "AND cmc.userid NOT IN (
                                SELECT gm.userid
                                FROM {groups} g
                                JOIN {groups_members} gm ON g.id = gm.groupid
                                WHERE g.courseid = :gcourseid
                            )";
                            break;
                        default:
                            $groupjoin = "JOIN {groups_members} gm ON cmc.userid = gm.userid AND gm.groupid = :group";
                            break;
                    }
                    $comsql = "SELECT floor(cmc.timemodified / 86400) comdate, count(cmc.id) completed
                                 FROM {{$coursetable}} ct
                                 JOIN {course_modules} cm ON ct.tempid = cm.course
                                 JOIN {course_modules_completion} cmc ON cm.id = cmc.coursemoduleid $nongroup
                                 $cohortjoin
                                 $groupjoin
                                 JOIN {{$userstable}} ut ON cmc.userid = ut.tempid
                                WHERE cmc.completionstate <> 0
                                  AND cmc.timemodified >= :startdate
                                  AND cmc.timemodified <= :enddate ";

                    $subsql .= " GROUP BY floor(asub.timecreated / 86400)";
                    $comsql .= " GROUP BY floor(cmc.timemodified / 86400)";
                    break;
            }

            $sublogs = $DB->get_records_sql($subsql, $params);
            $comlogs = $DB->get_records_sql($comsql, $params);

            $completions = $submissions = $this->dates;
            $hasdata = false;
            foreach ($sublogs as $date => $log) {
                if (isset($submissions[$date])) {
                    $submissions[$date] = $log->submission;
                    if ($log->submission > 0) {
                        $hasdata = true;
                    }
                }
            }

            foreach ($comlogs as $date => $log) {
                if (isset($completions[$date])) {
                    $completions[$date] = $log->completed;
                    if ($log->completed > 0) {
                        $hasdata = true;
                    }
                }
            }

            if ($hasdata == false) {
                $submissions = [];
                $completions = [];
            }

            if (empty($submissions) && empty($completions)) {
                $this->labels = [];
            }

            $response = [
                'submissions' => array_values($submissions),
                'completions' => array_values($completions),
                'labels' => $this->labels,
                'dates' => array_keys($dates)
            ];

            // If insight variable is true then only calculate insight.
            if ($insight) {
                $response['insight'] = $this->calculate_insight($filter, $coursetable, $userstable, $response);
            }

            // Reassign dates. To tackle exporting data.
            $this->dates = $dates;

            // Drop course table.
            utility::drop_temp_table($coursetable);

            // Drop user table.
            utility::drop_temp_table($userstable);

            // Set response in cache.
            $this->sessioncache->set($cachekey, $response);
        }
        return $response;
    }

    /**
     * If block is exporting any data then include this method.
     * Get Exportable data for Visits on site
     * @param  string $filter     Filter to apply on data
     * @param  bool   $filterdata If enabled then filter data
     * @return array              Array of exportable data
     */
    public function get_exportable_data_block($filter, $filterdata = true) {
        // Filter object.
        $filter = json_decode($filter);
        if ($filterdata == false) {
            $filter->cohort = 0;
            $filter->course = 0;
            $filter->group = 0;
            $filter->student = 0;
            $filter->date = 'last7days';
        }
        // Do not calculate insight cause it is not printed in image.
        $filter->insight = false;

        // Fetching graph record.
        return $this->get_data($filter);
    }
}
