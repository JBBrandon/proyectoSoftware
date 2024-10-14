@extends('adminlte::page')
@extends('layouts.plantilla')

@section('titulo', 'Página Principal')

@section('contenido')
    <!--<link rel="stylesheet" href="{{ asset('css/index.css') }}">-->
    
    <h2>Bienvenido a la página principal de Gestión de Tutorías</h2>
    <p>Desde aquí puedes gestionar las funciones de tutoría.</p>

    <a href="{{route('tutorias.create')}}">Nuevo registro</a>
    <ul>
        @foreach($tutores as $Tutor)
            <li>
             <a href="{{route('tutorias.show' , $Tutor->id)}}">{{$Tutor->nombre}}</a>
            </li>
        @endforeach
    </ul>
    {{$tutores->links()}}
@endsection
