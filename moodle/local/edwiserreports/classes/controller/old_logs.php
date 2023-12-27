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
 * This class has methods for time tracking.
 *
 * @package     local_edwiserreports
 * @category    controller
 * @copyright   2021 wisdmlabs <support@wisdmlabs.com>
 * @author      Yogesh Shirsath
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace local_edwiserreports\controller;

define('LIMIT_NUM', 50000);

use context_course;
use stdClass;

/**
 * This class contains method to transform Moodle logs to Edwiser Reports Logs.
 */
class old_logs {

    /**
     * Highlight current course of which data we are calculating.
     *
     * @param int $id Course id
     */
    public function highlight_current_progress($id, $count, $total) {
        $overallwidth = $count / $total * 100;
        echo "<script>
            if (document.querySelector('[data-course-id]:not(.d-none)') != null) {
                document.querySelector('[data-course-id]:not(.d-none)').classList.add('d-none');
            }
            document.querySelector('[data-course-id=\"" . $id . "\"]').classList.remove('d-none');
            document.getElementById('overall-progress').setAttribute('aria-valuenow', " . $overallwidth . ");
            document.getElementById('overall-progress').style.width = '" . $overallwidth . "%';
            document.getElementById('overall-progress').innerText = '" . $count . '/' . $total . "';
        </script>";
        flush();
    }

    /**
     * Get logs using course, user and mintime.
     *
     * @param int $course       Course id
     * @param int $user         User id
     * @param int $mintime      Minimum time period
     * @param int $limitfrom    Starting offset of records
     *
     * @return object Logs
     */
    private function get_logs($course, $user, $mintime, $limitfrom) {
        global $DB;
        $limitnum = LIMIT_NUM;
        $sql = "SELECT id,
                       FLOOR(timecreated / 86400) as datecreated,
                       CASE contextlevel
                            WHEN " . $DB->sql_cast_char2int(':context_module') ." THEN contextinstanceid
                            ELSE 0
                       END as activity,
                       timecreated as timestart,
                       LEAD(timecreated, 1) over (order by timecreated)  - timecreated as timespent
                  FROM {logstore_standard_log}
                 WHERE courseid = :courseid
                   AND userid = :userid
                   AND timecreated >= :mintime
                 ORDER BY timecreated ASC";
        $params = array(
            'courseid' => (int)$course,
            'userid' => (int)$user,
            'mintime' => (int)$mintime,
            'context_module' => (int)CONTEXT_MODULE
        );
        return $DB->get_recordset_sql($sql, $params, $limitfrom, $limitnum);
    }

    /**
     * Get logs count using course, user and mintime.
     *
     * @param int $course       Course id
     * @param int $user         User id
     * @param int $mintime      Minimum time period
     *
     * @return int Logs count
     */
    private function get_logs_count($course, $user, $mintime, $timeslot) {
        global $DB;

        $count = 0;
        $sql = "SELECT id, LEAD(timecreated, 1) over (order by timecreated)  - timecreated as timespent
                  FROM {logstore_standard_log}
                 WHERE courseid = :courseid
                   AND userid = :userid
                   AND timecreated >= :mintime
                 ORDER BY timecreated ASC";
        $params = array(
            'courseid' => (int)$course,
            'userid' => (int)$user,
            'mintime' => (int)$mintime
        );
        $records = $DB->get_recordset_sql($sql, $params);

        if ($records->valid()) {
            foreach ($records as $record) {
                if ($record->timespent < $timeslot && $record->timespent > 0) {
                    $count++;
                }
            }
        }

        return $count;
    }

    /**
     * Process users old logs and transform to Edwiser Reports Logs.
     *
     * @param bool  $run      If true then old data will be process.
     * @param array $courses  Courses list to process data.
     * @param int   $mintime  Starting period of log time.
     * @param int   $timeslot Time slot between clicks.
     *
     * @return void
     */
    private function process_users_old_logs($courseid, $userid, $mintime, $timeslot, $percent, $increment, $progress) {
        global $DB;
        $count = $this->get_logs_count($courseid, $userid, $mintime, $timeslot);
        if ($count == 0) {
            return;
        }
        $offset = 0;
        $logs = $this->get_logs($courseid, $userid, $mintime, $offset, $timeslot);
        $tracks = [];
        $innerpercent = $percent;
        $innerincrement = $increment / ($count / LIMIT_NUM);
        while (true) {
            if (!$logs->valid()) {
                return;
            }
            $offset += LIMIT_NUM;
            foreach ($logs as $log) {
                if ($log->timespent == null ||
                    $log->timespent < 1 ||
                    $log->timespent > $timeslot
                ) {
                    continue;
                }

                $tracks[] = [
                    'datecreated' => $log->datecreated,
                    'userid' => $userid,
                    'course' => $courseid,
                    'activity' => $log->activity,
                    'timestart' => $log->timestart,
                    'timespent' => $log->timespent,
                    'timetocomplete' => 0
                ];
            }
            if (!empty($tracks)) {
                $DB->insert_records('edwreports_activity_log', $tracks);
                $tracks = [];
            }
            $logs = $this->get_logs($courseid, $userid, $mintime, $offset, $timeslot);
            $innerpercent += $innerincrement;
            if ($innerpercent > $percent + $increment) {
                $innerpercent = $percent + $increment;
            }
            $progress->update_progress($innerpercent, 3);
        }
    }

    /**
     * Process activity completion of users
     *
     * @param int $courseid Course id
     * @param int $userid   User id
     * @param int $mintime  Starting period of completion
     *
     */
    private function process_users_completions($courseid, $userid, $mintime) {
        global $DB;
        $sql = "SELECT cmc.id id,
                       cmc.userid userid,
                       cm.course course,
                       cmc.coursemoduleid activity,
                       cmc.timemodified timemodified
                  FROM {course_modules_completion} cmc
                  JOIN {course_modules} cm ON cmc.coursemoduleid = cm.id
                 WHERE cm.course = :course
                   AND cmc.userid = :user
                   AND cmc.timemodified > :mintime
                   AND cmc.completionstate <> 0";
        $params = [
            'course' => (int)$courseid,
            'user' => (int)$userid,
            'mintime' => (int)$mintime
        ];
        $completions = $DB->get_recordset_sql($sql, $params);

        if (!$completions->valid()) {
            return;
        }

        $sum = "SUM(" . $DB->sql_cast_char2int("eal.timespent") . ")";

        $params = [
            'course' => (int)$courseid,
            'userid' => (int)$userid
        ];
        foreach ($completions as $completion) {
            $sql = "SELECT MAX(eal.id) as id, $sum as timetocomplete
                      FROM {edwreports_activity_log} eal
                     WHERE eal.course = :course
                       AND eal.userid = :userid
                       AND eal.activity = :activity
                     GROUP BY eal.course, eal.userid, eal.activity";
            $params['activity'] = $completion->activity;
            $logs = $DB->get_recordset_sql($sql, $params);

            if (!$logs->valid()) {
                continue;
            }
            foreach ($logs as $log) {
                $DB->update_record('edwreports_activity_log', $log);
            }
        }
    }

    /**
     * Check if mysql version is supported
     *
     * @return int
     */
    private function support_mysql_version() {
        global $DB;
        $output = $DB->get_server_info()['version'];
        preg_match('@[0-9]+\.[0-9]+\.[0-9]+@', $output, $version);
        return version_compare($version[0], '8.0.0') >= 0;
    }

    /**
     * Process old logs from logstore_stadard_log table.
     *
     * @param bool  $run      If true then old data will be process.
     * @param array $courses  Courses list to process data.
     * @param int   $mintime  Starting period of log time.
     * @param int   $timeslot Time slot between clicks.
     */
    public function process_old_logs($run, $courses, $mintime, $timeslot) {
        global $DB;
        if ($run === false) {
            return;
        }
        if ($DB->get_dbfamily() == 'mysql' && !$this->support_mysql_version()) {
            $mysqloldlogs = new mysql_old_logs();
            $mysqloldlogs->process_old_logs($courses, $mintime, $timeslot);
            return;
        }
        $DB->execute('TRUNCATE TABLE {edwreports_activity_log}');
        $total = count($courses);
        $count = 0;
        foreach ($courses as $course) {
            $context = context_course::instance($course->id);
            $progress = new progress('course-' . $course->id);
            $this->highlight_current_progress($course->id, ++$count, $total);
            if ($course->id == 1) {
                $users = $DB->get_records('user');
            } else {
                $users = get_enrolled_users($context);
            }
            if (empty($users)) {
                $progress->end_progress(100);
                unset($progress);
                continue;
            }
            $percent = 0;
            $increment = 100 / count($users);
            foreach ($users as $user) {
                $this->process_users_old_logs(
                    $course->id,
                    $user->id,
                    $mintime,
                    $timeslot,
                    $percent,
                    $increment,
                    $progress
                );
                $this->process_users_completions(
                    $course->id,
                    $user->id,
                    $mintime
                );
                $percent += $increment;
                $progress->update_progress($percent);
            }
            $progress->end_progress(100);
        }
        echo "<script>
            document.querySelector('#continue').parentElement.classList.remove('d-none');
            if (document.querySelector('[data-course-id]:not(.d-none)') != null) {
                document.querySelector('[data-course-id]:not(.d-none)').classList.add('d-none');
            }
        </script>";
    }
}
