@extends('empleados.index')
@section('contenido')
<form action="{{route('eventos.abonos.update', [$evento->id, $abono->id])}}" method="post">
    @method('PUT')
    @csrf
    <label for='cantidad'>Cantidad abonada</label>
    <input type='text' name='cantidad' id='cantidad' value="{{$abono->cantidad}}" required>
    <br>
    <label for='descripcion'>Descripcion</label>
    <input type='text' name='descripcion' id='descripcion' value="{{$abono->descripcion}}" required>
    <br>
    <input type="submit" value="ACTUALIZAR">
</form>
@endsection