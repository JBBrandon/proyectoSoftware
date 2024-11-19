@extends('adminlte::page')
@extends('layouts.plantilla')


@section('titulo', 'Editar Reunión')

@section('content_header')
    

<form action="{{ route('reuniones.update', $reuniones) }}" method="POST">
    @csrf
    @method('PUT')
    
    <label for="idReuniones">ID Reunión:</label>
    <input type="text" name="idReuniones" id="idReuniones" value="{{ $reuniones->idReuniones }}" required><br><br>

    <label for="tutor_id">Tutor ID:</label>
    <input type="number" name="tutor_id" id="tutor_id" value="{{ $reuniones->tutor_id }}" required><br><br>

    <label for="estudiante_id">Estudiante ID:</label>
    <input type="number" name="estudiante_id" id="estudiante_id" value="{{ $reuniones->estudiante_id }}" required><br><br>

    <label for="fecha_reunion">Fecha de Reunión:</label>
    <input type="date" name="fecha_reunion" id="fecha_reunion" value="{{ $reuniones->fecha_reunion }}" required><br><br>

    <label for="detalles">Detalles:</label>
    <textarea name="detalles" id="detalles" rows="4" required>{{ $reuniones->detalles }}</textarea><br><br>

    <label for="estado">Estado:</label>
    <input type="text" name="estado" id="estado" value="{{ $reuniones->estado }}" required><br><br>

    <button type="submit">Actualizar Reunión</button>
</form>

    
@endsection
