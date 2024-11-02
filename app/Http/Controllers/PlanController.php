<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plan;

class PlanController extends Controller
{
    // Página principal de gestión de planes
    public function index() {
        $planes = Plan::orderBy('id', 'desc')->paginate();
        return view('planes.index', compact('planes'));
    }

    // Método para mostrar el formulario de creación de un nuevo plan
    public function create() {
        return view('planes.create');
    }

    // Método para almacenar un nuevo plan en la base de datos
    public function store(Request $request) {
        $request->validate([
            'idPlanes' => 'required|unique:planes', // Asegura que el código del plan sea único
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'estado' => 'required|string|max:255',
            'tutor_id' => 'required|integer', // ID del tutor debe ser un número entero
        ]);

        $plan = new Plan;
        $plan->idPlanes = $request->idPlanes; // Código del plan
        $plan->titulo = $request->titulo;
        $plan->descripcion = $request->descripcion;
        $plan->estado = $request->estado;
        $plan->tutor_id = $request->tutor_id; // Relación con el tutor
        $plan->save();

        return redirect()->route('planes.show', $plan);
    }

    // Método para mostrar los detalles de un plan específico
    public function show($id) {
        $plan = Plan::find($id);
        return view('planes.show', compact('plan'));
    }

    // Método para mostrar el formulario de edición de un plan
    public function edit(Plan $plan) {
        return view('planes.edit', compact('plan'));
    }

    public function destroy(Plan $plan){
        $plan->delete();
        return redirect()->route('planes.index');
    }

    // Método para actualizar los datos de un plan existente
    public function update(Request $request, Plan $plan) {
        $request->validate([
            'idPlanes' => 'required|unique:planes,idPlanes,' ,
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'estado' => 'required|string|max:255',
            'tutor_id' => 'required|integer',
        ]);
        
        $plan = new Plan;
        $plan->idPlanes = $request->idPlanes; // Código del plan
        $plan->titulo = $request->titulo;
        $plan->descripcion = $request->descripcion;
        $plan->estado = $request->estado;
        $plan->tutor_id = $request->tutor_id; // Relación con el tutor
        $plan->save();

        return redirect()->route('planes.show', $plan);
    }
}
