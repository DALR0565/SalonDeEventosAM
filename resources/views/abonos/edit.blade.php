@extends('plantillas.empleado')
@section('contenido')
<form action="{{route('abonos.update', $abono_encontrado->id)}}" method="post">
    @method('PUT')
    @csrf
    <label for='id'>ID</label>
    <input type='text' name='id' id='id' value="{{$abono_encontrado->id}}">
    <br>
    <label for='servicio'>Servicio</label>
    <input type='text' name='servicio' id='servicio' value="{{$abono_encontrado->servicio}}">
    <br>
    <label for='precio'>Precio</label>
    <input type='text' name='precio' id='precio' value="{{$abono_encontrado->precio}}">
    <br>
    <label for='cantidad_abonada'>Cantidad abonada</label>
    <input type='text' name='cantidad_abonada' id='cantidad_abonada' value="{{$abono_encontrado->cantidad_abonada}}">
    <br>
    <input type="submit" value="ACTUALIZAR">
</form>
@endsection