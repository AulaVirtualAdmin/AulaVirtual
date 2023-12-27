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
 * Strings for component 'enrol_gwpayments', language 'es', version '4.2'.
 *
 * @package     enrol_gwpayments
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['assignrole'] = 'Asignar rol';
$string['backtolist'] = 'Volver al resumen';
$string['checkcode'] = 'Comprobar código del cupón';
$string['cost'] = 'Precio de matrícula';
$string['costerror'] = 'El precio debe definirse como un valor numérico/de coma flotante';
$string['coupon:add'] = 'Añadir un nuevo cupón';
$string['coupon:delete'] = 'Eliminar cupón';
$string['coupon:delete:warn'] = '<p>Estás a punto de eliminar un cupón con los siguientes datos.</p>
<p>Curso: <i>{$a->course}</i><br/>Código del cupón: <i>{$a->code}</i><br/>Validez: <i>{$a->validfrom} - {$a->validto}</i></p>
<p>¿Estás seguro de que deseas eliminarlo?</p>';
$string['coupon:deleted'] = 'Cupón eliminado correctamente';
$string['coupon:details'] = 'Datos del cupón';
$string['coupon:edit'] = 'Editar un cupón existente';
$string['coupon:expired'] = 'El código del cupón ha caducado';
$string['coupon:invalid'] = 'Código de cupón no válido';
$string['coupon:newprice'] = 'Descuento: {$a->currency} {$a->discount} ({$a->percentage})<br/>Nuevo precio: <b>{$a->currency} {$a->newprice}</b>';
$string['coupon:saved'] = 'Cupón añadido correctamente';
$string['coupon:status:active'] = 'ACTIVO';
$string['coupon:status:expired'] = 'CADUCADO';
$string['coupon:status:impending'] = 'INMINENTE';
$string['coupon:status:maxused'] = 'AGOTADO';
$string['coupon:updated'] = 'Datos del cupón actualizados correctamente';
$string['couponcode'] = 'Código del cupón';
$string['couponcodeexists'] = 'El código del cupón ya existe';
$string['couponcodemissing'] = 'Debe indicarse un código de cupón';
$string['coupons:disabled'] = 'El uso de cupones se ha desactivado para esta matrícula';
$string['coupons:manage'] = 'Gestionar cupones';
$string['coupontype'] = 'Tipo';
$string['coupontype:percentage'] = 'Porcentaje';
$string['coupontype:value'] = 'Valor';
$string['currency'] = 'Moneda';
$string['defaultrole'] = 'Rol asignado por defecto';
$string['defaultrole_help'] = 'Seleccione el rol que debe asignarse a los usuarios en la matrícula realizada en la pasarela de pago';
$string['enablebypassinggateway'] = '¿Se permite la omisión de pasarelas de pago?';
$string['enablebypassinggateway_help'] = 'Cuando se activa, esto evitará completamente las pasarelas de pago siempre que el precio (descontado) sea cero. Muchas PSP no pueden hacer frente a un pago con valor cero.
Debido a que no todas las implementaciones de pasarelas de pago serán capaces de eludir el intento de realizar un pago con valor cero, sino que devolverán un error, este ajuste puede habilitarse para proporcionar una solución.';
$string['enablecoupon'] = '¿Habilitar cupones?';
$string['enablecoupon_help'] = 'Marque esta opción para activar la introducción de cupones por defecto en la pantalla de pago.
Puede activarla o desactivarla en cada instancia de matrícula.';
$string['enrol:already'] = 'Ya se ha matriculado en el curso: {$a->fullname}';
$string['enrol:fail'] = 'No se ha matriculado en este curso.';
$string['enrol:invalid'] = 'Registro de matrícula no válido.';
$string['enrol:ok'] = 'Muchas gracias por su compra.<br> Ha sido matriculado en el curso: {$a->fullname}';
$string['enrolenddate'] = 'Fecha límite';
$string['enrolenddate_help'] = 'Si está activada, los usuarios solo pueden matricularse hasta esta fecha.';
$string['enrolenddaterror'] = 'La fecha límite de la matrícula no puede ser anterior a la fecha de inicio';
$string['enrolfreepass'] = 'Te has matriculado de forma gratuita en el curso.';
$string['enrolperiod'] = 'Duración de la matrícula';
$string['enrolperiod_help'] = 'Duración de la validez de la matrícula, a partir del momento en que se inscribe el usuario. Si se desactiva, la duración de la matrícula será ilimitada.';
$string['enrolstartdate'] = 'Fecha de inicio';
$string['enrolstartdate_help'] = 'Si está activada, los usuarios solo se podrán matricular a partir de esta fecha.';
$string['entiresite'] = 'Todo el sitio / cualquier curso';
$string['err:percentage-exceed'] = 'El porcentaje de descuento no puede superar el 100%';
$string['err:percentage-negative'] = 'El porcentaje de descuento no puede ser negativo';
$string['err:value-negative'] = 'El descuento no puede ser negativo';
$string['errorvatabove100'] = 'El IVA no puede superar el 100%';
$string['errorvatbelow0'] = 'El IVA no puede ser inferior a 0%';
$string['event:order:delivered'] = 'Pedido entregado/matrícula creada';
$string['expiredaction'] = 'Acción de vencimiento de la matrícula';
$string['expiredaction_help'] = 'Seleccione la acción que se llevará a cabo cuando caduque la matrícula del usuario. Tenga en cuenta que algunos datos y ajustes del usuario se eliminan del curso al cancelar la matrícula.';
$string['expirymessageenrolledbody'] = 'Estimado {$a->user}:

Esta es una notificación de que su matrícula en el curso \'{$a->course}\' caduca el {$a->timeend}.

Si necesita ayuda, póngase en contacto con {$a->enroller}.';
$string['expirymessageenrolledsubject'] = 'Notificación de vencimiento de la matrícula';
$string['expirymessageenrollerbody'] = 'La matrícula en el curso \'{$a->course}\' caducará dentro del próximo {$a->umbral} para los siguientes usuarios:

{$a->users}

Para ampliar su matrícula, vaya a {$a->extendurl}.';
$string['expirymessageenrollersubject'] = 'Notificación de vencimiento de la matrícula';
$string['findcourses:noselectionstring'] = 'aún no se ha seleccionado ningún curso';
$string['findcourses:placeholder'] = '... seleccione curso(s) ...';
$string['gwpayments:config'] = 'Configurar matrícula con \'gwpayment\'';
$string['gwpayments:createcoupon'] = 'Crear códigos de cupón para matrículas con gwpayment';
$string['gwpayments:deletecoupon'] = 'Eliminar códigos de cupón para matrículas con gwpayment';
$string['gwpayments:editcoupon'] = 'Editar códigos de cupón para matrículas con gwpayment';
$string['gwpayments:manage'] = 'Gestionar matrículas con gwpayment';
$string['gwpayments:unenrol'] = 'Bajas de matrículas con gwpayment';
$string['gwpayments:unenrolself'] = 'Bajas autorealizadas para matrículas con gwpayment';
$string['mailadmins'] = 'Notificar al administrador';
$string['mailstudents'] = 'Notificar a los estudiantes';
$string['mailteachers'] = 'Notificar a los profesores';
$string['maxusage'] = 'Uso máximo';
$string['maxusage_help'] = 'Número máximo de veces que se puede utilizar este código de cupón.<br/>
Si se introduce 0, significa uso ilimitado.';
$string['nocost'] = 'La matrícula a este curso es gratuita!';
$string['paymentaccount'] = 'Cuenta de pago';
$string['paymentaccount_help'] = 'Las tasas de las matrćulas se abonarán en esta cuenta.';
$string['percentage'] = 'Porcentaje';
$string['percentagemissing'] = 'Se debe indicar el porcentaje';
$string['pluginname'] = 'Matrícula con PaymentS';
$string['pluginname_help'] = 'Este plugin permite comprar un curso con las pasarelas de pago principales de Moodle, e incorpora opciones  para aplicar descuentos basados en cupones/vales';
$string['privacy:metadata'] = 'El plugin de matrícula con pago no almacena ningún dato personal.';
$string['promo'] = 'Plugin matrícula con PaymentS para Moodle';
$string['promodesc'] = 'Este plugin ha sido desarrollado por Sebsoft Managed Hosting & Software Development
(<a href=\'https://www.sebsoft.nl/\' target=\'_new\'>https://sebsoft.nl</a>).<br /><br />
{$a}<br /><br />';
$string['purchasedescription'] = 'Matrícula en el curso {$a}';
$string['sendpaymentbutton'] = 'Seleccione el tipo de pago';
$string['status'] = 'Permitir pagos a través de pasarela';
$string['status_help'] = 'Permitir que por defecto los usuarios utilicen pasarelas de pago para matricularse en un curso.';
$string['task:defaulttasks'] = 'Tareas predeterminadas';
$string['task:sendexpirynotifications'] = 'La matrícula con PaymentS envía notificaciones de caducidad de tarea';
$string['th:action'] = 'Accion(es)';
$string['th:code'] = 'Código';
$string['th:cost'] = 'Coste';
$string['th:courseid'] = 'Curso';
$string['th:discount'] = 'Descuento';
$string['th:maxusage'] = 'Uso máximo';
$string['th:numused'] = '#Usado';
$string['th:paymentcreated'] = 'Transacción iniciada';
$string['th:paymentmodified'] = 'Última actualización';
$string['th:percentage'] = 'Porcentaje';
$string['th:rawcost'] = 'Precio del curso';
$string['th:status'] = 'Estado';
$string['th:txid'] = 'ID de transacción';
$string['th:type'] = 'Tipo';
$string['th:user'] = 'Usuario';
$string['th:validfrom'] = 'Válido desde';
$string['th:validto'] = 'Válido hasta';
$string['th:value'] = 'Valor';
$string['unenrolselfconfirm'] = '¿Confirma que desea darse de baja del curso "{$a}"?';
$string['validfrom'] = 'Válido desde';
$string['validfromhigherthanvalidto'] = 'La fecha de inicio de la validez es posterior a la fecha de fin';
$string['validfrommissing'] = 'Debe establecerse la fecha de inicio de la validez';
$string['validto'] = 'Válido hasta';
$string['validtomissing'] = 'Debe establecerse la fecha de fin de la validez';
$string['value'] = 'Valor';
$string['valuemissing'] = 'Debe indicarse un valor';
$string['vat'] = 'IVA';
$string['vat_help'] = 'Porcentaje de IVA sobre el coste del curso (nota: el coste del curso incluye el IVA).';
$string['warn:zeropayment'] = 'Nota: al usar códigos de descuento que conducen a un pago final de cero, por ejemplo, cuando utilice un descuento del 100%, debe tener en cuenta que no todas las implementaciones de pasarelas de pago
pueden gestionarlo. Es muy probable que finalmente termine con un error del proveedor de servicios de pago.
Para evitar esto, usted o el administrador de sistemas <i>pueden</i> habilitar la omisión de las pasarelas de pago pagos \'cero\' (a través de la configuración global del plugin). La matricula se procesará, pero <i>sin</i> una identificación de pago válida (usaremos un valor 0 como identificación de pago).';
