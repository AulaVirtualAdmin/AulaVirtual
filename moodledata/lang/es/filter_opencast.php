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
 * Strings for component 'filter_opencast', language 'es', version '4.2'.
 *
 * @package     filter_opencast
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['filtername'] = 'Opencast';
$string['pluginname'] = 'Filtro Opencast';
$string['privacy:metadata'] = 'El plugin de filtro Opencast no almacena ningún dato personal.';
$string['setting_configurl'] = 'URL a Paella config.json';
$string['setting_configurl_desc'] = 'URL del config.json utilizado por Paella Player. Puede ser una URL absoluta o una URL relativa a la wwwroot.';
$string['setting_episodeurl'] = 'Plantillas de URL para filtrado';
$string['setting_episodeurl_desc'] = 'Las URLs que coincidan con esta plantilla se sustituirán por el reproductor Opencast. Debe utilizar el marcador de posición [EPISODEID] para indicar dónde se encuentra el ID del episodio en la URL, por ejemplo http://stable.opencast.de/play/[EPISODEID]. Si desea filtrar varias URLs, introduzca cada una de ellas en una nueva línea.';
