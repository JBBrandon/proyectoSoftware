@extends('adminlte::page')
@extends('layouts.plantilla')

@section('titulo', 'Registrar nuevo Tutor')

@section('contenido')
    <link rel="stylesheet" href="{{ asset('css/createTutor.css') }}">

    <h1>Editar un Tutor</h1>

    <form action="{{ route('tutorias.update', $tutores) }}" method="POST">
        @csrf
        @method('put')
        <!-- Campo para el código idTutores --> 
        <label for="idTutores">Código del Tutor:</label>
        <input type="text" id="idTutores" name="idTutores" value={{$tutores->idTutores}} required><br><br>

        <!-- Campo para el nombre del tutor -->
        <label for="nombre">Nombre del Tutor:</label>
        <input type="text" id="nombre" name="nombre" value={{$tutores->nombre}} required><br><br>

        <!-- Campo para el email del tutor -->
        <label for="email">Email del Tutor:</label>
        <input type="email" id="email" name="email" value={{$tutores->email}} required><br><br>

        <!-- Campo para el teléfono del tutor --> 
        <label for="telefono">Teléfono del Tutor:</label>
        <input type="text" id="telefono" name="telefono" value={{$tutores->telefono}} required><br><br>

        <!-- Botón para guardar el formulario -->
        <button type="submit">Editar Tutor</button>
    </form>
@endsection
