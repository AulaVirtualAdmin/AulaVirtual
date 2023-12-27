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
 * @author      Yogesh Shirsath
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace local_edwiserreports\external;

defined('MOODLE_INTERNAL') || die();

use local_edwiserreports\block_base;
use external_function_parameters;
use external_multiple_structure;
use external_value;

require_once($CFG->libdir . '/externallib.php');
require_once($CFG->dirroot . '/local/edwiserreports/classes/blocks/courseprogressblock.php');

/**
 * Trait impleme56nting the external function local_edwiserreports_get_filter_data.
 */
trait get_filter_data {

    /**
     * Describes the structure of parameters for the function.
     *
     * @return external_function_parameters
     */
    public static function get_filter_data_parameters() {
        return new external_function_parameters(
            array (
                'types' => new external_multiple_structure(
                    new external_value(PARAM_TEXT, 'Filter types')
                ),
                'cohort' => new external_value(PARAM_INT, 'Cohort id', VALUE_DEFAULT, 0),
                'course' => new external_value(PARAM_INT, 'Course id', VALUE_DEFAULT, 0),
                'section' => new external_value(PARAM_INT, 'Section id', VALUE_DEFAULT, 0),
                'group' => new external_value(PARAM_INT, 'Group id', VALUE_DEFAULT, 0)
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
     * @return string
     */
    public static function get_filter_data($types, $cohort, $course, $section, $group) {
        global $USER;

        // Introducing flags in types array.
        // Skip all users option addition.
        $index = array_search('noallusers', $types);
        $allusers = true;
        if ($index !== false) {
            $allusers = false;
            unset($types[$index]);
        }

        // Skip all courses option addition.
        $index = array_search('noallcourses', $types);
        $allcourses = true;
        if ($index !== false) {
            $allcourses = false;
            unset($types[$index]);
        }

        $report = new \local_edwiserreports\reports\base();
        $blockbase = new block_base();
        $response = [];
        foreach ($types as $type) {
            $response[$type] = false;
        }

        // Course list.
        if (array_search('course', $types) !== false) {
            $courses = $blockbase->get_courses_of_cohort_and_user($cohort, $USER->id);
            $courses = array_map(function($course) {
                return array(
                    'id' => $course->id,
                    'fullname' => format_string($course->fullname, true, ['context' => \context_system::instance()])
                );
            }, $courses);
            if ($allcourses) {
                array_unshift($courses, (object)[
                    'id' => 0,
                    'fullname' => get_string('fulllistofcourses')
                ]);
            }
            $response['course'] = [
                'courses' => array_values($courses)
            ];
        }

        // Course module list.
        if (array_search('cm', $types) !== false) {
            $cms = $report->get_cms($course);
            $response['cm'] = [
                'cms' => array_values($cms)
            ];
        }

        // Course-group list.
        if (array_search('coursegroup', $types) !== false) {
            $allcoursessummary = new \local_edwiserreports\reports\allcoursessummary();
            $groups = $allcoursessummary->get_group_filter($cohort)['groups'];
            $response['groups'] = empty($groups) ? [] : $groups;
        }

        // Section list.
        if (array_search('section', $types) !== false) {
            $response['section'] = [
                'sections' => $report->get_sections($course)
            ];
        }

        // Modules list.
        if (array_search('module', $types) !== false) {
            $response['module'] = [
                'modules' => $report->get_modules($course, $section)
            ];
        }

        // Groups list.
        if (array_search('group', $types) !== false) {
            if ($course == 0) {
                $response['group'] = $blockbase->get_default_group_filter();
            } else {
                $response['group'] = [
                    'groups' => $blockbase->get_groups($course)
                ];
            }
        }

        // Student/Users list.
        if (array_search('student', $types) !== false) {
            $users = $blockbase->get_user_from_cohort_course_group($cohort, $course, $group, $USER->id);
            if (!empty($users) && $allusers) {
                array_unshift($users, (object)[
                    'id' => 0,
                    'fullname' => get_string('allusers', 'search')
                ]);
            }
            $response['student'] = [
                'students' => array_values($users)
            ];
        }

        return json_encode($response);
    }
    /**
     * Describes the structure of the function return value.
     *
     * @return external_multiple_structure
     */
    public static function get_filter_data_returns() {
        return new external_value(PARAM_RAW, 'Response data');
    }
}
