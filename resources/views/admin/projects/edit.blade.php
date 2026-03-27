@extends('admin.layout')

@section('title', 'Nuevo proyecto')
@section('breadcrumb')
    <a href="{{ route('admin.projects.index') }}">Proyectos</a>
    <span class="separator">/</span>
    <span>Nuevo</span>
@endsection

@section('content')

<div class="page-header">
    <div class="page-header-info">
        <h1>Nuevo proyecto</h1>
        <p>Completa la información para agregar un proyecto al portafolio.</p>
    </div>
    <a href="{{ route('admin.projects.index') }}" class="btn btn-outline">
        <i class="fas fa-arrow-left"></i>
        Volver
    </a>
</div>

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

<form method="POST" action="{{ route('admin.projects.store') }}" enctype="multipart/form-data" id="projectForm">
    @csrf

    {{-- ── Información básica ─────────────────────────────── --}}
    <div class="admin-card">
        <div class="admin-card-header">
            <h2 class="admin-card-title"><i class="fas fa-info-circle" style="color:#07401f; margin-right:6px;"></i>Información básica</h2>
        </div>

        <div class="form-grid">
            <div class="form-group">
                <label class="form-label" for="name">Nombre del proyecto <span class="required">*</span></label>
                <input type="text" id="name" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                    value="{{ old('name') }}" placeholder="Ej: Apartamento Laureles" required>
                @error('name') <span class="form-error"><i class="fas fa-exclamation-circle"></i>{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label class="form-label" for="date">Fecha del proyecto <span class="required">*</span></label>
                <input type="date" id="date" name="date" class="form-control {{ $errors->has('date') ? 'is-invalid' : '' }}"
                    value="{{ old('date') }}" required>
                @error('date') <span class="form-error"><i class="fas fa-exclamation-circle"></i>{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label class="form-label" for="project_type_id">Tipo de proyecto</label>
                <select id="project_type_id" name="project_type_id" class="form-control">
                    <option value="">— Sin tipo —</option>
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}" {{ old('project_type_id') == $type->id ? 'selected' : '' }}>
                            {{ $type->nombre }}
                        </option>
                    @endforeach
                </select>
                @error('project_type_id') <span class="form-error"><i class="fas fa-exclamation-circle"></i>{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label class="form-label">Estado</label>
                <label class="toggle-group">
                    <div class="toggle-switch">
                        <input type="checkbox" id="destacado" name="destacado" value="1" {{ old('destacado') ? 'checked' : '' }}>
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
                    rows="4" placeholder="Descripción del proyecto..." required>{{ old('description') }}</textarea>
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
            <label class="form-label">Imagen de portada <span class="required">*</span></label>
            <div class="upload-area" id="mainImageArea">
                <input type="file" name="img" id="mainImageInput" accept="image/*" required onchange="previewMainImage(this)">
                <div class="upload-icon"><i class="fas fa-cloud-upload-alt"></i></div>
                <p class="upload-text"><span>Haz clic para subir</span> o arrastra la imagen aquí</p>
                <p class="upload-hint">PNG, JPG, WEBP — máx. 5 MB</p>
            </div>
            <div id="mainImagePreview" style="display:none; margin-top:10px;">
                <img id="mainImageThumb" src="" alt="Preview" style="max-height:160px; border-radius:8px; border:1px solid #EAECF0;">
            </div>
            @error('img') <span class="form-error"><i class="fas fa-exclamation-circle"></i>{{ $message }}</span> @enderror
        </div>
    </div>

    {{-- ── Galería de imágenes ─────────────────────────────── --}}
    <div class="admin-card">
        <div class="admin-card-header">
            <h2 class="admin-card-title"><i class="fas fa-images" style="color:#07401f; margin-right:6px;"></i>Galería de imágenes</h2>
        </div>

        <div class="form-group">
            <label class="form-label">Imágenes adicionales del proyecto</label>
            <div class="upload-area">
                <input type="file" name="images[]" id="galleryInput" accept="image/*" multiple onchange="previewGallery(this)">
                <div class="upload-icon"><i class="fas fa-photo-video"></i></div>
                <p class="upload-text"><span>Selecciona una o varias imágenes</span></p>
                <p class="upload-hint">Puedes seleccionar múltiples archivos — máx. 5 MB c/u</p>
            </div>
            <div id="galleryPreview" class="image-preview-container"></div>
            @error('images.*') <span class="form-error"><i class="fas fa-exclamation-circle"></i>{{ $message }}</span> @enderror
        </div>
    </div>

    {{-- ── Branding (opcional) ─────────────────────────────── --}}
    <div class="admin-card">
        <div class="admin-card-header">
            <h2 class="admin-card-title"><i class="fas fa-paint-brush" style="color:#07401f; margin-right:6px;"></i>Branding <span style="font-size:13px; font-weight:400; color:#98A2B3;">(opcional)</span></h2>
        </div>

        <div class="form-grid">
            <div class="form-group">
                <label class="form-label" for="branding_name">Nombre del branding</label>
                <input type="text" id="branding_name" name="branding_name" class="form-control"
                    value="{{ old('branding_name') }}" placeholder="Ej: Identidad visual Laureles">
            </div>

            <div class="form-group" style="grid-column:1/-1;">
                <label class="form-label" for="branding_description">Descripción del branding</label>
                <textarea id="branding_description" name="branding_description" class="form-control"
                    rows="3" placeholder="Descripción del trabajo de branding...">{{ old('branding_description') }}</textarea>
            </div>

            <div class="form-group" style="grid-column:1/-1;">
                <label class="form-label">Imágenes de branding</label>
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

    {{-- ── Acciones ────────────────────────────────────────── --}}
    <div class="form-actions">
        <a href="{{ route('admin.projects.index') }}" class="btn btn-outline">Cancelar</a>
        <button type="submit" class="btn btn-primary">
            <i class="fas fa-save"></i>
            Crear proyecto
        </button>
    </div>
</form>

<script>
function previewMainImage(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = e => {
            document.getElementById('mainImageThumb').src = e.target.result;
            document.getElementById('mainImagePreview').style.display = 'block';
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