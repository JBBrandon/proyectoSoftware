@extends('adminlte::page')


@section('titulo', 'Nosotros')

@section('content_header')
@include('layouts.partials.header')

    <h1>Nosotros</h1>
    <p>Somos un equipo de 3 integrantes que trabaja en este proyecto con dedicación y esfuerzo.</p>

    <h2>Integrantes del Grupo</h2>
    <ul>
        <li><strong>Edison Willian Costillo</strong></li>
        <li><strong>Jerry Brandon Cruz Mamani</strong></li>
        <li><strong>Alejandro Humberto Guevara Valdivia</strong></li>
    </ul>

    <p>Cada uno de nosotros tiene un papel fundamental en el desarrollo del proyecto, aportando habilidades y conocimientos para alcanzar los objetivos.</p>
    @include('layouts.partials.footer')

@endsection
