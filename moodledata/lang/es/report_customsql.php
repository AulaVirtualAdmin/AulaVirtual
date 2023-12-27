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
 * Strings for component 'report_customsql', language 'es', version '4.2'.
 *
 * @package     report_customsql
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addcategory'] = 'Añadir una nueva categoría';
$string['addcategorydesc'] = 'Para cambiar la categoría de un informe, deberá editar dicho informe. Puede editar los textos de la categoría, eliminar una categoría o añadir una nueva.';
$string['addreport'] = 'Añadir una nueva consulta';
$string['addreportcategory'] = 'Añadir una nueva categoría para los informes';
$string['anyonewhocanveiwthisreport'] = 'Cualquiera que pueda ver este informe (report/customsql__view)';
$string['archivedversions'] = 'Versiones archivadas de esta consulta';
$string['at'] = 'en';
$string['automaticallydaily'] = 'Programada, a diario';
$string['automaticallymonthly'] = 'Programada, el primer día del mes';
$string['automaticallyweekly'] = 'Programada, el primer día de la semana';
$string['availablereports'] = 'Consultas a petición';
$string['availableto'] = 'Disponible para {$a}.';
$string['backtoreportlist'] = 'Volver a la lista de consultas';
$string['category'] = 'Categoría';
$string['categorycontent'] = '({$a->manual} a petición, {$a->daily} a diario, {$a->weekly} cada semana, {$a->monthly} cada mes)';
$string['categoryexists'] = 'Los nombres de las categorías deben ser únicos y este nombre ya existe';
$string['categorynamex'] = 'Nombre de la categoría: {$a}';
$string['changetheparameters'] = 'Cambiar los parámetros';
$string['crontask'] = 'Consultas ad hoc de la base de datos: ejecutar tarea de informes programados';
$string['customdir'] = 'Exportar informe csv a ruta/directorio';
$string['customdir_help'] = 'Los archivos se exportan en formato CSV a la ruta de archivo especificada. Si se especifica un directorio, el formato del nombre de archivo será reportid-timecreated.csv.';
$string['customdirmustexist'] = 'El directorio "{$a}" no existe.';
$string['customdirnotadirectory'] = 'La ruta "{$a}" no es un directorio.';
$string['customdirnotwritable'] = 'No se puede escribir en el directorio "{$a}".';
$string['customsql:definequeries'] = 'Definir consultas personalizadas';
$string['customsql:managecategories'] = 'Definir categorías personalizadas';
$string['customsql:view'] = 'Ver informe de consultas personalizadas';
$string['dailyheader'] = 'A diario';
$string['dailyheader_help'] = 'Estas consultas se ejecutan todos los días automáticamente a la hora especificada. Estos enlaces le permiten ver los resultados acumulados hasta el momento.';
$string['defaultcategory'] = 'Varios';
$string['delete'] = 'Eliminar';
$string['deleteareyousure'] = '¿Está seguro de que desea eliminar esta consulta?';
$string['deletecategoryareyousure'] = '<p>¿Está seguro de que desea eliminar esta categoría? </p><p>No puede contener ninguna consulta.</p>';
$string['deletecategoryx'] = 'Eliminar categoría \'{$a}\'';
$string['deletecategoryyesno'] = '<p>¿Está seguro de que desea eliminar esta categoría? </p>';
$string['deletereportx'] = 'Eliminar consulta \'{$a}\'';
$string['description'] = 'Descripción';
$string['displayname'] = 'Nombre de la consulta';
$string['displaynamerequired'] = 'Debe introducir un nombre para la consulta';
$string['displaynamex'] = 'Nombre de la consulta: {$a}';
$string['downloadthisreportas'] = 'Descarga estos resultados como';
$string['downloadthisreportascsv'] = 'Descargar estos resultados en formato CSV';
$string['edit'] = 'Añadir/editar';
$string['editcategory'] = 'Actualizar categoría';
$string['editcategoryx'] = 'Editar categoría \'{$a}\'';
$string['editingareport'] = 'Edición de una consulta ad hoc de la base de datos';
$string['editreportx'] = 'Editar consulta \'{$a}\'';
$string['emailbody'] = 'Estimado {$a}:';
$string['emailink'] = 'Para acceder al informe, haga clic en este enlace: {$a}';
$string['emailnumberofrows'] = 'Solo el número de filas y el enlace';
$string['emailresults'] = 'Poner los resultados en el cuerpo del correo electrónico';
$string['emailrow'] = 'El informe detectó {$a} fila.';
$string['emailrows'] = 'El informe detectó {$a} filas.';
$string['emailsent'] = 'Se ha enviado una notificación de correo electrónico a {$a}';
$string['emailsentfailed'] = 'No se puede enviar el correo electrónico a {$a}';
$string['emailsubject'] = 'Consulta {$a}';
$string['emailsubject1row'] = 'Consulta {$a} [1 fila]';
$string['emailsubjectnodata'] = 'Consulta {$a} [sin resultados]';
$string['emailsubjectxrows'] = 'Consulta {$a->name} [{$a->rows} filas]';
$string['emailto'] = 'Enviar por correo electrónico automáticamente a';
$string['emailwhat'] = 'Qué enviar por correo electrónico';
$string['enterparameters'] = 'Introducir los parámetros de la consulta ad hoc de la base de datos';
$string['errordeletingcategory'] = '<p>Error al eliminar una categoría de consulta.</p><p>Deberá estar vacía para eliminarla.</p>';
$string['errordeletingreport'] = 'Error al eliminar una consulta.';
$string['errorinsertingreport'] = 'Error al introducir una consulta.';
$string['errorupdatingreport'] = 'Error al actualizar una consulta.';
$string['invalidreportid'] = 'ID {$a} de la consulta no válido.';
$string['lastexecuted'] = 'Esta consulta se ejecutó por última vez el {$a->lastrun}. Se ejecutó en {$a->lastexecutiontime} s.';
$string['managecategories'] = 'Administrar categorías del informe';
$string['manual'] = 'A petición';
$string['manualheader'] = 'A petición';
$string['manualheader_help'] = 'Estas consultas se ejecutan a petición al hacer clic en el enlace para ver los resultados.';
$string['messageprovider:notification'] = 'Notificaciones de consulta de base de datos ad-hoc';
$string['monthlyheader'] = 'Mensuales';
$string['monthlyheader_help'] = 'Estas consultas se ejecutan automáticamente el primer día del mes para informar sobre el mes anterior. Estos enlaces le permiten ver los resultados acumulados hasta el momento.';
$string['monthlynote_help'] = 'Estas consultas se ejecutan automáticamente el primer día del mes para informar sobre el mes anterior. Estos enlaces le permiten ver los resultados acumulados hasta el momento.';
$string['morethanonerowreturned'] = 'Se ha devuelto más de una fila. Esta consulta debería devolver una fila.';
$string['nodatareturned'] = 'Esta consulta no ha devuelto ningún dato.';
$string['noexplicitprefix'] = 'No incluya el prefijo del nombre de la tabla <tt>{$a}</tt> en SQL. En su lugar, introduzca el nombre de la tabla sin prefijo en el interior de los caracteres <tt>{}</tt>.';
$string['noreportsavailable'] = 'No hay ninguna consulta disponible';
$string['norowsreturned'] = 'No se ha devuelto ninguna fila. Esta consulta debería devolver una fila.';
$string['noscheduleifplaceholders'] = 'Las consultas que contienen marcadores de posición solo se pueden ejecutar a petición.';
$string['nosemicolon'] = 'En SQL no se permite utilizar el carácter ;';
$string['notallowedwords'] = 'En SQL no se permite utilizar las palabras <tt>{$a}</tt>.';
$string['note'] = 'Notas';
$string['notrunyet'] = 'Todavía no se ha ejecutado esta consulta.';
$string['onerow'] = 'La consulta ha devuelto una fila, acumular los resultados de una fila cada vez.';
$string['parametervalue'] = '{$a->name}: {$a->value}';
$string['pluginname'] = 'Consultas ad hoc de la base de datos';
$string['privacy:metadata'] = 'El complemento de consultas de bases de datos Ad-hoc no almacena ningún dato personal.';
$string['privacy:metadata:reportcustomsqlqueries'] = 'Consultas de bases de datos ad-hoc';
$string['privacy:metadata:reportcustomsqlqueries:at'] = 'La hora del informe diario.';
$string['privacy:metadata:reportcustomsqlqueries:capability'] = 'La capacidad que un usuario debe tener para ejecutar este informe';
$string['privacy:metadata:reportcustomsqlqueries:categoryid'] = 'El ID de categoría de la tabla report_customsql_categories';
$string['privacy:metadata:reportcustomsqlqueries:customdir'] = 'Exportar informe csv a ruta/directorio';
$string['privacy:metadata:reportcustomsqlqueries:description'] = 'Una descripción legible por humanos de la consulta.';
$string['privacy:metadata:reportcustomsqlqueries:descriptionformat'] = 'Formato de texto de descripción de consulta';
$string['privacy:metadata:reportcustomsqlqueries:displayname'] = 'El nombre del informe como se muestra en la interfaz de usuario (UI)';
$string['privacy:metadata:reportcustomsqlqueries:emailto'] = 'Una lista separada por comas de ID de usuario';
$string['privacy:metadata:reportcustomsqlqueries:emailwhat'] = 'Una lista de opciones de correo electrónico en un menú de selección';
$string['privacy:metadata:reportcustomsqlqueries:lastexecutiontime'] = 'Tiempo que tardó en ejecutarse este informe la última vez que se ejecutó, en milisegundos';
$string['privacy:metadata:reportcustomsqlqueries:lastrun'] = 'Cuándo se ejecutó este informe por última vez';
$string['privacy:metadata:reportcustomsqlqueries:querylimit'] = 'Limitar el número de resultados devueltos';
$string['privacy:metadata:reportcustomsqlqueries:queryparams'] = 'Los parámetros SQL para generar este informe';
$string['privacy:metadata:reportcustomsqlqueries:querysql'] = 'El SQL a ejecutar para generar este informe';
$string['privacy:metadata:reportcustomsqlqueries:runable'] = 'Ejecutable \'manual\', \'semanal\' o \'mensual\'';
$string['privacy:metadata:reportcustomsqlqueries:singlerow'] = 'Solo tiene sentido configurar estos informes programados. Significa que el informe solo puede devolver una fila de datos, y el informe genera una fila a la vez.';
$string['privacy:metadata:reportcustomsqlqueries:timecreated'] = 'Tiempo creado';
$string['privacy:metadata:reportcustomsqlqueries:timemodified'] = 'Hora modificada';
$string['privacy:metadata:reportcustomsqlqueries:usermodified'] = 'Usuario modificado';
$string['privacy_somebodyelse'] = 'Alguien más';
$string['privacy_you'] = 'Usted';
$string['query_deleted'] = 'Consulta eliminada';
$string['query_edited'] = 'Consulta editada';
$string['query_viewed'] = 'Consulta visualizada';
$string['queryfailed'] = 'Error al ejecutar la consulta: {$a}';
$string['querylimit'] = 'Limitar las filas devueltas';
$string['querylimitdefault'] = 'Límite predeterminado de filas devueltas';
$string['querylimitdefault_desc'] = 'Para evitar accidentes en los que una consulta devuelva una gran cantidad de filas que podrían sobrecargar el servidor, cada consulta tiene un límite en la cantidad de filas que puede devolver. Este es el valor predeterminado para ese límite para consultas nuevas.';
$string['querylimitmaximum'] = 'Límite máximo permitido de filas devueltas';
$string['querylimitmaximum_desc'] = 'Este es el límite máximo absoluto de filas devueltas que un autor de consultas puede establecer.';
$string['querylimitrange'] = 'El número debe estar comprendido entre 1 y {$a}';
$string['querynote'] = '<ul>
<li>El token <tt>%%WWWROOT%%</tt>de los resultados se sustituirá por <tt>{$a}</tt>.</li>
<li>Cualquier valor de salida que parezca una URL se convertirá automáticamente en un enlace.</li>
<li>Si el nombre de una columna en los resultados termina con la <tt>fecha</tt> de los caracteres y la columna contiene valores enteros , se considerarán marcas de tiempo Unix y se convertirán automáticamente a fechas en lenguaje natural.</li>
<li>El token <tt>%%USERID%%</tt> de la consulta se sustituirá por el ID de usuario del usuario que esté visualizando el informe antes de que se ejecute el informe.</li>
<li>Para los informes programados, los tokens <tt>%%STARTTIME%%</tt> y <tt>%%ENDTIME%%</tt> se sustituyen por la marca de tiempo Unix del principio y el final de la semana/mes sobre los que se elabora el informe en la consulta antes de ejecutarse.</li>
<li>Puede introducir parámetros en SQL utilizando marcadores de posición con nombre, por ejemplo <tt>:parameter_name</tt>. Después, cuando se ejecute el informe, el usuario puede introducir los valores de los parámetros que se utilizarán al ejecutar la consulta.</li>
<li>Si <tt>:parameter_name</tt> comienza o termina con la <tt>fecha</tt> de los caracteres, se utilizará un selector de fecha/hora para introducir dicho valor; de lo contrario, se utilizará un cuadro de texto sin formato.</li>
<li>No puede utilizar los caracteres <tt>:</tt> ni <tt>?</tt> en las cadenas de su consulta. Si los necesitase, puede utilizar <tt>CHR(58)</tt> y <tt>CHR(63)</tt> respectivamente, además de la concatenación de cadenas. (<tt>CHR</tt> para Postgres u Oracle, <tt>CHAR</tt> para MySQL o SQL server.)</li>
</ul>';
$string['queryparameters'] = 'Parámetros de consulta';
$string['queryparams'] = 'Introduzca los valores predeterminados para los parámetros de consulta.';
$string['queryparamschanged'] = 'Han cambiado los marcadores de posición de la consulta.';
$string['queryrundate'] = 'fecha de ejecución de la consulta';
$string['querysql'] = 'Consulta de SQL';
$string['querysqlrequried'] = 'Deberá introducir alguna SQL.';
$string['recordcount'] = 'Este informe tiene {$a} filas.';
$string['recordlimitreached'] = 'Esta consulta ha alcanzado el límite de {$a} filas. Puede que se hayan omitido algunas filas del final.';
$string['reportfor'] = 'Consulta ejecutada el {$a}';
$string['requireint'] = 'Se necesita un valor entero';
$string['runable'] = 'Ejecutar';
$string['runablex'] = 'Ejecutar: {$a}';
$string['runquery'] = 'Ejecutar consulta';
$string['schedulednote'] = 'Estas consultas se ejecutan automáticamente el primer día del mes o la semana para informar sobre el mes o la semana anterior. Estos enlaces le permiten ver los resultados acumulados hasta el momento.';
$string['scheduledqueries'] = 'Consultas programadas';
$string['startofweek'] = 'Día para ejecutar informes semanales';
$string['startofweek_default'] = 'Usar el inicio de la semana del calendario del sitio ({$a})';
$string['startofweek_desc'] = 'Este es el día que debería considerarse cómo primer día de la semana para los informes semanales programados.';
$string['timecreated'] = '<span class="font-weight-bold">Hora de creación:</span> {$a}';
$string['timemodified'] = '<span class="font-weight-bold">Última modificación:</span> {$a}';
$string['typeofresult'] = 'Tipo de resultado';
$string['unknowndownloadfile'] = 'Archivo de descarga desconocido.';
$string['userhasnothiscapability'] = 'El usuario \'{$a->username}\' no tiene capacidad de \'{$a->capability}\'. Elimine este usuario de la lista o cambie la elección en \'{$a->whocanaccess}\'.';
$string['userinvalidinput'] = 'Entrada no válida, es necesario un listado de nombres de usuario separados por coma';
$string['usermodified'] = '<span class="font-weight-bold">Modificado por:</span> {$a}';
$string['usernotfound'] = 'El usuario con el nombre \'{$a}\' no existe';
$string['userswhocanconfig'] = 'Solo administradores (moodle/site:config)';
$string['userswhocanviewsitereports'] = 'Usuarios que pueden ver los informes del sistema (moodle/site:viewreports)';
$string['verifyqueryandupdate'] = 'Verificar el texto de la consulta de SQL y actualizar el formulario';
$string['weeklyheader'] = 'Semanal';
$string['weeklyheader_help'] = 'Estas consultas se ejecutan automáticamente el primer día de la semana para informar sobre la semana anterior. Estos enlaces le permiten ver los resultados acumulados hasta el momento.';
$string['whocanaccess'] = 'Quién puede acceder a esta consulta';
