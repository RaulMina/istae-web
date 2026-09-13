<!-- DESPLEGANDO TODA LA PLATILLA REALIZADA--->
@extends('layouts.app')

<!-- DESPLEGANDO EL TITULO DE ESTA PAGINA-->
@section('title', 'CREAR  ROLES')

<!-- DESPLEGANDO TODO EL CONTENIDO DE ESTA PAGINA--->
@section('content')
<div class="containe  page_style">
    <center>
        <h1>CREAR ROLES</h1>
        
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

                        <form method="POST" action="{{route('roles.store')}}">
                            @csrf
                            <div class="form-group">
                                <label for="role_name">Nombres Rol</label>
                                <input type="text" name="role_name" id="role_name" class="form-control" placeholder="" required autofocus>
                            </div>

                            <div class="form-group">
                                <label for="role_code">Codigo Rol</label>
                                <input type="text" name="role_code" id="role_code" class="form-control" placeholder="" required autofocus>
                            </div>


                            <button type="submit" class="btn btn-primary">Crear</button>
                        </form>
                        <a href="{{route('roles.index')}}" class="btn btn-defaul">Regresar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</div>
@endsection
