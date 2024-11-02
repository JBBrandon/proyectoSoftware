<!-- resources/views/planes/show.blade.php -->
@extends('adminlte::page')
@extends('layouts.plantilla')

@section('titulo', 'Detalles del Plan')

@section('contenido')
    <h1>Detalles del Plan: {{ $plan->titulo}}</h1>
    
    <a href="{{ route('planes.index') }}">Volver</a>
    <a href="{{ route('planes.edit', $plan) }}">Editar detalles</a>
    <p><strong>Código del Plan: {{ $plan->idPlanes }}</strong></p>
    <form action="{{route('planes.destroy', $plan)}} " method="POST">
        @csrf
        @method('delete')
        <button type="submmit">Eliminar</button>
    </form>
@endsection
