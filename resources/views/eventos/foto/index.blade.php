<!DOCTYPE html>
<html>
<head>
    <title>Galería de fotos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .gallery {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            grid-gap: 10px;
            padding: 20px;
        }

        .gallery-item {
            position: relative;
            overflow: hidden;
            text-align: center; /* Centrar el texto */
        }

        .gallery-item img {
            display: block;
            width: 100%;
            height: auto;
        }

        .gallery-item-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .gallery-item:hover .gallery-item-overlay {
            opacity: 1;
        }

        .gallery-item-overlay-content {
            text-align: center;
        }

        .gallery-item-title {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .gallery-item-description {
            font-size: 14px;
        }

        .gallery-item-overlay a {
            color: #fff; /* Color del enlace */
            text-decoration: none; /* Quitar subrayado del enlace */
        }
    </style>
</head>
<body>
    <h2>Galería de fotos</h2>
    <h3>Evento: {{$evento->nombre}}</h3>
    <div class="gallery">
    @foreach($evento->fotos as $foto)
    <div class="gallery">
        <div class="gallery-item">
            <img src="{{asset("imagenes/$foto->imagen")}}" alt="Imagen 1">
            <div class="gallery-item-overlay">
                <div class="gallery-item-overlay-content">
                    <!--<h3 class="gallery-item-title">Título de la imagen 1</h3>-->
                    <p class="gallery-item-description">{{$foto->descripcion}}</p>
                    <a href="{{route('eventos.fotos.edit', [$evento->id,$foto->id])}}">Editar</a> <!-- Ejemplo de etiqueta <a> -->
                    @can('delete',$foto)
                    <form action="{{route('eventos.fotos.destroy', [$evento->id,$foto->id])}}" method="post">
                    @method('DELETE')
                    @csrf
                    <input type="submit" value="Eliminar">
                </form>
                @endcan
                </div>
            </div>
        </div>
    </div>
    @endforeach
    </div>
    <a href="{{route('eventos.fotos.create',$evento->id)}}">Agregar imagenes</a>
    <br><br>
    <a href="{{route('miseventos')}}">Regresar</a>
</body>
</html>
