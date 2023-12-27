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
 * Strings for component 'qtype_answersselect', language 'es', version '4.2'.
 *
 * @package     qtype_answersselect
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['answersselectmode'] = 'Número de respuestas correctas e incorrectas';
$string['answersselectmode_help'] = 'Seleccione cuántas respuestas correctas e incorrectas se mostrarán al alumno. IMPORTANTE: Cuando cree una nueva pregunta, deberá hacer clic en el botón "Guardar cambios y continuar editando" para que los elementos del menú se activen.';
$string['automaticselection'] = 'Selección aleatoria automática';
$string['blankspace'] = 'espacio en blanco';
$string['comma'] = 'coma';
$string['correctanswer'] = 'Correcto';
$string['correctchoicesseparator'] = 'Separador que se utilizará para la visualización de las respuestas correctas';
$string['correctchoicesseparator_help'] = '<p>Este separador se utilizará para separar las respuestas correctas mostradas al alumno si se selecciona esa opción de revisión en el cuestionario.</p><ul><li>La coma es la opción por defecto, a utilizar para respuestas correctas cortas.</li> <li>Utilice el espacio en blanco si las respuestas correctas (ordenadas) son palabras sueltas que forman una frase.</li> <li>Utilice el salto de línea para respuestas correctas más largas que se visualizan mejor en líneas separadas.</li></ul>';
$string['hardsetamountisgreaterthanansweramount'] = 'El número de respuestas seleccionadas es mayor que la cantidad de respuestas reales.';
$string['hardsetamountofanswers'] = 'Número de respuestas en la pregunta';
$string['hardsetamountofanswers_help'] = 'Cantidad total de respuestas que se mostrarán al alumno. Este número cambia sólo después de guardar los cambios en las respuestas.';
$string['hastobeoneincorrectanswer'] = 'Añadir al menos una respuesta incorrecta';
$string['hastobeoneincorrectanswer_help'] = 'Esta opción garantiza que el "pool" de respuestas elegidas al azar tendrá al menos una respuesta incorrecta.';
$string['linebreak'] = 'salto de línea';
$string['manualselection'] = 'Selección manual';
$string['notenoughcorrectanswers'] = 'Debe seleccionar al menos una opción correcta';
$string['nrandomanswersselection'] = 'Selección del número de respuestas aleatorias';
$string['pluginname'] = 'Respuestas seleccionadas al azar';
$string['pluginname_help'] = 'Tipo de pregunta de opción múltiple y respuesta múltiple que permite la selección aleatoria de un "grupo" de respuestas correctas/incorrectas.';
$string['pluginname_link'] = 'question/type/answersselect';
$string['pluginnameadding'] = 'Añadir una pregunta de selección aleatoria de respuestas';
$string['pluginnameediting'] = 'Editar una pregunta de selección aleatoria de respuestas';
$string['pluginnamesummary'] = '<p>Un tipo de pregunta de opción múltiple y respuesta múltiple con reglas de puntuación particulares.</p> <p>Recomendado si su pregunta tiene un "pool" de respuestas correctas e incorrectas de las que se puede seleccionar un número determinado en tiempo de ejecución.</p>';
$string['privacy:metadata'] = 'El plugin de selección aleatoria de respuestas no almacena ningún dato personal.';
$string['randomselectcorrect'] = 'Número de respuestas correctas';
$string['randomselectcorrect_help'] = 'Número de respuestas correctas que se mostrarán al alumno.';
$string['randomselectincorrect'] = 'Número de respuestas incorrectas';
$string['randomselectincorrect_help'] = 'Número de respuestas incorrectas que se mostrarán al alumno.';
$string['showeachanswerfeedback'] = 'Mostrar la retroalimentación de las respuestas seleccionadas.';
$string['showstandardinstruction'] = 'Mostrar instrucciones estándar';
$string['showstandardinstruction_help'] = 'Con esta opción activada, se proporcionarán instrucciones estándar como parte del área de selección (por ejemplo, "Seleccione uno o más:"). Si se desactiva, los autores de las preguntas pueden incluir las instrucciones en el contenido de la pregunta, si es necesario.';
$string['toomanyoptions'] = 'Ha seleccionado demasiadas opciones.';
$string['useallanswers'] = 'Utilizar todas las respuestas (modo por defecto)';
$string['yougot1right'] = 'Ha seleccionado una respuesta correcta.';
$string['yougotnright'] = 'Ha seleccionado {$a->num} respuestas correctas.';
