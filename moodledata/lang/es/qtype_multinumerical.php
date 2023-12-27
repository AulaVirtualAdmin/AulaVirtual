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
 * Strings for component 'qtype_multinumerical', language 'es', version '4.2'.
 *
 * @package     qtype_multinumerical
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['answer'] = 'Tu respuesta: {$a}';
$string['badfeedbackperconditionsyntax'] = 'Cada línea debe tener el formato: &quot; Comentarios si la condición es verdadera | Comentarios si la condición es falsa &quot;';
$string['badnumfeedbackperconditions'] = 'El número de retroalimentaciones por restricción no puede ser mayor que el número de restricciones';
$string['binarygrade'] = 'Cálculo de calificaciones';
$string['conditionnotverified'] = 'Restricción no verificada';
$string['conditions'] = 'Restricciones';
$string['conditionverified'] = 'Restricción verificada';
$string['displaycalc'] = 'Mostrar resultado de cálculo';
$string['feedbackperconditions'] = 'Retroalimentación por restricción';
$string['gradebinary'] = 'Todo o nada';
$string['gradefractional'] = 'Fraccionario';
$string['helponquestionoptions'] = 'Para obtener más información sobre este tipo de pregunta y el comportamiento de las siguientes opciones, haga clic en el botón de ayuda en la parte superior de este formulario.';
$string['noncomputable'] = '(las respuestas correctas no se pueden calcular automáticamente)';
$string['onlyforcalculations'] = 'Solo para cálculos';
$string['parameters'] = 'Parámetros';
$string['pleaseenterananswer'] = 'Por favor introduzca una respuesta';
$string['pluginname'] = 'Multinumérico';
$string['pluginname_help'] = '<h2>Como funciona esto</h2>
<p>Una pregunta multinumérica permite pedir a los estudiantes una respuesta compuesta por varios parámetros (numéricos).</p>
<p><strong>Ejemplo:</strong> encontrar <span style="font-family:monospace">X</span> e <span style="font-family:monospace">Y</span> tal que </p>
<ul><li>X + Y &lt; 20</li><li>X * Y &gt; 35</li></ul>
<p>Existen <em>posiblemente</em> varias respuestas correctas a esta pregunta, y cualquier respuesta que satisfaga estas condiciones debe considerarse correcta.</p>
<p>Este tipo de pregunta permite definir los parámetros que buscamos (aquí, <span
        style="font-family:monospace">X</span> e <span style="font-family:monospace">Y</span>) y las restricciones facilitadas.</p>
<h2>Uso</h2>
<ul>
    <li>Introduzca una lista de parámetros separados por comas (en nuestro ejemplo &quot;<span style="font-family:monospace">X,Y</span>&quot;).<br />
<strong>Nota :</strong> las unidades se pueden introducir después de cada parámetro: &quot;<span style="font-family:monospace">X [m],Y [h]</span>&quot; (tiene que haber un espacio en blanco entre el parámetro y su unidad).</li>
    <li>Introduzca las restricciones, una por línea; en nuestro ejemplo: <pre>X + Y &lt; 20
X * Y &gt; 35</pre>(las líneas vacías serán ignoradas)
<p>Los operadores disponibles son : <ul>
                <li>&quot;<span style="font-family:monospace">=</span>&quot; (igual)</li>
                <li>&quot;<span style="font-family:monospace">&lt;</span>&quot; (menor que)</li>
                <li>&quot;<span style="font-family:monospace">&lt;=</span>&quot; (menor o igual que)</li>
                <li>&quot;<span style="font-family:monospace">&gt;</span>&quot; (mayor que)</li>
                <li>&quot;<span style="font-family:monospace">&gt;=</span>&quot; (mayor o igual que)</li>
                <li>intervalos:
                    <pre><span style="font-family:monospace">X = [1;5]</span></pre> (cerrado)
                    <pre><span style="font-family:monospace">X = ]1;5[</span></pre> (abierto) </li>
            </ul>
        </p>
    </li>
    <li>Introduzca si lo desea una retroalimentación para cada restricción. En nuestro ejemplo, se podría introducir:
        <pre>OK : X + Y &lt; 20 | No, X + Y &gt;= 20 ! OK : X * Y &gt; 35 | No, X + Y &lt;= 35 !</pre>
    </li>
    <li>Si &quot;Mostrar resultado de cálculo&quot; está marcado, la retroalimentación mostrará una evaluación numérica de cada de las restricciones. Esto solo se muestra si los comentarios para esta restricción no están vacíos.<br /> Si &quot;Solamente
        para cálculos&quot; está marcado, esto no se mostrará para restricciones no calculadas (como <span
            style="font-family:monospace">X&nbsp;>&nbsp;5</span>), para no revelar la respuesta al alumno.
    </li>
    <li>La opción de &quot;Cálculo de la calificación&quot; define si una respuesta parcialmente correcta produce una fracción de la calificación o la calificación nula.</li>
</ul>';
$string['pluginname_link'] = 'question/type/multinumerical';
$string['pluginnameadding'] = 'Agregar una pregunta multinumérica';
$string['pluginnameediting'] = 'Editar una pregunta multinumérica';
$string['pluginnamesummary'] = 'Permite crear una pregunta cuyas respuestas correctas pueden ser muchas, regidas por ecuaciones o inecuaciones.';
$string['privacy:metadata'] = 'El complemento Multinumerical Question Type no almacena ningún dato personal.';
$string['qtypeoptions'] = 'Opciones específicas del tipo de pregunta multinumérica';
$string['usecolorforfeedback'] = 'Utilice el color para la retroalimentación por restricción';
