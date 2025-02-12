<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Proyecto de Gestión de Tutorías

Este es un proyecto de gestión de tutorías desarrollado con Laravel. Permite gestionar tutorías, planes, reuniones, seguimientos y estudiantes.

## Requisitos

- PHP >= 7.3
- Composer
- Laravel >= 8.x
- MySQL

## Instalación

1. Clona el repositorio:
    ```bash
    git clone https://github.com/tu-usuario/proyectoSoftware.git
    ```

2. Navega al directorio del proyecto:
    ```bash
    cd proyectoSoftware
    ```

3. Instala las dependencias de Composer:
    ```bash
    composer install
    ```

4. Copia el archivo `.env.example` a `.env` y configura tu base de datos:
    ```bash
    cp .env.example .env
    ```

5. Genera la clave de la aplicación:
    ```bash
    php artisan key:generate
    ```

6. Ejecuta las migraciones de la base de datos:
    ```bash
    php artisan migrate
    ```

7. Inicia el servidor de desarrollo:
    ```bash
    php artisan serve
    ```

## Uso

### Autenticación

El proyecto utiliza autenticación. Puedes registrarte y luego iniciar sesión para acceder a las funcionalidades.

### Gestión de Tutorías

- **Listar Tutorías:** Navega a `/tutorias` para ver todas las tutorías.
- **Crear Tutoría:** Navega a `/tutorias/create` para crear una nueva tutoría.
- **Ver Tutoría:** Navega a `/tutorias/{id}` para ver los detalles de una tutoría.
- **Editar Tutoría:** Navega a `/tutorias/{id}/edit` para editar una tutoría.
- **Eliminar Tutoría:** Puedes eliminar una tutoría desde la vista de detalles.

### Gestión de Planes

- **Listar Planes:** Navega a `/planes` para ver todos los planes.
- **Crear Plan:** Navega a `/planes/create` para crear un nuevo plan.
- **Ver Plan:** Navega a `/planes/{id}` para ver los detalles de un plan.
- **Editar Plan:** Navega a `/planes/{id}/edit` para editar un plan.
- **Eliminar Plan:** Puedes eliminar un plan desde la vista de detalles.

### Gestión de Reuniones

- **Listar Reuniones:** Navega a `/reuniones` para ver todas las reuniones.
- **Crear Reunión:** Navega a `/reuniones/create` para crear una nueva reunión.
- **Ver Reunión:** Navega a `/reuniones/{id}` para ver los detalles de una reunión.
- **Editar Reunión:** Navega a `/reuniones/{id}/edit` para editar una reunión.
- **Eliminar Reunión:** Puedes eliminar una reunión desde la vista de detalles.

### Gestión de Seguimientos

- **Listar Seguimientos:** Navega a `/seguimientos` para ver todos los seguimientos.
- **Crear Seguimiento:** Navega a `/seguimientos/create` para crear un nuevo seguimiento.
- **Ver Seguimiento:** Navega a `/seguimientos/{id}` para ver los detalles de un seguimiento.
- **Editar Seguimiento:** Navega a `/seguimientos/{id}/edit` para editar un seguimiento.
- **Eliminar Seguimiento:** Puedes eliminar un seguimiento desde la vista de detalles.

### Gestión de Estudiantes

- **Listar Estudiantes:** Navega a `/estudiantes` para ver todos los estudiantes.
- **Crear Estudiante:** Navega a `/estudiantes/create` para crear un nuevo estudiante.
- **Ver Estudiante:** Navega a `/estudiantes/{id}` para ver los detalles de un estudiante.
- **Editar Estudiante:** Navega a `/estudiantes/{id}/edit` para editar un estudiante.
- **Eliminar Estudiante:** Puedes eliminar un estudiante desde la vista de detalles.

## Contacto

Para cualquier consulta, puedes contactarnos a través de la página de contacto en `/contactanos`.

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
