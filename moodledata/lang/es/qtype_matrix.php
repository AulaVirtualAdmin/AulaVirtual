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
 * Strings for component 'qtype_matrix', language 'es', version '4.2'.
 *
 * @package     qtype_matrix
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['all'] = 'Subpuntos';
$string['allow_dnd_ui'] = 'Permitir el uso de la interfez Drag&Drop';
$string['allow_dnd_ui_descr'] = 'Si se permite, los profesores tendrán la posibilidad de activar la función de arrastrar y soltar en cualquier pregunta Matrix.';
$string['cols_description'] = 'Descripción';
$string['cols_shorttext'] = 'Repuesta';
$string['colsheader'] = 'Columnas de la matrix';
$string['colsheader_desc'] = '<p>El texto corto se utilizará cuando esté presente, con el texto más largo como información sobre herramientas.<br />Tenga en cuenta cómo se mostrará.</p> <p>Los alumnos pueden seleccionar varias o una sola columna por fila, dependiendo de cómo se haya configurado la pregunta, y cada fila recibe una calificación, definida por uno de los métodos de calificación.</p> <p>La calificación final de la pregunta es una media de sus calificaciones para cada una de las filas, con la excepción del tipo Kprime en el que todas las respuestas tienen que ser correctas.</p>';
$string['false'] = 'Falso';
$string['grademethod'] = 'Método de puntuación';
$string['grademethod_help'] = '<ul> <li><b>Kprime</b>: El alumno recibe un punto si todas las respuestas son correctas, medio punto si una respuesta es incorrecta y el resto de respuestas son correctas, y cero puntos en caso contrario. <li><b>Kprime1/0</b>: El alumno recibe un punto, si todas las respuestas son correctas, y cero puntos en caso contrario. Los métodos de puntuación Kprime y Kprime1/0 sólo deben utilizarse para preguntas con exactamente cuatro enunciados de respuesta. <li><b>Subpoints</b>: El alumno recibe subpuntos por cada respuesta correcta.</ul>';
$string['kany'] = 'Kprime (al menos una respuesta correcta, ninguna incorrecta)';
$string['matrixheader'] = 'Matriz de respuesta';
$string['multipleallowed'] = '¿Permitir varias respuestas por enunciado de pregunta?';
$string['mustaddupto100'] = 'La suma de todos los pesos no negativos de cada fila debe ser 100%.';
$string['mustdefine1by1'] = 'Debe definir al menos una matriz de 1 x 1; con respuesta corta o larga definida para cada fila y columna';
$string['oneanswerperrow'] = 'Debe proporcionar una respuesta para cada fila';
$string['pluginname_help'] = '<p>Las preguntas de matriz constan de una secuencia de ítems, como una pregunta o un enunciado incompleto, y enunciados de respuesta múltiple, como las respuestas o los complementos correspondientes. Los alumnos califican estos enunciados como "verdadero" o "falso". También se pueden definir valoraciones personalizadas para las frases de respuesta. Las preguntas de Kprime constan de un enunciado y cuatro respuestas correspondientes. Para cada respuesta, los alumnos deben decidir si es correcta o incorrecta.';
$string['pluginname_link'] = 'question/type/matrix';
$string['pluginnameadding'] = 'Añadir una pregunta Matrix/Kprime';
$string['pluginnameediting'] = 'Editar una pregunta Matrix/Kprime';
$string['pluginnamesummary'] = 'En las preguntas matriciales hay que puntuar correctamente varias afirmaciones relativas a un tema común. En las preguntas Kprime, exactamente cuatro de estas afirmaciones deben calificarse correctamente como "verdadero" o "falso".';
$string['privacy:metadata'] = 'El plugin de la pregunta Matrix/Kprime no almacena ningún dato personal.';
$string['refresh_matrix'] = 'Actualizar la matriz de respuesta';
$string['rows_description'] = 'Descripción';
$string['rows_feedback'] = 'Retroalimentación';
$string['rows_shorttext'] = 'Enunciado de la respuesta';
$string['rowsheader'] = 'Filas de la matriz';
$string['rowsheader_desc'] = '<p>El texto corto se utilizará cuando esté presente, con el texto más largo como información sobre herramientas.<br />Tenga en cuenta cómo se mostrará</p> <p>Los estudiantes pueden seleccionar varias o una sola columna por fila, dependiendo de cómo se haya configurado la pregunta, y cada fila recibe una calificación, definida por uno de los métodos de calificación.</p> <p>La calificación final de la pregunta es una media de sus calificaciones para cada una de las filas, con la excepción del tipo Kprime, en el que todas las respuestas tienen que ser correctas.</p> <p>';
$string['show_non_kprime_gui'] = 'Mostrar la interfaz gráfica de usuario para opciones que no son estrictamente de matriz kprime (más de cuatro filas, más de dos columnas, opciones múltiples).';
$string['shuffleanswers'] = '¿Barajar los enunciados de respuesta?';
$string['shuffleanswers_help'] = 'Si está activada, el orden de las frases de respuesta se baraja aleatoriamente para cada intento, siempre que también esté activada la opción "Barajar dentro de las preguntas" en los ajustes de la actividad.';
$string['true'] = 'Verdadero';
$string['use_dnd_ui'] = 'Usar drag&drop?';
$string['weightednomultiple'] = 'No tiene sentido elegir la calificación ponderada si no se permiten respuestas múltiples';
