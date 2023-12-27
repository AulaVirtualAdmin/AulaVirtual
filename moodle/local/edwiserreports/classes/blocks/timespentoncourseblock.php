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
use context_system;
use moodle_url;
use cache;

/**
 * Class Time Spent on Course. To get the data related to Time Spent on Course.
 */
class timespentoncourseblock extends block_base {

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
        $this->sessioncache = cache::make('local_edwiserreports', 'timespentoncourse');
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
        $this->layout->id = 'timespentoncourseblock';
        $this->layout->name = get_string('timespentoncourseheader', 'local_edwiserreports');
        $this->layout->info = get_string('timespentoncourseblockhelp', 'local_edwiserreports');
        $this->layout->filters = $this->get_filter();
        $this->layout->filter = 'last7days-0-0-0-0';
        $this->layout->morelink = new moodle_url($CFG->wwwroot . "/local/edwiserreports/studentengagement.php");

        // To add export links.
        $this->layout->downloadlinks = $this->get_block_download_options(true);

        // Add block view in layout.
        $this->layout->blockview = $this->render_block('timespentoncourseblock', $this->block);

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

        return $OUTPUT->render_from_template('local_edwiserreports/blocks/timespentoncourseblockfilters', [
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
     * Generate courses labels and date boundaries for sql.
     *
     * @param string $timeperiod Filter time period Last 7 Days/Weekly/Monthly/Yearly or custom dates.
     * @param array $courses     Courses array
     */
    private function generate_courses_labels($timeperiod, $courses) {

        // Get start and end date.
        list($this->startdate, $this->enddate, $this->xlabelcount) = $this->get_date_range($timeperiod);

        $this->courses = [];
        $this->labels = [];
        if (!empty($courses)) {
            foreach ($courses as $id => $course) {
                $this->courses[$id] = 0;
                $this->labels[$id] = format_string($course->fullname, true, ['context' => \context_system::instance()]);
            }
        }
    }

    /**
     * Calculate course insight data for time spent on site block.
     *
     * @param int    $courseid    Course id
     * @param string $userstable  Temporary User table name
     * @param int    $timespent   Time spent
     * @param int    $startdate   Old start date(Previous period)
     * @param int    $enddate     Old end date(Previous period)
     *
     * @return object
     */
    public function calculate_course_insight($courseid, $userstable, $timespent, $startdate, $enddate) {
        global $DB;

        $this->totaltimespent += $timespent;

        $params = [
            'startdate' => floor($startdate / 86400),
            'enddate' => floor($enddate / 86400),
            'courseid' => $courseid
        ];

        $sql = "SELECT SUM(al.timespent) timespent
                  FROM {edwreports_activity_log} al
                  JOIN {{$userstable}} ut ON al.userid = ut.tempid
                 WHERE al.datecreated BETWEEN :startdate AND :enddate
                   AND al.course = :courseid";

        $oldtimespent = $DB->get_field_sql($sql, $params);
        $this->oldatimespent += $oldtimespent == 0 ? 0 : $oldtimespent;
    }

    /**
     * Calculate course insight data for time spent on site block.
     *
     * @param int    $courseid    Course id
     * @param string $userstable  Temporary User table name
     * @param object $data        Response data
     * @param int    $startdate   Old start date(Previous period)
     * @param int    $enddate     Old end date(Previous period)
     *
     * @return object
     */
    public function calculate_date_insight($courseid, $userstable, $data, $startdate, $enddate) {
        global $DB;
        $totaltimespent = 0;
        $count = 0;
        foreach ($data as $timespent) {
            $totaltimespent += $timespent;
            $count++;
        }

        $this->averagetimespent = $totaltimespent == 0 ? 0 : round($totaltimespent / $count);
        $this->totaltimespent = $totaltimespent;

        $params = [
            'startdate' => floor($startdate / 86400),
            'enddate' => floor($enddate / 86400),
            'courseid' => $courseid
        ];

        $sql = "SELECT sum(al.timespent) timespent
                  FROM {edwreports_activity_log} al
                  JOIN {{$userstable}} ut ON al.userid = ut.tempid
                 WHERE al.datecreated BETWEEN :startdate AND :enddate
                   AND al.course = :courseid";

        $count = $params['enddate'] - $params['startdate'] + 1;

        $oldtimespent = $DB->get_field_sql($sql, $params);
        $this->oldaveragetimespent = $oldtimespent == 0 ? 0 : round($oldtimespent / $count);
    }

    /**
     * Get timespent data on course.
     *
     * @param array     $params         Parameters
     * @param int       $cohort         Cohort id
     * @param array     $courseid       Course id
     * @param int       $group          Group id
     * @param int       $userid         User id
     * @param bool      $insight        True if insights need to be calculated
     * @param int       $oldstartdate   Old start date(Previous period)
     * @param int       $oldenddate     Old end date(Previous period)
     *
     * @return array                Response array
     */
    public function get_course_data(
        $params,
        $cohort,
        $courseid,
        $group,
        $userid,
        $timeperiod,
        $insight,
        $oldstartdate,
        $oldenddate
    ) {
        global $DB;

        if ($userid == 0) {
            $users = utility::get_enrolled_students($courseid, false, $cohort, $group);
        } else {
            $users = [$userid => 'Dummy'];
        }

        if (count($users) < 1) {
            return 0;
        }
        // Temporary course table.
        $userstable = utility::create_temp_table('tmp_tsos_c', array_keys($users));

        $params['course'] = $courseid;

        switch (implode('-', [$timeperiod, $cohort, $group, $userid]). '-' . $this->precalculated) {
            case 'last7days-0-0-0-1':
            case 'weekly-0-0-0-1':
            case 'monthly-0-0-0-1':
            case 'yearly-0-0-0-1':
                $datavalconvert = $DB->sql_cast_char2int("datavalue", true);
                $sql = "SELECT SUM($datavalconvert) timespent
                          FROM {edwreports_summary_detailed}
                         WHERE datecreated BETWEEN :startdate AND :enddate
                           AND course = :course";
                break;
            default:
                $sql = "SELECT SUM(eal.timespent) timespent
                          FROM {edwreports_activity_log} eal
                          JOIN {{$userstable}} ut ON eal.userid = ut.tempid
                         WHERE eal.datecreated BETWEEN :startdate AND :enddate
                           AND eal.course = :course";
                break;
        }

        $timespent = $DB->get_field_sql($sql, $params);

        // If insight variable is true then only calculate insight.
        if ($insight) {
            $this->calculate_course_insight(
                $courseid,
                $userstable,
                $timespent,
                $oldstartdate,
                $oldenddate
            );
        }

        utility::drop_temp_table($userstable);
        // Set respose in cache.

        return $timespent;
    }

    /**
     * Get timespent data on course.
     *
     * @param array     $params         Parameters
     * @param int       $cohort         Cohort id
     * @param array     $courseid       Course id
     * @param int       $group          Group id
     * @param int       $userid         User id
     * @param bool      $insight        True if insights need to be calculated
     * @param int       $oldstartdate   Old start date(Previous period)
     * @param int       $oldenddate     Old end date(Previous period)
     *
     * @return array                Response array
     */
    public function get_date_data($params, $cohort, $courseid, $group, $userid, $insight, $oldstartdate, $oldenddate) {
        global $DB;

        if ($userid == 0) {
            $users = utility::get_enrolled_students($courseid, false, $cohort, $group);
        } else {
            $users = [$userid => 'Dummy'];
        }
        if (count($users) < 1) {
            return;
        }
        // Temporary course table.
        $userstable = utility::create_temp_table('tmp_tsos_c', array_keys($users));

        $params['course'] = $courseid;

        $sql = "SELECT al.datecreated, sum(al.timespent) timespent
                  FROM {edwreports_activity_log} al
                  JOIN {{$userstable}} ut ON al.userid = ut.tempid
                 WHERE al.datecreated BETWEEN :startdate AND :enddate
                   AND al.course = :course
              GROUP BY al.datecreated";

        $logs = $DB->get_records_sql($sql, $params);

        $dates = [];
        foreach (array_keys($this->dates) as $key) {
            $dates[$key] = 0;
        }

        foreach ($logs as $log) {
            if (!isset($this->dates[$log->datecreated])) {
                continue;
            }
            $dates[$log->datecreated] = $log->timespent;
            $this->dates[$log->datecreated] += $log->timespent;
        }

        // If insight variable is true then only calculate insight.
        if ($insight) {
            $this->calculate_date_insight(
                $courseid,
                $userstable,
                $dates,
                $oldstartdate,
                $oldenddate
            );
        }

        utility::drop_temp_table($userstable);
        // Set respose in cache.
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

        $cachekey = $this->generate_cache_key(
            'studentengagement',
            'timespentoncourse-' . implode('-', [$timeperiod, $cohort, $course, $group, $userid])
        );

        if (!$response = $this->sessioncache->get($cachekey)) {
            if ($course !== 0) { // Course is selected in dropdown.
                $this->generate_labels($timeperiod);
            } else {
                if (!has_capability('moodle/site:accessallgroups', context_system::instance())) {
                    $this->precalculated = false;
                }
                $userscourses = $this->get_courses_of_user($this->get_current_user());
                unset($userscourses[SITEID]);

                if ($userid != 0) {
                    $enrolledcourses = enrol_get_all_users_courses($userid);
                    $userscourses = array_intersect_key($userscourses, $enrolledcourses);
                }
                $this->generate_courses_labels($timeperiod, $userscourses);
            }
            $params = [
                'startdate' => floor($this->startdate / 86400),
                'enddate' => floor($this->enddate / 86400)
            ];

            list($oldstartdate, $oldenddate) = $this->get_old_date_range(
                $timeperiod,
                $this->startdate,
                $this->enddate
            );

            if ($course !== 0) { // Course is selected in dropdown.
                $this->get_date_data($params, $cohort, $course, $group, $userid, $insight, $oldstartdate, $oldenddate);
                $response = [
                    'timespent' => array_values($this->dates),
                    'labels' => array_values($this->labels),
                    'dates' => array_keys($this->dates)
                ];
                if ($insight) {
                    $response['insight'] = $this->calculate_insight_difference(
                        [
                            'insight' => [
                                'title' => 'averagetimespent',
                                'value' => $this->averagetimespent
                            ],
                            'details' => [
                                'data' => [[
                                    'title' => 'totaltimespent',
                                    'value' => $this->totaltimespent
                                ]]
                            ]
                        ],
                        $this->averagetimespent,
                        $this->oldaveragetimespent,
                        2
                    );
                }
            } else {
                $this->totaltimespent = 0;
                $this->oldatimespent = 0;

                $count = 0;
                $courses = $labels = [];
                foreach ($userscourses as $usercourse) {
                    $courses[$usercourse->id] = $this->get_course_data(
                        $params,
                        $cohort,
                        $usercourse->id,
                        $group,
                        $userid,
                        $timeperiod,
                        $insight,
                        $oldstartdate,
                        $oldenddate
                    );
                    $labels[$usercourse->id] = format_string($usercourse->fullname, true, ['context' => \context_system::instance()]);
                    $count++;
                }
                $response = [
                    'timespent' => array_values($courses),
                    'labels' => array_values($labels)
                ];
                if ($insight) {
                    $response['insight'] = $this->calculate_insight_difference(
                        [
                            'insight' => [
                                'title' => 'averagetimespent',
                                'value' => floor($this->totaltimespent / $count)
                            ],
                            'details' => [
                                'data' => [[
                                    'title' => 'totaltimespent',
                                    'value' => $this->totaltimespent
                                ]]
                            ]
                        ],
                        floor($this->totaltimespent / $count),
                        floor($this->oldatimespent / $count),
                        2
                    );
                }
            }

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
     * @return array          Array of exportable data
     */
    public function get_exportable_data_block($filter, $filterdata = true) {
        // Filter object.
        $filter = json_decode($filter);

        if ($filterdata == false) {
            $filter->cohort = 0;
            $filter->course = 0;
            $filter->group = 0;
            $filter->userid = 0;
            $filter->timeperiod = 'last7days';
        }

        // Do not calculate insight cause it is not printed in image.
        $filter->insight = false;

        // Fetching graph record.
        return $this->get_data($filter);
    }
}
