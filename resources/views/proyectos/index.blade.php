
<!-- DESPLEGANDO TODA LA PLATILLA REALIZADA--->
@extends('layouts.app')

<!-- DESPLEGANDO EL TITULO DE ESTA PAGINA-->
@section('title', 'PROYECTO')

<!-- DESPLEGANDO TODO EL CONTENIDO DE ESTA PAGINA--->
@section('content')
<div class="scrollable-div"> 
<div class="containe  page_style">
<center>
<h1>Proyectos</h1>

</center>
</div>
<br>
<div class="container"> 
                       @if(session('error'))
                             <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif
<form method="GET"  action="{{route('searchproyectos')}}" >
    @csrf
    <div class="form-group">
  <input type="text" name="name_py" placeholder="name_py"class="form-control" >
    </div>

    <!-- Agrega más campos de filtro según tus necesidades -->
    <button type="submit" class="btn btn-info"><i class="bi bi-search"></i></button>
</form>

<a href="{{route('proyectos.create')}} " class="btn btn-primary"> Create <i class="ri-add-circle-line"></i></a>


<!--<button onclick="imprimirDiv()" class="btn btn-success">Imprimir</button>-->


<div class="container "id="reportid">
<table class="table boder_bar btn_modulos">
  <thead>
    <tr>
      <th>ID</th>
      <th>Categoria</th>
      <th>Titulo</th>
      <th>Descripcion</th>
      <th>Imagen de Autor</th>
      <th>link</th>
      <th>Editar</th>
     <th>Eliminar</th>
    </tr>
  </thead>
  <tbody>
    @foreach($datos as $dato)
    
    <tr>
    <td><input type="text" value="{{ $dato['id'] }}"> </td>
    <td><input type="text" value="{{ $dato['tipo_trabajo'] }}"> </td>
      <td><input type="text" value="{{ $dato['name_py'] }}"> </td>
      <td><input type="text" value=" {{ $dato['detalle_py'] }}"></td>
      <td><img src="../../{{ $dato['img_autor'] }}" alt="Profile" class="rounded-circle img_tablerd" style="width:50px;"></td>
      <td><input type="text" value=" {{ $dato['link_py'] }}"></td>
      <td><a  class="btn btn-primary" href="{{route('proyectos.edit',$dato['id'])}}">EDIT<i class="ri-edit-box-line"></i></a></td>
    

      <td>
        <form class="deleteForm" action="{{route('proyectos.destroy',$dato['id'])}}" id_eliminar="{{$dato['id']}}"method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger"><i class="ri-chat-delete-fill"></i>DELETE</button>
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
</div>