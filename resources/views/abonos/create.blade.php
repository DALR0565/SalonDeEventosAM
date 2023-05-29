@extends('empleados.index')
@section('contenido')
<form action="{{route('abonos.store')}}" method="post">
    @csrf
    <label>Evento: </label>
    @foreach(App\Models\Evento::all() as $evento)
    <div class="mb-4">
            <input type="radio" class="form-check-input"  name="evento_id"  value="{{$evento->id}}" >{{$evento->nombre}}
        <div class="paquete text-danger"></div>
    </div>
    @endforeach
    <label for='cantidad'>Cantidad a abonar</label>
    <input type='number' name='cantidad' id='cantidad'>
    <br>
    <label for='cantidad'>Descripcion</label>
    <input type='text' name='descripcion' id='descripcion'>
    <br>
    <input type="submit" value="GUARDAR">
</form>
@endsection