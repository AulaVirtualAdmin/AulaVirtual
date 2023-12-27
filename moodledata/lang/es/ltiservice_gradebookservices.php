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
 * Strings for component 'ltiservice_gradebookservices', language 'es', version '4.2'.
 *
 * @package     ltiservice_gradebookservices
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['alwaysgs'] = 'Utilice este servicio para sincronización de calificaciones y administración de columnas';
$string['grade_synchronization'] = 'Servicios de calificación y asignación de IMS LTI';
$string['grade_synchronization_help'] = 'Si se usan o no los Servicios de Calificación y Tarea IMS LTI para sincronizar las calificaciones en sustitución del servicio de Resultados Básicos.

* **No usar este servicio** - Se usará la configuración y las características de Resultados Básicos
* **Usar este servicio solamente para sincronizar calificación** - El servicio poblará las calificaciones en una columna ya existente en el Libro de calificaciones, pero no podrá crear nuevas columnas
* **Usar este servicio para sincronizar calificación y gestión de columna** - El servicio podrá crear y actualizar columnas del Libro de calificaciones y gestionar las calificaciones.';
$string['ltiservice_gradebookservices'] = 'Servicios de calificación y asignación de IMS LTI';
$string['modulename'] = 'Calificaciones LTI';
$string['nevergs'] = 'No utilice este servicio';
$string['partialgs'] = 'Utilice este servicio sólo para sincronización de calificaciones';
$string['pluginname'] = 'Servicios de calificación y asignación de LTI';
$string['privacy:metadata:externalpurpose'] = 'Esta información es enviada a un proveedor externo LTI.';
$string['privacy:metadata:feedback'] = 'Los comentarios que recibió este usuario para esta actividad LTI.';
$string['privacy:metadata:grade'] = 'La calificación que recibió este usuario en Moodle para esta actividad LTI.';
$string['privacy:metadata:maxgrade'] = 'La calificación máxima que se puede obtener en esta actividad LTI.';
$string['privacy:metadata:timemodified'] = 'La última vez que la calificación fue actualizada';
$string['privacy:metadata:userid'] = 'El ID del usuario que utiliza el consumidor LTI.';
$string['taskcleanup'] = 'Limpieza de la tabla de servicios de calificación y asignación LTI';
