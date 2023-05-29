<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gerente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('estilos/style.css') }}">
  </head>
  <style type="text/css">
    .scrolls{
        overflow-x: scroll; 
        overflow-y: scroll; 
        width: 1500px; 
        height: 745px;
}
</style>

  <body>
    <div class="d-flex">
        <div id="sidebar-container" class="bg-primary">
            <div class="logo">
                <h4 class="text-light">Gerente</h4>
            </div>
            <div class="menu">
                <h3 class="d-block text-light p-3">Tablero</h3>
                <a href="{{route('clientes.index')}}" class="d-block text-light p-3"><i class="icon ion-md-contacts mr-2 lead"></i>Clientes</a>
                <a href="{{route('gerentes.index')}}" class="d-block text-light p-3"><i class="icon ion-md-contacts mr-2 lead"></i>Gerentes</a>
                <a href="{{route('empleados.index')}}" class="d-block text-light p-3"><i class="icon ion-md-contacts mr-2 lead"></i>Empleados</a>
                <a href="{{route('paquetes.index')}}" class="d-block text-light p-3"><i class="icon ion-md-calendar mr-2 lead"></i>Paquetes</a>
                <a href="{{route('servicios.index')}}" class="d-block text-light p-3"><i class="icon ion-md-clipboard mr-2 lead"></i>Servicios</a>
                <a href="{{route('eventos.index')}}" class="d-block text-light p-3"><i class="icon ion-md-clipboard mr-2 lead"></i>Eventos</a>
                <a href="{{route('cerrarsesion')}}" class="d-block text-light p-3"><i class="icon ion-md-exit mr-2 lead"></i>Cerrar sesion</a>
            </div>
        </div>
        <div class="scrolls">
            @yield('contenido')
        </div>
        
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
</body>
</html>