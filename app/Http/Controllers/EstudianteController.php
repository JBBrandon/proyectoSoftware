<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estudiante;
use Illuminate\Validation\Rule;


class EstudianteController extends Controller
{
    // Página principal de gestión de estudiantes
    public function index() {
        $estudiantes = Estudiante::orderBy('id', 'desc')->paginate();
        return view('estudiantes.index', compact('estudiantes'));
    }

    // Mostrar la vista para crear un nuevo estudiante
    public function create(){
        return view('estudiantes.create');
    }

    // Almacenar un nuevo estudiante en la base de datos
    public function store(Request $request)
    {
        // Validación de los campos
        $request->validate([
            'idEstudiantes' => 'required|unique:estudiantes',
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telefono' => 'required|string|max:20',
        ]);

        // Creación del nuevo estudiante
        $estudiante = new Estudiante;
        $estudiante->idEstudiantes = $request->idEstudiantes;
        $estudiante->nombre = $request->nombre;
        $estudiante->email = $request->email;
        $estudiante->telefono = $request->telefono;
        $estudiante->save();

        // Redireccionar a la vista del estudiante recién creado
        return redirect()->route('estudiantes.show', $estudiante);
    }

    // Mostrar los detalles de un estudiante
    public function show($id) {
        $estudiante = Estudiante::findOrFail($id);
        return view('estudiantes.show', compact('estudiante'));
    }

    // Mostrar la vista para editar un estudiante existente
    public function edit(Estudiante $estudiante){
        return view('estudiantes.edit', compact('estudiante'));
    }

    public function destroy(Estudiante $estudiante){
        $estudiante->delete();
        return redirect()->route('estudiantes.index');
    }

    // Actualizar los datos de un estudiante
    public function update(Request $request, Estudiante $estudiante)
    {
        // Validación de los campos, ignorando el id del estudiante actual
        $request->validate([
            'idEstudiantes' => [
                'required',
                Rule::unique('estudiantes')->ignore($estudiante->id),
            ],
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telefono' => 'required|string|max:20',
        ]);

        // Actualizar el estudiante existente
        $estudiante->update([
            'idEstudiantes' => $request->idEstudiantes,
            'nombre' => $request->nombre,
            'email' => $request->email,
            'telefono' => $request->telefono,
        ]);

        // Redireccionar a la vista del estudiante actualizado
        return redirect()->route('estudiantes.show', $estudiante);
    }
    

}
