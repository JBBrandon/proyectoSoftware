@extends('adminlte::page')
@extends('layouts.plantilla')

@section('titulo', 'Listado de Estudiantes')

@section('contenido')
    <h2>Listado de Estudiantes</h2>

    <a href="{{ route('estudiantes.create') }}">Crear Nuevo Estudiante</a>

    <table>
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
                        <a href="{{ route('estudiantes.show', $estudiante->id) }}">Ver</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $estudiantes->links() }} <!-- Paginación -->
@endsection
