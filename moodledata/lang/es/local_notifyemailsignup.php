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
 * Strings for component 'local_notifyemailsignup', language 'es', version '4.2'.
 *
 * @package     local_notifyemailsignup
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['monitoredauths'] = 'Plugins de autenticación a ser monitoreados';
$string['monitoredauths_desc'] = 'Seleccione los plugins de autenticación que desea monitorear para los nuevos apuntados por auto-registro. Solamente los plugins que estén configurados para permitir apuntarse serán enlistados. Son enlistados aunque no estén habilitados.';
$string['notifyemailsignupbody'] = 'Hola {$a->supportname},

Se ha solicitado la apertura de una cuenta de usuario en \'{$a->sitename}\', usando los siguientes detalles:

- dirección de correo electrónico: {$a->signup_user_email}
- nombre de usuario: {$a->signup_user_username}
- nombre: {$a->signup_user_firstname}
- apellido(s): {$a->signup_user_lastname}

Un saludo del administrador de \'{$a->sitename}\',
{$a->signoff}';
$string['notifyemailsignupsubject'] = '{$a}: Notificación de solicitud de apertura de nueva cuenta';
$string['pluginname'] = 'Notificar a los administradores del sitio sobre solicitudes de apertura de nuevas cuentas';
$string['privacy:metadata:externalpurpose'] = 'Esta información es enviada a un servidor SMTP externo para ser finalmente enviada como un Email al destinatario.';
$string['privacy:metadata:fullmessage'] = 'El mensaje contiene  los detalles del nuevo usuario apuntado (puede incluir detalles de campos del usuario personalizados).';
$string['privacy:metadata:fullmessagehtml'] = 'El mensaje contiene  los detalles del nuevo usuario apuntado (puede incluir detalles de campos del usuario personalizados).';
$string['privacy:metadata:recipient'] = 'El usuario para soporte configurado.';
$string['privacy:metadata:replyto'] = 'La dirección de Email del usuario para soporte configurado.';
$string['privacy:metadata:replytoname'] = 'El nombre del usuario para soporte configurado.';
$string['privacy:metadata:userfrom'] = 'El usuario para soporte configurado.';
