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
 * Strings for component 'tool_models', language 'es', version '4.2'.
 *
 * @package     tool_models
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['accuracy'] = 'Precisión';
$string['allpredictions'] = 'Todas las predicciones';
$string['analysingsitedata'] = 'Analizando el sitio';
$string['analyticmodels'] = 'Modelos analíticos';
$string['bettercli'] = 'El evaluar modelos y generar predicciones puede involucrar procesamiento pesado. Se recomienda que corra estas acciones mediante la interfaz para línea de comando.';
$string['cantguessenddate'] = 'No puede adivinarse la fecha de terminación';
$string['cantguessstartdate'] = 'No puede adivinarse la fecha de inicio';
$string['clienablemodel'] = 'Usted puede habilitar el modelo al seleccionar un método para dividir el tiempo por su ID. Por favor tenga en cuenta que Usted también puede habilitarlo más tarde usando la interfaz web (\'nada\' para salir)';
$string['editmodel'] = 'Editar modelo "{$a}"';
$string['edittrainedwarning'] = 'Este modelo ya ha sido entrenado; tenga en cuenta que, al cambiar sus indicadores o su método para dividir el tiempo, eliminará sus predicciones anteriores y comenzará a generar las nuevas';
$string['enabled'] = 'Habilitado';
$string['errorcantenablenotimesplitting'] = 'Usted necesita seleccionar un método de división del tiempo antes de habilitar el modelo';
$string['errornoenabledandtrainedmodels'] = 'No hay modelos habilitados y entrenados para predecir';
$string['errornoenabledmodels'] = 'No hay modelos habilitados para entrenar';
$string['errornostaticedit'] = 'Los modelos basados en suposiciones no pueden ser editados';
$string['errornostaticevaluated'] = 'Los modelos basados en suposiciones no pueden ser evaluados; siempre son 100% correctos de acuerdo a como fueron definidos';
$string['errornostaticlog'] = 'Los modelos  suposiciones no pueden ser evaluados; no hay bitácora de desempeño';
$string['evaluate'] = 'Evaluar';
$string['evaluatemodel'] = 'Evaluar modelo';
$string['evaluationinbatches'] = 'Los contenidos del curso son calculados y almacenados en lotes; diurante la evaluación Usted puede detener el proceso en cualquier momento; la siguiente vez que lo corra continuará desde el punto donde Usted lo detuvo.';
$string['extrainfo'] = 'Informacion';
$string['generalerror'] = 'Error de evaluación: Código de estatus {$a}';
$string['getpredictions'] = 'Obtener predicciones';
$string['getpredictionsresults'] = 'Resultados usando división de duración del curso {$a->name}';
$string['getpredictionsresultscli'] = 'Resultados usando división de duración del curso {$a->name} (id: {$a->id})';
$string['goodmodel'] = 'Este es un buen modelo y puede usarse para predecir; habilítelo para comenzar a obtener intuiciones (predicciones).';
$string['indicators'] = 'Indicadores';
$string['info'] = 'Información';
$string['insights'] = 'Intuiciones (predicciones)';
$string['loginfo'] = 'Mandar a bitácora información extra';
$string['modelresults'] = '{$a} resultados';
$string['modelslist'] = 'Lista de modelos';
$string['modeltimesplitting'] = 'División del tiempo';
$string['nodatatoevaluate'] = 'No hay datos para evaluar el modelo';
$string['nodatatopredict'] = 'No hay nuevos elementos de los cuales obtener predicciones';
$string['nodatatotrain'] = 'No hay nuevos datos que puedan usarse para entrenamiento';
$string['notdefined'] = 'Todavía no definido';
$string['pluginname'] = 'Modelos analíticos';
$string['predictionprocessfinished'] = 'Proceso de predicción terminado';
$string['predictionresults'] = 'Resultados de predicción';
$string['predictmodels'] = 'Modelos de predicción';
$string['predictorresultsin'] = 'El predictor guardó información en bitácora en el directorio {$a}';
$string['sameenddate'] = 'La fecha de fin actual es buena';
$string['samestartdate'] = 'La fecha de inicio actual es buena';
$string['target'] = 'Objetivo';
$string['trainandpredictmodel'] = 'Entrenando el modelo y calculando predicciones';
$string['trainingprocessfinished'] = 'Proceso de entrenamiento terminado';
$string['trainingresults'] = 'Resultados del entrenamiento';
$string['trainmodels'] = 'Entrenar modelos';
$string['viewlog'] = 'Bitácora';
$string['weeksenddateautomaticallyset'] = 'Fecha de fin configurada automáticamente basada en la fecha de inicio y el número de secciones';
$string['weeksenddatedefault'] = 'La fecha de fin sería calculada automáticamente a partir de la fecha de inicio del curso';
