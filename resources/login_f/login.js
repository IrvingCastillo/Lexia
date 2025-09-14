import { showModal, hideModal, sleep } from '@/modales/modalHelper';
import * as bootstrap from 'bootstrap';
window.bootstrap = bootstrap;

var GLOBAL_URL = 'https://web.lexialegal.site/'
var TEST_URL = 'http://localhost:8000/'

const btnLogin = document.querySelector('.btnLogin'),
email = document.getElementById('email_login'),
password = document.getElementById('password'),
errorEmailLogin = document.getElementById('errorEmailLogin')


const modalCarga = new bootstrap.Modal(document.getElementById('modalCarga'), { backdrop: 'static', keyboard: false }),
modalError  = new bootstrap.Modal(document.getElementById('modalError')),
modalSuccess = new bootstrap.Modal(document.getElementById('modalSuccess'));

const errorMsj = document.getElementById('errorLogin'),
successMsj = document.getElementById('mensajeExito'),
cargaMsj = document.getElementById('mensajeCarga')

email.addEventListener('focusout', function(){
    let correoValidado = ValidarCorreo(email.value)
    if (!correoValidado) {
        NoValidado(email, errorEmailLogin, "Escribe un correo válido")
    }
    else{
        Validado(email, errorEmailLogin)
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


function ValidarCorreo(correo){
    const regex = /^[a-zA-z0-9_.+-]+@[a-zA-z0-9-]+\.[a-zA-z0-9-.]+$/
    return regex.test(correo)
}

btnLogin.addEventListener('click', async (e) => {
    e.preventDefault()

    const correo = email.value.trim(),
    pwd = password.value.trim(),
    datosJson = JSON.stringify({ email: correo, password: pwd });


    if (!correo || !pwd) {
        // showModal(modalError)
        errorMsj.textContent = 'Completa los campos para poder ingresar'
        // hideModal(modalError, 2000)
        return;
    }

    try{
        showModal(modalCarga)
        await new Promise(r => setTimeout(r, 2000))
        // hideModal(modalCarga)
        const res = await fetch('https://api.lexialegal.site/api/login', {
            method: "POST",
            headers: {
                'Content-Type': 'application/json',
                Accept: 'application/json' },
            body: datosJson
        })

        const data = await res.json();
        const tokenRecibido = data.access_token;
        if (!tokenRecibido) {
            throw new Error('Inicio de sesión fallido');
        }

        const guardarTokenRes = await fetch('/guardar-token', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({
                token: tokenRecibido,
                // expires_in: data.expires_in
                })
        });

        const respuesta = await guardarTokenRes.json();

        if (respuesta) {
            // showModal(modalSuccess)
            cargaMsj.textContent = '¡Bienvenido!'
            // hideModal(modalCarga, 2000, () => {
                window.location.href = GLOBAL_URL + 'casos'
            // });
        } else {
            throw new Error('No se pudo iniciar sesión')
        }
        } catch (err) {
            hideModal(modalCarga)
            showModal(modalError)
            errorMsj.textContent = 'La contraseña o correo son incorrectos'
            hideModal(modalError, 2000)
        }


});
