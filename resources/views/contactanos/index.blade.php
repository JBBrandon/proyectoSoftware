@extends('adminlte::page')
@extends('layouts.plantilla')

@section('title', 'Contactanos')

@section('content_header')
    <h1>Dejanos un mensaje</h1>
    
    <form action="{{route('contactanos.store')}}" method="POST">
        @csrf
        <label >
            Nombre:
            <br>
            <input type="text" name="nombre">
        </label>
        <br>

        @error('nombre')
            <p><strong>{{$message}}</strong></p>
        @enderror

        <label >
            Correo:
            <br>
            <input type="text" name="correo">
        </label>
        <br>

        @error('correo')
            <p><strong>{{$message}}</strong></p>
        @enderror


        <label >
            Mensaje:
            <br>
            <textarea name="mensaje" rows="5">{{old('mensaje')}}</textarea>
        </label>
        <br>

        @error('mensaje')
            <p><strong>{{$message}}</strong></p>
        @enderror

        <button type="submit">
            Enviar Mensaje
        </button>
    </form>
@endsection