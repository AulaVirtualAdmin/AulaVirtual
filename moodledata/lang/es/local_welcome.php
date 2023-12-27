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
 * Strings for component 'local_welcome', language 'es', version '4.2'.
 *
 * @package     local_welcome
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['auth_plugins'] = 'Plugins de Autenticación';
$string['auth_plugins_desc'] = 'Elija los plugins de auth para los que se debe enviar un mensaje de bienvenida';
$string['configure'] = 'Configurar este plugin';
$string['customprofilefields'] = 'Campos personalizados del perfil';
$string['default_moderator_email'] = '<html>
<body>
<table cellspacing="0" cellpadding="8">
<tr><td colspan="2"><h3>Nuevo usuario del sitio [[fullname]]</h3>
    Una nueva cuanta ha sido creada con la siguiente información:</td></tr>
<tr><td>Nombre:</td><td>[[fullname]]</td></tr>
<tr><td>Usuario: </td><td>[[username]]</td></tr>
<tr><td>Email: </td><td>[[email]]</td></tr>
</table>
</body>
</html>';
$string['default_moderator_email_subject'] = 'Un nuevo usuario se ha registrado en [[sitename]] : [[fullname]]';
$string['default_user_email'] = '<html>
<body>
<table cellspacing="0" cellpadding="8">
<tr><td colspan="2"><h3>Bienvenido(a) [[fullname]]</h3>
    ¡Su cuenta en Moodle ha sido creada y ya esta lista para que acceda! Su cuenta ha sido creada en [[sitelink]] con la siguiente información:</td></tr>
<tr><td>Nombre:</td><td>[[fullname]]</td></tr>
<tr><td>Usuario: </td><td>[[username]]</td></tr>
<tr><td>Email: </td><td>[[email]]</td></tr>
<tr><td colspan="2">Si pierde la contraseña en algún momento, restablecerla es fácil:<br>[[resetpasswordlink]]</tr>
</table>
</body>
</html>';
$string['default_user_email_subject'] = 'Hola [[fullname]] Bienvenido(a) a [[sitename]]';
$string['defaultprofilefields'] = 'Campos predeterminados del perfil';
$string['fieldname'] = 'Nombre del campo';
$string['globalhelp'] = 'Este plugin para Moodle envía un mensaje de bienvenida configurable a los nuevos usuarios.
<br> <br>
El complemento utiliza el sistema de eventos en Moodle y se activará cuando
se crea un nuevo usuario, sin importar si se trata de una cuenta creada manualmente o
cuenta creada utilizando el auto registro. <br>
<br>
Las tablas de esta página muestran los campos de perfil disponibles que se pueden usar en la plantilla de mensaje en la página de configuración de este complemento.
Los valores que se muestran en esta tabla son SUS valores de campo de perfil, serán reemplazados por los valores de los destinatarios cuando se envíe el correo electrónico de bienvenida.';
$string['message_moderator'] = 'Mensaje del moderador';
$string['message_moderator_desc'] = 'Mensaje enviado a los moderadores';
$string['message_moderator_enabled'] = 'Habilitar mensaje a los moderadores';
$string['message_moderator_enabled_desc'] = 'Esta casilla de verificación permite el envío de mensajes de notificación a los moderadores';
$string['message_moderator_subject'] = 'Asunto al moderador';
$string['message_moderator_subject_desc'] = 'Este será el tema del correo electrónico enviado al moderador. Utilice [[fullname]] como etiqueta, esta será reemplazada por los nombres y apellidos de los usuarios.';
$string['message_user'] = 'Mensaje al usuario';
$string['message_user_desc'] = 'Mensaje enviado a los nuevos usuarios';
$string['message_user_enabled'] = 'Habilitar mensajes a los usuarios';
$string['message_user_enabled_desc'] = 'Esta casilla de verificación permite enviar mensajes de bienvenida a nuevos usuarios <br> <br> Visite <a href="{$a}"> esta página para ver la lista de campos disponibles </a>';
$string['message_user_subject'] = 'Asunto al usuario';
$string['message_user_subject_desc'] = 'Este será el tema del correo electrónico enviado al usuario. Utilice [[fullname]] como etiqueta, esta se reemplazará con los nombres y apellidos de los usuarios.';
$string['moderator_email'] = 'Email del moderador';
$string['moderator_email_desc'] = 'Las notificaciones de nuevos usuarios serán enviadas a esta dirección de correo electrónico';
$string['pluginname'] = 'Bienvenida de Moodle';
$string['resetpass'] = 'Reiniciar su contraseña aquí';
$string['sender_email'] = 'Email del remitente';
$string['sender_email_desc'] = 'Cuando los nuevos usuarios inicien sesión esta dirección de correo electrónico se utiliza para enviar un mensaje de notificación, los usuarios podrán ver esta dirección de correo electrónico';
$string['sender_firstname'] = 'Nombre del remitente del mensaje de bienvenida';
$string['sender_firstname_desc'] = 'Nombre utilizado al enviar correo a los usuarios.';
$string['sender_lastname'] = 'Apellido del moderador';
$string['sender_lastname_desc'] = 'Apellido utilizado al enviar correo a los usuarios.';
$string['type'] = 'Tipo';
$string['welcomefields'] = 'Campos adicionales de la plantilla';
$string['yourvalue'] = 'Su valor';
