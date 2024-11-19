@extends('adminlte::page')
@extends('layouts.plantilla')

@section('titulo', 'Página Principal')

@section('content_header')
    <p >Desde aquí puedes gestionar las funciones de tutoría.</p>

    <div >
        <a href="{{ route('tutorias.create') }}">
            Nuevo registro
        </a>
    </div>

    <table  class="table table-bordered table-hover">
        <thead>
            <tr >
                <th >ID Tutor</th>
                <th >Nombre</th>
                <th >Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tutores as $tutor)
                <tr >
                    <td >{{ $tutor->id }}</td>
                    <td >{{ $tutor->nombre }}</td>
                    <td >
                        <a href="{{ route('tutorias.show', $tutor->id) }}" aria-label="Ver detalles de {{ $tutor->nombre }}">Ver </a>
                        <a href="{{ route('tutorias.edit', $tutor->id) }}" aria-label="Editar {{ $tutor->nombre }}"> Editar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    

    
@endsection
