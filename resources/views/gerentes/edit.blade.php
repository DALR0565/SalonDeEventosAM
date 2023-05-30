@extends('plantillas.gerente')
@section('contenido')
<form action="{{route('gerentes.update', $gerente)}}" method="post">
    @method('PUT')
    @csrf
    <label for='nombres'>Nombres</label>
    <input type='text' name='nombres' id='nombres' value="{{$gerente->nombres}}" required>
    <br>
    <label for='apellidos'>Apellidos</label>
    <input type='text' name='apellidos' id='apellidos' value="{{$gerente->apellidos}}" required>
    <br>
    <label for='edad'>Edad</label>
    <input type='text' name='edad' id='edad' value="{{$gerente->edad}}" required>
    <br>
    <label for='sexo'>Sexo</label>
    <input type='text' name='sexo' id='sexo' value="{{$gerente->sexo}}" required>
    <br>
    <label for='correo'>Correo electronico</label>
    <input type='text' name='correo' id='correo' value="{{$gerente->correo}}" required>
    <br>
    <label for='clave'>Clave</label>
    <input type='text' name='clave' id='clave' value="{{$gerente->clave}}" required>
    <br>
    <label for='telefono'>Telefono</label>
    <input type='text' name='telefono' id='telefono' value="{{$gerente->telefono}}" required>
    <br>
    <input type="submit" value="ACTUALIZAR">
</form>
@endsection