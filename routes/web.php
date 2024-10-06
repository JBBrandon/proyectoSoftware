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

// Rutas de TUTORES agrupadas en un controlador
Route::controller(ReunionController::class)->group(function () {
    // Página principal de gestión de tutorías
    Route::get('reunion', 'index')->name('reunion.index');
    Route::get('reunion/create', 'create')->name('reunion.create');

    //ruta para guardar  lo escrito en el formulario
    Route::post('reunion', 'store')->name('reunion.store');
    Route::get('reunion/{reu}', 'show')->name('reunion.show');
    Route::get('reunion/{reu}/edit', 'edit')->name('reunion.edit');
    Route::put('reunion/{reu}', 'update')->name('reunion.update');
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

