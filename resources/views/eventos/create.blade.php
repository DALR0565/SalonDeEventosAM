@extends('plantillas.cliente')
@section('contenido')
<form action="{{route('eventos.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <section class="d-flex justify-content-center align-items-center">
        <div class="card shadow col-xs-12 col-sm-6 col-md-6 col-lg-4 p-2"> 
            <div class="mb-4 d-flex justify-content-start align-items-center">
              
                <h4>  <i class="bi bi-chat-left-quote"></i> &nbsp; Agregar evento </h4>
            </div>
            <div class="mb-1">
                <form id = "contacto" >
                    <div class="mb-4"> 
                        <div>
                            <label for="nombre"> <i class="bi bi-person-fill"></i> Nombre de evento</label>
                            <input type="text" class="form-control" name="nombre" id="nombre" placeholder= "ej: Fiesta de XV años de Rosita" required>
                            <div class="nombre text-danger "></div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="fecha"><i class="bi bi-envelope-fill"></i> Fecha del evento</label>
                        <input type="date" class="form-control" name="correo" id="correo" placeholder= "ej: gpmcheco@mail.com" required>
                        <div class="fecha text-danger"></div>
                    </div> 

                    <div class="mb-4">
                        <label for="hora-evento-inicio"><i class="bi bi-envelope-fill"></i> Hora de inicio del evento </label>
                        <input type="time" class="form-control" name="hora-evento-inicio" id="hora-evento-inicio" placeholder= "ej: gpmcheco@mail.com" required>
                        <div class="hora-evento-inicio text-danger"></div>
                    </div> 

                    <div class="mb-4">
                        <label for="hora-evento-cierre"><i class="bi bi-envelope-fill"></i> Hora de cierre del evento </label>
                        <input type="time" class="form-control" name="hora-evento-cierre" id="hora-evento-cierre" placeholder= "ej: gpmcheco@mail.com" required>
                        <div class="hora-evento-cierre text-danger"></div>
                    </div> 

                    <div class="mb-4">
                        <label for="num-invitados"><i class="bi bi-envelope-fill"></i> Numero de invitados </label>
                        <input type="number" class="form-control" name="num-invitados" id="num-invitados">
                        <div class="num-invitados"></div>
                    </div> 

                    <div class="mb-4">
                        <label for="detalles"> <i class="bi bi-chat-right-dots-fill" required></i> Detalles de evento </label>
                        <textarea name="detalles" id="detalles" class="form-control" placeholder="Escriba información adicional referente a su evento :)"></textarea>
                        <div class="detalles text-danger"></div>
                    </div> 

                    <div class="mb-4">
                        <label for="sexo">  Paquete: </label>
                        <input type="radio" class="form-check-input"  name="paquete"  value="boda" > Boda
                        <input type="radio" class="form-check-input" name="paquete"  value="bautizo" > Bautizo
                        <input type="radio" class="form-check-input" name="paquete"  value="xvaños" > XV Años
                        <input type="radio" class="form-check-input" name="paquete"  value="cumpleaños" > Cumpleaños
                        <div class="paquete text-danger"></div>
                    </div>  
    
                    <div class="mb-4">
                    <p>
                     Servicios <br>
                     </p>
    <input type="checkbox" name="cb-clima" value="clima"> Aire Acondicionado <br>
    <input type="checkbox" name="cb-manteleria" value="manteleria"> Manteleria <br>
    <input type="checkbox" name="cb-meseros" value="meseros"> Meseros<br>
    </div>
                    
                    <div class="mb-4">
                        <button id ="botton" class="col-12 btn btn-primary d-flex justify-content-between ">
                            <span>Aceptar</span><i id="icono" class="bi bi-cursor-fill "></i>
                        </button>
                    </div> 

                              
                </form>
            </div>
        </div>
</section>
</form>
@endsection