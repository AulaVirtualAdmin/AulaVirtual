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
 * Strings for component 'workshopallocation_random', language 'es_wp', version '4.2'.
 *
 * @package     workshopallocation_random
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addselfassessment'] = 'Agregar autoevaluaciones';
$string['allocationaddeddetail'] = 'Nueva evaluación por hacer: <strong> {$a->reviewername} </strong> es revisor de <strong> {$a->authorname} </strong>';
$string['allocationdeallocategraded'] = 'No se puede desasignar la evaluación ya calificada: revisor <strong> {$a-> reviewername} </strong>, autor del envío <strong> {$a->authorname} </strong>';
$string['allocationreuseddetail'] = 'Evaluación reutilizada: <strong> {$a->reviewername}</strong> mantenido como revisor de <strong> {$a->authorname}</strong>';
$string['allocationsettings'] = 'Configuración de asignación';
$string['assessmentdeleteddetail'] = 'Evaluación desasignada: <strong> {$a->reviewername} </strong> ya no es revisor de <strong> {$a->authorname} </strong>';
$string['assesswosubmission'] = 'Los participantes pueden evaluar sin haber enviado nada';
$string['confignumofreviews'] = 'Número predeterminado de envíos que se asignarán aleatoriamente';
$string['excludesamegroup'] = 'Evitar revisiones de compañeros del mismo grupo';
$string['noallocationtoadd'] = 'No hay asignaciones para agregar';
$string['nogroupusers'] = '<p> Advertencia: Si el taller está en modo \'grupos visibles\' o en modo \'grupos separados\', los usuarios DEBEN formar parte de al menos un grupo para que esta herramienta les asigne evaluaciones de pares. Los usuarios no agrupados aún pueden recibir nuevas autoevaluaciones o eliminar las evaluaciones existentes. </p>
<p> Estos usuarios actualmente no están en un grupo: {$a} </p>';
$string['numofdeallocatedassessment'] = 'Desasignación de {$a} evaluación (es)';
$string['numofrandomlyallocatedsubmissions'] = 'Asignación aleatoria de {$a} asignaciones';
$string['numofreviews'] = 'Número de reseñas';
$string['numofselfallocatedsubmissions'] = 'Envío (s) de {$ a} autoasignación';
$string['numperauthor'] = 'por envío';
$string['numperreviewer'] = 'por revisor';
$string['pluginname'] = 'Asignación aleatoria';
$string['privacy:metadata'] = 'El plugin de asignación aleatoria no almacena ningún dato personal. Los datos personales reales sobre quién va a evaluar a quién son almacenados por el módulo del taller y forman la base para exportar los detalles de las evaluaciones.';
$string['randomallocationdone'] = 'Asignación aleatoria realizada';
$string['removecurrentallocations'] = 'Remove current allocations';
$string['resultnomorepeers'] = 'No más compañeros disponibles';
$string['resultnomorepeersingroup'] = 'No hay más pares disponibles en este grupo separado';
$string['resultnotenoughpeers'] = 'No hay suficientes compañeros disponibles';
$string['resultnumperauthor'] = 'Intentando asignar {$a} revision(es) por autor';
$string['resultnumperreviewer'] = 'Intentando asignar {$a} revision(es) por revisor';
$string['stats'] = 'Estadísticas de asignación actual';
