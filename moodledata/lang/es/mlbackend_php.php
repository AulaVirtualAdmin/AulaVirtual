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
 * Strings for component 'mlbackend_php', language 'es', version '4.2'.
 *
 * @package     mlbackend_php
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['datasetsizelimited'] = 'Solo se ha evaluado una parte del conjunto de datos debido a su tamaño. Configure $CFG->mlbackend_php_no_memory_limit si está seguro de que su sistema puede hacer frente a un conjunto de datos {$a}.';
$string['errorcantloadmodel'] = 'El archivo de modelo {$a} no existe. El modelo debe estar entrenado antes de usarlo para predecir.';
$string['errorlowscore'] = 'La precisión de la predicción del modelo evaluado no es muy alta, por lo que algunas predicciones pueden no ser precisas. Puntuación del modelo = {$a->score}, puntuación mínima = {$a->minscore}';
$string['errornotenoughdata'] = 'No hay suficientes datos para evaluar este modelo utilizando el intervalo de análisis proporcionado.';
$string['errornotenoughdatadev'] = 'Los resultados de la evaluación variaron demasiado. Se recomienda recopilar más datos para garantizar que el modelo sea válido. Desviación estándar de los resultados de la evaluación = {$a->deviation}, desviación estándar máxima recomendada = {$a->accepteddeviation}';
$string['errorphp7required'] = 'El backend de aprendizaje automático de PHP requiere PHP 7';
$string['pluginname'] = 'Backend de aprendizaje automático de PHP';
$string['privacy:metadata'] = 'El complemento de backend de aprendizaje automático de PHP no almacena ningún dato personal.';
