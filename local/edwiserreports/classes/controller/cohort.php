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
 * Edwiser Reports Cohort Controller
 * @package    local_edwiserreports
 * @copyright  (c) 2022 WisdmLabs (https://wisdmlabs.com/)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @author     Yogesh Shirsath
 */
namespace local_edwiserreports\controller;

use context_user;
use stdClass;

class cohort {
    /**
     * Instance of this class.
     *
     * @var cohort
     */
    private static $instance = null;

    /**
     * Cohorts list.
     */
    private $cohorts = false;

    /**
     * Cohort constructor.
     */
    private function __construct() {
        global $USER;

        // Fetch all cohorts
        // passing 0,0 -> page_number, number of record, 0 means.
        $allcohorts = cohort_get_all_cohorts(0, 0);

        $usercontext = context_user::instance($USER->id);

        $cohorts = [];

        // Users visibility check.
        foreach ($allcohorts['cohorts'] as $key => $value) {
            if (cohort_can_view_cohort($key, $usercontext)) {
                $cohorts[$key] = $value;
                $cohorts[$key]->name = format_string($value->name, true, ['context' => \context_system::instance()]);
            }
        }

        if (empty($cohorts)) {
            // Returning false if no cohorts are present.
            return;
        }

        $this->cohorts = new stdClass;
        $this->cohorts->values = array_merge([['id' => 0, 'name' => get_string('allcohorts', 'local_edwiserreports')]], $cohorts);
    }

    /**
     * Get instance of this class.
     *
     * @return cohort
     */
    public static function instance() {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * Get cohorts list.
     *
     * @return array
     */
    public function get_cohorts() {
        return $this->cohorts;
    }
}
