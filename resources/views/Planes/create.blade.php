<!-- resources/views/planes/create.blade.php -->
@extends('layouts.plantilla')

@section('titulo', 'Crear Plan')

@section('contenido')
    <h2>Crear Plan</h2>
    <form action="{{ route('planes.store') }}" method="POST">
        @csrf

        <label for="idPlanes">Código del Plan:</label>
        <input type="text" id="idPlanes" name="idPlanes" required><br><br>

        <label for="titulo">Título del Plan:</label>
        <input type="text" id="titulo" name="titulo" required><br><br>

        <label for="descripcion">Descripción:</label>
        <textarea id="descripcion" name="descripcion" rows="4" cols="50" required></textarea><br><br>

        <label for="estado">Estado:</label>
        <input type="text" id="estado" name="estado" required><br><br>

        <label for="tutor_id">ID del Tutor:</label>
        <input type="number" id="tutor_id" name="tutor_id" required><br><br>

        <button type="submit">Guardar Plan</button>
    </form>
@endsection
