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
 * Strings for component 'tool_organisation', language 'es', version '4.2'.
 *
 * @package     tool_organisation
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['actions'] = 'Acciones';
$string['addchilddepartment'] = 'Nuevo subdepartamento para el departamento \'{$a}\'';
$string['addchildposition'] = 'Nuevo subpuesto para el puesto \'{$a}\'';
$string['adddepartment'] = 'Nuevo departamento para la estructura \'{$a}\'';
$string['adddepartmentframework'] = 'Nueva estructura de departamentos';
$string['addjob'] = 'Nuevo cargo';
$string['addjobforuser'] = 'Nuevo cargo para \'{$a}\'';
$string['addnewdepartment'] = 'Nuevo departamento';
$string['addnewposition'] = 'Nuevo puesto';
$string['addposition'] = 'Nuevo puesto para la estructura \'{$a}\'';
$string['addpositionframework'] = 'Nueva estructura de puestos';
$string['allframeworks'] = 'Estructuras de departamento y puesto';
$string['anydepartment'] = 'Cualquiera';
$string['anymanager'] = 'Gestor o Líder de departamento';
$string['anyposition'] = 'Cualquiera';
$string['assfirstchildof'] = 'Como el primer hijo de \'{$a}\'';
$string['assignnewjob'] = 'Asignar otro cargo a este usuario';
$string['audienceand'] = 'Y';
$string['audiencecustomise'] = 'Personalizar...';
$string['audiencejobdescription'] = 'Usuarios en el departamento: {$a->department}<br />
Con puesto: {$a->position}';
$string['audiencemanager'] = 'Gestores';
$string['audiencemanagerdescription'] = 'Permisos: {$a->permissions}';
$string['audienceor'] = 'O';
$string['audienceselect'] = 'Relación con la audiencia';
$string['audienceselectinitial'] = 'Seleccionar audiencia';
$string['audienceself'] = 'A sí mismos';
$string['audienceusersall'] = 'Todos los usuarios';
$string['audienceusersdept'] = 'En el mismo departamento que la audiencia';
$string['audienceusersreporting'] = 'Reporta a quien consulta el reporte';
$string['audienceusersreporting_help'] = 'Incluir a los usuarios que reportan a la audiencia (los cuales deben tener un puesto con permiso de Gestor)

Un reporte directo implica que se muestren en el informe todos los puestos que dependen directamente de aquel que cuenta con permiso de Gestor';
$string['audienceusersreportingdirect'] = 'Sólo reporta directamente';
$string['cachedef_myjob'] = 'Cargo del usuario actual y su equipo';
$string['conditioncanallocateprograms'] = 'Puede matricular a programas';
$string['conditioncanreceivenotifications'] = 'Puede recibir notificaciones';
$string['conditionuserdepartment'] = 'El usuario está en el departamento';
$string['conditionuserdepartmentdescription'] = 'Usuarios que tienen un cargo en el departamento \'{$a->deptname}\'<br />
Sub-departmentos: {$a->subdeptsinclude}';
$string['conditionuserdepartmentdescriptionnegated'] = 'Usuarios que no tienen un cargo en el departamento \'{$a->deptname}\'<br />
Sub-departmentos: {$a->subdeptsinclude}';
$string['conditionuserdepartmentdescriptionwithdate'] = 'Usuarios que tienen un cargo en el departamento \'{$a->deptname}\'<br />
Sub-departmentos: {$a->subdeptsinclude}<br />
En o después de: {$a->conditiondate}';
$string['conditionuserdepartmentsallcriteria'] = 'El usuario tiene cargos en todos los departamentos seleccionados';
$string['conditionuserdepartmentsalldescription'] = 'Usuarios que tienen cargos en todos los siguientes departamentos en simultáneo: \'{$a->deptname}\'<br />
Sub-departamentos: {$a->subdeptsinclude}';
$string['conditionuserdepartmentsalldescriptionnegated'] = 'Usuarios que no tienen cargos en todos los siguientes departamentos en simultáneo: \'{$a->deptname}\'<br />
Sub-departamentos: {$a->subdeptsinclude}';
$string['conditionuserdepartmentsalldescriptionwithdate'] = 'Usuarios que tienen cargos en todos los siguientes departamentos en simultáneo: \'{$a->deptname}\'<br />
Sub-departamentos: {$a->subdeptsinclude}
En o después de: {$a->conditiondate}';
$string['conditionuserdepartmentsanycriteria'] = 'El usuario tiene un cargo en cualquiera de los departamentos seleccionados';
$string['conditionuserdepartmentsanycriteria_help'] = 'Cuando un usuario ya tiene un cargo en un departamento seleccionado, tener un nuevo cargo en el segundo no activa las acciones nuevamente';
$string['conditionuserdepartmentsanydescription'] = 'Usuarios que tienen un cargo en cualquiera de los siguientes departamentos: \'{$a->deptname}\'<br />
Sub-departmentos: {$a->subdeptsinclude}';
$string['conditionuserdepartmentsanydescriptionnegated'] = 'Usuarios que no tienen un cargo en ninguno de los siguientes departamentos: \'{$a->deptname}\'<br />
Sub-departmentos: {$a->subdeptsinclude}';
$string['conditionuserdepartmentsanydescriptionwithdate'] = 'Usuarios que tienen un cargo en cualquiera de los siguientes departamentos: \'{$a->deptname}\'<br />
Subdepartamentos: {$a->subdeptsinclude}<br />
A partir de: {$a->conditionaldate}';
$string['conditionuserdepartmentseachcriteria'] = 'Cada vez que un usuario obtenga un cargo en cualquiera de los departamentos seleccionados';
$string['conditionuserdepartmentseachcriteria_help'] = 'Equivalente a crear múltiples reglas, una por cada departamento seleccionado';
$string['conditionusernotindepartment'] = 'El usuario no está en el departamento';
$string['conditionuserposition'] = 'El usuario tiene el puesto';
$string['conditionuserpositiondescription'] = 'Usuarios que tienen el puesto \'{$a->posname}\'<br />
Sub-puestos: {$a->subposinclude}';
$string['conditionuserpositiondescriptionnegated'] = 'Usuarios que no tienen el puesto \'{$a->posname}\'<br />
Sub-puestos: {$a->subposinclude}';
$string['conditionuserpositiondescriptionwithdate'] = 'Usuarios que tienen puestos \'{$a->posname}\'<br />
Sub-puestos: {$a->subposinclude}<br />
En o después de: {$a->conditiondate}';
$string['conditionuserpositionsallcriteria'] = 'El usuario tiene cargos en todos los puestos seleccionados';
$string['conditionuserpositionsalldescription'] = 'Usuarios que tienen cargos en todos los siguientes puestos en simultáneo: \'{$a->posname}\'<br />
Sub-puestos: {$a->subposinclude}';
$string['conditionuserpositionsalldescriptionnegated'] = 'Usuarios que no tienen cargos en todos los puestos en simultáneo: \'{$a->posname}\'<br />
Sub-posiciones: {$a->subposinclude}';
$string['conditionuserpositionsalldescriptionwithdate'] = 'Usuarios que tienen cargos en todos los puestos en simultáneo: \'{$a->posname}\'<br />
Sub-posiciones: {$a->subposinclude}<br />
En o después de: {$a->conditiondate}';
$string['conditionuserpositionsanycriteria'] = 'El usuario tiene cargos en cualquiera de los puestos seleccionados';
$string['conditionuserpositionsanycriteria_help'] = 'Cuando un usuario ya tiene un cargo en un puesto seleccionado, tener un nuevo cargo en el segundo no activa las acciones nuevamente';
$string['conditionuserpositionsanydescription'] = 'Usuarios que tienen un cargo en cualquiera de los siguientes puestos: \'{$a->posname}\'<br />
Sub-puestos: {$a->subposinclude}';
$string['conditionuserpositionsanydescriptionnegated'] = 'Usuarios que no tienen un cargo en ninguno de los siguientes puestos: \'{$a->posname}\'<br />
Sub-puesto: {$a->subposinclude}';
$string['conditionuserpositionsanydescriptionwithdate'] = 'Usuarios que tienen un cargo en cualquiera de los siguientes puestos: \'{$a->posname}\'<br />
Sub-puestos: {$a->subposinclude}<br />
En o después de: {$a->conditiondate}';
$string['conditionuserpositionseachcriteria'] = 'Cada vez que un usuario obtiene un cargo en cualquiera de los siguientes puestos';
$string['conditionuserpositionseachcriteria_help'] = 'Equivalente a crear múltiples reglas, una por cada uno de los puestos seleccionados';
$string['conditionuserwithoutposition'] = 'Usuario que no tiene el puesto';
$string['creategenericframework'] = '';
$string['current'] = 'Actual: {$a}';
$string['delete'] = 'Borrar';
$string['deletedepartment'] = 'Borrar departamento \'{$a}\'';
$string['deletedepartmentconfirm'] = '¿Estás seguro de querer borrar el departamento \'{$a}\'?';
$string['deletedepartmentframework'] = 'Borrar estructura de departamentos \'{$a}\'';
$string['deletedepartmentframeworkconfirm'] = '¿Estás seguro de querer borrar la estructura de departamentos\'{$a}\'?';
$string['deletejob'] = 'Borrar cargo completamente';
$string['deleteposition'] = 'Borrar puesto \'{$a}\'';
$string['deletepositionconfirm'] = '¿Estás seguro de querer borrar el puesto \'{$a}\'?';
$string['deletepositionframework'] = 'Borrar la estructura de puestos \'{$a}\'';
$string['deletepositionframeworkconfirm'] = '¿Estás seguro de querer borrar la estructura de puestos \'{$a}\'?';
$string['department'] = 'Departamento';
$string['department_help'] = 'Seleccionar departamento';
$string['departmentandpositionrequiredforjobcreate'] = 'Es necesario crear departamentos y puestos para proceder con las asignaciones de cargo';
$string['departmentdeleted'] = 'El departamento fue eliminado exitosamente';
$string['departmentdescription'] = 'Descripción';
$string['departmentframework'] = 'Estructura de departamentos';
$string['departmentframeworkidnumber'] = 'Idnumber de la estructura de departamentos';
$string['departmentframeworkpostfix'] = '{$a} (Estructura de departamentos)';
$string['departmentframeworks'] = 'Estructuras de departamentos';
$string['departmentfrmidnumberconflict'] = 'Ya existen estos idnumbers para una estructura de departamentos';
$string['departmenthasjobs'] = 'El departamento no puede ser eliminado porque hay cargos asociados a él.';
$string['departmentidentifier'] = 'Identificador de departamento';
$string['departmentidentifier_help'] = 'Esta es la columna que identifica la fila en el CSV, será utilizado para encontrar al padre';
$string['departmentidnumber'] = 'Número ID';
$string['departmentidnumberconflict'] = 'Los idnumbers de departamentos ya existe';
$string['departmentleadpermissions'] = 'Permisos de jefatura de departamento';
$string['departmentmanagementicons'] = 'Íconos de Gestor de departamento';
$string['departmentmanager'] = 'Líder de departamento';
$string['departmentmanager_help'] = 'Una persona con el permiso de Jefe de departamento será considerado gestor de cualquiera en el mismo departamento o subdepartamento, independientemente de su puesto.';
$string['departmentname'] = 'Nombre';
$string['departmentnotfound'] = 'Departamento no encontrado';
$string['departmentparent'] = 'Padre';
$string['departmentrequiredforjobcreate'] = 'Se deben crear departamentos para asignar cargos.';
$string['departments'] = 'Departamentos';
$string['departmentwithicons'] = 'Departamento con permisos';
$string['editdates'] = 'Editar fechas';
$string['editdepartment'] = 'Editar departamento \'{$a}\'';
$string['editdepartmentframework'] = 'Editar estructura de departamento \'{$a}\'';
$string['editdepartmentname'] = 'Editar nombre';
$string['editjobdatesforuser'] = 'Editar fechas del cargo para  \'{$a}\'';
$string['editposition'] = 'Editar puesto \'{$a}\'';
$string['editpositionframework'] = 'Editar la estructura de puestos \'{$a}\'';
$string['editpositionname'] = 'Editar nombre';
$string['enddate'] = 'Fecha de fin';
$string['enddate_help'] = 'Fecha de fin del cargo';
$string['enddaterelativetostart'] = 'Relativa a la fecha de inicio';
$string['entitydepartment'] = 'Departamento';
$string['entityjob'] = 'Cargo';
$string['entityposition'] = 'Puesto';
$string['errorcreatingdepartment'] = 'Ocurrió un error cuando se estaba creando el departamento. Por favor, intentalo de nuevo.';
$string['errorcreatingjob'] = 'Oucrrió un error cuando se estaba creando el cargo. Por favor, intentalo de nuevo.';
$string['errorcreatingposition'] = 'Ocurrió un error cuando se estaba creando el puesto. Por favor, intentalo de nuevo.';
$string['errorcsvcantuseframeworkidnumber'] = 'El ID de la estructura y el idnumber no pueden ser utilizadas al mismo tiempo';
$string['errorcsvinvalidframeworkidnumber'] = 'El ID de la estructura con estos idnumber no existe o no está disponible';
$string['errorcsvinvalidparentmapping'] = 'El mapeo del campo "Padre" no puede ser el mismo que el identificador';
$string['errorcsvnohierarchy'] = 'Cuando no se selecciona jerarquía, la columna "Padre" no puede tener mapeo';
$string['errorcsvnoparent'] = '';
$string['erroridnumberdepartment'] = 'El departamento con el número de ID \'{$a}\' ya existe';
$string['erroridnumberposition'] = 'El puesto con el número de ID \'{$a}\' ya existe';
$string['errorinvaliddepartment'] = 'Parámetro inválido';
$string['errorinvalidenddate'] = 'Fechas inválidas, la fecha de fin debe ser posterior a la de inicio';
$string['errorinvalidjobenddate'] = 'Formato de fecha de fin inválido';
$string['errorinvalidjobstartdate'] = 'Formato de fecha de inicio inválido';
$string['errorinvalidposition'] = 'Puesto inválido';
$string['errorjobscannotbeimported'] = 'Los cargos no pueden ser importados al Espacio compartido';
$string['errormovehierarchy'] = 'Ocurrió un error mientras se movían el puesto o el departamento';
$string['errorparentnotfound'] = 'Padre no encontrado';
$string['errorparentnotfounddepartment'] = 'Padre no encontrado para el departamento con número de id "{$a}"';
$string['errorparentnotfoundposition'] = 'Padre no encontrado para la posición con número de id "{$a}"';
$string['errorsameidnumberdepartment'] = 'Ya existe un departamento con el mismo número de ID';
$string['errorsameidnumberposition'] = 'Ya existe una posición con el mismo número de ID';
$string['eventdepartmentcreated'] = 'Departamento creado';
$string['eventdepartmentdeleted'] = 'Departamento eliminado';
$string['eventdepartmentupdated'] = 'Departamento actualizado';
$string['eventjobcreated'] = 'Cargo creado';
$string['eventjobdeleted'] = 'Cargo eliminado';
$string['eventjobupdated'] = 'Cargo actualizado';
$string['eventpositioncreated'] = 'Puesto creado';
$string['eventpositiondeleted'] = 'Puesto eliminado';
$string['eventpositionupdated'] = 'Puesto actualizado';
$string['expanddepartmentframework'] = 'Expandir la estructura de departamentos \'{$a}\'';
$string['expandpositionframework'] = 'Expandir la estructura de puestos \'{$a}\'';
$string['exporterdepartments'] = 'Estructura de departamentos de la organización';
$string['exporterdepartmentscsv'] = 'Estructura de departamentos de la organización (CSV)';
$string['exporterdepartmentsdesc'] = 'Marcos de departamentos con toda su jerarquía';
$string['exporterjobs'] = 'Cargos de la estructura de la organización';
$string['exporterjobscsv'] = 'Estructura de trabajos de la organización (CSV)';
$string['exporterjobsdesc'] = 'Cargos con la estructura de departamentos y puestos asociados';
$string['exporterorgstructure'] = 'Estructuras de la organización';
$string['exporterorgstructuredesc'] = 'Estructuras con todas las jerarquías en departamentos y/o puestos';
$string['exporterpositions'] = 'Estructura de puestos de la organización';
$string['exporterpositionscsv'] = 'Estructura de puestos de la organización (CSV)';
$string['exporterpositionsdesc'] = 'Marcos de puestos con toda su jerarquía';
$string['exportframeworkssettings'] = 'Descripciones, jerarquía y permisos';
$string['exportframeworkssettingsdescriptionshierarchy'] = 'Descripciones y jerarquía';
$string['frameworks'] = 'Estructuras';
$string['globalmanagementicons'] = 'Ícono de Gestor';
$string['globalmanager'] = 'Gestor';
$string['globalmanager_help'] = 'Una persona con el cargo de Líder será considerada gestora de cualquiera que tenga un puesto por debajo, independientemente de sus departamentos.';
$string['hascurrentjobs'] = 'Tiene cargos actuales';
$string['hasjobdepartment'] = 'Tiene un cargo en el departamento';
$string['hasjobposition'] = 'Tiene un cargo en el puesto';
$string['hierarchy'] = 'Jerarquía';
$string['hierarchydepartments'] = 'Jerarquía de los departamentos...';
$string['hierarchypositions'] = 'Jerarquía de los puestos...';
$string['importerdepartmentscsv'] = 'Importador de departamentos (CSV)';
$string['importerdepartmentscsvdesc'] = 'Departamentos con o sin jerarquía serán importados a una estructura';
$string['importerpositionscsv'] = 'Importador de puestos (CSV)';
$string['importerpositionscsvdesc'] = 'Puestos con o sin jerarquía serán importados a una estructura';
$string['importlogdeptfailed'] = 'No se pudo importar el departamento \'{$a->name}\'';
$string['importlogdeptfrmfailed'] = 'No se pudo importar la estructura de departamentos \'{$a->name}\'';
$string['importlogdeptfrmsuccess'] = 'Se creó una nueva estructura de departamentos \'<a href="{$a->url}">{$a->name}</a>\'';
$string['importlogdeptsuccess'] = 'Se creó el nuevo departamento \'{$a->name}\'';
$string['importlogidnumberexistsdepartment'] = 'El departamento con el ID number \'{$a->originalidnumber}\' ya existe';
$string['importlogidnumberexistsposition'] = 'El puesto con el ID number \'{$a->originalidnumber}\' ya existe';
$string['importlogjobfailed'] = 'No se pudo importar el cargo para \'{$a->userfullname}\' - {$a->position} ({$a->department})';
$string['importlogjobsuccess'] = 'Se creó el nuevo cargo para \'<a href="{$a->url}">{$a->userfullname}</a>\' - {$a->position} ({$a->department})';
$string['importlogposfailed'] = 'No se pudo importar el puesto \'{$a->name}\'';
$string['importlogposfrmfailed'] = 'No se pudo importar la estructura de puestos \'{$a->name}\'';
$string['importlogposfrmsuccess'] = 'Se creó una nueva estructura de puestos \'<a href="{$a->url}">{$a->name}</a>\'';
$string['importlogpossuccess'] = 'Se creó un nuevo puesto \'{$a->name}\'';
$string['include_shared_entities'] = 'Incluir entidades compartidas';
$string['include_shared_entities_help'] = 'Al habilitar esta opción, el archivo exportado también contendrá todas las estructuras compartidas disponibles en el micrositio actual';
$string['jobcreated'] = 'Cargo creado';
$string['jobdeleteconfirm'] = '¿Estás seguro de querer borrar este cargo y todos los datos asociados?<br />
Si deseas conservar los datos de este cargo para futuras consultas, deberías considerar configurarlo como finalizado.<br />
<br />Esta acción no se puede deshacer.';
$string['jobdeleted'] = 'Cargo eliminado';
$string['jobfrom'] = 'Desde \'{$a}\'';
$string['jobfromto'] = 'De {$a->from} a {$a->to}';
$string['jobnotfound'] = 'Cargo no encontrado';
$string['jobpositiondepartment'] = 'Puesto y departamento';
$string['jobs'] = 'Asignaciones de cargo';
$string['jobsnumber'] = 'Cargos';
$string['jobsnumber_help'] = 'Mostrar cargos actuales y pasados.<br /> Por ejemplo \'10 (2)\' significa que hay 10 cargos activos y 2 finalizados.';
$string['jobstartdateafter'] = 'La fecha del cargo es en o después de';
$string['jobtenantdoesnotmatch'] = 'El cargo del micrositio no coincide con el usuario del micrositio';
$string['jobtransfered'] = 'Usuario transferido a otro cargo';
$string['jobupdated'] = 'Cargo actualizado';
$string['listdeptsnohierarchy'] = 'Listado de departamentos sin jerarquía';
$string['listposnohierarchy'] = 'Listado de puestos sin jerarquía';
$string['locked'] = 'Bloqueado';
$string['locked_help'] = 'Sólo usuarios con capacidad de asignar trabajos en puestos/departamentos bloqueados pueden hacerlo';
$string['managerpermissions'] = 'Permisos de gestor';
$string['mappingerrordeptnotfound'] = 'Un departamento {$a} no fue encontrado';
$string['mappingerrorposnotfound'] = 'Un puesto {$a} no fue encontrado';
$string['mappingnoticenodeptidnumber'] = 'Se ubicó el departamento por nombre porque el número de ID estaba vacío. Se recomienda asignar números de ID a los departamentos';
$string['mappingnoticenoposidnumber'] = 'Se ubicó el puesto por nombre por el número de ID estaba vacío. Se recomienda asignar números de ID a los puestos';
$string['missingdepartment'] = 'Falta el departamento';
$string['missingposition'] = 'Falta el puesto';
$string['missingusers'] = 'Falta(n) usuario(s)';
$string['movedepartmentframework'] = 'Mover estructura de departamentos \'{$a}\'';
$string['movepositionframework'] = 'Mover estructura de puestos \'{$a}\'';
$string['newframework'] = 'Nueva estructura';
$string['newnamefor'] = 'Nuevo nombre para \'{$a}\'';
$string['notification'] = 'Notificación';
$string['notificationcannotcreatejobs'] = 'Antes de asignar cargos a usuarios, es necesario crear departamentos y puestos.';
$string['onlycurrent'] = 'Sólo actuales';
$string['onlyfuture'] = 'Sólo futuros';
$string['onlypast'] = 'Sólo pasados';
$string['organisation:allocateuserstoprogramcertificationsdept'] = 'Asignar usuarios a programas/certificaciones';
$string['organisation:allocateuserstoprogramcertificationsdept_help'] = 'Líder de departamento: Asignar usuarios a programas/certificaciones';
$string['organisation:allocateuserstoprogramcertificationsglob'] = 'Asignar usuarios a programas/certificaciones';
$string['organisation:allocateuserstoprogramcertificationsglob_help'] = 'Gestor: Asignar usuarios a programas/certificaciones';
$string['organisation:assigninlocked'] = 'Asignar trabajos en departamentos y puestos bloqueados';
$string['organisation:assignjobs'] = 'Asignar cargos';
$string['organisation:managedepartments'] = 'Administrar departamentos';
$string['organisation:managepositions'] = 'Administrar puestos';
$string['organisation:receivenotificationsdept'] = 'Recibe notificaciones';
$string['organisation:receivenotificationsdept_help'] = 'Líder de departamento: recibe notificaciones';
$string['organisation:receivenotificationsglob'] = 'Recibe notificaciones';
$string['organisation:receivenotificationsglob_help'] = 'Gestor: Recibe notificaciones';
$string['organisation:viewusersreportdept'] = 'Ver reportes de usuario';
$string['organisation:viewusersreportdept_help'] = 'Líder de departamento: Ve reportes de usuario';
$string['organisation:viewusersreportglob'] = 'Ver reportes de usuario';
$string['organisation:viewusersreportglob_help'] = 'Gestor: ver reportes de usuario';
$string['organisationadmintab'] = 'Organización';
$string['orgfiltercustomise'] = 'Personalizar';
$string['orgfilterdirectreports'] = 'Mostrar sólo quienes reportan directo';
$string['orgfiltereverybody'] = 'Mostrar todas las personas que reportan a mí';
$string['orgstructure'] = 'Estructura de la organización';
$string['parent'] = 'Padre';
$string['parentidchanged'] = 'No se pudo encontrar el departamento padre "{$a}". El departamento se creó directamente bajo el marco.';
$string['parentidchangedposition'] = 'No se pudo encontrar la posición padre especificada "{$a}". La posición se creó directamente bajo el marco.';
$string['parentsameiderror'] = 'El elemento padre no puede ser él mismo';
$string['pluginname'] = 'Estructura de la organización';
$string['position'] = 'Puesto';
$string['position_help'] = 'Seleccionar puesto';
$string['positionanddepartmentdisplay'] = '{$a->position} ({$a->department})';
$string['positiondeleted'] = 'El puesto fue borrado exitosamente.';
$string['positiondescription'] = 'Descripción';
$string['positionframework'] = 'Estructura del puesto';
$string['positionframeworkidnumber'] = 'Número de ID de la estructura de puestos';
$string['positionframeworkpostfix'] = '{$a} (Estructura de puestos)';
$string['positionframeworks'] = 'Estructuras de puestos';
$string['positionfrmidnumberconflict'] = 'El ID de la estructura de puestos ya existe';
$string['positionhasjobs'] = 'El puesto no puede ser eliminado porque hay cargos asociados a él.';
$string['positionidentifier'] = 'Identificador de puesto';
$string['positionidentifier_help'] = '';
$string['positionidnumber'] = 'Número de ID';
$string['positionidnumberconflict'] = 'Los números de ID de los puestos ya existen';
$string['positionname'] = 'Nombre';
$string['positionnotfound'] = 'Puesto no encontrado';
$string['positionparent'] = 'Padre';
$string['positionpermissions'] = 'Permisos';
$string['positionrequiredforjobcreate'] = 'Es necesario crear puestos para continuar con la asignación de cargos.';
$string['positions'] = 'Puestos';
$string['positionwithicons'] = 'Puestos con permisos';
$string['previousjobdatenote'] = 'El cargo anterior se establecerá como finalizado un día antes de que comience el nuevo cargo.';
$string['privacy:metadata:department'] = 'Departamento del cargo';
$string['privacy:metadata:depth'] = 'Reportando campo para reindexar';
$string['privacy:metadata:enddate'] = 'Cuando termina este cargo';
$string['privacy:metadata:isdirect'] = 'Indicar si el usuario es un subordinado directo';
$string['privacy:metadata:jobssummary'] = 'Resumen de cargos';
$string['privacy:metadata:managerid'] = 'ID del gestor de la estructura de la organización';
$string['privacy:metadata:path'] = 'Reportando ruta de relación';
$string['privacy:metadata:permissions'] = 'Permisos que este gestor tiene sobre este empleado';
$string['privacy:metadata:position'] = 'Puesto del cargo';
$string['privacy:metadata:reportingsummary'] = 'Reportando líneas de relaciones';
$string['privacy:metadata:startdate'] = 'Cuándo comienza este cargo';
$string['privacy:metadata:timecreated'] = 'Cuándo fue creado este cargo';
$string['privacy:metadata:timemodified'] = 'Cuándo';
$string['privacy:metadata:userid'] = 'ID del usuario';
$string['reg_wpdepartmentframeworks'] = 'Cantidad de estructuras de departamentos ({$a})';
$string['reg_wpdepartments'] = 'Cantidad de departamentos ({$a})';
$string['reg_wpjobs'] = 'Cantidad de cargos ({$a})';
$string['reg_wppositionframeworks'] = 'Cantidad de estructuras de puestos ({$a})';
$string['reg_wppositions'] = 'Cantidad de puestos ({$a})';
$string['rolemanager'] = 'Gestor de la estructura de la organización';
$string['rolemanagerdescription'] = 'Permite crear y administrar cargos, puestos y departamentos dentro del micrositio actual';
$string['ruleoutcomeactive'] = 'Trabajos activos sólo';
$string['ruleoutcomeall'] = 'Todos los trabajos';
$string['ruleoutcomeassignjob'] = 'Asignar cargo';
$string['ruleoutcomeassignjobdescwithdates'] = 'Asignar trabajo en departamento "{$a->department}" con puesto "{$a->position}"<br />
Fecha de comienzo: {$a->startdate}<br />
Fecha de fin: {$a->enddate}';
$string['ruleoutcomeassignjobstartruledate'] = 'Fecha de ejecución de la regla';
$string['ruleoutcomeassignjobstartuserdate'] = 'Fecha de creación del usuario';
$string['ruleoutcomedaybeforeruledate'] = 'Día anterior a la ejecución de la regla';
$string['ruleoutcomeendjobs'] = 'Fnalizar todos los trabajos';
$string['ruleoutcomeendjobsdesc'] = 'Finalizar todos los trabajos en el departamento "{$a->department}" y puesto "{$a->position}"<br />
Incluir subdepartamentos: "{$a->includesubdepartments}"<br />
Incluir subpuestos: "{$a->includesubpositions}"<br />
Fecha fin: "{$a->enddate}"<br />
Target: \'{$a->target}"';
$string['ruleoutcomeruledate'] = 'Fecha de ejecución de la regla';
$string['ruleoutcometarget'] = 'Objetivo';
$string['ruleoutcometarget_help'] = 'Finalizar todos los trabajos o sólo los que están activos';
$string['selectallactivejobs'] = 'Seleccionar todos los cargos activos';
$string['selectalldepartmentframeworks'] = 'Seleccionar todas las estructuras de departamentos';
$string['selectallframeworks'] = 'Seleccionar todas las estructuras de departamentos y puestos';
$string['selectalljobs'] = 'Seleccionar todos los cargos actuales y pasados';
$string['selectalljobsinfile'] = 'Seleccionar todos los cargos en este archivo';
$string['selectalljobsinframeworks'] = 'Seleccionar todos los cargos en cualquiera de las siguientes estructuras...';
$string['selectallpositionframeworks'] = 'Seleccionar todas las estructuras de puestos';
$string['selectdate'] = 'Seleccionar fecha...';
$string['selectdepartmentframework'] = 'Seleccionar marco de departamentos';
$string['selectexistingframework'] = 'Seleccionar las estructuras existentes';
$string['selectjobsinframeworks'] = 'Seleccionar todos los cargos de una estructura específica...';
$string['selectpositionframework'] = 'Seleccionar marco de posición';
$string['setjobfinished'] = 'Ajustar el cargo como finalizado';
$string['showjobs'] = 'Mostrar cargos';
$string['showpastjobs'] = 'Mostrar cargos pasados';
$string['somedepartmentsdonotexist'] = 'Algunos departamentos no existen';
$string['somepositionsdonotexist'] = 'Algunos puestos no existen';
$string['startdate'] = 'Fecha de inicio';
$string['startdate_help'] = 'Fecha de inicio del cargo';
$string['taskbuildreportingline'] = 'Construir línea de reporte de organización de estructura';
$string['timecreated'] = 'Fecha de creación';
$string['toomanyparentstoshow'] = 'Demasiados padres para mostrar.';
$string['transfertojob'] = 'Transferir a \'{$a}\' a un nuevo cargo';
$string['transfertonewjob'] = 'Transferir este usuario a un nuevo cargo';
$string['usernotfound'] = 'Usuario no encontrado';
$string['users'] = 'Seleccioanr usuarios';
$string['users_help'] = 'Buscar y seleccionar usuarios para la asignación de cargos';
$string['validationmsgdeptposchangejob'] = 'O el departamento o el puesto tienen que ser diferentes a los actuales.';
$string['validationmsgedateonsdate'] = 'La fecha de fin debe ser posterior a la fecha de inicio.';
$string['validationmsgedateonsdatechangejob'] = 'La fecha de inicio del nuevo cargo debe ser posterior a la fecha de inicio del cargo anterior.';
$string['withoutpermission'] = 'Sin permiso \'{$a}\'';
$string['withpermission'] = 'Con permiso \'{$a}\'';
$string['withsubdepartments'] = 'Incluye subdepartamentos';
$string['withsubpositions'] = 'Incluye subpuestos';
