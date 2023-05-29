@extends('plantillas.gerente')
@section('contenido')
<form action="{{route('gerentes.store')}}" method="post">
    @csrf
    <label for='nombres'>Nombres</label>
    <input type='text' name='nombres' id='nombres'>
    <br>
    <label for='apellidos'>Apellidos</label>
    <input type='text' name='apellidos' id='apellidos'>
    <br>
    <label for='edad'>Edad</label>
    <input type='text' name='edad' id='edad'>
    <br>
    <label for='sexo'>Sexo</label>
    <input type='text' name='sexo' id='sexo'>
    <br>
    <label for='correo'>Correo electronico</label>
    <input type='text' name='correo' id='correo'>
    <br>
    <label for='clave'>Clave</label>
    <input type='text' name='clave' id='clave'>
    <br>
    <label for='telefono'>Telefono</label>
    <input type='text' name='telefono' id='telefono'>
    <br>
    <input type="submit" value="GUARDAR">
</form>
@endsection