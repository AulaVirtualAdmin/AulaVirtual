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
 * Strings for component 'tool_certification', language 'es_wp', version '4.2'.
 *
 * @package     tool_certification
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['actions'] = 'Acciones';
$string['active'] = 'Activas';
$string['activecertifications'] = 'Certificaciones activas';
$string['afteractualcertcompletion'] = 'Después de la finalización de la certificación actual';
$string['afteractualcertcompletionwithrelativedate'] = '{$a} después de la finalización de la certificación actual';
$string['afterallocationdate'] = 'Después de la fecha de asignación';
$string['afterallocationdatewithrelativedate'] = '{$a} después de la fecha de asignación';
$string['aftercompletion'] = 'Después de la completud';
$string['aftercompletionwithrelativedate'] = '{$a} después de la completud';
$string['afterduedate'] = 'Después de la fecha límite';
$string['afterduedatewithrelativedate'] = '{$a} después de la fecha límite';
$string['afterlatest'] = 'Después de la última completud actual o vencimiento';
$string['afterlatestwithrelativedate'] = '{$a} después de la última completud actual o vencimiento';
$string['afterstartdate'] = 'Después de la fecha de inicio';
$string['afterstartdatewithrelativedate'] = '{$a}  después de la fecha de inicio';
$string['allocateusers'] = 'Asignar usuarios';
$string['allocationdate'] = 'Fecha de asignación';
$string['allocationdateisonorafter'] = 'Fecha de asignación en o después de';
$string['allocationenddate'] = 'Fin del período de asignación';
$string['allocationfor'] = 'Asignación para \'{$a}\'';
$string['allocationsource'] = 'Fuente de la asignación';
$string['allocationstartdate'] = 'Fecha de inicio de la asignación';
$string['allocationwindowenddate'] = 'Fecha de fin';
$string['allocationwindowenddate_help'] = 'Fecha de fin de la ventana de asignación';
$string['allocationwindowendedon'] = 'La ventana de asignación para esta certificación se cerró el {$a}';
$string['allocationwindowstartdate'] = 'Fecha de inicio';
$string['allocationwindowstartdate_help'] = 'Fecha de inicio para la ventana de asignación';
$string['allocationwindowstartson'] = 'La ventana de asignación para esta certificación inicia el {$a}.';
$string['archived'] = 'Archivada';
$string['archivedcertifications'] = 'Certificaciones archivadas';
$string['autocreategroups'] = 'Agregar a grupos del curso';
$string['autocreategroups_help'] = 'Cuando los usuarios son matriculados en los cursos del programa, pueden ser asignados al mismo grupo. En caso de que la opción "para esta certificación" sea seleccionada, se creará un grupo separado, específico para esta certificación. Si hay otras certificaciones utilizando el mismo programa, se crearán otros grupos diferentes.';
$string['autocreategroupsasinprogram'] = 'Como está definido en el programa';
$string['autocreategroupscertification'] = 'Crear grupos para esta certificación';
$string['calendarduedate'] = 'Fecha límite para la certificación {$a}';
$string['calendarexpirydate'] = 'Fecha de vencimiento de la certificación {$a}';
$string['certification'] = 'Certificación';
$string['certification:allocateuser'] = 'Permiso para asignar usuarios';
$string['certification:configurecustomfields'] = 'Configurar los campos personalizados de las certificaciones';
$string['certification:edit'] = 'Permiso para editar';
$string['certificationfullname'] = 'Nombre completo de la certificación';
$string['certificationfullname_help'] = 'Nombre completo de la certificación';
$string['certificationidnumber'] = 'Número de ID de la certificación';
$string['certificationname'] = 'Nombre de la certificación';
$string['certificationprogress'] = 'Progreso de la certificación';
$string['certificationrules'] = 'Reglas de la certificación';
$string['certifications'] = 'Certificaciones';
$string['certificationscustomfield'] = 'Campos custom de las certificaciones';
$string['certificationstatus'] = 'Estado de la certificación';
$string['certificationstatus_help'] = 'Estado de la certificación elegida';
$string['certificationtags'] = 'Etiquetas de la certificación';
$string['certificationtags_help'] = 'Etiquetas para esta certificación';
$string['certificationtenant'] = 'Micrositio de la certificación';
$string['certificationuserlog'] = 'Registro de actividad {$a}';
$string['certified'] = 'Vigente';
$string['certifiedby'] = 'Certificado por';
$string['certifieddate'] = 'Fecha de certificación';
$string['certifieddateisonorafter'] = 'La fecha de certificación es igual o posterior a';
$string['certifiednotification'] = 'El usuario ha sido certificado con éxito';
$string['certify'] = 'Certificar';
$string['certifyexpirydate'] = 'Fecha de vencimiento';
$string['certifyuser'] = 'Certificar usuario';
$string['completedtheprogram'] = 'Completó el programa {$a}';
$string['conditioncertificationcertifiedonrecert_help'] = 'Esto cambiará efectivamente la condición <b>"El usuario está certificado y el período de recertificación no está abierto"</b>. Esto garantizará que el usuario se marque como "no coincidente" cuando se habilite la recertificación y que las acciones se ejecuten para éste nuevamente al finalizar el programa, incluso si continúa certificado todo el tiempo.';
$string['conditioncertificationexpired'] = 'Certificación vencida';
$string['conditioncertificationoverdue'] = 'Certificación retrasada';
$string['conditioncertificationoverduedescriptionwithdate'] = 'Usuarios que tiene el estado Retrasada en la certificación  \'{$a->fullname}\'<br />
La fecha límite es previa a \'{$a->conditiondate}\'';
$string['conditioncertificationsuspended'] = 'Certificación suspendida';
$string['conditionrecertificationgraceperiod'] = 'El período de gracia para la re-certificación finaliza';
$string['conditionrecertificationstarted'] = 'Periodo de re-certificación iniciado';
$string['conditionrecertificationstarteddescription'] = 'Usuarios que han comenzado un período de re-certificación en la certificación \'{$a->fullname}\'';
$string['conditionrecertificationstarteddescriptionwithdate'] = 'Usuarios que han comenzado un período de re-certificación en la certificación \'{$a->fullname}\'<br />
Re-certificación iniciada en  \'{$a->conditiondate}\' o después';
$string['conditionuserallocated'] = 'Usuarios inscritos a la certificación';
$string['conditionusernotallocated'] = 'Usuarios no inscriptos a la certificación';
$string['conditionusernotallocateddescription'] = 'Usuarios no inscriptos a la certificación {$a}';
$string['confirmdeallocateusersheader'] = 'Desasignar usuarios';
$string['confirmdeleteuserallocation'] = '¿Está seguro/ a de eliminar la asignación del usuario \'{$a}\' y sus datos asociados? Esta acción no puede deshacerse.';
$string['currentprogram'] = 'Programa actual';
$string['currentprogram_help'] = 'Este es el programa que el usuario está siguiendo';
$string['dayssinceallocation'] = 'Días desde la asignación';
$string['deallocateusers'] = 'Desasignar usuarios';
$string['deleteuserallocation'] = 'Eliminar asignación del usuario';
$string['displaycertificationduedate'] = 'Fecha límite de la certificación';
$string['duedate'] = 'Fecha límite';
$string['duedateisonorafter'] = 'Fecha límite igual o posterior a';
$string['dynamic'] = 'Regla dinámica';
$string['dynamicrules'] = 'Reglas dinámicas';
$string['dynamicrulewarningdeallocation'] = 'Los usuarios sólo pueden ser desasignados si fueron asignados por otra regla dinámica. Las asignaciones manuales no serán afectadas.';
$string['enddate'] = 'Fecha de fin';
$string['entitycertificationusers'] = 'Asignaciones y completudes de usuarios de las certificaciones';
$string['errorallocationsourcenotfound'] = 'La fuente de asignación no fue encontrada';
$string['erroralreadycertified'] = 'El usuario ya fue certificado en esta certificación y con esta fecha de inicio';
$string['errorevaluatinguserallocationstatus'] = 'Error evaluando el estado de asignación del usuario';
$string['errorexpirydatepreviousduedate'] = 'La fecha de vencimiento no puede ser previa a la fecha límite';
$string['errorinvalidpastexpirydate'] = 'La fecha de vencimiento debe ser futura';
$string['errorinvalidpaststartdate'] = 'La fecha de inicio no puede ser en el pasado';
$string['eventrecertificationgraceperiodended'] = 'Periodo de gracia para la re-certificación finalizado';
$string['eventrecertificationstarted'] = 'Re-certificación iniciada';
$string['expired'] = 'Vencida';
$string['expiredcertificationslink'] = '<a href="{$a->href}">{$a->count} certificaciones vencidas</a>';
$string['expireddateisonorafter'] = 'Fecha de vencimiento igual o posterior a';
$string['expireson'] = 'vence el {$a}';
$string['expirydate'] = 'Fecha de vencimiento';
$string['expirydate_help'] = 'Fecha de vencimiento para la certificación';
$string['export_dynamic_rules'] = 'Reglas dinámicas';
$string['export_user_allocations'] = 'Asignaciones de usuarios a la certificación';
$string['export_user_allocations_help'] = 'Incluye las asignaciones de usuarios a estas certificaciones. No se incluye una copia de los usuarios en sí.';
$string['exportonlyallocationspostfix'] = '(sólo asignaciones de usuarios)';
$string['futureallocation'] = 'Asignaciones futuras';
$string['import_content'] = 'Configuración';
$string['import_dynamic_rules'] = 'Reglas dinámicas';
$string['import_programs'] = 'Programas asociados';
$string['import_user_allocations'] = 'Asignaciones de usuarios a la certificación';
$string['import_user_allocations_help'] = 'Incluir las asignaciones de usuarios a estas certificaciones.';
$string['importlogsuccessuserallocations'] = 'Se asignó a el/ la usuario/ a \'{$a->userfullname}\' a la certificación \'{$a->certification}\'';
$string['lastallocationdate'] = 'Última fecha de asignación: {$a}';
$string['manageprograms'] = 'Administrar programas';
$string['markcertificationcompletednotice'] = 'Marcar certificación como completada sin esperar la completud del programa';
$string['never'] = 'Sin límite';
$string['neverexpires'] = 'Nunca vence';
$string['newcertification'] = 'Nueva certificación';
$string['notificationcertificationcompletedexpiry'] = '{$a->expirymessage}
Luego de {$a->reopendate} podrá tomar nuevamente el programa \'{$a->recertificationprogram}\' para mantener vigente su certificación.<br /><br />';
$string['notificationcertificationwillexpireon'] = 'Su Certificación vencerá el {$a}.<br /><br />';
$string['open'] = 'En proceso';
$string['outcomeallocation'] = 'Asignar usuarios a certificaciones';
$string['outcomeallocationdescription'] = 'Asignar usuarios a la certificación {$a}<br />
Mantener la fecha de inicio por defecto de la certificación';
$string['outcomedeallocation'] = 'Desasignar usuarios de certificaciones';
$string['outcomedeallocationdescription'] = 'Desasignar usuarios de la certificación {$a}';
$string['overdue'] = 'Retrasada';
$string['overduecertificationslink'] = '<a href="{$a->href}">{$a->count} certificaciones retrasadas</a>';
$string['pluginname'] = 'Certificaciones';
$string['previouscertexpirydate'] = 'Fecha de vencimiento de la certificación previa';
$string['privacy:metadata:certification_completions'] = 'Información sobre la completud de la certificación.';
$string['privacy:metadata:certification_completions:expirydate'] = 'La fecha de vencimiento de la completud de esta certificación.';
$string['privacy:metadata:certification_completions:timecreated'] = 'La hora en que se creó el registro de finalización.';
$string['privacy:metadata:certification_completions:timemodified'] = 'La hora modificada de finalización de la certificación.';
$string['privacy:metadata:certification_users:currentprogramid'] = 'El programa al que el usuario está asignado';
$string['program'] = 'Programa';
$string['programchangewarning'] = 'Los usuarios que actualmente están tomando este programa no serán reasignados automáticamente. Esto se puede hacer manualmente por usuario. <br>El estado de los usuarios que ya completaron el programa, o de aquellos que se marcaron manualmente como Certificados no cambiará, pero serán removidos del programa anterior y ya no lo verán en su página de inicio.';
$string['programuserallocation'] = 'Asignación de usuario al programa';
$string['recertdifferentprogram'] = 'Elegir un programa diferente';
$string['recertduedaterelative'] = 'Fecha límite';
$string['recertexpirydate'] = 'Fecha de vencimiento';
$string['recertexpirydate_help'] = 'Esta es la fecha en la que la certificación vencerá para el usuario.';
$string['recertexpirydatewarning'] = 'La certificación inicial está configurada para nunca vencer, por lo tanto sólo podrán recertificarse aquellos usuarios cuyas certificaciones hayan sido marcadas a mano como Vencidas.';
$string['recertgraceperiod_help'] = 'El tiempo de gracia es un período extra de tiempo que se le da al usuario para que finalice el programa y logre recertificarse, una vez vencida la certificación. Esta opción sólo está disponible si la recertificación se realiza usando un Programa diferente del que se usa para la Certificación inicial.';
$string['recertification'] = 'Re-certificación';
$string['recertificationgraceperiodendsonorbefore'] = 'El período de gracia para la re-certificación finaliza el';
$string['recertificationprogram'] = 'Programa de re-certificación';
$string['recertificationstartdate'] = 'Fecha de inicio de la re-certificación';
$string['recertificationstartedonorafter'] = 'Re-certificación iniciada en o después de';
$string['recertstartdaterelative'] = 'Fecha de inicio';
$string['recertstartdaterelative_help'] = 'Esta es la fecha en la cual el programa de re-certificación comenzará a estar disponible para el usuario.';
$string['revokewarning'] = '¿Estás seguro de revocar la certificación de \'{$a}\'? No se revocarán los premios que se hayan podido otorgar por la completud.';
$string['schedule'] = 'Fechas de certificación';
$string['selectadifferentprogram'] = 'Elegir un programa diferente';
$string['selectprogram'] = 'Elegir programa';
$string['separatetenantsingroupswarning'] = 'En los cursos compartidos entre Micrositios, los usuarios de cada Micrositio serán agregados a grupos separados.';
$string['startdate'] = 'Fecha de inicio';
$string['startdate_help'] = 'Fecha de inicio de la certificación';
$string['suspended'] = 'Suspendida';
$string['suspendeddateisonorafter'] = 'Fecha de suspensión igual o posterior a';
$string['tagarea_tool_certification'] = 'Certificaciones';
$string['timecreated'] = 'Creada en';
$string['timemodified'] = 'Modificada por última vez el';
$string['timesuspended'] = 'Suspendida el';
$string['uponcompletion'] = 'Al finalizar';
$string['userallocation'] = 'Asignación de usuarios';
$string['usercompletion'] = 'Completud de usuario';
$string['userduedate'] = 'Fecha límite';
$string['userduedate_help'] = 'Seleccione la fecha límite para la certificación de este usuario.';
$string['users'] = 'Usuarios';
$string['usersallocationnotavailable'] = 'La asignación de usuarios no está disponible';
$string['userstartdate'] = 'Fecha de inicio';
$string['userstartdate_help'] = 'Elija la fecha en la que este usuario podrá iniciar la certificación. Esta fecha sólo será aplicada a este usuario.';
