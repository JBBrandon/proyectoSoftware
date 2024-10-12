<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tutor;

class TutoriaController extends Controller
{
    // Página principal de gestión de tutorías
    public function index() {
        $tutores = Tutor::orderBy('id', 'desc')->paginate();
        //devenser iguales las variables $tutores 
        return view('tutorias.index',compact('tutores'));
    }

    public function create(){
        return view('tutorias.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'idTutores' => 'required|unique:tutores', // Asegura que sea único
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telefono' => 'required|string|max:20',
        ]);

        $tutor = new Tutor;
        $tutor->idTutores = $request->idTutores;
        $tutor->nombre = $request->nombre;
        $tutor->email = $request->email;
        $tutor->telefono = $request->telefono;
        $tutor->save();

        return redirect()->route('tutorias.show', $tutor);
    }  
    
    public function update(Request $request, Tutor $tutor)
    {
        $request->validate([
            'idTutores' => 'required|unique:tutores', // Asegura que sea único
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telefono' => 'required|string|max:20',
        ]);

        $tutor = new Tutor;
        $tutor->idTutores = $request->idTutores;
        $tutor->nombre = $request->nombre;
        $tutor->email = $request->email;
        $tutor->telefono = $request->telefono;
        $tutor->save();

        return redirect()->route('tutorias.show', $tutor);
    }   

    public function show($id) {
    
        $tutores = Tutor::find($id);
        return view('tutorias.show' , compact('tutores'));   
    }

    public function edit(Tutor $tutores){
        return view('tutorias.edit', compact('tutores'));
    }

    public function destroy(Tutor $tutores){
        $tutores->delete();
        return redirect()->route('tutorias.index');
    }
}
