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
 * Strings for component 'tool_catalogue', language 'es', version '4.2'.
 *
 * @package     tool_catalogue
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['aboutthiscourse'] = 'Acerca de este curso';
$string['aboutthisprogram'] = 'Acerca de este programa';
$string['all'] = 'Todos';
$string['allowhtmltags'] = 'Permitir etiquetas HTML';
$string['aria:courseactions'] = 'Acciones del curso';
$string['catalogue:config'] = 'Configurar catálogo de aprendizaje';
$string['cataloguesettings'] = 'Configuración del catálogo de mis programas y cursos';
$string['categoriesdepthlimit'] = 'Número máximo de niveles de categorías enlazadas';
$string['categoriesdepthlimit_desc'] = 'Número máximo de niveles de categorías enlazadas en el selector de categorías. Los cursos de los niveles inferiores seguirán apareciendo en los resultados la búsqueda.';
$string['categorieslimit'] = 'Número máximo de categorías del mismo nivel';
$string['categorieslimit_desc'] = 'Número máximo de categorías del mismo nivel en el selector de categorías. Las categorías se mostrarán en el mismo orden en que se hayan definido en la página de gestión del curso. Si hay más categorías en un nivel, las categorías no se mostrarán en el selector pero todos los cursos serán visibles en los resultados de la búsqueda.';
$string['certifications'] = 'Certificaciones';
$string['certificationstatuscertified'] = 'La certificación \'<strong>{$a->name}</strong>\' está completa';
$string['certificationstatuscertifiedwithdate'] = 'La certificación \'<strong>{$a->name}</strong>\' está completa. La misma vence el \'<strong>{$a->date}</strong>\'';
$string['certificationstatusexpired'] = 'La certificación \'<strong>{$a->name}</strong>\' venció el {$a->date}';
$string['certificationstatusopen'] = 'La certificación \'<strong>{$a->name}</strong>\' no tiene fecha de vencimiento';
$string['certificationstatusopenwithdate'] = 'Completar el programa \'<strong>{$a->date}</strong>\' para obtener la certificación \'<strong>{$a->name}</strong>\'';
$string['certificationstatusoverdue'] = 'La certificación \'<strong>{$a->name}</strong>\' venció el \'<strong>{$a->date}</strong>\'';
$string['complete'] = 'Completo';
$string['completeatleast'] = 'Completar al menos {$a}';
$string['coursecoverhelp'] = 'Este curso es parte del programa \'{$a}\'';
$string['coursecoverhelpmultiprogram'] = 'Este curso es parte de algunos programas';
$string['coursecoverhelptext'] = '<ul><li>Este es solo un curso que forma parte de programas más grandes</li><li>Puede haber nuevos cursos disponibles después de completar este</li></ul>';
$string['coursedisplayduelimit'] = 'Mostrar días restantes de cursos';
$string['coursedisplayduelimit_desc'] = 'Cantidad de días a partir de los cuales los usuarios verán un pequeño recordatorio (quedan X días) junto al nombre del curso. Por ejemplo, si se establece en 14, el recordatorio será visible durante los 14 días anteriores a la fecha de finalización del curso. En el caso de muchas fechas de finalización diferentes, el sistema evaluará cuál es la siguiente más cercana. Dejarlo en 0 para deshabilitar esta funcionalidad.';
$string['coursefiles'] = 'Archivos de curso';
$string['courseimage_help'] = 'Imagen del curso.';
$string['coursenotavailable'] = 'Curso no disponible';
$string['courses'] = 'Cursos';
$string['coursesperpage_frontpage'] = 'Número de cursos por página, página principal del sitio';
$string['coursesperpage_frontpage_desc'] = 'Número de cursos a mostrar en la página principal cuando se incluye "Listado de cursos" en la configuración de ítems de la página del sitio.';
$string['coursesperpage_main'] = 'Número de cursos por página, página del catálogo principal';
$string['coursesperpage_main_desc'] = 'Número de cursos a mostrar en la página del catálogo principal antes de seleccionar una categoría o de solicitar una búsqueda y antes de aplicar filtros.';
$string['coursesperpage_search'] = 'Número de cursos por página, resultados de búsqueda';
$string['coursesperpage_search_desc'] = 'Número de cursos a mostrar en los resultados de búsqueda de curso o cuando se selecciona una categoría.';
$string['dates'] = 'Fechas';
$string['daysleft'] = 'Quedan {$a} días';
$string['defaultsortorder'] = 'Ordenamiento predeterminado';
$string['display'] = 'Mostrar';
$string['displaycourseinfomodal'] = 'Mostrar información del curso modal';
$string['displayfields_desc'] = 'Por favor, seleccione todos los campos que tengan que mostrarse como filtros y ordénelos en el orden adecuado. No todos los tipos de campos personalizados se pueden usar en filtros. <br>Los cambios en la tabla anterior se guardan automáticamente.';
$string['displayfields_list'] = 'Campos a mostrar en la vista de "lista" (detallada) del catálogo de aprendizaje';
$string['displayfields_tiles'] = 'Campos amostrar en la vista "títulos" (compacta) del catálogo de aprendizaje';
$string['displayforeverybody'] = 'Mostrar a todos';
$string['displayfornotadmin'] = 'Mostrar sólo para usuarios que no sean administradores';
$string['displayforstudentsandguests'] = 'Mostrar sólo durante el acceso de invitados y para estudiantes';
$string['displaynever'] = 'No mostrar nunca';
$string['displayprogramcoverpage'] = 'Mostrar la portada del programa';
$string['displaysummaryasis'] = 'Mostrarlo como es';
$string['displaysummarynohtml'] = 'Mostrar sin HTML';
$string['displaysummarynone'] = 'No mostrar';
$string['dontshowagain'] = 'No volver a mostrar este mensaje';
$string['duedate'] = 'Ordenar por fecha de completud';
$string['duedateinfo'] = 'Vence en un día';
$string['duedateinfodays'] = 'Vence en {$a} días';
$string['duedatex'] = '<strong>Fecha de vencimiento:</strong> {$a}';
$string['enddatex'] = '<strong>Fecha de fin:</strong> {$a}';
$string['errornopermissionviewcoursecover'] = 'Sin permisos para ver la portada del curso';
$string['errornopermissionviewprogram'] = 'Sin permisos para ver el programa';
$string['filterfields'] = 'Campos a mostrar en el filtro de catálogo de aprendizaje';
$string['hiddenfromlearners'] = 'Oculto para los colaboradores';
$string['htmltagsall'] = 'Permitir cualquier etiqueta HTML';
$string['htmltagsnone'] = 'Quitar todas las etiquetas HTML';
$string['htmltagssafe'] = 'Sólo etiquetas HTML seguras';
$string['incomplete'] = 'No concluído';
$string['information'] = 'Información';
$string['iunderstand'] = 'Entiendo';
$string['lastaccess'] = 'Ordenado por el último acceso';
$string['learningcataloguesettings'] = 'Configuración del catálogo de aprendizaje';
$string['moreinfo'] = 'Más información';
$string['mycourses'] = 'Mis cursos';
$string['name'] = 'Ordenar por nombre';
$string['notavailableunless'] = 'No disponible a menos que \'<strong>{$a}</strong>\' esté disponible';
$string['notavailableuntil'] = 'No disponible hasta que \'{$a}\' esté completado';
$string['notnow'] = 'No ahora';
$string['notset'] = 'No ajustado';
$string['overdue'] = 'Vencido';
$string['pluginname'] = 'Catálogo de aprendizaje';
$string['privacy:metadata:preference:tool_catalogue_collapse_recently_accessed_courses'] = 'Si colapsar la sección "Cursos accedidos recientemente"';
$string['privacy:metadata:preference:tool_catalogue_hide_program_cover_help'] = 'Si mostrar la ayuda de la portada del programa';
$string['privacy:metadata:preference:tool_catalogue_my_courses_filter'] = 'Si filtrar los programas/cursos por todos/cursos/programas/completo/incompleto';
$string['privacy:metadata:preference:tool_catalogue_my_courses_sort'] = 'Si ordenar programas/cursos por nombre/fecha de vencimiento/último acceso';
$string['privacy:metadata:showprogramcoverhelp'] = 'Si mostrar la ayuda de la portada del programa';
$string['privacy:request:preference:set'] = 'El valor del ajuste \'{$a->name}\' fue \'{$a->value}\'';
$string['proceedtocourse'] = 'Ir al contenido del curso';
$string['proceedtoprogram'] = 'Ir al contenido del programa';
$string['program'] = 'Programa';
$string['programdisplayduelimit'] = 'Mostrar los días que faltan para el vencimiento del programa';
$string['programdisplayduelimit_desc'] = 'Cantidad de días a partir de los cuales los usuarios verán un pequeño recordatorio (Vence en X días) junto al nombre del programa. Por ejemplo, si se establece en 14, el recordatorio será visible durante los 14 días antes de que el programa llegue a su fecha de vencimiento. Establecerlo en 0 para deshabilitar esta funcionalidad.';
$string['programempty'] = 'No hay cursos en este programa';
$string['programhelptext'] = '<ul><li>Los programas pueden contener diferentes cursos</li><li>Completar los cursos para completar el programa</li></ul>';
$string['programhelptitle'] = '¿Qué es un programa?';
$string['programimage_help'] = 'La imagen del programa.';
$string['programlink'] = 'Ver "{$a}" detalles';
$string['programlinksingle'] = 'Ver detalles del programa';
$string['programs'] = 'Programas';
$string['programstructure'] = 'Estructura del programa';
$string['progress'] = '{$a}% completo';
$string['progresscompleted'] = '{$a->completed} de {$a->total} completos';
$string['recentlyaccessedcourses'] = 'Cursos accedidos recientemente';
$string['safehtmltags'] = 'Etiquetas HTML seguras en resumen y campos de texto';
$string['safehtmltags_desc'] = 'Listado de etiquetas HTML que deberían mantenerse al mostrar el resumen de curso o campos personalizados de curso en el Catálogo de Aprendizaje. Todas las demás etiquetas se eliminarán para garantizar que los resúmenes de curso no rompan la disposición del catálogo. <br>Observe que para resúmenes de curso las etiquetas HTML puede que no funcionen bien juto al ajuste "Truncar".';
$string['searchplaceholder'] = 'Buscar cursos o programas';
$string['selectenrolmentmethod'] = 'Seleccionar un método de matriculación';
$string['showcataloguecoursecategory'] = 'Mostrar categoría de cursos en tarjetas de cursos';
$string['showcataloguecoursecategory_desc'] = 'La categoría de curso será visible en cualquier tarjeta de curso encontrada en "Área personal", "Mis cursos" y algunos bloques.';
$string['showcoursedates'] = 'Mostrar las fechas del curso en el modal del curso';
$string['showcoursedates_desc'] = 'Las fechas del curso serán visibles en el modal del curso y en la pestaña de información del curso.';
$string['showmore'] = 'Mostrar {$a} más...';
$string['startdatex'] = '<strong>Fecha de inicio:</strong> {$a}';
$string['todo'] = 'Pendiente:';
$string['trainers'] = 'Formadores';
$string['truncatesummary'] = 'Truncar resumen de curso';
$string['truncatesummary_desc'] = 'Número máximo de caracteres a mostrar en el resumen del curso. Ajustar a 0 pra no truncar. <br>Este ajuste controla el texto que se envía desde el servidor al navegador. Usted también puede optar por truncar campos individualmente directamente en el navegador usando CSS personalizado.';
$string['xcourses'] = '{$a} cursos';
