@extends('layouts.app')

@section('title', 'Acta de Asignación de Prácticas de Servicio Comunitario')

@section('content')
<div class="container py-4">
    <div class="_asipract-a4-sheet">
        <!-- ENCABEZADO FORMATO EXACTO -->
        <table class="_asipract-header-main-table">
            <tr>
                <td class="_asipract-header-left">
                    <div class="_asipract-header-logo-row">
                        <img src="{{ asset('assets/img/info/2.png') }}" alt="Logo" class="_asipract-logo-img">
                     
                    </div>
                </td>
                <td class="_asipract-header-center">
                    <span class="_asipract-header-title">ACTA DE ASIGNACIÓN DE PRÁCTICAS DE<br>SERVICIO COMUNITARIO</span>
                </td>
                <td class="_asipract-header-right">
                    <table class="_asipract-header-info-table">
                        <tr><td class="_asipract-header-info-label">ÁREA:</td><td>Académico</td></tr>
                        <tr><td class="_asipract-header-info-label">CÓDIGO:</td><td>ISTAE-VIC-03</td></tr>
                        <tr><td class="_asipract-header-info-label">VERSIÓN:</td><td>01</td></tr>
                        <tr><td class="_asipract-header-info-label">UBICACIÓN:</td><td>San Lorenzo</td></tr>
                        <tr><td class="_asipract-header-info-label">N° PÁGINAS:</td><td>1 de 2</td></tr>
                    </table>
                </td>
            </tr>
        </table>
        <div class="_asipract-main-title-big">ACTA DE ASIGNACIÓN DE PRÁCTICAS DE SERVICIO COMUNITARIO</div>
    
     <div class="_asipract_datos_informativos">
        <!-- DATOS INFORMATIVOS DEL PROYECTO -->
        <div class="_asipract-section-title" style="font-size:18px; font-weight:bold; margin-bottom:8px; letter-spacing:0.5px;">DATOS INFORMATIVOS DEL PROYECTO</div>
        <table class="_asipract-datos-proyecto-img" style="margin-bottom:18px;">
            <tr>
                <td colspan="2" style="width:70%"><b>TITULO:</b> {{ $solicitud->titulo_proyecto }}</td>
                <td colspan="2" style="width:30%"><b>CÓDIGO:</b> {{ $solicitud->codigo_proyecto }}</td>
            </tr>
            <tr>
                <td rowspan="2" style="width:70%"><b>LÍNEA INVESTIGACIÓN:</b> {{ $solicitud->linea_investigacion }}</td>
                <td colspan="3" style="width:30%"><b>Campo:</b> {{ $solicitud->campo }}</td>
            </tr>
            <tr>
                <td colspan="3" style="width:30%"><b>Objeto:</b> {{ $solicitud->objeto }}</td>
            </tr>
            <tr>
                <td class="_asipract-label-rojo-img">Carrera:</td>
                <td colspan="3"></td>
            </tr>
            <tr>
                <td class="_asipract-label-rojo-img">Ciclo:</td>
                <td style="text-align:center;">Presencial <td></td></td>
                <td style="text-align:center;">Dual  <td></td></td>
           
            </tr>
            <tr>
                <td rowspan="2" style="vertical-align:top;"><b>COBERTURA Y<br>LOCALIZACIÓN</b></td>
                <td><b>Provincia:</b></td>
                <td colspan="2"><b>Cantón:</b></td>
            </tr>
            <tr>
                <td colspan="1"></td>
                <td colspan="2"></td>
            </tr>
            <tr>
                <td style="width:33%"><b>Actividad de vinculación</b></td>
                <td style="width:34%"><b>Ejes estratégicos de vinculación con la colectividad</b></td>
                <td style="width:33%" colspan="2"><b>Áreas de aplicación de los proyectos de vinculación</b></td>
            </tr>
            <tr>
                <td style="height:30px;"></td>
                <td></td>
                <td colspan="2"></td>
            </tr>
        </table>
</div>
        <!-- DATOS INFORMATIVOS DEL PROGRAMA -->
        <div class="_asipract-section-title">DATOS INFORMATIVOS DEL PROGRAMA</div>
        <table class="_asipract-table-bordered _asipract-mb-2">
            <tr>
                <td>PROGRAMA DE VINCULACIÓN: {{ $solicitud->programa_vinculacion }}</td>
                <td>CÓDIGO: {{ $solicitud->codigo_programa }}</td>
            </tr>
            <tr>
                <td>PROGRAMA DE CARRERA:<br>Docente tutor: {{ $solicitud->docente_tutor }}<br>Supervisor responsable: {{ $solicitud->supervisor_responsable }}</td>
                <td>Docente responsable: {{ $solicitud->docente_responsable }}</td>
            </tr>
            <tr>
                <td>Políticas:<br><div class="_asipract-text-small">{!! nl2br(e($solicitud->politicas)) !!}</div></td>
                <td>Líneas estratégicas:<br><div class="_asipract-text-small">{!! nl2br(e($solicitud->lineas_estrategicas)) !!}</div></td>
            </tr>
            <tr>
                <td>Componentes:<br><div class="_asipract-text-small">{!! nl2br(e($solicitud->componentes)) !!}</div></td>
                <td>Proyecto específico:<br><div class="_asipract-text-small">{!! nl2br(e($solicitud->proyecto_especifico)) !!}</div></td>
            </tr>
            <tr>
                <td>Beneficiarios Directos:<br><div class="_asipract-text-small">{!! nl2br(e($solicitud->beneficiarios_directos)) !!}</div></td>
                <td>Beneficiarios Indirectos:<br><div class="_asipract-text-small">{!! nl2br(e($solicitud->beneficiarios_indirectos)) !!}</div></td>
            </tr>
        </table>
        <!-- PIE DE PÁGINA -->
        <div class="_asipract-footer-table">
            <table>
                <tr>
                    <td>FECHA DE EXPEDICIÓN:<br><span class="_asipract-highlight">{{ $solicitud->created_at ? $solicitud->created_at->format('d \d\e F Y') : '' }}</span></td>
                    <td>FECHA DE ACTUALIZACION:<br>N/A</td>
                    <td>ELABORADO POR:<br>Rectorado Académico</td>
                    <td>APROBADO POR:<br><span class="_asipract-highlight">IST-17J-OCS-2022-SEO-005-009R</span></td>
                </tr>
            </table>
        </div>
    </div>
    <div class="_asipract-a4-sheet _asipract-page-break">
        <!-- ENCABEZADO (repetido) -->
     
        <table class="_asipract-header-main-table">
            <tr>
                <td class="_asipract-header-left">
                    <div class="_asipract-header-logo-row">
                        <img src="{{ asset('assets/img/info/2.png') }}" alt="Logo" class="_asipract-logo-img">
                     
                    </div>
                </td>
                <td class="_asipract-header-center">
                    <span class="_asipract-header-title">ACTA DE ASIGNACIÓN DE PRÁCTICAS DE<br>SERVICIO COMUNITARIO</span>
                </td>
                <td class="_asipract-header-right">
                    <table class="_asipract-header-info-table">
                        <tr><td class="_asipract-header-info-label">ÁREA:</td><td>Académico</td></tr>
                        <tr><td class="_asipract-header-info-label">CÓDIGO:</td><td>ISTAE-VIC-03</td></tr>
                        <tr><td class="_asipract-header-info-label">VERSIÓN:</td><td>01</td></tr>
                        <tr><td class="_asipract-header-info-label">UBICACIÓN:</td><td>San Lorenzo</td></tr>
                        <tr><td class="_asipract-header-info-label">N° PÁGINAS:</td><td>2 de 2</td></tr>
                    </table>
                </td>
            </tr>
        </table>
        <!-- DATOS DE LA INSTITUCIÓN -->
        <div class="_asipract-section-title">DATOS DE LA INSTITUCIÓN</div>
        <table class="_asipract-table-bordered _asipract-mb-2">
            <tr><td>NOMBRE DE LA INSTITUCIÓN:</td><td>{{ $solicitud->nombre_institucion }}</td></tr>
            <tr><td>RESPONSABLE DE LA INSTITUCIÓN / DEPARTAMENTO / CARGO:</td><td>{{ $solicitud->responsable_institucion }}</td></tr>
            <tr><td>CIUDAD:</td><td>{{ $solicitud->ciudad }}</td></tr>
            <tr><td>DIRECCIÓN:</td><td>{{ $solicitud->direccion }}</td></tr>
        </table>
        <!-- DATOS DEL ESTUDIANTE -->
        <div class="_asipract-section-title">DATOS DEL ESTUDIANTE</div>
        <table class="_asipract-table-bordered _asipract-mb-2">
            <tr><td>NOMBRES Y APELLIDOS:</td><td>{{ $solicitud->nombres_estudiante }} {{ $solicitud->apellidos_estudiante }}</td></tr>
            <tr><td>CARRERA:</td><td>{{ $solicitud->carrera }}</td></tr>
            <tr><td>CEDULA:</td><td>{{ $solicitud->cedula }}</td></tr>
            <tr><td>CÓDIGO DE PRÁCTICAS:</td><td>{{ $solicitud->codigo_practicas }}</td></tr>
        </table>
        <div class="_asipract-section-title">FECHAS Y HORARIO</div>
        <table class="_asipract-table-bordered _asipract-mb-2">
            <tr><td>FECHA DE INICIO:</td><td>{{ $solicitud->fecha_inicio }}</td></tr>
            <tr><td>FECHA DE FINALIZACIÓN:</td><td>{{ $solicitud->fecha_finalizacion }}</td></tr>
            <tr><td>DURACIÓN:</td><td>{{ $solicitud->duracion }}</td></tr>
        </table>
        <div class="_asipract-section-title">HORARIO</div>
        <div class="_asipract-horario-table">{!! nl2br(e($solicitud->horario)) !!}</div>
        <div class="_asipract-firma-coord">
            <br><br><br><br>
            <div class="_asipract-firma-linea"></div>
            <div class="_asipract-firma-label">COORDINADOR DE VINCULACIÓN</div>
        </div>
        <!-- PIE DE PÁGINA -->
        <div class="_asipract-footer-table">
            <table>
                <tr>
                    <td>FECHA DE EXPEDICIÓN:<br><span class="_asipract-highlight">{{ $solicitud->created_at ? $solicitud->created_at->format('d \d\e F Y') : '' }}</span></td>
                    <td>FECHA DE ACTUALIZACION:<br>N/A</td>
                    <td>ELABORADO POR:<br>Rectorado Académico</td>
                    <td>APROBADO POR:<br><span class="_asipract-highlight">IST-17J-OCS-2022-SEO-005-009R</span></td>
                </tr>
            </table>
        </div>
    </div>
</div>

<style>
._asipract-a4-sheet {
    background: #fff;
    width: 21cm;
    min-height: 29.7cm;
    margin: 0 auto 30px auto;
    padding: 2.2cm 1.5cm 1.5cm 1.5cm;
    box-shadow: 0 0 8px #bbb;
    position: relative;
    page-break-after: always;
}
._asipract-page-break {
    page-break-before: always;
}
._asipract-header-table {
    display: flex;
    flex-direction: row;
    align-items: flex-start;
    justify-content: space-between;
    margin-bottom: 10px;
}
._asipract-header-logo {
    width: 90px;
    text-align: left;
}
._asipract-header-title {
    flex: 1;
    text-align: center;
    font-size: 9px;
    font-weight: bold;
    line-height: 1.1;
}
._asipract-inst-name {
    font-size: 13px;
    font-weight: bold;
    margin-bottom: 2px;
}
._asipract-main-title {
    font-size: 12px;
    font-weight: bold;
    margin-bottom: 2px;
}
._asipract-main-title-big {
    text-align: center;
    font-size: 18px;
    font-weight: bold;
    margin: 10px 0 18px 0;

}
._asipract-header-info {
    width: 180px;
    font-size: 11px;
}
._asipract-header-info table {
    width: 100%;
    border-collapse: collapse;
}
._asipract-header-info td {
    padding: 0 2px 2px 0;
    font-size: 11px;
}
._asipract-section-title {
    font-size: 14px;
    font-weight: bold;
    margin: 18px 0 8px 0;
    color: #222;
}
._asipract-table-bordered {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 10px;
    font-size: 12px;
}
._asipract-table-bordered td, ._asipract-table-bordered th {
    border: 1px solid #222;
    padding: 4px 7px;
    vertical-align: top;
}
._asipract-table-bordered th {
    background: #f5f5f5;
    font-weight: bold;
    text-align: center;
}
._asipract-small-table th, ._asipract-small-table td {
    font-size: 11px;
    padding: 3px 5px;
}
._asipract-text-small {
    font-size: 11px;
}
._asipract-footer-table {
    margin-top: 18px;
    font-size: 11px;
}
._asipract-footer-table table {
    width: 100%;
    border-collapse: collapse;
}
._asipract-footer-table td {
    border: 1px solid #222;
    padding: 4px 7px;
    text-align: left;
    vertical-align: top;
}
._asipract-highlight {
    background: #ffff99;
    font-weight: bold;
    padding: 0 2px;
}
._asipract-horario-table {
    border: 1px solid #222;
    min-height: 60px;
    padding: 8px;
    font-size: 12px;
    margin-bottom: 18px;
}
._asipract-firma-coord {
    text-align: center;
    margin-top: 40px;
}
._asipract-firma-linea {
    width: 7cm;
    border-top: 1.5px solid #000;
    margin: 0 auto 0.2cm auto;
}
._asipract-firma-label {
    font-weight: bold;
    margin-top: 8px;
}
._asipract-mb-2 {
    margin-bottom: 10px;
}
@media print {
    body, html {
        background: #fff !important;
    }
    ._asipract-a4-sheet {
        box-shadow: none !important;
        margin: 0 !important;
        padding: 2.2cm 1.5cm 1.5cm 1.5cm !important;
        page-break-after: always;
    }
    ._asipract-page-break {
        page-break-before: always;
    }
}
._asipract-header-main-table {
    width: 100%;
    border-collapse: collapse;
    border: 2px solid #222;
    margin-bottom: 18px;
    color: #000;
}
._asipract-header-main-table td {
    border: 1px solid #222;
    vertical-align: middle;
    padding: 0;
    color: #000;
}
._asipract-header-left {
    width: 32%;
    min-width: 200px;
    padding: 8px 8px 8px 12px;
    color: #000;
}
._asipract-header-logo-row {
    display: flex;
    align-items: center;
    color: #000;
}
._asipract-logo-img {
    height: 60px;
    margin-right: 10px;
}
._asipract-header-institute {
    font-size: 16px;
    font-weight: bold;
    line-height: 1.1;
    color: #000;
}
._asipract-institute-title {
    font-size: 15px;
    font-weight: 500;
    color: #000;
}
._asipract-institute-name {
    font-size: 18px;
    font-weight: bold;
    display: block;
    color: #000;
}
._asipract-header-center {
    text-align: center;
    font-size: 19px;
    font-weight: bold;
    letter-spacing: 0.5px;
    padding: 0 10px;
    width: 36%;
    color: #000;
}
._asipract-header-title {
    font-size: 18px;
    font-weight: bold;
    display: inline-block;
    color: #000;
}
._asipract-header-right {
    width: 32%;
    min-width: 180px;
    padding: 8px 12px 8px 8px;
    color: #000;
}
._asipract-header-info-table {
    width: 100%;
    border-collapse: collapse;
    font-size: 9px;
    color: #000;
}
._asipract-header-info-table td {
    border: 1px solid #222;
    padding: 3px 7px;
    vertical-align: middle;
    color: #000;
}
._asipract-header-info-label {
    font-weight: bold;
    width: 45%;
    text-align: right;
    padding-right: 6px;
    color: #000;
}
body, html, ._asipract-a4-sheet, ._asipract-section-title, ._asipract-main-title-big, ._asipract-table-bordered, ._asipract-table-bordered td, ._asipract-table-bordered th, ._asipract-small-table th, ._asipract-small-table td, ._asipract-text-small, ._asipract-footer-table, ._asipract-footer-table td, ._asipract-highlight, ._asipract-horario-table, ._asipract-firma-coord, ._asipract-firma-label {
    color: #000 !important;
}
._asipract-datos-proyecto-img {
    width: 100%;
    border-collapse: collapse;
    font-size: 13px;
    background: #fff;
}
._asipract-datos-proyecto-img td {
    border: 1px solid #000;
    padding: 2px 4px;
    vertical-align: top;
    color: #000;
    background: #fff;
    font-size: 13px;
}
._asipract-label-rojo-img {
    color: #d32f2f;
    font-weight: bold;
    font-size: 13px;
    min-width: 80px;
    text-align: left;
}
</style>
@endsection 