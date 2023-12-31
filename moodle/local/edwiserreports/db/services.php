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
 * Reports ablock external services
 *
 * @package     local_edwiserreports
 * @copyright   2019 wisdmlabs <support@wisdmlabs.com>
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$functions = array(
    'local_edwiserreports_complete_edwiserreports_installation' => array(
        'classname' => 'local_edwiserreports\external\api',
        'methodname' => 'complete_edwiserreports_installation',
        'classpath' => '',
        'description' => 'Complete edwiserreports plugin installation',
        'type' => 'write',
        'ajax' => true,
    ),
    'local_edwiserreports_get_plugin_config' => array(
        'classname' => 'local_edwiserreports\external\api',
        'methodname' => 'get_plugin_config',
        'classpath' => '',
        'description' => 'Get plugin config',
        'type' => 'write',
        'ajax' => true,
    ),
    'local_edwiserreports_set_plugin_config' => array(
        'classname' => 'local_edwiserreports\external\api',
        'methodname' => 'set_plugin_config',
        'classpath' => '',
        'description' => 'Set plugin config',
        'type' => 'write',
        'ajax' => true,
    ),
    'local_edwiserreports_get_customreports_data' => array(
        'classname' => 'local_edwiserreports\external\api',
        'methodname' => 'get_customreports_data',
        'classpath' => '',
        'description' => 'Get reports data',
        'type' => 'write',
        'ajax' => true,
    ),
    'local_edwiserreports_save_customreports_data' => array(
        'classname' => 'local_edwiserreports\external\api',
        'methodname' => 'save_customreports_data',
        'classpath' => '',
        'description' => 'Save reports data',
        'type' => 'write',
        'ajax' => true,
    ),
    'local_edwiserreports_get_customreports_list' => array(
        'classname' => 'local_edwiserreports\external\api',
        'methodname' => 'get_customreports_list',
        'classpath' => '',
        'description' => 'Get custom reports list',
        'type' => 'read',
        'ajax' => true,
    ),
    'local_edwiserreports_delete_custom_report' => array(
        'classname' => 'local_edwiserreports\external\api',
        'methodname' => 'delete_custom_report',
        'classpath' => '',
        'description' => 'Delete Custom Report',
        'type' => 'write',
        'ajax' => true,
    ),
    'local_edwiserreports_get_tracking_details' => array(
        'classname' => 'local_edwiserreports\external\api',
        'methodname' => 'get_tracking_details',
        'classpath' => '',
        'description' => 'Get tracking details for keep alive requests',
        'type' => 'write',
        'ajax' => true,
        'loginrequired' => false
    ),
    'local_edwiserreports_keep_alive' => array(
        'classname' => 'local_edwiserreports\external\api',
        'methodname' => 'keep_alive',
        'classpath' => '',
        'description' => 'Update user time in table',
        'type' => 'write',
        'ajax' => true,
        'loginrequired' => false
    ),
    'local_edwiserreports_get_filter_data' => array(
        'classname' => 'local_edwiserreports\external\api',
        'methodname' => 'get_filter_data',
        'classpath' => '',
        'description' => 'Get data for filter',
        'type' => 'read',
        'ajax' => true
    ),
    'local_edwiserreports_get_activities_of_course' => array(
        'classname' => 'local_edwiserreports\external\api',
        'methodname' => 'get_activities_of_course',
        'classpath' => '',
        'description' => 'Get activities of course',
        'type' => 'read',
        'ajax' => true
    ),
    'local_edwiserreports_get_summary_card_data' => array(
        'classname' => 'local_edwiserreports\external\api',
        'methodname' => 'get_summary_card_data',
        'classpath' => '',
        'description' => 'Get data for summary cards shown on summary pages',
        'type' => 'read',
        'ajax' => true
    ),
);
