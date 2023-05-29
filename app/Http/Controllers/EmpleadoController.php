<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Http\Requests\StoreEmpleadoRequest;
use App\Http\Requests\UpdateEmpleadoRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $empleados = Empleado::all();
        return view('Gerente.gerenteEmpleados',compact('empleados'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('empleados.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEmpleadoRequest $request)
    {
        $empleado = new Empleado();
        $empleado->nombres = $request->input('nombres');
        $empleado->apellidos = $request->input('apellidos');
        $empleado->edad = $request->input('edad');
        $empleado->sexo = $request->input('sexo');
        $empleado->correo = $request->input('correo');
        $empleado->clave = Hash::make($request->input('clave'));
        $empleado->telefono = $request->input('telefono');
        $empleado->save();
        //$usuarioEncontrado = Usuario::where('correo',$usuario->correo)->first();
        //Se crea la session
        Auth::guard('guard_empleado')->login($empleado);
        $_SESSION['AuthGuard']= 'guard_empleado';

        return redirect(route('inicio'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Empleado $empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Empleado $empleado)
    {
        return view('empleados.edit', compact('empleado'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmpleadoRequest $request, Empleado $empleado)
    {
        $empleado->nombres = $request->input('nombres');
        $empleado->apellidos = $request->input('apellidos');
        $empleado->edad = $request->input('edad');
        $empleado->sexo = $request->input('sexo');
        $empleado->correo = $request->input('correo');
        $empleado->clave = Hash::make($request->input('clave'));
        $empleado->telefono = $request->input('telefono');
        $empleado->save();
        
        return redirect(route('empleados.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Empleado $empleado)
    {
        $empleado->delete();
        return redirect(route('empleados.index'));
    }
}
