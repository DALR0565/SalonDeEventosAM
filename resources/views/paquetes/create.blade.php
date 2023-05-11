@extends('plantillas.gerente')
@section('contenido')
<form action="{{route('paquetes.store')}}" method="post">
    @csrf
    <label for='nombre'>Nombre del paquete</label>
    <input type='text' name='nombre' id='nombre'>
    <br>
    <label for='descripcion'>Descripcion</label>
    <textarea type='text' name='descripcion' id='descripcion' rows="10" cols="50"></textarea>
    <br>
    <label for='precio'>Precio</label>
    <input type='text' name='precio' id='precio'>
    <br>
    <input type="submit" value="GUARDAR">
</form>
@endsection