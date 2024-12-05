@extends('adminlte::page')

@section('titulo', 'Registrar nuevo Tutor')

@section('content_header')
@include('layouts.partials.header')

<link rel="stylesheet" href="{{ asset('css/createTutor.css') }}">

<h1>Registrar un nuevo Tutor</h1>

<form action="{{ route('tutorias.store') }}" method="POST" class="mt-4">
    @csrf

    <!-- Campo para el código idTutores --> 
    <div class="form-group">
        <label for="idTutores">Código del Tutor:</label>
        <input type="text" id="idTutores" name="idTutores" class="form-control" required>
    </div>

    <!-- Campo para el nombre del tutor -->
    <div class="form-group">
        <label for="nombre">Nombre del Tutor:</label>
        <input type="text" id="nombre" name="nombre" class="form-control" required>
    </div>

    <!-- Campo para el email del tutor -->
    <div class="form-group">
        <label for="email">Email del Tutor:</label>
        <input type="email" id="email" name="email" class="form-control" required>
    </div>

    <!-- Campo para el teléfono del tutor -->
    <div class="form-group">
        <label for="telefono">Teléfono del Tutor:</label>
        <input type="text" id="telefono" name="telefono" class="form-control" required>
    </div>

    <!-- Botón para guardar el formulario -->
    <div class="form-group">
        <button type="submit" class="btn btn-success">Registrar Tutor</button>
    </div>
</form>

@include('layouts.partials.footer')

@endsection



