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

defined('MOODLE_INTERNAL') || die();

require_once($CFG->dirroot . "/cohort/lib.php");
require_once($CFG->dirroot . "/local/edwiserreports/classes/constants.php");

/**
 * Get Export Link to export data from blocks and individual page
 * @param  string $url  Url prifix to get export link
 * @param  object $data Object for additional data
 * @return string       Moodle link detail
 */
function local_edwiserreports_get_block_exportlinks($url, $data) {
    $links = new stdClass();

    /* Course Progress Filter Id*/
    if (isset($data->firstcourseid)) {
        $cpfilter = $data->firstcourseid;
    } else {
        $cpfilter = false;
    }

    if (isset($data->firstlpid)) {
        $lpfilter = $data->firstlpid;
    } else {
        $lpfilter = false;
    }

    $region = "block";
    $links->blockactiveusers = local_edwiserreports_get_exportlinks($url, $region, "activeusers", "weekly");
    $links->blockactivecourses = local_edwiserreports_get_exportlinks($url, $region, "activecourses");
    $links->blockcourseprogress = local_edwiserreports_get_exportlinks($url, $region, "courseprogress", $cpfilter);
    $links->blockcertificates = local_edwiserreports_get_exportlinks($url, $region, "certificates");
    $links->blockinactiveusers = local_edwiserreports_get_exportlinks(
        $url,
        $region,
        "inactiveusers",
        "never",
        false,
        false,
        "mt-20"
    );
    return $links;
}

/**
 * Get Export Link to export link array
 * @param  string $url         Url url for export link
 * @param  string $region      Region for export
 * @param  string $blockname   Block to export
 * @param  string $filter      Filter for data to export
 * @param  int    $cohortid    Cohort id
 * @param  string $action      Action of a page report
 * @param  string $customclass Custom class
 * @return array               Array of export link
 */
function local_edwiserreports_get_exportlinks(
        $url,
        $region,
        $blockname,
        $filter = false,
        $cohortid = false,
        $action = false,
        $customclass = ''
    ) {
    $params = array(
        "region" => $region,
        "blockname" => $blockname
    );

    if ($action !== false) {
        $params["action"] = $action;
    }

    if ($filter !== false) {
        $params["filter"] = $filter;
    }

    if ($cohortid !== false) {
        $params["cohortid"] = $cohortid;
    }

    $out = new stdClass();
    $out->export = local_edwiserreports_get_exportlink_array($url, $blockname, $params, $region);
    $out->customclass = $customclass;
    return $out;
}

/**
 * Get Export Link to export link array
 * @param  string $url       Url for export link
 * @param  string $blockname Block to export
 * @param  array  $params    Prameters for link
 * @param  string $region    Block region
 * @return array             Array of export link
 */
function local_edwiserreports_get_exportlink_array($url, $blockname, $params, $region) {
    $context = context_system::instance();

    return array(
        array(
            "name" => get_string("csv", "local_edwiserreports"),
            "icon" => "file-o",
            "link" => (new moodle_url($url, array_merge(array("format" => "csv"), $params)))->out(),
            "action" => 'csv',
            "blockname" => $blockname,
            "region" => $region,
            "contextid" => $context->id
        ),
        array(
            "name" => get_string("excel", "local_edwiserreports"),
            "icon" => "file-excel-o",
            "link" => (new moodle_url($url, array_merge(array("format" => "excel"), $params)))->out(),
            "action" => 'excel',
            "blockname" => $blockname,
            "region" => $region,
            "contextid" => $context->id
        ),
        array(
            "name" => get_string("pdf", "local_edwiserreports"),
            "icon" => "file-pdf-o",
            "link" => (new moodle_url($url, array_merge(array("format" => "pdf"), $params)))->out(),
            "action" => 'pdf',
            "blockname" => $blockname,
            "region" => $region,
            "contextid" => $context->id
        ),
        array(
            "name" => get_string("email", "local_edwiserreports"),
            "icon" => "envelope-o",
            "link" => (new moodle_url($url, array_merge(array("format" => "email"), $params)))->out(),
            "action" => 'email',
            "blockname" => $blockname,
            "region" => $region,
            "contextid" => $context->id
        ),
        array(
            "name" => get_string("emailscheduled", "local_edwiserreports"),
            "icon" => "envelope-o",
            "link" => (new moodle_url($url, array_merge(array("format" => "emailscheduled"), $params)))->out(),
            "action" => 'emailscheduled',
            "blockname" => $blockname,
            "region" => $region,
            "contextid" => $context->id,
            "sesskey" => sesskey()
        )
    );
}

/**
 * Get Users Filter for filer the data
 * @param  bool  $customfields  Custom Fields
 * @param  bool  $cohortfilter  Cohort Filters
 * @param  bool  $rangeselector Range Selector
 * @return array                Array of filters
 */
function local_edwiserreports_get_userfilters($customfields, $cohortfilter, $rangeselector) {
    $userfilters = new stdClass();

    if ($cohortfilter) {
        $userfilters->cohortfilter = local_edwiserreports_get_cohort_filter();
    }

    if ($rangeselector) {
        $userfilters->rangeselector = true;
    }

    return $userfilters;
}

/**
 * Get Cohort filter Filter for filer the data
 * @return object Array of Cohort filters
 */
function local_edwiserreports_get_cohort_filter() {
    global $DB, $USER;

    // Fetch all cohorts
    // passing 0,0 -> page_number, number of record, 0 means.
    $allcohorts = cohort_get_all_cohorts(0, 0);

    $usercontext = context_user::instance($USER->id);

    $cohorts = [];

    // Users visibility check.
    foreach ($allcohorts['cohorts'] as $key => $value) {
        if (cohort_can_view_cohort($key, $usercontext)) {
            $cohorts[$value->id] = $value;
            $cohorts[$value->id]->name = format_string($value->name, true, ['context' => \context_system::instance()]);
        }
    }

    if (empty($cohorts)) {
        // Returning false if no cohorts are present.
        return false;
    }

    $cohortfilter = new stdClass();
    $cohortfilter->values = array_merge([['id' => 0, 'name' => get_string('allcohorts', 'local_edwiserreports')]], $cohorts);
    return $cohortfilter;
}

/**
 * If the moodle has plugin then return true
 * @param  string  $plugintype Plugin Type
 * @param  string  $pluginname Plugin Name
 * @return boolean             True|False based on plugin exist
 */
function local_edwiserreports_has_plugin($plugintype, $pluginname) {
    $plugins = core_plugin_manager::instance()->get_plugins_of_type($plugintype);

    return array_key_exists($pluginname, $plugins);
}

/**
 * Create mange icons to manage email list
 *
 * @param  int     $id        Unique email id
 * @param  string  $blockname Block name
 * @param  string  $region    Region of email
 * @param  bool    $enable    True to enable email
 * @return string             Html manage icon strin
 */
function local_edwiserreports_create_manage_icons_for_emaillist($id, $blockname, $region, $enable) {
    $manage = html_writer::start_span("row esr-manage-scheduled-emails m-0 p-0 justify-content-center");
    $manage .= local_edwiserreports_create_toggle_switch_for_emails(
        $id,
        $enable,
        $blockname,
        $region
    );
    $manage .= html_writer::link('javascript:void(0)',
        '<span class="edit-svg">' . \local_edwiserreports\utility::image_icon('actions/edit') . '</span>',
        array(
            "class" => "esr-email-sched-edit mx-3",
            "data-blockname" => $blockname,
            "data-region" => $region,
            "data-id" => $id,
            "data-sesskey" => sesskey(),
            "data-toggle" => "tooltip",
            "title" => get_string('edit', 'local_edwiserreports')
        )
    );
    $manage .= html_writer::link('javascript:void(0)',
        '<span class="delete-svg">' . \local_edwiserreports\utility::image_icon('actions/delete') . '</span>',
        array(
            "class" => "esr-email-sched-delete mx-3",
            "data-blockname" => $blockname,
            "data-region" => $region,
            "data-id" => $id,
            "data-sesskey" => sesskey(),
            "data-toggle" => "tooltip",
            "title" => get_string('delete', 'local_edwiserreports')
        )
    );

    return $manage;
}

/**
 * Create toggle switch to enable disable emails
 *
 * @param  int     $id          Unique id
 * @param  bool    $emailenable True to enable email
 * @param  string  $blockname   Block to schedule email
 * @param  string  $region      Region for email
 * @param  string  $customclass Custom class to show for toggle
 * @return string               Html string for toggle switch
 */
function local_edwiserreports_create_toggle_switch_for_emails($id, $emailenable, $blockname, $region, $customclass = '') {
    $toggleid = "esr-toggle-" . $blockname . "-" . $region . "-" . $id;
    $switchparams = array(
        "id" => $toggleid,
        "href" => "#",
        "data-id" => $id,
        "class" => "mx-3 esr-email-toggle esr-switch",
        "data-sesskey" => sesskey(),
        "data-blockname" => $blockname,
        "data-region" => $region,
        "data-value" => $emailenable,
        "tooltip" => get_string('enabledisableemail', 'local_edwiserreports')
    );

    // Toggle Switch For Enable and Disable Start.
    $out = html_writer::tag(
        'a',
        '
        <span class="show-svg">' . \local_edwiserreports\utility::image_icon('actions/show') . '</span>
        <span class="hide-svg">' . \local_edwiserreports\utility::image_icon('actions/hide') . '</span>
        ',
        $switchparams
    );
    // Toggle Switch For Enable and Disable End.
    return $out;
}

/**
 * Get email schedule duration time
 * @param  int $duration Duration
 * @param  int $time     Time
 * @return int           Run time
 */
function local_edwiserreports_get_email_schedule_next_run($duration, $time) {
    $timenow = time();
    $frequency = '';
    // According to duation and time calculate the next scheduled time.
    switch($duration) {
        case LOCAL_SITEREPORT_ESR_LOCAL_SITEREPORT_WEEKLY_EMAIL:
            $day = get_string("week_" . $time, "local_edwiserreports");
            $weekstr = 'next ' . $day;

            // Calculate time.
            $schedtime = strtotime($weekstr);
            $frequency = get_string("everyweeks", "local_edwiserreports", array("day" => $day));
            break;
        case LOCAL_SITEREPORT_ESR_LOCAL_SITEREPORT_MONTHLY_EMAIL:
            // Get last date of the month.
            $lastdate = date("d", strtotime('last day of this month'));
            $day = $time;

            // If it is greater then then assign as time.
            if ($time > (int) $lastdate) {
                $time = (int) $lastdate;
            }

            // Get month string.
            $monthstr = date($time . ' M Y', $timenow);

            // Calculate time.
            $schedtime = strtotime($monthstr);
            $frequency = get_string("everymonths", "local_edwiserreports", array("time" => $day));

            // If time has passed the add one month.
            if ($timenow > $schedtime) {
                $schedtime = $schedtime + LOCAL_SITEREPORT_ONEMONTH;
            }
            break;

        default: // Default daily emails.
            $dailystr = date("d M Y", $timenow);

            // Calculate time.
            $schedtime = strtotime($dailystr) + $time * 60 * 60;

            if ($time < 10) {
                $day = get_string("time0".$time, "local_edwiserreports");
            } else {
                $day = get_string("time".$time, "local_edwiserreports");
            }

            // Get frequency string.
            $frequency = get_string("everydays", "local_edwiserreports", array("time" => $day));

            // If scheduledtime has been passed then add one day.
            if ($timenow > $schedtime) {
                $schedtime = $schedtime + LOCAL_SITEREPORT_ONEDAY;
            }
    }

    // Return scheduled time.
    return array($frequency, $schedtime);
}

/**
 * Prepare export filename
 * @param  array  $params Params to prepare filename
 * @return string Filename
 */
function local_edwiserreports_prepare_export_filename($params) {
    if (isset($params['filter'])) {
        $filter = $params['filter'];
        $filter = json_decode($filter, true);
        if (is_array($filter)) {
            $filtered = [];
            foreach ($filter as $key => $value) {
                if (is_array($value)) {
                    $value = implode(';', $value);
                }
                if (empty($value)) {
                    continue;
                }
                $filtered[] = $key . '-' . $value;
            }
            $filter = implode(',', $filtered);
            $params['filter'] = $filter;
        }
    }

    return implode("_", $params);
}

/**
 * Get required strings for js
 */
function local_edwiserreports_get_required_strings_for_js() {
    global $PAGE, $USER;

    $stringman = get_string_manager();
    $strings = $stringman->load_component_strings('local_edwiserreports', 'en');
    $PAGE->requires->strings_for_js(array_keys($strings), 'local_edwiserreports');

    // Require string from role component.
    $str = array(
        'inherit',
        'allow',
        'prevent',
        'prohibit'
    );
    $PAGE->requires->strings_for_js($str, 'role');

    // Require string from role component.
    $str = array(
        'loading',
        'next',
        'previous',
        'yes',
        'no'
    );
    $PAGE->requires->strings_for_js($str, 'moodle');

    // Require string for column data.
    $str = [
        "notyetstarted",
        "completed",
        "inprogress"
    ];
    $PAGE->requires->strings_for_js($str, 'core_completion');
}

/**
 * Reset Site Report Page to default
 */
function reset_edwiserreports_page_default() {
    global $CFG, $DB, $USER;
    $blocks = \local_edwiserreports\utility::get_reports_block();

    foreach ($blocks as $block) {
        $prefname = 'pref_' . $block->classname;
        $DB->delete_records('user_preferences', array('userid' => $USER->id, 'name' => $prefname));
        unset($USER->preference[$prefname]);
    }

    $customreports = $DB->get_records('edwreports_custom_reports');
    foreach ($customreports as $block) {
        $prefname = 'pref_customreportsblock-' . $block->id;
        $DB->delete_records('user_preferences', array('userid' => $USER->id, 'name' => $prefname));
        unset($USER->preference[$prefname]);
    }

    redirect($CFG->wwwroot . '/local/edwiserreports/index.php');
}

/**
 * Check if any of the blocks are present in reports dashboard.
 */
function is_block_present_indashboard() {
    // Check if any of the block is present.
    $hasblock = false;
    $blocks = \local_edwiserreports\utility::get_reports_block();
    foreach ($blocks as $key => $block) {
        if ($block->classname == 'customreportsblock') {
            if (can_view_block('customreportsroleallow-' . $block->id)) {
                $hasblock = true;
            }
        } else {
            $capname = 'report/edwiserreports_' . $block->classname . ':view';
            if (has_capability($capname, context_system::instance()) ||
                can_view_block($capname)) {
                $hasblock = true;
                continue;
            }
        }
    }

    return $hasblock;
}

/**
 * Check if user has course level role in the system
 * @param  [int]     $userid        Users Id
 * @param  [string]  $roleshortname Role Short Name
 * @return [boolean]                Status
 */
function has_user_role($userid, $roleshortname) {
    global $DB;

    $roleid = $DB->get_field('role', 'id', array('shortname' => $roleshortname));
    return $DB->record_exists('role_assignments', ['userid' => $userid, 'roleid' => $roleid]);
}

/**
 * Function to get the users role in any courses
 * @param string $capname Capability name
 * @param int    $userid  User id
 */
function can_view_block($capname, $userid = null) {
    global $DB, $USER;
    if ($userid == null) {
        $userid = $USER->id;
    }

    if (strpos($capname, 'customreportsroleallow') !== false) {
        $configstr = get_config('local_edwiserreports', $capname);

        if ($configstr) {
            $roleids = explode(',', $configstr);
            list($insql, $inparams) = $DB->get_in_or_equal($roleids, SQL_PARAMS_NAMED);
            $sql = 'SELECT * FROM {role} WHERE id ' . $insql;
            $allowedrole = $DB->get_records_sql($sql, $inparams);
        } else {
            // $allowedarchetype = array('mamnager', 'coursecreator', 'teacher', 'editingteacher');
            // $allowedarchetype = array();
            // list($insql, $inparams) = $DB->get_in_or_equal($allowedarchetype, SQL_PARAMS_NAMED);
            // $sql = 'SELECT * FROM {role} WHERE archetype ' . $insql;
            // $allowedrole = $DB->get_records_sql($sql, $inparams);
            $allowedrole = array();
        }

    } else {

        $allowedrole = get_roles_with_capability($capname, CAP_ALLOW);
    }

    foreach ($allowedrole as $role) {
        if (has_user_role($userid, $role->shortname)) {
            return true;
        }
    }



    return false;
}

/**
 * Checking whether current user can edit capability of block.
 * @param String $capname Capability name
 */
function can_edit_capability($capname) {
    global $USER;

    if (is_siteadmin($USER)) {
        return true;
    }

    $allowedrole = get_roles_with_capability($capname, CAP_ALLOW);

    foreach ($allowedrole as $role) {
        if (has_user_role($USER->id, $role->shortname)) {
            return true;
        }
    }

    return false;
}
