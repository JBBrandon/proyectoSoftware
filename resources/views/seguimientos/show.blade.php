@extends('adminlte::page')
@extends('layouts.plantilla')

@section('titulo', 'Ver Seguimiento')

@section('contenido')
    <h1>Se encontró el registro: {{ $seguimiento->idSeguimientos }}</h1>

    <a href="{{ route('seguimientos.index') }}">Volver a Seguimientos</a>
    <a href="{{ route('seguimientos.edit', $seguimiento) }}">Editar registro</a>

    <p><strong>Tutor ID: </strong>{{ $seguimiento->tutor_id }}</p>
    <p><strong>Estudiante ID: </strong>{{ $seguimiento->estudiante_id }}</p>
    <p><strong>Informe: </strong>{{ $seguimiento->informe }}</p>
    <p><strong>Progreso: </strong>{{ $seguimiento->progreso }}</p>
@endsection
