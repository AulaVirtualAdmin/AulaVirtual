<?php

class __Mustache_ba6e189cab53db7f7fcffe04635e28a1 extends Mustache_Template
{
    private $lambdaHelper;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';

        $buffer .= $indent . '<div class="mx-4">
';
        if ($partial = $this->mustache->loadPartial('local_edwiserreports/navigation')) {
            $buffer .= $partial->renderInternal($context, $indent . '    ');
        }
        $buffer .= $indent . '</div>
';
        $value = $this->resolveValue($context->find('notice'), $context);
        $buffer .= $indent . ($value === null ? '' : $value);
        $buffer .= '
';
        $buffer .= $indent . '<div class="edwiserreports-header position-relative mb-5 mx-4">
';
        $buffer .= $indent . '    
';
        $buffer .= $indent . '    <div class="edwiserreport-title theme-1-color text-left">
';
        $buffer .= $indent . '        <h2 class="m-0">';
        $value = $context->find('str');
        $buffer .= $this->section24c39844773e91bb74dfbc3330da341c($context, $indent, $value);
        $buffer .= '</h2>
';
        $buffer .= $indent . '        <label class="h5 selected-period theme-1-bg text-white">';
        $value = $context->find('str');
        $buffer .= $this->section1772da8ea9ca2c6bc8f5c94f9031071e($context, $indent, $value);
        $buffer .= '</label>
';
        $buffer .= $indent . '        <button class="" id="button_download_report" onclick="descargarReporte()"><a id="download_report">Descargar reporte</a></button>
';
        $buffer .= $indent . '    </div>
';
        $buffer .= $indent . '    <div class="ml-auto filter-wrapper text-right mt-2">
';
        $buffer .= $indent . '        <div class="row">
';
        $buffer .= $indent . '            <div class="filter-selector col-12 d-inline-block ml-1">
';
        $buffer .= $indent . '                <label>';
        $value = $context->find('str');
        $buffer .= $this->section4e8b20a9fe6d8f29751db4d6458c169e($context, $indent, $value);
        $buffer .= '</label>
';
        $buffer .= $indent . '                <button type="button" class="btn dropdown-toggle text-left edwiserreports-calendar" data-toggle="dropdown" aria-expanded="false">
';
        $buffer .= $indent . '                    ';
        $value = $context->find('str');
        $buffer .= $this->sectionC48b1ed39c6e06f864d9aaa18493d5c4($context, $indent, $value);
        $buffer .= '
';
        $buffer .= $indent . '                </button>
';
        $buffer .= $indent . '                <div class="dropdown-menu" aria-labelledby="filter-dropdown" role="menu">
';
        $buffer .= $indent . '                    <div class="dropdown-calendar"></div>
';
        $buffer .= $indent . '                    <div class="dropdown-body">
';
        $buffer .= $indent . '                        <a class="dropdown-item active" role="menuitem" data-value="last7days" href="javascript:void(0)">';
        $value = $context->find('str');
        $buffer .= $this->sectionC48b1ed39c6e06f864d9aaa18493d5c4($context, $indent, $value);
        $buffer .= '</a>
';
        $buffer .= $indent . '                        <a class="dropdown-item" role="menuitem" data-value="weekly" href="javascript:void(0)">';
        $value = $context->find('str');
        $buffer .= $this->section1a820dc2f0b751bbacad031e7035500e($context, $indent, $value);
        $buffer .= '</a>
';
        $buffer .= $indent . '                        <a class="dropdown-item" role="menuitem" data-value="monthly" href="javascript:void(0)">';
        $value = $context->find('str');
        $buffer .= $this->sectionD51af92dfda0bf8ff3577714a367ae9a($context, $indent, $value);
        $buffer .= '</a>
';
        $buffer .= $indent . '                        <a class="dropdown-item" role="menuitem" data-value="yearly" href="javascript:void(0)">';
        $value = $context->find('str');
        $buffer .= $this->section2a6165708677f5d28dd0412b7ad9970a($context, $indent, $value);
        $buffer .= '</a>
';
        $buffer .= $indent . '                        <a class="dropdown-item custom" role="menuitem" href="javascript:void(0)">
';
        $buffer .= $indent . '                            <input class="border-0 p-0 bg-transparent flatpickr" placeholder="';
        $value = $context->find('str');
        $buffer .= $this->section99891200e02cb04315d9b8dfb8f49fcc($context, $indent, $value);
        $buffer .= '" 0="data-input" />
';
        $buffer .= $indent . '                        </a>
';
        $buffer .= $indent . '                    </div>
';
        $buffer .= $indent . '                </div>
';
        $buffer .= $indent . '            </div>
';
        $buffer .= $indent . '        </div>
';
        $buffer .= $indent . '    </div>
';
        $buffer .= $indent . '</div>
';
        $value = $context->find('topinsights');
        $buffer .= $this->sectionBe5224a016abe7705bea30c0e6dcb041($context, $indent, $value);
        $buffer .= $indent . '<div id="wdm-edwiserreports" class="row mx-0" data-editing="';
        $value = $this->resolveValue($context->find('editing'), $context);
        $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
        $buffer .= '" data-contextid="';
        $value = $this->resolveValue($context->find('contextid'), $context);
        $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
        $buffer .= '">
';
        $value = $context->find('canmanagecustomreports');
        $buffer .= $this->section5fa3ca8e856ff726456d3284ee7a0f9e($context, $indent, $value);
        $value = $context->find('blocks');
        $buffer .= $this->section3437fd8ba419a6739b3d72cda27e93cd($context, $indent, $value);
        $value = $context->find('canmanagecustomreports');
        $buffer .= $this->section5fa3ca8e856ff726456d3284ee7a0f9e($context, $indent, $value);
        $buffer .= $indent . '</div>
';
        $buffer .= $indent . '
';
        $value = $context->find('js');
        $buffer .= $this->sectionBaa9be1f2acb406296ab6bc892e6fe96($context, $indent, $value);
        $buffer .= $indent . '
';
        $buffer .= $indent . '<script src="https://html2canvas.hertzen.com/dist/html2canvas.js">
';
        $buffer .= $indent . '/* Importacion de libreria que genera png */
';
        $buffer .= $indent . '</script>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdf-lib/1.17.1/pdf-lib.js">
';
        $buffer .= $indent . '/* Importacion de libreria que genera PDF */
';
        $buffer .= $indent . '</script>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '<script>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . 'async function descargarReporte(){
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '    /*var grafico1 = await html2canvas(document.querySelector("#apexchartsactiveusers")).then((canvas) => {
';
        $buffer .= $indent . '        // document.body.appendChild(canvas);
';
        $buffer .= $indent . '        return canvas;
';
        $buffer .= $indent . '    });*/
';
        $buffer .= $indent . '    var ancho_grafico1 = 0;
';
        $buffer .= $indent . '    var alto_grafico1 = 0;
';
        $buffer .= $indent . '    var ancho_grafico2 = 0;
';
        $buffer .= $indent . '    var alto_grafico2= 0;
';
        $buffer .= $indent . '    var ancho_grafico3 = 0;
';
        $buffer .= $indent . '    var alto_grafico3 = 0;
';
        $buffer .= $indent . '    var ancho_grafico4 = 0;
';
        $buffer .= $indent . '    var alto_grafico4 = 0;
';
        $buffer .= $indent . '    var ancho_grafico_notas = 0;
';
        $buffer .= $indent . '    var alto_grafico_notas = 0;
';
        $buffer .= $indent . '    var ancho_detalle_notas = 0;
';
        $buffer .= $indent . '    var alto_detalle_notas = 0;
';
        $buffer .= $indent . '    var ancho_alumno = 0;
';
        $buffer .= $indent . '    var alto_alumno = 0;    
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '    var grafico1 = await html2canvas(document.querySelector("#apexchartsactiveusers")).then((canvas) => {
';
        $buffer .= $indent . '        ancho_grafico1 = document.querySelector("#apexchartsactiveusers").offsetWidth;
';
        $buffer .= $indent . '        alto_grafico1 = document.querySelector("#apexchartsactiveusers").offsetHeight;
';
        $buffer .= $indent . '        return canvas;
';
        $buffer .= $indent . '     });
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '    var grafico2 = await html2canvas(document.querySelector("#apexchartsvisitsonsite")).then((canvas) => {
';
        $buffer .= $indent . '        // document.body.appendChild(canvas);
';
        $buffer .= $indent . '        ancho_grafico2 = document.querySelector("#apexchartsvisitsonsite").offsetWidth;
';
        $buffer .= $indent . '        alto_grafico2 = document.querySelector("#apexchartsvisitsonsite").offsetHeight;
';
        $buffer .= $indent . '        return canvas;
';
        $buffer .= $indent . '    });
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '    var grafico3 = await html2canvas(document.querySelector("#apexchartstimespentonsite")).then((canvas) => {
';
        $buffer .= $indent . '        // document.body.appendChild(canvas);
';
        $buffer .= $indent . '        ancho_grafico3 = document.querySelector("#apexchartstimespentonsite").offsetWidth;
';
        $buffer .= $indent . '        alto_grafico3 = document.querySelector("#apexchartstimespentonsite").offsetHeight;
';
        $buffer .= $indent . '        return canvas;
';
        $buffer .= $indent . '    });
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '     var grafico4 = await html2canvas(document.querySelector("#apexchartstimespentoncourse")).then((canvas) => {
';
        $buffer .= $indent . '        // document.body.appendChild(canvas);
';
        $buffer .= $indent . '        ancho_grafico4 = document.querySelector("#apexchartstimespentoncourse").offsetWidth;
';
        $buffer .= $indent . '        alto_grafico4 = document.querySelector("#apexchartstimespentoncourse").offsetHeight;
';
        $buffer .= $indent . '        return canvas;
';
        $buffer .= $indent . '    });
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '    /*
';
        $buffer .= $indent . '     var canvas = document.getElementById("myCanvas");
';
        $buffer .= $indent . '    var context = canvas.getContext("2d");
';
        $buffer .= $indent . '    var img = document.getElementById("myImage");
';
        $buffer .= $indent . '        
';
        $buffer .= $indent . '    context.drawImage(img, 10, 10, 
';
        $buffer .= $indent . '        300, 175, 0, 0, 100, 175);
';
        $buffer .= $indent . '    */
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '    // Este bloque crea un elemento canvas dentro del div #apexchartsgrade y lo dimensiona para recortar la captura del grafico
';
        $buffer .= $indent . '    var divNotas = document.getElementById(\'apexchartsgrade\');
';
        $buffer .= $indent . '    var nuevoCanvas = document.createElement(\'canvas\');
';
        $buffer .= $indent . '    nuevoCanvas.id = \'canvasNotas\'
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '    // Dimension del canvas
';
        $buffer .= $indent . '    nuevoCanvas.width = 250;
';
        $buffer .= $indent . '    nuevoCanvas.height = 250;
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '    var contexto = nuevoCanvas.getContext(\'2d\', {willReadFrequently: true});
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '     await html2canvas(document.querySelector(\'#apexchartsgrade\')).then((canvas) => {
';
        $buffer .= $indent . '        
';
        $buffer .= $indent . '        // Modificar para que quede bien
';
        $buffer .= $indent . '        contexto.drawImage(canvas, 0, 0, canvas.width * 0.7, canvas.height, 0, 0, nuevoCanvas.width, nuevoCanvas.height);
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '        // Agregar el canvas recortado al nuevo contenedor
';
        $buffer .= $indent . '        divNotas.appendChild(nuevoCanvas);
';
        $buffer .= $indent . '    });
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '    var grafico_notas = await html2canvas(document.querySelector(\'#canvasNotas\')).then((canvas) => {
';
        $buffer .= $indent . '        // document.body.appendChild(canvas);
';
        $buffer .= $indent . '        ancho_grafico_notas = document.querySelector(\'#canvasNotas\').offsetWidth;
';
        $buffer .= $indent . '        alto_grafico_notas = document.querySelector(\'#canvasNotas\').offsetHeight;
';
        $buffer .= $indent . '        return canvas;
';
        $buffer .= $indent . '    });
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '    
';
        $buffer .= $indent . '    // Oculta el canvas una vez capturado el grafico recortado
';
        $buffer .= $indent . '    document.getElementById(\'canvasNotas\').remove();
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '    var detalle_notas = await html2canvas(document.querySelector(".apexcharts-legend.apexcharts-align-center.position-right")).then((canvas) => {
';
        $buffer .= $indent . '        // document.body.appendChild(canvas);
';
        $buffer .= $indent . '        ancho_detalle_notas = document.querySelector(".apexcharts-legend.apexcharts-align-center.position-right").offsetWidth;
';
        $buffer .= $indent . '        alto_detalle_notas = document.querySelector(".apexcharts-legend.apexcharts-align-center.position-right").offsetHeight;
';
        $buffer .= $indent . '        return canvas;
';
        $buffer .= $indent . '    });
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '    //querySelector(\'.apexcharts-legend.apexcharts-align-center.position-right\')
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '    var alumno = await html2canvas(document.querySelector(".select2-selection__rendered")).then((canvas) => {
';
        $buffer .= $indent . '        // document.body.appendChild(canvas);
';
        $buffer .= $indent . '        ancho_alumno = document.querySelector(".select2-selection__rendered").offsetWidth;
';
        $buffer .= $indent . '        alto_alumno = document.querySelector(".select2-selection__rendered").offsetHeight;
';
        $buffer .= $indent . '        return canvas;
';
        $buffer .= $indent . '    });
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '    var dimensiones_imagenes = {
';
        $buffer .= $indent . '        grafico1: {
';
        $buffer .= $indent . '            ancho: ancho_grafico1 > 900 ? ancho_grafico1*0.4 : ancho_grafico1*0.6,
';
        $buffer .= $indent . '            alto: ancho_grafico1 > 900 ? alto_grafico1*0.4 : alto_grafico1*0.6,
';
        $buffer .= $indent . '        },
';
        $buffer .= $indent . '        grafico2: {
';
        $buffer .= $indent . '            ancho: ancho_grafico2 > 900 ? ancho_grafico2*0.4 : ancho_grafico2*0.4,
';
        $buffer .= $indent . '            alto: alto_grafico2 > 900 ? alto_grafico2*0.4 : alto_grafico2*0.4,
';
        $buffer .= $indent . '        },
';
        $buffer .= $indent . '        grafico3: {
';
        $buffer .= $indent . '            ancho: ancho_grafico3 > 900 ? ancho_grafico3*0.4 : ancho_grafico3*0.4,
';
        $buffer .= $indent . '            alto: alto_grafico3 > 900 ? alto_grafico3*0.4 : alto_grafico3*0.4,
';
        $buffer .= $indent . '        },
';
        $buffer .= $indent . '        grafico4: {
';
        $buffer .= $indent . '            ancho: ancho_grafico4 > 900 ? ancho_grafico4*0.4 : ancho_grafico4*0.6,
';
        $buffer .= $indent . '            alto: alto_grafico4 > 900 ? alto_grafico4*0.4 : alto_grafico4*0.6,
';
        $buffer .= $indent . '        },
';
        $buffer .= $indent . '        grafico_notas: {
';
        $buffer .= $indent . '            ancho: ancho_grafico_notas > 900 ? ancho_grafico_notas*0.4 : ancho_grafico_notas*1.3,
';
        $buffer .= $indent . '            alto: alto_grafico_notas,
';
        $buffer .= $indent . '        },
';
        $buffer .= $indent . '        detalle_notas: {
';
        $buffer .= $indent . '            ancho: ancho_detalle_notas,
';
        $buffer .= $indent . '            alto: alto_detalle_notas,
';
        $buffer .= $indent . '        },
';
        $buffer .= $indent . '        alumno: {
';
        $buffer .= $indent . '            ancho: ancho_alumno, 
';
        $buffer .= $indent . '            alto: alto_alumno,
';
        $buffer .= $indent . '        }
';
        $buffer .= $indent . '    }
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '    generarPDF(grafico1, grafico2, grafico3, grafico4, grafico_notas, detalle_notas, alumno, dimensiones_imagenes);
';
        $buffer .= $indent . '    
';
        $buffer .= $indent . '    /*alert(\'funcion OK\');
';
        $buffer .= $indent . '     Llamar a los metodos para capturar pantalla y luego generar PDF. Antes se deben importar las librerias JS */
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '}
';
        $buffer .= $indent . '
';
        $buffer .= $indent . 'async function generarPDF(grafico1, grafico2, grafico3, grafico4, grafico_notas, detalle_notas, alumno, dimensiones_imagenes) {
';
        $buffer .= $indent . '    // No olvidar de poner grafico3, grafico4, etc en el parentesis de generarPDF
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '    
';
        $buffer .= $indent . '    const grafico1_base64 = grafico1.toDataURL("image/png;base64").split(\';base64,\').pop();
';
        $buffer .= $indent . '    const grafico2_base64 = grafico2.toDataURL("image/png;base64").split(\';base64,\').pop();
';
        $buffer .= $indent . '    const grafico3_base64 = grafico3.toDataURL("image/png;base64").split(\';base64,\').pop();
';
        $buffer .= $indent . '    const grafico4_base64 = grafico4.toDataURL("image/png;base64").split(\';base64,\').pop();
';
        $buffer .= $indent . '    const grafico_notas_base64 = grafico_notas.toDataURL("image/png;base64").split(\';base64,\').pop();
';
        $buffer .= $indent . '    const detalle_notas_base64 = detalle_notas.toDataURL("image/png;base64").split(\';base64,\').pop();
';
        $buffer .= $indent . '    const alumno_base64 = alumno.toDataURL("image/png;base64").split(\';base64,\').pop();
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '    
';
        $buffer .= $indent . '    const grafico1_bytes = Uint8Array.from(atob(grafico1_base64), c => c.charCodeAt(0));
';
        $buffer .= $indent . '    const grafico2_bytes = Uint8Array.from(atob(grafico2_base64), c => c.charCodeAt(0));
';
        $buffer .= $indent . '    const grafico3_bytes = Uint8Array.from(atob(grafico3_base64), c => c.charCodeAt(0));
';
        $buffer .= $indent . '    const grafico4_bytes = Uint8Array.from(atob(grafico4_base64), c => c.charCodeAt(0));
';
        $buffer .= $indent . '    const grafico_notas_bytes = Uint8Array.from(atob(grafico_notas_base64), c => c.charCodeAt(0));
';
        $buffer .= $indent . '    const detalle_notas_bytes = Uint8Array.from(atob(detalle_notas_base64), c => c.charCodeAt(0));
';
        $buffer .= $indent . '    const alumno_bytes = Uint8Array.from(atob(alumno_base64), c => c.charCodeAt(0));
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '    const encabezado = \'Reporte de alumno\';
';
        $buffer .= $indent . '    const titulo0 = "Usuarios activos del aula";
';
        $buffer .= $indent . '    const titulog1 = \'Promedio De Notas (%)\';
';
        $buffer .= $indent . '    const titulog2 = \'Tiempo Dedicado a sus Cursos\';
';
        $buffer .= $indent . '    const titulog3 = \'Tiempo Permanecido en el Cursos\';
';
        $buffer .= $indent . '    const titulog4 = \'Visitas Promedio del sitio (en un día)\';
';
        $buffer .= $indent . '    const titulog5 = \'Titulo grafico 5\';
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '    // Crea objeto PDF
';
        $buffer .= $indent . '    const pdfDoc = await PDFLib.PDFDocument.create();
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '    const page = pdfDoc.addPage([595.28, 841.89]); // Tamaño de PDF A4 (1 mm = 2.83465 puntos)
';
        $buffer .= $indent . '    const { width, height } = page.getSize();
';
        $buffer .= $indent . '    const fontSize = 15;
';
        $buffer .= $indent . '    const Toffset = 790;
';
        $buffer .= $indent . '    const Toffset0 = 740;
';
        $buffer .= $indent . '    const T1offset = 465;
';
        $buffer .= $indent . '    const T2offset = 465;
';
        $buffer .= $indent . '    const T3offset = 215;
';
        $buffer .= $indent . '    const T4offset = 215;
';
        $buffer .= $indent . '    const T5offset = 450;
';
        $buffer .= $indent . '    const squareSize = 200;
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '    const helveticaFont = await pdfDoc.embedFont(PDFLib.StandardFonts.Helvetica); // Estilo de letra
';
        $buffer .= $indent . '    const helveticaBoldFont = await pdfDoc.embedFont(PDFLib.StandardFonts.HelveticaBold);
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '    const textWidth = helveticaFont.widthOfTextAtSize(encabezado, fontSize);
';
        $buffer .= $indent . '    const textWidth0 = helveticaFont.widthOfTextAtSize(titulo0, fontSize);
';
        $buffer .= $indent . '    const textWidth1 = helveticaFont.widthOfTextAtSize(titulog1, fontSize);
';
        $buffer .= $indent . '    const textWidth2 = helveticaFont.widthOfTextAtSize(titulog2, fontSize);
';
        $buffer .= $indent . '    const textWidth3 = helveticaFont.widthOfTextAtSize(titulog3, fontSize);
';
        $buffer .= $indent . '    const textWidth4 = helveticaFont.widthOfTextAtSize(titulog4, fontSize);
';
        $buffer .= $indent . '    const textWidth5 = helveticaFont.widthOfTextAtSize(titulog5, fontSize);
';
        $buffer .= $indent . '    
';
        $buffer .= $indent . '    // Crear una imagen a partir de los bytes
';
        $buffer .= $indent . '    const imagen_grafico1 = await pdfDoc.embedPng(grafico1_bytes);
';
        $buffer .= $indent . '    const imagen_grafico2 = await pdfDoc.embedPng(grafico2_bytes);
';
        $buffer .= $indent . '    const imagen_grafico3 = await pdfDoc.embedPng(grafico3_bytes);
';
        $buffer .= $indent . '    const imagen_grafico4 = await pdfDoc.embedPng(grafico4_bytes);
';
        $buffer .= $indent . '    const imagen_grafico_notas = await pdfDoc.embedPng(grafico_notas_bytes);
';
        $buffer .= $indent . '    const imagen_detalle_notas = await pdfDoc.embedPng(detalle_notas_bytes);
';
        $buffer .= $indent . '    const imagen_alumno = await pdfDoc.embedPng(alumno_bytes);
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '    //const grafico1_tamano = imagen_grafico1.scale(0.6); // Puedes ajustar la escala según lo necesites
';
        $buffer .= $indent . '    //const grafico2_tamano = imagen_grafico2.scale(0.5); // Puedes ajustar la escala según lo necesites
';
        $buffer .= $indent . '    //const grafico3_tamano = imagen_grafico3.scale(0.5); // Puedes ajustar la escala según lo necesites
';
        $buffer .= $indent . '    //const grafico4_tamano = imagen_grafico4.scale(0.5); // Puedes ajustar la escala según lo necesites
';
        $buffer .= $indent . '    /*const grafico5_tamano = imagen_grafico5.scale(0.5); // Puedes ajustar la escala según lo necesites*/
';
        $buffer .= $indent . '    //const alumno_tamano = imagen_alumno.scale(0.9); // Puedes ajustar la escala según lo necesites
';
        $buffer .= $indent . '    
';
        $buffer .= $indent . '    /*// Inserta las imagenes
';
        $buffer .= $indent . '    page.drawImage(imagen_grafico1, {
';
        $buffer .= $indent . '    x: 50, // Coordenada x donde se colocará la imagen
';
        $buffer .= $indent . '    y: height -280, // Coordenada y donde se colocará la imagen
';
        $buffer .= $indent . '    width: grafico1_tamano.width,
';
        $buffer .= $indent . '    height: grafico1_tamano.height,
';
        $buffer .= $indent . '    });*/
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '    page.drawImage(imagen_grafico1, {
';
        $buffer .= $indent . '    x: 50, // Coordenada x donde se colocará la imagen
';
        $buffer .= $indent . '    y: height - 320, // Coordenada y donde se colocará la imagen
';
        $buffer .= $indent . '    width: dimensiones_imagenes.grafico1.ancho,
';
        $buffer .= $indent . '    height: dimensiones_imagenes.grafico1.alto,
';
        $buffer .= $indent . '    });
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '    page.drawImage(imagen_grafico_notas, {
';
        $buffer .= $indent . '    x: 0, // Coordenada x donde se colocará la imagen
';
        $buffer .= $indent . '    y: height - (dimensiones_imagenes.grafico_notas.ancho > 900 ? 400 : 550), // Coordenada y donde se colocará la imagen
';
        $buffer .= $indent . '    width: dimensiones_imagenes.grafico_notas.ancho > 900 ? dimensiones_imagenes.grafico_notas.ancho*0.4 : dimensiones_imagenes.grafico_notas.ancho*0.6,
';
        $buffer .= $indent . '    height: dimensiones_imagenes.grafico_notas.ancho > 900 ? dimensiones_imagenes.grafico_notas.alto*0.4 : dimensiones_imagenes.grafico_notas.alto*0.6,
';
        $buffer .= $indent . '    });
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '    page.drawImage(imagen_detalle_notas, {
';
        $buffer .= $indent . '    x: 180, // Coordenada x donde se colocará la imagen
';
        $buffer .= $indent . '    y: height - (dimensiones_imagenes.detalle_notas.ancho > 900 ? 550 : 535), // Coordenada y donde se colocará la imagen
';
        $buffer .= $indent . '    width: dimensiones_imagenes.detalle_notas.ancho > 900 ? dimensiones_imagenes.detalle_notas.ancho*0.4 : dimensiones_imagenes.detalle_notas.ancho*0.6,
';
        $buffer .= $indent . '    height: dimensiones_imagenes.detalle_notas.ancho > 900 ? dimensiones_imagenes.detalle_notas.alto*0.4 : dimensiones_imagenes.detalle_notas.alto*0.6,
';
        $buffer .= $indent . '    });
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '    page.drawImage(imagen_grafico4, {
';
        $buffer .= $indent . '    x: 290, // Coordenada x donde se colocará la imagen
';
        $buffer .= $indent . '    y: height -570, // Coordenada y donde se colocará la imagen
';
        $buffer .= $indent . '    width: dimensiones_imagenes.grafico4.ancho > 900 ? dimensiones_imagenes.grafico4.ancho*0.4 : dimensiones_imagenes.grafico4.ancho*0.7,
';
        $buffer .= $indent . '    height: dimensiones_imagenes.grafico4.ancho > 900 ? dimensiones_imagenes.grafico4.alto*0.4 : dimensiones_imagenes.grafico4.alto*0.7,
';
        $buffer .= $indent . '    });
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '    page.drawImage(imagen_grafico3, {
';
        $buffer .= $indent . '    x: 20, // Coordenada x donde se colocará la imagen
';
        $buffer .= $indent . '    y: height -800, // Coordenada y donde se colocará la imagen
';
        $buffer .= $indent . '    width: dimensiones_imagenes.grafico3.ancho, 
';
        $buffer .= $indent . '    height: dimensiones_imagenes.grafico3.alto,
';
        $buffer .= $indent . '    });
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '    page.drawImage(imagen_grafico2, {
';
        $buffer .= $indent . '    x: 300, // Coordenada x donde se colocará la imagen
';
        $buffer .= $indent . '    y: height -800, // Coordenada y donde se colocará la imagen
';
        $buffer .= $indent . '    width: dimensiones_imagenes.grafico2.ancho,
';
        $buffer .= $indent . '    height: dimensiones_imagenes.grafico2.alto,
';
        $buffer .= $indent . '    });
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '    page.drawImage(imagen_alumno, {
';
        $buffer .= $indent . '    x: 450, // Coordenada x donde se colocará la imagen
';
        $buffer .= $indent . '    y: height -43, // Coordenada y donde se colocará la imagen
';
        $buffer .= $indent . '    width: dimensiones_imagenes.alumno.ancho,
';
        $buffer .= $indent . '    height: dimensiones_imagenes.alumno.alto,
';
        $buffer .= $indent . '    });
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '// Titulos de los Plots
';
        $buffer .= $indent . '    page.drawText(encabezado, {
';
        $buffer .= $indent . '        x: 50,
';
        $buffer .= $indent . '        y: fontSize + Toffset,
';
        $buffer .= $indent . '        size: fontSize,
';
        $buffer .= $indent . '        color: PDFLib.rgb(0,0,0),
';
        $buffer .= $indent . '        font: await pdfDoc.embedFont(PDFLib.StandardFonts.HelveticaBold),
';
        $buffer .= $indent . '    });
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '    page.drawLine({
';
        $buffer .= $indent . '       start: { x: 50, y: fontSize - 2 + Toffset },
';
        $buffer .= $indent . '       end: { x: 50 + textWidth + 5, y: fontSize - 2 + Toffset},
';
        $buffer .= $indent . '       thickness: 1,
';
        $buffer .= $indent . '       color: PDFLib.rgb(0, 0, 0), // Puedes ajustar el color del subrayado si lo deseas
';
        $buffer .= $indent . '    });
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '    page.drawText(titulo0, {
';
        $buffer .= $indent . '        x: 50,
';
        $buffer .= $indent . '        y: fontSize + Toffset0,
';
        $buffer .= $indent . '        size: fontSize,
';
        $buffer .= $indent . '        color: PDFLib.rgb(0,0,0),
';
        $buffer .= $indent . '        
';
        $buffer .= $indent . '    });
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '    page.drawLine({
';
        $buffer .= $indent . '       start: { x: 50, y: fontSize - 2 + Toffset0 },
';
        $buffer .= $indent . '       end: { x: 50 + textWidth0, y: fontSize - 2 + Toffset0},
';
        $buffer .= $indent . '       thickness: 1,
';
        $buffer .= $indent . '       color: PDFLib.rgb(0, 0, 0), // Puedes ajustar el color del subrayado si lo deseas
';
        $buffer .= $indent . '    });
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '    page.drawText(titulog1, {
';
        $buffer .= $indent . '        x: 50,
';
        $buffer .= $indent . '        y: fontSize + T1offset,
';
        $buffer .= $indent . '        size: fontSize,
';
        $buffer .= $indent . '        color: PDFLib.rgb(0,0,0),
';
        $buffer .= $indent . '    });
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '    page.drawLine({
';
        $buffer .= $indent . '       start: { x: 50, y: fontSize - 2 + T1offset },
';
        $buffer .= $indent . '       end: { x: 50 + textWidth1, y: fontSize - 2 + T1offset},
';
        $buffer .= $indent . '       thickness: 1,
';
        $buffer .= $indent . '       color: PDFLib.rgb(0, 0, 0), // Puedes ajustar el color del subrayado si lo deseas
';
        $buffer .= $indent . '    });
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '    page.drawText(titulog2, {
';
        $buffer .= $indent . '        x: 320,
';
        $buffer .= $indent . '        y: fontSize + T2offset,
';
        $buffer .= $indent . '        size: fontSize,
';
        $buffer .= $indent . '        color: PDFLib.rgb(0,0,0),
';
        $buffer .= $indent . '    });
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '    page.drawLine({
';
        $buffer .= $indent . '       start: { x: 320, y: fontSize - 2 + T2offset },
';
        $buffer .= $indent . '       end: { x: 320 + textWidth2, y: fontSize - 2 + T2offset},
';
        $buffer .= $indent . '       thickness: 1,
';
        $buffer .= $indent . '       color: PDFLib.rgb(0, 0, 0), // Puedes ajustar el color del subrayado si lo deseas
';
        $buffer .= $indent . '    });
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '      page.drawText(titulog3, {
';
        $buffer .= $indent . '        x: 50,
';
        $buffer .= $indent . '        y: fontSize + T3offset,
';
        $buffer .= $indent . '        size: fontSize,
';
        $buffer .= $indent . '        color: PDFLib.rgb(0,0,0),
';
        $buffer .= $indent . '    });
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '    page.drawLine({
';
        $buffer .= $indent . '       start: { x: 50, y: fontSize - 2 + T3offset },
';
        $buffer .= $indent . '       end: { x: 50 + textWidth3, y: fontSize - 2 + T3offset},
';
        $buffer .= $indent . '       thickness: 1,
';
        $buffer .= $indent . '       color: PDFLib.rgb(0, 0, 0), // Puedes ajustar el color del subrayado si lo deseas
';
        $buffer .= $indent . '    });
';
        $buffer .= $indent . '    
';
        $buffer .= $indent . '    page.drawText(titulog4, {
';
        $buffer .= $indent . '        x: 320,
';
        $buffer .= $indent . '        y: fontSize + T4offset,
';
        $buffer .= $indent . '        size: fontSize,
';
        $buffer .= $indent . '        color: PDFLib.rgb(0,0,0),
';
        $buffer .= $indent . '    });
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '    page.drawLine({
';
        $buffer .= $indent . '       start: { x: 320, y: fontSize - 2 + T4offset },
';
        $buffer .= $indent . '       end: { x: 320 + textWidth4, y: fontSize - 2 + T4offset},
';
        $buffer .= $indent . '       thickness: 1,
';
        $buffer .= $indent . '       color: PDFLib.rgb(0, 0, 0), // Puedes ajustar el color del subrayado si lo deseas
';
        $buffer .= $indent . '    });
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '   let fechactual = new Date();
';
        $buffer .= $indent . ' //Obtener cada parte de la fecha (día, mes, año, hora, minutos, segundos)
';
        $buffer .= $indent . '   let dia = fechactual.getDate();
';
        $buffer .= $indent . '   let mes = fechactual.getMonth() + 1; // Los meses comienzan desde 0, por eso se suma 1
';
        $buffer .= $indent . '   let anio = fechactual.getFullYear();
';
        $buffer .= $indent . '   let horas = fechactual.getHours();
';
        $buffer .= $indent . '   let minutos = fechactual.getMinutes();
';
        $buffer .= $indent . '   let segundos = fechactual.getSeconds();
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '  // Formatear la fecha como una cadena de texto legible
';
        $buffer .= $indent . '   let fechaTexto = `${dia}/${mes}/${anio}`;
';
        $buffer .= $indent . '    
';
        $buffer .= $indent . '    page.drawText(fechaTexto, {
';
        $buffer .= $indent . '        x: 450,
';
        $buffer .= $indent . '        y: height -60,
';
        $buffer .= $indent . '        size: fontSize,
';
        $buffer .= $indent . '        color: PDFLib.rgb(0,0,0),
';
        $buffer .= $indent . '    });
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '    const pdfBytes = await pdfDoc.save();
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '    const blob = new Blob([pdfBytes], { type: \'application/pdf\' });
';
        $buffer .= $indent . '    const link = document.createElement(\'a\');
';
        $buffer .= $indent . '    link.href = window.URL.createObjectURL(blob);
';
        $buffer .= $indent . '    link.download = \'reporte_pdf.pdf\';
';
        $buffer .= $indent . '    link.click();
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '    /* Descargar imagen PNG*/
';
        $buffer .= $indent . '    /* const data = canvas.toDataURL("image/png;base64");
';
        $buffer .= $indent . '    const donwloadLink = document.querySelector("#download_report");
';
        $buffer .= $indent . '    donwloadLink.download = filename;
';
        $buffer .= $indent . '    donwloadLink.href = data; */
';
        $buffer .= $indent . '}
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '</script>
';
        $buffer .= $indent . '
';
        $value = $context->find('setactive');
        $buffer .= $this->section52ae84c2ab9c05d2f043ee60ca785cb8($context, $indent, $value);

        return $buffer;
    }

    private function section24c39844773e91bb74dfbc3330da341c(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = ' dashboard, local_edwiserreports ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= ' dashboard, local_edwiserreports ';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section1772da8ea9ca2c6bc8f5c94f9031071e(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = ' loading, local_edwiserreports ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= ' loading, local_edwiserreports ';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section4e8b20a9fe6d8f29751db4d6458c169e(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = ' date, local_edwiserreports ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= ' date, local_edwiserreports ';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionC48b1ed39c6e06f864d9aaa18493d5c4(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = ' last7days, local_edwiserreports ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= ' last7days, local_edwiserreports ';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section1a820dc2f0b751bbacad031e7035500e(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = ' lastweek, local_edwiserreports ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= ' lastweek, local_edwiserreports ';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionD51af92dfda0bf8ff3577714a367ae9a(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = ' lastmonth, local_edwiserreports ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= ' lastmonth, local_edwiserreports ';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section2a6165708677f5d28dd0412b7ad9970a(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = ' lastyear, local_edwiserreports ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= ' lastyear, local_edwiserreports ';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section99891200e02cb04315d9b8dfb8f49fcc(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = ' customdate, local_edwiserreports ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= ' customdate, local_edwiserreports ';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionBe5224a016abe7705bea30c0e6dcb041(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
    {{> local_edwiserreports/insights/insights }}
';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                if ($partial = $this->mustache->loadPartial('local_edwiserreports/insights/insights')) {
                    $buffer .= $partial->renderInternal($context, $indent . '    ');
                }
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionF5f0221875981173e67a62ee8a47a443(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = ' createcustomreports, local_edwiserreports ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= ' createcustomreports, local_edwiserreports ';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section5fa3ca8e856ff726456d3284ee7a0f9e(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
        <div class="col-12 mb-5">
            <a href="{{customreportseditlink}}" class="btn theme-primary-bg text-white pull-right">
                <i class="icon fa fa-plus fa-fw " aria-hidden="true"></i>
                {{#str}} createcustomreports, local_edwiserreports {{/str}}
            </a>
        </div>
    ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '        <div class="col-12 mb-5">
';
                $buffer .= $indent . '            <a href="';
                $value = $this->resolveValue($context->find('customreportseditlink'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '" class="btn theme-primary-bg text-white pull-right">
';
                $buffer .= $indent . '                <i class="icon fa fa-plus fa-fw " aria-hidden="true"></i>
';
                $buffer .= $indent . '                ';
                $value = $context->find('str');
                $buffer .= $this->sectionF5f0221875981173e67a62ee8a47a443($context, $indent, $value);
                $buffer .= '
';
                $buffer .= $indent . '            </a>
';
                $buffer .= $indent . '        </div>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section7651fd7f97f824db493c7664aad70595(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = ' block-hidden ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= ' block-hidden ';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section9fee67b870f0d7dc2816798d6546048e(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'has-footer';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= 'has-footer';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section03a8191d89d74c93a70fcde510cdf20d(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                                            {{> local_edwiserreports/download_buttons }}
                                        ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                if ($partial = $this->mustache->loadPartial('local_edwiserreports/download_buttons')) {
                    $buffer .= $partial->renderInternal($context, $indent . '                                            ');
                }
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section9709172706d80ffb617331d7191efccd(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                                <div class="dropdown export-options">
                                    <button role="button" type="button" class="btn">
                                        <i class="fa fa-ellipsis-v theme-primary-text"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right" style="">
                                        <!-- item-->
                                        {{# downloadlinks }}
                                            {{> local_edwiserreports/download_buttons }}
                                        {{/ downloadlinks }}
                                    </div>
                                </div>
                            ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '                                <div class="dropdown export-options">
';
                $buffer .= $indent . '                                    <button role="button" type="button" class="btn">
';
                $buffer .= $indent . '                                        <i class="fa fa-ellipsis-v theme-primary-text"></i>
';
                $buffer .= $indent . '                                    </button>
';
                $buffer .= $indent . '                                    <div class="dropdown-menu dropdown-menu-right" style="">
';
                $buffer .= $indent . '                                        <!-- item-->
';
                $value = $context->find('downloadlinks');
                $buffer .= $this->section03a8191d89d74c93a70fcde510cdf20d($context, $indent, $value);
                $buffer .= $indent . '                                    </div>
';
                $buffer .= $indent . '                                </div>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section5aa6eaa7ae1f27321eb938ed8165b08e(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                                {{> local_edwiserreports/blocksettingdropdown }}
                            ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                if ($partial = $this->mustache->loadPartial('local_edwiserreports/blocksettingdropdown')) {
                    $buffer .= $partial->renderInternal($context, $indent . '                                ');
                }
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionAe8f615e676476cf03bda747ea0b3f18(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = ' viewdetails, local_edwiserreports ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= ' viewdetails, local_edwiserreports ';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionBbcd216618cb374e941d14b63fda3ab0(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                        <div class="panel-footer p-3">
                            <a href="{{{.}}}" class="btn theme-primary-text theme-primary-border ml-auto">{{#str}} viewdetails, local_edwiserreports {{/str}}</a>
                        </div>
                    ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '                        <div class="panel-footer p-3">
';
                $buffer .= $indent . '                            <a href="';
                $value = $this->resolveValue($context->last(), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= '" class="btn theme-primary-text theme-primary-border ml-auto">';
                $value = $context->find('str');
                $buffer .= $this->sectionAe8f615e676476cf03bda747ea0b3f18($context, $indent, $value);
                $buffer .= '</a>
';
                $buffer .= $indent . '                        </div>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section3437fd8ba419a6739b3d72cda27e93cd(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
        <div class="{{{extraclasses}}} mb-5 edwiserReport-block {{# hiddenblock }} block-hidden {{/ hiddenblock}}" data-block="{{id}}">
            <div id="{{id}}" data-sesskey="{{sesskey}}" data-blockname="{{name}}">
                <div class="panel {{# morelink }}has-footer{{/ morelink }} m-0 pt-0 px-0 pb-3">
                    <div class="panel-header p-3 d-flex">
                        <div class="panel-title theme-1-text p-0">
                            <strong class="mb-1">
                                {{{name}}}
                                <a href="javascript:void(0)" data-title="{{info}}" class="small panel-help" data-toggle="tooltip" data-trigger="hover" data-placement="top">
                                    {{{infoicon}}}
                                </a>
                            </strong>
                        </div>
                        <div class="row p-0 ml-auto mr-0">
                            {{# hasmenu }}
                                <div class="dropdown export-options">
                                    <button role="button" type="button" class="btn">
                                        <i class="fa fa-ellipsis-v theme-primary-text"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right" style="">
                                        <!-- item-->
                                        {{# downloadlinks }}
                                            {{> local_edwiserreports/download_buttons }}
                                        {{/ downloadlinks }}
                                    </div>
                                </div>
                            {{/ hasmenu }}
                            {{# editopt }}
                                {{> local_edwiserreports/blocksettingdropdown }}
                            {{/ editopt }}
                        </div>
                    </div>
                    <div class="panel-body px-3 py-0">
                        <div class="block-filters position-relative pb-1">{{{ filters }}}</div>
                        {{{ blockview }}}
                    </div>
                    {{# morelink }}
                        <div class="panel-footer p-3">
                            <a href="{{{.}}}" class="btn theme-primary-text theme-primary-border ml-auto">{{#str}} viewdetails, local_edwiserreports {{/str}}</a>
                        </div>
                    {{/ morelink }}
                </div>
            </div>
        </div>
    ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '        <div class="';
                $value = $this->resolveValue($context->find('extraclasses'), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= ' mb-5 edwiserReport-block ';
                $value = $context->find('hiddenblock');
                $buffer .= $this->section7651fd7f97f824db493c7664aad70595($context, $indent, $value);
                $buffer .= '" data-block="';
                $value = $this->resolveValue($context->find('id'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '">
';
                $buffer .= $indent . '            <div id="';
                $value = $this->resolveValue($context->find('id'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '" data-sesskey="';
                $value = $this->resolveValue($context->find('sesskey'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '" data-blockname="';
                $value = $this->resolveValue($context->find('name'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '">
';
                $buffer .= $indent . '                <div class="panel ';
                $value = $context->find('morelink');
                $buffer .= $this->section9fee67b870f0d7dc2816798d6546048e($context, $indent, $value);
                $buffer .= ' m-0 pt-0 px-0 pb-3">
';
                $buffer .= $indent . '                    <div class="panel-header p-3 d-flex">
';
                $buffer .= $indent . '                        <div class="panel-title theme-1-text p-0">
';
                $buffer .= $indent . '                            <strong class="mb-1">
';
                $buffer .= $indent . '                                ';
                $value = $this->resolveValue($context->find('name'), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= '
';
                $buffer .= $indent . '                                <a href="javascript:void(0)" data-title="';
                $value = $this->resolveValue($context->find('info'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '" class="small panel-help" data-toggle="tooltip" data-trigger="hover" data-placement="top">
';
                $buffer .= $indent . '                                    ';
                $value = $this->resolveValue($context->find('infoicon'), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= '
';
                $buffer .= $indent . '                                </a>
';
                $buffer .= $indent . '                            </strong>
';
                $buffer .= $indent . '                        </div>
';
                $buffer .= $indent . '                        <div class="row p-0 ml-auto mr-0">
';
                $value = $context->find('hasmenu');
                $buffer .= $this->section9709172706d80ffb617331d7191efccd($context, $indent, $value);
                $value = $context->find('editopt');
                $buffer .= $this->section5aa6eaa7ae1f27321eb938ed8165b08e($context, $indent, $value);
                $buffer .= $indent . '                        </div>
';
                $buffer .= $indent . '                    </div>
';
                $buffer .= $indent . '                    <div class="panel-body px-3 py-0">
';
                $buffer .= $indent . '                        <div class="block-filters position-relative pb-1">';
                $value = $this->resolveValue($context->find('filters'), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= '</div>
';
                $buffer .= $indent . '                        ';
                $value = $this->resolveValue($context->find('blockview'), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= '
';
                $buffer .= $indent . '                    </div>
';
                $value = $context->find('morelink');
                $buffer .= $this->sectionBbcd216618cb374e941d14b63fda3ab0($context, $indent, $value);
                $buffer .= $indent . '                </div>
';
                $buffer .= $indent . '            </div>
';
                $buffer .= $indent . '        </div>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionBaa9be1f2acb406296ab6bc892e6fe96(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
M.local_edwiserreports = {
    secret: \'{{{secret}}}\'
};
';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . 'M.local_edwiserreports = {
';
                $buffer .= $indent . '    secret: \'';
                $value = $this->resolveValue($context->find('secret'), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= '\'
';
                $buffer .= $indent . '};
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section52ae84c2ab9c05d2f043ee60ca785cb8(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
    {{> local_edwiserreports/setactivenav }}
';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                if ($partial = $this->mustache->loadPartial('local_edwiserreports/setactivenav')) {
                    $buffer .= $partial->renderInternal($context, $indent . '    ');
                }
                $context->pop();
            }
        }
    
        return $buffer;
    }

}
