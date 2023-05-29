@extends('plantillas.empleado')
@section('contenido')
<form action="{{route('gastos.store')}}" method="post">
    @csrf
    <label for='cantidad'>Cantidad a abonar</label>
    <input type='text' name='cantidad' id='cantidad'>
    <br>
    <label for='cantidad'>Descripcion</label>
    <input type='text' name='descripcion' id='descripcion'>
    <br>
    <input type="submit" value="GUARDAR">
</form>
@endsection