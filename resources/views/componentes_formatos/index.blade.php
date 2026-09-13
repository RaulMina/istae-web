@extends('layouts.app')

@section('title', 'Gestión de Componentes de Formatos - ISTAE')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h2 class="mb-0"><i class="bi bi-file-earmark-text"></i> Componentes de Formatos</h2>
                    <a href="{{ route('componentes-formatos.create') }}" class="btn btn-primary">
                        <i class="bi bi-plus-circle"></i> Nuevo Componente
                    </a>
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
                                    <th>Tipo de Campo</th>
                                    <th>Campo</th>
                                    <th>Fecha Creación</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($componentes as $componente)
                                    <tr>
                                        <td>{{ $componente->id }}</td>
                                        <td>
                                            <span class="badge bg-primary">{{ $componente->tipos_campos }}</span>
                                        </td>
                                        <td>
                                            <span class="badge bg-secondary">{{ $componente->campos }}</span>
                                        </td>
                                        <td>{{ $componente->created_at->format('d/m/Y H:i') }}</td>
                                        <td class="text-end">
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('componentes-formatos.show', $componente->id) }}" 
                                                   class="btn btn-info btn-sm" 
                                                   title="Ver">
                                                    <i class="bi bi-eye"></i>
                                                </a>
                                                <a href="{{ route('componentes-formatos.edit', $componente->id) }}" 
                                                   class="btn btn-warning btn-sm" 
                                                   title="Editar">
                                                    <i class="bi bi-pencil"></i>
                                                </a>
                                                <form action="{{ route('componentes-formatos.destroy', $componente->id) }}" 
                                                      method="POST" 
                                                      class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" 
                                                            class="btn btn-danger btn-sm" 
                                                            title="Eliminar"
                                                            onclick="return confirm('¿Está seguro de eliminar este componente?')">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">No hay componentes registrados</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="d-flex justify-content-center mt-4">
                        {{ $componentes->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 