


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

<form method="post" action="{{ route('proyectos.update',$datos->id) }}" enctype="multipart/form-data">
@method('PUT')
@csrf

<input type="hidden" name="id" value="{{$datos->id}}">

<div class="form-group">
<label for="tipo_trabajo">Selecciona una categoria:</label>
<select class="form-control" id="tipo_trabajo" name="tipo_trabajo">
<option value="{{$datos->tipo_trabajo }}">{{$datos->tipo_trabajo }}</option>
<option value="Artículos Científicos">Artículos Científicos</option>
<option value="Proyectos">Proyectos</option>
</select>
</div>
<div class="form-group">
<label for="name_py">Titulo</label>
<input type="text" name="name_py" id="name_py" class="form-control" value="{{$datos->name_py}}" placeholder="" required autofocus>
</div>
<div class="form-group">
<label for="detalle_py">Descripción</label>
<input type="text" name="detalle_py" id="detalle_py" class="form-control" value="{{$datos->detalle_py}}" required autofocus>
</div>
<div class="form-group " >
<label for="img_autor">Foto autor (Opcional)</label>
<input type="file" name="img_autor" class="form-control">
</div>


<div class="form-group mb-3">
<label for="detalle_py">{{$datos->link_py}}</label><br>
<label><strong>Tipo de documento:</strong></label><br>
<div class="form-check form-check-inline">
<input class="form-check-input" type="radio" name="tipo_input" id="tipo_link" value="link" checked onchange="toggleInput()">
<label class="form-check-label" for="tipo_link">Link</label>
</div>
<div class="form-check form-check-inline">
<input class="form-check-input" type="radio" name="tipo_input" id="tipo_archivo" value="archivo" onchange="toggleInput()">
<label class="form-check-label" for="tipo_archivo">Archivo</label>
</div>
</div>

<!-- Input de Link -->
<div class="form-group" id="link_input">
<label for="link_py">Link</label>
<input type="text" name="link_py" class="form-control" placeholder="https://..." autofocus>
</div>

<!-- Input de Archivo -->
<div class="form-group d-none" id="file_input">
<label for="file_proyect">Archivo</label>
<input type="file" name="file_proyect" class="form-control">
</div>

<!-- Script para mostrar/ocultar -->
<script>
function toggleInput() {
const isLink = document.getElementById('tipo_link').checked;
document.getElementById('link_input').classList.toggle('d-none', !isLink);
document.getElementById('file_input').classList.toggle('d-none', isLink);
}
</script>
<?php  $user = session('user') ?>
<div class="form-group">

<input type="hidden" id="id_users" name="id_users" class="form-control" value="<?php echo $user->__get('id');?>"required style="display: none;"readonly>
</div>
<button type="submit" class="btn btn-primary">Actualizar</button>
</form>
<a href="{{route('proyectos.index')}}" class="btn btn-defaul">Regresar</a>
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
