@extends('plantillas.gerente')
@section('contenido')
<form action="{{route('servicios.update', $servicio->id)}}" method="post">
    @method('PUT')
    @csrf
    <label for='nombre'>Nombre del servicio</label>
    <input type='text' name='nombre' id='nombre' value="{{$servicio->nombre}}">
    <br>
    <label for='precio'>Precio</label>
    <input type='text' name='precio' id='precio' value="{{$servicio->precio}}">
    <br>
    <label for='detalles'>Detalles del servicio</label>
    <textarea type='text' name='detalles' id='detalles' rows="10" cols="50">{{$servicio->detalles}}</textarea>
    <br>
    <input type="submit" value="ACTUALIZAR">
</form>
@endsection