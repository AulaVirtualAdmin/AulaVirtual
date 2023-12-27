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
 * Strings for component 'tool_certification', language 'es', version '4.2'.
 *
 * @package     tool_certification
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['action'] = 'Acción';
$string['actions'] = 'Acciones';
$string['active'] = 'Activa';
$string['activecertifications'] = 'Certificaciones activas';
$string['afteractualcertcompletion'] = 'Después de completar la certificación actual';
$string['afteractualcertcompletionwithrelativedate'] = '{$a} después de completar la certificación actual';
$string['afterallocationdate'] = 'Después de la fecha de asignación';
$string['afterallocationdatewithrelativedate'] = '{$a} después de la fecha de asignación';
$string['aftercompletion'] = 'Después de completar';
$string['aftercompletionwithrelativedate'] = '{$a} después de la completud';
$string['afterduedate'] = 'Después de la fecha límite';
$string['afterduedatewithrelativedate'] = '{$a} después de la fecha límite';
$string['afterlatest'] = 'Después de la última completud vigente o vencida';
$string['afterlatestwithrelativedate'] = '{$a} después de la última completud vigente o vencida';
$string['afterpreviouscertexpdate'] = 'Después de que expire la certificación previa';
$string['afterpreviouscertexpdatewithrelativedate'] = '{$a} después de que expire la certificación previa';
$string['afterstartdate'] = 'Después de la fecha de inicio';
$string['afterstartdatewithrelativedate'] = '{$a} después de la fecha de inicio';
$string['allocatetocertification'] = 'Asignar a la certificación';
$string['allocateusers'] = 'Asignar usuarios';
$string['allocationdate'] = 'Fecha de asignación';
$string['allocationdateisonorafter'] = 'Fecha de asignación en o después de';
$string['allocationenddate'] = 'Fecha de finalización de la asignación';
$string['allocationfor'] = 'Asignación para \'{$a}\'';
$string['allocationsource'] = 'Fuente de la asignación';
$string['allocationstartdate'] = 'Fecha de inicio de la asignación';
$string['allocationwindowenddate'] = 'Fecha de fin';
$string['allocationwindowenddate_help'] = 'Fecha de fin de la ventana de asignación';
$string['allocationwindowendedon'] = 'La ventana de asignación para esta certificación se cerró el {$a}.';
$string['allocationwindowstartdate'] = 'Fecha de inicio';
$string['allocationwindowstartdate_help'] = 'Fecha de inicio para la ventana de asignación';
$string['allocationwindowstartson'] = 'La ventana de asignación para esta certificación inicia el {$a}.';
$string['archive'] = 'Archivar';
$string['archived'] = 'Archivada';
$string['archivedcertifications'] = 'Certificaciones archivadas';
$string['archivedconfirmation'] = '¿Estás seguro de archivar la certificación \'{$a}\'? Una certificación archivada deja de estar disponible para gestores o participantes y puede sólo ser vista en reportes históricos.';
$string['archivedon'] = 'Archivada el';
$string['autocreategroups'] = 'Agregar a grupos del curso';
$string['autocreategroups_help'] = 'Cuando los usuarios están matriculados en los cursos del programa, se pueden agregar automáticamente al mismo grupo. En caso de que se seleccione "para esta certificación", se usará un grupo separado para esta certificación y será diferente de las otras certificaciones que usan el mismo programa.';
$string['autocreategroupsasinprogram'] = 'Como está definido en el programa';
$string['autocreategroupscertification'] = 'Crear grupos para esta certificación';
$string['becamecertified'] = 'Obtuvo la certificación ({$a})';
$string['beforepreviouscertexpdate'] = 'antes de la fecha de vencimiento de la certificación anterior';
$string['calendarduedate'] = 'Fecha límite para la certificación ({$a})';
$string['calendarexpirydate'] = 'Fecha de vencimiento de la certificación {$a}';
$string['certification'] = 'Certificación';
$string['certification:allocateuser'] = 'Permiso para asignar usuarios';
$string['certification:configurecustomfields'] = 'Configurar los campos personalizados de las certificaciones';
$string['certification:edit'] = 'Permiso para editar';
$string['certificationfullname'] = 'Nombre completo de la certificación';
$string['certificationfullname_help'] = 'Nombre completo de la certificación';
$string['certificationidnumber'] = 'Número ID de la certificación';
$string['certificationidnumber_help'] = 'El número ID de una certificación sólo se usa para integraciones con sistemas externos y no se muestra en ninguna parte del sitio. Si la certificación tiene un código oficial se puede ingresar, de lo contrario, el campo puede dejarse en blanco.';
$string['certificationname'] = 'Nombre de la certificación';
$string['certificationnamewitheditlink'] = 'Nombre de certificación con enlace para editar';
$string['certificationprogress'] = 'Avance de la certificación';
$string['certificationprogressexport'] = '{$a} avance de la certificación';
$string['certificationrules'] = 'Reglas de la certificación';
$string['certifications'] = 'Certificaciones';
$string['certificationscustomfield'] = 'Campos personalizados para certificaciones';
$string['certificationstatus'] = 'Estado de la certificación';
$string['certificationstatus_help'] = 'Estado de la certificación actual';
$string['certificationtags'] = 'Marcas de certificación';
$string['certificationtags_help'] = 'Marcas para esta certificación';
$string['certificationtenant'] = 'Micrositio de la certificación';
$string['certificationuserlog'] = '{$a} registro de actividad';
$string['certificationuserlogempty'] = 'No hay registros para la certificación de este usuario.';
$string['certificationuserlogfilename'] = '{$a->user} registro de actividad {$a->certification}';
$string['certified'] = 'Certificado';
$string['certifiedby'] = 'Certificado por';
$string['certifiedcertificationslink'] = '<a href="{$a->href}">{$a->count} certificaciones certificadas</a>';
$string['certifieddate'] = 'Fecha de certificación';
$string['certifieddateisonorafter'] = 'La fecha de certificación es en o después de';
$string['certifiednotification'] = 'El usuario fue satisfactoriamente certificado';
$string['certifiedtype'] = 'Tipo de certificación';
$string['certify'] = 'Certificar';
$string['certifyexpirydate'] = 'Fecha de vencimiento';
$string['certifyexpirydate_help'] = 'Seleccioná una fecha de vencimiento para este usuario certificado entre \'Predeterminado\' (muestra la configuración de la certificación actual), \'Nunca\' o una fecha personalizada.';
$string['certifyuser'] = 'Certificar usuario';
$string['completedtheprogram'] = 'Completó el programa {$a}';
$string['conditioncertificationcertified'] = 'Certificación acreditada';
$string['conditioncertificationcertifieddescription'] = 'Usuarios que están certificados en la certificación: \'{$a->fullname}\'<br />';
$string['conditioncertificationcertifieddescriptionall'] = 'Usuarios que están certificados en las siguientes certificaciones: \'{$a->fullname}\'<br />';
$string['conditioncertificationcertifieddescriptionallwithdate'] = 'Usuarios que están certificados en las siguientes certificaciones: \'{$a->fullname}\'<br />
La fecha de certificación es igual o posterior a \'{$a->conditiondate}\'';
$string['conditioncertificationcertifieddescriptionany'] = 'Usuarios que están certificados en al menos una de las siguientes certificaciones: \'{$a->fullname}\'';
$string['conditioncertificationcertifieddescriptionanywithdate'] = 'Usuarios que están certificados en al menos una de las siguientes certificaciones: \'{$a->fullname}\'<br />
La fecha de certificación es igual o posterior a \'{$a->conditiondate}\'';
$string['conditioncertificationcertifieddescriptiononrecert'] = 'Ejecutar para cada recertificación';
$string['conditioncertificationcertifieddescriptionstatusonly'] = 'Ejecutar sólo en el cambio de estatus';
$string['conditioncertificationcertifieddescriptionwithdate'] = 'Usuarios que se encuentran certificados en la certificación \'{$a->fullname}\'<br />
La fecha de certificación es en o después de \'{$a->conditiondate}\'';
$string['conditioncertificationcertifiedonrecert'] = 'Siempre ejecutar acciones en todas las recertificaciones';
$string['conditioncertificationcertifiedonrecert_help'] = 'Esto cambiará efectivamente la condición <b>"El usuario está certificado y el período de recertificación no está abierto"</b>. Esto garantizará que el usuario se marque como "no coincidente" cuando se habilite la recertificación y que las acciones se ejecuten para éste nuevamente al finalizar el programa, incluso si continúa certificado todo el tiempo.';
$string['conditioncertificationcertifiedstatusonly'] = 'Sólo ejecutar acciones cuando el estado del usuario cambie de "no certificado" a "certificado"';
$string['conditioncertificationcertifiedstatusonly_help'] = 'En este caso las acciones pueden o no ejecutarse en la recertificación, dependiendo de si la certificación anterior ha vencido o no. Para asegurarte de que las acciones <b>nunca</b> se ejecuten durante la recertificación, considerá establecer el "Límite de acción de la regla" en la configuración de la regla.';
$string['conditioncertificationexpired'] = 'Certificación vencida';
$string['conditioncertificationexpireddescription'] = 'Usuarios que tienen vencida la certificación \'{$a}\'';
$string['conditioncertificationexpireddescriptionwithdate'] = 'Usuarios que tienen vencida la certificación \'{$a->fullname}\' <br />
La fecha de vencimiento es igual o posterior a \'{$a->conditiondate}\'';
$string['conditioncertificationnotcertified'] = 'Certificación no certificada';
$string['conditioncertificationnotcertifieddescription'] = 'Usuarios que no están certificados en la certificación \'{$a}\'';
$string['conditioncertificationoverdue'] = 'Certificación pendiente';
$string['conditioncertificationoverduedescription'] = 'Usuarios que tienen atrasada la certificación \'{$a}\'';
$string['conditioncertificationoverduedescriptionwithdate'] = 'Usuarios que tienen atrasada la certificación \'{$a->fullname}\'<br />
La fecha de atrasado es en o después del \'{$a->conditiondate}\'';
$string['conditioncertificationsuspended'] = 'Certificación suspendida';
$string['conditioncertificationsuspendeddescription'] = 'Usuarios que están suspendidos en la certificación \'{$a}\'';
$string['conditioncertificationsuspendeddescriptionwithdate'] = 'Usuarios que tienen atrasada la certificación \'{$a->fullname}\'<br />
La fecha de atrasado es en o después del \'{$a->conditiondate}\'';
$string['conditionrecertificationgraceperiod'] = 'Termina el período de gracia de la recertificación';
$string['conditionrecertificationgraceperiodendsdescription'] = 'Usuarios cuyo período de gracia finaliza para la certificación \'{$a->fullname}\'';
$string['conditionrecertificationgraceperiodendsdescriptionwithdate'] = 'Usuarios cuyo período de gracia finaliza para la certificación \'{$a->fullname}\'<br /> El período de gracia de la recertificación termina en o antes del \'{$a->conditiondate}\'';
$string['conditionrecertificationstarted'] = 'Comenzó el período de recertificación';
$string['conditionrecertificationstarteddescription'] = 'Usuarios que comenzaron el período de recertificación en la certificación \'{$a->fullname}\'';
$string['conditionrecertificationstarteddescriptionwithdate'] = 'Usuarios que comenzaron el período de recertificación para la certificación \'{$a->fullname}\'<br />
La recertificación comenzó en o después de \'{$a->conditiondate}\'';
$string['conditionuserallocated'] = 'Usuarios asignados a la certificación';
$string['conditionuserallocateddescription'] = 'Usuarios asignados a la certificación \'{$a}\'';
$string['conditionuserallocateddescriptionwithdate'] = 'Usuarios asignados a la certificación \'{$a->fullname}\'<br />
La fecha de asignación es en o después del \'{$a->conditiondate}\'';
$string['conditionusernotallocated'] = 'Usuarios no asignados a la certificación';
$string['conditionusernotallocateddescription'] = 'Usuarios no asignados a la certificación \'{$a}\'';
$string['confirmdeallocateusers'] = 'Esta acción eliminará completamente las asignaciones y los datos asociados de todos los usuarios seleccionados. Esta acción no puede deshacerse.';
$string['confirmdeallocateusersheader'] = 'Desasignar usuarios';
$string['confirmdeletecertification'] = '¿Estás seguro de eliminar la certificación \'{$a}\' y todos los datos asociados? Esta acción no puede deshacerse.';
$string['confirmdeleteuserallocation'] = '¿Estás seguro de querer eliminar por completo la asignación del usuario \'{$a}\' y los datos asociados? Esta acción no se puede deshacer.';
$string['confirmduplicate'] = 'Se creará una copia de la configuración de la certificación y podrá cambiarse el programa y otras propiedades. No se transferirán asignaciones de usuario a la copia.';
$string['content'] = 'Contenido';
$string['criteriaall'] = 'Todas las certificaciones seleccionadas han sido certificadas';
$string['criteriaany'] = 'Al menos una de las certificaciones seleccionadas fue certificada';
$string['criteriaany_help'] = 'Cuando un usuario ya se ha certificado en alguna de las certificaciones, no vuelve a desencadenar las acciones cuando certifique en la segunda certificación';
$string['criteriaeach'] = 'Cada vez que un usuario certificada en alguna de las certificaciones seleccionadas';
$string['criteriaeach_help'] = 'Equivalente a crear varias reglas, una para cada una de las certificaciones seleccionadas';
$string['currentprogram'] = 'Programa en curso';
$string['currentprogram_help'] = 'Este es el programa que el usuario está cursando';
$string['currentprogramprogress'] = 'Progreso del programa actual';
$string['currentprogramstatus'] = 'Estado del programa actual';
$string['dateoverrided'] = 'Fecha anulada';
$string['dayssinceallocation'] = 'Días desde la asignación';
$string['daystakingcertification'] = 'Días cursando la certificación';
$string['deallocateusers'] = 'Desasignar usuarios';
$string['default'] = 'Defecto';
$string['deleteallocation'] = 'Borrar asignación';
$string['deleteuserallocation'] = 'Borrar asignación de usuario';
$string['displaycertificationdate'] = 'Fecha de certificación';
$string['displaycertificationduedate'] = 'Fecha de atraso de la certificación';
$string['displaycertificationid'] = 'ID interno de certificación utilizado en las URLs';
$string['displaycertificationname'] = 'Nombre de la certificación';
$string['displaycertificationprogramname'] = 'Nombre del programa inicial para esta certificación';
$string['displaycertificationreopen'] = 'Fecha de inicio de la recertificación';
$string['displayexpirydate'] = 'Fecha de expiración de la certificación';
$string['displayexpirydatetimestamp'] = 'Timestamp de expiración de la certificación';
$string['displaygraceperiodend'] = 'Fecha de cierre del período de gracia';
$string['displayrecertificationprogramname'] = 'Nombre del programa de la recertificación';
$string['dontchange'] = 'No cambiar';
$string['duedate'] = 'Fecha de atraso';
$string['duedate_help'] = 'Fecha en la que la certificación está atrasada';
$string['duedateisonorafter'] = 'Fecha de atraso en o después de';
$string['duplicate'] = 'Duplicado';
$string['dynamic'] = 'Dinámico';
$string['dynamicrules'] = 'Reglas dinámicas';
$string['dynamicrulesplugincheck'] = 'Ver la lista de reglas dinámicas es imposible sin el plugin tool_dynamicrules';
$string['dynamicrulewarningdeallocation'] = 'Los usuarios sólo pueden desasignarse si habían sido asignados por otra regla dinámica. Las asignaciones manuales no se verán afectadas.';
$string['editallocation'] = 'Editar asignación';
$string['editcertificationname'] = 'Editar el nombre de la certificación';
$string['editstatusanddates'] = 'Editar estatus y fechas';
$string['editstatusanddatesbulk'] = 'Editar estatus y fechas para múltiples usuarios';
$string['enddate'] = 'Fecha de cierre';
$string['entitycertification'] = 'Certificación';
$string['entitycertificationusers'] = 'Asignaciones y completudes de la certificación';
$string['errorallocatinguserintorelatedprogram'] = 'No se puede asignar el usuario al programa relacionado';
$string['errorallocationsourcenotfound'] = 'Fuente de asignación no encontrada';
$string['erroralreadycertified'] = 'Usuario ya certificado en esta certificación con esta fecha de inicio.';
$string['errorcannotallocate'] = 'No se puede asignar el usuario a la certificación (la asignación ya existe o no está permitida)';
$string['errorcantdeletecertification'] = 'No puede borrarse la certificación';
$string['errorcantdeletenotarchivedcertification'] = 'No puede borrarse una certificación no archivada';
$string['errorcantmanageusers'] = 'No se pueden gestionar usuarios';
$string['errorcantrestorecertification'] = 'No se puede restaurar la certificación';
$string['errorcertificationsdontexist'] = 'Algunas certificaciones no existen';
$string['errorcouldnotallocate'] = 'No se puede asignar el usuario \'{$a->originaluserfullname}\' a la certificación \'{$a->certification}\'';
$string['errorevaluatinguserallocationstatus'] = 'Error al evaluar el estatus de los usuarios asignados';
$string['errorexpirydatepreviousduedate'] = 'La fecha de expiración no puede ser anterior a la fecha de atraso';
$string['erroridnumberuniquetenant'] = 'Este número de ID ya ha sido utilizado en otra certificación';
$string['errorinvalidcertification'] = 'Certificación inválida';
$string['errorinvaliddate'] = 'Fecha inválida';
$string['errorinvalidpastexpirydate'] = 'La fecha de expiración no puede ser pasada';
$string['errorinvalidpaststartdate'] = 'La fecha de inicio no puede ser en el pasado';
$string['errorinvalidtimecertified'] = 'La fecha de certificación no puede ser en el futuro.';
$string['errormissingassociatedprogram'] = 'Falta el programa asociado';
$string['errornopermissionallocateusers'] = 'No tenés permiso para asignar usuarios a la certificación';
$string['errornopermissioncertifyuser'] = 'Este usuario no se puede marcar como certificado porque ya está marcado como certificado o porque no tenés permiso para realizar esta acción';
$string['errornopermissionmanagecertifications'] = 'No tenés permisos para gestionar certificaciones';
$string['errornopermissionviewallocatedusers'] = 'No tenés permisos para ver los usuarios asignados a la certificación';
$string['errornopermissionviewreports'] = 'No tenés permisos para ver reportes';
$string['errornothingtoexportforcertifications'] = 'Nada que exportar para las certificaciones compartidas: {$a}';
$string['errorrecertificationprogram'] = 'El programa debe ser diferente al programa inicial';
$string['errorreporttypedoesnotexist'] = 'Este tipo de reporte no existe';
$string['errorsameidnumber'] = 'Ya existe una certificación con este número de ID';
$string['erroruseralreadyallocatedincertification'] = 'Usuario ya asignado a la certificación';
$string['erroruseralreadyallocatedinprogram'] = 'Usuario ya asignado al programa';
$string['errorusernotinsametenant'] = 'El usuario no se encuentra en el mismo micrositio';
$string['eventcertificationcompleted'] = 'Certificación completada';
$string['eventcertificationcreated'] = 'Certificación creada';
$string['eventcertificationdeleted'] = 'Certificación eliminada';
$string['eventcertificationupdated'] = 'Certificación actualizada';
$string['eventrecertificationgraceperiodended'] = 'El período de gracia de la recertificación ha finalizado';
$string['eventrecertificationstarted'] = 'Comenzó la recertificación';
$string['eventuserallocated'] = 'Fue asignado a la certificación';
$string['eventuserdeallocated'] = 'Usuario desasignado';
$string['eventuserupdated'] = 'Asignación del usuario actualizada';
$string['expired'] = 'Expirada';
$string['expiredcertificationslink'] = '<a href="{$a->href}">{$a->count} certificaciones expiradas</a>';
$string['expireddateisonorafter'] = 'Fecha de expiración en o después del';
$string['expireson'] = 'expira el {$a}';
$string['expirydate'] = 'Fecha de expiración';
$string['expirydate_help'] = 'Fecha de expiración para la certificación';
$string['export_content'] = 'Ajustes';
$string['export_content_help'] = 'Certificaciones, nombres, descripciones, fechas, etiquetas, etc.';
$string['export_dynamic_rules'] = 'Reglas dinámicas';
$string['export_dynamic_rules_help'] = 'Todas las configuraciones de las reglas dinámicas para estas certificaciones';
$string['export_programs'] = 'Programas asociados';
$string['export_programs_help'] = 'Programas, nombres, descripciones, fechas, etiquetas, etc.';
$string['export_user_allocations'] = 'Asignaciones de usuarios a la certificación';
$string['export_user_allocations_help'] = 'Incluye asignaciones de usuarios a estas certificaciones. No se incluirá una copia de los propios usuarios.';
$string['exportcertificationsdescription'] = 'Certificaciones con sus programas asociados, cursos, asignación de usuarios y reglas dinámicas';
$string['exportonlyallocationspostfix'] = '(sólo usuarios asignados)';
$string['fullcertificationreport'] = 'Informe de certificación completo';
$string['futureallocation'] = 'Asignación futura';
$string['gotocertification'] = 'Ir a la certificación';
$string['idnumber'] = 'Número ID';
$string['import_content'] = 'Ajustes';
$string['import_content_help'] = 'Certificaciones, nombres, descripciones, fechas, etiquetas, etc.';
$string['import_dynamic_rules'] = 'Reglas dinámicas';
$string['import_dynamic_rules_help'] = 'La configuración de todas las reglas dinámicas para estos programas.';
$string['import_programs'] = 'Programas asociados';
$string['import_programs_help'] = 'Programas, nombres, descripciones, fechas, etiquetas, etc.';
$string['import_user_allocations'] = 'Asignaciones de usuarios a la certificación';
$string['import_user_allocations_help'] = 'Incluye las asignaciones de usuario en estas certificaciones.';
$string['importcannotallocate'] = 'No es posible asignar el usuario \'{$a->originaluserfullname}\' a la certificación \'{$a->certification}\', la asignación ya existe o bien no está permitida';
$string['importlogfailed'] = 'No se pudo importar la certificación \'{$a->fullname}\'';
$string['importlogidnumberexists'] = 'La certificación con el número ID \'{$a->originalidnumber}\' ya existe';
$string['importlogsuccess'] = 'Se creó una nueva certificación \'<a href="{$a->url}">{$a->fullname}</a>\'';
$string['importlogsuccessuserallocations'] = 'Se asignó al usuario \'{$a->userfullname}\' a la certificación \'{$a->certification}\'';
$string['include_shared_entities'] = 'Incluye entidades compartidas';
$string['include_shared_entities_help'] = 'Al habilitar esta opción, el archivo exportado también contendrá:

* Todas las certificaciones (compartidas) disponibles en el micrositio actual
* Todos los programas vinculados a las certificaciones seleccionadas
* Todos los cursos del programa que estén fuera de la categoría de cursos del micrositio actual';
$string['isrecertification'] = 'Es recertificación';
$string['keepcertificationdefaults'] = 'Mantener los valores predeterminados de la certificación';
$string['lastallocationdate'] = 'Última fecha de asignación: {$a}';
$string['lessthanaday'] = 'Menos de un día';
$string['managedusersoverdue'] = 'Algunos miembros del equipo tienen certificaciones pasadas de fecha.';
$string['manageprograms'] = 'Gestionar programas';
$string['manual'] = 'Manual';
$string['manuallycertifieduser'] = 'Manualmente certificado {$a->usertarget} ({$a->expirydate})';
$string['mappingerrorcertificationnotfound'] = 'La certificación {$a} no pudo ser encontrada';
$string['mappingnoticenoidnumber'] = 'La certificación se localizó por nombre debido a que el número de ID estaba vacío. Se recomienda asignar números de ID a las certificaciones';
$string['markcertificationcompletednotice'] = 'Marcar la certificación como completada sin esperar la completud del programa';
$string['messageprovider:certificationcompleted'] = 'Certificación completada';
$string['messageprovider:certificationuserallocated'] = 'Usuario asignado a la certificación';
$string['messageprovider:certificationuserdeallocated'] = 'Usuario desasignado de la certificación';
$string['missingcertification'] = 'Certificación no encontrada';
$string['missingfullname'] = 'Falta el nombre completo';
$string['missingprogram'] = 'Falta el programa';
$string['never'] = 'Nunca';
$string['neverexpires'] = 'Nunca expira';
$string['newcertification'] = 'Nueva certificación';
$string['newvaluefor'] = 'Nuevo valor para';
$string['notavailable'] = 'No disponible';
$string['notificationcertification'] = 'Este programa es parte de la certificación \'{$a->certificationname}\'.<br /><br />';
$string['notificationcertificationcompletedexpiry'] = '{$a->expirymessage}
Después de {$a->reopendate} estarás habilitado para cursar de nuevo el programa \'{$a->recertificationprogram}\' para conservar tu certificación.<br /><br />';
$string['notificationcertificationcompletedmanual'] = 'Hola {$a->userfullname},<br /><br />
Felicitaciones por alcanzar la certificación en \'{$a->certificationname}\'!<br /><br />
{$a->expirymessage}
{$a->sitename}<br />
{$a->siteurl}';
$string['notificationcertificationcompletedprogram'] = 'Hola {$a->userfullname},<br /><br />
Felicitaciones por completar el programa \'{$a->programname}\'. Ahora te encontrás certificado en \'{$a->certificationname}\'!<br /><br />
Podés volver a visitar los cursos del programa en cualquier momento. El programa completo se puede encontrar en la página \'Mis cursos\'.<br /><br />
{$a->expirymessage}
{$a->sitename}<br />
{$a->siteurl}';
$string['notificationcertificationdue'] = 'Este programa está asociado a la certificación \'{$a->certificationname}\', que vence el {$a->duedate}.<br /><br />';
$string['notificationcertificationuserallocated'] = 'Hola {$a->userfullname},<br /><br />
Bienvenido al programa \'{$a->programname}\', disponible en la página \'Mis cursos\'.<br /><br />
{$a->certmsg}<br /><br />
{$a->sitename}<br />
{$a->siteurl}';
$string['notificationcertificationuserdeallocated'] = 'Hola {$a->userfullname},<br /><br />
El programa \'{$a->programname}\' se encuentra cerrado y ya no se puede acceder a él.<br /><br />
{$a->sitename}<br />
{$a->siteurl}';
$string['notificationcertificationwillexpireon'] = 'Tu certificación expirará el {$a}.<br /><br />';
$string['notificationsubjectcertificationcompleted'] = 'Certificación \'{$a}\' completada';
$string['notificationsubjectcertificationcompletedmanual'] = '¡Felicitaciones - \'{$a}\' certificación!';
$string['notificationsubjectcertificationuserallocated'] = 'Bienvenido a \'{$a}\'';
$string['notificationsubjectcertificationuserdeallocated'] = '\'{$a}\' cerrada';
$string['notset'] = 'Sin ajustar';
$string['nousersselected'] = 'Por favor, seleccionar al menos un usuario';
$string['ongoingcertificationslink'] = '<a href="{$a->href}">{$a->count} certificaciones en curso</a>';
$string['open'] = 'Abierta';
$string['outcomeallocation'] = 'Asignar usuarios a las certificaciones';
$string['outcomeallocationdescdate'] = 'Asignar usuarios a certificación {$a->certificationname}<br />
{$a->startdatestr}<br />
Con usuarios suspendidos: {$a->suspendedusers}';
$string['outcomeallocationdesckeepdate'] = 'Quitar suspensión y mantener la fecha de inicio de certificación existente';
$string['outcomeallocationdesckeepstartdate'] = 'Mantener la fecha de comienzo de certificación por defecto';
$string['outcomeallocationdescription'] = 'Asignar usuarios a la certificación {$a}<br />
Mantener la fecha de inicio por defecto de la certificación';
$string['outcomeallocationdescstartdate'] = 'Fecha de comienzo de certificación: "{$a->startdate}"';
$string['outcomeallocationdescsuspendchangedate'] = 'Quitar suspensión y cambiar la fecha de inicio de certificación';
$string['outcomeallocationdontmodify'] = 'No modificar asignaciones';
$string['outcomeallocationsuspendedusers'] = 'Con alumnos suspendidos';
$string['outcomeallocationsuspendedusers_help'] = 'Acción a realizar cuando los usuarios se han asignado pero su asignación se ha suspendido o ha terminado';
$string['outcomeallocationunsuspend'] = 'Quitar suspensión, dejar la fecha de inicio de certificación existente';
$string['outcomeallocationunsuspendchangedate'] = 'Quitar suspensión, cambiar la fecha de inicio de certificación';
$string['outcomedeallocate'] = 'Desasignar al usuario de la certificación';
$string['outcomedeallocatesuspend'] = 'Suspender la asignación existente';
$string['outcomedeallocation'] = 'Desasignar a los usuarios de las certificaciones';
$string['outcomedeallocationdescription'] = 'Desasignar a los usuarios de la certificación {$a}';
$string['outcomedeallocationdescriptionsuspend'] = 'Suspender las asignaciones de usuario existentes de la certificación "{$a}"';
$string['overdue'] = 'Atrasada';
$string['overduecertifications'] = 'Certificaciones pasadas de fecha';
$string['overduecertificationslink'] = '<a href="{$a->href}">{$a->count} certificaciones atrasadas</a>';
$string['pluginname'] = 'Certificaciones';
$string['previewcertificationname'] = 'Vista previa del nombre de la certificación';
$string['previouscertexpirydate'] = 'Fecha de vencimiento de la certificación anterior';
$string['privacy:metadata:certification_completions'] = 'Información sobre la completud de la certificación.';
$string['privacy:metadata:certification_completions:certificationid'] = 'La certificación que el usuario completó.';
$string['privacy:metadata:certification_completions:certifiedby'] = 'El usuario que generó la certificación';
$string['privacy:metadata:certification_completions:expirydate'] = 'La fecha de expiración de la completud de esta certificación.';
$string['privacy:metadata:certification_completions:revokedby'] = 'El usuario que revoca la certificación';
$string['privacy:metadata:certification_completions:timecertified'] = 'La hora en la que el usuario completó la certificación.';
$string['privacy:metadata:certification_completions:timecreated'] = 'La hora en que se creó el registro de finalización.';
$string['privacy:metadata:certification_completions:timemodified'] = 'La hora de la completud de la certificación modificada.';
$string['privacy:metadata:certification_completions:userid'] = 'El usuario que completó la certificación.';
$string['privacy:metadata:certification_users'] = 'Información sobre la asignación del usuario a la certificación.';
$string['privacy:metadata:certification_users:certificationid'] = 'La certificación asignada a.';
$string['privacy:metadata:certification_users:currentprogramid'] = 'El usuario está asignado al programa actual';
$string['privacy:metadata:certification_users:isrecertification'] = 'Si el usuario está en la recertificación';
$string['privacy:metadata:certification_users:status'] = 'Si el usuario ha sido suspendido de la certificación.';
$string['privacy:metadata:certification_users:timemodified'] = 'El horario modificado de la asignación del usuario.';
$string['privacy:metadata:certification_users:userid'] = 'El usuario asignado.';
$string['privacy:metadata:core_tag'] = 'Marcas agregadas a la certificación';
$string['program'] = 'Programa';
$string['programchangewarning'] = 'Los usuarios que actualmente están tomando este programa no serán reasignados automáticamente. Esto se puede hacer manualmente por usuario. El estado de los usuarios que ya completaron el programa, o aquellos que fueron marcados manualmente como certificados, no cambiará, pero serán desasignados del programa anterior y ya no lo verán en su tablero.';
$string['programcourse'] = 'Curso del programa';
$string['programuserallocation'] = 'Asignación de usuario al programa';
$string['progress'] = '{$a} completada';
$string['progressreport'] = 'Reporte del progreso';
$string['recertdifferentprogram'] = 'Seleccioná un programa diferente';
$string['recertdifferentprogram_help'] = 'Seleccioná \'Sí\' si deseás elegir un programa diferente para la recertificación que el que está establecido como programa inicial.';
$string['recertduedaterelative'] = 'Fecha de vencimiento';
$string['recertduedaterelative_help'] = 'Esta es la fecha en la que vence la recertificación';
$string['recertexpirydate'] = 'Fecha de vencimiento';
$string['recertexpirydate_help'] = 'Esta es la fecha en que la recertificación vencerá para el usuario.';
$string['recertexpirydatewarning'] = 'La certificación inicial está configurada para que nunca expire, la recertificación sólo será posible para aquellos usuarios cuya fecha de vencimiento fue ajustada individualmente.';
$string['recertgraceperiod'] = 'Período de gracia';
$string['recertgraceperiod_help'] = 'El período de gracia es un plazo extra que damos al usuario para que complete el programa y certifique, después de que la certificación anterior haya vencido. Esta opción sólo está disponible si el programa de la recertificación es diferente al programa inicial.';
$string['recertgraceperiodends'] = 'Termina el período de gracia';
$string['recertification'] = 'Recertificación';
$string['recertificationgraceperiodendsonorbefore'] = 'El período de gracia para la recertificación termina en o después de';
$string['recertificationprogram'] = 'Programa de la recertificación';
$string['recertificationprogram_help'] = 'Seleccioná un programa para la recertificación. Este programa debe ser diferente al inicial.';
$string['recertificationstartdate'] = 'Fecha de inicio de la recertificación';
$string['recertificationstartedonorafter'] = 'La recertificación comenzó en o después de';
$string['recertstartdaterelative'] = 'Fecha de inicio';
$string['recertstartdaterelative_help'] = 'Esta es la fecha en la que el programa de la recertificación estará disponible para el usuario.';
$string['recertstartdatewarning'] = 'En esta fecha se reiniciará el programa de recertificación. Asegurate de que los usuarios no estén matriculados en los cursos del programa asociado, asignados directamente al mismo programa o asignados a través de otras certificaciones porque pueden perder su progreso.';
$string['reg_wpcertifications'] = 'Número de certificaciones ({$a})';
$string['requirerecertification'] = 'Requiere recertificación';
$string['requirerecertification_help'] = 'Seleccioná \'Sí\' para habilitar la recertificación para esta certificación,';
$string['resetadditionalcourses'] = 'Restabecer cursos adicionales';
$string['resetadditionalcourses_help'] = 'Restablece los cursos que son parte del nuevo programa que no formaban parte del programa anterior';
$string['restore'] = 'Restaurar';
$string['revokecertification'] = 'Revocar certificación';
$string['revoked'] = 'Revocada';
$string['revokedby'] = 'Revocada por';
$string['revokednotification'] = 'La certificación fue satisfactoriamente revocada.';
$string['revokedon'] = 'Revocado en';
$string['revokedthisuser'] = 'Certificación de {$a} revocada';
$string['revokewarning'] = '¿Estás seguro de revocar la certificación de \'{$a}\'? No se revocarán los premios que se hayan podido otorgar por la completud.';
$string['rolemanager'] = 'Gestor de certificación';
$string['rolemanagerdescription'] = 'Permite crear y gestionar certificaciones dentro del micrositio actual, y asignarles usuarios';
$string['schedule'] = 'Fechas de certificación';
$string['selectactiveandarchivedcertifications'] = 'Seleccioná certificaciones activas y archivadas';
$string['selectadifferentprogram'] = 'Seleccioná un programa diferente';
$string['selectallactivecertifications'] = 'Seleccioná todas las certificaciones activas';
$string['selectallcertificationsinthisfile'] = 'Seleccioná todas las certificaciones en este archivo';
$string['selectatleastonecertification'] = 'Seleccioná al menos una certificación';
$string['selectcertificationcondition'] = 'Certificación';
$string['selectcertificationcondition_help'] = 'Seleccioná la certificación en la que esta condición aplicará';
$string['selectcertificationoutcome'] = 'Certificación';
$string['selectcertificationoutcome_help'] = 'Seleccioná una certificación en la que aplicará esta acción';
$string['selectcertificationstoallocate'] = 'Certificaciones';
$string['selectcertificationstoallocate_help'] = 'Seleccioná las certificaciones en las que los usuarios serán asignados';
$string['selectdate'] = 'Seleccioná la fecha';
$string['selectmanually'] = 'Seleccioná manualmente...';
$string['selectprogram'] = 'Seleccioná el programa';
$string['selectprogram_help'] = 'Seleccioná un programa para asociar a esta certificación';
$string['separatetenantsingroupswarning'] = 'En los cursos compartidos por micrositios, los usuarios de cada micristio se agregarán en grupos separados.';
$string['startdate'] = 'Fecha de inicio';
$string['startdate_help'] = 'Fecha en la que comienza la certificación';
$string['status'] = 'Estatus';
$string['suspended'] = 'Suspendida';
$string['suspendeddateisonorafter'] = 'Fecha de suspensión en o después de';
$string['system'] = 'Sistema';
$string['tagarea_tool_certification'] = 'Certificaciones';
$string['tags'] = 'Marcas';
$string['timecreated'] = 'Creada en';
$string['timemodified'] = 'Modificada por última vez el';
$string['timesuspended'] = 'Suspendida el';
$string['toomanycertificationstoshow'] = 'Demasiadas certificaciones para mostrar';
$string['uponcompletion'] = 'Al finalizar';
$string['userallocation'] = 'Asignación de usuario';
$string['usercompletion'] = 'Completud de usuario';
$string['userduedate'] = 'Fecha de vencimiento';
$string['userduedate_help'] = 'Seleccioná la fecha de vencimiento de la certificación para este usuario.';
$string['usergotsuspended'] = 'El usuario fue suspendido';
$string['userlist'] = 'Seleccioná usuarios';
$string['userlist_help'] = 'Seleccioná usuarios para asignarlos a esta certificación';
$string['users'] = 'Usuarios';
$string['usersallocationnotavailable'] = 'Asignación de usuarios no está disponible';
$string['usersdeallocatedsuccess'] = '{$a} usuario(s) fueron satisfactoriamente desasignados';
$string['userseditedsuccess'] = '{$a} usuario(s) fueron satisfactoriamente modificados';
$string['usersskipped'] = '{$a} usuario(s) pasado(s) por alto porque esta opción no está disponible para ellos';
$string['userstartdate'] = 'Fecha de inicio';
$string['userstartdate_help'] = 'Seleccioná la fecha en la que este usuario podrá iniciar la certificación. Esta fecha sólo aplicará a este usuario.';
$string['userstatus'] = 'Estatus';
$string['userstatus_help'] = 'El estado suspendido ocultará esta certificación a este usuario, mientras que el estado predeterminado la mostrará.';
$string['viewcertificationuserlog'] = 'Registros de actividad de certificación';
