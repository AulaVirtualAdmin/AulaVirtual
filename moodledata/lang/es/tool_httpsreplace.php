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
 * Strings for component 'tool_httpsreplace', language 'es', version '4.2'.
 *
 * @package     tool_httpsreplace
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['complete'] = 'Completado';
$string['count'] = 'Número de elementos de contenido incrustados';
$string['disclaimer'] = 'Entiendo los riesgos de esta operación';
$string['doclink'] = 'Herramienta para conversión a HTTPS';
$string['doit'] = 'Realizar conversión';
$string['domain'] = 'Dominio problemático';
$string['domainexplain'] = 'Cuando un sitio se cambia de HTTP a HTTPS, todo el contenido HTTP incrustado dejará de funcionar. Esta herramienta le permite convertir automáticamente contenido HTTP a HTTPS.

Antes de realizar la conversión, el contenido se escaneará para encontrar cualquier URL que no funcione después de la conversión. Es posible que desee verificar que cada uno tenga HTTPS disponible o buscar recursos alternativos.';
$string['domainexplainhelp'] = 'Estos dominios se encuentran en su contenido, pero no parecen admitir contenido HTTPS. Después de cambiar a HTTPS, el contenido incluido de estos sitios ya no se mostrará en Moodle para los usuarios con navegadores modernos seguros. Es posible que estos sitios no estén disponibles temporal o permanentemente y no funcionen con ninguna de las configuraciones de seguridad. Continúe solo después de revisar estos resultados y determinar si este contenido alojado externamente no es esencial. Nota: este contenido ya no funcionaría al cambiar a HTTPS de todos modos.';
$string['httpwarning'] = 'Esta instancia todavía se está ejecutando en HTTP. Aún puede ejecutar esta herramienta y el contenido externo se cambiará a HTTPS, pero el contenido interno permanecerá en HTTP. Deberá ejecutar este script de nuevo después de cambiar a HTTPS para convertir el contenido interno.';
$string['notimplemented'] = 'Lo sentimos, esta función no está implementada en el controlador de su base de datos.';
$string['oktoprocede'] = 'El escaneo no encuentra problemas con su contenido. Puede proceder a actualizar cualquier contenido HTTP para usar HTTPS.';
$string['pageheader'] = 'Actualizar las URL de contenido alojado externamente a HTTPS';
$string['pluginname'] = 'Herramienta para conversión a HTTPS';
$string['privacy:metadata'] = 'El complemento de la herramienta de conversión HTTPS no almacena ningún dato personal.';
$string['replacing'] = 'Reemplazando el contenido HTTP con HTTPS...';
$string['searching'] = 'Buscando {$a}';
$string['takeabackupwarning'] = 'Advertencia: después de ejecutar esta herramienta, los cambios no se pueden revertir. Se recomienda realizar una copia de seguridad del sitio antes de continuar, ya que existe un pequeño riesgo de que se reemplace el contenido incorrecto.';
$string['toolintro'] = 'Si está planeando convertir su sitio a HTTPS, puede usar la <a href="{$a}">Herramienta para conversión a HTTPS</a> para convertir a HTTPS su contenido incrustado.';
