import './bootstrap';
import './loader.js';
import { DotLottie } from '@lottiefiles/dotlottie-web';
import { showModal, hideModal, sleep } from '@/modales/modalHelper';
import * as bootstrap from 'bootstrap';
window.bootstrap = bootstrap;


const SuccessAnim = document.querySelector('.animSuccess'),
ErrorAnim = document.querySelector('.animError'),
CargaAnim = document.querySelector('.animCarga')

const dropMain = document.querySelector(".dropMain"),
dropSuscripcion = document.querySelector("#dropSuscripcion"),
dropConfiguracion = document.querySelector("#dropConfiguracion"),
btnSuscripcion = document.querySelector(".showSus"),
btnConfiguracion = document.querySelector(".showConf"),
btnBackSuscripcion = document.querySelector(".backSuscripcion"),
btnBackConfiguracion = document.querySelector(".backConfiguracion"),
btnDropMain = document.querySelector(".btnShowDrop"),
btnCerrarSesion = document.querySelector("#closeSession"),
btnsPlanUpdate = document.querySelectorAll(".btnPlan"),
btnConfirmPlan = document.querySelector("#confirmPlan"),
btnEliminarCuenta = document.querySelector("#btnEliminarCuenta"),
idPlan = document.querySelector("#idPlan"),
successMsj = document.getElementById('mensajeExito'),
errorMsj = document.getElementById('mensajeError'),
cargaMsj = document.getElementById('mensajeCarga'),
tipoPlan = document.getElementById('tipoPlan'),
TersmCond = document.getElementById('temrs_cond')

const modalCarga = new bootstrap.Modal(document.getElementById('modalCarga'), { backdrop: 'static', keyboard: false }),
modalError  = new bootstrap.Modal(document.getElementById('modalError')),
modalSuccess = new bootstrap.Modal(document.getElementById('modalSuccess'));


const animationSuccess = new DotLottie({
    autoplay: true,
    loop: true,
    canvas: SuccessAnim,
    src: "/images/AIlogoForiday.json", // or .json file
    // src: "https://lottie.host/fa61eb1b-c103-4ba1-8f1e-4e6e7fd5a24c/2RhlL3wpKz.lottie", // or .json file
})

const animationError = new DotLottie({
    autoplay: true,
    loop: true,
    canvas: ErrorAnim,
    // src: "https://lottie.host/16d17efc-47f1-4ecd-a52e-1c638044e891/Id7GM0IlEM.lottie", // or .json file
    // src: "https://lottie.host/56f3f712-d49d-4d0d-a1c8-b8bd8ad1e184/kOVctgJg6M.lottie", // or .json file
    src: "", // or .json file
})

const animationLoad = new DotLottie({
    autoplay: true,
    loop: true,
    canvas: CargaAnim,
    src: "/images/lexia.json", // or .json file
    // src: "https://lottie.host/16d17efc-47f1-4ecd-a52e-1c638044e891/Id7GM0IlEM.lottie", // or .json file
})


function StriepWindow(URL, Titulo, features, myWidth, myHeight, isCenter) {
    if (window.screen) if (isCenter) if (isCenter == "true") {
        var myLeft = (screen.width - myWidth) / 2;
        var myTop = (screen.height - myHeight) / 2;
        features += (features != '') ? ',' : '';
        features += ',left=' + myLeft + ',top=' + myTop;
    }
    window.open(URL, Titulo, features + ((features != '') ? ',' : '') + 'width=' + myWidth + ',height=' + myHeight + ",status = no, toolbar = no, menubar = no, location = no ," + " directories=no");
}

$('.dropdown-main').on('click', function(e) {
  e.stopPropagation();
});

btnDropMain.addEventListener('click', function(){
    dropConfiguracion.classList.add('dropHide')
    dropSuscripcion.classList.add('dropHide')
    dropMain.classList.remove('dropHide')
})

btnSuscripcion.addEventListener('click', function(){
    dropMain.classList.add('dropHide')
    dropConfiguracion.classList.add('dropHide')
    setTimeout(()=> {
        dropSuscripcion.classList.remove('dropHide')
    }, 1550)
})

btnConfiguracion.addEventListener('click', function(){
    dropMain.classList.add('dropHide')
    dropSuscripcion.classList.add('dropHide')
    setTimeout(()=> {
        dropConfiguracion.classList.remove('dropHide')
    }, 1550)
})

btnBackConfiguracion.addEventListener('click', function (){
    dropConfiguracion.classList.add('dropHide')
    dropSuscripcion.classList.add('dropHide')
    setTimeout(()=> {
        dropMain.classList.remove('dropHide')
    }, 1550)
})

btnBackSuscripcion.addEventListener('click', function (){
    dropConfiguracion.classList.add('dropHide')
    dropSuscripcion.classList.add('dropHide')
    setTimeout(()=> {
        dropMain.classList.remove('dropHide')
    }, 1550)
})


btnConfirmPlan.addEventListener('click', async(e) => {
    $("#modalCambioPlan").modal("hide")
    showModal(modalCarga)
    await new Promise(r => setTimeout(r, 2000))
    hideModal(modalCarga)

    try {
        const me = await fetch('/get-token')
        const res_me = await me.json()

        let body = {
            "plan_id": parseInt(idPlan.value)
        }

        const update_plan = await fetch("https://api.lexialegal.site/api/stripe/create-session", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "Accept": "application/json",
                    'Authorization': `Bearer ${res_me.token}`,
                },
                body: JSON.stringify(body)
            })

        const res_update_plan = await update_plan.json()
        if (update_plan.ok) {
            StriepWindow(res_update_plan.data.url, "Transacción de pago", "", 1000, 800, 'true');
            location.reload();
        }
        else{
            showModal(modalSuccess)
            successMsj.textContent = res_update_plan.message
            hideModal(modalSuccess, 2000)
        }

    } catch (error) {
        showModal(modalSuccess)
        hideModal(modalSuccess, 2000)
    }
})


btnsPlanUpdate.forEach(button => {
    button.addEventListener('click', async(e) => {
        $("#modalCambioPlan").modal("show")
        let planId = button.getAttribute('data-plan'),
        planNombre = button.getAttribute('data-nombre-plan')
        tipoPlan.innerText = planNombre
        idPlan.value = planId
    })
})

TersmCond.addEventListener('click', ()=> {
    $("#modalDocumentos").modal("show")
})

// btnCerrarSesion.addEventListener('click', function(){
//     const dataM = document.querySelector('meta[name="csrf-token"]')
//     const descriptionM = dataM.getAttribute('content')
// })

btnEliminarCuenta.addEventListener('click', async(e) => {
    showModal(modalCarga)

    try {

        const me = await fetch('/get-token')
        const res_me = await me.json()

        const data_me = await fetch("https://api.lexialegal.site/api/me", {
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json",
                'Authorization': `Bearer ${res_me.token}`,
            }
        })

        const res_data_me = await data_me.json()
        console.log(res_data_me[0].lawfirm.id)
        let body = {
            id: res_data_me[0].lawfirm.id
        }

        const delete_account = await fetch("https://api.lexialegal.site/api/subscriptions/architecto", {
            method: "DELETE",
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json",
                'Authorization': `Bearer ${res_me.token}`
            },
            body: JSON.stringify(body)
        })

        const res_delete_account = await delete_account.json()

        if (delete_account.ok) {
            cargaMsj.innerHTML = res_delete_account.message
            // hideModal(modalCarga, 2000, ()=> {
            //     window.location.href =  '/' + 'login'
            // })
        } else {
            hideModal(modalCarga)
            errorMsj.innerHTML = res_delete_account.message
            showModal(modalError)
            hideModal(modalError, 3000)
        }

    } catch (error) {
        errorMsj.innerHTML = error
        hideModal(modalCarga)
        showModal(modalError)
        hideModal(modalError, 3000)
    }
})
