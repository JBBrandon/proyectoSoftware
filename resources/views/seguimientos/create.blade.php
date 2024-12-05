@extends('adminlte::page')

@section('titulo', 'Registrar Nuevo Seguimiento')

@section('content_header')
@include('layouts.partials.header')

    <h1 class="m-0 text-dark">Registrar un Nuevo Seguimiento</h1>

    <form action="{{ route('seguimientos.store') }}" method="POST">
        @csrf
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Detalles del Seguimiento</h3>
            </div>
            <div class="card-body">

                <!-- Campo para el código idSeguimientos -->
                <div class="form-group">
                    <label for="idSeguimientos">Código del Seguimiento:</label>
                    <input type="text" id="idSeguimientos" name="idSeguimientos" class="form-control" required>
                </div>

                <!-- Campo para el tutor_id -->
                <div class="form-group">
                    <label for="tutor_id">ID del Tutor:</label>
                    <input type="number" id="tutor_id" name="tutor_id" class="form-control" required>
                </div>

                <!-- Campo para el estudiante_id -->
                <div class="form-group">
                    <label for="estudiante_id">ID del Estudiante:</label>
                    <input type="number" id="estudiante_id" name="estudiante_id" class="form-control" required>
                </div>

                <!-- Campo para el informe -->
                <div class="form-group">
                    <label for="informe">Informe:</label>
                    <textarea id="informe" name="informe" class="form-control" rows="4" required></textarea>
                </div>

                <!-- Campo para el progreso -->
                <div class="form-group">
                    <label for="progreso">Progreso:</label>
                    <input type="text" id="progreso" name="progreso" class="form-control" required>
                </div>

            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Registrar Seguimiento</button>
                <a href="{{ route('seguimientos.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </div>
    </form>

@include('layouts.partials.footer')

@endsection
