<!DOCTYPE html>
<html>
<head>
    <title>Vista de Solicitud</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        @media print {
            .no-print { display: none !important; }
            body { margin: 0; padding: 0; }
            .printable-content { margin: 0; }
        }
        .word-document {
            font-family: 'Times New Roman', Times, serif;
            font-size: 12pt;
            line-height: 1.5;
            color: #000;
            background: white;
            padding: 2cm;
            margin: 0;
            width: 21cm;
            min-height: 29.7cm;
            box-sizing: border-box;
        }
        .header-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 1.5rem;
        }
        .header-left {
            width: 30%;
            padding: 0;
            vertical-align: top;
        }
        .header-center {
            width: 35%;
            padding: 0 1rem;
            text-align: center;
            vertical-align: top;
        }
        .header-coord {
            font-size: 16px;
            font-weight: bold;
            letter-spacing: 1px;
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
        }
        .aprobacion-table-wrap {
            margin-top: 1cm;
            display: flex;
            justify-content: center;
        }
        .aprobacion-table {
            border-collapse: collapse;
            font-size: 12pt;
            width: 300px;
        }
        .aprobacion-table td {
            border: 1px solid #000;
            padding: 8px;
            text-align: center;
            font-weight: bold;
            width: 50%;
        }
        .aprobado {
            background-color: #d4edda;
        }
        .rechazado {
            background-color: #f8d7da;
        }
        .footer-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 8pt;
            margin-top: 1cm;
        }
        .footer-table td {
            border: 1px solid #000;
            padding: 4px;
            text-align: center;
        }
        .footer-label {
            font-weight: bold;
        }
        .highlight {
            font-weight: bold;
            color: #000;
        }
        .firma-linea {
            border-bottom: 1px solid #000;
            width: 120px;
            display: inline-block;
        }
    </style>
</head>
<body>
    <div class="no-print" style="padding: 20px;">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3>Vista Previa de Solicitud</h3>
            <div>
                <button onclick="captureDocument()" class="btn btn-primary">
                    <i class="bi bi-camera"></i> Capturar e Imprimir
                </button>
                <button onclick="window.close()" class="btn btn-secondary">
                    <i class="bi bi-x-circle"></i> Cerrar
                </button>
            </div>
        </div>
    </div>
    
    <div id="printable-content" class="printable-content">
        <div class="word-document">
            <table class="header-table">
                <tr>
                    <td class="header-left">
                        <div class="header-logo-row">
                            <img src="/assets/img/info/2.png" alt="Logo" style="width: 180px; height: auto;">
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
            
            <div class="solicitud-title-row" style="display: flex; align-items: center; width: 100%; margin-top: 1.5rem; margin-bottom: 1rem;">
                <div style="flex: 1;">
                    <div class="document-title">SOLICITUD</div>
                </div>
                <div style="text-align: right; min-width: 120px;">
                    <span class="doc-number" id="doc-number">No </span>
                </div>
            </div>
            
            <div class="line-thick"></div>
            
            <div class="main-content mt-4">
                <div class="info-block" style="text-transform: capitalize;">
                    <span class="label">Fecha:</span> 
                    <span id="fecha-display"></span><br>
                    <span class="label">Dirigido: </span> ING. FRANCISCO PEÑA <br>
                    <span class="label">Cargo: </span> Coordinador de Vinculación, <br>
                    <span class="label">Con copia: </span><span id="tutor-academico"></span>, Coordinador de Carrera <span id="carrera"></span>
                </div>
                
                <div class="line-thick"></div>
                
                <div id="contenido-dinamico">
                    <!-- El contenido se llenará dinámicamente -->
                </div>
            </div>
            
            <div class="signature-block mt-5 mb-4">
                <div class="signature-line"></div>
                <div class="signature-label">Firma:</div>
                <div class="signature-id" id="cedula-display">C.I. </div>
            </div>
            
            <div class="line-thick"></div>
            
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
    
    <!-- Cargar html2canvas -->
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
    
    <script>
    // Función para llenar los datos de la solicitud
    function llenarDatosSolicitud(solicitud, tipoDocumento) {
        document.getElementById('doc-number').textContent = 'No ' + solicitud.codigo_practicas;
        document.getElementById('fecha-display').textContent = tipoDocumento === 'solicitud_ingreso' ? 
            formatearFecha(solicitud.fecha_inicio) : 
            formatearFecha(solicitud.fecha_finalizacion);
        document.getElementById('tutor-academico').textContent = solicitud.tutor_academico;
        document.getElementById('carrera').textContent = solicitud.carrera;
        document.getElementById('cedula-display').textContent = 'C.I. ' + solicitud.cedula;
        
        // Llenar contenido dinámico según el tipo de documento
        const contenidoDiv = document.getElementById('contenido-dinamico');
        
        if (tipoDocumento === 'solicitud_ingreso') {
            contenidoDiv.innerHTML = `
                <div class="info-block mt-3">
                    <span class="label">Solicitante:</span> ${solicitud.nombres_apellidos_estudiante}<br>
                    <span class="label">Carrera:</span> ${solicitud.carrera}<br>
                    <span class="label">Asunto:</span> <span class="bold">Solicitud de Prácticas de Servicio Comunitario</span>
                </div>
                
                <div class="paragraph mt-3">
                    Yo, ${solicitud.nombres_apellidos_estudiante}, con C.I. 
                    ${solicitud.cedula}, estudiante de la carrera
                     ${solicitud.carrera}, me dirijo a usted.  
                     ${solicitud.tutor_academico}, 
                     con la finalidad de solicitarle la realización de las prácticas de servicio comunitario dentro del proyecto 
                     "${solicitud.proyecto_asigando}" con codificación
                      ${solicitud.codificacion_proyecto} a ejecutarse dentro del periodo ${solicitud.periodo}.
                </div>
                
                <div class="paragraph mt-2">
                    Correo electrónico: ${solicitud.correo}<br>
                    Teléfono: ${solicitud.celular}
                </div>
            `;
        } else {
            contenidoDiv.innerHTML = `
                <div class="info-block mt-3">
                    <span class="label">Solicitante:</span> ${solicitud.nombres_apellidos_estudiante}<br>
                    <span class="label">Carrera:</span> ${solicitud.carrera}<br>
                    <span class="label">Asunto:</span> <span class="bold">Solicitud de Prácticas de Servicio Comunitario</span>
                </div>
                
                <div class="paragraph mt-3">
                    Yo, ${solicitud.nombres_apellidos_estudiante}, con C.I. ${solicitud.cedula}, estudiante de la carrera ${solicitud.carrera},
                     me dirijo a Ud. ${solicitud.tutor_academico}, con la finalidad de solicitarle la 
                     revisión de la documentación correspondiente al proceso de prácticas de servicio 
                     comunitario realizado entre las fechas de
                      ${formatearFecha(solicitud.fecha_inicio)} 
                      hasta ${formatearFecha(solicitud.fecha_finalizacion)},
                       a cargo de la institución ${solicitud.institu_destino}.
                </div>
            `;
        }
    }
    
    // Función de captura para la ventana generada
    function captureDocument() {
        const element = document.getElementById('printable-content');
        if (!element) {
            console.error('Elemento printable-content no encontrado');
            return;
        }
        
        html2canvas(element, { scale: 2, useCORS: true, backgroundColor: '#fff' }).then(canvas => {
            // Crear una nueva ventana para mostrar la imagen capturada
            const imgDataUrl = canvas.toDataURL('image/png');
            const captureWindow = window.open('', '_blank', 'width=800,height=600');
            
            // Usar concatenación de strings para evitar problemas con template literals anidados
            const captureHtml = '<!DOCTYPE html>' +
                '<html>' +
                '<head>' +
                    '<title>Imagen Capturada</title>' +
                    '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">' +
                    '<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">' +
                    '<style>' +
                        'body { padding: 20px; }' +
                        '.captured-image { max-width: 100%; height: auto; border: 1px solid #ccc; border-radius: 4px; }' +
                        '.btn-group { margin-bottom: 20px; }' +
                    '</style>' +
                '</head>' +
                '<body>' +
                    '<div class="container">' +
                        '<div class="btn-group mb-3">' +
                            '<button onclick="printImage()" class="btn btn-primary">' +
                                '<i class="bi bi-printer"></i> Imprimir' +
                            '</button>' +
                            '<button onclick="downloadImage()" class="btn btn-success">' +
                                '<i class="bi bi-download"></i> Descargar' +
                            '</button>' +
                            '<button onclick="window.close()" class="btn btn-secondary">' +
                                '<i class="bi bi-x-circle"></i> Cerrar' +
                            '</button>' +
                        '</div>' +
                        '<div class="text-center">' +
                            '<img src="' + imgDataUrl + '" class="captured-image" alt="Documento capturado">' +
                        '</div>' +
                    '</div>' +
                    '<script>' +
                        'function printImage() {' +
                            'const printWindow = window.open("", "_blank");' +
                            'printWindow.document.write("<html><head><title>Imprimir</title></head><body>");' +
                            'printWindow.document.write("<img src=\\"' + imgDataUrl + '\\" style=\\"max-width:100%;height:auto;\\">");' +
                            'printWindow.document.write("</body></html>");' +
                            'printWindow.document.close();' +
                            'printWindow.onload = function() {' +
                                'printWindow.print();' +
                                'printWindow.close();' +
                            '};' +
                        '}' +
                        'function downloadImage() {' +
                            'const a = document.createElement("a");' +
                            'a.href = "' + imgDataUrl + '";' +
                            'a.download = "solicitud_capturada.png";' +
                            'document.body.appendChild(a);' +
                            'a.click();' +
                            'document.body.removeChild(a);' +
                        '}' +
                    '</script>' +
                '</body>' +
                '</html>';
            
            captureWindow.document.write(captureHtml);
            captureWindow.document.close();
        }).catch(error => {
            console.error('Error al capturar:', error);
            alert('Error al capturar el documento. Por favor, intente nuevamente.');
        });
    }
    
    function formatearFecha(fecha) {
        if (!fecha) return 'No especificada';
        const [year, month, day] = fecha.split('-');
        return `${day}/${month}/${year}`;
    }
    
    // Función para inicializar la vista con datos
    function inicializarVista(solicitudData, tipoDocumento) {
        llenarDatosSolicitud(solicitudData, tipoDocumento);
    }
    
    // Si hay datos en la URL, inicializar la vista
    window.addEventListener('load', function() {
        const urlParams = new URLSearchParams(window.location.search);
        const solicitudData = urlParams.get('solicitud');
        const tipoDocumento = urlParams.get('tipo');
        
        if (solicitudData) {
            try {
                const solicitud = JSON.parse(decodeURIComponent(solicitudData));
                inicializarVista(solicitud, tipoDocumento);
            } catch (error) {
                console.error('Error al parsear datos de solicitud:', error);
            }
        }
    });
    </script>
</body>
</html> 