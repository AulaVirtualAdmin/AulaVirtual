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
 * Strings for component 'availability_stash', language 'es', version '4.2'.
 *
 * @package     availability_stash
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['condition'] = 'condición';
$string['description'] = 'Requiere un artículo en el inventario del usuario para acceder.';
$string['exactly'] = 'exactamente';
$string['lessthan'] = 'menos de';
$string['morethan'] = 'más de';
$string['object'] = 'Artículo';
$string['objectnnotrequiredtogetaccess'] = 'No hay {$a->condition} {$a->quantity}x \'{$a->object}\' en su inventario.';
$string['objectnrequiredtogetaccess'] = 'Hay {$a->condition} {$a->quantity}x \'{$a->object}\' en su inventario.';
$string['pluginname'] = 'Disponibilidad de inventario';
$string['privacy:null'] = '-';
$string['quantity'] = 'cantidad';
$string['theirstashcontains'] = 'Su inventario contiene {$a->conditions} {$a->quantity} {$a->objects}';
$string['title'] = 'Artículo de inventario';
$string['unknowncondition'] = '[Condición desconocida]';
$string['unknownobject'] = '[Artículo desconocido]';
$string['youhavegota'] = 'Usted tiene "{$a->object}"';
$string['youhavegotlessthanna'] = 'Usted tiene menos de {$a->quantity}x "{$a->object}"';
$string['youhavegotmorethanna'] = 'Usted tiene más de {$a->quantity}x "{$a->object}"';
$string['youhavegotna'] = 'Usted tiene {$a->quantity}x "{$a->object}"';
$string['youhaventgota'] = 'Usted no tiene "{$a->object}"';
$string['youhaventgotanya'] = 'Usted no tiene nada de "{$a->object}"';
$string['youhaventgotlessthanna'] = 'Usted no tiene menos de {$a->quantity}x "{$a->object}"';
$string['youhaventgotmorethanna'] = 'Usted no tiene más de  {$a->quantity}x "{$a->object}"';
$string['youhaventgotna'] = 'Usted no tiene {$a->quantity}x "{$a->object}"';
