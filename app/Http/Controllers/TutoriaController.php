<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TutoriaController extends Controller
{
    // Página principal de gestión de tutorías
    public function index() {
        return view('tutorias.index');
    }

    // Inducción a los tutores
    public function induccion() {
        return view('tutorias.induccion');
    }

    public function guardarInduccion(Request $request) {
        //  guardar inducción de tutores
        return view('tutorias.guardarInduccion');
    }

    // Informe de Plan de tutoría
    public function verPlan() {
        return view('tutorias.verPlan');
    }

    public function guardarPlan(Request $request) {
        //  para guardar el plan de tutoría
        return view('tutorias.guardarPlan');
    }

    // Reuniones de tutoría personalizada
    public function verReuniones() {
        return view('tutorias.verReuniones');
    }

    public function agendarReunion(Request $request) {
        //  para agendar una reunión
        return view('tutorias.agendarReunion');
    }

    // Informes de seguimiento académico
    public function verSeguimiento() {
        return view('tutorias.verSeguimiento');
    }
    public function guardarSeguimiento(Request $request) {
        // para guardar informes de seguimiento académico
        return view('tutorias.guardarSeguimiento');
    }
}
