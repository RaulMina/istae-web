@extends('layouts.app')

@section('title', 'Ver Solicitud')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <a href="{{ route('solicitudes.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Volver
        </a>
        <div>
          <!--  <button onclick="captureAndDownload()" class="btn btn-success me-2">
                <i class="bi bi-camera"></i> Capturar
            </button>-->
            <button onclick="captureAndSendToPdf()" class="btn btn-success me-2">
                <i class="bi bi-camera"></i> Capturar e Imprimir
            </button>
            <!--  <a href="{{ route('solicitudes.pdf', $solicitud) }}" class="btn btn-secondary">
                <i class="bi bi-file-pdf"></i> Descargar PDF
            </a>-->
            <a href="{{ route('solicitudes.edit', $solicitud) }}" class="btn btn-warning">
                <i class="bi bi-pencil"></i> Editar
            </a>
            <!-- Botón de prueba temporal 
            <a href="{{ route('solicitudes.asignacion-practicas', $solicitud->id) }}" class="btn btn-info me-2">
                <i class="bi bi-file-earmark-text"></i> Ir a Asignación (Prueba)
            </a>-->
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
                        <img src="{{ asset('assets/img/info/2.png') }}" alt="Logo" class="logo-img">
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
                <span class="doc-number">No {{ $solicitud->codigo_practicas}}</span>
            </div>
        </div>
        <!-- Línea debajo del título -->
        <div class="line-thick"></div>
        <!-- Cuerpo principal -->
        <div class="main-content mt-4">
            <div class="info-block" style="text-transform: capitalize;">
                <span class="label">Fecha:</span> 
                <span id="fecha_display">{{ $solicitud->fecha_inicio ? $solicitud->fecha_inicio->format('d/m/Y') : 'No especificada' }}</span><br>
                <span class="label">Dirigido: </span> ING. FRANCISCO PEÑA <br>
                <span class="label">Cargo: </span> Coordinador de Vinculación, <br>
                <span class="label">Con copia: </span>{{ $solicitud->tutor_academico }}, Coordinador de Carrera {{ $solicitud->carrera }}

            
            </div>
            <div class="line-thick"></div>
            <!-- Bloques para cada tipo de documento -->
            <div id="bloque_solicitud_ingreso" class="tipo-bloque-doc">
                <div class="info-block mt-3">
                    <span class="label">Solicitante:</span> {{ $solicitud->nombres_apellidos_estudiante }}<br>
                    <span class="label">Carrera:</span> {{ $solicitud->carrera }}<br>
                    <span class="label">Asunto:</span> <span class="bold">Solicitud de Prácticas de Servicio Comunitario</span>
                </div>
                <div class="paragraph mt-3">
                    Yo, {{ $solicitud->nombres_apellidos_estudiante }}, con C.I. 
                    {{ $solicitud->cedula ?? '__________' }}, estudiante de la carrera
                     {{ $solicitud->carrera }}, me dirijo a usted.  
                     {{ $solicitud->tutor_academico }}, 
                     con la finalidad de solicitarle la realización de las prácticas de servicio comunitario dentro del proyecto 
                     "{{ $solicitud->proyecto_asigando }}" con codificación
                      {{ $solicitud->codificacion_proyecto }} a ejecutarse dentro del periodo {{ $solicitud->periodo }}.
                </div>
                <div class="paragraph mt-2">
                    Correo electrónico: {{ $solicitud->correo ?? 'No especificado' }}<br>
                    Teléfono: {{ $solicitud->celular ?? 'No especificado' }}
                </div>
            </div>
            <div id="bloque_solicitud_finiquito" class="tipo-bloque-doc" style="display:none;">
                <div class="info-block mt-3">
                    <span class="label">Solicitante:</span> {{ $solicitud->nombres_apellidos_estudiante }}<br>
                    <span class="label">Carrera:</span> {{ $solicitud->carrera }}<br>
                    <span class="label">Asunto:</span> <span class="bold">Solicitud de Prácticas de Servicio Comunitario</span>
                </div>
                <div class="paragraph mt-3">
                    Yo, {{ $solicitud->nombres_apellidos_estudiante }}, con C.I. {{ $solicitud->cedula ?? '__________' }}, estudiante de la carrera {{ $solicitud->carrera }},
                     me dirijo a Ud. {{ $solicitud->tutor_academico }}, con la finalidad de solicitarle la 
                     revisión de la documentación correspondiente al proceso de prácticas de servicio 
                     comunitario realizado entre las fechas de
                      <span id="fecha_inicio_finiquito">{{ $solicitud->fecha_inicio ? $solicitud->fecha_inicio->format('d/m/Y') : '___/___/____' }}</span> 
                      hasta <span id="fecha_fin_finiquito">{{ $solicitud->fecha_finalizacion ? $solicitud->fecha_finalizacion->format('d/m/Y') : '___/___/____' }}</span>,
                       a cargo de la institución {{ $solicitud->institu_destino ?? '________________' }}.
                </div>
            </div>
        </div>
        <!-- Firma -->
        <div class="signature-block mt-5 mb-4">
            <div class="signature-line"></div>
            <div class="signature-label">Firma:</div>
            <div class="signature-id">C.I. {{ $solicitud->cedula ?? '__________' }}</div>
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

document.addEventListener('DOMContentLoaded', function() {
    const select = document.getElementById('tipoDocumento');
    const blocks = document.querySelectorAll('.tipo-doc-block');
    const bloques = document.querySelectorAll('.tipo-bloque-doc');
    
    // Fechas disponibles
    const fechaInicio = '{{ $solicitud->fecha_inicio ? $solicitud->fecha_inicio->format('d/m/Y') : 'No especificada' }}';
    const fechaFinalizacion = '{{ $solicitud->fecha_finalizacion ? $solicitud->fecha_finalizacion->format('d/m/Y') : 'No especificada' }}';
    
    select.addEventListener('change', function() {
        // Si se selecciona "Asignación de Prácticas", redirigir a la nueva vista
        if (select.value === 'asignacion_practicas') {
            console.log('Redirigiendo a asignación de prácticas...');
            console.log('URL:', '{{ route("solicitudes.asignacion-practicas", $solicitud->id) }}');
            window.location.href = '{{ route("solicitudes.asignacion-practicas", $solicitud->id) }}';
            return;
        }
        
        // Cambiar la fecha según el tipo de documento
        const fechaDisplay = document.getElementById('fecha_display');
        const fechaInicioFiniquito = document.getElementById('fecha_inicio_finiquito');
        const fechaFinFiniquito = document.getElementById('fecha_fin_finiquito');
        const constanciaFechaInicio = document.getElementById('constancia_fecha_inicio');
        const constanciaFechaFin = document.getElementById('constancia_fecha_fin');
        
        if (select.value === 'solicitud_ingreso') {
            fechaDisplay.textContent = fechaInicio;
            if (constanciaFechaInicio) constanciaFechaInicio.textContent = fechaInicio;
            if (constanciaFechaFin) constanciaFechaFin.textContent = fechaFinalizacion;
        } else if (select.value === 'solicitud_finiquito') {
            fechaDisplay.textContent = fechaFinalizacion;
            if (fechaInicioFiniquito) fechaInicioFiniquito.textContent = fechaInicio;
            if (fechaFinFiniquito) fechaFinFiniquito.textContent = fechaFinalizacion;
            if (constanciaFechaInicio) constanciaFechaInicio.textContent = fechaInicio;
            if (constanciaFechaFin) constanciaFechaFin.textContent = fechaFinalizacion;
        }
        
        // Títulos
        blocks.forEach(b => b.style.display = 'none');
        const selected = document.getElementById(select.value);
        if(selected) selected.style.display = '';
        // Bloques de contenido
        bloques.forEach(b => b.style.display = 'none');
        const bloque = document.getElementById('bloque_' + select.value);
        if(bloque) bloque.style.display = '';
    });
    // Mostrar el bloque inicial
    document.getElementById('bloque_' + select.value).style.display = '';
    
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

<!-- Cargar html2canvas al final para asegurar que jQuery esté disponible -->
<script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>

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

{{-- Incluir el formato seleccionado --}}
@php
    $formato = request('formato') ?? 'solicitud_ingreso';
@endphp
<div id="formato-container">
    @includeIf('formatos.' . $formato, ['solicitud' => $solicitud])
</div>
@endsection 