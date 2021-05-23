<?php

use App\Http\Controllers\AsignaturasController;
use App\Http\Controllers\ProfesoresController;
use Illuminate\Support\Facades\Route;

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

Route::resources([
    'profesores'=>ProfesoresController::class,
    'asignaturas'=>AsignaturasController::class
]);
