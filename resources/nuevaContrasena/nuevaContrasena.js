import { DotLottie } from '@lottiefiles/dotlottie-web';

const Pass = document.querySelector("#password_new"),
PassC = document.querySelector("#confirm_password"),
ErrorRestaurar = document.querySelector("#errorRestaurarContra"),
BtnGuardar = document.querySelector("#btnNuevaContrasena"),
SuccessAnim = document.querySelector('.animSuccess'),
ErrorAnim = document.querySelector('.animError')

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



function ValidarContraseña(contraseña) {
    const regex = /^(?=.*[A-Z])(?=.*\d).{8,}$/;
    return regex.test(contraseña);
}

Pass.addEventListener('input', function(){
    if (PassC.value != "") {
        Verificar()
    }
})

PassC.addEventListener('input', function(){
    Verificar()
})


function mostrarModalCarga(){
    $('#modalCarga').modal('show')
    animationLoad.setSegment(0,120, true)
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
        $("#mensajeExito").html('Contraseña restaurada')
    }, 5010)
}

function ocultarModalSuccess(){
    setTimeout(function() {
        $('#modalSuccess').modal('hide')
        // redireccionar
    }, 6500)
}

function Verificar(){
    let validatePass = ValidarContraseña(Pass.value),
    validatePassC = ValidarContraseña(PassC.value)

    if (validatePass && validatePassC) {
        if (Pass.value !== PassC.value) {
            console.log("la contraseña no coincide")
            Pass.classList.remove('Validado')
            PassC.classList.remove('Validado')
            Pass.classList.add('NoValidado')
            PassC.classList.add('NoValidado')
            BtnGuardar.disabled = true
            ErrorRestaurar.innerHTML = "Las contraseñas no coinciden"

        }
        else if(Pass.value == "" && PassC == ""){
            Pass.classList.remove('Validado')
            PassC.classList.remove('Validado')
            Pass.classList.add('NoValidado')
            PassC.classList.add('NoValidado')
            BtnGuardar.disabled = true
            ErrorRestaurar.innerHTML = "Por favor llene los campos"
        }
        else{
            Pass.classList.remove('NoValidado')
            PassC.classList.remove('NoValidado')
            Pass.classList.add('Validado')
            PassC.classList.add('Validado')
            BtnGuardar.disabled = false
            ErrorRestaurar.innerHTML = ""
        }
    }
    else{
        Pass.classList.remove('Validado')
        PassC.classList.remove('Validado')
        Pass.classList.add('NoValidado')
        PassC.classList.add('NoValidado')
        BtnGuardar.disabled = true
        ErrorRestaurar.innerHTML = "Por favor ingrese una contraseña válida"
    }
}

BtnGuardar.addEventListener('click', function(event){
    event.preventDefault();
    let formulario = document.querySelector("#RecuperarContrasenaForm"),
    datos = new FormData(formulario)

    let datosCompletos = Object.fromEntries(datos.entries())
    let datosJson = JSON.stringify(datosCompletos)

    mostrarModalCarga()
    ocultarModalCarga()
    if (Pass.value == "" || PassC == "") {
        mostrarModalError()
        ocultarModalError()
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
            ocultarModalError()
        })
    }
})

