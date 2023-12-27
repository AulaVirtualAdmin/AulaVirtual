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
 * Strings for component 'cachestore_apcu', language 'es', version '4.2'.
 *
 * @package     cachestore_apcu
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['clusternotice'] = 'Tenga en cuenta que APCu es solo una opción adecuada para sitios de un solo nodo o cachés que se pueden almacenar localmente.
Para obtener más información, consulte la <a href="{$a}"> documentación de la caché de usuario de APC</a>.';
$string['notice'] = 'Aviso';
$string['pluginname'] = 'Caché de usuario de APC (APCu)';
$string['prefix'] = 'Prefijo';
$string['prefix_help'] = 'El prefijo anterior se usa para todas las claves que se almacenan en esta instancia de la tienda APC. De forma predeterminada, se utiliza el prefijo de la base de datos.';
$string['prefixinvalid'] = 'El prefijo que ha seleccionado no es válido. Sólo puede utilizar a-z A-Z 0-9-_.';
$string['prefixnotunique'] = 'El prefijo que ha seleccionado no es único. Por favor elija un prefijo único.';
$string['privacy:metadata'] = 'El complemento de caché de usuario de APC (APCu) almacena datos brevemente como parte de su funcionalidad de almacenamiento en caché, pero estos datos se borran regularmente y no se envían externamente de ninguna manera.';
$string['testperformance'] = 'Test de rendimiento';
$string['testperformance_desc'] = 'Si está habilitado, el rendimiento de APCu se incluirá al ver la página de rendimiento de la prueba. No se recomienda habilitar esto en un sitio de producción.';
