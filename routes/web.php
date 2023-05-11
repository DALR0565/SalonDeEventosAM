<?php

use App\Http\Controllers\EventoController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PaqueteController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\AbonoController;
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
})->name('inicio')->middleware("web");



Route::get('registroUsuario', function () {
    return view('Login.registrarse');
})->name('registrarse')->middleware('guest');

//Ruta de validacion de Usuario
Route::get('login', [LoginController::class,'login'])->name('login')->middleware('guest');
Route::post('validarusuario',[LoginController::class,'validarUsuario'])->name('validarusuario')->middleware("web");
Route::get('cerrarSesion', [LoginController::class,'cerrarSesion'])->name('cerrarsesion')->middleware('web'); //Cambiar por auth




Route::get('gerenteServicios',function(){
    return view('Empleado.gerenteServicios');
})->name('gerenteServicios');

Route::get('gerentePaquetes',function(){
    return view('Empleado.gerentePaquetes');
})->name('gerentePaquetes');
/*
Route::get('usuarios',[UsuarioController::class, 'index'])->name('Empleado.gerenteUsuarios');
Route::get('paquetes',[PaqueteController::class, 'index'])->name('Empleado.gerentePaquetes');
Route::get('servicios',[ServicioController::class, 'index'])->name('Empleado.gerenteServicios');
*/
Route::get('abonos',[AbonoController::class, 'index'])->name('Empleado.empleadoAbonos');
Route::get('eventos',[EventoController::class, 'index'])->name('Cliente.clienteEventos');



//RUTAS DE GERENTE - USUARIOS
Route::resource('usuarios',UsuarioController::class);

//RUTAS DE GERENTE - PAQUETES
Route::resource('paquetes',PaqueteController::class);

//RUTAS DE GERENTE - SERVICIOS
Route::resource('servicios',ServicioController::class);


//RUTAS DE CLIENTE - EVENTOS
/*Route::get('actualizarevento/{cual?}',[EventoController::class, 'edit'])->name('eventos.edit');
Route::post('guardarevento',[EventoController::class, 'store'])->name('eventos.store');
Route::get('crearevento',[EventoController::class, 'create'])->name('eventos.create');
Route::put('actualizarevento/{cual?}',[EventoController::class, 'update'])->name('eventos.update');
Route::delete('borrarevento/{cual?}',[EventoController::class, 'destroy'])->name('eventos.destroy');*/
Route::resource('eventos',EventoController::class);

//RUTAS DE EMPLEADO - ABONOS
Route::get('actualizarabono/{cual?}',[AbonoController::class, 'edit'])->name('abonos.edit');
Route::post('guardarabono',[AbonoController::class, 'store'])->name('abonos.store');
Route::get('crearabono',[AbonoController::class, 'create'])->name('abonos.create');
Route::put('actualizarabono/{cual?}',[AbonoController::class, 'update'])->name('abonos.update');
Route::delete('borrarabono/{cual?}',[AbonoController::class, 'destroy'])->name('abonos.destroy');
//Route::resource('abonos',AbonoController::class);



//Rutas de los usuarios
/*Route::get('gerente',function(){
    return view('plantillas.gerente');
})->name('gerente');*/

Route::get('empleado',function(){
    return view('plantillas.empleado');
})->name('empleado');

Route::get('anonimo',function(){
    return view('plantillas.anonimo');
})->name('anonimo');

Route::get('cliente',function(){
    return view('plantillas.cliente');
})->name('cliente');