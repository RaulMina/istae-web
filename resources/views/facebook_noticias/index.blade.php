<!-- DESPLEGANDO TODA LA PLATILLA REALIZADA--->
@extends('layouts.app')

<!-- DESPLEGANDO EL TITULO DE ESTA PAGINA-->
@section('title', 'Noticias Facebook')

<!-- DESPLEGANDO TODO EL CONTENIDO DE ESTA PAGINA--->
@section('content')
<div class="module-container">
    <div class="module-header">
        <h1><i class="bi bi-facebook"></i> Noticias de Facebook</h1>
    </div>

    <div class="module-actions">
        @if(session('error'))
            <div class="alert alert-danger d-flex align-items-center" role="alert">
                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                {{ session('error') }}
            </div>
        @endif

        <div class="action-buttons">
            <form method="GET" action="{{route('searchlink_facebook')}}" class="search-form">
                @csrf
                <div class="input-group">
                    <input type="text" name="name_facebook" placeholder="Buscar por nombre..." class="form-control">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </form>

            <a href="{{route('facebook_noticias.create')}}" class="btn btn-success">
                <i class="bi bi-plus-circle-fill"></i> Nueva Publicación
            </a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre Publicación</th>
                    <th scope="col">Link Facebook</th>
                    <th scope="col" class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($datos as $dato)
                <tr>
                    <td>{{ $dato['id'] }}</td>
                    <td><input type="text" value="{{ $dato['name_facebook'] }}" class="form-control" readonly> </td>
                    <td>
                   
                        <a href="{{ $dato['link_facebook'] }}" target="_blank" class="facebook-link">
                            <i class="bi bi-link-45deg"></i>IR A LA PUBLICACIÓN
                        </a>
                    </td>
                    <td class="text-center">
                        <div class="btn-group">
                            <a href="{{route('facebook_noticias.edit',$dato['id'])}}" 
                               class="btn btn-sm btn-outline-primary me-2" 
                               data-bs-toggle="tooltip" 
                               title="Editar noticia">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <form class="deleteForm d-inline" 
                                  action="{{route('facebook_noticias.destroy',$dato['id'])}}" 
                                  method="POST" 
                                  onsubmit="return confirm('¿Está seguro de eliminar esta noticia?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="btn btn-sm btn-outline-danger" 
                                        data-bs-toggle="tooltip" 
                                        title="Eliminar noticia">
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

.facebook-link {
    color: var(--primary-color);
    text-decoration: none;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.facebook-link:hover {
    text-decoration: underline;
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
}
</style>

@endsection