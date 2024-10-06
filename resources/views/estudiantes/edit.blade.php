@extends('layouts.plantilla')

@section('titulo', 'Editar Estudiante')

@section('contenido')
    <h1>Editar Estudiante</h1>

    <form action="{{ route('estudiantes.update', $estudiante) }}" method="POST">
        @csrf
        @method('put')

        <!-- Campo para el código idEstudiantes -->
        <label for="idEstudiantes">Código del Estudiante:</label>
        <input type="text" id="idEstudiantes" name="idEstudiantes" value="{{ $estudiante->idEstudiantes }}" required><br><br>

        <!-- Campo para el nombre -->
        <label for="nombre">Nombre del Estudiante:</label>
        <input type="text" id="nombre" name="nombre" value="{{ $estudiante->nombre }}" required><br><br>

        <!-- Campo para el email -->
        <label for="email">Email del Estudiante:</label>
        <input type="email" id="email" name="email" value="{{ $estudiante->email }}" required><br><br>

        <!-- Campo para el teléfono -->
        <label for="telefono">Teléfono del Estudiante:</label>
        <input type="text" id="telefono" name="telefono" value="{{ $estudiante->telefono }}" required><br><br>

        <!-- Botón para guardar el formulario -->
        <button type="submit">Editar Estudiante</button>
    </form>
@endsection
