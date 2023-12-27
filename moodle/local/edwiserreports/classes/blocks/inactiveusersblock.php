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
 * Plugin administration pages are defined here.
 *
 * @package     local_edwiserreports
 * @category    admin
 * @copyright   2019 wisdmlabs <support@wisdmlabs.com>
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace local_edwiserreports\blocks;

use local_edwiserreports\block_base;
use local_edwiserreports\utility;
use stdClass;
use cache;

/**
 * Class Inacive Users Block. To get the data related to inactive users block.
 */
class inactiveusersblock extends block_base {

    /**
     * Preapre layout for each block
     * @return object Layout object
     */
    public function get_layout() {
        // Layout related data.
        $this->layout->id = 'inactiveusersblock';
        $this->layout->name = get_string('inactiveusers', 'local_edwiserreports');
        $this->layout->info = get_string('inactiveusersblockhelp', 'local_edwiserreports');
        $this->layout->downloadlinks = $this->get_block_download_options();
        $this->layout->filters = $this->get_filters();

        // Block related data.
        $this->block->displaytype = 'line-chart';

        // Add block view in layout.
        $this->layout->blockview = $this->render_block('inactiveusersblock', $this->block);
        // Set block edit capabilities.
        $this->set_block_edit_capabilities($this->layout->id);

        // Return blocks layout.
        return $this->layout;
    }

    /**
     * Prepare Inactive users filter
     * @return string Filter HTML content
     */
    public function get_filters() {
        global $OUTPUT;
        return $OUTPUT->render_from_template('local_edwiserreports/blocks/inactiveusersblockfilters', [
            'searchicon' => $this->image_icon('actions/search'),
            'placeholder' => get_string('searchuser', 'local_edwiserreports')
        ]);
    }

    /**
     * Get Inactive users data
     * @param  Object $params Parameters
     * @return object         Response object
     */
    public function get_data($params = false) {
        $filter = isset($params->filter) ? $params->filter : false;

        // Make cache for inactive users block.
        $cache = cache::make("local_edwiserreports", "courseprogress");

        $cachekey = "inactiveusers-" . $filter;

        // If cache not set for course progress.
        if (!$response = $cache->get($cachekey)) {
            $response = new stdClass();

            // Get response data.
            $response->data = $this->get_inactiveusers($filter);

            // Set cache to get data for course progress.
            $cache->set($cachekey, $response);
        }

        // Return response.
        return $response;
    }

    /**
     * Get inactive users list
     * @param  string $filter Filter string
     * @param  bool   $table  True if user list is for table
     * @return array          Array of inactive users
     */
    public function get_inactiveusers($filter = 'never', $table = true) {
        global $DB;
        $filter = json_decode($filter);
        $rtl = isset($filter->dir) && $filter->dir == 'rtl' ? 1 : 0;

        // Get current time.
        $timenow = time();

        // Get last login time using filter.
        switch ($filter) {
            case '1month':
                $lastlogin = $timenow - 1 * LOCAL_SITEREPORT_ONEMONTH;
                break;
            case '3month':
                $lastlogin = $timenow - 3 * LOCAL_SITEREPORT_ONEMONTH;
                break;
            case '6month':
                $lastlogin = $timenow - 6 * LOCAL_SITEREPORT_ONEMONTH;
                break;
            default:
                // For never.
                $lastlogin = 0;
        }

        $courses = $this->get_courses_of_user();

        // Temporary course table.
        $coursetable = utility::create_temp_table('tmp_i_c', array_keys($courses));

        // Query to get users who have not logged in.
        $sql = "SELECT DISTINCT u.id, u.email, firstnamephonetic, lastnamephonetic, middlename,
                       alternatename, firstname, lastname, u.lastlogin
                  FROM {{$coursetable}} c
                  JOIN {context} ctx ON c.tempid = ctx.instanceid
                  JOIN {role_assignments} ra ON ctx.id = ra.contextid
                  JOIN {role} r ON ra.roleid = r.id
                  JOIN {user} u ON ra.userid = u.id
                 WHERE ctx.contextlevel = :contextlevel
                   AND r.archetype = :archetype
                   AND u.confirmed = 1
                   AND u.deleted = 0
                   AND u.lastaccess <= :lastlogin";

        $params = [
            'contextlevel' => CONTEXT_COURSE,
            'archetype' => 'student',
            'lastlogin' => $lastlogin
        ];

        // Get all users who are inactive.
        $users = $DB->get_records_sql($sql, $params);

        // Droppping course table.
        utility::drop_temp_table($coursetable);

        // Geenerate Inactive users return array.
        $response = array();
        if (!$table) {
            $header = [
                get_string('fullname', 'local_edwiserreports'),
                get_string('email', 'local_edwiserreports'),
                get_string('lastaccess', 'local_edwiserreports')
            ];
            $response[] = $rtl && !$table ? array_reverse($header) : $header;
        }
        foreach ($users as $user) {
            $data = array(
                "name" => fullname($user),
                "email" => $user->email
            );

            $data["lastlogin"] = $table ? '<div class="d-none">'.$user->lastlogin.'</div>' : '';

            // Get last login by users.
            $data["lastlogin"] .= $user->lastlogin ? format_time($timenow - $user->lastlogin) : get_string('never');

            // Put inactive users in inactive users table.
            $response[] = $rtl && !$table ? array_reverse(array_values($data)) : array_values($data);
        }

        // Return inactive users array.
        return $response;
    }

    /**
     * Get exportable data for inactive Users
     * @param  string $filter     Filter to apply on data
     * @param  bool   $filterdata If enabled then filter data
     * @return array          Inactive users array
     */
    public static function get_exportable_data_block($filter, $filterdata = true) {
        if ($filterdata == false) {
            $filter = 'never';
        }
        

        $obj = new self();
        return (object) [
            'data' => $obj->get_inactiveusers($filter, false),
            'options' => [
                'format' => 'a4',
                'orientation' => 'p',
            ]
        ];
    }
}
