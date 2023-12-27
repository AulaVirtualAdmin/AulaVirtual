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
 * Strings for component 'local_mass_enroll', language 'es', version '4.2'.
 *
 * @package     local_mass_enroll
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['creategroupings'] = 'Crear agrupamiento(s) de ser necesario';
$string['creategroups'] = 'Crear grupo(s) de ser necesario';
$string['email_sent'] = 'se ha enviado un e-mail a {$a}';
$string['enablemassenrol'] = 'Permite la matriculación masiva por parte del administrador del curso';
$string['enablemassenrol_help'] = 'Marque esta opción para permitir extender la matriculación masiva en el árbol de administración del curso';
$string['enablemassunenrol'] = 'Permitir la desmatriculación masiva por parte del administrador del curso';
$string['enablemassunenrol_help'] = 'Marque esta opción para permitir extender la desmatriculación masiva en el árbol de administración del curso';
$string['enroll'] = 'Matricularlos a mi curso';
$string['firstcolumn'] = 'La primera columna contiene';
$string['idnumber'] = 'Número ID';
$string['im:already_in'] = '{$a} ya se encuentra matriculado/a';
$string['im:already_in_g'] = 'ya se encuentra en el grupo {$a}';
$string['im:and_added_g'] = 'y agregado al grupo de Moodle {$a}';
$string['im:enrolled_ok'] = '{$a} matriculado/a';
$string['im:err_opening_file'] = 'error el abrir el archivo {$a}';
$string['im:error_add_g_grp'] = 'error al agregar el grupo {$a->groupe} al agrupamiento {$a->groupe}';
$string['im:error_add_grp'] = 'error al agregar el agrupamiento {$a->groupe} al curso {$a->courseid}';
$string['im:error_addg'] = 'error al agregar el grupo {$a->groupe} al curso {$a->courseid}';
$string['im:error_adding_u_g'] = 'error al agregar el grupo {$a}';
$string['im:error_g_unknown'] = 'error desconocido en el grupo {$a}';
$string['im:error_in'] = 'error al matricular {$a}';
$string['im:error_out'] = 'error al desmatricular {$a}';
$string['im:not_in'] = '{$a} NO fue matriculado';
$string['im:opening_file'] = 'Abriendo archivo: {$a}';
$string['im:stats_g'] = '{$a->nb} grupo(s) creado(s): {$a->what}';
$string['im:stats_grp'] = '{$a->nb} agrupamiento(s) creado(s): {$a->what}';
$string['im:stats_i'] = '{$a} matriculado';
$string['im:stats_ui'] = '{$a} desmatriculado';
$string['im:unenrolled_ok'] = '{$a} desmatriculado';
$string['im:user_unknown'] = '{$a} desconocido - se omite la línea';
$string['im:using_role'] = 'Matriculando usuarios como: {$a}';
$string['localmassenrolldefaults'] = 'Configuración por defecto de matriculación masiva';
$string['localmassenrollextensions'] = 'Configuración del menú de extensiones';
$string['mail_enrolment'] = 'Hola,
Ha matriculado a la siguiente lista de usuarios a su curso \'{$a->course}\'.
Aquí está el reporte de operaciones:
{$a->report}
Atentamente.';
$string['mail_enrolment_subject'] = 'Matriculaciones masivas en {$a}';
$string['mail_unenrolment'] = 'Hola,
Ha desmatriculado la siguiente lista de usuarios de su curso \'{$a->course}\'.
Aquí está el reporte de operaciones:
{$a->report}
Atentamente.';
$string['mail_unenrolment_subject'] = 'Desmatriculación masiva en {$a}';
$string['mailreport'] = 'Enviarme un reporte por e-mail';
$string['mailreportdefault'] = 'Enviar los reportes por defecto';
$string['mailreportdefault_help'] = 'Configurar las opciones por defecto para enviar reportes para los formularios de (des)matriculación masiva';
$string['mass_enroll'] = 'Matriculaciones masivas';
$string['mass_enroll:enrol'] = 'Matricular usuarios a un curso con un archivo CSV';
$string['mass_enroll:unenrol'] = 'Desmatricular usuarios de un curso con un archivo CSV';
$string['mass_enroll_help'] = '<h1>Matriculaciones masivas</h1>

<p>
Con esta opción podrá matricular una lista de usuarios conocidos desde un archivo con una cuenta por línea
</p>
<p>
<b> La primera línea </b> las línas vacías o usuarios no reconocidos serán omitidos. </p>

<p>
El archivo podrá contener una o dos columnas, separadas por una coma, un punto y coma o una tabulación.

Deberá prepararlo con un sistema de hojas de cálculo de su preferencia en base a una lista oficial de estudiantes, por ejemplo,
y añadir si es necesario una columna con los grupos a los cuales desea añadir estos estudiantes. Finalmente deberá exportar el archivo a formato CSV. (*)</p>

<p>
<b> La primer columna debe contener un identificador único </b>: número_ID (por defecto) nombre de usuario o e-mail del usuario. (**). </p>

<p>
La segunda columna <b>si exsiste,</b> deberá contener el nombre del grupo en el que desea incluir a ese usuario. </p>

<p>
Si el nombre del grupo no existe, se creará uno en su curso, junto con un agrupamiento con el mismo nombre al cual será añadido el grupo.<br/>
Esto se debe a que en Moodle, las actividades pueden ser restringidas a agrupamientos (grupo de grupos), no a grupos,
 de esta manera se facilitarán sus tareas. (esto require que los agrupamientos estén habilitados por el administrador del sitio).

<p>
Puede tener en el mismo archivo diferentes grupos o ningún grupo para algunos usuarios
</p>

<p>
Puede desmarcar opciones para crear grupos y agrupamientos si está seguro de que estos ya existen en el curso.
</p>

<p>
Por defecto, los usuarios serán matriculados como estudiantes, pero puede seleccionar otros roles que pueda administrar (profesor, profesor sin permisos de edición
u otros roles)
</p>

<p>
Puede repetir esta operación tantas veces como lo necesite sin correr riesgos, por ejemplo si olvida o escribe incorrectamente el grupo.
</p>


<h2> Ejemplo de archivos </h2>

Números _ID y un grupo para ser creado en el curso (*)
<pre>
"idnumber";"group"
" 2513110";" 4GEN"
" 2512334";" 4GEN"
" 2314149";" 4GEN"
" 2514854";" 4GEN"
" 2734431";" 4GEN"
" 2514934";" 4GEN"
" 2631955";" 4GEN"
" 2512459";" 4GEN"
" 2510841";" 4GEN"
</pre>

Sólo números_ID (**)
<pre>
idnumber
2513110
2512334
2314149
2514854
2734431
2514934
2631955
</pre>

sólo correos electrónicos(**)
<pre>
email
toto@insa-lyon.fr
titi@]insa-lyon.fr
tutu@insa-lyon.fr
</pre>

nombres de usuario y grupos, separados por una tabulación :

<pre>
username	 group
ppollet      groupe_de_test              estará en este grupo
codet        groupe_de_test              también él
astorck      autre_groupe                estará en otro grupo
yjayet                                   ningún grupo para él
                                         las líneas vacías se omiten
unknown                                  los usuarios desconocidos también se omiten
</pre>

<p>
<span <font color=\'red\'>(*) </font></span>: comillas dobles y espacios, agregadas por algunos programas de hojas de cálculo serán eliminadas.
</p>

<p>
<span <font color=\'red\'>(**) </font></span>: las cuentas deben existir en Moodle; este es el caso habitual si Moodle está sincronizado con
algunos directorios externos (LDAP, etc.)
</p>';
$string['mass_enroll_info'] = '<p>
Con esta opción podrá matricular una lista de usuarios conocidos desde un archivo con una cuenta por línea
</p>
<p>
<b> La primera línea </b> las líneas vacías o cuentas desconocidas, serán omitidas. </p>
<p>
El archivo puede contener varias columnas, separadas por una coma, un punto y coma o una tabulación.
<br/>
<b>La primera columna debe contener un identificador único: número_ID (por defecto) nombre de usuario o correo electrónico</b> del usuario. <br/>

La segunda columna <b>si exsiste,</b> deberá contener el nombre del grupo al cual desea añadir los usuarios.<br/>

Puede repetir esta operación tantas veces como lo necesite sin correr riesgos, por ejemplo si olvida o escribe incorrectamente el grupo.
</p>';
$string['mass_unenroll'] = 'Desmatriculación masiva';
$string['mass_unenroll_help'] = '<h1>Desmatriculaciones masivas</h1>

<p>
Con esta opción podrá desmatricular una lista de usuarios conocidos desde un archivo con una cuenta por línea
</p>
<p>
<b> La primera línea </b> las línas vacías o usuarios no reconocidos serán omitidos. </p>

<p>
El archivo podrá contener una o más columnas, separadas por una coma, un punto y coma o una tabulación.

Deberá prepararlo con un sistema de hojas de cálculo de su preferencia en base a una lista oficial de estudiantes, por ejemplo,
exportando el archivo a formato CSV, o usando el mismo archivo utilizado para la matriculación masiva de usuarios. (*)</p>

<p>
<b> La primera columna debe contener un identificador único </b>: número_ID (por defecto) nombre de usuario o correo electrónico del usuario. (**). </p>

<p>
Todas las demás columnas serán ignoradas. </p>

<p>
Por defecto, los usuarios serán matriculados como estudiantes, pero puede seleccionar otros roles que pueda administrar (profesor, profesor sin permisos de edición
u otros roles)
</p>

<p>
Puede repetir esta operación tantas veces como lo necesite sin correr riesgos, por ejemplo si se olvida de desmatricular a algunos estudiantes.
</p>


<p>
<span <font color=\'red\'>(*) </font></span>: comillas dobles y espacios, agregadas por algunos programas de hojas de cálculo serán eliminadas.
</p>

<p>
<span <font color=\'red\'>(**) </font></span>: las cuentas deben existir en Moodle y deben estar matriculadas en este curso.
</p>';
$string['mass_unenroll_info'] = '<p>
Con esta opción podrá desmatricular una lista de usuarios conocidos desde un archivo con una cuenta por línea.
</p>
<p>
<b> La primera línea </b> las líneas vacías o cuentas desconocidas, serán omitidas. </p>
<p>
El archivo puede contener varias columnas, separadas por una coma, un punto y coma o una tabulación.
<br/>
<b>La primera columna debe contener un identificador único: número_ID (por defecto) nombre de usuario o correo electrónico </b> del usuario. <br/>

Otras columnas, si están presentes, serán ignoradas. Por lo tanto el archivo puede ser el mismo que fue utilizado para matricular a los usuarios.<br/>

Puede repetir esta operación tantas veces como lo necesite sin correr riesgos, por ejemplo si se olvida de desmatricular a algunos estudiantes.
</p>';
$string['massenrollsettings'] = 'Configuración de matriculación masiva';
$string['pluginname'] = 'Matriculaciones masivas';
$string['roleassign'] = 'Rol a asignar';
$string['unenroll'] = 'Desmatricularlos de mi curso';
$string['username'] = 'Iniciar sesión';
