


<!-- DESPLEGANDO TODA LA PLATILLA REALIZADA--->
@extends('layouts.app')

<!-- DESPLEGANDO EL TITULO DE ESTA PAGINA-->
@section('title', 'EDITAR USUARIO')

<!-- DESPLEGANDO TODO EL CONTENIDO DE ESTA PAGINA--->
@section('content')
<div class="containe  page_style">
<center>
<h1>EDITAR </h1>

</center>



<div class="container ">
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

                        <form method="post" action="{{ route('normativa.update',$datos->id) }}" enctype="multipart/form-data">
                            @method('PUT')
                             @csrf

                            <input type="hidden" name="id" value="{{$datos->id}}">
                            <div class="form-group">
                                <label for="categoria">Selecciona una categoria:</label>
                                <select class="form-control" id="categoria" name="categoria">
                                <option value="{{$datos->categoria }}">{{$datos->categoria }}</option>
                             
                                <option value="REGLAMENTOS INTERNOS">REGLAMENTOS INTERNOS</option>
                                <option value="REGLAMENTOS EXTERNOS">REGLAMENTOS EXTERNOS</option>
                            </select>
                            </div>
                         
                            <div class="form-group">
                                <label for="detalle">Detalle</label>
                                <input type="text" name="detalle" id="detalle" class="form-control" value="{{$datos->detalle}}" >
                            </div>
                        
                            <div class="form-group">
                                <label for="link_normativa">{{$datos->link_normativa }}</label>
                                <input type="file" name="link_normativa" id="link_normativa" class="form-control" >
                            </div>
                           
                            <?php  $user = session('user') ?>
                            <div class="form-group">

                                <input type="hidden" id="id_users" name="id_users" class="form-control" value="<?php echo $user->__get('id');?>"required style="display: none;"readonly>
                            </div>
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </form>
                        <a href="{{route('normativa.index')}}" class="btn btn-defaul">Regresar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>




  </tbody>
</table>
</div>
</div>



@endsection
