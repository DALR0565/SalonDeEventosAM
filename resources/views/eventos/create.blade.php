@extends('plantillas.clienteEventos')
@section('contenido')
@can('create',App\Models\Evento::class)
<form action="{{route('eventos.store')}}" method="post" id="formulario">

  @csrf
  <label for="nombre">Nombre del evento:</label>
  <input type="text" name="nombre" id="nombre" class="form-control">

  <label for="fecha">Fecha de evento:</label>
  <input type="date" name="fecha" id="fecha" class="form-control">

  <label for="hora_de_inicio">Hora de inicio:</label>
  <input type="time" name="hora_de_inicio" id="hora_de_inicio" class="form-control">
  
  <label for="hora_de_cierre">Hora de cierre:</label>
  <input type="time" name="hora_de_cierre" id="hora_de_cierre" class="form-control">

  <label for="numero_de_invitados">Numero de invitados:</label>
  <input type="number" name="numero_de_invitados" id="numero_de_invitados" class="form-control">

  <label for="detalles">Detalles:</label>
  <input type="text" name="detalles" id="detalles" class="form-control">
@foreach((\App\Models\Paquete::all()) as $paquete)
  <div class="mb-4">
        <label>Paquete: </label>
            <input type="radio" class="form-check-input"  name="paquete_id"  value="{{$paquete->id}}" >{{$paquete->nombre}}
        <div class="paquete text-danger"></div>
    </div>  
@endforeach
<br>
@foreach((\App\Models\Servicio::all()) as $servicio)
  <div class="mb-4">
        <label>Servicio: </label>
            <input type="checkbox" class="form-check-input"  name="servicio_id[]"  value="{{$servicio->id}}" >{{$servicio->nombre}}
        <div class="paquete text-danger"></div>
    </div>  
@endforeach
  <input type="submit" value="Guardar"> 
</form>
@endcan
@endsection