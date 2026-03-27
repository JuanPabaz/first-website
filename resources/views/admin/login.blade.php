<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión — Vuotta Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    @vite('resources/css/admin.css')
</head>
<body>
<div class="login-page">
    <div class="login-card">
        <div class="login-header">
            <h1 class="login-logo-text">Vuotta<span>.</span></h1>
            <p class="login-subtitle">Panel de administración</p>
        </div>

        <h2 class="login-title">Bienvenido de vuelta</h2>
        <p class="login-desc">Ingresa tus credenciales para acceder al panel.</p>

        @if ($errors->any())
        <div class="alert alert-danger">
            <i class="fas fa-exclamation-circle"></i>
            <div>{{ $errors->first() }}</div>
        </div>
        @endif

        <form method="POST" action="{{ route('admin.login.post') }}" class="login-form">
            @csrf

            <div class="form-group">
                <label class="form-label" for="email">Correo electrónico</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                    value="{{ old('email') }}"
                    placeholder="admin@vuottaarq.com"
                    required
                    autofocus
                >
            </div>

            <div class="form-group">
                <label class="form-label" for="password">Contraseña</label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                    placeholder="••••••••"
                    required
                >
            </div>

            <div style="display:flex; align-items:center; gap:8px; margin-bottom:1rem;">
                <input type="checkbox" id="remember" name="remember" style="width:16px; height:16px; accent-color:#07401f;">
                <label for="remember" style="font-size:14px; color:#344054; cursor:pointer; margin:0;">
                    Mantener sesión iniciada
                </label>
            </div>

            <button type="submit" class="btn btn-primary login-btn">
                <i class="fas fa-sign-in-alt"></i>
                Iniciar sesión
            </button>
        </form>

        <div class="login-footer">
            © {{ date('Y') }} Vuotta Arquitectura — Acceso restringido
        </div>
    </div>
</div>
</body>
</html>