function toggleMenu() {
    const desktopMenu = document.querySelector('.desktop-menu');
    desktopMenu.classList.toggle('active');
}

document.addEventListener("DOMContentLoaded", function() {
    const counters = document.querySelectorAll('.pessoas, .pessoas-1');

    const observerOptions = {
        root: null,
        rootMargin: '0px',
        threshold: 0.1
    };

    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const counter = entry.target;
                const target = +counter.getAttribute('data-target');
                const countElement = counter.querySelector('h2');

                const updateCount = () => {
                    let count = +countElement.innerText.replace(/\D/g, '');
                    const increment = target / 200;

                    if (count < target) {
                        countElement.innerText = (count + increment).toLocaleString('pt-BR', { minimumFractionDigits: 0, maximumFractionDigits: 0 });
                        setTimeout(updateCount, 10);
                    } else {
                        countElement.innerText = target.toLocaleString('pt-BR', { minimumFractionDigits: 0, maximumFractionDigits: 0 });
                    }
                };

                const startAnimation = () => {
                    countElement.innerText = '0';
                    updateCount();
                };

                startAnimation();
                setInterval(startAnimation, 10000); // Repete a cada 10 segundos

                observer.unobserve(counter);
            }
        });
    }, observerOptions);

    counters.forEach(counter => {
        observer.observe(counter);
    });
});

// Este script essencialmente anima a contagem de números dentro de elementos com as classes pessoas e pessoas-1. Ele começa do número atual e vai incrementando até alcançar o valor especificado no atributo data-target, criando um efeito visual de contagem crescente.//



//este código cria uma animação suave para contadores numéricos em sua página web, utilizando o IntersectionObserver para iniciar a animação quando os elementos entram na visão do usuário//

// Feito com ajuda do chatgpt //

