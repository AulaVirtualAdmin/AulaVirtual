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
 * Strings for component 'block_coursefeedback', language 'es', version '4.2'.
 *
 * @package     block_coursefeedback
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['adminpage_html_allowhidinga'] = 'Permitir Ocultar';
$string['adminpage_html_allowhidingb'] = 'Si está habilitado, los profesores pueden editar la visibilidad del bloque.';
$string['adminpage_html_defaultlanguagea'] = 'Idioma predeterminado';
$string['adminpage_html_defaultlanguageb'] = 'Se mostrarán las preguntas en el idioma predeterminado si otros idiomas fallan al cargar (es decir, si las preguntas en un idioma preferido por el usuario no están definidas). ¡Eso significa que al menos debe definir todas las preguntas en el idioma predeterminado!';
$string['adminpage_html_notinstalled'] = '\'{$a}\' (no instalado)';
$string['adminpage_link_feedbackedit'] = 'editar/crear encuesta';
$string['caution'] = 'Advertencia';
$string['coursefeedback:addinstance'] = 'Añadir este bloque al sitio del curso';
$string['coursefeedback:download'] = 'Guardar el resultado de la retroalimentación del curso actual en un archivo';
$string['coursefeedback:evaluate'] = 'Evaluar la retroalimentación del curso actual';
$string['coursefeedback:managefeedbacks'] = 'Editar la configuración global del bloque de retroalimentación del curso';
$string['coursefeedback:myaddinstance'] = 'Agregue este bloque a la página "Mi página de inicio" (ya que es inútil allí, debería estar prohibido para todos)';
$string['coursefeedback:viewanswers'] = 'Vea el análisis de la retroalimentación actual del curso';
$string['download_html_filename'] = 'Resultados';
$string['download_thead_questions'] = 'Pregunta';
$string['eventviewed'] = 'Resiltados vistos';
$string['form_area_questiontext'] = 'Editar texto';
$string['form_header_addlang'] = 'Añadir un texto para otro idioma';
$string['form_header_confirm'] = 'Confirmación necesaria';
$string['form_header_deleteanswers'] = 'Eliminar respuestas de usuario';
$string['form_header_deletelang'] = 'Eliminar idioma(s)';
$string['form_header_editfeedback'] = 'Editar encuesta';
$string['form_header_editquestion'] = 'Editar pregunta';
$string['form_header_newfeedback'] = 'Nueva encuesta';
$string['form_header_newquestion'] = 'Nueva pregunta';
$string['form_header_question'] = 'Pregunta {$a}';
$string['form_html_currentlang'] = 'Estás editando {$a}';
$string['form_html_deleteanswerstext'] = 'El cuestionario no se puede editar ahora mismo, ya que hay respuestas de los usuarios. Puede eliminar ahora todas las respuestas o copiar las retroalimentaciones.';
$string['form_html_deleteanswerswarning'] = 'Estos datos se perderán irremediablemente al eliminar las respuestas del usuario. <br/> Asegúrese de que estos datos ya no son necesarios';
$string['form_html_nolangimplemented'] = 'Esta retroalimentación no tiene idiomas implementados.';
$string['form_html_notextendable'] = 'No puede extender esta pregunta porque no hay idiomas adicionales disponibles.';
$string['form_select_changepos'] = 'Determinar la nueva posición';
$string['form_select_confirmyesno'] = '¿Realmente desea eliminar?';
$string['form_select_deleteanswers'] = '¿Eliminar respuestas de usuario?';
$string['form_select_newlang'] = 'Idioma';
$string['form_select_unwantedlang'] = 'Seleccine idioma <br/><span style="font-size: x-small;">(respuesta múltiple disponible)<span>';
$string['page_headline_admin'] = 'Administración de la retroalimentación del curso';
$string['page_headline_listoffeedbacks'] = 'Lista de encuestas';
$string['page_headline_listofquestions'] = 'Cuestionario de \'{$a}\\';
$string['page_html_activated'] = 'La retroalimentación del curso ({$ a}) se ha registrado como la encuesta actual.';
$string['page_html_answersdeleted'] = 'Las respuestas del usuario han sido eliminadas.';
$string['page_html_courserating'] = 'Calificación del curso';
$string['page_html_editallquestions'] = 'Aplicar a todos los idiomas';
$string['page_html_intronotifications'] = 'La retroalimentación debe cumplir con la(s) siguiente(s) condición(es):';
$string['page_html_nofeedbackactive'] = 'Las encuestas han sido desactivadas.';
$string['page_html_noquestions'] = 'No hay preguntas disponibles.';
$string['page_html_norelations'] = 'Todas las preguntas tienen que estar definidas en por lo menos un idioma común.';
$string['page_html_saveerr'] = 'Ocurrió un error al guardar su evaluación.';
$string['page_html_servedefaultlang'] = 'Todas las preguntas tienen que estar definidas en el idioma común';
$string['page_html_viewintro'] = 'Análisis de encuesta. Los resultados muestran el número de votos para cada calificación y el promedio.';
$string['page_html_viewnavbar'] = 'Análisis de la encuesta';
$string['page_link_backtoconfig'] = 'Regresar a la administración del sitio web.';
$string['page_link_backtofeedbackview'] = 'Regresar a vista general';
$string['page_link_deletelanguage'] = 'Eliminar idioma(s)';
$string['page_link_download'] = 'Guardar resutados como  {$a}-file';
$string['page_link_newlanguage'] = 'Añadir idioma diferente';
$string['page_link_newquestion'] = 'Añadir nueva pregunta';
$string['page_link_newtemplate'] = 'Crear encuesta nueva';
$string['page_link_noquestion'] = 'No hay preguntas disponibles - crear una pregunta nueva.';
$string['page_link_settings'] = 'Administración';
$string['page_link_showlistofquestions'] = 'Editar preguntas';
$string['page_link_use'] = 'Uso';
$string['perm_header_editnotpermitted'] = 'La encuesta no puede cambiarse por las siguientes razones:';
$string['perm_html_answersexists'] = 'Esta retroalimentación ya ha sido completada por usuarios.';
$string['perm_html_danswerslink'] = 'Para crear una encuesta nueva con las mismas preguntas, Usted puede <a href="admin.php?fid={$a}&mode=feedback&action=new">copiar la retroalimentación</a> o <a href="admin.php?fid={$a}&mode=feedback&action=danswers">eliminar las respuestas del usuario</a>.';
$string['perm_html_duplicatelink'] = 'Para crear una encuesta nueva con las mismas preguntas, Usted puede <a href="admin.php?fid={$a}&mode=feedback&action=new">copiar la encuesta</a> o registrar otro cuestionario como la encuesta actual.';
$string['perm_html_erroractive'] = 'Usted no puede cambiar la encuesta actual.';
$string['pluginname'] = 'Retroalimentación del curso';
$string['table_header_languages'] = 'Idiomas disponibles';
$string['table_header_questions'] = 'Preguntas';
$string['table_html_average'] = 'Promedio';
$string['table_html_nofeedback'] = 'Sin encuesta';
$string['table_html_undefinedlang'] = 'Falta traducción. Idioma \'{$a}\' no disponible.';
$string['table_html_votes'] = 'Número de votos :';
$string['untitled'] = 'Intitulada';
