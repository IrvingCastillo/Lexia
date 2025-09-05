
// Inicializar la página
document.addEventListener('DOMContentLoaded', function() {
    console.log('Página cargada correctamente');
    document.body.style.opacity = '1';
});

// ===== SCROLL ANIMATIONS =====
const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('visible');
        }
    });
}, observerOptions);

// Observe all fade-in elements
document.querySelectorAll('.fade-in').forEach(el => {
    observer.observe(el);
});

// ===== NAVBAR SCROLL EFFECT =====
window.addEventListener('scroll', () => {
    const navbar = document.querySelector('.navbar');
    if (window.scrollY > 50) {
        navbar.style.background = 'linear-gradient(135deg, rgba(19, 44, 71, 0.98) 0%, rgba(30, 58, 95, 0.98) 100%)';
        navbar.style.boxShadow = '0 10px 50px rgba(0, 0, 0, 0.4)';
        navbar.style.borderBottom = '2px solid rgba(255, 255, 255, 0.2)';
        navbar.style.padding = '10px 0';
        navbar.style.transform = 'translateY(0)';
    } else {
        navbar.style.background = 'linear-gradient(135deg, rgba(19, 44, 71, 0.95) 0%, rgba(30, 58, 95, 0.95) 100%)';
        navbar.style.boxShadow = '0 8px 40px rgba(0, 0, 0, 0.3)';
        navbar.style.borderBottom = '2px solid rgba(255, 255, 255, 0.1)';
        navbar.style.padding = '15px 0';
        navbar.style.transform = 'translateY(0)';
    }
});

// Asegurar que el navbar esté siempre visible
window.addEventListener('load', () => {
    const navbar = document.querySelector('.navbar');
    navbar.style.transform = 'translateY(0)';
    navbar.style.visibility = 'visible';
});

// ===== SMOOTH SCROLLING FOR NAVIGATION =====
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});

// ===== ADDITIONAL INTERACTIVITY =====
// Add loading animation to buttons
document.querySelectorAll('.btn-primary')
