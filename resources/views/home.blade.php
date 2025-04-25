@vite('resources/css/home.css')
@vite('resources/js/home.js')
@extends('layout')

@section('content')
<div class="home-container">
    <div class="home-section">
        <div class="home-content">
            <h1>Diseñando historias, construyendo sueños.</h1>
            <p>Somos un equipo joven que transforma ideas en proyectos reales,
                acompañándote de pricipio a fin para construir sueños que se 
                viven.
            </p>
            <div class="home-content-buttons">
                <button class="projects-button">
                    <i class="fa-regular fa-circle-play"></i>
                    Proyectos 360
                </button>
                <button class="cotizar-button">¡Quiero cotizar!</button>
            </div>
        </div>
        <div class="home-image">
            <img src="{{ asset('images/project-vuotta.jpeg') }}" alt="">
        </div>
    </div>
    <div class="testimonial-section">
        <div class="testimonial-title">
            <h2>Que resultados tan increíbles, me encantó todo. ¡Super recomendado!</h2>
        </div>
        <div class="testimonial-details">
            <img src="{{ asset('images/testimonio-img.png') }}" alt="">
            <div class="person-details">
                <p class="person-name">Valentina</p>
                <p class="person-review">Dueña Restaurante La Ardilla</p>
            </div>

        </div>
    </div>
    <div class="project-prelude">
        <p class="project-prelude-title">Proyectos</p>
        <div class="project-prelude-content">
            <h3>Un vistazo a lo que podemos crear juntos</h3>
            <div style="display: flex; justify-content:center; align-items:center">
                <p>Cada espacio cuenta una historia. Aquí te mostramos cómo
                    convertimos ideas en experiencias reales, únicas y funcionales.
                </p>
            </div>
        </div>
    </div>
    <div class="projects">
        @foreach($project as $project)
        <div class="project-details">
            <img src="{{ asset('images/' . $project->img) }}" alt="{{ $project->name }}">
            <p class="project-date">{{ \Carbon\Carbon::parse($project->date)->format('d M Y') }}</p>
            <h4 class="project-title">{{ $project->name }}</h4>
            <p class="project-description">
                {{ $project->description }}
            </p>
        </div>
        @endforeach
    </div>
    <div class="questions-section">
        <div class="questions-section-title">
            <h5>Preguntas frecuentes</h5>
            <p >Lorem ipsum dolor, sit amet consectetur adipisicing elit. 
                Accusantium veniam nisi dolorum cumque et, doloribus sed? 
                At nulla corporis eveniet rem. Tempora beatae modi facere
                illo eos necessitatibus facilis excepturi.
            </p>
        </div>
        <div class="questions">
            <div class="question">
                <i class="fa-solid fa-circle-plus plus-icon"></i>
                <h6 class="question-title">¿Cómo puedo pagar?</h6>
                <p class="question-answer hidden">Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                    Tempora nesciunt sunt pariatur vel excepturi doloremque 
                    beatae sequi, odio tempore ullam dolore alias neque enim 
                    iste vitae error architecto ipsum veritatis.
                </p>
            </div>
            <div class="question">
                <i class="fa-solid fa-circle-plus plus-icon"></i>
                <h6 class="question-title">¿Cómo se cuánto cuesta mi diseño?</h6>
                <p class="question-answer hidden">Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                    Tempora nesciunt sunt pariatur vel excepturi doloremque 
                    beatae sequi, odio tempore ullam dolore alias neque enim 
                    iste vitae error architecto ipsum veritatis.
                </p>
            </div>
            <div class="question">
                <i class="fa-solid fa-circle-plus plus-icon"></i>
                <h6 class="question-title">¿Puedo cancelar mi diseño?</h6>
                <p class="question-answer hidden">Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                    Tempora nesciunt sunt pariatur vel excepturi doloremque 
                    beatae sequi, odio tempore ullam dolore alias neque enim 
                    iste vitae error architecto ipsum veritatis.
                </p>
            </div>
            <div class="question">
                <i class="fa-solid fa-circle-plus plus-icon"></i>
                <h6 class="question-title">¿Cuáles son los requisitos para obra?</h6>
                <p class="question-answer hidden">Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                    Tempora nesciunt sunt pariatur vel excepturi doloremque 
                    beatae sequi, odio tempore ullam dolore alias neque enim 
                    iste vitae error architecto ipsum veritatis.
                </p>
            </div>
            <div class="question">
                <i class="fa-solid fa-circle-plus plus-icon"></i>
                <h6 class="question-title">¿Puedo hacer acuerdos de pago?</h6>
                <p class="question-answer hidden">Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                    Tempora nesciunt sunt pariatur vel excepturi doloremque 
                    beatae sequi, odio tempore ullam dolore alias neque enim 
                    iste vitae error architecto ipsum veritatis.
                </p>
            </div>
            <div class="question">
                <i class="fa-solid fa-circle-plus plus-icon"></i>
                <h6 class="question-title">¿Cuáles son los tiempos de entrega?</h6>
                <p class="question-answer hidden">Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                    Tempora nesciunt sunt pariatur vel excepturi doloremque 
                    beatae sequi, odio tempore ullam dolore alias neque enim 
                    iste vitae error architecto ipsum veritatis.
                </p>
            </div>
        </div>
    </div>
</div>
@endsection