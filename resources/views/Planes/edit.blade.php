@extends('adminlte::page')

@section('titulo', 'Editar Plan')

@section('content_header')
    @include('layouts.partials.header')
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Editar Plan: {{ $plan->titulo }}</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('planes.update', $plan) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Campo para el código del plan -->
                <div class="form-group">
                    <label for="idPlanes">Código del Plan:</label>
                    <input type="text" id="idPlanes" name="idPlanes" class="form-control" value="{{ $plan->idPlanes }}" required>
                </div>

                <!-- Campo para el título del plan -->
                <div class="form-group">
                    <label for="titulo">Título del Plan:</label>
                    <input type="text" id="titulo" name="titulo" class="form-control" value="{{ $plan->titulo }}" required>
                </div>

                <!-- Campo para la descripción -->
                <div class="form-group">
                    <label for="descripcion">Descripción:</label>
                    <textarea id="descripcion" name="descripcion" class="form-control" rows="4" required>{{ $plan->descripcion }}</textarea>
                </div>

                <!-- Campo para el estado -->
                <div class="form-group">
                    <label for="estado">Estado:</label>
                    <input type="text" id="estado" name="estado" class="form-control" value="{{ $plan->estado }}" required>
                </div>

                <!-- Campo para el ID del tutor -->
                <div class="form-group">
                    <label for="tutor_id">ID del Tutor:</label>
                    <input type="number" id="tutor_id" name="tutor_id" class="form-control" value="{{ $plan->tutor_id }}" required>
                </div>

                <!-- Botones de acción -->
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Actualizar Plan</button>
                    <a href="{{ route('planes.index') }}" class="btn btn-secondary">Volver a la lista</a>
                </div>
            </form>
        </div>
    </div>

    @include('layouts.partials.footer')
@endsection
