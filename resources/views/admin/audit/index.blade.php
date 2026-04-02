@extends('admin.layout')

@section('title', 'Auditoría')
@section('breadcrumb')<span>Auditoría</span>@endsection

@section('content')

<div class="page-header">
    <div class="page-header-info">
        <h1>Auditoría</h1>
        <p>Historial de acciones realizadas en el panel de administración.</p>
    </div>
</div>

<div class="admin-card" style="padding: 0; overflow: hidden;">
    <div style="padding: 1.25rem 1.5rem; border-bottom: 1px solid #EAECF0; display:flex; align-items:center; justify-content:space-between;">
        <h2 class="admin-card-title" style="margin:0;">Registro de acciones</h2>
        <span style="font-size:13px; color:#475467;">{{ $logs->total() }} registros en total</span>
    </div>

    @if ($logs->isEmpty())
    <div class="empty-state">
        <i class="fas fa-history"></i>
        <h3>Sin registros aún</h3>
        <p>Las acciones del panel aparecerán aquí.</p>
    </div>
    @else
    <div style="overflow-x: auto;">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Usuario</th>
                    <th>Acción</th>
                    <th>Proyecto</th>
                    <th>Detalles</th>
                    <th>IP</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($logs as $log)
                @php
                    $badges = [
                        'proyecto_creado'           => ['class' => 'badge-green',  'icon' => 'fa-plus',        'label' => 'Creó proyecto'],
                        'proyecto_editado'          => ['class' => 'badge-blue',   'icon' => 'fa-pencil',      'label' => 'Editó proyecto'],
                        'proyecto_eliminado'        => ['class' => 'badge-red',    'icon' => 'fa-trash',       'label' => 'Eliminó proyecto'],
                        'imagen_eliminada'          => ['class' => 'badge-orange', 'icon' => 'fa-image',       'label' => 'Eliminó imagen'],
                        'branding_eliminado'        => ['class' => 'badge-purple', 'icon' => 'fa-paint-brush', 'label' => 'Eliminó branding'],
                        'imagen_branding_eliminada' => ['class' => 'badge-gray',   'icon' => 'fa-times',       'label' => 'Eliminó img. branding'],
                    ];
                    $badge = $badges[$log->accion] ?? ['class' => 'badge-gray', 'icon' => 'fa-circle', 'label' => $log->accion];
                @endphp
                <tr>
                    <td style="white-space:nowrap; font-size:13px;">
                        {{ $log->created_at->format('d/m/Y') }}
                        <div style="font-size:12px; color:#98A2B3; margin-top:2px;">{{ $log->created_at->format('H:i') }}</div>
                    </td>
                    <td>
                        <div style="font-weight:600; color:#101828;">{{ $log->user->name ?? '—' }}</div>
                        <div style="font-size:12px; color:#98A2B3; margin-top:2px;">{{ $log->user->email ?? '' }}</div>
                    </td>
                    <td>
                        <span class="badge {{ $badge['class'] }}">
                            <i class="fas {{ $badge['icon'] }}" style="font-size:10px;"></i>
                            {{ $badge['label'] }}
                        </span>
                    </td>
                    <td>
                        <div style="font-weight:600; color:#101828;">{{ $log->entidad_nombre }}</div>
                    </td>
                    <td style="font-size:13px; color:#475467;">
                        @if ($log->detalles)
                            @foreach ($log->detalles as $key => $val)
                                @if ($val !== null && $val !== '')
                                    <span class="badge badge-gray">{{ $key }}: {{ $val }}</span>
                                @endif
                            @endforeach
                        @else
                            <span style="color:#98A2B3;">—</span>
                        @endif
                    </td>
                    <td style="font-size:13px; color:#98A2B3; font-family:monospace; white-space:nowrap;">
                        {{ $log->ip ?? '—' }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @if ($logs->hasPages())
    <div style="padding: 1rem 1.5rem; border-top: 1px solid #EAECF0;">
        <div class="admin-pagination">
            <span class="pagination-info">
                Mostrando {{ $logs->firstItem() }}–{{ $logs->lastItem() }} de {{ $logs->total() }} registros
            </span>
            {{ $logs->links('pagination::bootstrap-4') }}
        </div>
    </div>
    @endif
    @endif
</div>

@endsection