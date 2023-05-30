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
                {{--@foreach()--}}
                <tr>
                    <td>{{--fecha--}}</td>
                    <td>{{--descripcion--}}</td>
                    <td>{{--cargos--}}</td>
                    <td>{{--abonos--}}</td>
                </tr>
                {{--@endforeach--}}
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2" class="total">Total</td>
                    <td>$130.00</td>
                    <td>$100.00</td>
                </tr>
            </tfoot>
        </table>
        
        <div class="contract">
            <h2>Contrato</h2>
            <p>Fecha de contratacion: </p>
            <p>Hora de entrada: </p>
            <p>Hora de salida: </p>
            <p>Proposito: </p>
            <p>Numero de invitados: </p>
            <p>Paquete contratado: </p>
            <p>Servicios contratados: 
            {{--@foreach()--}}
                
            {{--@endforeach--}}
            </p>
        </div>
    </div>
</body>
</html>
