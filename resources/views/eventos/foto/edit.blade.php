@extends('plantillas.foto')
@section('contenido')
<form action="{{ route('eventos.fotos.update', [$evento->id, $foto->id ]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="imagenes">Imágenes:</label>
            <input type="file" name="imagenes[]" id="imagenes" multiple accept="image/*">
            <div id="preview-container"></div>
        </div>

        <div>
            <label for="descripcion">Descripción:</label>
            <textarea name="descripcion" id="descripcion" rows="4" cols="50">{{$foto->descripcion}}</textarea>
        </div>

        <button type="submit">Actualizar</button>
    </form>
@endsection