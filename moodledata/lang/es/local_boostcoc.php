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
 * Strings for component 'local_boostcoc', language 'es', version '4.2'.
 *
 * @package     local_boostcoc
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['activefiltershiddencourses'] = 'Cursos ocultos';
$string['activefiltershintnotshowdisabled'] = 'Esta lista de cursos muestra todos los cursos en los que Usted está inscrito. No son aplicados filtros ni cursos ocultos.';
$string['activefiltershintnotshowenabledactivefilters'] = 'Filtros de curso activos:';
$string['activefiltershintnotshowenabledchangelink'] = 'Cambiar filtros o volver a mostrar cursos ocultos';
$string['activefiltershintnotshowenablednoactivefilters'] = 'Sin filtros de curso activos';
$string['pluginname'] = 'Vista general de curso Boost en campus';
$string['privacy:metadata'] = 'El plugin de Vista general de curso Boost en campus proporciona funcionalidad extendida a usuarios Moodle, pero no almacena ningún dato personal por sí mismo. Consume los datos personales almacenados por el plugin Vista general de Curso en Campus  (block_course_overview_campus).';
$string['setting_addactivefiltershint'] = 'Añadir pista sobre filtro activo';
$string['setting_addactivefiltershint_desc'] = 'Habilitar esta configuración añadirá un nodo al final de la lista de miscursos en el cajón de navegación de Boost, diciéndole al usuario porqué es que la lista de miscursos se ve como está (por ejemplo, cuales filtros y si los cursos ocultos produjeron la lista actual de miscursos)';
$string['setting_addchangefilterslink'] = 'Añadir enlace hacia cambiar filtros';
$string['setting_addchangefilterslink_desc'] = 'Habilitar esta configuración añadirá un nodo al final de la lista de miscursos en el cajón de navegación de Boost diciéndole al usuario en donde cambiar los filtros actuales y cursos ocultos.';
$string['setting_changefilterslinktarget'] = 'Destino del enlcae hacia cambiar filtros';
$string['setting_changefilterslinktarget_desc'] = 'Con esta configuración, Usted controla el destino del enlace a cambiar filtros. Usted puede configurarlo a la página inicial del curso o al Tablero del usuario. Esto coincide con las dos localizaciones en donde puede colocarse  block_course_overview_campus.<br />Por favor tenga en cuenta que: Para evitar confusión, por favor asegúrese de que block_course_overview_campus siempre esté situado en la página destino al ponerla allí como un bloque pegajoso.<br /><em>Esta configuración siempre es procesada cuando está activado "Añadir enlace a cambiar filtros".</em>';
$string['setting_disableinprogressfilter'] = 'Deshabilitar filtro de en-progreso interconstruido de Moodle';
$string['setting_disableinprogressfilter_desc'] = 'El comportamiento estándar de Moodle es solamente mostrar cursos en-progreso en la lista de miscursos en el cajón de navegación de Boost. La lista de cursos en block_course_overview_campus nuestra todos los cursos sin importar su estatus de en-progreso. En combinación, esto podría conducir a resultados confusos; por ejemplo, cursos visibles en block_course_overview_campus  pero no en el cajón de  navegación de Boost. El habilitar esta configuración deshabilita el filtro de en-progreso  estándar de Moodle.';
$string['setting_disableinprogressfilterperformancehint'] = 'Por favor tenga en cuenta que: Si Usted habilita esta configuración y también tiene habilitada la configuración <a href="/admin/search.php?query=navshowmycoursecategories">navshowmycoursecategories</a>, el mostrar todos los nodos del curso tomará más tiempo y Usted debería de considerar el deshabilitar la configuración de navshowmycoursecategories.';
$string['setting_enablenotshown'] = 'No mostrar cursos ocultos o filtrados';
$string['setting_enablenotshown_desc'] = 'El habilitar esta configuración modificará la lista de miscursos en el cajón de navegación de Boost, para que solamente muestre los cursos que actualmente están mostrados en block_course_overview_campus de acuerdo a las configuraciones de filtro actuales del usuario y a los cursos a los que el usuario ha marcado como ocultos.';
$string['setting_enablenotshownperformancehint'] = 'Por favor tenga en cuenta que: Si Usted habilita esta configuración y también tiene habilitada la configuración <a href="/admin/search.php?query=navshowmycoursecategories">navshowmycoursecategories</a>, el quitar los nodos del curso toma más tiempo y Usted debería de considerar deshabiltar la configuración de  navshowmycoursecategories.';
$string['setting_enablenotshowntechnicalhint'] = 'Techicamente, esto es hecho al configurar el atributo showinflatnavigation del nodo del curso a falso. Así, el nodo del cursono estará oculto del cajón de navegación, pero permanecerá en el árbol de navegación y todavía puede ser accesado por otras partes de Moodle.';
$string['setting_filterstatusheading'] = 'Estatus del filtro';
$string['setting_generalfunctionalityheading'] = 'Funcionalidad general';
