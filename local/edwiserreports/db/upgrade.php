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
 * Code to be executed after the plugin's database scheme has been installed is defined here.
 *
 * @package     local_edwiserreports
 * @category    upgrade
 * @copyright   2019 wisdmlabs <support@wisdmlabs.com>
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

require_once($CFG->dirroot . '/local/edwiserreports/lib.php');

/**
 * Custom code to be run on upgrading the plugin.
 * @param int $oldversion Plugin's old version
 * @return bool True if upgrade successful
 */
function xmldb_local_edwiserreports_upgrade($oldversion) {
    global $DB, $USER;

    $dbman = $DB->get_manager();

    // Check the old version.
    if (2020030400 >= $oldversion) {
        // Table name to be removed.
        $tablename = 'edwiserReport_completion';

        // Get all tables.
        $tables = $DB->get_tables();

        // If table exist.
        if (isset($tables[$tablename])) {
            $DB->execute('DROP table {' . $tablename . '}');
        }
        upgrade_plugin_savepoint(true, 2020030400, 'local', 'edwiserreports');
    }

    if (2021040900 >= $oldversion) {
        $table = new xmldb_table('edwreports_custom_reports');
        // Change data field type to text.
        $field = new xmldb_field('data', XMLDB_TYPE_TEXT);
        $dbman->change_field_type($table, $field);
        upgrade_plugin_savepoint(true, 2021040900, 'local', 'edwiserreports');
    }

    if (2022112306 >= $oldversion) {
        $table = new xmldb_table('edwreports_course_progress');
        // Change data field type to text.
        $field = new xmldb_field('progress', XMLDB_TYPE_FLOAT, '6,3', null, true, false, 0);
        $dbman->change_field_type($table, $field);
        upgrade_plugin_savepoint(true, 2022112306, 'local', 'edwiserreports');
    }

    // Define table block_remuiblck_tasklist to be created.
    $table = new xmldb_table('edwreports_custom_reports');

    // Conditionally launch create table for block_remuiblck_taskslist.
    if (!$dbman->table_exists($table)) {
        // Adding fields to table block_remuiblck_tasklist.
        $table->add_field('id', XMLDB_TYPE_INTEGER, 10, null, true, true);
        $table->add_field('shortname', XMLDB_TYPE_CHAR, 255, null, true);
        $table->add_field('fullname', XMLDB_TYPE_CHAR, 255, null, true);
        $table->add_field('createdby', XMLDB_TYPE_INTEGER, 10, null, true);
        $table->add_field('data', XMLDB_TYPE_TEXT);
        $table->add_field('enabledesktop', XMLDB_TYPE_INTEGER, 2, null, true);
        $table->add_field('timecreated', XMLDB_TYPE_INTEGER, 10, null, true, false, 0);
        $table->add_field('timemodified', XMLDB_TYPE_INTEGER, 10, null, true);
        // Adding keys to table block_remuiblck_taskslist.
        $table->add_key('primary', XMLDB_KEY_PRIMARY, array('id'));

        // Create the table.
        $dbman->create_table($table);
    }

    // Authentication table.
    $table = new xmldb_table('edwreports_authentication');
    if (!$dbman->table_exists($table)) {
        // Table fields.
        $table->add_field('id', XMLDB_TYPE_INTEGER, 10, null, true, true);
        $table->add_field('userid', XMLDB_TYPE_INTEGER, 10, null, true);
        $table->add_field('secret', XMLDB_TYPE_TEXT, 10, null, true);

        // Table keys.
        $table->add_key('primary', XMLDB_KEY_PRIMARY, array('id'));
        $table->add_key('unique', XMLDB_KEY_UNIQUE, array('userid'));

        // Create the table.
        $dbman->create_table($table);
    }

    // Maintain time logs of activities.
    $table = new xmldb_table('edwreports_activity_log');
    if (!$dbman->table_exists($table)) {
        $table->add_field('id', XMLDB_TYPE_INTEGER, 10, null, true, true);
        $table->add_field('datecreated', XMLDB_TYPE_INTEGER, 10, null, true, false);
        $table->add_field('userid', XMLDB_TYPE_INTEGER, 10, null, true, false);
        $table->add_field('course', XMLDB_TYPE_INTEGER, 10, null, true, false);
        $table->add_field('activity', XMLDB_TYPE_INTEGER, 10, null, true, false, 0);
        $table->add_field('timestart', XMLDB_TYPE_INTEGER, 10, null, true, false);
        $table->add_field('timespent', XMLDB_TYPE_INTEGER, 10, null, true, false);
        $table->add_field('timetocomplete', XMLDB_TYPE_INTEGER, 10, null, true, false);

        // Table keys.
        $table->add_key('primary', XMLDB_KEY_PRIMARY, array('id'));

        // Create the table.
        $dbman->create_table($table);
    }

    // Calculate and store summary from log table.
    $table = new xmldb_table('edwreports_summary');
    if (!$dbman->table_exists($table)) {
        $table->add_field('id', XMLDB_TYPE_INTEGER, 10, null, true, true);
        $table->add_field('course', XMLDB_TYPE_INTEGER, 10, null, true, false);
        $table->add_field('datakey', XMLDB_TYPE_TEXT, 10, null, true, false);
        $table->add_field('datavalue', XMLDB_TYPE_TEXT, 10, null, true, false);

        // Table keys.
        $table->add_key('primary', XMLDB_KEY_PRIMARY, array('id'));

        // Create the table.
        $dbman->create_table($table);
    }

    // Calculate and store details summary.
    $table = new xmldb_table('edwreports_summary_detailed');
    if (!$dbman->table_exists($table)) {
        $table->add_field('id', XMLDB_TYPE_INTEGER, 10, null, true, true);
        $table->add_field('datecreated', XMLDB_TYPE_INTEGER, 10, null, true, false);
        $table->add_field('course', XMLDB_TYPE_INTEGER, 10, null, true, false);
        $table->add_field('datakey', XMLDB_TYPE_TEXT, 10, null, true, false);
        $table->add_field('datavalue', XMLDB_TYPE_TEXT, 10, null, true, false);

        // Table keys.
        $table->add_key('primary', XMLDB_KEY_PRIMARY, array('id'));

        // Create the table.
        $dbman->create_table($table);
    }

    // Adding new column in course progress table for storing completable activities.
    $table = new xmldb_table('edwreports_course_progress');
    if ($dbman->table_exists($table)) {
        $field = new xmldb_field('completablemods', XMLDB_TYPE_INTEGER, 10, null, true, false, 0);
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
            $DB->set_field('edwreports_course_progress', 'pchange', true);
        }

        // Adding courseid index on course progress table.
        $courseindex = new xmldb_index('courseid', XMLDB_INDEX_NOTUNIQUE, ['courseid']);
        if (!$dbman->index_exists($table, $courseindex)) {
            $dbman->add_index($table, $courseindex);
        }

        // Adding userid index on course progress table.
        $courseindex = new xmldb_index('userid', XMLDB_INDEX_NOTUNIQUE, ['userid']);
        if (!$dbman->index_exists($table, $courseindex)) {
            $dbman->add_index($table, $courseindex);
        }
    }

    // Store graph data to be used while downloading graph image.
    $table = new xmldb_table('edwreports_graph_data');
    if (!$dbman->table_exists($table)) {
        // Table fields.
        $table->add_field('id', XMLDB_TYPE_INTEGER, 10, null, true, true);
        $table->add_field('timecreated', XMLDB_TYPE_INTEGER, 10, null, true);
        $table->add_field('download', XMLDB_TYPE_TEXT, 10, null, true);
        $table->add_field('blockname', XMLDB_TYPE_TEXT, 50, null, true);
        $table->add_field('format', XMLDB_TYPE_TEXT, 10, null, true);
        $table->add_field('filename', XMLDB_TYPE_TEXT, 10, null, true);
        $table->add_field('data', XMLDB_TYPE_TEXT, 10, null, true);

        // Table keys.
        $table->add_key('primary', XMLDB_KEY_PRIMARY, array('id'));

        // Create the table.
        $dbman->create_table($table);
    }

    // Getting all studentengagementblock scheduled emails.
    $emails = $DB->get_records_sql(
        "SELECT *
           FROM {edwreports_schedemails}
          WHERE " .
          $DB->sql_compare_text('blockname') . ' = ' . $DB->sql_compare_text(':blockname'),
        array('blockname' => 'studentengagementblock'));

    // Creating empty array to store scheduled emails.
    $newblocks = [
        'visitsonsite' => [],
        'timespentonsite' => [],
        'timespentoncourse' => [],
        'courseactivitystatus' => []
    ];

    // Looping through all scheduled emails.
    // And adding them to new array.
    foreach ($emails as $email) {
        $data = json_decode($email->emaildata);
        foreach ($data as $value) {
            $filter = $value->reportparams->filter;
            $filter = explode('-', $filter);
            $type = array_pop($filter);
            $type = str_replace('lms', 'site', $type);
            $value->reportparams->filter = implode('-', $filter);
            $value->reportparams->blockname = $type . 'block';
            $newblocks[$type][] = $value;
        }
        $DB->delete_records('edwreports_schedemails', ['id' => $email->id]);
    }

    // Insert converted scheduleemails to table.
    foreach ($newblocks as $blocks) {
        if (empty($blocks)) {
            continue;
        }
        $blockname = reset($blocks)->reportparams->blockname;
        if ($existingemail = $DB->get_record_sql(
            // Updating existing scheduled emails.
            "SELECT *
               FROM {edwreports_schedemails}
              WHERE " .
              $DB->sql_compare_text('blockname') . ' = ' . $DB->sql_compare_text(':blockname'),
            array('blockname' => $blockname))) {
            $data = json_decode($existingemail->emaildata);
            foreach ($blocks as $block) {
                $data[] = $block;
            }
            $existingemail->emaildata = json_encode($data);
            $DB->update_record('edwreports_schedemails', $existingemail);
        } else {
            // Inserting new scheduled emails.
            $email = new stdClass();
            $email->blockname = reset($blocks)->reportparams->blockname;
            $email->component = 'block';
            $email->emaildata = json_encode($blocks);
            $DB->insert_record('edwreports_schedemails', $email);
        }
    }

    // Trasnforming the schedule block email filters of following blocks.
    // Grade block, Course progress block, Course activity status block, Time spent on course block.
    $schedules = $DB->get_records_sql(
        "SELECT * FROM {edwreports_schedemails}
        WHERE " . $DB->sql_compare_text('component') . " = 'block'");
    foreach ($schedules as $schedule) {
        $emaildata = json_decode($schedule->emaildata, true);
        $changed = false;
        foreach ($emaildata as $key => $email) {
            if (stripos($email['reportparams']['filter'], 'cohort') !== false) {
                continue;
            }
            $encode = false;
            switch ($email['reportparams']['blockname']) {
                case 'activecoursesblock':
                case 'certificatesblock':
                    $filter = [
                        'cohort' => 0
                    ];
                    $encode = true;
                    break;
                case 'courseprogressblock':
                    $filter = [
                        'cohort' => 0,
                        'course' => $email['reportparams']['filter'],
                        'group' => 0
                    ];
                    $encode = true;
                    break;
                case 'gradeblock':
                    list($course, $student) = explode('-', $email['reportparams']['filter']);
                    $filter = [
                        'cohort' => 0,
                        'course' => $course,
                        'group' => 0,
                        'student' => $student
                    ];
                    $encode = true;
                    break;
                case 'timespentoncourseblock':
                case 'courseactivitystatusblock':
                    // Exploding filter string to get parameters.
                    $filter = explode('-', $filter);

                    // Student id.
                    $student = (int) array_pop($filter);

                    // Get course id for submissions graph.
                    $course = (int) array_pop($filter);

                    // Time period.
                    $date = implode('-', $filter);

                    $filter = [
                        'cohort' => 0,
                        'course' => $course,
                        'group' => 0,
                        'student' => $student,
                        'date' => $date
                    ];
                    $encode = true;
                    break;
            }
            if ($encode) {
                $filter = json_encode($filter);
                $changed = true;
                $email['reportparams']['filter'] = $filter;
                $emaildata[$key] = $email;
            }
        }
        if ($changed == true) {
            $schedule->emaildata = json_encode($emaildata);
            $DB->update_record('edwreports_schedemails', $schedule);
        }
    }

    // Trasnforming the schedule report email filters of following blocks.
    // Grade report, studentengagement report and course progress report.
    $schedules = $DB->get_records_sql(
        "SELECT * FROM {edwreports_schedemails}
        WHERE " . $DB->sql_compare_text('component') . " = 'report'");
    foreach ($schedules as $schedule) {
        $emaildata = json_decode($schedule->emaildata, true);
        $changed = false;
        foreach ($emaildata as $key => $email) {
            $encode = false;
            switch ($email['reportparams']['blockname']) {
                case 'studentengagement':
                    if (stripos($email['reportparams']['filter'], '-') !== false) {
                        $filter = explode('-', $email['reportparams']['filter']);
                        $filter = [
                            'cohort' => array_shift($filter),
                            'course' => array_shift($filter)
                        ];
                        $encode = true;
                    } else {
                        $filter = json_decode($email['reportparams']['filter'], true);
                    }
                    if (!isset($filter['group'])) {
                        $encode = true;
                        $filter['group'] = 0;
                    }
                    if (!isset($filter['inactive'])) {
                        $encode = true;
                        $filter['inactive'] = 0;
                    }
                    if (!isset($filter['enrolment'])) {
                        $encode = true;
                        $filter['enrolment'] = 'all';
                    }
                    break;
                case 'completionblock':
                    if (stripos($email['reportparams']['filter'], 'cohort') === false) {
                        $filter = [
                            'course' => $email['reportparams']['filter']
                        ];
                        $encode = true;
                    } else {
                        $filter = json_decode($email['reportparams']['filter'], true);
                    }
                    if (!isset($filter['cohort'])) {
                        $filter['cohort'] = 0;
                        $encode = true;
                    }
                    if (!isset($filter['group'])) {
                        $filter['group'] = 0;
                        $encode = true;
                    }
                    if (!isset($filter['exclude'])) {
                        $filter['exclude'] = [];
                        $encode = true;
                    }
                    if (!isset($filter['inactive'])) {
                        $filter['inactive'] = 0;
                        $encode = true;
                    }
                    if (!isset($filter['progress'])) {
                        $filter['progress'] = 0;
                        $encode = true;
                    }
                    if (!isset($filter['grade'])) {
                        $filter['grade'] = 0;
                        $encode = true;
                    }
                    if (!isset($filter['enrolment'])) {
                        $filter['enrolment'] = 'all';
                        $encode = true;
                    }
                    break;
                case 'allcoursessummary':
                    $filter = json_decode($email['reportparams']['filter'], true);
                    if (!isset($filter['exclude'])) {
                        $filter['exclude'] = [];
                        $encode = true;
                    }
                    if (!isset($filter['enrolment'])) {
                        $filter['enrolment'] = 'all';
                        $encode = true;
                    }
                    break;
            }
            if ($encode) {
                $filter = json_encode($filter);
                $changed = true;
                $email['reportparams']['filter'] = $filter;
                $emaildata[$key] = $email;
            }
        }
        if ($changed == true) {
            $schedule->emaildata = json_encode($emaildata);
            $DB->update_record('edwreports_schedemails', $schedule);
        }
    }

    // Adding new block and deleting orphan blocks.
    local_edwiserreports_process_block_creation();

    // Handling report/edwiserreports_courseprogressblock:view capability for teachers.
    $capname = 'report/edwiserreports_courseprogressblock:view'; // Capability name.
    $context = context_system::instance(); // Context id.
    $permission = 1; // Permission.
    $timemodified = time(); // Time modified.
    $modifierid = $USER->id; // Modifier id.
    list($sql, $params) = $DB->get_in_or_equal(['teacher', 'editingteacher'], SQL_PARAMS_NAMED, 'archetype');
    $roles = array_keys($DB->get_records_select("role",  "archetype " . $sql, $params, '', 'id')); // Role ids.

    // Checking and adding capability if not exits.
    foreach ($roles as $role) {
        $capability = [
            'contextid' => $context->id,
            'roleid' => $role,
            'capability' => $capname,
            'permission' => $permission,
            'timemodified' => $timemodified,
            'modifierid' => $modifierid
        ];
        if (!$DB->record_exists('role_capabilities', [
            'contextid' => $context->id,
            'roleid' => $role,
            'capability' => $capname,
            'permission' => $permission
        ])) {
            $DB->insert_record('role_capabilities', $capability);
        }
    }

    // Fixing activity logs of course - 0. Changing it to 1.
    $DB->execute("UPDATE {edwreports_activity_log} SET course = 1 WHERE course = 0");

    // Delete gradeblock and courseprogressblock report records
    // cause now it is converted to Learner course activities.
    $DB->execute("DELETE FROM {edwreports_schedemails}
                   WHERE " . $DB->sql_compare_text('blockname') . " IN('gradeblock', 'courseprogressblock')
                     AND " . $DB->sql_compare_text('component') . " = 'report'");

    unset_config('siteaccessinformation', 'local_edwiserreports');

    unset_config('activecoursesdata', 'local_edwiserreports');

    set_config('siteaccessrecalculate', true, 'local_edwiserreports');

    return true;
}
