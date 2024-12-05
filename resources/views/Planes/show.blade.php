@extends('adminlte::page')

@section('titulo', 'Detalles del Plan')

@section('content_header')
    <h1 class="m-0 text-dark">Detalles del Plan: {{ $plan->titulo }}</h1>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Información del Plan</h3>
        </div>
        <div class="card-body">
            <p><strong>Código del Plan:</strong> {{ $plan->idPlanes }}</p>
            <p><strong>Título:</strong> {{ $plan->titulo }}</p>
            <p><strong>Descripción:</strong> {{ $plan->descripcion }}</p>
            <p><strong>Estado:</strong> {{ $plan->estado }}</p>
            <p><strong>Tutor:</strong> {{ $plan->tutor->name ?? 'No asignado' }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('planes.index') }}" class="btn btn-primary">
                <i class="fas fa-arrow-left"></i> Volver a la lista
            </a>
            <a href="{{ route('planes.edit', $plan) }}" class="btn btn-warning">
                <i class="fas fa-edit"></i> Editar Detalles
            </a>
            <form action="{{ route('planes.destroy', $plan) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Estás seguro de eliminar este plan?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">
                    <i class="fas fa-trash-alt"></i> Eliminar
                </button>
            </form>
        </div>
    </div>
@endsection

