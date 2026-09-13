<!DOCTYPE html>
<html>
<head>
    <title>Ver Solicitud</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        .word-document {
            background: white;
            width: 21cm;
            min-height: 29.7cm;
            padding: 2.54cm;
            margin: 1cm auto;
            font-family: "Times New Roman", Times, serif;
            font-size: 12pt;
            line-height: 1.5;
            color: black;
            box-sizing: border-box;
        }

        .header-word-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 18px;
            border: 2px solid #111;
            table-layout: fixed;
        }
        .header-word-table td {
            border: 1px solid #111;
            vertical-align: middle;
            padding: 0;
        }
        .header-left {
            width: 35%;
            padding: 0.3cm 0.2cm 0.3cm 0.3cm;
        }
        .header-logo-row {
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .logo-img {
            width: 180px;
            height: auto;
            display: block;
        }
        .header-institute {
            display: flex;
            flex-direction: column;
            justify-content: center;
            font-family: 'Times New Roman', Times, serif;
            font-size: 15px;
            color: #1a2a36;
            font-weight: bold;
            line-height: 1.1;
        }
        .header-institute-title {
            font-size: 10px;
            font-weight: 500;
            letter-spacing: 0.5px;
        }
        .header-institute-name {
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 1px;
        }
        .header-center {
            width: 30%;
            text-align: center;
            font-size: 16px;
            font-weight: bold;
            letter-spacing: 1px;
        }
        .header-coord {
            font-size: 10px;
            font-weight: bold;
        }
        .header-right {
            width: 35%;
            padding: 0;
        }
        .header-info-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 8px;
        }
        .header-info-table td {
            border: 1px solid #111;
            padding: 2px 7px;
            font-size: 8px;
        }
        .header-info-label {
            font-weight: bold;
        }

        .line-thick {
            border-bottom: 3px solid #000;
            margin: 18px 0 18px 0;
        }

        .document-title {
            font-size: 18pt;
            font-weight: bold;
            text-align: center;
            margin-bottom: 0;
            width: 100%;
            display: block;
        }
        .doc-number {
            font-size: 13pt;
            font-weight: normal;
        }

        .info-block {
            margin-bottom: 0.5cm;
            font-size: 12pt;
        }
        .label {
            font-weight: bold;
        }
        .bold {
            font-weight: bold;
        }
        .red {
            color: #d32f2f;
            font-weight: bold;
        }
        .paragraph {
            text-align: justify;
            margin-bottom: 0.5cm;
        }

        .signature-block {
            text-align: center;
            margin: 1.5cm 0 1cm 0;
        }
        .signature-line {
            width: 7cm;
            border-top: 1.5px solid #000;
            margin: 0 auto 0.2cm auto;
        }
        .signature-label {
            font-weight: bold;
            margin-bottom: 0;
        }
        .signature-id {
            font-size: 11pt;
            margin-top: 0;
        }

        .constancia-row {
            display: flex;
            flex-direction: row;
            align-items: flex-start;
            margin-top: 1.2cm;
            margin-bottom: 0.5cm;
            width: 100%;
        }
        .constancia-label {
            flex: 1;
            font-size: 12pt;
            font-weight: bold;
            text-align: left;
            min-width: 220px;
        }
        .constancia-table-wrap {
            flex: 1;
            display: flex;
            justify-content: flex-end;
        }
        .constancia-table {
            border-collapse: collapse;
            font-size: 12pt;
            min-width: 220px;
        }
        .constancia-table td {
            border: none;
            padding: 2px 8px 2px 0;
            vertical-align: bottom;
        }
        .constancia-underline {
            border-bottom: 1.2px solid #000;
            width: 120px;
            height: 18px;
            display: inline-block;
        }

        .footer-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1.2cm;
            font-size: 10pt;
        }
        .footer-table td {
            border: 1px solid #000;
            padding: 4px 8px;
        }
        .footer-label {
            font-weight: bold;
        }
        .highlight {
            background:rgb(255, 255, 255);
            font-weight: bold;
            padding: 0 2px;
        }

        .aprobacion-table-wrap {
            width: 100%;
            margin-top: 0.5cm;
            display: flex;
            justify-content: flex-end;
        }
        .aprobacion-table {
            width: 100%;
            border: 1.5px solid #000;
            border-collapse: collapse;
            text-align: center;
            font-size: 12pt;
        }
        .aprobacion-table td {
            border: 1.5px solid #000;
            padding: 12px 0;
            height: 32px;
        }
        .aprobado, .rechazado {
            font-weight: bold;
        }

        .firma-firma-cell {
            padding-top: 22px !important;
        }
        .firma-linea {
            display: inline-block;
            border-bottom: 1.5px solid #000;
            width: 110px;
            height: 10px;
            vertical-align: bottom;
            margin-left: 5px;
        }

        @media print {
            @page {
                size: A4;
                margin: 0;
            }
            body * {
                visibility: hidden;
            }
            #printable-content, #printable-content * {
                visibility: visible;
            }
            #printable-content {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
            }
            .btn-group, .btn {
                display: none !important;
            }
            .word-document {
                padding: 2.54cm;
                margin: 0;
                width: 21cm;
                min-height: 29.7cm;
                box-shadow: none;
                border: none;
            }
            .no-print {
                display: none !important;
            }
            .header-info-table {
                width: 100%;
                border-collapse: collapse;
                font-size: 8px;
                margin-bottom: 10px; /* Espacio entre tablas */
            }
            .header-info-table td {
                border: 1px solid #111;
                padding: 2px 7px;
                font-size: 8px;
            }
            .header-info-label {
                font-weight: bold;
                background-color: #f0f0f0;
            }
            .header-info-value {
                text-align: left;
            }
            .header-info-table {
                float: none; /* Eliminar float */
                width: 100%; /* Ancho completo */
            }
        }

        .word-document,
        .header-institute,
        .header-institute-title,
        .header-institute-name,
        .header-center,
        .header-coord,
        .header-info-table,
        .header-info-table td,
        .header-info-label,
        .info-block,
        .label,
        .bold,
        .paragraph,
        .signature-block,
        .signature-label,
        .signature-id,
        .constancia-block,
        .footer-table,
        .footer-label,
        .doc-number,
        .main-content,
        .aprobacion-table,
        .aprobado,
        .rechazado,
        .constancia-table,
        .highlight {
            color: #000 !important;
        }

        /* Estilos específicos para el modal */
        .modal-backdrop {
            z-index: 1040;
        }

        .modal {
            z-index: 1050;
        }

        .modal-dialog {
            z-index: 1060;
        }

        .close {
            font-size: 1.5rem;
            font-weight: 700;
            line-height: 1;
            color: #000;
            text-shadow: 0 1px 0 #fff;
            opacity: .5;
            background: transparent;
            border: 0;
            padding: 0;
            margin: 0;
        }

        .close:hover {
            color: #000;
            text-decoration: none;
            opacity: .75;
        }

        .close:not(:disabled):not(.disabled):hover,
        .close:not(:disabled):not(.disabled):focus {
            opacity: .75;
        }

        /* Asegurar que el modal se muestre correctamente */
        .modal.fade .modal-dialog {
            transition: transform .3s ease-out;
            transform: translate(0,-50px);
        }

        .modal.show .modal-dialog {
            transform: none;
        }

        /* Estilos para la imagen en el modal */
        #captured-image-modal-body img {
            max-width: 100%;
            height: auto;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <a href="javascript:history.back()" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Volver
            </a>
            <div>
                <button onclick="captureAndSendToPdf()" class="btn btn-success me-2">
                    <i class="bi bi-camera"></i> Capturar e Imprimir
                </button>
            </div>
        </div>
        
        <!-- Select para tipo de documento -->
        <div class="mb-3">
            <label for="tipoDocumento" class="form-label fw-bold">Tipo de documento:</label>
            <select id="tipoDocumento" class="form-select w-auto d-inline-block ms-2">
                <option value="solicitud_ingreso">Solicitud de ingreso</option>
                <option value="solicitud_finiquito">Solicitud de Revision</option>
            </select>
        </div>
        
        <div id="printable-content" class="word-document">
            <!-- Nueva cabecera tipo Word -->
            <table class="header-word-table">
                <tr>
                    <td class="header-left">
                        <div class="header-logo-row">
                            <img src="/assets/img/info/2.png" alt="Logo" class="logo-img">
                            <div class="header-institute">
                            </div>
                        </div>
                    </td>
                    <td class="header-center">
                        <span class="header-coord">COORDINACION DE VINCULACIÓN.</span>
                    </td>
                    <td class="header-right">
                        <table class="header-info-table">
                            <tr><td class="header-info-label">ÁREA:</td><td>Académico</td></tr>
                            <tr><td class="header-info-label">CÓDIGO:</td><td>ISTAE-VIC-02</td></tr>
                            <tr><td class="header-info-label">VERSIÓN:</td><td>01</td></tr>
                            <tr><td class="header-info-label">UBICACIÓN:</td><td>San Lorenzo</td></tr>
                            <tr><td class="header-info-label">N° PÁGINAS:</td><td>1 de 1</td></tr>
                        </table>
                    </td>
                </tr>
            </table>
            
            <!-- Título y número -->
            <div class="solicitud-title-row" style="display: flex; align-items: center; width: 100%; margin-top: 1.5rem; margin-bottom: 1rem;">
                <div style="flex: 1;">
                    <!-- Bloques para cada tipo de documento -->
                    <div id="solicitud_ingreso" class="document-title tipo-doc-block">SOLICITUD</div>
                    <div id="solicitud_finiquito" class="document-title tipo-doc-block" style="display:none;">SOLICITUD</div>
                </div>
                <div style="text-align: right; min-width: 120px;">
                    <span class="doc-number" id="doc-number">No </span>
                </div>
            </div>
            
            <!-- Línea debajo del título -->
            <div class="line-thick"></div>
            
            <!-- Cuerpo principal -->
            <div class="main-content mt-4">
                <div class="info-block" style="text-transform: capitalize;">
                    <span class="label">Fecha:</span> 
                    <span id="fecha_display"></span><br>
                    <span class="label">Dirigido: </span> ING. FRANCISCO PEÑA <br>
                    <span class="label">Cargo: </span> Coordinador de Vinculación, <br>
                    <span class="label">Con copia: </span><span id="tutor-academico"></span>, Coordinador de Carrera <span id="carrera"></span>
                </div>
                
                <div class="line-thick"></div>
                
                <!-- Bloques para cada tipo de documento -->
                <div id="bloque_solicitud_ingreso" class="tipo-bloque-doc">
                    <div class="info-block mt-3">
                        <span class="label">Solicitante:</span> <span id="solicitante"></span><br>
                        <span class="label">Carrera:</span> <span id="carrera-bloque"></span><br>
                        <span class="label">Asunto:</span> <span class="bold">Solicitud de Prácticas de Servicio Comunitario</span>
                    </div>
                    <div class="paragraph mt-3">
                        Yo, <span id="solicitante-parrafo"></span>, con C.I. 
                        <span id="cedula-parrafo"></span>, estudiante de la carrera
                         <span id="carrera-parrafo"></span>, me dirijo a usted.  
                         <span id="tutor-parrafo"></span>, 
                         con la finalidad de solicitarle la realización de las prácticas de servicio comunitario dentro del proyecto 
                         "<span id="proyecto-parrafo"></span>" con codificación
                          <span id="codificacion-parrafo"></span> a ejecutarse dentro del periodo <span id="periodo-parrafo"></span>.
                    </div>
                    <div class="paragraph mt-2">
                        Correo electrónico: <span id="correo-parrafo"></span><br>
                        Teléfono: <span id="celular-parrafo"></span>
                    </div>
                </div>
                
                <div id="bloque_solicitud_finiquito" class="tipo-bloque-doc" style="display:none;">
                    <div class="info-block mt-3">
                        <span class="label">Solicitante:</span> <span id="solicitante-finiquito"></span><br>
                        <span class="label">Carrera:</span> <span id="carrera-finiquito"></span><br>
                        <span class="label">Asunto:</span> <span class="bold">Solicitud de Prácticas de Servicio Comunitario</span>
                    </div>
                    <div class="paragraph mt-3">
                        Yo, <span id="solicitante-parrafo-finiquito"></span>, con C.I. <span id="cedula-parrafo-finiquito"></span>, estudiante de la carrera <span id="carrera-parrafo-finiquito"></span>,
                         me dirijo a Ud. <span id="tutor-parrafo-finiquito"></span>, con la finalidad de solicitarle la 
                         revisión de la documentación correspondiente al proceso de prácticas de servicio 
                         comunitario realizado entre las fechas de
                          <span id="fecha_inicio_finiquito"></span> 
                          hasta <span id="fecha_fin_finiquito"></span>,
                           a cargo de la institución <span id="institucion-finiquito"></span>.
                    </div>
                </div>
            </div>
            
            <!-- Firma -->
            <div class="signature-block mt-5 mb-4">
                <div class="signature-line"></div>
                <div class="signature-label">Firma:</div>
                <div class="signature-id" id="cedula-display">C.I. </div>
            </div>
            
            <!-- Línea inferior -->
            <div class="line-thick"></div>
            
            <!-- Constancia de presentación -->
            <div class="constancia-row">
                <div class="constancia-label">
                    <b>CONSTANCIA DE PRESENTACIÓN:</b>
                </div>
                <div class="constancia-table-wrap">
                    <table class="constancia-table">
                        <tr>
                            <td>Fecha:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp   <span class="firma-linea"></span></td>
                        </tr>
                        <tr>
                            <td>Hora:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp     <span class="firma-linea"></span></td>
                        </tr>
                        <tr>
                            <td>Firma CC: <span class="firma-linea"></span></td>
                        </tr>
                    </table>
                </div>
            </div>
            
            <div class="aprobacion-table-wrap">
                <table class="aprobacion-table">
                    <tr>
                        <td class="aprobado">Aprobado</td>
                        <td class="rechazado">Rechazado</td>
                    </tr>
                    <tr>
                        <td style="height: 30px;"></td>
                        <td></td>
                    </tr>
                </table>
            </div>

            <!-- Pie de página -->
            <table class="footer-table mt-4">
                <tr>
                    <td><span class="footer-label">FECHA DE EXPEDICIÓN:</span> <span class="highlight">19 de mayo 2022</span></td>
                    <td><span class="footer-label">FECHA DE ACTUALIZACION:</span> N/A</td>
                    <td><span class="footer-label">ELABORADO POR:</span> Rectorado Académico</td>
                    <td><span class="footer-label">APROBADO POR:</span> <span class="highlight">IST-17J-OCS-2022-SEO-005-009R</span></td>
                </tr>
            </table>
        </div>
    </div>

    <!-- Modal para mostrar la imagen capturada -->
    <div class="modal fade" id="capturaModal" tabindex="-1" role="dialog" aria-labelledby="capturaModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="capturaModalLabel">Vista previa de la captura</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body text-center" id="captured-image-modal-body">
            <!-- Aquí se insertará la imagen -->
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" onclick="printDiv('captured-image-modal-body')">
              <i class="bi bi-printer"></i> Imprimir solo la imagen
            </button>
            <button type="button" class="btn btn-success" onclick="downloadCapturedImage()">
              <i class="bi bi-download"></i> Descargar imagen
            </button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-danger" onclick="closeModal()">
              <i class="bi bi-x-circle"></i> Cerrar (JS)
            </button>
          </div>
        </div>
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
    function captureAndDownload() {
        const element = document.getElementById('printable-content');
        const options = {
            scale: 2,
            useCORS: true,
            logging: false,
            backgroundColor: '#ffffff'
        };
        html2canvas(element, options).then(canvas => {
            const link = document.createElement('a');
            link.download = 'solicitud-captura.png';
            link.href = canvas.toDataURL('image/png');
            link.click();
        });
    }

    function captureAndSendToPdf() {
        const element = document.getElementById('printable-content');
        html2canvas(element, { scale: 2, useCORS: true, backgroundColor: '#fff' }).then(canvas => {
            // Mostrar la imagen en el modal
            const imgDataUrl = canvas.toDataURL('image/png');
            const modalBody = document.getElementById('captured-image-modal-body');
            modalBody.innerHTML = '<img id="img-to-print" src="' + imgDataUrl + '" style="max-width:100%;border:1px solid #ccc;"/>';
            // Guardar la imagen en una variable global para descargar
            window._capturedImgDataUrl = imgDataUrl;
            // Mostrar el modal (Bootstrap 4)
            $('#capturaModal').modal('show');
        });
    }

    // Imprimir solo el contenido del div del modal
    function printDiv(divId) {
        var printContents = document.getElementById(divId).innerHTML;
        var originalContents = document.body.innerHTML;
        
        // Crear una nueva ventana para imprimir
        var printWindow = window.open('', '_blank', 'width=800,height=600');
        printWindow.document.write('<html><head><title>Imprimir</title>');
        printWindow.document.write('<style>');
        printWindow.document.write('body { font-family: Arial, sans-serif; margin: 20px; }');
        printWindow.document.write('img { max-width: 100%; height: auto; }');
        printWindow.document.write('</style>');
        printWindow.document.write('</head><body>');
        printWindow.document.write(printContents);
        printWindow.document.write('</body></html>');
        printWindow.document.close();
        
        // Esperar a que se cargue el contenido antes de imprimir
        printWindow.onload = function() {
            printWindow.print();
            printWindow.close();
        };
    }

    // Descargar la imagen capturada
    function downloadCapturedImage() {
        if(window._capturedImgDataUrl) {
            const a = document.createElement('a');
            a.href = window._capturedImgDataUrl;
            a.download = 'captura.png';
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
        }
    }

    // Función para cerrar el modal programáticamente
    function closeModal() {
        $('#capturaModal').modal('hide');
    }

    // Función para abrir el modal programáticamente
    function openModal() {
        $('#capturaModal').modal('show');
    }

    // Función para llenar los datos de la solicitud
    function llenarDatosSolicitud(solicitud, tipoDocumento) {
        document.getElementById('doc-number').textContent = 'No ' + solicitud.codigo_practicas;
        document.getElementById('fecha_display').textContent = tipoDocumento === 'solicitud_ingreso' ? 
            formatearFecha(solicitud.fecha_inicio) : 
            formatearFecha(solicitud.fecha_finalizacion);
        document.getElementById('tutor-academico').textContent = solicitud.tutor_academico;
        document.getElementById('carrera').textContent = solicitud.carrera;
        document.getElementById('cedula-display').textContent = 'C.I. ' + solicitud.cedula;
        
        // Llenar datos del bloque de solicitud de ingreso
        document.getElementById('solicitante').textContent = solicitud.nombres_apellidos_estudiante;
        document.getElementById('carrera-bloque').textContent = solicitud.carrera;
        document.getElementById('solicitante-parrafo').textContent = solicitud.nombres_apellidos_estudiante;
        document.getElementById('cedula-parrafo').textContent = solicitud.cedula;
        document.getElementById('carrera-parrafo').textContent = solicitud.carrera;
        document.getElementById('tutor-parrafo').textContent = solicitud.tutor_academico;
        document.getElementById('proyecto-parrafo').textContent = solicitud.proyecto_asigando;
        document.getElementById('codificacion-parrafo').textContent = solicitud.codificacion_proyecto;
        document.getElementById('periodo-parrafo').textContent = solicitud.periodo;
        document.getElementById('correo-parrafo').textContent = solicitud.correo || 'No especificado';
        document.getElementById('celular-parrafo').textContent = solicitud.celular || 'No especificado';
        
        // Llenar datos del bloque de solicitud de finiquito
        document.getElementById('solicitante-finiquito').textContent = solicitud.nombres_apellidos_estudiante;
        document.getElementById('carrera-finiquito').textContent = solicitud.carrera;
        document.getElementById('solicitante-parrafo-finiquito').textContent = solicitud.nombres_apellidos_estudiante;
        document.getElementById('cedula-parrafo-finiquito').textContent = solicitud.cedula;
        document.getElementById('carrera-parrafo-finiquito').textContent = solicitud.carrera;
        document.getElementById('tutor-parrafo-finiquito').textContent = solicitud.tutor_academico;
        document.getElementById('fecha_inicio_finiquito').textContent = formatearFecha(solicitud.fecha_inicio);
        document.getElementById('fecha_fin_finiquito').textContent = formatearFecha(solicitud.fecha_finalizacion);
        document.getElementById('institucion-finiquito').textContent = solicitud.institu_destino || '________________';
    }
    
    function formatearFecha(fecha) {
        if (!fecha) return 'No especificada';
        const [year, month, day] = fecha.split('-');
        return `${day}/${month}/${year}`;
    }

    document.addEventListener('DOMContentLoaded', function() {
        const select = document.getElementById('tipoDocumento');
        const blocks = document.querySelectorAll('.tipo-doc-block');
        const bloques = document.querySelectorAll('.tipo-bloque-doc');
        
        // Obtener datos de la URL
        const urlParams = new URLSearchParams(window.location.search);
        const solicitudData = urlParams.get('solicitud');
        const tipoDocumento = urlParams.get('tipo') || 'solicitud_ingreso';
        
        if (solicitudData) {
            try {
                const solicitud = JSON.parse(decodeURIComponent(solicitudData));
                llenarDatosSolicitud(solicitud, tipoDocumento);
                
                // Configurar el select
                select.value = tipoDocumento;
                
                // Mostrar el bloque correspondiente
                blocks.forEach(b => b.style.display = 'none');
                const selected = document.getElementById(tipoDocumento);
                if(selected) selected.style.display = '';
                
                bloques.forEach(b => b.style.display = 'none');
                const bloque = document.getElementById('bloque_' + tipoDocumento);
                if(bloque) bloque.style.display = '';
            } catch (error) {
                console.error('Error al parsear datos de solicitud:', error);
            }
        }
        
        select.addEventListener('change', function() {
            // Cambiar la fecha según el tipo de documento
            const fechaDisplay = document.getElementById('fecha_display');
            const fechaInicioFiniquito = document.getElementById('fecha_inicio_finiquito');
            const fechaFinFiniquito = document.getElementById('fecha_fin_finiquito');
            
            if (solicitudData) {
                try {
                    const solicitud = JSON.parse(decodeURIComponent(solicitudData));
                    
                    if (this.value === 'solicitud_ingreso') {
                        fechaDisplay.textContent = formatearFecha(solicitud.fecha_inicio);
                    } else if (this.value === 'solicitud_finiquito') {
                        fechaDisplay.textContent = formatearFecha(solicitud.fecha_finalizacion);
                        if (fechaInicioFiniquito) fechaInicioFiniquito.textContent = formatearFecha(solicitud.fecha_inicio);
                        if (fechaFinFiniquito) fechaFinFiniquito.textContent = formatearFecha(solicitud.fecha_finalizacion);
                    }
                } catch (error) {
                    console.error('Error al procesar datos:', error);
                }
            }
            
            // Mostrar/ocultar bloques
            blocks.forEach(b => b.style.display = 'none');
            const selected = document.getElementById(this.value);
            if(selected) selected.style.display = '';
            
            bloques.forEach(b => b.style.display = 'none');
            const bloque = document.getElementById('bloque_' + this.value);
            if(bloque) bloque.style.display = '';
        });
        
        // Eventos adicionales para el modal
        $('#capturaModal').on('hidden.bs.modal', function () {
            // Limpiar el contenido del modal cuando se cierre
            document.getElementById('captured-image-modal-body').innerHTML = '';
        });
        
        // Cerrar modal con Escape
        $(document).keyup(function(e) {
            if (e.key === "Escape") {
                $('#capturaModal').modal('hide');
            }
        });
    });
    </script>
</body>
</html> 