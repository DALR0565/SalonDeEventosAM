@extends('plantillas.gerente')
@section('contenido')

<form action="{{route('paquetes.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <label for='nombre'>Nombre del paquete</label>
    <input type='text' name='nombre' id='nombre' required>
    <br>
    <label for='descripcion'>Descripcion</label>
    <textarea type='text' name='descripcion' id='descripcion' rows="10" cols="50" required></textarea>
    <br>
    <label for='precio'>Precio</label>
    <input type='text' name='precio' id='precio' required>
    <br>
    <br>
    <label for='imagen'>Imagen</label>
    <input type='file' name='imagen' id='imagen' required>
    @error('imagen')
        <small>{{$message}}</small>
    @enderror
    <br>
    <br>
    <input type="submit" value="GUARDAR">
</form>
@endsection