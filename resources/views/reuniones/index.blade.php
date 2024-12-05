@extends('adminlte::page')

@section('titulo', 'Listado de Reuniones')

@section('content_header')
@include('layouts.partials.header')

<h2>Listado de Reuniones</h2>

<a href="{{ route('reuniones.create') }}" class="btn btn-primary mb-3">
    <i class="fas fa-plus-circle"></i> Crear Nueva Reunión
</a>

<!-- Tabla de reuniones -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Reuniones Programadas</h3>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped">
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
                        <a href="{{ route('reuniones.show', $reunion->id) }}" class="btn btn-warning btn-sm" aria-label="Ver detalles de la reunión">
                            <i class="fas fa-eye"></i> Ver
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Paginación -->
        <div class="d-flex justify-content-center">
            {{ $reuniones->links() }}
        </div>
    </div>
</div>

@include('layouts.partials.footer')

@endsection

