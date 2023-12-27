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
 * Strings for component 'local_reminders', language 'es', version '4.2'.
 *
 * @package     local_reminders
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['activityconfduein'] = 'Vence en';
$string['activityconfexplicitenable'] = 'Activación de recordatorio explícito';
$string['activityconfexplicitenabledesc'] = 'Si está marcado, los profesores o las autoridades pertinentes deben habilitar <strong>explícitamente</strong> los recordatorios para cada actividad en la página de configuración de recordatorios del curso. Por eso, todos los recordatorios de actividad estarán deshabilitados de forma predeterminada, independientemente del horario definido a continuación. De todos modos, esta configuración no afectará a los recordatorios vencidos.';
$string['activityconfexplicitenablehint'] = 'El administrador del sitio ha desactivado el envío de recordatorios de actividad de forma predeterminada. Eso significa que los profesores deben <em>explícitamente</em> habilitar recordatorios para actividades en este curso que desean enviar.';
$string['activityconfnoupcomingactivities'] = 'No hay actividades próximas para este curso.';
$string['activityconfupcomingactivities'] = 'Próximas actividades';
$string['activityconfupcomingactivitiesdesc'] = 'No se enviaran recordatorios para actividades no marcadas.';
$string['activitydueopenahead'] = 'Enviar apertura de actividades antes deÑ';
$string['activitydueopenaheaddesc'] = 'Días próximos necesarios para enviar recordatorios de apertura de actividades. Esta configuración es válida solo si la apertura de actividades está habilitada para enviar recordatorios desde la configuración anterior.';
$string['activityignoreincompletes'] = 'No enviar recordatorios una vez completado:';
$string['activityignoreincompletesdetails'] = 'Si está marcado, no se enviarán recordatorios si el usuario ya completó la actividad, <strong>antes</strong> de que finalice la actividad.';
$string['activityopeningseparation'] = 'Apertura de actividades separada:';
$string['activityopeningseparationdesc'] = 'Muestre la apertura de actividades como una entrada separada en la página de configuración de recordatorios del curso.';
$string['activityremindersboth'] = 'Para ambos aperturas y cierres';
$string['activityremindersonlyclosings'] = 'Solamente para cierres de actividad';
$string['activityremindersonlyopenings'] = 'Solamente para aperturas de actividad';
$string['admintreelabel'] = 'Recordatorios';
$string['calendareventcreatedprefix'] = 'Agregado';
$string['calendareventoverdueprefix'] = 'Retraso';
$string['calendareventremovedprefix'] = 'Removido';
$string['calendareventupdatedprefix'] = 'Actualización';
$string['caleventchangedheading'] = 'Recordatorio de cambio de eventos en el calendario';
$string['caleventchangedheadingdetails'] = 'Esta configuración se verificará <strong>antes</strong> de considerar el tipo de evento individual.';
$string['categoryheading'] = 'Recordatorios de eventos de categoría de curso';
$string['categorynosendforended'] = 'No enviar recordatorios para los cursos completados:';
$string['categorynosendforendeddescription'] = 'Si está marcado, no se enviarán recordatorios para los cursos completados.';
$string['contentdescription'] = 'Descripción';
$string['contenttypeactivity'] = 'Actividad';
$string['contenttypecategory'] = 'Categoría';
$string['contenttypecourse'] = 'Curso';
$string['contenttypegroup'] = 'Grupo';
$string['contenttypelocation'] = 'Donde';
$string['contenttypeuser'] = 'Usuario';
$string['contentwhen'] = 'Cuando';
$string['courseheading'] = 'Recordatorios de Eventos de Curso';
$string['days1'] = '1 Día';
$string['days3'] = '3 Días';
$string['days7'] = '7 Días';
$string['dueheading'] = 'Recordatorios de Eventos de Actividad';
$string['emailconfigsheading'] = 'Personalización de correo electrónico de recordatorio';
$string['emailfootercustomname'] = 'Pie de página de correo electrónico personalizado';
$string['emailfootercustomnamedesc'] = 'Especifique el contenido del pie de página que se incrustará en cada mensaje de correo electrónico de recordatorio. Si este contenido está vacío y el pie de página predeterminado está deshabilitado, el pie de página se eliminará por completo de los recordatorios.';
$string['emailfooterdefaultname'] = 'Usar pie de página de correo electrónico predeterminado';
$string['emailfooterdefaultnamedesc'] = 'Si está marcado, el pie de página del correo electrónico de recordatorio predeterminado contendrá un enlace al calendario de Moodle. De lo contrario, se utilizará el contenido proporcionado en el pie de página personalizado.';
$string['emailheadercustomname'] = 'Encabezado de correo electrónico personalizado';
$string['emailheadercustomnamedesc'] = 'Especifique el contenido del encabezado que se incrustará en cada mensaje de correo electrónico de recordatorio. Esto se puede usar para marcar estos mensajes de correo electrónico en su sitio.';
$string['enabled'] = 'Habilitado:';
$string['enabledaddedevents'] = 'Enviar cuando se crea el evento:';
$string['enabledaddedeventsdescription'] = 'Indica si enviar recordatorios cuando se crea un evento de calendario.';
$string['enabledchangedevents'] = 'Enviar cuando se actualice el evento:';
$string['enabledchangedeventsdescription'] = 'Indica si enviar recordatorios cuando se actualiza un evento del calendario.';
$string['enableddescription'] = 'Habilitar/deshabilitar plugin recordatorio';
$string['enabledforcalevents'] = 'Habilitar para eventos de cambio de calendario:';
$string['enabledforcaleventsdescription'] = 'Habilite el envío de recordatorios para este tipo cuando se cree, elimine o actualice un evento de calendario.';
$string['enabledoverdue'] = 'Retraso Habilitado';
$string['enabledremovedevents'] = 'Enviar cuando se elimine el evento:';
$string['enabledremovedeventsdescription'] = 'Indica si enviar recordatorios cuando se elimina un evento del calendario.';
$string['eventtypeclose'] = 'Cierra actividad';
$string['eventtypeexpectcompletionon'] = 'Finalización esperada';
$string['eventtypegradingdue'] = 'Calificación pendiente';
$string['eventtypeopen'] = 'Actividad abre';
$string['excludedmodules'] = 'Módulos excluidos:';
$string['excludedmodulesdesc'] = 'No se enviarán recordatorios si se genera un evento desde los módulos seleccionados anteriormente. Esta configuración es global y aplicable para cualquier tipo de eventos.';
$string['explaincategoryheading'] = 'Configuración de recordatorios para eventos de categoría de curso.';
$string['explaincourseheading'] = 'Configuraciones del recordatorio para eventos de curso. Estos eventos provienen de un curso.';
$string['explaindueheading'] = 'Configuraciones del recordatorio para eventos de actividad. Estos eventos provienen de actividades/módulos dentro de un curso.';
$string['explaingroupheading'] = 'Configuraciones del recordatorio para eventos de grupo. Estos eventos están basados solamente para un grupo específico.';
$string['explaingroupshowname'] = 'Indica si el nombre del grupo debe incluirse en el mensaje que se está enviando o no.';
$string['explainrolesallowedfor'] = 'Elija qué usuarios que tienen los roles anteriores pueden recibir recordatorios.';
$string['explainsendactivityreminders'] = 'Indica en cual estado de la actividad deberían de enviarse los recordatorios.';
$string['explainsiteheading'] = 'Configuración de recordatorio para eventos del sitio. Estos eventos son relevantes para todos los usuarios en el sitio.';
$string['explainuserheading'] = 'Configuraciones del recordatorio para eventos de usuario. Estos eventos son individuales para cada usuario.';
$string['filterevents'] = 'Filtrar eventos de calendario:';
$string['filtereventsdescription'] = 'Cuales eventos del calendario deberían ser filtrados y enviarse recordatorios para ellos.';
$string['filtereventsonlyhidden'] = 'Solamente eventos ocultos en calendario';
$string['filtereventsonlyvisible'] = 'Solamente eventos visibles en calendario';
$string['filtereventssendall'] = 'Todos los eventos';
$string['groupheading'] = 'Recordatorios de Eventos de Grupo';
$string['groupshowname'] = 'Mostrar el nombre del grupo en el mensaje:';
$string['messageprovider:reminders_course'] = 'Notificaciones de Recordatorio para Eventos de Curso';
$string['messageprovider:reminders_coursecategory'] = 'Notificaciones de recordatorio para eventos de categoría de curso';
$string['messageprovider:reminders_due'] = 'Notificaciones de Recordatorio para Eventos de Actividad';
$string['messageprovider:reminders_group'] = 'Notificaciones de Recordatorio para Eventos de Grupo';
$string['messageprovider:reminders_site'] = 'Notificaciones de Recordatorio para Eventos de Sitio';
$string['messageprovider:reminders_user'] = 'Notificaciones de Recordatorio para Eventos de Usuario';
$string['messagetitleprefix'] = 'Prefijo del Título del Mensaje:';
$string['messagetitleprefixdescription'] = 'Este texto se insertará como un prefijo (entre corchetes) al título de cada mensaje recordatorio que se está enviando.';
$string['moodlecalendarname'] = 'Calendario Moodle';
$string['overdueactivityreminders'] = 'Recordatorios de actividades atrasadas:';
$string['overdueactivityremindersdescription'] = 'Si está marcado, se enviarán recordatorios a los usuarios que están atrasados en la actividad.';
$string['overduemessage'] = '¡Esta actividad está retrasada!';
$string['overduewarnmessage'] = 'Mensaje de advertencia de vencimiento:';
$string['overduewarnmessagedescription'] = 'Ingrese un <strong>texto simple</strong> para ser incrustado dentro de los correos electrónicos vencidos en color rojo. Si está vacío, no se mostrará ningún mensaje. Además, esto se habilitará solo si los correos electrónicos vencidos están habilitados.';
$string['overduewarnprefix'] = 'Prefijo de título de retraso';
$string['overduewarnprefixdescription'] = 'Ingrese un <strong>prefijo simple</strong> para incrustarlo en el título de los correos electrónicos vencidos. Si está vacío, no se antepondrá nada. Además, esto se habilitará solo si los correos electrónicos vencidos están habilitados.';
$string['pluginname'] = 'Recordatorios de Evento';
$string['privacy:metadata'] = 'El complemento Recordatorio de Eventos no almacena ningún dato personal.';
$string['reminderdaysahead'] = 'Enviar antes de:';
$string['reminderdaysaheadcustom'] = 'Programación personalizada:';
$string['reminderdaysaheadcustomdetails'] = 'Además, especifique la programación deseada para enviar recordatorios antes de tiempo para un evento.';
$string['reminderdaysaheadschedule'] = 'Calendario';
$string['reminderfrom'] = 'Recordatorio de';
$string['reminderstask'] = 'Recordatorios locales';
$string['reminderstaskclean'] = 'Limpiar registros de recordatorios locales';
$string['rolesallowedfor'] = 'Roles permitidos:';
$string['sendactivityreminders'] = 'Recordatorios de Actividades:';
$string['sendas'] = 'Enviar como:';
$string['sendasadmin'] = 'Como administrador del sitio';
$string['sendasdescription'] = 'Especifique a quiénes se deben enviar estos correos de recordatorio.';
$string['sendasnamedescription'] = 'Especifique el nombre de usuario de visualización para los correos de recordatorio cuando se envíen como usuario Sin Respuesta.';
$string['sendasnametitle'] = 'Nombre Sin Respuesta:';
$string['sendasnoreply'] = 'Dirección Sin Respuesta';
$string['showmodnameintitle'] = 'Mostrar el nombre del módulo en el asunto del correo electrónico';
$string['showmodnameintitledesc'] = 'Si está marcado, el nombre del módulo correspondiente se agregará al asunto del correo electrónico de recordatorio.';
$string['siteheading'] = 'Recordatorios de Evento de Sitio';
$string['taskreminder'] = 'Recordatorio de tareas';
$string['titlesubjectprefix'] = 'Recordatorio';
$string['userheading'] = 'Recordatorios de Evento de Usuario';
