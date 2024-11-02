@extends('adminlte::page')
@extends('layouts.plantilla')

@section('titulo', 'Listado de Planes')

@section('contenido')

    <h2>Listado de Planes de Tutorías</h2>
    <a href="{{route('planes.create')}}" class="btn btn-primary mb-3">Nuevo registro</a>

    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>ID Plan</th>
                <th>Titulo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($planes as $plan)
                <tr>
                    <td>{{ $plan->idPlanes }}</td>
                    <td>{{ $plan->titulo }}</td>
                    <td>
                        <a href="{{route('planes.show', $plan)}}" class="btn btn-warning">Ver</a>
                        <a href="{{route('planes.edit', $plan)}}" class="btn btn-primary">Editar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {{ $planes->links() }} <!-- Paginación -->
    </div>

@endsection

