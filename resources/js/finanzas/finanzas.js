console.log("hola")

document.querySelectorAll('.btn-toggle-group input').forEach(radio => {
    radio.addEventListener('change', () => {
        document.querySelectorAll('.btn-toggle').forEach(btn => btn.classList.remove('active'));
        radio.nextElementSibling.classList.add('active');
    });
});
