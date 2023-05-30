<!DOCTYPE html>
<html>
<head>
    <title>Estado de Cuenta</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            padding: 20px;
        }
        
        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }
        
        h1 {
            text-align: center;
            color: #333;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
        }
        
        table th,
        table td {
            padding: 10px;
            border: 1px solid #ddd;
        }
        
        table th {
            background-color: #f5f5f5;
            font-weight: bold;
        }
        
        .total {
            text-align: right;
            font-weight: bold;
        }
        
        .contract {
            margin-top: 20px;
            font-size: 14px;
            text-align: justify;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Estado de Cuenta</h1>
        <table>
        <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Descripción</th>
                    <th>Cargos</th>
                    <th>Abonos</th>
                </tr>
            </thead>
            <tbody>
                
                <tr>
                    <td>{{$evento->fecha}}</td>
                    <td>{{$evento->descripcion}}</td>
                    
                    <td><label>Paquete: {{$evento->paquetes->nombre}}</label>
                    ${{$evento->paquetes->precio}}
                    <br>
                    <label>Servicios:</label>
                    @foreach($evento->servicios as $servicio)
                        {{$servicio->nombre}} : ${{$servicio->precio}}
                        
                    @endforeach
                    
                    </td>
                    
                    <td>@foreach($abonos as $abono)
                        {{$abono->cantidad}}
                        <br>
                        @endforeach
                    </td>
                </tr>
                
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2" class="total">SubTotal</td>
                    <td>{{$total}}</td>
                    <td>{{$abonado}}</td>
                </tr>
                <tr>
                    <td colspan="3" class="total">Total</td>
                    <td>{{($total-$abonado)}}</td>
                </tr>
            </tfoot>
        </table>
        
        <div class="contract">
            <h2>Contrato</h2>
            <p>Fecha de contratacion: {{$evento->fecha}}</p>
            <p>Hora de entrada: {{$evento->hora_de_inicio}}</p>
            <p>Hora de salida: {{$evento->hora_de_inicio}}</p>
            <p>Proposito: {{$evento->descripcion}}</p>
            <p>Numero de invitados: {{$evento->numero_de_invitados}}</p>
            <p>Paquete contratado: {{$evento->paquetes->nombre}}</p>
            <p>Servicios contratados: 
            @foreach($evento->servicios as $servicio)
                        {{$servicio->nombre}} : {{$servicio->precio}}
                        
                    @endforeach
            </p>
        </div>
        <a href="{{route('miseventos')}}">Regresar</a>
    </div>
</body>
</html>
