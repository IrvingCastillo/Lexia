let btnLogin = document.querySelector('.btnLogin')

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
    }, 8000)
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

//   "email":"fernando@gmail.com",
//   "password":"password"
//   https://api.lexialegal.site/api/login

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
        fetch('https://f2cfbd702bbb.ngrok-free.app/api/login', {
            method: "POST",
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json'
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
