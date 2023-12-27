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
 * Strings for component 'profilefield_conditional', language 'es', version '4.2'.
 *
 * @package     profilefield_conditional
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['apply'] = 'OK';
$string['conditionalhelp'] = '¿Cómo ingresar las opciones?';
$string['conditionalhelp_help'] = 'Por favor especifique las opciones del menú al ingresar una opción por línea. Usted puede entonces especificar cuales campos deberían de estar ocultos o ser necesarios cuando se selecciona cada opción.';
$string['configurecondition'] = 'Configurar condiciones';
$string['emptycondition'] = 'Usted necesita configurar las condiciones de las opciones.';
$string['extradata'] = 'Los datos enviados contienen valores para campos que deberían de dejarse vacíos basándose en las opciones aquí seleccionadas.';
$string['hidden'] = 'Oculto';
$string['hiddeninitially'] = 'Ocultar inicialmente';
$string['hiddenrequired'] = '¡Hay al menos un campo que se ha configurado a oculto cuando también era necesario!';
$string['menuoption'] = 'Opción del menú';
$string['notaprofilefield'] = 'Algunos campos que están referidos en a configuración de la condición no existen. Por favor verifique las condiciones. Recuerde presionar "OK" si la configuración se ve bien para Usted.';
$string['notice'] = 'Advertencia: Varios campos condicionales pueden causar conflictos. Los campos necesarios ocultos podrían evitar que se envíe el formato. Para evitar esto, revise que los usuarios no caigan en una situación en donde un campo es requerido por un campo condicional y está oculto por otro campo condicional al mismo tiempo.';
$string['optionconditionmismatch'] = 'Usted ha hecho varias modificaciones a las opciones del menú después de la última vez que Usted configuró condiciones de opciones. Por favor verifique que sus condiciones estén actualizadas.';
$string['pluginname'] = 'Campo condicional';
$string['privacy:metadata:profilefield_conditional:data'] = 'Datos del usuario de campo condicional del perfil';
$string['privacy:metadata:profilefield_conditional:dataformat'] = 'El formato de los datos del usuario de campo condicional del perfil';
$string['privacy:metadata:profilefield_conditional:fieldid'] = 'La ID del campo delperfil';
$string['privacy:metadata:profilefield_conditional:tableexplanation'] = 'Datos adicionales del perfil';
$string['privacy:metadata:profilefield_conditional:userid'] = 'La ID del usuario cuyos datos son almacenados por el campo del perfil condicional del usuario';
$string['required'] = 'Requerido';
$string['requiredbycondition1'] = 'Este campo no puede dejarse vacío cuando {$a->field1} es {$a->value1}';
$string['requiredbycondition2'] = 'Por favor llene el campo de {$a->field2}. No puede dejarse vacío con base en el valor que Usted seleccionó aquí.';
