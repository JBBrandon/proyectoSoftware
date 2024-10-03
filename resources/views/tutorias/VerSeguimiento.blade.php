<!-- resources/views/tutorias/verSeguimiento.blade.php -->
@extends('layouts.plantilla')

@section('titulo', 'Informe de Seguimiento Académico')

@section('contenido')
    <link rel="stylesheet" href="{{ asset('css/verSeguimiento.css') }}">


    <!-- Datos de ejemplo temporales -->
    @php
    $seguimientos = [
        (object)[
            'created_at' => '2024-10-03',
            'tutor' => (object)[ 'nombre' => 'Tutor 1' ],
            'informe' => 'Informe detallado de progreso académico.',
            'progreso' => '80%'
        ],
        (object)[
            'created_at' => '2024-09-28',
            'tutor' => (object)[ 'nombre' => 'Tutor 2' ],
            'informe' => 'Informe del seguimiento de tutoría.',
            'progreso' => '90%'
        ]
    ];
    @endphp

    <div class="seguimiento-container">
        <h2>Informe de Seguimiento Académico</h2>

        <table>
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Tutor</th>
                    <th>Informe</th>
                    <th>Progreso</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($seguimientos as $seguimiento)
                <tr>
                    <td>{{ $seguimiento->created_at }}</td>
                    <td>{{ $seguimiento->tutor->nombre }}</td>
                    <td>{{ $seguimiento->informe }}</td>
                    <td>{{ $seguimiento->progreso }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <button onclick="window.history.back()">Volver</button>
    </div>
@endsection
