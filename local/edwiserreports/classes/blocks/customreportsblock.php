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
 * Reports abstract block will define here to which will extend for each repoers blocks
 *
 * @package     local_edwiserreports
 * @copyright   2019 wisdmlabs <support@wisdmlabs.com>
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace local_edwiserreports\blocks;

use local_edwiserreports\block_base;
use stdClass;
use local_edwiserreports\utility;

/**
 * Course progress block.
 */
class customreportsblock extends block_base {
    /**
     * Layout variable to prepare layout
     *
     * @var object
     */
    public $layout;

    /**
     * Get reports data for Course Progress block
     * @param  object $params Parameters
     * @return object         Response object
     */
    public function get_data($params = false) {
        global $DB;

        $fields = $params->fields;
        $courses = $params->courses;
        $cohorts = $params->cohorts;

        $filter = optional_param("filter", 0, PARAM_RAW);
        $filter = json_decode($filter);
        $rtl = isset($filter->dir) && $filter->dir == 'rtl' ? 1 : 0;
        $dir = get_string('thisdirection', 'langconfig');
        $rtl = $rtl ? $rtl : ($dir == 'rtl' ? 1 : 0);

        // Get selected fields in query format.
        list($customfields, $columns, $resultfunc, $join) = $this->create_query_fields($fields);

        // Filter courses acording to users courses

        // Check courses.
        $coursedb = '> 1';
        $params = array(
            'contextlevel' => CONTEXT_COURSE,
            'archetype' => 'student'
        );
        if (!in_array(0, $courses)) {
            list($coursedb, $inparams) = $DB->get_in_or_equal($courses, SQL_PARAMS_NAMED, 'course', true, true);
            $params = array_merge($params, $inparams);
        }

        // Check Cohorts.
        $cohortsjoin = '';
        if (!in_array(0, $cohorts)) {
            list($cohortsql, $inparams) = $DB->get_in_or_equal($cohorts, SQL_PARAMS_NAMED, 'cohort', true, true);
            $cohortsjoin = 'JOIN {cohort_members} cm ON cm.userid = u.id AND cm.cohortid ' . $cohortsql;
            $params = array_merge($params, $inparams);
        }

        $courseformatquery = '';
        $courseformatcond = '';
        if(strpos($customfields, 'courseformat') != false){
            $courseformatquery = 'JOIN {course_format_options} cfo ON c.id = cfo.courseid ';
            $courseformatcond = 'AND cfo.name = "coursedisplay"';
        }

        $courses = $this->get_courses_of_user();
        $coursetable = utility::create_temp_table('tmp_cp_f', array_keys($courses));

        // if(strpos($customfields, 'course') != false){
            $sql = "SELECT DISTINCT $customfields
                FROM {user} u
                $cohortsjoin
                JOIN {role_assignments} ra ON ra.userid = u.id
                JOIN {role} r ON r.id = ra.roleid
                JOIN {context} ct ON ct.id = ra.contextid
                JOIN {course} c ON c.id = ct.instanceid
                JOIN {{$coursetable}} cot ON cot.tempid = c.id
                JOIN {edwreports_course_progress} ec ON ec.courseid = c.id AND ec.userid = u.id AND c.id $coursedb
                JOIN {course_categories} ctg ON ctg.id = c.category
                $courseformatquery
                JOIN {enrol} e ON c.id = e.courseid AND e.status = 0
                $join
                WHERE u.id > 1
                AND ct.contextlevel = :contextlevel
                AND r.archetype = :archetype
                AND u.deleted = 0
                $courseformatcond ";
        

        $recordset = $DB->get_recordset_sql($sql, $params);

        $records = array();
        if ($recordset->valid()) {
            foreach ($recordset as $record) {


                if (!empty($resultfunc)) {
                    foreach ($resultfunc as $id => $func) {
                        $record->$id = $func($record->$id, $rtl);
                    }
                }

                if (!in_array($record, $records)) {
                    $dummyrecord = array();
                    foreach ($record as $fieldname => $fieldvalue) {
                        $dummyrecord[$fieldname] = format_string($fieldvalue, true, ['context' => \context_system::instance()]);
                    }
                    $records[] = $rtl ? array_reverse($dummyrecord) : $dummyrecord;
                }
            }
            // $record = $rtl ? array_reverse($recordset->current()) : $recordset->current();
            $recordset->next();
        }


        // Drop temp table.
        utility::drop_temp_table($coursetable);

        $return = new stdClass();
        $return->columns = $columns;
        $return->reportsdata = array_values($records);


        // Return response.
        return $return;
    }

    /**
     * Create Query Fields by Filters
     * @param  array $fields Filtered fields
     * @return array         Fields array
     */
    public function create_query_fields($fields) {
        // Get all the fields.
        $customreportsblock = new \local_edwiserreports\output\custom_reports_edit();
        $userfields = $customreportsblock->get_custom_report_user_fields();
        $coursefields = $customreportsblock->get_custom_report_course_fields();
        $allfields = array_merge($userfields, $coursefields);

        $join = '';

        // SQL subpart for timespent on site.
        if (in_array('timespentonsite', $fields)) {
            $join .= "
            LEFT JOIN (SELECT tsos.userid userid, SUM(tsos.timespent) timespent
                       FROM {edwreports_activity_log} tsos
                      WHERE tsos.course > 0
                      GROUP BY tsos.userid
            ) utime ON u.id = utime.userid";
        }

        // SQL subpart for timespent on course.
        if (in_array('timespentoncourse', $fields)) {
            $join .= "
            LEFT JOIN (SELECT tsoc.course course, tsoc.userid userid, SUM(tsoc.timespent) timespent
                         FROM {edwreports_activity_log} tsoc
                        WHERE tsoc.course > 1
                        GROUP BY tsoc.course, tsoc.userid
            ) ctime ON c.id = ctime.course AND u.id = ctime.userid";
        }

        // Sort fields according to selected fields.
        $columns = array();
        $resultfunc = array();
        $allfields = array_map(function($value) use ($fields, &$columns, &$join, &$resultfunc) {
            if (isset($value['custom']) && $value['custom'] == true) {
                $alias = "cust" . $value['tableid'];
                $join .= "
                LEFT JOIN {user_info_data} $alias ON u.id = $alias.userid AND $alias.fieldid = " . $value['tableid'];
            }
            if (in_array($value['id'], (array) $fields) ) {



                $col = new stdClass();
                $col->data = strtolower($value['id']);
                $col->title = $value['text'];
                if (isset($value["resultfunc"])) {
                    $resultfunc[strtolower($value['id'])] = $value['resultfunc'];
                }
                $columns[] = $col;
                return $value['dbkey'].' as '.$value['id'];
            }
            return false;
        }, $allfields);

        // Filter it and make a string.
        $allfields = array_filter($allfields);
        $allfields = implode(', ', $allfields);


        return array($allfields, $columns, $resultfunc, $join);
    }

    /**
     * Preapre layout for each block
     * @return object Response object
     */
    public function get_layout() {
        global $DB;

        $customreport = $DB->get_record('edwreports_custom_reports', array('id' => $this->blockid));
        $reportsdata = json_decode($customreport->data);
        $reportsdata->fields = $reportsdata->selectedfield;
        unset($reportsdata->selectedfield);

        // Layout related data.
        $this->layout->id = 'customreportsblock-' . $customreport->id;
        $this->layout->name = $customreport->fullname;
        $this->layout->info = $customreport->fullname;
        $this->layout->downloadlinks = $reportsdata->downloadenable ? $this->get_block_download_options() : false;
        $this->layout->iscustomblock = true;
        $this->layout->filters = $this->get_filters();

        $this->layout->blockview = $this->render_block('customreportblock', [
            'id' => $this->layout->id,
            'params' => json_encode($reportsdata)
        ]);

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
        return $OUTPUT->render_from_template('local_edwiserreports/common-table-search-filter', [
            'searchicon' => $this->image_icon('actions/search'),
            'placeholder' => get_string('searchall', 'local_edwiserreports')
        ]);
    }

    /**
     * Get exportable data block.
     * @param  Integer $reportsid Custom Reports Id
     * @param  bool   $filterdata If enabled then filter data
     * @return Array              Array of records
     */
    public function get_exportable_data_block($reportsid, $filterdata = true) {
        global $DB;

        $filter = optional_param("filter", 0, PARAM_RAW);
        $filter = json_decode($filter);
        $rtl = isset($filter->dir) && $filter->dir == 'rtl' ? 1 : 0;

        $customreport = $DB->get_record('edwreports_custom_reports', array('id' => $reportsid));
        $params = json_decode($customreport->data);
        $params->fields = $params->selectedfield;
        unset($params->selectedfield);

        $records = $this->get_data($params);
        $header = array_column($records->columns, 'title');
        $data = array_map(function($record) {
            return array_values((array) $record);
        }, $records->reportsdata);

        $header = $rtl ? array_reverse($header) : $header;

        $export = array_merge(array($header), $data);
        $count = count($header);
        if ($count > 5) {
            $export = (object) [
                'data' => $export,
                'options' => [
                    'orientation' => 'l',
                ]
            ];
            if ($count < 10) {
                $export->options['format'] = 'a3';
            } else if ($count < 13) {
                $export->options['format'] = 'a2';
            } else {
                $export->options['format'] = 'a1';
            }
        }
        return $export;
    }
}
