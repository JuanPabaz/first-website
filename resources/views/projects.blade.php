@vite("resources/css/projects.css")
@extends('layout')
@section('content')
<div class="projects-container">
    <div class="project-header">
        <p class="header-subtitle">Proyectos</p>
        <h1 class="header-title">Nuestros proyectos</h1>
        <p class="header-description">En Vuotta creemos que cada espacio guarda una historia esperando a ser contada.</p>
        <p class="header-description">No diseñamos paredes, diseñamos momentos.</p>
        <p class="header-description">No construimos estructuras, construimos sueños.</p>
        <div class="header-actions">
            <div class="inputs">
                <input class="email-input" type="text" placeholder="Ingresa tu correo">
                <button class="projects-cotizar-button">Quiero cotizar</button>
            </div>
            <p class="privacy-policy">We care about your date in our <a href="">privacy policy</a></p>
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
    <hr style="margin: 0 9rem; background-color: #EAECF0">    
    <div class="paginator">
        <div>
            Anterior
        </div>
        <div class="pages">
            <div class="page-number">
                1
            </div>
            <div class="page-number">
                2
            </div>
            <div class="page-number">
                3
            </div>
            <div class="page-number">
                4
            </div>
            <div class="page-number">
                5
            </div>
        </div>
        <div>
            Siguiente
        </div>
    </div>
</div>
@endsection