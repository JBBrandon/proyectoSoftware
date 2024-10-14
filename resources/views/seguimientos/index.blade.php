@extends('adminlte::page')
@extends('layouts.plantilla')

@section('titulo', 'Listado de Seguimientos')

@section('contenido')
    <h2>Listado de Seguimientos</h2>

    <a href="{{ route('seguimientos.create') }}">Crear Nuevo Seguimiento</a>

    <table>
        <thead>
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
                        <a href="{{ route('seguimientos.show', $seguimiento) }}">Ver</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $seguimientos->links() }} <!-- Paginación -->
@endsection
