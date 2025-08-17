import { showModal, hideModal, sleep } from '@/modales/modalHelper';
import * as bootstrap from 'bootstrap';
window.bootstrap = bootstrap;

const GestionarCaso = document.querySelector('#gestionarCaso'),
TimeLine = document.querySelector('#time-line'),
InfoInferior = document.querySelector('#DatosInf'),
InfoSuperior = document.querySelector('#DatosSup'),
InfoHoras = document.querySelector('.DatosHoras'),
AgregarCaso = document.querySelector("#agregarCaso")

const modalCarga = new bootstrap.Modal(document.getElementById('modalCarga'), { backdrop: 'static', keyboard: false }),
modalError  = new bootstrap.Modal(document.getElementById('modalError')),
modalSuccess = new bootstrap.Modal(document.getElementById('modalSuccess'));


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

AgregarCaso.addEventListener('click', async(e) => {
    console.log("hola")
    const form = document.querySelector("#AltaCaso"),
    datos = new FormData(form)

    let datosCompletos = Object.fromEntries(datos.entries())
    const datosJson = JSON.stringify(datosCompletos)

    showModal(modalCarga)
    await new Promise(r => setTimeout(r, 2000))
    hideModal(modalCarga)

    showModal(modalSuccess)
    hideModal(modalSuccess, 2000, () => {
        // $("#modalNuevoCaso").modal({
        //     hide:true
        // })
    });

    // try {
    //     const res = await fetch('https://api.lexialegal.site/api/legal-cases', {
    //         method: "POST",
    //         headers: {
    //             'Content-Type': 'application/json',
    //             Accept: 'application/json'
    //         },
    //         body: datosJson
    //     })

    //     const data = await res.json()

    //     if (data.status == 200) {
    //         showModal(modalSuccess)
    //         successMsj.textContent = '¡Bienvenido!'
    //         hideModal(modalSuccess, 2000, () => {
    //             $("#modalNuevoCaso").modal({
    //                 hide:true
    //             })
    //         });
    //     }

    // } catch (error) {
    //     showModal(modalError)
    //     hideModal(modalError, 2000)
    // }
})
