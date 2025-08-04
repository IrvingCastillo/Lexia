 import { DotLottie } from '@lottiefiles/dotlottie-web';

 const NombreCliente = document.querySelector('#nombre_cliente'),
    ApellidoPaterno = document.querySelector('#apellido_paterno'),
    ApellidoMaterno = document.querySelector('#apellido_materno'),
    NombreDespacho = document.querySelector('#nombre_despacho'),
    RazonSocial = document.querySelector('#razon_social'),
    RFC = document.querySelector('#rfc'),
    Correo = document.querySelector('#email'),
    Contrasena = document.querySelector('#password'),
    Telefono = document.querySelector('#telefono'),
    Direccion = document.querySelector('#direccion'),
    Estado = document.querySelector('#estado'),
    Ciudad = document.querySelector('#ciudad'),
    PlanSeleccionado = document.querySelector('#plan_seleccionado'),
    Terminos = document.querySelector('#aceptar_terminos')

    const Paginacion = document.querySelector("#paginacion"),
    Pill1 = document.querySelector("#pill-reg1-tab"),
    Pill2 = document.querySelector("#pill-reg2-tab"),
    Pill3 = document.querySelector("#pill-reg3-tab"),
    BtnStep2 = document.querySelector("#pag_2"),
    BtnStep3 = document.querySelector('#pag_3'),
    BtnSuscribirse = document.querySelector("#btnSuscribirse")

    const ErrorNombre = document.querySelector("#errorNombre"),
    ErrorApellidoPaterno = document.querySelector("#errorApellidoPaterno"),
    ErrorApellidoMaterno = document.querySelector("#errorApellidoMaterno"),
    ErrorNombreDespacho = document.querySelector("#errorNombreDespacho"),
    ErrorRazon = document.querySelector("#errorRazon"),
    ErrorRFC = document.querySelector("#errorRFC"),
    ErrorEmail = document.querySelector("#errorEmail"),
    ErrorPassword = document.querySelector("#errorPassword"),
    ErrorTelefono = document.querySelector("#errorTelefono"),
    ErrorEstado = document.querySelector("#errorEstado"),
    ErrorCiudad = document.querySelector("#errorCiudad"),
    ErrorPlan = document.querySelector("#errorPlan"),
    ErrorTerminos = document.querySelector("#errorTerminos")

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


Pill1.addEventListener("click", function() {
    Paginacion.innerHTML = ''
    Paginacion.innerHTML = '1'
    BtnStep2.classList.remove('active')
    BtnStep3.classList.remove('active')
})
Pill2.addEventListener("click", function() {
    Paginacion.innerHTML = ''
    Paginacion.innerHTML = '2'
    BtnStep3.classList.remove('active')
})
Pill3.addEventListener("click", function() {
    Paginacion.innerHTML = ''
    Paginacion.innerHTML = '3'
    BtnStep2.classList.remove('active')
})


BtnStep2.addEventListener("click", function() {
    Paginacion.innerHTML = ''
    Paginacion.innerHTML = '2'
    BtnStep3.classList.remove('active')
    Pill2.classList.add('active')
    Pill1.classList.remove('active')
    Pill3.classList.remove('active')
})
BtnStep3.addEventListener("click", function() {
    Paginacion.innerHTML = ''
    Paginacion.innerHTML = '3'
    BtnStep2.classList.remove('active')
    Pill3.classList.add('active')
    Pill1.classList.remove('active')
    Pill2.classList.remove('active')
})

NombreCliente.addEventListener('focusout', function(){
    if(NombreCliente.value == ""){
        NoValidado(NombreCliente, ErrorNombre)
    }
    else{
        Validado(NombreCliente, ErrorNombre)
    }
})

ApellidoPaterno.addEventListener('focusout', function(){
    if(ApellidoPaterno.value == ""){
        NoValidado(ApellidoPaterno, ErrorApellidoPaterno)
    }
    else{
        Validado(ApellidoPaterno, ErrorApellidoPaterno)
    }
})

ApellidoMaterno.addEventListener('focusout', function(){
    if(ApellidoMaterno.value == ""){
        NoValidado(ApellidoMaterno, ErrorApellidoMaterno)
    }
    else{
         Validado(ApellidoMaterno, ErrorApellidoMaterno)

    }
})

NombreDespacho.addEventListener('focusout', function(){
    if (NombreDespacho.value == "") {
        NoValidado(NombreDespacho, ErrorNombreDespacho)
    }
    else{
        Validado(NombreDespacho, ErrorNombreDespacho)
    }
})

RazonSocial.addEventListener('focusout', function(){
    if (RazonSocial.value == "") {
        NoValidado(RazonSocial, ErrorRazon)
    }
    else{
        Validado(RazonSocial, ErrorRazon)
    }
})


RFC.addEventListener('focusout', function(){
    let rfc = RFC.value.trim().toUpperCase(),
    rfcValidado = rfcValido(rfc)

    if (RFC.value == "") {
        RFC.classList.remove('Validado')
        RFC.classList.remove('NoValidado')
        ErrorRFC.innerHTML = ""
    }
    else if(rfcValidado == false){
        NoValidado(RFC, ErrorRFC, "El RFC introducido no es válido")
    }
    else if(rfcValidado){
        Validado(RFC, ErrorRFC)
    }
})

Correo.addEventListener('focusout', function(){
    let correoValidado = ValidarCorreo(Correo.value)

    if (Correo.value == "") {
        NoValidado(Correo, ErrorEmail)
    }
    else if(correoValidado == false){
        NoValidado(Correo, ErrorEmail, "El correo no coincide con el formato requerido")
    }
    else if(correoValidado){
        Validado(Correo, ErrorEmail)
    }
})

Contrasena.addEventListener('focusout', function(){
    let PasswordValidated = ValidarContraseña(Contrasena.value)
    if (Contrasena.value == "") {
        NoValidado(Contrasena, ErrorPassword)
    }
    else if(PasswordValidated == false){
        NoValidado(Contrasena, ErrorPassword, "La contraseña no coincide con el formato requerido")
    }
    else if(PasswordValidated){
        Validado(Contrasena, ErrorPassword)
    }
})

Telefono.addEventListener('focusout', function(){
    if (Telefono.value == "") {
        NoValidado(Telefono, ErrorTelefono)
    }
    else if(Telefono.value.length < 10){
        NoValidado(Telefono, ErrorTelefono, "EL número de teléfono está incompleto")
    }
    else{
        Validado(Telefono, ErrorTelefono)
    }
})

Estado.addEventListener('focusout', function(){
    if (Estado.value == "") {
        NoValidado(Estado, ErrorEstado)
    }
    else{
        Validado(Estado, ErrorEstado)
    }
})

Ciudad.addEventListener('focusout', function(){
    if (Ciudad.value == "") {
        NoValidado(Ciudad, ErrorCiudad)
    }
    else{
        Validado(Ciudad, ErrorCiudad)
    }
})

PlanSeleccionado.addEventListener('focusout', function(){
    if (PlanSeleccionado.value == "") {
        PlanSeleccionado.classList.add('NoValidado')
        ErrorPlan.innerHTML = "El campo no puede quedar vacío"
    }
    else{
        PlanSeleccionado.classList.remove('NoValidado')
        PlanSeleccionado.classList.add('Validado')
        ErrorPlan.innerHTML = ""
    }
})


Terminos.addEventListener('click', function(){
    if (Terminos.checked == true) {
        BtnSuscribirse.disabled = false
        BtnSuscribirse.title = ""
        Terminos.value = true
    }
    else{
        BtnSuscribirse.disabled = true
        BtnSuscribirse.title = "Debes aceptar los términos y condiciones"
    }
})


function NoValidado(inputCampo, errorCampo, mensaje = "El campo no puede quedar vacío"){
    inputCampo.classList.remove('Validado')
    inputCampo.classList.add('NoValidado')
    errorCampo.innerHTML = mensaje
}

function Validado(inputCampo, errorCampo){
    inputCampo.classList.remove('NoValidado')
    inputCampo.classList.add('Validado')
    errorCampo.innerHTML = ""
}

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
        $('#errorLogin').html('La contraseña o correo son incorrectos')
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
        $("#mensajeExito").html('¡Usuarios creado exitosamente, será dirigido a Inicio de Sesión!')
    }, 5010)
}

function ocultarModalSuccess(){
    setTimeout(function() {
        $('#modalSuccess').modal('hide')
        // redireccionar
        // location.href ="http://localhost:8000/";
    }, 8500)
}

function ValidarContraseña(contraseña) {
    const regex = /^(?=.*[A-Z])(?=.*\d).{8,}$/;
    return regex.test(contraseña);
}

function ValidarCorreo(correo){
    const regex = /^[a-zA-z0-9_.+-]+@[a-zA-z0-9-]+\.[a-zA-z0-9-.]+$/
    return regex.test(correo)
}

function rfcValido(rfc, aceptarGenerico = true) {
    const re = /^([A-ZÑ&]{3,4}) ?(?:- ?)?(\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])) ?(?:- ?)?([A-Z\d]{2})([A\d])$/
    let validado = rfc.match(re)

    if (!validado)  //Coincide con el formato general del regex?
        return false;

    //Separar el dígito verificador del resto del RFC
    const digitoVerificador = validado.pop(),
    rfcSinDigito      = validado.slice(1).join(''),
    len               = rfcSinDigito.length,
    diccionario       = "0123456789ABCDEFGHIJKLMN&OPQRSTUVWXYZ Ñ",
    indice            = len + 1

    let suma, digitoEsperado

    if (len == 12) suma = 0
    else suma = 481; //Ajuste para persona moral

    for(var i=0; i<len; i++)
        suma += diccionario.indexOf(rfcSinDigito.charAt(i)) * (indice - i);
        digitoEsperado = 11 - suma % 11;
        if (digitoEsperado == 11) digitoEsperado = 0;
        else if (digitoEsperado == 10) digitoEsperado = "A";

    //El dígito verificador coincide con el esperado?
    // o es un RFC Genérico (ventas a público general)?
    if ((digitoVerificador != digitoEsperado)
    && (!aceptarGenerico || rfcSinDigito + digitoVerificador != "XAXX010101000"))
        return false;
    else if (!aceptarGenerico && rfcSinDigito + digitoVerificador == "XEXX010101000")
        return false;
    return rfcSinDigito + digitoVerificador;
}




BtnSuscribirse.addEventListener('click',  function(){
    let formulario = document.querySelector("#AltaUsuarioForm"),
    datos = new FormData(formulario)

    let datosCompletos = Object.fromEntries(datos.entries())
    let datosJson = JSON.stringify(datosCompletos)

    mostrarModalCarga()
    ocultarModalCarga()

    fetch('https://214479d7409c.ngrok-free.app/api/register/user', {
        method: "POST",
        headers: {
            'Content-Type': 'application/json'
        },
        body: datosJson
    })
    .then(data => {
        mostrarModalSuccess()
        ocultarModalSuccess()

    })
    .catch(error => {
        mostrarModalError()
        ocultarModalError()
    })
})
