@vite('resources/css/home.css')
@extends('layout')

@section('content')
<div class="home-container">
    <div class="home-content">
        <h1>Diseñando historias, construyendo sueños.</h1>
        <p>Somos un equipo joven que transforma ideas en proyectos reales,
            acompañándote de pricipio a fin para construir sueños que se 
            viven.
        </p>
        <div class="home-content-buttons">
            <button class="projects-button">Proyectos 360</button>
            <button class="cotizar-button">¡Quiero cotizar!</button>
        </div>
    </div>
    <div class="home-image">
        <img src="{{ asset('images/project-vuotta.jpeg') }}" alt="">
    </div>
</div>
@endsection