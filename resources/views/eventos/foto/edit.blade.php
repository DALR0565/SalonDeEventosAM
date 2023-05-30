@extends('plantillas.foto')
@section('contenido')
@can('update',$foto)
<form action="{{ route('eventos.fotos.update', [$evento->id, $foto->id ]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <!--<div>
            <label for="imagenes">Imágenes:</label>
            <input type="file" name="imagenes[]" id="imagenes" multiple accept="image/*">
            <div id="preview-container"></div>
        </div>-->
        <div>
            <label for="descripcion">Descripción:</label>
            <textarea name="descripcion" id="descripcion" rows="4" cols="50" required>{{$foto->descripcion}}</textarea>
        </div>

        <button type="submit">Actualizar</button>
    </form>
@else
<h1>No estas autorizado</h1>
@endcan
@endsection