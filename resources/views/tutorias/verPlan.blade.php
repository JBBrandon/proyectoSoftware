<!-- resources/views/tutorias/verPlan.blade.php -->
@extends('layouts.plantilla')

@section('titulo', 'Ver Plan de Tutoría')

@section('contenido')
    <link rel="stylesheet" href="{{ asset('css/verPlan.css') }}">

    <!-- Datos de ejemplo temporales -->
    @php
    $plan = (object)[
        'titulo' => 'Plan de Tutoría 2024',
        'descripcion' => 'Este plan de tutoría está enfocado en mejorar el rendimiento académico de los estudiantes en matemáticas.',
        'created_at' => '2024-01-10',
        'updated_at' => '2024-09-15',
        'estado' => 'Activo'
    ];
    @endphp

    <div class="plan-container">
        <h2>Detalles del Plan de Tutoría</h2>
        
        <h3>Título del Plan:</h3>
        <p>{{ $plan->titulo }}</p>
        
        <h3>Descripción:</h3>
        <p>{{ $plan->descripcion }}</p>
        
        <h3>Otros detalles:</h3>
        <ul>
            <li>Fecha de creación: {{ $plan->created_at }}</li>
            <li>Última actualización: {{ $plan->updated_at }}</li>
            <li>Estado: {{ $plan->estado }}</li>
        </ul>

        <button onclick="window.history.back()">Volver</button>
    </div>
@endsection
