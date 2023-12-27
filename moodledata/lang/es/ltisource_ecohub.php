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
 * Strings for component 'ltisource_ecohub', language 'es', version '4.2'.
 *
 * @package     ltisource_ecohub
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['abb_not_avaiable'] = 'N/A';
$string['cachedef_mod_ltisource_ecohub_configfile'] = 'Caché para localización de archivo de configuración LTI Source EcoHub';
$string['cachedef_mod_ltisource_ecohub_configsettings'] = 'Caché de ajustes de configuración de LTI Source EcoHub, excluyendo mapeo LTI';
$string['cachedef_mod_ltisource_ecohub_ltimap'] = 'Caché de mapeo de parámetros LTI para LTI Source EcoHub';
$string['config_error_asdomain_invalid'] = 'El campo obligatorio de archivo de configuración  {$a} as_domain no es una URL válida';
$string['config_error_config_not_found'] = 'No se ha encontrado el archivo de configuración config.json';
$string['config_error_file_newer'] = 'El archivo de configuration {$a->filename} es más reciente ({$a->newversion}) que la versión soportada ({$a->supportedversion})';
$string['config_error_file_not_found'] = 'No se ha encontrado el archivo de configuración {$a}';
$string['config_error_file_not_json'] = 'El archivo de configuración {$a} no es un archivo JSON válido';
$string['config_error_missing_fields'] = 'Faltan campos obligatorios (version, as_domain) en el archivo de configuración {$a}';
$string['config_error_title'] = 'Configuración EcoHub';
$string['ecohubltiinvalid'] = 'Hubo un error durante el lanzamiento de LTI. {$a}';
$string['ecohubltilaunch'] = 'Hubo un error durante el lanzamiento de LTI. Los parámetros de EcoHub no se pudieron resolver.';
$string['launch_enabled'] = 'Habilitado';
$string['launch_enabled_desc'] = 'Debe estar habilitado para lanzar LTI en Laerdal EcoHub.';
$string['lti_param_invalid_empty_error'] = 'El parámetro {$a} debe contener un valor.';
$string['lti_param_invalid_error'] = 'El parámetro {$a->param} con valor {a->value} no es válido.';
$string['lti_param_invalid_not_guid_error'] = 'El parámetro {$a->param} es {$a->value}. Se esperaba un GUID.';
$string['lti_param_invalid_not_in_range_error'] = 'El parámetro {$a->param} es {$a->value} y está fuera de rango. El rango es {$a->range}.';
$string['lti_param_not_allowed_error'] = 'El parámetro {$a->param} no debe modificarse.';
$string['pluginhelp'] = 'El plugin EcoHub LTI Source es como el plugin External tool (Herramienta externa). Hace posive añadir un curso Laerdal Medical como actividad.';
$string['pluginname'] = 'Origen de LTI EcoHub';
$string['settings_as_domain'] = 'Endpoint para configuración suplementaria';
$string['settings_developer_file_info'] = 'Información de configuración de archivo';
$string['settings_developer_file_modified'] = 'Última modificación: {$a}';
$string['settings_developer_file_name'] = 'Nombre completo del archivo: {$a}';
$string['settings_developer_heading'] = 'Modo de Desarrollo';
$string['settings_file_version'] = 'Versión de configuraciń obtenida de archivo config';
$string['settings_general_heading'] = 'Ajustes Generales';
$string['settings_general_readonly'] = 'El archvo de configuración especifica una configuración de sólo lectura que no se puede editar.';
$string['settings_param_map_description'] = 'La expresión **{$a->mapping}** se evalúa y se inserta en el parámetro LTI **{$a->param}** antes de lanzar el curso. Para este usuario el mapeo es: **{$a->expression}**';
$string['settings_param_map_description_error'] = '¡La expresión **{$a->mapping}** no puede evaluarse!';
$string['settings_param_map_description_static'] = 'La constante **{$a->mapping}** se inserta en el parámetro LTI **{$a->param}** antes de lanzar el curso.';
$string['settings_param_map_heading'] = 'Mapeo de parámetros';
$string['settings_param_map_title'] = 'Entrada de mapeo LTI';
$string['settings_param_map_title_warning'] = '¡Error de evaluación!';
$string['settings_param_map_with'] = '=';
