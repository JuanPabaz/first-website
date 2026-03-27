@extends('admin.layout')

@section('title', 'Proyectos')
@section('breadcrumb')<span>Proyectos</span>@endsection

@section('content')

{{-- Alertas --}}
@if (session('success'))
<div class="alert alert-success">
    <i class="fas fa-check-circle"></i>
    <div>{{ session('success') }}</div>
</div>
@endif

{{-- Cabecera de la página --}}
<div class="page-header">
    <div class="page-header-info">
        <h1>Proyectos</h1>
        <p>Gestiona todos los proyectos del portafolio.</p>
    </div>
    <a href="{{ route('admin.projects.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i>
        Nuevo proyecto
    </a>
</div>

{{-- Stats --}}
<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-icon stat-icon-green">
            <i class="fas fa-building"></i>
        </div>
        <div class="stat-info">
            <h3>{{ $projects->total() }}</h3>
            <p>Total proyectos</p>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon stat-icon-yellow">
            <i class="fas fa-star"></i>
        </div>
        <div class="stat-info">
            <h3>{{ $projects->getCollection()->where('tipo', 'Destacado')->count() }}</h3>
            <p>Destacados (esta página)</p>
        </div>
    </div>
</div>

{{-- Tabla de proyectos --}}
<div class="admin-card" style="padding: 0; overflow: hidden;">
    <div style="padding: 1.25rem 1.5rem; border-bottom: 1px solid #EAECF0; display:flex; align-items:center; justify-content:space-between;">
        <h2 class="admin-card-title" style="margin:0;">Lista de proyectos</h2>
        <span style="font-size:13px; color:#475467;">{{ $projects->total() }} proyectos en total</span>
    </div>

    @if ($projects->isEmpty())
    <div class="empty-state">
        <i class="fas fa-folder-open"></i>
        <h3>Sin proyectos aún</h3>
        <p>Crea el primer proyecto del portafolio.</p>
        <a href="{{ route('admin.projects.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i>
            Crear proyecto
        </a>
    </div>
    @else
    <div style="overflow-x: auto;">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Imagen</th>
                    <th>Nombre</th>
                    <th>Tipo</th>
                    <th>Estado</th>
                    <th>Fecha</th>
                    <th>Branding</th>
                    <th style="text-align:right;">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                <tr>
                    <td>
                        <img
                            src="{{ asset('images/' . $project->img) }}"
                            alt="{{ $project->name }}"
                            class="table-thumbnail"
                        >
                    </td>
                    <td>
                        <div style="font-weight:600; color:#101828;">{{ $project->name }}</div>
                        <div style="font-size:12px; color:#98A2B3; margin-top:2px;">
                            {{ Str::limit($project->description, 55) }}
                        </div>
                    </td>
                    <td>
                        @if ($project->type)
                            <span class="badge badge-gray">{{ $project->type->nombre }}</span>
                        @else
                            <span style="color:#98A2B3; font-size:13px;">—</span>
                        @endif
                    </td>
                    <td>
                        @if ($project->tipo === 'Destacado')
                            <span class="badge badge-green">
                                <i class="fas fa-star" style="font-size:10px;"></i>
                                Destacado
                            </span>
                        @else
                            <span class="badge badge-gray">Normal</span>
                        @endif
                    </td>
                    <td style="white-space:nowrap; font-size:13px;">
                        {{ \Carbon\Carbon::parse($project->date)->format('d/m/Y') }}
                    </td>
                    <td>
                        @if ($project->branding)
                            <span class="badge badge-green"><i class="fas fa-check" style="font-size:10px;"></i> Sí</span>
                        @else
                            <span class="badge badge-gray">No</span>
                        @endif
                    </td>
                    <td>
                        <div class="table-actions" style="justify-content:flex-end;">
                            <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-outline btn-sm btn-icon" title="Editar">
                                <i class="fas fa-pencil"></i>
                            </a>
                            <form
                                method="POST"
                                action="{{ route('admin.projects.destroy', $project->id) }}"
                                onsubmit="return confirm('¿Eliminar el proyecto «{{ addslashes($project->name) }}»? Esta acción no se puede deshacer.')"
                            >
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger-outline btn-sm btn-icon" title="Eliminar">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Paginación --}}
    @if ($projects->hasPages())
    <div style="padding: 1rem 1.5rem; border-top: 1px solid #EAECF0;">
        <div class="admin-pagination">
            <span class="pagination-info">
                Mostrando {{ $projects->firstItem() }}–{{ $projects->lastItem() }} de {{ $projects->total() }} proyectos
            </span>
            {{ $projects->links('pagination::bootstrap-4') }}
        </div>
    </div>
    @endif
    @endif
</div>

@endsection