@extends('adminlte::page')
@extends('layouts.plantilla')

@section('titulo', 'Página Principal')

@section('contenido')
    <h2 style="text-align: center; color: #2c3e50;">Bienvenido a la página principal de Gestión de Tutorías</h2>
    <p style="text-align: center; color: #6c757d;">Desde aquí puedes gestionar las funciones de tutoría.</p>

    <div style="text-align: center; margin-bottom: 20px;">
        <a href="{{ route('tutorias.create') }}" style="display: inline-block; background-color: #007bff; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;">
            Nuevo registro
        </a>
    </div>

    <table style="width: 100%; border-collapse: collapse; margin: 20px auto; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);">
        <thead>
            <tr style="background-color: #343a40; color: white;">
                <th style="padding: 10px; text-align: left;">ID Tutor</th>
                <th style="padding: 10px; text-align: left;">Nombre</th>
                <th style="padding: 10px; text-align: left;">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tutores as $tutor)
                <tr style="background-color: #f8f9fa; border-bottom: 1px solid #ddd;">
                    <td style="padding: 10px;">{{ $tutor->id }}</td>
                    <td style="padding: 10px;">{{ $tutor->nombre }}</td>
                    <td style="padding: 10px;">
                        <a href="{{ route('tutorias.show', $tutor->id) }}" aria-label="Ver detalles de {{ $tutor->nombre }}" 
                           style="background-color: #ffc107; padding: 8px 15px; color: black; text-decoration: none; border-radius: 5px; margin-right: 5px;">
                            Ver
                        </a>
                        <a href="{{ route('tutorias.edit', $tutor->id) }}" aria-label="Editar {{ $tutor->nombre }}"
                           style="background-color: #007bff; padding: 8px 15px; color: white; text-decoration: none; border-radius: 5px;">
                            Editar
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    

    <!-- Paginación -->
    <div style="text-align: center; margin-top: 20px;">
        <ul class="pagination" style="display: inline-block; padding-left: 0; list-style: none;">
            {{ $tutores->links() }}
        </ul>
    </div>
    <style>
            /* Estilo cuando la barra lateral está expandida */
        .sidebar-expanded table {
            width: calc(100% - 250px); /* Ajusta el ancho de la tabla cuando la barra lateral está expandida */
            transition: width 0.3s ease; /* Transición suave para el ajuste */
        }

        /* Estilo cuando la barra lateral está colapsada */
        .sidebar-collapsed table {
            width: 100%; /* La tabla ocupa todo el ancho cuando la barra lateral está colapsada */
            transition: width 0.3s ease; /* Transición suave para el ajuste */
        }
        svg {
            width: 15px; /* Ajusta el tamaño de las flechas aquí */
            height: 15px;
        }
        .pagination .page-item .page-link {
        padding: 8px 12px; /* Ajusta el padding de los botones */
        border: 1px solid #ddd;
        color: #3490dc;
        font-size: 1rem; /* Ajusta el tamaño del texto */
        transition: background-color 0.3s ease;
        }

        .pagination .page-item .page-link:hover {
            background-color: #3490dc; /* Color de fondo al pasar el mouse */
            color: white; /* Cambia el color del texto al pasar el mouse */
            border-color: #3490dc; /* Color del borde al pasar el mouse */
        }

        .pagination .page-item.active .page-link {
            background-color: #3490dc;
            border-color: #3490dc;
            color: white;
        }
    </style>
    
@endsection
