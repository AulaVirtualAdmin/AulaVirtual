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
 * Strings for component 'qtype_pmatch', language 'es', version '4.2'.
 *
 * @package     qtype_pmatch
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['add'] = 'Añadir';
$string['addmoreanswerblanks'] = 'Espacios en blanco para {no} más respuestas';
$string['addmoresynonymblanks'] = 'espacios en blanco para {no} más sinónimos';
$string['addtoanswer'] = 'Añadir a la respuesta';
$string['allowsubscript'] = 'Permitir el uso de subíndices';
$string['allowsuperscript'] = 'Permitir el uso de superíndices';
$string['amatiwsurl'] = 'URL del servicio web Amati';
$string['amatiwsurl_desc'] = 'URL del servicio web Amati';
$string['answer'] = 'Respuesta: {$a}';
$string['answeringoptions'] = 'Opciones para introducir respuestas';
$string['answermustbegiven'] = 'Debe introducir una respuesta si hay una calificación o retroalimentación.';
$string['answerno'] = 'Respuesta {$a}';
$string['answeroptions'] = 'Opciones de la respuesta';
$string['anyotheranswer'] = 'Cualquier otra respuesta';
$string['apply_spellchecker_label'] = 'No revisar la ortografía del alumno';
$string['apply_spellchecker_missing_language_attempt'] = 'Esta pregunta está configurada para usar el corrector ortográfico {$a}, pero ese idioma no está disponible en este servidor.';
$string['apply_spellchecker_missing_language_select'] = '{$a} (¡Atención! Dictionario no instalado en este servidor)';
$string['applydictionarycheck'] = 'Corrección ortográfica';
$string['caseno'] = 'No, las mayúsculas y minúsculas no deben coincidir';
$string['casesensitive'] = 'Sensible a mayúsculas y minúsculas';
$string['caseyes'] = 'Sí, las mayúsculas y minúsculas deben coincidir';
$string['choosetoken'] = 'Elegir ficha';
$string['combinedcontrolnamepmatch'] = 'entrada de texto';
$string['converttospace'] = 'Convertir a espacio';
$string['converttospace_help'] = 'Especifique los caracteres que desea que el sistema convierta en espacios antes de ejecutar el proceso de coincidencia de patrones. Esto es ideal para simplificar la entrada si la puntuación no importa.';
$string['correctanswers'] = 'Coincidencia de respuestas';
$string['env_dictmissing'] = 'Se ha instalado el diccionario de ortografía {$a->langforspellchecker} no encontrado para el idioma instalado {$a->humanfriendlylang}.';
$string['env_dictmissing2'] = 'El estudiante intentó una comprobación de ortografía en el idioma \'{$a}\'. Pero el diccionario aspell para este idioma no está instalado.';
$string['env_dictok'] = 'Se ha instalado el diccionario de ortografía {$a->langforspellchecker} para el idioma instalado {$a->humanfriendlylang}.';
$string['env_peclnormalisationmissing'] = 'El paquete PECL para Unicode Normalizer parece no estar correctamente instalado';
$string['env_peclnormalisationok'] = 'El paquete PECL para Unicode Normalizer parece estar correctamente instalado';
$string['env_pspellmissing'] = 'La librería Pspell parece no estar correctamente instalada';
$string['env_pspellok'] = 'La librería Pspell parece estar correctamente instalada';
$string['environmentcheck'] = 'Comprobaciones del entorno para el tipo de pregunta pmatch';
$string['err_ousupsubnotsupportedonmobile'] = 'Esta pregunta requiere superíndices o subíndices, por lo que aún no funciona en esta aplicación. Responda a esta pregunta en el navegador web.';
$string['err_providepmatchexpression'] = 'Debe proporcionar una expresión pmatch aquí.';
$string['error:blank'] = 'La respuesta no puede estar en blanco';
$string['errorfilecell'] = 'El archivo requiere al menos dos filas (la primera es la fila de cabecera, la segunda fila es la de las respuestas).';
$string['errorfilecolumnbigger'] = 'El archivo tiene más de dos columnas. Por favor, incluya sólo la marca esperada y la respuesta.';
$string['errorfilecolumnless'] = 'El archivo requiere al menos dos columnas (la primera columna para las marcas esperadas, la segunda columna para las respuestas).';
$string['errorfileformat'] = 'El archivo debe estar en formato .csv/.xlsx/.html/.json/.ods.';
$string['errors'] = 'Por favor, solucione los siguientes problemas : {$a}';
$string['exclude'] = 'Excluir';
$string['extenddictionary'] = 'Añadir estas palabras al diccionario';
$string['filloutoneanswer'] = 'Utilice la coincidencia de patrones con la sintaxis para describir las posibles respuestas. La respuesta del alumno se comparará con estos en orden, y el primer patrón coincidente determinará la puntuación y la retroalimentación. Debe proporcionar al menos un patrón. <br> Precisión global de la calificación:';
$string['forcelength'] = 'Si la respuesta tiene más de 20 palabras';
$string['forcelengthno'] = 'no emitir advertencia';
$string['forcelengthyes'] = 'avisar de que la respuesta es demasiado larga e invitar al alumno a acortarla';
$string['ie_illegaloptions'] = 'Opciones ilegales en la expresión "match<strong><em>{$a}</em></strong>()".';
$string['ie_lastsubcontenttypeorcharacter'] = 'El carácter o no debe terminar subcontenido en "{$a}".';
$string['ie_lastsubcontenttypeworddelimiter'] = 'El carácter delimitador de palabra no debe terminar el subcontenido "{$a}".';
$string['ie_missingclosingbracket'] = 'Falta el corchete de cierre en el fragmento de código "{$a}".';
$string['ie_nofullstop'] = 'Los caracteres de punto final no están permitidos en las expresiones pmatch. (Los puntos decimales en medio de los números sí están permitidos).';
$string['ie_nomatchfound'] = 'Error en el código de coincidencia de patrón.';
$string['ie_unrecognisedexpression'] = 'Expresión no reconocida.';
$string['ie_unrecognisedsubcontents'] = 'Subcontenido no reconocido en el fragmento de código "{$a}".';
$string['inputareatoobig'] = 'El área de entrada definida por "{$a}" es demasiado grande. El tamaño del área de entrada está limitado a una anchura de 150 caracteres y una altura de 100 caracteres.';
$string['minresponses'] = 'Número mínimo de respuestas';
$string['minresponses_desc'] = 'Número mínimo de respuestas marcadas que deben cargarse para que el sistema Amati genere reglas.';
$string['modelanswer'] = 'Respuesta modelo';
$string['modelanswer_help'] = 'Dé una posible respuesta a esta pregunta que se calificaría como correcta.';
$string['modelanswererror'] = '\'<strong>{$a}</strong>\' no es una respuesta correcta a esta pregunta.';
$string['nolanguagesfound'] = '<i>No se han encontrado idiomas</i>';
$string['nomatchingsynonymforword'] = 'No se han introducido sinónimos para la palabra. Elimine la palabra o introduzca sinónimo(s).';
$string['nomatchingwordforsynonym'] = 'No ha introducido una palabra equivalente al sinónimo. Elimine el sinónimo(s) o introduzca una palabra equivalente.';
$string['notenoughanswers'] = 'Este tipo de pregunta requiere al menos {$a} respuestas';
$string['or'] = 'O';
$string['pleaseenterananswer'] = 'Por favor proporcione una respuesta.';
$string['pluginname'] = 'Coincidencia de patrón';
$string['pluginname_help'] = 'En la respuesta a una pregunta (que puede incluir una imagen), el alumno escribe una frase corta. Puede haber varias respuestas correctas posibles, cada una con una puntuación diferente. Si se selecciona la opción "Sensible a mayúsculas y minúsculas", se pueden tener puntuaciones diferentes para "Palabra" o "palabra".';
$string['pluginname_link'] = 'question/type/pmatch';
$string['pluginnameadding'] = 'Añadir una pregunta de coincidencia de patrón';
$string['pluginnameediting'] = 'Editar una pregunta de coincidencia de patrón';
$string['pluginnamesummary'] = 'Permite una respuesta corta de una o unas pocas frases que se califica comparándola con varias respuestas modelo, que se describen utilizando la sintaxis de coincidencia de patrones de la OU.';
$string['precedes'] = 'Precede a';
$string['precedesclosely'] = 'Precede de cerca a';
$string['privacy:metadata'] = 'El plugin de tipo de pregunta de coincidencia de patrón permite a los autores de preguntas establecer opciones predeterminadas como preferencias del usuario.';
$string['privacy:preference:allowsubscript'] = 'Si se utiliza el subíndice para introducir la respuesta.';
$string['privacy:preference:allowsuperscript'] = 'Si se utiliza el superíndice para introducir la respuesta.';
$string['privacy:preference:applydictionarycheck'] = 'Si las respuestas de los alumnos deben corregirse ortográficamente';
$string['privacy:preference:converttospace'] = 'Cuáles son los caracteres especificados para ser convertidos en espacios.';
$string['privacy:preference:defaultmark'] = 'La marca por defecto establecida para una pregunta determinada.';
$string['privacy:preference:forcelength'] = 'Si se debe mostrar una advertencia cuando la respuesta tiene más de 20 palabras.';
$string['privacy:preference:penalty'] = 'La penalización por cada intento incorrecto cuando las preguntas se ejecutan utilizando el comportamiento \'Interactivo con múltiples intentos\' o \'Modo adaptativo\'.';
$string['privacy:preference:sentencedividers'] = 'Qué caracteres se especifican para ser tratados como puntos finales de frase.';
$string['privacy:preference:testquestion_pagesize'] = 'Número de intentos de preguntas de coincidencia de patrón que se muestran por página.';
$string['privacy:preference:usecase'] = 'Si mayúsculas y minúsculas no son importantes o deben coincidir en la respuesta del alumno.';
$string['processingxofy'] = 'Respuesta de procesamiento {$a->row} de {$a->total}: {$a->response}.';
$string['repeatedword'] = 'Esta palabra aparece más de una vez en la lista de sinónimos.';
$string['resetrule'] = 'Reiniciar regla';
$string['row'] = 'Fila';
$string['rule'] = 'Regla';
$string['ruleaccuracy'] = 'Respuestas no coincidentes con las anteriores: {$a->responseneedmatch} <br>
Correctamente emparejado por esta regla: {$a->correctlymatched}, <span class="{$a->class}">Incorrectly matched: {$a->incorrectlymatched}</span><br> Respuestas pendientes de procesar a continuación: {$a->responsestillprocess}';
$string['ruleaccuracylabel'] = 'Efecto sobre las respuestas de la muestra';
$string['rulecreationasst'] = 'Mostrar/ocultar el asistente de creación de reglas';
$string['rulecreationtoomanyors'] = 'Lo siento, demasiadas "o".';
$string['rulecreationtoomanyterms'] = 'Lo siento, demasiados términos.';
$string['rulesuggestionbutton'] = 'Generación automática de reglas de coincidencia';
$string['rulesuggestiondescriptionnoresponses'] = 'Genere automáticamente reglas de coincidencia cargando un conjunto de respuestas marcadas existentes.';
$string['rulesuggestionlabel'] = 'Sugerencia de regla';
$string['savedxresponses'] = 'Respuestas {$a} guardadas';
$string['sentencedividers'] = 'Puntos finales de la frase';
$string['sentencedividers_help'] = 'Especifique los caracteres que el sistema debe tratar como puntos finales de frase. Por defecto, \'?\' es un punto final de frase, por lo que si quisiera que coincidiera con "Hello?", eliminaría \'?\' de este campo y utilizaría "match (hello\\?)". Tenga en cuenta que \'?\' necesita un carácter de escape ( \\ ) en la expresión de coincidencia porque es un carácter especial, pero \'.\' y \'!\' no.';
$string['sentencedividers_noconvert'] = '\'<strong>{$a}</strong>\' se utiliza como <strong>punto final de frase</strong> y no puede convertirse en espacio.';
$string['setting_installed_spell_check_dictionaries'] = 'Diccionarios de corrección ortográfica';
$string['setting_installed_spell_check_dictionaries_des'] = 'Esta configuración controla qué opciones de idioma del corrector ortográfico se muestran a los autores de preguntas cuando crean o editan una pregunta.';
$string['showcoverage'] = 'Mostrar la política';
$string['showingresponsesforquestion'] = 'Mostrando las respuestas para la pregunta seleccionada: {$a}';
$string['spellcheckerenchant'] = 'Librería de corrección ortográfica Enchant';
$string['spellcheckernull'] = 'No hay corrección ortográfica disponible';
$string['spellcheckerpspell'] = 'Librería de corrección ortográfica Pspell';
$string['spellcheckertype'] = 'Librería de corrección ortográfica';
$string['spellcheckertype_desc'] = 'Qué librería de corrección ortográfica utilizar. Esto debería establecerse automáticamente al valor correcto en la instalación.';
$string['spellingmistakes'] = 'Las siguientes palabras no aparecen en nuestro diccionario: {$a}. Por favor corrija la ortografía.';
$string['subsuponelineonly'] = 'El editor de sub/superscript sólo puede utilizarse con un cuadro de entrada de una línea de altura.';
$string['synonym'] = 'Sinónimos';
$string['synonymcontainsillegalcharacters'] = 'El sinónimo contiene caracteres ilegales.';
$string['synonymsheader'] = 'Definir sinónimos de palabras en las respuestas';
$string['synonymsno'] = 'Sinónimos {$a}';
$string['template'] = 'Plantilla';
$string['term'] = 'Término';
$string['test'] = 'Test';
$string['testquestionactualmark'] = 'Marca computada';
$string['testquestionbacklink'] = 'Volver a la pregunta de test';
$string['testquestionchangescore'] = 'Cambio de puntuación';
$string['testquestioncorrect'] = 'Correcto';
$string['testquestiondeletedresponses'] = 'Las respuestas se han eliminado correctamente.';
$string['testquestioneditresponse'] = 'Editar respuesta';
$string['testquestionexpectedfraction'] = 'Marca humana';
$string['testquestionformcancelresponsebutton'] = 'Cancelar';
$string['testquestionformdeletecheck'] = '¿Está absolutamente seguro de querer borrar completamente estas respuestas?';
$string['testquestionformdeletesubmit'] = 'Borrar';
$string['testquestionformduplicateresponse'] = 'No se admiten respuestas duplicadas.';
$string['testquestionformerror_incorrectquestionid'] = 'El id de la pregunta es incorrecto o no es una pregunta de coincidencia de patrón.';
$string['testquestionformheader'] = 'Respuestas marcadas para cargar';
$string['testquestionforminfo'] = 'Debe cargar un archivo de hoja de cálculo (.csv o .xlsx) con dos columnas. La primera columna contiene la nota esperada para esa respuesta, y la segunda columna debe contener esa respuesta. Se supone que la primera fila del archivo contiene los títulos de las columnas, y se ignora.';
$string['testquestionformnewresponsebutton'] = 'Añadir nueva respuesta';
$string['testquestionformsaveresponsebutton'] = 'Guardar';
$string['testquestionformtestsubmit'] = 'Probar las respuestas seleccionadas';
$string['testquestionformtitle'] = 'Herramienta de comprobación de preguntas de coincidencia de patrones';
$string['testquestionformuploadlabel'] = 'Respuestas calificadas';
$string['testquestionheader'] = 'Pregunta de prueba: {$a}';
$string['testquestionincorrectlymarkedrights'] = 'negativos omitidos';
$string['testquestionincorrectlymarkedwrong'] = 'positivos omitidos';
$string['testquestionmatches'] = 'patrones';
$string['testquestionresponse'] = 'Respuesta';
$string['testquestionresponsesthatare'] = 'Mostrar respuestas que son';
$string['testquestionresultsheader'] = 'Resultados del test: {$a}';
$string['testquestionresultssummary'] = 'Ejemplos de respuestas: {$a->total} <br> Marcado correctamente:  {$a->correct} ({$a->accuracy}%)<br> <span>Marca calculada superior a la marca humana: {$a->misspositive} (missed positive)</span><br> <span>Marca calculada inferior a la marca humana: {$a->missnegative} (missed negative)</span>';
$string['testquestionruleslabel'] = 'Reglas';
$string['testquestionseletresponsex'] = 'Seleccionar respuesta {$a}';
$string['testquestiontool'] = 'Herramienta de comprobación de coincidencia de patrones';
$string['testquestionungraded'] = 'sin calificar';
$string['testquestionuploadanother'] = 'Cargar otro archivo';
$string['testquestionuploadresponses'] = 'Cargar respuestas';
$string['testquestionuploadrowhastwoitems'] = 'Cada fila debe contener exactamente dos elementos, una marca numérica y una respuesta. La fila <b>{$a->row}</b> contiene <b>{$a->items}</b> elemento(s).';
$string['testquestionuploadrownotvalidutf8'] = 'La respuesta de la fila <b>{$a}</b> contiene caracteres especiales no reconocidos. La entrada debe ser UTF-8 válido.';
$string['testquestionuploadtheseresponses'] = 'Cargar estas respuestas';
$string['testsubquestionx'] = 'Prueba subpregunta {$a}';
$string['testthisquestion'] = 'Probar esta pregunta';
$string['testthisquestionnoresmoreponsesrequired'] = 'Se necesitan más respuestas para que funcione la autosugestión. Hay {$a->existing} respuestas y necesita {$a->required}';
$string['testthisquestionnoresponsesfound'] = 'No se han encontrado respuestas.';
$string['testthisquestionnorulesreturned'] = 'No se ha sugerido ninguna regla.';
$string['toomanywords'] = 'Su respuesta es demasiado larga. Por favor, edítela para que no supere las 20 palabras.';
$string['tryrule'] = 'Probar la regla';
$string['tryrulecoverage'] = 'Cobertura';
$string['tryrulegradeerror'] = 'Lo sentimos, la regla de prueba sólo funciona si el grado se establece en 100% o Ninguno.';
$string['tryrulenogradedresponses'] = 'No hay respuestas calificadas, por favor califique su conjunto de respuestas.';
$string['tryrulenomatch'] = 'Esta regla no coincide con ninguna respuesta calificada.';
$string['tryrulenovalidrule'] = 'Esta regla no es una expresión pmatch válida.';
$string['unknownlanguagex'] = 'Idioma desconocido ({$a})';
$string['unparseable'] = 'No entendemos los caracteres o la puntuación aquí "{$a}"';
$string['wordcontainsillegalcharacters'] = 'La palabra contiene caracteres ilegales.';
$string['wordwithsynonym'] = 'Palabra';
$string['xresponsesduplicated'] = 'Se han duplicado las siguientes respuestas {$a}';
$string['xresponsesproblems'] = 'Las siguientes respuestas {$a} no se guardaron';
$string['xrulesuggested'] = '{$a} se sugirieron nuevas respuestas y se añadieron al final de las respuestas existentes';
