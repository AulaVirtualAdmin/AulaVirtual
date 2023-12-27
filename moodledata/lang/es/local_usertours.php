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
 * Strings for component 'local_usertours', language 'es', version '4.2'.
 *
 * @package     local_usertours
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['actions'] = 'Acciones';
$string['appliesto'] = 'Aplica para';
$string['backdrop'] = 'Mostrar con el fondo';
$string['backdrop_help'] = 'Puede usar un fondo para resaltar la parte de la página que esta apuntando.

Nota: Los fondos no son compatibles con algunas partes de la página como la barra de navegación.';
$string['block'] = 'Bloque';
$string['block_named'] = 'Bloque llamado \'{$a}\\';
$string['bottom'] = 'Parte baja';
$string['confirmstepremovalquestion'] = '¿Esta seguro de que desea eliminar este paso?';
$string['confirmstepremovaltitle'] = 'Confirmar eliminación del paso';
$string['confirmtourremovalquestion'] = '¿Esta seguro de que desea eliminar este tour?';
$string['confirmtourremovaltitle'] = 'Confirmar eliminación del tour';
$string['content'] = 'Contenido';
$string['content_help'] = 'Este es el contenido de este paso.
Puede introducir un contenido en los siguientes formatos:
<dl>
    <dt>Texto plano</dt>
    <dd>Una descripción en texto plano</dd>
    <dt>Moodle MultiLang</dt>
    <dd>Una cadena que puede usar el formato MultiLang de Moodle</dd>
    <dt>Cadena traducida de Moodle</dt>
    <dd>Un valor encontrado en un archivo de lenguaje de Moodle en formato identificador,componente</dd>
</dl>';
$string['cssselector'] = 'Selector CSS';
$string['defaultvalue'] = 'Predeterminado ({$a})';
$string['delay'] = 'Retraso antes de mostrar el paso';
$string['delay_help'] = 'Opcionalmente podrá escoger añadir un retraso antes de que el paso sea mostrado.

Este retraso es en milisegundos.';
$string['description'] = 'Descripción';
$string['done'] = 'Hecho';
$string['editstep'] = 'Editando "{$a}"';
$string['enabled'] = 'Habilitado';
$string['endtour'] = 'Fin del tour';
$string['exporttour'] = 'Exportar tour';
$string['importtour'] = 'Importar tour';
$string['left'] = 'Izquierda';
$string['movestepdown'] = 'Bajar un paso';
$string['movestepup'] = 'Subir un paso';
$string['movetourdown'] = 'Bajar de nivel un tour';
$string['movetourup'] = 'Subir de nivel un tour';
$string['name'] = 'Nombre';
$string['newstep'] = 'Nuevo paso';
$string['newtour'] = 'Crear un nuevo tour';
$string['next'] = 'Siguiente';
$string['orphan'] = 'Mostrar si no se encuentra el objetivo';
$string['orphan_help'] = 'Mostrar el paso si no se encuentra el objetivo en la página.';
$string['pathmatch'] = 'Aplicar a coincidencia de URL';
$string['pathmatch_help'] = 'Los tours serán mostrados en cualquier página donde las URL coincidan con este valor.

Podrá usar el caracter % como comodín para decir cualquier cosa.
Algunos ejemplos de valores incluyen:

* /my/% - para emparejar con el Dashboard
* /course/view.php?id=2 - para emparejar un curso específico
* /mod/forum/view.php% - para emparejar una lista de discusión de un foro
* /user/profile.php% - para emparejar la página de perfil del usuario';
$string['pausetour'] = 'Pausa';
$string['placement'] = 'Ubicación';
$string['placement_help'] = 'Puede colocar un paso encima, debajo, a la izquierda o a la derecha del objetivo.

La mejor opción es arriba o abajo, para que esto se ajuste mejor en pantallas de móviles.';
$string['pluginname'] = 'Tours de usuario';
$string['reflex'] = 'Mover al hacer clic';
$string['reflex_help'] = 'Mover al siguiente paso cuando se haga clic en el objetivo.';
$string['resettouronpage'] = 'Resetear el tour de usuario en esta página';
$string['resumetour'] = 'Reanudar';
$string['right'] = 'Derecha';
$string['select_block'] = 'Seleccione un bloque';
$string['select_targettype'] = 'Cualquier paso está asociado con una parte de la página que debe escoger. Para hacerlo más fácil hay muchos tipos de objetivo para diferentes tipos de contenido de página.
<dl>
    <dt>Bloque</dt>
    <dd>Muestra el siguiente paso del primer bloque de emparejamiento en la página</dd>
    <dt>Selector</dt>
    <dd>Los selectores CSS son una vía poderosa con la que podrá seleccionar diferentes partes de la página basándose en los metadatos asociados a la página.</dd>
    <dt>Mostrar en la mitad de la página</dt>
    <dd>En lugar de asociar el paso con una parte específica de la página, puede hacer que se muestre en el centro de la página.</dd>
</dl>';
$string['selector_defaulttitle'] = 'Introduzca un titulo descriptivo';
$string['selectordisplayname'] = 'Un selector CSS  que coincida con \'{$a}\\';
$string['selecttype'] = 'Seleccionar el tipo de paso';
$string['sharedtourslink'] = 'Repositorio de tour';
$string['skip'] = 'Saltar';
$string['target'] = 'Objetivo';
$string['target_block'] = 'Bloque';
$string['target_selector'] = 'Selector';
$string['target_selector_targetvalue'] = 'Selectores CSS';
$string['target_selector_targetvalue_help'] = 'a';
$string['target_unattached'] = 'Mostrar en el centro de la página';
$string['targettype'] = 'Tipo de objetivo';
$string['title'] = 'Título';
$string['title_help'] = 'Este es el título que se mostrará en la parte superior de este paso.
Podrá introducir un título en los siguientes formatos:
<dl>
    <dt>Texto plano</dt>
    <dd>Una descripción en texto plano</dd>
    <dt>Moodle MultiLang</dt>
    <dd>Una cadena que puede usar el formato MultiLang de Moodle</dd>
    <dt>Cadena traducida de Moodle</dt>
    <dd>Un valor encontrado en un archivo de lenguaje de Moodle en formato identificador,componente</dd>
</dl>';
$string['top'] = 'Arriba';
$string['tourconfig'] = 'Archivo de configuración de tour para importar';
$string['tourlist_explanation'] = 'Puede crear tantos tours como lo desee y activarlos para diferentes partes de Moodle. Solo se puede crear un tour por página.';
$string['tours'] = 'Tours';
$string['usertours'] = 'Tours de usuario';
$string['viewtour_info'] = 'Este es el tour \'{$a->tourname}\'. Este tour se corresponde con la ruta \'{$a->path}\'.';
