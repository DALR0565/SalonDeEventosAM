@extends('plantillas.empleado')
@section('contenido')
<form action="{{route('abonos.store')}}" method="post">
    @csrf
    <label for='id'>ID</label>
    <input type='text' name='id' id='id'>
    <br>
    <label for='servicio'>Servicio</label>
    <input type='text' name='servicio' id='servicio'>
    <br>
    <label for='precio'>Precio</label>
    <input type='text' name='precio' id='precio'>
    <br>
    <label for='cantidad_abonada'>Cantidad a abonar</label>
    <input type='text' name='cantidad_abonada' id='cantidad_abonada'>
    <br>
    <input type="submit" value="GUARDAR">
</form>
@endsection