<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\HomeController;
use App\http\Controllers\TutoriaController;

Route::get('/', HomeController::class); 

Route::get('/', function () {
    // return view('welcome');
    return "Bienvenido a la página principal de Gestión de Tutorías";
});

// Rutas de gestión de tutorías agrupadas en un controlador
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


