@extends('empleados.index')
@section('contenido')
<form action="{{route('abonos.update', $abono)}}" method="post">
    @method('PUT')
    @csrf
    <label for='cantidad'>Cantidad abonada</label>
    <input type='text' name='cantidad' id='cantidad' value="{{$abono->cantidad}}">
    <br>
    <label for='descripcion'>Descripcion</label>
    <input type='text' name='descripcion' id='descripcion' value="{{$abono->descripcion}}">
    <br>
    <input type="submit" value="ACTUALIZAR">
</form>
@endsection