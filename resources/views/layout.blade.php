<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    @vite('resources/css/layout.css')
    <title>Vuotta</title>
</head>
<body>
    <header>
        <div class="navbar-container">
            <div class="navbar">
                <div class="navbar-menu">
                    <a href="{{ route("inicio") }}">Inicio</a>
                    <a href="">Servicios</a>
                    <a href="">Quiénes somos</a>
                    <a href="">Proyectos</a>
                </div>
                <div class="cotizar">
                    <a href="">Contactanos</a>
                    <a href="">Cotizar aquí</a>
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
                    <button class="projects-button">Visualización 360</button>
                    <button class="cotizar-button">¡Quiero cotizar!</button>
                </div>
            </div>
        </div>
    </footer>
    
</body>
</html>