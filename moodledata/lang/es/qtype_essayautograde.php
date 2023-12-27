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
 * Strings for component 'qtype_essayautograde', language 'es', version '4.2'.
 *
 * @package     qtype_essayautograde
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addmultiplebands'] = 'Añadir {$a} más bandas de calificación';
$string['addmultiplephrases'] = 'Añadir {$a} más frases clave';
$string['addpartialgrades'] = '¿Otorgar calificaciones parciales?';
$string['addpartialgrades_help'] = 'Si esta opción es habilitada, las calificaciones se añadirán para las bandas de calificaciones parcialmente completadas.';
$string['addsingleband'] = 'Añadir otra banda de calificación';
$string['addsinglephrase'] = 'Añadir otra frase clave';
$string['allowsimilarity'] = '¿Permitir similitud?';
$string['allowsimilarity_help'] = 'El nivel máximo de similitud que se permite entre la respuesta de un alumno y la plantilla de respuesta o la respuesta de muestra. Cuanto mayor sea este valor, más parecida puede ser la respuesta del alumno a la plantilla o muestra. Por el contrario, cuanto menor sea el valor, más diferente deberá ser la respuesta del alumno de la plantilla o muestra. El ajuste de este valor puede afectar al nivel de originalidad y detalle exigido a los alumnos en sus respuestas.';
$string['allowsimilaritypercent'] = 'Sí - permitir hasta {$a}% de similitud';
$string['auto'] = 'Auto';
$string['autograding'] = 'Auto-calificar';
$string['bandcount'] = 'Para';
$string['bandpercent'] = 'o más ítems, otorgar';
$string['chars'] = 'Caracteres';
$string['charspersentence'] = 'Caracteres por oración';
$string['commonerror'] = 'Error común';
$string['commonerrors'] = 'Errores comunes';
$string['commonerrors_help'] = 'Los errores comunes están definidos en el "Glosario de errores" asociado con esta pregunta.';
$string['correctresponse'] = 'Para obtener la puntuación completa para esta pregunta, debe satisfacer los siguientes criterios:';
$string['countcharslabel'] = 'Número de caracteres actual';
$string['countfileslabel'] = 'Número de archivos actual';
$string['countparagraphslabel'] = 'Número de párrafos actual';
$string['countsentenceslabel'] = 'Número de oraciones actual';
$string['countwordslabel'] = 'Número actual de palabras';
$string['crop'] = 'Recortar';
$string['enableautograde'] = 'Habilitar calificación automática';
$string['enableautograde_help'] = 'Habilitar, o deshabilitar, calificación automática';
$string['errorbehavior'] = 'Comportamiento de concordancia de error';
$string['errorbehavior_help'] = 'Estas configuraciones refinan el comportamiento de concordancia para entradas en el Glosario de errores comunes.';
$string['errorcmid'] = 'Glosario de errores';
$string['errorcmid_help'] = 'Elegir el Glosario que contiene una lista de errores comunes.

Cada vez que uno de estos errores sea encontrado en la respuesta del ensayo, la penalización especificada será restada de la calificación del estudiante para esta pregunta.';
$string['errorpercent'] = 'Penalización por error';
$string['errorpercent_help'] = 'Seleccione el porcentaje de la calificación total que debería ser restado por cada error que sea encontrado en la respuesta.';
$string['excludecommonerrors'] = 'No cometa ninguno de los errores comunes en <a href="{$a->href}" target="_blank">{$a->name}</a>';
$string['explanationautopercent'] = 'Esto está fuera del rango de porcentaje normal, por lo que fue ajustado a {$a->autopercent}%.';
$string['explanationcommonerror'] = '{$a->percent}% por incluir "{$a->error}", que es un error común';
$string['explanationcompleteband'] = '{$a->percent}% por completar la Banda de calificación [{$a->gradeband}]';
$string['explanationdatetime'] = 'en %Y %b %d (%a) a las %H:%M';
$string['explanationfiles'] = '{$a->percent}% por enviar {$a->filecount} / {$a->itemcount} archivos';
$string['explanationfirstitems'] = '{$a->percent}% por el primer(a) {$a->count} {$a->itemtype}';
$string['explanationgrade'] = 'Por lo tanto, la calificación generada por el ordenador para este ensayo fue ajustada a {$a->finalgrade} = ({$a->finalpercent}% of {$a->maxgrade}).';
$string['explanationitems'] = '{$a->percent}% por {$a->count} {$a->itemtype}';
$string['explanationmaxgrade'] = 'La calificación máxima para esta pregunta es {$a->maxgrade}.';
$string['explanationnotenough'] = '{$a->count} {$a->itemtype} es menor que la calificación mínima requerida para que se le otorgue una calificación.';
$string['explanationoverride'] = 'Más tarde, {$a->datetime}, la calificación para este ensayo fue configurada manualmente a {$a->manualgrade}.';
$string['explanationpartialband'] = '{$a->percent}% por completar parcialmente la Banda de calificación [{$a->gradeband}]';
$string['explanationpenalty'] = 'Sin embargo, {$a->penaltytext} fue restado por revisar la respuesta antes del envío.';
$string['explanationrawpercent'] = 'La calificación de porcentaje crudo para este ensayo es {$a->rawpercent}% <br /> = ({$a->details}).';
$string['explanationremainingitems'] = '{$a->percent}% por los restantes {$a->count} {$a->itemtype}';
$string['explanationseecomment'] = '(ver comentario debajo)';
$string['explanationtargetphrase'] = '{$a->percent}% por incluir la frase "{$a->phrase}"';
$string['feedback'] = 'Retroalimentación';
$string['feedbackhintbreaks'] = '¿Usó demasiados saltos de línea?';
$string['feedbackhintchars'] = '¿Escribió el número requerido de caracteres?';
$string['feedbackhinterrors'] = '¿Cometió alguno de los errores comunes?';
$string['feedbackhintfiles'] = '¿Anexó el número requerido de archivos?';
$string['feedbackhintparagraphs'] = '¿Escribió el número requerido de párrafos?';
$string['feedbackhintphrases'] = '¿Incluyó todas las frases clave?';
$string['feedbackhints'] = 'Pistas para mejorar su calificación';
$string['feedbackhintsentences'] = '¿Escribió el número requerido de oraciones?';
$string['feedbackhintwords'] = '¿Alcanzó la meta del número de palabras?';
$string['files'] = 'Archivos';
$string['fogindex'] = 'Índice de niebla';
$string['fogindex_help'] = 'El índice de niebla de Gunning es una medida de legibilidad. Es calculado usando la siguiente fórmula.

* ((palabras por oración) + (palabras largas por oración)) x 0.4

Para más invormación, ver: <https://en.wikipedia.org/wiki/Gunning_fog_index>';
$string['forceupgrade'] = 'Forzar actualización';
$string['gradeband'] = 'Banda de calificación [{no}]';
$string['gradeband_help'] = 'Especifica el número mínimo de ítems contables para que esta banda sea aplicada, y la calificación que va a ser otorgada si esta banda es aplicada.';
$string['gradebands'] = 'Bandas de calificación';
$string['gradecalculation'] = 'Cálculo de calificación';
$string['gradeforthisquestion'] = 'Calificación por esta pregunta';
$string['hidden'] = 'Oculto';
$string['hidesample'] = 'Ocultar muestra';
$string['itemcount'] = 'Número esperado de ítems';
$string['itemcount_help'] = 'El número mínimo de ítems contables que deben estar en el texto del ensayo para obtener la calificación máxima para esta pregunta.

Tenga en cuenta, que este valor puede tornarse inefectivo por las bandas de calificación, si hubiera, definidas debajo.';
$string['itemtype'] = 'Tipo de ítems contables';
$string['itemtype_help'] = 'Seleccione el tipo de ítems en el texto del ensayo que contribuirán a la auto-calificación.';
$string['lexicaldensity'] = 'Densidad léxica';
$string['lexicaldensity_help'] = 'La densidad léxica es un porcentaje calculado usando la fórmula siguiente.

* 100 x (número de palabras únicas) / (número total de palabras)

Así, un ensayo en el cual muchas palabras están repetidas tiene una densidad léxica baja, mientras que un ensayo con muchas palabras únicas tiene una alta densidad léxica.';
$string['longwords'] = 'Palabras largas';
$string['longwords_help'] = '"Palabras largas" son palabras que tienen tres o más sílabas. Tenga en cuenta que el algoritmo para determinar el número de sílabas es muy simple y solamente proporciona resultados aproximados.';
$string['longwordspersentence'] = 'Palabras largas por oración';
$string['maximumfilecount'] = 'Número máximo de archivos: {$a}';
$string['maximumfilesize'] = 'Tamaño máximo de archivo: {$a}';
$string['maxwordserror'] = '¡Ups; escribiste demasiadas palabras!';
$string['maxwordslabel'] = 'Número máximo de palabras';
$string['maxwordswarning'] = '¡Ups, has escrito demasiadas palabras!';
$string['minimumfilecount'] = 'Número mínimo de archivos: {$a}';
$string['minwordserror'] = '¡Ups; no escribiste suficientes palabras!';
$string['minwordslabel'] = 'Número mínimo de palabras';
$string['minwordswarning'] = '¡Sigue así! Aun no has escrito suficientes palabras.';
$string['missing'] = 'Faltante(s)';
$string['overflow'] = 'Desbordamiento';
$string['paragraphs'] = 'Párrafos';
$string['percentofquestiongrade'] = '{$a}% de la calificación de la pregunta.';
$string['phrasebehavior'] = 'Comportamiento de frase clave [{no}]';
$string['phrasebehavior_help'] = 'Estas configuraciones refinan el comportamiento de concordancia para esta frase clave.';
$string['phrasecasesensitiveno'] = 'La concordancia es indiferente a MAY/minúsculas';
$string['phrasecasesensitiveyes'] = 'La concordancia es sensible a MAY/minúsculas.';
$string['phrasefullmatchno'] = 'Concordar palabras completas o parciales.';
$string['phrasefullmatchyes'] = 'Concordar solamente palabras completas.';
$string['phraseignorebreaksno'] = 'Reconocer saltos de línea.';
$string['phraseignorebreaksyes'] = 'Ignorar saltos de línea.';
$string['phrasematch'] = 'Si';
$string['phrasepercent'] = 'es usado/a, otorgar';
$string['pleaseattachfiles'] = 'Por favor anexe el número requerido de archivos.';
$string['pleaseinputtext'] = 'Por favor escriba su respuesta en la caja de texto.';
$string['pluginname'] = 'Ensayo (auto-calificar)';
$string['pluginname_help'] = 'En respuesta a una pregunta que puede incluir una imagen, el usuario escribe una respuesta de uno o más párrafos. Inicialmente, una calificación es otorgada automáticamente basada en el número de caracteres, palabras, oraciones o párrafos, y la presencia de ciertas frases clave. La calificación automática puede ser anulada más tarde por el profesor.';
$string['pluginname_link'] = 'question/type/essayautograde';
$string['pluginnameadding'] = 'Añadiendo una pregunta de Ensayo (auto-calificar)';
$string['pluginnameediting'] = 'Editando una pregunta de Ensayo (auto-calificar)';
$string['pluginnamesummary'] = 'Permite que un ensayo de varias oraciones o párrafos sea enviado como una respuesta a pregunta. El ensayo es calificado automáticamente. La calificación puede ser anulada más tarde.';
$string['present'] = 'Presente';
$string['privacy:metadata'] = 'El plugin de tipo de pregunta Ensayo (auto-calificar) no almacena ningún dato personal.';
$string['requiredfilecount'] = 'Número requerido de archivos: {$a}';
$string['responseisnotoriginal'] = 'Por favor haga su texto más original.';
$string['responsesample'] = 'Respuesta muestra';
$string['responsesample_help'] = 'Cualquier texto aquí será mostrado como una respuesta de muestra, si el estudiante elige el enlace para "Mostrar muestra" en el texto de la pregunta.';
$string['responsesampleformat'] = 'Formato de ensayo muestra';
$string['responsesampleformat_help'] = 'Seleccione el formato del texto de la respuesta muestra.';
$string['rewriteresubmit'] = 'y envíelo nuevamente.';
$string['rewriteresubmitbreaks'] = 'elimine cualquier salto de línea';
$string['rewriteresubmitchars'] = 'añada más caracteres';
$string['rewriteresubmiterrors'] = 'corrija los errores comunes,';
$string['rewriteresubmitfiles'] = 'anexe el número requerido de archivos';
$string['rewriteresubmitjoin'] = ',';
$string['rewriteresubmitparagraphs'] = 'añada más párrafos';
$string['rewriteresubmitphrases'] = 'añada las frases faltantes';
$string['rewriteresubmitsentences'] = 'añada más oraciones';
$string['rewriteresubmitwords'] = 'añada más palabras';
$string['rotate'] = 'Rotar';
$string['scale'] = 'Cambiar escala';
$string['sentences'] = 'Oraciones';
$string['sentencesperparagraph'] = 'Oraciones por párrafo';
$string['showcalculation'] = '¿Mostrar cálculo de la calificación?';
$string['showcalculation_help'] = 'Si esta opción está habilitada, una explicación del cálculo de la calificación generada automáticamente será mostrada en las páginas de calificación y revisión.';
$string['showfeedback'] = '¿Mostrar retroalimentación al estudiante?';
$string['showfeedback_help'] = 'Si esta opción es habilitada, una tabla de retroalimentación accionable será mostrada en las páginas de calificación y revisión. Retroalimentación accionable es retroalimentación que le dice a los estudiantes lo que necesitan hacer para mejorar.';
$string['showgradebands'] = '¿Mostrar bandas de calificación?';
$string['showgradebands_help'] = 'Si esta opción es habilitada, los detalles de las bandas de calificación serán mostrados en las páginas de calificación y revisión.';
$string['showsample'] = 'Mostrar muestra';
$string['showtargetphrases'] = '¿Mostrar frases clave?';
$string['showtargetphrases_help'] = 'Si esta opción es habilitada, los detalles de las frase clave serán mostrados en las páginas de calificación y revisión.';
$string['showtextstats'] = '¿Mostrar estadísticas del texto?';
$string['showtextstats_help'] = 'Si esta opción es habilitada, se mostrarán estadísticas acerca del texto.';
$string['showtostudentsonly'] = 'Si, mostrar solamente a estudiantes';
$string['showtoteachersandstudents'] = 'Si, mostrar a profesores y a estudiantes';
$string['showtoteachersonly'] = 'Si, mostrar solamente a profesores';
$string['targetphrase'] = 'Frase clave [{no}]';
$string['targetphrase_help'] = 'Especificar la calificación que será añadida si esta frase clave aparece en el ensayo.

> **por ejemplo** Si [Finalmente] es usada, otorgar [10% de la calificación de la pregunta.]

La frase clave puede ser una sola frase o una lista de frases separadas ya sea por una coma "," o la palabra "OR" (en MAYÚSCULAS).

> **por ejemplo** Si [Finalmente OR Al final] es usada, otorgar [10% de la calificación de la pregunta.]

Un signo de interrogación de cierre "?" en una frase concuerda con cualquier caracter único, mientras que un asterisco "*" concuerda con un número arbitrario de caracteres (incluyendo cero caracteres).

> **por ejemplo** Si [Primero\\*Después\\*Finalmente] es usado, otorgar [50% de la calificación de la pregunta.]';
$string['targetphrases'] = 'Frases clave';
$string['textstatistics'] = 'Estadísticas del texto';
$string['textstatitems'] = 'Ítems estadísticos';
$string['textstatitems_help'] = 'Seleccione cualquier ítems aquí que desee que aparezca en las estadísticas del texto que son mostradas en las páginas para calificar y revisar.';
$string['uniquewords'] = 'Palabras únicas';
$string['uploadfiles'] = 'Subir archivos';
$string['visible'] = 'Visible';
$string['words'] = 'Palabras';
$string['wordspersentence'] = 'Palabras por oración';
