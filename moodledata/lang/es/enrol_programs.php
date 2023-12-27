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
 * Strings for component 'enrol_programs', language 'es', version '4.2'.
 *
 * @package     enrol_programs
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addprogram'] = 'Agregar programa';
$string['addset'] = 'Agregar un nuevo conjunto';
$string['allocation'] = 'Asignación';
$string['allocationdate'] = 'Fecha de asignación';
$string['allocationend'] = 'Fin de asignación';
$string['allocationend_help'] = 'El significado de la fecha de finalización de la asignación depende de las fuentes de asignación habilitadas. Por lo general, la nueva asignación no es posible después de esta fecha si se especifica.';
$string['allocations'] = 'Asignaciones';
$string['allocationsources'] = 'Fuentes de asignación';
$string['allocationstart'] = 'Inicio de la asignación';
$string['allocationstart_help'] = 'El significado de la fecha de inicio de la asignación depende de las fuentes de asignación habilitadas. Por lo general, las nuevas asignaciones solo son posibles después de esta fecha si se especifica.';
$string['allprograms'] = 'Todos los programas';
$string['appendinto'] = 'Agregar al objeto';
$string['appenditem'] = 'Agregar objeto';
$string['archived'] = 'Archivado';
$string['catalogue'] = 'Catálogo de programa';
$string['catalogue_dofilter'] = 'Buscar';
$string['catalogue_resetfilter'] = 'Limpiar';
$string['catalogue_searchtext'] = 'Buscar texto';
$string['catalogue_tag'] = 'Filtrar por etiqueta';
$string['cohorts'] = 'Visible para cohortes';
$string['cohorts_help'] = 'Los programas que no son públicos se pueden hacer visibles para miembros específicos de una cohorte.

El estado de visibilidad no afecta a los programas ya asignados.';
$string['completiondate'] = 'Fecha de completud';
$string['creategroups'] = 'Grupos del curso';
$string['creategroups_help'] = 'Si está habilitado, se creará un grupo en cada curso agregado al programa y todos los usuarios asignados se agregarán como miembros del grupo.';
$string['deleteallocation'] = 'Eliminar asignación de programa';
$string['deletecourse'] = 'Remover curso';
$string['deleteprogram'] = 'Eliminar programa';
$string['deleteset'] = 'Eliminar conjunto';
$string['documentation'] = 'Programas para la documentación de Moodle';
$string['duedate'] = 'Fecha de vencimiento';
$string['enrolrole'] = 'Rol de curso';
$string['enrolrole_desc'] = 'Seleccionar el rol que usarán los programas para la matriculación del curso.';
$string['errorcontentproblem'] = '¡Problema detectado en la estructura del contenido del programa, la finalización del programa no se rastreará correctamente!';
$string['errornoallocation'] = 'El programa no está asignado';
$string['errornoallocations'] = 'No se encontraron usuarios asignados';
$string['errornomyprograms'] = 'No estás asignado a ningún programa.';
$string['errornoprograms'] = 'No se encontraron programas.';
$string['errornotenabled'] = 'No está habilitado el plugin de Programas';
$string['event_program_completed'] = 'Programa completado';
$string['event_program_created'] = 'Programa creado';
$string['event_program_deleted'] = 'Programa eliminado';
$string['event_program_updated'] = 'Programa actualizado';
$string['event_program_viewed'] = 'Programa visto';
$string['event_user_allocated'] = 'Asignación de usuarios a programa';
$string['event_user_deallocated'] = 'Usuarios desasignados del programa';
$string['evidence'] = 'Otra evidencia';
$string['evidence_details'] = 'Detalles';
$string['fixeddate'] = 'En una fecha fija';
$string['item'] = 'Objeto';
$string['itemcompletion'] = 'Completud del objeto del programa';
$string['management'] = 'Administración de programas';
$string['messageprovider:allocation_notification'] = 'Notificaciones sobre asignaciones de programa';
$string['messageprovider:approval_reject_notification'] = 'Notificación de rechazo de solicitud de programa';
$string['messageprovider:approval_request_notification'] = 'La aprobación del programa requiere notificación';
$string['messageprovider:completion_notification'] = 'Notificación de completud de un programa';
$string['messageprovider:deallocation_notification'] = 'Notificación de desasignación de un programa';
$string['messageprovider:due_notification'] = 'Notificación de programa atrasado';
$string['messageprovider:duesoon_notification'] = 'Notificación de programa próximo a vencerse';
$string['messageprovider:endcompleted_notification'] = 'Notificación de finalización de un programa completado';
$string['messageprovider:endfailed_notification'] = 'Notificación de fin de programa fallido';
$string['messageprovider:endsoon_notification'] = 'Notificación de programa próximo a finalizar';
$string['messageprovider:start_notification'] = 'Notificación de programa iniciado';
$string['moveafter'] = 'Mover "{$a->item}" después "{$a->target}"';
$string['movebefore'] = 'Mover "{$a->item}" antes "{$a->target}"';
$string['moveinto'] = 'Mover "{$a->item}" a "{$a->target}"';
$string['moveitem'] = 'Mover objeto';
$string['moveitemcancel'] = 'Cancelar mover';
$string['myprograms'] = 'Mis programas';
$string['notification_allocation'] = 'Usuario asignado';
$string['notification_completion'] = 'Programa completado';
$string['notification_completion_body'] = 'Hola {$a->user_fullname},

Completaste el programa "{$a->program_fullname}".';
