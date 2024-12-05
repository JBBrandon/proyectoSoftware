
@extends('adminlte::page')

@section('titulo', 'Ver Estudiante')

@section('content_header')
@include('layouts.partials.header')
    <h1 class="m-0 text-dark">Detalles del Estudiante: {{ $estudiante->nombre }}</h1>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Información del Estudiante</h3>
        </div>
        <div class="card-body">
            <p><strong>ID Estudiante: </strong>{{ $estudiante->idEstudiantes }}</p>
            <p><strong>Email: </strong>{{ $estudiante->email }}</p>
            <p><strong>Teléfono: </strong>{{ $estudiante->telefono }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('estudiantes.index') }}" class="btn btn-primary">Volver a Estudiantes</a>
            <a href="{{ route('estudiantes.edit', $estudiante) }}" class="btn btn-warning">Editar Registro</a>
            
            <form action="{{ route('estudiantes.destroy', $estudiante) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Estás seguro de eliminar este estudiante?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Eliminar</button>
            </form>
        </div>
    </div>
@include('layouts.partials.footer')

@endsection
