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
 * Strings for component 'tutorialbooking', language 'es', version '4.2'.
 *
 * @package     tutorialbooking
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addstudents'] = 'Añadir participantes';
$string['adminlockhelp'] = 'Seleccionar para hacer que todas las hojas de inscripción estén bloqueadas por defecto';
$string['adminlockprompt'] = 'Seleccionar para bloquear por defecto las hojas de inscripción';
$string['adminnumbershelp'] = 'Introducir el número predeterminado de participantes para las sesiones - puede ser anulado cuando se configuran las sesiones';
$string['adminnumbersprompt'] = 'Seleccionar número predeterminado de participantes';
$string['adminservicehelp'] = 'ADVERTENCIA: activar esto significará que todos los emails y notificaciones serán enviados a los participantes  - cuando está desactivado significa que solamente el administrador principal (id=2) recibirá notificaciones';
$string['adminserviceprompt'] = 'Marcar esta instancia como un servicio Moodle en vivo';
$string['after'] = 'Después de {$a->session}';
$string['ajax_invalid_slots'] = 'Las sesiones no son para la hoja de inscripción correcta';
$string['ajax_slots_not_exist'] = 'Las sesiones no existen';
$string['alreadysignedup'] = 'Ya se ha inscrito en una sesión.';
$string['attendcoltitle'] = 'Asistencia';
$string['attendees'] = 'Participantes';
$string['availabletoadd'] = 'Disponible para añadir';
$string['backtosession'] = 'Mensajes enviados; hacer clic aquí para regresar a lista de inscripción';
$string['cancel'] = 'Cancelar';
$string['completionsignedup'] = 'Los usuarios deben inscribirse en una sesión';
$string['completionsignedupgroup'] = 'Requerir inscribirse';
$string['confirm'] = 'Confirmar';
$string['confirmmessage'] = '¿Está seguro de querer quitar a {$a->name} de {$a->timeslot}?';
$string['confirmremovefromslot'] = '¿Está seguro de querer quitar su inscripción?';
$string['confirmusersignupremoval'] = 'Confirmar borrado de inscripción';
$string['copysession'] = 'Copiar sesión';
$string['cronfixduplicates'] = 'Corregir inscritos duplicados en hoja de inscripción';
$string['defaultdescription'] = 'Sesión {$a}';
$string['deletepageheader'] = 'Confirmar borrado';
$string['deletesession'] = 'Borrar';
$string['deletewarningtext'] = '¿Está seguro de querer borrar "{$a}" ?';
$string['editsession'] = 'Editar';
$string['editsessionheading'] = 'Editar sesión existente';
$string['editsessionhelp'] = 'Para modificar la sesión, por favor rellene el formulario que aparece debajo.';
$string['editspaceserror'] = 'ERROR: no puede reducir el número de lugares  ({$a->spaces}) a menos del número de inscritos ({$a->signedup})';
$string['emailgroupprompt'] = 'Mandar email a participantes';
$string['emailpagetitle'] = 'Mandar email a participantes';
$string['eventexport'] = 'Inscripciones exportadas';
$string['eventexportall'] = 'Todas las inscripciones exportadas';
$string['eventsessionadded'] = 'Sesión añadida';
$string['eventsessiondeleted'] = 'Sesión borrada';
$string['eventsessionmessage'] = 'Usuarios a los que se ha enviado un mensaje en la sesión';
$string['eventsessionupdated'] = 'Sesión actualizada';
$string['eventsignupadded'] = 'Inscripción';
$string['eventsignupcapabilityremoved'] = 'Capacidad para inscribirse perdida';
$string['eventsignupremoved'] = 'Inscripción eliminada';
$string['eventsignupteacheradded'] = 'Inscripción forzada';
$string['eventsignupteacherremoved'] = 'Inscripción revocada';
$string['exportcsvlistallprompt'] = 'Exportar inscripciones de todas las hojas de inscripciones en este curso';
$string['exportlistprompt'] = 'Exportar hoja de inscripción';
$string['first'] = 'Primero';
$string['freespaces'] = 'Lugares libres';
$string['indexnoid'] = 'El id de un curso debe estipularse para ver todas las hojas de inscripción';
$string['instancedesc'] = 'Anotaciones en la hoja de inscripción';
$string['instancedeschelp'] = 'Información que los participantes necesitan conocer cuando se inscriben, como por ejemplo la duración de la sesión.';
$string['instanceheading'] = 'Ajustes generales';
$string['instancenamehelp'] = 'por ejemplo, Tutorial 1 o Laboratorios de ordenador o Tutoriales quincenales';
$string['instancetitle'] = 'Título de hoja de inscripción';
$string['last'] = 'Último';
$string['linktomanagetext'] = 'Gestionar sesiones';
$string['liveservicemsg'] = 'Servicio en vivo reconocido, las notificaciones están siendo enviadas a todos los participantes';
$string['locked'] = 'Desbloquear hoja de inscripción';
$string['lockederror'] = 'La hoja de inscripción está bloqueada. No puede inscribirse en este momento.';
$string['lockedprompt'] = 'Bloqueado';
$string['lockhelp'] = 'Si se bloquea, los usuarios no podrán cambiar inscripciones en esta hoja de inscripción. Bloquearla ahora congelará de manera inmediata las sesiones en su estado actual.';
$string['lockwarning'] = 'La hoja de inscripciones ha sido bloqueada por el profesor. No puede modificar inscripciones a sesiones.';
$string['messageprompt'] = 'Mensaje';
$string['messageprovider:notify'] = 'Notificación de hoja de inscripción';
$string['messagessent'] = 'Mensajes enviados';
$string['messagewillbesent'] = 'Borrando mensaje al participante';
$string['moduleadminname'] = 'Hoja de inscripción';
$string['modulename'] = 'Hoja de inscripción';
$string['modulename_help'] = 'La actividad de hoja de inscripción le permite a los usuarios inscribirse en una sesión individual.

Los profesores pueden:

* Configurar si los nombres de los participantes de una sesión son visibles a otros usuarios.
* Imprimir registros de participantes inscritos en sesiones.
* Generar un archivo CSV de las inscripciones.
* Añadir y quitar manualmente participantes de sesiones.
* Bloquear y desbloquear la opción para inscribirse.
* Enviar un mensaje a todos los inscritos en una sesión.';
$string['modulenameplural'] = 'Hojas de inscripción';
$string['movedownsession'] = 'Mover hacia abajo';
$string['moveslot'] = 'Mover sesión {$a}';
$string['moveupsession'] = 'Mover hacia arriba';
$string['newsessionheading'] = 'Nueva sesión';
$string['newsessionhelp'] = 'Para crear una nueva sesión en la hoja de inscripción de arriba, por favor rellene el formulario que aparece debajo.';
$string['newtimslotprompt'] = 'Añadir nueva sesión';
$string['nosignup'] = 'No está inscrito en la hoja de inscripción.';
$string['noslots'] = 'No hay sesiones para esta hoja de inscripción.';
$string['numbersline'] = '{$a->total} lugares disponibles en total ({$a->taken} usados, {$a->left} libres)';
$string['numbersline_oversubscribed'] = '{$a->total} lugares disponibles en total ({$a->taken} usados, sobre-inscritos por {$a->left})';
$string['option_spaces_high'] = 'El número de lugares debe ser menor que 65536';
$string['option_spaces_low'] = 'El número de lugares debe ser mayor que 0';
$string['oversubscribed'] = 'Hay {$a->freeslots} lugares restantes en {$a->timeslotname}. Intentó añadir {$a->numbertoadd} asistentes.';
$string['oversubscribedby'] = 'Sobre suscrito por';
$string['pagecrumb'] = 'Sesiones';
$string['pagetitle'] = 'Hoja de inscripción';
$string['pluginadministration'] = 'Hoja de inscripción';
$string['pluginname'] = 'Hoja de inscripción';
$string['positionfirst'] = 'Parte superior de la página';
$string['positionlast'] = 'Parte inferior de la página';
$string['positionprompt'] = 'Posición';
$string['privacy'] = 'Privacidad';
$string['privacy:export:messages'] = 'Mensajes';
$string['privacy:export:signups'] = 'Inscripciones';
$string['privacy:metadata:core_message'] = 'Mensajes enviados a participantes a través del sistema de mensajería';
$string['privacy:metadata:tutorialbooking_messages'] = 'Almacena mensajes enviados a participantes mediante el plugin de hoja de inscripción';
$string['privacy:metadata:tutorialbooking_messages:message'] = 'El mensaje que fue enviado';
$string['privacy:metadata:tutorialbooking_messages:sentby'] = 'El usuario que envió el mensaje';
$string['privacy:metadata:tutorialbooking_messages:senttime'] = 'La hora a la que fue enviado el mensaje';
$string['privacy:metadata:tutorialbooking_messages:sentto'] = 'El usuario a quien se envió el mensaje';
$string['privacy:metadata:tutorialbooking_messages:subject'] = 'El asunto del mensaje';
$string['privacy:metadata:tutorialbooking_signups'] = 'Almacena las inscripciones que los participantes han hecho a actividades de hoja de inscripción';
$string['privacy:metadata:tutorialbooking_signups:sessionid'] = 'La sesión en la cual el usuario se inscribió';
$string['privacy:metadata:tutorialbooking_signups:signupdate'] = 'La fecha en la cual el usuario se inscribió';
$string['privacy:metadata:tutorialbooking_signups:userid'] = 'El usuario que se incribió';
$string['privacy_showall'] = 'Los usuarios pueden ver todas las inscripciones';
$string['privacy_showown'] = 'Los usuarios solamente pueden ver sus propias inscripciones';
$string['reasonrequired'] = 'Debe proporcionar la razón por la cual está borrando al participante.';
$string['registerdateline'] = 'Por favor introduzca la fecha de la sesión (dd/mm/aa):):&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;_&nbsp;_&nbsp;&nbsp;_&nbsp;_&nbsp;&nbsp;_&nbsp; _';
$string['registerfooter'] = 'Por favor firme junto a su nombre para indicar asistencia. Si su nombre no está en la lista, por favor NO lo añada sin preguntar antes.';
$string['registerprintdate'] = 'Imprimir registro (por inscripción)';
$string['registerprintname'] = 'Imprimir registro (por nombre)';
$string['removalmessagesubject'] = 'Ha sido borrado de {$a->timeslot}';
$string['removalreason'] = 'Razón del borrado';
$string['remove'] = 'Confirmar borrado';
$string['removefromslot'] = 'Borrar mi inscripción';
$string['removeuserfromslot'] = 'Borrar de esta sesión';
$string['reset'] = 'Deshacer';
$string['save'] = 'Guardar';
$string['saveasnew'] = 'Guardar como nueva sesión';
$string['search:activity'] = 'Hoja de inscripción - información de actividad';
$string['search:session'] = 'Hoja de inscripción - información de sesión';
$string['selectformat'] = 'Seleccionar formato de exportación';
$string['sendmessage'] = 'Enviar mensaje';
$string['sentby'] = 'Remitente';
$string['senttime'] = 'Enviado el';
$string['sentto'] = 'Destinatarios';
$string['sessiondescriptionhelp'] = 'Fecha, hora y lugar, como por ejemplo. 10:00am el Jueves 14 Ago en Salón B35, Escuela de Administración o 10:00am de los Jueves 14 y 21 de Ago y del 4 de Sep en Salón B35, Escuela de Administración.';
$string['sessiondescriptionhelp2'] = '¡Por favor asegúrese de incluir el nombre del edificio!<br/>
¡Los coordinadores del módulo deben asegurarse de que han reservado el salón o aula!';
$string['sessiondescriptionprompt'] = 'Título';
$string['sessionerror'] = '{$a}';
$string['sessionfull'] = 'No hay lugares disponibles, por favor elija otra sesión';
$string['sessionpagetitle'] = 'Gestión de la sesión';
$string['sessionsummaryprompt'] = 'Detalles';
$string['showallmessages'] = 'Mostrar todos los mensajes';
$string['showalltutorialbookings'] = 'Índice de página de inscripción';
$string['showmymessages'] = 'Mostrar sólo mis mensajes';
$string['signupforslot'] = 'Inscribirme para esta sesión';
$string['signuprequired'] = 'Inscribirme a la hoja de inscripción';
$string['spacesprompt'] = 'Número de lugares';
$string['statsline'] = 'La hoja de inscripción tiene {$a->places} lugares, con {$a->signedup} participantes';
$string['studentcoltitle'] = 'Nombre del participante';
$string['subjecttitleprompt'] = 'Asunto';
$string['testservicemsg'] = 'Servicio no en-vivo - notificación siendo enviada a Administradores (id=2)';
$string['thereareno'] = 'No hay hojas de inscripción en este curso';
$string['timeslottitle'] = 'Título de sesión';
$string['totalspaces'] = 'Espacios totales';
$string['tutorialbooking'] = 'Hoja de inscripción';
$string['tutorialbooking:addinstance'] = 'Permitir a un usuario añadir esta actividad a un curso';
$string['tutorialbooking:adduser'] = 'Permitir al usuario añadir participantes a una sesión.';
$string['tutorialbooking:editsignuplist'] = 'Permitir a usuarios editar sesiones.';
$string['tutorialbooking:export'] = 'Permitir a usuarios exportar hojas de inscripción';
$string['tutorialbooking:exportallcoursetutorials'] = 'Necesario para exportar lista para todas las inscripciones en un curso.';
$string['tutorialbooking:message'] = 'Permitir al usuario enviar mensajes a asistentes a través de la actividad de hoja de inscripción.';
$string['tutorialbooking:oversubscribe'] = 'Permitir al usuario añadir participantes a una sesión incluso cuando esto haga que se sobrepase el máximo de lugares.';
$string['tutorialbooking:printregisters'] = 'Permite al usuario imprimir registros para la actividad.';
$string['tutorialbooking:removeuser'] = 'Permitir al usuario borrar participantes de una sesión.';
$string['tutorialbooking:submit'] = 'Necesario para inscribirse en una sesión.';
$string['tutorialbooking:viewadminpage'] = 'Permite al usuario visualizar la página de administración de la actividad.';
$string['tutorialbooking:viewallmessages'] = 'Necesario para ver mensajes que otros usuarios enviaron a asistentes a una sesión.';
$string['unauthorised'] = 'No tiene permiso para apuntarse.';
$string['unlocked'] = 'Bloquear hoja de inscripción';
$string['usedspaces'] = 'Lugares usados';
$string['useralreadysignedup'] = 'El usuario {$a->id} ya está registrado para una sesión.';
$string['userdisplay'] = '{$a->name} ({$a->username})';
$string['viewmessages'] = 'Ver mensajes enviados';
$string['you'] = 'Tú';
$string['yousignedup'] = 'Está inscrito en esta sesión';
