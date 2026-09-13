


<!-- DESPLEGANDO TODA LA PLATILLA REALIZADA--->
@extends('layouts.app')

<!-- DESPLEGANDO EL TITULO DE ESTA PAGINA-->
@section('title', 'EDITAR ROLES')

<!-- DESPLEGANDO TODO EL CONTENIDO DE ESTA PAGINA--->
@section('content')
<div class="containe  page_style">
<center>
<h1>ROLES</h1>

</center>
</div>

@if(session('roles')->codigo_rol>=0)
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

                        <form method="post" action="{{ route('roles.update',$matriz['depen']->id) }}">
                            @method('PUT')
                             @csrf

                            <input type="hidden" name="id" value="{{$matriz['depen']->id}}">

                            <div class="form-group">
                                <label for="role_name">Nombres Rol</label>
                                <input type="text" name="role_name" id="role_name" class="form-control"  value="{{ $matriz['depen']->role_name}}" required autofocus>
                            </div>

                            <div class="form-group">
                                <label for="role_code">Nombres Rol</label>
                                <input type="text" name="role_code" id="role_code" class="form-control"  value="{{ $matriz['depen']->role_code}}" required autofocus>
                            </div>


                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </form>
                        <a href="{{route('roles.index')}}" class="btn btn-defaul">Regresar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>




  </tbody>
</table>

</div>
@endif


@endsection
