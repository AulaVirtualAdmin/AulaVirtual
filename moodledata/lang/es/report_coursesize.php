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
 * Strings for component 'report_coursesize', language 'es', version '4.2'.
 *
 * @package     report_coursesize
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['backupsize'] = 'Tamaño de la copia de seguridad';
$string['calcmethod'] = 'Actualizar informe principal';
$string['catsystembackupuse'] = 'El uso de la copia de seguridad del sistema y categorías es {$a}.';
$string['catsystemuse'] = 'El uso del sistema y categorías sin contar usuarios y cursos es {$a}.';
$string['coursebackupbytes'] = '{$a->backupbytes} bytes usados para la copia de seguridad del curso {$a->shortname}';
$string['coursebytes'] = '{$a->bytes} bytes usados por el curso {$a->shortname}';
$string['coursereport'] = 'Resumen de tipos de plugins - NOTA puede ser inferior al listado de cursos principal y probablemente sea más preciso';
$string['coursesize'] = 'Tamaño del curso';
$string['coursesize:view'] = 'Ver informe del tamaño del curso';
$string['coursesize_desc'] = '<p>Este informe sólo proporciona valores aproximados. Si un archivo es usado múltiples veces en uno o varios cursos, el informe lo suma cada vez incluso aunque Moodle sólo almacene una copia física en el disco.</p>';
$string['coursesummary'] = '(ver estadísticas)';
$string['diskusage'] = 'Total';
$string['emptycourseshidden'] = 'Los cursos que no tienen ningún archivo almacenado han sido excluidos de este informe.';
$string['exportcsv'] = 'Exportar CSV';
$string['nouserfiles'] = 'No existen archivos de usuario';
$string['pluginname'] = 'Tamaño del curso';
$string['privacy:metadata'] = 'El plugin Course size no almacena ninguna información personal.';
$string['sharedusage'] = 'Uso Compartido';
$string['sharedusagecourse'] = 'Aproximadamente {$a} es compartido con otros cursos.';
$string['sitefilesusage'] = 'Informe del uso de archivos';
$string['sizepermitted'] = '(Uso permitido {$a}MB)';
$string['totalsitedata'] = 'Espacio total usado en el sitio: {$a}';
$string['userstopnum'] = 'Usuarios (top {$a})';
