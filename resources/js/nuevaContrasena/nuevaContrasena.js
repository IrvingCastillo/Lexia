import { showModal, hideModal, sleep } from '@/modales/modalHelper';
import * as bootstrap from 'bootstrap';
window.bootstrap = bootstrap;


const Pass = document.querySelector("#password_new"),
PassC = document.querySelector("#confirm_password"),
ErrorRestaurar = document.querySelector("#errorRestaurarContra"),
BtnGuardar = document.querySelector("#btnNuevaContrasena")

const modalCarga = new bootstrap.Modal(document.getElementById('modalCarga'), { backdrop: 'static', keyboard: false }),
modalError  = new bootstrap.Modal(document.getElementById('modalError')),
modalSuccess = new bootstrap.Modal(document.getElementById('modalSuccess'))

const errorMsj = document.getElementById('mensajeError'),
successMsj = document.getElementById('mensajeExito')

function ValidarContraseña(contraseña) {
    const regex = /^(?=.*[A-Z])(?=.*\d).{8,}$/;
    return regex.test(contraseña);
}

Pass.addEventListener('input', function(){
    if (PassC.value !== "" || Pass.value === "") {
        Verificar()
    }
})

PassC.addEventListener('input', function(){
    if (PassC.value.length > 7 || PassC.value === "") {
        Verificar()
    }
})

Pass.addEventListener('focusout', ()=> {
    // if (condition) {

    // }
})

function Verificar(){
    let validatePass = ValidarContraseña(Pass.value),
    validatePassC = ValidarContraseña(PassC.value)

    if (validatePass && validatePassC) {
        if (Pass.value !== PassC.value) {
            Pass.classList.remove('Validado')
            PassC.classList.remove('Validado')
            Pass.classList.add('NoValidado')
            PassC.classList.add('NoValidado')
            BtnGuardar.disabled = true
            ErrorRestaurar.innerHTML = "Las contraseñas no coinciden"

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
    else if(Pass.value === "" && PassC.value === ""){
        Pass.classList.remove('Validado')
        PassC.classList.remove('Validado')
        Pass.classList.add('NoValidado')
        PassC.classList.add('NoValidado')
        BtnGuardar.disabled = true
        ErrorRestaurar.innerHTML = "Por favor llene los campos"
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

BtnGuardar.addEventListener('click', async (e) => {
    e.preventDefault();

    let formulario = document.querySelector("#RecuperarContrasenaForm"),
    datos = new FormData(formulario)

    let datosCompletos = Object.fromEntries(datos.entries())
    let datosJson = JSON.stringify(datosCompletos)

    showModal(modalCarga)
    await new Promise(r => setTimeout(r, 2000))
    hideModal(modalCarga)

    try {
        const me = await fetch('/get-token')
        const res_me = await me.json()
        const reset_pass = await fetch('https://api.lexialegal.site/api/reset-password', {
        method: 'POST',
        headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'Authorization': `Bearer ${res_me.token}`,
            },
        body: datosJson
    })

    const res_reset_pass = reset_pass.json()

    if(reset_pass.ok){
        showModal(modalSuccess)
        successMsj.textContent = '¡Contraseña reestablecida!'
        hideModal(modalSuccess, 4000, () => {
            window.location.href = 'https://web.lexialegal.site/login'
        });
    } else {
        showModal(modalError)
        errorMsj.textContent = res_reset_pass.message
        hideModal(modalError, 2000)
    }
    } catch (err) {
        console.error(err)
        showModal(modalError)
        // errorMsj.textContent = 'Ha ocurrido un error'
        hideModal(modalError, 2000)
    }

})

