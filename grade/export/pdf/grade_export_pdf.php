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

require_once($CFG->dirroot.'/grade/export/lib.php');

class grade_export_pdf extends grade_export {

    public $plugin = 'pdf';

    /**
     * To be implemented by child classes
     */
    public function print_grades() {
        global $CFG;
        require_once($CFG->dirroot.'/lib/pdflib.php');
		
		$doc = new pdf;

        $export_tracking = $this->track_exports();

        $strgrades = get_string('grades');
		
		$doc = new pdf;
		$doc->setPrintHeader(false);
		$doc->setPrintFooter(false);
		$doc->AddPage();
		
		$tbl = '<table border="1">';
		$tbl .= '<tr>';
		$tbl .= '<th>'.get_string("firstname").'</th><th>'.get_string("lastname").'</th><th>'.get_string("idnumber").'</th><th>'.get_string("institution").'</th><th>'.get_string("department").'</th><th>'.get_string("email").'</th>';
		foreach ($this->columns as $grade_item)
		{
			$tbl .= '<th>'.$this->format_column_name($grade_item).'</th>';
			
			if ($this->export_feedback)
			{
				$tbl .= '<th>'.$this->format_column_name($grade_item, true).'</th>';
			}
		}
		$tbl .= '</tr>';
		
		$i = 0;
		$geub = new grade_export_update_buffer();
		$gui = new graded_users_iterator($this->course, $this->columns, $this->groupid);
		$gui->init();
		
		while ($userdata = $gui->next_user())
		{
			$i++;
			$user = $userdata->user;
			
			$tbl .= '<tr>';
			$tbl .= '<td>'.$user->firstname.'</td><td>'.$user->lastname.'</td><td>'.$user->idnumber.'</td><td>'.$user->institution.'</td><td>'.$user->department.'</td><td>'.$user->email.'</td>';
			
			foreach ($userdata->grades as $itemid => $grade)
			{
				if ($export_tracking)
				{
					$status = $geub->track($grade);
				}
				
				$gradestr = $this->format_grade($grade);
				if (is_numeric($gradestr))
				{
					$tbl .= '<td>'.$gradestr.'</td>';
				}
				else
				{
					$tbl .= '<td>'.$gradestr.'</td>';
				}
				
				if ($this->export_feedback)
				{
					$tbl .= '<td>'.$this->format_feedback($userdata->feedbacks[$itemid]).'</td>';
				}
			}
			$tbl .= '</tr>';
		}
		$tbl .= '</table>';

		$doc->writeHTML($tbl, true, false, false, false, '');

		$shortname = format_string($this->course->shortname, true, array('context' => get_context_instance(CONTEXT_COURSE, $this->course->id)));
        $downloadfilename = clean_filename("$shortname $strgrades.pdf");
		$doc->Output($downloadfilename,'D');

        exit;
    }
}


