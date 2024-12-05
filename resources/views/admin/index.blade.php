@extends('adminlte::page')

@section('title', 'Dashboard Administración')

@section('content_header')
    @include('layouts.partials.header')  <!-- Incluir encabezado -->
    <h1 class="m-0 text-dark">Dashboard Administración</h1>
@endsection

@section('content')
    <!-- Main Content -->
    <div class="row">
        <!-- Card for User Info -->
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Bienvenido, {{ Auth::user()->name }}!</h3>
                </div>
                <div class="card-body">
                    <p><strong>Nombre de usuario:</strong> {{ Auth::user()->name }}</p>
                    <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
                    <p><strong>Rol:</strong> {{ Auth::user()->role ?? 'Usuario' }}</p>
                </div>
            </div>
        </div>

        <!-- Card for Statistics -->
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Estadísticas</h3>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <i class="fas fa-users"></i> Total de Tutores: 10
                        </li>
                        <li class="list-group-item">
                            <i class="fas fa-book"></i> Total de Planes: 50
                        </li>
                        <li class="list-group-item">
                            <i class="fas fa-clipboard-check"></i> Tareas Completadas: 40
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Quick Links Card -->
        <div class="col-lg-4 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Enlaces Rápidos</h3>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <a href="{{ url('tutorias') }}"><i class="fas fa-chalkboard-teacher"></i> Inducción a los Tutores</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{ url('planes') }}"><i class="fas fa-file-alt"></i> Informe de Plan de Tutoría</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{ url('reuniones') }}"><i class="fas fa-users"></i> Reuniones de Tutoría Personalizada</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{ url('seguimientos') }}"><i class="fas fa-clipboard-list"></i> Informes de Seguimiento Académico</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Welcome Message -->
    <div class="mt-4">
        <p class="lead">Bienvenido a tu panel de administración. Desde aquí puedes gestionar todos los aspectos de la plataforma.</p>
        <p>Explora los enlaces rápidos a la derecha para comenzar a gestionar tus planes, tutores y mucho más.</p>
    </div>
@endsection

@section('content_footer')
    @include('layouts.partials.footer')  <!-- Incluir pie de página -->
@endsection
