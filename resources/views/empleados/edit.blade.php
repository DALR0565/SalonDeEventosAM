@extends('plantillas.gerente')
@section('contenido')
<form action="{{route('empleados.update', $empleado)}}" method="post">
    @method('PUT')
    @csrf
    <label for='nombres'>Nombres</label>
    <input type='text' name='nombres' id='nombres' value="{{$empleado->nombres}}">
    <br>
    <label for='apellidos'>Apellidos</label>
    <input type='text' name='apellidos' id='apellidos' value="{{$empleado->apellidos}}">
    <br>
    <label for='edad'>Edad</label>
    <input type='text' name='edad' id='edad' value="{{$empleado->edad}}">
    <br>
    <label for='sexo'>Sexo</label>
    <input type='text' name='sexo' id='sexo' value="{{$empleado->sexo}}">
    <br>
    <label for='correo'>Correo electronico</label>
    <input type='text' name='correo' id='correo' value="{{$empleado->correo}}">
    <br>
    <label for='clave'>Clave</label>
    <input type='text' name='clave' id='clave' value="{{$empleado->clave}}">
    <br>
    <label for='telefono'>Telefono</label>
    <input type='text' name='telefono' id='telefono' value="{{$empleado->telefono}}">
    <br>
    <input type="submit" value="ACTUALIZAR">
</form>
@endsection