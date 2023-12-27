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
 * Strings for component 'local_staticpage', language 'es', version '4.2'.
 *
 * @package     local_staticpage
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['apacherewrite'] = 'Forzar el módulo mod_rewrite de Apache';
$string['apacherewrite_desc'] = 'Servir solamente páginas estáticas con una URL limpia, re-escritas por Apache mod_rewrite. Vea el archivo  README para los detalles.';
$string['checkavailability'] = 'Revisar disponibilidad';
$string['checkavailability_desc'] = 'Configurar si es que Moodle debería o no de revisar la disponibilidad de archivo estático en la lista de páginas estáticas.';
$string['checkavailabilityconnecttimeout'] = 'Timeout de conexión';
$string['checkavailabilityconnecttimeout_desc'] = 'Configurar el número máximo de segundos a esperar mientras se intenta conectar durante la revisión de disponibilidad. Use 0 para esperar indefinidaente.';
$string['checkavailabilityno'] = 'No; no revisar disponibilidad';
$string['checkavailabilityresponsedisabled'] = 'No revisado';
$string['checkavailabilityresponseerror'] = 'No disponible - Error';
$string['checkavailabilityresponsefail'] = 'No disponible- No es-2xx';
$string['checkavailabilityresponsesuccess'] = 'Disponible';
$string['checkavailabilitytimeout'] = 'Timeout';
$string['checkavailabilitytimeout_desc'] = 'Configurar el número máximo de segundos para permitirle a las funciones cURL que ejecuten durante la revisión de disponibilidad. Use 0 para permitir tiempo indefinido para ejecución.';
$string['checkavailabilityyes'] = 'Si; revisar disponibilidad';
$string['cleanhtml'] = 'Limpiar el código HTML';
$string['cleanhtml_desc'] = 'Configurar si el código HTML de páginas estáticas debería ser limpiado (y por eso marcas -tags- especiales como <iframe>serían removidas. Vea README para los detalles.';
$string['cleanhtmlno'] = 'No, no limpiar el código HTML';
$string['cleanhtmlyes'] = 'Sí, limpiar el código HTML';
$string['documentheadingsource'] = 'Origen de los datos de la cabecera del documento';
$string['documentheadingsource_desc'] = 'Origen de los datos de la cabecera del documento de la página estática';
$string['documents'] = 'Documentos';
$string['documents_desc'] = 'Los archivos .html con el código HTML de las páginas estáticas. Vea README para los detalles.';
$string['documenttitlesource'] = 'Origen de los datos del título del documento';
$string['documenttitlesource_desc'] = 'El origen de los datos del título del documento en la página estática (utilizado en la barra de título del navegador)';
$string['documenttitlesourceh1'] = 'Primera etiqueta h1 en el código HTML (ubicado generalmente después de abrir la etiqueta body)';
$string['documenttitlesourcehead'] = 'Primera marca del título en código HTML (usualmente localizada dentro de la marca del cuerpo (body)';
$string['forcelogin'] = 'Forzar el inicio de sesión';
$string['forcelogin_desc'] = 'Servir páginas estáticas solamente a usuarios ingresados o también a no-ingresados en visitantes. Este comportamiento puede configurarse específicamente para páginas estáticas o puede configurarse con respecto a la configuración global Moodle de forcelogin. Vea README para los detalles.';
$string['forceloginglobal'] = 'Respetar la configuración global de $CFG->forcelogin';
$string['pagenotfound'] = 'Página no encontrada';
$string['pluginname'] = 'Páginas estáticas';
$string['privacy:metadata'] = 'El plugin Páginas estáticas proporciona funcionalidad extendida a administradores Moodle, pero no almacena ningún dato personal.';
$string['processcontent'] = 'Procesar contenido';
$string['processfilters'] = 'Procesar filtros';
$string['processfilters_desc'] = 'Configurar si los filtros de Moodle (especialmente el filtro multi-idioma) deberían de procesarse al servir el contenido de las páginas estáticas. Vea README para los detalles.';
$string['processfiltersno'] = 'No, no procesar filtros';
$string['processfiltersyes'] = 'Sí, procesar filtros';
$string['settingspagelist'] = 'Lista de páginas estáticas';
$string['settingspagelistentryfilename'] = 'Se encontró el siguiente documento: <br /><strong>{$a}</strong>';
$string['settingspagelistentrypagename'] = 'A partir del nombre de archivo del documento, Moodle obtuvo el siguiente nombre_de_página:<br /><strong>{$a}</strong>';
$string['settingspagelistentryrewritedisabled'] = 'La página estática debería de estar disponible en la siguiente URL limpia, pero no es verificada debido a que está deshabilitada la revisión de disponibilidad::<br /><strong>{$a}</strong>';
$string['settingspagelistentryrewriteerror'] = 'La página estática debería de estar disponible en la siguiente URL limpia, pero en realidad un navegador no podrá descargarla ni verla por causa de un error de conexión o respuesta más lenta que la configuración de  checkavailabilitytimeout   (posiblemente hay algo mal con la configuración de su servidor web o mod_rewrite - vea el archivo README para los detalles):<br /><strong>{$a}</strong>';
$string['settingspagelistentryrewritefail'] = 'La página estática debería de estar disponible en la siguiente URL limpia, pero en realidad un navegador no podrá descargarla ni verla por causa de un código de estado non-2xx HTTP (posiblemente hay algo mal con la configuración de su servidor web o mod_rewrite - vea el archivo README para los detalles):<br /><strong>{$a}</strong>';
$string['settingspagelistentryrewritesuccess'] = 'La página estática está disponible y puede ser enlazada a la siguiente URL limpia:<br /><strong>{$a}</strong>';
$string['settingspagelistentrystandarddisabled'] = 'La página estática debería de estar disponible en la siguiente URL estándar, pero no es revisada debido a que está deshabilitada la revisión de disponibilidad:<br /><strong>{$a}</strong>';
$string['settingspagelistentrystandarderror'] = 'La página estática debería de estar disponible en la siguiente URL estándar, pero en realidad un navegador no podrá descargarla ni verla por causa de un error de conexión o respuesta más lenta que la configuración de  checkavailabilitytimeout  (posiblemente hay algo mal con la configuración de su servidor web - vea el archivo README para los detalles):<br /><strong>{$a}</strong>';
$string['settingspagelistentrystandardfail'] = 'La página estática debería de estar disponible en la siguiente URL estándar, pero en realidad un navegador no podrá descargarla ni verla por causa de un código de estado non-2xx HTTP (posiblemente hay algo mal con la configuración de su servidor web - vea el archivo README para los detalles):<br /><strong>{$a}</strong>';
$string['settingspagelistentrystandardsuccess'] = 'La página estática está disponible y puede ser enlazada a la siguiente URL estándar:<br /><strong>{$a}</strong>';
$string['settingspagelistinstruction'] = 'Esta lista muestra todas las páginas estáticas que han sido subidas al <a href="{$a}">área de documento de páginas estáticas</a> y sus URLs';
$string['settingspagelistnofiles'] = 'No hay archivos .html files en el <a href="{$a}">área de documento de páginas estáticas</a>, por lo que no hay páginas estáticas para ser proporcionadas. Vea el archivo README para los detalles.';
$string['staticpage:managedocuments'] = 'Gestionar documentos de página estática';
$string['upgrade_notice_2016020307'] = '<strong>AVISO DE ACTUALIZACIÓN:</strong> Los archivos de documentos de páginas estáticas fueron movidos a la nueva área-de-archivo dentro de Moodle. Usted puede eliminar el antiguo directorio de documentos {$a} ahorita. Para más instrucciones sobre actualización, especialmente si Usted ha estado usando las características de multi-idioma de este plugin, vea el archivo README.';
