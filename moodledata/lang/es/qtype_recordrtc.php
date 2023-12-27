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
 * Strings for component 'qtype_recordrtc', language 'es', version '4.2'.
 *
 * @package     qtype_recordrtc
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['allowpausing'] = 'Permitir pausar la grabación';
$string['allowpausing_help'] = 'Si se habilita esta opción, se añadirá un botón adicional de "pausa" a los widgets de grabación.';
$string['audio'] = 'Audio individual';
$string['audiobitrate'] = 'Velocidad de bits de audio';
$string['audiobitrate_desc'] = 'Calidad de la grabación de audio (un número mayor significa mayor calidad).';
$string['audiotimelimit'] = 'Duración máxima de la grabación de audio';
$string['audiotimelimit_desc'] = 'Tiempo máximo que el autor de una pregunta puede establecer para la duración de la grabación de audio.';
$string['avplaceholder'] = 'Marcadores de posición de widgets';
$string['avplaceholder_help'] = 'Coloque uno o varios widgets de grabación en cualquier lugar del texto de la pregunta. Puede copiar los ejemplos aquí. Cada marcador de posición requiere, entre corchetes dobles, un nombre único (por ejemplo, "recorder1"), un tipo ("audio" o "video" o "screen") y una duración opcional, separados por dos puntos. La duración debe expresarse como "30s" o "05m45s". Si no se establece ninguna duración, el widget utilizará por defecto la duración máxima de grabación. Puede aplicar formato al widget, como cambiar su alineación o colocarlo en una tabla.';
$string['canselfcomment'] = 'Los estudiantes pueden autocomentar';
$string['canselfcomment_help'] = 'Si está activado, los alumnos podrán comentar su propio intento de responder a la pregunta.';
$string['canselfrate'] = 'Los estudiantes pueden autoevaluarse';
$string['canselfrate_help'] = 'Si se activa, los estudiantes podrán calificar su propio intento de responder a la pregunta en una escala de cinco estrellas (en lugar de esperar a que otra persona evalúe su trabajo, si las calificaciones son relevantes).';
$string['customav'] = 'Múltiples widgets';
$string['downloadrecording'] = 'Descargar {$a}';
$string['err_audiotimelimit'] = 'La duración máxima de la grabación de audio no puede ser superior a {$a} segundos.';
$string['err_closesquarebrackets'] = 'Falta(n) corchete(s) de cierre. {$a->format}';
$string['err_opensquarebrackets'] = 'Falta(n) corchete(s) de apertura. {$a->format}';
$string['err_placeholderformat'] = 'El formato del marcador de posición es [[name:audio:duration]] o [[name:video:duration]], donde \'name\' sólo puede contener letras minúsculas, números, guiones y guiones bajos, y no debe tener más de 32 caracteres. \'Duration\' es opcional y debe ser del tipo \'01m20s\', \'02m\' o \'45s\'.';
$string['err_placeholderincorrectformat'] = 'Un marcador de posición en el texto de la pregunta no tiene el formato correcto.';
$string['err_placeholdermediatype'] = 'El tipo de widget \'{$a->text}\' no es válido.';
$string['err_placeholdermissingduration'] = '{$a} falta la duración. Incluya los últimos dos puntos sólo si se indica una duración. Los dos puntos se han eliminado para usted.';
$string['err_placeholderneeded'] = 'Debe añadir al menos un marcador de posición al texto de la pregunta.';
$string['err_placeholdernotallowed'] = 'No puede utilizar marcadores de posición con el tipo de grabación {$a}.';
$string['err_placeholdertitle'] = '\'{$a->text}\' no es un nombre válido.';
$string['err_placeholdertitlecase'] = '\'{$a->text}\' no es un nombre válido. Los nombres deben ser letras minúsculas, sin espacios. Esto se ha corregido para usted.';
$string['err_placeholdertitleduplicate'] = '\'{$a->text}\' se ha utilizado más de una vez. Cada nombre debe ser diferente.';
$string['err_placeholdertitlelength'] = '\'{$a->text}\' es mayor que {$a->maxlength} caracteres.';
$string['err_screentimelimit'] = 'La duración máxima de la grabación de la pantalla de vídeo no puede ser superior a {$a} segundos.';
$string['err_timelimit'] = 'La duración máxima de grabación no puede ser superior a {$a}.';
$string['err_timelimitpositive'] = 'La duración máxima de grabación debe ser superior a 0.';
$string['err_videotimelimit'] = 'La duración máxima de la grabación de vídeo no puede ser superior a {$a} segundos.';
$string['err_zeroornegativetimelimit'] = '\'{$a}\' no es válido. La duración máxima de grabación debe ser superior a 0.';
$string['feedbackfor'] = 'Retroalimentación para \'{$a}\'';
$string['feedbackheader'] = 'Retroalimentación por entrada';
$string['filex'] = 'Archivo {$a}';
$string['gumabort'] = 'Ha ocurrido algo extraño que ha impedido utilizar la webcam/micrófono';
$string['gumabort_title'] = 'Algo ha ocurrido';
$string['gumnotallowed'] = 'El usuario debe permitir que el navegador acceda a la cámara/micrófono.';
$string['gumnotallowed_title'] = 'Autorización incorrecta';
$string['gumnotfound'] = 'No hay ningún dispositivo de entrada conectado o activado';
$string['gumnotfound_title'] = 'Falta el dispositivo';
$string['gumnotreadable'] = 'Algo impide que el navegador acceda a la webcam/micrófono';
$string['gumnotreadable_title'] = 'Error de hardware';
$string['gumnotsupported'] = 'Su navegador no soporta la grabación a través de una conexión insegura y debe cerrar el plugin';
$string['gumnotsupported_title'] = 'Sin soporte para conexión no segura';
$string['gumoverconstrained'] = 'La webcam/micrófono actual no puede producir un flujo con las restricciones requeridas';
$string['gumoverconstrained_title'] = 'Problema con restricciones';
$string['gumsecurity'] = 'Su navegador no soporta la grabación a través de una conexión no segura y debe cerrar el plugin';
$string['gumsecurity_title'] = 'Sin soporte para conexión no segura';
$string['gumtype'] = 'Se ha intentado obtener el flujo de la webcam/micrófono, pero no se especificó ninguna restricción.';
$string['gumtype_title'] = 'No se especifican restricciones';
$string['insecurewarning'] = 'Su navegador no permitirá que este plugin funcione a menos que se utilice a través de HTTPS.';
$string['insecurewarningtitle'] = 'Conexión no segura';
$string['mediatype'] = 'Tipo de grabación';
$string['mediatype_help'] = 'Se pide al alumno que grabe un audio, un vídeo o varios audios y/o vídeos. <b>Audio individual:</b> En la parte inferior del texto de la pregunta aparecerá un grabador/reproductor de audio. <b>Vídeo individual:</b> En la parte inferior del texto de la pregunta aparecerá un grabador/reproductor de vídeo. <b>Grabación de pantalla:</b> En la parte inferior del texto de la pregunta aparecerá un grabador/reproductor de pantalla. <b>Múltiples widgets:</b> En el texto de la pregunta se pueden añadir marcadores de posición para cualquier tipo de entrada. Por ejemplo [[name1:audio]] o [[name2:video]] or [[name3:screen]]. Todos los nombres deben ser diferentes y se convertirán en los nombres de archivo de las grabaciones.';
$string['nearingmaxsize'] = 'Ha alcanzado el límite de tamaño máximo para la carga de archivos';
$string['nearingmaxsize_title'] = 'Grabación parada';
$string['norecording'] = 'Sin grabación';
$string['nowebrtc'] = 'Su navegador ofrece soporte limitado o nulo para tecnologías WebRTC todavía, y no puede utilizarse con este tipo de pregunta. Por favor, cambie o actualice su navegador.';
$string['nowebrtctitle'] = 'WebRTC no soportado';
$string['optionsforaudio'] = 'Opciones de audio';
$string['optionsforaudioandvideo'] = 'Opciones de audio y vídeo';
$string['optionsforscreen'] = 'Opciones de grabación de pantalla';
$string['optionsforvideo'] = 'Opciones vídeo';
$string['pause'] = 'Pausa';
$string['pleaserecordsomethingineachpart'] = 'Por favor complete su respuesta.';
$string['pluginname'] = 'Grabación de audio/vídeo';
$string['pluginname_help'] = 'Los estudiantes responden al texto de la pregunta grabando audio, vídeo o pantalla (o cualquier combinación si selecciona la opción "Múltiples widgets") directamente en su navegador. Esto se puede calificar manualmente o mediante autoevaluación si ha instalado el complemento de comportamiento opcional y gratuito de la Open University.';
$string['pluginname_link'] = 'question/type/recordrtc';
$string['pluginnameadding'] = 'Añadir una pregunta de grabación de audio/vídeo';
$string['pluginnameediting'] = 'Editar una pregunta de grabación de audio/vídeo';
$string['pluginnamesummary'] = 'Los estudiantes responden al texto de la pregunta grabando audio, vídeo o pantalla (o cualquier combinación si selecciona la opción "Múltiples widgets") directamente en su navegador. Esto se puede calificar manualmente o mediante autoevaluación si ha instalado el complemento de comportamiento opcional y gratuito de la Open University.';
$string['privacy:metadata'] = 'El plugin de grabación de audio/vídeo para preguntas permite a los autores de las preguntas establecer las opciones predeterminadas como preferencias del usuario.';
$string['privacy:preference:allowpausing'] = 'El botón "Pausa" se desactiva/activa para una pregunta determinada.';
$string['privacy:preference:canselfcomment'] = 'La funcionalidad de "autocomentario" se desactiva/activa para una pregunta determinada.';
$string['privacy:preference:canselfrate'] = 'La funcionalidad de "autocalificación" se desactiva/activa para una pregunta determinada.';
$string['privacy:preference:defaultmark'] = 'La nota por defecto establecida para una pregunta determinada.';
$string['privacy:preference:mediatype'] = 'Si el tipo de medio es "Audio individual", "Vídeo individual" o "Múltiples widgets".';
$string['privacy:preference:timelimitinseconds'] = 'La "Duración máxima de grabación" establecida para una pregunta determinada.';
$string['recordagain'] = 'Volver a grabar';
$string['recordagainx'] = 'Volver a grabar {$a}';
$string['recordingfailed'] = 'Error de grabación';
$string['recordrtc:downloadrecordings'] = 'Descargar grabaciones';
$string['resume'] = 'Reanudar';
$string['screen'] = 'Grabación de pantalla';
$string['screenbitrate'] = 'Velocidad de bits de pantalla';
$string['screenbitrate_desc'] = 'Calidad de la grabación en pantalla (un número mayor significa mayor calidad)';
$string['screensize'] = 'Resolución de salida de vídeo';
$string['screensize_desc'] = 'El tamaño de la resolución de salida de vídeo.';
$string['screentimelimit'] = 'Duración máxima de la grabación de pantalla';
$string['screentimelimit_desc'] = 'Tiempo máximo que el autor de una pregunta puede establecer para la duración de la grabación de pantalla.';
$string['selfassessmentheading'] = 'Ajustes para la autoevaluación';
$string['startcamera'] = 'Iniciar la grabación de video';
$string['startcamerax'] = 'Iniciar la grabación de video {a}';
$string['startrecording'] = 'Iniciar la grabación';
$string['startrecordingx'] = 'Iniciar la grabación {$a}';
$string['startsharescreen'] = 'Iniciar grabación de pantalla';
$string['startsharescreenx'] = 'Iniciar grabación de pantalla {$a}';
$string['stoprecording'] = 'Detener la grabación';
$string['timelimit'] = 'Duración máxima de grabación';
$string['timelimit_help'] = 'Esta es la duración máxima de una grabación que el alumno puede realizar. Si alcanza este tiempo, la grabación se detendrá automáticamente. Hay un límite superior al valor que se puede establecer aquí. Si necesita un tiempo mayor, pregunte a un administrador.';
$string['updateform'] = 'Actualizar el formulario';
$string['updateformdone'] = 'Se ha actualizado el formulario. Puede añadir comentarios por entrada a continuación.';
$string['uploadaborted'] = 'No se pudo guardar';
$string['uploadcomplete'] = 'Grabación cargada';
$string['uploadfailed'] = 'Error de carga';
$string['uploadfailed404'] = 'Error de carga (¿archivo demasiado grande?)';
$string['uploadpreparing'] = 'Preparando subida ...';
$string['uploadpreparingpercent'] = 'Preparando subida ({$a}%)';
$string['uploadprogress'] = 'Cargando ({$a})';
$string['video'] = 'Vídeo individual';
$string['videobitrate'] = 'Velocidad de bits del vídeo';
$string['videobitrate_desc'] = 'Calidad de la grabación de vídeo (un número mayor significa mayor calidad)';
$string['videosize'] = 'Tamaño del vídeo';
$string['videosize_desc'] = 'El tamaño del vídeo.';
$string['videotimelimit'] = 'Duración máxima de la grabación de vídeo';
$string['videotimelimit_desc'] = 'Tiempo máximo que el autor de una pregunta puede establecer para la duración de la grabación de vídeo.';
$string['xminutes'] = '{$a} minutos';
$string['xseconds'] = '{$a} segundos';
