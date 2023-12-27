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
 * Strings for component 'local_ldap', language 'es', version '4.2'.
 *
 * @package     local_ldap
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['attributesynctask'] = 'Sincronizar cohortes desde los atributos de LDAP';
$string['cohort_synching_ldap_attribute_attribute'] = 'Nombre del atributo a buscar';
$string['cohort_synching_ldap_attribute_attribute_desc'] = 'Ajustar al atributo del usuario LDAP para buscar con (respetar MAYÚSCULAS/minúsculas)';
$string['cohort_synching_ldap_attribute_autocreate_cohorts'] = 'Crear automáticamente las cohortes que faltan';
$string['cohort_synching_ldap_attribute_autocreate_cohorts_desc'] = 'Si se selecciona, se crearán automáticamente las cohortes que faltan';
$string['cohort_synching_ldap_attribute_idnumbers'] = 'Idnumbers de cohortes destino';
$string['cohort_synching_ldap_attribute_idnumbers_desc'] = 'Una lista separada por comas de idnumbers de cohorte destino; si faltara, todos los valores distintos del atributo producirán una cohorte sincronizada';
$string['cohort_synching_ldap_attribute_objectclass'] = 'Clase de usuario';
$string['cohort_synching_ldap_attribute_objectclass_desc'] = 'Use para anular valores por defecto heredados desde el plugin de autenticación LDAP o CAS (respetar MAYÚSCULAS/mninúsculas)';
$string['cohort_synching_ldap_groups_autocreate_cohorts'] = 'Crear automáticamente las cohortes que faltan';
$string['cohort_synching_ldap_groups_autocreate_cohorts_desc'] = 'Si se selecciona, se crearán automáticamente las cohortes que faltan';
$string['cohort_synchronized_with_attribute'] = 'Cohorte sincronizada con el atributo de LDAP {$a}';
$string['cohort_synchronized_with_group'] = 'Cohorte sincronizada con el grupo de LDAP {$a}';
$string['group_attribute'] = 'Atributo de grupo';
$string['group_attribute_desc'] = 'Atributo nombrador de su LDAP, usualmente cn';
$string['group_class'] = 'Clase de grupo';
$string['group_class_desc'] = 'Activar si sus grupos son de otra clase, como group, groupOfNames...';
$string['groupsynctask'] = 'Sincronizar cohortes de los grupos de LDAP';
$string['pluginname'] = 'Scripts de sincronización de LDAP';
$string['privacy:metadata'] = 'Los scripts de sincronización LDAP no almacenan ningún dato personal.';
$string['process_nested_groups'] = 'Procesar grupos anidados';
$string['process_nested_groups_desc'] = 'Si se selecciona, serán procesados los grupos LDAP incluidos dentro de grupos';
$string['real_user_attribute'] = 'Clase real del usuario';
$string['real_user_attribute_desc'] = 'Use si su user_attribute está con MAYÚSCULAS y minúsculas mezcladas en LDAP (sAMAccountName), pero nolo está  en las configuraciones de CAS/LDAP de Moodle';
$string['synccohortattribute'] = 'Sincronizar las cohortes de Moodle con el atributo de LDAP';
$string['synccohortattribute_info'] = '';
$string['synccohortgroup'] = 'Sincronizar las cohortes de Moodle con grupos de LDAP';
