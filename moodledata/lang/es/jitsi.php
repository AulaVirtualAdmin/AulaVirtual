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
 * Strings for component 'jitsi', language 'es', version '4.2'.
 *
 * @package     jitsi
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['access'] = 'Acceder';
$string['accessto'] = 'Acceder a {$a}. Introduzca el nombre a mostrar';
$string['accesstotitle'] = 'Acceder a {$a}';
$string['accesstowithlogin'] = 'Acceder a {$a}.';
$string['account'] = 'Cuenta';
$string['accountconnected'] = 'Cuenta conectada con éxito y puesta <b>en uso</b>.';
$string['accountinsufficientprivileges'] = 'La configuración de la cuenta de transmisión no tiene privilegios suficientes. Por favor, póngase en contacto con su administrador.';
$string['accounts'] = 'Cuentas de transmisión/grabación';
$string['activatetooltip'] = 'Clic para poner en uso';
$string['addaccount'] = 'Añadir cuenta';
$string['addedtoqueue'] = 'Añadido a la cola';
$string['addtoqueue'] = 'Añadir a la cola';
$string['adminaccountex'] = 'Se requiere al menos una cuenta para transmitir/grabar sesiones con el método de transmisión "Integrado a Moodle".
  </br>Sólo puede estar "<b>en uso</b>" una cuenta y se usará para retransmitir/grabar todas las sesiones de su maestro.
  </br>Al agregar nuevas cuentas, se recomienda <b>nombrarlas con nombres de cuenta reales</b> porque en el futuro se le podría solicitar que vuelva a iniciar sesión para volver a autorizar la cuenta.
  </br>Sólo se pueden eliminar aquí usando el icono de la papelera las cuentas sin grabaciones relacionadas con las actividades de Jitsi del profesor y sin grabaciones pendientes de eliminar de los servidores de transmisión.
  </br>Pueden aparecer nuevas cuentas sin credenciales aquí cuando las copias de seguridad de actividades de Jitsi de otro servidor se restauran en este con cuentas que no estaban presentes aquí.
 </br></br>NOVEDAD desde v3.3.3: una nueva columna llamada "En cola" permite usar todas sus grabaciones por turnos. Puede añadir grabaciones a la cola clicando en "<b>+</b>" y puede sacarlas de la cola clicando en "<b>-</b>". Cuando una grabación se ha usado porque estaba "<b>en uso</b>" (o era la siguiente a usar), le saldrá la banderita "En uso" a la siguiente en la cola. Esta característica le permite usar muchas grabaciones para evitar límites de cuota de YouTube como las retransmisiones en directo permitidas por día.';
$string['alias'] = 'Alias';
$string['allow'] = 'Comienzo de la videoconferencia';
$string['apikeyid8x8'] = 'ID de clave de Api';
$string['apikeyid8x8ex'] = 'ID de clave de Api para usar con servidor 8x8. Puede obtenerla desde la administración del servidor 8x8 (https://jaas.8x8.com/).';
$string['appaccessinfo'] = 'Si desea unirse a la reunión utilizando un dispositivo móvil, necesitará la aplicación móvil Jitsi Meet.';
$string['appid'] = 'ID de la App';
$string['appidex'] = 'ID de la App para la configuración del token';
$string['appinstalledtext'] = 'Si ya tiene la aplicación:';
$string['appnotinstalledtext'] = 'Si aún no tiene la aplicación:';
$string['attendeesreport'] = 'Informe de asistentes';
$string['authq'] = '¿Iniciar sesión con esta cuenta para obtener credenciales y poner "en uso"?';
$string['blurbutton'] = 'Opciones de fondo';
$string['blurbuttonex'] = 'Mostrar la opción "Seleccionar fondo" a todos los usuarios. Esta característica es genial pero requiere computadoras poderosas. Tal vez deberías desactivarlo.';
$string['buttondownloadapp'] = 'Descargar aplicación';
$string['buttonopeninbrowser'] = 'Abrir en navegador web';
$string['buttonopenwithapp'] = 'Únase a esta sesión usando la app';
$string['calendarstart'] = 'La videoconferencia \'{$a}\' comienza';
$string['click'] = 'Clicar';
$string['close'] = 'Fin de la videoconferencia';
$string['closebeforeopen'] = 'No se pudo actualizar la sesión. Usted ha especificado una fecha de cierre anterior a la fecha de apertura.';
$string['completiondetail:minutes'] = 'Asistir {$a} minutos';
$string['completionminutes'] = 'El estudiante debe participar';
$string['completionminutes_help'] = 'Número de minutos que el estudiante debe participar para dar por finalizada la actividad';
$string['completionminutesex'] = 'Minutos de participación';
$string['config'] = 'Configuración';
$string['confirmdeleterecordinactivity'] = 'Confirme que desea eliminar esta grabación. Esta operación no se puede deshacer.';
$string['connectedattendeesnow'] = 'Asistentes conectados ahora';
$string['copied'] = 'Enlace copiado al portapapeles';
$string['crontaskdelete'] = 'Borrar grabaciones';
$string['deeplink'] = 'Enlace profundo';
$string['deeplinkex'] = 'Cuándo la app de Moodle permite transferir sesiones de Jitsi a la app de Jitsi.';
$string['deleteq'] = '¿Eliminar y desconectar esta cuenta?';
$string['deleterecord'] = 'Borrar registro';
$string['deletesourceq'] = '¿Está seguro/ a? La grabación se eliminará permanentemente del servidor de video y no se podrá recuperar';
$string['deletesources'] = 'Grabaciones disponibles para eliminar';
$string['deletetooltip'] = 'Eliminar';
$string['deprecated'] = 'Obsoleto';
$string['deprecatedex'] = 'Parámetros obsoletos que probablemente no funcionarán porque Jitsi Meet cambió su implementación';
$string['desktopaccessinfo'] = 'Si desea unirse a la reunión, haga clic en el botón de abajo para abrir Jitsi en su navegador.';
$string['domain'] = 'Dominio';
$string['domainex'] = 'Dominio de servidor Jitsi a utilizar. El servidor por defecto (<b>meet.jit.si</b>) tiene un límite de 5 minutos por videoconferencia.
 Usted puede usar un buscador para encontrar servidores Jitsi públicos alternativos que puedan estar más cerca de sus usuarios y con menos latencia.
Si usted tiene su servidor Jitsi privado, infórmenos aquí sin "https://".
El servidor profesional 8x8 usa (<b>8x8.vc</b>) y requiere que configure sus credenciales en la sección "Configuración de token" que hay más abajo.';
$string['editrecordname'] = 'Editar nombre grabación';
$string['entersession'] = 'Entrar a la sesión';
$string['error'] = 'Error';
$string['errordeleting'] = 'Error eliminando';
$string['experimental'] = 'Experimental';
$string['experimentalex'] = 'Son opciones con las que estamos experimentando y que pueden desaparecer en futuras versiones.';
$string['finish'] = 'La sesión ha finalizado';
$string['finishandreturn'] = 'Finalizar y volver';
$string['finishandreturnex'] = 'Volver al curso cuando termine la sesión. Los usuarios de uso público de Jitsi vuelven al curso cuando cierran la publicidad';
$string['finishinvitation'] = 'El enlace de invitación caducará el';
$string['forkids'] = 'Para niños';
$string['forkidsex'] = 'Las grabaciones se considerarán creadas por niños.';
$string['guestform'] = 'Entrar al formulario de invitado';
$string['hasentered'] = 'ha entrado en tu sesión privada de Jitsi';
$string['help'] = 'Ayuda';
$string['helpex'] = 'Este texto de ayuda se mostrará al final de todas las actividades de Jitsi. Es un buen lugar para reglas de netiqueta o instrucciones de ayuda para los usuarios.';
$string['here'] = 'aquí';
$string['identification'] = 'ID de usuario';
$string['identificationex'] = 'ID a mostrar en la sesión';
$string['inqueue'] = 'En cola';
$string['instruction'] = 'Clic en el botón para acceder';
$string['integrated'] = 'Integrado en Moodle';
$string['internalerror'] = 'Error interno. Contacte con el administrador.';
$string['inuse'] = '<b>(en uso)</b>';
$string['invitations'] = 'Invitaciones';
$string['invitationsnotactivated'] = 'Las invitaciones no están activadas.';
$string['invitebutton'] = 'Opciones de invitación';
$string['invitebuttonex'] = 'Permitir a los usuarios con el permiso mod/jitsi:createlink crear enlaces de invitación para usuarios no matriculados en el curso.';
$string['iscalling'] = 'le está llamando para entrar en su Jitsi privado';
$string['jitsi'] = 'Jitsi';
$string['jitsi:addinstance'] = 'Añadir nuevo Jitsi';
$string['jitsi:createlink'] = 'Ver y copiar enlances de invitación para invitados';
$string['jitsi:deleterecord'] = 'Borrar registro';
$string['jitsi:editrecordname'] = 'Editar nombre del registro';
$string['jitsi:hide'] = 'Ocultar grabaciones';
$string['jitsi:moderation'] = 'Moderación de Jitsi';
$string['jitsi:record'] = 'Grabar sesión';
$string['jitsi:sharedesktop'] = 'Compartir escritorio';
$string['jitsi:view'] = 'Ver Jitsi';
$string['jitsi:viewusersonsession'] = 'Acceso a los informes de asistentes';
$string['jitsiinterface'] = 'Interfaz Jitsi';
$string['jitsiname'] = 'Nombre de la sesión';
$string['linkexpiredon'] = 'Este enlace expiró el {$a}';
$string['livesessionsnow'] = 'Grabaciones en vivo';
$string['loginq'] = '¿Quiere poner en uso esta cuenta?';
$string['logintooltip'] = 'Se requieren credenciales para esta cuenta';
$string['messageprovider:callprivatesession'] = 'Llamar a Jitsi privado';
$string['messageprovider:onprivatesession'] = 'Usuario en sesión privada';
$string['minpretime'] = 'Minutos para acceder';
$string['minpretime_help'] = 'Los usuarios con permisos de moderación podrán acceder estos minutos antes del inicio';
$string['minutesconnected'] = 'Ha estado conectado durante {$a} minutos';
$string['modulename'] = 'Jitsi';
$string['modulename_help'] = 'Utilice el módulo Jitsi para videoconferencia. Estas videoconferencias utilizarán su nombre de usuario de Moodle mostrando su nombre de usuario y avatar en las videoconferencias.

Jitsi-meet es una solución de videoconferencia de código abierto que le permite crear e implementar fácilmente soluciones de videoconferencia seguras.';
$string['modulenameplural'] = 'Jitsis';
$string['myprivatesession'] = 'Mi sesión privada';
$string['nameandsurname'] = 'Nombre + Apellido';
$string['news'] = 'Noticias';
$string['news1'] = 'Si usted ha subido de versión recientemente, se recomienda que compruebe <a href="../mod/jitsi/CHANGES.md">CHANGES.md</a> para actualizaciones y seleccione su lenguaje correctamente para leer las instrucciones actualizadas en esta pantalla de configuración.
</br></br><b>AVISO IMPORTANTE</b>
 </br>Recientemente los servidores públicos meet.jit.si han implementado restricciones para el modo embebido que lo limitan a 5 minutos por videoconferencia  (<a href="https://github.com/udima-university/moodle-mod_jitsi#important-announcement-from-meetjitsi-team">lea más aquí</a>).
 </br>Si usted quiere contratar servicios de almacenamiento profesiona de Jitsi, recomendamos <a href="https://jaas.8x8.vc/">https://jaas.8x8.vc/</a>.
 Lo llevan los desarrolladores de Jitsi, ellos tienen <b>precios muy competitivos</b> y de este modo usted puede ayudar a mantener vivo el proyecto de Código Abierto Jitsi.
 Usted puede <b>obtener un 80% de descuento</b> para los tres primeros meses <b>usando el cupón MOODLE23</b>cuando cree su cuenta.
 </br></br><b>DESCARGO DE RESPONSABILIDAD</b></br>Este plugin lo mantiene UDIMA University (<a href="https://www.udima.es">www.udima.es</a>) y no está relacionado ni asociado con 8x8 Inc ni con "Jitsi como servicio" (jaas).';
$string['newvaluefor'] = 'Nuevo valor para';
$string['noinviteaccess'] = 'Actualmente no se permite el acceso de invitados.';
$string['nojitsis'] = 'No se han encontrado actividades Jitsi';
$string['norecords'] = 'No hay grabaciones disponibles';
$string['nostart'] = 'La sesión no ha comenzado. Puede acceder {$a}';
$string['notloggedin'] = 'Se requieren credenciales de cuenta';
$string['noviewpermission'] = 'No tiene permisos para ver esta sesión Jitsi';
$string['numbervideosdeleted'] = 'Número de vídeos a borrar';
$string['numbervideosdeletedex'] = 'Número de vídeos a borrar en cada ejecución de tarea de cron';
$string['oauthid'] = 'ID OAuth2';
$string['oauthidex'] = 'Cuenta de Google ID Oauth2  con YouTube Data API v3 habilitada y esta redirección URIs <b>\'{$a}\'</b> en la consola Google api.';
$string['oauthsecret'] = 'Clave OAuth2';
$string['oauthsecretex'] = 'Oauth2 Secret cuenta Google';
$string['participantspane'] = 'Panel de participantes';
$string['participantspaneex'] = 'Mostrar el panel de participantes a todos los usuarios. Cuando se desmarca, solo los usuarios con capacidad de moderación de Jitsi (mod/jitsi:moderation), generalmente profesores, pueden ver el panel.';
$string['participatingsession'] = 'Participantes en la sesión';
$string['password'] = 'Contraseña';
$string['passwordex'] = 'Contraseña para proteger sus sesiones. Recomendado si usa un servidor público';
$string['pluginadministration'] = 'Administración de Jitsi';
$string['pluginname'] = 'Jitsi';
$string['preparing'] = 'Preparando. Por favor, espere...';
$string['presscambutton'] = 'Pulsar botón de cámara';
$string['pressdesktopbutton'] = 'Pulsar botón de escritorio';
$string['pressendbutton'] = 'Pulsar botón de fin';
$string['pressmicrophonebutton'] = 'Pulsar botón de micrófono';
$string['pressrecordbutton'] = 'Pulsar botón de grabación';
$string['privacy:metadata:jitsi'] = 'Para poder integrarse con una sesión jitsi, los datos del usuario deben intercambiarse con ese servicio.';
$string['privacy:metadata:jitsi:avatar'] = 'El avatar se envía desde moodle para mostrarlo a los demás usuarios de la sesión jitsi.';
$string['privacy:metadata:jitsi:username'] = 'El nombre de usuario se envía desde moodle para mostrarlo a los demás usuarios de la sesión jitsi.';
$string['privatekey'] = 'Clave privada';
$string['privatekeyex'] = 'Clave privada para firmar el token con el servidor 8x8. Puede obtenerla desde la adminitración del servidor 8x8 (https://jaas.8x8.com/).
Descargue el archivo con la clave privada y copie su contenido aquí.
</br><b>IMPORTANTE</b>: recuerde actualizar el ajuste "Dominio" a algo así como <b>8x8.vc</b>';
$string['privatesession'] = 'Sesión privada de {$a}';
$string['privatesessiondisabled'] = 'Las sesiones privadas están desabilitadas';
$string['privatesessions'] = 'Sesiones privadas';
$string['privatesessionsex'] = 'Agregar sesiones privadas a los perfiles de usuario';
$string['raisehand'] = 'Botón de levantar la mano';
$string['raisehandex'] = 'Muestre el botón de levantar la mano a todos los usuarios. Cuando los usuarios levantan la mano pueden acceder al panel de participantes. Si oculta los paneles de participantes, es posible que deba ocultar este botón.';
$string['reactions'] = 'Reacciones';
$string['reactionsex'] = 'Muestra emoticonos sonoros de aplausos, sorpresa, etc... Se requiere "Botón de levantar la mano" habilitado';
$string['record'] = 'Grabación';
$string['recordex'] = 'Habilitar opción de grabación nativa de Jitsi (dropbox) a usuarios con el permiso mod/jitsi:record habilitado (normalmente, profesores). Si ajusta la "Configuración de retransmisión" con el método "Integrado en Moodle" probablemente querrá deshabilitar esto.';
$string['recordingbloquedby'] = 'La grabación está bloqueada por';
$string['recordingwasbloquedby'] = 'El usuario que empezó esta grabación no está participando ya en la sesión. ¿Desea parar esta grabación? La inició';
$string['records'] = 'Grabaciones';
$string['recordsonair'] = 'Grabaciones en el aire';
$string['recordtitle'] = 'Grabaciones';
$string['removedfromqueue'] = 'Fuera de la cola';
$string['removefromqueue'] = 'Sacar de la cola';
$string['searchrecords'] = 'Buscar grabaciones';
$string['secret'] = 'Secreto';
$string['secretex'] = 'Secreto para la configuración de token';
$string['securitybutton'] = 'Botón seguridad';
$string['securitybuttonex'] = 'Muestra el botón nativo de Jitsi "Opciones de seguridad" y el "Modo sala de espera". Probablemente usted debería desactivar esta opción si ha puesto una contraseña arriba porque la contraseña le aparecerá a los usuarios. Con la configuración de token puede experimentar con esta opción.';
$string['separator'] = 'Separador';
$string['separatorex'] = 'Definir el campo separador para el nombre de la sesión';
$string['sessionisbeingrecorded'] = 'La sesión se está grabando';
$string['sessionisbeingrecordingby'] = '{$a} está grabando la sesión';
$string['sessionnamefields'] = 'Campos de nombre de la sesión';
$string['sessionnamefieldsex'] = 'Campos que definen el nombre de la sesión';
$string['sharetoinvite'] = 'Comparta este enlace para invitar a alguien a la sesión';
$string['showavatars'] = 'Mostrar avatares en Jitsi';
$string['showavatarsex'] = 'Muestra el avatar del usuario en Jitsi. Si el usuario no tiene una imagen de perfil, se cargará la imagen de perfil predeterminada de Moodle en lugar de las iniciales que mostrará Jitsi cuando no se establezca ninguna imagen.';
$string['simultaneouscameras'] = 'Cámaras simultáneas';
$string['simultaneouscamerasex'] = 'Número máximo de cámaras simultáneas que pueden ver los usuarios. Esto puede ser cambiado a un valor inferior por su servidor Jitsi. Permitir un montón de cámaras podría sobrecargar sus navegadores.';
$string['staticinvitationlink'] = 'Opción de invitaciones';
$string['staticinvitationlinkex'] = 'Use este enlace para usuarios no matriculados en este curso. Por ejemplo, invitados que no tienen un usuario con el que acceder a Moodle.';
$string['staticinvitationlinkexview'] = 'Comparta este enlace con usuarios que no están matriculados en este curso. Por ejemplo, invitados que no tienen una cuenta de usuario para acceder a Moodle.';
$string['streamingandrecording'] = 'Retransmisión y grabación';
$string['streamingbutton'] = 'Streaming de Youtube';
$string['streamingbuttonex'] = 'Habilite las funciones de transmisión en vivo para los usuarios con la función mod/jitsi:record habilitada (maestros). Si está habilitado, probablemente querrá deshabilitar la opción "grabar" anterior.';
$string['streamingconfig'] = 'Configuración de retransmisión';
$string['streamingconfigex'] = 'La configuración de retransmisión por defecto funciona de forma diferente y los usuarios pueden retransmitir/grabar sus sesiones con sus propias cuentas de retransmisión en servicios de retransmisión (Peertube, Youtube...) pero el profesor es responsable de publicar sus enlaces para los estudiantes del curso. </br></br>Para una mejor experiencia puede activar el método "Integrado en Moodle" para grabar y una cuenta de retransmisión corporativa y las grabaciones estarán automáticamente disponibles para los estudiantes.';
$string['streamingisstarting'] = 'La retransmisión está comenzando. Por favor, espere...';
$string['streamingoption'] = 'Método de retransmisión en directo';
$string['streamingoptionex'] = 'La <b>interfaz Jitsi (jitsi interface)</b> permite "Comenzar retransmisión en directo" en la interfaz Jitsi y los usuarios pueden usar sus propias cuentas de retransmisión.
</br><b>Integrado en Moodle</b> es la opción más sencilla para los usuarios. Los profesores pueden empezar una "Retransmisión y grabación" inmediatamente y no se les pedirán credenciales de cuenta. Las retransmisiones/grabaciones se guardan en una cuenta corporativa y estarán inmediatamente disponibles para los estudiantes. Usted debe configurar credenciales OAuth2 y una cuenta de transmisión a continuación.';
$string['tablelistjitsis'] = 'Lista todos los vídeos en sus cuentas de proveedores de retransmisión/grabación que están disponibles para ser eliminados porque ya no están vinculados en las actividades de Jitsi en esta instancia de Moodle. Puede eliminarlos de forma segura para liberar espacio en el servidor de retransmisión. La lista podría incluir vídeos que ahora están en la \'Papelera de reciclaje\' de algún curso. Se recomienda eliminar sólo las grabaciones antiguas que sepa que no serán necesarias. </br></br> <b>¡¡¡ATENCIÓN!!! </b>Si tiene instancias de copia de seguridad de Moodle, NO debe eliminar estos videos si están vinculados en otras instancias.';
$string['toenter'] = 'para entrar';
$string['tokenconfiguration8x8ex'] = 'Si usa servidores 8x8 necesita configurar los siguientes parámetros.';
$string['tokenconfigurationex'] = 'Si está usando un servidor Jitsi configurado en "modo token", por ejemplo en su propio servidor o en un servidor 8x8, rellene los siguientes parámetros según el tipo de servidor que esté usando. Requerido para dar a sus usuarios el permiso (mod/jitsi:moderation) como moderadores nativos de Jitsi.';
$string['tokennconfig'] = 'Configuración de token';
$string['tokennconfig8x8'] = 'Configuración de servidores 8x8';
$string['updated'] = 'Actualizado';
$string['usercall'] = '{$a} llamadas para usted para Jitsi privado';
$string['userenter'] = '{$a} está en su sala de sesión privada de Jitsi';
$string['username'] = 'Nombre de usuario';
$string['validitytimevalidation'] = 'Esta invitación no puede expirar antes de la fecha de comienzo de la sesión o después de la fecha fin de la sesión.';
$string['videoexpiry'] = 'Periodo de retención';
$string['videoexpiryex'] = 'Tiempo en que estará disponible un vídeo borrado en el servidor de streaming. Tras este tiempo el vídeo se borrará del servidor de streaming.';
$string['warningprivate'] = 'Si accede, {$a} será advertido con una notificación.';
$string['watermarklink'] = 'Enlace de marca de agua';
$string['watermarklinkex'] = 'Enlace de marca de agua';
$string['whiteboard'] = 'Pizarra';
$string['whiteboardex'] = 'Muestra el botón de pizarra a todos los usuarios. La pizarra no está disponible en servidores Jaas (Jitsi como servicio).';
$string['youtubebutton'] = 'Opción para compartir desde Youtube';
$string['youtubebuttonex'] = 'Mostrar la opción para compartir vídeos Youtube';
