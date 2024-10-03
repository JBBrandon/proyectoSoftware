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
    Route::get('tutorias', 'index');
    Route::get('tutorias/induccion', 'induccion');
    Route::get('tutorias/plan', 'verPlan');
    Route::get('tutorias/reuniones', 'verReuniones');
    Route::get('tutorias/seguimiento', 'verSeguimiento');
    
});


