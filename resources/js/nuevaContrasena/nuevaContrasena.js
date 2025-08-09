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

const errorMsj = document.getElementById('errorLogin'),
successMsj = document.getElementById('mensajeExito')

function ValidarContraseña(contraseña) {
    const regex = /^(?=.*[A-Z])(?=.*\d).{8,}$/;
    return regex.test(contraseña);
}

Pass.addEventListener('input', function(){
    if (PassC.value != "") {
        Verificar()
    }
})

PassC.addEventListener('input', function(){
    Verificar()
})



function Verificar(){
    let validatePass = ValidarContraseña(Pass.value),
    validatePassC = ValidarContraseña(PassC.value)

    if (validatePass && validatePassC) {
        if (Pass.value !== PassC.value) {
            console.log("la contraseña no coincide")
            Pass.classList.remove('Validado')
            PassC.classList.remove('Validado')
            Pass.classList.add('NoValidado')
            PassC.classList.add('NoValidado')
            BtnGuardar.disabled = true
            ErrorRestaurar.innerHTML = "Las contraseñas no coinciden"

        }
        else if(Pass.value == "" && PassC == ""){
            Pass.classList.remove('Validado')
            PassC.classList.remove('Validado')
            Pass.classList.add('NoValidado')
            PassC.classList.add('NoValidado')
            BtnGuardar.disabled = true
            ErrorRestaurar.innerHTML = "Por favor llene los campos"
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
    datos = new FormData(formulario),
    pwd = Pass.value.trim(),
    pwdC = PassC.value.trim()

    let datosCompletos = Object.fromEntries(datos.entries())
    let datosJson = JSON.stringify(datosCompletos)

    showModal(modalCarga)
    await new Promise(r => setTimeout(r, 2000))
    hideModal(modalCarga)

    if (!pwd || !pwdC) {
        showModal(modalError)
        errorMsj.textContent = 'Confirma la nueva contraseña'
        hideModal(modalError, 2000)
        return;
    }
    try {
        const res = await fetch('https://f2cfbd702bbb.ngrok-free.app/api/login', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json', Accept: 'application/json' },
        body: datosJson
    })
    if(res.ok){
        showModal(modalSuccess)
        successMsj.textContent = '¡Contraseña reestablecida!'
        hideModal(modalSuccess, 2000, () => {
            window.location.href = 'http://localhost:8000/login'
        });
    } else {
        throw new Error('Credenciales inválidas')
    }
    } catch (err) {
        console.error(err)
        showModal(modalError)
        // errorMsj.textContent = 'Ha ocurrido un error'
        hideModal(modalError, 2000)
    }

})

