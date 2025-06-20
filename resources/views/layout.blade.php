<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    @vite('resources/css/layout.css')
    @vite('resources/js/layout.js')
    <title>Vuotta</title>
</head>
<body>
    <header>
        <div class="navbar-container">
            <div class="navbar">
                <button class="navbar-toggle" id="navbarToggle" style="color: #07401f">
                    <i class="fas fa-bars"></i>
                </button>
                
                <div class="navbar-menu-wrapper" id="menuWrapper">
                    <div class="navbar-menu">
                        <a href="{{ route("inicio") }}">Inicio</a>
                        <a href="{{ route("servicios") }}">Servicios</a>
                        <a href="{{ route("somos") }}">Quiénes somos</a>
                        <a href="{{ route("proyectos") }}">Proyectos</a>
                    </div>
                    <hr class="mobile-separator">
                    <div class="cotizar">
                        <a class="contact-link" href="">Contactanos</a>
                        <a class="cotizar-link" href="">Cotizar aquí</a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <main>
        @yield('content')
    </main>
    <footer>
        <div class="footer-container">
            <div class="footer-head">
                <h6>Creemos sueños juntos</h6>
                <p>Escribenos y cotiza este proyecto</p>
                <div class="footer-content-buttons">
                    <button class="visualization-button">Visualización 360</button>
                    <button class="cotizar-footer-button">¡Quiero cotizar!</button>
                </div>
            </div>
        </div>
    </footer>
    
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</html>