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
 * Strings for component 'format_grid', language 'es', version '4.2'.
 *
 * @package     format_grid
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addsection'] = 'Añadir sección';
$string['cannotconvertuploadedimagetodisplayedimage'] = 'No se puede convertir la imagen cargada en una imagen visualizada.  Informe al desarrollador de los detalles del error y de la información que se recoge en el archivo php.log.';
$string['cannotgetmanagesectionimagelock'] = 'No se puede gestionar el bloquear la imagen de la sección. Esto puede suceder si dos personas están editando las configuraciones de la misma sección al mismo tiempo.';
$string['centre'] = 'Centro';
$string['crop'] = 'Recortar';
$string['currentsection'] = 'Esta sección';
$string['default'] = 'Predeterminado - {$a}';
$string['defaultdisplayedimagefiletype'] = 'Tipo de imagen mostrada';
$string['defaultdisplayedimagefiletype_desc'] = 'Configurar el tipo de imagen mostrada';
$string['defaultimagecontainerratio'] = 'Proporción predeterminada del contenedor de la imagen con respecto al ancho';
$string['defaultimagecontainerratio_desc'] = 'La proporción predeterminada del contenedor de la imagen con respecto al ancho.';
$string['defaultimagecontainerwidth'] = 'Ancho predeterminado del contenedor de la imagen';
$string['defaultimagecontainerwidth_desc'] = 'El ancho predeterminado del contenedor de la imagen.';
$string['defaultimageresizemethod'] = 'Método predeterminado de cambio de tamaño de la imagen';
$string['defaultimageresizemethod_desc'] = 'El método predeterminado para cambiar la imagen y ajustarla al contenedor.';
$string['defaultpopup'] = 'Usar un popup';
$string['defaultpopup_desc'] = 'La visualización predeterminada de la sección en un popup en lugar de navegar a una página de sección única.';
$string['defaultshowcompletion'] = 'Mostrar finalización';
$string['defaultshowcompletion_desc'] = 'De forma predeterminada mostrar la finalización de la sección en la rejilla.';
$string['defaultsinglepagesummaryimage'] = 'Mostrar la imagen de rejilla en el resumen de sección';
$string['defaultsinglepagesummaryimage_desc'] = 'Mostrar la imagen en rejilla para esta sección en el resumen de sección cuando hay un resumen en la sección.';
$string['deletesection'] = 'Borrar sección';
$string['editsection'] = 'Editar sección';
$string['editsectionname'] = 'Editar el nombre de la sección';
$string['formatnotsupported'] = 'El formato no está soportado por este servidor; por favor repare la configuración del sistema para que tenga la extensión PHP GD instalada - {$a}.';
$string['functionfailed'] = 'Falló función en imagen - {$a}.';
$string['hidefromothers'] = 'Ocultar sección';
$string['imagecontainerratio'] = 'Configurar la proporción relativa del contenedor de la imagen relativa al ancho';
$string['imagecontainerratio_help'] = 'Configurar la proporción relativa del contenedor de la imagen a una de: 3-2, 3-1, 3-3, 2-3, 1-3, 4-3 o 3-4.';
$string['imagecontainerwidth'] = 'Configurar el ancho del contenedor de la imagen';
$string['imagecontainerwidth_help'] = 'Configurar el ancho del contenedor de la imagen a una de:  128, 192, 210, 256, 320, 384, 448, 512, 576, 640, 704 o 768';
$string['imageresizemethod'] = 'Configurar el método de cambiar tamaño de imagen';
$string['imageresizemethod_help'] = 'Configurar el método para cambiar el tamaño de la imagen a: \'Escalar\' o \'Recortar\' cuando se cambia el tamaño de la imagen para que quepa en el contenedor.';
$string['information'] = 'Información';
$string['informationchanges'] = 'Cambios';
$string['informationsettings'] = 'Configuraciones de Información';
$string['informationsettingsdesc'] = 'Información del formato Rejilla';
$string['left'] = 'Izquierda';
$string['love'] = 'amor';
$string['markedthissection'] = 'Esta sección está destacada como sección actual';
$string['markthissection'] = 'Destacar esta sección como sección actual';
$string['mimetypenotsupported'] = 'El tipo MIME no está soportado como un formato de imagen en el formato Rejilla - {$a}.';
$string['newsectionname'] = 'Nuevo nombre para la sección {$a}';
$string['noimageinformation'] = 'La información de la imagen está vacía - {$a}.';
$string['numbersections'] = 'Número de secciones';
$string['off'] = 'Desactivado';
$string['original'] = 'Original';
$string['originalheightempty'] = 'La altura original está vacía - {$a}.';
$string['originalwidthempty'] = 'El ancho original está vacío - {$a}.';
$string['page-course-view-grid'] = 'Cualquier página principal del curso en el formato rejilla';
$string['page-course-view-grid-x'] = 'Cualquier página del curso en el formato rejilla';
$string['pluginname'] = 'Formato rejilla';
$string['popup'] = 'Usar un popup';
$string['popup_help'] = 'Mostrar la sección en un popup en lugar de navegar a una página de sección única.';
$string['privacy:nop'] = 'El formato Rejilla almacena muchas configuraciones que tienen que ver con  su configuración. Ninguno de estos ajustes está relacionado con un usuario específico, Es responsabilidad de Usted asegurarse de que no se ingrese ningún dato del usuario en alguno de los campos de texto libre. El ajustar una configuración resultará en que dicha configuración se apunte en bitácora dentro del sistema de bitácoras de Moodle contra el usuario que la cambió, lo cual está fuera del control  del tema. Por favor, vea el sistema central de bitácoras para cumplimiento de privacidad al respecto. Al subir imágenes, Usted debe evitar subir imágenes con datos incrustados de ubicación (EXIF GPS) incluidos o algún otro dato personal. Sería posible extraer cualquier dato personal o de ubicación de las imágenes. Por favor examine el código cuidadosamente para asegurarse de que cumple con su interpretación de sus leyes de privacidad. Yo (el autor del plugin) no soy abogado y mi análisis está basado en mi interpretación. Si Usted tiene alguna duda entonces quite el formato inmediatamente.';
$string['reporterror'] = 'Por favor reporte los detalles del error y la información contenida en el archivo php.log al desarrollador.';
$string['right'] = 'Derecha';
$string['scale'] = 'Escala';
$string['section0name'] = 'General';
$string['sectionbreak'] = 'Salto de sección';
$string['sectionbreak_help'] = 'Salto en la rejilla en esta sección';
$string['sectionbreakheading'] = 'Encabezado del salto de sección';
$string['sectionbreakheading_help'] = 'Mostrar este encabezado en el punto que esta sección salta en la rejilla. Se puede usar HTML.';
$string['sectionimage'] = 'Imagen de sección';
$string['sectionimage_help'] = 'La imagen de sección.';
$string['sectionimagealttext'] = 'Texto alterno de la imagen';
$string['sectionimagealttext_help'] = 'Este texto será configurado como el atributo Alt de la imagen.';
$string['sectionname'] = 'Sección';
$string['settings'] = 'Configuraciones';
$string['settingssettings'] = 'Configuraciones de Configuraciones';
$string['settingssettingsdesc'] = 'Configuraciones del formato Rejilla';
$string['showcompletion'] = 'Mostrar finalización';
$string['showcompletion_help'] = 'Mostrar la finalización de la sección en la rejilla.';
$string['showfromothers'] = 'Mostrar sección';
$string['singlepagesummaryimage'] = 'Mostrar la imagen de rejilla en el resumen de sección';
$string['singlepagesummaryimage_help'] = 'Mostrar la imagen en rejilla para esa sección en el resumen de sección cuando hay un resumen en la sección.';
$string['topic'] = 'Sección';
$string['topic0'] = 'General';
$string['versionalpha'] = 'Versión alfa - Casi seguramente contiene errores. ¡Esta es una versión en desarrollo solamente para desarrolladores! ¡Ni siquiera se le ocurra instalarlo en un servidor de producción!';
$string['versionbeta'] = 'Versión beta- Probablemente contenga errores. Listo para probarse por un administrador solamente en un servidor de pruebas.';
$string['versioninfo'] = 'Liberado {$a->release}, versión {$a->version} en Moodle {$a->moodle}. Hecho con {$a->love} en Gran Bretaña.';
$string['versionrc'] = 'Versión candidato a liberación- Podría contener errores. Pruébelo completamente en un servidor de pruebas antes de considerarlo para un servidor de producción.';
$string['versionstable'] = 'Versión estable - Podría contener errores. Pruébelo en un servidor de pruebas antes de instalarlo en su servidor de producción.';
$string['webp'] = 'WebP';
