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

namespace local_edwiserreports\output;

defined('MOODLE_INTERNAL') || die();

use local_edwiserreports\controller\authentication;
use local_edwiserreports\controller\license;
use local_edwiserreports\controller\navigation;
use local_edwiserreports\controller\breadcrumb;
use local_edwiserreports\utility;
use moodle_exception;
use context_system;
use renderer_base;
use templatable;
use renderable;
use moodle_url;
use stdClass;

require_once($CFG->dirroot."/local/edwiserreports/lib.php");
require_once($CFG->dirroot."/local/edwiserreports/locallib.php");

/**
 * Elucid report renderable.
 */
class edwiserreports_renderable implements renderable, templatable {
    /**
     * Function to export the renderer data in a format that is suitable for a
     * edit mustache template.
     *
     * @param renderer_base $output Used to do a final render of any components that need to be rendered for export.
     * @return stdClass|array
     */
    public function export_for_template(renderer_base $output) {
        global $CFG, $USER;

        user_preference_allow_ajax_update('local_edwiserreports_insights_order', PARAM_TEXT);

        $context = context_system::instance();
        $authentication = new authentication();
        $output = new stdClass();

        // Show license notice.
        $output->notice = (new license())->get_license_notice();

        // Secret key.
        $output->secret = $authentication->get_secret_key($USER->id);

        // Prepare reports blocks.
        $reportblocks = \local_edwiserreports\utility::get_reports_block();
        $reportblocks = new \local_edwiserreports\report_blocks($reportblocks);
        $output->blocks = $reportblocks->get_report_blocks();

        // Todo: Remove below code.
        $output->downloadurl = $CFG->wwwroot."/local/edwiserreports/download.php";

        $output->navigation = navigation::instance()->get_navigation('overview');

        $output->sesskey = sesskey();
        $output->timenow = date("Y-m-d", time());
        $output->courses = \local_edwiserreports\utility::get_courses();
        $output->contextid = $context->id;

        $output->hascustomcertpluign = local_edwiserreports_has_plugin("mod", "customcert");

        $output->editing = isset($USER->editing) ? $USER->editing : 0;
        if (is_siteadmin($USER->id)) {
            $output->canmanagecustomreports = has_capability('report/edwiserreports_customreports:manage', $context);
        }
        $output->customreportseditlink = new moodle_url($CFG->wwwroot."/local/edwiserreports/customreportedit.php");

        // Top insights.
        $insights = new \local_edwiserreports\insights\insight();
        $output->topinsights = $insights->get_insights();
        if ($CFG->branch > 311) {
            $output->setactive = true;
            $output->activeurl = new moodle_url("/local/edwiserreports/index.php");
        }
        return $output;
    }
}

/**
 * Active users page renderables.
 */
class activeusers_renderable implements renderable, templatable {
    /**
     * Function to export the renderer data in a format that is suitable for a
     * edit mustache template.
     *
     * @param renderer_base $output Used to do a final render of any components that need to be rendered for export.
     * @return stdClass|array
     */
    public function export_for_template(renderer_base $output) {
        global $CFG, $USER;

        $output = new stdClass();
        $authentication = new authentication();
        $blockbase = new \local_edwiserreports\block_base();

        $output->contextid = context_system::instance()->id;
        $output->secret = $authentication->get_secret_key($USER->id);

        // Show license notice.
        $output->notice = (new license())->get_license_notice();

        $output->pageheader = get_string("activeusersheader", "local_edwiserreports");
        // Header navigation.
        $output->navigation = navigation::instance()->get_navigation('other');

        if ($cohortfilter = local_edwiserreports_get_cohort_filter()) {
            $output->cohortfilters = $cohortfilter;
        }

        // Add export icons to export array.
        $output->export = array(
            "id" => "activeusersblock",
            "region" => "report",
            "downloadlinks" => $blockbase->get_block_download_options(),
            "downloadurl" => $CFG->wwwroot . "/local/edwiserreports/download.php",
            "filter" => json_encode([
                "dir" => ''
            ])
        );

        $output->searchicon = \local_edwiserreports\utility::image_icon('actions/search');
        $output->placeholder = get_string('searchdate', 'local_edwiserreports');
        $output->length = [10, 25, 50, 100];
        if ($CFG->branch > 311) {
            $output->setactive = true;
            $output->activeurl = new moodle_url("/local/edwiserreports/index.php");
        }
        return $output;
    }
}

/**
 * Certificate renderable.
 */
class certificates_renderable implements renderable, templatable {
    /**
     * Function to export the renderer data in a format that is suitable for a
     * edit mustache template.
     *
     * @param renderer_base $output Used to do a final render of any components that need to be rendered for export.
     * @return stdClass|array
     */
    public function export_for_template(renderer_base $output) {
        global $CFG, $DB, $USER;

        $certblock = new \local_edwiserreports\blocks\certificatesblock();
        $authentication = new authentication();
        $output = new stdClass();

        // Show license notice.
        $output->notice = (new license())->get_license_notice();

        // Secret key.
        $output->secret = $authentication->get_secret_key($USER->id);

        $courses = $certblock->get_courses_of_user();

        // Temporary course table.
        $coursetable = utility::create_temp_table('tmp_c_c', array_keys($courses));

        $customcerts = array_values($DB->get_records_sql(
            "SELECT c.*
            FROM {customcert} c
            JOIN {{$coursetable}} ct ON c.course = ct.tempid"
        ));
        // Drop temporary table.
        utility::drop_temp_table($coursetable);

        if ($cohortfilter = local_edwiserreports_get_cohort_filter()) {
            $output->cohortfilters = $cohortfilter;
        }

        // Header navigation.
        $output->navigation = navigation::instance()->get_navigation('other');
        $output->pageheader = get_string("certificatestats", "local_edwiserreports");

        $output->searchicon = \local_edwiserreports\utility::image_icon('actions/search');
        $output->placeholder = get_string('searchcertificates', 'local_edwiserreports');
        $output->length = [10, 25, 50, 100];

        if (!empty($customcerts)) {
            $output->hascertificates = true;
            $firstcertid = 0;
            foreach ($customcerts as $customcert) {
                if (!$firstcertid) {
                    $firstcertid = $customcert->id;
                }
                $course = get_course($customcert->course);
                $customcert->coursename = $course->shortname;
                $customcert->name = format_string($customcert->name, true, ['context' => \context_system::instance()]);
            }
            $output->certificates = array_values($customcerts);
            $output->export = array(
                "id" => "certificatesblock",
                "region" => "report",
                "downloadlinks" => $certblock->get_block_download_options(),
                "downloadurl" => $CFG->wwwroot . "/local/edwiserreports/download.php",
                "filter" => $firstcertid,
                // "filter" => json_encode([
                //     "dir" => ''
                // ])
            );
        }
        if ($CFG->branch > 311) {
            $output->setactive = true;
            $output->activeurl = new moodle_url("/local/edwiserreports/index.php");
        }

        return $output;
    }
}

/**
 * Completion renderables.
 */
class completion_renderable implements renderable, templatable {
    /**
     * Function to export the renderer data in a format that is suitable for a
     * edit mustache template.
     *
     * @param renderer_base $output Used to do a final render of any components that need to be rendered for export.
     * @return stdClass|array
     */
    public function export_for_template(renderer_base $output) {
        global $CFG, $USER;

        $output = new stdClass();
        $authentication = new authentication();
        $completion = new \local_edwiserreports\blocks\completionblock();

        // Course id.
        $courseid = optional_param("courseid", 0, PARAM_INT);

        // Show license notice.
        $output->notice = (new license())->get_license_notice();

        // Secret key.
        $output->secret = $authentication->get_secret_key($USER->id);

        $courses = $completion->get_courses_of_user($USER->id);
        unset($courses[SITEID]);

        if ($courseid == 0) {
            $courseid = reset($courses)->id;
        }

        // Invalid course.
        if (!isset($courses[$courseid])) {
            throw new moodle_exception('invalidcourse', 'core_error');
        }

        $output->groups = $completion->get_groups($courseid);

        $courses[$courseid]->selected = true;

        $course = $courses[$courseid];
        $output->sesskey = sesskey();

        if ($cohortfilter = local_edwiserreports_get_cohort_filter()) {
            $output->cohortfilters = $cohortfilter;
        }

        // Add export icons to export array.
        $output->export = array(
            "id" => "completionblock",
            "region" => "report",
            "downloadlinks" => $completion->get_block_download_options(),
            "downloadurl" => $CFG->wwwroot . "/local/edwiserreports/download.php",
            "sesskey" => sesskey(),
            "filter" => json_encode([
                'cohort' => 0,
                'course' => $courseid,
                'group' => 0,
                'exclude' => [],
                'inactive' => 0,
                'progress' => 0,
                'grade' => 0,
                'enrolment' => 'all',
                "dir" => ''
            ])
        );

        // Header navigation.
        $output->navigation = navigation::instance()->get_navigation('course');
        $output->showdaterange = true;
        $output->showdatefilter = true;
        $output->calendar = file_get_contents($CFG->dirroot . '/local/edwiserreports/pix/calendar.svg');
                    
        $output->pageheader = get_string("completionheader", "local_edwiserreports");
        $output->breadcrumb = $completion->get_breadcrumb();
        // $output->breadcrumb = breadcrumb::instance()->get_breadcrumb(array('allcoursessummary', 'coursecompletion'));

        $output->courses = array_values($courses);
        $output->searchicon = \local_edwiserreports\utility::image_icon('actions/search');
        $output->placeholder = get_string('searchuser', 'local_edwiserreports');
        $output->length = [10, 25, 50, 100];
        if ($CFG->branch > 311) {
            $output->setactive = true;
            $output->activeurl = new moodle_url("/local/edwiserreports/completion.php", array('courseid' => $course->id));
        }

        $filters = new stdClass();
        $filters->course = $courseid;
        $output->summarycard = $completion->get_summary_data($filters);




        return $output;
    }
}

/**
 * Student engagement renderables.
 */
class studentengagement_renderable implements renderable, templatable {
    /**
     * Function to export the renderer data in a format that is suitable for a
     * edit mustache template.
     *
     * @param renderer_base $output Used to do a final render of any components that need to be rendered for export.
     * @return stdClass|array
     */
    public function export_for_template(renderer_base $output) {
        global $USER, $CFG;

        // Getting secret key for service authentication.
        $authentication = new authentication();

        $studentengagement = new \local_edwiserreports\blocks\studentengagement();
        $output = new stdClass();

        // Show license notice.
        $output->notice = (new license())->get_license_notice();

        // Secret key.
        $output->secret = $authentication->get_secret_key($USER->id);

        // Courses for filter.
        $output->courses = $studentengagement->get_studentengagement_courses();

        // Fetch cohort filters.
        if ($cohortfilters = local_edwiserreports_get_cohort_filter()) {
            $output->cohortfilters = $cohortfilters;
        }

        // Groups to show on grade page.
        if ($groups = $studentengagement->get_default_group_filter()) {
            $output->groups = $groups;
        }

        // Add export icons to export array.
        $output->export = array(
            "id" => "studentengagement",
            "region" => "report",
            "downloadlinks" => $studentengagement->get_block_download_options(),
            "downloadurl" => $CFG->wwwroot . "/local/edwiserreports/download.php",
            "filter" => json_encode([
                "course" => 0,
                "cohort" => 0,
                "group" => 0,
                "inactive" => 0,
                "enrolment" => "all",
                "dir" => ''
            ])
        );

        // Header navigation.
        $output->navigation = navigation::instance()->get_navigation('learners');
        $output->showdaterange = true;
        $output->showdatefilter = true;

        $output->pageheader = get_string('alllearnersummary', 'local_edwiserreports');
        $output->breadcrumb = $studentengagement->get_breadcrumb();
        $output->calendar = file_get_contents($CFG->dirroot . '/local/edwiserreports/pix/calendar.svg');


        $output->searchicon = \local_edwiserreports\utility::image_icon('actions/search');
        $output->placeholder = get_string('searchuser', 'local_edwiserreports');
        $output->length = [10, 25, 50, 100];
        if ($CFG->branch > 311) {
            $output->setactive = true;
            $output->activeurl = new moodle_url("/local/edwiserreports/index.php");
        }


        $filters = new stdClass();

        $output->summarycard = $studentengagement->get_summary_data($filters);

        return $output;
    }
}

/**
 * Course activities summary page renderables.
 */
class courseactivitiessummary_renderable implements renderable, templatable {
    /**
     * Function to export the renderer data in a format that is suitable for a
     * edit mustache template.
     *
     * @param renderer_base $output Used to do a final render of any components that need to be rendered for export.
     * @return stdClass|array
     */
    public function export_for_template(renderer_base $output) {
        global $USER, $CFG;

        $courseactivitiessummary = new \local_edwiserreports\reports\courseactivitiessummary();
        $authentication = new authentication();
        $output = new stdClass();

        // Show license notice.
        $output->notice = (new license())->get_license_notice();

        // Secret key.
        $output->secret = $authentication->get_secret_key($USER->id);
        if ($courseactivitiessummary->can_edit_report_capability('courseactivitiessummary')) {
            $output->canedit = true;
            $output->capdata = [
                'contextid' => context_system::instance()->id,
                'reportname' => 'courseactivitiessummary'
            ];
        }

        // Courses.
        $activecourse = optional_param('course', 0, PARAM_INT);

        // Course to show on grade page.
        $filter = $courseactivitiessummary->get_filter($activecourse);
        $output->coursecats = $filter['coursecategories'];
        $output->sections = $filter['sections'];
        $output->modules = $filter['modules'];
        $output->groups = $filter['groups'];

        // Header navigation.
        $output->pageheader = get_string("courseactivitiessummary", "local_edwiserreports");
        $output->showdaterange = true;
        $output->showdatefilter = true;

        $output->navigation = navigation::instance()->get_navigation('course');
        $output->breadcrumb = $courseactivitiessummary->get_breadcrumb();
        $output->calendar = file_get_contents($CFG->dirroot . '/local/edwiserreports/pix/calendar.svg');


        // Table filter context.
        $output->searchicon = \local_edwiserreports\utility::image_icon('actions/search');
        $output->placeholder = get_string('searchactivity', 'local_edwiserreports');
        $output->length = [10, 25, 50, 100];

        // Add export icons to export array.
        $output->export = array(
            "id" => "courseactivitiessummary",
            "region" => "report",
            "downloadlinks" => $courseactivitiessummary->bb->get_block_download_options(),
            "downloadurl" => $CFG->wwwroot . "/local/edwiserreports/download.php",
            "filter" => json_encode([
                "course" => $filter['activecourse'],
                "section" => 0,
                "module" => "all",
                "group" => 0,
                "enrolment" => "all",
                "exclude" => [],
                "dir" => ''
            ])
        );

        if ($CFG->branch > 311) {
            $output->setactive = true;
            $output->activeurl = new moodle_url("/local/edwiserreports/index.php");
        }


        $filters = new stdClass();
        $filters->course = $filter['activecourse'];
        $output->summarycard = $courseactivitiessummary->get_summary_data($filters);

        return $output;
    }
}

/**
 * Learner course progress page renderables.
 */
class learnercourseprogress_renderable implements renderable, templatable {

    /**
     * If this is true then course progress will be shown of current user only.
     *
     * @var bool
     */
    public $learner;

    /**
     * Constructor
     *
     * @param boolean $learner True if current user is learner
     */
    public function __construct($learner = true) {
        $this->learner = $learner;
    }
    /**
     * Function to export the renderer data in a format that is suitable for a
     * edit mustache template.
     *
     * @param renderer_base $output Used to do a final render of any components that need to be rendered for export.
     * @return stdClass|array
     */
    public function export_for_template(renderer_base $output) {
        global $USER, $CFG;

        $learnercourseprogress = new \local_edwiserreports\reports\learnercourseprogress();
        $authentication = new authentication();
        $output = new stdClass();
        // SUmmary card data
        $filters = new stdClass();
        // Show license notice.
        $output->notice = (new license())->get_license_notice();

        // Secret key.
        $output->secret = $authentication->get_secret_key($USER->id);

        if (!$this->learner) {
            $activelearner = optional_param('learner', 0, PARAM_INT);

            // Course to show on grade page.
            $filter = $learnercourseprogress->get_filter($activelearner);

            $activelearner = $filter['activelearner'];
            $output->students = $filter['learners'];

            // Add export icons to export array.
            $output->export = array(
                "id" => "learnercourseprogress",
                "region" => "report",
                "downloadlinks" => $learnercourseprogress->bb->get_block_download_options(),
                "downloadurl" => $CFG->wwwroot . "/local/edwiserreports/download.php",
                "filter" => json_encode([
                    "learner" => $activelearner,
                    "enrolment" => 'all',
                    "dir" => ''
                ])
            );

            if ($learnercourseprogress->can_edit_report_capability('learnercourseprogress')) {
                $output->canedit = true;
                $output->capdata = [
                    'contextid' => context_system::instance()->id,
                    'reportname' => 'learnercourseprogress'
                ];
            }

            $filters->learner = $filter['activelearner'];
        }

        $output->learner = $this->learner;

        // Header navigation.
        $output->pageheader = get_string("learnercourseprogress", "local_edwiserreports");
        $output->showdaterange = true;
        $output->showdatefilter = true;

        $output->navigation = navigation::instance()->get_navigation('learners');
        $output->calendar = file_get_contents($CFG->dirroot . '/local/edwiserreports/pix/calendar.svg');


        // Table filter context.
        $output->searchicon = \local_edwiserreports\utility::image_icon('actions/search');
        $output->placeholder = get_string('searchcourse', 'local_edwiserreports');
        $output->length = [10, 25, 50, 100];

        if ($CFG->branch > 311) {
            $output->setactive = true;
            $output->activeurl = new moodle_url("/local/edwiserreports/index.php");
        }

        
        $output->summarycard = $learnercourseprogress->get_summary_data($filters);
        $output->breadcrumb = $learnercourseprogress->get_breadcrumb($filters);

        return $output;
    }
}

/**
 * Learner course progress page renderables.
 */
class learnercourseactivities_renderable implements renderable, templatable {

    /**
     * Function to export the renderer data in a format that is suitable for a
     * edit mustache template.
     *
     * @param renderer_base $output Used to do a final render of any components that need to be rendered for export.
     * @return stdClass|array
     */
    public function export_for_template(renderer_base $output) {
        global $USER, $CFG;

        $learnercourseactivities = new \local_edwiserreports\reports\learnercourseactivities();
        $authentication = new authentication();
        $output = new stdClass();

        // Show license notice.
        $output->notice = (new license())->get_license_notice();

        // Secret key.
        $output->secret = $authentication->get_secret_key($USER->id);

        if ($learnercourseactivities->can_edit_report_capability('learnercourseactivities')) {
            $output->canedit = true;
            $output->capdata = [
                'contextid' => context_system::instance()->id,
                'reportname' => 'learnercourseactivities'
            ];
        }

        // Active course.
        $activecourse = optional_param('course', 0, PARAM_INT);

        // Active learner.
        $activelearner = optional_param('learner', 0, PARAM_INT);

        // Course to show on grade page.
        $filter = $learnercourseactivities->get_filter($activecourse, $activelearner);
        $output->coursecats = $filter['coursecategories'];
        $output->students = $filter['students'];
        $output->sections = $filter['sections'];
        $output->modules = $filter['modules'];

        // Header navigation.
        $output->pageheader = get_string("learnercourseactivities", "local_edwiserreports");
        $output->navigation = navigation::instance()->get_navigation('learners');
        $output->breadcrumb = $learnercourseactivities->get_breadcrumb();
        $output->calendar = file_get_contents($CFG->dirroot . '/local/edwiserreports/pix/calendar.svg');
        $output->showcompletiondatefilter = true;
        $output->showdaterange = true;

        // Table filter context.
        $output->searchicon = \local_edwiserreports\utility::image_icon('actions/search');
        $output->placeholder = get_string('searchactivity', 'local_edwiserreports');
        $output->length = [10, 25, 50, 100];

        // Add export icons to export array.
        $output->export = array(
            "id" => "learnercourseactivities",
            "region" => "report",
            "downloadlinks" => $learnercourseactivities->bb->get_block_download_options(),
            "downloadurl" => $CFG->wwwroot . "/local/edwiserreports/download.php",
            "filter" => json_encode([
                "course" => $filter['activecourse'],
                "learner" => $filter['activelearner'],
                "section" => 0,
                "module" => "all",
                "completion" => "all",
                "dir" => ''
            ])
        );

        if ($CFG->branch > 311) {
            $output->setactive = true;
            $output->activeurl = new moodle_url("/local/edwiserreports/index.php");
        }

        $filters = new stdClass();
        $filters->course = $filter['activecourse'];
        $filters->learner = $filter['activelearner'];
        $output->summarycard = $learnercourseactivities->get_summary_data($filters);

        return $output;
    }
}

/**
 * All courses summary renderables.
 */
class allcoursessummary_renderable implements renderable, templatable {
    /**
     * Function to export the renderer data in a format that is suitable for a
     * edit mustache template.
     *
     * @param renderer_base $output Used to do a final render of any components that need to be rendered for export.
     * @return stdClass|array
     */
    public function export_for_template(renderer_base $output) {
        global $CFG, $USER;

        $allcoursessummary = new \local_edwiserreports\reports\allcoursessummary();
        $authentication = new authentication();
        $output = new stdClass();

        if ($allcoursessummary->can_edit_report_capability('allcoursessummary')) {
            $output->canedit = true;
            $output->capdata = [
                'contextid' => context_system::instance()->id,
                'reportname' => 'allcoursessummary'
            ];
        }

        // Show license notice.
        $output->notice = (new license())->get_license_notice();

        // Secret key.
        $output->secret = $authentication->get_secret_key($USER->id);

        // Add export icons to export array.
        $output->export = array(
            "id" => "allcoursessummary",
            "region" => "report",
            "downloadlinks" => $allcoursessummary->bb->get_block_download_options(),
            "downloadurl" => $CFG->wwwroot . "/local/edwiserreports/download.php",
            "filter" => json_encode([
                "cohort" => 0,
                "group" => 0,
                "exclude" => [],
                "enrolment" => 'all',
                "dir" => ''
            ])
        );

        // Header navigation.
        $output->navigation = navigation::instance()->get_navigation('course');
        $output->showdaterange = true;
        $output->showdatefilter = true;

        $output->pageheader = get_string("allcoursessummary", "local_edwiserreports");
        $output->breadcrumb = $allcoursessummary->get_breadcrumb();
        $output->calendar = file_get_contents($CFG->dirroot . '/local/edwiserreports/pix/calendar.svg');
        $filters = $allcoursessummary->get_filter();

        // Cohort filter.
        if (isset($filters['cohorts'])) {
            $output->cohortfilters = $filters['cohorts'];
        }

        // Groups to show on grade page.
        if (isset($filters['groups'])) {
            $output->groups = $filters['groups'];
        }

        $output->searchicon = \local_edwiserreports\utility::image_icon('actions/search');
        $output->placeholder = get_string('searchcourse', 'local_edwiserreports');
        $output->length = [10, 25, 50, 100];
        if ($CFG->branch > 311) {
            $output->setactive = true;
            $output->activeurl = new moodle_url("/local/edwiserreports/index.php");
        }


        return $output;
    }
}

/**
 * Course Activity Completion page renderables.
 */
class courseactivitycompletion_renderable implements renderable, templatable {
    /**
     * Function to export the renderer data in a format that is suitable for a
     * edit mustache template.
     *
     * @param renderer_base $output Used to do a final render of any components that need to be rendered for export.
     * @return stdClass|array
     */
    public function export_for_template(renderer_base $output) {
        global $USER, $CFG;

        $courseactivitycompletion = new \local_edwiserreports\reports\courseactivitycompletion();
        $authentication = new authentication();
        $output = new stdClass();

        // Show license notice.
        $output->notice = (new license())->get_license_notice();

        // Secret key.
        $output->secret = $authentication->get_secret_key($USER->id);
        if ($courseactivitycompletion->can_edit_report_capability('courseactivitycompletion')) {
            $output->canedit = true;
            $output->capdata = [
                'contextid' => context_system::instance()->id,
                'reportname' => 'courseactivitycompletion'
            ];
        }

        // Selected Course.
        $activecourse = optional_param('course', 0, PARAM_INT);

        // Selected Module.
        $activecm = optional_param('cm', 0, PARAM_INT);

        // Course to show on grade page.
        $filter = $courseactivitycompletion->get_filter($activecourse, $activecm);
        $output->coursecats = $filter['coursecategories'];
        $output->cms = $filter['cms'];
        $output->groups = $filter['groups'];

        // Header navigation.
        $output->pageheader = get_string("courseactivitycompletion", "local_edwiserreports");
        $output->showdaterange = true;
        $output->showdatefilter = true;

        $output->navigation = navigation::instance()->get_navigation('course');
        $output->breadcrumb = $courseactivitycompletion->get_breadcrumb();
        $output->calendar = file_get_contents($CFG->dirroot . '/local/edwiserreports/pix/calendar.svg');


        // Table filter context.
        $output->searchicon = \local_edwiserreports\utility::image_icon('actions/search');
        $output->placeholder = get_string('searchuser', 'local_edwiserreports');
        $output->length = [10, 25, 50, 100];

        // Add export icons to export array.
        $output->export = array(
            "id" => "courseactivitycompletion",
            "region" => "report",
            "downloadlinks" => $courseactivitycompletion->bb->get_block_download_options(),
            "downloadurl" => $CFG->wwwroot . "/local/edwiserreports/download.php",
            "filter" => json_encode([
                "course" => $filter['activecourse'],
                "cm" => $filter['activecm'],
                "group" => 0,
                "enrolment" => "all",
                "dir" => ''
            ])
        );

        if ($CFG->branch > 311) {
            $output->setactive = true;
            $output->activeurl = new moodle_url("/local/edwiserreports/index.php");
        }


        $filters = new stdClass();
        $filters->course = $filter['activecourse'];
        $filters->cm = $filter['activecm'];
        $output->summarycard = $courseactivitycompletion->get_summary_data($filters);

        return $output;
    }
}
