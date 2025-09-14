import { showModal, hideModal, sleep } from '@/modales/modalHelper';
import * as bootstrap from 'bootstrap';
window.bootstrap = bootstrap;

var GLOBAL_URL = 'https://web.lexialegal.site/'
var TEST_URL = 'http://localhost:8000/'

const contraActual = document.querySelector("#current_password"),
contraNueva = document.querySelector("#new_password"),
confirmContra = document.querySelector("#new_password_confirm"),
labelContrasena = document.querySelector("#infoContrasena"),
btnChange = document.querySelector("#changePass")

const errorMsj = document.getElementById('mensajeError'),
cargaMsj = document.getElementById('mensajeCarga')

const modalCarga = new bootstrap.Modal(document.getElementById('modalCarga'), { backdrop: 'static', keyboard: false }),
modalError  = new bootstrap.Modal(document.getElementById('modalError'))


confirmContra.addEventListener("input", () => {
        VerificarContrasena()
})
contraNueva.addEventListener("input", () => {
        if (confirmContra.value != "") {
            VerificarContrasena()
        }
})

function VerificarContrasena(){
    if (confirmContra.value === contraNueva.value) {
        if (ValidarContraseña(contraNueva.value)) {
            console.log()
            labelContrasena.textContent = ""
            contraNueva.classList.remove("NoValidado")
            confirmContra.classList.remove("NoValidado")
            contraNueva.classList.add("Validado")
            confirmContra.classList.add("Validado")
            btnChange.disabled = false
            btnChange.style.opacity = "1"
        }
        else{
            labelContrasena.textContent = "No se cumple con el formato requerido"
        }
    }
    else{
        labelContrasena.textContent = "Las contraseñas introducidas no son iguales"
        contraNueva.classList.remove("Validado")
        confirmContra.classList.remove("Validado")
        contraNueva.classList.add("NoValidado")
        confirmContra.classList.add("NoValidado")
        btnChange.disabled = true
        btnChange.style.opacity = ".2"
    }
}

function ValidarContraseña(contraseña) {
    const regex = /^(?=.*[A-Z])(?=.*\d).{8,}$/;
    return regex.test(contraseña);
}

btnChange.addEventListener("click", async(e)=> {
    e.preventDefault()
    showModal(modalCarga)

    try {
        const me = await fetch('/get-token')
        const res_me = await me.json()

        let body = {
            "current_password": contraActual.value.trim(),
            "new_password": contraNueva.value.trim(),
            "new_password_confirmation": confirmContra.value.trim()
        }

        const new_pass = await fetch("https://api.lexialegal.site/api/users/profile/password", {
            method: "POST",
            headers: {
                'Authorization': `Bearer ${res_me.token}`,
                "Content-Type": "application/json",
                "Accept": "application/json",
            },
            body: JSON.stringify(body)

        })

        const res_new_pass = await new_pass.json()
        if (new_pass.ok) {
            cargaMsj.textContent = res_new_pass.message
            hideModal(modalCarga, 1500, ()=> {
                window.location.href = GLOBAL_URL + 'logout'
            })
        }
        else{
            hideModal(modalCarga)
            errorMsj.textContent = res_new_pass.message
            showModal(modalError)
            hideModal(modalError, 3000)
        }
    } catch (error) {
        hideModal(modalCarga)
        showModal(modalError)
        hideModal(modalError, 2000)
    }

})
