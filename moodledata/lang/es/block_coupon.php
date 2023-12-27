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
 * Strings for component 'block_coupon', language 'es', version '4.2'.
 *
 * @package     block_coupon
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['action:coupon:delete'] = 'Borrar cupón';
$string['action:coupon:delete:confirm'] = '¿Está seguro que desea eliminar este cupón? ¡No se podrá deshacer!';
$string['action:error:delete'] = 'Error al borrar';
$string['and'] = 'y';
$string['batchidselect'] = 'ID del lote';
$string['blockname'] = 'Cupón';
$string['button:continue'] = 'Continuar';
$string['button:next'] = 'Siguiente';
$string['button:save'] = 'Generar cupones';
$string['button:submit_coupon_code'] = 'Enviar cupón';
$string['cleanup:confirm:confirmmessage'] = 'Si, deseo eliminar los cupones con estas opciones';
$string['cleanup:confirm:header'] = 'Por favor confirme las siguientes opciones de limpieza';
$string['cohort'] = 'cohorte';
$string['confirm_coupons_sent_body'] = 'Hola,<br /><br />

Te informamos que todos los cupones creados por ti el {$a->timecreated} han sido enviados.<br /><br />

Saludos cordiales,<br /><br />

Administrador';
$string['confirm_coupons_sent_subject'] = 'Todos los cupones han sido enviados';
$string['coupon:addinstance'] = 'Añadir un nuevo bloque de Cupones';
$string['coupon:administration'] = 'Administrar el bloque de Cupones';
$string['coupon:claim:wronguser'] = 'No puedes reclamar un cupón que <i>no</i> es tuyo';
$string['coupon:cleanup:heading'] = 'Eliminar cupones';
$string['coupon:cleanup:info'] = 'Utiliza este formulario para configurar los cupones a eliminar.<br/>
<b>Aviso:</b> Este proceso <i>eliminará</i> cupones del sistema. No hay forma de revertir esto.';
$string['coupon:deleted'] = 'El cupón ha sido eliminado';
$string['coupon:extendenrol'] = 'Cupones de extensión de matriculación';
$string['coupon:extendenrolments'] = 'Generar cupones para extender matriculación a cursos';
$string['coupon:extenrol:summary'] = 'Tipo de cupón: {$a->coupontype}<br/>
Cantidad de cupones a generar: {$a->amount}<br/>
Fondo de los cupones: {$a->logo}<br/>
Cupones generados por: {$a->owner}<br/>
Seleccionar curso(s): {$a->courses}<br/>
Validez: {$a->duration}<br/>
Enviar cupones el: {$a->senddate}<br/>
Enviar cupones a: {$a->recipient}<br/><br/>
Cuerpo del email: {$a->emailbody}<br/>';
$string['coupon:generatecoupons'] = 'Generar un nuevo cupón';
$string['coupon:inputcoupons'] = 'Use un cupón para matricularse';
$string['coupon:myaddinstance'] = 'Añadir un nuevo bloque de Cupones en la página Mi Moodle';
$string['coupon:send:fail'] = '¡Falló el envío del e-mail! Causa: {$a}';
$string['coupon:senddate:instant'] = 'Inmediato';
$string['coupon:timeframe'] = 'Tipo';
$string['coupon:type'] = 'Tipo';
$string['coupon:type:all'] = 'Todos';
$string['coupon:type:cohort'] = 'Matriculación de cohorte';
$string['coupon:type:course'] = 'Matriculación al curso';
$string['coupon:type:enrolext'] = 'Extensión de matriculación';
$string['coupon:used'] = 'Eliminación';
$string['coupon:used:all'] = 'Todos los cupones';
$string['coupon:used:no'] = 'Solo cupones no usados';
$string['coupon:used:yes'] = 'Solo cupones usados';
$string['coupon:user:heading'] = 'Configuración de usuario para {$a->firstname} {$a->lastname}';
$string['coupon:user:info'] = 'Use el formulario de abajo para configurar las opciones y los cursos  accesibles para los que este usuario puede pedir cupones';
$string['coupon:viewallreports'] = 'Ver informe de Cupones (para todos los cupones)';
$string['coupon:viewreports'] = 'Ver informe de Cupones (para mis propios cupones)';
$string['coupon_mail_content'] = 'Estimado {$a->to_name},<br /><br />

Le informamos que se han generado nuevo cupones, los cuales adjuntamos en este mensaje.<br /><br />

Un cordial saludo,<br /><br />

{$a->from_name}';
$string['coupon_mail_subject'] = 'Cupón generado';
$string['coupon_notification_subject'] = '¡Cupones generados!';
$string['coupons:cleaned'] = 'Se han limpiado / eliminado un total de {$a} cupones';
$string['coupons_ready_to_send'] = 'Su cupón(es) ha(n) sido generado(s) y será(n) enviado(s) en la fecha indicada.<br />
Recibirá una notificación por email cuando todos los cupones hayan sido enviados.';
$string['coupons_sent'] = 'Su(s) cupón(es) han sido generados. En unos minutos recibirá un email con los cupones adjuntos.';
$string['course'] = 'curso';
$string['days_access'] = '{$a} días de';
$string['default-coupon-page-template-botleft'] = '<ol>
<li>Regístrese en {site_url}</li>
<li>Recibirá un email de confirmación. Haga click en el link enviado para activar su cuenta.</li>
<li>Introduzca su cupón en el Área personal</li>
<li>¡Disfrute del curso!</li>
</ol>';
$string['default-coupon-page-template-botright'] = '<ol>
<li>Acceda con su usuario al sitio {site_url}</li>
<li>Introduzca su código de cupón en el bloque de Cupones</li>
<li>¡Buen curso!</li>
</ol>';
$string['default-coupon-page-template-main'] = 'Con este cupón podrá activar su acceso exclusivo al curso:<br/>
{courses}<br/><br/>
Por favor, use el siguiente código para activar el acceso<br/>
{coupon_code}';
$string['delete:request:confirmmessage'] = 'Quiero eliminar esta solicitud';
$string['delete:request:description'] = 'pendiente: debería estar basado en plantilla/renderizable';
$string['delete:request:header'] = 'Borrar mi solicitud de cupón';
$string['delete:request:title'] = 'Borrar mi solicitud de cupón';
$string['delete:requestuser:confirmmessage'] = 'Si, quiero eliminar este usuario';
$string['delete:requestuser:header'] = 'Eliminar solicitud de cupón para';
$string['download-sample-csv'] = 'Descargar archivo CSV de ejemplo';
$string['downloadcoupons:buttontext'] = 'Por favor haga clic para iniciar su descarga';
$string['enrolperiod:extension'] = 'para una duración de {$a}';
$string['enrolperiod:indefinite'] = '<i>Indefinido</i>';
$string['err:batchid'] = 'Ya existe este nombre de lote. Por favor elija otro nombre del lote o deje vacío este campo';
$string['err:codesize:left'] = 'Error de amaño del código: para {$a->want} cupones de {$a->size} caracteres tenemos {$a->left} espacios restantes (dadas las opciones de caracteres actuales)';
$string['err:coupon:generic'] = 'Algo salió mal. Por favor póngase en contacto con el administrador de sistemas';
$string['err:not-a-requestuser'] = 'Usted tiene derechos insuficientes para acceder a esta página';
$string['error:already-enrolled-in-cohorts'] = 'Usted ya ha sido inscrito en todas las cohortes';
$string['error:already-enrolled-in-courses'] = 'Usted ya ha sido inscrito en todos los cursos';
$string['error:alternative_email_invalid'] = 'Si Usted ha seleccionado \'usar Email alterno\' este campo debería contener una dirección Email válida.';
$string['error:alternative_email_required'] = 'Si Usted ha seleccionado \'usar Email alterno\' este campo es necesario.';
$string['error:cohort_sync'] = 'Ocurrió un error al tratar de sincronizar los cohortes. Por favor póngase en contacto con soporte.';
$string['error:coupon_already_used'] = 'Este código ya ha sido utilizado antes.';
$string['error:coupon_amount-recipients-both-set'] = 'Por favor, especifique un número de cupones a generar O una lista CSV de destinatarios.';
$string['error:coupon_amount-recipients-both-unset'] = 'Se debe configurar este campo O el campo de Destinatarios.';
$string['error:coupon_amount_too_high'] = 'Por favor, escriba una cantidad entre {$a->min} y {$a->max}.';
$string['error:coupon_reserved'] = 'El cupón con este código ha sido reservado para otro usuario';
$string['error:course-coupons-not-copied'] = 'Ocurrió un error al tratar de copiar coupon-courses a la nueva tabla de coupon_courses. Por favor póngase en contacto con soporte.';
$string['error:course-not-found'] = 'No pudo encontrarse el curso';
$string['error:invalid_coupon_code'] = 'No ha introducido un cupón válido.';
$string['error:invalid_email'] = 'Por favor, introduzca una dirección de email válida.';
$string['error:missing_cohort'] = 'El/los cohorte(s) enlazado(s) a este cupón no existe(n) más. Por favor póngase en contacto con soporte.';
$string['error:missing_course'] = 'El curso asociado a este cupón ya no existe.';
$string['error:missing_group'] = 'El/los grupo(s) enlazado(s) a este cupón no existe(n) más. Por favor póngase en contacto con soporte.';
$string['error:moodledata_not_writable'] = 'Su carpeta moodledata/coupon_logos no es escribible. Por favor corrija sus permisos.';
$string['error:myrequests:user'] = 'Usted no tiene permitido ejecutar esta solicitud a nombre de otra persona';
$string['error:no_coupons_submitted'] = 'Todavía no se ha usado ninguno de sus cupones.';
$string['error:nopermission'] = 'No tiene permiso para hacer esto';
$string['error:numeric_only'] = 'El campo debe ser numérico.';
$string['error:plugin_disabled'] = 'El plugin cohort_sync ha sido deshabilitado. Por favor póngase en contacto con soporte.';
$string['error:recipients-email-invalid'] = 'La dirección de Email {$a->email} es inválida. Por favor corríjala en el archivo CSV.';
$string['error:recipients-empty'] = 'Por fabvor ponga al menos un usuario.';
$string['error:recipients-extension'] = 'Usted solamente puede subir archivos .CSV';
$string['error:recipients-invalid'] = 'El archivo no pudo ser validado. ¿Está Usted seguro de que escribió las columnas y los separadores correctos?';
$string['error:recipients-max-exceeded'] = 'Su archivo CSV ha excedido el máximo de 10000 usuarios de cupón. Por favor limítelo.';
$string['error:required'] = 'Este campo es obligatorio.';
$string['error:sessions-expired'] = 'Su sesión ha caducado. Por favor inténtelo de nuevo.';
$string['error:unable_to_enrol'] = 'Ocurrió un eror al tratar de inscribirlo a Usted en elcurso nuevo. Por favor póngase en contacto con soporte.';
$string['error:wrong_code_length'] = 'Por favor escriba un número entre 6 y 32.';
$string['error:wrong_doc_page'] = 'Usted está tratando de acceder a una página que no existe.';
$string['error:wrong_image_size'] = 'El fondo subido no tiene el tamaño requerido. Por favor, suba una imagen con una proporción de 210 mm por 297 mm.';
$string['extendaccess'] = '{$a} extra';
$string['findcohortcourses:noselectionstring'] = 'aun no se hecho ninguna selección';
$string['findcohorts:noselectionstring'] = 'aun no se han seleccionado cohortes';
$string['findcohorts:placeholder'] = '... seleccionar cohorte(s) ...';
$string['findcourses'] = 'Cursos permitidos';
$string['findcourses:noselectionstring'] = 'aun no hay cursos seleccionados';
$string['findcourses:placeholder'] = '... seleccionar curso(s) ...';
$string['findusers:noselectionstring'] = 'aun no hay usuarios seleccionados';
$string['findusers:placeholder'] = '... seleccionar usuario ...';
$string['forcelogo_exp'] = '<i>Si está deshabilitada la selección del logotipo para este usuario, Usted <b>debe</b> seleccionar un logotipo por defecto en el menú desplegable para aplicar a todos los cupones solicitados por este usuario</i>';
$string['forcerole_exp'] = '<i>Si la selección de rol está deshabilitada para este usuario, Usted <b>necesita</b> seleccionar un rol por defecto a aplicar a todos los cupones solicitados por este usuario</i>';
$string['generator:export:mail:subject'] = 'Cupones listos para descargar';
$string['heading:administration'] = 'Gestionar';
$string['heading:amountForm'] = 'Configuracuiones de Cantidad';
$string['heading:cohortandvars'] = 'Seleccionar variables de cupón, cohorte(s) y de inscripción a curso';
$string['heading:cohortlinkcourses'] = 'Enlazar cursos a cohorte(s)';
$string['heading:coupon_type'] = 'Tipo de cupón';
$string['heading:courseandvars'] = 'Seleccionar variables de cupón, cursos(s) y de inscripción a curso';
$string['heading:coursegroups'] = 'Conectar grupos de curso a cursos seleccionados';
$string['heading:csvForm'] = 'Configuraciones CSV';
$string['heading:general_settings'] = 'Últimas configuraciones';
$string['heading:generatecoupons'] = 'Generar cupones';
$string['heading:generatormethod'] = 'Seleccionar el cómo desea generar los cupones';
$string['heading:imageupload'] = 'Subir imagen';
$string['heading:info'] = 'Información';
$string['heading:input_cohorts'] = 'Seleccionar cohorte(s)';
$string['heading:input_coupon'] = 'Ingresar cupón';
$string['heading:input_course'] = 'Seleccionar curso';
$string['heading:input_groups'] = 'Seleccionar grupos';
$string['heading:inputcoupons'] = 'Ingresar cupón';
$string['heading:label_instructions'] = 'Instrucciones';
$string['heading:manualForm'] = 'Configuraciones manuales';
$string['here'] = 'aquí';
$string['knowncourses'] = 'Cursos conocidos';
$string['label:alternative_email'] = 'Email alterno';
$string['label:alternative_email_help'] = 'Mandar por defecto los cupones a esta dirección Email.';
$string['label:api_enabled'] = 'Habilitar API';
$string['label:api_enabled_desc'] = 'La API del cupón otorga la posibilidad de generar cupones desde un sistema externo.';
$string['label:api_password'] = 'Contraseña API';
$string['label:api_password_desc'] = 'La contraseña que puede ser usada para generar un cupón usando la API.';
$string['label:api_user'] = 'Usuario API';
$string['label:api_user_desc'] = 'El nombre_De_usuario que puede ser usado para generar un cupón usando la API.';
$string['label:batchid'] = 'Nombre del lote';
$string['label:buttonclass'] = 'Clase del botón/enlace';
$string['label:buttonclass_desc'] = 'elegir clase del botón; esto impacta la forma como los enlace son mostrados';
$string['label:cleanupage'] = '¿Antiguedad máxima?';
$string['label:cleanupage_help'] = 'Escriba la antiguedad máxima de un cupón no-usado antes de que sea removido';
$string['label:cohort'] = 'Cohorte';
$string['label:connected_courses'] = 'Curso(s) conectado(s)';
$string['label:coupon_amount'] = 'Cantidad de cupones';
$string['label:coupon_amount_help'] = 'Esta es la cantidad de cupones que serán generados. Por favor use este campo O el campo de destinatarios, pero no use ambos.';
$string['label:coupon_code'] = 'Código del Cupón';
$string['label:coupon_code_help'] = 'El código del cupón es el código único que está ligado a cada cupón individual. Usted puede encontrar este código en su cupón.';
$string['label:coupon_code_length'] = 'Longitud del código';
$string['label:coupon_code_length_help'] = 'Número de caracteres del código del cupón.';
$string['label:coupon_cohorts'] = 'Cohorte(s)';
$string['label:coupon_cohorts_help'] = 'Selccione una o más cohortes a las que se inscribirán sus usuarios.';
$string['label:coupon_connect_course'] = 'Añadir curso(s)';
$string['label:coupon_courses'] = 'Curso(s)';
$string['label:coupon_courses_help'] = 'Seleccione los cursos a donde serán inscritos sus usuarios.';
$string['label:coupon_email'] = 'Dirección Email';
$string['label:coupon_email_help'] = 'Esta es la dirección a donde se enviarán los cupones generados.';
$string['label:coupon_groups'] = 'Añadir grupo(s)';
$string['label:coupon_groups_help'] = 'Seleccione los grupos en los que Usted quiere que sean inscritos sus usuarios al inscribirlos a los cursos.';
$string['label:coupon_recipients'] = 'Destinatarios';
$string['label:coupon_recipients_help'] = 'Con este campo Usted puede subir un archivo CSV son usuarios.';
$string['label:coupon_recipients_txt'] = 'Destinatarios';
$string['label:coupon_recipients_txt_help'] = 'En este campo Usted puede hacer sus cambios finales al archivo CSV subido.';
$string['label:coupon_role'] = 'Rol';
$string['label:coupon_role_help'] = 'Seleccionar el rol con el cual serán configurados los cupones o dejarlo vacío para el valor configurado por defecto (usualmente estudiante).';
$string['label:coupon_type'] = 'Generar cupón(es) para';
$string['label:coupon_type_help'] = 'Los cupones serán generados basándose, ya sea en el curso o en uno o más cohortes.';
$string['label:current_image'] = 'Fondo actual del cupón';
$string['label:date_send_coupons'] = 'Fecha de envío';
$string['label:date_send_coupons_help'] = 'Fecha en la que los cupones serán enviados a los destinatarios.';
$string['label:defaultlogo'] = 'Logo por defecto';
$string['label:defaultlogo_help'] = 'Seleccionar el logo que será forzado en todos los cupones para este usuario';
$string['label:defaultrole'] = 'Rol por defecto';
$string['label:defaultrole_help'] = 'Este será el rol por defecto al cual serán asignados los usuarios cuando canjeen su cupón';
$string['label:displayinputhelp'] = 'Mostrar texto de ayuda al ingreso del cupón';
$string['label:displayinputhelp_help'] = 'Habilitar esta opción para mostrar un texto a los usuarios finales acerca del campo de entrada del cupón.';
$string['label:displayregisterhelp'] = 'Mostrar texto de ayuda para registro';
$string['label:email_body'] = 'Mensaje Email';
$string['label:email_body_help'] = 'El mensaje Email que será enviado a los destinatarios de los cupones.';
$string['label:enablecleanup'] = '¿Habilitar limpieza de cupones no-usados?';
$string['label:enablecleanup_help'] = 'Activar esta opción para limpiar (remover) cupones no-usados';
$string['label:enrolment_period'] = 'Período de inscripción';
$string['label:enrolment_period_help'] = 'Período en días que el usuario estará inscrito en los cursos. Si se configura a 0 no habrá fecha de término.';
$string['label:enrolment_perioddefault'] = 'Período de inscripción predeterminado';
$string['label:enter_coupon_code'] = 'Por favor, introduzca su código aquí';
$string['label:extendperiod'] = 'Período de inscripción';
$string['label:extendperiod:desc'] = 'Configurar debajo el período opcional de extensión. Si <i>no</i> estuviera habilitado o estuviera configurado a 0, la inscripción se volverá inscripción indefinida';
$string['label:font'] = 'Fuente utilizada en PDF';
$string['label:forceenableemailregistration'] = 'Forzar autoregistro via email.';
$string['label:forceenableemailregistration_help'] = 'Si está habilitado permitirá a la gente registrarse via autenticación por correo, por más que esté deshabilitado como método de autoregistro.';
$string['label:forcelogo'] = 'Logotipo forzado';
$string['label:forcelogo_help'] = 'Seleccionar el logotipo que será forzado a todos los cupones para este usuario';
$string['label:forcerole'] = 'Rol forzado';
$string['label:forcerole_help'] = 'Seleccionar el rol que será forzado a todos los cupones para este usuario';
$string['label:generate_pdfs'] = 'Generar PDFs separados';
$string['label:generate_pdfs_help'] = 'Usted puede seleccionar aquí si quiere recibir sus cupones como un solo archivo  o si prefiere cada cupón dentro de un archivo PDF separado.';
$string['label:generatecodesonly'] = 'Solamente generar códigos';
$string['label:image'] = 'Fondo del cupón';
$string['label:image_desc'] = 'Fondo a colocarse en los cupones generados';
$string['label:info_coupon_cohort_courses'] = 'Información en la página: Cursos de cohortes';
$string['label:info_coupon_cohorts'] = 'Información en la página: Seleccionar cohortes';
$string['label:info_coupon_confirm'] = 'Información en la página: Confirmar cupón';
$string['label:info_coupon_course'] = 'Información en la página:  Seleccionar curso';
$string['label:info_coupon_course_groups'] = 'Información en la página: Seleccionar grupos del curso';
$string['label:info_coupon_type'] = 'Información en la página: Seleccionar tipo de cupón';
$string['label:info_desc'] = 'La información mostrada arriba del formato.';
$string['label:info_imageupload'] = 'Información en la página: Subir imagen';
$string['label:logo'] = 'Logo/fondo del cupón';
$string['label:mailusers'] = 'Enviar cupones por Email a participantes seleccionados del curso.';
$string['label:max_coupons'] = 'Máximo de cupones';
$string['label:max_coupons_desc'] = 'Cantidad de cupones que pueden crearse en una ocasión.';
$string['label:no_courses_connected'] = 'No hay cursos conectados a esta cohorte';
$string['label:no_groups_selected'] = 'Todavía no hay grupos conectados a estos cursos.';
$string['label:personalsendpdf'] = '¿Enviar PDF con cupones personalizados?';
$string['label:redirect_url'] = 'URL redirección';
$string['label:redirect_url_help'] = 'El destino a donde serán enviados los usuarios después de que escriban sus códigos de cupones.';
$string['label:renderqrcode'] = '¿Usar Código QR?';
$string['label:renderqrcode_help'] = 'Habilitar o deshabilitar la opción para incluir códigos QR en el PDFs generado.';
$string['label:selected_cohort'] = 'Cohorte(s) seleccionada(s)';
$string['label:selected_courses'] = 'Cursos seleccionados';
$string['label:selected_groups'] = 'Grupo(s) seleccionado(s)';
$string['label:seperatepersonalcoupontab'] = '¿Añadir pestaña separada de cupón personalizado?';
$string['label:showform'] = 'Opciones del generador';
$string['label:type_cohorts'] = 'Inscripción en cohorte(s)';
$string['label:type_course'] = 'Inscripción a curso';
$string['label:use_alternative_email'] = 'Usar Email alterno';
$string['label:use_alternative_email_help'] = 'Cuando se activa, usará por defecto la dirección Email proporcionada en el campo de Email alterno.';
$string['label:useloginlayoutonsignup'] = '¿Usar el diseño de la página para \'ingreso al sitio\' en la inscripción interna?';
$string['label:users'] = 'Usuario(s)';
$string['logo:default'] = 'Logo por defecto';
$string['logo:none'] = 'No usar un logo';
$string['messageprovider:coupon_notification'] = 'Notificación generada por cupones';
$string['messageprovider:coupon_task_notification'] = 'Notificación de envío de cupones personales';
$string['missing_config_info'] = 'Ponga aquí su información adicional - a ser configurada en la configuración global del bloque.';
$string['othersettings'] = 'Otras configuraciones / opciones';
$string['page:generate_coupon.php:title'] = 'Generar cupones';
$string['page:generate_coupon_step_five.php:title'] = 'Generar cupones';
$string['page:generate_coupon_step_four.php:title'] = 'Generar cupones';
$string['page:generate_coupon_step_three.php:title'] = 'Generar cupones';
$string['page:generate_coupon_step_two.php:title'] = 'Generar cupones';
$string['page:unused_coupons.php:title'] = 'Cupones no usados';
$string['pdf-meta:keywords'] = 'Cupón Moodle';
$string['pdf-meta:subject'] = 'Cupón Moodle';
$string['pdf-meta:title'] = 'Cupón Moodle';
$string['pdf:titlename'] = 'Cupón Moodle';
$string['pdf_generated'] = 'Los cupones han sido anexados a este Email como archivos PDF.<br /><br />';
$string['pluginname'] = 'Cupón';
$string['preview-pdf'] = 'Previsualizar PDF';
$string['privacy:metadata:block_coupon'] = 'El bloque coupon almacena códigos de cupón/voucher y enlaces que los usuarios han empleado';
$string['privacy:metadata:block_coupon:claimed'] = 'Si es que el cupón fue reclamado';
$string['privacy:metadata:block_coupon:email_body'] = 'Contenido del Email de que un cupón (personal) es enviado, si es que lo fue';
$string['privacy:metadata:block_coupon:for_user_email'] = 'Dirección Email de la persona a quien es enviado un cupón (personal), si es que lo fue';
$string['privacy:metadata:block_coupon:for_user_gender'] = 'Género de la persona a quien es enviado un cupón (personal), si es que lo fue';
$string['privacy:metadata:block_coupon:for_user_name'] = 'Nombre de la persona a quien es enviado un cupón (personal), si es que lo fue';
$string['privacy:metadata:block_coupon:roleid'] = 'ID del rol a ser asignado / del cupón asignado';
$string['privacy:metadata:block_coupon:submission_code'] = 'Código de suscripción del cupón';
$string['privacy:metadata:block_coupon:timecreated'] = 'Hora en la cual el cupón es creado';
$string['privacy:metadata:block_coupon:timeexpired'] = 'Fecha de caducidad del cupón';
$string['privacy:metadata:block_coupon:timemodified'] = 'Hora en la cual el cupón fue modificado';
$string['privacy:metadata:block_coupon:userid'] = 'La clave de base de datos primaria del usuario Moodle';
$string['promo'] = 'Plugin de Cupón para Moodle';
$string['recipient:none'] = 'Nada/ninguno';
$string['recipient:selected:users'] = 'Usuarios seleccionados';
$string['remove-count'] = 'Esto eliminará <i>{$a}</i> cupón(es)';
$string['removecourse'] = 'Eliminar al curso \'{$a}\' de las opciones';
$string['report:cohorts'] = 'Cohorte';
$string['report:coupon_code'] = 'Código de suscripción';
$string['report:dateformat'] = '%d-%m-%Y %H:%M:%S';
$string['report:dateformatymd'] = '%d-%m-%Y';
$string['report:download-excel'] = 'Descargar cupones no-usados';
$string['report:enrolperiod'] = 'Propietario';
$string['report:for_user_email'] = 'Planeado para';
$string['report:for_user_name'] = 'Nombre del beneficiario';
$string['report:heading:action'] = 'Acción(es)';
$string['report:heading:cohortname'] = 'Cohorte(s)';
$string['report:heading:coupon'] = 'Cupón';
$string['report:heading:couponcode'] = 'Código usado';
$string['report:heading:coursename'] = 'Nombre del curso';
$string['report:heading:coursetype'] = 'Tipo del curso';
$string['report:heading:datecomplete'] = 'Fecha de terminación';
$string['report:heading:datestart'] = 'Fecha de inicio';
$string['report:heading:errormessage'] = 'Error';
$string['report:heading:errortype'] = 'Tipo';
$string['report:heading:grade'] = 'Calificación';
$string['report:heading:iserror'] = '¿Es error?';
$string['report:heading:status'] = 'Estatus';
$string['report:heading:timecreated'] = 'Fecha';
$string['report:heading:type'] = 'Tipo';
$string['report:heading:user'] = 'Usuario';
$string['report:immediately'] = 'Inmediatamente';
$string['report:issend'] = 'Está enviado';
$string['report:owner'] = 'Propietario';
$string['report:senddate'] = 'fecha de envío';
$string['report:status_completed'] = 'Curso completado';
$string['report:status_not_started'] = 'Cuarso todavía no iniciado';
$string['report:status_started'] = 'Curso iniciado';
$string['report:timeexpired'] = 'Caducidad';
$string['request:accept:custommessage'] = '<p>El comentario siguiente ha sido añadido para Usted: {$a}</p>';
$string['request:accept:heading'] = 'Aceptar esta solicitud de cupón';
$string['request:accept:subject'] = 'Solicitud de cupón aceptada';
$string['request:adduser:heading'] = 'Añadir un usuario que puede hacer solicitudesd de cupones';
$string['request:coupons'] = 'Solicitar cupones';
$string['request:deny:heading'] = 'Denegar esta solicitud de cupón';
$string['request:deny:subject'] = 'Solicitud de cupón denegada.';
$string['request:info'] = 'Solicitud para  {$a->amount} cupones';
$string['request:message'] = 'Mensaje al usuario';
$string['request:sendmessage'] = '¿Informarle al usuario?';
$string['select:logo'] = 'Seleccionar logo de plantilla';
$string['select:logo:desc'] = 'Seleccionar un logo de plantilla.<br/>Esto solamente será usado cuando un PDF será generado por cupones.';
$string['showform-amount'] = 'Quiero crear un número arbitrario de cupones';
$string['showform-csv'] = 'Quiero crear cupones usando un CSV con destinatarios';
$string['showform-manual'] = 'Quiero configurar manualmente los destinatarios';
$string['signup:login'] = 'Yo ya tengo una cuenta y quiero ingresar';
$string['str:inputhelp'] = 'Use el campo de ingreso inferior para ganar acceso a cursos si Usted recibió un código de cupón';
$string['str:mandatory'] = 'Obligatorio';
$string['str:optional'] = 'Optativo';
$string['str:request:add'] = 'Solicitar cupones';
$string['str:request:adduser'] = 'Añadir usuario';
$string['str:request:details'] = 'Mis detalles solicitados';
$string['str:signuphelp'] = 'Use el enlace inferior para crear una nueva cuenta  <i>con</i> un código de cupón si Usted recibió alguno pero todavía no tiene una cuenta activa';
$string['success:coupon_used'] = 'Cupón usado - Ahora puede Usted acceder al/a los curso(s)';
$string['success:uploadimage'] = 'Su nueva imagen del cupón ha sido subida.';
$string['tab:apidocs'] = 'Docs API';
$string['tab:cleaner'] = 'Limpieza';
$string['tab:downloadbatchlist'] = 'Archivos del lote';
$string['tab:errors'] = 'Reportes de error';
$string['tab:listrequests'] = 'Mis solicitudes';
$string['tab:maillog'] = 'Bitácora de E-mail';
$string['tab:personalcoupons'] = 'Cupones personalizados';
$string['tab:report'] = 'Reporte del progreso';
$string['tab:requests'] = 'Solicitudes de cupones';
$string['tab:requestusers'] = 'Solicitar cupón usuarios';
$string['tab:unused'] = 'Cupones no-usados';
$string['tab:used'] = 'Cupones usados';
$string['tab:wzcouponimage'] = 'Imagen de plantilla';
$string['tab:wzcoupons'] = 'Generar cupón(es)';
$string['task:cleanup'] = 'Limpieza de cupones antiguos no-usados';
$string['task:sendcoupons'] = 'Enviar cupones agendados';
$string['task:unenrolcohorts'] = 'Quitar inscripciones por cupones expiradas de cohortes';
$string['tasksettings'] = 'Configuraciones de tarea';
$string['textsettings'] = 'Configuraciones del texto';
$string['textsettings_desc'] = 'Aquí puede Usted configurar textos personalizados a mostrarse por varias pantallas asistentes para el generador de cupones';
$string['th:action'] = 'Acción(es)';
$string['th:batchid'] = 'Lote';
$string['th:claimedon'] = 'Reclamado en';
$string['th:cohorts'] = 'Cohorte';
$string['th:course'] = 'Curso';
$string['th:enrolperiod'] = 'Periodo_de_inscripción';
$string['th:for_user_email'] = 'Planeado por';
$string['th:fullname'] = 'Nombre completo';
$string['th:groups'] = 'grupo(s)';
$string['th:immediately'] = 'Inmediatamente';
$string['th:issend'] = '¿Enviados?';
$string['th:owner'] = 'Propietario';
$string['th:roleid'] = 'Rol';
$string['th:senddate'] = 'Fecha de envío';
$string['th:submission_code'] = 'Código de suscripción';
$string['th:tid'] = 'ID de la hora';
$string['th:timecreated'] = 'Creado en';
$string['th:usedby'] = 'Usado por';
$string['timeafter'] = 'Creado después de';
$string['timebefore'] = 'Crado antes de';
$string['unlimited_access'] = 'ilimitado';
$string['url:api_docs'] = 'Documentación de API';
$string['url:couponsignup'] = 'Preinscribirse con un código de cupón';
$string['url:generate_coupons'] = 'Generar Cupón';
$string['url:input_coupon'] = 'Ingresar Cupón';
$string['url:managelogos'] = 'Gestionar imágenes de cupón';
$string['url:uploadimage'] = 'Cambiar imagen del cupón';
$string['url:view_reports'] = 'Ver reportes';
$string['url:view_unused_coupons'] = 'Ver cupones no-usados';
$string['userconfig:allowselectenrolperiod'] = 'Permitir selección del período de inscripción';
$string['userconfig:allowselectlogo'] = 'Permitir selección del logo del cupón';
$string['userconfig:allowselectqr'] = 'Permitir selección de inclusión de código QR';
$string['userconfig:allowselectrole'] = 'Permitir selección de rol';
$string['userconfig:allowselectseperatepdf'] = 'Permitir selección de habilidad de generar PDFs separados';
$string['userconfig:default'] = 'Configuraciones por defecto';
$string['userconfig:renderqrcode:default'] = 'Permitir inclusión de código QR por defecto';
$string['userconfig:seperatepdf:default'] = 'Permitir generación de PDFs separados por defecto';
$string['view:api:heading'] = 'API del Cupón';
$string['view:api:title'] = 'API del Cupón';
$string['view:api_docs:heading'] = 'Documentación del API del Cupón';
$string['view:api_docs:title'] = 'Documentación del API del Cupón';
$string['view:cleanup:heading'] = 'Limpiar cupones';
$string['view:cleanup:title'] = 'Limpiar cupones';
$string['view:download:heading'] = 'Descargar sus cupones';
$string['view:download:title'] = 'Descargar cupones';
$string['view:downloadbatches:title'] = 'Archivos descargables del lote';
$string['view:errorreport:heading'] = 'Reporte - Errores de cupón';
$string['view:errorreport:title'] = 'Reporte - Errores de cupón';
$string['view:extendenrolment:heading'] = 'Cupón: extensiones de inscripción';
$string['view:extendenrolment:title'] = 'Cupón: extensiones de inscripción';
$string['view:extendenrolment_step1:heading'] = 'Extender inscripciones: seleccionar cursos(s)';
$string['view:extendenrolment_step1:title'] = 'Extender inscripciones: seleccionar cursos(s)';
$string['view:extendenrolment_step2:heading'] = 'Extender inscripciones: seleccionar usuario(s)';
$string['view:extendenrolment_step2:title'] = 'Extender inscripciones: seleccionar usuario(s)';
$string['view:extendenrolment_step3:heading'] = 'Extender inscripciones: confirmar';
$string['view:extendenrolment_step3:title'] = 'Extender inscripciones: confirmar';
$string['view:generate_coupon:heading'] = 'Generar Cupón';
$string['view:generate_coupon:title'] = 'Generar Cupón';
$string['view:generator:cohort:heading'] = 'Generar cupón(es) para cohorte';
$string['view:generator:cohort:title'] = 'Generar cupón(es) para cohorte';
$string['view:generator:course:heading'] = 'Generar cupón(es) para curso';
$string['view:generator:course:title'] = 'Generar cupón(es) para cohorte';
$string['view:input_coupon:heading'] = 'Ingresar Cupón';
$string['view:input_coupon:title'] = 'Ingresar Cupón';
$string['view:reports-maillog:heading'] = 'Bitácora del E-mail';
$string['view:reports-maillog:title'] = 'Bitácora del E-mail';
$string['view:reports-personal:heading'] = 'Reporte - Cupones Personalizados';
$string['view:reports-personal:title'] = 'Reporte - Cupones Personalizados';
$string['view:reports-unused:heading'] = 'Reporte - Cupones no-usados';
$string['view:reports-unused:title'] = 'Reporte - Cupones no-usados';
$string['view:reports-used:heading'] = 'Reporte - Cupones usados';
$string['view:reports-used:title'] = 'Reporte - Cupones usados';
$string['view:reports:heading'] = 'Reporte - Progreso basado en Cupones';
$string['view:reports:title'] = 'Reporte - Progreso basado en Cupones';
$string['view:request:heading'] = 'Solicitar cupones';
$string['view:request:title'] = 'Solicitar cupones';
$string['view:requests:admin:heading'] = 'Administración de solicitud de cupón';
$string['view:requests:admin:title'] = 'Administración de solicitud de cupón';
$string['view:uploadimage:heading'] = 'Subir un nuevo fondo del cupón';
$string['view:uploadimage:title'] = 'Subir fondo del cupón';
$string['view:userrequest:heading'] = 'Mis solicitudes de cupón';
$string['view:userrequest:title'] = 'Mis solicitudes de cupón';
$string['with-names'] = 'Con los siguientes nombres o identificadores';
