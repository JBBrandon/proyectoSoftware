
@extends('adminlte::page')
@extends('layouts.plantilla')

@section('titulo', 'Ver Estudiante')

@section('content_header')
    <h1>Se encontró el registro: {{ $estudiante->nombre }}</h1>

    <a href="{{ route('estudiantes.index') }}">Volver a Estudiantes</a>
    <a href="{{ route('estudiantes.edit', $estudiante) }}">Editar registro</a>

    <p><strong>ID Estudiante: </strong>{{ $estudiante->idEstudiantes }}</p>
    <p><strong>Email: </strong>{{ $estudiante->email }}</p>
    <p><strong>Teléfono: </strong>{{ $estudiante->telefono }}</p>
    <form action="{{route('estudiantes.destroy', $estudiante)}}" method="POST">
        @csrf
        @method('delete')
        <button type="submmit">Eliminar</button>
    </form>
@endsection
