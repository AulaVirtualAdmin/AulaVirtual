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
 * Strings for component 'qtype_vplquestion', language 'es', version '4.2'.
 *
 * @package     qtype_vplquestion
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['allornothing'] = 'Todo o nada';
$string['answertemplate'] = 'Plantilla de respuesta';
$string['answertemplate_help'] = 'Escriba aquí qué código se rellenará previamente en la casilla de respuesta para el alumno.';
$string['cannotimportquestionvplnotfound'] = 'Advertencia de importación: el identificador del módulo VPL especificado en la pregunta VPL "{$a}" no es válido.';
$string['cannotimportquestionvplunreachable'] = 'Advertencia de importación: el VPL especificado en la pregunta VPL "{$a}" no se encuentra en este curso.';
$string['cfg:deletevplsubmissions'] = 'Eliminar envíos de VPL';
$string['cfg:deletevplsubmissions_help'] = 'Si los envíos de las preguntas VPL realizados en VPL deben descartarse o no en la evaluación de las preguntas.';
$string['cfg:generalsettings'] = 'Ajustes generales';
$string['choose'] = 'Elige...';
$string['compilation'] = 'Compilación:';
$string['correction'] = 'Corrección';
$string['evaluation'] = 'Evaluación:';
$string['evaluationdetails'] = 'Detalles de la evaluación:';
$string['evaluationerror'] = 'Error de evaluación:';
$string['execerror'] = 'Error de ejecución:';
$string['execerrordetails'] = 'Operación abortada por VPL. Es posible que se hayan superado los límites de recursos de ejecución.';
$string['execfiles'] = 'Ficheros de ejecución';
$string['execfiles_help'] = 'Aquí puede editar los archivos de ejecución. Éstos sólo se envían durante la evaluación (y la comprobación previa si los archivos son los mismos), y no durante la ejecución (excepto los archivos especificados como "conservar al ejecutar" en VPL).<br> Para añadir archivos, añádelos en VPL como archivos de ejecución. Si hay un archivo que no desea utilizar, escriba "UNUSED" en su primera línea y se omitirá.';
$string['execfilesevalsettings'] = 'Archivos de ejecución y parámetros de evaluación';
$string['execution'] = 'Error de ejecución:';
$string['gradingmethod'] = 'Calificación';
$string['gradingmethod_help'] = 'Determina el método de calificación para esta pregunta.<ul><li> Si se selecciona "Todo o nada", el alumno obtendrá el 100% o el 0% de la nota de esta pregunta, dependiendo de si ha obtenido o no la calificación perfecta de VPL.</li> <li>Si se selecciona "Escala", la calificación del estudiante para esta pregunta se escalará con su calificación VPL.</li></ul>';
$string['informationtext'] = 'Pregunta VPL';
$string['lastservermessage'] = 'Último mensaje del servidor de ejecución recibido: {$a}';
$string['merge'] = 'Fusionar';
$string['nogradeerror'] = 'Se ha producido un error durante la calificación de la pregunta (no se ha obtenido calificación). {$a}.';
$string['noprecheck'] = 'Sin comprobación previa';
$string['overwrite'] = 'Sobrescribir';
$string['pleaseanswer'] = 'Por favor proporcione una respuesta.';
$string['pluginname'] = 'Pregunta VPL';
$string['pluginname_help'] = 'Las Preguntas VPL le permiten hacer ejercicios de codificación simple.<br> Funciona con un VPL, pero está diseñado para ser mucho más simple en el lado de los estudiantes.';
$string['pluginnameadding'] = 'Añadir una pregunta VPL';
$string['pluginnameediting'] = 'Editar una pregunta VPL';
$string['pluginnamesummary'] = 'Las Preguntas VPL le permiten hacer ejercicios de codificación simple.<br> Funciona con un VPL, pero está diseñado para ser mucho más simple en el lado de los estudiantes.';
$string['possiblesolution'] = 'Posible solución:';
$string['precheck'] = 'Comprobación previa';
$string['precheckexecfiles'] = 'Comprobación previa de los archivos de ejecución';
$string['precheckexecfiles_help'] = 'Aquí puede editar los archivos de ejecución que se utilizarán para la comprobación previa. Para más información, consulte la ayuda de "Archivos de ejecución".';
$string['precheckhasownfiles'] = 'La comprobación previa utiliza sus propios archivos de ejecución';
$string['precheckhassamefiles'] = 'La comprobación previa utiliza los mismos ficheros de ejecución que Check';
$string['precheckhelp'] = 'Evalúe su respuesta en un subconjunto de pruebas';
$string['precheckisdebug'] = 'La comprobación previa es la depuración';
$string['precheckpreference'] = 'Preferencia de comprobación previa';
$string['precheckpreference_help'] = 'Determina si el alumno tendrá acceso a un botón de "Comprobación previa" durante el intento de la pregunta (con uso ilimitado).<ul><li>Si se selecciona "Sin comprobación previa", este botón no estará disponible.</li> <li>Si se selecciona "La comprobación previa es Depurar", el botón actuará como el botón "Depurar" de un VPL. Sin embargo, no ofrece la interfaz gráfica habitual.</li> <li>Si se selecciona "La comprobación previa utiliza los mismos archivos de ejecución que la comprobación", el botón evaluará la respuesta con los archivos de ejecución anteriores.</li> <li>Si se selecciona "La comprobación previa utiliza sus propios archivos de ejecución", podrá editar archivos de ejecución específicos y se utilizarán para la comprobación previa. Esta es la opción recomendada, ya que le permite especificar un subconjunto de pruebas a las que el alumno tiene acceso durante el intento.</li></ul>';
$string['privacy:metadata'] = 'El plugin de la Pregunta VPLn no almacena datos personales. Sin embargo, envía los datos enviados por el usuario al plugin mod_vpl, que puede almacenarlos por su parte.';
$string['qvplbase'] = 'Plantilla de la pregunta VPL';
$string['run'] = 'Ejecutar';
$string['scaling'] = 'Escala';
$string['selectavpl'] = '<a href="{$a}">Seleccione una plantilla VPL</a> para editar los archivos de ejecución.';
$string['serverwassilent'] = 'El servidor de ejecución estaba en silencio - no se recibió ningún mensaje';
$string['teachercorrection'] = 'Corrección del profesor';
$string['teachercorrection_help'] = 'Escriba aquí su corrección para esta pregunta.';
$string['templatecontext'] = 'Editar plantilla';
$string['templatecontext_help'] = 'Puede editar aquí el código que se ejecutará (es decir, el contenido del archivo requerido).<br> La etiqueta "{{ANSWER}}" será reemplazada por la respuesta del estudiante. Puedes mover la etiqueta donde quieras, pero por favor, ¡no la quites!';
$string['templatevpl'] = 'Plantilla VPL';
$string['templatevpl_help'] = 'Seleccione el VPL en la que se basará esta pregunta.<br> <b>Nota:</b> Por favor, seleccione una VPL dedicada a este propósito, ya que los envíos de los estudiantes en esta VPL pueden ser descartados si dicha configuración ha sido comprobada por el administrador de la plataforma.';
$string['templatevplchange'] = 'Modificación de la plantilla VPL';
$string['templatevplchange_help'] = 'Los archivos de código y ejecución de la plantilla VPL tienen actualmente contenido. Al cambiar la plantilla VPL se sobrescribirá este contenido, a menos que decida fusionar el contenido actual en el nuevo. <br> Por favor tenga en cuenta que la fusión sólo funcionará en archivos con el mismo nombre. Los archivos sin correspondencia de nombre se sobrescribirán.';
$string['templatevplchangeprompt'] = '¿Qué quiere hacer con el contenido actual de los archivos de plantilla y ejecución?';
$string['validateonsave'] = 'Validar';
$string['validateonsave_help'] = 'Si está marcada, el código proporcionado se probará con los casos de prueba proporcionados antes de guardar esta pregunta.';
$string['vplnotavailablewarning'] = '¡Atención! El VPL en la que se basa esta pregunta no está disponible. Es posible que la pregunta no funcione correctamente.';
$string['vplnotfounderror'] = '¡Error! No se ha podido instanciar el VPL en la que se basa esta pregunta:<br>{$a}';
$string['vplnotincoursewarning'] = '¡Atención! El VPL en la que se basa esta pregunta no se encuentra en este curso. Es posible que la pregunta no funcione correctamente.';
