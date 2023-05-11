<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
  <!-- Inician estilos de css-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Link para el estilo-->
    <link rel="stylesheet" href="css/estilos.css">



    <title>Inicio de sesión</title>

<!-- JQuery-->
    <script
  src="https://code.jquery.com/jquery-3.6.3.min.js"
  integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU="
  crossorigin="anonymous"></script>

<!-- Link para sweetAlert-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<style>
  body{
    background-image: url(../img/shop2.jpg);
    background-repeat: no-repeat;
    background-size: cover;
    background-attachment: fixed;
}

.formulario{
    background: rgba(0,-0,-0,-.5);
    padding: 20px;
    border-radius: 10px;
    box-shadow:0 0 30px rgba(0,-0,-0,-0.568);
    color: white;

}

.ingresar{
    background: #222a3f;
    padding: 10px;
    font-size: 16px;
    font-weight: 700!important;
    color: white;
    box-shadow:0 0 30px rgba(0,-0,-0,-0.568);
}

.ingresar:hover{

    color:white;

}

.centrado{
    text-align: center;
}

p {
    color: rgb(255, 255, 255);
  }
</style>
<body>
    <div class="container">
        <div class="row justify-content-center pt-5 mt-5 mr-1">
            <div class="col-md-4 formulario">
                <div class="form-group text-center">
                    <h1 class="text.light">Iniciar Sesión</h1>
                    <form action="{{route('validarusuario')}}" method="post">
                    @csrf
                </div>
                <div class="form-group mx-5m-4 pt-3">
                    <input type="text" name="correo" class="form-control form-control-lg"placeholder="Ingrese su usuario">
                    <label class="form-label" for="typeEmailX">Ingrese su correo</label>
                </div>
                <div class="form-group mx-5m-4 pt-3">
                    <input type="password" name="clave" class="form-control form-control-lg" placeholder="Ingrese su contraseña">
                    <label class="form-label" for="typePasswordX">Ingrese su contraseña</label>
                </div>
                <div class="form-group mx-5m-4 pt-3">
                <input type="submit" class="btn btn-block ingresar" value="INGRESAR">
                <div class="form-group mx-5m-4 pt-3">
                  <label>No te has registrado? </label>
                    <a href="{{route('registrarse')}}">Registrate aqui</a>
                </div>
                <div class="form-group mx-5m-4 pt-3">
                    <a href="{{route('inicio')}}">Volver al inicio</a>
                </div>
                </div>
                </form>
            </div>
        </div>
    </div>



     <!-- Inician estilos de js-->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


<?php
  if(isset($_GET['error'])){
    $error = $_GET['error'];
    if($error == "CREDENCIALESINCORRECTAS"){
      echo "<p class='centrado''error-message'>Datos erroneos, intentelo de nuevo</p>";
    } 
    else if($error == "CAMPOSVACIOS"){
       echo "<p class='centrado''error-message'>Existen campos vacios, intentelo de nuevo</p>";
    }
  }
  ?>
</body>
</html>