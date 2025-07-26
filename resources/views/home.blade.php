@vite('resources/css/home.css')
@vite('resources/js/home.js')
@extends('layout')

@section('content')
<div class="home-container">
    <div class="home-section">
        <div class="home-content">
            <h1>Transformamos espacios, creamos sueños.</h1>
            <p>Nuestro equipo convierte tus ideas en espacios funcionales, 
                estéticos y bien pensados, acompañándote en cada etapa del proceso. 
                Si buscas renovar, construir o reimaginar un espacio, estamos aquí 
                para ayudarte a materializar tus sueños.
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
        <div class="testimonials-carousel">
            <!-- Testimonio 1 -->
            <div class="testimonial-slide active">
                <div class="testimonial-content">
                    <div class="testimonial-details">
                        <img src="{{ asset('images/testimonio1.JPG') }}" alt="Valentina - Restaurante La Ardilla">
                        <div class="person-details">
                            <p class="person-name">Valentina</p>
                            <p class="person-review">Gerente Restaurante La Ardilla</p>
                        </div>
                    </div>
                    <div class="testimonial-title">
                        <h2>“...resolvieron cada una de mis dudas y me dieron seguridad en cada etapa del proyecto...”</h2>
                    </div>
                </div>
            </div>
            
            <!-- Testimonio 2 -->
            <div class="testimonial-slide">
                <div class="testimonial-content">
                    <div class="testimonial-details">
                        <img src="{{ asset('images/testimonio3.PNG') }}" alt="Laura Durango">
                        <div class="person-details">
                            <p class="person-name">Laura Durango</p>
                            <p class="person-review">Ceo Cejas Laura Durango</p>
                        </div>
                    </div>
                    <div class="testimonial-title">
                        <h2>“Sentí mucha confianza, se adaptaron a mi presupuesto... este lugar quedó soñado, tal cual el render”</h2>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Puntos de navegación -->
        <div class="carousel-dots">
            <span class="dot active" data-slide="0"></span>
            <span class="dot" data-slide="1"></span>
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
    <div class="projects-section">
        <div class="projects-carousel">
            @for($i = 0; $i < count($projects); $i += 3)
                <div class="projects-slide {{ $i == 0 ? 'active' : '' }}">
                    <div class="projects-row">
                        @foreach($projects->slice($i, 3) as $project)
                            <div class="project-details">
                                <img src="{{ asset('images/' . $project->img) }}" alt="{{ $project->name }}">
                                <p class="project-date">{{ \Carbon\Carbon::parse($project->date)->format('d M Y') }}</p>
                                <a href="{{ route('proyectos.detalle', $project->id) }}" class="project-title">{{ $project->name }}</a>
                                <p class="project-description">
                                    {{ $project->description }}
                                </p>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endfor
        </div>
        
        <!-- Puntos de navegación -->
        <div class="carousel-dots">
            @for($i = 0; $i < ceil(count($projects)/3); $i++)
                <span class="dot {{ $i == 0 ? 'active' : '' }}" data-slide="{{ $i }}"></span>
            @endfor
        </div>
    </div>
    <div class="questions-section">
        <div class="questions-section-title">
            <h5>Preguntas frecuentes</h5>
        </div>
        <div class="questions">
            <div class="question">
                <i class="fa-solid fa-circle-plus plus-icon"></i>
                <h6 class="question-title">¿Qué tipo de proyectos realizan?</h6>
                <p class="question-answer hidden">
                    Ofrecemos diseño arquitectónico en diferentes escalas y tipologías: 
                        proyectos de arquitectura general, diseño interior y diseño comercial. 
                        No importa qué tan grande o pequeño sea tu proyecto, con VUOTTA puedes 
                        hacerlo realidad.
                        Además, brindamos servicios como ejecución de obra, supervisión, interventoría 
                        y otros complementarios como branding de marca para proyectos que buscan una 
                        identidad integral. Nos especializamos en crear propuestas funcionales, 
                        estéticas y personalizadas, adaptadas a las necesidades específicas de cada 
                        cliente y cada espacio.
                </p>
            </div>
            <div class="question">
                <i class="fa-solid fa-circle-plus plus-icon"></i>
                <h6 class="question-title">¿Puedo contratar solo el diseño sin la ejecución de la obra?</h6>
                <p class="question-answer hidden">
                    Sí, puedes contratar únicamente el diseño. Entregaremos todo el material necesario, 
                    según el plan que escojas, para que tu proyecto pueda ser ejecutado por cualquier 
                    equipo: planos técnicos, renders, especificaciones y memorias de diseño.
                    También ofrecemos asesorías puntuales durante la obra si deseas que acompañemos el 
                    proceso sin encargarnos directamente de la ejecución. Nuestro objetivo es hacerte 
                    la vida más fácil: nos encargamos de los detalles técnicos para que tú no tengas 
                    que preocuparte.
                </p>
            </div>
            <div class="question">
                <i class="fa-solid fa-circle-plus plus-icon"></i>
                <h6 class="question-title">¿Cómo es el proceso de trabajo?</h6>
                <p class="question-answer hidden">
                    Aquí comienza tu sueño a convertirse en realidad. Iniciamos con una reunión para conocer 
                    tus ideas, necesidades y condiciones del espacio. Luego desarrollamos la propuesta de 
                    diseño, que incluye conceptos, distribuciones y primeras visualizaciones. Una vez 
                    aprobada, avanzamos con los planos técnicos y demás entregables según el plan contratado. 
                    Si lo solicitas, también podemos elaborar un presupuesto detallado de obra basado en el 
                    diseño. En caso de que decidas realizar la ejecución de la obra con nosotros, te 
                    garantizamos un acompañamiento continuo y supervisión profesional en cada etapa del 
                    proceso, asegurando que el resultado final refleje fielmente lo diseñado.
                </p>
            </div>
            <div class="question">
                <i class="fa-solid fa-circle-plus plus-icon"></i>
                <h6 class="question-title">¿Cuánto cuesta un proyecto de diseño o remodelación?</h6>
                <p class="question-answer hidden">
                    El valor depende del tipo de proyecto, los metros cuadrados a intervenir y el nivel de 
                    detalle requerido. Siempre ofrecemos una cotización personalizada y, no te preocupes, 
                    podemos revisar qué posibilidades hay para ajustarnos a tus necesidades y/o alcances.
                    Si tu proyecto supera los 20 m² diseñados, puedes acceder a nuestro brochure de diseño, 
                    donde encontrarás rangos de precios según el tipo de intervención. Comunícate con 
                    nuestras líneas de atención para recibirlo y resolver cualquier duda adicional.
                </p>
            </div>
            <div class="question">
                <i class="fa-solid fa-circle-plus plus-icon"></i>
                <h6 class="question-title">¿Trabajan en cualquier ciudad?</h6>
                <p class="question-answer hidden">
                    Principalmente operamos en Medellin, Colombia, pero también asumimos proyectos en 
                    otras zonas según la escala y condiciones. ¡Pero tú tranquilo! VUOTTA está en 
                    todas partes. Contáctanos y revisaremos juntos la viabilidad de tu proyecto, 
                    donde sea que estés.
                </p>
            </div>
            <div class="question">
                <i class="fa-solid fa-circle-plus plus-icon"></i>
                <h6 class="question-title">¿Qué diferencia a nuestro equipo de otros estudios de arquitectura?</h6>
                <p class="question-answer hidden">
                    Sabemos lo estresante que pueden ser los procesos de diseño y construcción, por eso 
                    trabajamos para que tu experiencia sea clara, cercana y sin complicaciones. Nos 
                    diferencia nuestro enfoque integral: combinamos diseño funcional, estética, 
                    planificación realista y acompañamiento constante. No sólo proyectamos espacios, 
                    también los pensamos desde tu experiencia, necesidades y posibilidades reales de 
                    ejecución.
                </p>
            </div>
        </div>
    </div>
</div>
@endsection