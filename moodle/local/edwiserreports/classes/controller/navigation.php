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
 * This class has methods for time tracking.
 *
 * @package     local_edwiserreports
 * @category    controller
 * @copyright   2022 wisdmlabs <support@wisdmlabs.com>
 * @author      Yogesh Shirsath
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace local_edwiserreports\controller;

use local_edwiserreports\utility;
use context_system;
use moodle_url;

class navigation {

    /**
     * Nodes list.
     *
     * @var array
     */
    public $nodes = [];

    /**
     * Instance variable.
     * @var navigation;
     */
    private static $instance = null;

    /**
     * Show link in navigation.
     *
     * @param string $id link id
     */
    public function show_link($id) {
        switch ($id) {
            case 'coursecompletion':
            case 'allcoursessummary':
            case 'courseactivitycompletion':
            case 'courseactivitiessummary':
                $this->nodes['course']['visible'] = true;
                $this->nodes['course']['nodes'][$id]['visible'] = true;
                break;
            case 'learnercourseprogress':
            case 'learnercourseactivities':
                $this->nodes['learners']['visible'] = true;
                $this->nodes['learners']['nodes'][$id]['visible'] = true;
                break;
            case 'courseactivitystatusblock':
            case 'visitsonsiteblock':
            case 'timespentonsiteblock':
            case 'timespentoncourseblock':
                $this->nodes['learners']['visible'] = true;
                $this->nodes['learners']['nodes']['alllearnersummary']['visible'] = true;
                break;
            case 'certificatesblock':
            case 'activeusersblock':
                $this->nodes['other']['visible'] = true;
                $this->nodes['other']['nodes'][$id]['visible'] = true;
                break;
        }
    }

    /**
     * Private constructor.
     */
    private function __construct() {
        global $CFG, $USER;
        $this->nodes = [
            'overview' => [
                'label' => get_string('overview', 'core_group'),
                'link' => new moodle_url('/local/edwiserreports/index.php'),
                'visible' => true
            ],
            'course' => [
                'label' => get_string('course'),
                'visible' => false,
                'nodes' => [
                    'allcoursessummary' => [
                        'label' => get_string('allcoursessummary', 'local_edwiserreports'),
                        'link' => new moodle_url("/local/edwiserreports/allcoursessummary.php"),
                        'visible' => false
                    ],
                    'courseactivitiessummary' => [
                        'label' => get_string('courseactivitiessummary', 'local_edwiserreports'),
                        'link' => new moodle_url("/local/edwiserreports/courseactivitiessummary.php"),
                        'visible' => false
                    ],
                    'courseactivitycompletion' => [
                        'label' => get_string('courseactivitycompletion', 'local_edwiserreports'),
                        'link' => new moodle_url("/local/edwiserreports/courseactivitycompletion.php"),
                        'visible' => false
                    ],
                    'coursecompletion' => [
                        'label' => get_string('coursecompletion', 'local_edwiserreports'),
                        'link' => new moodle_url("/local/edwiserreports/completion.php"),
                        'visible' => false
                    ]
                ]
            ],
            'learners' => [
                'label' => get_string('learners', 'local_edwiserreports'),
                'visible' => false,
                'class' => 'learner-dropdown',
                'nodes' => [
                    'alllearnersummary' => [
                        'label' => get_string('alllearnersummary', 'local_edwiserreports'),
                        'link' => new moodle_url($CFG->wwwroot . "/local/edwiserreports/studentengagement.php"),
                        'visible' => false
                    ],
                    'learnercourseprogress' => [
                        'label' => get_string('learnercourseprogress', 'local_edwiserreports'),
                        'link' => new moodle_url($CFG->wwwroot . "/local/edwiserreports/learnercourseprogress.php"),
                        'visible' => false
                    ],
                    'learnercourseactivities' => [
                        'label' => get_string('learnercourseactivities', 'local_edwiserreports'),
                        'link' => new moodle_url($CFG->wwwroot . "/local/edwiserreports/learnercourseactivities.php"),
                        'visible' => false
                    ]
                ]
            ],
            'custom' => [
                'label' => get_string('custom', 'local_edwiserreports'),
                'link' => new moodle_url('/local/edwiserreports/customreportedit.php'),
                'visible' => false,
            ],
            'other' => [
                'label' => get_string('other', 'moodle'),
                'visible' => false,
                'nodes' => [
                    'activeusersblock' => [
                        'label' => get_string('activeusersheader', 'local_edwiserreports'),
                        'link' => new moodle_url($CFG->wwwroot . "/local/edwiserreports/activeusers.php"),
                        'visible' => false
                    ],
                    'certificatesblock' => [
                        'label' => get_string('certificatestats', 'local_edwiserreports'),
                        'link' => new moodle_url($CFG->wwwroot . "/local/edwiserreports/certificates.php"),
                        'visible' => false
                    ]
                ]
            ]
        ];

        $blocks = utility::get_reports_block();
        $context = context_system::instance();

        // if (has_capability('report/edwiserreports_customreports:manage', $context)) {
        //     $this->nodes['custom']['visible'] = true;
        // }
        
        if (is_siteadmin($USER->id)) {
            $this->nodes['custom']['visible'] = true;
        }

        // Get context.
        $context = context_system::instance();

        // Check capability of completion block.
        $capname = 'report/edwiserreports_completionblock:view';
        if (has_capability($capname, $context) || can_view_block($capname)) {
            $this->show_link('coursecompletion');
        }

        // Check capability of course activities summary report.
        $capname = 'report/edwiserreports_courseactivitiessummary:view';
        if (has_capability($capname, $context) || can_view_block($capname)) {
            $this->show_link('courseactivitiessummary');
        }

        // Check capability of course activities summary report.
        $capname = 'report/edwiserreports_courseactivitycompletion:view';
        if (has_capability($capname, $context) || can_view_block($capname)) {
            $this->show_link('courseactivitycompletion');
        }

        // Check capability of learner course progress summary report.
        $capname = 'report/edwiserreports_learnercourseprogress:view';
        if (has_capability($capname, $context) || can_view_block($capname)) {
            $this->show_link('learnercourseprogress');
        }

        // Check capability of learner course progress summary report.
        $capname = 'report/edwiserreports_learner:view';
        if (has_capability($capname, $context) || can_view_block($capname)) {
            $this->show_link('learnercourseprogress');
        }

        // Check capability of learner course actvities report.
        $capname = 'report/edwiserreports_learnercourseactivities:view';
        if (has_capability($capname, $context) || can_view_block($capname)) {
            $this->show_link('learnercourseactivities');
        }

        // Check capability of all courses summary report.
        $capname = 'report/edwiserreports_allcoursessummary:view';
        if (has_capability($capname, $context) || can_view_block($capname)) {
            $this->show_link('allcoursessummary');
        }

        // Prepare layout for each block.
        foreach ($blocks as $block) {
            // If user dont have capability to see the block.
            if ($block->classname !== 'customreportsblock') {
                $capname = 'report/edwiserreports_' . $block->classname . ':view';
                if (!has_capability($capname, $context) &&
                    !can_view_block($capname)) {
                    continue;
                }
            } else {
                continue;
            }

            // Check if class file exist.
            $classname = '\\local_edwiserreports\\blocks\\' . $block->classname;
            if (!class_exists($classname)) {
                debugging('Class file dosn\'t exist ' . $classname);
            }
            $blockbase = new $classname();

            $layout = $blockbase->get_layout();

            if ($layout === false) {
                continue;
            }

            // Get block preferences.
            $pref = \local_edwiserreports\utility::get_reportsblock_preferences($block);

            if (isset($pref["hidden"]) && $pref["hidden"] && (isset($USER->editing) && !$USER->editing)) {
                continue;
            }

            if ((isset($layout->downloadlinks) && !empty($layout->downloadlinks)) ||
                (isset($layout->morelink) && !empty($layout->morelink))
            ) {
                $this->show_link($layout->id);
            }
        }
    }

    /**
     * Method for creating instance.
     */
    public static function instance() {
        if (self::$instance == null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * Set active tab
     *
     * @param string $active Set active tab
     */
    public function set_active($active) {
        if (!isset($this->nodes[$active])) {
            $active = 'overview';
        }
        $this->nodes[$active]['active'] = true;
    }

    /**
     * Get navigation
     * @param string $active Current active tab
     * @return void
     */
    public function get_navigation($active = 'overview') {
        $this->set_active($active);
        $nodes = [];
        foreach ($this->nodes as $key => $node) {
            $node['id'] = $key;
            if (isset($node['nodes'])) {
                foreach ($node['nodes'] as $id => $subnode) {
                    $subnode['id'] = $id;
                }
                $node['nodes'] = array_values($node['nodes']);
            }
            $nodes[] = $node;
        }
        return $nodes;
    }
}
