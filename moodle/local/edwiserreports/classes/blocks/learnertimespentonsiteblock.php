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

/**
 * Class Visits on site. To get the data related to Visits on site.
 */
class learnertimespentonsiteblock extends block_base {

    /**
     * Preapre layout for Visits on site
     * @return object Layout object
     */
    public function get_layout() {
        global $CFG;

        // Layout related data.
        $this->layout->id = 'learnertimespentonsiteblock';
        $this->layout->name = get_string('learnertimespentonsiteheader', 'local_edwiserreports');
        $this->layout->info = get_string('learnertimespentonsiteblockhelp', 'local_edwiserreports');
        $this->layout->filters = $this->get_filter();
        $this->layout->filter = 'last7days';

        // Check capability of learner.
        $capname = 'report/edwiserreports_learner:view';
        if (has_capability($capname, context_system::instance()) || can_view_block($capname)) {
            $this->layout->morelink = new moodle_url($CFG->wwwroot . "/local/edwiserreports/learnercourseprogress.php");
        }

        // Add block view in layout.
        $this->layout->blockview = $this->render_block('learnertimespentonsiteblock', $this->block);

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
        global $OUTPUT, $USER, $COURSE, $USER, $DB;

        if (is_siteadmin() || has_capability('moodle/site:configview', context_system::instance())) {
            $courses = get_courses();
        } else {
            $courses = enrol_get_users_courses($USER->id);
        }
        unset($courses[$COURSE->id]);

        // Temporary course table.
        $coursetable = utility::create_temp_table('tmp_l_c', array_keys($courses));
        $sql = "SELECT c.id
                  FROM {{$coursetable}} ct
                  JOIN {course} c ON ct.tempid = c.id
                 WHERE c.enablecompletion <> 0";
        $records = $DB->get_records_sql($sql);

        // Droppping course table.
        utility::drop_temp_table($coursetable);
        $filtercourses = [
            0 => [
                'id' => 0,
                'fullname' => get_string('fulllistofcourses')
            ]
        ];

        if (!empty($records)) {
            foreach ($records as $record) {
                $filtercourses[] = [
                    'id' => $record->id,
                    'fullname' => format_string($courses[$record->id]->fullname, true, ['context' => \context_system::instance()])
                ];
            }
        }

        $sql = 'SELECT id, firstname, lastname
                  FROM {user}
                 WHERE confirmed = 1
              ORDER BY firstname asc';
        $recordset = $DB->get_recordset_sql($sql);
        $users = [[
            'id' => 0,
            'name' => get_string('allusers', 'search')
        ]];
        foreach ($recordset as $user) {
            $users[] = [
                'id' => $user->id,
                'name' => $user->firstname . ' ' . $user->lastname
            ];
        }
        return $OUTPUT->render_from_template('local_edwiserreports/blocks/learnertimespentonsiteblockfilters', [
            'courses' => $filtercourses
        ]);
    }

    /**
     * Get user using secret key or global $USER
     *
     * @return int
     */
    private function get_user() {
        global $USER;
        $secret = optional_param('secret', null, PARAM_TEXT);
        if ($secret !== null) {
            $authentication = new \local_edwiserreports\controller\authentication();
            $userid = $authentication->get_user($secret);
        } else {
            $userid = $USER->id;
        }
        return $userid;
    }

    /**
     * Generate labels and dates array for graph
     *
     * @param string $timeperiod Filter time period Last 7 Days/Weekly/Monthly/Yearly or custom dates.
     */
    private function generate_date_labels($timeperiod) {
        $this->dates = [];

        switch ($timeperiod) {
            case 'last7days':
            case 'weekly':
            case 'monthly':
            case 'yearly':
                // Get start and end date.
                list($startdate, $enddate, $this->xlabelcount) = $this->get_date_range($timeperiod);
                break;
            default:
                // Explode dates from custom date filter.
                $dates = explode(" to ", $timeperiod);

                if (count($dates) != 2) {
                    $this->singleday = true;
                    $dates = [$timeperiod, $timeperiod];
                    $enddate = $startdate = strtotime($dates[0] . " 12:00:00");
                    $this->startday = floor($startdate / 86400);
                    $this->endday = floor($enddate / 86400);
                    return;
                } else {
                    $startdate = strtotime($dates[0]."00:00:00");
                    $enddate = strtotime($dates[1]." 24:00:00");
                }
                // If it has correct startdat and end date then count xlabel.
                if (isset($startdate) && isset($enddate)) {
                    $days = round(($enddate - $startdate) / LOCAL_SITEREPORT_ONEDAY);
                    $this->xlabelcount = $days;
                } else {
                    $this->xlabelcount = LOCAL_SITEREPORT_WEEKLY_DAYS; // Default one week.
                }
                break;
        }
        $this->startday = floor($startdate / 86400);
        $this->endday = floor($enddate / 86400);

        // Get all lables.
        for ($i = $this->xlabelcount; $i >= 0; $i--) {
            $time = $enddate - $i * LOCAL_SITEREPORT_ONEDAY;
            $this->dates[floor($time / LOCAL_SITEREPORT_ONEDAY)] = 0;
        }
    }

    /**
     * Use this method to return data for block.
     * Get Data for block
     * @param  object $filter Filter object
     * @return object         Response
     */
    public function get_data($filter = false) {
        global $DB;
        $date = $filter->date;
        $userid = $this->get_user();
        $this->generate_date_labels($date);
        $params = [
            'startday' => $this->startday,
            'endday' => $this->endday,
            'userid' => $userid
        ];
        $sql = "";
        if (isset($this->singleday)) {
            $sql = "SELECT al.course, c.fullname, sum(" . $DB->sql_cast_char2int("al.timespent") . ") timespent
                      FROM {edwreports_activity_log} al
                      LEFT JOIN {course} c ON al.course = c.id
                     WHERE al.datecreated = :startday
                       AND al.userid = :userid
                       AND al.timespent > 0
                       GROUP BY al.course, c.fullname";
            $logs = $DB->get_records_sql($sql, $params);
            $this->timespent = [];
            $this->labels = [];
            foreach ($logs as $log) {
                if ($log->course == 0 || $log->course == 1) {
                    $label = get_string('site', 'local_edwiserreports');
                } else {
                    $label = get_string('course', 'local_edwiserreports') . ' - ' . format_string($log->fullname, true, ['context' => \context_system::instance()]);
                }
                $this->labels[] = $label;
                $this->timespent[] = (int)$log->timespent;
            }

            $response = [
                'labels' => $this->labels,
                'timespent' => $this->timespent
            ];
        } else {
            $sql = "SELECT datecreated, sum(" . $DB->sql_cast_char2int("timespent") . ") timespent
                      FROM {edwreports_activity_log}
                     WHERE datecreated >= :startday
                       AND datecreated <= :endday
                       AND userid = :userid
                     GROUP BY datecreated";
            $logs = $DB->get_records_sql($sql, $params);

            foreach ($logs as $log) {
                if (!isset($this->dates[$log->datecreated])) {
                    continue;
                }
                $this->dates[$log->datecreated] = (int)$log->timespent;
            }

            $response = [
                'timespent' => array_values($this->dates),
                'dates' => array_keys($this->dates)
            ];
        }
        return $response;
    }
}
