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
use context_system;
use html_writer;
use moodle_url;
use core_user;
use stdClass;
use cache;

/**
 * Active users block.
 */
class activeusersblock extends block_base {
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
    public $timenow;

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
        // Set cache for active users block.
        $this->cache = cache::make('local_edwiserreports', 'activeusers');
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
     * Preapre layout for each block
     * @return object Layout
     */
    public function get_layout() {
        global $CFG;

        // Layout related data.
        $this->layout->id = 'activeusersblock';
        $this->layout->name = get_string('activeusersheader', 'local_edwiserreports');
        $this->layout->info = get_string('activeusersblocktitlehelp', 'local_edwiserreports');
        $this->layout->morelink = new moodle_url($CFG->wwwroot . "/local/edwiserreports/activeusers.php");

        // To add export links.
        $this->layout->downloadlinks = $this->get_block_download_options(true);

        $this->layout->filters = $this->get_activeusers_filter();

        // Selected default filters.
        $this->layout->filter = 'last7days';
        $this->layout->cohortid = '0';

        // Block related data.
        $this->block->displaytype = 'line-chart';

        // Add block view in layout.
        $this->layout->blockview = $this->render_block('activeusersblock', $this->block);

        // Set block edit capabilities.
        $this->set_block_edit_capabilities($this->layout->id);

        // Return blocks layout.
        return $this->layout;
    }

    /**
     * Prepare active users block filters
     */
    public function get_activeusers_filter() {
        // Add last updated text in header.
        $lastupdatetext = html_writer::start_tag('small', array(
            'id' => 'updated-time',
            'class' => 'font-size-12'
        ));
        $lastupdatetext .= get_string('lastupdate', 'local_edwiserreports');
        $lastupdatetext .= html_writer::tag('label', $this->image_icon('refresh'), array(
            'class' => 'refresh',
            'data-toggle' => 'tooltip',
            'title' => get_string('refresh', 'local_edwiserreports'),
        ));
        $lastupdatetext .= html_writer::end_tag('small');

        // Create filter for active users block.
        $filters = html_writer::start_tag('div');
        $filters .= html_writer::tag('div', $lastupdatetext);
        $filters .= html_writer::end_tag('div');

        return $filters;
    }

    /**
     * Get the first log from the log table
     * @return stdClass | bool firstlog
     */
    public function get_first_log() {
        global $DB;
        $cachekey = "activeusers-first-log";

        // Get logs from cache.
        if (!$firstlogs = $this->cache->get($cachekey)) {
            $fields = 'id, userid, timecreated';
            $firstlogs = $DB->get_record('logstore_standard_log', array(), $fields, IGNORE_MULTIPLE);

            // Set cache if log is not available.
            $this->cache->set($cachekey, $firstlogs);
        }

        return $firstlogs;
    }

    /**
     * Generate labels for active users block.
     */
    public function generate_labels($timeperiod) {
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
     * Generate cache key for blocks
     * @param  string $blockname Block name
     * @param  string    $filter    Filter
     * @param  int    $cohortid  Cohort id
     * @return string            Cache key
     */
    public function generate_cache_key($blockname, $filter, $cohortid = 0) {
        $cachekey = $blockname . "-" . $this->filter . "-";

        if ($cohortid) {
            $cachekey .= $cohortid;
        } else {
            $cachekey .= "all";
        }

        return $cachekey;
    }

    /**
     * Calculate insight data for active users block.
     *
     * @param object $data   Response data
     *
     * @return object
     */
    public function calculate_insight($timeperiod, $data) {
        $totalactiveusers = 0;
        $count = count($this->dates);
        foreach ($data->data->activeUsers as $active) {
            $totalactiveusers += $active;
        }

        $averageactiveusers = $totalactiveusers == 0 ? 0 : round($totalactiveusers / $count);

        $insight = [
            'insight' => [
                'title' => 'averageactiveusers',
                'value' => $averageactiveusers
            ],
            'details' => [
                'data' => [[
                    'title' => 'totalactiveusers',
                    'value' => array_sum($this->get_active_users(true))
                ], [
                    'title' => 'totalcourseenrolments',
                    'value' => array_sum($data->data->enrolments)
                ], [
                    'title' => 'totalcoursecompletions',
                    'value' => array_sum($data->data->completionRate)
                ]]
            ]
        ];

        list($this->startdate, $this->enddate, $this->xlabelcount) = $this->get_old_date_range(
            $timeperiod,
            $this->startdate,
            $this->enddate
        );

        $this->dates = [];

        // Get all lables.
        for ($i = $this->xlabelcount; $i >= 0; $i--) {
            $time = $this->enddate - $i * LOCAL_SITEREPORT_ONEDAY;
            $this->dates[floor($time / LOCAL_SITEREPORT_ONEDAY)] = 0;
        }

        $count = count($this->dates);

        $oldactiveusers = array_sum($this->get_active_users());
        $oldaverageactiveusers = $oldactiveusers == 0 ? 0 : round($oldactiveusers / $count);
        $insight = $this->calculate_insight_difference($insight, $averageactiveusers, $oldaverageactiveusers);
        return $insight;
    }

    /**
     * Get active user, enrolment, completion
     * @param  object $params date filter to get data
     * @return object         Active users graph data
     */
    public function get_data($params = false) {
        ob_start();

        // Get data from params.
        $this->filter = isset($params->filter) ? $params->filter : false;
        $this->cohortid = isset($params->cohortid) ? $params->cohortid : 0;
        $this->graphajax = isset($params->graphajax) && $params->graphajax == true ? 'graph' : 'table';
        $insight = isset($params->insight) ? $params->insight : true;

        // Generate active users data label.
        $this->generate_labels($this->filter);

        // Check pre calculated data.
        if ($this->precalculated && $this->cohortid == 0 &&
        (is_siteadmin() || has_capability('moodle/site:configview', context_system::instance()))) {
            $data = get_config('local_edwiserreports', 'activeusersdata');
            $data = json_decode($data, true);
            if ($data !== null && isset($data[$this->filter])) {
                $response = new stdClass();
                $response->data = new stdClass();

                $response->data->activeUsers = $data[$this->filter]['activeusers'];
                $response->data->enrolments = $data[$this->filter]['enrolments'];
                $response->data->completionRate = $data[$this->filter]['completionrate'];
                if (isset($data[$this->filter]['insight']) && $insight) {
                    $response->insight = $data[$this->filter]['insight'];
                }
                $response->dates = array_keys($this->dates);
                return $response;
            }
        }

        // Get cache key.
        $cachekey = $this->generate_cache_key("activeusers-response", $this->filter . '-' . $this->graphajax, $this->cohortid);
        // If response is in cache then return from cache.
        if (!$response = $this->cache->get($cachekey)) {
            $response = new stdClass();
            $response->data = new stdClass();

            $response->data->activeUsers = $this->get_active_users();

            $courses = $this->get_courses_of_user();
            // Temporary course table.
            $coursetable = utility::create_temp_table('tmp_au_c', array_keys($courses));

            $response->data->enrolments = $this->get_enrolments($coursetable);
            $response->data->completionRate = $this->get_course_completionrate($coursetable);

            // Drop temporary table.
            utility::drop_temp_table($coursetable);

            // Preserving dates.
            $dates = $this->dates;

            // If insight variable is true then only calculate insight.
            if ($insight) {
                $response->insight = $this->calculate_insight($this->filter, $response);
            }

            // Reassigning dates.
            $this->dates = $dates;

            // Set response in cache.
            $this->cache->set($cachekey, $response);
        }

        $response->dates = array_keys($this->dates);

        ob_clean();
        return $response;
    }

    /**
     * Get users list data for active users block
     * Columns are (Full Name, Email)
     * @param  string $filter   Time filter to get users for this day
     * @param  string $action   Get users list for this action
     * @param  int    $cohortid Cohort Id
     * @return array            array of users list
     */
    public static function get_userslist($filter, $action, $cohortid = false) {
        global $DB;
        $blockobj = new self();

        // Filtering users.
        $users = $blockobj->get_user_from_cohort_course_group($cohortid, 0, 0, $blockobj->get_current_user());

        // Temporary filtering table.
        $userstable = utility::create_temp_table('tmp_au_f', array_keys($users));

        // Based on action prepare query.
        switch($action) {
            case "activeusers":
                $sql = "SELECT DISTINCT l.userid as userid
                   FROM {logstore_standard_log} l
                   JOIN {{$userstable}} ft ON l.userid = ft.tempid
                   WHERE FLOOR(l.timecreated/86400) = :datefilter
                   AND l.action = :action";
                $params["action"] = 'viewed';
                break;
            case "enrolments":
                $sql = "SELECT DISTINCT(CONCAT(CONCAT(l.courseid, '-'), l.relateduserid )) as id,
                                l.relateduserid as userid,
                                l.courseid
                        FROM {logstore_standard_log} l
                        JOIN {{$userstable}} ft ON l.relateduserid = ft.tempid
                        WHERE FLOOR(l.timecreated/86400) = :datefilter
                        AND l.eventname = :eventname
                        GROUP BY l.relateduserid, l.courseid";
                $params["eventname"] = '\core\event\user_enrolment_created';
                break;
            case "completions":
                $sql = "SELECT CONCAT(CONCAT(ecp.userid, '-'), ecp.courseid) as id,
                             ecp.userid as userid,
                             ecp.courseid as courseid
                        FROM {edwreports_course_progress} ecp
                        JOIN {{$userstable}} ft ON ecp.userid = ft.tempid
                        WHERE FLOOR(ecp.completiontime/86400) = :datefilter";
        }

        $params["datefilter"] = $filter;
        $data = array();
        $records = $DB->get_records_sql($sql, $params);

        if (!empty($records)) {
            foreach ($records as $record) {
                $user = core_user::get_user($record->userid);
                $userdata = new stdClass();
                $userdata->username = fullname($user);
                $userdata->useremail = $user->email;
                if ($action == "completions" || $action == "enrolments") {
                    if ($DB->record_exists('course', array('id' => $record->courseid))) {
                        $course = get_course($record->courseid);
                        $userdata->coursename = format_string($course->fullname, true, ['context' => \context_system::instance()]);

                    } else {
                        $userdata->coursename = get_string('eventcoursedeleted');
                    }
                }
                $data[] = array_values((array)$userdata);
            }
        }

        // Drop temporary table.
        utility::drop_temp_table($userstable);
        return $data;
    }

    /**
     * Get all active users
     * @param  bool  $insight If true then calculate data for insight
     * @return array           Array of all active users based
     */
    public function get_active_users($insight = false) {
        global $DB;

        $users = $this->get_user_from_cohort_course_group($this->cohortid, 0, 0, $this->get_current_user());

        // Temporary users table.
        $userstable = utility::create_temp_table('tmp_au_u', array_keys($users));

        if ($insight == true) {
            $params = array(
                "starttime" => floor($this->startdate / 86400),
                "endtime" => floor($this->enddate / 86400),
                "action" => "viewed"
            );
            // Query to get activeusers from logs.
            $sql = "SELECT DISTINCT l.userid
                    FROM {logstore_standard_log} l
                    JOIN {{$userstable}} ut ON l.userid = ut.tempid
                    WHERE l.action = :action
                    AND FLOOR(l.timecreated / 86400) BETWEEN :starttime AND :endtime
                    AND l.userid > 1";

            $logs = $DB->get_records_sql($sql, $params);

            $activeusers = [count($logs)];
        } else {
            $params = array(
                "starttime" => $this->startdate - 86400,
                "endtime" => $this->enddate + 86400,
                "action" => "viewed"
            );
            // Get Logs to generate active users data.
            $activeusers = $this->dates;

            // Query to get activeusers from logs.
            $sql = "SELECT FLOOR(l.timecreated / 86400) as userdate,
                        COUNT( DISTINCT l.userid ) as usercount
                    FROM {logstore_standard_log} l
                    JOIN {{$userstable}} ut ON l.userid = ut.tempid
                    WHERE l.action = :action
                    AND l.timecreated BETWEEN :starttime AND :endtime
                    AND l.userid > 1
                    GROUP BY FLOOR(l.timecreated / 86400)";

            $logs = $DB->get_records_sql($sql, $params);

            // Get active users for every day.
            foreach (array_keys($activeusers) as $key) {
                if (!isset($logs[$key])) {
                    continue;
                }
                $activeusers[$key] = $logs[$key]->usercount;
            }

            $activeusers = array_values($activeusers);
        }

        // Droppping course table.
        utility::drop_temp_table($userstable);

        return $activeusers;
    }

    /**
     * Get all Enrolments
     * @param  string $coursetable Course table.
     * @return array               Array of all active users based
     */
    public function get_enrolments($coursetable) {
        global $DB;

        $params = array(
            "starttime" => $this->startdate - 86400,
            "endtime" => $this->enddate + 86400,
            "eventname" => '\core\event\user_enrolment_created',
            "actionname" => "created",
            "archetype" => "student"
        );

        $cohortjoin = "";
        $cohortcondition = "";
        if ($this->cohortid) {
            $cohortjoin = "JOIN {cohort_members} cm ON l.relateduserid = cm.userid";
            $cohortcondition = "AND cm.cohortid = :cohortid";
            $params["cohortid"] = $this->cohortid;
        }

        $archetype = $DB->sql_compare_text('r.archetype');
        $archevalue = $DB->sql_compare_text(':archetype');

        $sql = "SELECT FLOOR(l.timecreated/86400) as userdate,
                       COUNT(DISTINCT(CONCAT(CONCAT(l.courseid, '-'), l.relateduserid))) as usercount
                  FROM {logstore_standard_log} l
                  JOIN {{$coursetable}} ct ON l.courseid = ct.tempid
                  JOIN {role_assignments} ra ON l.contextid = ra.contextid AND l.relateduserid = ra.userid
                  JOIN {role} r ON ra.roleid = r.id AND {$archetype} = {$archevalue}
                  $cohortjoin
                 WHERE l.eventname = :eventname
                   $cohortcondition
                   AND l.action = :actionname
                   AND l.timecreated >= :starttime
                   AND l.timecreated <= :endtime
                 GROUP BY FLOOR(l.timecreated / 86400)";

        // Get enrolments log.
        $logs = $DB->get_records_sql($sql, $params);
        $enrolments = $this->dates;

        // Get enrolments from every day.
        foreach (array_keys($enrolments) as $key) {
            if (!isset($logs[$key])) {
                continue;
            }
            $enrolments[$key] = $logs[$key]->usercount;
        }

        $enrolments = array_values($enrolments);

        return $enrolments;
    }

    /**
     * Get all Enrolments
     * @param  string $coursetable Course table.
     * @return array               Array of all active users based
     */
    public function get_course_completionrate($coursetable) {
        global $DB;

        $params = array(
            "starttime" => $this->startdate - 86400,
            "endtime" => $this->enddate + 86400,
        );

        $cohortjoin = "";
        $cohortcondition = "";
        if ($this->cohortid) {
            $cohortjoin = "JOIN {cohort_members} cm ON cc.userid = cm.userid";
            $cohortcondition = "AND cm.cohortid = :cohortid";
            $params["cohortid"] = $this->cohortid;
        }

        $sql = "SELECT FLOOR(cc.completiontime/86400) as userdate,
                       COUNT(cc.completiontime) as usercount
                  FROM {edwreports_course_progress} cc
                  JOIN {{$coursetable}} ct ON cc.courseid = ct.tempid
                       $cohortjoin
                 WHERE cc.completiontime IS NOT NULL
                    AND cc.completiontime >= :starttime
                    AND cc.completiontime < :endtime
                       $cohortcondition
                 GROUP BY FLOOR(cc.completiontime/86400)";

        $completionrate = $this->dates;

        $logs = $DB->get_records_sql($sql, $params);
        // Get completion for each day.
        foreach (array_keys($completionrate) as $key) {
            if (!isset($logs[$key])) {
                continue;
            }
            $completionrate[$key] = $logs[$key]->usercount;
        }

        $completionrate = array_values($completionrate);

        return $completionrate;
    }


    /**
     * Get Exportable data for Active Users Block
     * @param  string $filter     Filter to apply on data
     * @param  bool   $filterdata If enabled then filter data
     * @return array              Array of exportable data
     */
    public function get_exportable_data_block($filter, $filterdata = true) {
        $param = (object) [
            'filter' => $filter
        ];

        // Default filter when filterdata is false.
        if ($filterdata == false) {
            $param->filter = 'last7days';
        }

        // Do not calculate insight cause it is not printed in image.
        $param->insight = false;

        return $this->get_data($param);
    }

    /**
     * Get Exportable data for Active Users Page
     * @param  string $filter     Filter to apply on data
     * @param  bool   $filterdata If enabled then filter data
     * @return array              Array of exportable data
     */
    public static function get_exportable_data_report($filter, $filterdata = true) {

        $export = array();

        $blockobj = new self();
        $blockobj->graphajax = false;
        $formfilter = optional_param("filter", 0, PARAM_TEXT);
        // $formfilter = json_decode($formfilter);
        // $rtl = isset($formfilter->dir) && $formfilter->dir == 'rtl' ? 1 : 0;
        $rtl = get_string('thisdirection', 'langconfig') == 'rtl' ? 1 : 0;

        $cohortid = optional_param('cohortid', 0, PARAM_INT);

        if ($filterdata == false) {
            $cohortid = 0;
            $filter = 'last7days';
        }
        // Generate active users data label.
        $blockobj->generate_labels($filter);

        $dates = array_keys($blockobj->dates);

        $export[] = self::get_header_report($rtl);

        foreach ($dates as $key => $date) {
            $label = $rtl ? date("Y F d", $date * 86400) : date("d F Y", $date * 86400);

            $activeusers = $rtl ? array_reverse(self::get_usersdata($label, $date, "activeusers", $cohortid)) : self::get_usersdata($label, $date, "activeusers", $cohortid);
            $enrolments = $rtl ? array_reverse(self::get_usersdata($label, $date, "enrolments", $cohortid)) : self::get_usersdata($label, $date, "enrolments", $cohortid);
            $completions = $rtl ? array_reverse(self::get_usersdata($label, $date, "completions", $cohortid)) : self::get_usersdata($label, $date, "completions", $cohortid);

            if($rtl){
                $tempactiveusers = array();
                $tempenrolments = array();
                $tempcompletions = array();
                foreach ($activeusers as $activeuser) {
                    $tempactiveusers[] = array_reverse($activeuser);
                }
                foreach ($enrolments as $enrolment) {
                    $tempenrolments[] = array_reverse($enrolment);
                }
                foreach ($completions as $completion) {
                    $tempcompletions[] = array_reverse($completion);
                }

                $activeusers = $tempactiveusers;
                $enrolments = $tempenrolments;
                $completions = $tempcompletions;
            }


            $export = array_merge($export,
                $activeusers,
                $enrolments,
                $completions
            );
        }

        

        return (object) [
            'data' => $export,
            'options' => [
                'orientation' => 'l',
            ]
        ];
    }

    /**
     * Get User Data for Active Users Block
     * @param  string $date    Date for lable
     * @param  string $action   Action for getting data
     * @param  string $cohortid Cohortid
     * @return array            User data
     */
    public static function get_usersdata($label, $date, $action, $cohortid) {
        $usersdata = array();
        $users = self::get_userslist($date, $action, $cohortid);

        foreach ($users as $user) {
            $user = array_merge(
               [$label],
               $user
            );

            // If course is not set then skip one block for course
            // Add empty value in course header.
            if (!isset($user[3])) {
                $user = array_merge($user, array(''));
            }

            $user = array_merge($user, array(get_string($action . "_status", "local_edwiserreports")));
            $usersdata[] = $user;
        }

        return $usersdata;
    }

    /**
     * Get header for export data actvive users
     * @return array Array of headers of exportable data
     */
    public static function get_header() {
        $header = array(
            get_string("date", "local_edwiserreports"),
            get_string("noofactiveusers", "local_edwiserreports"),
            get_string("noofenrolledusers", "local_edwiserreports"),
            get_string("noofcompletedusers", "local_edwiserreports"),
        );

        return $header;
    }

    /**
     * Get header for export data actvive users individual page
     * @return array Array of headers of exportable data
     */
    public static function get_header_report($rtl = 0) {
        $header = array(
            get_string("date", "local_edwiserreports"),
            get_string("fullname", "local_edwiserreports"),
            get_string("email", "local_edwiserreports"),
            get_string("coursename", "local_edwiserreports"),
            get_string("status", "local_edwiserreports"),
        );
        $header = $rtl ? array_reverse($header) : $header ;
        return $header;
    }

    /**
     * Get popup modal header by action
     * @param  string $action Action name
     * @return array          Table header
     */
    public static function get_modal_table_header($action) {
        switch($action) {
            case 'completions':
                // Return table header.
                $str = array(
                    get_string("fullname", "local_edwiserreports"),
                    get_string("email", "local_edwiserreports"),
                    get_string("coursename", "local_edwiserreports")
                );
                break;
            case 'enrolments':
                // Return table header.
                $str = array(
                    get_string("fullname", "local_edwiserreports"),
                    get_string("email", "local_edwiserreports"),
                    get_string("coursename", "local_edwiserreports")
                );
                break;
            default:
                // Return table header.
                $str = array(
                    get_string("fullname", "local_edwiserreports"),
                    get_string("email", "local_edwiserreports")
                );
        }

        return $str;
    }

    /**
     * Create users list table for active users block
     * @param  string $filter   Time filter to get users for this day
     * @param  string $action   Get users list for this action
     * @param  int    $cohortid Get users list for this action
     * @return array            Array of users data fields (Full Name, Email)
     */
    public static function get_userslist_table($filter, $action, $cohortid) {
        global $OUTPUT;
        // Make cache.
        $cache = cache::make('local_edwiserreports', 'activeusers');
        // Get values from cache if it is set.
        $cachekey = "userslist-" . $filter . "-" . $action . "-" . "-" . $cohortid;
        if (!$table = $cache->get($cachekey)) {
            $context = new stdClass();
            $context->searchicon = \local_edwiserreports\utility::image_icon('actions/search');
            $context->placeholder = get_string('searchuser', 'local_edwiserreports');
            $context->length = [10, 25, 50, 100];
            $table = $OUTPUT->render_from_template('local_edwiserreports/common-table-search-filter', $context);

            $table .= html_writer::start_tag('table', array(
                "class" => "modal-table table",
                "style" => "min-width: 100%;"
            ));

            $table .= html_writer::start_tag('thead');
            $table .= html_writer::start_tag('tr');
            // Get table header.
            foreach (self::get_modal_table_header($action) as $header) {
                $table .= html_writer::tag('th', $header);
            }
            $table .= html_writer::end_tag('tr');
            $table .= html_writer::end_tag('thead');

            $table .= html_writer::start_tag('tbody');
            // Get Users data.
            $data = self::get_userslist($filter, $action, $cohortid);
            foreach ($data as $user) {
                $table .= html_writer::start_tag('tr');
                foreach ($user as $value) {
                    $table .= html_writer::tag('td', $value);
                }
                $table .= html_writer::end_tag('tr');
            }
            $table .= html_writer::end_tag('tbody');

            $table .= html_writer::end_tag('table');

            // Set cache for users list.
            $cache->set($cachekey, $table);
        }

        return $table;
    }

    /**
     * Get users list data for active users block modal.
     *
     * @param  string $date Date selected to get users for this day
     * @param  string $type Type of list
     * @return array        Array of users list
     */
    public function get_block_modal_table($date, $type) {
        global $DB;

        // Temporary filtering table.
        $temptable = null;

        $content = "";
        $header = [];
        $rows = [];

        $params = [
            "datefilter" => $date
        ];

        // Based on action prepare query.
        $fullname = $DB->sql_fullname("u.firstname", "u.lastname") . " fullname";
        switch($type) {
            case "activeusers":
                // Filtering users.
                $users = $this->get_user_from_cohort_course_group(0, 0, 0, $this->get_current_user());

                // Temporary filtering table.
                $temptable = utility::create_temp_table('tmp_aum_u', array_keys($users));
                $header = array(
                    get_string("fullname", "local_edwiserreports"),
                    get_string('email', 'local_edwiserreports')
                );
                $sql = "SELECT DISTINCT l.userid id, $fullname, u.email
                   FROM {{$temptable}} ut
                   JOIN {logstore_standard_log} l ON ut.tempid = l.userid
                   JOIN {user} u ON l.userid = u.id
                   WHERE FLOOR(l.timecreated/86400) = :datefilter
                   AND l.action = :action";
                $params["action"] = 'viewed';
                $records = $DB->get_recordset_sql($sql, $params);
                if (!$records->valid()) {
                    break;
                }
                foreach ($records as $record) {
                    $rows[] = [$record->fullname, $record->email];
                }
                break;
            case "enrolments":
                $header = array(
                    get_string("fullname", "local_edwiserreports"),
                    get_string('email', 'local_edwiserreports'),
                    get_string("coursename", "local_edwiserreports")
                );

                $courses = $this->get_courses_of_user();
                // Temporary course table.
                $temptable = utility::create_temp_table('tmp_aum_c', array_keys($courses));
                $archetype = $DB->sql_compare_text('r.archetype');
                $archevalue = $DB->sql_compare_text(':archetype');

                $sql = "SELECT DISTINCT(CONCAT(CONCAT(l.courseid, '-'), l.relateduserid)) id,
                               $fullname,
                               u.email,
                               c.fullname coursename
                        FROM {{$temptable}} ct
                        JOIN {logstore_standard_log} l ON ct.tempid = l.courseid
                        JOIN {user} u ON l.relateduserid = u.id
                        JOIN {course} c ON l.courseid = c.id
                        JOIN {role_assignments} ra ON l.contextid = ra.contextid AND l.relateduserid = ra.userid
                        JOIN {role} r ON ra.roleid = r.id AND {$archetype} = {$archevalue}
                        WHERE FLOOR(l.timecreated/86400) = :datefilter
                        AND l.eventname = :eventname";
                $params["eventname"] = '\core\event\user_enrolment_created';
                $params['archetype'] = 'student';
                $records = $DB->get_recordset_sql($sql, $params);
                if (!$records->valid()) {
                    break;
                }
                foreach ($records as $record) {
                    $rows[] = [
                        $record->fullname,
                        $record->email,
                        isset($record->coursename) ? format_string($record->coursename, true, ['context' => \context_system::instance()]) : get_string('eventcoursedeleted')
                    ];
                }
                break;
            case "completions":
                $header = array(
                    get_string("fullname", "local_edwiserreports"),
                    get_string('email', 'local_edwiserreports'),
                    get_string("coursename", "local_edwiserreports")
                );

                $courses = $this->get_courses_of_user();
                // Temporary course table.
                $temptable = utility::create_temp_table('tmp_aum_c', array_keys($courses));
                $archetype = $DB->sql_compare_text('r.archetype');
                $archevalue = $DB->sql_compare_text(':archetype');

                $sql = "SELECT CONCAT(CONCAT(ecp.userid, '-'), ecp.courseid) id, $fullname, u.email, c.fullname coursename
                        FROM {{$temptable}} ct
                        JOIN {edwreports_course_progress} ecp  ON ct.tempid = ecp.courseid
                        JOIN {course} c ON ecp.courseid = c.id
                        JOIN {user} u ON ecp.userid = u.id
                        WHERE FLOOR(ecp.completiontime/86400) = :datefilter";
                $records = $DB->get_recordset_sql($sql, $params);
                if (!$records->valid()) {
                    break;
                }
                foreach ($records as $record) {
                    $rows[] = [
                        $record->fullname,
                        $record->email,
                        isset($record->coursename) ? format_string($record->coursename, true, ['context' => \context_system::instance()]) : get_string('eventcoursedeleted')
                    ];
                }
                break;
        }

        if ($temptable !== null) {
            // Drop temporary table.
            utility::drop_temp_table($temptable);
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
