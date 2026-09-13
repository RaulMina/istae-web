<!-- DESPLEGANDO TODA LA PLATILLA REALIZADA--->
@extends('layouts.app')

<!-- DESPLEGANDO EL TITULO DE ESTA PAGINA-->
@section('title', 'USUARIOS')

<!-- DESPLEGANDO TODO EL CONTENIDO DE ESTA PAGINA--->
@section('content')
<div class="container py-4">
    <div class="card mb-4 shadow-sm">
        <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
            <h3 class="m-0 text-primary">
                <i class="ri-user-line me-2"></i>Gestión de Usuarios
            </h3>
            <a href="{{route('user.create')}}" class="btn btn-primary">
                <i class="ri-user-add-line me-1"></i> Nuevo Usuario
            </a>
        </div>
        
        <div class="card-body">
            @if(session('error'))
                <div class="alert alert-danger d-flex align-items-center" role="alert">
                    <i class="ri-error-warning-line me-2"></i>
                    {{ session('error') }}
                </div>
            @endif

            <div class="row mb-4">
                <div class="col-md-6">
                    <form method="GET" action="{{route('searchuser')}}" class="d-flex gap-2">
                        @csrf
                        <div class="input-group">
                            <input type="text" name="filtro_nombre" placeholder="Buscar por nombre" class="form-control">
                            <button type="submit" class="btn btn-info">
                                <i class="bi bi-search"></i> Buscar
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Correo</th>
                            <th scope="col">Usuario</th>
                            <th scope="col">Cargo</th>
                            <th scope="col">Detalle</th>
                            <th scope="col">Cédula</th>
                            <th scope="col" class="text-center">Imagen</th>
                            <th scope="col">Rol</th>
                            <th scope="col" class="text-center">Estado</th>
                            <th scope="col" class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($datos as $dato)
                        <tr>
                            <td class="text-center">{{ $dato['id'] }}</td>
                            <td>{{ $dato['firstname_lastname'] }}</td>
                            <td>
                                <span class="text-primary">
                                    <i class="ri-mail-line me-1"></i>{{ $dato['mail'] }}
                                </span>
                            </td>
                            <td>{{ $dato['user'] }}</td>
                            <td>
                                <span class="badge bg-info text-white">
                                    {{ $dato['cargo'] }}
                                </span>
                            </td>
                            <td>{{ $dato['detalle'] }}</td>
                            <td>{{ $dato['dni'] }}</td>
                            <td class="text-center">
                                <img src="../../{{ $dato['img'] }}" alt="Profile" 
                                     class="rounded-circle border shadow-sm" 
                                     style="width:40px; height:40px; object-fit: cover;">
                            </td>
                            <td>
                                <span class="badge bg-primary">
                                    {{ $dato->Role['role_name'] }}
                                </span>
                            </td>
                            <td class="text-center">
                                <span class="badge {{ $dato['state'] == 'Active' ? 'bg-success' : 'bg-warning' }}">
                                    <i class="ri-checkbox-circle-line me-1"></i>
                                    {{ $dato['state'] }}
                                </span>
                            </td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="{{route('user.edit',$dato['id'])}}" 
                                       class="btn btn-sm btn-outline-primary me-2" 
                                       data-bs-toggle="tooltip" 
                                       title="Editar usuario">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <form class="deleteForm d-inline" 
                                          action="{{route('user.destroy',$dato['id'])}}" 
                                          method="POST" 
                                          onsubmit="return confirm('¿Está seguro de eliminar este usuario?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="btn btn-sm btn-outline-danger" 
                                                data-bs-toggle="tooltip" 
                                                title="Eliminar usuario">
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

            <div class="d-flex justify-content-center mt-4">
                {{ $datos->links() }}
            </div>
        </div>
    </div>
</div>

<style>
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

.tooltip {
    font-size: 0.875rem;
}

.badge {
    padding: 0.5em 0.75em;
    font-weight: 500;
}

.table th {
    font-weight: 600;
    text-transform: uppercase;
    font-size: 0.75rem;
    letter-spacing: 0.5px;
}

.table td {
    font-size: 0.875rem;
}

.input-group {
    box-shadow: 0 2px 4px rgba(0,0,0,0.05);
    border-radius: 0.375rem;
    overflow: hidden;
}

.input-group .form-control {
    border-right: none;
}

.input-group .btn {
    border-left: none;
    padding-left: 1.5rem;
    padding-right: 1.5rem;
}

.card-header {
    border-bottom: 2px solid var(--accent-color);
}

.text-primary {
    color: var(--heading-color) !important;
}
</style>

@push('scripts')
<script>
    // Inicializar tooltips de Bootstrap
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })
</script>
@endpush

@endsection
