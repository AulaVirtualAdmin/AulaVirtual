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
 * Strings for component 'coursecertificate', language 'es', version '4.2'.
 *
 * @package     coursecertificate
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['activityhiddenwarning'] = 'Esta actividad está actualmente oculta. Al hacerlo visible, los alumnos que cumplan con las restricciones de acceso a la actividad recibirán automáticamente una copia en PDF del certificado.';
$string['archivecertificates'] = 'Archivar certificados emitidos';
$string['archivecertificates_help'] = 'Los certificados archivados aún se pueden verificar y aún se muestran en la página de perfil del usuario. Sin embargo, cuando se archiva un certificado de curso existente, se puede emitir un nuevo certificado a un usuario una vez que cumpla con las restricciones de acceso a la actividad.';
$string['automaticsend_helptitle'] = 'Ayuda con el envío automático';
$string['automaticsenddisabled'] = 'El envío automático de este certificado está deshabilitado.';
$string['automaticsenddisabled_help'] = 'Al dejar esto deshabilitado, los estudiantes deben hacer clic en el enlace de la actividad que se muestra en la página del curso para recibir el certificado, una vez que cumplan con las restricciones de acceso de esta actividad.<br/><br/> Al habilitarlo, los estudiantes recibirán automáticamente una copia en PDF de el certificado una vez que cumplan con las restricciones de acceso de esta actividad. Tenga en cuenta que todos los estudiantes que ya cumplan con las restricciones de acceso de esta actividad recibirán el certificado al habilitarla.';
$string['automaticsenddisabledalert'] = 'Los estudiantes que cumplan con las restricciones de acceso de esta actividad recibirán su certificado una vez que accedan a ella.';
$string['automaticsendenabled'] = 'El envío automático de este certificado está habilitado.';
$string['automaticsendenabled_help'] = 'Al dejar esto habilitado, los estudiantes recibirán automáticamente una copia en PDF del certificado una vez que cumplan con las restricciones de acceso de esta actividad.<br/><br/> Al deshabilitarlo, los estudiantes deberán hacer clic en el enlace de la actividad que se muestra en la página del curso para recibir el certificado, una vez que cumplan con las restricciones de acceso de esta actividad.';
$string['certificateissues'] = 'Problemas de certificados';
$string['certificatesarchived'] = 'Certificados archivados';
$string['certifiedusers'] = 'Usuarios certificados';
$string['chooseatemplate'] = 'Elige una plantilla...';
$string['code'] = 'Código';
$string['coursecertificate:addinstance'] = 'Agregar una nueva actividad de certificado de curso';
$string['coursecertificate:receive'] = 'Recibir certificados emitidos';
$string['coursecertificate:view'] = 'Ver certificado del curso';
$string['coursecertificate:viewreport'] = 'Ver informe de problemas con el certificado del curso';
$string['coursecompletiondate'] = 'Fecha de Terminación';
$string['courseinternalid'] = 'ID de curso interno utilizado en las URL';
$string['courseurl'] = 'URL del curso';
$string['disableautomaticsend'] = 'Los estudiantes ya no recibirán automáticamente una copia en PDF del certificado tan pronto como cumplan con las restricciones de acceso de esta actividad. En su lugar, deberán hacer clic en el enlace de la actividad que se muestra en la página del curso para recibir el certificado, una vez que cumplan con las restricciones de acceso de esta actividad.';
$string['enableautomaticsendpopup'] = 'Todos los estudiantes recibirán automáticamente una copia en PDF del certificado tan pronto como cumplan con las restricciones de acceso de esta actividad.<br/><br/> Los estudiantes que ya cumplan con estas restricciones de acceso pero aún no hayan accedido a esta actividad recibirán inmediatamente su copia como bien.<br/><br/> Los alumnos que ya hayan accedido a esta actividad no volverán a recibir el certificado.';
$string['expirydate'] = 'Fecha de caducidad';
$string['filterswarning'] = 'Filtros definidos en el contexto de la actividad solamente son usados para el título y la descripción de la actividad.';
$string['filterswarninglist'] = 'Solamente los filtros "{$a->list}" serán usados cuando se generen archivos PDF de  certificados y solamente si están habilitados en el <a href="{$a->link}">nivel del curso</a>.';
$string['filterswarningnone'] = 'Ningún filtro será usado cuando se generen archivos PDF de certificados.';
$string['issueddate'] = 'Fecha de emisión';
$string['managetemplates'] = 'Administrar plantillas de certificado';
$string['modulename'] = 'Certificado del curso';
$string['modulename_help'] = 'El módulo de certificado del curso brinda a los alumnos la oportunidad de celebrar los logros mediante la obtención de certificados.<br/><br/> Le permite elegir entre diferentes plantillas de certificado que mostrarán automáticamente los datos del usuario, como el nombre completo, el curso, etc. <br /><br/> Los usuarios podrán descargar una copia en PDF del certificado accediendo a esta actividad, y hay opciones para enviarles una copia en PDF por correo electrónico automáticamente.<br/><br/>Si la plantilla utilizado en esta actividad contiene un código QR, los usuarios podrán escanearlo para validar sus certificados.';
$string['modulename_link'] = 'mod/certificate/view';
$string['modulenameplural'] = 'Certificados de curso';
$string['notemplateselected'] = 'No se puede encontrar la plantilla seleccionada. Vaya a la configuración de la actividad y seleccione una nueva.';
$string['notemplateselecteduser'] = 'El certificado no está disponible. Por favor, póngase en contacto con el administrador del curso.';
$string['notemplateswarning'] = 'No hay plantillas disponibles. Por favor contacte al administrador del sitio.';
$string['notemplateswarningwithlink'] = 'No hay plantillas disponibles. Vaya a la <a href="{$a}">página de administración de plantillas de certificados</a> y cree una nueva.';
$string['nouserscertified'] = 'No hay usuarios certificados.';
$string['open'] = 'Abrir';
$string['page-mod-coursecertificate-x'] = 'Cualquier página de módulo de certificado de curso';
$string['pluginadministration'] = 'Administración de certificados de cursos';
$string['pluginname'] = 'Certificado del curso';
$string['previewcoursefullname'] = 'Nombre completo del curso';
$string['previewcourseshortname'] = 'Nombre abreviado del curso';
$string['privacy:metadata'] = 'La actividad del certificado del curso no almacena datos personales.';
$string['revoke'] = 'Revocar';
$string['revokeissue'] = '¿Está seguro de que desea revocar este problema de certificado de este usuario?';
$string['selectdate'] = 'Seleccione fecha';
$string['selecttemplatewarning'] = 'Una vez que esta actividad emita al menos un certificado, este campo se bloqueará y ya no se podrá editar.';
$string['status'] = 'Estado';
$string['taskissuecertificates'] = 'Emitir certificados de cursos.';
$string['template'] = 'Plantilla';
