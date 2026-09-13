<!-- DESPLEGANDO TODA LA PLATILLA REALIZADA--->
@extends('layouts.app')

<!-- DESPLEGANDO EL TITULO DE ESTA PAGINA-->
@section('title', 'CREAR')

<!-- DESPLEGANDO TODO EL CONTENIDO DE ESTA PAGINA--->
@section('content')
<div class="containe  page_style">
    <center>
        <h1>CREAR</h1>
      
    </center>


<div class="container">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">

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

                        <form method="POST" action="{{route('infoistae.store')}}"enctype="multipart/form-data" >
                            @csrf
                            <div class="form-group">
                                <label for="categoria">Selecciona una categoria:</label>
                                <select class="form-control" id="categoria" name="categoria">
                                <option value="Convenios">Convenios</option>
                                <option value="Bienestar Institucional">Bienestar Institucional</option>
                                <option value="Vinculación">Vinculación</option>
                                <option value="Prácticas Pre Profesionales">Prácticas Pre Profesionales</option>
                                <option value="Aseguramiento de Calidad">Aseguramiento de Calidad</option>
                                <option value="Planificación Estratégica">Planificación Estratégica</option>
                                <option value="Rendición de Cuenta">Rendición de Cuenta</option>
                                <option value="Poa">Poa</option>
                               
                            
                            
                            </select>
                            </div>
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" name="nombre" id="nombre" class="form-control" >
                                <p style="color: black; font-size: 8px;">Al usar convenios, puedes decir por :•	Vinculación ,•	Practicas pre profesionales,•	Cooperación </p>
                            </div>
                            <div class="form-group">
                                <label for="detalle">Detalles</label>
                                <input type="text" name="detalle" id="detalle" class="form-control" >
                            </div>
                        
                            <div class="form-group">
                                <label for="link_normativa">Detalles</label>
                                <input type="file" name="link_normativa" id="link_normativa" class="form-control" >
                            </div>
                            <?php  $user = session('user') ?>
                            <div class="form-group">

                                <input type="hidden" id="id_users" name="id_users" class="form-control" value="<?php echo $user->__get('id');?>"required style="display: none;"readonly>
                            </div>
                            <button type="submit" class="btn btn-primary">Crear</button>
                        </form>
                        <a href="{{route('infoistae.index')}}" class="btn btn-defaul">Regresar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
@endsection
