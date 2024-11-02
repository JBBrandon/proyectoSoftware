<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo', 'Gestión de Tutorías')</title>
    <!-- Puedes incluir algún framework CSS como Bootstrap si lo deseas -->
</head>
<body>
    <header style="background-color: #2c3e50; padding: 15px; text-align: center;">
        <h1 style="color: white; font-size: 2rem;">Universidad Continental</h1>
        <nav>
            <ul style="list-style: none; padding: 0; margin: 10px 0;">
                <li style="display: inline; margin-right: 20px;">
                    <a href="{{ route('home') }}" style="color: white; text-decoration: none; background-color: #3490dc; padding: 10px 20px; border-radius: 5px;">Home</a>
                </li>
                <li style="display: inline; margin-right: 20px;">
                    <a href="{{ route('nosotros') }}" style="color: white; text-decoration: none; background-color: #3490dc; padding: 10px 20px; border-radius: 5px;">Nosotros</a>
                </li>
                
            </ul>
        </nav>
    </header>

    <main style="padding: 20px; max-width: 1200px; margin: 20px auto; background-color: white; border-radius: 8px; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);">
        @yield('contenido')
    </main>

    <footer style="text-align: center; background-color: #2c3e50; color: white; padding: 15px; position: relative; bottom: 0; width: 100%;">
        <p>Todos los derechos reservados &copy; 2024</p>
    </footer>
</body>
</html>
