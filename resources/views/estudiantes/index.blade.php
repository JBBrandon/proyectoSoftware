@extends('adminlte::page')

@section('titulo', 'Listado de Estudiantes')

@section('content_header')
    @include('layouts.partials.header')
    <h2 class="text-2xl font-semibold mb-4">Listado de Estudiantes</h2>

    <a href="{{ route('estudiantes.create') }}" class="btn btn-primary mb-3 px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">Crear Nuevo Estudiante</a>
    
@endsection

@section('content')
    <div class="min-h-screen flex justify-center items-center">
        <div class="w-full max-w-6xl bg-white p-6 rounded-lg shadow-lg">
            <table class="table-auto w-full border-collapse border border-gray-300">
                <thead>
                    <tr>
                        <th class="px-4 py-2 border border-gray-300 bg-gray-100 text-left">ID Estudiante</th>
                        <th class="px-4 py-2 border border-gray-300 bg-gray-100 text-left">Nombre</th>
                        <th class="px-4 py-2 border border-gray-300 bg-gray-100 text-left">Email</th>
                        <th class="px-4 py-2 border border-gray-300 bg-gray-100 text-left">Teléfono</th>
                        <th class="px-4 py-2 border border-gray-300 bg-gray-100 text-left">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($estudiantes as $estudiante)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-2 border border-gray-300">{{ $estudiante->idEstudiantes }}</td>
                            <td class="px-4 py-2 border border-gray-300">{{ $estudiante->nombre }}</td>
                            <td class="px-4 py-2 border border-gray-300">{{ $estudiante->email }}</td>
                            <td class="px-4 py-2 border border-gray-300">{{ $estudiante->telefono }}</td>
                            <td class="px-4 py-2 border border-gray-300">
                                <a href="{{ route('estudiantes.show', $estudiante->id) }}" class="btn btn-warning px-4 py-2 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600">Ver</a>
                                <a href="{{ route('estudiantes.edit', $estudiante->id) }}" class="btn btn-primary px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">Editar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
    <div class="flex justify-center mt-4">
        {{ $estudiantes->links() }} <!-- Paginación -->
    </div>

    @include('layouts.partials.footer')
@endsection


