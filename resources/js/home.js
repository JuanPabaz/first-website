document.addEventListener('DOMContentLoaded', function () {
    const icons = document.querySelectorAll('.plus-icon');

    icons.forEach(icon => {
        icon.addEventListener('click', () => {
            const questionDiv = icon.closest('.question');
            const answer = questionDiv.querySelector('.question-answer');

            if (answer.classList.contains('hidden')) {
                answer.classList.remove('hidden');
                icon.classList.remove('fa-circle-plus');
                icon.classList.add('fa-circle-minus');
            } else {
                answer.classList.add('hidden');
                icon.classList.remove('fa-circle-minus');
                icon.classList.add('fa-circle-plus');
            }
        });
    });

    const slides = document.querySelectorAll('.testimonial-slide');
    const dots = document.querySelectorAll('.dot');
    let currentSlide = 0;
    
    // Función para mostrar slide específico
    function showSlide(index) {
        slides.forEach(slide => slide.classList.remove('active'));
        dots.forEach(dot => dot.classList.remove('active'));
        
        slides[index].classList.add('active');
        dots[index].classList.add('active');
        currentSlide = index;
    }
    
    // Event listeners para los puntos
    dots.forEach(dot => {
        dot.addEventListener('click', function() {
            const slideIndex = parseInt(this.getAttribute('data-slide'));
            showSlide(slideIndex);
        });
    });
    
    // Opcional: Auto-avance cada 5 segundos
    setInterval(() => {
        currentSlide = (currentSlide + 1) % slides.length;
        showSlide(currentSlide);
    }, 10000);

        const projectSlides = document.querySelectorAll('.projects-slide');
    const projectDots = document.querySelectorAll('.projects-section .dot');
    let currentProjectSlide = 0;
    
    function showProjectSlide(index) {
        projectSlides.forEach(slide => slide.classList.remove('active'));
        projectDots.forEach(dot => dot.classList.remove('active'));
        
        projectSlides[index].classList.add('active');
        projectDots[index].classList.add('active');
        currentProjectSlide = index;
    }
    
    projectDots.forEach(dot => {
        dot.addEventListener('click', function() {
            const slideIndex = parseInt(this.getAttribute('data-slide'));
            showProjectSlide(slideIndex);
        });
    });
    
    // Auto-avance cada 8 segundos
    setInterval(() => {
        currentProjectSlide = (currentProjectSlide + 1) % projectSlides.length;
        showProjectSlide(currentProjectSlide);
    }, 10000);
});

