@extends('adminlte::page')

@section('titulo', 'Detalles de la Reunión')

@section('content_header')
@include('layouts.partials.header')

<h1 class="m-0 text-dark">Detalles de la Reunión: {{ $reuniones->idReuniones }}</h1>
@endsection

@section('content')
<!-- Detalles de la reunión -->
<div class="card mt-4">
    <div class="card-header">
        <h3 class="card-title">Información de la Reunión</h3>
    </div>
    <div class="card-body">
        <p><strong>Tutor ID:</strong> {{ $reuniones->tutor_id }}</p>
        <p><strong>Estudiante ID:</strong> {{ $reuniones->estudiante_id }}</p>
        <p><strong>Fecha de Reunión:</strong> {{ $reuniones->fecha_reunion }}</p>
        <p><strong>Detalles:</strong> {{ $reuniones->detalles }}</p>
        <p><strong>Estado:</strong> {{ $reuniones->estado }}</p>

        <!-- Acciones de edición y eliminación -->
        <div class="mt-3">
            <a href="{{ route('reuniones.index') }}" class="btn btn-primary">
                <i class="fas fa-arrow-left"></i> Volver a la lista de reuniones
            </a>
            <a href="{{ route('reuniones.edit', $reuniones) }}" class="btn btn-warning">
                <i class="fas fa-edit"></i> Editar Reunión
            </a>
            <form action="{{ route('reuniones.destroy', $reuniones) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar esta reunión?')">
                    <i class="fas fa-trash"></i> Eliminar
                </button>
            </form>
        </div>
    </div>
</div>

@include('layouts.partials.footer')

@endsection

