@extends('plantillas.gerente')
@section('contenido')
@can('update',$paquete)
<form action="{{route('paquetes.update', $paquete)}}" method="post" enctype="multipart/form-data">
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
@endcan
@endsection