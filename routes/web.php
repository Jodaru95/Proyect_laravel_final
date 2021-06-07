<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{UsuarioController,PerfilController};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//INdividual para usuario
// Route::resource('usuarios',UsuarioController::class);

//Grupal para usuario y perfil
Route::resources([
    'perfiles'=>PerfilController::class,
    'usuarios'=>UsuarioController::class
]);
