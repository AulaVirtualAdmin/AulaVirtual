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
 * Strings for component 'plagiarism_urkund', language 'es', version '4.2'.
 *
 * @package     plagiarism_urkund
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['allowallsupportedfiles'] = 'Permitir todos los tipo de archivo soportados';
$string['allowallsupportedfiles_help'] = 'Permite que el profesor restrinja qué tipos de archivo serán enviados a Ouriginal para su procesamiento. No impide que los estudiantes realicen entregas de otros tipos de archivo.';
$string['areyousurebulk'] = '¿Está seguro de que desea eliminar el/los archivo(s) seleccionado(s) {$a}?';
$string['areyousurefiltereddelete'] = '¿Está seguro de que quiere eliminar los archivos {$a} que coinciden con el filtro actual?';
$string['areyousurefilteredresubmit'] = '¿Está seguro de que quiere volver a enviar los archivos {$a} que coinciden con el filtro actual?';
$string['assessmentresubmitted'] = 'Evaluación reenviada';
$string['assignforcedisclosureagreement'] = 'Forzar el acuerdo de divulgación Ouriginal';
$string['assignforcedisclosureagreement_desc'] = 'Si se activa esta opción, el usuario deberá indicar que está de acuerdo con que su tarea sea enviada a Ouriginal antes de que pueda subir su archivo.';
$string['assignforcesubmissionstatement'] = 'Forzar la declaración de presentación de la tarea';
$string['assignforcesubmissionstatement_desc'] = 'Si se habilita esta opción, se forzará la declaración de envío de la entrega cuando se habilite Ouriginal en una tarea.<br/> <strong>NOTA: al marcar esta casilla se encontrarán todas las tareas existentes en su sitio con Ouriginal habilitado y se activará la declaración de envío.</strong>';
$string['assignpreventexistingenable'] = 'No habilitar si existen tareas';
$string['assignpreventexistingenable_desc'] = 'No permitir al personal no administrador que habilite Ouriginal cuando la tarea ya contiene envíos.';
$string['assignsettings'] = 'Ajustes de la tarea';
$string['attempts'] = 'Intentos realizados';
$string['cannotsubmitonbehalf'] = 'Los estudiantes de esta tarea deben aceptar la declaración de presentación de Ouriginal antes de la entrega, usted no puede hacerlo en su nombre';
$string['cannotupgradeunprocesseddata'] = '<h1>No puedo actualizar a esta versión del plugin debido a datos aún sin procesar, por favor haz un downgrade a la versión anterior y limpia los eventos pendientes.</h1><p>Esta versión del plugin depende de la API que gestiona nuevos eventos en Moodle, pero en tu instalación hay eventos sin procesar relacionados con la API antigua.</p><p>Debería hacer un downgrade a una versión antigua del plugin de Ouriginal, pon el sitio en modo mantenimiento, ejecuta el cron de Moodle y asegúrate de que todos los eventos antiguos han sido procesados. A continuación, vuelve a intentar actualizar a esta versión del plugin.</p><p>Para más información ver: <a href="https://docs.moodle.org/en/Plagiarism_Prevention_Ouriginal_Settings#Installation_failed_due_to_unprocessed_data">Instalación de Ouriginal falló por eventos sin procesar</a></p>';
$string['charcount'] = 'Número mínimo de caracteres';
$string['charcount_help'] = 'Longitud mínima de las aportaciones de los foros y tareas en línea para que sean enviadas a Ouriginal.';
$string['confirmresetall'] = 'Esto restablecerá todos los archivos en el estado: {$a}';
$string['courseshortname'] = 'Nombre corto del curso';
$string['cronwarningscores'] = 'La tarea de Ouriginal que obtiene los porcentajes no se ha ejecutado durante al menos 30 minutos - Cron debe estar configurado para que Ouriginal funcione correctamente.';
$string['cronwarningsendfiles'] = 'La tarea de Ourignal que envía los archivos no se ha ejecutado durante al menos 30 minutos - Cron debe estar configurado para que Ouriginal funcione correctamente.';
$string['debugfilter'] = 'Filtrar archivos por';
$string['defaultsdesc'] = 'Los siguientes parámetros se establecen por defecto al habilitar Ouriginal en un Módulo de Actividad.';
$string['defaultupdated'] = 'Valores por defecto actualizados';
$string['deleteallfiltered'] = 'Eliminar todos los archivos que coincidan con el filtro actual';
$string['deletedwarning'] = 'Este archivo no ha sido encontrado - pudo haber sido borrado por el usuario';
$string['deleteselectedfiles'] = 'Borrar seleccionados';
$string['errorcode'] = 'Código de error';
$string['errorcode_101'] = 'Error: Se ha alcanzado el límite del documento';
$string['errorcode_3'] = 'Error: Documento demasiado corto';
$string['errorcode_4'] = 'Error: Se ha superado el plazo';
$string['errorcode_403'] = 'No se ha podido crear la dirección del receptor para su cuenta, debe introducir una manualmente.';
$string['errorcode_409'] = 'Su dirección de receptor ha sido borrada y necesita ser restaurada, por favor contacte con Ouriginal para restaurar esta cuenta';
$string['errorcode_5000'] = 'Error: La generación de informes ha fallado';
$string['errorcode_7001'] = 'Error: Fallo en la indexación';
$string['errorcode_unknown'] = 'Error: {$a}';
$string['errorcreate'] = 'Debe introducir manualmente una dirección de análisis.';
$string['explainerrors'] = 'Esta página muestra los archivos actualmente en estado de error.  <br/>Los archivos eliminados en esta página no serán reenviados y los errores dejarán de ser mostrados a profesores y estudiantes';
$string['file'] = 'Archivo';
$string['filedeleted'] = 'Archivo eliminado de la cola';
$string['filereset'] = 'Un fichero ha sido reseteado para volver a enviarlo a Ouriginal';
$string['fileresubmitted'] = 'Fichero encolado para volver a enviar';
$string['filesresubmitted'] = '{$a} ficheros reenviados';
$string['filter30'] = 'Excluir más antiguos de 30 días';
$string['filter7'] = 'Excluir más antiguos de 7 días';
$string['filter90'] = 'Excluir más antiguos de 90 días';
$string['getallscores'] = 'Conseguir todos los porcentajes';
$string['getscore'] = 'Conseguir porcentaje';
$string['getscores'] = 'Conseguir porcentajes';
$string['heldevents'] = 'Retener eventos';
$string['heldeventsdescription'] = 'Hay eventos no completados tras el primer intento y fueron encolados para volver a enviar - pueden implicar que otros eventos no finalicen por lo que hay que revisarlos. Algunos de estos eventos pueden no ser relevantes para Ouriginal.';
$string['iagree'] = 'Estoy de acuerdo';
$string['iagreetostatement'] = 'Estoy de acuerdo en que mi tarea sea enviada a Ouriginal para su procesamiento.';
$string['id'] = 'ID';
$string['identifier'] = 'Identificador';
$string['idisagree'] = 'Cancelar';
$string['module'] = 'Módulo';
$string['modulenotfound'] = 'Podría no encontrar el módulo {$a->module} con el id {$a->modid}.';
$string['name'] = 'Nombre';
$string['nofilter'] = 'Sin filtro';
$string['noreceiver'] = 'No se especificó la dirección de destino';
$string['optout'] = 'Opt-out';
$string['pending'] = 'Este archivo está pendiente de ser enviado a Ouriginal';
$string['pluginname'] = 'Ouriginal plugin de plagio';
$string['previouslysubmitted'] = 'Enviado previamente como';
$string['privacy:metadata:core_files'] = 'Ficheros y texto adjuntados a módulos de actividad en los que Ouriginal está habilitado.';
$string['privacy:metadata:plagiarism_urkund_client'] = 'Información de usuario enviado a la API de Ouriginal';
$string['privacy:metadata:plagiarism_urkund_client:email'] = 'Email usuario';
$string['privacy:metadata:plagiarism_urkund_client:file'] = 'Copia del texto en línea o contenido del fichero enviado a Ouriginal';
$string['privacy:metadata:plagiarism_urkund_client:filename'] = 'Nombre del fichero enviado.';
$string['privacy:metadata:plagiarism_urkund_files'] = 'Almacenar información de los ficheros enviados.';
$string['privacy:metadata:plagiarism_urkund_files:lastmodified'] = 'Hora actualización registro';
$string['privacy:metadata:plagiarism_urkund_files:similarityscore'] = 'Porcentaje similitud Ouriginal';
$string['privacy:metadata:plagiarism_urkund_files:userid'] = 'Userid Moodle';
$string['processing'] = 'Este fichero ha sido enviado a Ouriginal, a la espera de que el análisis esté disponible';
$string['receivernotvalid'] = 'No es dirección destino valida.';
$string['recordsdeleted'] = '{$a} error(s) ha(n) sido borrado(s)';
$string['regenerationrequested'] = 'Todos los informes han sido marcados para volver a ser generados, puede llevar un tiempo hasta que estén disponibles los nuevos informes.';
$string['report'] = 'informe';
$string['restrictcontent'] = 'Envíe archivos adjuntos y texto en línea';
$string['restrictcontent_help'] = 'Ouriginal puede procesar los archivos cargados, pero también puede procesar el texto en línea de los mensajes del foro y el texto de tareas del tipo texto en línea. Usted puede decidir qué componentes enviar a Ouriginal.';
$string['restrictcontentfiles'] = 'Sólo enviar ficheros';
$string['restrictcontentno'] = 'Enviar todo';
$string['restrictcontenttext'] = 'Sólo enviar texto en línea';
$string['restrictfiles'] = 'Tipos de archivo a enviar';
$string['resubmit'] = 'Reenviar';
$string['resubmitall'] = 'Reenviar todos los que tengan estado: {$a}';
$string['resubmitallfiltered'] = 'Reenviar todos los archivos que coincidan con el filtro actual';
$string['resubmitclose'] = 'Reenviar después de la fecha límite';
$string['resubmitdue'] = 'Reenviar después de la fecha de entrega';
$string['resubmittourkund'] = 'Regenerar todos los informes de Ouriginal';
$string['savedconfigfailed'] = 'Usuario/Contraseña incorrectos. Ouriginal ha sido deshabilitado, vuelve a intentarlo.';
$string['savedconfigsuccess'] = 'Configuración antiplagio guardada';
$string['scoreavailable'] = 'Ouriginal ha procesado el fichero y el informe está disponible.';
$string['scorenotavailableyet'] = 'Ouriginal no ha procesado este fichero aún.';
$string['sendfiles'] = 'Enviar ficheros encolados';
$string['showall'] = 'Mostrar todos los errores';
$string['showwhencutoff'] = 'Después de la fecha límite de la actividad';
$string['showwhendue'] = 'Después de la fecha de entrega de la actividad';
$string['similarity'] = 'Ouriginal';
$string['status'] = 'Estado';
$string['status_202'] = 'Recibido, a la espera del informe';
$string['status_404'] = 'La dirección de análisis no existe';
$string['status_413'] = 'Archivo demasiado grande';
$string['status_415'] = 'Formato de archivo no soportado';
$string['status_444'] = 'No se ha añadido ninguna dirección de análisis';
$string['status_pending'] = 'Esperando para ser enviado';
$string['storedocuments'] = 'Agregar envíos a la base de datos de Ouriginal';
$string['storedocuments_help'] = 'Si se establece en Sí, los envíos se añadirán a la base de datos de Ouriginal para su futura comparación con otros envíos; si se establece en No, el documento se eliminará de Ouriginal una vez finalizado el análisis.';
$string['studentdisclosure'] = 'Publicación estudiante';
$string['studentdisclosure_help'] = 'Texto visualizado por los estudiantes en la página de subida de ficheros.';
$string['studentdisclosuredefault'] = 'Los ficheros adjuntados se enviarán para su análisis al servicio de detección del plagio Ouriginal.
Si desea evitar que su documento sea usado para la detección del plagio en otras instituciones puede usar el enlace proporcionado tras la generación del informe.';
$string['studentemailcontent'] = 'El fichero enviado al {$a->modulename} en el aula virtual {$a->coursename} ha sido procesado por el servicio de detección del plagio Ouriginal.
{$a->modulelink}

Si desea evitar que su documento sea usado para la detección del plagio en otras instituciones puede usar el siguiente enlace:.
{$a->optoutlink}';
$string['studentemailcontentnoopt'] = 'El fichero enviado al {$a->modulename} en el aula virtual {$a->coursename} ha sido procesado por el servicio de detección del plagio Ouriginal.
{$a->modulelink}';
$string['studentemailsubject'] = 'Fichero procesado por Ouriginal';
$string['submissionagreement'] = 'Acuerdo de presentación';
$string['submitondraft'] = 'Enviar el fichero nada más subirse';
$string['submitonfinal'] = 'Enviar el fichero cuando el estudiante lo envíe para su calificación';
$string['timesubmitted'] = 'Hora envío';
$string['toolarge'] = 'Este fichero supera el tamaño máximo del servicio de detección del plagio Ouriginal 50MB';
$string['unknownwarning'] = 'Se ha producido un error durante el envío del fichero a Ouriginal';
$string['unknownwarninggetscore'] = 'Imposible recuperar el porcentaje de plagio de este fichero';
$string['unsupportedfiletype'] = 'Tipo de fichero no soportado';
$string['updateallowedfiletypes'] = 'Actualizar los tipos de archivo permitidos y borrar los registros de Ouriginal asociados a actividades eliminadas.';
$string['urkund'] = 'Plugin antiplagio Ouriginal';
$string['urkund:advancedsettings'] = 'Permitir al profesor ver la configuración avanzada del módulo desde Ouriginal';
$string['urkund:enable'] = 'Permitir al profesor habilitar/deshabilitar Ouriginal en una actividad';
$string['urkund:resetfile'] = 'Permitir al profesor reenviar el fichero a Ouriginal tras un error';
$string['urkund:resubmitallfiles'] = 'Permitir al profesor reenviar TODOS los ficheros a Ouriginal';
$string['urkund:resubmitonclose'] = 'Permitir al profesor reenviar todos los ficheros  en la fecha programada/cierre a Ouriginal';
$string['urkund:viewreport'] = 'Permitir al profesor ver el informe completo de Ouriginal';
$string['urkund_advanceditems'] = 'Ajustes considerados avanzados';
$string['urkund_advanceditems_help'] = 'Lista de ajustes considerados avanzadas, serán mostrados como avanzados en los ajustes del módulo. Estos, se ocultarán a los profesores sin el permiso \'urkund:advancedsettings\'.';
$string['urkund_api'] = 'URL integración Ouriginal';
$string['urkund_api_help'] = 'Esta es la dirección de la API de Ouriginal, por defecto: https://secure.urkund.com';
$string['urkund_draft_submit'] = 'Cuando se envía el fichero';
$string['urkund_enableoptout'] = 'Mostrar enlace opt-out';
$string['urkund_enableoptoutdesc'] = 'Deshabilitado no permite a los alumnos elegir si no desean que sus trabajos sean utilizados para el análisis antiplagio en otros sitios diferentes (depende los ajustes por defecto). Al desactivar este opción, asume la responsabilidad de la gestión del copyright de las entregas de los estudiantes y está seguro de que no va en contra de las leyes aplicables en su país.';
$string['urkund_enableplugin'] = 'Habilitar Ouriginal para {$a}';
$string['urkund_hidefilename'] = 'Ocultar el nombre del fichero enviado';
$string['urkund_hidefilenamedesc'] = 'Si lo habilita, se enviará a Ouriginal un nombre de fichero genérico y los estudiantes no verán el nombre del fichero de cualquier entrega anterior susceptible de haber sido plagiada.';
$string['urkund_lang'] = 'Idioma';
$string['urkund_lang_help'] = 'Código de lenguaje proporcionado por Ouriginal';
$string['urkund_password'] = 'Contraseña';
$string['urkund_password_help'] = 'Contraseña proporcionada por Ouriginal para acceder a API';
$string['urkund_receiver'] = 'Dirección del receptor';
$string['urkund_receiver_help'] = 'Esta es la dirección única proporcionada por Ouriginal para el profesor';
$string['urkund_resubmit_on_close'] = 'Volver a enviar los trabajos al cerrar la tarea';
$string['urkund_resubmit_on_close_desc'] = 'Reenviar los trabajos a Ouriginal cuando se alcance la fecha programada.';
$string['urkund_resubmit_on_close_help'] = 'Si se activa esta opción, los envíos se reenviarán a Ouriginal cuando se cierre el periodo de envío de la tarea.';
$string['urkund_show_student_report'] = 'Mostrar al estudiante informe de similaridad';
$string['urkund_show_student_report_help'] = 'El informe de similitud ofrece un desglose de las partes del envío que fueron plagiadas y el lugar en el que Ouriginal vio por primera vez este contenido';
$string['urkund_show_student_score'] = 'Mostrar puntuación de similitud al alumno';
$string['urkund_show_student_score_help'] = 'La puntuación de similitud es el porcentaje del envío que ha sido emparejado con otros contenidos.';
$string['urkund_studentemail'] = 'Enviar un correo electrónico al alumno';
$string['urkund_studentemail_help'] = 'Esta opción enviará un correo electrónico al estudiante cuando se haya procesado un archivo para informarle que el informe está disponible, el correo electrónico también incluye el enlace de exclusión.';
$string['urkund_unitid'] = 'Unit ID';
$string['urkund_unitid_help'] = 'Ouriginal puede crear automáticamente las direcciones de los receptores para cada usuario, deje esta configuración vacía si quiere utilizar la misma dirección por defecto para todas las asignaciones, contacte con Ouriginal para saber el unitid a utilizar si quiere utilizar esta función. Advertencia: al establecer este valor también se borrarán las direcciones receptoras por defecto a nivel de sitio, ya que éstas ya no se aplicarán.';
$string['urkund_username'] = 'Usuario';
$string['urkund_username_help'] = 'Usuario suministrador por Ouriginal para acceder al servicio';
$string['urkund_userpref'] = 'Usar la última dirección destino';
$string['urkund_userprefdesc'] = 'La última dirección destino usada por el usuario se usará como la dirección por defecto para todas las tareas que cree el usuario. Si no está habilitada, se usará siempre la dirección por defecto en el sitio.';
$string['urkunddebug'] = 'Depurando';
$string['urkunddefaults'] = 'Ajustes por defecto de Ouriginal';
$string['urkunddefaults_assign'] = 'Ajustes por defecto de la tareas';
$string['urkunddefaults_forum'] = 'Ajustes por defecto de los foros';
$string['urkunddefaults_hsuforum'] = 'Ajustes por defecto para los hsuforum';
$string['urkunddefaults_quiz'] = 'Ajustes por defecto de los cuestionarios';
$string['urkunddefaults_workshop'] = 'Ajustes por defecto de los talleres';
$string['urkundexplain'] = 'Más información sobre este plugin: <a href="https://ouriginal.com" target="_blank">ouriginal.com</a>';
$string['urkundfiles'] = 'Ficheros Ouriginal';
$string['useurkund'] = 'Habilitar Ouriginal';
$string['waitingevents'] = 'Hay {$a->countallevents} eventos esperando a la ejecución del cron y {$a->countheld} pendientes de reenvío';
