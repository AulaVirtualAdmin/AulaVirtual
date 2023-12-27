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
 * Strings for component 'qtype_varnumeric', language 'es', version '4.2'.
 *
 * @package     qtype_varnumeric
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['combinedcontrolnamevarnumeric'] = 'Entrada numérica';
$string['err_notavalidnumberinanswer'] = 'Tienes que introducir un número válido en el campo de respuesta.';
$string['err_notavalidnumberinerrortolerance'] = 'Has introducido un número no válido en el campo de respuesta errónea.';
$string['pluginname'] = 'Variable numérica';
$string['pluginname_help'] = 'En respuesta a una pregunta, el encuestado teclea un número. Los números utilizados en la pregunta y empleados para calcular la respuesta se calculan sobre la marcha a partir de expresiones matemáticas o variables predefinidas. Todas las expresiones se calculan sobre la marcha y los valores de las funciones aleatorias son diferentes para todos los usuarios. Para una pregunta con valores establecidos para un número de "variantes" de la pregunta, con expresiones precalculadas y con valores aleatorios iguales para cada usuario, véase el tipo de pregunta "Conjunto numérico variable".';
$string['pluginname_link'] = 'question/type/varnumeric';
$string['pluginnameadding'] = 'Añadiendo una pregunta de variable numérica';
$string['pluginnameediting'] = 'Editando una pregunta de variable numérica';
$string['pluginnamesummary'] = 'Permite una respuesta numérica, las expresiones se evalúan sobre la marcha y la expresión evaluada se compara con la respuesta del alumno';
$string['privacy:metadata'] = 'El plugin de la pregunta Variable numérica no almacena ningún dato personal.';
$string['scinotation'] = 'Notación científica';
$string['value'] = 'Valor';
$string['value_help'] = 'Introduzca aquí valores para "Variables predefinidas" o verá valores calculados mostrados aquí para una "Variable calculada". Tenga en cuenta que para un valor calculado el valor que verá será diferente para cada usuario.';
