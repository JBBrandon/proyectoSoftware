@extends('adminlte::page')
@extends('layouts.plantilla')

@section('titulo', 'Registrar nuevo Seguimiento')

@section('content_header')
    <h1>Registrar un nuevo Seguimiento</h1>

    <form action="{{ route('seguimientos.store') }}" method="POST">
        @csrf

        <!-- Campo para el código idSeguimientos -->
        <label for="idSeguimientos">Código del Seguimiento:</label>
        <input type="text" id="idSeguimientos" name="idSeguimientos" required><br><br>

        <!-- Campo para el tutor_id -->
        <label for="tutor_id">ID del Tutor:</label>
        <input type="number" id="tutor_id" name="tutor_id" required><br><br>

        <!-- Campo para el estudiante_id -->
        <label for="estudiante_id">ID del Estudiante:</label>
        <input type="number" id="estudiante_id" name="estudiante_id" required><br><br>

        <!-- Campo para el informe -->
        <label for="informe">Informe:</label>
        <textarea id="informe" name="informe" rows="4" required></textarea><br><br>

        <!-- Campo para el progreso -->
        <label for="progreso">Progreso:</label>
        <input type="text" id="progreso" name="progreso" required><br><br>

        <!-- Botón para guardar el formulario -->
        <button type="submit">Registrar Seguimiento</button>
    </form>
@endsection
