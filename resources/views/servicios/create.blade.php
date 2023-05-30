@extends('plantillas.gerente')
@section('contenido')
<form action="{{route('servicios.store')}}" method="post">
    @csrf
    <label for='nombre'>Nombre del servicio</label>
    <input type='text' name='nombre' id='nombre' required>
    <br>
    <label for='precio'>Precio</label>
    <input type='text' name='precio' id='precio' required>
    <br>
    <label for='detalles'>Detalles del servicio</label>
    <textarea type='text' name='detalles' id='detalles' rows="10" cols="50" required></textarea>
    <br>
    <input type="submit" value="GUARDAR">
</form>
@endsection