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
 * Strings for component 'tool_opencast', language 'es', version '4.2'.
 *
 * @package     tool_opencast
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addinstance'] = 'Añadir instancia';
$string['apicreadentialstestfailedlong'] = 'El nombre de usuario o la contraseña proporcionados para la API de Opencast no son válidos. <br />Utilice un nombre de usuario y una contraseña válidos para evitar errores fatales durante las tareas que utilicen esta configuración.';
$string['apicreadentialstestfailedshort'] = 'La prueba de credenciales de usuario de la API de Opencast ha fallado con el código http: {$a}';
$string['apicreadentialstestsuccessfulshort'] = 'Prueba de credenciales de usuario de la API de Opencast realizada correctamente.';
$string['apipassword'] = 'Contraseña del usuario de la API Opencast';
$string['apipassworddesc'] = 'Configure la contraseña del usuario de Opencast que se utiliza para realizar las llamadas a la API de Opencast.';
$string['apipasswordempty'] = 'La contraseña del usuario de la API de Opencast no está configurada correctamente. Vaya a la configuración de la herramienta API de Opencast para solucionarlo.';
$string['apiurl'] = 'URL de la API de Opencast';
$string['apiurldesc'] = 'Configure la URL base del sistema Opencast. Aquí se requiere una URL válida. Si omite la parte del protocolo aquí, \'https://\' se añade sobre la marcha al hacer llamadas a la API de Opencast.';
$string['apiurlempty'] = 'La URL de la API Opencast no está configurada correctamente. Vaya a la configuración de la herramienta API de Opencast para solucionarlo.';
$string['apiurltestfailedlong'] = 'No hay ninguna instancia de Opencast ejecutándose en la URL dada.<br />Por favor, utilice una URL válida para evitar errores fatales durante las tareas que utilizan esta configuración.';
$string['apiurltestfailedshort'] = 'La prueba de la URL de la API de Opencast ha fallado con el código http: {$a}';
$string['apiurltestsucceedbutnocredentialslong'] = 'La URL de la API de Opencast es válida, pero aún no se han proporcionado el nombre de usuario ni la contraseña.<br />Introduzca un nombre de usuario y una contraseña válidos para evitar errores fatales durante las tareas que utilicen esta configuración.';
$string['apiurltestsuccessfulshort'] = 'La prueba de la URL de la API de Opencast se ha realizado correctamente.';
$string['apiusername'] = 'Nombre de usuario de la API Opencast';
$string['apiusernamedesc'] = 'Configure el nombre de usuario del usuario de Opencast que se utiliza para realizar las llamadas a la API de Opencast. Moodle utiliza este usuario de Opencast para todas las comunicaciones con Opencast. La autorización se realiza añadiendo roles adecuados a la llamada.';
$string['apiusernameempty'] = 'El nombre de usuario del usuario de la API de Opencast no está configurado correctamente. Vaya a la configuración de la herramienta API de Opencast para solucionarlo.';
$string['configuration'] = 'Configuración';
$string['configuration_instance'] = 'Configuración: {$a}';
$string['connecttimeout'] = 'Tiempo de espera de la conexión';
$string['connecttimeoutdesc'] = 'Configure el tiempo en milisegundos mientras Moodle intenta conectarse a Opencast. Si Opencast no responde en este tiempo, el intento de conexión finaliza.';
$string['delete_instance'] = 'Borrar instancia';
$string['delete_instance_confirm'] = '¿Realmente desea eliminar esta instancia?<br> Los profesores ya no podrán ver los vídeos utilizados en esta instancia.<br><b>Atención:</b> se perderán todos los datos relacionados con esta instancia.<br><br> La eliminación se realizará después de hacer clic en "Guardar cambios" en la página principal de configuración.';
$string['demoservernotification'] = 'La herramienta Opencast API está configurada actualmente para conectarse a la base de datos <a href="https://stable.opencast.org">public Opencast demo server</a>. Puede utilizar este servidor Opencast para evaluar este plugin.<br />No lo utilice para fines de producción. Por favor, en su lugar, <a href="https://docs.opencast.org/">configure su propio servidor Opencast</a>.';
$string['errornumdefaultinstances'] = 'Debe haber exactamente una instancia de Opencast por defecto.';
$string['isdefault'] = 'Por defecto';
$string['isvisible'] = 'Es visible para los profesores';
$string['lticonsumerkey_desc'] = 'Clave LTI del consumidor para la integración de los servicios de Opencast que requieren autenticación, como Studio o el editor.';
$string['lticonsumersecret_desc'] = 'LTI Consumer secret para la integración de servicios Opencast que requieren autenticación.';
$string['name'] = 'Nombre';
$string['needphp55orhigher'] = 'Se necesita la versión PHP 5.5 o superior';
$string['nomockhandler'] = 'Opencast Api Object es incapaz de manejar las respuestas con fines de prueba.';
$string['notestingjsonresponses'] = 'Las respuestas JSON no están configuradas, por favor asegúrese de utilizar api_testable::add_json_response antes de ejecutar y utilizar la clase.';
$string['ocinstances'] = 'Intancias Opencast';
$string['ocinstancesdesc'] = 'Define una lista de instancias de Opencast a las que pueden conectarse los plugins de Opencast.';
$string['opencast:externalapi'] = 'Acceso a los servicios web de la API Opencast';
$string['opencast:instructor'] = 'Proporciona el papel de un instructor en Opencast';
$string['opencast:learner'] = 'Proporciona el papel de un alumno en Opencast';
$string['pluginname'] = 'API Opencast';
$string['privacy:metadata'] = 'La herramienta de administración de la API de Opencast sólo proporciona puntos finales de la API y ajustes generales para el conjunto de plugins de Opencast. Almacena qué serie de Opencast pertenece a qué curso de Moodle, pero no almacena ningún dato personal.';
$string['serverconnectionerror'] = 'Se ha producido un problema con la conexión al servidor Opencast. Comprueba tus credenciales de la API de Opencast y la configuración de la red.';
$string['testtooldisabledbuttontitle'] = 'No se puede realizar la prueba de conexión debido a módulos js no cargados.';
$string['testtoolheader'] = 'Herramienta de prueba de conexión';
$string['testtoolheaderdesc'] = 'Para comprobar la configuración actual de la API de Opencast utilice: {$a}';
$string['testtoolurl'] = 'Herramienta de prueba de conexión';
$string['timeout'] = 'Tiempo de espera total de ejecución de la solicitud API';
$string['timeoutdesc'] = 'Configure el tiempo en milisegundos que puede tardar cada solicitud de API a Opencast. Si Opencast no termina de responder a la solicitud en este tiempo, la solicitud se cancela.';
$string['wrongmimetypedetected'] = 'Se ha detectado un mimetype incorrecto al intentar subir {$a->filename} del curso {$a->coursename}. Sólo puede cargar archivos de vídeo.';
