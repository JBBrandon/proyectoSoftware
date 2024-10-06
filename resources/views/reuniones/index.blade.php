@extends('layouts.plantilla')

@section('titulo', 'Listado de Reuniones')

@section('contenido')
    <h2>Listado de Reuniones</h2>
    
    <a href="{{ route('reuniones.create') }}">Crear Nueva Reunión</a>

    <table>
        <thead>
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
            @foreach ($reuniones as $Reunion)
                <tr>
                    <td>{{ $Reunion->idReuniones }}</td>
                    <td>{{ $Reunion->tutor_id }}</td>
                    <td>{{ $Reunion->estudiante_id }}</td>
                    <td>{{ $Reunion->fecha_reunion }}</td>
                    <td>{{ $Reunion->detalles }}</td>
                    <td>{{ $Reunion->estado }}</td>
                    <td>
                        <a href="{{ route('reuniones.show', $Reunion->id) }}">Ver</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $reuniones->links() }} <!-- Paginación -->
@endsection
