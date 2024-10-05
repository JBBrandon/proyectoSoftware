<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tutor;

class TutoriaController extends Controller
{
    // Página principal de gestión de tutorías
    public function index() {
        $tutores = Tutor::paginate();
        //devenser iguales las variables $tutores 
        return view('tutorias.index',compact('tutores'));
    }

    public function create(){
        return view('tutorias.create');
    }

    public function show($id) {
    
        $tutores = Tutor::find($id);
        return view('tutorias.show' , compact('tutores'));   
    }
}
