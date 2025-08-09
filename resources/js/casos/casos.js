const GestionarCaso = document.querySelector('#gestionarCaso'),
TimeLine = document.querySelector('#time-line'),
InfoInferior = document.querySelector('#DatosInf'),
InfoSuperior = document.querySelector('#DatosSup'),
InfoHoras = document.querySelector('.DatosHoras')

GestionarCaso.addEventListener('click', function(){
    setTimeout(()=> {
        InfoSuperior.classList.add('cardHide')
        TimeLine.classList.add('show')
        //  setTimeout(()=> {
            InfoInferior.classList.remove('cardHide')
        // }, 300)
        InfoHoras.classList.add('show')
        actualizarContador()
    }, 500)
})

$('.dropdown-menu').on('click', function(e) {
  e.stopPropagation();
});

function actualizarContador() {
  const ahora = new Date();
  const horas = ahora.getHours();
  const minutos = ahora.getMinutes();
  const segundos = ahora.getSeconds();

  const tiempoFormateado = `${horas.toString().padStart(2, '0')}:${minutos.toString().padStart(2, '0')}:${segundos.toString().padStart(2, '0')}`;

  document.getElementById('reloj').textContent = tiempoFormateado;
}

setInterval(actualizarContador, 1000);
