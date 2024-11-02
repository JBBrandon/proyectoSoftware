<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\HomeController;
use App\http\Controllers\TutoriaController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\ReunionController;
use App\Http\Controllers\SeguimientoController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\Admin\UserController;

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('/admin', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin.home')->middleware('auth');
Route::view('nosotros','nosotros')->name('nosotros')->middleware('auth'); 
Route::resource('usuarios', UserController::class)->middleware('auth:sanctum');
 



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
    Route::delete('tutorias/{tutores}', 'destroy')->name('tutorias.destroy');
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
    Route::delete('planes/{plan}', 'destroy')->name('planes.destroy');
});

// Rutas de Reunion agrupadas en un controlador
Route::controller(ReunionController::class)->group(function () {
    Route::get('reuniones', 'index')->name('reuniones.index');
    Route::get('reuniones/create', 'create')->name('reuniones.create');
    Route::post('reuniones', 'store')->name('reuniones.store');
    Route::get('reuniones/{reuniones}', 'show')->name('reuniones.show');
    Route::get('reuniones/{reuniones}/edit', 'edit')->name('reuniones.edit');
    Route::put('reuniones/{reuniones}', 'update')->name('reuniones.update');
    Route::delete('reuniones/{reuniones}', 'destroy')->name('reuniones.destroy');
});


// Rutas de Seguimiento agrupadas en un controlador
Route::controller(SeguimientoController::class)->group(function () {
    // Página principal de gestión de tutorías
    Route::get('seguimientos', 'index')->name('seguimientos.index');
    Route::get('seguimientos/create', 'create')->name('seguimientos.create');

    //ruta para guardar  lo escrito en el formulario
    Route::post('seguimientos', 'store')->name('seguimientos.store');
    Route::get('seguimientos/{seguimiento}', 'show')->name('seguimientos.show');
    Route::get('seguimientos/{seguimiento}/edit', 'edit')->name('seguimientos.edit');
    Route::put('seguimientos/{seguimiento}', 'update')->name('seguimientos.update');
    Route::delete('seguimientos/{seguimiento}', 'destroy')->name('seguimientos.destroy');
});

// Rutas de Estudiantes agrupadas en un controlador
Route::controller(EstudianteController::class)->group(function () {
    // Página principal de gestión de tutorías
    Route::get('estudiantes', 'index')->name('estudiantes.index');
    Route::get('estudiantes/create', 'create')->name('estudiantes.create');

    //ruta para guardar  lo escrito en el formulario
    Route::post('estudiantes', 'store')->name('estudiantes.store');
    Route::get('estudiantes/{estudiante}', 'show')->name('estudiantes.show');
    Route::get('estudiantes/{estudiante}/edit', 'edit')->name('estudiantes.edit');
    Route::put('estudiantes/{estudiante}', 'update')->name('estudiantes.update');
    Route::delete('estudiantes/{estudiante}', 'destroy')->name('estudiantes.destroy');
});



