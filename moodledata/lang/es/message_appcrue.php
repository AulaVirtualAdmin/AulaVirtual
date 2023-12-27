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
 * Strings for component 'message_appcrue', language 'es', version '4.2'.
 *
 * @package     message_appcrue
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['api_key'] = 'APIKey del servicio de notificación AppCrue.';
$string['api_key_help'] = 'APIKey del servicio de notificación AppCrue.';
$string['app_id'] = 'AppId para AppCrue Notification.';
$string['app_id_help'] = 'Token de la universidad para notificaciones.';
$string['enable_push'] = 'Activa el servicio de notificación.';
$string['match_user_by'] = 'Campo para identificar al usuario en Twin Push API.';
$string['match_user_by_help'] = 'Cada usuario está asociado a un nombre en la Twin API push que puede no coincidir con el userid en Moodle.';
$string['only_news_forum'] = 'Solo foros tablón de anuncios.';
$string['only_news_forum_help'] = 'Filtra las notificaciones de los foros y solo envía las del foro de anuncios de los cursos.';
$string['pluginname'] = 'Notificaciones push para Appcrue.';
$string['privacy:metadata'] = 'El plugin "Notificaciones push para Appcrue" no almacena ningún dato personal.';
$string['url_pattern'] = 'Patrón de URL para los enlaces de los eventos.';
$string['url_pattern_help'] = 'Patrón de URL para las notificaciones push. Las siguientes variables están disponibles: {url}: el url del mensaje, {siteurl}: el url base del servidor.
Por ejemplo: {siteurl}/local/appcrue/autologin.php?urltogo={url}&fallback=continue&<bearer>';
