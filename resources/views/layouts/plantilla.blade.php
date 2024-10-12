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
        <h1>Universidad Continental</h1>
        <nav>
            <ul>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('nosotros') }}">nosotro</a></li>
                <li><a href="{{ route('tutorias.index') }}">Tutores</a></li>
                <li><a href="{{ route('planes.index') }}">Plan de Tutoría</a></li>
                <li><a href="{{ route('reuniones.index') }}">Reuniones</a></li>
                <li><a href="{{ route('seguimientos.index') }}">Seguimiento</a></li>
                <li><a href="{{ route('estudiantes.index') }}">Estudiantes</a></li>
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

