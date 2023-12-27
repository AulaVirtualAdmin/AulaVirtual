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
 * Strings for component 'autoview', language 'es', version '4.2'.
 *
 * @package     autoview
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addtext'] = 'Añadir fuente(s) de diapositivas para el documento convertido a la presentación';
$string['advanced_config'] = 'Configuración avanzada';
$string['alwaysflashstream'] = 'Siempre usar servidor (Lecture Capture Live) streaming de Captura de Conferencia enVivo para videos Flash';
$string['alwaysflashstream2'] = 'Forzar el suso del servidor (Lecture Capture Live) streaming de Captura de Conferencia enVivo para todas las nuevas presentaciones con videos Flash.';
$string['autoview:addinstance'] = 'Puede añadir módulos Autoview';
$string['autoview:canbroadcastflash'] = 'Puede transmitir videos usando (Lecture Capture Live) streaming de Captura de Conferencia enVivo';
$string['autoview:canconvertdocument'] = 'Puede usar servicio de conversión de documento en-línea';
$string['autoview:canedit'] = 'Puede editar presentaciones';
$string['autoview:canrecordflash'] = 'Puede grabar videos usando (AutoView Lecture Capture Live) Captura de Conferencia enVivo AutoView';
$string['autoview:viewpresentation'] = 'Puede ver presentaciones AutoView';
$string['autoview_website'] = 'Sitio Web de AutoView';
$string['autoviewsummary'] = 'Resumen';
$string['autoviewtext'] = 'Nombre de Autoview';
$string['chooseconfig'] = 'Ajustar archivo de configuración';
$string['closetext'] = 'Cerrar esta ventana';
$string['config_storage_type'] = 'Localización de Almacen de Archivo de AutoView';
$string['configconversionkey'] = 'Clave de acceso para servicio de conversión de documento';
$string['configconversionkey2'] = 'La clave de acceso para servicio de conversión de documento.';
$string['configconversionurl'] = 'URL del servicio de conversión de documento.';
$string['configconversionurl2'] = 'La URL de un servicio de conversión de documento capaz de producir imágenes en un formato adecuado para AutoView. Déjelo vacío si no tiene un servicio disponible apropiado de conversión de documento . Usted puede encontrar más información sobre servicios de conversión de documento en';
$string['configexternalfilekey'] = 'Clave de acceso para almacenamiento de archivo externo';
$string['configexternalfileloc'] = 'Ruta al área de almacenamiento de archivo externo';
$string['configfile'] = 'Archivo de configuración';
$string['configflashcapture'] = 'URL del servidor para Capturar conferencia en Vivo';
$string['configflashcapture2'] = 'La URL HTTP de un servicio de conversión de documento capaz de producir imágenes en un formato adecuado para AutoView. Déjelo vacío si no tiene un servicio disponible apropiado de conversión de documento . Usted puede encontrar más información sobre servicios de conversión de documento en';
$string['configflashdir'] = 'Subdirectorio para archivos Flash capturados en el curso';
$string['configflashkey'] = 'Clave secreta del servidor Flash';
$string['configflashsecurity'] = 'Método de seguridad usado por el sistema Lecture Capture Live';
$string['configflashsecurity2'] = 'El método de seguridad usado por el sistema Lecture Capture Live. La Clave aleatoria es actualmente el único método soportado para Moodle.';
$string['configflashserver'] = 'URL del servidor RTMP para captura de conferencia en vivo';
$string['configlivecapture'] = 'URL de Applet Java para captura en vivo';
$string['configmax_broadcast_kbps'] = 'Ancho de banda máximo para transmisiones en vivo, en Kbytes/ por segundo';
$string['configmax_broadcast_kbps2'] = 'Configure esto si Usted necesita restringir el ancho de banda usado por la transmisión de video.';
$string['configmax_record_kbps'] = 'Ancho de banda máximo para grabaciones en vivo, en Kbytes/ por segundo';
$string['configmax_record_kbps2'] = 'Configure esto si Usted necesita restringir el ancho de banda usado por las grabaciones de video.';
$string['confignote'] = 'Estos parámetros son usados primariamente para configuración';
$string['confignote2'] = 'servicios adicionales';
$string['confignote3'] = 'para AutoView. Déjelo vacío si no está usando ningún servicio adicional; no son necesarios para uso normal.';
$string['confignote4'] = 'Vea el sitio web de AutoView para mayores detalles.';
$string['conversiondone'] = 'El documento ha sido convertido';
$string['conversionfailed'] = 'Falló la conversión';
$string['convertnotallowed'] = 'Usted no está autorizado para acceder al servicio de conversión de documento';
$string['convertsavefailed'] = 'No pudo guardarse el archivo convertido';
$string['converttitle'] = 'Servicio web de conversión de documento';
$string['createnew'] = 'Usara archivo de configuración de AutoView por defecto (recomendado)';
$string['editbutton'] = 'Activar modo de edición';
$string['editoff'] = 'Desactivar modo de edición';
$string['encryptedkey'] = 'Clave Aleatoria Encriptada';
$string['external_storage'] = 'Externo - Captura de Conferencia en vivo';
$string['file_not_found'] = 'El archivo seleccionado para conversión no existe.';
$string['flashcapturetitle'] = 'Sistema en-vivo de Captura de Conferencia AutoView';
$string['hidenav'] = 'Ocultar Barra de Navegación de Moodle';
$string['internal_storage'] = 'Interno - Archivos del Curso';
$string['javacapturetitle'] = 'Sistema de captura en vivo basado en Applet Java';
$string['js_extras'] = 'LLamadas a JavaScript';
$string['modulename'] = 'Autoview';
$string['modulenameplural'] = 'Presentaciones AutoView';
$string['no_coursefilearea'] = 'El repositorio de Área de Archivo de Curso no ha sido instalado. Esto es necesario para usar AutoView en Moodle 2.x con almacen de archivo interno.';
$string['no_edit_permission'] = 'Usted no tiene permiso para hacer esto.';
$string['no_repofileman'] = 'El bloque del Mánager (gestor) de Archivo de Repositorio no ha sido instalado. Esto es necesario para usar AutoView en Moodle 2.x con almacen de archivo interno.';
$string['nojsmessage'] = 'Usted necesita JavaScript habilitado para ver esta presentación.';
$string['not_allowed'] = 'Usted no tiene permiso para ver esta presentación';
$string['pluginadministration'] = 'Configuraciones AutoView';
$string['pluginname'] = 'AutoView';
$string['pres_saved'] = 'Presnetación Guardada';
$string['randomkey'] = 'Clave Aleatoria';
$string['secretkey'] = 'Clave Secreta';
$string['starteditor'] = 'Iniciar Editor';
$string['storagetitle'] = 'Área de Almacenamiento de Archivos';
$string['usedir'] = 'Crear carpeta separada para archivos AutoView y configuración';
$string['waitermessage'] = 'Por favor espere: si las funciones del editor no aparecen aquí cuando haya terminado de cargar la presentación que está a la derecha, haga click en el botón inferior.';
$string['xmlnote'] = 'Nota: Si Usted elige un nombre para el archivo de configuración que no exista previamente, entonces se creará una configuración vacía automáticamente.';
$string['xmlsavefailed'] = 'Falló al guardar archivo de configuración';
