@extends('layouts.plantilla')

@section('titulo', 'Página Principal')

@section('contenido')
    
    
    <h2>Bienvenido a la página principal de Planes de Tutorías</h2>
    <p>Desde aquí puedes gestionar las funciones de los Planes.</p>

    <a href="{{route('planes.create')}}">Nuevo registro</a>
    <ul>
        @foreach($planes as $Plan)
            <li>
             <a href="{{route('planes.show' , $Plan->idPlanes)}}">{{$Plan->nombre}}</a>
            </li>
        @endforeach
    </ul>
    {{$planes->links()}}
@endsection
