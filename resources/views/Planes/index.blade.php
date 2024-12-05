@extends('adminlte::page')

@section('titulo', 'Listado de Planes')

@section('content_header')
    @include('layouts.partials.header')
    <h2>Listado de Planes de Tutorías</h2>
@endsection

@section('content')
    <!-- Botón para agregar un nuevo plan -->
    <a href="{{ route('planes.create') }}" class="btn btn-primary mb-3">
        <i class="fas fa-plus-circle"></i> Nuevo Registro
    </a>

    <!-- Tabla de Planes -->
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered table-striped table-hover">
                <thead class="thead-light">
                    <tr>
                        <th>ID Plan</th>
                        <th>Título</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($planes as $plan)
                        <tr>
                            <td>{{ $plan->idPlanes }}</td>
                            <td>{{ $plan->titulo }}</td>
                            <td>
                                <a href="{{ route('planes.show', $plan) }}" class="btn btn-warning">
                                    <i class="fas fa-eye"></i> Ver
                                </a>
                                <a href="{{ route('planes.edit', $plan) }}" class="btn btn-primary">
                                    <i class="fas fa-edit"></i> Editar
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Paginación -->
    <div class="d-flex justify-content-center mt-3">
        {{ $planes->links() }}
    </div>

    @include('layouts.partials.footer')
@endsection


