<!-- DESPLEGANDO TODA LA PLATILLA REALIZADA--->
@extends('layouts.app')

<!-- DESPLEGANDO EL TITULO DE ESTA PAGINA-->
@section('title', 'EDITAR USUARIO')

<!-- DESPLEGANDO TODO EL CONTENIDO DE ESTA PAGINA--->
@section('content')
<div class="container py-4">
        <div class="row justify-content-center">
        <div class="col-md-8">
                <div class="card">
                <div class="card-header">
                    <h3 class="m-0">Editar Usuario</h3>
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

                    <form method="post" action="{{ route('user.update',$matriz['depen']->id) }}" enctype="multipart/form-data" class="needs-validation" novalidate>
                            @method('PUT')
                             @csrf
                            <input type="hidden" name="id" value="{{$matriz['depen']->id}}">

                        <div class="row">
                            <div class="col-md-6">
                            <div class="form-group">
                                <label for="firstname_lastname">Nombres y Apellidos</label>
                                    <input type="text" name="firstname_lastname" id="firstname_lastname" class="form-control" value="{{$matriz['depen']->firstname_lastname }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group">
                                <label for="user">Nombre de Usuario</label>
                                <input type="text" name="user" id="user" class="form-control" value="{{$matriz['depen']->user }}">
                                </div>
                            </div>
                            </div>
                         
                        <div class="row">
                            <div class="col-md-6">
                            <div class="form-group">
                                <label for="mail">Email</label>
                                <input type="email" id="mail" name="mail" class="form-control" value="{{$matriz['depen']->mail }}" required>
                            </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group">
                                    <label for="password">Contraseña</label>
                                    <input type="password" id="password" name="password" class="form-control" value="{{$matriz['depen']->password }}" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                            <div class="form-group">
                                    <label for="cargo">Cargo</label>
                                    <select class="form-control" id="cargo" name="cargo" required>
                                <option value="{{$matriz['depen']->cargo }}">{{$matriz['depen']->cargo }}</option>
                                <option value="DOCENTE">DOCENTE</option>
                                <option value="ADMINISTRATIVO">ADMINISTRATIVO</option>
                                </select>
                            </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group">
                                    <label for="dni">Cédula</label>
                                    <input type="text" name="dni" id="dni" class="form-control" value="{{$matriz['depen']->dni }}" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="detalle">Detalle</label>
                            <textarea id="detalle" name="detalle" class="form-control" rows="3">{{$matriz['depen']->detalle }}</textarea>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                            <div class="form-group">
                                    <label for="img">Imagen de Perfil</label>
                                    <input type="file" id="img" name="img" class="form-control" accept="image/*">
                                    @if($matriz['depen']->img)
                                        <div class="mt-2">
                                            <img src="/{{$matriz['depen']->img}}" alt="Current Profile" class="img-thumbnail" style="max-height: 100px;">
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group">
                                    <label for="state">Estado</label>
                                    <select class="form-control" id="state" name="state" required>
                                <option value="{{$matriz['depen']->state}}">{{$matriz['depen']->state }}</option>
                                        <option value="Active">Activo</option>
                                        <option value="Suspended">Suspendido</option>
                                </select>
                                </div>
                            </div>
                        </div>

                            <div class="form-group">
                            <label for="id_roles">Rol</label>
                            <select name="id_roles" id="id_roles" class="form-control" required>
                                    @foreach ($matriz['datos']['Role'] as $dato)
                                        <option value="{{ $dato->id }}"
                                        {{ $matriz['depen']->id_roles == $dato->id ? 'selected' : '' }}>
                                            {{ $dato->role_name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                      
                        <div class="form-group mt-4 text-center">
                            <button type="submit" class="btn btn-primary px-4">
                                <i class="ri-save-line me-1"></i> Guardar Cambios
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
