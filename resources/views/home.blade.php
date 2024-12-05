@extends('adminlte::page')

@section('titulo', 'Inicio')

@section('content_header')
@include('layouts.partials.header')

    <div class="row">
        <!-- Card for User Info -->
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Welcome Back, {{ Auth::user()->name }}!</h3>
                </div>
                <div class="card-body">
                    <p><strong>Username:</strong> {{ Auth::user()->name }}</p>
                    <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
                    <p><strong>Role:</strong> {{ Auth::user()->role ?? 'User' }}</p>
                </div>
            </div>
        </div>

        <!-- Quick Links Card -->
        <div class="col-lg-4 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Quick Links</h3>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <a href="{{ url('tutorias') }}"><i class="fas fa-chalkboard-teacher"></i> Inducción a los tutores</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{ url('planes') }}"><i class="fas fa-file-alt"></i> Informe de Plan de Tutoría</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{ url('reuniones') }}"><i class="fas fa-users"></i> Reuniones de tutoría personalizada</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{ url('seguimientos') }}"><i class="fas fa-clipboard-list"></i> Informes de seguimiento académico</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{ url('estudiantes') }}"><i class="fas fa-users"></i> Informes de Estudiantes académico</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

@include('layouts.partials.footer')

@endsection