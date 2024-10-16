
@extends('adminlte::page')
@extends('layouts.plantilla')

@section('titulo', 'Ver Estudiante')

@section('contenido')
    <h1>Se encontró el registro: {{ $estudiante->nombre }}</h1>

    <a href="{{ route('estudiantes.index') }}">Volver a Estudiantes</a>
    <a href="{{ route('estudiantes.edit', $estudiante) }}">Editar registro</a>

    <p><strong>ID Estudiante: </strong>{{ $estudiante->idEstudiantes }}</p>
    <p><strong>Email: </strong>{{ $estudiante->email }}</p>
    <p><strong>Teléfono: </strong>{{ $estudiante->telefono }}</p>
@endsection
