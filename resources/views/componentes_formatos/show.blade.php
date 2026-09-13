@extends('layouts.app')

@section('title', 'Ver Componente de Formato')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h2 class="mb-0">
                        <i class="bi bi-file-earmark-text"></i> Componente #{{ $componente->id }}
                    </h2>
                    <div class="btn-group">
                        <a href="{{ route('componentes-formatos.edit', $componente) }}" class="btn btn-warning">
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
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Información del Componente</h5>
                                    <div class="mb-3">
                                        <strong>ID:</strong> {{ $componente->id }}
                                    </div>
                                    <div class="mb-3">
                                        <strong>Tipo de Campo:</strong> 
                                        <span class="badge bg-primary">{{ $componente->tipos_campos }}</span>
                                    </div>
                                    <div class="mb-3">
                                        <strong>Campo:</strong> 
                                        <span class="badge bg-secondary">{{ $componente->campos }}</span>
                                    </div>
                                    <div class="mb-3">
                                        <strong>Creado:</strong> {{ $componente->created_at->format('d/m/Y H:i:s') }}
                                    </div>
                                    <div class="mb-3">
                                        <strong>Última actualización:</strong> {{ $componente->updated_at->format('d/m/Y H:i:s') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-12">
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('componentes-formatos.index') }}" class="btn btn-secondary">
                                    <i class="bi bi-arrow-left"></i> Volver al Listado
                                </a>
                                <div class="btn-group">
                                    <a href="{{ route('componentes-formatos.edit', $componente->id) }}" class="btn btn-warning">
                                        <i class="bi bi-pencil"></i> Editar
                                    </a>
                                    <form action="{{ route('componentes-formatos.destroy', $componente->id) }}" 
                                          method="POST" 
                                          class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="btn btn-danger" 
                                                onclick="return confirm('¿Está seguro de eliminar este componente?')">
                                            <i class="bi bi-trash"></i> Eliminar
                                        </button>
                                    </form>
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

pre {
    background-color: #f8f9fa;
    border: 1px solid #dee2e6;
    border-radius: 0.25rem;
    padding: 1rem;
    margin: 0;
}
</style>
@endsection 