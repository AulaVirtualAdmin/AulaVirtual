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
 * Strings for component 'auth_enrolkey', language 'es', version '4.2'.
 *
 * @package     auth_enrolkey
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['cohortsync'] = 'Sincronizar audiencias al apuntarse';
$string['cohortsync_description'] = 'Sincronizar audiencias del sistema cuando un usuario se apunta. Esto quita el retraso del cron que corre y hace este trabajo. Advertencia: esto podría causar que el proceso de apuntarse sea más lento.';
$string['description'] = 'Esto proporciona matriculación basada en clave de auto registro';
$string['edit_cohort'] = 'Editar tarea';
$string['edit_profile'] = 'Editar campos';
$string['edit_redirect'] = 'Editar URL';
$string['enrolkeyuse'] = 'Usar nueva clave de inscripción';
$string['errorenrolling'] = 'Hubo un error al inscribir en curso \'{$a->course}\'. El mensaje de error es: {$a->err}';
$string['heading_unsuspend'] = 'Tu cuenta puede ser suspendida, por favor, ingresar una clave de matriculación';
$string['label_cohortselect'] = 'seleccionar cohortes';
$string['label_cohortselect_empty'] = 'Sin cohortes seleccionadas';
$string['label_cohortselect_help'] = 'Buscar nombres de cohortes y IDs en este campo.';
$string['label_redirection'] = 'URL de redirección';
$string['menumanage'] = 'Gestionar reglas de cohorte de enrolkey';
$string['menusettings'] = 'Configuraciones de enrolkey';
$string['noemail'] = '¡Se intentó mandarte un correo electrónico pero falló!';
$string['pluginname'] = 'Matriculación basada en clave de auto registro';
$string['privacy:metadata'] = 'El modulo auth enrolkey no almacena ningún dato personal';
$string['privacy:metadata:auth_enrolkey'] = 'El plugin de autenticación enrolkey.';
$string['privacy:metadata:auth_enrolkey_cohort'] = 'La cohorte del plugin de autenticación enrolkey.';
$string['privacy:metadata:auth_enrolkey_cohort:usermodified'] = 'La ID del usuario de cohorte de autenticación enrolkey.';
$string['privacy:metadata:auth_enrolkey_profile'] = 'El perfil del plugin de autenticación enrolkey.';
$string['privacy:metadata:auth_enrolkey_profile:usermodified'] = 'La ID del usuario del perfil de autenticación por clave de inscripción.';
$string['privacy:metadata:auth_enrolkey_redirect'] = 'La re-dirección de  autenticación por clave de inscripción.';
$string['privacy:metadata:auth_enrolkey_redirect:usermodified'] = 'La ID del usuario de re-dirección de  autenticación por clave de inscripción.';
$string['recaptcha'] = 'Añade un elemento de confirmación visual/auditiva a la página de registro para los usuarios que se registran por su cuenta. Esto protege a tu sitio contra los spammers y contribuye a una causa que vale la pena. Visita <a href="http://www.google.com/recaptcha">http://www.google.com/recaptcha</a> para obtener más detalles.';
$string['recaptcha_key'] = 'Habilitar elemento reCAPTCHA';
$string['settings_content'] = '<p>La matriculación basada en clave de auto registro permite al usuario crear su propia cuenta a través del botón "Crear nueva cuenta" en la página de inicio de sesión. El usuario recibe entonces un correo electrónico que contiene un enlace seguro a una página en la que puede confirmar su cuenta. Los inicios de sesión posteriores simplemente comprobarán el usuario y la contraseña con los valores almacenados en la base de datos de Moodle.</p><p>Durante el auto registro, si se introduce una clave de matriculación en el campo de clave de matriculación se procederá a matricular al nuevo usuario en cualquier curso con el que coincida. Las claves se habilitan en (Administración del curso > Usuarios > Métodos de matriculación > Añadir método > Auto-matriculación).</p><p>Nota: Además de habilitar el plugin, la matriculación basada en clave de auto registro debe estar seleccionada en el menú desplegable de auto registro en la página \'Gestión de autenticación\'.</p>';
$string['settings_email_description'] = 'Se requiere que los usuarios confirmen sus cuentas con una dirección de correo electrónico antes de ingresar a los cursos matriculados.';
$string['settings_email_title'] = 'Requiere confirmación por correo electrónico';
$string['settings_heading'] = 'Ajustes generales';
$string['settings_partial'] = 'Parcial';
$string['settings_required_description'] = 'La clave de matriculación será un campo requerido para la validación';
$string['settings_required_title'] = 'Se requiere una clave de matriculación para la validación';
$string['settings_visible_description'] = 'Añade un nuevo elemento a la página de registro para los usuarios que se auto registran. Esto se comprobará con las claves de matriculación disponibles y matriculará al usuario en los cursos con los que coincida.';
$string['settings_visible_title'] = 'Habilitar elemento clave de matriculación';
$string['signup_failure'] = '¡Órale! Algo salió mal y es posible que Usted no haya sido inscrito apropiadamente. Vaya a  <a href="{$a->href}">Página inicial</a>';
$string['signup_field_title'] = 'Clave de matriculación';
$string['signup_missing'] = 'Falta clave de matriculación';
$string['signup_token_invalid'] = 'La clave de matriculación que has introducido no es válida';
$string['signup_view'] = 'Matriculación en el curso';
$string['signup_view_message_basic'] = 'Has sido matriculado como {$a->role} en el curso \'<a href="{$a->href}">{$a->course}</a>';
$string['signup_view_message_basic_dates'] = 'Te has matriculado en {$a->course} como {$a->role}. <a href={$a->href}>Haz clic aquí para ver el curso.</a><br />El curso empieza: {$a->startdate}<br />El curso termina: {$a->enddate}';
$string['signup_view_message_basic_dates_endonly'] = 'Te has matriculado en {$a->course} como {$a->role}. <a href={$a->href}>Haz clic aquí para ver el curso.</a><br />El curso termina: {$a->enddate}';
$string['signup_view_message_basic_dates_startonly'] = 'Te has matriculado en {$a->course} como {$a->role}. <a href={$a->href}>Haz clic aquí para ver el curso.</a><br />El curso empieza: {$a->startdate}';
$string['suspendeduseratsignup'] = '<br />¿Pudiera ser que su cuenta exista pero esté suspendida? <a href="{$a->href}">Por favor apúntese aquí con una nueva clave de inscripción</a>';
$string['th_cohorts'] = 'Cohortes asignadas';
$string['th_enrolkeyname'] = 'Nombre de enrolkey.';
$string['th_fullname'] = 'Nombre completo del curso';
$string['th_profilefields'] = 'Campos del perfil';
$string['th_redirecturl'] = 'URL de redirección';
$string['title_cohort'] = 'Editar asignación de cohorte';
$string['title_profile'] = 'Editar campos del perfil';
$string['title_redirect'] = 'Editar URL de redireccionamiento';
$string['title_unsuspend'] = 'Cuenta suspendida';
$string['unsuspendaccounts'] = 'Des-suspender cuenta con un enrolkey válido';
$string['unsuspendaccounts_description'] = 'En el ingreso al sitio, si un usuario está suspendido, y está usando el tipo de autenticación con clave de inscripción, re-direccionarlo a una página intermedia que le pida su nombre_de_usuario, contraseña y clave de inscripción para des-suspenderlo.';
