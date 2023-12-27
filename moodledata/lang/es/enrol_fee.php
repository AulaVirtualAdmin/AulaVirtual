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
 * Strings for component 'enrol_fee', language 'es', version '4.2'.
 *
 * @package     enrol_fee
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['assignrole'] = 'Asignar rol';
$string['cost'] = 'Tasa de inscripción';
$string['costerror'] = 'La tasa de inscripción debe ser un número.';
$string['currency'] = 'Moneda';
$string['defaultrole'] = 'Asignación de roles predeterminada';
$string['defaultrole_desc'] = 'Seleccionar el rol que se asignará a los usuarios después de que hayan realizado el pago.';
$string['enrolenddate'] = 'Fecha de fin';
$string['enrolenddate_help'] = 'Si está habilitado, los usuarios sólo se pueden matricular hasta esta fecha.';
$string['enrolenddaterror'] = 'La fecha de fin de matrícula no puede ser anterior a la fecha de inicio.';
$string['enrolperiod'] = 'Duración de la matrícula';
$string['enrolperiod_desc'] = 'La duración por defecto del período de matrícula. Si se establece a 0, la duración de la matrícula será por defecto ilimitada.';
$string['enrolperiod_help'] = 'Período de tiempo durante el que la matrícula está activa, empezando en el momento en el que se matricula al usuario. Si está deshabilitado, la duración de la matrícula será ilimitada.';
$string['enrolstartdate'] = 'Fecha de inicio';
$string['enrolstartdate_help'] = 'Si está habilitado, los usuarios sólo pueden matricularse desde esta fecha en adelante.';
$string['expiredaction'] = 'Acción de vencimiento de la matrícula';
$string['expiredaction_help'] = 'Seleccionar la acción que se ejecutará cuando finalice la matrícula de un usuario. Por favor tenga en cuenta que algunos datos de usuario y ajustes se eliminan cuando se anula la matrícula de un usuario.';
$string['fee:config'] = 'Configurar la inscripción en instancias de inscripción de pago';
$string['fee:manage'] = 'Gestionar usuarios matriculados';
$string['fee:unenrol'] = 'Anular matrícula de usuarios del curso';
$string['fee:unenrolself'] = 'Anular mi propia matrícula del curso';
$string['nocost'] = '¡No hay ningún coste por inscribirse en este curso!';
$string['paymentaccount'] = 'Cuenta de pago';
$string['paymentaccount_help'] = 'Las tasas de inscripción se pagarán a esta cuenta.';
$string['pluginname'] = 'Inscripción en pago';
$string['pluginname_desc'] = 'El método de inscripción mediante pago le permite configurar cursos que requieren un pago. Si la tarifa de cualquier curso se establece en cero, no se les pedirá a los estudiantes que paguen la entrada. Hay una tarifa global que establece aquí como predeterminada para todo el sitio y luego una configuración de curso que puede establecer para cada curso individualmente. La tarifa del curso anula la tarifa del sitio.';
$string['privacy:metadata'] = 'El complemento de inscripción en pago no almacena ningún dato personal.';
$string['purchasedescription'] = 'Matrícula en curso {$a}';
$string['sendpaymentbutton'] = 'Seleccionar tipo de pago';
$string['status'] = 'Permitir la inscripción en las inscripciones de pago';
$string['status_desc'] = 'Permitir que los usuarios realicen un pago para inscribirse en un curso de forma predeterminada.';
