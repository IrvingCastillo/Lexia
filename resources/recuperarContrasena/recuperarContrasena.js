import { DotLottie } from '@lottiefiles/dotlottie-web';

const BtnRecuperar = document.querySelector("#btnEnviarCorreoRecuperar"),
Correo = document.querySelector("#email_recuperacion"),
ErrorCorreo = document.querySelector("#errorEmailRecuperacion")

const SuccessAnim = document.querySelector('.animSuccess'),
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

function ocultarModalError(){
    setTimeout(function() {
        $('#modalError').modal('hide')
    }, 7000)
}

function mostrarModalSuccess(){
    setTimeout(function() {
        $('#modalSuccess').modal('show')
        $("#mensajeExito").html('Un enlace se ha enviado al correo proporcionado')
    }, 5010)
}

function ocultarModalSuccess(){
    setTimeout(function() {
        $('#modalSuccess').modal('hide')
        // redireccionar
        location.href ="http://localhost:8000/login";
    }, 8500)
}

Correo.addEventListener('input', function(){
    let PasswordValidated = ValidarCorreo(Correo.value)
    if (Correo.value == "") {
        BtnRecuperar.disabled = true
        document.querySelector('.campoCorreoRecuperar').classList.remove('Validado')
        document.querySelector('.campoCorreoRecuperar').classList.add('NoValidado')
        ErrorCorreo.innerHTML = "El campo no puede quedar vacío"
    }
    else if(PasswordValidated == false){
        BtnRecuperar.disabled = true
        document.querySelector('.campoCorreoRecuperar').classList.remove('Validado')
        document.querySelector('.campoCorreoRecuperar').classList.add('NoValidado')
        ErrorCorreo.innerHTML = "La contraseña no coincide con el formato requerido"
    }
    else if(PasswordValidated){
        document.querySelector('.campoCorreoRecuperar').classList.remove('NoValidado')
        document.querySelector('.campoCorreoRecuperar').classList.add('Validado')
        ErrorCorreo.innerHTML = ""
        BtnRecuperar.disabled = false
    }
})

function ValidarCorreo(correo){
    const regex = /^[a-zA-z0-9_.+-]+@[a-zA-z0-9-]+\.[a-zA-z0-9-.]+$/
    return regex.test(correo)
}


BtnRecuperar.addEventListener('click', function(event){
    event.preventDefault();

    let formulario = document.querySelector("#RecuperarContrasenaForm"),
    datos = new FormData(formulario)

    let datosCompletos = Object.fromEntries(datos.entries())
    let datosJson = JSON.stringify(datosCompletos)

    mostrarModalCarga()
    ocultarModalCarga()

    // fetch('https://f2cfbd702bbb.ngrok-free.app/api/register/user', {
    //     method: "POST",
    //     headers: {
    //         'Content-Type': 'application/json'
    //     },
    //     body: datosJson
    // })
    // .then(response => {
    //     console.log("ok ", response)
        mostrarModalSuccess()
        ocultarModalSuccess()
    // })
    // .catch(error => {
    //     console.log(error)
    //     mostrarModalError()
    //     ocultarModalError()
    // })
})
