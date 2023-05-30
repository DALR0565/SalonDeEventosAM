@extends('plantillas.clienteEventos')
@section('contenido')
@can('create',App\Models\Evento::class)
<form action="{{route('eventos.store')}}" method="post" id="formulario">

  @csrf
  <label for="nombre">Nombre del evento:</label>
  <input type="text" name="nombre" id="nombre" class="form-control" required>
  <label for="fecha">Fecha de evento:</label>
  <input type="date" name="fecha" id="fecha" class="form-control" required>
  <p class="mensaje" id="fecha-mensaje"></p>
  <label for="hora_de_inicio">Hora de inicio:</label>
  <input type="time" name="hora_de_inicio" id="hora_de_inicio" class="form-control" required>
  
  <label for="hora_de_cierre">Hora de cierre:</label>
  <input type="time" name="hora_de_cierre" id="hora_de_cierre" class="form-control" required>

  <label for="numero_de_invitados">Numero de invitados:</label>
  <input type="number" name="numero_de_invitados" id="numero_de_invitados" class="form-control" min="5">

  <label for="detalles">Detalles:</label>
  <input type="text" name="detalles" id="detalles" class="form-control" required>
  <label>Paquetes: </label>
@foreach((\App\Models\Paquete::all()) as $paquete)
  <div class="mb-4">
            <input type="radio" class="form-check-input"  name="paquete_id"  value="{{$paquete->id}}" required>{{$paquete->nombre}}
        <div class="paquete text-danger"></div>
    </div>  
@endforeach
<br>
<label>Servicios: </label>
@foreach((\App\Models\Servicio::all()) as $servicio)
  <div class="mb-4">
        
            <input type="checkbox" class="form-check-input"  name="servicio_id[]"  value="{{$servicio->id}}">{{$servicio->nombre}}
        <div class="paquete text-danger"></div>
    </div>  
@endforeach
  <input type="submit" value="Guardar"> 
</form>
<a href="{{route('miseventos')}}">Regresar</a>
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
@endcan
@endsection