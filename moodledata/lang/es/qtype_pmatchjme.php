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
 * Strings for component 'qtype_pmatchjme', language 'es', version '4.2'.
 *
 * @package     qtype_pmatchjme
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['allowanothertry'] = 'Permitir otro intento';
$string['answeringoptions'] = 'Opciones del editor molecular';
$string['atomcount'] = 'Información sobre el recuento de átomos';
$string['autoez'] = 'Generación automática de SMILES con estereoquímica E,Z ("autoez")';
$string['enablejavascript'] = '<p>Cargando el editor molecular...</p><p>Si este mensaje no es reemplazado por el editor molecular es que no tienes javascript funcionando en tu navegador.</p> <p>Si este mensaje no es reemplazado por el editor molecular es que no tienes javascript funcionando en tu navegador.';
$string['firstcorrectanswermustbestraightmatch'] = 'La primera respuesta correcta debe ser una coincidencia directa de una cadena SMILES sin comodines como match(SMILESEXPRESSION).';
$string['firstcorrectanswermustnotrequireatomcountfeedback'] = 'La primera respuesta correcta no puede requerir respuesta de recuento de átomos';
$string['nostereo'] = 'No se tiene en cuenta la estereoquímica al crear SMILES ("nostereo")';
$string['pluginname'] = 'Coincidencia de patrones con editor molecular';
$string['pluginname_help'] = 'En respuesta a una pregunta (que puede incluir una imagen), el encuestado utiliza el editor molecular para describir una estructura molecular. Puede haber varias respuestas correctas posibles, cada una con una calificación diferente.';
$string['pluginname_link'] = 'question/type/pmatchjme';
$string['pluginnameadding'] = 'Añadir una pregunta de coincidencia de patrón con editor molecular';
$string['pluginnameediting'] = 'Editar una pregunta de coincidencia de patrón con editor molecular';
$string['pluginnamesummary'] = 'Permite dibujar una molécula utilizando el editor molecular. La respuesta se califica comparándola con varias respuestas modelo, que se describen utilizando la sintaxis de coincidencia de patrones de la OU.';
$string['privacy:metadata'] = 'El plugin de la pregunta de coincidencia de patrones con editor molecular permite a los autores de las preguntas establecer opciones predeterminadas como preferencias del usuario.';
$string['privacy:preference:allowsubscript'] = 'Si se utiliza el subíndice para introducir la respuesta.';
$string['privacy:preference:allowsuperscript'] = 'Si se utiliza el superíndice para introducir la respuesta.';
$string['privacy:preference:defaultmark'] = 'La nota por defecto establecida para una pregunta determinada.';
$string['privacy:preference:penalty'] = 'La penalización por cada intento incorrecto cuando las preguntas se ejecutan utilizando el comportamiento \'Interactivo con múltiples intentos\' o \'Modo adaptativo\'.';
$string['smiles_aromatic_c'] = 'átomos de carbono aromáticos';
$string['smiles_br'] = 'átomos de bromo';
$string['smiles_c'] = 'átomos de carbono alifáticos';
$string['smiles_cl'] = 'átomos de cloro';
$string['smiles_doublebond'] = 'dobles enlaces';
$string['smiles_f'] = 'átomos de flúor';
$string['smiles_i'] = 'átomos de yodo';
$string['smiles_n'] = 'átomos de nitrógeno';
$string['smiles_o'] = 'átomos de oxígeno';
$string['smiles_s'] = 'átomos de azufre';
$string['smiles_triplebond'] = 'bonos triples';
$string['smilescorrectcount'] = 'Tiene la fórmula molecular correcta pero no la estructura correcta.';
$string['smilesequal'] = 'Tienes el número correcto de {$a}.';
$string['smilestoofew'] = 'Tienes muy pocos {$a}.';
$string['smilestoomany'] = 'Tienes demasiados {$a}.';
