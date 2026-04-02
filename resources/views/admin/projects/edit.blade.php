@extends('admin.layout')

@section('title', 'Editar proyecto')
@section('breadcrumb')
    <a href="{{ route('admin.projects.index') }}">Proyectos</a>
    <span class="separator">/</span>
    <span>{{ $project->name }}</span>
@endsection

@section('content')

<div class="page-header">
    <div class="page-header-info">
        <h1>Editar proyecto</h1>
        <p>Modifica la información de <strong>{{ $project->name }}</strong>.</p>
    </div>
    <a href="{{ route('admin.projects.index') }}" class="btn btn-outline">
        <i class="fas fa-arrow-left"></i>
        Volver
    </a>
</div>

@if (session('success'))
<div class="alert alert-success">
    <i class="fas fa-check-circle"></i>
    <div>{{ session('success') }}</div>
</div>
@endif

@if ($errors->any())
<div class="alert alert-danger">
    <i class="fas fa-exclamation-circle"></i>
    <div>
        <strong>Corrige los siguientes errores:</strong>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
</div>
@endif

<form id="edit-project-form" method="POST" action="{{ route('admin.projects.update', $project->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    {{-- ── Información básica ─────────────────────────────── --}}
    <div class="admin-card">
        <div class="admin-card-header">
            <h2 class="admin-card-title"><i class="fas fa-info-circle" style="color:#07401f; margin-right:6px;"></i>Información básica</h2>
        </div>

        <div class="form-grid">
            <div class="form-group">
                <label class="form-label" for="name">Nombre del proyecto <span class="required">*</span></label>
                <input type="text" id="name" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                    value="{{ old('name', $project->name) }}" required>
                @error('name') <span class="form-error"><i class="fas fa-exclamation-circle"></i>{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label class="form-label" for="date">Fecha del proyecto <span class="required">*</span></label>
                <input type="date" id="date" name="date" class="form-control {{ $errors->has('date') ? 'is-invalid' : '' }}"
                    value="{{ old('date', $project->date) }}" required>
                @error('date') <span class="form-error"><i class="fas fa-exclamation-circle"></i>{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label class="form-label" for="project_type_id">Tipo de proyecto</label>
                <select id="project_type_id" name="project_type_id" class="form-control">
                    <option value="">— Sin tipo —</option>
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}" {{ old('project_type_id', $project->project_type_id) == $type->id ? 'selected' : '' }}>
                            {{ $type->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label class="form-label">Estado</label>
                <label class="toggle-group">
                    <div class="toggle-switch">
                        <input type="checkbox" id="destacado" name="destacado" value="1"
                            {{ old('destacado', $project->tipo === 'Destacado') ? 'checked' : '' }}>
                        <span class="toggle-slider"></span>
                    </div>
                    <div>
                        <div class="toggle-label">Proyecto destacado</div>
                        <div class="toggle-description">Aparecerá en la sección de inicio</div>
                    </div>
                </label>
            </div>

            <div class="form-group form-group-full">
                <label class="form-label" for="description">Descripción <span class="required">*</span></label>
                <textarea id="description" name="description" class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}"
                    rows="4" required>{{ old('description', $project->description) }}</textarea>
                @error('description') <span class="form-error"><i class="fas fa-exclamation-circle"></i>{{ $message }}</span> @enderror
            </div>
        </div>
    </div>

    {{-- ── Imagen principal ────────────────────────────────── --}}
    <div class="admin-card">
        <div class="admin-card-header">
            <h2 class="admin-card-title"><i class="fas fa-image" style="color:#07401f; margin-right:6px;"></i>Imagen principal</h2>
        </div>

        <div class="form-group">
            <label class="form-label">Imagen de portada actual</label>
            <div class="current-image-preview">
                <img src="{{ asset('images/' . $project->img) }}" alt="{{ $project->name }}">
                <div class="current-image-info">
                    <p>{{ $project->img }}</p>
                    <span>Sube una nueva imagen para reemplazar esta</span>
                </div>
            </div>

            <div class="upload-area">
                <input type="file" name="img" accept="image/*" onchange="previewNewMainImage(this)">
                <div class="upload-icon"><i class="fas fa-exchange-alt"></i></div>
                <p class="upload-text"><span>Haz clic para reemplazar</span> la imagen principal</p>
                <p class="upload-hint">PNG, JPG, WEBP — máx. 5 MB</p>
            </div>
            <div id="newMainImagePreview" style="display:none; margin-top:10px;">
                <img id="newMainImageThumb" src="" alt="Nueva imagen" style="max-height:160px; border-radius:8px; border:1px solid #EAECF0;">
            </div>
            @error('img') <span class="form-error"><i class="fas fa-exclamation-circle"></i>{{ $message }}</span> @enderror
        </div>
    </div>

    {{-- ── Galería de imágenes ─────────────────────────────── --}}
    <div class="admin-card">
        <div class="admin-card-header">
            <h2 class="admin-card-title"><i class="fas fa-images" style="color:#07401f; margin-right:6px;"></i>Galería de imágenes</h2>
        </div>

        {{-- Imágenes existentes --}}
        @if ($project->images->count())
        <div style="margin-bottom:1.25rem;">
            <label class="form-label" style="margin-bottom:10px; display:block;">Imágenes actuales</label>
            <div class="image-preview-container">
                @foreach ($project->images as $image)
                <div class="image-preview-box" id="img-box-{{ $image->id }}">
                    <img src="{{ asset('images/' . $image->path) }}" alt="Imagen">
                    <button type="button" class="image-delete-btn" title="Eliminar imagen"
                        onclick="deleteImage(
                            '{{ route('admin.projects.images.destroy', [$project->id, $image->id]) }}',
                            'img-box-{{ $image->id }}'
                        )">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                @endforeach
            </div>
        </div>
        <hr class="section-divider">
        @endif

        <div class="form-group">
            <label class="form-label">Agregar más imágenes</label>
            <div class="upload-area">
                <input type="file" name="images[]" accept="image/*" multiple onchange="previewGallery(this)">
                <div class="upload-icon"><i class="fas fa-photo-video"></i></div>
                <p class="upload-text"><span>Selecciona una o varias imágenes</span></p>
                <p class="upload-hint">Puedes seleccionar múltiples archivos — máx. 5 MB c/u</p>
            </div>
            <div id="galleryPreview" class="image-preview-container"></div>
        </div>
    </div>

    {{-- ── Branding ────────────────────────────────────────── --}}
    <div class="admin-card">
        <div class="admin-card-header" style="justify-content:space-between; align-items:center;">
            <h2 class="admin-card-title"><i class="fas fa-paint-brush" style="color:#07401f; margin-right:6px;"></i>Branding</h2>
            @if ($project->branding)
            <button type="button" class="btn btn-danger-outline btn-sm"
                onclick="deleteBranding('{{ route('admin.projects.branding.destroy', $project->id) }}')">
                <i class="fas fa-trash"></i>
                Eliminar branding
            </button>
            @endif
        </div>

        <div class="form-grid">
            <div class="form-group">
                <label class="form-label" for="branding_name">Nombre del branding</label>
                <input type="text" id="branding_name" name="branding_name" class="form-control"
                    value="{{ old('branding_name', $project->branding?->name) }}" placeholder="Ej: Identidad visual">
            </div>

            <div class="form-group" style="grid-column:1/-1;">
                <label class="form-label" for="branding_description">Descripción del branding</label>
                <textarea id="branding_description" name="branding_description" class="form-control"
                    rows="3" placeholder="Descripción del trabajo de branding...">{{ old('branding_description', $project->branding?->description) }}</textarea>
            </div>

            {{-- Imágenes de branding existentes --}}
            @if ($project->branding && $project->branding->images->count())
            <div class="form-group" style="grid-column:1/-1;">
                <label class="form-label" style="margin-bottom:10px; display:block;">Imágenes de branding actuales</label>
                <div class="image-preview-container">
                    @foreach ($project->branding->images as $image)
                    <div class="image-preview-box" id="branding-img-box-{{ $image->id }}">
                        <img src="{{ asset('images/' . $image->path) }}" alt="Branding">
                        <button type="button" class="image-delete-btn" title="Eliminar imagen"
                            onclick="deleteImage(
                                '{{ route('admin.projects.branding.images.destroy', [$project->id, $image->id]) }}',
                                'branding-img-box-{{ $image->id }}'
                            )">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    @endforeach
                </div>
            </div>
            <hr class="section-divider" style="grid-column:1/-1;">
            @endif

            <div class="form-group" style="grid-column:1/-1;">
                <label class="form-label">Agregar imágenes de branding</label>
                <div class="upload-area">
                    <input type="file" name="branding_images[]" accept="image/*" multiple onchange="previewBrandingGallery(this)">
                    <div class="upload-icon"><i class="fas fa-photo-video"></i></div>
                    <p class="upload-text"><span>Selecciona imágenes de branding</span></p>
                    <p class="upload-hint">Puedes seleccionar múltiples archivos — máx. 5 MB c/u</p>
                </div>
                <div id="brandingGalleryPreview" class="image-preview-container"></div>
            </div>
        </div>
    </div>

</form>

{{-- ── Acciones ────────────────────────────────────────── --}}
<div class="form-actions">
    <a href="{{ route('admin.projects.index') }}" class="btn btn-outline">Cancelar</a>
    <form method="POST" action="{{ route('admin.projects.destroy', $project->id) }}"
        onsubmit="return confirm('¿Eliminar este proyecto permanentemente?')" style="margin:0;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">
            <i class="fas fa-trash"></i>
            Eliminar proyecto
        </button>
    </form>
    <button type="submit" form="edit-project-form" class="btn btn-primary">
        <i class="fas fa-save"></i>
        Guardar cambios
    </button>
</div>

<script>
const _token = '{{ csrf_token() }}';

function deleteImage(url, boxId) {
    if (!confirm('¿Eliminar esta imagen?')) return;
    fetch(url, {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: '_method=DELETE&_token=' + _token,
    })
    .then(r => { if (r.ok) document.getElementById(boxId).remove(); })
    .catch(() => alert('Error al eliminar la imagen.'));
}

function deleteBranding(url) {
    if (!confirm('¿Eliminar el branding completo y todas sus imágenes?')) return;
    fetch(url, {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: '_method=DELETE&_token=' + _token,
    })
    .then(r => { if (r.ok) location.reload(); })
    .catch(() => alert('Error al eliminar el branding.'));
}

function previewNewMainImage(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = e => {
            document.getElementById('newMainImageThumb').src = e.target.result;
            document.getElementById('newMainImagePreview').style.display = 'block';
        };
        reader.readAsDataURL(input.files[0]);
    }
}

function previewGallery(input) {
    const container = document.getElementById('galleryPreview');
    container.innerHTML = '';
    Array.from(input.files).forEach(file => {
        const reader = new FileReader();
        reader.onload = e => {
            const box = document.createElement('div');
            box.className = 'image-preview-box';
            box.innerHTML = `<img src="${e.target.result}" alt="preview">`;
            container.appendChild(box);
        };
        reader.readAsDataURL(file);
    });
}

function previewBrandingGallery(input) {
    const container = document.getElementById('brandingGalleryPreview');
    container.innerHTML = '';
    Array.from(input.files).forEach(file => {
        const reader = new FileReader();
        reader.onload = e => {
            const box = document.createElement('div');
            box.className = 'image-preview-box';
            box.innerHTML = `<img src="${e.target.result}" alt="preview">`;
            container.appendChild(box);
        };
        reader.readAsDataURL(file);
    });
}
</script>
@endsection