import { showModal, hideModal, sleep } from '@/modales/modalHelper';
import * as bootstrap from 'bootstrap';
window.bootstrap = bootstrap;

const BtnRecuperar = document.querySelector("#btnEnviarCorreoRecuperar"),
Correo = document.querySelector("#email_recuperacion"),
ErrorCorreo = document.querySelector("#errorEmailRecuperacion")

const modalCarga = new bootstrap.Modal(document.getElementById('modalCarga'), { backdrop: 'static', keyboard: false }),
modalError = new bootstrap.Modal(document.getElementById('modalError')),
modalSuccess = new bootstrap.Modal(document.getElementById('modalSuccess'))

const successMsj = document.getElementById('mensajeExito'),
errorMsj = document.getElementById('mensajeError')

Correo.addEventListener('input', function () {
    let PasswordValidated = ValidarCorreo(Correo.value);
    if (Correo.value === "") {
        BtnRecuperar.disabled = true;
        document.querySelector('.campoCorreoRecuperar').classList.remove('Validado');
        document.querySelector('.campoCorreoRecuperar').classList.add('NoValidado');
        ErrorCorreo.innerHTML = "El campo no puede quedar vacío";
    }
    else if (Correo.value.length < 5 || !Correo.value.includes("@")) {
        // aún no intentamos validar, el usuario está escribiendo
        document.querySelector('.campoCorreoRecuperar').classList.remove('Validado', 'NoValidado');
        ErrorCorreo.innerHTML = "";
        BtnRecuperar.disabled = true;
    }
    else if (!PasswordValidated) {
        BtnRecuperar.disabled = true;
        document.querySelector('.campoCorreoRecuperar').classList.remove('Validado');
        document.querySelector('.campoCorreoRecuperar').classList.add('NoValidado');
        ErrorCorreo.innerHTML = "La contraseña no coincide con el formato requerido";
    }
    else if (PasswordValidated) {
        document.querySelector('.campoCorreoRecuperar').classList.remove('NoValidado');
        document.querySelector('.campoCorreoRecuperar').classList.add('Validado');
        ErrorCorreo.innerHTML = "";
        BtnRecuperar.disabled = false;
    }
});

function ValidarCorreo(correo) {
    const regex = /^[a-zA-z0-9_.+-]+@[a-zA-z0-9-]+\.[a-zA-z0-9-.]+$/;
    return regex.test(correo);
}

BtnRecuperar.addEventListener('click', async function (event) {
    event.preventDefault();

    let formulario = document.querySelector("#RecuperarContrasenaForm"),
    datos = new FormData(formulario);

    let datosCompletos = Object.fromEntries(datos.entries());
    const datosJson = JSON.stringify(datosCompletos);

    showModal(modalCarga);
    await new Promise(r => setTimeout(r, 2000))
    hideModal(modalCarga);

    try{
        const me = await fetch('/get-token')
        const res_me = await me.json()

        const send_email = await fetch('https://api.lexialegal.site/api/forgot-password', {
            method: "POST",
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'Authorization': `Bearer ${res_me.token}`,
            },
            body: datosJson
        })

        const res_send_email = await send_email.json()

        console.log(send_email);
        if(send_email.ok){
            showModal(modalSuccess);
            successMsj.textContent = 'Un enlace de recuperación se ha enviado al correo electrónico proporcionado';
            hideModal(modalSuccess, 5000, () => {
                window.location.href = 'http://localhost:8000/login';
            });
        }
        else{
            showModal(modalError);
            errorMsj.textContent = res_send_email.message
            hideModal(modalError, 2500);
        }
    }
    catch(error) {
        console.log(error);
        showModal(modalError);
        hideModal(modalError, 2500);
    }
});
