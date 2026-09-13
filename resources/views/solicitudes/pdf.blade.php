<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Solicitud de Prácticas</title>
    <style>
        @page {
            margin: 2cm;
        }
        body {
            font-family: "Times New Roman", Times, serif;
            font-size: 11pt;
            line-height: 1.1;
            color: black;
            margin: 0;
            padding: 0;
        }
        .header-section {
            margin-bottom: 0.8cm;
            width: 100%;
        }
        .header-left {
            float: left;
            width: 65%;
        }
        .header-right {
            float: right;
            width: 30%;
            border: 1px solid #000;
            padding: 0.2cm;
        }
        .logo {
            height: 60px;
        }
        .institute-name {
            font-size: 12pt;
            margin-top: 0.3cm;
            line-height: 1.1;
        }
        .info-line {
            margin: 0;
            line-height: 1.1;
            font-size: 10pt;
        }
        .clear {
            clear: both;
        }
        .document-number {
            text-align: right;
            margin-bottom: 0.3cm;
        }
        .document-title {
            text-align: center;
            font-size: 12pt;
            margin-bottom: 0.5cm;
            text-decoration: underline;
        }
        p {
            margin: 0 0 0.3cm 0;
            line-height: 1.1;
        }
        .text-justify {
            text-align: justify;
            
        }
        .signature-section {
            text-align: center;
            margin: 0.8cm 0;
        }
        .signature-line {
            width: 6cm;
            margin: 0 auto;
            border-top: 1px solid black;
            margin-bottom: 0.2cm;
        }
        .presentation-section {
            border-top: 1px dashed #000;
            padding-top: 0.3cm;
            margin-top: 0.5cm;
        }
        .section-title {
            margin-bottom: 0.3cm;
            font-size: 11pt;
        }
        .presentation-details {
            margin-bottom: 0.3cm;
        }
        .approval-section {
            margin: 0.3cm 0;
            width: 100%;
        }
        .approval-container {
            width: 100%;
            display: table;
            margin-top: 0.3cm;
        }
        .approval-option {
            display: table-cell;
            width: 50%;
            text-align: center;
            padding: 0 0.5cm;
        }
        .approval-option span {
            display: block;
            margin-bottom: 0.2cm;
        }
        .approval-box {
            height: 0.6cm;
            border: 1px solid #000;
        }
        .document-footer {
            position: fixed;
            bottom: 2cm;
            left: 2cm;
            right: 2cm;
            border: 1px solid #000;
            padding: 0.2cm;
            font-size: 8pt;
        }
        .footer-grid {
            display: table;
            width: 100%;
        }
        .footer-cell {
            display: table-cell;
            width: 25%;
            padding: 0 0.2cm;
        }
        .highlight {
            padding: 0 0.1cm;
        }
        table {
            border-collapse: collapse;
        }
        td {
            padding: 0.1cm 0.2cm;
        }
    </style>
</head>
<body>
    <div class="header-section">
        <div class="header-left">
            @php
                // Intentar encontrar primero un formato compatible (PNG/JPG). Si no existe, usar WEBP.
                $possibleExtensions = [ 'jpg', 'jpeg']; // priorizar formatos compatibles con DomPDF y GD
                $logoPath = null;
                foreach ($possibleExtensions as $ext) {
                    $testPath = public_path("assets/img/info/2.".$ext);
                    if (file_exists($testPath)) {
                        $logoPath = $testPath;
                        break;
                    }
                }

                // Si no se encontró ninguna imagen compatible, se mostrará un texto en lugar de logo
                if ($logoPath && file_exists($logoPath)) {
                    $logoData = base64_encode(file_get_contents($logoPath));
                    $ext = pathinfo($logoPath, PATHINFO_EXTENSION);
                    $logoMime = $ext === 'png' ? 'image/png' : ($ext === 'jpg' || $ext === 'jpeg' ? 'image/jpeg' : 'image/webp');
                }
            @endphp
            @isset($logoData)
                <img src="data:{{ $logoMime }};base64,{{ $logoData }}" alt="Logo" class="logo">
            @else
                <strong>LOGO</strong>
            @endisset
            <div class="institute-name">INSTITUTO SUPERIOR TECNOLÓGICO<br>ALBERTO ENRÍQUEZ</div>
        </div>
        <div class="header-right">
            <p class="info-line">ÁREA: Académico</p>
            <p class="info-line">CÓDIGO: ISTAE-VIC-02</p>
            <p class="info-line">VERSIÓN: 01</p>
            <p class="info-line">UBICACIÓN: San Lorenzo</p>
            <p class="info-line">N° PÁGINAS: 1 de 1</p>
        </div>
    </div>
    <div class="clear"></div>

    <div class="document-number">No {{ $solicitud->id }}</div>

    <div class="document-title">SOLICITUD</div>

    <p>Fecha de Inicio: {{ $solicitud->fecha_inicio ? $solicitud->fecha_inicio->format('d \d\e F \d\e\l Y') : 'No especificada' }}</p>
    <p>Tutor Académico: {{ $solicitud->tutor_academico }}</p>
    <p>Institución Destino: {{ $solicitud->institu_destino }}</p>

    <p>Solicitante: Sr. {{ $solicitud->nombres_apellidos_estudiante }}</p>
    <p>Carrera: {{ $solicitud->carrera }}</p>
    <p>Asunto: Solicitud de Prácticas de Servicio Comunitario</p>

    <p class="text-justify">
        Yo, {{ $solicitud->nombres_apellidos_estudiante }},
        con C.I. {{ $solicitud->cedula ?? '__________' }}, estudiante de la carrera {{ $solicitud->carrera }},
        me dirijo a Ud. {{ $solicitud->tutor_academico }}, con la finalidad de solicitarle la realización 
        de las prácticas de servicio comunitario dentro del proyecto {{ $solicitud->proyecto_asigando }}
        con codificación {{ $solicitud->codificacion_proyecto }} a ejecutarse dentro del periodo {{ $solicitud->periodo }}
        en la institución {{ $solicitud->institu_destino }}.
    </p>

    <div class="signature-section">
        <div class="signature-line"></div>
        <p>Firma:</p>
        <p>C.I. {{ $solicitud->cedula ?? '__________' }}</p>
    </div>

    <div class="presentation-section">
        <div class="section-title">CONSTANCIA DE PRESENTACIÓN:</div>

        <div class="presentation-details">
            <table width="100%">
                <tr>
                    <td width="50%">Fecha de Inicio: {{ $solicitud->fecha_inicio ? $solicitud->fecha_inicio->format('d/m/Y') : '____________________' }}</td>
                    <td width="50%">Fecha de Finalización: {{ $solicitud->fecha_finalizacion ? $solicitud->fecha_finalizacion->format('d/m/Y') : '____________________' }}</td>
                </tr>
                <tr>
                    <td colspan="2">Firma: ____________________</td>
                </tr>
            </table>
        </div>

        <div class="approval-container">
            <div class="approval-option">
                <span>Aprobado</span>
                <div class="approval-box"></div>
            </div>
            <div class="approval-option">
                <span>Rechazado</span>
                <div class="approval-box"></div>
            </div>
        </div>
    </div>

    <div class="document-footer">
        <div class="footer-grid">
            <div class="footer-cell">FECHA DE EXPEDICIÓN: {{ $solicitud->created_at->format('d \d\e F Y') }}</div>
            <div class="footer-cell">FECHA DE ACTUALIZACIÓN: N/A</div>
            <div class="footer-cell">ELABORADO POR: Rectorado Académico</div>
            <div class="footer-cell">APROBADO POR: IST-17J-OCS-2022-SEO-005-009R</div>
        </div>
    </div>
</body>
</html> 