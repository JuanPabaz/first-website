@vite('resources/css/home.css')
@extends('layout')

@section('content')
<div class="home-container">
    <div class="home-section">
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
    <div class="testimonial-section">
        <div class="testimonial-title">
            <h2>Que resultados tan increíbles, me encantó todo. ¡Super recomendado!</h2>
        </div>
        <div class="testimonial-details">
            <img src="{{ asset('images/testimonio-img.png') }}" alt="">
            <div class="person-details">
                <p class="person-name">Valentina</p>
                <p class="person-review">Dueña Restaurante La Ardilla</p>
            </div>

        </div>
    </div>
</div>
@endsection