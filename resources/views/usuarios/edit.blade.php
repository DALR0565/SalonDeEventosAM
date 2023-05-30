@extends('plantillas.gerente')
@section('contenido')
<form action="{{route('usuarios.update', $usuario->id)}}" method="post">
    @method('PUT')
    @csrf
    <label for='nombres'>Nombres</label>
    <input type='text' name='nombres' id='nombres' value="{{$usuario->nombres}}">
    <br>
    <label for='apellidos'>Apellidos</label>
    <input type='text' name='apellidos' id='apellidos' value="{{$usuario->apellidos}}">
    <br>
    <label for='edad'>Edad</label>
    <input type='text' name='edad' id='edad' value="{{$usuario->edad}}">
    <br>
    <label for='sexo'>Sexo</label>
    <input type='text' name='sexo' id='sexo' value="{{$usuario->sexo}}">
    <br>
    <label for='correo'>Correo electronico</label>
    <input type='text' name='correo' id='correo' value="{{$usuario->correo}}">
    <br>
    <label for='clave'>Clave</label>
    <input type='text' name='clave' id='clave' value="{{$usuario->clave}}">
    <br>
    <label for='telefono'>Telefono</label>
    <input type='text' name='telefono' id='telefono' value="{{$usuario->telefono}}">
    <br>
    <input type="submit" value="ACTUALIZAR">
</form>
@endsection