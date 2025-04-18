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
                <div class="navbar-logo">
                    <img src="{{ asset('images/image.png') }}" alt="">
                </div>
                <div class="navbar-menu">
                    <a href="{{ route("inicio") }}">Inicio</a>
                    <a href="">Quiénes somos</a>
                    <a href="">Servicios</a>
                </div>
                <div class="cotizar">
                    <a href="">Cotizar aquí</a>
                </div>
            </div>
        </div>
    </header>
    <main>
        @yield('content')
    </main>
    
</body>
</html>