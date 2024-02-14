<?php

use App\Http\Controllers\CursoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController as home;
use App\Http\Controllers\HomeController;

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

#Laravel 7, forma de llamar a los controladores
// Route::get('/', "HomeController");
// Route::get('cursos', 'CursoController@index');

#Laravel 10 o superior, forma de llamar a los controladores
Route::get('/', HomeController::class);
// Route::get('/', [home::class, 'index'])->middleware('auth');

#Crear un grupo de rutas
Route::controller(CursoController::class)->group(function () {
    Route::get('cursos', 'index');
    Route::get('cursos/create', 'create');
    // Route::redirect('/here', '/there');
    Route::get('cursos/{curso}', 'show');
});

// Route::get('/cursos/profesores/{name}/materia/{materia}', 'CursoController@index')->name('curso.materia');
