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

require_once("../../config.php");
require_once($CFG->libdir."/excellib.class.php");

// Filename.
$filename = required_param('filename', PARAM_TEXT);

// Data.
$data = required_param('data', PARAM_RAW);

// Set system context.
$PAGE->set_context(context_system::instance());

// Set page url.
$PAGE->set_url(new moodle_url('/local/edwiserreports/arraytoxlsx.php', ['filename' => $filename, 'data' => $data]));

// Set page layout.
$PAGE->set_pagelayout('popup');

$data = json_decode($data, true);

if (!$data) {
    throw new moodle_exception('jsondecodefailed', 'local_edwiserreports');
}

// Creating a workbook.
$workbook = new MoodleExcelWorkbook($filename);

// Adding the worksheet.
$sheet = $workbook->add_worksheet('Sheet 1');

foreach ($data as $rownum => $row) {
    foreach ($row as $colnum => $val) {
        $sheet->write_string($rownum, $colnum, $val);
    }
}

// Close the workbook.
$workbook->close();
