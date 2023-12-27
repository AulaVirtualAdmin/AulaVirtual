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
 * Strings for component 'onlyofficeeditor', language 'es', version '4.2'.
 *
 * @package     onlyofficeeditor
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['docserverunreachable'] = 'No se puede acceder al servidor de documentos ONLYOFFICE. Póngase en contacto con el administrador';
$string['documentpermissions'] = 'Permisos de documentos';
$string['documentserversecret'] = 'Clave secreta del servidor de documentos';
$string['documentserversecret_desc'] = 'La clave secreta se utiliza para generar un token (una firma cifrada) en el navegador para que el editor de documentos se abra y llame a los métodos mediante solicitudes al servicio de comandos de documentos y al servicio de conversión de documentos. El token evita la sustitución de parámetros importantes en las solicitudes al servidor de documentos ONLYOFFICE.';
$string['documentserverurl'] = 'URL del Servicio de Edición de Documentos';
$string['documentserverurl_desc'] = 'La URL del Servicio de Edición de Documentos especifica la dirección del servidor donde está instalado el servidor de documentos ONLYOFFICE. Reemplace \'https://documentserver.url\' por la dirección correcta del servidor';
$string['download'] = 'El documento se puede descargar';
$string['download_help'] = 'Si está deshabilitado, los documentos no se podrán descargar con la aplicación de edición de ONLYOFFICE. Tenga en cuenta que los usuarios con el permiso <strong>curso:administraractividades</strong> siempre pueden descargar documentos a través de la aplicación';
$string['modulename'] = 'Documento ONLYOFFICE';
$string['modulename_help'] = 'El módulo ONLYOFFICE permite a los usuarios editar documentos de office almacenados localmente en Moodle usando el servidor de documentos ONLYOFFICE, permitiendo que múltiples usuarios colaboren en tiempo real y guarden esos cambios en Moodle';
$string['modulenameplural'] = 'Documentos ONLYOFFICE';
$string['onlyofficeactivityicon'] = 'Abrir con ONLYOFFICE';
$string['onlyofficeeditor:addinstance'] = 'Añadir una nueva actividad de Documento ONLYOFFICE';
$string['onlyofficeeditor:view'] = 'Ver la actividad Documento ONLYOFFICE';
$string['onlyofficename'] = 'Nombre de la actividad';
$string['pluginadministration'] = 'Administración de la actividad Documento ONLYOFFICE';
$string['pluginname'] = 'Documento ONLYOFFICE';
$string['print'] = 'El documento se puede imprimir';
$string['print_help'] = 'Si está deshabilitado, los documentos no se podrán imprimir a través de la aplicación de edición de ONLYOFFICE. Tenga en cuenta que los usuarios con el permiso <strong>curso:administraractividades</strong> siempre pueden imprimir documentos a través de la aplicación';
$string['privacy:metadata'] = 'No se almacena información sobre los datos personales del usuario.';
$string['returntodocument'] = 'Volver a la página del curso';
$string['selectfile'] = 'Seleccione un archivo existente o cree uno nuevo haciendo clic en uno de los iconos';
