@vite("resources/css/services.css")
@extends('layout')
@section('content')
<div class="services-container">
    <div class="services-prelude">
        <div class="service-prelude-title">
            <h1>Inicia tu sueño</h1>
        </div>
    </div>
    <div class="services">
        <div class="service-titles">
            <img src="{{ asset('images/img-service-title1.png') }}" alt="" class="service-title-img">
        </div>
        <div class="service-list">
            <div class="service">
                <div class="service-content">
                    <hr class="yellow-line">
                    <h2 class="service-title">Diseño interior</h2>
                    <p>
                        Diseñamos espacios que reflejan la identidad que quieres para tu entorno. 
                        Trabajamos desde la distribución y el mobiliario hasta los acabados y materiales, 
                        creando ambientes que responden a tu estilo de vida y a las necesidades 
                        funcionales del espacio. Cada detalle es pensado para lograr armonía, confort 
                        y una experiencia habitable única.
                    </p>
                    <div class="service-prices">
                        <i class="fa-regular fa-clock" style="color: #FFFFFF"></i>
                        <p>2 - 4 semanas</p>
                    </div>
                </div>
            </div>
            <div class="service">
                <div class="service-content">
                    <hr class="yellow-line">
                    <h2 class="service-title">Diseño comercial</h2>
                    <p>
                        Diseñamos espacios que comunican y potencian la identidad de tu marca. Creamos entornos 
                        funcionales, estéticos y estratégicamente pensados para generar impacto visual y 
                        mejorar la experiencia del cliente. Nuestro objetivo es que tu empresa o negocio no 
                        solo se vea bien, sino que transmita lo que representa desde el primer vistazo.
                    </p>
                    <div class="service-prices">
                        <i class="fa-regular fa-clock" style="color: #FFFFFF"></i>
                        <p>2 - 4 semanas</p>
                    </div>
                </div>
            </div>
            <div class="service">
                <div class="service-content">
                    <hr class="yellow-line">
                    <h2 class="service-title">Diseño arquitectónico</h2>
                    <p>
                        Desarrollamos proyectos desde una visión integral que parte del diseño general del espacio. 
                        Este servicio incluye la distribución espacial, articulación funcional y coordinación 
                        técnica del proyecto. Ideal para viviendas campestres, casas unifamiliares u obras nuevas, 
                        también contempla, de ser solicitado la gestión de estudios complementarios como estructurales, 
                        de suelos y demás requerimientos técnicos necesarios para una ejecución adecuada.
                    </p>
                    <div class="service-prices">
                        <i class="fa-regular fa-clock" style="color: #FFFFFF"></i>
                        <p>4 - 8 semanas</p>
                    </div>
                </div>
            </div>
            <div class="service">
                <div class="service-content">
                    <hr class="yellow-line">
                    <h2 class="service-title">Renderización y modelado 3D</h2>
                    <p>
                        ¿Diseñas pero no modelas? Este servicio es para ti. Apoyamos a otros profesionales del diseño 
                        y la arquitectura en la visualización de sus proyectos. Nos encargamos del modelado 3D y la 
                        creación de imágenes realistas que permiten comunicar ideas con claridad, fidelidad y alto 
                        impacto visual. Tú diseñas, nosotros lo hacemos realidad en tres dimensiones.
                    </p>
                    <div class="service-prices">
                        <i class="fa-regular fa-clock" style="color: #FFFFFF"></i>
                        <p>2 - 3 semanas</p>
                    </div>
                </div>
            </div>
            <div class="service">
                <div class="service-content">
                    <hr class="yellow-line">
                    <h2 class="service-title">Branding de marca</h2>
                    <p>
                        ¿Apenas vas a comenzar tu marca y no sabes por dónde empezar? Nosotros te ayudamos. 
                        Creamos conceptos visuales sólidos que dan vida a marcas con propósito, coherencia y 
                        proyección. Desarrollamos logotipos, paletas de color, tipografías y aplicaciones 
                        gráficas pensadas para comunicar de forma clara y memorable.
                    </p>
                    <div class="service-prices">
                        <i class="fa-regular fa-clock" style="color: #FFFFFF"></i>
                        <p>4 - 8 semanas</p>
                    </div>
                </div>
            </div>
            <div class="service">
                <div class="service-content">
                    <hr class="yellow-line">
                    <h2 class="service-title">Supervisión e interventoría de obra</h2>
                    <p>
                        Aseguramos que tu proyecto se ejecute tal como fue diseñado. Acompañamos la obra con 
                        un seguimiento técnico constante, velando por el cumplimiento de los acuerdos 
                        establecidos. Este servicio es ideal si ya tienes un contratista o equipo de obra, 
                        pero necesitas respaldo profesional para garantizar que todo se haga bien, sin errores 
                        ni sobrecostos innecesarios.
                    </p>
                    <div class="service-prices">
                        <i class="fa-regular fa-clock" style="color: #FFFFFF"></i>
                        <p></p>
                    </div>
                </div>
            </div>
            <div class="service">
                <div class="service-content">
                    <hr class="yellow-line">
                    <h2 class="service-title">Renderización y modelado 3D</h2>
                    <p>
                        ¿Ya diseñaste tu proyecto pero necesitas saber cuánto cuesta llevarlo a la realidad? 
                        Elaboramos presupuestos detallados con base en las especificaciones del diseño. 
                        Analizamos cantidades de obra, materiales, acabados y requerimientos técnicos, para que 
                        tengas claridad sobre los costos reales antes de iniciar la ejecución. Ideal para tomar 
                        decisiones con información precisa y evitar sorpresas en el camino.
                    </p>
                    <div class="service-prices">
                        <i class="fa-regular fa-clock" style="color: #FFFFFF"></i>
                        <p></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="get-service">
        <div class="get-service-content">
            <h3>¡Hazlo realidad con VUOTTA!</h3>
            <p>
                Ya diste el primer paso y llegaste hasta aquí. Ahora atrévete a hacer tu sueño realidad y 
                ponte en contacto con nosotros. Estamos listos para acompañarte en cada etapa del proceso.
                <a href="{{ asset('pdf/TERMINOS Y CONDICIONES.pdf') }}" target="_blank" rel="noopener noreferrer">Terminos y condiciones</a>
            </p>
        </div>
        <div class="get-service-buttons">
            <button class="cotizar-service-button">Cotizar</button>
        </div>
    </div>
</div>
@endsection
