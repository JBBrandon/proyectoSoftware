@extends('adminlte::page')


@section('titulo', 'Listado de Seguimientos')

@section('content_header')
@include('layouts.partials.header')

    <h2>Listado de Seguimientos</h2>

    <a href="{{ route('seguimientos.create') }}" class="btn btn-primary" style="margin-bottom: 20px;">Crear Nuevo Seguimiento</a>

    <table class="table table-bordered table-hover">
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
                    <a href="{{ route('seguimientos.show', $seguimiento) }}" class="btn btn-warning">Ver</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $seguimientos->links() }} <!-- Paginación -->
    @include('layouts.partials.footer')

@endsection

