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
 * Strings for component 'workshopallocation_scheduled', language 'es_wp', version '4.2'.
 *
 * @package     workshopallocation_scheduled
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['crontask'] = 'Procesamiento en segundo plano para la asignación programada';
$string['currentstatus'] = 'Estado actual';
$string['currentstatusexecution'] = 'Estado';
$string['currentstatusexecution1'] = 'Ejecutado el {$ a->datetime}';
$string['currentstatusexecution2'] = 'Se ejecutará de nuevo el {$ a->datetime}';
$string['currentstatusexecution3'] = 'Se ejecutará el {$ a->datetime}';
$string['currentstatusexecution4'] = 'Esperando ejecución';
$string['currentstatusnext'] = 'Próxima ejecución';
$string['currentstatusnext_help'] = 'En algunos casos, la asignación está programada para volver a ejecutarse automáticamente incluso si ya se ejecutó. Esto puede suceder si el plazo de presentación se ha prolongado, por ejemplo.';
$string['currentstatusreset'] = 'Reiniciar';
$string['currentstatusreset_help'] = 'Si guarda el formulario con esta casilla de verificación marcada, se restablecerá el estado actual. Se eliminará toda la información sobre la ejecución anterior para que la asignación se pueda ejecutar nuevamente (si se habilitó anteriormente).';
$string['currentstatusresetinfo'] = 'Marque la casilla y guarde el formulario para restablecer el resultado de la ejecución';
$string['currentstatusresult'] = 'Resultado de ejecución reciente';
$string['enablescheduled'] = 'Habilitar la asignación programada';
$string['enablescheduledinfo'] = 'Asignar envíos automáticamente al final de la fase de envío';
$string['pluginname'] = 'Asignación programada';
$string['privacy:metadata'] = 'El plugin de asignación programada no almacena ningún dato personal. Los datos personales reales sobre quién va a evaluar a quién son almacenados por el módulo del taller y forman la base para exportar los detalles de las evaluaciones.';
$string['randomallocationsettings'] = 'Configuración de asignación';
$string['randomallocationsettings_help'] = 'Los parámetros para el método de asignación aleatoria se definen aquí. Serán utilizados por el complemento de asignación aleatoria para la asignación real de presentaciones.';
$string['resultdisabled'] = 'Asignación programada inhabilitada';
$string['resultenabled'] = 'Asignación programada habilitada';
$string['resultexecuted'] = 'Acierto';
$string['resultfailed'] = 'No se pueden asignar envíos automáticamente';
$string['resultfailedconfig'] = 'Asignación programada mal configurada';
$string['resultfaileddeadline'] = 'El taller no tiene la fecha límite de envío definida';
$string['resultfailedphase'] = 'Taller no en fase de envío';
$string['resultvoid'] = 'No se asignaron propuestas';
$string['resultvoiddeadline'] = 'Aún no después de la fecha límite de presentación';
$string['resultvoidexecuted'] = 'La asignación ya se ha ejecutado';
$string['scheduledallocationsettings'] = 'Configuración de asignación programada';
$string['scheduledallocationsettings_help'] = 'Si está habilitado, el método de asignación programada asignará automáticamente las presentaciones para la evaluación al final de la fase de presentación. El final de la fase se puede definir en la configuración del taller \'Fecha límite de envío\'.

Internamente, el método de asignación aleatoria se ejecuta con los parámetros predefinidos en este formulario. Significa que la asignación programada funciona como si el profesor ejecutara la asignación aleatoria por sí mismo al final de la fase de envío utilizando la configuración de asignación a continuación.

Tenga en cuenta que la asignación programada *no* se ejecuta si cambia manualmente el taller a la fase de evaluación antes de la fecha límite de presentación. En ese caso, debe asignar las presentaciones usted mismo. El método de asignación programada es particularmente útil cuando se usa junto con la función de conmutación automática de fase.';
$string['setup'] = 'Configurar la asignación programada';
