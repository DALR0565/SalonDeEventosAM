<?php

use App\Http\Controllers\EventoController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PaqueteController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\AbonoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\FotoController;
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
})->name('inicio')->middleware("web")->middleware('midcliente');



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
Route::resource('clientes',ClienteController::class)->middleware('auth');

//RUTAS RECURSO DE GERENTE - USUARIOS
Route::resource('empleados',EmpleadoController::class)->middleware('auth');

//RUTAS RECURSO DE GERENTE - USUARIOS
Route::resource('gerentes',GerenteController::class)->middleware('auth');

//RUTAS RECURSO DE GERENTE - PAQUETES
Route::resource('paquetes',PaqueteController::class)->middleware('auth');

//RUTAS RECURSO DE GERENTE - SERVICIOS
Route::resource('servicios',ServicioController::class)->middleware('auth');


//RUTAS RECURSO DE CLIENTE - EVENTOS
Route::resource('eventos',EventoController::class);
Route::get('confirmacion/{cual?}',[EventoController::class, 'confirmar'])->name('eventos.confirmar');
Route::get('pendiente/{cual?}',[EventoController::class, 'pendiente'])->name('eventos.pendiente');

//RUTAS DE EMPLEADO - ABONOS
Route::get('actualizarabono/{cual?}',[AbonoController::class, 'edit'])->name('abonos.edit');
Route::post('guardarabono',[AbonoController::class, 'store'])->name('abonos.store');
Route::get('crearabono',[AbonoController::class, 'create'])->name('abonos.create');
Route::put('actualizarabono/{cual?}',[AbonoController::class, 'update'])->name('abonos.update');
Route::delete('borrarabono/{cual?}',[AbonoController::class, 'destroy'])->name('abonos.destroy');
//Route::resource('abonos',AbonoController::class);

//RUTA RECURSO DE FOTOS
Route::resource('eventos.fotos',FotoController::class);


/*Route::get('gerente/clientes',function(){
    return view();
})->name('gerente_clientes');

Route::get('gerente/gerentes',function(){
    return view();
})->name('gerente_gerentes');

Route::get('gerente/empleados',function(){
    return view();
})->name('gerente_empleados');

Route::get('gerente/paquetes',function(){
    return view();
})->name('gerente_paquetes');

Route::get('gerente/servicios',function(){
    return view();
})->name('gerente_servicios');

Route::get('gerente/eventos',function(){
    return view();
})->name('gerente_eventos');
*/
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