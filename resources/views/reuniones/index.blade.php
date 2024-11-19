@extends('adminlte::page')
@extends('layouts.plantilla')

@section('titulo', 'Listado de Reuniones')

@section('content_header')
<h2>Listado de Reuniones</h2>

<a href="{{ route('reuniones.create') }}" class="btn btn-primary mb-3">Crear Nueva Reunión</a>

<table class="table table-bordered table-hover">
    <thead class="thead-dark">
        <tr>
            <th>ID Reunión</th>
            <th>Tutor</th>
            <th>Estudiante</th>
            <th>Fecha de Reunión</th>
            <th>Detalles</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($reuniones as $reunion)
        <tr>
            <td>{{ $reunion->idReuniones }}</td>
            <td>{{ $reunion->tutor_id }}</td>
            <td>{{ $reunion->estudiante_id }}</td>
            <td>{{ $reunion->fecha_reunion }}</td>
            <td>{{ $reunion->detalles }}</td>
            <td>{{ $reunion->estado }}</td>
            <td>
                <a href="{{ route('reuniones.show', $reunion->id) }}" class="btn btn-warning">Ver</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $reuniones->links() }} <!-- Paginación -->
@endsection
