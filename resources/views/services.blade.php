@vite("resources/css/services.css")
@extends('layout')
@section('content')
<div class="services-container">
    <div class="services-prelude">
        <div class="service-prelude-title">
            <p >Servicios</p>
            <h1>Inicia tu sueño</h1>
        </div>
        <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. 
            Eos, veniam. Cumque quam deserunt beatae facere laborum 
            magni animi similique sit reprehenderit nihil, suscipit 
            itaque repudiandae ab adipisci repellendus fugiat dolor?
        </p>
    </div>
    <div class="services">
        <div class="service">
            <div class="service-content">
                <h2 class="service-title">Diseño interior</h2>
                <p>
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. 
                    Voluptatum rem nulla eaque corporis temporibus quisquam 
                </p>
                <div class="service-buttons">
                    <button class="know-more-button">Conoce más</button>
                    <button class="cotizar-service-button">Cotizar</button>
                </div>
            </div>
            <div class="service-img">
                <img src="{{ asset('images/service-img.jpg') }}" alt="">
            </div>
        </div>
        <div class="service">
            <div class="service-content">
                <h2 class="service-title">Diseño comercial</h2>
                <p>
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. 
                    Voluptatum rem nulla eaque corporis temporibus quisquam 
                </p>
                <div class="service-buttons">
                    <button class="know-more-button">Conoce más</button>
                    <button class="cotizar-service-button">Cotizar</button>
                </div>
            </div>
            <div class="service-img">
                <img src="{{ asset('images/service-img.jpg') }}" alt="">
            </div>
        </div>
        <div class="service">
            <div class="service-content">
                <h2 class="service-title">Diseño arquitectónico</h2>
                <p>
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. 
                    Voluptatum rem nulla eaque corporis temporibus quisquam 
                </p>
                <div class="service-buttons">
                    <button class="know-more-button">Conoce más</button>
                    <button class="cotizar-service-button">Cotizar</button>
                </div>
            </div>
            <div class="service-img">
                <img src="{{ asset('images/service-img.jpg') }}" alt="">
            </div>
        </div>
        <div class="service">
            <div class="service-content">
                <h2 class="service-title">Renderización y modelado 3D</h2>
                <p>
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. 
                    Voluptatum rem nulla eaque corporis temporibus quisquam 
                </p>
                <div class="service-buttons">
                    <button class="know-more-button">Conoce más</button>
                    <button class="cotizar-service-button">Cotizar</button>
                </div>
            </div>
            <div class="service-img">
                <img src="{{ asset('images/service-img.jpg') }}" alt="">
            </div>
        </div>
    </div>
</div>
@endsection
