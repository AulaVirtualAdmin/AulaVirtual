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
 * Strings for component 'plagiarism_safeassign', language 'es', version '4.2'.
 *
 * @package     plagiarism_safeassign
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['acceptlicense'] = 'Aceptar licencia de SafeAssign';
$string['agree_continue'] = 'Guardar formulario';
$string['assign_success_sync'] = 'Tareas sincronizadas con éxito';
$string['button_disabled'] = 'Guardar formulario para probar conexión';
$string['connectionfailed'] = 'Conexión Fallida';
$string['connectionverified'] = 'Conexión Verificada';
$string['course_error_sync'] = 'Ocurrió un error al intentar sincronizar el Curso con ID: {$a} a SafeAssign: <br>';
$string['course_success_sync'] = 'Cursos sincronizados con éxito';
$string['credentials'] = 'Credenciales y URL de Servicio';
$string['disclaimer'] = '<br>Enviar a la <a href="https://help.blackboard.com/Learn/Instructor/Assignments/SafeAssign#global_reference" target="_blank"> Base de Datos de Referencia Global</a> de SafeAssign
permite revisar trabajos de otras instituciones <br> comparándolos con el trabajo de su alumno para proteger el origen de su trabajo.';
$string['error_api_forbidden'] = 'Hubo un error de autorización al procesar su solicitud';
$string['error_api_generic'] = 'Hubo un error al procesar su solicitud';
$string['error_api_not_found'] = 'El recurso buscado no se encontró';
$string['error_api_unauthorized'] = 'Hubo un error de autenticación al procesar su solicitud';
$string['error_behat_getjson'] = 'Error al conseguir el archivo JSON "{$a}" de la carpeta plagiarism/safeassign/tests/fixtures para simular llamadas a servicios web de SafeAssign durante la ejecución de pruebas de behat.';
$string['error_behat_instancefail'] = 'Este es una instancia configurada para fallar con pruebas de behat.';
$string['error_generic'] = '{$a}';
$string['files_accepted'] = 'SafeAssign acepta archivos solamente en formatos .doc, .docx, .docm, .ppt, .pptx, .odt, .txt, .rtf, .pdf y .html.  Archivos en cualquier otro formato, incluyendo .zip y otros formatos de archivos comprimidos no serán revisados por SafeAssign.
<br><br>Al enviar este documento, usted acepta:
(1) que está enviando su trabajo para utilizar y estar almacenado como parte de los servicios de SafeAssign™ acorde a los <a href="http://www.blackboard.com/safeassign/tos.htm" target="_blank">Términos de Servicio</a> y la <a href="http://blackboard.com/footer/privacy-policy.aspx" target="_blank">Política de Privacidad Blackboard</a> de Blackboard;
(2) que su institución puede utilizar su trabajo de acuerdo a las políticas de su institución; y
(3) que su uso de SafeAssign será sin recurso legal en contra de Blackboard Inc. y sus afiliados.';
$string['getscores'] = 'Conseguir puntuaciones para entregas';
$string['getscoreslog'] = 'Registro de tareas de puntuación SafeAssign';
$string['getscoreslog_desc'] = 'Tarea de puntuación SafeAssign completada con éxito.';
$string['privacy:metadata:plagiarism_safeassign_files:similarityscore'] = 'Puntaje de similitud para el archivo enviado.';
$string['privacy:metadata:plagiarism_safeassign_subm:avgscore'] = 'El puntaje promedio de similitud para todos los archivos enviados.';
$string['privacy:metadata:plagiarism_safeassign_subm:highscore'] = 'El puntaje más alto de similitud para un archivo enviado.';
