<!-- resources/views/planes/edit.blade.php -->
@extends('adminlte::page')


@section('titulo', 'Editar Plan')

@section('content_header')
@include('layouts.partials.header')

    <h2>Editar Plan</h2>
    
    <form action="{{ route('planes.update', $plan) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="idPlanes">Código del Plan:</label>
        <input type="text" id="idPlanes" name="idPlanes" value="{{ $plan->idPlanes }}" required><br><br>

        <label for="titulo">Título del Plan:</label>
        <input type="text" id="titulo" name="titulo" value="{{ $plan->titulo }}" required><br><br>

        <label for="descripcion">Descripción:</label>
        <textarea id="descripcion" name="descripcion" rows="4" cols="50" required>{{ $plan->descripcion }}</textarea><br><br>

        <label for="estado">Estado:</label>
        <input type="text" id="estado" name="estado" value="{{ $plan->estado }}" required><br><br>

        <label for="tutor_id">ID del Tutor:</label>
        <input type="number" id="tutor_id" name="tutor_id" value="{{ $plan->tutor_id }}" required><br><br>

        <button type="submit">Actualizar Plan</button>
    </form>
    @include('layouts.partials.footer')

@endsection
