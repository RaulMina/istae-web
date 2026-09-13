@extends('layouts.app')

@section('title', 'Gestión de Solicitudes - ISTAE')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h2 class="mb-0"><i class="bi bi-file-earmark-text"></i> Solicitudes de Prácticas</h2>
                    <div class="btn-group">
                        <a href="{{ route('componentes-formatos.index') }}" class="btn btn-secondary me-2">
                            <i class="bi bi-gear"></i> Componentes de Formatos
                        </a>
                        <a href="{{ route('solicitudes.create') }}" class="btn btn-primary">
                            <i class="bi bi-plus-circle"></i> Nueva Solicitud
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

                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Estudiante</th>
                                    <th>Carrera</th>
                                    <th>Institución Destino</th>
                                    <th>Proyecto Asignado</th>
                                    <th>Periodo</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($solicitudes as $solicitud)
                                    <tr>
                                        <td>{{ $solicitud->id }}</td>
                                        <td>{{ $solicitud->nombres_apellidos_estudiante }}</td>
                                        <td>{{ $solicitud->carrera }}</td>
                                        <td>{{ $solicitud->institu_destino }}</td>
                                        <td>{{ $solicitud->proyecto_asigando }}</td>
                                        <td>{{ $solicitud->periodo }}</td>
                                        <td class="text-end">
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('solicitudes.ver', $solicitud->id) }}" 
                                                   class="btn btn-info btn-sm" 
                                                   title="Ver Solicitud">
                                                    <i class="bi bi-eye"></i>
                                                </a>
                                                <a href="{{ route('solicitudes.show', $solicitud->id) }}" 
                                                   class="btn btn-primary btn-sm" 
                                                   title="Detalles">
                                                    <i class="bi bi-info-circle"></i>
                                                </a>
                                                <a href="{{ route('solicitudes.edit', $solicitud->id) }}" 
                                                   class="btn btn-warning btn-sm" 
                                                   title="Editar">
                                                    <i class="bi bi-pencil"></i>
                                                </a>
                                                <form action="{{ route('solicitudes.destroy', $solicitud->id) }}" 
                                                      method="POST" 
                                                      class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" 
                                                            class="btn btn-danger btn-sm" 
                                                            title="Eliminar"
                                                            onclick="return confirm('¿Está seguro de eliminar esta solicitud?')">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center">No hay solicitudes registradas</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="d-flex justify-content-center mt-4">
                        {{ $solicitudes->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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

.card-header h2 {
    color: #1565c0;
    font-size: 1.5rem;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.table th {
    background-color: #f8f9fa;
    color: #1565c0;
}

.btn-group .btn {
    margin: 0 2px;
}

.badge {
    padding: 0.5em 0.8em;
}
</style>
@endsection 