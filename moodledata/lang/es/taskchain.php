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
 * Strings for component 'taskchain', language 'es', version '4.2'.
 *
 * @package     taskchain
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['abandoned'] = 'Abandonado';
$string['activitycloses'] = 'Actividad Taskchain cierra';
$string['activitygrade'] = 'Calificación de actividad';
$string['activityname'] = 'Nombre de actividad';
$string['activityopens'] = 'Actividad Taskchain abre';
$string['added'] = 'Añadida';
$string['addtasks'] = 'Añadir (más) tareas';
$string['addtype'] = 'Archivos a ser añadidos';
$string['addtypeauto'] = 'Detectado automáticamente';
$string['addtypechainfile'] = 'Añadir todos los archivos enlistados en el archivo seleccionado';
$string['addtypechainfolder'] = 'Añadir todos los archivos en la carpeta seleccionada';
$string['addtypechainfolders'] = 'Añadir todos los archivos en todas las carpetas';
$string['addtypetaskchain'] = 'Añadir cadena empezando en la fila seleccionada';
$string['addtypetaskfile'] = 'Añadir solamente el archivo seleccionado';
$string['afterattempt'] = 'Después del intento';
$string['afterclose'] = 'Después de cerrar';
$string['aftertaskid'] = 'Después de tarea';
$string['aftertaskid_help'] = 'Después de la tarea';
$string['allowfreeaccess'] = 'Permitir el acceso libre';
$string['allowfreeaccess_help'] = 'Este ajuste especifica si se da acceso libre o no a las tareas de la Tarea en Cadena a los estudiantes.

Una vez que los estudiantes tienen acceso libre, pueden acceder a cualquier tarea en la Tarea en Cadena, sin importar las condiciones previas ni posteriores de las tareas.

**No**
: No se dará acceso libre a las tareas de la Tarea en Cadena a los estudiantes. En otras palabras, el acceso a las tareas estará controlado en todo momento por las condiciones previas y posteriores de las tareas.

**Sí: Calificaciones**
: Se dará acceso libre a las tareas de la Tarea en Cadena a los estudiantes una vez que consiguen la calificación necesaria.

**Sí: Intentos**
: Se dará acceso libre a las tareas de la Tarea en Cadena a los estudiantes una vez que completen el número de intentos necesarios.';
$string['allowpaste'] = 'Permitir pegar';
$string['allowpaste_help'] = 'Si este ajuste está habilitado se permitirá a los alumnos copiar, pegar y arrastrar texto en los cuadros de entrada de texto.';
$string['allowresume'] = 'Permitir reanudar';
$string['allowresume_help'] = 'Este ajuste indica si los estudiantes pueden o no reanudar un intento.

**No**
: Los intentos no pueden reanudarse.

**Sí**
: Se ofrecerá a los estudiantes la posibilidad de reanudar cualquier intento previo que estuviera en progreso o empezar un nuevo intento.

**Forzar**
: Si hay algún intento previo que estuviera aún en progreso, se obligará a los estudiantes a que reanuden ese intento. En caso contrario podrán empezar un nuevo intento.';
$string['allowreview'] = 'Permitir revisión';
$string['allowreview_help'] = 'Si está habilitado los estudiantes podrán revisar los intentos de las tareas después de que las tareas se hayan cerrado.';
$string['allpostconditions'] = 'Todas las condiciones posteriores.';
$string['allpreconditions'] = 'Todas las condiciones previas.';
$string['answers'] = 'Respuestas';
$string['answersshort'] = 'R';
$string['anyattempts'] = 'Cualquier intento';
$string['anygroup'] = 'Cualquier grupo';
$string['applydefaults'] = 'Aplicar los valores por defecto seleccionados';
$string['assessment_help'] = 'Los ajustes de evaluación para las cadenas y tareas de Tarea en Cadena definen lo siguiente:

<ul>
<li>como se combinan los intentos de tareas para formar una puntuación única de la tarea</li>
<li>la contribución de la puntuación de la tarea a la calificación en un sólo intento de la cadena</li>
<li>como se combinan las calificaciones de los intentos de cadenas para obtener una puntuación única de la cadena</li>
</ul>

**Puntuaciones de los intentos de tarea**
Las puntuaciones de los intentos de tarea son normalizados utilizando los siguientes cálculos:

<table border="0"><tbody><tr>
<td align="center" valign="middle">
<tt>(puntuación del intento - puntuación mínima)</tt>
<tt>------------------------------</tt><br >
<tt>puntuación máxima</tt>
</td>
<td align="center" valign="middle"><big><big>   X   </big></big></td>
<td align="center" valign="middle">
<tt>límite de puntuación</tt>
<tt>-----------</tt><br >
<tt>100</tt>
</td>
</tr></tbody></table>

**Puntuación de la tarea**
Dependiendo del método de puntuación elegido para la tarea, la puntuación para la tarea será la primera, la última, la más alta o la media de las puntuaciones normalizadas de los intentos de tarea.

Las puntuaciones de la tarea son después ponderadas utilizando los siguientes cálculos:

<table border="0"><tbody><tr>
<td align="center" valign="middle">
<tt>puntuación de tarea</tt>
</td>
<td align="center" valign="middle"><big><big>   X   </big></big></td>
<td align="center" valign="middle">
<tt>puntuación ponderada</tt>
<tt>--------------</tt><br >
<tt>100</tt>
</td>
</tr></tbody></table>

**Calificación del intento de la cadena**
La calificación del intento de la cadena será el total, la más alta o la última de las puntuaciones ponderadas de la tarea, dependiendo del método elegido para las calificaciones de los intentos de cadena.

**Calificación de la cadena**
La calificación de la cadena será la primera, la última, la más alta o la media de las calificaciones de los intentos de la cadena, dependiendo del método elegido para las calificaciones de cadena.

Por último, la calificación se pondera de acuerdo a los siguientes cálculos:

<table border="0"><tbody><tr>
<td align="center" valign="middle">
<tt>calificación de la cadena</tt>
</td>
<td align="center" valign="middle"><big><big>   X   </big></big></td>
<td align="center" valign="middle">
<tt>calificación ponderada</tt>
<tt>-----------</tt><br >
<tt>100</tt>
</td>
</tr></tbody></table>';
$string['assessmenthdr'] = 'Evaluación';
$string['attemptcount'] = 'Cuenta de intentos';
$string['attemptcount_help'] = 'Se está habilitado, este ajuste indica el máximo o el mínimo número de intentos que deben satisfacer las condiciones de puntuación y duración.

**>=** (mayor o igual que)
El mínimo número de intentos que deben satisfacer las condiciones de puntuación y duración.

**<=** (menor o igual que)
El máximo número de intentos que deben satisfacer las condiciones de puntuación y duración.';
$string['attemptdelay'] = 'Retraso del intento';
$string['attemptdelay_help'] = 'Si está habilitado, este ajuste indica el mínimo o máximo retraso entre intentos que satisfacen las condiciones de puntuación y recuento.

**>=** (mayor o igual que)
El mínimo retraso entre intentos que satisfacen las condiciones de puntuación y recuento.

**<=** (menor o igual que)
El máximo retraso entre intentos que satisfacen las condiciones de puntuación y recuento.';
$string['attemptduration'] = 'Duración del intento';
$string['attemptduration_help'] = 'Si está habilitado, este ajuste indica la duración mínima o máxima de los intentos que satisfacen las condiciones de puntuación y recuento.

**>=** (mayor o igual que)
La duración mínima de los intentos que deben satisfacer las condiciones de puntuación y recuento.

**<=** (menor o igual que)
La duración máxima de los intentos que deben satisfacer las condiciones de puntuación y recuento.';
$string['attempted'] = 'Intentado';
$string['attemptgrade'] = 'Calificación del intento';
$string['attemptgrademethod'] = 'Método de calificación del intento';
$string['attemptgrademethod_help'] = 'Este ajuste define cómo se calcula la calificación para un único intento en esta actividad de Tarea en Cadena.

**Total**
: La calificación del intento será la suma de las calificaciones de tarea ponderadas.

**La más alta**
: La calificación del intento será la más alta de las calificaciones de tarea ponderadas.

**Última**
: La calificación del intento será la puntuación ponderada de la última tarea intentada.

**Última (completada)**
: La calificación del intento será la puntuación ponderada de la última tarea intentada cuyo estado sea "completada". Otras puntuaciones de tarea serán ignoradas.

**Última (caducada)**
: La calificación del intento será la puntuación ponderada de la última tarea intentada cuyo estado sea "completada" o "caducada". Otras puntuaciones de tarea serán ignoradas.

**Última (abandonada)**
: La calificación del intento será la puntuación ponderada de la última tarea intentada cuyo estado sea "completada" o "caducada" o "abandonada". Las tareas cuyo estado sea "en progreso" serán ignoradas.';
$string['attemptlimit'] = 'Límite de intentos';
$string['attemptlimit_help'] = 'El número máximo de intentos que un estudiante puede tener en esta actividad de Tarea en Cadena.';
$string['attemptnumber'] = 'Número de intento';
$string['attempts'] = 'Intentos';
$string['attemptsallowed'] = 'Intentos permitidos';
$string['attemptscore'] = 'Puntuación del intento';
$string['attemptshdr'] = 'Restricciones del intento';
$string['attemptsunlimited'] = 'Intentos ilimitados';
$string['attempttasknow'] = 'Intentar tarea ahora';
$string['attempttype'] = 'Tipo de intento';
$string['attempttype_help'] = 'Este ajuste indica el tipo de intentos que se tendrán en cuenta para la condición de recuento de intentos.

**Cualquier intento**
Cualquier intento se tendrá en cuenta.

**Intentos más recientes**
Sólo se considerarán los intentos más recientes.

**Intentos consecutivos**
Cualquier bloque de intentos consecutivos se tendrá en cuenta.';
$string['average'] = 'Media';
$string['averagegrade'] = 'Calificación media';
$string['averagescore'] = 'Puntuación media';
$string['bodystyles'] = 'Estilos del cuerpo';
$string['bodystylesbackground'] = 'Imagen y color de fondo';
$string['bodystylescolor'] = 'Color de texto';
$string['bodystylesfont'] = 'Tamaño y familia de la fuente';
$string['bodystylesmargin'] = 'Márgenes izquierdo y derecho';
$string['cacherecords'] = 'Registros cache de la Tarea en Cadena';
$string['cannotread'] = 'No se puede leer el fichero (o el fichero está vacío):{$a}';
$string['canrestartchain'] = 'Sus resultados hasta ahora se guardarán pero si quiere volver a hacer esta actividad más tarde tendrá que empezar desde el principio.';
$string['canrestarttask'] = 'Sus resultados hasta ahora se guardarán y podrá volver a hacer "{$a}" más tarde';
$string['canresumetask'] = 'Sus resultados hasta ahora se guardarán y podrá reanudar "{$a}" más tarde.';
$string['chain'] = 'Actividad de Tarea en Cadena';
$string['chainattempt'] = 'Intento de cadena';
$string['chainattemptnotinprogress'] = 'El intento de cadena no está en progreso';
$string['chainclosed'] = 'Disculpe, esta actividad se cerró el {$a}';
$string['chaingrade'] = 'Calificación de la cadena';
$string['chainname_help'] = 'El nombre de esta actividad de Tarea en Cadena que se mostrará en la página del curso';
$string['chainnotavailable'] = 'Lo sentimos, esta actividad no está disponible para usted hasta {$a}.';
$string['chainrequirepasswordmessage'] = 'Para intentar esta actividad necesita conocer la contraseña';
$string['checks'] = 'Selecciones';
$string['checksomeboxes'] = 'Por favor seleccione alguna opción';
$string['classreports'] = 'Informes de clase';
$string['clearcache'] = 'Limpiar cache de Tarea en Cadena';
$string['cleardetails'] = 'Limpiar detalles de Tarea en Cadena';
$string['clearedcache'] = 'Se ha limpiado la cache de Tarea en Cadena';
$string['cleareddetails'] = 'Se han limpiado los detalles de Tarea en Cadena';
$string['clickreporting'] = 'Habilitar informes de clics';
$string['clickreporting_help'] = 'Si está habilitado, se mantendrá un registro a parte que contará cada vez que un botón de "indicio", "pista", o "comprobar" sea pulsado. Esto permite al profesor ver un informe detallado que muestra el estado de la tarea a cada clic. En otro caso sólo se mantendrá un registro por cada intento en una tarea.';
$string['clues'] = 'Pistas';
$string['cnumber'] = 'Intento de cadena';
$string['columnlist'] = 'Lista de columnas {$a}';
$string['columnlistid'] = 'Mostrar columnas';
$string['columnlistid_help'] = 'Este menú permite seleccionar que conjunto de columnas se muestran en esta página';
$string['columnlistschain'] = 'Todas las listas de columnas de la cadena';
$string['columnlistschains'] = 'Listas de columnas para editar cadenas';
$string['columnliststask'] = 'Todas las listas de columnas de tareas';
$string['columnliststasks'] = 'Listas de columnas para editar tareas';
$string['completed'] = 'Completado';
$string['completedalltasks_close'] = 'Si quiere terminar y cerrar este intento haga clic en el botón de abajo. <br />Tenga en cuenta que no podrá volver a hacer tareas en este intento después de que haya sido cerrado.';
$string['completedalltasks_redo'] = 'Si quiere volver a hacer una de las tareas en esta actividad haga clic en la tarea en la lista de abajo.';
$string['completedalltasks_title'] = '¡Enhorabuena!<br />Ha completado todas las tareas de esta actividad.';
$string['completioncompleted'] = 'Requerir estado completado';
$string['completionmingrade'] = 'Requerir calificación mínima';
$string['completionpass'] = 'Requerir calificación de aprobado';
$string['completionwarning'] = 'Estos campos están deshabilitados si la calificación límite para esta actividad es "Sin calificación" o la ponderación de la calificación es "Sin ponderación"';
$string['conditions'] = 'Condiciones';
$string['conditionscore'] = 'Condición de puntuación';
$string['conditionscore_help'] = 'Si está habilitado, este ajuste especifica la puntuación máxima o mínima con la que se satisface esta condición.

**>=** (mayor o igual que)
La puntuación mínima con la que se satisface la condición

**<=** (menor o igual que)
La puntuación máxima con la que se satisface la condición';
$string['conditiontaskid'] = 'Condición de tarea';
$string['conditiontaskid_help'] = 'Este ajuste especifica la tarea a la que hace referencia esta condición previa.

**Tarea previa**
Esta condición se refiere a la tarea previa en esta cadena de acuerdo con el orden de clasificación.

**Tarea específica**
El profesor puede seleccionar una tarea específica a la que se refiera esta condición previa.
Para evitar confusiones creadas por tareas con nombres idénticos, se adjuntan los números de ordenación de las tareas a sus nombres.';
$string['configbodystyles'] = 'Por defecto, los estilos de Tema de Moodle anularán los estilos de actividad de TaskChain. Sin embargo, para cualquier estilo aquí seleccionado, a los estilos de actividad TaskChain, incluyendo aquellos definidos en archivos de fuentes de tareas, tales como los archivos de Hot Potatoes, se les dará prioridad por sobre de los estilos de los temas de Moodle.';
$string['configenablecache'] = 'Manteniendo una caché de las tareas TaskChain puede acelerar drásticamente el proporcionarles tareas a los estudiantes.';
$string['configenablecron'] = 'Especifique las horas en su zona horaria en las que puede correr el script de cron para TaskChain';
$string['configenablemymoodle'] = 'Esta configuración controla si es que las TaskChains son listadas o no en la página de Mi Moodle';
$string['configenableobfuscate'] = 'Ofuscar el código javascript para que al insertar reproductores multimedia dificulte el determinar el nombre del archivo multimedia y su contenido.';
$string['configenableswf'] = 'Permitir incrustar los archivos SWF en actividades taskChain. Si se habilita, esta configuración anula  filter_mediaplugin_enable_swf.';
$string['configfile'] = 'Archivo de configuración';
$string['configfilenotfound'] = 'Archivo de configuración no encontrado: {$a}';
$string['configframeheight'] = 'Cuando una tarea se muestra dentro de un marco, este valor es la altura (en pixeles) del marco superior que contiene la barra de navegación de Moodle.';
$string['configlocation'] = 'Ubicación del archivo de configuración';
$string['configlocation_help'] = 'La ubicación del archivo de configuración.';
$string['configlockframe'] = 'Si se habilita esta configuración, entonces el marco de navegación, si se usa, estará bloqueado de forma que no pueda desplazarse, ni cambiarse de tamaño, y que no tenga borde.';
$string['configmaxeventlength'] = 'Si una cadena TaskChain tiene tanto hora de apertura como hora de cierre especificadas, y la diferencia entre ambas es mayor que el número de días aquí especificados, entonces se añadirán dos eventos de calendario separados al calendario del curso. Para duraciones más cortas, o cuando solamente se especifica una hora, solamente se añadirá un evento de calendario. Si no se especifica ninguna de las dos horas, no se añadirá evento alguno de calendario.';
$string['configstoredetails'] = 'Si esta configuración está habilitada, entonces los detalles XML crudos de los intentos en tareas TaskChain se almacenarán en la tabla taskchain_details. Esto permite que los intentos de tareas sean re-calificados en el futuro para reflejar cambios en el sistema de puntuación de tareas de TaskChain. Sin embargo, habilitar esta opción en un sitio concurrido causará que la tabla taskchain_details crezca muy rápidamente.';
$string['confirmdeleteallpostconditions'] = '¿Está Usted seguro de querer eliminar TODAS las post-condiciones?';
$string['confirmdeleteallpreconditions'] = '¿Está Usted seguro de querer eliminar TODAS las pre-condiciones?';
$string['confirmdeleteattempts'] = '¿Está Usted seguro de querer eliminar los intentos seleccionados?';
$string['confirmdeletechainscolumnlist'] = '¿Está Usted seguro de querer eliminar esta lista de columna de cadena: {$a} ?';
$string['confirmdeletechainscolumnlists'] = '¿Está Usted seguro de querer eliminar TODAS las listas de columnas de cadena?';
$string['confirmdeletepostcondition'] = '¿Está Usted seguro de querer eliminar esta post-condición?';
$string['confirmdeleteprecondition'] = '¿Está Usted seguro de querer eliminar esta pre-condición?';
$string['confirmdeletetask'] = '¿Está Usted seguro de querer eliminar esta tarea?';
$string['confirmdeletetaskscolumnlist'] = '¿Está Usted seguro de querer eliminar esta lista de columna de tarea: {$a} ?';
$string['confirmdeletetaskscolumnlists'] = '¿Está Usted seguro de querer eliminar TODAS las listas de columnas de tarea?';
$string['confirmregradeattempts'] = '¿Está Usted seguro de querer re-calificar los intentos seleccionados?';
$string['confirmstop'] = '¿Está Usted seguro de querer navagar lejos de esta página?';
$string['consecutiveattempts'] = 'Intentos consecutivos';
$string['correct'] = 'Correcto';
$string['couldnotinsertsubmissionform'] = 'No se pudo insertar el formato de envío';
$string['d_index'] = 'Índice de diferenciación';
$string['delay'] = 'Espera';
$string['delay1'] = 'Espera 1';
$string['delay1_help'] = 'La espera mínimo entre el primer intento y el segundo.';
$string['delay1summary'] = 'Tiempo de espera entre el primer intento y el segundo';
$string['delay2'] = 'Espera 2';
$string['delay2_help'] = 'La espera mínimo entre intentos después del segundo intento.';
$string['delay2summary'] = 'Tiempo de espera entre intentos posteriores';
$string['delay3'] = 'Espera 3';
$string['delay3afterok'] = 'Esperar hasta que el estudiante elija OK';
$string['delay3disable'] = 'No continuar automáticamente';
$string['delay3specific'] = 'Usar retraso de tiempo específico';
$string['delay3summary'] = 'Tiempo de espera al final de la tarea';
$string['delay3template'] = 'Usar configuraciones en archivo de orígen/plantilla';
$string['deleteallattempts'] = 'Eliminar todos los intentos';
$string['deleteallcolumnlistschain'] = 'Eliminar TODAS las listas de columna de cadena';
$string['deleteallcolumnliststask'] = 'Eliminar TODAS las listas de columna de tarea';
$string['deleteallpostconditions'] = 'Eliminar TODAS las post-condiciones';
$string['deleteallpreconditions'] = 'Eliminar TODAS las pre-condiciones';
$string['deleteattempts'] = 'Eliminar intentos';
$string['deletecolumnlistchain'] = 'Eliminar lista de columna de cadena: {$a}';
$string['deletecolumnlisttask'] = 'Eliminar lista de columna de tarea: {$a}';
$string['deletepostcondition'] = 'Eliminar una post-condición';
$string['deleteprecondition'] = 'Eliminar una condición previa';
$string['deletetasks'] = 'Eliminar las tareas seleccionadas';
$string['detailsrecords'] = 'Registros detallados de la Tarea en Cadena';
$string['discarddetails'] = 'Descartar detalles';
$string['discarddetails_help'] = 'Si el ajuste está configurado como "Sí", los detalles XML de cada intento en esta tarea serán descartados, de lo contrario los detalles XML serán almacenados en la base de datos para su consulta.';
$string['duration'] = 'Duración';
$string['duringattempt'] = 'Durante el intento';
$string['editchains'] = 'Editar cadenas';
$string['editcolumnlistschain'] = 'Editar columnas para las cadenas en las Tareas en Cadena';
$string['editcolumnliststask'] = 'Editar columnas para las tareas en las Tareas en Cadena';
$string['edittasks'] = 'Editar tareas';
$string['enablecache'] = 'Habilitar cache de la Tarea en Cadena';
$string['enablecron'] = 'Habilitar cron de la Tarea en Cadena';
$string['enablemymoodle'] = 'Mostrar Tareas en Cadena';
$string['enableobfuscate'] = 'Habilitar ofuscación de texto y de reproductores multimedia';
$string['enableswf'] = 'Habilitar la incrustación de ficheros SWF en las actividades de Tareas en Cadena';
$string['endofchain'] = 'Fin de la cadena';
$string['entry_attempts'] = 'Intentos';
$string['entry_dates'] = 'Fechas';
$string['entry_grading'] = 'Calificar';
$string['entry_title'] = 'Nombre de la cadena como título';
$string['entrycm'] = 'Actividad previa';
$string['entrycm_help'] = 'Este ajuste determina una actividad Moodle y una puntuación mínima para esa actividad que debe alcanzarse antes de intentar esta actividad de Tarea en Cadena.

El profesor puede seleccionar una actividad específica o una de las siguientes opciones generales de ajuste:

* Actividad previa en este curso
* Actividad previa en esta sección
* Actividad previa calificada en este curso
* Actividad previa calificada en esta sección
* Tarea en Cadena previa en este curso
* Tarea en Cadena previa en esta sección';
$string['entrycmcourse'] = 'Actividad previa en este curso';
$string['entrycmsection'] = 'Actividad previa en esta sección del curso';
$string['entrycompletionwarning'] = 'Antes de empezar esta actividad debes revisar {$a}.';
$string['entrygrade'] = 'Calificación de la actividad previa';
$string['entrygradedcourse'] = 'Actividad previa calificada en este curso';
$string['entrygradedsection'] = 'Actividad previa calificada en esta sección del curso';
$string['entrygradewarning'] = 'No puede empezar esta actividad hasta que obtenga una puntuación del {$a->entrygrade}% en {$a->entryactivity}. Actualmente su puntuación para esa actividad es {$a->usergrade}%.';
$string['entryoptions'] = 'Opciones de la página de entrada';
$string['entryoptions_help'] = 'Estas casillas de verificación habilitan y deshabilitan la visualización de elementos en la página de entrada de Tarea en Cadena.

**Nombre de la cadena como título**
: si está seleccionada el nombre de la cadena se mostrará como el título de la página de entrada.

**Calificación**
: si está seleccionada la información de calificaciones de la Tarea en Cadena se mostrará en la página de entrada.

**Fechas**
: si está seleccionada las fechas de apertura y cierre de la Tarea en Cadena se mostrarán en la página de entrada.

**Intentos**
: si está seleccionada se mostrará una tabla en la página de entrada con los detalles de intentos previos del usuario en esta Tarea en Cadena. Los intentos que puedan reanudarse tendrán un botón de reanudación en la columna más a la derecha.';
$string['entrypage'] = 'Mostrar página de entrada';
$string['entrypage_help'] = '¿Se debería mostrar a los estudiantes una página inicial antes de empezar una actividad de Tarea en Cadena?

**Sí**
: se mostrará a los estudiantes una página de entrada antes de empezar la Tarea en Cadena. Los contenidos de la página de entrada están definidos en las opciones de página de entrada de Tarea en Cadena.

**No**
: no se mostrará a los estudiantes una página de entrada y empezarán de forma inmediata la Tarea en Cadena.

Al profesor siempre se le mostrará una página de entrada para proporcionarle acceso a los informes y poder editar la página de tareas';
$string['entrypagehdr'] = 'Página de entrada';
$string['entrytaskchaincourse'] = 'Tarea en Cadena previa en este curso';
$string['entrytaskchainsection'] = 'Tarea en Cadena previa en esta sección del curso';
$string['entrytext'] = 'Texto de la página de entrada';
$string['error_formhelperclassnotfound'] = 'La clase: {$a} del formulario de ayuda de Tarea en Cadena no se encontró.';
$string['error_formhelperfilenotfound'] = 'El fichero: {$a} del formulario de ayuda de Tarea en Cadena no se encontró.';
$string['error_getprivateproperty'] = 'No se puede acceder a la propiedad privada, {$a->property}, del objeto {$a->class} directamente. Utilice {$a->method} en su lugar.';
$string['error_getunknownproperty'] = 'No se puede acceder a la propiedad desconocida, {$a->property}, del objeto {$a->class}.';
$string['error_insertrecord'] = 'No se pudo introducir en registro en la tabla de la base de datos: {$a}';
$string['error_missingclass'] = 'No se puedo encontrar la clase del objeto: {$a}';
$string['error_nocolumns'] = 'Por favor seleccione alguna columna';
$string['error_nocourseid'] = 'Sin identificador de curso';
$string['error_nodatabaseinfo'] = 'Sin información disponible de la base de datos';
$string['error_noinputparameters'] = 'Sin parámetros de entrada';
$string['error_norecordsfound'] = 'No se encontraron registros';
$string['error_recordclassnotfound'] = 'No se encontró la clase del registro de la Tarea en Cadena: {$a}';
$string['error_setprivateproperty'] = 'No se puede modificar la propiedad privada, {$a->property}, del objeto {$a->class} directamente. Utilice {$a->method} en su lugar.';
$string['error_setpropertydirectly'] = 'No se puede modificar la propiedad {$a->property} del objeto {$a->class} directamente. Utilice {$method} en su lugar.';
$string['error_setunknownproperty'] = 'No se puede modificar la propiedad desconocida, {$a->property}, del objeto {$a->class}.';
$string['error_unrecognizedpageid'] = 'Identificador de página de la Tarea en Cadena no reconocido: {$a}';
$string['error_updaterecord'] = 'No se pudo actualizar el registro en la tabla de la base de datos: {$a}';
$string['event_attempt_started'] = 'Intento de Tarea en Cadena empezado';
$string['event_attempt_started_description'] = 'El usuario con identificador "{$a->userid}" empezó un intento de una tarea en la actividad de "Tarea en Cadena" con identificador de módulo de curso "{$a->cmid}"';
$string['event_attempt_started_explanation'] = 'Un usuario acaba de empezar un intento en una actividad de Tarea en Cadena';
$string['event_attempt_submitted'] = 'Intento de Tarea en Cadena enviado';
$string['event_attempt_submitted_description'] = 'El usuario con identificador "{$a->userid}" envió un intento de una tarea en la actividad de "Tarea en Cadena" con identificador de módulo de curso "{$a->cmid}"';
$string['event_attempt_submitted_explanation'] = 'Un usuario acaba de enviar un intento en una actividad de Tarea en Cadena';
$string['event_base'] = 'Evento HotPot detectado';
$string['event_base_description'] = 'El usuario con identificador "{$a->userid}" inició un evento en la actividad de "Tarea en Cadena" con identificador de módulo de curso "{$a->cmid}"';
$string['event_base_explanation'] = 'Un evento fue detectado por el módulo de Tarea en Cadena';
$string['event_chains_edited'] = 'Cadenas de Tarea en Cadena editadas';
$string['event_chains_edited_description'] = 'El usuario con identificador "{$a->userid}" editó todas las cadenas de Tarea en Cadena en el curso con identificador "{$a->courseid}"';
$string['event_chains_edited_explanation'] = 'Un usuario acaba de editar todas las cadenas de Tarea en Cadena de un curso';
$string['event_columnlists_edited'] = 'Listas de columnas de Tarea en Cadena editadas';
$string['event_columnlists_edited_description'] = 'El usuario con identificador "{$a->userid}" editó las listas de columnas en la actividad de "Tarea en Cadena" con identificador de módulo de curso "{$a->cmid}"';
$string['event_columnlists_edited_explanation'] = 'Un usuario acaba de editar las listas de columnas en una actividad de Tarea en Cadena';
$string['event_condition_edited'] = 'Condición de Tarea en Cadena editada';
$string['event_condition_edited_description'] = 'El usuario con identificador "{$a->userid}" editó una condición en la actividad de "Tarea en Cadena" con identificador de módulo de curso "{$a->cmid}"';
$string['event_condition_edited_explanation'] = 'Un usuario acaba de editar una condición en una actividad de Tarea en Cadena';
$string['event_report_viewed'] = 'Informe de Tarea en Cadena visualizado';
$string['event_report_viewed_description'] = 'El usuario con identificador "{$a->userid}" visualizó un informe en la actividad de "Tarea en Cadena" con identificador de módulo de curso "{$a->cmid}"';
$string['event_report_viewed_explanation'] = 'Un usuario acaba de visualizar un informe de intentos en una actividad de Tarea en Cadena';
$string['event_task_edited'] = 'Tarea de Tarea en Cadena editada';
$string['event_task_edited_description'] = 'El usuario con identificador "{$a->userid}" editó una tarea en la actividad de "Tarea en Cadena" con identificador de módulo de curso "{$a->cmid}"';
$string['event_task_edited_explanation'] = 'Un usuario acaba de editar una tarea en una actividad de Tarea en Cadena';
$string['event_tasks_edited'] = 'Tareas de Tarea en Cadena editada';
$string['event_tasks_edited_description'] = 'El usuario con identificador "{$a->userid}" editó todas las tareas en la actividad de "Tarea en Cadena" con identificador de módulo de curso "{$a->cmid}"';
$string['event_tasks_edited_explanation'] = 'Un usuario acaba de editar todas las tareas en una actividad de Tarea en Cadena';
$string['exit_areyouok'] = 'Hola, ¿aún estás ahí?';
$string['exit_attemptscore'] = 'Tu puntuación para ese intentó fue {$a}';
$string['exit_course'] = 'Curso';
$string['exit_course_text'] = 'Volver a la página principal del curso';
$string['exit_encouragement'] = 'Estímulo';
$string['exit_excellent'] = '¡Excelente!';
$string['exit_feedback'] = 'Realimentación de la página de salida';
$string['exit_feedback_help'] = 'Estas opciones habilitan y deshabilitan la visualización de elementos de realimentación en una página de salida de Tarea en Cadena.

**Nombre de la cadena como título**
: si está seleccionada el nombre de la cadena se mostrará como el título de la página de salida.

**Estímulo**
: si está seleccionada se mostrará algún estímulo en la página de salida. El estímulo depende de la calificación en la Tarea en Cadena:
: **> 90%**: ¡Excelente!
: **> 60%**: Bien hecho
: **> 0%**: Buen intento
: **= 0%**: ¿Estás bien?

**Calificación del intento de la cadena**
: si está seleccionada la calificación del intento de la cadena que se acaba de completar será mostrada en la página de salida.

**Calificación de la cadena**
: si está seleccionada la calificación de la Tarea en Cadena se mostrará en la página de salida.

Además, si el método de evaluación de la cadena es "el más alto", se mostrará un mensaje para indicar al usuario si el intento más reciente fue igual o mejor que los intentos previos.';
$string['exit_goodtry'] = '¡Buen intento!';
$string['exit_grades'] = 'Calificaciones';
$string['exit_grades_text'] = 'Vea sus calificaciones hasta el momento para este curso';
$string['exit_index'] = 'Índice';
$string['exit_index_text'] = 'Ir al índice de actividades';
$string['exit_links'] = 'Enlaces para salir de la página';
$string['exit_next'] = 'Siguiente';
$string['exit_next_text'] = 'Intentar la siguiente actividad';
$string['exit_nograde'] = '¡Usted ha completado exitosamente esta actividad!';
$string['exit_retry'] = 'Reintentar';
$string['exit_retry_text'] = 'Reintentar esta actividad';
$string['exit_taskchaingrade'] = 'Su calficación para esta actividad es {$a}';
$string['exit_taskchaingrade_average'] = 'Su calificación promedio hasta ahora para esta actividad es {$a}';
$string['exit_taskchaingrade_highest'] = 'Su calificación más alta hasta ahora para esta actividad es {$a}';
$string['exit_taskchaingrade_highest_equal'] = '¡Usted igualó su máximo previo para esta actividad!';
$string['exit_taskchaingrade_highest_previous'] = 'Su calificación más alta anterior para esta actividad fue {$a}';
$string['exit_taskchaingrade_highest_zero'] = 'Usted todavía no ha obtenido calificación mayor de {$a} para esta actividad';
$string['exit_welldone'] = '¡Bien hecho!';
$string['exit_whatnext_0'] = '¿Que quisieras hacer ahora?';
$string['exit_whatnext_1'] = 'Elije tu destino...';
$string['exit_whatnext_default'] = 'Por favor elija una de las siguientes:';
$string['exitcm'] = 'Siguiente actividad';
$string['exitcm_help'] = 'Este ajuste especifica una actividad Moodle para hacer después de que esta actividad de Tarea en Cadena sea completada. La calificación opcional es la calificación mínima para esta Tarea en Cadena que es necesaria para que se muestre la siguiente actividad.

El profesor puede seleccionar una actividad específica o una de las siguientes opciones generales de ajuste:

* Siguiente actividad en este curso
* Siguiente actividad en esta sección
* Siguiente actividad calificada en este curso
* Siguiente actividad calificada en esta sección
* Siguiente Tarea en Cadena en este curso
* Siguiente Tarea en Cadena en esta sección

Si otras opciones para salir de la página están deshabilitadas y el alumno ha obtenido la calificación requerida en esta actividad de Tarea en Cadena, la siguiente actividad se mostrará inmediatamente. En caso contrario se mostrará al alumno un enlace a la siguiente actividad, que podrá pulsar cuando esté listo.';
$string['exitcmcourse'] = 'Siguiente actividad en este curso';
$string['exitcmsection'] = 'Siguiente actividad en esta sección del curso';
$string['exitgrade'] = 'Calificación de la siguiente actividad';
$string['exitgradedcourse'] = 'Siguiente actividad calificada en este curso';
$string['exitgradedsection'] = 'Siguiente actividad calificada en esta sección del curso';
$string['exitoptions'] = 'Salir de opciones';
$string['exitpage'] = 'Mostrar página de salida';
$string['exitpagehdr'] = 'Página de salida';
$string['exittaskchaincourse'] = 'Siguiente TaskChain en este curso';
$string['exittaskchainsection'] = 'Siguiente TaskChain en esta sección de curso';
$string['exittext'] = 'Texto de página de salida';
$string['feedback'] = 'Retroalimentación';
$string['feedbackdiscuss'] = 'Discutir esta tarea en el foro';
$string['feedbackformmail'] = 'Formato de retroalimentación';
$string['feedbackmoodleforum'] = 'Foro Moodle';
$string['feedbackmoodlemessaging'] = 'Mensajería Moodle';
$string['feedbacknone'] = 'Ninguna';
$string['feedbacksendmessage'] = 'Mandarle un mensaje a su instructor';
$string['feedbackshort'] = 'Ret';
$string['feedbackwebpage'] = 'Página web';
$string['filename'] = 'Nombre del archivo';
$string['filetype'] = 'Tipo del archivo';
$string['filteredchains'] = 'TaskChains que coinciden con los filtros siguientes:';
$string['filteredtasks'] = 'Tareas que coinciden con los filtros siguientes:';
$string['finishandclose'] = 'Terminar y cerrar este intento';
$string['firstattempt'] = 'Primer intento';
$string['fix_boms'] = 'Corregir BOMs';
$string['fix_installxml'] = 'Corregir db/install.xml';
$string['forceplugins'] = 'Forzar plugins multimedia';
$string['forceplugins_help'] = 'Si se habilita, los reproductores compatibles con Moodle reproducirán los archivos del tipo AVI, MPEG, MPG, MP3, MOV y WMV. De otra forma, Moodle no cambiará las configuraciones de los reproductores multimedia en la tarea.';
$string['frameheight'] = 'Altura del marco';
$string['giveup'] = 'Darse por vencido';
$string['grade'] = 'Calificación';
$string['gradeignore'] = 'Ignorar vacíos';
$string['gradelimit'] = 'Límite de calificación';
$string['grademethod'] = 'Método de calificación';
$string['gradeweighting'] = 'Ponderación de calificación';
$string['gradeweighting_help'] = 'Las calificaciones para esta actividad TaskChain se ajustarán por escala a este número en el libro de calificaciones de Moodle.';
$string['groupid'] = 'Grupo';
$string['groupid_help'] = 'El grupo de usuarios Moodle en donde se aplica esdta condición';
$string['guestsno'] = 'Lo siento, los invitados no pueden ver ni intentar actividades TaskChain';
$string['highestgrade'] = 'Calificación más alta';
$string['highestscore'] = 'Puntaje más alto';
$string['highesttaskscore'] = 'Puntaje de tarea más alto';
$string['hints'] = 'Pistas';
$string['ignored'] = 'Ignorado';
$string['incorrecttask'] = 'Tarea contestada incorrectamente';
$string['inprogress'] = 'En progreso';
$string['isgreaterthan'] = 'es mayor que';
$string['islessthan'] = 'es menor que';
$string['lastaccess'] = 'Último acceso';
$string['lastattempt'] = 'último intento';
$string['lasttaskabandoned'] = 'Puntaje de la última tarea abandonada';
$string['lasttaskattempted'] = 'Puntaje de la última tarea intentada';
$string['lasttaskcompleted'] = 'Puntaje de la última tarea completada';
$string['lasttasktimedout'] = 'Puntaje de la última tarea con tiempo agotado';
$string['lockframe'] = 'Bloquear marco';
$string['manualcompletion'] = 'Finalización manual';
$string['maxeventlength'] = 'Número máximo de días para un solo evento de calendario';
$string['maximum'] = '&lt;=';
$string['mediafilter_moodle'] = 'Filtros multimedia estándar de Moodle';
$string['mediafilter_taskchain'] = 'Filtro multimedia de TaskChain';
$string['menuofalltasks'] = 'Menú de todas las tareas';
$string['menuofalltasksone'] = 'Menú de todas las tareas (un enlace)';
$string['menuofnexttasks'] = 'Menú de siguientes tareas';
$string['menuofnexttasksone'] = 'Menú de siguientes tareas (un enlace)';
$string['migratingfiles'] = 'Migrando archivos de tareas TaskChain';
$string['migratinglogs'] = 'Migrando bitácoras de TaskChain';
$string['minimum'] = '&gt;=';
$string['missingsourcetype'] = 'Añ registro Taskchain le falta el tipo-de-origen (sourcetype)';
$string['modulename'] = 'CadenadeTarea (TaskChain)';
$string['modulename_link'] = 'mod/taskchain/view';
$string['modulenameplural'] = 'TaskChains';
$string['movetasks'] = 'Mover tareas seleccionadas';
$string['myattempts'] = 'Mis intentos';
$string['name'] = 'Nombre';
$string['name_help'] = 'El texto específico que es mostrado a los estudiantes';
$string['nameadd'] = 'Nombre';
$string['navigation'] = 'Navegación';
$string['navigation_embed'] = 'Página web incrustada';
$string['navigation_frame'] = 'Marco de navegación Moodle';
$string['navigation_give_up'] = 'Un botón único para "Darse por vencido"';
$string['navigation_moodle'] = 'Barras de navegación estándar de Moodle (superior y lateral)';
$string['navigation_none'] = 'Nada/ninguno';
$string['navigation_original'] = 'Ayudas de navegación originales';
$string['navigation_topbar'] = 'Solamente barra de navegación superior de Moodle (sin barras laterales)';
$string['next1task'] = 'Siguiente tarea';
$string['next2task'] = 'Pasar por alto la siguiente tarea';
$string['next3task'] = 'Pasar por alto 2 tareas';
$string['next4task'] = 'Pasar por alto 3 tareas';
$string['next5task'] = 'Pasar por alto 4 tareas';
$string['nexttaskid'] = 'Siguiente tarea';
$string['noactivity'] = 'Sin actividad';
$string['nograde'] = 'Sin calificación';
$string['nolastchainattempt'] = 'No se encontró el registro de cadena previa';
$string['nolasttaskattempt'] = 'No se encontró el registro de actividad previa';
$string['nomorechainattempts'] = 'Lo sentimos, Usted ya no tiene más intentos disponibles para esta actividad';
$string['nomoretaskattempts'] = 'Lo sentimos, Usted ya no tiene más intentos disponibles para esta tarea';
$string['noresponses'] = 'No se encontró información sobre preguntas y respuestas individuales';
$string['noreview'] = 'Lo siento, Usted no tiene permitido ver detalles de este intento de tarea.';
$string['noreviewafterclose'] = 'Lo siento, esta tarea se cerró. Usted ya no tiene permitido ver detalles de este intento de tarea.';
$string['noreviewbeforeclose'] = 'Lo sentimos, usted no puede ver los detalles de esta tarea hasta {$a}.';
$string['noscore'] = 'Sin puntaje';
$string['nosourcefilesettings'] = 'Al registro TaskChain le falta información del archivo de orígen';
$string['notaskchains'] = 'No se encontraron TaskChains';
$string['notasksforyou'] = 'Lo siento, ahorita no hay tareas para que tu hagas.';
$string['notasksinchain'] = 'No hay tareas en esta cadena TaskChain';
$string['notattemptedyet'] = 'Todavía no intentada';
$string['notavailable'] = 'Lo siento, esta actividad actualmente ya no está disponible para Usted.';
$string['notendswith'] = 'no termina con';
$string['notisempty'] = 'no está vacío';
$string['notisequalto'] = 'no es igual a';
$string['notstartswith'] = 'no comienza con';
$string['or'] = 'o';
$string['orless'] = '{$a} (o menos)';
$string['ormore'] = '{$a} (or más)';
$string['outputformat'] = 'Formato de salida';
$string['outputformat_best'] = 'Mejor';
$string['outputformat_hp_6_jcloze_html'] = 'JCloze (v6) desde html';
$string['outputformat_hp_6_jcloze_html_dropdown'] = 'Desplegable desde HTML';
$string['outputformat_hp_6_jcloze_html_findit_a'] = 'FindIt (a) desde HP6 JCloze html';
$string['outputformat_hp_6_jcloze_html_findit_b'] = 'FindIt (b) desde HP6 JCloze html';
$string['outputformat_hp_6_jcloze_html_jgloss'] = 'JGloss desde HTML';
$string['outputformat_hp_6_jcloze_xml_anctscan'] = 'ANCT-Scan desde HP6 JCloze xml';
$string['outputformat_hp_6_jcloze_xml_anctscan_autoadvance'] = 'ANCT-Scan desde HP6 JCloze xml (Auto-avanzar)';
$string['outputformat_hp_6_jcloze_xml_dropdown'] = 'Desplegable (DropDown) desdeHP6 JCloze xml';
$string['outputformat_hp_6_jcloze_xml_findit_a'] = 'FindIt (a) desde HP6 JCloze xml';
$string['outputformat_hp_6_jcloze_xml_findit_b'] = 'FindIt (b) desde HP6 JCloze xml';
$string['outputformat_hp_6_jcloze_xml_jgloss'] = 'JGloss desde HP6 JCloze xml';
$string['outputformat_hp_6_jcloze_xml_v6'] = 'JCloze (v6) desde HP6 xml';
$string['outputformat_hp_6_jcloze_xml_v6_autoadvance'] = 'JCloze (v6) desde HP6 xml (Auto-avanzar)';
$string['outputformat_hp_6_jcross_xml_v6'] = 'JCross (v6) desde xml';
$string['outputformat_hp_6_jmatch_html'] = 'JMatch (v6) desde html';
$string['outputformat_hp_6_jmatch_xml_flashcard'] = 'JMatch (flashcard) desde xml';
$string['outputformat_hp_6_jmatch_xml_jmemori'] = 'JMemori desde xml';
$string['outputformat_hp_6_jmatch_xml_sort'] = 'JMatch Ordenar (\'\'JMatch Sort \'\') desde xml';
$string['outputformat_hp_6_jmatch_xml_v6'] = 'JMatch (v6) desde xml';
$string['outputformat_hp_6_jmatch_xml_v6_plus'] = 'JMatch (v6+) desde xml';
$string['outputformat_hp_6_jmatch_xml_v6_plus_duplicates'] = 'JMatch (v6+) desde xml (permitir duplicados)';
$string['outputformat_hp_6_jmix_html'] = 'JQuiz (v6) desde html';
$string['outputformat_hp_6_jmix_xml_v6'] = 'JMix (v6) desde xml';
$string['outputformat_hp_6_jmix_xml_v6_plus'] = 'JMix (v6+) desde xml';
$string['outputformat_hp_6_jmix_xml_v6_plus_deluxe'] = 'JMix (v6+ con prefijo, sufijo y otros añadidos) desde xml';
$string['outputformat_hp_6_jmix_xml_v6_plus_keypress'] = 'JMix (v6+ con pulsación de tecla) desde xml';
$string['outputformat_hp_6_jquiz_xml_v6'] = 'JQuiz (v6) desde xml';
$string['outputformat_hp_6_jquiz_xml_v6_autoadvance'] = 'JQuiz (v6) desde xml (Avance automático)';
$string['outputformat_hp_6_jquiz_xml_v6_exam'] = 'JQuiz (v6) desde xml (Examen)';
$string['outputformat_hp_6_jquiz_xml_v6_intro'] = 'JQuiz (v6) desde xml (Introducción)';
$string['outputformat_hp_6_rhubarb_html'] = 'Rhubarb (v6) desde html';
$string['outputformat_hp_6_rhubarb_xml'] = 'Rhubarb (v6) desde xml';
$string['outputformat_hp_6_sequitur_html'] = 'Sequitur (v6) desde html';
$string['outputformat_hp_6_sequitur_html_incremental'] = 'Sequitur (v6) desde html, sistema de puntuación incremental';
$string['outputformat_hp_6_sequitur_xml'] = 'Sequitur (v6) desde xml';
$string['outputformat_hp_6_sequitur_xml_incremental'] = 'Sequitur (v6) desde xml, sistema de puntuación incremental';
$string['outputformat_html_ispring'] = 'Fichero HTML iSpring';
$string['outputformat_html_xerte'] = 'Fichero HTML Xerte';
$string['outputformat_html_xhtml'] = 'Fichero HTML estándar';
$string['outputformat_qedoc'] = 'Fichero Qedoc';
$string['passworderror'] = 'La contraseña introducida era incorrecta';
$string['penalties'] = 'Penalizaciones';
$string['pending'] = 'Pendiente de completar';
$string['percent'] = 'Por ciento';
$string['pluginadministration'] = 'Administración de Tarea en Cadena';
$string['pluginname'] = 'Módulo de Tarea en Cadena';
$string['postcondition'] = 'Postcondición';
$string['postconditions'] = 'Postcondiciones';
$string['postconditions_help'] = 'Tras finalizar la tarea, se ejecutará la acción asociada a la primera postcondición que se cumpla en esta lista.';
$string['precondition'] = 'Precondición';
$string['preconditions'] = 'Precondiciones';
$string['preconditions_help'] = 'Esta tarea sólo se podrá realizar si todas las precondiciones en esta lista se cumplen.';
$string['pressoktocontinue'] = 'Pulse OK para continuar, o Cancelar para permanecer en esta página.';
$string['preview'] = 'Vista preliminar';
$string['previewchainnow'] = 'Vista preliminar de la actividad de Tarea en Cadena ahora';
$string['previewtasknow'] = 'Vista preliminar de la tarea ahora';
$string['previoustask'] = 'Tarea previa';
$string['questionshort'] = 'Q-{$a}';
$string['randomtask'] = 'Tarea aleatoria';
$string['reattempttask'] = 'Reintentar tarea';
$string['recentattempts'] = 'Intentos más recientes';
$string['redo'] = 'Rehacer';
$string['reordertasks'] = 'Reordenar tareas';
$string['requirepassword'] = 'Se necesita contraseña';
$string['requirepassword_help'] = 'Si se indica una contraseña, el alumno deberá introducirla para poder realizar el cuestionario.';
$string['requiresubnet'] = 'Se necesita dirección de red';
$string['requiresubnet_help'] = 'El acceso al cuestionario puede estar restringido a determinadas subredes de la LAN o de Internet indicando una lista de direcciones IP completas o parciales separadas por comas. Esto puede ser útil para cuestionarios que no sean supervisados, para asegurarnos de que sólo la gente en determinados equipos pueda acceder al cuestionario.';
$string['responses'] = 'Respuestas';
$string['responsesshort'] = 'R';
$string['resume'] = 'Continuar';
$string['reviewafterattempt'] = 'Permitir revisión tras intento';
$string['reviewafterclose'] = 'Permitir revisión después de que se cierre el HotPot';
$string['reviewduringattempt'] = 'Permitir revisión durante el intento';
$string['reviewoptions'] = 'Revisar opciones';
$string['sametask'] = 'Misma tarea';
$string['score'] = 'Puntuación';
$string['scoreignore'] = 'Ignorar vacíos';
$string['scorelimit'] = 'Límite de puntaje';
$string['scorelimit_help'] = 'Esta configuración especifica el puntaje máximo para esta tarea. Todos los intentos de tarea se asume que son porcentajes y serán ajustados de forma tal que ningún puntaje de tarea sea mayor que el límite de puntaje de la tarea.';
$string['scoremethod'] = 'Método de puntuación';
$string['scores'] = 'Puntajes';
$string['scoresshort'] = 'Pts';
$string['scoreweighting'] = 'Ponderación del puntaje';
$string['securityhdr'] = 'Restricciones de seguridad';
$string['selectattempts'] = 'Seleccionar intentos';
$string['selectedchains'] = 'TaskChains seleccionadas en este curso';
$string['selectedtasks'] = 'Tareas seleccionadas en esta TaskChain';
$string['showdescription'] = 'Mostrar descripción';
$string['showdescription_help'] = 'Si esta configuración está habilitada, el texto de entrada de abajo aparecerá en la página del curso como la descripción para esta actividad.';
$string['showerrormessage'] = 'Error de TaskChain: {$a}';
$string['showpopup'] = 'Ventana';
$string['singlefieldhdr'] = 'Campo único';
$string['sortdirection'] = 'Dirección de ordenamiento';
$string['sortdirection_help'] = 'La dirección en la que Usted desea ordenar estos registros';
$string['sortfield'] = 'Campo pra ordenar';
$string['sortfield_help'] = 'El campo sobre del que Usted desea ordenar estos registros';
$string['sortincrement'] = 'Incremento para ordenar';
$string['sortincrement_help'] = 'Cuando las tareas sean re-ordenadas, los números de orden se incrementarán por la cantidad auií especificada';
$string['sortorder'] = 'Orden para ordenar';
$string['sortorder_help'] = 'El orden de esta tarea dentro de esta cadena';
$string['sourcefile'] = 'Archivo de orígen';
$string['sourcefilenotfound'] = 'El archivo de orígen no se encontró (o estaba vacío): {$a}';
$string['sourcelocation'] = 'Ubicación del archivo de orígen';
$string['sourcelocation_help'] = 'La ubicación del archivo de orígen';
$string['sourcetype'] = 'Tipo del archivo de orígen';
$string['sourcetype_help'] = 'El tipo de este archivo de orígen';
$string['startchainattempt'] = 'Iniciar nuevo intento de cadena';
$string['startofchain'] = 'Inicio de cadena';
$string['starttaskattempt'] = 'Iniciar nuevo intento de tarea';
$string['stopbutton_help'] = 'Si esta configuración está activada, se incluirá un botón de stop en la tarea.

Si un estudiante pulsa el botón stop, los resultados hasta el momento serán devueltos a Moodle y el estado del intento de la tarea será marcado como abandonado.

El texto que se mostrará en el botón stop será una de las frases preestablecidas desde los packs de idioma de Moodle, formateado como componente_cadena (ej. portfolio_volveradondeestabas), o el que profesor indique.';
$string['stopbuttonlangpack'] = 'Desde el pack de idioma';
$string['tasknotavailable'] = 'Lo sentimos, esta tarea no está disponible para usted hasta {$a}.';
$string['timeclose'] = 'Disponible hasta';
$string['timeopen'] = 'Disponible desde';
$string['windowmoodleheader'] = 'Mostrar el encabezado de página de Moodle';
$string['windowmoodlenavbar'] = 'Mostrar la barra de navegación de Moodle';
$string['windownew'] = 'Nueva ventana';
$string['windowresizable'] = 'Permitir redimensionar la ventana';
$string['windowsame'] = 'Misma ventana';
$string['windowscrollbars'] = 'Permitir desplazarse por la ventana';
$string['windowstatus'] = 'Mostrar la barra de estado';
$string['windowtoolbar'] = 'Mostrar la barra de herramientas';
$string['windowwidth'] = 'Ancho de ventana predefinido (en pixels)';
$string['wrong'] = 'Mal';
$string['youneedtoenrol'] = 'Tiene que matricularse en este curso antes de intentar esta actividad de Tarea en Cadena';
$string['zeroduration'] = 'Sin duración';
$string['zerograde'] = 'Nota cero';
$string['zeroscore'] = 'Puntuación cero';
