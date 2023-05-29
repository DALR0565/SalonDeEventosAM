@extends('plantillas.foto')
@section('contenido')
@can('create',App\Models\Foto::class)
<form action="{{ route('eventos.fotos.store', $evento->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="imagenes">Imágenes:</label>
            <input type="file" name="imagenes[]" id="imagenes" multiple accept="image/*">
            <div id="preview-container"></div>
        </div>

        <div>
            <label for="descripcion">Descripción:</label>
            <textarea name="descripcion" id="descripcion" rows="4" cols="50"></textarea>
        </div>

        <button type="submit">Enviar</button>
    </form>
    <a href="{{route('miseventos')}}">Cancelar</a>
@else
<h1>No estas autorizado</h1>
@endcan
@endsection