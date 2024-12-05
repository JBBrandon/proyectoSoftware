@extends('adminlte::page')

@section('titulo', 'Página Principal')

@section('content_header')
@include('layouts.partials.header')

<p class="lead">Desde aquí puedes gestionar las funciones de tutoría.</p>

<div class="mb-3">
    <a href="{{ route('tutorias.create') }}" class="btn btn-primary">
        <i class="fas fa-plus-circle"></i> Nuevo registro
    </a>
</div>

<!-- Tabla de Tutores -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Lista de Tutores</h3>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID Tutor</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tutores as $tutor)
                    <tr>
                        <td>{{ $tutor->idTutores }}</td>
                        <td>{{ $tutor->nombre }}</td>
                        <td>
                            <a href="{{ route('tutorias.show', $tutor->id) }}" class="btn btn-info btn-sm" aria-label="Ver detalles de {{ $tutor->nombre }}">
                                <i class="fas fa-eye"></i> Ver
                            </a>
                            <a href="{{ route('tutorias.edit', $tutor->id) }}" class="btn btn-warning btn-sm" aria-label="Editar {{ $tutor->nombre }}">
                                <i class="fas fa-edit"></i> Editar
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@include('layouts.partials.footer')

@endsection
