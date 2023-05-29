@extends('plantillas.gerente')
@section('contenido')
<form action="{{route('clientes.update', $cliente)}}" method="post">
    @method('PUT')
    @csrf
    <label for='nombres'>Nombres</label>
    <input type='text' name='nombres' id='nombres' value="{{$cliente->nombres}}">
    <br>
    <label for='apellidos'>Apellidos</label>
    <input type='text' name='apellidos' id='apellidos' value="{{$cliente->apellidos}}">
    <br>
    <label for='edad'>Edad</label>
    <input type='text' name='edad' id='edad' value="{{$cliente->edad}}">
    <br>
    <label for='sexo'>Sexo</label>
    <input type='text' name='sexo' id='sexo' value="{{$cliente->sexo}}">
    <br>
    <label for='correo'>Correo electronico</label>
    <input type='text' name='correo' id='correo' value="{{$cliente->correo}}">
    <br>
    <label for='clave'>Clave</label>
    <input type='text' name='clave' id='clave' value="{{$cliente->clave}}">
    <br>
    <label for='telefono'>Telefono</label>
    <input type='text' name='telefono' id='telefono' value="{{$cliente->telefono}}">
    <br>
    <input type="submit" value="ACTUALIZAR">
</form>
@endsection