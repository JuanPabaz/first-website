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
        
        <!-- Filtro por tipo de proyecto -->

        
        <div class="header-actions">
            <div class="inputs">
                <div class="project-filters">
                    <form method="GET" action="{{ route('proyectos') }}">
                        <select name="type" id="project-type" onchange="this.form.submit()">
                            <option value="">Todos los proyectos</option>
                            @foreach($types as $type)
                                <option value="{{ $type->id }}" {{ $selectedType == $type->id ? 'selected' : '' }}>
                                    {{ $type->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </form>
                </div>
                <button class="projects-cotizar-button">Quiero cotizar</button>
            </div>
            <p class="privacy-policy">Consulta aquí nuestros <a href="{{ asset('pdf/TERMINOS Y CONDICIONES.pdf') }}" target="_blank" rel="noopener noreferrer">Terminos y condiciones</a></p>
        </div>
    </div>
    
    <div class="projects">
        @forelse($projects as $project)
        <div class="project-details">
            <img src="{{ asset('images/' . $project->img) }}" alt="{{ $project->name }}">
            <p class="project-date">{{ \Carbon\Carbon::parse($project->date)->format('d M Y') }}</p>
            <a href="{{ route('proyectos.detalle', $project->id) }}" class="project-name">{{ $project->name }}</a>
            @if($project->type)
                <span class="project-type">{{ $project->type->nombre }}</span>
            @endif
            <p class="project-description">
                {{ $project->description }}
            </p>
        </div>
        @empty
        <div class="no-projects-message">
            <div class="no-projects-content">
                <i class="fas fa-search fa-3x"></i>
                <h3>No encontramos proyectos con este filtro</h3>
                <p>Parece que no tenemos proyectos del tipo seleccionado actualmente.</p>
                <p>Prueba con otra categoría o <a href="{{ route('proyectos') }}">muestra todos los proyectos</a>.</p>
                <button class="reset-filter" onclick="window.location.href='{{ route('proyectos') }}'">
                    Reiniciar filtros
                </button>
            </div>
        </div>
        @endforelse
    </div>
    
    <hr style="margin: 0 9rem; background-color: #EAECF0">    
    <div class="paginator">
        {{ $projects->appends(['type' => $selectedType])->links('pagination::bootstrap-4') }}
    </div>
</div>
@endsection