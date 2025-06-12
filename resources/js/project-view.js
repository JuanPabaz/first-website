document.addEventListener('DOMContentLoaded', function() {
    // Inicializar el carrusel
    const carousel = new bootstrap.Carousel(document.getElementById('imageCarousel'), {
        interval: 5000, // Cambia de imagen cada 5 segundos
        pause: 'hover', // Pausa al pasar el ratón
        wrap: true // Vuelve al principio después de la última imagen
    });

    // Opcional: Añadir animación de fade
    const carouselInner = document.querySelector('.carousel-inner');
    carouselInner.style.transition = 'opacity 0.5s ease';
});