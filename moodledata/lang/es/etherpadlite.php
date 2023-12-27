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
 * Strings for component 'etherpadlite', language 'es', version '4.2'.
 *
 * @package     etherpadlite
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['adminguests'] = '¿Se les permite escribir a los invitados?';
$string['adminguestsdesc'] = 'Con esta configuración, los usuarios que tienen permitido configurar un módulo específico de etherpadlite pueden permitir escribir a los invitados en dicho módulo etherpadlite';
$string['apikey'] = 'Clave API';
$string['apikeydesc'] = 'Esta es la clave API que necesita este módulo para comunicarse con su servidor etherpadlite. Esta clave API está guardada en su servidor etherpadlite y puede copiarse desde allí.';
$string['apiversion'] = 'Versión de la API';
$string['apiversiondesc'] = 'La versión predeterminada es la "1.2". ¡Solo debe usar la versión "1.1" si usa una versión muy antigua del servidor etherpad lite!';
$string['checkssl'] = 'Comprobar certificado HTTPS';
$string['checkssldesc'] = 'Con esta configuración, se comprobará el certificado HTTPS del servidor etherpadlite para prevenir ataques de hombre en el medio (Man-In-The-Middle)';
$string['cookiedomain'] = 'Dominio de la cookie';
$string['cookiedomaindesc'] = 'Aquí puede introducir el dominio que debe almacenarse en la \'cookie\' de sesión, para que el servidor de etherpadlite lo reconozca. Cuando moodle se ejecuta en el dominio moodle.ejemplo.com y su servidor etherpadlite en etherpadlite.ejemplo.com, entonces su dominio de cookies debe ser .ejemplo.com.';
$string['cookietime'] = 'Tiempo de sesión transcurrido';
$string['cookietimedesc'] = 'Aquí debe introducir el tiempo (en segundos) de validez de la sesión de etherpadlite';
$string['copylink'] = 'Copiar enlace del pad';
$string['copylinkdesc'] = 'Añadir un botón a los ajustes de navegación del módulo, que permita a los profesores y gestores obtener fácilmente el enlace completo al pad actual.';
$string['deletein24hours'] = '24 horas';
$string['deleteinonehour'] = '1 hora';
$string['deleteintwelvehours'] = '12 horas';
$string['deletemgroupads'] = 'Eliminar los pads de grupo de moodle en';
$string['deletemgroupadsdesc'] = 'Eliminar todos los pads de grupo creados en asociación con el modo de grupo de moodle';
$string['deletenow'] = 'Inmediatamente';
$string['donotdelete'] = 'No eliminar';
$string['etherpadlite'] = 'Etherpad Lite';
$string['etherpadlite:addinstance'] = 'Añadir nuevo pad';
$string['etherpadlite_link_copied_to_clipboard'] = 'El enlace a este etherpad fue copiado a su portapapeles.';
$string['etherpadliteintro'] = 'Introducción a Etherpadlite';
$string['etherpadlitename'] = 'Nombre de Etherpadlite';
$string['fullscreen'] = 'Pantalla completa';
$string['guestsallowed'] = '¿Permitir escribir a los invitados?';
$string['guestsallowed_help'] = 'Esta opción determina si a los invitados se les permite escribir en este pad. En caso contrario, solamente podrán leer el contenido del pad.';
$string['ignoresecurity'] = 'Ignorar configuración de seguridad';
$string['ignoresecuritydesc'] = 'Si habilita esta opción, la URL se permitirá a pesar de la configuración de "Lista de puertos cURL bloqueados" (ver: curlsecurityblockedhosts).';
$string['link_copied'] = '¡Enlace copiado!';
$string['minwidth'] = 'Ancho mínimo';
$string['minwidthdesc'] = 'Si no desea que se muestre un etherpad muy reducido en pequeñas pantallas como las de los teléfonos móviles, puede establecer un ancho mínimo para el pad.';
$string['modulename'] = 'Etherpad Lite';
$string['modulename_help'] = 'El módulo Etherpad Lite permite a estudiantes y profesores escribir texto de forma colaborativa. El texto se sincroniza automáticamente a medida que escriben.

(El servidor etherpadlite, que se encuentra detrás de este módulo, todavía está en fase beta. Debido a esto, podrían ocurrir problemas en circunstancias excepcionales, pero no se esperan)';
$string['modulenameplural'] = 'Etherpad Lites';
$string['padname'] = 'Nombre del pad para todas las instancias';
$string['padnamedesc'] = 'Un nombre general del pad puede ser útil si desea encontrar todos los pads de esta instancia de Moodle en su servidor etherpadlite. Los grupos de pads se generan automáticamente.';
$string['pluginadministration'] = 'Administración de Etherpad Lite';
$string['pluginname'] = 'Etherpad Lite';
$string['responsiveiframe'] = 'iFrame adaptativo';
$string['responsiveiframedesc'] = 'Si está habilitado, el iFrame para el editor Etherpad Lite se ajustará convenientemente dentro de un tema Moodle adaptativo y escalará su ancho conforme lo haga la ventana del navegador. En caso contrario, el editor Etherpad Lite mantendrá un ancho fijo adaptado al ancho de la ventana del navegador en el momento de la carga de la página, pero que no escalará cuando la ventana cambie de tamaño.';
$string['restorewindowsize'] = 'Restaurar tamaño de pantalla';
$string['ssl'] = 'Redirección HTTPS';
$string['ssldesc'] = 'Si está habilitado, su sitio se redireccionará automáticamente a HTTPS si se abre un etherpadlite (visualmente atractivo para el usuario)';
$string['summaryguest'] = 'Ha iniciado sesión como invitado. Debido a ello únicamente puede ver la versión de solo lectura de este Pad. Recargue la página para ver nuevos cambios.';
$string['url'] = 'URL del servidor';
$string['urldesc'] = 'Esta es la URL de su servidor Etherpadlite en el formato:http[s]://host[:puerto]/[subDir/]';
$string['urlisblocked'] = 'El host actual "{$a}" está bloqueado';
