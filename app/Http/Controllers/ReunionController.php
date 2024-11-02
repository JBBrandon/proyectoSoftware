<?php

namespace App\Http\Controllers;

use App\Models\Reunion;
use Illuminate\Http\Request;

class ReunionController extends Controller
{
    // Página principal de reuniones
    public function index()
    {
        $reuniones = Reunion::orderBy('id', 'desc')->paginate();
        return view('reuniones.index', compact('reuniones'));
    }

    // Mostrar el formulario para crear una nueva reunión
    public function create()
    {
        return view('reuniones.create');
    }

    // Guardar los datos de la nueva reunión en la base de datos
    public function store(Request $request)
    {
        $request->validate([
            'idReuniones' => 'required|unique:reuniones',
            'tutor_id' => 'required|integer',
            'estudiante_id' => 'required|integer',
            'fecha_reunion' => 'required|date',
            'detalles' => 'required|string',
            'estado' => 'required|string|max:255',
        ]);

        $reunion = new Reunion();
        $reunion->idReuniones = $request->idReuniones;
        $reunion->tutor_id = $request->tutor_id;
        $reunion->estudiante_id = $request->estudiante_id;
        $reunion->fecha_reunion = $request->fecha_reunion;
        $reunion->detalles = $request->detalles;
        $reunion->estado = $request->estado;
    
        $reunion->save();

        return redirect()->route('reuniones.show', $reunion);
    }    
    // Mostrar los detalles de una reunión específica
    public function show($id)
    {
        $reuniones = Reunion::find($id);
        return view('reuniones.show', compact('reuniones'));
    }

    // Mostrar el formulario para editar una reunión existente
    public function edit(Reunion $reuniones){
        return view('reuniones.edit', compact('reuniones'));
    }

    public function destroy(Reunion $reuniones){
        $reuniones->delete();
        return redirect()->route('reuniones.index');
    }

    // Actualizar los datos de una reunión existente
    public function update(Request $request, Reunion $reunion)
    {
        $request->validate([
            'idReuniones' => 'required|unique:reuniones,idReuniones,' ,
            'tutor_id' => 'required|integer',
            'estudiante_id' => 'required|integer',
            'fecha_reunion' => 'required|date',
            'detalles' => 'required|string',
            'estado' => 'required|string|max:255',
        ]);

        $reunion = new Reunion ;
        $reunion->idReuniones = $request->idReuniones;
        $reunion->tutor_id = $request->tutor_id;
        $reunion->estudiante_id = $request->estudiante_id;
        $reunion->fecha_reunion = $request->fecha_reunion;
        $reunion->detalles = $request->detalles;
        $reunion->estado = $request->estado;
        $reunion->save();

        return redirect()->route('reuniones.show', $reunion);
    }
}
