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
 * eLucid Report
 * @package    local_edwiserreports
 * @copyright  (c) 2018 WisdmLabs (https://wisdmlabs.com/)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace local_edwiserreports\controller;

defined('MOODLE_INTERNAL') || die();

$files = array_diff(scandir($CFG->dirroot . "/local/edwiserreports/classes/blocks/"), array('.', '..'));
foreach ($files as $file) {
    require_once($CFG->dirroot . "/local/edwiserreports/classes/blocks/" . $file);
}

/**
 * Handles requests regarding all ajax operations.
 *
 * @package   local_edwiserreports
 * @copyright Copyright (c) 2015 Moodlerooms Inc. (http://www.moodlerooms.com)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class edwiserReportController extends controllerAbstract {
    /**
     * Do any security checks needed for the passed action
     *
     * @param string $action
     */
    public function require_capability($action) {
        $action = $action;
    }

    /**
     * Get active users graph data ajax action
     */
    public function get_activeusers_graph_data_ajax_action() {
        $data = json_decode(required_param('data', PARAM_RAW));
        echo json_encode(\local_edwiserreports\utility::get_active_users_data($data));
    }

    /**
     * Get active courses data ajax action
     */
    public function get_activecourses_data_ajax_action() {
        // Get data.
        $parameters = json_decode(required_param('data', PARAM_RAW));

        $activecourses = new \local_edwiserreports\blocks\activecoursesblock();

        // Response for ajax action.
        echo json_encode($activecourses->get_data($parameters->filter));
    }

    /**
     * Get course progress graph data ajax action
     */
    public function get_courseprogress_graph_data_ajax_action() {
        $data = json_decode(required_param('data', PARAM_RAW));

        $courseprogress = new \local_edwiserreports\blocks\courseprogressblock();
        $response = $courseprogress->get_data($data);
        echo json_encode($response);
    }

    /**
     * Get certificates data ajax action
     */
    public function get_certificates_data_ajax_action() {
        // Get data.
        $parameters = json_decode(required_param('data', PARAM_RAW));

        $certificates = new \local_edwiserreports\blocks\certificatesblock();

        // Response for ajax action.
        echo json_encode($certificates->get_data($parameters->filter));
    }

    /**
     * Get live users data ajax action
     */
    public function get_liveusers_data_ajax_action() {
        echo json_encode(\local_edwiserreports\utility::get_liveusers_data());
    }

    /**
     * Get site access data ajax action
     */
    public function get_siteaccess_data_ajax_action() {
        echo json_encode(\local_edwiserreports\utility::get_siteaccess_data());
    }

    /**
     * Get todays activity data ajax action
     */
    public function get_todaysactivity_data_ajax_action() {
        $data = json_decode(required_param('data', PARAM_RAW));
        echo json_encode(\local_edwiserreports\utility::get_todaysactivity_data($data));
    }

    /**
     * Get inactive users data ajax action
     */
    public function get_inactiveusers_data_ajax_action() {
        $data = json_decode(required_param('data', PARAM_RAW));
        echo json_encode(\local_edwiserreports\utility::get_inactiveusers_data($data));
    }

    /**
     * Get completion data ajax action
     */
    public function get_completion_data_ajax_action() {
        $params = json_decode(required_param('data', PARAM_RAW));
        $completionblock = new \local_edwiserreports\blocks\completionblock;
        echo json_encode($completionblock->get_completion_data($params));
    }

    /**
     * Get scheduled emails ajax action
     */
    public function get_scheduled_emails_ajax_action() {
        $data = json_decode(required_param('data', PARAM_RAW));
        echo json_encode(\local_edwiserreports\utility::get_scheduled_emails($data));
    }

    /**
     * Get scheduled email detail ajax action
     */
    public function get_scheduled_email_detail_ajax_action() {
        $data = json_decode(required_param('data', PARAM_RAW));
        echo json_encode(\local_edwiserreports\utility::get_scheduled_email_details($data));
    }

    /**
     * Delete scheduled mail ajax action
     */
    public function delete_scheduled_email_ajax_action() {
        $data = json_decode(required_param('data', PARAM_RAW));
        echo json_encode(\local_edwiserreports\utility::delete_scheduled_email($data));
    }

    /**
     * Change scheduled email status ajax action
     */
    public function change_scheduled_email_status_ajax_action() {
        $data = json_decode(required_param('data', PARAM_RAW));
        echo json_encode(\local_edwiserreports\utility::change_scheduled_email_status($data));
    }

    /**
     * Get course reports selectors
     */
    public function get_customreport_selectors_ajax_action() {
        // Response for ajax action.
        echo json_encode(\local_edwiserreports\utility::get_customreport_course_selectors());
    }

    /**
     * Get custom query cohort users
     */
    public function set_block_preferences_ajax_action() {
        // Get data.
        $data = json_decode(required_param('data', PARAM_RAW));

        // Response for ajax action.
        echo json_encode(\local_edwiserreports\utility::set_block_preferences($data));
    }

    /**
     * Set custom query cohort users
     */
    public function set_block_capability_ajax_action() {
        // Get data.
        $data = json_decode(required_param('data', PARAM_RAW));

        // Response for ajax action.
        echo json_encode(\local_edwiserreports\utility::set_block_capability($data));
    }

    /**
     * Hide block
     */
    public function toggle_hide_block_ajax_action() {
        // Get data.
        $data = json_decode(required_param('data', PARAM_RAW));

        // Response for ajax action.
        echo json_encode(\local_edwiserreports\utility::toggle_hide_block($data));
    }

    /**
     * Get table data for student engagement table.
     */
    public function get_studentengagement_table_data_ajax_action() {
        // Get data.
        $data = json_decode(required_param('data', PARAM_RAW));

        $studentengagement = new \local_edwiserreports\blocks\studentengagement();

        // Response for ajax action.
        echo json_encode($studentengagement->get_table_data($data->filter));
    }

    /**
     * Get graph data for courseprogress on course graph of learner block.
     */
    public function get_learnercourseprogress_graph_data_ajax_action() {
        // Get data.
        $parameters = json_decode(required_param('data', PARAM_RAW));

        $learnercourseprogress = new \local_edwiserreports\blocks\learnercourseprogressblock();

        // Response for ajax action.
        echo json_encode($learnercourseprogress->get_data($parameters->filter));
    }

    /**
     * Get graph data for courseprogress on course graph of learner block.
     */
    public function get_learnertimespentonsite_graph_data_ajax_action() {
        // Get data.
        $parameters = json_decode(required_param('data', PARAM_RAW));

        $learnertimespentonsite = new \local_edwiserreports\blocks\learnertimespentonsiteblock();

        // Response for ajax action.
        echo json_encode($learnertimespentonsite->get_data($parameters->filter));
    }

    /**
     * Get table data for learner table.
     */
    public function get_learner_table_data_ajax_action() {
        // Get data.
        $data = json_decode(required_param('data', PARAM_RAW));

        $learner = new \local_edwiserreports\blocks\learner();

        // Response for ajax action.
        echo json_encode($learner->get_table_data($data->filter));
    }

    /**
     * Check if plugin is installed.
     *
     * @return boolean
     */
    public function is_installed_ajax_action() {
        echo json_encode([
            'installed' => get_config('local_edwiserreports', 'version') !== false
        ]);
    }

    /**
     * Get data for grade graph
     *
     * @return void
     */
    public function get_grade_graph_data_ajax_action() {
        // Get data.
        $data = json_decode(required_param('data', PARAM_RAW));

        // Response for ajax action.
        echo json_encode(\local_edwiserreports\utility::get_grade_graph_data($data));
    }

    /**
     * Get table data for grade table.
     */
    public function get_grade_table_data_ajax_action() {
        // Get data.
        $data = json_decode(required_param('data', PARAM_RAW));

        // Response for ajax action.
        echo json_encode(\local_edwiserreports\utility::get_grade_table_data($data));
    }

    /**
     * Get table data for Visits on Site graph.
     */
    public function get_visitsonsite_graph_data_ajax_action() {
        // Get data.
        $parameters = json_decode(required_param('data', PARAM_RAW));

        $visitsonsite = new \local_edwiserreports\blocks\visitsonsiteblock();

        // Response for ajax action.
        echo json_encode($visitsonsite->get_data($parameters->filter));
    }

    /**
     * Get table data for Timespent on site graph.
     */
    public function get_timespentonsite_graph_data_ajax_action() {
        // Get data.
        $parameters = json_decode(required_param('data', PARAM_RAW));

        $timespentonsite = new \local_edwiserreports\blocks\timespentonsiteblock();

        // Response for ajax action.
        echo json_encode($timespentonsite->get_data($parameters->filter));
    }

    /**
     * Get table data for Timespent on Course graph.
     */
    public function get_timespentoncourse_graph_data_ajax_action() {
        // Get data.
        $parameters = json_decode(required_param('data', PARAM_RAW));

        $timespentoncourse = new \local_edwiserreports\blocks\timespentoncourseblock();

        // Response for ajax action.
        echo json_encode($timespentoncourse->get_data($parameters->filter));
    }

    /**
     * Get table data for Course activity status graph.
     */
    public function get_courseactivitystatus_graph_data_ajax_action() {
        // Get data.
        $parameters = json_decode(required_param('data', PARAM_RAW));

        $courseactivitystatus = new \local_edwiserreports\blocks\courseactivitystatusblock();

        // Response for ajax action.
        echo json_encode($courseactivitystatus->get_data($parameters->filter));
    }

    /**
     * Get table data for Course activity status graph.
     */
    public function get_courseengagement_data_ajax_action() {
        // Get data.
        $parameters = json_decode(required_param('data', PARAM_RAW));

        $courseengagement = new \local_edwiserreports\blocks\courseengagementblock();

        // Response for ajax action.
        echo json_encode($courseengagement->get_data($parameters->filter));
    }

    /**
     * Get insight card context to render insight card.
     */
    public function get_insight_card_context_ajax_action() {
        // Get data.
        $data = json_decode(required_param('data', PARAM_RAW));

        $insight = new \local_edwiserreports\insights\insight();

        // Response for ajax action.
        echo json_encode($insight->get_card_context($data->id));
    }

    /**
     * Get insight card data to render insight.
     */
    public function get_insight_card_data_ajax_action() {
        // Get data.
        $data = json_decode(required_param('data', PARAM_RAW));

        $insight = new \local_edwiserreports\insights\insight();

        // Response for ajax action.
        echo json_encode($insight->get_card_data(
            $data->id,
            $data->filter
        ));
    }

    /**
     * Get timeperiod label to display on dashboard.
     */
    public function get_timeperiod_label_data_ajax_action() {
        // Get data.
        $timeperiod = required_param('data', PARAM_RAW);

        $base = new \local_edwiserreports\block_base();
        list($startdate, $enddate) = $base->get_date_range($timeperiod);

        if ($timeperiod == 'yearly') {
            $startdate--;
            $enddate--;
        }
        echo json_encode([
            'startdate' => $startdate / 86400,
            'enddate' => $enddate / 86400
        ]);
    }

    /**
     * Get data for graph using download key.
     */
    public function get_export_data_for_graph_action() {
        global $DB;
        $download = required_param('download', PARAM_TEXT);
        $col = $DB->sql_compare_text('download');
        $val = $DB->sql_compare_text(':download');
        echo $DB->get_field_sql(
            "SELECT data FROM {edwreports_graph_data} WHERE $col = $val",
            ['download' => $download]
        );
    }

    /**
     * Get custom reports
     */
    public function get_customreports_data_ajax_action() {
        $data = required_param('data', PARAM_RAW);

        $params = json_decode($data);
        $customreportsblock = new \local_edwiserreports\blocks\customreportsblock();
        $data = $customreportsblock->get_data($params);

        echo json_encode(array(
            "success" => true,
            "data" => json_encode($data)
        ));
    }

    /**
     * Get course activities summary data for table.
     *
     * @return void
     */
    public function get_courseactivitiessummary_data_action() {
        $data = required_param('data', PARAM_RAW);
        $params = json_decode($data);
        $courseactivitiessummary = new \local_edwiserreports\reports\courseactivitiessummary();
        echo json_encode($courseactivitiessummary->get_data($params));
    }

    /**
     * Get learner course progress data for table.
     *
     * @return void
     */
    public function get_learnercourseprogress_data_action() {
        $data = required_param('data', PARAM_RAW);
        $params = json_decode($data);
        $learnercourseprogress = new \local_edwiserreports\reports\learnercourseprogress();
        echo json_encode($learnercourseprogress->get_data($params));
    }

    /**
     * Get learner course activities data for table.
     *
     * @return void
     */
    public function get_learnercourseactivities_data_action() {
        $data = required_param('data', PARAM_RAW);
        $params = json_decode($data);
        $learnercourseactivities = new \local_edwiserreports\reports\learnercourseactivities();
        echo json_encode($learnercourseactivities->get_data($params));
    }

    /**
     * Get all courses summary data for table.
     *
     * @return void
     */
    public function get_allcoursessummary_data_action() {
        $data = required_param('data', PARAM_RAW);
        $params = json_decode($data);
        $allcoursessummary = new \local_edwiserreports\reports\allcoursessummary();
        echo json_encode($allcoursessummary->get_data($params));
    }

    /**
     * Get course activity completion data for table.
     *
     * @return void
     */
    public function get_courseactivitycompletion_data_action() {
        $data = required_param('data', PARAM_RAW);
        $params = json_decode($data);
        $courseactivitycompletion = new \local_edwiserreports\reports\courseactivitycompletion();
        echo json_encode($courseactivitycompletion->get_data($params));
    }

    /**
     * Get table data for Grade block modal.
     *
     * @return void
     */
    public function get_grade_modal_data_action() {
        $data = required_param('data', PARAM_RAW);
        $params = json_decode($data);
        $gradeblock = new \local_edwiserreports\blocks\gradeblock();
        echo json_encode($gradeblock->get_modal_table($params->filter, $params->range));
    }

    /**
     * Get table data for Course Progress block modal.
     *
     * @return void
     */
    public function get_courseprogress_modal_data_action() {
        $data = required_param('data', PARAM_RAW);
        $params = json_decode($data);
        $courseprogressblock = new \local_edwiserreports\blocks\courseprogressblock();
        echo json_encode($courseprogressblock->get_modal_table($params->filter, $params->range));
    }

    /**
     * Get table data for Site Overview Status block modal.
     *
     * @return void
     */
    public function get_siteoverviewstatus_block_modal_data_action() {
        $data = required_param('data', PARAM_RAW);
        $params = json_decode($data);
        $activeusersblock = new \local_edwiserreports\blocks\activeusersblock();
        echo json_encode($activeusersblock->get_block_modal_table($params->date, $params->type));
    }
}
