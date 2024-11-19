@extends('adminlte::page')
@extends('layouts.plantilla')

@section('titulo', 'Ver Seguimiento')

@section('content_header')
    <h1>Se encontró el registro: {{ $seguimiento->idSeguimientos }}</h1>

    <a href="{{ route('seguimientos.index') }}">Volver a Seguimientos</a>
    <a href="{{ route('seguimientos.edit', $seguimiento) }}">Editar registro</a>

    <p><strong>Tutor ID: </strong>{{ $seguimiento->tutor_id }}</p>
    <p><strong>Estudiante ID: </strong>{{ $seguimiento->estudiante_id }}</p>
    <p><strong>Informe: </strong>{{ $seguimiento->informe }}</p>
    <p><strong>Progreso: </strong>{{ $seguimiento->progreso }}</p>
    <form action="{{route('seguimientos.destroy', $seguimiento)}}" method="POST">
        @csrf
        @method('delete')
        <button type="submmit">Eliminar</button>
    </form>
@endsection
