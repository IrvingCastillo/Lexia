import { showModal, hideModal, sleep } from '@/modales/modalHelper';
import * as bootstrap from 'bootstrap';
window.bootstrap = bootstrap;

var GLOBAL_URL = 'https://web.lexialegal.site/'
var TEST_URL = 'http://localhost:8000/'

const btnLogin = document.querySelector('.btnLogin'),
email = document.getElementById('email'),
password = document.getElementById('password')

const modalCarga = new bootstrap.Modal(document.getElementById('modalCarga'), { backdrop: 'static', keyboard: false }),
modalError  = new bootstrap.Modal(document.getElementById('modalError')),
modalSuccess = new bootstrap.Modal(document.getElementById('modalSuccess'));

const errorMsj = document.getElementById('errorLogin'),
successMsj = document.getElementById('mensajeExito')

btnLogin.addEventListener('click', async (e) => {
    e.preventDefault()

    const correo = email.value.trim(),
    pwd = password.value.trim(),
    datosJson = JSON.stringify({ email: correo, password: pwd });

    showModal(modalCarga)
    await new Promise(r => setTimeout(r, 2000))
    hideModal(modalCarga)

    if (!correo || !pwd) {
        showModal(modalError)
        errorMsj.textContent = 'Completa los campos para poder ingresar'
        hideModal(modalError, 2000)
        return;
    }

    try{
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
            showModal(modalSuccess)
            successMsj.textContent = '¡Bienvenido!'
            hideModal(modalSuccess, 3000, () => {
                window.location.href = GLOBAL_URL + 'casos'
            });
        } else {
            throw new Error('No se pudo iniciar sesión')
        }
        } catch (err) {
            showModal(modalError)
            errorMsj.textContent = 'La contraseña o correo son incorrectos'
            hideModal(modalError, 2000)
        }


});
