@extends('plantillas.gerente')
@section('contenido')
<style>
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    body{
        background-color: #3c3f44;
        font-family: sans-serif;
    }
    .table-container{
        padding: 0 10%;
        margin: 40px auto;
    }
    .heading{
        font-size: 40px;
        text-align: center;
        color: #f1f1f1;
        margin-bottom: 40px;
    }
    .table{
        width: 100%;
        border-collapse: collapse;
    }
    .table thead tr th{
        font-size: 14 px;
        font-weight: 600;
        letter-spacing: 0.35px;
        color: azure;
        opacity: 1;
        padding: 12px;
        vertical-align: top;
        border: 1px solid #dee2e685;
    }
    .table tbody tr td{
        font-size: 14px;
        letter-spacing: 0.35px;
        font-weight: normal;
        color: #f1f1f1;
        background-color: #3c3f44;
        padding: 8px;
        text-align: center;
        border: 1px solid #dee2e685;
    }
    .table .text_open{
        font-size: 14px;
        font-weight: bold;
        letter-spacing: 0.35px;
        color: #FF1046;
    }
    .table .tbody tr td .btn{
        width: 130px;
        text-decoration: none;
        line-height: 35px;
        display: inline-block;
        background-color: #FF1046;
        font-weight: medium;
        color: azure;
        text-align: center;
        vertical-align: middle;
        user-select: none;
        border: 1px solid transparent;
        font-size: 14px;
        opacity: 1;
    }
</style>

<div class="table-container">
    <h1 class="heading">Empleados registrados</h1>
    {{--@dump($empleados)--}}
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Edad</th>
                <th>Sexo</th>
                <th>Correo electronico</th>
                <th>Clave</th>
                <th>Telefono</th>
                   <!--<th>Rol del usuario</th>-->
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        
        @foreach($gerentes as $gerente)         {{-- Recorremos los arreglos creados en el arreglo--}}
            @if(!empty($gerente))               {{-- Verificamos que el array no este vacio--}}
            <tr>
                <td>{{$gerente->id}}</td>
                <td>{{$gerente->nombres}}</td>
                <td>{{$gerente->apellidos}}</td>
                <td>{{$gerente->edad}}</td>
                <td>{{$gerente->sexo}}</td>
                <td>{{$gerente->correo}}</td>
                <td>{{$gerente->clave}}</td>
                <td>{{$gerente->telefono}}</td>
                   <!--<td>{{$gerente->rol}}</td>-->
                <td><a href="{{route('gerentes.edit', $gerente->id)}}" class="btn">Actualizar</a>
                <form action="{{route('gerentes.destroy', $gerente->id)}}" method="post">
                            @method('DELETE')
                            @csrf
                            <input class="btn" type="submit" value="BORRAR">
                        </form>
                </td>
            </tr>
            @endif
            @endforeach
        </tbody>
    </table>
    <a class="btn" href="{{route('gerentes.create')}}">Agregar nuevo gerente</a>
    </div>
@endsection