<header>
    <h1> UNIVERSIDAD CONTINENTAL</h1>

    <nav>
        <ul>
            <li><a href="{{route('home')}} " class="{{request()->routeIs('home') ? 'active' : ''}}">Home</a></li>
            <li><a href="{{route('nosotros')}} " class="{{request()->routeIs('nosotros') ? 'active' : ''}}">Nosotros</a></li>
            <li><a href="{{route('contactanos.index')}}" class="{{request()->routeIs('contactanos.index') ? 'active' : ''}}">Contactanos</a></li>
        </ul>
    </nav>
</header>

<style>
    /* header.css */

    header {
        background-color: #003366; /* Color de fondo */
        color: #ffffff; /* Color del texto */
        padding-top: 70px;
        text-align: center;
    }

    header h1 {
        font-size: 24px;
        margin: 0;
    }

    nav ul {
        list-style: none;
        padding: 0;
        margin: 10px 0;
        display: flex;
        justify-content: center;
    }

    nav ul li {
        margin: 0 15px;
    }

    nav ul li a {
        color: #ffffff;
        text-decoration: none;
        font-weight: bold;
    }

    nav ul li a:hover {
        text-decoration: underline;
    }

    .active {
        text-decoration: underline;
        font-weight: bold;
    }

</style>