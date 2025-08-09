<?php

use Illuminate\Http\Request;
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

Route::post('/index', [App\Http\Controllers\Auth\LoginController::class, 'index']);

Route::get('/login', function(){
    return view('auth.login');
})->name('login');

Route::get('/planes', function(){
    return view('auth.planes');
})->name('planes');

Route::get('/landing', function(){
    return view('auth.landing');
})->name('landing');

Route::get('/registro', function(){
    return view('auth.registro');
})->name('registro');

// Route::get('/register/user', [App\Http\Controllers\HomeController::class, 'registro'])->name('registro');


Route::get('/recuperar_contrasena', function(){
    return view('auth.contrasena');
})->name('recuperarContrasena');

Route::get('/nueva_contrasena', function(){
    return view('auth.nueva_contrasena');
})->name('nuevaContrasena');

/* Auth::routes(); */

/* Aquí van todas tus rutas protegidas para validar el usuario logeado */
Route::group(['middleware' => ['api.token']], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});



Route::get('/', function () {
    return view('dashboard');
});

Route::get('/cuenta', function(){
    return view('Configuracion.Cuenta');
})->name('cuenta');

Route::get('/modificar_plan', function(){
    return view('Configuracion.ModificarPlan');
})->name('modificarPlan');

Route::get('/modificar_contrasena', function(){
    return view('Configuracion.Contrasena');
})->name('modificarContrasena');

Route::get('/ia', function(){
    return view('IA.Main');
})->name('ia');

Route::get('/casos', function(){
    return view('Casos.Casos');
})->name('casos');

Route::get('/calendario', function(){
    return view('Calendario.Calendario');
})->name('calendario');

Route::get('/usuarios', function(){
    return view('Usuarios.Usuarios');
})->name('usuarios');

Route::get('/finanzas', function(){
    return view('Finanzas.Finanzas');
})->name('finanzas');
