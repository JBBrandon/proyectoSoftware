@extends('adminlte::page')
@extends('layouts.plantilla')
@extends('layouts.app')

@section('content_header')
    <h1>Dashboard</h1>
    @if (session('status'))
        <p>{{ session('status') }}</p>
    @endif

    <p>You are logged in!</p>
@endsection
