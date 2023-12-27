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
 * Strings for component 'local_usersynccsv', language 'es', version '4.2'.
 *
 * @package     local_usersynccsv
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['archivedirmaxday'] = 'Días de Retención Dir Archivado';
$string['archivedirmaxday_help'] = 'Número máximo de días de conservación de directorios de archivos';
$string['archivedirmaxsize'] = 'Tamaño máximo de Retención de Archivados';
$string['archivedirmaxsize_help'] = 'Tamaño máximo de directorio de Retención de Archivados, en MB';
$string['configdirmissing'] = 'No pudo encontrarse dir requerido: {$a}';
$string['configdirnotwritable'] = 'Dir no es escribible. Por favor, revise permisos del directorio: {$a}';
$string['configerror'] = 'Error de configuración {$a} , no puede iniciarse la ejecución';
$string['csvdelimiter'] = 'Delimitador CSV';
$string['csvdelimiter_help'] = 'El parámetro delimitador configura el campo delimitador (solamente un caracter).';
$string['csvenclosure'] = 'Cercado (enclosure) CSV';
$string['csvenclosure_help'] = 'Él parámetro de cercado (enclosure) configura el caracter de cercado del campo (solamente un caracter).';
$string['csvescape'] = 'Escape CSV';
$string['csvescape_help'] = 'El parámetro escape configura el caracteer de escape (solamente un caracter).';
$string['dbfiletablemaxday'] = 'Días de Retención de Tabla de Archivos';
$string['dbfiletablemaxday_help'] = 'Máximo de Días de Retención de Tabla de Archivos. Por ejemplo, la tabla en donde almacenamos el estatus de archivos';
$string['defaultauth'] = 'Tipo de Autenticación de Usuario por Defecto';
$string['defaultauth_help'] = 'Usado si no se encuentra un campo de autentícación en el archivo de importación';
$string['defpassowrd'] = 'Contraseña de Usuario por defecto';
$string['defpassowrd_help'] = 'Contraseña (simple) por defecto del usuario, si no se encuentra en el archivo de importación';
$string['discardlevel'] = 'Nivel para descartar archivo';
$string['discardlevel_help'] = 'Configurar política para descartar archivo. USER_ERROR: Al menos un usuario está malformado, FILE_ERROR: el archivo está malformado, NEVER: nunca descartar el archivo';
$string['exportdir'] = 'Exportar Directorio (aun no disponible)';
$string['exportdir_help'] = 'Usado solamente si exportdir es verdadero. Ruta completa del directorio de trabajo para exportación. Moodle necesita acceso de lectura/escritura a esta carpeta; de lo contrario, el plugin no funcionará.';
$string['filemovedlog'] = 'movido a estatus {$a}';
$string['filepermissionserror'] = 'Error de permisos de archivo';
$string['genericdberror'] = 'Error de BasedeDatos en tabla: {$a}';
$string['importdir'] = 'Importar Directorio';
$string['importdir_help'] = 'Ruta completa hacia el directorio de trabajo para importación. Debe de existir en el FileSystem (SistemadeArchivo), y Moodle necesita tener acceso de lectura/escritura a esta carpeta; de lo contrario, el plugin no funcionará';
$string['isexport'] = 'Exportar Datos de Usuario (Aun no disponible)';
$string['isexport_help'] = 'Si se activa, incrementará exportar datos de usuario hacia un archivo CSV en el directorio configurado por exportdir.';
$string['loglevel'] = 'Nivel de bitácora';
$string['loglevel_help'] = 'Configurar nivel de bitácora. LOG_FATALERROR: solamente errores fatales, LOG_FILEERROR: errores fatales/archivo/usuario, LOG_INFO: información sobre el archivo procesado y errores fatales/archivo/usuario';
$string['maineventname'] = 'Sincronizar CSV Usuario';
$string['malformedfilefoundunknownfield'] = 'Campo desconocido encontrado: {$a}';
$string['malformedfilegenericerror'] = 'Línea número {$a}';
$string['malformedfilemalformedline'] = 'Línea número {$a}, el número de elementos difiere del número de elementos en el encabezado';
$string['malformedfilemissingrequiredfield'] = 'Campo necesario faltante: {$a}';
$string['modulename_help'] = 'Sincronizar Usuarios con sistema externo por medio de archivos CSV';
$string['modulenameplural'] = 'Sincronizar CSV Usuario';
$string['pluginadministration'] = 'Administración de Sincronizar Archivo CSV Usuario';
$string['pluginname'] = 'Sincronizar CSV Usuario';
$string['requiredconfigsetting'] = 'Configuración necesaria no está configurada apropiadamente: {$a}';
$string['requiredfields'] = 'Lista de Campos Requeridos';
$string['requiredfields_help'] = 'Lista CSV de campos necesarios. Si alguno de estos no se encuentra en el encabezado del archivo de importación, se desechará todo el archivo de importación. Por defecto está vacía, lo que significa que no se proporciona ningun campo necesario además de los campos de usuario obligatorios: username , firstname, lastname, email (nombre_de_usuario, nombre(s), apellido(s), Email) y por supuesto, la clave de importación';
$string['synccsv_dofile-event'] = 'Sincronizar Archivo CSV procesado';
$string['synccsv_error-event'] = 'Error al Sincronizar Archivo CSV';
$string['synccsvconf_error-event'] = 'Error de Configuración';
$string['synccsveeventconferrdescription'] = 'Error de Configuración.';
$string['synccsveeventdescription'] = 'El archivo con id';
$string['userkey'] = 'Clave del Usuario';
$string['userkey_help'] = 'El campo usado para identificar inequívocamente a un usuario. Por defecto, es idnumber (número_ID), pero también podría ser email.';
