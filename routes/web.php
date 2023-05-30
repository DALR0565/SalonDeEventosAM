<?php

use App\Http\Controllers\EventoController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PaqueteController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\AbonoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\FotoController;
use App\Http\Controllers\GastoController;
use App\Http\Controllers\GerenteController;
use App\Http\Controllers\UsuarioController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('plantillas.cliente');
})->name('inicio')->middleware("web")->middleware('verificaciongerente');
//Checar cuando se guarda en empleado y gerente



Route::get('registroUsuario', function () {
    return view('Login.registrarse');
})->name('registrarse')->middleware('guest');

//Ruta de validacion de Usuario
Route::get('login', [LoginController::class,'login'])->name('login')->middleware('guest');
Route::post('validarusuario',[LoginController::class,'validarUsuario'])->name('validarusuario')->middleware("web");
Route::get('cerrarSesion', [LoginController::class,'cerrarSesion'])->name('cerrarsesion')->middleware('web'); //Cambiar por auth




//Rutas home
/*Route::get('gerentes',function(){
    return view('Gerente.home');
})->name('Gerentes.home');

Route::get('empleados',function(){
    return view('Empleado.home');
})->name('Empleados.home');

Route::get('clientes',function(){
    return view('Cliente.home');
})->name('Clientes.home');*/


/*Route::get('gerenteServicios',function(){
    return view('Empleado.gerenteServicios');
})->name('gerenteServicios');

Route::get('gerentePaquetes',function(){
    return view('Empleado.gerentePaquetes');
})->name('gerentePaquetes');*/


Route::get('miseventos',function(){
    return view('Cliente.clienteEventos');
})->name('miseventos')->middleware('auth');

Route::get('abonos',function(){
    return view('abonos.index');
})->name('abonos');
/*
Route::get('usuarios',[UsuarioController::class, 'index'])->name('Empleado.gerenteUsuarios');
Route::get('paquetes',[PaqueteController::class, 'index'])->name('Empleado.gerentePaquetes');
Route::get('servicios',[ServicioController::class, 'index'])->name('Empleado.gerenteServicios');
*/
//Route::get('abonos',[AbonoController::class, 'index'])->name('Empleado.empleadoAbonos');
//Route::get('eventos',[EventoController::class, 'index'])->name('Cliente.clienteEventos');



//RUTAS RECURSO DE GERENTE - USUARIOS
Route::resource('usuarios',UsuarioController::class);

//RUTAS RECURSO DE GERENTE - USUARIOS
Route::resource('clientes',ClienteController::class)->middleware('auth')->middleware('verificacioncliente');

//RUTAS RECURSO DE GERENTE - USUARIOS
Route::resource('empleados',EmpleadoController::class)->middleware('auth')->middleware('verificacioncliente');


//RUTAS RECURSO DE GERENTE - USUARIOS
Route::resource('gerentes',GerenteController::class)->middleware('auth')->middleware('verificacioncliente');

//RUTAS RECURSO DE GERENTE - PAQUETES
Route::resource('paquetes',PaqueteController::class)->middleware('auth')->middleware('verificacioncliente');

//RUTAS RECURSO DE GERENTE - SERVICIOS
Route::resource('servicios',ServicioController::class)->middleware('auth')->middleware('verificacioncliente');


//RUTAS RECURSO DE CLIENTE - EVENTOS
Route::resource('eventos',EventoController::class)->middleware('auth');
///////
Route::get('confirmacion/{cual?}',[EventoController::class, 'confirmar'])->name('eventos.confirmar')->middleware('auth')->middleware('verificacioncliente');
Route::get('pendiente/{cual?}',[EventoController::class, 'pendiente'])->name('eventos.pendiente')->middleware('auth')->middleware('verificacioncliente');


Route::get('contrato/{cual?}',[EventoController::class,'contrato'])->name('contrato');


//RUTAS DE EMPLEADO - ABONOS
Route::resource('eventos.abonos',AbonoController::class)->middleware('auth');//Verificar que es un empleado
Route::get('abonos',function(){
    return view('abonos.index');
})->name('abonos');

//RUTAS DE GASTOS
Route::resource('gastos',GastoController::class);
//RUTA RECURSO DE FOTOS
Route::resource('eventos.fotos',FotoController::class)->middleware('auth');

//Rutas de los usuarios
Route::get('gerente',function(){
    return view('plantillas.gerente');
})->name('gerentes')->middleware('auth');

Route::get('empleado',function(){
    return view('plantillas.empleado');
})->name('empleados');

Route::get('cliente',function(){
    return view('plantillas.cliente');
})->name('clientes');