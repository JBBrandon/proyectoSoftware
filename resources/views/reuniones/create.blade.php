@extends('adminlte::page')

@section('titulo', 'Crear Nueva Reunión')

@section('content_header')
    @include('layouts.partials.header')
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Crear Nueva Reunión</h3>
        </div>

        <div class="card-body">
            <form action="{{ route('reuniones.store') }}" method="POST">
                @csrf

                <!-- ID Reunión -->
                <div class="form-group">
                    <label for="idReuniones">ID Reunión:</label>
                    <input type="text" name="idReuniones" id="idReuniones" class="form-control" required>
                </div>

                <!-- Tutor ID -->
                <div class="form-group">
                    <label for="tutor_id">Tutor ID:</label>
                    <input type="number" name="tutor_id" id="tutor_id" class="form-control" required>
                </div>

                <!-- Estudiante ID -->
                <div class="form-group">
                    <label for="estudiante_id">Estudiante ID:</label>
                    <input type="number" name="estudiante_id" id="estudiante_id" class="form-control" required>
                </div>

                <!-- Fecha de Reunión -->
                <div class="form-group">
                    <label for="fecha_reunion">Fecha de Reunión:</label>
                    <input type="date" name="fecha_reunion" id="fecha_reunion" class="form-control" required>
                </div>

                <!-- Detalles -->
                <div class="form-group">
                    <label for="detalles">Detalles:</label>
                    <textarea name="detalles" id="detalles" class="form-control" rows="4" required></textarea>
                </div>

                <!-- Estado -->
                <div class="form-group">
                    <label for="estado">Estado:</label>
                    <input type="text" name="estado" id="estado" class="form-control" required>
                </div>

                <!-- Botón para guardar la reunión -->
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Guardar Reunión</button>
                    <a href="{{ route('reuniones.index') }}" class="btn btn-secondary">Volver a Reuniones</a>
                </div>
            </form>
        </div>
    </div>

    @include('layouts.partials.footer')
@endsection

