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
 * Strings for component 'repository_nextcloud', language 'es', version '4.2'.
 *
 * @package     repository_nextcloud
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['both'] = 'Interno y externo';
$string['cannotconnect'] = 'No se pudo autenticar al usuario. Inicie sesión y luego cargue el archivo.';
$string['chooseissuer'] = 'Emisor';
$string['chooseissuer_help'] = 'Para añadir un nuevo emisor, vaya a Administración del sitio / Servidor / Servicios de OAuth 2.';
$string['configplugin'] = 'Configuración del repositorio Nextcloud';
$string['configuration_exception'] = 'Se produjo un error en la configuración del cliente OAuth 2: {$a}';
$string['contactadminwith'] = 'No se pudo ejecutar la acción solicitada. Si esto sucede repetidamente, póngase en contacto con el administrador del sitio con la siguiente información adicional: <br> "<i>{$a}</i>".';
$string['couldnotmove'] = 'El archivo solicitado no se pudo mover a la carpeta {$a}.';
$string['defaultreturntype'] = 'Tipo de retorno predeterminado';
$string['endpointnotdefined'] = 'Endpoint {$a} sin definir.';
$string['external'] = 'Externo (sólo enlaces almacenados en Moodle)';
$string['externalpubliclinkwarning'] = 'Aviso: Este archivo se convertirá en público.';
$string['filenotaccessed'] = 'No se pudo acceder al archivo solicitado. Por favor compruebe que ha seleccionado un archivo válido y que ha iniciado sesión con la cuenta adecuada.';
$string['fileoptions'] = 'Los tipos y valores predeterminados de los archivos devueltos se pueden configurar aquí. Tenga en cuenta que todos los archivos vinculados externamente se actualizarán para que el propietario sea la cuenta del sistema Moodle.';
$string['foldername'] = 'Nombre de la carpeta creada en el espacio privado de los usuarios de Nextcloud que contiene todos los enlaces de acceso controlado.';
$string['foldername_help'] = 'Para garantizar que los usuarios encuentren archivos compartidos con ellos, los recursos compartidos se guardan en una carpeta específica.

Esta configuración determina el nombre de la carpeta. Se recomienda elegir un nombre asociado con su instancia de Moodle.';
$string['internal'] = 'Interno (archivos almacenados en Moodle)';
$string['invalidresponse'] = 'Respuesta del servidor no válida.';
$string['issuervalidation_invalid'] = 'Actualmente el emisor {$a} está activo, aunque no implementa todos los endpoints necesarios. El repositorio no funcionará.';
$string['issuervalidation_valid'] = 'Actualmente el emisor {$a} está activo.';
$string['issuervalidation_without'] = 'Aún no ha seleccionado un servidor Nextcloud como emisor OAuth 2.';
$string['nextcloud'] = 'Nextcloud';
$string['nextcloud:view'] = 'Ver Nextcloud';
$string['no_right_issuers'] = 'Ninguno de los emisores actuales implementan todos los endpoints necesarios. Por favor registre un emisor correcto.';
$string['noclientconnection'] = 'Los clientes OAuth no se pudieron conectar.';
$string['notauthorized'] = 'No está autorizado a ejecutar esta petición. Por favor asegúrese de que ha iniciado sesión con la cuenta adecuada.';
$string['oauth2serviceslink'] = '<a href="{$a}" title="Enlace a la configuración de servicios OAuth 2">Configuración de servicios OAuth 2</a>';
$string['pathnotcreated'] = 'La ruta del directorio {$a} no se puedo crear en la cuenta del sistema.';
$string['pluginname'] = 'Nextcloud';
$string['pluginname_help'] = 'Repositorio Nextcloud';
$string['privacy:metadata'] = 'El plugin de repositorio de Nextcloud no almacena ningún dato personal ni envía datos de usuario a ningún sistemas remoto.';
$string['request_exception'] = 'Una petición a {$a->instance} ha fallado. {$a->errormessage}';
$string['requestnotexecuted'] = 'La petición no se pudo ejecutar. Si esto sucede reiteradamente por favor póngase en contacto con el administrador del sitio.';
$string['right_issuers'] = 'Los siguientes emisores implementan los endpoints requeridos: <br> {$a}';
$string['supportedreturntypes'] = 'Archivos soportados';
