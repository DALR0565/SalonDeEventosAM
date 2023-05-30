@extends('plantillas.clientedahsboard')
@section('contenido')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Open+Sans|Roboto');
        html, body{
            margin: 0;
            padding: 0;
        }
        body{
            width: 100%;
            height: 100%;
            font-family: sans-serif;
            letter-spacing: 0.03em;
            line-height: 1.6;
            font-family: 'Open Sans', sans-serif;
        }
        .title{
            text-align: center;
            font-size: 40px;
            color: #6a6a6a;
            margin-top: 100px;
            font-weight: 100;
            font-family: 'Roboto', sans-serif;
        }
        .subtitle{
            text-align: center;
            font-size: 40px;
            color: #6a6a6a;
            font-family: 'Roboto', sans-serif;
        }
        .container{
            width: 100%;
            max-width: 1200px;
            height: 430px;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            margin: auto;
        }
        .container .card{
            width: 330px;
            height: 650px;
            border-radius: 8px;
            box-shadow: 0 2px 2px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            margin: 20px;
            text-align: center;
            transition: all 0.25s;
        }
        .container .card:hover{
            transform: translateY(-15px);
            box-shadow: 0 12px 16px rgba(0, 0, 0, 0.2);
        }
        .container .card img{
            width: 330px;
            height: 220px;
        }
        .container .card h4{
            font-weight: 600;
        }
        .container .card p{
            padding: 0 1rem;
            font-size: 16px;
            font-weight: 300;
        }
        .container .card a {
            font-weight: 500;
            text-decoration: none;
            color: #3498db;
        }
    </style>
        @if(Auth::user()->sexo == "Mujer")
        <h1 class="title">Bienvenida {{Auth::user()->nombres}} estos son tus eventos</h1>
        @else
        <h1 class="subtitle">Bienvenido {{Auth::user()->nombres}} estos son tus eventos</h1>
        @endif
        
        <h1 class="subtitle">Confirmados</h1>

        <div class="container">
        @foreach(Auth::user()->eventos as $evento)
        @if($evento->confirmacion == "Confirmado")
        <div class="card">
        @php
            $foto = $evento->fotos()->find(1);
        @endphp
            @if(!empty($evento->fotos()->find(1)))
                <img src="{{asset("imagenes/$foto->imagen")}}" alt="">
            @else
                <img>
            @endif
            <p>{{$evento->nombre}}</p>
            <p>Fecha: {{$evento->fecha}}<br>Hora de inicio: {{$evento->hora_de_inicio}}<br>Hora de cierre: {{$evento->hora_de_cierre}}</p>
            <p>Numero de invitados: {{$evento->numero_de_invitados}}</p>
            <p>Status: <FONT COLOR="green">{{$evento->confirmacion}} </FONT></p>
            <p>Detalles: {{$evento->detalles}}</p>
            
            <p>Paquete contratado: {{$evento->paquetes->nombre}}</p>
            <p>Servicios contratados: 
                @foreach($evento->servicios as $servicio)
                    {{$servicio->nombre}}
                @endforeach
            </p>
            <p>
                <a  href="{{route('eventos.fotos.index',$evento->id)}}">Galería de fotos</a>
            </p>
            <p>
                <a  href="{{route('contrato')}}">Ver contrato</a>
            </p>
        </div>
        @endif
        @endforeach
        </div>
        

        <br><br><br><br><br><br><br><br><br><br><br><br>
        <h1 class="subtitle">Pendientes</h1>
        <div class="container">
        @foreach(Auth::user()->eventos as $evento)
        @if($evento->confirmacion == "Pendiente")
        <div class="card">
            <img>
            <p>{{$evento->nombre}}</p>
            <p>Fecha: {{$evento->fecha}}<br>Hora de inicio: {{$evento->hora_de_inicio}}<br>Hora de cierre: {{$evento->hora_de_cierre}}</p>
            <p>Numero de invitados: {{$evento->numero_de_invitados}}</p>
            <p>Status: <FONT COLOR="red">{{$evento->confirmacion}} </FONT></p>
            <p>Detalles: {{$evento->detalles}}</p>
            <p>Paquete contratado: {{$evento->paquetes->nombre}}</p>
            <p>Servicios contratados: 
                @foreach($evento->servicios as $servicio)
                    {{$servicio->nombre}}
                    <br>
                @endforeach
            </p>
            @can('update', $evento)
            <a href="{{route('eventos.edit', $evento)}}">Modificar</a>
            @endcan
            @can('delete', $evento)
            <form action="{{route('eventos.destroy', $evento)}}" method="post">
                @method('DELETE')
                @csrf
                <input class="btn" type="submit" value="Eliminar">
            </form>
            @endcan
        </div>
        @endif
        @endforeach
        </div>
@endsection