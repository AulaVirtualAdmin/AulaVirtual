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
 * Reports block external apis
 *
 * @package     local_edwiserreports
 * @copyright   2021 wisdmlabs <support@wisdmlabs.com>
 * @author      krunal kamble
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace local_edwiserreports\external;

defined('MOODLE_INTERNAL') || die();

use local_edwiserreports\block_base;
use external_function_parameters;
use external_multiple_structure;
use external_value;
use stdClass;

require_once($CFG->libdir . '/externallib.php');
require_once($CFG->dirroot . '/local/edwiserreports/classes/blocks/courseprogressblock.php');

require_once($CFG->dirroot."/local/edwiserreports/lib.php");
require_once($CFG->dirroot."/local/edwiserreports/locallib.php");
/**
 * Trait impleme56nting the external function local_edwiserreports_get_filter_data.
 */
trait get_summary_card_data {

    /**
     * Describes the structure of parameters for the function.
     *
     * @return external_function_parameters
     */
    public static function get_summary_card_data_parameters() {
        return new external_function_parameters(
            array (
                'report' => new external_value(PARAM_TEXT, 'Report name '),
                'filters' => new external_value(PARAM_RAW, 'Prameters', 'local_edwiserreports')
            )
        );
    }

    /**
     * Get enrolled students from course.
     *
     * @param  array $types  Filter types
     * @param  int   $cohort Cohort id
     * @param  int   $course Course id
     * @param  int   $group  Group id
     * @param  int   $module  Module id
     * @param  int   $activity  activity id
     * @param  int   $learner  learner id
     * @return string
     */
    public static function get_summary_card_data($report, $filters) {

        // get particular reports object.
        $filters = json_decode($filters);
        $reportobj = new $report();

        // Call common method get summary data of class.
        $response = new stdClass();
        $response->summarycard = $reportobj->get_summary_data($filters);

        return json_encode($response);
    }
    /**
     * Describes the structure of the function return value.
     *
     * @return external_multiple_structure
     */
    public static function get_summary_card_data_returns() {
        return new external_value(PARAM_RAW, 'Response data');
    }
}
