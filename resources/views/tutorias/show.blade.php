@extends('adminlte::page')

@section('titulo', 'Detalles del Plan de Tutoría')

@section('content_header')
@include('layouts.partials.header')

    <h1>Detalles del Tutor: {{ $tutores->nombre }}</h1>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="mb-3">
            <strong>Código:</strong> {{ $tutores->idTutores }}
        </div>
        <div class="mb-3">
            <strong>Nombre:</strong> {{ $tutores->nombre }}
        </div>
        <div class="mb-3">
            <strong>Email:</strong> {{ $tutores->email }}
        </div>
        <div class="mb-3">
            <strong>Teléfono:</strong> {{ $tutores->telefono }}
        </div>

        <a href="{{ route('tutorias.index') }}" class="btn btn-secondary">Volver a Tutorías</a>
        <a href="{{ route('tutorias.edit', $tutores) }}" class="btn btn-warning">Editar</a>

        <form action="{{ route('tutorias.destroy', $tutores) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este tutor?')">Eliminar</button>
        </form>
    </div>
</div>
@endsection

@section('footer')
@include('layouts.partials.footer')
@endsection
