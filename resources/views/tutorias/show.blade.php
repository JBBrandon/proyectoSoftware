<!-- resources/views/tutorias/verPlan.blade.php -->
@extends('adminlte::page')


@section('titulo', 'Ver Plan de Tutoría')

@section('content_header')
@include('layouts.partials.header')

    <link rel="stylesheet" href="{{ asset('css/verPlan.css') }}">

    <h1>Se encontro el registro: {{$tutores->nombre}}</h1>
    <a href="{{route('tutorias.index')}}">Volver a Tutoria</a>
    <a href="{{route('tutorias.edit', $tutores)}}">Editar registro</a>
    <p><strong>Código: {{$tutores->idTutores}}</strong></p>
    <form action="{{route('tutorias.destroy', $tutores)}}" method="POST">
        @csrf
        @method('delete')
        <button type="submmit">Eliminar</button>
    </form>
    @include('layouts.partials.footer')

@endsection
