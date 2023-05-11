@extends('plantillas.empleado')
@section('contenido')
<table>
	<thead>
		<tr>
			<th>ID</th>
			<th>Servicio</th>
			<th>Precio</th>
			<th>Cantidad abonada</th>
		</tr>
			</thead>
            @foreach($abonos as $abono)
            @if(!empty($abono))
			    <tr>
				    <td>{{$abono[0]}}</td><td>{{$abono[1]}}</td><td>{{$abono[2]}}</td><td>{{$abono[3]}}</td>
		        </tr>
            @endif
            @endforeach
            <a class="btn" href="{{route('abonos.create')}}">Agregar abono</a>
</table>
@endsection