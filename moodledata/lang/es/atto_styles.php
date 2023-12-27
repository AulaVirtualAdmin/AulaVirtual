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
 * Strings for component 'atto_styles', language 'es', version '4.2'.
 *
 * @package     atto_styles
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['config'] = 'Configuración de estilos';
$string['config_desc'] = 'Configuración para el widget de estilos para Atto en formato JSON.
Configuration for the styles widget for Atto in JSON format.
<hr />
Por ejemplo:<br />
{<br />
    "title": "Caja azul",<br />
    "type": "block",<br />
    "classes": "caja azul"<br />
},{<br />
    "title": "Texto rojo",<br />
    "type": "inline",<br />
    "classes": "rojo"<br />
}<br />
<hr />
El atributo <em>title</em> define el nombre para el estilo dentro del widget de estilos Atto.<br />
<br />
Un título puede soportar el filtro multilingüe de Moodle (si está habilitado), pero comillas dobles adicionales necesitarán especificarse con una barra invertida.<br />
Por favor, echa un vistazo al fichero README del plugin para ver un ejemplo.<br />
<hr />
El atributo <em>type</em> puede tener dos valores: "block" o "inline".<br />
<br />
"block" creará una etiqueta div con la(s) clase(s) dada(s) y actuará como un elemento estándar a nivel de bloque. Este tomará el control sobre el elemento de nivel de bloque actual y puede que se aplique a más texto que el que está seleccionado.<br />
<br />
"inline" creará una etiqueta span con la(s) clase(s) dada(s) y actuará como un elemento estándar inline. Esto sólo afectará al texto seleccionado.
<hr />
El atributo <em>classes</em> toma el nombre de la clase CSS que se aplicará al texto block / inline.<br />
<br />
Se pueden definir múltiples clases para cada elemento, separadas por un espacio. Todas se aplicarán al texto block / inline.<br />
<br />
Las definiciones de clases CSS no se pueden hacer con este plugin. Tendrás que añadir tus definiciones de clases CSS a tu tema o a los ajustes HTML adicionales de Moodle.
<hr />
En las instalaciones de Moodle con temas basados en bootstrap (especialmente <em>More</em> y <em>Clean</em>, también puedes crear estilos con las clases CSS de bootstrap en lugar de definir tus propias clases.
<br /><br />
Por ejemplo:<br />
{<br />
    "title": "Hero unit box",<br />
    "type": "block",<br />
    "classes": "hero-unit"<br />
},{<br />
    "title": "Well",<br />
    "type": "block",<br />
    "classes": "well"<br />
},{<br />
    "title": "Info text",<br />
    "type": "inline",<br />
    "classes": "label label-info"<br />
},{<br />
    "title": "Warning text",<br />
    "type": "inline",<br />
    "classes": "label label-warning"<br />
}<br /><br />
Para más información sobre las clases bootstrap, por favor visita los siguientes enlaces en la documentación de Bootstrap 2.3:
<ul>
<li><a href="http://getbootstrap.com/2.3.2/components.html#labels-badges">Etiquetas y distintivos Bootstrap</a></li>
<li><a href="http://getbootstrap.com/2.3.2/components.html#alerts">Alertas Bootstrap</a></li>
<li><a href="http://getbootstrap.com/2.3.2/components.html#misc">Clases de ayuda Bootstrap</a></li>
</ul>';
$string['inlinehint'] = 'Seleccione primero un texto para aplicarle este estilo';
$string['jsondecodemessage'] = 'Código JSON ingresado no es válido.';
$string['nostyle'] = 'Sin estilo';
$string['pluginname'] = 'Estilos';
$string['privacy:metadata'] = 'El plugin atto_styles no almacena ningún dato personal.';
$string['settings'] = 'Ajustes de estilos';
