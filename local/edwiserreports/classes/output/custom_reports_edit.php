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
 * @copyright   2020 wisdmlabs <support@wisdmlabs.com>
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace local_edwiserreports\output;

use local_edwiserreports\controller\navigation;
use local_edwiserreports\controller\license;
use context_coursecat;
use renderer_base;
use templatable;
use renderable;
use moodle_url;
use stdClass;

/**
 * Edit page for custom reports.
 */
class custom_reports_edit implements renderable, templatable {
    /**
     * Constructor to create custom reports edit page
     * @param Integer $reportsid Reports ID
     */
    public function __construct($reportsid = 0) {
        $this->reportsid = $reportsid;
    }

    /**
     * Function to export the renderer data in a format that is suitable for a
     * edit mustache template.
     *
     * @param renderer_base $output Used to do a final render of any components that need to be rendered for export.
     * @return stdClass|array
     */
    public function export_for_template(renderer_base $output) {
        global $DB, $CFG;

        require_once($CFG->dirroot . "/cohort/lib.php");

        $output = new stdClass();

        // Show license notice.
        $output->notice = (new license())->get_license_notice();

        $selectedfield = array();
        $selectedcourses = array("0");
        $selectedcohorts = array("0");
        if ($output->reportsid = $this->reportsid) {
            $customreport = $DB->get_record('edwreports_custom_reports', array('id' => $this->reportsid));
            $output->fullname = $customreport->fullname;
            $output->shortname = $customreport->shortname;
            $reportsdata = json_decode($customreport->data);
            $output->downloadenable = $reportsdata->downloadenable ? true : false;
            $output->enabledesktop = $customreport->enabledesktop ? true : false;
            $selectedfield = $reportsdata->selectedfield;
            $selectedcourses = $reportsdata->courses;
            $selectedcohorts = $reportsdata->cohorts;
        }

        $cohortobj = cohort_get_all_cohorts(0, 0);
        $cohorts = $cohortobj['cohorts'];
        $categories = $DB->get_records('course_categories', null, 'id');
        foreach ($categories as $category) {
            $catcontext = context_coursecat::instance($category->id);
            $cohortobj = cohort_get_cohorts($catcontext->id);
            $cohorts = array_merge($cohorts, $cohortobj["cohorts"]);
        }

        $tempcohorts = [];
        foreach ($cohorts as $cohort) {
            $tempcohort = $cohort;
            $tempcohort->name = format_string($cohort->name, true, ['context' => \context_system::instance()]);
            $tempcohorts[] = $tempcohort;
        }

        $cohorts = $tempcohorts;
        $output->cohorts = $cohorts;
        $output->isediting = $this->reportsid ? true : false;
        $url = '/local/edwiserreports/customreportedit.php';
        $output->createnewlink = new moodle_url($url, array('create' => true));

        // Select courses and cohorts.
        $courses = get_courses();
        $output->selectedcourses = json_encode($selectedcourses);
        $output->selectedcohorts = json_encode($selectedcohorts);
        
        $tempcourses = [];
        foreach ($courses as $course) {
            $tempcourses[$course->id] = $course;
            $tempcourses[$course->id]->fullname = format_string($course->fullname, true, ['context' => \context_system::instance()]);
        }

        $courses = $tempcourses;

        // Remove system course.
        unset($courses[1]);
        $output->courses = array_values($courses);
        $output->fields = array(
            array (
                'label' => get_string('selectuserfields', 'local_edwiserreports'),
                'key' => 'user',
                'fieldsarray' => $this->get_custom_report_user_fields($selectedfield)
            ),
            array (
                'label' => get_string('selectcoursefields', 'local_edwiserreports'),
                'key' => 'course',
                'fieldsarray' => $this->get_custom_report_course_fields($selectedfield)
            )
        );

        $output->searchicon = \local_edwiserreports\utility::image_icon('actions/search');
        $output->placeholder = get_string('searchreports', 'local_edwiserreports');

        // Page header.
        $output->pageheader = get_string("customreportedit", "local_edwiserreports");

        $output->length = [10, 25, 50, 100];
        if ($CFG->branch > 311) {
            $output->setactive = true;
            $output->activeurl = new moodle_url($CFG->wwwroot . "/local/edwiserreports/index.php");
        }

        // Header navigation.
        $output->navigation = navigation::instance()->get_navigation('custom');
        return $output;
    }

    /**
     * Adding custom user profile fields to userfields array.
     *
     * @param array $selectedfield  Selected fields list
     * @param array $userfields     User fields list
     *
     * @return array                User fields list with custom profile fields.
     */
    public function get_custom_report_custom_user_fields($selectedfield, $userfields) {
        global $DB, $CFG;

        $rtl = get_string('thisdirection', 'langconfig') == 'rtl' ? 1: 0;

        // Social labels.
        $socialstringplugin = $CFG->branch < 311 ? 'moodle' : 'profilefield_social';
        $social = [
            'icq' => get_string('icqnumber', $socialstringplugin),
            'msn' => get_string('msnid', $socialstringplugin),
            'aim' => get_string('aimid', $socialstringplugin),
            'yahoo' => get_string('yahooid', $socialstringplugin),
            'skype' => get_string('skypeid', $socialstringplugin),
            'url' => get_string('webpage', $socialstringplugin),
        ];

        $customfields = $DB->get_records_sql(
            "SELECT *
               FROM {user_info_field}
              WHERE visible > 1
              ORDER BY sortorder");
        foreach ($customfields as $id => $field) {
            $fieldid = $field->shortname . '_' . $id;
            $name = '';
            $fielddata = [
                'id' => $fieldid,
                'tableid' => $id,
                'dbkey' => 'cust' . $id . '.data',
                'custom' => true,
                'selected' => in_array($fieldid, $selectedfield),
                'resultfunc' => function($value) {
                    return $value != '' ? $value : '-';
                }
            ];
            $skip = false;
            switch ($field->datatype) {
                case 'text':
                    if ($field->param3 == 1) {
                        $skip = true;
                    }
                    $name = $field->name;
                    break;
                case 'datetime':
                    $name = $field->name;
                    if ($field->param3 == '1') {
                        $fielddata['resultfunc'] = function($value) {
                            $rtl = get_string('thisdirection', 'langconfig') == 'rtl' ? 1: 0;

                            return $value ? ($rtl ? date('A i:g Y M d', $value) : date('d M Y g:i A', $value)) : '-';
                        };
                    } else {
                        $fielddata['resultfunc'] = function($value) {
                            $rtl = get_string('thisdirection', 'langconfig') == 'rtl' ? 1: 0;

                            return $value ? ($rtl ? date('Y M d', $value) : date('d M Y', $value)) : '-';
                        };
                    }
                    break;
                case 'social':
                    $name = $social[$field->param1];
                    break;
                case 'menu':
                    $name = $field->name;
                    break;
                case 'checkbox':
                    $name = $field->name;
                    $fielddata['resultfunc'] = function($value) {
                        if ($value == '') {
                            return '-';
                        }
                        return $value == '1' ? get_string('yes', 'moodle') : get_string('no', 'moodle');
                    };
                    break;
                default:
                    $skip = true;
                    break;
            }
            if ($skip) {
                continue;
            }
            $fielddata['text'] = format_string($name, true, ['context' => \context_system::instance()]) . ' (' . get_string('custom', 'local_edwiserreports') . ')';
            $userfields[] = $fielddata;
        }
        return $userfields;
    }

    /**
     * Get custom reports users fields
     * @param  Array $selectedfield Selected report fields
     * @return Array                Users Field for custom reports
     */
    public function get_custom_report_user_fields($selectedfield = array()) {
        global $DB, $CFG;
        $userfields = array(
            array(
                'id' => 'username',
                'text' => get_string('username', 'local_edwiserreports'),
                'dbkey' => 'u.username',
                'disbaled' => true,
                'selected' => in_array('username', $selectedfield)
            ),
            array(
                'id' => 'email',
                'text' => get_string('useremail', 'local_edwiserreports'),
                'dbkey' => 'u.email',
                'selected' => in_array('email', $selectedfield)
            ),
            array(
                'id' => 'firstname',
                'text' => get_string('firstname', 'local_edwiserreports'),
                'dbkey' => 'u.firstname',
                'selected' => in_array('firstname', $selectedfield)
            ),
            array(
                'id' => 'lastname',
                'text' => get_string('lastname', 'local_edwiserreports'),
                'dbkey' => 'u.lastname',
                'selected' => in_array('lastname', $selectedfield)
            ),
            array(
                'id' => 'timespentonsite',
                'text' => get_string('timespentonsite', 'local_edwiserreports'),
                'dbkey' => 'utime.timespent',
                'selected' => in_array('timespentonsite', $selectedfield),
                'resultfunc' => function($seconds, $rtl) {
                    if (empty($seconds)) {
                        return '-';
                    }
                    $h = floor($seconds / 3600);
                    $i = ($seconds / 60) % 60;
                    $s = $seconds % 60;
                    return $rtl ? sprintf("%02d:%02d:%02d", $s, $i, $h) : sprintf("%02d:%02d:%02d", $h, $i, $s);
                }
            )
        );

        // Adding cutom profile fields.
        $userfields = $this->get_custom_report_custom_user_fields($selectedfield, $userfields);

        return $userfields;
    }

    /**
     * Get custom reports course fields
     * @param  Array $selectedfield Selected report fields
     * @return Array                Course Field for custom reports
     */
    public function get_custom_report_course_fields($selectedfield = array()) {
        $coursefields = array(
            array(
                'id' => 'coursename',
                'text' => get_string('coursename', 'local_edwiserreports'),
                'dbkey' => 'c.fullname',
                'disbaled' => true,
                'selected' => in_array('coursename', $selectedfield)
            ),
            array(
                'id' => 'coursecategory',
                'text' => get_string('coursecategory', 'local_edwiserreports'),
                'dbkey' => 'ctg.name',
                'selected' => in_array('coursecategory', $selectedfield)
            ),
            array(
                'id' => 'courseenroldate',
                'text' => get_string('courseenroldate', 'local_edwiserreports'),
                'dbkey' => 'ra.timemodified',
                'selected' => in_array('courseenroldate', $selectedfield),
                'resultfunc' => function($value, $rtl) {
                    return $value ? ($rtl ? '<div style="direction:ltr">' . date('Y M d', $value) .'</div>' : date('d M Y', $value)) : get_string('na', 'local_edwiserreports');
                }
            ),
            array(
                'id' => 'courseprogress',
                'text' => get_string('courseprogress', 'local_edwiserreports'),
                'dbkey' => 'ec.progress',
                'selected' => in_array('courseprogress', $selectedfield),
                'resultfunc' => function($value) {
                    return $value . '%';
                }
            ),
            array(
                'id' => 'completionstatus',
                'text' => get_string('coursecompletionstatus', 'local_edwiserreports'),
                'dbkey' => 'ec.progress',
                'selected' => in_array('completionstatus', $selectedfield),
                'resultfunc' => function($value) {
                    $ret = get_string('inprogress', 'local_edwiserreports');
                    if ($value == 100) {
                        $ret = get_string('completed', 'local_edwiserreports');
                    }
                    return $ret;
                }
            ),
            array(
                'id' => 'activitiescompleted',
                'text' => get_string('activitiescompleted', 'local_edwiserreports'),
                'dbkey' => 'ec.totalmodules',
                'selected' => in_array('activitiescompleted', $selectedfield)
            ),
            array(
                'id' => 'totalactivities',
                'text' => get_string('totalactivities', 'local_edwiserreports'),
                'dbkey' => 'ec.completablemods',
                'selected' => in_array('totalactivities', $selectedfield)
            ),
            array(
                'id' => 'completiontime',
                'text' => get_string('completiontime', 'local_edwiserreports'),
                'dbkey' => 'ec.completiontime',
                'selected' => in_array('completiontime', $selectedfield),
                'resultfunc' => function($value, $rtl) {
                    return $value ? ( $rtl ? '<div style="direction:ltr">' . date('Y M d', $value) . '</div>' : date('d M Y', $value)) : get_string('na', 'local_edwiserreports');
                }
            ),
            array(
                'id' => 'timespentoncourse',
                'text' => get_string('timespentoncourse', 'local_edwiserreports'),
                'dbkey' => 'ctime.timespent',
                'selected' => in_array('timespentoncourse', $selectedfield),
                'resultfunc' => function($seconds, $rtl) {
                    if (empty($seconds)) {
                        return '-';
                    }
                    $h = floor($seconds / 3600);
                    $i = ($seconds / 60) % 60;
                    $s = $seconds % 60;
                    return $rtl ? sprintf("%02d:%02d:%02d", $s, $i, $h) : sprintf("%02d:%02d:%02d", $h, $i, $s);
                }
            ),
            array(
                'id' => 'coursestartdate',
                'text' => get_string('coursestartdate', 'local_edwiserreports'),
                'dbkey' => 'c.startdate',
                'selected' => in_array('coursestartdate', $selectedfield),
                'resultfunc' => function($value, $rtl) {
                    return $value ? ($rtl ? '<div style="direction:ltr">' . date('Y M d', $value) . '</div>' : date('d M Y', $value)) : get_string('na', 'local_edwiserreports');
                }
            ),
            array(
                'id' => 'courseenddate',
                'text' => get_string('courseenddate', 'local_edwiserreports'),
                'dbkey' => 'c.enddate',
                'selected' => in_array('courseenddate', $selectedfield),
                'resultfunc' => function($value, $rtl) {
                    return $value ? ($rtl ? '<div style="direction:ltr">' .  date('Y M d', $value) . '</div>' : date('d M Y', $value)) : get_string('na', 'local_edwiserreports');
                }
            ),
            array(
                'id' => 'courseformat',
                'text' => get_string('courseformat', 'local_edwiserreports'),
                'dbkey' => 'cfo.format',
                'selected' => in_array('courseformat', $selectedfield),
                'resultfunc' => function($value) {
                    $na = get_string('na', 'local_edwiserreports');
                    if ($value == null) {
                        return $na;
                    }
                    $string = get_string('pluginname', 'format_' . $value);
                    if ($string == "[[pluginname]]") {
                        return $na;
                    }
                    return $string;
                }
            ),
            array(
                'id' => 'completionenable',
                'text' => get_string('completionenable', 'local_edwiserreports'),
                'dbkey' => 'ec.criteria',
                'selected' => in_array('completionenable', $selectedfield),
                'resultfunc' => function($value) {
                    return $value ? get_string('yes', 'moodle') : get_string('no', 'moodle');
                }
            ),
            array(
                'id' => 'guestaccess',
                'text' => get_string('guestaccess', 'local_edwiserreports'),
                'dbkey' => 'e.enrol',
                'selected' => in_array('guestaccess', $selectedfield),
                'resultfunc' => function($value) {
                    return $value == 'guest' ? get_string('yes', 'moodle') : get_string('no', 'moodle');
                }
            )
        );
        return $coursefields;
    }
}
