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

    <style>
/* Para el encabezado de la pagina*/
body{
    font-family: Arial;
    margin: 0;
}

a{

    text-decoration: none;
    color: black;
    padding: 40px;
    font-size: 17px;
}

header{
display: flex;
height: 130px;
background-color: #ffffff;
justify-content: space-between;
align-items: center;
padding: 50px;
}
/* Para el encabezado de la pagina*/


/* Para el inicio(home)*/
section{
    background-color: rgb(84, 90, 90);
    padding: 2rem 9%;
}

.btn{
    margin-top: 1rem;
    display: inline-block;
    padding: .8rem 3rem;
    font-size: 1.7rem;
    border-radius: .5rem;
    background: #666;
    color: #FFF;
    cursor: pointer;
    font-weight: 600;
}

.btn:hover{
    background: #1065d4;
}
/* Para el inicio(home)*/


/* Para el inicio(home) pt2*/
/*.home .home-slider .swiper-slide{
    overflow: hidden;
    border-radius: .5rem;
    height: 50rem;
    width: 35rem;
}

.home .home-slider .swiper-slide img{
    height: 100%;
    width: 100%;
    object-fit: cover;
}



/*Nuevo slider
.container .v2{
    padding: 2rem;

}

.slider-wrapper{
    position: relative;
    max-width: 48rem;
    margin: 0 auto;
}

.slider{
    display: flex;
    aspect-ratio: 16 / 9;
    overflow-x: auto;
    scroll-snap-type: x mandatory;
    scroll-behavior: smooth;
    box-shadow: 0 1.5rem 3rem -0.75rem hsla(0,0%,0%,0.25);
    border-radius: 0.5rem;
}

.slider img{
    flex: 1 0 100%;
    scroll-snap-align: start;
    object-fit: cover;
    padding: 0.3rem;
}

.slider-nav{
    display: flex;
    column-gap: 1rem;
    position: absolute;
    bottom: 1.25rem;
    left: 50%;
    transform: translateX(-50%);
    z-index: 1;
}

.slider-nav a{
    width: 0.5rem;
    height: 0.5rem;
    border-radius: 50%;
    background-color: #FFF;
    opacity: 0.75;
    transition: opacity ease 250ms;
}

.slider-nav a:hover{
   opacity: 1;
}
*/


.home .content{
    text-align: center;
    padding-top: 1rem;
    margin:2rem auto;
    max-width: 70rem;
}

.home .content h3{
    color: #ffffff;
    font-size: 4.5rem;
    text-transform: uppercase;
}

.home .content h3 span{
    color: #1065d4;
    text-transform: uppercase;
}



.logo{
    display: flex;
    align-items: center;
}

.logo img{
    height: 120px;
    margin-right: 50px;
}

/* Para las tarjetas*/

*{

    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: sans-serif;
}



/*Container de las cartas*/
.container{
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    justify-content: center;
    min-height: 100vh;
    background: rgb(84, 90, 90);
}

.card{
    position: relative;
    width: 300px;
    height: 350px;
    margin: 20px;
}

.card .face{

    position: absolute;
    width: 100%;
    height: 100%;
    backface-visibility: hidden;
    border-radius: 10px;
    overflow:hidden;
    transition: .5s;
}

.card .front{
    transform: perspective(600px) rotateY(0deg);
    box-shadow: 0 5px 10px #000;
}

.card .front img{
    position: absolute;
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.card .front h3{

    position: absolute;
    bottom: 0;
    width: 100%;
    height: 45px;
    line-height: 45px;
    color: #FFF;
    background:rgba(0,0,0,.4);
    text-align: center;
}

.card .back{
    transform: perspective(600px) rotateY(180deg);
    background: rgb(3, 35, 54);
    padding: 15px;
    color: #F3F3F3;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    text-align: center;
    box-shadow: 0 5px 10 px #000;
}

.card .back .link{
    border-top: solid 1px #F3F3F3;
    height: 50px;
    line-height: 50px;
}

.card .back .link a{
   color: #F3F3F3;
}


.card .back h3{
    font-size: 30px;
    margin-top: 20px;
    letter-spacing: 2px;
}


.card .back p{
   letter-spacing: 1px;
}

.card:hover .front{
    transform: perspective(600px) rotateY(180deg);
}

.card:hover .back{
    transform: perspective(600px) rotateY(360deg);
}

/*Para los servicios*/

.heading{
    text-align: center;
    padding-bottom: 2rem;
    color: #fff;
    text-transform: uppercase;
    font-size: 4rem;
}

.heading span{
    color: #3543db;
    text-transform: uppercase;
}

.service .box-container{
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(27rem,1fr));
    gap:1.5rem;
}

.service .box-container .box{
    border-radius: .5rem;
    background: #333;
    text-align: center;
    padding: 2.5rem;   
}

.service .box-container .box i{
    height: 6rem;
    width: 6rem;
    line-height: 6rem;
    border-radius: 50%;
    font-size: 2.5rem;
    background: #3543db;
    color:#fff;
}

.service .box-container .box h3{
    font-size: 2rem;
    color: #fff
}

.service .box-container .box p{
    font-size: 2rem;
    color: #fff
}

/* Para el acerca de*/

.about .row{
    display: flex;
    gap: 1rem;
}

.about .row .image{
    flex-direction: 1 1 45rem;
    padding: 0.2rem;
}

.about .row .image img{
    width: 100%;
    border-radius: .5rem;
    border: 1rem solid #333;
}

.about .row .content{
    text-align: center;
    flex: 1 1 45rem;

}

.about .row .content h3{
    text-align: center;
    font-size: 20px;
    color: #fff; 
}

.about .row .content p{
    font-size: 18px;
    color: #eee; 
    padding: 0.5rem 0;
    line-height: 2;
}
    </style>

<body>
    {{--@dump(Auth::guard('guard_usuario'))--}}
     <!-- Etiqueta Header -->   
     <header>
        <div class="logo">
        <img src="../img/logo_salon.png" alt="logo del salon">
        <h2 class="nombre_empresa"> Salon de eventos A&M </h2>
    </div>
        <nav>
    <a href="{{route('inicio')}}" class="nav-link">Inicio</a>
    <a href="#Acerca" class="nav-link">Acerca de nosotros</a>
    <a href="#Contactanos" class="nav-link">Contactanos</a>
    @guest
    <a href="{{route('registrarse')}}" class="nav-link">Registrarse</a>
    @else
    <a href="{{route('miseventos')}}" class="nav-link">Ver mis eventos</a>
    @endguest
    @guest
    <a href="{{route('login')}}" class="nav-link">Iniciar Sesión</a>
    @else
    <a href="{{route('cerrarsesion')}}" class="nav-link">Cerrar Sesión</a>
    @endguest
        </nav>
    </header>
  <!-- Etiqueta Header -->   
 <!-- Home Sections Start -->   

 <section class="home" id="inicio">
    <div class="content">
        <h3>Celebra tu evento con <span>elegancia y distinción</span></h3>
    </div>


 <!-- Home Sections Ends --> 
 <section class="eventos" id="even">
    <div class="content"    >
        <h3><span> Eventos</span></h3>
    </div>

  <!-- Div Container de Cards Inicio-->
  <div class="container">
@foreach((\App\Models\Paquete::all()) as $paquete)

    <div class="card">
        <div class="face front">
        <img src="{{asset("imagenes/$paquete->imagen")}}" alt="">
            <h3>{{$paquete->nombre}}</h3>
        </div>

        <div class="face back">
            <h3>{{$paquete->nombre}}</h3>
            <p>Descripcion:<br>{{$paquete->descripcion}}</p>
            <p>Costo: ${{$paquete->precio}}</p>
        </div>
    </div>    

@endforeach
</div>
 <!-- div Container Final-->  

<!-- Service section starts --> 

<section class="service" id="service">

    <h1 class="heading">Nuestros <span> Servicios </span> </h1>

        
    <div class="box-container">
    @foreach((\App\Models\Servicio::all()) as $servicio)
        <div class="box">
            <i class="fas fa-map-marker-alt"></i>
                <h3>{{$servicio->nombre}}</h3>
                <p>{{$servicio->detalles}}</p>
                <p>Costo: ${{$servicio->precio}}</p>
        </div>
    @endforeach
    </div>

</section>
<!-- Service section ends --> 

<!-- About section start -->
<section class="about" id="about">
    <h1 class="heading"><span> Acerca de </span> nosotros </h1>
        <div class="row">
            <div class="image">
                <img src="../img/acerca.jpg" alt="" >
            </div>
            <div class="content">
                <h3>Celebra tu evento con nosotros!</h3>
                <p>Tenemos mas de 30 años brindando momentos inolvidables </p>
                <p>Somos tu mejor opcion en cuanto a eventos</p>
        
            </div>
 </div>

</section>

<!-- About section ends -->

 <!-- Custom js File link-->
 <script src="../jscript/script.js"></script>

 <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

</body>
</html>