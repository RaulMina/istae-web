<!-- DESPLEGANDO TODA LA PLATILLA REALIZADA--->
@extends('layouts.app')

<!-- DESPLEGANDO EL TITULO DE ESTA PAGINA-->
@section('title', 'Información Institucional')

<!-- DESPLEGANDO TODO EL CONTENIDO DE ESTA PAGINA--->
@section('content')
<div class="module-container">
    <div class="module-header">
        <h1><i class="bi bi-info-circle"></i> Información Institucional</h1>
    </div>

    <div class="module-actions">
        @if(session('error'))
            <div class="alert alert-danger d-flex align-items-center" role="alert">
                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                {{ session('error') }}
            </div>
        @endif

        <div class="action-buttons">
            <form method="GET" action="{{route('searchinfoistaes')}}" class="search-form">
                @csrf
                <div class="input-group">
                    <input type="text" name="detalle" placeholder="Buscar información..." class="form-control">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </form>

            <a href="{{route('infoistae.create')}}" class="btn btn-success">
                <i class="bi bi-plus-circle-fill"></i> Nueva Información
            </a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Categoría</th>
                    <th scope="col">Detalle</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Documento</th>
             
                    <th scope="col" class="text-center">Editar</th>
                    <th scope="col" class="text-center">Eliminar</th>
                </tr>
            </thead>
            <tbody>
                @foreach($datos as $dato)
                <tr>
                    <td>{{ $dato['id'] }}</td>
                    <td>
                        <span class="badge bg-primary">{{ $dato['categoria'] }}</span>
                    </td>
                    <td>{{ $dato['detalle'] }}</td>
                    <td>{{ $dato['nombre'] }}</td>
                    <td>
                        @if($dato['link_normativa'])
                        
                         <!--    <a href="{{ $dato->link_normativa }}" class="btn btn-outline-primary btn-sm px-4" target="_blank" style="border-radius: 20px;">
                        <i class="bi bi-file-earmark-text"></i> Ver Documento
                    </a>-->
                      <a href="{{ route('ver.archivo', ['path' => $dato->link_normativa]) }}" 
   class="btn btn-outline-primary btn-sm" 
   target="_blank">
    <i class="bi bi-file-earmark-pdf-fill"></i> Descargar PDF
</a>

                        @else
                        <span class="text-muted">Sin documento</span>
                        @endif
                    </td>
                    <td class="text-center">
                        <div class="btn-group">
                            <a href="{{route('infoistae.edit',$dato['id'])}}" 
                               class="btn btn-sm btn-outline-primary me-2" 
                               data-bs-toggle="tooltip" 
                               title="Editar información">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            
                        </div>
                    </td>
                    <td class="text-center">
                        <div class="btn-group">
                      
                            <form class="deleteForm d-inline" 
                                  action="{{route('infoistae.destroy',$dato['id'])}}" 
                                  method="POST" 
                                  onsubmit="return confirm('¿Está seguro de eliminar esta información?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="btn btn-sm btn-outline-danger" 
                                        data-bs-toggle="tooltip" 
                                        title="Eliminar información">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="pagination-container">
        {{ $datos->links() }}
    </div>
</div>

<style>
.module-container {
    padding: 2rem;
    background-color: var(--background-color);
}

.module-header {
    margin-bottom: 2rem;
    text-align: center;
}

.module-header h1 {
    color: var(--primary-color);
    font-size: 2rem;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
}

.module-actions {
    margin-bottom: 2rem;
}

.action-buttons {
    display: flex;
    gap: 1rem;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 1rem;
}

.search-form {
    flex-grow: 1;
    max-width: 500px;
}

.input-group {
    box-shadow: 0 2px 4px rgba(0,0,0,0.05);
    border-radius: 8px;
    overflow: hidden;
}

.input-group .form-control {
    border: 2px solid rgba(0,0,0,0.05);
    border-right: none;
    padding: 0.75rem 1rem;
}

.input-group .form-control:focus {
    box-shadow: none;
    border-color: var(--primary-color);
}

.input-group .btn {
    padding-left: 1.5rem;
    padding-right: 1.5rem;
    border: none;
}

.table {
    background: white;
    border-radius: 10px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.05);
    margin-bottom: 2rem;
}

.table thead th {
    background-color: var(--background-color);
    color: var(--text-color);
    font-weight: 600;
    text-transform: uppercase;
    font-size: 0.875rem;
    letter-spacing: 0.5px;
    padding: 1rem;
    border-bottom: 2px solid rgba(0,0,0,0.05);
}

.table tbody td {
    padding: 1rem;
    vertical-align: middle;
    border-bottom: 1px solid rgba(0,0,0,0.05);
}

.table tbody tr:hover {
    background-color: rgba(0,0,0,0.02);
}

.badge {
    padding: 0.5rem 1rem;
    font-weight: 500;
    font-size: 0.875rem;
}

.document-link {
    color: var(--primary-color);
    text-decoration: none;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-size: 0.875rem;
}

.document-link:hover {
    text-decoration: underline;
}

.document-link i {
    font-size: 1.25rem;
    color: #dc3545;
}

.info-image {
    width: 60px;
    height: 60px;
    object-fit: cover;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.btn-group .btn {
    padding: 0.5rem;
    transition: all 0.3s ease;
}

.btn-group .btn:hover {
    transform: translateY(-2px);
}

.btn-outline-primary {
    border-color: var(--primary-color);
    color: var(--primary-color);
}

.btn-outline-primary:hover {
    background-color: var(--primary-color);
    color: white;
}

.btn-outline-danger {
    border-color: var(--danger);
    color: var(--danger);
}

.btn-outline-danger:hover {
    background-color: var(--danger);
    color: white;
}

.pagination-container {
    display: flex;
    justify-content: center;
    margin-top: 2rem;
}

.alert {
    border-radius: 8px;
    padding: 1rem;
    margin-bottom: 1rem;
    display: flex;
    align-items: center;
}

.alert-danger {
    background-color: rgba(220,53,69,0.1);
    border: 1px solid var(--danger);
    color: var(--danger);
}

.text-muted {
    color: #6c757d !important;
    font-size: 0.875rem;
}

@media (max-width: 768px) {
    .module-container {
        padding: 1rem;
    }

    .action-buttons {
        flex-direction: column;
    }

    .search-form {
        max-width: 100%;
        margin-bottom: 1rem;
    }

    .info-image {
        width: 40px;
        height: 40px;
    }
}
</style>

@endsection