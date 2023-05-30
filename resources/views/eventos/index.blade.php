@extends('empleados.index')
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
    <h1 class="heading">Eventos registrados</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Fecha</th>
                <th>Hora de inicio</th>
                <th>Hora de cierre</th>
                <th>Invitados</th>
                <th>Confirmacion</th>
                <th>Detalles</th>
                <th>Paquete</th>
                <th>Servicios</th>
                <th>Cliente</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        
        @foreach($eventos as $evento) 
            @if(!empty($evento))               
            <tr>
                <td>{{$evento->nombre}}</td>
                <td>{{$evento->fecha}}</td>
                <td>{{$evento->hora_de_inicio}}</td>
                <td>{{$evento->hora_de_cierre}}</td>
                <td>{{$evento->numero_de_invitados}}</td>
                <td>{{$evento->confirmacion}} </td>
                
                <td>{{$evento->detalles}}</td>
                
                <td>{{$evento->paquetes->nombre}}</td>

                <td>@foreach($evento->servicios as $servicio)
                    {{$servicio->nombre}}
                    <br>
                    @endforeach
                </td>
                
                <td>{{$evento->clientes->nombres}}</td>
                @can('create',[App\Models\Abono::class, $evento])
                <td><a href="{{route('eventos.abonos.index', $evento->id)}}" class="btn">Abonar</a>
                @endcan
            </tr>
            @endif
            @endforeach
        </tbody>
    </table>
    </div>
@endsection