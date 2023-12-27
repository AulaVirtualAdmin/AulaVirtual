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
 * Strings for component 'ratingallocate', language 'es', version '4.2'.
 *
 * @package     ratingallocate
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['algorithm_already_running'] = 'Ya está corriendo otra instancia del algoritmo de asignación. Por favor espere unos pocos minutos y refresque la página.';
$string['algorithm_scheduled_for_cron'] = 'La corrida del algoritmo de asignación está agendada para ejecución inmediata por el trabajo del cron. Por favor espere unos pocos minutos y refresque la página.';
$string['algorithmtimeout'] = 'Caducó el tiempo del algoritmo';
$string['allocation_manual_explain_all'] = 'Elija una opción para asignarla a un usuario.';
$string['allocation_notification_message'] = 'Con respecto a "{$a->ratingallocate}", Usted ha sido asignado a la opción de "{$a->choice} ({$a->explanation})".';
$string['allocation_notification_message_subject'] = 'Notificación pubicada para {$a}';
$string['allocation_statistics'] = 'Estadísticas de Asignación';
$string['allocations_table'] = 'Vista general de Asignaciones';
$string['allocations_table_choice'] = 'Elección';
$string['allocations_table_noallocation'] = 'Sin Asignación';
$string['allocations_table_users'] = 'Usuarios';
$string['at_least_one_rateable_choices_needed'] = 'Usted necesita al menos una opción valorable.';
$string['choice_active'] = 'La selección está activa';
$string['choice_active_help'] = 'Solamente las (s)elecciones activas son mostrada al usuario. Las (s)elecciones inactivas no son mostradas.';
$string['choice_added_notification'] = 'Opción guardada.';
$string['choice_deleted_notification'] = 'Opción "{$a}" fue borrada.';
$string['choice_deleted_notification_error'] = 'La opción que se pidió eliminar no pudo encontrarse.';
$string['choice_explanation'] = 'Descripción (opcional)';
$string['choice_maxsize'] = 'Número máximo de participantes';
$string['choice_maxsize_display'] = 'Número máximo de alumnos';
$string['choice_table_active'] = 'Activo';
$string['choice_table_explanation'] = 'Descripción';
$string['choice_table_maxsize'] = 'Tamaño máximo';
$string['choice_table_title'] = 'Título';
$string['choice_table_tools'] = 'Editar';
$string['choice_title'] = 'Título';
$string['choice_title_help'] = 'Título de la opción. *Atención* todas las opciones activas se mostrarán mientras se ordene por título.';
$string['choicestatusheading'] = 'Estado';
$string['configalgorithmtimeout'] = 'El tiempo en segundos tras el cual se supone que el algoritmo se ha atascado.
La ejecución actual se finaliza y se marca como fallida.';
$string['configdownloaduserfields'] = 'Al descargar una tabla con usuarios en ella, estos campos pueden ser mostrados adicionalmente a los nombres y apellidos de los usuarios.';
$string['confirm_start_distribution'] = 'Ejecutar el algoritmo borrará todas las asignaciones actuales si las hubiera. ¿Está seguro de querer continuar?';
$string['create_moodle_groups'] = 'Crear grupos a partir de la asignación';
$string['crontask'] = 'Asignación automática para la Asignación Justa';
$string['delete_choice'] = 'Suprimir opción';
$string['delete_rating'] = 'Eliminando valoración';
$string['deletechoice'] = 'Suprimir opción';
$string['deleteconfirm'] = '¿Realmente desea suprimir la opción "{$a}"?';
$string['distribution_algorithm'] = 'Algoritmo de distribución';
$string['distribution_published'] = 'La asignación se ha publicado.';
$string['distribution_saved'] = 'Distribución guardada (en {$a}s).';
$string['distribution_table'] = 'Tabla de distribución';
$string['download_problem_mps_format'] = 'Descargar ecuación (mps/txt)';
$string['downloaduserfields'] = 'Campos de usuario adicionales para descargar';
$string['edit_choice'] = 'Editar opción';
$string['edit_rating'] = 'Editar puntuación';
$string['err_maximum'] = 'El valor máximo para este campo es {$a}.';
$string['err_minimum'] = 'El valor mínimo para este campo es {$a}.';
$string['err_positivnumber'] = 'Debe proporcionar un número positivo aquí.';
$string['err_required'] = 'Tiene que proporcionar un valor para este campo.';
$string['export_choice_alloc_suffix'] = '- Asignación';
$string['export_choice_text_suffix'] = '- Texto';
$string['export_options'] = 'Opciones de exportación';
$string['filter_hide_users_without_rating'] = 'Ocultar usuarios sin valoraciones';
$string['filter_show_alloc_necessary'] = 'Ocultar usuarios con asignación';
$string['filtermanualtabledesc'] = 'Describe los filtros que son aplicados a la tabla del formato de asignación manual.';
$string['filtertabledesc'] = 'Describe los filtros que son aplicados a la tabla de asignación.';
$string['groupingname'] = 'Creado desde Asignación Justa "{$a}"';
$string['invalid_dates'] = 'Los datos no son válidos. La fecha de inicio debe ser anterior a la fecha de fin.';
$string['invalid_publishdate'] = 'La fecha de publicación no es válida. La fecha de publicación debe ser posterior a la finalización de la puntuación.';
$string['is_published'] = 'Publicado';
$string['last_algorithm_run_date'] = 'Último algoritmo ejecutado en';
$string['last_algorithm_run_date_none'] = '-';
$string['last_algorithm_run_status'] = 'Estado de la última ejecución';
$string['last_algorithm_run_status_-1'] = 'Fallido';
$string['last_algorithm_run_status_0'] = 'Sin empezar';
$string['last_algorithm_run_status_1'] = 'Ejecutando';
$string['last_algorithm_run_status_2'] = 'Exitoso';
$string['log_allocation_published'] = 'Asignación publicada';
$string['log_allocation_published_description'] = 'El usuario con identificador "{$a->userid}" publicó el reparto para la Asignación Justa con el identificador "{$a->ratingallocateid}".';
$string['log_allocation_statistics_viewed'] = 'Estadísticas de reparto vistas';
$string['log_allocation_statistics_viewed_description'] = 'El usuario con identificador "{$a->userid}" vió el reparto para la Asignación Justa con el identificador "{$a->ratingallocateid}".';
$string['log_allocation_table_viewed'] = 'Tabla de reparto vista';
$string['log_allocation_table_viewed_description'] = 'El usuario con identificador "{$a->userid}" vió la tabla de reparto para la Asignación Justa con el identificador "{$a->ratingallocateid}".';
$string['log_distribution_triggered'] = 'Distribución activada';
$string['log_distribution_triggered_description'] = 'El usuario con identificador "{$a->userid}" activó la distribución para la Asignación Justa con el identificador "{$a->ratingallocateid}". El algoritmo necesitó {$a->time_needed} segundos.';
$string['log_index_viewed'] = 'Usuario vió todas las instancias de Asignación Justa';
$string['log_index_viewed_description'] = 'El usuario con id "{$a->userid}" vió todas las instancias de Asignación Justa en este curso.';
$string['log_manual_allocation_saved'] = 'Reparto manual guardado';
$string['log_manual_allocation_saved_description'] = 'El usuario con identificador "{$a->userid}" guardó el reparto manual para la Asignación Justa con el identificador "{$a->ratingallocateid}".';
$string['log_rating_deleted'] = 'Valoración de usuario eliminada';
$string['log_rating_deleted_description'] = 'El usuario con id "{$a->userid}" eliminó su valoración para la Asignación Justa con id "{$a->ratingallocateid}".';
$string['log_rating_saved'] = 'Valoración de usuario guardada';
$string['log_rating_saved_description'] = 'El usuario con id "{$a->userid}" guardó su valoración para la asignación Justa con id "{$a->ratingallocateid}".';
$string['log_rating_viewed'] = 'Valoración de usuario vista';
$string['log_rating_viewed_description'] = 'El usuario con id "{$a->userid}" vió su valoración para la Asignación Justa con id "{$a->ratingallocateid}".';
$string['log_ratingallocate_viewed'] = 'Ratingallocate (Asignación_de_Valoración) vista';
$string['log_ratingallocate_viewed_description'] = 'El usuario con id "{$a->userid}" vió la Asignación Justa con id "{$a->ratingallocateid}".';
$string['log_ratings_and_allocation_table_viewed'] = 'Tabla de valoraciones y asignación vista';
$string['log_ratings_and_allocation_table_viewed_description'] = 'El usuario con id "{$a->userid}" vió la tabla de valoraciones y asignación para la Asignación Justa con  id "{$a->ratingallocateid}".';
$string['manual_allocation'] = 'Asignación Manual';
$string['manual_allocation_form'] = 'Formato de Asignación Manual';
$string['manual_allocation_nothing_to_be_saved'] = 'No había nada para guardar.';
$string['manual_allocation_saved'] = 'Su Asignación Manual se ha guardado.';
$string['messageprovider:allocation'] = 'Notificación acerca de asignación publicada';
$string['messageprovider:notifyalloc'] = 'Notificación de opción asignación';
$string['modify_allocation_group'] = 'Modificar Asignación';
$string['modify_allocation_group_desc_rating_in_progress'] = 'Actualmente está corriendo la fase de valoración. Usted puede empezar el proceso de asignación después de que haya terminado la fase de valoración.';
$string['modify_allocation_group_desc_ready'] = 'La fase de valoración ha terminado. Usted puede ahora ejecutar el algoritmo para una asignación automática.';
$string['modify_allocation_group_desc_too_early'] = 'La fase de valoración aun no ha iniciado. Usted puede iniciar el proceso de asignación después de que haya terminado la fase de valoración.';
$string['modify_choices'] = 'Editar Opciones';
$string['modify_choices_explanation'] = 'Mostrar la lista de todas las opciones. Aquí, las opciones pueden ocultarse, alterarse y eliminarse.';
$string['modify_choices_group'] = 'Opciones';
$string['modify_choices_group_desc_published'] = 'Las asignaciones han sido publicadas; ya no se recomienda alterar las opciones.';
$string['modify_choices_group_desc_rating_in_progress'] = 'La valoración está en progreso; Usted no debe de cambiare l conjunto de opciones disponibles en este paso.';
$string['modify_choices_group_desc_ready'] = 'La fase de valoración ha terminado; ahora Usted puede modificar la cantidad de estudiantes de cada opción o desactivar algunas opciones para variar el resultado de la distribución.';
$string['modify_choices_group_desc_ready_alloc_started'] = 'La fase de valoración ha terminado; ahora Usted puede modificar la cantidad de estudiantes de cada opción o desactivar algunas opciones para variar el resultado de la distribución.';
$string['modify_choices_group_desc_too_early'] = 'Aquí pueden especificarse las opciones, que deberían de estar disponibles para los estudiantes.';
$string['modulename'] = 'Asignación Justa';
$string['modulename_help'] = 'El modulo de Asignación Justa le permite definir opciones que sus usuarios pueden entonces valorar.Entonces los participantes pueden ser distribuídos automáticamente a las opciones disponibles de acuerdo a sus valoraciones.';
$string['modulenameplural'] = 'Asignaciones Justas';
$string['moodlegroups_created'] = 'Los Grupos y Agrupamientos correspondientes de Moodle han sido creados.';
$string['newchoice'] = 'Añadir una nueva Elección.';
$string['newchoicetitle'] = 'Nueva Opción/Selección {$a}';
$string['no_allocation_notification_message'] = 'Respecto a  "{$a->ratingallocate}", Usted no pudo ser asignado a ninguna opción.';
$string['no_choice_to_rate'] = '¡No hay opciones para valorar!';
$string['no_id_or_m_error'] = 'Usted debe especificar una course_module ID (ID del módulo del curso) o una ID de instancia';
$string['no_rating_given'] = 'No-valorada';
$string['no_rating_possible'] = '¡Actualmente, no hay valoración posible!';
$string['no_user_to_allocate'] = 'No hay usuario que pueda asignar';
$string['pluginadministration'] = 'Administración de Asignaciones Justas';
$string['pluginname'] = 'Asignación Justa';
$string['privacy:metadata:preference:flextable_filter'] = 'Almacena los filtros que son aplicados a la tabla de asignaciones.';
$string['privacy:metadata:preference:flextable_manual_filter'] = 'Almacena los filtros que son aplicados a la tabla de asignaciones manuales.';
$string['privacy:metadata:ratingallocate_allocations'] = 'Información acerca de las opciones asignadas al usuario para una instancia de actividad.';
$string['privacy:metadata:ratingallocate_allocations:choiceid'] = 'La ID de la opción a la que fue asignado el usuario';
$string['privacy:metadata:ratingallocate_allocations:ratingallocateid'] = 'La ID de la instancia de actividad a la que pertenece esta asignación';
$string['privacy:metadata:ratingallocate_allocations:userid'] = 'La ID del usuario que fue asignado a una opción';
$string['privacy:metadata:ratingallocate_ratings'] = 'Información acerca de las valoraciones del usuario para las opciones dadas.';
$string['privacy:metadata:ratingallocate_ratings:choiceid'] = 'La ID de la opción que el usuario ha valorado';
$string['privacy:metadata:ratingallocate_ratings:rating'] = 'La valoración que un usuario le ha dado a una opción.';
$string['privacy:metadata:ratingallocate_ratings:userid'] = 'La Id del usuario que valora esta opción';
$string['publish_allocation'] = 'Publicar Aasignación';
$string['publish_allocation_group'] = 'Publicar Asignación';
$string['publish_allocation_group_desc_rating_in_progress'] = 'La fase de valoración está en progreso. Por favor, espere hasta que haya terminado la fase de valoración y entonces empiece a crear asignaciones, primeramente.';
$string['publish_allocation_group_desc_ready'] = 'Todavía no hay asignaciones. Por favor, vea la sección sobre modificar asignación.';
$string['publish_allocation_group_desc_too_early'] = 'Todavía no ha iniciado la fase de valoración.. Por favor, espere ahasta que haya terminado la fase de caloración y entonces comience a crear asignaciones, primeramente.';
$string['publishdate'] = 'Fecha de publicación estimada';
$string['publishdate_estimated'] = 'Fecha de publicación estimada';
$string['rateable_choices'] = 'Opciones que se pueden valorar';
$string['rated'] = 'calificado {$a}';
$string['rating_begintime'] = 'Valoraciones inician en';
$string['rating_endtime'] = 'Valoraciones terminan en';
$string['rating_is_over'] = 'La valoración se termino.';
$string['rating_is_over_no_allocation'] = 'La valoración ha concluido. Usted no pudo ser asignado a ninguna opción.';
$string['rating_is_over_with_allocation'] = 'La valoración ha concluido. Usted fue asignado a \'{$a}\'.';
$string['rating_raw'] = '{$a}';
$string['ratingallocate'] = 'Asignación Justa';
$string['ratingallocate:addinstance'] = 'Añadir nueva instnacia de Asignación Justa';
$string['ratingallocate:export_ratings'] = 'Habilidad para exportar las valoraciones de usuario';
$string['ratingallocate:give_rating'] = 'Crear/editar selección/opción';
$string['ratingallocate:modify_choices'] = 'Habilidad para modificar, editar o eliminar el conjunto de opciones de una Asignación Justa.';
$string['ratingallocate:start_distribution'] = 'Iniciar asignación de usuarios a selecciones';
$string['ratingallocate:view'] = 'Ver instancias de Asignación Justa';
$string['ratingallocatename'] = 'Nombre de esta Asignación Justa';
$string['ratingallocatename_help'] = 'Por favor elija un nombre para esta actividad de Asignación Justa.';
$string['ratings_deleted'] = 'Sus valoraciones han sido eliminadas.';
$string['ratings_saved'] = 'Sus valoraciones se han guardado.';
$string['ratings_table'] = 'Valoraciones y Asignaciones';
$string['ratings_table_sum_allocations'] = 'Número de asignaciones / Máximo';
$string['ratings_table_sum_allocations_value'] = '{$a->sum} / {$a->max}';
$string['ratings_table_user'] = 'Usuario';
$string['reports_group'] = 'Reportes';
$string['results_not_yet_published'] = 'Los resultados aun no han sido publicados.';
$string['runalgorithmbycron'] = 'Asignación automática después del períodod de valoración';
$string['runalgorithmbycron_help'] = 'Corre automáticamente el algoritmo de asignación después de que terminó el período de valoración. Sin embargo, los resultados tienen que ser publicados manualmente.';
$string['saveandcontinue'] = 'Guardar y Continuar';
$string['saveandnext'] = 'Guaradr y añadir siguiente';
$string['select_strategy'] = 'Elija la Estrategia para valorar';
$string['show_allocation_statistics'] = 'Mostrar Estadísticas de Asignación';
$string['show_allocation_table'] = 'Mostrar Vista General de Asignaciones';
$string['show_choices_header'] = 'Lista de todas las opciones';
$string['show_table'] = 'Mostrar Valoraciones y Asignaciones';
$string['start_distribution'] = 'Correr Algoritmo de Asignación';
$string['start_distribution_explanation'] = 'Un algoritmo automaticamente intentará asignar justamente a los usuarios por las valoraciones dadas.';
$string['strategy_lickert_max_no'] = 'Solamente puede darle de 0 puntos a un maximo de {$a} (s)elección(es).';
$string['strategy_lickert_name'] = 'Escala Likert';
$string['strategy_lickert_rating_biggestwish'] = '{$a} - Altamente apreciado';
$string['strategy_lickert_rating_exclude'] = '{$a} - Excluir';
$string['strategy_lickert_setting_maxlickert'] = 'Número maximo en la escala likert (3, 5 o 7 son valores comunes)';
$string['strategy_lickert_setting_maxno'] = 'Maximo Número de opciones/selecciones que el usuario puede valorar con 0';
$string['strategy_not_specified'] = 'Usted debe seleccionar una estrategia.';
$string['strategy_order_choice_none'] = 'Elija una opción por favor';
$string['strategy_order_explain_choices'] = 'Seleccione una opción en cada caja de selección. La primera elección recibe la prioridad mas alta y así sucesivamente.';
$string['strategy_order_header_description'] = 'Opciones Disponibles';
$string['strategy_order_name'] = 'Opciones del ranking';
$string['strategy_order_no_choice'] = '{$a}. Opción';
$string['strategy_order_setting_countoptions'] = 'Número mínimo de campos que se le presentan al usuario para que vote (¡más pequeño o igual al número de opciones!)';
$string['strategy_order_use_only_once'] = 'Las opciones no pueden ser seleccionadas dos veces y deben ser únicas.';
$string['strategy_points_explain_distribute_points'] = 'Darle puntos a cada opción, Usted tiene un total de {$a} puntos para distribuir. Debe priorizar la mejor opción con la mayor cantidad de puntos';
$string['strategy_points_explain_max_zero'] = 'Usted solamente puede darle 0 puntos a como máximo {$a} opciones';
$string['strategy_points_illegal_entry'] = 'Los puntos que Usted asigna a una elección deben estar entre 0 y {$a}.';
$string['strategy_points_incorrect_totalpoints'] = 'Número incorrecto de puntos totales. La suma de todos los puntos debe ser {$a}';
$string['strategy_points_max_count_zero'] = 'Usted puede darle 0 puntos a cuando máximo {$a} opción(es)';
$string['strategy_points_name'] = 'Dar Puntos';
$string['strategy_points_setting_maxzero'] = 'Número maximo de opciones a las que el usuario puede darle 0  puntos';
$string['strategy_points_setting_totalpoints'] = 'Número total de puntos que el usuario puede asignar';
$string['strategy_settings_default'] = 'Valor por defecto para formato de valoración';
$string['strategy_settings_label'] = 'Designación para "{$a}"';
$string['strategy_tickyes_accept'] = 'Aceptar';
$string['strategy_tickyes_error_mintickyes'] = 'Debe seleccionar al menos {$a} cajas.';
$string['strategy_tickyes_explain_mintickyes'] = 'Debe seleccionar un mínimo de {$a} cajas.';
$string['strategy_tickyes_name'] = 'Seleccionar Aceptar';
$string['strategy_tickyes_not_accept'] = '-';
$string['strategy_tickyes_setting_mintickyes'] = 'Número mínimo de opciones a aceptar';
$string['strategy_yesmaybeno_max_count_no'] = 'Solamente puede asignar "Rechazar" para un maximo de {$a} opciones.';
$string['strategy_yesmaybeno_max_no'] = 'Solamente puede asignar "Rechazar" a {$a} grupo(s).';
$string['strategy_yesmaybeno_name'] = 'Aceptar-Neutral-Rechazar';
$string['strategy_yesmaybeno_rating_maybe'] = 'Neutral';
$string['strategy_yesmaybeno_rating_no'] = 'Rechazar';
$string['strategy_yesmaybeno_rating_yes'] = 'Aceptar';
$string['strategy_yesmaybeno_setting_maxno'] = 'Maximo número de opciones que el usuario puede calificar con "Rechazar"';
$string['strategy_yesno_max_no'] = 'Usted solamente puede asignar "Rechazar" a {$a} grupos.';
$string['strategy_yesno_maximum_crossout'] = 'Usted solamente puede asignarle "Rechazar" a un maximo de {$a} opcion(es).';
$string['strategy_yesno_name'] = 'Aceptar-Rechazar';
$string['strategy_yesno_rating_choose'] = 'Aceptar';
$string['strategy_yesno_rating_crossout'] = 'Rechazar';
$string['strategy_yesno_setting_crossout'] = 'Máximo número de opciones que el usuario puede valorar con "Rechazar"';
$string['strategyname'] = 'La Estrategia es "{$a}"';
$string['strategyspecificoptions'] = 'Opciones específicas de estrategia';
$string['timeremaining'] = 'Tiempo restante';
$string['too_early_to_distribute'] = 'Demasiado pronto para distribuir. Todavía no termina la valoración.';
$string['too_early_to_rate'] = 'Es demasiado pronto para calificar';
$string['too_few_choices_to_rate'] = '¡Hay muy pocas opciones para valorar! Los estudiantes tienen que clasificar al menos {$a} opciones!';
$string['unassigned_users'] = 'Usuarios sin asignar';
$string['update_filter'] = 'Actualizar Filtro';
$string['userid'] = 'ID del usuario';
$string['you_are_not_allocated'] = '¡Usted no fue asignado a ninguna opción!';
$string['your_allocated_choice'] = 'Su Asignación';
$string['your_rating'] = 'Su Valoración.';
