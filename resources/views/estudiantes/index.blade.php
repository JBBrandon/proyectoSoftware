@extends('adminlte::page')
@extends('layouts.plantilla')

@section('titulo', 'Listado de Estudiantes')

@section('content_header')

    <h2>Listado de Estudiantes</h2>

    <a href="{{ route('estudiantes.create') }}" class="btn btn-primary mb-3">Crear Nuevo Estudiante</a>

    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>ID Estudiante</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($estudiantes as $estudiante)
                <tr>
                    <td>{{ $estudiante->idEstudiantes }}</td>
                    <td>{{ $estudiante->nombre }}</td>
                    <td>{{ $estudiante->email }}</td>
                    <td>{{ $estudiante->telefono }}</td>
                    <td>
                        <a href="{{ route('estudiantes.show', $estudiante->id) }}" class="btn btn-warning">Ver</a>
                        <a href="{{ route('estudiantes.edit', $estudiante->id) }}" class="btn btn-primary">Editar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {{ $estudiantes->links() }} <!-- Paginación -->
    </div>

@endsection
