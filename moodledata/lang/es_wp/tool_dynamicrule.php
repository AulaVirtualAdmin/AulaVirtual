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
 * Strings for component 'tool_dynamicrule', language 'es_wp', version '4.2'.
 *
 * @package     tool_dynamicrule
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['active'] = 'Activa';
$string['activerules'] = 'Reglas activas';
$string['addcondition'] = 'Agregar condición';
$string['addconditions'] = 'Agregar condiciones a esta regla';
$string['addoutcome'] = 'Agregar acción';
$string['addoutcomes'] = 'Agregar acciones hasta regla';
$string['archive'] = 'Archivar';
$string['archived'] = 'Archivada';
$string['archivedrules'] = 'Reglas archivadas';
$string['availableplaceholders'] = 'Reemplazos disponibles';
$string['body'] = 'Cuerpo';
$string['cannotenablecomponentrule'] = 'No se puede habilitar la regla \'{$a}\' a menos que tenga acciones configuradas y esté libre de errores.';
$string['cannotenablerule'] = 'No se puede habilitar la regla \'{$a}\' a menos que tenga condiciones, acciones y esté libre de errores.';
$string['cohort'] = 'Cohorte';
$string['conditioncohortmember'] = 'El usuario es miembro de la cohorte';
$string['conditioncohortmemberdescription'] = 'Usuarios que son miembros de la cohorte \'{$a}\'';
$string['conditioncohortmemberdescriptionwithdate'] = 'Usuarios que son miembros de la cohorte \'{$a}\' <br/>
Agregados a la cohorte desde:  \'{$a->conditiondate}\'';
$string['conditioncohortnotmember'] = 'Usuario no es miembro de la cohorte';
$string['conditioncohortnotmemberdescription'] = 'Usuarios que no son miembros de la cohorte \'{$a}\'';
$string['conditioncoursecompleted'] = 'Curso completo';
$string['conditioncoursecompletedafter'] = 'Fecha de finalización después de {$a}';
$string['conditioncoursecompletedbefore'] = 'Fecha de finalización después de {$a}';
$string['conditioncoursecompleteddescription'] = 'Usuarios que han completado el curso \'{$a}\'';
$string['conditioncoursenotcompleted'] = 'Curso no completado';
$string['conditioncoursenotcompleteddescription'] = 'Usuarios que no han completado el curso \'{$a}\'';
$string['conditionisbroken'] = 'Esta condición contiene un error.';
$string['conditionisnotavailable'] = 'Esta condición no está disponible';
$string['conditionnotsaved'] = 'La condición no fue guardada.';
$string['conditions'] = 'Condiciones';
$string['conditionuserenrolled'] = 'Usuario matriculado';
$string['conditionuserenrolleddescription'] = 'Usuarios que están matriculados en el curso \'{$a->course}\'<br/>
Método de matriculación:  \'{$a->enrol}\'';
$string['conditionuserenrolleddescriptionwithdate'] = 'Los usuarios matriculados en el curso \'{$a->course}\'<br />
Método de matriculación: {$a->enrol}\'<br />
Inicio de la matriculación en \'{$a->conditiondate} o después\\';
$string['conditionuserlastlogin'] = 'Último ingreso del usuario';
$string['conditionuserlastlogindescriptionbefore'] = 'Usuarios que iniciaron sesión por última vez hace más de {$a}';
$string['conditionuserlastlogindescriptionever'] = 'Users who have logged in at least once';
$string['conditionuserlastlogindescriptioninlast'] = 'Usuarios que iniciaron sesión durante los últimos {$a}';
$string['conditionuserlastlogindescriptionnever'] = 'Usuarios que nunca han ingresado';
$string['conditionusernotenrolled'] = 'Usuario no matriculado';
$string['conditionusernotenrolleddescription'] = 'Usuarios que no están matriculados en el curso \'{$a->course}\'<br/>
Método de matriculación: \'{$a->enrol}\\';
$string['conditionuserprofilefield'] = 'Campo de perfil del usuario';
$string['conditionuserprofilefielddescription'] = 'Users whose value for profile field \'{$a->fieldname}\' is \'{$a->fieldvalue}\\';
$string['conditionuserprofilefielddescriptiontext'] = 'Usuarios que tienen el valor {$a->fieldvalue} en el campo \'{$a->fieldname}\'';
$string['confirmarchiverule'] = 'Are you sure you want to archive the rule \'{$a}\'? Archived dynamic rules will be still be available for current and future reports.';
$string['confirmdeletecondition'] = 'Are you sure you want to delete the condition \'{$a}\' and all associated data? This action cannot be undone.';
$string['confirmdeleteoutcome'] = 'Are you sure you want to delete the action \'{$a}\' and all associated data? This action cannot be undone.';
$string['confirmdeleterule'] = 'Are you sure you want to delete the rule \'{$a}\' and all associated data? This action cannot be undone.';
$string['confirmduplicaterule'] = 'Are you sure you want to duplicate the rule \'{$a}\'?';
$string['confirmeditrule'] = 'Como algunos usuarios entraban en esta regla en el pasado, sólo está permitido editar las acciones de la regla.
Otra opción para modificar las condiciones es duplicar la regla.';
$string['confirmenablecomponentrule'] = '¿Está seguro de habilitar esta regla? Se aplicará de inmediato a {$a} usuarios.';
$string['confirmenablerule'] = 'Las condiciones se bloquearán cuando al menos un usuario sea afectado por esta regla. ¿Está seguro de habilitar la regla?';
$string['countmatchingusers'] = '{$a} coincidencias totales';
$string['coursecompletiondate'] = 'Fecha de completud';
$string['courseinternalid'] = 'Internal course ID used in URLs';
$string['courseurl'] = 'URL del curso';
$string['datetypeever'] = 'En total';
$string['datetypeinlast'] = 'In last';
$string['datetypenever'] = 'Nunca';
$string['datetypenone'] = 'Not set';
$string['datetypepast'] = 'Over';
$string['deletecondition'] = 'Eliminar condición';
$string['deleteoutcome'] = 'Eliminar acción';
$string['duplicate'] = 'Duplicar';
$string['dynamicrule:manage'] = 'Gestionar las Reglas Dinámicas';
$string['editanyway'] = 'Editarla de todas formas';
$string['editcondition'] = 'Edit condition';
$string['editdetails'] = 'Edit details of rule \'{$a}\\';
$string['editoutcome'] = 'Editar la acción';
$string['editrulename'] = 'Edit name of rule \'{$a}\\';
$string['enable'] = 'Habilitar';
$string['enablehelp'] = 'enabling rule';
$string['enablehelp_help'] = 'A rule requires at least one condition and one action to be enabled.';
$string['enablehelpmodal'] = 'enabling rule';
$string['enablehelpmodal_help'] = 'A rule requires at least one action to be enabled.';
$string['errorcannotcreate'] = 'You don\'t have permission to create rules';
$string['errorcannotmanage'] = 'You don\'t have permission to manage this rule';
$string['errorcompletionnotenabled'] = 'La finalización no está habilitada para este curso';
$string['errorinvalidbody'] = 'Invalid notification body';
$string['errorinvalidcohort'] = 'Cohorte inválida';
$string['errorinvalidcourse'] = 'Curso inválido';
$string['errorinvalidoperator'] = 'Invalid operator. Only before and after are allowed.';
$string['errorinvalidsubject'] = 'Invalid notification subject';
$string['errorinvaliduserlastlogin'] = 'Invalid last login date';
$string['errorinvaliduserlastlogintype'] = 'Invalid last login type';
$string['errorinvaliduserprofilefield'] = 'Campo de perfil inválido';
$string['errorinvaliduserprofilefieldvalue'] = 'Valor de campo de perfil inválido';
$string['ever'] = 'en total';
$string['field'] = 'Campo';
$string['general'] = 'General';
$string['lastlogin'] = 'El último ingreso del usuario fue';
$string['lastlogin_help'] = 'Puede elegirse una fecha relativa a la actual o usuarios que nunca han ingresado.';
$string['limitreached'] = 'Dynamic rules limit reached';
$string['limitreacheddescr'] = 'You have reached the limit for the number of dynamic rules on this site. Please note that archived rules are also counted towards this limit.';
$string['limitreachednumdescr'] = 'You can only create {$a} dynamic rule(s) on this site. Please note that archived rules are also counted towards this limit.';
$string['managebadges'] = 'Gestionar insignias';
$string['managecompetencies'] = 'Gestionar competencias';
$string['match'] = 'Coincidencia';
$string['matchedtime'] = 'Coincidencia de tiempo';
$string['matchlimitinvalid'] = 'La regla debe ejecutarse al menos una vez.';
$string['messageprovider:notificationoutcome'] = 'Notification action for dynamic rule tool';
$string['newnameforrule'] = 'New name for rule \'{$a}\\';
$string['newrule'] = 'Crear Regla Dinámica';
$string['noavailablecohorts'] = 'No hay cohortes disponibles';
$string['noavailablecompletioncourses'] = 'No hay cursos con finalización habilitada';
$string['noruleconditions'] = 'No hay condiciones elegidas para esta regla';
$string['noruleoutcomes'] = 'No hay acciones programadas para esta regla';
$string['operatorafter'] = 'After';
$string['operatorbefore'] = 'Before';
$string['outcomebadge'] = 'Otorgar insignia';
$string['outcomebadgedescription'] = 'Otorgar la insignia \'{$a}\' a los usuarios';
$string['outcomecompetency'] = 'Award competency';
$string['outcomecompetencydescription'] = 'Award competency \'{$a}\' to users';
$string['outcomeisbroken'] = 'This action contains an error.';
$string['outcomeisnotavailable'] = 'Esta acción no está disponible';
$string['outcomenotification'] = 'Notificación';
$string['outcomenotificationdescription'] = 'Enviar notificación \'{$a}\' a los usuarios';
$string['outcomenotsaved'] = 'Action is not saved.';
$string['outcomes'] = 'Acciones';
$string['placeholdersdesc'] = 'Marcador de posición';
$string['placeholdersdesc_help'] = 'Los marcadores de posición permiten agregar contenido dinámico, por ejemplo el marcador  {{userfullname}} será reemplazado con el nombre completo del usuario cuando la notificación le sea enviada.';
$string['pluginname'] = 'Reglas dinámicas';
$string['previewcoursefullname'] = 'Nombre completo del curso';
$string['previewcourseshortname'] = 'Nombre corto del curso';
$string['privacy:metadata:tool_dynamicrule_match'] = 'Information about user matches to particular rule conditions. As a result of matching user is affected by actions defined in the rule.';
$string['privacy:metadata:tool_dynamicrule_match:matchedtime'] = 'Timestamp indicating when user has been matched to rule conditions.';
$string['privacy:metadata:tool_dynamicrule_match:ruleid'] = 'El ID de la regla.';
$string['privacy:metadata:tool_dynamicrule_match:unmatchedtime'] = 'Timestamp indicating when user is no longer matching rule condition after action has been applied.';
$string['privacy:metadata:tool_dynamicrule_match:userid'] = 'The ID of the user that has been matched to rule conditions.';
$string['reg_wpdynamicrules'] = 'Number of dynamic rules ({$a})';
$string['rolemanager'] = 'Gestor de Reglas Dinámicas';
$string['rolemanagerdescription'] = 'Allows to create and manage dynamic rules within the current tenant';
$string['rulematchfreq'] = 'Frecuencia de las coincidencias';
$string['rulematchfreq_help'] = 'Por defecto las reglas son aplicadas a los usuarios cuando se cumplen las condiciones.  Si se habilita  la frecuencia de coincidencias entonces la aplicación de la regla estará limitada a un número determinado de veces por cada período elegido.';
$string['rulematchfreqdesc0'] = 'Esta regla no puede ejecutarse más de';
$string['rulematchfreqdesc1'] = 'veces';
$string['rulematchfreqenable'] = 'Habilitar el límite en la frecuencia de las coincidencias';
$string['rulename'] = 'Nombre';
$string['rulenotfound'] = 'La regla no fue encontrada';
$string['select'] = 'Select';
$string['selectbadge'] = 'Select badge';
$string['selectbadge_help'] = 'Select badge to issue';
$string['selectcompetency'] = 'Select competency';
$string['selectcompetency_help'] = 'Select competencies to issue';
$string['subject'] = 'Tema';
$string['taskprocessrules'] = 'Process rules';
$string['timeadded'] = 'Added to cohort on or after this date and time';
$string['timecreated'] = 'Creada';
$string['timeenrolled'] = 'Enrolment start date and time is on or after';
$string['toomanybadgestoshow'] = 'Too many badges to show';
$string['viewmatchingusers'] = 'Ver los usuarios que coinciden.';
$string['warningchangeswillnotapplymatchedusers'] = 'Los cambios no serán aplicados a aquellos usuarios que entraban dentro de esta regla en el pasado.';
