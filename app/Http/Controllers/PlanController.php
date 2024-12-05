<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plan;
use Illuminate\Validation\Rule;

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

        $planes = new Plan;
        $planes->idPlanes = $request->idPlanes; // Código del plan
        $planes->titulo = $request->titulo;
        $planes->descripcion = $request->descripcion;
        $planes->estado = $request->estado;
        $planes->tutor_id = $request->tutor_id; // Relación con el tutor
        $planes->save();

        return redirect()->route('planes.show', $planes);
    }

    // Método para mostrar los detalles de un plan específico
    public function show($id) {
        $plan = Plan::findOrFail($id);
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
    public function update(Request $request, Plan $plan)
    {
        // Validación de los campos, ignorando el id del plan actual
        $request->validate([
            'idPlanes' => [
                'required',
                Rule::unique('planes')->ignore($plan->id),  // Ignorar el idPlanes del plan actual
            ],
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'estado' => 'required|string|max:255',
            'tutor_id' => 'required|integer',
        ]);

        // Actualizar el plan existente
        $plan->update([
            'idPlanes' => $request->idPlanes,
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'estado' => $request->estado,
            'tutor_id' => $request->tutor_id,
        ]);

        // Redirigir a la vista del plan actualizado
        return redirect()->route('planes.show', $plan);
    }
}
