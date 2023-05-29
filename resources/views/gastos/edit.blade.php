@extends('plantillas.empleado')
@section('contenido')
<form action="{{route('gastos.update', $gasto)}}" method="post">
    @method('PUT')
    @csrf
    <label for='cantidad'>Cantidad abonada</label>
    <input type='text' name='cantidad' id='cantidad' value="{{$gasto->cantidad}}">
    <br>
    <label for='descripcion'>Descripcion</label>
    <input type='text' name='descripcion' id='descripcion' value="{{$gasto->descripcion}}">
    <br>
    <input type="submit" value="ACTUALIZAR">
</form>
@endsection