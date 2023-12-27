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
 * Strings for component 'search_elastic', language 'es', version '4.2'.
 *
 * @package     search_elastic
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addfail'] = 'Error al añadir el documento al índice';
$string['adminsettings'] = 'Configuraciones del plugin';
$string['advsettings'] = 'Configuraciones avanzadas';
$string['aws'] = 'AWS';
$string['basicsettings'] = 'Configuraciones básicas';
$string['boostdescription'] = 'Estos ajustes controlan la configuración de impulso para las áreas de búsqueda. Las áreas con valores más altos serán impulsadas más y aparecerán más alto en los resultados de la búsqueda. Un valor de impulso de 20 hará el área ponderada 2 veces más alta que un área con valor de 10';
$string['boostsettings'] = 'Configuraciones de impulso';
$string['boostvalue_help'] = 'Configure el valor con el cual desea impulsar el área de búsqueda en los resultados de búsqueda. Valores más altos de impulso dan más prioridad.';
$string['enrichsettings'] = 'Ajustes de enriquecimiento de datos';
$string['fileindexing'] = 'Activar indexador de archivos';
$string['fileindexing_help'] = 'Si tu instalador de Elasticsearch lo soporta, esta característica permite a Moodle enviar archivos para que sean indexados';
$string['fileindexselect'] = 'Procesador de archivo';
$string['fileindexselect_help'] = 'Seleccionar el servicio o procesador de archivo que extraerá texto de archivos. El formato se actualizará con las configuraciones del servicio elegido.';
$string['fileindexsettings'] = 'Ajustes del indexado de archivos';
$string['fileindexsettings_help'] = 'Ingrese los detalles para el servicio Tika. Estos son necesarios si la indexación de archivo está habilitada arriba.';
$string['fileindexsettingsdesc'] = 'Antes de que los archivos puedan ser procesados y sus contenidos e información extraidos, necesita habilitarse la Búsqueda Global.';
$string['hostname'] = 'Nombre de servidor';
$string['hostname_help'] = 'El FQDN (Nombre del Dominio Completamente Calificado) del endpoint del motor de Elasticsearch';
$string['imageindexselect'] = 'Procesador de imagen';
$string['imageindexselect_help'] = 'Seleccionar el servicio o procesador de imagen que extraerá información de sus imágenes. El fomato se actualizará con los ajustes del servicio elegido.';
$string['imagerecognitionsettings'] = 'Reconocimiento de imagen';
$string['index'] = 'Índice';
$string['index_help'] = 'Índice namespace para almacenar datos de búsqueda en backend';
$string['indexfail'] = 'No se pudo crear índice';
$string['logging'] = 'Consulta en bitácora';
$string['logging_help'] = 'Si se habilita, todas las consultas de búsqueda y los resultados crudos de Elasticsearch serán añadidos a la bitácora de error';
$string['maxlabels'] = 'Etiquetas Máximas';
$string['maxlabels_help'] = 'El número máximo de etiquetas de resultados regresados por Rekognition.';
$string['minconfidence'] = 'Confianza mínima';
$string['minconfidence_help'] = 'Rekognition solamente regresará etiquetas con una confianza superior a esto';
$string['noconfig'] = 'Falta configuración de Elasticsearch';
$string['none'] = 'Ninguna';
$string['noserver'] = 'Puntofinal (endpoint) de Elasticsearch inalcanzable';
$string['order_newest'] = 'El más nuevo primero';
$string['order_oldest'] = 'El más antiguo primero';
$string['pluginname'] = 'Elastic';
$string['pluginname_help'] = 'Backend de búsqueda para el motor de búsqueda Elasticsearch';
$string['pluginsettings'] = 'Ajustes del plugin';
$string['port'] = 'Puerto';
$string['port_help'] = 'El puerto del endpoint del motor Elasticsearch';
$string['privacy:metadata'] = 'Este plugin envía datos externamene a un motor de búsqueda Elasticsearch enlazado. No almacena datos localmente.';
$string['privacy:metadata:data'] = 'Datos personales pasados a través del subsistema de búsqueda.';
$string['region'] = 'Región';
$string['region_help'] = 'La región AWS en donde está la instancia Elasticsearch, por ejemplo ap-southeast-2';
$string['rekkeyid'] = 'ID de clave';
$string['rekkeyid_help'] = 'La ID de la clave a usar para acceder a Rekognition.';
$string['rekognitionsettings'] = 'Configuraciones de AWS Rekognition';
$string['rekognitionsettings_help'] = 'Ajustes  para configurar el reconocimiento de imagen y la indexación usando el servicio AWS Rekognition.';
$string['rekregion'] = 'Región';
$string['rekregion_help'] = 'La región AWS donde está el servicio Rekognition, por ejemplous-west-2';
$string['reksecretkey'] = 'Clave Secreta';
$string['reksecretkey_help'] = 'La clave secreta a usar para acceder a Rekognition.';
$string['searchinfo'] = 'Consultas de búsqueda';
$string['searchsettings'] = 'Configuraciones de búsqueda';
$string['sendsize'] = 'Solicitar tamaño';
$string['sendsize_help'] = 'Algunos proveedores Elasticsearch como AWS tienen un límite para qué tan grande puede ser la carga útil (payload) HTTP. Por eso lo limitamos a un tamaño en bytes.';
$string['signing'] = 'Habilitar señalización de solicitud';
$string['signing_help'] = 'Cuando es habilitado, Moodle firmará cada solicitud a Eslasticsearch con las credenciales inferiores';
$string['signingkeyid'] = 'ID de clave';
$string['signingkeyid_help'] = 'La ID de la clave a usar para firmar solicitudes.';
$string['signingsecretkey'] = 'Clave Secreta';
$string['signingsecretkey_help'] = 'La clave secreta a usar para firmar solicitudes.';
$string['signingsettings'] = 'Configuraciones de solicitud de ingreso';
$string['textextractionsettings'] = 'Extracción de texto';
$string['textextractionsettingsdesc'] = 'La extracción de texto toma el texto actual contenido dentro de un archivo y lo añade  como contenido buscable al índice de búsqueda.';
$string['tika'] = 'Apache Tika';
$string['tikahostname'] = 'Nombre del host de Tika';
$string['tikahostname_help'] = 'El FQDN (Nombre de Dominio Completamente Calificado) del endpoint de Apache Tika';
$string['tikaport'] = 'Puerto de Tika';
$string['tikaport_help'] = 'El puerto del endpoint de Apache Tika';
$string['tikasendsize'] = 'Tamaño máximo del archivo';
$string['tikasendsize_help'] = 'Mandar archivos grandes a Tika puede causar problemas de falta de memoria. Por eso lo limitamos a un tamaño en bytes.';
$string['wildcardend'] = 'Comodín al final';
$string['wildcardend_help'] = 'Cuando se habilita, Moodle añadirá comodines implícitos al final de los términos de búsqueda. Esto puede mejorar el comportamiento de las búsquedas. Por ejemplo: buscar "mate" se volverá "mate*" antes de ser enviado al motor de búsqueda. Esto significa que la búsqueda ahora coincidirá con "mate", "materias" y "matemáticas".';
$string['wildcardstart'] = 'Comodín al principio';
$string['wildcardstart_help'] = 'Cuando se habilita, Moodle añadirá comodines implícitos al principio de los términos de búsqueda. Esto puede mejorar el comportamiento de las búsquedas. Por ejemplo: buscar "escrito" se volverá "*escrito" antes de ser enviado al motor de búsqueda. Esto significa que la búsqueda ahora coincidirá con "escrito" y "descrito".';
