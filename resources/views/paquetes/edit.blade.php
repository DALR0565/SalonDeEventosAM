@extends('plantillas.gerente')
@section('contenido')
<form action="{{route('paquetes.update', $paquete->id)}}" method="post">
    @csrf
    @method('PUT')
    <label for='nombre'>Nombre del paquete</label>
    <input type='text' name='nombre' id='nombre' value="{{$paquete->nombre}}">
    <br>
    <label for='descripcion'>Descripcion</label>
    <textarea type='text' name='descripcion' id='descripcion' rows="10" cols="50">{{$paquete->descripcion}}</textarea>
    <br>
    <label for='precio'>Precio</label>
    <input type='text' name='precio' id='precio' value="{{$paquete->precio}}">
    <br>
    <input type="submit" value="Actualizar">
</form>
@endsection