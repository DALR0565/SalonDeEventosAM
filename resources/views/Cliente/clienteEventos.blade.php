<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Salon de eventos</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <!-- <link rel="stylesheet" href="{{ asset('estilos/styleanonimo.css') }}"> -->
        <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"
/>
    </head>
<body>
<form action="{{route('eventos.store')}}" method="post" id="formulario">

  @csrf
  <label for="nombre">Nombre del evento:</label>
  <input type="text" name="nombre" id="nombre" class="form-control">

  <label for="fecha">Fecha de evento:</label>
  <input type="date" name="fecha" id="fecha" class="form-control">

  <label for="hora_inicio">Hora de inicio:</label>
  <input type="time" name="hora_de_inicio" id="hora_inicio" class="form-control">
  
  <label for="hora_cierre">Hora de cierre:</label>
  <input type="time" name="hora_de_cierre" id="hora_cierre" class="form-control">

  <label for="numero_de_invitados">Numero de invitados:</label>
  <input type="text" name="numero_de_invitados" id="numero_de_invitados" class="form-control">

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
            <input type="checkbox" class="form-check-input"  name="id"  value="{{$servicio->id}}" >{{$servicio->nombre}}
        <div class="paquete text-danger"></div>
    </div>  
@endforeach
  <input type="submit" value="Guardar"> 
</form>
</body>

<style>

*{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
  background-color: rgba(255, 209, 220, 0.8);
  background-image: radial-gradient(circle at 50% -20.71%, #ffd1dc 0, #ffb6c1 6.25%, #ff9ba6 12.5%, #ff7e8c 18.75%, #ff5f73 25%, #ff3e5b 31.25%, #ff1c44 37.5%, #ff0031 43.75%, #e6002e 50%, #cc002a 56.25%, #b30027 62.5%, #990023 68.75%, #80001f 75%, #66001c 81.25%, #4c0018 93.5%, #330015 98.75%, #190011 100%);
}



    form {
  margin: 20px auto;
  width: 400px;
  padding: 20px;
  background-color: #f2f2f2;
  border-radius: 5px;
}

label {
  display: block;
  margin-bottom: 5px;
}

input[type='text'] {
  width: 100%;
  padding: 8px;
  margin-bottom: 10px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type='submit'] {
    
  background-color: #4CAF50;
  color: white;
  padding: 10px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type='submit']:hover {
  background-color: #45a049;
}

</style>