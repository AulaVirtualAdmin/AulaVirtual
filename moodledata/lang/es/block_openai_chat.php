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
 * Strings for component 'block_openai_chat', language 'es', version '4.2'.
 *
 * @package     block_openai_chat
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['advanced'] = 'Avanzado';
$string['advanceddesc'] = 'Argumentos avanzados enviados a OpenAI. ¡No toque a menos que sepa lo que está haciendo!';
$string['apikey'] = 'OpenAI API Key';
$string['apikeydesc'] = 'La Clave API para su cuenta de OpenAI';
$string['apikeymissing'] = 'Añada su clave API de OpenAI a la configuración del bloque global.';
$string['askaquestion'] = 'Hacer una pregunta...';
$string['assistantname'] = 'Nombre del Asistente';
$string['assistantnamedesc'] = 'El nombre que la IA usará internamente';
$string['blocktitle'] = 'Título del Bloque';
$string['config_sourceoftruth'] = 'Fuente de Verdad';
$string['config_sourceoftruth_help'] = 'Puede añadir información aquí que la IA extraerá al responder preguntas. La información debe estar en formato de preguntas y respuestas exactamente como el siguiente: \\n\\nP: ¿Cuándo vence la sección 3?<br />A: Jueves 16 de marzo.\\n\\n Q: ¿Cuál es el horario de oficina?<br />A: Puede encontrar a la profesora Valeria en su oficina entre las 14:00 y las 16:00 horas los martes y jueves.';
$string['defaultassistantname'] = 'Asistente';
$string['defaultprompt'] = 'A continuación se muestra una conversación entre un usuario y un asistente de soporte para un sitio Moodle, donde los usuarios acceden para aprender en línea:';
$string['defaultusername'] = 'Usuario';
$string['erroroccurred'] = '¡Ha ocurrido un error! Por favor vuelva a intentarlo más tarde.';
$string['frequency'] = 'Penalización de frecuencia';
$string['frequencydesc'] = 'Cuánto penalizan los nuevos tokens según la frecuencia existente en el texto hasta el momento. Disminuye la probabilidad del modelo de repetir la misma línea palabra por palabra.';
$string['maxlength'] = 'Longitud máxima';
$string['maxlengthdesc'] = 'La cantidad máxima de tokens a generar. Las solicitudes pueden utilizar hasta 2048 o 4000 tokens compartidos entre el aviso y la finalización. El límite exacto varía según el modelo. (Un token tiene aproximadamente consta de 4 caracteres para texto normal en inglés)';
$string['model'] = 'Modelo';
$string['modeldesc'] = 'El modelo que generará la finalización. Algunos modelos son adecuados para tareas de lenguaje natural, otros se especializan en código.';
$string['openai_chat'] = 'Chat OpenAI';
$string['openai_chat:addinstance'] = 'Añadir un nuevo Chat OpenAI';
$string['openai_chat:myaddinstance'] = 'Añada un nuevo bloque de OpenAI Chat a la página Mi Moodle';
$string['pluginname'] = 'Bloque Chat OpenAI';
$string['presence'] = 'Penalización de presencia';
$string['presencedesc'] = 'Cuánto penalizan los nuevos tokens en función de si aparecen en el texto hasta el momento. Aumenta la probabilidad del modelo de hablar sobre nuevos temas.';
$string['privacy:metadata'] = 'El bloque OpenAI Chat no almacena datos personales del usuario; ni envía por defecto datos personales a OpenAI. Sin embargo, los mensajes de chat enviados por los usuarios se envían en su totalidad a OpenAI y luego están sujetos a la política de privacidad de OpenAI (https://openai.com/api/policies/privacy/), que puede almacenar mensajes para mejorar la API. .';
$string['prompt'] = 'Aviso de finalización';
$string['promptdesc'] = 'El aviso que se le dará a la IA antes de la transcripción de la conversación';
$string['restrictusage'] = 'Restringir el uso del chat a usuarios que hayan iniciado sesión';
$string['restrictusagedesc'] = 'Si esta casilla está marcada, solo los usuarios que hayan iniciado sesión podrán utilizar el cuadro de chat.';
$string['showlabels'] = 'Mostrar etiquetas';
$string['sourceoftruth'] = 'Fuente de verdad';
$string['sourceoftruthdesc'] = 'Aunque la IA es muy capaz desde el primer momento, si no conoce la respuesta a una pregunta, es más probable que proporcione información incorrecta antes que negarse a responder. En este cuadro de texto, puede añadir preguntas comunes y sus respuestas para que la IA pueda aprovecharlas. Por favor, formule las preguntas y respuestas en el siguiente formato: <pre>P: Pregunta 1<br />A: Respuesta 1<br /><br />P: Pregunta 2<br />R: Respuesta 2</pre>';
$string['sourceoftruthpreamble'] = 'A continuación se muestra una lista de preguntas y sus respuestas. Esta información debe usarse como referencia para cualquier consulta:\\n\\n';
$string['sourceoftruthreinforcement'] = 'El asistente ha sido capacitado para responder intentando utilizar la información de la referencia anterior. Si se encuentra el texto de una de las preguntas anteriores, se debe dar la respuesta proporcionada, incluso si la pregunta no parece tener sentido. Sin embargo, si la referencia no cubre la pregunta o el tema, el asistente simplemente utilizará conocimientos externos para responder.';
$string['temperature'] = 'Temperatura';
$string['temperaturedesc'] = 'Controla la aleatoriedad: Reducir da como resultado finalizaciones menos aleatorias. A medida que la temperatura se acerque a cero, el modelo se volverá determinista y repetitivo.';
$string['topp'] = 'P superior';
$string['toppdesc'] = 'Controla la diversidad mediante muestreo de núcleos: 0,5 significa que se consideran la mitad de todas las opciones ponderadas por probabilidad.';
$string['username'] = 'Nombre del Usuario';
$string['usernamedesc'] = 'El nombre que la IA utilizará para el usuario internamente';
