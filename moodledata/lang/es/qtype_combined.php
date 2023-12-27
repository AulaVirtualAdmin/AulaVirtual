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
 * Strings for component 'qtype_combined', language 'es', version '4.2'.
 *
 * @package     qtype_combined
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['controlnameshowworking'] = 'entrada de texto';
$string['embeddedquestionremovedfromform'] = 'Una o más preguntas incrustadas han sido eliminadas del texto de la pregunta. Los datos de estas preguntas todavía se muestran a continuación, pero se eliminarán permanentemente cuando pulse el botón "Actualizar el formulario" o "Guardar cambios", a menos que vuelva a colocar los códigos incrustados en el texto de la pregunta.';
$string['err_accepts_vertical_or_horizontal_layout_param'] = '<p>El tipo de pregunta \'{$a}\' le permite especificar el diseño de su tipo de pregunta de la siguiente manera:<ul> <li>[[{question identifier}:{$a}:v]] vertical o </li> <li>[[{question identifier}:{$a}:h]] horizontal.</li></ul> <p>No debes introducir nada más después de los segundos dos puntos.</p>';
$string['err_duplicateids'] = 'Cada instancia de pregunta incrustada debe tener un identificador diferente. Ha utilizado el(los) siguiente(s) identificador(es) para más de una pregunta \'{$a}\'.';
$string['err_fillinthedetailsforsubq'] = 'Tiene que rellenar los detalles para describir la subpregunta "{$a}".';
$string['err_fillinthedetailshere'] = 'Tiene que rellenar los detalles de esta subpregunta.';
$string['err_insufficientnoofcodeparts'] = 'Error, su código para incrustar un control de pregunta \'{$a->fullcode}\' tiene muy pocas partes separadas por dos puntos. Debería tener al menos un identificador de pregunta, seguido de un identificador de tipo de pregunta.';
$string['err_invalid_number'] = 'El tipo de pregunta \'{$a}\' espera un número después del identificador del tipo de pregunta, su código de incrustación debe ser [[{your question id}:{$a}:{a number here}]]';
$string['err_invalid_width_specifier_postfix'] = '<p>El tipo de pregunta \'{$a}\' le permite especificar el ancho de su tipo de pregunta de la siguiente manera:<ul> <li>[[{question identifier}:{$a}:____]] donde la anchura del cuadro de entrada dependerá del número de guiones bajos o </li> <li>[[{question identifier}:{$a}:__10__]] donde la anchura del cuadro de entrada dependerá del número.</li></ul> <p>No debe introducir nada más después de los segundos dos puntos.</p>';
$string['err_invalid_width_specifier_postfix_showworking'] = '<p>El tipo de pregunta \'{$a}\' le permite especificar el ancho de su tipo de pregunta de la siguiente manera: <ul> <li>[[{question identifier}:{$a}:____]] donde la anchura del cuadro de entrada dependerá del número de guiones bajos o</li> <li>[[{question identifier}:{$a}:__10__]] donde la anchura del cuadro de entrada dependerá del número.</li> <li>[[{question identifier}:{$a}:__80x5__]] donde la anchura y la altura del cuadro de entrada dependerán del número.</li> </ul> <p>No debe introducir nada más después de los segundos dos puntos.</p>';
$string['err_invalidquestionidentifier'] = 'El código identificador de su pregunta consta de uno o varios caracteres alfanuméricos.';
$string['err_questionidentifiertoolong'] = 'El nombre de la sub-pregunta \'{$a}\' es demasiado largo. Puedes utilizar hasta 10 caracteres alfanuméricos.';
$string['err_subq_not_included_in_question_text'] = 'Parece que ha eliminado esta pregunta del texto de la pregunta. Incrusta esta pregunta en el formulario con el código {$a} o se eliminará cuando vuelvas a enviar este formulario.';
$string['err_thisqtypecannothavemorethanonecontrol'] = 'Ha intentado incrustar más de un control para el tipo de pregunta \'{$a->qtype}\' con el nombre de instancia de pregunta \'{$a->qid}\'. Este tipo de pregunta solo permite incrustar un control por instancia de pregunta.';
$string['err_thisqtypedoesnotacceptextrainfo'] = 'Este tipo de pregunta se incrusta con el código [[{your question id}:{$a}]]. No debe incluir nada después del identificador qtype, ni siquiera unos segundos dos puntos.';
$string['err_unrecognisedqtype'] = 'El identificador del tipo de pregunta \'{$a->qtype}\' que ha introducido en el código incrustado \'{$a->fullcode}\'no se conoce.';
$string['err_weightingsdonotaddup'] = 'No se añaden pesos a las subpreguntas superiores a 1.';
$string['err_you_must_provide_third_param'] = 'Debe proporcionar un tercer parámetro para el tipo de pregunta {$a}.';
$string['err_youneedmorechoices'] = 'Debe introducir dos o más opciones.';
$string['incorrectfeedback'] = 'Retroalimentación para cualquier respuesta incorrecta';
$string['multiresponse'] = 'Opciones por defecto para subpreguntas multirespuesta';
$string['noembeddedquestions'] = 'Debe haber al menos una subpregunta incrustada.';
$string['nosubquestiontypesinstalled'] = 'Este tipo de pregunta permite la combinación de la funcionalidad de otros tipos de preguntas. Necesita instalar al menos uno de estos otros tipos de preguntas que se usarán como subpreguntas.

Consulte  <a href="https://moodle.org/plugins/view.php?plugin=qtype_combined">la entrada en plug-in db</a> para más detalles y una lista de tipos de preguntas que pueden usarse como subpreguntas.';
$string['pluginname'] = 'Combinada';
$string['pluginname_help'] = 'Cree una pregunta con campos de respuesta incrustados en el texto de su pregunta. Dependiendo de los tipos de subpregunta instalados en su Moodle, puede pedir al estudiante que introduzca un valor numérico o de texto o que seleccione un valor de entre una serie de opciones. Los códigos incrustados en el texto de la pregunta serán sustituidos por casillas de verificación, casillas de selección o un campo de entrada de texto para que el estudiante pueda introducir su respuesta. Al crear una nueva pregunta, todos los códigos para incrustar tipos de subpreguntas disponibles se añaden automáticamente al texto de la pregunta como ejemplos de códigos que puede utilizar. Y al mismo tiempo los fragmentos de formulario apropiados para especificar las opciones de cada pregunta aparecen debajo del campo de entrada de texto de la pregunta. Edite el texto de la pregunta y cambie los códigos en el texto de la pregunta para cambiar qué tipos de subpreguntas incluir en el texto de la pregunta y luego pulse el botón "Actualizar el formulario" para que se muestren las partes correctas del formulario para editar la configuración de sus subpreguntas.';
$string['pluginname_link'] = 'question/type/combined';
$string['pluginnameadding'] = 'Añadir una pregunta combinada';
$string['pluginnameediting'] = 'Editar una pregunta combinada';
$string['pluginnamesummary'] = 'Un tipo de pregunta combinada que permite incrustar en el texto de la pregunta los campos de respuesta de varias subpreguntas disponibles. Dependiendo de los tipos de pregunta que haya instalado, el alumno puede introducir una respuesta numérica o de texto corto o elegir una o varias respuestas mediante una casilla de selección o casillas de verificación.';
$string['privacy:metadata'] = 'El plugin de la pregunta Combinada no almacena ningún dato personal.';
$string['regradeissuenumsubquestionschanged'] = 'El número de subpreguntas embebidas en la pregunta ha cambiado.';
$string['shuffle'] = 'Barajar';
$string['singlechoice'] = 'Opciones por defecto para subpreguntas de elección simple';
$string['subqheader'] = '\'{$a->qtype}\' entrada \'{$a->qid}\'';
$string['subqheader_not_in_question_text'] = '\'{$a->qtype}\' entrada \'{$a->qid}\' (no incrustada en el texto de la pregunta).';
$string['subquestiontypenotinstalled'] = 'Está intentando utilizar una pregunta combinada con una subpregunta de tipo \'{$a}\' que no está instalada.';
$string['subquestiontypes'] = 'Marcadores de posición de subpreguntas';
$string['updateform'] = 'Actualizar el formulario';
$string['validationerror'] = 'Una parte de la respuesta requiere atención: {$a}';
$string['validationerror_part'] = 'Parte {$a->identifier} - {$a->error}';
$string['validationerrors'] = 'Hay partes de tu respuesta que requieren atención: {$a}';
$string['vertical_or_horizontal_embed_code'] = '[[{$a->qid}:{$a->qtype}:v]] o [[{$a->qid}:{$a->qtype}:h]] dependiendo de si desea que las opciones se muestren vertical u horizontalmente.';
$string['weighting'] = 'Ponderación';
$string['widthspecifier_embed_code'] = '[[{$a->qid}:{$a->qtype}:{width specifier}]] o simplemente [[{$a->qid}:{$a->qtype}]]';
$string['yougot1right'] = '1 de sus respuestas es correcta.';
$string['yougotnright'] = '{$a->num} de sus respuestas son correctas.';
