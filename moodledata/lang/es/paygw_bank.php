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
 * Strings for component 'paygw_bank', language 'es', version '4.2'.
 *
 * @package     paygw_bank
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['additional_currencies'] = 'Monedas adicionales';
$string['additional_currencies_help'] = 'Lista separada por comas de códigos de monedas adicionales. Puede consultar los códigos en https://en.wikipedia.org/wiki/ISO_4217#Active_codes';
$string['allow_users_add_files'] = 'Permite a los usuarios añadir ficheros.';
$string['approve'] = 'Aprobar';
$string['code'] = 'Código';
$string['concept'] = 'Concepto';
$string['cost'] = 'Precio';
$string['deny'] = 'Denegar';
$string['email_notifications'] = 'Correo para notificaciones internas';
$string['email_notifications_confirm'] = 'La transferencia con código {$a->code} ha sido aprobada.';
$string['email_notifications_help'] = 'Se puede notificar a una dirección de correo externa cuando se genera una nueva solicitud de transferencia, o cuando cambia su estado.';
$string['email_notifications_new_attachments'] = 'The bank payment entry with code {$a->code} tiene nuevos ficheros asociados.';
$string['email_notifications_new_request'] = 'Hay una nueva solicitud de tranferencia con código {$a->code}';
$string['email_notifications_subject_attachments'] = 'Una solicitud de transferencia tiene nuevos ficheros';
$string['email_notifications_subject_confirm'] = 'Una solicitud de transferencia ha sido aprobada';
$string['email_notifications_subject_new'] = 'Nueva solicitud de transferencia';
$string['email_to_notify'] = 'Correo al que enviarle las notificaciones';
$string['file_already_uploaded'] = 'El fichero ya fue subido';
$string['file_uploaded'] = 'Fichero subido';
$string['gatewaydescription'] = 'Bank es una pasarela que permite procesar transacciones de forma manual.';
$string['gatewayname'] = 'Transferencia bancaria';
$string['hasfiles'] = 'Tiene ficheros';
$string['instructionstext'] = 'Instrucciones que se muestran antes de aceptar el pago por transferencia';
$string['internalerror'] = 'Ha ocurrido un error, por favor contacte con nosotros.';
$string['mail_confirm_pay'] = 'Estimado {$a->username}. Su pago por el concepto  "{$a->concept}" ha sido aceptado.';
$string['mail_confirm_pay_subject'] = 'Asunto del mail de confirmación.';
$string['mail_denied_pay'] = 'Estimado {$a->username}. Su pago por el concepto  "{$a->concept}" ha sido denegado.';
$string['mail_denied_pay_subject'] = 'Asunto del mail de denegación';
$string['manage'] = 'Gestionar transferencias';
$string['managepayments'] = 'Gestionar transferencias';
$string['max_number_of_files'] = 'Max número de ficheros';
$string['my_pending_payments'] = 'Mis transferencias pendientes';
$string['noentriesfound'] = 'No hay entradas';
$string['payments'] = 'Pagos';
$string['pending_payments'] = 'Transferencias pendientes';
$string['pluginname'] = 'Transferencia bancaria';
$string['pluginname_desc'] = 'El plugin permite realizar pagos en moodle por transferencia bancaria u otro método que se deba aprobar manualmente';
$string['postinstructionstext'] = 'Instrucciones que se muestran despues de solicitar el pago por transferencia';
$string['privacy:metadata'] = 'El plugin no almacena ningún dato personal';
$string['send_confirm_mail_to_support'] = 'Enviar un email cuando el pago es aprobado';
$string['send_confirmation_mail'] = 'Enviar email de confirmación';
$string['send_denied_mail'] = 'Enviar email de denegación';
$string['send_new_attachments_mail'] = 'Enviar un email cuando hay nuevos ficheros en una solicitud';
$string['send_new_request_mail'] = 'Enviar un email en cada nueva solicitud';
$string['start_process'] = 'Iniciar proceso';
$string['surcharge_info'] = 'Este método de pago tiene un recargo de {$a}.';
$string['the_price_is'] = 'El precio total es {$a}.';
$string['total_cost'] = 'Coste total';
$string['transfer_code'] = 'Código de transferencia';
$string['transfer_code_explanation'] = 'Este es el código a incluir en el código de la transferencia {$a}.';
$string['transfer_process_initiated'] = 'Proceso de transferencia iniciado';
