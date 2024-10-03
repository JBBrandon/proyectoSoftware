<!-- resources/views/tutorias/verReuniones.blade.php -->
@extends('layouts.plantilla')

@section('titulo', 'Reuniones de Tutoría Personalizada')

@section('contenido')
    <link rel="stylesheet" href="{{ asset('css/verReuniones.css') }}">
    <!-- Datos de ejemplo temporales -->
    @php
    $reuniones = [
        (object)[
            'fecha_reunion' => '2024-10-03',
            'tutor' => (object)[ 'nombre' => 'Tutor 1' ],
            'detalles' => 'Reunión con el tutor 1',
            'estado' => 'Programada'
        ],
        (object)[
            'fecha_reunion' => '2024-10-05',
            'tutor' => (object)[ 'nombre' => 'Tutor 2' ],
            'detalles' => 'Reunión con el tutor 2',
            'estado' => 'Completada'
        ]
    ];
    @endphp

    <div class="reunion-container">
        <h2>Lista de Reuniones Programadas</h2>

        <table>
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Tutor</th>
                    <th>Detalles</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reuniones as $reunion)
                <tr>
                    <td>{{ $reunion->fecha_reunion }}</td>
                    <td>{{ $reunion->tutor->nombre }}</td>
                    <td>{{ $reunion->detalles }}</td>
                    <td>{{ $reunion->estado }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <button onclick="window.history.back()">Volver</button>
    </div>
@endsection
