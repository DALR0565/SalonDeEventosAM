@can('update', $evento)
@extends('plantillas.clienteEventos')
@section('contenido')
<form action="{{route('eventos.update', $evento)}}" method="post" enctype="multipart/form-data">
    @method('PUT')
    @csrf
  <label for="nombre">Nombre del evento:</label>
  <input type="text" name="nombre" id="nombre" value="{{$evento->nombre}}" class="form-control" required>
  <label for="fecha">Fecha de evento:</label>
  <input type="date" name="fecha" id="fecha" value="{{$evento->fecha}}" class="form-control" required>
  <p class="mensaje" id="fecha-mensaje"></p>
  <label for="hora_de_inicio">Hora de inicio:</label>
  <input type="time" name="hora_de_inicio" id="hora_de_inicio" value="{{$evento->hora_de_inicio}}" class="form-control" required>
  
  <label for="hora_de_cierre">Hora de cierre:</label>
  <input type="time" name="hora_de_cierre" id="hora_de_cierre"  value="{{$evento->hora_de_cierre}}" class="form-control" required>

  <label for="numero_de_invitados">Numero de invitados:</label>
  <input type="number" name="numero_de_invitados" id="numero_de_invitados"  value="{{$evento->numero_de_invitados}}" class="form-control" required>

  <label for="detalles">Detalles:</label>
  <input type="text" name="detalles" id="detalles"  value="{{$evento->detalles}}" class="form-control" required>
@foreach((\App\Models\Paquete::all()) as $paquete)
  <div class="mb-4">
        <label>Paquete: </label>
            @if($evento->paquete_id == $paquete->id)
            <input type="radio" class="form-check-input"  name="paquete_id"  checked="checked" value="{{$paquete->id}}" required>{{$paquete->nombre}}
            @else
            <input type="radio" class="form-check-input"  name="paquete_id" value="{{$paquete->id}}" required>{{$paquete->nombre}}
            @endif
        <div class="paquete text-danger"></div>
    </div>  
@endforeach
<br>

@foreach((\App\Models\Servicio::all()) as $servicio)
  <div class="mb-4">
        <label>Servicio: </label>
            @if($evento->es_contratado($evento->servicios,$servicio->id))
            <input type="checkbox" class="form-check-input"  name="servicio_id[]"  checked="checked" value="{{$servicio->id}}" >{{$servicio->nombre}}            
            @else
            <input type="checkbox" class="form-check-input"  name="servicio_id[]" value="{{$servicio->id}}" >{{$servicio->nombre}}
            @endif
        <div class="paquete text-danger"></div>
    </div>  
@endforeach
    <input type="submit" value="ACTUALIZAR">
</form>

<script>
    var fechasBloqueadas = {!! json_encode($fechasBloqueadas) !!};

    document.addEventListener('DOMContentLoaded', function() {
        var fechaInput = document.getElementById('fecha');

        fechaInput.addEventListener('input', function() {
          var fechaSeleccionada = fechaInput.value;
          var mensajeFecha = document.getElementById('fecha-mensaje');

            if (fechasBloqueadas.includes(fechaSeleccionada)) {
              fechaInput.value = '';
              mensajeFecha.textContent = 'La fecha seleccionada está siendo usada. \nPor favor, selecciona otra fecha.';
            } else {
              mensajeFecha.textContent = '';
            }
        });

        fechaInput.addEventListener('focus', function() {
            fechaInput.min = new Date().toISOString().split('T')[0];
        });

        fechaInput.addEventListener('blur', function() {
            fechaInput.min = '';
        });
    });
</script>

@endsection
@else
<!DOCTYPE html>
<html>
<head>
    <title>No tienes autorización</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            padding: 20px;
            text-align: center;
        }

        h2 {
            color: #ff0000;
        }

        p {
            color: #555555;
        }

        .container {
            background-color: #ffffff;
            border-radius: 5px;
            padding: 20px;
            max-width: 400px;
            margin: 0 auto;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .emoji {
            font-size: 60px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="emoji">❌</div>
        <h2>No tienes autorización</h2>
        <p>No tienes permiso para realizar esta acción.</p>
    </div>
</body>
</html>

@endcan
