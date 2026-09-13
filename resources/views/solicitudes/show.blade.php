@extends('layouts.app')

@section('title', 'Ver Solicitud de Prácticas')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h2 class="mb-0">
                        <i class="bi bi-file-earmark-text"></i> Solicitud #{{ $solicitud->id }}
                    </h2>
                    <div class="btn-group">
                        <a href="{{ route('solicitudes.edit', $solicitud) }}" class="btn btn-warning">
                            <i class="bi bi-pencil"></i> Editar
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-6">
                            <div class="info-group">
                                <label>Estudiante:</label>
                                <p>{{ $solicitud->nombres_apellidos_estudiante }}</p>
                            </div>

                            <div class="info-group">
                                <label>Institución Destino:</label>
                                <p>{{ $solicitud->institu_destino }}</p>
                            </div>

                            <div class="info-group">
                                <label>Tutor Académico:</label>
                                <p>{{ $solicitud->tutor_academico }}</p>
                            </div>

                            <div class="info-group">
                                <label>Carrera:</label>
                                <p>{{ $solicitud->carrera }}</p>
                            </div>

                            <div class="info-group">
                                <label>Cédula:</label>
                                <p>{{ $solicitud->cedula ?? 'No especificada' }}</p>
                            </div>

                            <div class="info-group">
                                <label>Proyecto Asignado:</label>
                                <p>{{ $solicitud->proyecto_asigando }}</p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="info-group">
                                <label>Codificación del Proyecto:</label>
                                <p>{{ $solicitud->codificacion_proyecto }}</p>
                            </div>

                            <div class="info-group">
                                <label>Codificación del Programa:</label>
                                <p>{{ $solicitud->codificacion_programa }}</p>
                            </div>

                            <div class="info-group">
                                <label>Numeración del Proyecto:</label>
                                <p>{{ $solicitud->numeracion_proyecto }}</p>
                            </div>

                            <div class="info-group">
                                <label>Periodo:</label>
                                <p>{{ $solicitud->periodo }}</p>
                            </div>

                            <div class="info-group">
                                <label>Correo Electrónico:</label>
                                <p>{{ $solicitud->correo ?? 'No especificado' }}</p>
                            </div>

                            <div class="info-group">
                                <label>Celular:</label>
                                <p>{{ $solicitud->celular ?? 'No especificado' }}</p>
                            </div>

                            <div class="info-group">
                                <label>Código de Prácticas:</label>
                                <p>{{ $solicitud->codigo_practicas ?? 'No especificado' }}</p>
                            </div>

                            <div class="info-group">
                                <label>Fecha de Inicio:</label>
                                <p>{{ $solicitud->fecha_inicio ? $solicitud->fecha_inicio->format('d/m/Y') : 'No especificada' }}</p>
                            </div>

                            <div class="info-group">
                                <label>Fecha de Finalización:</label>
                                <p>{{ $solicitud->fecha_finalizacion ? $solicitud->fecha_finalizacion->format('d/m/Y') : 'No especificada' }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-12">
                            <div class="card bg-light">
                                <div class="card-body">
                                    <h5 class="card-title">Información Adicional</h5>
                                    <p class="card-text">
                                        <strong>Creado:</strong> {{ $solicitud->created_at->format('d/m/Y H:i') }}<br>
                                        <strong>Última actualización:</strong> {{ $solicitud->updated_at->format('d/m/Y H:i') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-12">
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('solicitudes.index') }}" class="btn btn-secondary">
                                    <i class="bi bi-arrow-left"></i> Volver al Listado
                                </a>
                                <div class="btn-group">
                                    <a href="{{ route('solicitudes.ver', $solicitud->id) }}" class="btn btn-info">
                                        <i class="bi bi-eye"></i> Ver Solicitud
                                    </a>
                                    <a href="{{ route('solicitudes.edit', $solicitud->id) }}" class="btn btn-warning">
                                        <i class="bi bi-pencil"></i> Editar
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.info-group {
    margin-bottom: 1rem;
}

.info-group label {
    font-weight: bold;
    color: #495057;
    margin-bottom: 0.25rem;
    display: block;
}

.info-group p {
    margin-bottom: 0;
    padding: 0.5rem;
    background-color: #f8f9fa;
    border-radius: 0.25rem;
    border-left: 3px solid #007bff;
}
</style>
@endsection 