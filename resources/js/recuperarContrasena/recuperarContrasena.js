import { showModal, hideModal, sleep } from '@/modales/modalHelper';
import * as bootstrap from 'bootstrap';
window.bootstrap = bootstrap;

const BtnRecuperar = document.querySelector("#btnEnviarCorreoRecuperar"),
Correo = document.querySelector("#email_recuperacion"),
ErrorCorreo = document.querySelector("#errorEmailRecuperacion")

const modalCarga = new bootstrap.Modal(document.getElementById('modalCarga'), { backdrop: 'static', keyboard: false }),
modalError = new bootstrap.Modal(document.getElementById('modalError')),
modalSuccess = new bootstrap.Modal(document.getElementById('modalSuccess'))

const successMsj = document.getElementById('mensajeExito')

Correo.addEventListener('input', function () {
    let PasswordValidated = ValidarCorreo(Correo.value);
    if (Correo.value == "") {
        BtnRecuperar.disabled = true;
        document.querySelector('.campoCorreoRecuperar').classList.remove('Validado');
        document.querySelector('.campoCorreoRecuperar').classList.add('NoValidado');
        ErrorCorreo.innerHTML = "El campo no puede quedar vacío";
    }
    else if (PasswordValidated == false) {
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
        const res = await fetch('https://api.lexialegal.site/api/forgot-password', {
            method: "POST",
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
            },
            body: datosJson
        })

        const data = await res.json()

        if(data.status == 200){
            console.log("ok ", data);
            showModal(modalSuccess);
            successMsj.textContent = 'Un enlace se ha enviado al correo proporcionado';
            hideModal(modalSuccess, 2000, () => {
                window.location.href = 'http://localhost:8000/login';
            });
        }
    }
    catch(error) {
        console.log(error);
        showModal(modalError);
        hideModal(modalError, 2000);
    }
});
