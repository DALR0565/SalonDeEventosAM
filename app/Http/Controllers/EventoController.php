<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Http\Requests\StoreEventoRequest;
use App\Http\Requests\UpdateEventoRequest;
use App\Models\Cliente;
use App\Models\Gerente;
use App\Models\Servicio;
use Carbon\Carbon;
use DateInterval;
use Illuminate\Support\Facades\Auth;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $eventos = Evento::all();
        if(Auth::user() instanceof Cliente){
            return redirect(route('miseventos'));
        }else if(Auth::user() instanceof Gerente){
            return view('Gerente.gerenteEventos',compact('eventos'));
        }else{
            return view('eventos.index',compact('eventos'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $eventos = Evento::all();

        $fechasBloqueadas = [];
        //Llenamos un array con las fechas ya ocupadas
        foreach($eventos as $evento){
            array_push($fechasBloqueadas, $evento->fecha);
        }

        return view('eventos.create',compact('fechasBloqueadas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEventoRequest $request)
    {
        $this->authorize('create',Evento::class);
        $evento = new Evento();
        $evento->nombre = $request->input('nombre');
        $evento->fecha = $request->input('fecha');
        $evento->hora_de_inicio = $request->input('hora_de_inicio');
        $evento->hora_de_cierre = $request->input('hora_de_cierre');
        $evento->numero_de_invitados = $request->input('numero_de_invitados');
        $evento->confirmacion = "Pendiente";
        $evento->detalles = $request->input('detalles');
        $evento->paquete_id = $request->input('paquete_id');
        $evento->cliente_id = Auth::user()->id;

        $evento->save();
        //Llenamos la tabla de paquete eventos.
        
        $arrayID = $request->input('servicio_id');
        $evento->servicios()->attach($arrayID);
        
        return redirect(route('eventos.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Evento $evento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Evento $evento)
    {
        $eventos = Evento::all();

        $fechasBloqueadas = [];
        //Llenamos un array con las fechas ya ocupadas
        foreach($eventos as $eventoTodo){
            if(!$eventoTodo->is($evento)){  //Si no es el mismo evento entonces seguir agregando las fechas apartadas
                array_push($fechasBloqueadas, $eventoTodo->fecha);
            }/*En caso de que se trate del mismo evento se le dara el permiso de elegir el mismo dia que tiene su evento
            en caso de que se arrepienta y haya elegido otro dia*/
        }
        return view('eventos.edit', compact('evento', 'fechasBloqueadas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEventoRequest $request, Evento $evento)
    {
        $this->authorize('update', $evento);
        //Lo que queramos mantener su valor simplemente lo comentamos
        $evento->nombre = $request->input('nombre');
        $evento->fecha = $request->input('fecha');
        $evento->hora_de_inicio = $request->input('hora_de_inicio');
        $evento->hora_de_cierre = $request->input('hora_de_cierre');
        $evento->numero_de_invitados = $request->input('numero_de_invitados');
        //$evento->confirmacion = "Pendiente"; Mantiene su valor
        $evento->detalles = $request->input('detalles');
        $evento->paquete_id = $request->input('paquete_id');
        //$evento->cliente_id = Auth::user()->id; Mantiene su valor
        $evento->save();

        //Primero eliminamos los servicios que se tienen actualmente
        foreach($evento->servicioS as $servicio){
            $evento->servicios()->detach($servicio->id);
        }
        //Despues se colocan los nuevos servicios
        $arrayID = $request->input('servicio_id');
        $evento->servicios()->attach($arrayID);

        
        return redirect(route('eventos.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Evento $evento)
    {
        $this->authorize('delete',$evento);
        $evento->delete();
        return redirect(route('eventos.index'));
    }


    public function confirmar($id){
        $evento = Evento::find($id);
        $evento->confirmacion = "Confirmado";
        $evento->save();
        return redirect(route('eventos.index'));
    }

    public function pendiente($id){
        $evento = Evento::find($id);
        $evento->confirmacion = "Pendiente";
        $evento->save();
        return redirect(route('eventos.index'));
    }


    public function contrato($id){
        $evento = Evento::find($id);
        $total = $evento->paquetes->precio;
        $abonos = $evento->abonos;
        $servicios = $evento->servicios;
        if(!empty($servicios)){
            foreach($servicios as $servicio){
                $total = $total + $servicio->precio;
            }
        }
        $abonado = 0;
        foreach($abonos as $abono){
            $abonado = $abonado + $abono->cantidad;
        }
        return view('Cliente.estadoDeCuenta',compact('evento','abonos','abonado','total'));
    }
    /*
    $hora_inicio_repetido = $todosLosEventos->contains(function ($evento) use ($hora_inicio){
            //Hay al menos un evento con la misma hora de inicia
            return $evento->hora_de_inicio == $hora_inicio;
        });

        $hora_cierre_repetido = $todosLosEventos->contains(function ($evento) use ($hora_cierre){
            //Hay al menos un evento con la misma hora final
            return $evento->hora_de_cierre == $hora_cierre;
        });

        $fecha_repetido = $todosLosEventos->contains(function ($evento) use ($fecha){
            //Hay al menos un evento con la misma fecha
            return $evento->fecha == $fecha;
        });

        if($fecha_repetido){
            //Retornar un error de que la fecha esta repetida
        }else{
            //El ultimo evento registrado
            $ultimoEvento = $todosLosEventos->last();
            //Obtenemos su hora y le sumamos la tolerancia de 4 horas
            $hora_cierre_tolerancia = $ultimoEvento->hora_de_cierre->add(new DateInterval('PT4H'));;
            //Comparamos si la hora de inicio es superior la hora del ultimo evento mas la tolerancia
            $tolerancia = strtotime($hora_inicio) >= strtotime($hora_cierre_tolerancia);
            if($tolerancia){
                
            }else{
                //Retornar que no cumple con la tolerancia de 4 horas
            }
        }
     */

}
