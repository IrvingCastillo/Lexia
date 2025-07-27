import { DotLottie } from '@lottiefiles/dotlottie-web';

let btnLogin = document.querySelector('.btnLogin'),
SuccessAnim = document.querySelector('.animSuccess'),
ErrorAnim = document.querySelector('.animError'),
CargaAnim = document.querySelector('.animCarga')

const animationSuccess = new DotLottie({
    autoplay: true,
    loop: true,
    canvas: SuccessAnim,
    src: "https://lottie.host/fa61eb1b-c103-4ba1-8f1e-4e6e7fd5a24c/2RhlL3wpKz.lottie", // or .json file
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


function mostrarModalCarga(){
    $('#modalCarga').modal('show')
}

function ocultarModalCarga(){
    setTimeout(function() {
        $("#modalCarga").modal('hide')
    }, 5000)
}

function mostrarModalError(){
    setTimeout(function() {
        $('#modalError').modal('show')
    }, 5010)
}

function ocultarModalError(mensaje){
    setTimeout(function() {
        $('#modalError').modal('hide')
        $('#errorLogin').html(mensaje)
    }, 7000)
}

function mostrarModalSuccess(){
    setTimeout(function() {
        $('#modalSuccess').modal('show')
        $("#mensajeExito").html('¡Bienvenido!')
    }, 5010)
}

function ocultarModalSuccess(){
    setTimeout(function() {
        $('#modalSuccess').modal('hide')
        // redireccionar
        location.href ="http://localhost:8000/";
    }, 8500)
}

btnLogin.addEventListener('click', function(e){
    e.preventDefault()
    let formulario = document.querySelector("#loginForm"),
    datos = new FormData(formulario),
    correo = document.querySelector('#email'),
    password = document.querySelector('#password')

    let datosCompletos = Object.fromEntries(datos.entries())
    let datosJson = JSON.stringify(datosCompletos)

    mostrarModalCarga()
    ocultarModalCarga()

    if (correo.value == "" || password.value == "") {
        mostrarModalError()
        ocultarModalError('Completa los campos para poder ingresar')
        return;
    }
    else{
        fetch('https://f2cfbd702bbb.ngrok-free.app/api/register/user', {
            method: "POST",
            headers: {
                'Content-Type': 'application/json'
            },
            body: datosJson
        })
        .then(response => {
            console.log("ok ", response)
            mostrarModalSuccess()
            ocultarModalSuccess()
        })
        .catch(error => {
            console.log(error)
            mostrarModalError()
            ocultarModalError('La contraseña o correo son incorrectos')
        })
    }
})
