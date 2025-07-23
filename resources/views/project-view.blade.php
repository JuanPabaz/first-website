@vite('resources/css/project-view.css')
@vite('resources/js/project-view.js')
@extends('layout')

@section('content')
<div class="project-detail-container">
    <div class="project-header">
        <div class="back-button-container">
            <a href="{{ route('proyectos') }}" class="back-button">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                </svg>
                Proyectos
            </a>
        </div>
        <h1>{{ $project->name }}</h1>
        <p class="project-subtitle">{{ $project->subtitulo }}</p>
        <p class="vuotta">Vuotta Arquitectura</p>
        <p class="project-date">{{ \Carbon\Carbon::parse($project->date)->format('d M Y') }}</p>
    </div>

    <div class="main-image">
        <img src="{{ asset('images/' . $project->img) }}" alt="{{ $project->name }}">
    </div>

    <h2 class="know-project">Conoce el proyecto</h2>
    @if ($project->images->count())
    <div id="imageCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            @foreach ($project->images as $key => $image)
            <button type="button" data-bs-target="#imageCarousel" data-bs-slide-to="{{ $key }}" 
                    class="{{ $key === 0 ? 'active' : '' }}" aria-current="{{ $key === 0 ? 'true' : 'false' }}"></button>
            @endforeach
        </div>
        
        <div class="carousel-inner">
            @foreach ($project->images as $key => $image)
            <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                <img src="{{ asset('images/' . $image->path) }}" class="d-block w-100" alt="Imagen {{ $key + 1 }}">
            </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#imageCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#imageCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    @endif

    <div class="project-description">
        <p class="description-text">{{ $project->description }}</p>
    </div>
</div>
@endsection
