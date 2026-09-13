@extends('layouts.app')

@section('title', 'Editar Solicitud de Prácticas')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2 class="mb-0"><i class="bi bi-pencil-square"></i> Editar Solicitud de Prácticas</h2>
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

                    <form method="POST" action="{{ route('solicitudes.update', $solicitud->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="nombres_apellidos_estudiante" class="form-label">Nombres y Apellidos del Estudiante</label>
                                    <input type="text" class="form-control" id="nombres_apellidos_estudiante" name="nombres_apellidos_estudiante" value="{{ old('nombres_apellidos_estudiante', $solicitud->nombres_apellidos_estudiante) }}">
                                </div>

                                <div class="mb-3">
                                    <label for="institu_destino" class="form-label">Institución Destino</label>
                                    <select class="form-control" id="institu_destino" name="institu_destino" >
                                        <option value="">Seleccione una institución</option>
                                        @if(isset($componentesFormatos['institu_destino']))
                                            @foreach($componentesFormatos['institu_destino'] as $componente)
                                                <option value="{{ $componente->campos }}" {{ old('institu_destino', $solicitud->institu_destino) == $componente->campos ? 'selected' : '' }}>
                                                    {{ ucwords(str_replace('_', ' ', $componente->campos)) }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="tutor_academico" class="form-label">Tutor Académico</label>
                                    <select class="form-control" id="tutor_academico" name="tutor_academico" >
                                        <option value="">Seleccione un tutor</option>
                                        @if(isset($componentesFormatos['tutor_academico']))
                                            @foreach($componentesFormatos['tutor_academico'] as $componente)
                                                <option value="{{ $componente->campos }}" {{ old('tutor_academico', $solicitud->tutor_academico) == $componente->campos ? 'selected' : '' }}>
                                                    {{ ucwords(str_replace('_', ' ', $componente->campos)) }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="carrera" class="form-label">Carrera</label>
                                    <select class="form-control" id="carrera" name="carrera" >
                                        <option value="">Seleccione una carrera</option>
                                        <option value="Tecnología Superior en Desarrollo de Software" {{ old('carrera', $solicitud->carrera) == 'Tecnología Superior en Desarrollo de Software' ? 'selected' : '' }}>
                                            Tecnología Superior en Desarrollo de Software
                                        </option>
                                        <option value="Tecnología Superior en Mecanización Agrícola" {{ old('carrera', $solicitud->carrera) == 'Tecnología Superior en Mecanización Agrícola' ? 'selected' : '' }}>
                                            Tecnología Superior en Mecanización Agrícola
                                        </option>
                                        <option value="Tecnología Superior en Mecánica Automotriz" {{ old('carrera', $solicitud->carrera) == 'Tecnología Superior en Mecánica Automotriz' ? 'selected' : '' }}>
                                            Tecnología Superior en Mecánica Automotriz
                                        </option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="cedula" class="form-label">Cédula</label>
                                    <input type="text" class="form-control" id="cedula" name="cedula" value="{{ old('cedula', $solicitud->cedula) }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="proyecto_asigando" class="form-label">Proyecto Asignado</label>
                                    <select class="form-control" id="proyecto_asigando" name="proyecto_asigando" >
                                        <option value="">Seleccione un proyecto</option>
                                        @if(isset($componentesFormatos['proyecto_asigando']))
                                            @foreach($componentesFormatos['proyecto_asigando'] as $componente)
                                                <option value="{{ $componente->campos }}" {{ old('proyecto_asigando', $solicitud->proyecto_asigando) == $componente->campos ? 'selected' : '' }}>
                                                    {{ ucwords(str_replace('_', ' ', $componente->campos)) }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="codificacion_proyecto" class="form-label">Codificación del Proyecto</label>
                                    <select class="form-control" id="codificacion_proyecto" name="codificacion_proyecto" >
                                        <option value="">Seleccione una codificación</option>
                                        @if(isset($componentesFormatos['codificacion_proyecto']))
                                            @foreach($componentesFormatos['codificacion_proyecto'] as $componente)
                                                <option value="{{ $componente->campos }}" {{ old('codificacion_proyecto', $solicitud->codificacion_proyecto) == $componente->campos ? 'selected' : '' }}>
                                                    {{ ucwords(str_replace('_', ' ', $componente->campos)) }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="codificacion_programa" class="form-label">Codificación del Programa</label>
                                    <select class="form-control" id="codificacion_programa" name="codificacion_programa" >
                                        <option value="">Seleccione una codificación</option>
                                        @if(isset($componentesFormatos['codificacion_programa']))
                                            @foreach($componentesFormatos['codificacion_programa'] as $componente)
                                                <option value="{{ $componente->campos }}" {{ old('codificacion_programa', $solicitud->codificacion_programa) == $componente->campos ? 'selected' : '' }}>
                                                    {{ ucwords(str_replace('_', ' ', $componente->campos)) }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="numeracion_proyecto" class="form-label">Numeración del Proyecto</label>
                                    <select class="form-control" id="numeracion_proyecto" name="numeracion_proyecto" >
                                        <option value="">Seleccione una numeración</option>
                                        @if(isset($componentesFormatos['numeracion_proyecto']))
                                            @foreach($componentesFormatos['numeracion_proyecto'] as $componente)
                                                <option value="{{ $componente->campos }}" {{ old('numeracion_proyecto', $solicitud->numeracion_proyecto) == $componente->campos ? 'selected' : '' }}>
                                                    {{ ucwords(str_replace('_', ' ', $componente->campos)) }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="periodo" class="form-label">Periodo</label>
                                    <select class="form-control" id="periodo" name="periodo" >
                                        <option value="">Seleccione un periodo</option>
                                        @if(isset($componentesFormatos['periodo']))
                                            @foreach($componentesFormatos['periodo'] as $componente)
                                                <option value="{{ $componente->campos }}" {{ old('periodo', $solicitud->periodo) == $componente->campos ? 'selected' : '' }}>
                                                    {{ ucwords(str_replace('_', ' ', $componente->campos)) }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="correo" class="form-label">Correo Electrónico</label>
                                    <input type="email" class="form-control" id="correo" name="correo" value="{{ old('correo', $solicitud->correo) }}">
                                </div>

                                <div class="mb-3">
                                    <label for="celular" class="form-label">Celular</label>
                                    <input type="text" class="form-control" id="celular" name="celular" value="{{ old('celular', $solicitud->celular) }}">
                                </div>

                                <div class="mb-3">
                                    <label for="codigo_practicas" class="form-label">Código de Prácticas</label>
                                    <select class="form-control" id="codigo_practicas" name="codigo_practicas">
                                        <option value="">Seleccione un código</option>
                                        @if(isset($componentesFormatos['codigo_practicas']))
                                            @foreach($componentesFormatos['codigo_practicas'] as $componente)
                                                <option value="{{ $componente->campos }}" {{ old('codigo_practicas', $solicitud->codigo_practicas) == $componente->campos ? 'selected' : '' }}>
                                                    {{ ucwords(str_replace('_', ' ', $componente->campos)) }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="nombre_programa" class="form-label">Nombre del Programa</label>
                                    <select class="form-control" id="nombre_programa" name="nombre_programa">
                                        <option value="">Seleccione un programa</option>
                                        @if(isset($componentesFormatos['nombre_programa']))
                                            @foreach($componentesFormatos['nombre_programa'] as $componente)
                                                <option value="{{ $componente->campos }}" {{ old('nombre_programa', $solicitud->nombre_programa) == $componente->campos ? 'selected' : '' }}>
                                                    {{ ucwords(str_replace('_', ' ', $componente->campos)) }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="fecha_inicio" class="form-label">Fecha de Inicio</label>
                                    <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" value="{{ old('fecha_inicio', $solicitud->fecha_inicio ? $solicitud->fecha_inicio->format('Y-m-d') : '') }}">
                                </div>

                                <div class="mb-3">
                                    <label for="fecha_finalizacion" class="form-label">Fecha de Finalización</label>
                                    <input type="date" class="form-control" id="fecha_finalizacion" name="fecha_finalizacion" value="{{ old('fecha_finalizacion', $solicitud->fecha_finalizacion ? $solicitud->fecha_finalizacion->format('Y-m-d') : '') }}">
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-12">
                                <div class="d-flex justify-content-between">
                                    <a href="{{ route('solicitudes.index') }}" class="btn btn-secondary">
                                        <i class="bi bi-arrow-left"></i> Cancelar
                                    </a>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="bi bi-check-circle"></i> Actualizar Solicitud
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