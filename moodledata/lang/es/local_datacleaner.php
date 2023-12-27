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
 * Strings for component 'local_datacleaner', language 'es', version '4.2'.
 *
 * @package     local_datacleaner
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['cachedef_courses'] = 'Caché del curso';
$string['cachedef_schema'] = 'Caché del esquema';
$string['cascadedeletesettings'] = 'Ajustes de borrado en cascada';
$string['cleaning'] = 'Limpiando';
$string['disable'] = 'Desactivar';
$string['enable'] = 'Activar';
$string['enabledisable'] = 'Activado';
$string['error:explicitconfigphp'] = 'Por favor establece el valor local_datacleaner_allow_execution en config.php';
$string['errordeletingdir'] = '-- ERROR -- Ha ocurrido un error mientras se estaba borrando el directorio: {$a}';
$string['info'] = '<p>Usted puede configurar cuantos y cuales datos se limpiarán después de que sea clonado de producción. </p><p>Después de que sean clonados la BasedeDatos y los datos_del_sitio (sitedata) hacia otro entorno se correrá un script de Línea de Comando (CLI) el cual realizará la limpieza. Se hacen varias revisiones para asegurar que esto no se pueda correr dentro de un entorno de producción.</p>';
$string['manage'] = 'Administrar tareas de limpieza';
$string['mismatch_threshold'] = 'Umbral de discordancia';
$string['mismatch_thresholddesc'] = 'El limpiador de datos usa un heurístico para crear reglas de borrado en cascada en la base de datos, que normalmente no están all. Antes de crear una regla, revisa cuantos registros violarían la relación portencial. Esta configuración controla el umbral arriba del cual la relación no será creada (lo que también significa que no serán borrados los registros en la tabla de destino). El umbral es expresado como un porcentaje del número total de registros involucrados. Si el número total de registros en una tabla es menor de 100, este valor es ignorado y cualquier conflicto causa que no se cree la regla.';
$string['noplugins'] = 'No se encontraron datos al limpiar plugins.';
$string['notes'] = 'Notas';
$string['pluginname'] = 'Data cleaner';
$string['progress'] = 'Progreso';
$string['sortorder'] = 'Orden de clasificación';
