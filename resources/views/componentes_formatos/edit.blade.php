@extends('layouts.app')

@section('title', 'Editar Componente de Formato')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2 class="mb-0"><i class="bi bi-pencil-square"></i> Editar Componente de Formato</h2>
                </div>

                <div class="card-body">
                    @if(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('componentes-formatos.update', $componente->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="tipos_campos" class="form-label">Tipo de Campo</label>
                                    <select class="form-control" id="tipos_campos" name="tipos_campos" required>
                                        <option value="">Seleccione un campo</option>
                                        <option value="institu_destino" {{ old('tipos_campos', $componente->tipos_campos) == 'institu_destino' ? 'selected' : '' }}>
                                            Institución Destino
                                        </option>
                                        <option value="tutor_academico" {{ old('tipos_campos', $componente->tipos_campos) == 'tutor_academico' ? 'selected' : '' }}>
                                            Tutor Académico
                                        </option>
                                        <option value="proyecto_asigando" {{ old('tipos_campos', $componente->tipos_campos) == 'proyecto_asigando' ? 'selected' : '' }}>
                                            Proyecto Asignado
                                        </option>
                                        <option value="codificacion_proyecto" {{ old('tipos_campos', $componente->tipos_campos) == 'codificacion_proyecto' ? 'selected' : '' }}>
                                            Codificación del Proyecto
                                        </option>
                                        <option value="codificacion_programa" {{ old('tipos_campos', $componente->tipos_campos) == 'codificacion_programa' ? 'selected' : '' }}>
                                            Codificación del Programa
                                        </option>
                                        <option value="numeracion_proyecto" {{ old('tipos_campos', $componente->tipos_campos) == 'numeracion_proyecto' ? 'selected' : '' }}>
                                            Numeración del Proyecto
                                        </option>
                                        <option value="periodo" {{ old('tipos_campos', $componente->tipos_campos) == 'periodo' ? 'selected' : '' }}>
                                            Periodo
                                        </option>
                                        <option value="codigo_practicas" {{ old('tipos_campos', $componente->tipos_campos) == 'codigo_practicas' ? 'selected' : '' }}>
                                            Código de Prácticas
                                        </option>
                                        <option value="nombre_programa" {{ old('tipos_campos', $componente->tipos_campos) == 'nombre_programa' ? 'selected' : '' }}>
                                            Nombre del programa
                                        </option>
                                       
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="campos" class="form-label">Campo</label>
                                    <input type="text" class="form-control" id="campos" name="campos" value="{{ old('campos', $componente->campos) }}" required placeholder="Ingrese el tipo de campo (ej: solicitud_ingreso, solicitud_finiquito)">
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-12">
                                <div class="d-flex justify-content-between">
                                    <a href="{{ route('componentes-formatos.index') }}" class="btn btn-secondary">
                                        <i class="bi bi-arrow-left"></i> Cancelar
                                    </a>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="bi bi-check-circle"></i> Actualizar Componente
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 