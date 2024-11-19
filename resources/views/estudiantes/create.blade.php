@extends('adminlte::page')
@extends('layouts.plantilla')

@section('titulo', 'Registrar nuevo Estudiante')

@section('content_header')
    <h1>Registrar un nuevo Estudiante</h1>

    <form action="{{ route('estudiantes.store') }}" method="POST">
        @csrf

        <!-- Campo para el código idEstudiantes -->
        <label for="idEstudiantes">Código del Estudiante:</label>
        <input type="text" id="idEstudiantes" name="idEstudiantes" required><br><br>

        <!-- Campo para el nombre -->
        <label for="nombre">Nombre del Estudiante:</label>
        <input type="text" id="nombre" name="nombre" required><br><br>

        <!-- Campo para el email -->
        <label for="email">Email del Estudiante:</label>
        <input type="email" id="email" name="email" required><br><br>

        <!-- Campo para el teléfono -->
        <label for="telefono">Teléfono del Estudiante:</label>
        <input type="text" id="telefono" name="telefono" required><br><br>

        <!-- Botón para guardar el formulario -->
        <button type="submit">Registrar Estudiante</button>
    </form>
@endsection
