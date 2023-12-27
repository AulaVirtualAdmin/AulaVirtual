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
 * Strings for component 'assignsubmission_changes', language 'es', version '4.2'.
 *
 * @package     assignsubmission_changes
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['admin_diff'] = 'Habilitar Detección de Diferencia por defecto';
$string['admin_diff_help'] = 'Si se configura, la generación de las diferencias entre las subidas estará habilitada por defecto para todas las tareas nuevas.<br>La generación de diferencias requiere la generación de bitácora_de_cambios..';
$string['allow_changelog'] = 'Permitir detección de cambios en evíos del estudiante';
$string['allow_changelog_help'] = 'Si se configura, puede ser generada una bitácora_de_cambios con todas las actualizaciones del envío. Usted puede configurar esta opción en las configuraciones del envío. Si esta opción es desactivada, no puede generarse una bitácora_de_cambios.';
$string['default'] = 'Habilitar Bitácora_de_cambios por defecto.';
$string['default_help'] = 'Si se configura, la bitácora_de_cambios estará habilitada por defecto para todas sus tareas nuevas.';
$string['diff'] = 'Auto detectar diff';
$string['diff_help'] = 'Detectar diferencias en envíos del estudiante';
$string['diff_not_available'] = '<p>La detección para cambios en archivos PDF no está disponible, debido a que la herramienta<code>diff</code> no pudo encontrarse en su sistema. Si Usted ha habilitado la configuració de arriba, vea en las configuraciones administrativas del plugin local ChangelogLib para especificar la ruta correcta. Este mensaje desaparece si la herramienta pudo ser encontrada.</p>';
$string['diff_prefix'] = 'Las páginas siguientes del archivo nuevo fueron cambiadas:';
$string['diff_requires_changelog'] = 'Usted debe habilitar la bitácora_de_cambios (changelog) para la generación del diferencial';
$string['edit_form_changes'] = 'Entrada de bitácora_de_cambios';
$string['edit_form_changes_help'] = 'Describa las partes cambiadas en su envío.';
$string['edit_form_error_empty'] = 'La entrada de bitácora_de_cambios no debe estar vacía.';
$string['edit_form_error_too_long'] = 'Usted no puede usar más de {$a->max} caracteres como texto descriptivo. Usted envió {$a->used} caracteres.';
$string['edit_form_headline'] = 'Edtar el texto de bitácora_de_cambios mostrada para su envío en {$a}.';
$string['enabled'] = 'Bitácora_de_cambios';
$string['enabled_help'] = 'Habilitar la detección de cambios';
$string['is_an_update'] = 'es una actualización de';
$string['last_grading'] = 'La última calificación fue en';
$string['long_diff'] = '{$a} páginas fueron cambiadas';
$string['max_filesize'] = 'Tamaño máximo del archivo en MB para detección de diferencias';
$string['max_filesize_help'] = 'El tamaño máximo del archivo del envío en donde serán detectadas diferencias con un predecesor. Un valor más alto puede impactar el tiempo de respuesta del servidor y su carga de trabajo. Configure este valor a cero para deshabiltar la detección de diferencias.';
$string['new_changes_prefix'] = 'Los cambios siguientes fueron realizados por el usuario después de la última calificación';
$string['no_changes'] = 'No hay cambios detectados.';
$string['no_last_grading'] = 'No hay calificación hasta ahora.';
$string['no_new_changes'] = 'No hay cambios del envío después dee la última calificación';
$string['no_old_changes'] = 'El estudiante no ha enviado cingun cambio antes de la última calificación';
$string['no_ungraded_changes'] = 'Sin cambios sin_calificar';
$string['old_changes_prefix'] = 'Los siguientes cambios fueron realizados por el usuario antes de la última calificación';
$string['pdftotext_not_available'] = '<p>La detección para cambios en archivos PDF no está disponible, debido a que la herramienta<code>pdftotext</code> no pudo encontrarse en su sistema. Si Usted ha habilitado la configuració de arriba, vea en las configuraciones administrativas del plugin local ChangelogLib para especificar la ruta correcta. Este mensaje desaparece si la herramienta pudo ser encontrada.</p>';
$string['pluginname'] = 'Cambios';
$string['pluginname_desc'] = 'AssignSubmission Cambios';
$string['pluginname_help'] = 'AssignSubmission Cambios';
$string['pluginname_link'] = 'https://github.com/hwuerz/moodle-assignsubmission_changes';
$string['replaces'] = 'remplaza';
$string['ungraded_changes'] = 'Hay cambios sin_calificar';
$string['warning'] = 'Advertencia';
$string['was_added'] = 'fue añadida';
$string['was_deleted'] = 'fue eliminada';
