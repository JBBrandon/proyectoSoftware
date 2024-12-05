@extends('adminlte::page')

@section('titulo', 'Editar Estudiante')

@section('content_header')
    @include('layouts.partials.header')
    <h1 class="text-center">Editar Estudiante</h1>
@endsection

@section('content')
    <div class="container my-4">
        <div class="card shadow-lg">
            <div class="card-header bg-primary text-white">
                <h3 class="card-title">Formulario de Edición de Estudiante</h3>
            </div>

            <div class="card-body">
                <form action="{{ route('estudiantes.update', $estudiante) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Campo para el código idEstudiantes -->
                    <div class="mb-3">
                        <label for="idEstudiantes" class="form-label">Código del Estudiante:</label>
                        <input type="text" id="idEstudiantes" name="idEstudiantes" value="{{ $estudiante->idEstudiantes }}" class="form-control" required>
                    </div>

                    <!-- Campo para el nombre -->
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre del Estudiante:</label>
                        <input type="text" id="nombre" name="nombre" value="{{ $estudiante->nombre }}" class="form-control" required>
                    </div>

                    <!-- Campo para el email -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email del Estudiante:</label>
                        <input type="email" id="email" name="email" value="{{ $estudiante->email }}" class="form-control" required>
                    </div>

                    <!-- Campo para el teléfono -->
                    <div class="mb-3">
                        <label for="telefono" class="form-label">Teléfono del Estudiante:</label>
                        <input type="text" id="telefono" name="telefono" value="{{ $estudiante->telefono }}" class="form-control" required>
                    </div>

                    <!-- Botón para guardar el formulario -->
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Actualizar Estudiante</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@include('layouts.partials.footer')

