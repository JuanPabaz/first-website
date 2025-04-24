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
            <input type="text" placeholder="Ingresa tu correo">
            <button>Quiero cotizar</button>
            <p>We care about your date in our <a href="">privacy policy</a></p>
        </div>
    </div>
</div>
@endsection