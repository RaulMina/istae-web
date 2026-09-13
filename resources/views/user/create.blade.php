<!-- DESPLEGANDO TODA LA PLATILLA REALIZADA--->
@extends('layouts.app')

<!-- DESPLEGANDO EL TITULO DE ESTA PAGINA-->
@section('title', 'CREAR USUARIOS')

<!-- DESPLEGANDO TODO EL CONTENIDO DE ESTA PAGINA--->
@section('content')
<div class="container py-4">
        <div class="row justify-content-center">
        <div class="col-md-8">
                <div class="card">
                <div class="card-header">
                    <h3 class="m-0">Crear Nuevo Usuario</h3>
                </div>

                    <div class="card-body">
                    @if(session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif

                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        @if(session('warning'))
                            <div class="alert alert-warning">{{ session('warning') }}</div>
                        @endif

                    <form method="POST" action="{{route('user.store')}}" enctype="multipart/form-data" class="needs-validation" novalidate>
                            @csrf
                        <div class="row">
                            <div class="col-md-6">
                            <div class="form-group">
                                <label for="firstname_lastname">Nombres y Apellidos</label>
                                    <input type="text" name="firstname_lastname" id="firstname_lastname" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group">
                                <label for="user">Nombre de Usuario</label>
                                    <input type="text" name="user" id="user" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                            <div class="form-group">
                                <label for="mail">Email</label>
                                <input type="email" id="mail" name="mail" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group">
                                    <label for="password">Contraseña</label>
                                <input type="password" id="password" name="password" class="form-control" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                            <div class="form-group">
                                    <label for="cargo">Cargo</label>
                                    <select class="form-control" id="cargo" name="cargo" required>
                                        <option value="">Seleccione un cargo</option>
                                <option value="DOCENTE">DOCENTE</option>
                                <option value="ADMINISTRATIVO">ADMINISTRATIVO</option>
                                </select>
                            </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group">
                                    <label for="dni">Cédula</label>
                                    <input type="text" id="dni" name="dni" class="form-control" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="detalle">Detalle</label>
                            <textarea id="detalle" name="detalle" class="form-control" rows="3"></textarea>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                            <div class="form-group">
                                    <label for="img">Imagen de Perfil</label>
                                    <input type="file" id="img" name="img" class="form-control" accept="image/*">
                                </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group">
                                    <label for="state">Estado</label>
                                    <select class="form-control" id="state" name="state" required>
                                        <option value="Active">Activo</option>
                                        <option value="Suspended">Suspendido</option>
                                </select>
                                </div>
                            </div>
                        </div>

                            <div class="form-group">
                            <label for="id_roles">Rol</label>
                            <select class="form-control" id="id_roles" name="id_roles" required>
                                <option value="">Seleccione un rol</option>
                                    @foreach($datos['Role'] as $dato)
                                    <option value="{{ $dato->id }}">{{ $dato->role_name}}</option>
                                    @endforeach
                                </select>
                            </div>

                        <div class="form-group mt-4 text-center">
                            <button type="submit" class="btn btn-primary px-4">
                                <i class="ri-save-line me-1"></i> Guardar Usuario
                            </button>
                            <a href="{{route('user.index')}}" class="btn btn-secondary ms-2">
                                <i class="ri-arrow-left-line me-1"></i> Regresar
                            </a>
                        </div>
                        </form>
            </div>
        </div>
    </div>
    </div>
</div>
@endsection
