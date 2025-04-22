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
    <div class="project-prelude">
        <p class="project-prelude-title">Proyectos</p>
        <div class="project-prelude-content">
            <h3>Un vistazo a lo que podemos crear juntos</h3>
            <div style="display: flex; justify-content:center; align-items:center">
                <p>Cada espacio cuenta una historia. Aquí te mostramos cómo
                    convertimos ideas en experiencias reales, únicas y funcionales.
                </p>
            </div>
        </div>
    </div>
    <div class="projects">
        <div class="project-details">
            <img src="{{ asset('images/proyecto1.png') }}" alt="">
            <p class="project-date">20 Ene 2024</p>
            <h4 class="project-title">Alto de palmas</h4>
            <p class="project-description">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                Voluptates ipsa asperiores, illo nemo, culpa illum nam, 
                maxime expedita quos nesciunt enim unde voluptatibus 
                dignissimos temporibus facilis fugit veniam adipisci architecto?
            </p>
        </div>
        <div class="project-details">
            <img src="{{ asset('images/proyecto2.png') }}" alt="">
            <p class="project-date">19 Ene 2024</p>
            <h4 class="project-title">Cuarzo Tierra Firme</h4>
            <p class="project-description">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                Voluptates ipsa asperiores, illo nemo, culpa illum nam, 
                maxime expedita quos nesciunt enim unde voluptatibus 
                dignissimos temporibus facilis fugit veniam adipisci architecto?
            </p>
        </div>
        <div class="project-details">
            <img src="{{ asset('images/proyecto3.png') }}" alt="">
            <p class="project-date">18 Ene 2024</p>
            <h4 class="project-title">Burbuja Joy Bakery</h4>
            <p class="project-description">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                Voluptates ipsa asperiores, illo nemo, culpa illum nam, 
                maxime expedita quos nesciunt enim unde voluptatibus 
                dignissimos temporibus facilis fugit veniam adipisci architecto?
            </p>
        </div>
    </div>
</div>
@endsection