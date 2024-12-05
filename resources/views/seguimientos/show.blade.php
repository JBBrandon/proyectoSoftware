@extends('adminlte::page')

@section('titulo', 'Ver Seguimiento')

@section('content_header')
    @include('layouts.partials.header')

    <h1>Detalles del Seguimiento: {{ $seguimiento->idSeguimientos }}</h1>

@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Información del Seguimiento</h3>
        </div>
        <div class="card-body">
            <p><strong>Tutor ID:</strong> {{ $seguimiento->tutor_id }}</p>
            <p><strong>Estudiante ID:</strong> {{ $seguimiento->estudiante_id }}</p>
            <p><strong>Informe:</strong> {{ $seguimiento->informe }}</p>
            <p><strong>Progreso:</strong> {{ $seguimiento->progreso }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('seguimientos.index') }}" class="btn btn-primary">
                <i class="fas fa-arrow-left"></i> Volver a los Seguimientos
            </a>
            <a href="{{ route('seguimientos.edit', $seguimiento) }}" class="btn btn-warning">
                <i class="fas fa-edit"></i> Editar Registro
            </a>

            <!-- Formulario de eliminación con confirmación -->
            <form action="{{ route('seguimientos.destroy', $seguimiento) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Estás seguro de eliminar este seguimiento?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">
                    <i class="fas fa-trash-alt"></i> Eliminar
                </button>
            </form>
        </div>
    </div>

    @include('layouts.partials.footer')
@endsection
