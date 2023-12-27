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
 * Strings for component 'enrol_autoenrol', language 'es', version '4.2'.
 *
 * @package     enrol_autoenrol
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['alwaysenrol'] = 'Inscribir siempre';
$string['alwaysenrol_help'] = 'Cuando se pone "Sí" los plugins siempre matricularán a los usuarios, aún cuando ellos ya hubieran accedido al curso mediante otro método.';
$string['auto'] = 'Automático';
$string['auto_desc'] = 'Este grupo ha sido creado automáticamente por el plugin Auto Enrol. Será eliminado si usted quita el plugin Auto Enrol del curso.';
$string['autoenrol:config'] = 'Configurar inscripciones automáticas';
$string['autoenrol:hideshowinstance'] = 'El usuario puede habilitar o deshabilitar instancias de automatrícula';
$string['autoenrol:manage'] = 'Gestionar usuarios autoinscritos';
$string['autoenrol:method'] = 'El usuario puede matricular a otros usuarios en el curso al entrar';
$string['autoenrol:unenrol'] = 'Usuario puede dar de baja usuarios automatriculados';
$string['autoenrol:unenrolself'] = 'Los usuarios pueden darse de baja a sí mismos si fueron matriculados en el acceso';
$string['autounenrolaction'] = 'Acción de darse de baja uno mismo';
$string['autounenrolaction_help'] = 'Seleccionar la actividad a realizar cuando  la regla de filtrado de usuarios ya no concuerde más. Por favor, tenga en cuenta que algunos datos de usuario y configuraciones se purgan del curso durante la desmatriculación del curso';
$string['availabilityplugins'] = 'Plugins de disponibilidad habilitados.';
$string['availabilityplugins_help'] = 'Seleccionar plugins de disponibilidad que pueden usarse en el filtro de usuarios de Automatrícula. Usar Ctrl+click o Cmd+click para selección múltiple.';
$string['cannotenrol'] = 'Usted no puede matricularse en este curso usando automatrícula.';
$string['checksync'] = 'Comprobar la sincronización a {$a} usuarios';
$string['config'] = 'Configuración';
$string['confirmbulkdeleteenrolment'] = '¿Está seguro de querer eliminar estas matrículas de usuario?';
$string['countlimit'] = 'Límite';
$string['countlimit_help'] = 'Esta instancia cuenta el número de matriculaciones que se realizan en un curso y permite detener la inscripción de usuarios una vez que se alcanza un cierto nivel. El ajuste predeterminado de 0 significa ilimitado.';
$string['customwelcomemessage'] = 'Mensaje de bienvenida personalizado';
$string['customwelcomemessage_help'] = 'Un mensaje personalizado de bienvenida puede ser añadido como texto plano o como formato Moodle-auto, incluyendo etiquetas HTML y etiquetas multilenguaje.

Los siguientes marcadores de posición pueden estar incluidos en el mensaje:

*Nombre del curso {$a->coursename}
*Enlace a la página del perfil del usuario {$a->profileurl}
*Enlace al curso {$a->link}
*Correo electrónico del usuario {$a->email}
*Nombre completo del usuario {$a->fullname}';
$string['defaultrole'] = 'Asignación de rol por defecto';
$string['defaultrole_desc'] = 'Seleccionar rol que será asignado a los usuarios durante las inscripciones automáticas';
$string['deleteselectedusers'] = 'Eliminar inscripciones seleccionadas de usuario';
$string['editselectedusers'] = 'Editar inscripciones seleccionadas de usuario';
$string['emptyfield'] = 'No {$a}';
$string['enrolenddate'] = 'Fecha de término';
$string['enrolenddate_help'] = 'Si está habilitado, los usuarios solamente estarán matriculados hasta esta fecha.';
$string['enrolme'] = 'Inscribirme';
$string['enrolperiod'] = 'Duración de la inscripción';
$string['enrolperiod_desc'] = 'Tiempo predeterminado que la inscripción es válida. Si se configura a cero, la duración de la inscripción será ilimitada de forma predeterminada.';
$string['enrolperiod_help'] = 'Tiempo predeterminado que la matrícula es válida, comenzando con el momento en que el usuario se matricula a sí mismo. Si está deshabiltado, la duración de la matrícula será ilimitada.';
$string['enrolstartdate'] = 'Fecha de inicio';
$string['enrolstartdate_help'] = 'Si se habilita, los usuarios estarán inscritos solamente a partir de esta fecha.';
$string['expiredaction'] = 'Acción al expirar la inscripción';
$string['expiredaction_help'] = 'Seleccionar acción a realizar cuando expira la matrícula del usuario. Por favor, tenga en cuenta que los datos y configuraciones de algunos usuarios se purgan del curso durante la desmatriculación del curso.';
$string['expirymessageenrolledbody'] = 'Estimado {$a->user}:

Esta es una notificación de que su inscripción en el curso "{$a->course}" expirará en {$a->timeend}.

Si necesita ayuda, por favor contacte con {$a->enroller}.';
$string['expirymessageenrolledsubject'] = 'Notificación de expiración de automatrícula';
$string['expirymessageenrollerbody'] = 'La automatrícula en el curso "{$a->course}" expirará en los siguientes {$a->threshold} para los siguientes usuarios:

{$a->users}

Para extender sus matrículas, vaya a {$a->extendurl}';
$string['expirymessageenrollersubject'] = 'Notificación de expiración de automatrícula';
$string['expirynotifyall'] = 'Profesor y usuario inscrito';
$string['expirynotifyenroller'] = 'Solamente profesor';
$string['filter'] = 'Permitir solamente';
$string['filter_help'] = 'Cuando se selecciona un enfoque de grupo, Usted puede usar este campo para filtrar qué tipo de usuario desea inscribir al curso. Por ejemplo: si agrupó por autenticación y filtró para solamente "manual", solamente los usuarios que hubieran sido registrados directamente en el sitio serían inscritos.';
$string['filtering'] = 'Filtrado de usuarios';
$string['g_auth'] = 'Método de Autenticación';
$string['g_dept'] = 'Departamento';
$string['g_email'] = 'Dirección Email';
$string['g_inst'] = 'Institución';
$string['g_lang'] = 'Idioma';
$string['g_none'] = 'Seleccionar...';
$string['general'] = 'General';
$string['groupname'] = 'Nombre del grupo';
$string['groupname_help'] = 'Cuando usted agrupa por Filtro de Usuario solamente será creado un grupo y este será el nombre del grupo.';
$string['groupon'] = 'Agrupar por';
$string['groupon_help'] = 'AutoInscribir puede añadir usuarios a un grupo automáticamente cuando son inscritos basados en uno de estos campos de usuario.';
$string['instancename'] = 'Etiqueta personalizada';
$string['instancename_help'] = 'Usted puede añadir una etiqueta personalizada paradejar bien claro lo que hace este método de inscripción. Esta opción es más útil cuando existen varias instancias de AutoInscripción en un curso.';
$string['loginenrol'] = 'Permitir inscripciones al ingresar al sitio';
$string['loginenrol_desc'] = 'Permitir inscripción al ingresar al sitio podría alentar el desempeño de su sitio. Como alternativa, usted puede usar el trabajo agendado para actualizar inscripciones para todos los cursos o el comando de la interfaz por línea de comandos para cursos específicos.';
$string['longtimenosee'] = 'Desmatricular inactivos después de';
$string['longtimenosee_help'] = 'Si los usuarios no han ingresado a un curso por un largo tiempo, entonces ellos son des-inscritos (dados de baja) automáticamente. Este parámetro especifica ese límite de tiempo.';
$string['m_confirmation'] = 'Confirmación en pantalla de inscripción';
$string['m_course'] = 'Cargando el curso';
$string['m_site'] = 'Registrando dentro del sitio';
$string['maxenrolled'] = 'Cantidad máxima de usuarios matriculados';
$string['maxenrolled_help'] = 'Especifica el número máximo de usuarios que se pueden autoinscribir. 0 significa ilimitado.';
$string['messageprovider:expiry_notification'] = 'Notificaciones de expiración de matrícula por automatrícula';
$string['method'] = 'Matricular cuando';
$string['method_help'] = 'Los usuarios poderosos pueden usar esta configuración para cambiar el comportamiento del plugin, de forma que los usuarios sean inscritos al curso al entrar al sitio, en lugar de esperar a que entren al curso. Esto es útil para cursos que deberían ser visibles por defecto en la lista de "mis cursos" de los usuarios.';
$string['newenrols'] = 'Permitir nuevas inscripciones';
$string['newenrols_desc'] = 'Permitir a usuarios automatricularse en cursos nuevos de forma predeterminada.';
$string['newenrols_help'] = 'Esta configuración determina si es que un usuario se puede inscribir en este curso.';
$string['nogroupon'] = 'No crear grupos';
$string['pluginname'] = 'Automatrícula';
$string['pluginname_desc'] = 'El módulo de inscripción automática permite una opción para que a los usuarios que han ingresado al sitio se les otorgue entrada a un curso y sean inscritos en él. Ésto es similar a permitir el acceso a invitados, pero los estudiantes quedarán permanentemente inscritos y por lo tanto, podrán participar en foros y actividades dentro del área.';
$string['pluginnotenabled'] = 'Plugin de automatrícula (Autoenrol) no habilitado';
$string['privacy:metadata:core_group'] = 'El plugin Autoenrol (Autoinscribir) puede crear nuevos grupos o usar grupos existentes para añadir participantes que concuerden con el filtro Autoenrol (Autoinscribir).';
$string['removegroups'] = 'Remover grupos';
$string['removegroups_desc'] = 'Cuando se elimina una instancia de inscripción, ¿debería de intentarse remover  a los grupos que haya creado?';
$string['role'] = 'Rol asignado en forma predtterminada';
$string['role_help'] = 'Los usuarios poderosos pueden usar esta configuración para cambiar el nivel de permiso al que los usuarios son inscritos,';
$string['selfunenrol'] = 'Habilitar auto des-inscribir';
$string['selfunenrol_desc'] = 'Permitirle a los usuarios des-inscribirse (darse de baja) de forma predeterminada en nuevas instancias de Autoinscripción';
$string['selfunenrol_help'] = 'Cuando se configura a Si, los usuarios pueden des-inscribirse ellos mismos.';
$string['sendcoursewelcomemessage'] = 'Mandar mensaje de BienVenida al curso';
$string['sendcoursewelcomemessage_help'] = 'Cuando un usuario es auto-inscrito en el curso, se le puede enviar un mensaje de BienVenida. Si se envía desde el contacto del curso (por defecto el profesor), y más de un usuario tienen este rol, el Email es enviado desde el primer usuario que tenga este rol asignado.';
$string['sendexpirynotificationstask'] = 'Trabajo de enviar notificación de expiración de la inscripción de Autoinscripción';
$string['softmatch'] = 'Coincidencia Suave';
$string['softmatch_help'] = 'Cuando se habilita, AutoInscripción inscribirá a un usuario cuando coincida parcialmente con el valor de "Permitir Solamente" en lugar de requirir una coincidencia exacta. Las coincidencias suaves también son sensibles a MAY/minúsculas. El valor de "Filtrar por" será usado para el nombre del grupo.';
$string['status'] = 'Permitir inscripciones existentes';
$string['status_desc'] = 'Habilitar método de Autoinscripción en cursos nuevos';
$string['status_help'] = 'Si se activa junto con \'Permitir nuevas inscripciones\' deshabilitado, solamente los usuarios que Autoinscribieron previamente pueden acceder al curso. Si está deshabilitado, este método de Autoinscripción estará efectivamente deshabilitado, dado que todas las Autoinscripciones están suspendidas y los nuevos usuarios no se pueden Autoinscribir.';
$string['syncenrolmentstask'] = 'Trabajo de Sincronizar Autoinscripción';
$string['syncexpirationstask'] = 'Trabajo de comprobar expiración de Autoinscripción';
$string['unenrolselfconfirm'] = '¿Realmente desea des-inscribirse (darse de baja) a sí mismo del curso "{$a}"? Usted puede volver a visitar el curso para volverse a inscribir, pero se perderá la información de sus calificaciones y envíos de tareas.';
$string['unenrolusers'] = 'Des-inscribir usuarios';
$string['userfilter'] = 'Filtro de Usuario';
$string['userfilter_help'] = 'Cuando se activa, Autoinscripción inscribirá usuarios solamente cuando coincidan con las reglas.';
$string['warning'] = '¡Precaución!';
$string['warning_message'] = 'Al añadir este plugin a su curso le permitirá a cualquier usuario registrado de Moodle accesar a su curso. Solamente instale este plugin si quiere permitir acceso abierto a su curso para usuarios que hayan entrado al sitio.';
$string['welcomemessage'] = 'Mensaje de BienVenida';
$string['welcometocourse'] = 'BenVenido/a a {$a}';
