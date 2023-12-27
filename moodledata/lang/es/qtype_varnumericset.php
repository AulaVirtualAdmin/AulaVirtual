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
 * Strings for component 'qtype_varnumericset', language 'es', version '4.2'.
 *
 * @package     qtype_varnumericset
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addmoreanswerblanks'] = 'Espacios en blanco para {no} más respuestas';
$string['addmorevariants'] = 'Añadir {$a} espacios más en blanco para más variantes';
$string['addmorevars'] = 'Añadir {no} espacios más en blanco para las variables';
$string['ae_numericallycorrect'] = 'Tu respuesta es casi correcta. Tiene el valor correcto y está redondeado correctamente.';
$string['ae_numericallycorrectandwrongformat'] = 'Tu respuesta es casi correcta. Tiene el valor correcto y está redondeado correctamente, pero no está en notación científica.';
$string['ae_roundingincorrect'] = 'Tu respuesta es casi correcta, pero está redondeada incorrectamente.';
$string['ae_roundingincorrectandwrongformat'] = 'Tu respuesta es casi correcta, pero está redondeada incorrectamente y no está en notación científica.';
$string['ae_toomanysigfigs'] = 'Tu respuesta es casi correcta, pero está dada con demasiadas cifras significativas.';
$string['ae_toomanysigfigsandwrongformat'] = 'Tu respuesta es casi correcta, pero está dada con demasiadas cifras significativas y no está en notación científica.';
$string['ae_wrongbyfactorof10'] = 'Tu respuesta es casi correcta, pero tienes mal el factor de 10.';
$string['ae_wrongbyfactorof10andwrongformat'] = 'Tu respuesta es casi correcta, pero tienes mal el factor de 10 y no está en notación científica.';
$string['answer'] = 'Respuesta: {$a}';
$string['answermustbegiven'] = 'Debe introducir una respuesta si hay una calificación o retroalimentación.';
$string['answerno'] = 'Respuesta {$a}';
$string['autofirehdr'] = 'Dar retroalimentación y crédito parcial cuando la respuesta {$a} es parcialmente incorrecta';
$string['calculatewhen'] = 'Cuándo calcular los valores calculados';
$string['cannotrecalculate'] = 'No se pueden recalcular los valores de las variables calculadas porque hay errores en el formulario, lo sentimos. Por favor, corrija los errores y podrá recalcular los valores.';
$string['checknumerical'] = 'Si es correcto numéricamente';
$string['checkpowerof10'] = 'Si está deshabilitada la potencia de 10';
$string['checkrounding'] = 'Si el redondeo es incorrecto';
$string['checkscinotation'] = 'Si era necesaria la notación científica pero no se usó';
$string['correctansweris'] = 'La respuesta correcta es: {$a}';
$string['correctansweriserror'] = '{$a->answer} <sup>+</sup>/<sub>-</sub> {$a->error}';
$string['correctanswerissigfigs'] = '{$a->answer} ({$a->sigfigs} cifras significativas)';
$string['correctanswers'] = 'Respuestas correctas';
$string['err_ousupsubnotsupportedonmobile'] = 'Esta pregunta requiere superíndices o subíndices, por lo que aún no funciona en esta aplicación. Responda a esta pregunta en el navegador web.';
$string['error'] = 'Error permitido +/-';
$string['errorreportedbyexpressionevaluator'] = 'Error al evaluar la expresión: {$a}';
$string['expectingassignment'] = 'Debes usar una expresión matemática para asignar valor a una \'variable calculada\'.';
$string['expectingvariablename'] = 'Esperando un nombre de variable aquí';
$string['expressionevaluatesasinfinite'] = 'El resultado es infinito.';
$string['expressionevaluatesasnan'] = 'El resultado no es un número.';
$string['expressionmustevaluatetoanumber'] = 'Aquí debe introducir una expresión que evalúe a un número, no una asignación';
$string['filloutoneanswer'] = 'Debe proporcionar al menos una respuesta posible. Las respuestas en blanco no se utilizarán. Se puede utilizar "*" como comodín para cualquier número. Se utilizará la primera respuesta que coincida para determinar la puntuación y los comentarios.';
$string['forallanswers'] = 'Para todas las respuestas';
$string['hintoverride'] = 'Si se dispara una comprobación automática, utilice esa penalización en lugar de la penalización estándar, y no muestre esta sugerencia';
$string['illegalthousandseparator'] = 'Ha utilizado un separador de miles ilegal "{$a->thousandssep}" en su respuesta. Sólo aceptamos respuestas con un separador decimal "{$a->decimalsep}".';
$string['notenoughanswers'] = 'Este tipo de pregunta requiere al menos {$a} respuestas';
$string['notolerancehere'] = 'No se puede introducir una tolerancia para esta coincidencia nada contesta';
$string['notvalidnumber'] = 'No has introducido un número en un formato reconocible.';
$string['notvalidnumberprepostfound'] = 'Por favor, introduce un número válido y nada más.';
$string['options'] = 'Opciones';
$string['pleaseenterananswer'] = 'Por favor, introduce una respuesta.';
$string['pluginname'] = 'Conjunto de variables numéricas';
$string['pluginname_help'] = 'En respuesta a una pregunta, el encuestado teclea un número. Los números utilizados en la pregunta y empleados para calcular la respuesta se eligen entre conjuntos predefinidos que pueden calcularse previamente a partir de expresiones matemáticas. Todas las expresiones se calculan en el momento de crear la pregunta y los valores de las funciones aleatorias son los mismos para todos los usuarios. Para una pregunta sin variantes, con expresiones calculadas sobre la marcha y con valores aleatorios diferentes para cada usuario véase el tipo de pregunta \'numérica variable\'.';
$string['pluginname_link'] = 'question/type/varnumericset';
$string['pluginnameadding'] = 'Añadir una pregunta de conjunto numérico variable';
$string['pluginnameediting'] = 'Editar una pregunta de conjunto numérico variable';
$string['pluginnamesummary'] = 'Permite una respuesta numérica, la pregunta puede tener varias "variantes", las expresiones se evalúan previamente para cada variante de pregunta';
$string['preandpostfixesignored'] = 'Solo la parte numérica de tu respuesta fue evaluada.';
$string['privacy:metadata'] = 'El plugin de la pregunta de conjunto numérico variable no almacena ningún dato personal.';
$string['questiontext'] = 'Texto de la pregunta y variables incluidas';
$string['questiontext_help'] = 'Puede incrustar nombres de variables y expresiones en el texto de las preguntas, en las respuestas generales, en las respuestas y en las pistas. Cualquier cosa encerrada entre corchetes dobles será evaluada antes de ser mostrada. Por ejemplo, si introduce [[a]], se mostrará el valor de la variable a. [[log(a)]] mostrará el logaritmo de a. [[log(a)]] mostrará el registro de a. También puede especificar cómo mostrar el resultado utilizando códigos printf. Por ejemplo [[a,.3e]] mostrará el valor de a en notación científica con 4 cifras significativas.';
$string['randomseed'] = 'Cadena que actuará como semilla de la aleatorización';
$string['recalculatenow'] = 'Recalcular ahora';
$string['requirescinotation'] = 'Se requiere notación científica';
$string['sigfigs'] = 'Cifras significativas';
$string['syserrorpenalty'] = 'Por cada error descontar';
$string['unspecified'] = 'Sin especificar';
$string['usesuperscript'] = 'Utilizar entrada de superíndice';
$string['varheader'] = 'Variable {no}';
$string['variables'] = 'Variables';
$string['variant'] = 'Valor para la variante {$a}';
$string['variants'] = 'Valor para las variantes';
$string['variants_help'] = 'Introduzca aquí los valores de las "Variables predefinidas" O, si se trata de una "Variable calculada", verá aquí los valores calculados. Para una variable predefinida debe introducir un valor para al menos una variante de la pregunta y para todas las variables predefinidas debe rellenar el mismo número de casillas. Moodle determina automáticamente cuántas variantes tiene una pregunta viendo cuántos valores de variante para variables predefinidas se han rellenado, o si no hay variables predefinidas sólo calculadas entonces asumimos 5 variantes de pregunta. No tiene que rellenar los últimos espacios en blanco, están ahí para que añada más valores de variantes a la pregunta, si es necesario.';
$string['varname'] = 'Nombre o tarea';
$string['varname_help'] = 'Para una \'Variable predefinida\' introduzca aquí sólo un nombre de variable, por ejemplo \'a\'. A continuación, introduzca los valores de esta variable para cada variante de pregunta. Para una "Variable calculada", introduzca un nombre de variable y asígnele un valor a partir de una expresión, por ejemplo, "b = a^4" (donde "a" es una variable definida previamente). Si deja este campo en blanco, se ignorará cualquier valor que aparezca a continuación.';
$string['varnumericset'] = 'Conjunto de variables numéricas';
$string['varnumericset_help'] = 'En respuesta a una pregunta, el usuario introduce un número.

Los números usados para calcular una respuesta son elegidos de conjuntos predefinidos que a su vez pueden ser previamente obtenidos de expresiones matemáticas.

Todas las expresiones son calculadas al mismo tiempo que se generan las preguntas y los valores de funciones aleatorias son iguales para todos los usuarios. Para una pregunta sin variantes, con expresiones calculadas sobre la marcha y con valores aleatorios diferentes para cada usuario consulta el tipo de preguntas \'variable numérica\'.';
$string['varnumericset_link'] = 'question/type/varnumericset';
$string['varnumericsetsummary'] = 'Permite una respuesta numérica, la pregunta puede tener diferentes variantes, las expresiones son evaluadas previamente para cada variante de la pregunta';
$string['vartypecalculated'] = 'Variable calculada';
$string['vartypepredefined'] = 'Variable predefinida';
$string['youmustprovideavalueforallvariants'] = 'Rellene el mismo número de espacios en blanco para todas las variables predefinidas, es decir, un valor para cada variable predefinida para todas las variantes de pregunta que necesite.';
$string['youmustprovideavalueforatleastonevariant'] = 'Debes proporcionar un valor aquí.';
