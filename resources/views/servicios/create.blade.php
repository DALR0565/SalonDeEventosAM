@extends('plantillas.gerente')
@section('contenido')
<form action="{{route('servicios.store')}}" method="post">
    @csrf
    <label for='nombre'>Nombre del servicio</label>
    <input type='text' name='nombre' id='nombre'>
    <br>
    <label for='precio'>Precio</label>
    <input type='text' name='precio' id='precio'>
    <br>
    <label for='detalles'>Detalles del servicio</label>
    <textarea type='text' name='detalles' id='detalles' rows="10" cols="50"></textarea>
    <br>
    <input type="submit" value="GUARDAR">
</form>
@endsection