<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin') — Vuotta</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    @vite('resources/css/admin.css')
</head>
<body>
<div class="admin-wrapper">

    <!-- SIDEBAR -->
    <aside class="admin-sidebar" id="adminSidebar">
        <div class="sidebar-brand">
            <h2>Vuotta <span style="color: #fff; font-weight: 400;">Admin</span></h2>
            <span>Panel de administración</span>
        </div>

        <nav class="sidebar-nav">
            <p class="nav-section-title">Contenido</p>
            <a href="{{ route('admin.projects.index') }}" class="nav-link {{ request()->routeIs('admin.projects.*') ? 'active' : '' }}">
                <i class="fas fa-building"></i>
                Proyectos
            </a>
        </nav>

        <div class="sidebar-footer">
            <div class="sidebar-user">
                <div class="sidebar-user-avatar">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </div>
                <div class="sidebar-user-info">
                    <div class="sidebar-user-name">{{ Auth::user()->name }}</div>
                    <div class="sidebar-user-email">{{ Auth::user()->email }}</div>
                </div>
            </div>
            <form method="POST" action="{{ route('admin.logout') }}" class="logout-form">
                @csrf
                <button type="submit" class="btn-logout">
                    <i class="fas fa-sign-out-alt"></i>
                    Cerrar sesión
                </button>
            </form>
        </div>
    </aside>

    <!-- MAIN -->
    <div class="admin-main">
        <!-- TOP BAR -->
        <div class="admin-topbar">
            <div style="display:flex; align-items:center; gap:12px;">
                <button class="sidebar-toggle-btn" id="sidebarToggle">
                    <i class="fas fa-bars"></i>
                </button>
                <div class="topbar-breadcrumb">
                    <a href="{{ route('admin.projects.index') }}">Inicio</a>
                    @hasSection('breadcrumb')
                        <span class="separator">/</span>
                        @yield('breadcrumb')
                    @endif
                </div>
            </div>
            <h1 class="topbar-title">@yield('title', 'Panel')</h1>
        </div>

        <!-- CONTENT -->
        <div class="admin-content">
            @yield('content')
        </div>
    </div>
</div>

<!-- Sidebar overlay para mobile -->
<div id="sidebarOverlay" style="display:none; position:fixed; inset:0; background:rgba(0,0,0,0.4); z-index:99;"></div>

<script>
    const sidebar   = document.getElementById('adminSidebar');
    const toggleBtn = document.getElementById('sidebarToggle');
    const overlay   = document.getElementById('sidebarOverlay');

    toggleBtn?.addEventListener('click', () => {
        sidebar.classList.toggle('open');
        overlay.style.display = sidebar.classList.contains('open') ? 'block' : 'none';
    });

    overlay.addEventListener('click', () => {
        sidebar.classList.remove('open');
        overlay.style.display = 'none';
    });
</script>
</body>
</html>