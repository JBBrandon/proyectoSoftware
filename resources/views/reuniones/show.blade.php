@extends('adminlte::page')
@extends('layouts.plantilla')

@section('titulo', 'Detalles de la Reunión')

@section('content_header')
    <h2>Detalles de la Reunión: {{ $reuniones->idReuniones }}</h2>

    <p><strong>Tutor ID:</strong> {{ $reuniones->tutor_id }}</p>
    <p><strong>Estudiante ID:</strong> {{ $reuniones->estudiante_id }}</p>
    <p><strong>Fecha de Reunión:</strong> {{ $reuniones->fecha_reunion }}</p>
    <p><strong>Detalles:</strong> {{ $reuniones->detalles }}</p>
    <p><strong>Estado:</strong> {{ $reuniones->estado }}</p>

    <a href="{{ route('reuniones.index') }}">Volver a la lista de reuniones</a>
    <a href="{{ route('reuniones.edit', $reuniones) }}">Editar Reunión</a>
    <form action="{{route('reuniones.destroy', $reuniones)}}" method="POST">
        @csrf
        @method('delete')
        <button type="submmit">Eliminar</button>
    </form>
@endsection
