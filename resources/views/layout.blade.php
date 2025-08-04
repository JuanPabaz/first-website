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
            <div class="footer-columns">
                <!-- Columna 1: Logo -->
                <div class="footer-col footer-col-logo">
                    <img src="{{ asset('images/logos vuotta_verde.jpg') }}" alt="Vuotta Arquitectura" class="footer-logo">
                    <p class="footer-copyright">© 2021 Vuotta Arquitectura<br>Todos los derechos reservados</p>
                </div>
                
                <!-- Columna 2: Título y botones -->
                <div class="footer-col">
                    <h6>Creemos sueños juntos</h6>
                    <p>Escríbenos y cotiza este proyecto</p>
                    <div class="footer-content-buttons">
                        <button class="visualization-button">
                            <a href="https://kuula.co/profile/VuottaArquitectura/collections" target="_blank" style="text-decoration: none; color: #344054">
                                Proyectos 360
                            </a>
                        </button>
                        <button class="cotizar-footer-button">¡Quiero cotizar!</button>
                    </div>
                </div>
                
                <!-- Columna 3: Contacto -->
                <div class="footer-col">
                    <div class="contact-details">
                        <h5>Contacto</h5>
                        <p><i class="fas fa-phone"></i> +57 302 374 3946</p>
                        <a href="https://www.instagram.com/vuotta.arq" target="_blank" class="instagram-link">
                            <i class="fab fa-instagram"></i> Vuotta Arquitectura
                        </a>
                        <p><i class="fas fa-envelope"></i> gerencia@vuottaarq.com</p>
                        <p><i class="fas fa-map-marker-alt"></i> Medellín, Colombia</p>
                    </div>
                </div>
                
                <!-- Columna 4: Recursos -->
                <div class="footer-col">
                    <div class="contact-details">
                        <h5>Recursos</h5>
                        <a href="{{ asset('pdf/TERMINOS Y CONDICIONES.pdf') }}" target="_blank" rel="noopener noreferrer" class="footer-link">
                            <i class="fas fa-file-alt"></i> Términos y condiciones
                        </a>
                        <a href="{{ route('inicio') }}#preguntas-frecuentes" class="footer-link">
                            <i class="fas fa-question-circle"></i> Preguntas frecuentes
                        </a>
                        <a href="{{ route('servicios') }}" class="footer-link">
                            <i class="fas fa-hammer"></i> Servicios
                        </a>
                        <a href="{{ route('proyectos') }}" class="footer-link">
                            <i class="fas fa-building"></i> Proyectos
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</html>