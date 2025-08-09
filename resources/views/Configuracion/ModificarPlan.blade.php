@extends('dashboard')
{{-- @section('Contenedor','main-container') --}}
@section('Contenido')

@vite(['resources/css/app.css', 'resources/login_f/login.css'])

<div class="container-fluid bg-white my-5 py-5 ">
    <span class="textAzul" style="font-size: 2rem"><b>Modificar plan</b></span><hr>
    <div class="pt-5">
        <x-planes></x-planes>
    </div>
</div>

@stop
