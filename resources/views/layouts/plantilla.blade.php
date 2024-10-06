<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo', 'Gestión de Tutorías')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <header>
        <h1>Gestión de Tutorías</h1>
        <nav>
            <ul>
                <li><a href="{{ route('tutorias.index') }}">Inicio</a></li>
                <li><a href="{{ route('planes.index') }}">Plan de Tutoría</a></li>
                <li><a href="{{ route('reunion.index') }}">Reuniones</a></li>
                <li><a href="{{ route('seguimiento.index') }}">Seguimiento</a></li>
                <li><a href="{{ route('estudiante.index') }}">Estudiantes</a></li>
            </ul>
        </nav>
    </header>

    <main>
        @yield('contenido')
    </main>

    <footer>
        <p>Todos los derechos reservados &copy; 2024</p>
    </footer>
</body>
</html>

