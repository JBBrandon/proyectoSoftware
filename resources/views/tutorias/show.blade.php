<!-- resources/views/tutorias/verPlan.blade.php -->
@extends('layouts.plantilla')

@section('titulo', 'Ver Plan de Tutoría')

@section('contenido')
    <link rel="stylesheet" href="{{ asset('css/verPlan.css') }}">

    <h1>Se encontro el registro: {{$tutores->nombre}}</h1>
    <a href="{{route('tutorias.index')}}">Volver a Tutoria</a>
    <a href="{{route('tutorias.edit', $tutores)}}">Editar registro</a>
    <p><strong>Código: {{$tutores->idTutores}}</strong></p>
    <form action="{{route('tutorias.destroy', $tutores)}}">
        @csrf
        @method('delete')
        <button type="submmit">Eliminar</button>
    </form>
    
@endsection
