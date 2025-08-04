@vite('resources/css/us.css')
@extends('layout')

@section('content')
<div class="us-container">
    <div class="us-title">
        <div class="us-title-content">
            <p class="us-subtitle">Quiénes somos</p>
            <h1 class="us-title-title">SOMOS VUOTTA</h1>
            <p class="us-title-description">
                Somos un estudio de arquitectura dedicado a diseñar y construir espacios
                únicos, llenos de creatividad, innovación y confort. Creemos en crear
                ambientes que cuentan historias y reflejan la visión de nuestros clientes.
                Además, ofrecemos un acompañamiento integral desde el inicio hasta la
                finalización del proyecto, garantizando calidad, durabilidad y un
                compromiso total con cada uno de nuestros clientes.
            </p>
        </div>
    </div>
    <div class="us-content">
        <div class="features-section">
            <div class="feature">
                <i class="fa-regular fa-comments"></i>
                <div class="feature-content">
                    <h3>Misión</h3>
                    <p>
                        Diseñar y construir espacios únicos que cuenten historias,
                         acompañando a nuestros clientes de principio a fin con 
                         atención cercana, creatividad, innovación tecnológica y
                        un compromiso absoluto por la calidad.
                    </p>
                </div>
            </div>
            <div class="feature">
                <i class="fa-solid fa-bolt"></i>
                <div class="feature-content">
                    <h3>Visión</h3>
                    <p>
                        Ser la primera opción en arquitectura, remodelación 
                        y diseño para quienes sueñan con transformar sus espacios, 
                        posicionándonos como una marca reconocida por su 
                        profesionalismo, cercanía y capacidad de hacer realidad 
                        los sueños a través del diseño y la construcción.
                    </p>
                </div>
            </div>
            <div class="feature">
                <i class="fa-solid fa-chart-line"></i>
                <div class="feature-content">
                    <h3>Nuestra esencia</h3>
                    <p>
                        Somos un equipo joven, apasionado y con experiencia, 
                        que durante más de 4 años ha trabajado para transformar 
                        ideas en lugares reales, funcionales y llenos de identidad.
                    </p>
                </div>
            </div>
        </div>
        <div class="who-are-we-prelude">
            <p class="who-are-we-prelude-subtitle">Quiénes somos</p>
            <h2 class="who-are-we-prelude-title">Conoce nuestro equipo</h2>
        </div>
        <div class="team">
            <div class="team-member">
                <img src="{{ asset('images/miembro1.png') }}" alt="">
                <div class="team-member-details">
                    <h4 class="team-member-name">Kathe</h4>
                    <p class="team-member-role">Arquitecta residente de Obra</p>
                    <p class="team-member-studies">Arquitecta UPB - CEO de Vuotta</p>
                    <!-- <div class="social-media">
                        <i class="fa-brands fa-x-twitter"></i>
                        <i class="fa-brands fa-linkedin"></i>
                        <i class="fa-brands fa-dribbble"></i>
                    </div> -->
                </div>
            </div>
            <div class="team-member">
                <img src="{{ asset('images/miembro2.png') }}" alt="">
                <div class="team-member-details">
                    <h4 class="team-member-name">Camilo</h4>
                    <p class="team-member-role">Arquitecto diseñador</p>
                    <p class="team-member-studies">Arquitecta Colegio Mayor - CEO de Vuotta</p>
                    <!-- <div class="social-media">
                        <i class="fa-brands fa-x-twitter"></i>
                        <i class="fa-brands fa-linkedin"></i>
                        <i class="fa-brands fa-dribbble"></i>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection