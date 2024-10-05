<!-- resources/views/tutorias/induccion.blade.php -->
@extends('layouts.plantilla')

@section('titulo', 'Inducción a los Tutores')

@section('contenido')
    <link rel="stylesheet" href="{{ asset('css/Induccion.css') }}">
    <h2>Inducción a los Tutores</h2>
    <form action="/tutorias/guardarInduccion" method="POST">
        @csrf
        <label for="nombre">Nombre del Tutor:</label>
        <input type="text" id="nombre" name="nombre" required><br><br>

        <label for="fecha_induccion">Fecha de Inducción:</label>
        <input type="date" id="fecha_induccion" name="fecha_induccion" required><br><br>

        <label for="contenido">Contenido de la Inducción:</label>
        <textarea id="contenido" name="contenido" rows="4" cols="50" required></textarea><br><br>

        <button type="submit">Guardar Inducción</button>
    </form>
@endsection

