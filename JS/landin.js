// script.js
let index = 0;
const slideInterval = 5000; // Intervalo de transição automática (5 segundos)

function showSlide(n) {
    const slides = document.querySelectorAll('.carrossel-images img');
    const indicators = document.querySelectorAll('.indicator');
    if (n >= slides.length) index = 0;
    if (n < 0) index = slides.length - 1;

    const offset = -index * 100; // Move o carrossel para a imagem atual
    document.querySelector('.carrossel-images').style.transform = `translateX(${offset}%)`;

    // Atualiza os indicadores
    indicators.forEach((indicator, i) => {
        indicator.classList.toggle('active', i === index);
    });
}

function nextSlide() {
    index++;
    showSlide(index);
}

function prevSlide() {
    index--;
    showSlide(index);
}

function goToSlide(n) {
    index = n;
    showSlide(index);
}

// Inicia o carrossel mostrando a primeira imagem
showSlide(index);

// Configura a transição automática
setInterval(() => {
    nextSlide();
}, slideInterval);
