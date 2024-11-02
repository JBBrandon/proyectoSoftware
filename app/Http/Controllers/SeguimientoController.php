<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Seguimiento;
use Database\Factories\SeguimientoFactory;

class SeguimientoController extends Controller
{
    // Página principal de gestión de seguimientos
    public function index() {
        $seguimientos = Seguimiento::orderBy('id', 'desc')->paginate();
        return view('seguimientos.index', compact('seguimientos'));
    }

    // Mostrar la vista para crear un nuevo seguimiento
    public function create(){
        return view('seguimientos.create');
    }

    // Almacenar un nuevo seguimiento en la base de datos
    public function store(Request $request)
    {
        // Validación de los campos
        $request->validate([
            'idSeguimientos' => 'required|unique:seguimientos,idSeguimientos',
            'tutor_id' => 'required|integer',
            'estudiante_id' => 'required|integer',
            'informe' => 'required|string',
            'progreso' => 'required|string|max:255',
        ]);

        // Creación del nuevo seguimiento
        $seguimiento = new Seguimiento;
        $seguimiento->idSeguimientos = $request->idSeguimientos;
        $seguimiento->tutor_id = $request->tutor_id;
        $seguimiento->estudiante_id = $request->estudiante_id;
        $seguimiento->informe = $request->informe;
        $seguimiento->progreso = $request->progreso;
        $seguimiento->save();

        // Redireccionar a la vista del seguimiento recién creado
        return redirect()->route('seguimientos.show', $seguimiento);
    }

    // Mostrar los detalles de un seguimiento
    public function show($id) {
        $seguimiento = Seguimiento::findOrFail($id);
        return view('seguimientos.show', compact('seguimiento'));
    }

    // Mostrar la vista para editar un seguimiento existente
    public function edit(Seguimiento $seguimiento){
        return view('seguimientos.edit', compact('seguimiento'));
    }
    public function destroy(Seguimiento $seguimiento){
        $seguimiento->delete();
        return redirect()->route('seguimientos.index');
    }

    // Actualizar los datos de un seguimiento
    public function update(Request $request, Seguimiento $seguimiento)
    {
        // Validación de los campos
        $request->validate([
            'idSeguimientos' => 'required|unique:seguimientos',
            'tutor_id' => 'required|integer',
            'estudiante_id' => 'required|integer',
            'informe' => 'required|string',
            'progreso' => 'required|string|max:255',
        ]);

        // Actualizar el seguimiento existente
        $seguimiento->update([
            'idSeguimientos' => $request->idSeguimientos,
            'tutor_id' => $request->tutor_id,
            'estudiante_id' => $request->estudiante_id,
            'informe' => $request->informe,
            'progreso' => $request->progreso,
        ]);

        // Redireccionar a la vista del seguimiento actualizado
        return redirect()->route('seguimientos.show', $seguimiento);
    }
}

