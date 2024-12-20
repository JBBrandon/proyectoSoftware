<!-- Footer -->
<footer class="footer">
    <p>&copy; {{ date('Y') }} Mi Empresa. Todos los derechos reservados.</p>
    <p>Contacto: <a href="mailto:contacto@miempresa.com">contacto@miempresa.com</a></p>
</footer>

<style>
    /* styles.css */

    /* Hacer que el body ocupe el 100% de la altura de la ventana */
    html, body {
        height: 100%;
        margin: 0;
        display: flex;
        flex-direction: column;
    }

    /* Contenedor del contenido principal */
    .content {
        flex: 1;
        padding: 20px; /* Ajusta el relleno como desees */
    }

    /* Footer pegajoso */
    .footer {
        background-color: #333;
        color: white;
        text-align: center;
        padding: 10px 0;
        width: 100%;
    }
    .footer a {
        color: #f0ad4e;
        text-decoration: none;
    }
    .footer a:hover {
        color: #ffc107;
    }

</style>