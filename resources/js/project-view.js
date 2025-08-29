document.addEventListener('DOMContentLoaded', function() {
    // Inicializar ambos carruseles
    const carousels = document.querySelectorAll('.carousel');
    
    carousels.forEach((carouselElement) => {
        const carousel = new bootstrap.Carousel(carouselElement, {
            interval: 5000,
            pause: 'hover',
            wrap: true
        });

        // Opcional: Añadir animación de fade a cada carrusel
        const carouselInner = carouselElement.querySelector('.carousel-inner');
        if (carouselInner) {
            carouselInner.style.transition = 'opacity 0.5s ease';
        }
    });
});