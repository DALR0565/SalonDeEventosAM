@extends('plantillas.gerente')
@section('contenido')
<form action="{{route('gerentes.store')}}" method="post">
    @csrf
    <label for='nombres'>Nombres</label>
    <input type='text' name='nombres' id='nombres' required>
    <br>
    <label for='apellidos'>Apellidos</label>
    <input type='text' name='apellidos' id='apellidos' required>
    <br>
    <label for='edad'>Edad</label>
    <input type='text' name='edad' id='edad' required>
    <br>
    <label for='sexo'>Sexo</label>
    <input type='text' name='sexo' id='sexo' required>
    <br>
    <label for='correo'>Correo electronico</label>
    <input type='text' name='correo' id='correo' required>
    <br>
    <label for='clave'>Clave</label>
    <input type='text' name='clave' id='clave' required>
    <br>
    <label for='telefono'>Telefono</label>
    <input type='text' name='telefono' id='telefono' required>
    <br>
    <input type="submit" value="GUARDAR">
</form>
@endsection