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
 * Strings for component 'qtype_oumultiresponse', language 'es', version '4.2'.
 *
 * @package     qtype_oumultiresponse
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['choices'] = 'Opciones disponibles';
$string['combinedcontrolnameoumultiresponse'] = 'grupo de casillas de verificación';
$string['correctanswer'] = 'Correcto';
$string['err_correctanswerblank'] = 'Ha marcado esta opción como correcta, ¡pero está en blanco!';
$string['err_nonecorrect'] = 'No ha marcado ninguna opción como correcta.';
$string['err_youneedmorechoices'] = 'Es necesario introducir 2 ó más opciones';
$string['notenoughcorrectanswers'] = 'Debe seleccionar al menos una opción correcta';
$string['pluginname'] = 'OU respuesta múltiple';
$string['pluginname_help'] = 'Tipo de pregunta de opción múltiple y respuesta múltiple con reglas de puntuación particulares.';
$string['pluginname_link'] = 'question/type/oumultiresponse';
$string['pluginnameadding'] = 'Añadir una pregunta de respuesta múltiple OU';
$string['pluginnameediting'] = 'Editar una pregunta de respuesta múltiple OU';
$string['pluginnamesummary'] = '<p>Tipo de pregunta de opción múltiple y respuesta múltiple con reglas de puntuación particulares.</p><p>Recomendado si su pregunta tiene más de una respuesta correcta.</p>';
$string['privacy:metadata'] = 'El plugin de preguntas de respuesta múltiple permite a los autores de las preguntas establecer opciones predeterminadas como preferencias del usuario.';
$string['privacy:preference:answernumbering'] = 'Qué estilo de numeración debe utilizarse (1., 2., 3., .../a., b., c., ... etc.)';
$string['privacy:preference:defaultmark'] = 'La calificación establecida por defecto para una pregunta determinada.';
$string['privacy:preference:penalty'] = 'La penalización por cada intento incorrecto cuando las preguntas se ejecutan utilizando el comportamiento \'Interactivo con múltiples intentos\' o \'Modo adaptativo\'.';
$string['privacy:preference:showstandardinstruction'] = 'Si se muestra la instrucción estándar.';
$string['privacy:preference:shuffleanswers'] = 'Si las respuestas deben barajarse automáticamente.';
$string['showeachanswerfeedback'] = 'Mostrar la retroalimentación de las respuestas seleccionadas';
$string['showstandardinstruction'] = 'Mostrar instrucciones estándar';
$string['showstandardinstruction_help'] = 'Con esta opción activada, se proporcionarán instrucciones estándar como parte del área de selección (por ejemplo, "Seleccione uno o más:"). Si se desactiva, los autores de las preguntas pueden incluir las instrucciones en el contenido de la pregunta, si es necesario.';
$string['toomanyoptions'] = 'Ha demasiadas opciones.';
$string['yougot1right'] = 'Ha seleccionado una respuesta correcta.';
$string['yougotnright'] = 'Ha seleccionado {$a->num} respuestas correctas.';
