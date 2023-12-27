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
 * Strings for component 'plagiarism_turnitin', language 'es', version '4.2'.
 *
 * @package     plagiarism_turnitin
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['allownonor'] = '¿Permitir la entrega de ficheros de cualquier tipo?';
$string['allownonor_help'] = 'Esta opción permitirá que se entreguen ficheros de cualquier tipo. Si se establece a "Si", se comprobará la originalidad cuando sea posible, las entregas estarán disponibles para su descarga y las herramientas de GradeMark y Feedback se usaran cuando sea posible.';
$string['anonblindmarkingnote'] = 'Nota: La opción de evaluación anónima ha sido eliminada. Turnitin usará la configuración de evaluación ciega de Moodle.';
$string['assigngeterror'] = 'No se pudieron obterner datos de turnitintwo';
$string['attachrubric'] = 'Enlazar una rúbrica a este ejercicio';
$string['attachrubricnote'] = 'Nota: los alumnos podrán ver las rúbricas asociadas y su contenido antes de enviar.';
$string['because'] = 'Esto fue causado porque el administrador borró un ejercicio que estaba en la cola de procesamiento e interrumpió su envío a Turnitin. <br /><strong>El fichero aun existe en Moodle, por favor contacte con su instructor.</strong><br />Por favor, compruebe los códigos de error de abajo:';
$string['changerubricwarning'] = 'Cambiar o desvincular una rúbrica eliminara todas valoraciones existentes de los artículos en este ejercicio, incluyendo las valoraciones que se hicieron con anterioridad. Las calificaciones globales de los artículos ya calificados se conservarán.';
$string['checkagainstnote'] = 'Nota: Debe seleccionar "Sí" en al menos una de las opciones "Comparar con..." para que se genere un informe de originalidad.';
$string['classupdateerror'] = 'No se pudo actualizar los datos de la clase Turnitin';
$string['closebutton'] = 'Cerrar';
$string['code'] = 'Código';
$string['compareinstitution'] = 'Comparar los ficheros enviados con artículos de esta institución';
$string['config'] = 'Configuración';
$string['configupdated'] = 'Configuración actualizada';
$string['configureerror'] = 'Debe configurar este módulo totalmente antes de usarlo en un curso. Por favor, contacte con el administrador de Moodle.';
$string['connecttesterror'] = 'Hubo un error conectando  Turnitin. El mensaje es el siguente: <br />';
$string['course'] = 'Curso';
$string['coursegeterror'] = 'No se pudo obtener información del curso';
$string['cronsubmittedsuccessfully'] = 'Envío: {$a->title} (TII ID: {$a->submissionid}) del ejercicio {$a->assignmentname} en el curso {$a->coursename} se envió correctamente a Turnitin.';
$string['defaultinserterror'] = 'Hubo un error intentando insertar un ajuste por defecto en la base de datos';
$string['defaults'] = 'Ajustes por defecto';
$string['defaultsdesc'] = 'Los siguientes ajustes se aplicarán por defecto cuando se active Turnitin en un módulo de actividad';
$string['defaultupdated'] = 'Ajustes por defecto actualizados';
$string['defaultupdateerror'] = 'Hubo un error intentando actualizar un ajuste por defecto en la base de datos';
$string['deleteconfirm'] = '¿Está seguro de que quiere borrar este envío?  Esta acción no podrá deshacerse.';
$string['deleted'] = 'Borrado';
$string['deletesubmission'] = 'Borrar Envio';
$string['digital_receipt_subject'] = 'Este es su Recibo Digital de Turnitin';
$string['digitalreceipt'] = 'Recibo Digital';
$string['draftsubmit'] = '¿Cuando se enviará el fichero a Turnitin?';
$string['erater'] = 'Activar la comprobación de gramática con e-rater';
$string['erater_categories'] = 'Categorias e-rater';
$string['erater_dictionary'] = 'Diccionario e-rater';
$string['erater_dictionary_en'] = 'Diccionarios para US y UK';
$string['erater_dictionary_engb'] = 'Diccionario Inglés UK';
$string['erater_dictionary_enus'] = 'Diccionario Inglés US';
$string['erater_grammar'] = 'Gramática';
$string['erater_handbook'] = 'ETS&copy; Handbook';
$string['erater_handbook_advanced'] = 'Avanzado';
$string['erater_handbook_elementary'] = 'Escuela Primaria';
$string['erater_handbook_highschool'] = 'Instituto';
$string['erater_handbook_learners'] = 'Estudiantes Ingleses';
$string['erater_handbook_middleschool'] = 'Instituto';
$string['erater_mechanics'] = 'Mecánicas';
$string['erater_spelling'] = 'Ortografia';
$string['erater_style'] = 'Estilo';
$string['erater_usage'] = 'Uso';
$string['errorcode0'] = 'Este fichero no se envió a Turnitin, contacte con su administrador de sistemas';
$string['errorcode1'] = 'Este fichero no se envió a Turnitin porque no tiene suficiente contenido para producir un Informe de Originalidad.';
$string['errorcode10'] = 'Este archivo no ha sido enviado a Turnitin porque hay un problema para crear la clase en Turnitin, lo que impide los envíos; por favor consulte sus bitácoras de la API para más información.';
$string['errorcode11'] = 'Este archivo no ha sido enviado a Turnitin porque le faltan datos';
$string['errorcode12'] = 'Este archivo no ha sido enviado a Turnitin porque pertencece a una tarea en donde el curso fue eliminado. ID de la fila: ({$a->id}) | ID del Módulo del Curso: ({$a->cm}) | ID del Usuario: ({$a->userid})';
$string['errorcode13'] = 'Este submissionid - {$a->externalid} no se encontró en Turnitin. No fue posible obtener puntaje de similitud y otros datos del envío.a.';
$string['errorcode2'] = 'Este fichero no se enviará a Turnitin porque excede el tamaño máximo permitido de {$a}';
$string['errorcode3'] = 'Este fichero no se ha enviado a Turnitin porque el usuario no aceptó los términos de la Licencia (EULA) de Turnitin';
$string['errorcode4'] = 'Debe subir un fichero de un tipo soportado. Los tipos soportados son:  .doc, .docx, .ppt, .pptx, .pps, .ppsx, .pdf, .txt, .htm, .html, .hwp, .odt, .wpd, .ps and .rtf';
$string['errorcode5'] = 'El fichero no se ha enviado a Turnitin porque hay problemas creando el módulo. Turnitin está denegando los envíos. Por favor, consulte el log de la API para más informacion';
$string['errorcode6'] = 'El fichero no se ha enviado a Turnitin porque hay problemas editando los ajustes del módulo en el que Turnitin está denegando los envíos. Por favor, consulte el log de la API para más información';
$string['errorcode7'] = 'El fichero no se ha enviado a Turnitin porque hay problemas creando el usuario. Turnitin está denegando los envíos. Por favor, consulte el log de la API para más información';
$string['errorcode8'] = 'El fichero no se ha enviado a Turnitin porque hay problemas creando el fichero temporal. La causa más probable es un nombre de fichero no válido. Por favor, renombre el fichero y vuelva a enviarlo usando "Editar envío".';
$string['errorcode9'] = 'El fichero no se ha enviado porque no hay contenido accesible en el depósito de ficheros al que se envió.';
$string['errors'] = 'Errores';
$string['excludebiblio'] = 'Excluir Bibliografia';
$string['excludebiblio_help'] = 'El material bibliográfico también puede ser incluido y excluido al ver el Reporte de Originalidad. Esta configuración no puede modificarse después de haber enviado el primer archivo.';
$string['excludepercent'] = 'Porcentaje';
$string['excludequoted'] = 'Excluir Material Citado';
$string['excludequoted_help'] = 'El material citado también puede ser incluido o excluido al ver el Reporte de Originalidad. Esta configuración no puede modificarse después de haber enviado el primer archivo.';
$string['excludevalue'] = 'Excluir equivalencias menores';
$string['excludewords'] = 'Palabras';
$string['faultcode'] = 'Código de errores';
$string['filedoesnotexist'] = 'El fichero ha sido eliminado';
$string['genduedate'] = 'Generar informes en la fecha de entrega (se permitirán segundas entregas hasta la fecha de entrega)';
$string['genimmediately1'] = 'Generar informes inmediatamente (no se permiten segundas entregas)';
$string['genimmediately2'] = 'Generar informes inmediatamente (se permitirán segundas entregas hasta la fecha de entrega): Después de {$a->num_resubmissions} reenvíos, los informes se generan pasadas {$a->num_hours} horas';
$string['grademark'] = 'GradeMark';
$string['id'] = 'Id';
$string['institutionalrepository'] = 'Repositorio Institucional (cuando existe)';
$string['internetcheck'] = 'Comparar con Internet';
$string['journalcheck'] = 'Comparar con Diarios, <br /> Revistas y Otras Publicaciones';
$string['launchpeermarkmanager'] = 'Activar el administrador de Peermark';
$string['launchpeermarkreviews'] = 'Activar las revisiones de Peermark';
$string['launchquickmarkmanager'] = 'Activar el administrador de Quickmark';
$string['launchrubricmanager'] = 'Activar el administrador de rúbricas de evaluación';
$string['launchrubricview'] = 'Ver la matriz de evaluación que se ha usado para corregir';
$string['line'] = 'Línea';
$string['loadingdv'] = 'Cargando el visor de documentos Turnitin';
$string['locked_message'] = 'Mensaje bloqueado';
$string['locked_message_default'] = 'Este ajuste está bloqueado a nivel de sitio';
$string['locked_message_help'] = 'Si algún ajuste está bloqueado, se muestra este mensaje para explicar por qué.';
$string['message'] = 'Mensaje';
$string['messageprovider:submission'] = 'Notificaciones de Recibos Digitales del Plubin de Plagio Turnitin';
$string['module'] = 'Módulo';
$string['norepository'] = 'Sin Repositorios';
$string['norubric'] = 'Sin Rúbricas';
$string['noscriptula'] = '(Como no tiene javascript activado tendrá que refrescar manualmente esta pagina antes de realizar en envío y después de aceptar el Acuerdo de Usuario de Turnitin)';
$string['notavailableyet'] = 'No disponible';
$string['notorcapable'] = 'No es posible producir un Informe de Originalidad para este fichero.';
$string['otherrubric'] = 'Usar rúbricas de otro profesor';
$string['pending'] = 'Pendiente';
$string['pluginname'] = 'Plugin de control antiplagio Turnitin';
$string['pp_createsubmissionerror'] = 'Hubo un error intentando crea el envio en Turnitin';
$string['pp_digital_receipt_message'] = 'Estimado {$a->firstname} {$a->lastname},<br /><br />Usted ha enviado correctamente el fichero <strong>{$a->submission_title}</strong> al ejercico <strong>{$a->assignment_name}{$a->assignment_part}</strong> en la clase <strong>{$a->course_fullname}</strong> on <strong>{$a->submission_date}</strong>. El id de su envío es <strong>{$a->submission_id}</strong>.Su recibo digital completo puede verse e imprimirse usando el botón imprimir/descargar en el Visor de Documentos.<br /><br />Gracias por usar Turnitn,<br /><br />El equipo de Turnitin';
$string['pp_submission_error'] = 'Turnitin ha devuelto un error con su envio:';
$string['pp_updatesubmissionerror'] = 'Hubo un error intentando reenviar su envio a Turnitin';
$string['ppcronsubmissionlimitreached'] = 'No se mandarán más envíos a Turnittin en esta ejecución de cron porque sólo se procesan {$a} por ejecucion';
$string['pperrorsdesc'] = 'Hubo problemas intentando enviando los siguientes ficheros a Turnitin. Para reenviarlos, selecciones los ficheros y pulse el botón de reenvío. Los ficheros serán procesados en la próxima ejecución de cron.';
$string['pperrorsfail'] = 'Hubo problemas con algunos de los ficheros que seleccionó. No se pudo crear un nuevo trabajo en cron para ellos.';
$string['pperrorssuccess'] = 'Los ficheros que seleccionó han sido reenviados y serán procesados por cron.';
$string['ppeventsfailedconnection'] = 'No se procesaran nuevos trabajos por la extensión de plagio Turnitin porque no se pudo establecer una conexión con Turnitin.';
$string['ppqueuesize'] = 'Número de trabajos en la cola del la extensión de plagio';
$string['ppsubmissionerrorseelogs'] = 'El fichero no se ha enviado a Turnitin, por favor contacte con su administrador de sistemas';
$string['ppsubmissionerrorstudent'] = 'El fichero no se ha enviado a Turnitin, por favor consulte al tutor para más detales.';
$string['privacy:metadata:core_files'] = 'Tarea Turnitin almacena archivos que han sido subidos a Moodle para formar un envío Turnitin.';
$string['privacy:metadata:plagiarism_turnitin_client'] = 'Para hacer exitosamente un envío a Turnitin, datos específicos del usuario necesitan ser intercambiados entre Modle y Turnitin.';
$string['privacy:metadata:plagiarism_turnitin_client:email'] = 'La dirección Email del usuario es compartida por Moodle para habilitar la creación de una cuenta Turnitin.';
$string['privacy:metadata:plagiarism_turnitin_client:firstname'] = 'El nombre del usuario es enviado a Turnitin para que el usuario pueda ser identificado.';
$string['privacy:metadata:plagiarism_turnitin_client:lastname'] = 'El apellido(s)del usuario es enviado a Turnitin para que el usuario pueda ser identificado.';
$string['privacy:metadata:plagiarism_turnitin_client:submission_filename'] = 'El nombre del archivo enviado es enviado a Turnitin para que sea identificable.';
$string['privacy:metadata:plagiarism_turnitin_client:submission_title'] = 'El títulodel envíoenviado es enviado a Turnitin para que sea identificable.';
$string['privacy:metadata:plagiarism_turnitin_files'] = 'Información que enlaza un envío Moodle a un envío urnitin.';
$string['privacy:metadata:plagiarism_turnitin_files:attempt'] = 'Un sello de tiempo que indica cuando el usuario vio retroalimentación  en su envío.';
$string['privacy:metadata:plagiarism_turnitin_files:grade'] = 'La calificación aplicada por un instructor al envío.';
$string['privacy:metadata:plagiarism_turnitin_files:lastmodified'] = 'Un sello de tiempo que indica cuando el usuario modificó por última vez su envío.';
$string['privacy:metadata:plagiarism_turnitin_files:orcapable'] = 'Indica si es que Turnitin pudo o no producir un reporte de similitud para el envío del usuario.';
$string['privacy:metadata:plagiarism_turnitin_files:student_read'] = 'Indica si es que un estudiante ha leido o no su retroalimentación.';
$string['privacy:metadata:plagiarism_turnitin_files:submissionscore'] = 'El puntaje de similitud del envío.';
$string['privacy:metadata:plagiarism_turnitin_files:transmatch'] = 'Indica si es que Turnitin ha usado o no concordancia traducida para producir un reporte de Similitud para el envío.';
$string['privacy:metadata:plagiarism_turnitin_files:userid'] = 'La ID del usuario que ha hecho un envío.';
$string['queued'] = 'En Cola';
$string['reportgenspeed'] = 'Velocidad de generación del informe';
$string['reportgenspeed_resubmission'] = 'Usted ya ha enviado un trabajo a esta tarea y se ha generado un Reporte de Similitud para su envío. Si Usted elige re-enviar su trabajo, su envío anterior será remplazado y un nuevo reporte será generado. Después de {$a->num_resubmissions} re-envíos, Usted necesitará esperar {$a->num_hours} después de un envío para ver un nuevo Reporte de Similitud..';
$string['resubmitselected'] = 'Reenviar los ficheros seleccionados';
$string['resubmitting'] = 'Reenviando';
$string['resubmittoturnitin'] = 'Reenviar a Turnitin';
$string['saveusage'] = 'Salvar volcado de datos';
$string['semptytable'] = 'No se encontraron resultados.';
$string['sendqueuedsubmissions'] = 'Mandar Archivos en Cola desde el Plugin de Plagio Turnitin';
$string['sharedrubric'] = 'Rúbrica Compartida';
$string['showusage'] = 'Ver Volcado de Datos';
$string['similarity'] = 'Similaridad';
$string['spapercheck'] = 'Comprobar con';
$string['standardrepository'] = 'Almacen estándar';
$string['student'] = 'Estudiante';
$string['student_notread'] = 'El estudiante no ha visto este trabajo.';
$string['student_read'] = 'El estudiante ha visto este trabajo el:';
$string['studentreports'] = 'Mostrar los Informes de originalidad a los estudiantes';
$string['studentreports_help'] = 'Permite mostrar los Informes de Originalidad Turnitin a los estudiantes usuarios. Si está configurado a Sí, el Informe de Originalidad generado por Turnitin estará disponible para ser visto por el estudiante.';
$string['submitondraft'] = 'Entregar el archivo en cuanto esté cargado';
$string['submitonfinal'] = 'Entregar el archivo cuando el estudiantes lo envia para su corrección';
$string['submitpapersto'] = 'Almacenar Trabajos de Estudiantes';
$string['submitpapersto_help'] = 'Esta opción les proporciona a los profesores la alternativa de decidir si los trabajos deben guardarse en un depósito de trabajos de estudiantes de Turnitin. El beneficio de entregar trabajos al depósito de trabajos de estudiantes es que los trabajos que se entreguen al ejercicio se compararán con las entregas de otros estudiantes dentro de tus clases, antiguas y actuales. Si seleccionas &#34;sin depósito&#34;, los trabajos de tus estudiantes no se guardarán en el depósito de trabajos de estudiantes de Turnitin.';
$string['tii_submission_failure'] = 'Por favor, consulta con tu tutor o administrador de Moodle para más detalles';
$string['tiiassignmentgeterror'] = 'Ha ocurrido un error al intentar obtener un ejercicio de Turnitin';
$string['tiiexplain'] = 'Turnitin es un producto comercial y debes estar suscrito para utilizar el servicio. Para más información visita <a href=http://docs.moodle.org/en/Turnitin_administration>http://docs.moodle.org/en/Turnitin_administration</a>';
$string['tiisubmissiongeterror'] = 'Ha ocurrido un error al intentar obtener una entrega de Turnitin';
$string['tiisubmissionsgeterror'] = 'Ha ocurrido un error al intentar obtener entregas de este ejercicio de Turnitin';
$string['transmatch'] = 'Coincidencias traducidas';
$string['turnitin'] = 'Turnitin';
$string['turnitin:enable'] = 'Habilitar Turnitin';
$string['turnitin:viewfullreport'] = 'Ver informe de originalidad';
$string['turnitinconfig'] = 'Configuración de la Extensión Turnitin Plagiarism';
$string['turnitindefaults'] = 'Ajustes por defecto de la Extensión Turnitin Plagiarism';
$string['turnitindeletionerror'] = 'La eliminación de la entrega a Turnitin ha fallado. La copia local de Moodle ha sido eliminada pero la entrega a Turnitin no';
$string['turnitinid'] = 'Turnitin ID';
$string['turnitinpluginsettings'] = 'Ajustes de la Extensión Turnitin Plagiarism';
$string['turnitinppulapost'] = 'Su fichero no se ha enviado a Turnitin. Por favor haga clic aquí para aceptar nuestro EULA.';
$string['turnitinppulapre'] = 'Para enviar un fichero a Turnitin debe aceptar primero nuestro EULA. Si no lo acepta el fichero se subirá a Moodle sólamente. Haga clic aquí para ceptar.';
$string['turnitinrefreshingsubmissions'] = 'Actualizando Envíos';
$string['turnitinrefreshsubmissions'] = 'Actualizar Envíos';
$string['turnitinstatus'] = 'Estado de Turnitin';
$string['turnitintoolofflineerror'] = 'Estamos experimentando problemas temporales. Inténtelo otra vez en unos minutos.';
$string['updatereportscores'] = 'Actualizar Puntajes de Reporte para Plugin de Plagio Turnitin';
$string['useturnitin'] = 'Activar Turnitin';
$string['useturnitin_mod'] = 'Activar Turnitin para {$a}';
