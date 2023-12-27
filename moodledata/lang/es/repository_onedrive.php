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
 * Strings for component 'repository_onedrive', language 'es', version '4.2'.
 *
 * @package     repository_onedrive
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['access'] = 'Acceso';
$string['both'] = 'Interno y externo';
$string['cachedef_folder'] = 'IDs de archivo OneDrive para carpetas en la cuenta del sistema';
$string['configplugin'] = 'Configurar plugin OneDrive';
$string['confirmimportskydrive'] = '¿Está seguro de que desea importar todos los archivos del repositorio de Microsoft SkyDrive al repositorio de Microsoft OneDrive? El repositorio de Microsoft OneDrive debe estar configurado y funcionando para que los archivos importados sigan funcionando como antes. Aviso: esta acción no se puede deshacer.';
$string['defaultreturntype'] = 'Tipo de retorno predeterminado';
$string['external'] = 'Externo (sólo enlaces almacenados en Moodle)';
$string['fileoptions'] = 'Los tipos y valores predeterminados de los archivos devueltos se pueden configurar aquí. Tenga en cuenta que todos los archivos vinculados externamente se actualizarán para que el propietario sea la cuenta del sistema Moodle.';
$string['importskydrivefiles'] = 'Importar archivos desde el repositorio de Microsoft SkyDrive';
$string['internal'] = 'Interno (archivos almacenados en Moodle)';
$string['issuer'] = 'Servicio OAuth 2';
$string['issuer_help'] = 'Seleccione el servicio OAuth 2 que está configurado para comunicarse con la API de OneDrive. Si el servicio aún no existe, deberá crearlo.';
$string['mysitenotfound'] = 'Nunca antes ha iniciado sesión en OneDrive. Debe iniciar sesión en OneDrive al menos una vez antes de que pueda usarse con Moodle.';
$string['oauth2serviceslink'] = '<a href="{$a}" title="Enlace a la configuración de servicios OAuth 2">Configuración de servicios OAuth 2</a>';
$string['onedrive:view'] = 'Ver repositorio OneDrive';
$string['owner'] = 'Propiedad de: {$a}';
$string['pluginname'] = 'Microsoft OneDrive';
$string['privacy:metadata:repository_onedrive'] = 'El repositorio de Microsoft OneDrive almacena permisos de acceso temporal y transmite datos de usuario desde Moodle al sistema remoto.';
$string['privacy:metadata:repository_onedrive:repository_onedrive_access:itemid'] = 'El ID del elemento de Microsoft OneDrive con un permiso de acceso temporal.';
$string['privacy:metadata:repository_onedrive:repository_onedrive_access:permissionid'] = 'El ID del permiso de acceso temporal de Microsoft OneDrive.';
$string['privacy:metadata:repository_onedrive:repository_onedrive_access:timecreated'] = 'La fecha y hora de creación del permiso de acceso temporal de Microsoft OneDrive.';
$string['privacy:metadata:repository_onedrive:repository_onedrive_access:timemodified'] = 'La fecha y hora de modificación del permiso de acceso temporal de Microsoft OneDrive.';
$string['privacy:metadata:repository_onedrive:repository_onedrive_access:usermodified'] = 'El ID del usuario que modifica el permiso de acceso temporal de Microsoft OneDrive.';
$string['privacy:metadata:repository_onedrive:searchtext'] = 'El texto de la consulta de búsqueda de usuario del repositorio de Microsoft OneDrive.';
$string['removetempaccesstask'] = 'Eliminar el acceso de escritura temporal de los enlaces controlados';
$string['searchfor'] = 'Buscar {$a}';
$string['servicenotenabled'] = 'Acceso no configurado.';
$string['skydrivefilesexist'] = 'El repositorio de Microsoft SkyDrive está habilitado pero obsoleto. Por favor, asegúrase de migrar los archivos de SkyDrive al repositorio OneDrive tan pronto como sea posible. En Moodle 4.4 esto ya no será posible.';
$string['skydrivefilesimported'] = 'Se importaron todos los archivos desde el repositorio de Microsoft SkyDrive.';
$string['skydrivefilesnotimported'] = 'No se pudieron importar algunos archivos desde el repositorio de Microsoft SkyDrive.';
$string['supportedreturntypes'] = 'Archivos soportados';
