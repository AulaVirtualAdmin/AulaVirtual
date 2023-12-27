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
 * Strings for component 'block_quickmail', language 'es', version '4.2'.
 *
 * @package     block_quickmail
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['actions'] = 'Acciones';
$string['additional_emails'] = 'Correos adicionales';
$string['additional_emails_help'] = 'Otras direcciones a las que quiere que se le envíen los mensajes, separadas por coma o punto y coma. Ejemplo

 email1@example.com, email2@example.com';
$string['allowstudents'] = 'Permitir a los estudiantes usar Quickmail';
$string['alternate'] = 'Emails alternativos';
$string['alternate_body'] = '<p>
{$a->fullname} añadió {$a->address} como email alternativo para el curso {$a->course}.
</p>

<p>
El propósito de este email es verificar que la dirección existe, y que el
propietario tiene los permisos necesarios en la plataforma.
</p>


<p>
Para completar el proceso de verificación, haga clic en el siguiente enlace: {$a->url}
</p>

<p>
Si cree que este correo no va dirigido a usted, puede que lo haya recibido por error.
Simplemente ignore el mensaje.
</p>

Gracias.';
$string['alternate_new'] = 'Añadir un email alternativo';
$string['alternate_subject'] = 'Verificación de la dirección alternativa';
$string['backup_block_configuration'] = 'Respaldar ajustes de configuraciones de Nivel de Bloque de Quickmail  (Como por ejemplo [Allow Students to use Quickmail])';
$string['backup_history'] = 'Incluir historial de Quickmail';
$string['body'] = 'Cuerpo';
$string['courseferpa'] = 'Respetar el modo de grupos';
$string['downloads'] = 'Requerir ingresar para anexos';
$string['downloads_desc'] = 'Esta configuración determina si los anexos están disponibles solamente para usuarios ingresados a Moodle';
$string['drafts'] = 'Ver borradores';
$string['eventalternateemailadded'] = 'Email alternativo añadido';
$string['ferpa'] = 'Modo FERPA';
$string['ferpa_desc'] = 'Permite al sistema comportarse según el modo de grupos del curso, ignorando el modo de grupos pero separándolos, o ignorando los grupos totalmente.';
$string['no_alternates'] = 'No se encontraron email alternativos para {$a->fullname}. Crear uno.';
$string['no_drafts'] = 'No hay borradores.';
$string['noferpa'] = 'No respetar el modo de grupos';
$string['overwrite_history'] = 'Sobreescribir historial de Quickmail';
$string['pluginname'] = 'Quickmail';
$string['prepend_class'] = 'Anteponer el nombre del curso';
$string['prepend_class_desc'] = 'Anteponer el nombre corto del curso al asunto del email.';
$string['quickmail:addinstance'] = 'Añadir un nuevo bloque Quickmail al curso';
$string['quickmail:allowalternate'] = 'Permite a los usuarios añadir un email alternativo para los cursos.';
$string['quickmail:canconfig'] = 'Permite a los usuarios configurar instancias de Quickmail.';
$string['quickmail:cansend'] = 'Permite a los usuarios enviar emails con Quickmail.';
$string['quickmail:myaddinstance'] = 'Añadir un nuevo bloque Quickmail a la página /my';
$string['receipt'] = 'Recibir copia';
$string['receipt_help'] = 'Recibir una copia del email enviado';
$string['restore_history'] = 'Restaurar historial de Quickmail';
$string['save_draft'] = 'Guardar borrador';
$string['signature'] = 'Firmas';
$string['status'] = 'estado';
$string['strictferpa'] = 'Separar grupos siempre';
$string['subject'] = 'Asunto';
$string['title'] = 'Título';
