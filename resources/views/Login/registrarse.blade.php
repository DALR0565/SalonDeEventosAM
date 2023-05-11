<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de registro</title>
</head>

<style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body{
            background-image: radial-gradient(circle at 50% -20.71%, #ffffa1 0, #f5ffa0 6.25%, #e4ffa0 12.5%, #d2ffa1 18.75%, #bdffa3 25%, #a7fda6 31.25%, #8cfaaa 37.5%, #6cf7af 43.75%, #3cf2b5 50%, #00edbc 56.25%, #00e8c6 62.5%, #00e4d0 68.75%, #00dfdc 75%, #00dbe9 81.25%, #00d7f5 87.5%, #00d3ff 93.75%, #00d0ff 100%);
        }

        .form-register{
            width: 570px;
            background: #24303c;
            padding: 30px;
            margin: auto;
            margin-top: 30px;
            border-radius: 4px;
            font-family: 'calibri';
            color: #fff;
            box-shadow: 7px 13px 37px #000;
        }

        .form-register h4{
            font-size: 22px;
            margin-bottom: 20px;
            text-align: center;
        }

        .controls{
          width: 100%;
          background: #24303c;
          padding: 10px;
          border-radius: 4px;
          margin-bottom: 16px;
          border: 1px solid #1f53c5;
          font-family: 'calibri';
          font-size: 18px;
          color: white;
        
        }

        .controls::placeholder{
            color: white;
        }

        .form-register p{
            height: 40px;
            text-align: center;
            font-size: 18px;
            line-height: 40px;
        }

        .form-register a{
            color: #fff;
            text-decoration: none;
        }

        .form-register a:hover{
            color: white;
            text-decoration: underline;
        }

        .form-register .button{
            width: 100%;
            background: #1f53c5;
            border: none;
            padding: 12px;
            color: white;
            margin: 16px 0;
            font-size: 16px;
        }


    </style>

<body>
    <form action="{{route('usuarios.store')}}" method="post">
    @csrf
    <section class="form-register">
        <h4> Formulario de registro de Salon A&M </h4>
        <input class="controls" type="text" name="nombres" id="nombres" placeholder="Ingrese su nombre">
        <input class="controls" type="text" name="apellidos" id="apellidos" placeholder="Ingrese sus apellidos">
        <label for="edad">Edad:</label>
        <input type="number" id="edad" name="edad" min="18" max="100">
        <br><br>
        <div>
            <label>Sexo: </label>
                <input type="radio" class="form-check-input"  name="sexo"  value="H" >Hombre
                <input type="radio" class="form-check-input"  name="sexo"  value="M" >Mujer
            <div class="paquete text-danger"></div>
        </div>
        <br>
        <input class="controls" type="email" name="correo" id="correo" placeholder="Ingrese su correo">
        <input class="controls" type="password" name="clave" id="clave" placeholder="Ingrese su contraseña">
        
        <input class="controls" type="text" name="telefono" id="telefono" placeholder="Ingrese su telefono">
        <input class="button" type="submit" value="Registrar">
        <p><a href="{{route('login')}}">Si usted ya tiene cuenta, ¡Haga click aqui!</a></p>
    </section>
    </form>

</body>
</html>