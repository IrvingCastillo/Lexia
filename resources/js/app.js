import './bootstrap';
import './loader.js';
import { DotLottie } from '@lottiefiles/dotlottie-web';
import * as modalHelper from '@/modales/modalHelper';
window.modalHelper = modalHelper;


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
btnCerrarSesion = document.querySelector("#closeSession")


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
    src: "https://lottie.host/56f3f712-d49d-4d0d-a1c8-b8bd8ad1e184/kOVctgJg6M.lottie", // or .json file
})

const animationLoad = new DotLottie({
    autoplay: true,
    loop: true,
    canvas: CargaAnim,
    src: "https://lottie.host/16d17efc-47f1-4ecd-a52e-1c638044e891/Id7GM0IlEM.lottie", // or .json file
})

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

btnCerrarSesion.addEventListener('click', function(){
    console.log("hola",)
    const dataM = document.querySelector('meta[name="csrf-token"]')
    const descriptionM = dataM.getAttribute('content')
    console.log(descriptionM)
})

