 import { showModal, hideModal, sleep } from '@/modales/modalHelper';
 import * as bootstrap from 'bootstrap';
 window.bootstrap = bootstrap;

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

const modalCarga = new bootstrap.Modal(document.getElementById('modalCarga'), { backdrop: 'static', keyboard: false }),
modalError  = new bootstrap.Modal(document.getElementById('modalError')),
modalSuccess = new bootstrap.Modal(document.getElementById('modalSuccess'));

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


function StriepWindow(URL, Titulo, features, myWidth, myHeight, isCenter) {
    if (window.screen) if (isCenter) if (isCenter == "true") {
        var myLeft = (screen.width - myWidth) / 2;
        var myTop = (screen.height - myHeight) / 2;
        features += (features != '') ? ',' : '';
        features += ',left=' + myLeft + ',top=' + myTop;
    }
    window.open(URL, Titulo, features + ((features != '') ? ',' : '') + 'width=' + myWidth + ',height=' + myHeight + ",status = no, toolbar = no, menubar = no, location = no ," + " directories=no");
}



BtnSuscribirse.addEventListener('click', async (e) => {
    let formulario = document.querySelector("#AltaUsuarioForm"),
    datos = new FormData(formulario)

    let datosCompletos = Object.fromEntries(datos.entries())
    let datosJson = JSON.stringify(datosCompletos)

    showModal(modalCarga)
    await new Promise(r => setTimeout(r, 2000))
    hideModal(modalCarga)

    try {
    const res = await fetch('https://api.lexialegal.site/api/register/user', {
        method: "POST",
        headers: {
            'Content-Type': 'application/json',
            Accept: 'application/json'
        },
        body: datosJson
    });

    const data = await res.json();
    console.log(data);

    const tokenRecibido = data.access_token;

    if (!tokenRecibido) {
        throw new Error('Registro fallido');
    }

    const guardarTokenRes = await fetch('/guardar-token', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({ token: tokenRecibido })
    });

    const respuesta = await guardarTokenRes.json();

    if (respuesta) {
        StriepWindow(data.data.stripe_session.url, "Transacción de pago", "", 1000, 800, 'true');

        showModal(modalSuccess);
        document.getElementById('mensajeExito').value = data.message;

        hideModal(modalSuccess, 2000, () => {
            window.location.href = 'http://localhost:8000/casos';
        });

    } else {
        throw new Error('El usuario no pudo ser creado');
    }
    } catch (err) {
        console.error(err);
        showModal(modalError);
        hideModal(modalError, 2000);
    }









    // try{
    //     const res = await fetch('https://api.lexialegal.site/api/register/user', {
    //         method: "POST",
    //         headers: { 'Content-Type': 'application/json', Accept: 'application/json' },
    //         body: datosJson
    //     })
    // .then(response => response.json())
    // .then(data => {
    //     console.log(data)
    //     const tokenRecibido = data.access_token;
    //     // Verifica si el registro fue exitoso
    //     if (tokenRecibido) {
    //         // Guardar token en Laravel Web
    //         return fetch('/guardar-token', {
    //             method: 'POST',
    //             headers: {
    //                 'Content-Type': 'application/json',
    //                 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
    //             },
    //             body: JSON.stringify({ token: tokenRecibido })
    //         });
    //     } else {
    //         throw new Error('Registro fallido');
    //     }
    // })
    // .then(response => response.json())
    // .then(respuesta => {
    //     if (respuesta) {
    //         console.log(respuesta)
    //         console.log(respuesta.data)

    //         StriepWindow(respuesta.data.stripe_session.url, "Transaccion de pago", "", 1000, 800, 'true');

    //         showModal(modalSuccess)
    //         document.getElementById('mensajeExito').value = respuesta.message
    //         hideModal(modalSuccess, 2000, () => {
    //             // window.location.href = 'http://localhost:8000/casos'
    //         });
    //     }
    //     else {
    //         throw new Error('El usuario no pudo ser creado')
    //     }
    // })
    // .then(() =>{
    //     window.location.href = 'http://localhost:8000/casos'
    // })
    // } catch (err) {
    //     console.error(err)
    //     showModal(modalError)
    //     hideModal(modalError, 2000)
    // }
})
