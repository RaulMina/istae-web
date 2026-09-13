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

                        <form method="POST" action="{{route('facebook_noticias.store')}}"enctype="multipart/form-data" >
                            @csrf
                            <div class="form-group">
                                <label for="name_facebook">Name facebook</label>
                                <input type="text" name="name_facebook" id="name_facebook" class="form-control" placeholder="" required autofocus>
                            </div>
                            <div class="form-group">
                                <label for="link_facebook">Link facebook</label>
                                <input type="text" name="link_facebook" id="link_facebook" class="form-control" placeholder="" required autofocus>
                            </div>
                            <?php  $user = session('user') ?>
                            <div class="form-group">

                                <input type="hidden" id="id_users" name="id_users" class="form-control" value="<?php echo $user->__get('id');?>"required style="display: none;"readonly>
                            </div>
                            <button type="submit" class="btn btn-primary">Crear</button>
                        </form>
                        <a href="{{route('facebook_noticias.index')}}" class="btn btn-defaul">Regresar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
@endsection
