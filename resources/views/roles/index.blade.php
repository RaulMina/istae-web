<!-- DESPLEGANDO TODA LA PLATILLA REALIZADA--->
@extends('layouts.app')

<!-- DESPLEGANDO EL TITULO DE ESTA PAGINA-->
@section('title', 'ROLES')

<!-- DESPLEGANDO TODO EL CONTENIDO DE ESTA PAGINA--->
@section('content')
<div class="scrollable-div"> 
<div class="containe  page_style">
    <center>
        <h1>ROLES</h1>
  
    </center>
</div>
<br>
<form method="GET"  action="{{route('searchrole')}}" >
    @csrf
    <div class="form-group">

        <input type="text" name="filtro_nombre" placeholder="Nombre del Rol"class="form-control" >
    </div>

    <!-- Agrega más campos de filtro según tus necesidades -->
    <button type="submit" class="btn btn-info"><i class="bi bi-search"></i></button>
</form>
<a href="{{route('roles.create')}} " class="btn btn-primary">  <i class="ri-add-circle-line"></i></a>



<div class="container "id="reportid">
    <table class="table boder_bar btn_modulos">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre Rol</th>
                <th>Codigo Rol</th>
                <th>Editar</th>
                <th>Eliminar</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach($datos as $dato)
         
            <tr>
                <td>{{ $dato['id'] }}</td>
                <td>{{ $dato['role_name'] }}</td>
                <td>{{ $dato['role_code']}}</td>

      
                <td><a  class="btn btn-primary" href="{{route('roles.edit',$dato['id'])}}"><i class="ri-edit-box-line"></i></a></td>

      <td>
        <form class="deleteForm" action="{{route('roles.destroy',$dato['id'])}}" id_eliminar="{{$dato['id']}}"method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger"><i class="ri-chat-delete-fill"></i></button>
        </form>
     </td>
            </tr>
      
            @endforeach
        </tbody>
    </table>
    {{ $datos->links() }}
</div>


</div>
@endsection
