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
 * Strings for component 'webexactivity', language 'es', version '4.2'.
 *
 * @package     webexactivity
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['additionalsettings'] = 'Configuración adicional de la reunión';
$string['allchat'] = 'Los participantes pueden chatear con otros participantes';
$string['apipassword'] = 'Contraseña de administrador de WebEx';
$string['apipassword_help'] = 'La contraseña de una cuenta de administrador en su sitio.';
$string['apisettings'] = 'Configuraciones API';
$string['apiusername'] = 'Nombre_de_usuario de Admin WebEx';
$string['apiusername_help'] = 'El nombre_del_usuario para una cuenta de administrador en su sitio. Esta debería de ser una cuenta dedicada para Moodle por razones de seguridad.';
$string['availabilityendtime'] = 'Hora final de sisponibilidad extendida';
$string['badpassword'] = 'Su nombre_de_usuario y contraseña de WebEx no coinciden.';
$string['badpasswordexception'] = 'Su contraseña de WebEx es incorrecta y no pudo actualizarse.';
$string['calpublish'] = 'Publicar reuniones en el calendario';
$string['calpublish_help'] = 'Publicar las reuniones al calendario de cursos Moodle y mostrarlo en las páginas del Tablero. Las reuniones de Disponibilidad extendida no serán publicadas.';
$string['confirmrecordingdelete'] = '¿Está seguro de querer eliminar la grabación <b>{$a->name}</b>, con una duración de {$a->time}? Esto no puede deshacerse.';
$string['confirmrecordingsdelete'] = '¿Está seguro de querer eliminar la grabación seleccionada? Esto no puede deshacerse.';
$string['connectionexception'] = 'Ocurrió un error mientras se intentaba conectar: {$a->error}';
$string['curlsetupexception'] = 'Ocurrió un error al configurar curl.';
$string['defaultmeetingtype'] = 'Tipo de reunión por defcto';
$string['defaultmeetingtype_help'] = 'El tipo de reunión que será preseleccionada al crear una nueva reunión.';
$string['deletelink'] = '<a href="{$a->url}">Eliminar</a>';
$string['deletetime'] = 'Hora de eliminación';
$string['deletionin'] = '<div>{$a->time} para la eliminación.</div>';
$string['deletionsoon'] = '<div>Será eliminado pronto..</div>';
$string['description'] = 'Descripción';
$string['directlinks'] = 'Enlaces directos';
$string['directlinkstext'] = '<p>Estos enlaces dan acceso directo a las grabaciones del servidor Moodle. Acceder a ellas no requiere autenticación y no hay log de registro.</p><br />
Streaming: <a target="_blank" href="{$a->streamurl}" alt="Enlace de streaming">{$a->streamurl}</a><br />
Descarga: <a target="_blank" href="{$a->fileurl}" alt="Enlace">{$a->fileurl}</a><br />';
$string['duration'] = 'Duración esperada';
$string['duration_help'] = 'La duración esperada de la reunión. Solamente es para fines informativos, y no afecta el tiempo que puede durar la reunión.';
$string['enablecallin'] = 'Habilitar Telephone Callin';
$string['enablecallin_help'] = 'Habilitar soporte telephony callin para reuniones recien creadas. No habilitarlo a menos que Usted tenga soporte para CALLIN telephony .';
$string['entermeeting'] = 'Ingresar a reunión';
$string['error_'] = '.';
$string['error_HM_AccessDenied'] = 'Se negó el acceso para alojar esta reunión.';
$string['error_JM_InvalidMeetingKey'] = 'Hubo un error en la clave de reunión en WebEx y Usted no puede unirse a esta reunión.';
$string['error_JM_InvalidMeetingKeyOrPassword'] = 'Hubo un error en la clave de reunión o en la contraseña en WebEx y Usted no puede unirse a esta reunión.';
$string['error_JM_MeetingLocked'] = 'Esta reunión está bloqueada y Usted no puede unírsele.';
$string['error_JM_MeetingNotInProgress'] = 'Actualmente la reunión no está en progreso. Es posible que aun no haya empezado, o que ya terminó.';
$string['error_LI_AccessDenied'] = 'El usuari no pudo ser ingresado a WebEx.';
$string['error_LI_AccountLocked'] = 'La cuenta WebEx del usuario está bloqueada.';
$string['error_LI_AutoLoginDisabled'] = 'Los auto ingresos están deshabilitados para este usuario';
$string['error_LI_InvalidSessionTicket'] = 'Su ticket de sesión es inválido. Por favor inténtelo nuevamente.';
$string['error_LI_InvalidTicket'] = 'Su ticket para ingresar es inválido. Por favor inténtelo nuevamente.';
$string['error_unknown'] = 'Ocurrió un error desconocido.';
$string['errordeletingrecording'] = 'Error al eliminar grabación';
$string['event_meeting_ended'] = 'Terminó la reunión';
$string['event_meeting_hosted'] = 'Reunión alojada';
$string['event_meeting_joined'] = 'reunión juntada';
$string['event_meeting_started'] = 'Inició la reunión';
$string['event_recording_created'] = 'Grabación creada';
$string['event_recording_deleted'] = 'Grabación eliminada';
$string['event_recording_downloaded'] = 'Grabación descargada';
$string['event_recording_undeleted'] = 'Grabación des-eliminada';
$string['event_recording_viewed'] = 'Grabación vista';
$string['externallinktext'] = '<p>Este enlace es para participantes que no están inscritos en este curso. Los estudiantes en el curso no necesitarán ser comunicados por Email sobre este enlace, ya que ellos pueden simplemente hacer clic en el enlace para \'Unirse a reunión\' en la página anterior. Este mensaje debería ser distribuido cuidadosamente - cualquiera con este enlace podrá acceder a esta reunión. Para invitar a otros a la reunión, copie la URL inferior y envíeselas. Si ésta es una reunión pública, este enlace también puede colocarse en un sitio web</p>';
$string['externalpassword'] = 'Los participantes también necesitan conocer la contraseña de la reunión: <b>{$a}</b>';
$string['getexternallink'] = '<a href="{$a->url}">Obtener enlace de participante externo</a>';
$string['host'] = 'Alojar (Host)';
$string['hostmeetinglink'] = '<a href="{$a->url}">Alojar (Host) Reunión</a>';
$string['hostschedulingexception'] = 'El usuario no puede agendar una reunión para este Host.';
$string['inprogress'] = 'En progreso';
$string['invalidtype'] = 'Tipo inválido';
$string['joinmeetinglink'] = '<a href="{$a->url}">Unirse a Reunión</a>';
$string['longavailability'] = 'Disponibilidad extendida';
$string['longavailability_help'] = 'El configurar esta opción dejará disponible la reunión para alojarla hasta el tiempo de Disponibilidad Estendida. Permite reuniones reutilizables para cosas como horas de oficina.';
$string['manageallrecordings'] = 'Gestionar todas las grabaciones WebEx';
$string['manageallrecordings_help'] = 'Gestionar todas las grabaciones del servidor WebEx, no solamente las que tienen actividad Moodle';
$string['meetingclosegrace'] = 'Período de gracia para reunión';
$string['meetingclosegrace_help'] = 'El número de minutos después de la hora de inicio más la duración, después de los cuales se considererá como completa la reunión.';
$string['meetingpassword'] = 'Contraseña de la reunión';
$string['meetingpast'] = 'Esta reunión ha pasado';
$string['meetingsettings'] = 'Configuraciones de la Reunión';
$string['meetingtemplate'] = 'Plantilla WebEx';
$string['meetingtemplate_help'] = 'Nombre de la plantilla que Usted ha configurado en su cuenta WebEx para este tipo de reunión. Déjelo vacío para usar configuraciones por defecto. Nota: el indicar una plantilla inexistente impedirá crear sesiones de este tipo de reunión.';
$string['meetingtype'] = 'Tipo de reunión';
$string['meetingtypes'] = 'Tipos de reunión';
$string['meetingtypes_desc'] = 'Estos son los tipos de reunión WebEx soportados por este módulo. Para cada tipo, Usted puede seleccionar si está "Disponible" (Usted tiene una  licencia para ello en WebEx, y si Usted quiere que se pueda usar desde Moodle), y si Usted quiere que esté "Disponible para todos los usuarios". Los tipos que están "Disponible", pero no "Disponible para todos los usuarios" solamente serán seleccionados por personas con  el permiso mod/webexactivity:allavailabletypes. "Contraseña de reunión requerida" es para decirle al plugin si es que WebEx requiere una contraseña. Use "Generar contraseñas requeridas" debajo para permitir que un usuario no proporcione una contraseña.';
$string['meetingupcoming'] = 'Esta reunión aun no está disponible para unírsele.';
$string['modulename'] = 'Reunión WebEx (WebEx Meeting)';
$string['modulename_help'] = 'La actividad Reunión WebEx permite a los docentes agendar reuniones en el sistema de videoconferecias web de WebEx*.

Cuando usted añade la actividad Reunión WebEx, usted define la fecha y hora de la reunión, así como una serie de otros parámetros opcionales (como la duración estimada, descripción, etc.). Los participantes (estudiantes matriculados) entonces podrán entrar en la reunión WebEx clicando en el enlace "acceder a la reunión" bajo la actividad de Moodle (los profesores verán un enlace que dirá "Celebrar reunión"). Si la reunión se está grabando, los estudiantes podrán ver la grabación cuando la reunión haya terminado.

*WebEx es un sistema de videoconferencia que permite a estudiantes y docentes colaborar de forma síncrona. Transmite audio y vídeo en tiempo real, e incluye herramientas como pizarra, chat y compartir escritorio.';
$string['modulenameplural'] = 'Reuniones WebEx';
$string['page_managerecordings'] = 'Gestionar Grabaciones';
$string['page_manageusers'] = 'Gestionar Usuarios';
$string['pluginadministration'] = 'Administración de Reunión WebEx';
$string['pluginname'] = 'Reunión WebEx (WebEx Meeting)';
$string['pluginnamepural'] = 'Reuniones WebEx';
$string['prefix'] = 'Prefijo de nombre_de_usuario';
$string['prefix_help'] = 'Esta cadena será prefijada a todoslos nombres_de_usuarios cresdos por este módulo.';
$string['privacy:metadata:email'] = 'La dirección Email del usuario que accede a Webex';
$string['privacy:metadata:firstname'] = 'El nombre del usuario que accede a Webex';
$string['privacy:metadata:lastname'] = 'Apellido(s) del usuario que accede a Webex';
$string['privacy:metadata:timecreated'] = 'La hora de cuando fue creado un registro';
$string['privacy:metadata:timemodified'] = 'La hora de cuando fue modificado un registro en la Base de Datos';
$string['privacy:metadata:username'] = 'El nombre_de_usuario del usuario que aloja una reunión.';
$string['privacy:metadata:webexactivity'] = 'Instancia de actividad webex';
$string['privacy:metadata:webexactivity:hostwebexid'] = 'La ID del suuario Webex del usuario host';
$string['privacy:metadata:webexactivity:password'] = 'La contraseña de la reunión';
$string['privacy:metadata:webexactivity_recording'] = 'Grabación Webex';
$string['privacy:metadata:webexactivity_recording:hostid'] = 'Nombre_de_usuario del host de una grabación';
$string['privacy:metadata:webexactivity_user'] = 'Usuarios del host Webex';
$string['privacy:metadata:webexactivity_user:webexid'] = 'Nombre_de_usuario Webex de un usuario Webex';
$string['privacy:metadata:webexactivity_user:webexuserid'] = 'ID de usuario Webex de un usuario Webex';
$string['privacy:metadata:webexhost'] = 'Información de host Webex';
$string['privacy:metadata:webexparticipant'] = 'Información de participante Webex';
$string['privacy:metadata:webexpassword'] = 'Una contraseña Webex usada para negociar a nombre del usuario. Solamente empleada en sitios con instalaciones muy antiguas de este plugin.';
$string['recordingfileurl'] = 'Descargar';
$string['recordinglength'] = '({$a->time}, {$a->size})';
$string['recordingname'] = 'Nombre de la grabación';
$string['recordings'] = 'Grabaciones';
$string['recordingsettings'] = 'Opciones de las grabaciones';
$string['recordingstreamurl'] = 'Reproducir';
$string['recordingtrashtime'] = 'Hora de reciclado de grabación';
$string['recordingtrashtime_help'] = 'Número d ehoras que se conservará un agrabación antes de eliminarse permanentemente.';
$string['requiremeetingpassword'] = 'Requerir contraseñas de reunión';
$string['requiremeetingpassword_help'] = 'Requerir que el usuario ingrese una contraseña para la grabación. Si se deja sin activar, y el tipo de reunión está marcada arriba como que requiere contraseña, se generará aleatoriamente una contraseña.';
$string['search:activity'] = 'Reuniones WebEx - información de actividad';
$string['selectnone'] = 'Des-seleccionar todo';
$string['settings'] = 'Configuraciones de Reunión WebEx';
$string['sitename'] = 'Nombre del sitio';
$string['sitename_help'] = 'La parte del URL antes de .webex.com.Si la URL de su sitio fuera "https://ejemplo.webex.com", Usted escribiría arriba "ejemplo".';
$string['startssoon'] = 'Comienza en breve';
$string['starttime'] = 'Hora de comienzo';
$string['stream'] = 'Torrente (Stream)';
$string['studentdownload'] = 'Permitir a los estudiantes descargar las grabaciones';
$string['studentdownload_help'] = 'Dar acceso a los estudiantes al enlace de descarga para las grabaciones.';
$string['studentvisible'] = 'Visible para los estudiantes';
$string['task_deleterecordings'] = 'Purgar grabaciones eliminadas';
$string['task_updateallrecordings'] = 'Actualizar todas las grabaciones';
$string['task_updatemediumrecordings'] = 'Actualizar grabaciones pasadas medianas';
$string['task_updateopensessions'] = 'Actualizar sesiones abiertas';
$string['task_updaterecentrecordings'] = 'Actualizar grabaciones pasadas recientes';
$string['typeforall'] = 'Disponible para todos los usuarios';
$string['typeinstalled'] = 'Disponible';
$string['typemeetingcenter'] = 'Centro de Reunión';
$string['typemeetingcenter_desc'] = '.';
$string['typepwreq'] = 'Contraseña de reunión requerida';
$string['typetrainingcenter'] = 'Centro de Entrenamiento';
$string['typetrainingcenter_desc'] = '.';
$string['undeletelink'] = '<a href="{$a->url}">Des-eliminar</a>';
$string['unknownhostwebexidexception'] = 'ID de Host WebEx no existe';
$string['user_create_exception'] = 'Para más información sobre este error, vaya a <a href="https://github.com/merrill-oakland/moodle-mod_webexactivity/wiki/Manual#webex-exception-xxxxxxx-when-creating-new-user" target="_blank">this page</a>.';
$string['usereditauto'] = 'Su usuario WebEx es gestionado internamente, y no puede ser editado.';
$string['usereditbad'] = 'Used no debería de haber llegado a esta página.';
$string['usereditunabletoload'] = 'No se puede cargar su usuario desde WebEx.';
$string['userexistsexplanation'] = 'Su dirección Email ({$a->email}) ya está en uso por el Usuario WebEx <b>{$a->username}</b>. Por favor ingrese debajo su contraseña WebEx.';
$string['webexactivity:addinstance'] = 'Añadir una nueva Reunión WebEx';
$string['webexactivity:allavailabletypes'] = 'Crear reuniones de todos los tipos instalados';
$string['webexactivity:hostmeeting'] = 'Alojar y gestionar Reunión WebEx';
$string['webexactivity:reports'] = 'Usar reportes WebEx';
$string['webexactivity:view'] = 'Ver reunión WebEx';
$string['webexactivityname'] = 'Nombre de Reunión';
$string['webexid'] = 'ID de WebEx';
$string['webexrecordings'] = 'Grabaciones WebEx';
$string['webexusercollision'] = 'Colisión con usuario WebEx.';
$string['webexxmlexception'] = 'Ocurrió un error en WebEx al procesar  XML: {$a->errorcode} {$a->error}';
