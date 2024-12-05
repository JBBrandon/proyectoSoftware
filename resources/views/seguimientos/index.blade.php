@extends('adminlte::page')

@section('titulo', 'Listado de Seguimientos')

@section('content_header')
@include('layouts.partials.header')

    <h2 class="m-0 text-dark">Listado de Seguimientos</h2>

    <a href="{{ route('seguimientos.create') }}" class="btn btn-success mb-3">
        <i class="fas fa-plus-circle"></i> Crear Nuevo Seguimiento
    </a>

    <table class="table table-bordered table-striped table-hover">
        <thead class="thead-dark">
            <tr>
                <th>ID Seguimiento</th>
                <th>Tutor</th>
                <th>Estudiante</th>
                <th>Informe</th>
                <th>Progreso</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($seguimientos as $seguimiento)
            <tr>
                <td>{{ $seguimiento->idSeguimientos }}</td>
                <td>{{ $seguimiento->tutor_id }}</td>
                <td>{{ $seguimiento->estudiante_id }}</td>
                <td>{{ $seguimiento->informe }}</td>
                <td>{{ $seguimiento->progreso }}</td>
                <td>
                    <a href="{{ route('seguimientos.show', $seguimiento) }}" class="btn btn-warning">
                        <i class="fas fa-eye"></i> Ver
                    </a>
                    <a href="{{ route('seguimientos.edit', $seguimiento) }}" class="btn btn-primary">
                        <i class="fas fa-edit"></i> Editar
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Paginación -->
    <div class="d-flex justify-content-center">
        {{ $seguimientos->links() }}
    </div>

@include('layouts.partials.footer')

@endsection

