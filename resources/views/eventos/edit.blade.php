@extends('plantillas.cliente')
@section('contenido')
<form action="{{route('eventos.update', $evento_encontrado->id)}}" method="post" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <label for='id'>ID</label>
    <input type='text' name='id' id='id' value="{{$evento_encontrado->id}}">
    <br>
    <label for='evento'>Evento</label>
    <input type='text' name='evento' id='evento' value="{{$evento_encontrado->evento}}">
    <br>
    <label for='precio'>Precio</label>
    <input type='text' name='precio' id='precio' value="{{$evento_encontrado->precio}}">
    <br>
    <label for='descripcion'>Descripcion</label>
    <textarea type='text' name='descripcion' id='descripcion' rows="10" cols="50">{{$evento_encontrado->descripcion}}</textarea>
    <br>
    <label for='imagen'>Subir imagen</label>
    <input type="file" name="imagen" id="imagen" accept="image/*">
    @error('imagen')
        <br>
        <small class="text-danger">Error: Solo se aceptan imagenes</small>
    @enderror
    <br>
    
    <input type="submit" value="ACTUALIZAR">
</form>
@endsection