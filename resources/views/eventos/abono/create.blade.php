@extends('empleados.index')
@section('contenido')
@can('create',[App\Models\Abono::class, $evento])
<form action="{{ route('eventos.abonos.store', $evento->id) }}" method="post">
    @csrf
    <label>Evento: {{$evento->nombre}}</label>
    <label for='cantidad'>Cantidad a abonar</label>
    <input type='number' name='cantidad' id='cantidad' required>
    <br>
    <label for='cantidad'>Descripcion</label>
    <input type='text' name='descripcion' id='descripcion' required>
    <br>
    <input type="submit" value="GUARDAR">
</form>
@endcan
@endsection