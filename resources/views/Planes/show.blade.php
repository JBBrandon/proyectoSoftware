<!-- resources/views/planes/show.blade.php -->
@extends('layouts.plantilla')

@section('titulo', 'Detalles del Plan')

@section('contenido')
    <h2>Detalles del Plan: {{ $plan->titulo }}</h2>
    <a href="{{ route('planes.index') }}">Volver</a>
    <a href="{{ route('planes.edit', $plan) }}">Editar detalles</a>
    <p><strong>Código del Plan: {{ $plan->idPlanes }}</strong></p>
    
@endsection
