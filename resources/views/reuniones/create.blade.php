@extends('adminlte::page')
@extends('layouts.plantilla')

@section('titulo', 'Crear Nueva Reunión')

@section('content_header')
    <h2>Crear Nueva Reunión</h2>

    <form action="{{ route('reuniones.store') }}" method="POST">
        @csrf
        <label for="idReuniones">ID Reunión:</label>
        <input type="text" name="idReuniones" id="idReuniones" required><br><br>
    
        <label for="tutor_id">Tutor ID:</label>
        <input type="number" name="tutor_id" id="tutor_id" required><br><br>
    
        <label for="estudiante_id">Estudiante ID:</label>
        <input type="number" name="estudiante_id" id="estudiante_id" required><br><br>
    
        <label for="fecha_reunion">Fecha de Reunión:</label>
        <input type="date" name="fecha_reunion" id="fecha_reunion" required><br><br>
    
        <label for="detalles">Detalles:</label>
        <textarea name="detalles" id="detalles" rows="4" required></textarea><br><br>
    
        <label for="estado">Estado:</label>
        <input type="text" name="estado" id="estado" required><br><br>
    
        <button type="submit">Guardar Reunión</button>
    </form>
    
    
    
@endsection
