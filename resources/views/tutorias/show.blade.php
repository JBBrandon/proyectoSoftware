<!-- resources/views/tutorias/verPlan.blade.php -->
@extends('layouts.plantilla')

@section('titulo', 'Ver Plan de Tutoría')

@section('contenido')
    <link rel="stylesheet" href="{{ asset('css/verPlan.css') }}">

    <h1>Se encontro el registro: {{$Tutor->nombre}}</h1>
    <a href="{{route('tutorias.index')}}">Volver a Tutoria</a>
    <p><strong>Codigo:{{$Tutor->idTutores}}</strong></p>

@endsection
