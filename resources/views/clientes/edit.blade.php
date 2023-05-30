@extends('plantillas.gerente')
@section('contenido')
<form action="{{route('clientes.update', $cliente)}}" method="post">
    @method('PUT')
    @csrf
    <label for='nombres'>Nombres</label>
    <input type='text' name='nombres' id='nombres' value="{{$cliente->nombres}}" required>
    <br>
    <label for='apellidos'>Apellidos</label>
    <input type='text' name='apellidos' id='apellidos' value="{{$cliente->apellidos}}" required>
    <br>
    <label for='edad'>Edad</label>
    <input type='text' name='edad' id='edad' value="{{$cliente->edad}}" required>
    <br>
    <label for='sexo'>Sexo</label>
    <input type='text' name='sexo' id='sexo' value="{{$cliente->sexo}}" required>
    <br>
    <label for='correo'>Correo electronico</label>
    <input type='text' name='correo' id='correo' value="{{$cliente->correo}}" required>
    <br>
    <label for='clave'>Clave</label>
    <input type='text' name='clave' id='clave' value="{{$cliente->clave}}" required>
    <br>
    <label for='telefono'>Telefono</label>
    <input type='text' name='telefono' id='telefono' value="{{$cliente->telefono}}" required>
    <br>
    <input type="submit" value="ACTUALIZAR">
</form>
@endsection