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
 * Strings for component 'filter_filtercodes', language 'es', version '4.2'.
 *
 * @package     filter_filtercodes
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['brief'] = 'Resumen';
$string['categorycardshowpic'] = 'Mostrar fondo {categorycards}';
$string['categorycardshowpic_desc'] = 'Si se habilita, mostrará un color o un modelo para la etiqueta {categorycards} similar a las imágenes del curso cuando no se especifique imagen.';
$string['chartprogressbarlabel'] = '{$a->etiqueta}: {$a->valor}';
$string['contentmissing'] = '<h1>Falta contenido.</h1><p>Por favor, informe al encargado de la página.</p>';
$string['coursecardsbyenrol'] = '{coursecardsbyenrol} tarjetas máximas.';
$string['coursecardsbyenrol_desc'] = 'Número máximo de tarjetas de curso a mostrar para la etiqueta {coursecardsbyenrol}. Ajustar a cero para no poner límite (no recomendado).';
$string['coursecardsformat'] = 'Disposición de tarjetas de curso';
$string['coursecardsformat_desc'] = 'Mostrar {coursecards}, {coursecardsbyenrol} y {mycoursescards} así:<br>
<ul>
<li><strong>Vertical</strong>: Imagen del curso por encima del nombre del cuso.</li>
<li><strong>Horizontal</strong>: Imagen del curso a la izquierda del nombre del curso, categoría y resumen; o</li>
<li><strong>Lista</strong> in a table: Nombre del curso, categoría y resumen.</li>
</ul>';
$string['coursecontactlinktype'] = 'Tipo de enlace de contacto';
$string['coursecontactlinktype_desc'] = 'Seleccione el tipo de enlace de contacto para el enlace de contacto en las etiquetas {coursecontacts}.';
$string['coursecontactshowdesc'] = 'Mostrar la descripción del perfil del contacto.';
$string['coursecontactshowdesc_desc'] = 'Si se habilita, mostrará la descripcion del perfil del contacto en las etiquetas {coursecontacts}.';
$string['coursecontactshowpic'] = 'Mostrar imagen del contacto';
$string['coursecontactshowpic_desc'] = 'Si se habilita, mostrará la imagen del contacto en las etiquetas {coursecontacts}.';
$string['defaultemail'] = '&nbsp;';
$string['defaultfirstname'] = '&nbsp;';
$string['defaultsurname'] = '&nbsp;';
$string['defaultusername'] = '&nbsp;';
$string['disabled_customnav_description'] = '<strong>Aviso sobre soporte del menú personalizado</strong> - Para dar permiso a FilterCodes en su menú personalizado del sitio Moodle, puede necesitar personalizar su tema o el core de Moodle. <a href="https://github.com/michael-milette/moodle-filter_filtercodes#can-i-use-filtercodes-in-moodles-custom-menus">Información sobre cómo añadir soporte FilterCodes en menús personalizados</a>.';
$string['enable_customnav'] = 'Soporte de navegación personalizada';
$string['enable_customnav_description'] = '<strong>Experimental</strong>: Permitir soporte a etiquetas FilterCode el menú de navegación de Moodle.
Aviso: Sólo se conoce compatbilidad con temas basados en Clean y Boost sólo de Moodle 3.2 a 3.4. No filtra etiquetas en la página de configuración del tema de Moodle.';
$string['enable_scrape'] = 'Soporte de etiqueta scrape.';
$string['enable_scrape_description'] = 'Habilitar etiqueta scrape.';
$string['enable_sesskey'] = 'Soporte de etiqueta de clave de sesión.';
$string['enable_sesskey_description'] = 'Habilite globalmente la clave de sesión. Esta característica está deshabilitada en foros cuando se habilita globalmente.';
$string['escapebraces'] = 'Etiquetas de escape';
$string['escapebraces_desc'] = 'Cuando se marca esta opción, podrá mostrar etiquetas FilterCode sin que se interpreten por este filtro envolviéndolas entre [ corchetes ]. Esto puede ser muy útil cuando se crea documentación de FilterCodes para docentes y creadores de cursos en su sitio Moodle. <br><br>. Ejemplo: [{fullname}] no mostrará el nombre completo del usuario sin que mostrará la etiqueta {fullname} sin los corchetes.';
$string['filtername'] = 'Códigos de filtrado';
$string['formcheckin'] = '<form action="{wwwroot}/local/contact/index.php" method="post" class="cf check-in">
    <fieldset>
        <input type="hidden" id="subject" name="subject" value="¡Presente!">
        <input type="hidden" id="sesskey" name="sesskey" value="">
        <script>document.getElementById("sesskey").value = M.cfg.sesskey;</script>
        {recaptcha}
    </fieldset>
    <div>
        <input type="submit" name="submit" id="submit" value="¡Estoy aquí!">
    </div>
</form>';
$string['formcontactus'] = '<form action="{wwwroot}/local/contact/index.php" method="post" class="cf contact-us">
    <fieldset>
        <div class="form-group">
            <label for="name" id="namelabel" class="d-block">Su nombre <strong class="required">(required)</strong></label>
            <input id="name" name="name" type="text" size="57" maxlength="45" pattern="[A-zÀ-ž]([A-zÀ-ž\\s]){2,}"
                    title="Minimum 3 letters/spaces." required="required" {readonly}{ifloggedin} disabled{/ifloggedin} value="{fullname}">
        </div>
        <div class="form-group">
            <label for="email" id="emaillabel" class="d-block">Dirección de correo electrónico <strong class="required">(required)</strong></label>
            <input id="email" name="email" type="email" size="57" maxlength="60"
                    required="required" {readonly}{ifloggedin} disabled{/ifloggedin} value="{email}">
        </div>
        <div class="form-group">
            <label for="subject" id="subjectlabel" class="d-block">Subject <strong class="required">(required)</strong></label>
            <input id="subject" name="subject" type="text" size="57" maxlength="80" minlength="5"
                    title="Cinco caracteres mínimo" required="required">
        </div>
        <div class="form-group">
            <label for="message" id="messagelabel" class="d-block">Message <strong class="required">(required)</strong></label>
            <textarea id="message" name="message" rows="5" cols="58" minlength="5"
                    title="Cinco caracteres mínimo." required="required"></textarea>
        </div>
        <input type="hidden" id="sesskey" name="sesskey" value="">
        <script>document.getElementById("sesskey").value = M.cfg.sesskey;</script>
        {recaptcha}
    </fieldset>
    <div>
        <input type="submit" name="submit" id="submit" value="Send">
    </div>
</form>';
$string['formcourserequest'] = '<form action="{wwwroot}/local/contact/index.php" method="post" class="cf new-course-request">
    <fieldset>
        <div class="form-group">
            <label for="name" id="namelabel" class="d-block">Su nombre <strong class="required">(required)</strong></label>
            <input id="name" name="name" type="text" size="57" maxlength="45" pattern="[A-zÀ-ž]([A-zÀ-ž\\s]){2,}"
                    title="Mínimo tres letras/espacios." required="required" {readonly}{ifloggedin} disabled{/ifloggedin} value="{fullname}">
        </div>
        <div class="form-group">
            <label for="email" id="emaillabel" class="d-block">Dirección de correo electrónico <strong class="required">(required)</strong></label>
            <input id="email" name="email" type="email" size="57" maxlength="60" required="required" {readonly}{ifloggedin} disabled{/ifloggedin} value="{email}">
        </div>
        <div class="form-group">
            <label for="new_course_name" id="new_course_namelabel" class="d-block">Nombre propuesto para el nuevo curso <strong class="required">(required)</strong></label>
            <input id="new_course_name" name="new_course_name" type="text" size="57" maxlength="80" minlength="5"
                    title="Cinco caracteres mínimo." required="required">
        </div>
        <div class="form-group">
            <label for="description" id="descriptionlabel" class="d-block">Descripción del curso <strong class="required">(required)</strong></label>
            <textarea id="description" name="description" rows="5" cols="58" minlength="5"
                    title="Cinco caracteres mínimo." required="required"></textarea>
        </div>
        <input type="hidden" id="sesskey" name="sesskey" value="">
        <script>document.getElementById("sesskey").value = M.cfg.sesskey;</script>
        {recaptcha}
    </fieldset>
    <div>
        <input type="submit" name="submit" id="submit" value="Enviar solicitud para este curso">
    </div>
</form>';
$string['formquickquestion'] = '<form action="{wwwroot}/local/contact/index.php" method="post" class="cf contact-us">
    <fieldset>
        <div class="form-group">
            <label for="subject" id="subjectlabel" class="d-block">Asunto <strong class="required">(required)</strong></label>
            <input class="block" id="subject" name="subject" type="text" size="57" maxlength="80" minlength="5"
                    title="Cinco caracteres mínimo." required="required">
        </div>
        <div class="form-group">
            <label for="message" id="messagelabel" class="d-block">Mensaje <strong class="required">(required)</strong></label>
            <textarea id="message" name="message" rows="5" cols="58" minlength="5"
                    title="Cinco caracteres mínimo." required="required"></textarea>
        </div>
        <input type="hidden" id="sesskey" name="sesskey" value="">
        <script>document.getElementById("sesskey").value = M.cfg.sesskey;</script>
        {recaptcha}
    </fieldset>
    <div>
        <input type="submit" name="submit" id="submit" value="Send">
    </div>
</form>';
$string['formsupport'] = '<form action="{wwwroot}/local/contact/index.php" method="post" class="cf support-request">
    <fieldset>
        <div class="form-group">
            <label for="name" id="namelabel" class="d-block">Su nombre <strong class="required">(required)</strong></label>
            <input id="name" name="name" type="text" size="57" maxlength="45" pattern="[A-zÀ-ž]([A-zÀ-ž\\s]){2,}"
                    title="Mínimo tres letras/espacios." required="required" {readonly}{ifloggedin} disabled{/ifloggedin} value="{fullname}">
        </div>
        <div class="form-group">
            <label for="email" id="emaillabel" class="d-block">Dirección de correo electrónico <strong class="required">(required)</strong></label>
            <input id="email" name="email" type="email" size="57" maxlength="60" required="required" {readonly}{ifloggedin} disabled{/ifloggedin} value="{email}">
        </div>
        <div class="form-group">
            <label for="subject" id="subjectlabel" class="d-block">Asunto <strong class="required">(required)</strong></label>
            <select id="subject" name="subject" required="required">
                <option label="Elija un asunto"></option>
                <option>No puedo cambiar mi contraseña</option>
                <option>No puedo autenticarme</option>
                <option value="Suggestion">Tengo una sugerencia</option>
                <option value="Error message">Me sale un mensaje de error</option>
                <option value="System error">Algo no está funcionando como debería</option>
                <option value="Course">Tengo dificultades para acceder a un curso a al contenido de un curso</option>
                <option value="Other reason">Otros (por favor, especifique)</option>
            </select>
        </div>
        <div class="form-group">
            <label for="specific_subject" id="specifylabel" class="d-block">Asunto específico o nombre del curso&nbsp;<strong class="required">(required)</strong></label>
            <input type="text" id="specific_subject" name="specific_subject" size="57" maxlength="80" required="required">
        </div>
        <div class="form-group">
            <label for="url" id="urllabel" class="d-block">Especifique dirección URL</label>
            <input type="url" id="url" name="url" size="57" maxlength="80" value="{referer}">
        </div>
        <div class="form-group">
            <label for="description" id="descriptionlabel" class="d-block">Descripción y detalles paso a paso de cómo reproducir el problema&nbsp;<strong class="required">(required)</strong></label>
            <textarea id="description" name="description" rows="5" cols="58" minlength="5"
                    title="Mínimo cinco caracteres." required="required"></textarea>
        </div>
        <input type="hidden" id="sesskey" name="sesskey" value="">
        <script>document.getElementById("sesskey").value = M.cfg.sesskey;</script>
        {recaptcha}
    </fieldset>
    <div>
        <input type="submit" name="submit" id="submit" value="Enviar solicitud de ayuda">
    </div>
</form>';
$string['globaltagcontentdesc'] = 'Este es el contenido que reemplazará su etiqueta global. Ejemplo: si su etiqueta se llama "{global_ciudad}", esa etiqueta erá reemplazada por el contenido introducido en este campo.';
$string['globaltagcontenttitle'] = 'Contenido';
$string['globaltagcount'] = 'Número de etiquetas globales.';
$string['globaltagcountdesc'] = 'Seleccione el número de etiquetas que desea definir. Para un rendimiento óptimo, sólo seleccione la cantidad que necesite.';
$string['globaltagheadingdesc'] = 'Defina sus etiquetas globales propias, a veces también llamadas "bloques globales".';
$string['globaltagheadingtitle'] = 'Etiquetas globales personalizadas';
$string['globaltagnamedesc'] = 'Esto será parte de su nombre de etiquetas, con el prefijo "global_". Ejemplo: si introduce "ciudad" aquí, su etiqueta se llamará {global_ciudad}. Debe ser una cadena sencilla sólo con letras. No se permiten espacios, números ni caracteres especiales.';
$string['globaltagnametitle'] = 'Etiqueta: global_';
$string['hidecompletedcourses'] = 'Ocultar cursos completos';
$string['hidecompletedcourses_desc'] = 'Habilitar para que el filtro no saque cursos completos en los listados  {mycoursesmenu}';
$string['ifprofilefiedonlyvisible'] = 'Sólo visible {ifprofile_field_}.';
$string['ifprofilefiedonlyvisible_desc'] = 'Cuando se marca, restringe la etiqueta {ifprofile_field_...} para acceder sólo a campos visibles del perfil de usuario. Los campos ocultos pueden comportarse como si estuvieran en blanco. Si no se marca, esta etiqueta también estará disponible para marcar archivos ocultos.';
$string['narrowpage'] = 'Página estrecha';
$string['narrowpage_desc'] = 'Habilite esta opción para optimizar la información si Moodle está usando un tema con ancho de página limitado (p.e., Boost en Moodle 4.0+)';
$string['nocompletedcourses'] = 'Ninguno de los cursos en que usted participa se ha marcado como completado';
$string['notavailable'] = 'No disponible';
$string['pagebuilder'] = 'Page builder (constructor de páginas)';
$string['pagebuilderlink'] = 'https://www.layoutit.com/build';
$string['photoeditor'] = 'Photo editor (editor de foto)';
$string['photoeditorlink'] = 'https://pixlr.com/editor/';
$string['pluginname'] = 'Filter Codes';
$string['privacy:metadata'] = 'El plugin Filter Codes no almacena ningún dato personal sobre ningún usuario.';
$string['screenrec'] = 'Grabador de pantalla';
$string['screenreclink'] = 'https://screenapp.io/#/recordin';
$string['showhiddenprofilefields'] = 'Mostrar campos ocultos de perfil';
$string['showhiddenprofilefields_desc'] = 'Habilite la etiqueta {profile_field_...} para procesar todos los campos de perfil incluyendo los ocultados al usuario.';
$string['sizeb'] = 'B';
$string['sizeeb'] = 'EB';
$string['sizegb'] = 'GB';
$string['sizekb'] = 'KB';
$string['sizemb'] = 'MB';
$string['sizetb'] = 'TB';
$string['sizeyb'] = 'YB';
$string['sizezb'] = 'ZB';
$string['teamcardsformat'] = 'Formato de tarjetas de equipo';
$string['teamcardsformat_desc'] = 'Elija cómo aparecerán los miembros del equipo en la etiqueta {teamcards}.<br>
<ul>
<li>Nada: Muestra solamente la imagen y nombre como una tarjeta sin la descripción del usuario.</li>
<li>Icono: Como "Nada", salvo que la descripción del usuario aparece en una burbuja emergente de información.</li>
<li>Breve: Como "Nada" pero muestra la descripción bajo la imagen y nombre del usuario.</li>
<li>Detallado: Formato de lista. Recomendado si los miembros de su equipo tienden a tener descripciones de usuario largas.</li>
</ul>';
$string['teamcardslinktype'] = 'Tiempo de enlace de equipo';
$string['teamcardslinktype_desc'] = 'Elija el tipo de enlace para el enlace de miembros de equipo en la etiqueta {teamcards}. Aviso: La foto se enlazará directamente con el perfil cuando el usuario se autentique independientemente de lo que elija aquí.';
$string['verbose'] = 'Detallado';
