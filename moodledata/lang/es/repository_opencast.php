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
 * Strings for component 'repository_opencast', language 'es', version '4.2'.
 *
 * @package     repository_opencast
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['configplugin'] = 'Ajustes Opencast';
$string['opencast:view'] = 'Ver el repositorio Opencast';
$string['opencastauthor'] = 'Autor de Opencast por defecto';
$string['opencastchannelid'] = 'Identificador del canal Opencast';
$string['opencastchannelid_help'] = 'Configure el identificador del canal de publicación a buscar para recuperar la url de la miniatura y el vídeo.';
$string['opencastinstance'] = 'Instancia Opencast';
$string['opencastplayerurl'] = 'URL embebida al reproductor en lugar de al archivo multimedia.';
$string['opencastplayerurl_help'] = 'Si está marcada, se utiliza la URL del reproductor Opencast. En caso contrario, el repositorio selecciona la URL de un archivo de vídeo del evento Opencast.';
$string['opencastthumbnailflavor'] = 'Formato predefinido para obtener la miniatura';
$string['opencastthumbnailflavor_help'] = 'Una publicación puede tener varios archivos adjuntos con diferentes formatos. Configure el formato (por ejemplo "presenter/search+preview") que debe utilizarse para recuperar la url de la miniatura. Si no hay ningún archivo adjunto con este formato, el complemento intentará encontrar un archivo adjunto con el formato alternativo.';
$string['opencastthumbnailflavorfallback'] = 'Formato alternativo para obtener miniaturas';
$string['opencastthumbnailflavorfallback_help'] = 'Configurar el formato, que debe ser utilizado, si no hay ningún archivo adjunto con el formato, el predefinido está disponible. Si deja en blanco todos los campos para la búsqueda de miniaturas, el complemento intentará encontrar automáticamente una URL de miniaturas.';
$string['opencastvideoflavor'] = 'Formato para obtener vídeo';
$string['opencastvideoflavor_help'] = 'Una publicación puede tener varios archivos adjuntos con diferentes formatos. Establezca el formato que se utilizará para recuperar la url del vídeo. Si lo deja en blanco, se utilizará la primera url de vídeo disponible que se encuentre en los archivos adjuntos.';
$string['pluginname'] = 'Vídeos Opencast';
$string['privacy:metadata'] = 'El repositorio de Opencast sólo muestra vídeos de Opencast, pero no efectúa ni almacena ningún dato personal.';
