<?php
// This file is part of Moodle - https://moodle.org/
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
// along with Moodle.  If not, see <https://www.gnu.org/licenses/>.

/**
 * Strings for component 'enrol_dynamicrule', language 'es', version '4.2'.
 *
 * @package     enrol_dynamicrule
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['action'] = 'Acción';
$string['actiondisableenrolment'] = 'Deshabilitar matriculación';
$string['actiondisableenrolmentremoveroles'] = 'Deshabilitar matriculación y remover roles';
$string['actionunenrol'] = 'Desmatricular usuario del curso';
$string['duration'] = 'Duración';
$string['dynamicrule:config'] = 'Configurar instancias de matriculación de reglas dinámicas';
$string['dynamicrule:enrol'] = 'Matricular usuario utilizando la acción de matriculación al curso';
$string['dynamicrule:unenrol'] = 'Desmatricular usuario mediante la acción de desmatricular de curso o manualmente';
$string['enddate'] = 'Fecha de finalización';
$string['errorinvalidaction'] = 'Acción inválida';
$string['errorinvalidcoursetoenrol'] = 'Curso inválido para matricularse';
$string['errorinvalidcoursetounenrol'] = 'Curso inválido para desmatricularse';
$string['errorinvaliddurationandenddate'] = 'Debés elegir la fecha de finalización de la matriculación O la duración, no ambas.';
$string['errorinvalidrole'] = 'Rol inválido';
$string['group'] = 'Nombre de grupo';
$string['group_help'] = 'El nombre del grupo en el que se agregarán los usuarios como miembros.';
$string['noavailablecoursesenrol'] = 'No hay cursos en los que se pueda matricular a los usuarios mediante el método de matriculación por Reglas dinámicas.';
$string['noavailablecoursesunenrol'] = 'No hay cursos en los que se pueda desmatricular a los usuarios mediante el método de matriculación por Reglas dinámicas.';
$string['outcomecourseenrol'] = 'Matricular usuarios al curso';
$string['outcomecourseenroldescription'] = 'Matricular en curso \'{$a->coursename}\'<br />
Rol: {$a->role}<br />
Grupo: {$a->groupname}';
$string['outcomecourseenroldescriptionwithduration'] = 'Matricular en curso \'{$a->coursename}\'<br />
Rol: {$a->role}<br />
Grupo: {$a->groupname}<br />
Duración: {$a->duration} {$a->durationtype}';
$string['outcomecourseenroldescriptionwithenddate'] = 'Matricular al curso \'{$a->coursename}\'<br />
Rol: {$a->role}<br />
Grupo: {$a->groupname}<br />
Fecha de finalización: {$a->enddate}';
$string['outcomecourseunenrol'] = 'Desmatricular usuarios del curso';
$string['outcomecourseunenroldescriptionwithmethod'] = 'Desmatricular del curso \'{$a->coursename}\'<br />
Método de matriculación: {$a->enrol}<br />
Acción: {$a->action}';
$string['pluginname'] = 'Reglas dinámicas';
$string['privacy:metadata'] = 'El plugin Reglas dinámicas no almacena ningún dato personal sobre ningún usuario.';
$string['userwithoutcapability'] = 'Debe tener el permiso para cancelar la matriculación de los métodos \'{$a}\' en el curso seleccionado';
