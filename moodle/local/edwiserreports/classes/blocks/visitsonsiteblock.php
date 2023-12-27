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
use stdClass;
use cache;
use context_system;

/**
 * Class Visits on site. To get the data related to Visits on site.
 */
class visitsonsiteblock extends block_base {

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
        // Set cache for student engagement block.
        $this->sessioncache = cache::make('local_edwiserreports', 'visitsonsite');
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
        $this->layout->id = 'visitsonsiteblock';
        $this->layout->name = get_string('visitsonsiteheader', 'local_edwiserreports');
        $this->layout->info = get_string('visitsonsiteblockhelp', 'local_edwiserreports');
        $this->layout->filters = $this->get_filter();
        $this->layout->filter = 'last7days-0';
        $this->layout->morelink = new moodle_url($CFG->wwwroot . "/local/edwiserreports/studentengagement.php");

        // To add export links.
        $this->layout->downloadlinks = $this->get_block_download_options(true);

        // Add block view in layout.
        $this->layout->blockview = $this->render_block('visitsonsiteblock', $this->block);

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
        global $OUTPUT, $USER, $COURSE, $USER;

        $courses = $this->get_courses_of_user($USER->id);

        unset($courses[$COURSE->id]);

        $users = $this->get_users_of_courses($USER->id, $courses);

        array_unshift($users, (object)[
            'id' => 0,
            'fullname' => get_string('allusers', 'search')
        ]);
        return $OUTPUT->render_from_template('local_edwiserreports/blocks/visitsonsiteblockfilters', [
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

        // Get start and end date.
        list($this->startdate, $this->enddate, $this->xlabelcount) = $this->get_date_range($timeperiod);

        // Get all lables.
        for ($i = $this->xlabelcount; $i >= 0; $i--) {
            $time = $this->enddate - $i * LOCAL_SITEREPORT_ONEDAY;
            $this->dates[floor($time / LOCAL_SITEREPORT_ONEDAY)] = 0;
        }
    }

    /**
     * Calculate course insight data for visits on site block.
     *
     * @param int    $courseid    Course id
     * @param string $userstable  Temporary User table name
     * @param object $data        Response data
     * @param int    $startdate   Old start date(Previous period)
     * @param int    $enddate     Old end date(Previous period)
     *
     * @return object
     */
    public function calculate_course_insight($courseid, $userstable, $data, $startdate, $enddate) {
        global $DB;
        $totalvisits = 0;
        $count = 0;
        foreach ($data as $visits) {
            $totalvisits += $visits;
            $count ++;
        }

        $this->averagevisits = $totalvisits == 0 ? 0 : round($totalvisits / $count);
        $this->totalvisits += $totalvisits;

        $params = [
            'startdate' => floor($startdate / 86400),
            'enddate' => floor($enddate / 86400),
            'action' => 'viewed',
            'course' => $courseid
        ];

        $sql = "SELECT count(l.id) as visits
                  FROM {logstore_standard_log} l
                  JOIN {{$userstable}} ut ON ut.tempid = l.userid
                  JOIN {user} u ON u.id = l.userid
                 WHERE l.action = :action
                   AND u.deleted = 0
                   AND u.id > 2
                   AND l.courseid = :course
                   AND FLOOR(l.timecreated / 86400) BETWEEN :startdate AND :enddate";

        $count = $params['enddate'] - $params['startdate'] + 1;

        $oldvisits = $DB->get_field_sql($sql, $params);
        $this->oldaveragevisits = $oldvisits == 0 ? 0 : round($oldvisits / $count);
    }

    /**
     * Calculate insight data for visits on site block.
     *
     * @param object $filter        Filter
     * @param string $coursetable   Temporary Course table name
     * @param object $data          Response data
     * @param int    $startdate     Old start date(Previous period)
     * @param int    $enddate       Old end date(Previous period)
     *
     * @return object
     */
    public function calculate_insight($filter, $coursetable, $data, $startdate, $enddate) {
        global $DB;
        $totalvisits = 0;
        $count = 0;
        foreach ($data['visits'] as $visits) {
            $totalvisits += $visits;
            $count ++;
        }

        $averagevisits = $totalvisits == 0 ? 0 : round($totalvisits / $count);

        $insight = [
            'insight' => [
                'title' => 'averagesitevisits',
                'value' => $averagevisits
            ],
            'details' => [
                'data' => [[
                    'title' => 'totalsitevisits',
                    'value' => $totalvisits
                ]]
            ]
        ];

        $userid = $filter->student;

        $params = [
            'startdate' => floor($startdate / 86400),
            'enddate' => floor($enddate / 86400),
            'action' => 'viewed'
        ];

        $target = $DB->sql_compare_text('l.target');
        $sql = "SELECT count(l.id) as visits
                  FROM {logstore_standard_log} l
                  JOIN {{$coursetable}} ct ON ct.tempid = l.courseid
                  JOIN {user} u ON u.id = l.userid
                 WHERE l.action = :action
                   AND u.deleted = 0
                   AND u.id > 2
                   AND (($target = :coursetarget) OR ($target = :coursemodule AND l.objecttable IS NOT NULL))
                   AND FLOOR(l.timecreated / 86400) BETWEEN :startdate AND :enddate";
        if ($userid !== 0) { // User is selected in dropdown.
            $params['userid'] = $userid;
            $sql .= ' AND l.userid = :userid';
        } else {
            $sql .= ' AND l.userid <> 0';
        }

        $params['coursetarget'] = 'course';
        $params['coursemodule'] = 'course_module';
        $count = $params['enddate'] - $params['startdate'] + 1;

        $oldvisits = $DB->get_field_sql($sql, $params);
        $oldaveragevisits = $oldvisits == 0 ? 0 : round($oldvisits / $count);
        $insight = $this->calculate_insight_difference($insight, $averagevisits, $oldaveragevisits);
        return $insight;
    }

    /**
     * Get courses data based on courses list.
     *
     * @param array     $params         Parameters
     * @param array     $courses        Courses list
     * @param string    $timeperiod     Selected time period
     * @param int       $userid         User id
     * @param bool      $insight        True if insights need to be calculated
     * @param object    $filter         Filter object
     * @param int       $oldstartdate   Old start date(Previous period)
     * @param int       $oldenddate     Old end date(Previous period)
     *
     * @return array                Response array
     */
    public function get_courses_data($params, $courses, $timeperiod, $userid, $insight, $filter, $oldstartdate, $oldenddate) {
        global $DB;

        if (is_siteadmin($userid) || has_capability(
            'moodle/site:configview',
            context_system::instance(),
            $this->get_current_user()
        )) {
            $courses[0] = $courses[1] = 'Dummy';
        }

        // Temporary course table.
        $coursetable = utility::create_temp_table('tmp_vos_c', array_keys($courses));
        switch ($timeperiod . '-' . $userid . '-' . $this->precalculated) {
            case 'last7days-0-1':
            case 'weekly-0-1':
            case 'monthly-0-1':
            case 'yearly-0-1':
                $sql = "SELECT sd.datecreated, sum(" . $DB->sql_cast_char2int("sd.datavalue", true) . ") visits
                          FROM {edwreports_summary_detailed} sd
                          JOIN {{$coursetable}} ct ON sd.course = ct.tempid
                         WHERE " . $DB->sql_compare_text('sd.datakey', 255) . " = " . $DB->sql_compare_text(':datakey', 255) . "
                           AND sd.datecreated BETWEEN :startdate AND :enddate
                         GROUP BY sd.datecreated";
                $params['datakey'] = 'studentengagement-visits';
                break;
            default:

                $params['action'] = 'viewed';

                if ($userid !== 0) { // User is selected in dropdown.
                    $params['userid'] = $userid;
                    $usersql = ' AND l.userid = :userid ';
                } else {
                    $usersql = " AND l.userid > 2";
                }

                $target = $DB->sql_compare_text('l.target');
                $sql = "SELECT FLOOR(l.timecreated / 86400) as datecreated, count(l.id) as visits
                          FROM {logstore_standard_log} l
                          JOIN {{$coursetable}} ct ON l.courseid = ct.tempid
                          JOIN {user} u ON u.id = l.userid $usersql
                         WHERE l.action = :action
                           AND (($target = :coursetarget) OR ($target = :coursemodule AND l.objecttable IS NOT NULL))
                           AND u.deleted = 0
                           AND FLOOR(l.timecreated / 86400) BETWEEN :startdate AND :enddate
                      GROUP BY FLOOR(l.timecreated / 86400)";
                break;
        }

        $params['coursetarget'] = 'course';
        $params['coursemodule'] = 'course_module';

        $logs = $DB->get_records_sql($sql, $params);
        foreach ($logs as $log) {
            if (!isset($this->dates[$log->datecreated])) {
                continue;
            }
            $this->dates[$log->datecreated] = $log->visits;
        }
        $response = [
            'visits' => array_values($this->dates),
            'dates' => array_keys($this->dates)
        ];

        // If insight variable is true then only calculate insight.
        if ($insight) {
            $response['insight'] = $this->calculate_insight($filter, $coursetable, $response, $oldstartdate, $oldenddate);
        }

        // Drop temporary table.
        utility::drop_temp_table($coursetable);

        return $response;
    }

    /**
     * Get visits data on course.
     *
     * @param array     $params         Parameters
     * @param array     $courseid       Course id
     * @param int       $userid         User id
     * @param bool      $insight        True if insights need to be calculated
     * @param int       $oldstartdate   Old start date(Previous period)
     * @param int       $oldenddate     Old end date(Previous period)
     *
     * @return array                Response array
     */
    public function get_course_data($params, $courseid, $userid, $insight, $oldstartdate, $oldenddate) {
        global $DB;

        if ($userid == 0) {
            $users = utility::get_enrolled_students($courseid);
        } else {
            $users = [$userid => 'Dummy'];
        }
        if (count($users) < 1) {
            return;
        }
        // Temporary course table.
        $userstable = utility::create_temp_table('tmp_tsos_c', array_keys($users));

        $params['course'] = $courseid;
        $params['action'] = 'viewed';

        $target = $DB->sql_compare_text('l.target');
        $sql = "SELECT FLOOR(l.timecreated / 86400) as datecreated, count(l.id) as visits
                  FROM {logstore_standard_log} l
                  JOIN {{$userstable}} ut ON l.userid = ut.tempid
                  JOIN {user} u ON u.id = l.userid
                 WHERE l.action = :action
                   AND u.deleted = 0
                   AND l.courseid = :course
                   AND (($target = :coursetarget) OR ($target = :coursemodule AND l.objecttable IS NOT NULL))
                   AND FLOOR(l.timecreated / 86400) BETWEEN :startdate AND :enddate
              GROUP BY FLOOR(l.timecreated / 86400)";

        $params['coursetarget'] = 'course';
        $params['coursemodule'] = 'course_module';
        $logs = $DB->get_records_sql($sql, $params);

        $dates = [];
        foreach (array_keys($this->dates) as $key) {
            $dates[$key] = 0;
        }

        foreach ($logs as $log) {
            if (!isset($this->dates[$log->datecreated])) {
                continue;
            }
            $dates[$log->datecreated] = $log->visits;
            $this->dates[$log->datecreated] = $log->visits;
        }

        // If insight variable is true then only calculate insight.
        if ($insight) {
            $this->calculate_course_insight(
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
    public function get_data_old($filter = false) {
        global $DB;
        $userid = $filter->student;
        $timeperiod = $filter->date;
        $insight = isset($filter->insight) ? $filter->insight : true;
        $cachekey = $this->generate_cache_key('visitsonsite', $timeperiod . '-' . $userid);

        $this->generate_labels($timeperiod);

        if (!$response = $this->sessioncache->get($cachekey)) {
            $params = [
                'startdate' => floor($this->startdate / 86400),
                'enddate' => floor($this->enddate / 86400)
            ];
            list($oldstartdate, $oldenddate) = $this->get_old_date_range(
                $timeperiod,
                $this->startdate,
                $this->enddate
            );

            $courses = $this->get_courses_of_user($this->get_current_user());

            if (!has_capability('moodle/site:accessallgroups', context_system::instance())) {
                // Get all courses where groupmode is set as 1
                // Then remove those courses from users course array.
                // All restricted courses
                // $allrestrictcourses = $DB->get_records('course', array('groupmode' => 1), '', '*');
                // $nonrestrictedcourses = array_diff_key($courses, $allrestrictcourses);
                // $restrictedcourses = array_diff_key($courses, $nonrestrictedcourses);

                // // Calculating data for non restricted courses.
                // $response = $this->get_courses_data(
                //     $params,
                //     $nonrestrictedcourses,
                //     $timeperiod,
                //     $userid,
                //     $insight,
                //     $filter,
                //     $oldstartdate,
                //     $oldenddate
                // );


                $this->totalvisits = 0;
                $this->averagevisits = 0;
                $this->oldaveragevisits = 0;
                foreach ($courses as $course) {
                    $this->get_course_data(
                        $params,
                        $course->id,
                        $userid,
                        $insight,
                        $oldstartdate,
                        $oldenddate
                    );
                }

                // No Need to merge data with above data as it is already merged.
                $response = [
                    'visits' => array_values($this->dates),
                    'dates' => array_keys($this->dates)
                ];

                if ($insight) {
                    $response['insight'] = $this->calculate_insight_difference(
                        [
                            'insight' => [
                                'title' => 'averagesitevisits',
                                'value' => $this->averagevisits
                            ],
                            'details' => [
                                'data' => [[
                                    'title' => 'totalsitevisits',
                                    'value' => $this->totalvisits
                                ]]
                            ]
                        ],
                        $this->averagevisits,
                        $this->oldaveragevisits,
                        2
                    );
                }
            } else {
                $response = $this->get_courses_data(
                    $params,
                    $courses,
                    $timeperiod,
                    $userid,
                    $insight,
                    $filter,
                    $oldstartdate,
                    $oldenddate
                );
            }

            // Set response in cache.
            $this->sessioncache->set($cachekey, $response);
        }


        return $response;
    }



    /**
     * Use this method to return data for block.
     * Get Data for block
     * @param  object $filter Filter object
     * @return object         Response
     */
    public function get_data($filter = false) {
        global $DB;
        $userid = $filter->student;
        $timeperiod = $filter->date;
        $insight = isset($filter->insight) ? $filter->insight : true;
        $cachekey = $this->generate_cache_key('visitsonsite', $timeperiod . '-' . $userid);

        $this->generate_labels($timeperiod);

        if (!$response = $this->sessioncache->get($cachekey)) {
            $params = [
                'startdate' => floor($this->startdate / 86400),
                'enddate' => floor($this->enddate / 86400)
            ];
            list($oldstartdate, $oldenddate) = $this->get_old_date_range(
                $timeperiod,
                $this->startdate,
                $this->enddate
            );

            $courses = $this->get_courses_of_user($this->get_current_user());

            if (!has_capability('moodle/site:accessallgroups', context_system::instance())) {
                $this->totalvisits = 0;
                $this->averagevisits = 0;
                $this->oldaveragevisits = 0;
                foreach ($courses as $course) {
                    $this->get_course_data(
                        $params,
                        $course->id,
                        $userid,
                        $insight,
                        $oldstartdate,
                        $oldenddate
                    );
                }

                $response = [
                    'visits' => array_values($this->dates),
                    'dates' => array_keys($this->dates)
                ];
                if ($insight) {
                    $response['insight'] = $this->calculate_insight_difference(
                        [
                            'insight' => [
                                'title' => 'averagesitevisits',
                                'value' => $this->averagevisits
                            ],
                            'details' => [
                                'data' => [[
                                    'title' => 'totalsitevisits',
                                    'value' => $this->totalvisits
                                ]]
                            ]
                        ],
                        $this->averagevisits,
                        $this->oldaveragevisits,
                        2
                    );
                }
            } else {
                $response = $this->get_courses_data(
                    $params,
                    $courses,
                    $timeperiod,
                    $userid,
                    $insight,
                    $filter,
                    $oldstartdate,
                    $oldenddate
                );
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
     * @return array              Array of exportable data
     */
    public function get_exportable_data_block($filter, $filterdata = true) {
        // Exploding filter string to get parameters.
        $filter = explode('-', $filter);

        // Filter object for graph methods.
        $filterobject = new stdClass;

        if ($filterdata == true) {
            // Student id.
            $filterobject->student = (int) array_pop($filter);
            // Time period.
            $filterobject->date = implode('-', $filter);
        } else {
            // Student id.
            $filterobject->student = 0;
            // Time period.
            $filterobject->date = 'last7days';
        }

        // Do not calculate insight cause it is not printed in image.
        $filterobject->insight = false;

        // Fetching graph record.
        return $this->get_data($filterobject);
    }
}
