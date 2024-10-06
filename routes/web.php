<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\HomeController;
use App\http\Controllers\TutoriaController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\ReunionController;
use App\Http\Controllers\SeguimientoController;
use App\Http\Controllers\PlanController;

Route::get('/', HomeController::class); 

Route::get('/', function () {
    // return view('welcome');
    return "Bienvenido a la página principal de Gestión de Tutorías";
});

// Rutas de TUTORES agrupadas en un controlador
Route::controller(TutoriaController::class)->group(function () {
    // Página principal de gestión de tutorías
    Route::get('tutorias', 'index')->name('tutorias.index');
    Route::get('tutorias/create', 'create')->name('tutorias.create');

    //ruta para guardar  lo escrito en el formulario
    Route::post('tutorias', 'store')->name('tutorias.store');
    Route::get('tutorias/{tutores}', 'show')->name('tutorias.show');
    Route::get('tutorias/{tutores}/edit', 'edit')->name('tutorias.edit');
    Route::put('tutorias/{tutores}', 'update')->name('tutorias.update');
});

// Rutas de PLANES agrupadas en un controlador
Route::controller(PlanController::class)->group(function () {
    // Página principal de gestión de tutorías
    Route::get('planes', 'index')->name('planes.index');
    Route::get('planes/create', 'create')->name('planes.create');

    //ruta para guardar  lo escrito en el formulario
    Route::post('planes', 'store')->name('planes.store');
    Route::get('planes/{plan}', 'show')->name('planes.show');
    Route::get('planes/{plan}/edit', 'edit')->name('planes.edit');
    Route::put('planes/{plan}', 'update')->name('planes.update');
});

// Rutas de Reunion agrupadas en un controlador
Route::controller(ReunionController::class)->group(function () {
    Route::get('reuniones', 'index')->name('reuniones.index');
    Route::get('reuniones/create', 'create')->name('reuniones.create');
    Route::post('reuniones', 'store')->name('reuniones.store');
    Route::get('reuniones/{reu}', 'show')->name('reuniones.show');
    Route::get('reuniones/{reu}/edit', 'edit')->name('reuniones.edit');
    Route::put('reuniones/{reu}', 'update')->name('reuniones.update');
});


// Rutas de TUTORES agrupadas en un controlador
Route::controller(SeguimientoController::class)->group(function () {
    // Página principal de gestión de tutorías
    Route::get('seguimiento', 'index')->name('seguimiento.index');
    Route::get('seguimiento/create', 'create')->name('seguimiento.create');

    //ruta para guardar  lo escrito en el formulario
    Route::post('seguimiento', 'store')->name('seguimiento.store');
    Route::get('seguimiento/{next}', 'show')->name('seguimiento.show');
    Route::get('seguimiento/{next}/edit', 'edit')->name('seguimiento.edit');
    Route::put('seguimiento/{next}', 'update')->name('seguimento.update');
});

// Rutas de TUTORES agrupadas en un controlador
Route::controller(EstudianteController::class)->group(function () {
    // Página principal de gestión de tutorías
    Route::get('estudiante', 'index')->name('estudiante.index');
    Route::get('estudiante/create', 'create')->name('estudiante.create');

    //ruta para guardar  lo escrito en el formulario
    Route::post('estudiante', 'store')->name('estudiante.store');
    Route::get('estudiante/{escol}', 'show')->name('estudiante.show');
    Route::get('estudiante/{escol}/edit', 'edit')->name('estudiante.edit');
    Route::put('estudiante/{escol}', 'update')->name('estudiante.update');
});

