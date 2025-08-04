
const BtnRecuperar = document.querySelector("#btnEnviarCorreoRecuperar"),
Correo = document.querySelector("#email_recuperacion"),
ErrorCorreo = document.querySelector("#errorEmailRecuperacion")


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
    }, 8800)
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

    fetch('https://api.lexialegal.site/api/forgot-password', {
        method: "POST",
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
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
})
