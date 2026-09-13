@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Formulario de Solicitud -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h2 class="mb-0"><i class="bi bi-file-earmark-plus"></i> Generar Solicitud de Prácticas</h2>
                </div>
                <div class="card-body">
                    <form id="solicitudForm">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="tipoDocumento" class="form-label">Tipo de Documento</label>
                                    <select class="form-control" id="tipoDocumento" name="tipoDocumento">
                                        <option value="solicitud_ingreso">Solicitud de Ingreso</option>
                                        <option value="solicitud_revision">Solicitud de Revisión</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="nombres_apellidos_estudiante" class="form-label">Nombres y Apellidos del Estudiante</label>
                                    <input type="text" class="form-control" id="nombres_apellidos_estudiante" name="nombres_apellidos_estudiante">
                                </div>

                                <div class="mb-3">
                                    <label for="carrera" class="form-label">Carrera</label>
                                    <select class="form-control" id="carrera" name="carrera">
                                        <option value="">Seleccione una carrera</option>
                                        <option value="Tecnología Superior en Desarrollo de Software">
                                            Tecnología Superior en Desarrollo de Software
                                        </option>
                                        <option value="Tecnología Superior en Mecanización Agrícola">
                                            Tecnología Superior en Mecanización Agrícola
                                        </option>
                                        <option value="Tecnología Superior en Mecánica Automotriz">
                                            Tecnología Superior en Mecánica Automotriz
                                        </option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="cedula" class="form-label">Cédula</label>
                                    <input type="text" class="form-control" id="cedula" name="cedula">
                                </div>

                                <div class="mb-3">
                                    <label for="correo" class="form-label">Correo Electrónico</label>
                                    <input type="email" class="form-control" id="correo" name="correo">
                                </div>

                                <div class="mb-3">
                                    <label for="celular" class="form-label">Celular</label>
                                    <input type="text" class="form-control" id="celular" name="celular">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="fecha_inicio" class="form-label">Fecha de Inicio</label>
                                    <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio">
                                </div>

                                <div class="mb-3">
                                    <label for="fecha_finalizacion" class="form-label">Fecha de Finalización</label>
                                    <input type="date" class="form-control" id="fecha_finalizacion" name="fecha_finalizacion">
                                </div>

                                <div class="mb-3">
                                    <label for="institu_destino" class="form-label">Institución de Destino</label>
                                    <select class="form-control" id="institu_destino" name="institu_destino">
                                        <option value="">Seleccione una institución</option>
                                        @if(isset($componentesFormatos['institu_destino']))
                                            @foreach($componentesFormatos['institu_destino'] as $componente)
                                                <option value="{{ $componente->campos }}">
                                                    {{ ucwords(str_replace('_', ' ', $componente->campos)) }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="tutor_academico" class="form-label">Tutor Académico</label>
                                    <select class="form-control" id="tutor_academico" name="tutor_academico">
                                        <option value="">Seleccione un tutor</option>
                                        @if(isset($componentesFormatos['tutor_academico']))
                                            @foreach($componentesFormatos['tutor_academico'] as $componente)
                                                <option value="{{ $componente->campos }}">
                                                    {{ ucwords(str_replace('_', ' ', $componente->campos)) }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="proyecto_asigando" class="form-label">Proyecto Asignado</label>
                                    <select class="form-control" id="proyecto_asigando" name="proyecto_asigando">
                                        <option value="">Seleccione un proyecto</option>
                                        @if(isset($componentesFormatos['proyecto_asigando']))
                                            @foreach($componentesFormatos['proyecto_asigando'] as $componente)
                                                <option value="{{ $componente->campos }}">
                                                    {{ ucwords(str_replace('_', ' ', $componente->campos)) }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="codificacion_proyecto" class="form-label">Codificación del Proyecto</label>
                                    <select class="form-control" id="codificacion_proyecto" name="codificacion_proyecto">
                                        <option value="">Seleccione una codificación</option>
                                        @if(isset($componentesFormatos['codificacion_proyecto']))
                                            @foreach($componentesFormatos['codificacion_proyecto'] as $componente)
                                                <option value="{{ $componente->campos }}">
                                                    {{ ucwords(str_replace('_', ' ', $componente->campos)) }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="codificacion_programa" class="form-label">Codificación del Programa</label>
                                    <select class="form-control" id="codificacion_programa" name="codificacion_programa">
                                        <option value="">Seleccione una codificación</option>
                                        @if(isset($componentesFormatos['codificacion_programa']))
                                            @foreach($componentesFormatos['codificacion_programa'] as $componente)
                                                <option value="{{ $componente->campos }}">
                                                    {{ ucwords(str_replace('_', ' ', $componente->campos)) }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="numeracion_proyecto" class="form-label">Numeración del Proyecto</label>
                                    <select class="form-control" id="numeracion_proyecto" name="numeracion_proyecto">
                                        <option value="">Seleccione una numeración</option>
                                        @if(isset($componentesFormatos['numeracion_proyecto']))
                                            @foreach($componentesFormatos['numeracion_proyecto'] as $componente)
                                                <option value="{{ $componente->campos }}">
                                                    {{ ucwords(str_replace('_', ' ', $componente->campos)) }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="periodo" class="form-label">Periodo</label>
                                    <select class="form-control" id="periodo" name="periodo">
                                        <option value="">Seleccione un periodo</option>
                                        @if(isset($componentesFormatos['periodo']))
                                            @foreach($componentesFormatos['periodo'] as $componente)
                                                <option value="{{ $componente->campos }}">
                                                    {{ ucwords(str_replace('_', ' ', $componente->campos)) }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="codigo_practicas" class="form-label">Código de Prácticas</label>
                                    <select class="form-control" id="codigo_practicas" name="codigo_practicas">
                                        <option value="">Seleccione un código</option>
                                        @if(isset($componentesFormatos['codigo_practicas']))
                                            @foreach($componentesFormatos['codigo_practicas'] as $componente)
                                                <option value="{{ $componente->campos }}">
                                                    {{ ucwords(str_replace('_', ' ', $componente->campos)) }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="nombre_programa" class="form-label">Nombre del Programa</label>
                                    <select class="form-control" id="nombre_programa" name="nombre_programa">
                                        <option value="">Seleccione un programa</option>
                                        @if(isset($componentesFormatos['nombre_programa']))
                                            @foreach($componentesFormatos['nombre_programa'] as $componente)
                                                <option value="{{ $componente->campos }}">
                                                    {{ ucwords(str_replace('_', ' ', $componente->campos)) }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-12">
                                <div class="d-flex justify-content-between">
                                    <button type="button" class="btn btn-secondary" onclick="limpiarFormulario()">
                                        <i class="bi bi-arrow-left"></i> Limpiar
                                    </button>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="bi bi-check-circle"></i> Generar Solicitud
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Vista Previa de Solicitudes -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="mb-0"><i class="bi bi-eye"></i> Vista Previa de Solicitudes</h3>
                </div>
                <div class="card-body">
                    <div id="solicitudes-container">
                        <div class="alert alert-info">
                            <i class="bi bi-info-circle"></i> Complete el formulario para generar una solicitud
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Array para almacenar las solicitudes temporalmente
let solicitudesTemporales = [];
let contadorSolicitudes = 1;

document.getElementById('solicitudForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    // Obtener los datos del formulario
    const formData = new FormData(this);
    const solicitud = {
        id: contadorSolicitudes++,
        nombres_apellidos_estudiante: formData.get('nombres_apellidos_estudiante'),
        carrera: formData.get('carrera'),
        cedula: formData.get('cedula'),
        correo: formData.get('correo'),
        celular: formData.get('celular'),
        fecha_inicio: formData.get('fecha_inicio'),
        fecha_finalizacion: formData.get('fecha_finalizacion'),
        institu_destino: formData.get('institu_destino'),
        tutor_academico: formData.get('tutor_academico'),
        proyecto_asigando: formData.get('proyecto_asigando'),
        codificacion_proyecto: formData.get('codificacion_proyecto'),
        codificacion_programa: formData.get('codificacion_programa'),
        numeracion_proyecto: formData.get('numeracion_proyecto'),
        periodo: formData.get('periodo'),
        codigo_practicas: formData.get('codigo_practicas'),
        nombre_programa: formData.get('nombre_programa'),
        fecha_creacion: new Date().toLocaleDateString('es-ES')
    };
    
    // Agregar la solicitud al array temporal
    solicitudesTemporales.push(solicitud);
    
    // Actualizar la vista
    actualizarVistaSolicitudes();
    
    // Limpiar el formulario
    this.reset();
    
    // Mostrar mensaje de éxito
    mostrarMensaje('Solicitud generada exitosamente', 'success');
});

function actualizarVistaSolicitudes() {
    const container = document.getElementById('solicitudes-container');
    
    if (solicitudesTemporales.length === 0) {
        container.innerHTML = `
            <div class="alert alert-info">
                <i class="bi bi-info-circle"></i> Complete el formulario para generar una solicitud
            </div>
        `;
        return;
    }
    
    let html = '';
    solicitudesTemporales.forEach((solicitud, index) => {
        html += `
            <div class="card mb-3 solicitud-item" data-id="${solicitud.id}">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h6 class="mb-0">Solicitud #${solicitud.id}</h6>
                    <div>
                        <button class="btn btn-sm btn-primary" onclick="verSolicitud(${solicitud.id})">
                            <i class="bi bi-eye"></i> Ver
                        </button>
                        <button class="btn btn-sm btn-danger" onclick="eliminarSolicitud(${solicitud.id})">
                            <i class="bi bi-trash"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>Estudiante:</strong> ${solicitud.nombres_apellidos_estudiante}</p>
                            <p><strong>Carrera:</strong> ${solicitud.carrera}</p>
                            <p><strong>Cédula:</strong> ${solicitud.cedula}</p>
                            <p><strong>Proyecto:</strong> ${solicitud.proyecto_asigando}</p>
                            <p><strong>Codificación:</strong> ${solicitud.codificacion_proyecto}</p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Fecha Inicio:</strong> ${formatearFecha(solicitud.fecha_inicio)}</p>
                            <p><strong>Fecha Fin:</strong> ${formatearFecha(solicitud.fecha_finalizacion)}</p>
                            <p><strong>Institución:</strong> ${solicitud.institu_destino}</p>
                            <p><strong>Periodo:</strong> ${solicitud.periodo}</p>
                            <p><strong>Creada:</strong> ${solicitud.fecha_creacion}</p>
                        </div>
                    </div>
                </div>
            </div>
        `;
    });
    
    container.innerHTML = html;
}

function verSolicitud(id) {
    const solicitud = solicitudesTemporales.find(s => s.id === id);
    if (!solicitud) {
        alert('Solicitud no encontrada');
        return;
    }
    
    const tipoDocumento = document.getElementById('tipoDocumento').value;
    
    // Crear URL con los datos de la solicitud
    const solicitudData = encodeURIComponent(JSON.stringify(solicitud));
    const url = `/verpublic-solicitudes?solicitud=${solicitudData}&tipo=${tipoDocumento}`;
    
    // Abrir directamente en la misma ventana
    window.location.href = url;
}

function eliminarSolicitud(id) {
    if (confirm('¿Está seguro de que desea eliminar esta solicitud?')) {
        solicitudesTemporales = solicitudesTemporales.filter(s => s.id !== id);
        actualizarVistaSolicitudes();
        mostrarMensaje('Solicitud eliminada', 'info');
    }
}

function limpiarFormulario() {
    document.getElementById('solicitudForm').reset();
    mostrarMensaje('Formulario limpiado', 'info');
}

function formatearFecha(fecha) {
    if (!fecha) return 'No especificada';
    const [year, month, day] = fecha.split('-');
    return `${day}/${month}/${year}`;
}

function mostrarMensaje(mensaje, tipo) {
    const alertDiv = document.createElement('div');
    alertDiv.className = `alert alert-${tipo} alert-dismissible fade show`;
    alertDiv.innerHTML = `
        ${mensaje}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    `;
    
    const container = document.querySelector('.container-fluid');
    container.insertBefore(alertDiv, container.firstChild);
    
    // Auto-remover después de 3 segundos
    setTimeout(() => {
        if (alertDiv.parentNode) {
            alertDiv.remove();
        }
    }, 3000);
}

// Limpiar solicitudes temporales al cerrar la página
window.addEventListener('beforeunload', function() {
    solicitudesTemporales = [];
});

// Actualizar el tipo de documento cuando cambie el select
document.addEventListener('DOMContentLoaded', function() {
    const select = document.getElementById('tipoDocumento');
    if (select) {
        select.addEventListener('change', function() {
            console.log('Tipo de documento cambiado a:', this.value);
        });
    }
});
</script>

<style>
.card {
    border-radius: 15px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.card-header {
    background-color: #f8f9fa;
    border-bottom: 1px solid #e9ecef;
    padding: 1rem 1.5rem;
}

.card-header h2, .card-header h3 {
    color: #1565c0;
    font-size: 1.5rem;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.form-label {
    font-weight: 600;
    color: #495057;
}

.form-control:focus {
    border-color: #1565c0;
    box-shadow: 0 0 0 0.2rem rgba(21, 101, 192, 0.25);
}

.solicitud-item {
    transition: all 0.3s ease;
}

.solicitud-item:hover {
    box-shadow: 0 4px 8px rgba(0,0,0,0.15);
}

.alert {
    border-radius: 10px;
}

@media print {
    .btn, .card-header {
        display: none !important;
    }
}
</style>

@endsection 