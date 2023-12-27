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
 * Strings for component 'tool_lifecycle', language 'es', version '4.2'.
 *
 * @package     tool_lifecycle
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['abortdisableworkflow'] = 'Deshabilite el flujo de trabajo (procesos abortados, ¡tal vez inseguros!)';
$string['abortdisableworkflow_confirm'] = 'El flujo de trabajo se deshabilitará y se cancelarán todos los procesos en ejecución de este flujo de trabajo. ¿Está seguro?';
$string['abortprocesses'] = 'Abort running processes (maybe unsafe!)';
$string['abortprocesses_confirm'] = 'Cancelar procesos en ejecución (¡quizás inseguros!)';
$string['activateworkflow'] = 'Activar';
$string['active_automatic_workflows_heading'] = 'Flujos de trabajo automáticos activos';
$string['active_manual_workflows_heading'] = 'Flujos de trabajo manuales activos';
$string['active_processes_list_header'] = 'Procesos activos';
$string['active_workflow_not_changeable'] = 'The workflow instance was already activated. It is not possible to change any of its steps anymore.';
$string['active_workflow_not_removeable'] = 'La instancia de flujo de trabajo ya estaba activada. Ya no es posible cambiar ninguno de sus pasos.';
$string['active_workflows_list'] = 'Enumerar flujos de trabajo activos y definiciones de flujo de trabajo';
$string['add_new_step_instance'] = 'Agregar nueva instancia de paso...';
$string['add_new_trigger_instance'] = 'Agregar nueva instancia de activación...';
$string['add_workflow'] = 'Agregar flujo de trabajo';
$string['adminsettings_edit_step_instance_heading'] = 'Instancia de paso para el flujo de trabajo \'{$a}\'';
$string['adminsettings_edit_trigger_instance_heading'] = 'Activador para el flujo de trabajo \'{$a}\'';
$string['adminsettings_edit_workflow_definition_heading'] = 'Definición de flujo de trabajo';
$string['adminsettings_heading'] = 'Configuración del flujo de trabajo';
$string['adminsettings_workflow_definition_steps_heading'] = 'Pasos del flujo de trabajo';
$string['all_delays'] = 'Todos los retrasos';
$string['anonymous_user'] = 'Anonymous User';
$string['apply'] = 'Aplicar';
$string['backupcreated'] = 'Creado en';
$string['backupworkflow'] = 'Flujo de trabajo de copia de seguridad';
$string['cannot_trigger_workflow_manually'] = 'El flujo de trabajo solicitado no se pudo activar manualmente';
$string['config_backup_path'] = 'Ruta de la carpeta de copia de seguridad del ciclo de vida';
$string['config_backup_path_desc'] = 'Esta configuración define la ubicación de almacenamiento de las copias de seguridad creadas por el paso de copia de seguridad.
La ruta debe especificarse como una ruta absoluta en su servidor.';
$string['config_delay_duration'] = 'Default duration of a course delay';
$string['config_delay_duration_desc'] = 'Esta configuración define la duración del retraso predeterminado de un flujo de trabajo
en caso de que uno de sus procesos se revierta o finalice.
La duración de la demora determina cuánto tiempo se exceptuará un curso de ser procesado nuevamente en cualquiera de los casos.';
$string['course_backups_list_header'] = 'Copias de seguridad del curso';
$string['coursename'] = 'Nombre del curso';
$string['date'] = 'Fecha de vencimiento';
$string['deactivated_workflows_list'] = 'Lista de flujos de trabajo desactivados';
$string['deactivated_workflows_list_header'] = 'Flujos de trabajo desactivados';
$string['delayed_courses_header'] = 'Cursos retrasados';
$string['delayed_for_workflow_until'] = 'Retrasado para "{$a->name}" hasta {$a->date}';
$string['delayed_for_workflows'] = 'Retrasado para {$a} flujos de trabajo';
$string['delayed_globally'] = 'Retrasado globalmente hasta {$a}';
$string['delayed_globally_and_seperately'] = 'Retrasado globalmente y por separado para {$a} flujos de trabajo';
$string['delayed_globally_and_seperately_for_one'] = 'Retrasado globalmente y por separado para 1 flujo de trabajo';
$string['delays'] = 'Retrasos';
$string['delays_for_workflow'] = 'Retrasos para "{$a}"';
$string['delete_all_delays'] = 'Eliminar todos los retrasos';
$string['delete_delay'] = 'Eliminar retraso';
$string['deleteworkflow'] = 'Eliminar flujo de trabajo';
$string['deleteworkflow_confirm'] = 'El flujo de trabajo se eliminará. Esto no se puede deshacer. ¿Está seguro?';
$string['disableworkflow'] = 'Deshabilitar el flujo de trabajo (los procesos siguen ejecutándose)';
$string['disableworkflow_confirm'] = 'El flujo de trabajo se desactivará. ¿Está seguro?';
$string['download'] = 'Descargar';
$string['duplicateworkflow'] = 'Flujo de trabajo duplicado';
$string['editworkflow'] = 'Editar la configuración general';
$string['error_wrong_trigger_selected'] = 'Intentaste solicitar un disparador no manual.';
$string['followedby_none'] = 'Ninguno';
$string['general_config_header'] = 'General y subcomplementos';
$string['general_settings_header'] = 'Configuración general';
$string['globally'] = 'Retrasos globales';
$string['globally_until_date'] = 'Globalmente hasta {$a}';
$string['interaction_success'] = 'Acción guardada con éxito.';
$string['invalid_workflow'] = 'Configuración de flujo de trabajo no válida';
$string['invalid_workflow_cannot_be_activated'] = 'La definición del flujo de trabajo no es válida, por lo que no se puede activar.';
$string['invalid_workflow_details'] = 'Vaya a la vista de detalles para crear un disparador para este flujo de trabajo';
$string['lastaction'] = 'última acción en';
$string['lifecycle:managecourses'] = 'Puede administrar cursos en tool_lifecycle';
$string['lifecycle_cleanup_task'] = 'Elimine las entradas de retraso antiguas para los flujos de trabajo del ciclo de vida';
$string['lifecycle_task'] = 'Ejecutar los procesos del ciclo de vida';
$string['lifecyclestep'] = 'paso de proceso';
$string['lifecycletrigger'] = 'Desencadenar';
$string['manual_trigger_process_existed'] = 'Ya existe un flujo de trabajo para este curso.';
$string['manual_trigger_success'] = 'El flujo de trabajo se inició correctamente.';
$string['name_until_date'] = '"{$a->name}"hasta {$a->date}';
$string['nocoursestodisplay'] = '¡Actualmente no hay cursos que requieran su atención!';
$string['nointeractioninterface'] = '¡No hay interfaz de interacción disponible!';
$string['noprocessfound'] = 'No se pudo encontrar un proceso con el ID de proceso dado!';
$string['nostepfound'] = '¡No se pudo encontrar un paso con el stepid dado!';
$string['pluginname'] = 'Ciclo de Vida';
$string['plugintitle'] = 'Curso Ciclo de Vida';
$string['privacy:metadata:tool_lifecycle_action_log'] = 'Un registro de las acciones realizadas por los administradores del curso.';
$string['privacy:metadata:tool_lifecycle_action_log:action'] = 'Identificador de la acción que se realizó.';
$string['privacy:metadata:tool_lifecycle_action_log:courseid'] = 'ID del curso para el que se realizó la acción';
$string['privacy:metadata:tool_lifecycle_action_log:processid'] = 'ID del Proceso en el que se realizó la acción.';
$string['privacy:metadata:tool_lifecycle_action_log:stepindex'] = 'Índice del paso en el flujo de trabajo para el que se realizó la acción.';
$string['privacy:metadata:tool_lifecycle_action_log:time'] = 'Momento en que se realizó la acción.';
$string['privacy:metadata:tool_lifecycle_action_log:userid'] = 'ID del usuario que realizó la acción.';
$string['privacy:metadata:tool_lifecycle_action_log:workflowid'] = 'ID del flujo de trabajo en el que se realizó la acción.';
$string['process_proceeded_event'] = 'Se ha iniciado un proceso';
$string['process_rollback_event'] = 'Se ha revertido un proceso';
$string['process_triggered_event'] = 'Se ha desencadenado un proceso';
$string['restore'] = 'Restaurar';
$string['restore_step_does_not_exist'] = 'El paso {$a} no está instalado, pero está incluido en el archivo de copia de seguridad. Instálelo primero y vuelva a intentarlo.';
$string['restore_subplugins_invalid'] = 'Formato incorrecto del archivo de copia de seguridad. La estructura de los elementos del subcomplemento no es la esperada';
$string['restore_trigger_does_not_exist'] = 'El disparador {$a} no está instalado, pero está incluido en el archivo de copia de seguridad. Instálelo primero y vuelva a intentarlo.';
$string['restore_workflow_not_found'] = 'Formato incorrecto del archivo de copia de seguridad. No se pudo encontrar el flujo de trabajo.';
$string['show_delays'] = 'Tipo de vista';
$string['status'] = 'Estado';
$string['step'] = 'paso de proceso';
$string['step_delete'] = 'Borrar';
$string['step_edit'] = 'Editar';
$string['step_instancename'] = 'Nombre de instancia';
$string['step_instancename_help'] = 'Título de instancia de paso (visible solo para administradores).';
$string['step_settings_header'] = 'Ajustes específicos del tipo de paso';
$string['step_show'] = 'Mostrar';
$string['step_sortindex'] = 'Arriba/abajo';
$string['step_subpluginname'] = 'Nombre del subcomplemento';
$string['step_subpluginname_help'] = 'Subcomplemento de paso/título de activación (visible solo para administradores).';
$string['step_type'] = 'tipo';
$string['subplugintype_lifecyclestep'] = 'Paso dentro de un proceso de ciclo de vida';
$string['subplugintype_lifecyclestep_plural'] = 'Pasos dentro de un proceso de ciclo de vida';
$string['subplugintype_lifecycletrigger'] = 'Disparador para iniciar un proceso de ciclo de vida';
$string['subplugintype_lifecycletrigger_plural'] = 'Disparadores para iniciar un proceso de ciclo de vida';
$string['tablecourseslog'] = 'Acciones pasadas';
$string['tablecoursesremaining'] = 'Cursos restantes';
$string['tablecoursesrequiringattention'] = 'Cursos que requieren tu atención';
$string['tools'] = 'Herramientas';
$string['trigger'] = 'Activador';
$string['trigger_does_not_exist'] = 'No se pudo encontrar el activador solicitado.';
$string['trigger_enabled'] = 'Activado';
$string['trigger_instancename'] = 'Nombre de instancia';
$string['trigger_instancename_help'] = 'Título de instancia de activación (visible solo para administradores).';
$string['trigger_settings_header'] = 'Ajustes específicos del tipo de disparador';
$string['trigger_sortindex'] = 'Arriba/abajo';
$string['trigger_subpluginname'] = 'Nombre del subcomplemento';
$string['trigger_subpluginname_help'] = 'Subcomplemento de paso/título de activación (visible solo para administradores).';
$string['trigger_workflow'] = 'flujo de trabajo';
$string['upload_workflow'] = 'Cargar flujo de trabajo';
$string['viewheading'] = 'Administrar cursos';
$string['viewsteps'] = 'Ver pasos de flujo de trabajo';
$string['workflow'] = 'Ver pasos de flujo de trabajo';
$string['workflow_active'] = 'Activo';
$string['workflow_definition_heading'] = 'Definiciones de flujo de trabajo';
$string['workflow_delayforallworkflows'] = '¿Retraso para todos los flujos de trabajo?';
$string['workflow_delayforallworkflows_help'] = 'Si está marcada, las duraciones en la parte superior no solo retrasan la ejecución
de este flujo de trabajo para un curso, sino también para todos los demás flujos de trabajo. Así, hasta que transcurra el tiempo no se podrá iniciar ningún proceso.
para el curso respectivo.';
$string['workflow_displaytitle'] = 'Título del flujo de trabajo mostrado';
$string['workflow_displaytitle_help'] = 'Este título se muestra a los usuarios cuando administran sus cursos.';
$string['workflow_duplicate_title'] = '{$a} (Copy)';
$string['workflow_finishdelay'] = 'Retraso en caso de curso terminado';
$string['workflow_finishdelay_help'] = 'Si un curso ha terminado una instancia de proceso de este flujo de trabajo,
este valor describe el tiempo hasta que se puede iniciar de nuevo un proceso para esta combinación de curso y flujo de trabajo.';
$string['workflow_is_running'] = 'El flujo de trabajo se está ejecutando.';
$string['workflow_not_removeable'] = 'No es posible eliminar esta instancia de flujo de trabajo. ¿Tal vez todavía tiene procesos en ejecución?';
$string['workflow_processes'] = 'Procesos activos';
$string['workflow_rollbackdelay'] = 'Retraso en caso de reversión';
$string['workflow_rollbackdelay_help'] = 'Si un curso se revirtió dentro de una instancia de proceso de este flujo de trabajo, este valor describe el tiempo hasta que se puede iniciar de nuevo un proceso para esta combinación de curso y flujo de trabajo.';
$string['workflow_sortindex'] = 'Arriba/abajo';
$string['workflow_started'] = 'Se inició el flujo de trabajo.';
$string['workflow_timeactive'] = 'Activa desde';
$string['workflow_timedeactive'] = 'Desactivada desde';
$string['workflow_title'] = 'Título';
$string['workflow_title_help'] = 'Título del flujo de trabajo (visible solo para administradoras)';
$string['workflow_tools'] = 'Comportamiento';
$string['workflow_trigger'] = 'Disparador para el flujo de trabajo';
$string['workflownotfound'] = 'No se pudo encontrar el flujo de trabajo con id {$a}';
