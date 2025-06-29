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
        @foreach($projects as $project)
        <div class="project-details">
            <img src="{{ asset('images/' . $project->img) }}" alt="{{ $project->name }}">
            <p class="project-date">{{ \Carbon\Carbon::parse($project->date)->format('d M Y') }}</p>
            <a href="{{ route('proyectos.detalle', $project->id) }}" class="project-name">{{ $project->name }}</a>
            <p class="project-description">
                {{ $project->description }}
            </p>
        </div>
        @endforeach
    </div>
    <hr style="margin: 0 9rem; background-color: #EAECF0">    
    <div class="paginator">
        {{ $projects->links('pagination::bootstrap-4') }}
    </div>

</div>
@endsection