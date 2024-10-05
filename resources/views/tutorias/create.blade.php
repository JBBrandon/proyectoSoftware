
@extends('layouts.plantilla')

@section('titulo', 'Registrar nuevo Tutor')

@section('contenido')
    <link rel="stylesheet" href="{{ asset('css/createTutor.css') }}">

    <h1>Registrar un nuevo Tutor</h1>

    <form action="{{ route('tutorias.store') }}" method="POST">
        @csrf

        <!-- Campo para el código idTutores --> 
        <label for="idTutores">Código del Tutor:</label>
        <input type="text" id="idTutores" name="idTutores" required><br><br>

        <!-- Campo para el nombre del tutor -->
        <label for="nombre">Nombre del Tutor:</label>
        <input type="text" id="nombre" name="nombre" required><br><br>

        <!-- Campo para el email del tutor -->
        <label for="email">Email del Tutor:</label>
        <input type="email" id="email" name="email" required><br><br>

        <!-- Campo para el teléfono del tutor -->
        <label for="telefono">Teléfono del Tutor:</label>
        <input type="text" id="telefono" name="telefono" required><br><br>

        <!-- Botón para guardar el formulario -->
        <button type="submit">Registrar Tutor</button>
    </form>
@endsection


