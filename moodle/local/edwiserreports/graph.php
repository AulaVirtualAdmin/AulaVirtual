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
require_once('classes/output/renderable.php');

// Key to download graph image.
$download = required_param('download', PARAM_TEXT);

// Set system context.
$PAGE->set_context(context_system::instance());

// Set page url.
$PAGE->set_url(new moodle_url('/local/edwiserreports/graph.php', ['download' => $download]));

// Set page layout.
$PAGE->set_pagelayout('base');

$col = $DB->sql_compare_text('download');
$key = $DB->sql_compare_text(':download');

$sql = "SELECT * FROM {edwreports_graph_data} WHERE $col = $key";

$record = $DB->get_record_sql($sql, ['download' => $download]);
if (!$record) {
    throw new moodle_exception('inavalidkey', 'local_edwiserreports');
}

// Load all js files from externaljs folder.
foreach (scandir($CFG->dirroot . '/local/edwiserreports/externaljs/build/') as $file) {
    if (pathinfo($file, PATHINFO_EXTENSION) != 'js') {
        continue;
    }
    $PAGE->requires->js(new moodle_url('/local/edwiserreports/externaljs/build/' . $file));
}

local_edwiserreports_get_required_strings_for_js();

// Load color themes from constants.
local_edwiserreports\utility::load_color_pallets();

// Blockname.
$blockname = str_replace('block', '', $record->blockname);

// Format.
$format = optional_param('format', $record->format, PARAM_TEXT);

// Supported formats.
$formats = ['pdfimage', 'jpeg', 'png', 'svg'];
if (array_search($format, $formats) === false) {
    echo $OUTPUT->header();
    $context = [];
    foreach ($formats as $value) {
        $context[] = get_string('format' . $value, 'local_edwiserreports');
    }
    echo $OUTPUT->render_from_template('local_edwiserreports/unsupportedformat', [
        'format' => $format,
        'formats' => $context
    ]);
    throw new moodle_exception('unsupportedformat', 'local_edwiserreports');
}

// Handling pdf format.
if ($format == 'pdf') {
    $format = 'pdfimage';
}

// Filename.
$filename = $record->filename;

// Data.
$data = json_decode($record->data);

// Require JS for active users page.
$PAGE->requires->js_call_amd(
    "local_edwiserreports/main",
    'download',
    array($download, $blockname, $format, $filename)
);

// Add CSS for edwiserreports.
$PAGE->requires->css('/local/edwiserreports/styles/edwiserreports.min.css');

// Setting empty heading.
$PAGE->set_heading('');

// Setting page header.
$PAGE->set_title(get_string($blockname . "header", "local_edwiserreports"));

// Output header.
echo $OUTPUT->header();

$context = [];
switch ($blockname) {
    case 'courseprogress':
        $context['hascourses'] = isset($data->hascourses) ? $data->hascourses : count($DB->get_records('course')) > 0;
        break;
}

// Fillter to render graph.
echo "<div id='" . $blockname . "block' class='download-graph'>";
echo $OUTPUT->render_from_template('local_edwiserreports/blocks/' . $blockname . 'block', $context);
echo "</div>";

// Output footer.
echo $OUTPUT->footer();
