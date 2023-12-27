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
 * Strings for component 'cache_memcached', language 'es', version '4.2'.
 *
 * @package     cache_memcached
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['bufferwrites'] = 'Escrituras de buffer';
$string['bufferwrites_help'] = 'Habilita o deshabilita Entrada/Salida amortiguada (buffered I/O). Habilitar E/S amortiguada causa que los comandos de almacenamiento se "amortigüen" en lugar de mandarse. Cualquier acción que recoja datos causa que este amortigüador (buffer) se mande a la conexión remota. El abandonar la conexión o cerrarla también causará que los datos amortigüados se empujen a la conexión remota.';
$string['hash'] = 'Método de "hash"';
$string['hash_crc'] = 'CRC';
$string['hash_default'] = 'Por defecto (uno-a-la-vez)';
$string['hash_fnv1_32'] = 'FNV1_32';
$string['hash_fnv1_64'] = 'FNV1_64';
$string['hash_fnv1a_32'] = 'FNV1A_32';
$string['hash_fnv1a_64'] = 'FNV1A_64';
$string['hash_help'] = 'Especifica el método de algoritmo de "hashing" usado para las claves de items. Cada algoritmo de hash tiene sus ventajas y desventajas. Quédese con el que está por defecto si no sabe de qué se trata o no le importa.';
$string['hash_hsieh'] = 'Hsieh';
$string['hash_md5'] = 'MD5';
$string['hash_murmur'] = 'Murmur (murmullo)';
$string['pluginname'] = 'Memcached';
$string['prefix'] = 'Prefix key (clave prefijo)';
$string['prefix_help'] = 'Esto puede usarse para crear un "dominio" para sus claves de item, permitiéndole crear múltiples almacenes memcached en una instalación memcached única. No puede ser más largo de 16 caracteres para asegurar que no se encuentren problemas por asuntos relacionados por la longitud de claves.';
$string['serialiser_igbinary'] = 'El serializador igbinary';
$string['serialiser_json'] = 'El serializador JSON';
$string['serialiser_php'] = 'El serializador PHP por defecto';
$string['servers'] = 'Servidores';
$string['testservers'] = 'Servidores de prueba';
$string['testservers_desc'] = 'Los servidores de prueba se utilizan para las pruebas unitarias y las pruebas de rendimiento. Es totalmente opcional utilizar servidores de prueba. Cada servidor se define en una por línea mediante una dirección de servidor y opcionalmente un puerto y su relevancia. Si no se especifica un puerto se usa el puerto por defecto (11211).';
$string['usecompression'] = 'Usar compresión';
$string['usecompression_help'] = 'Habilita o deshabilita la compresión de carga. Cuando se habilita, los valores de item más largos que un cierto umbral (actualmente 100 bytes) serán comprimidos durante el almacenamiento y descomprimidos durante la recuperación de forma transparente.';
$string['useserialiser'] = 'Usar serializador';
