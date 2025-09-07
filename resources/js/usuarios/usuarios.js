import { showModal, hideModal, sleep } from '@/modales/modalHelper';
import * as bootstrap from 'bootstrap';
window.bootstrap = bootstrap;

const userId =  document.querySelector("#id_user"),
BtnEditarUser =  document.querySelector("#editUser")


const modalCarga = new bootstrap.Modal(document.getElementById('modalCarga'), { backdrop: 'static', keyboard: false }),
modalError  = new bootstrap.Modal(document.getElementById('modalError')),
modalSuccess = new bootstrap.Modal(document.getElementById('modalSuccess')),
successMsj = document.getElementById('mensajeExito'),
errorMsj = document.getElementById('mensajeError'),

tipo =  document.querySelector("#tipoEliminar"),
titulo = document.querySelector("#tituloEliminar")

const BtnAgregarUsuario = document.querySelector("#addUser"),
BtnEliminar = document.querySelector("#btnEliminar")


// RenderizarUsuarios()

ObtenerUsuarios()

// const usuarios = [
//     {
//         id: 1,
//         nombre: "Tiya ",
//         apellido_paterno: "Mcdaniel",
//         rol: "Abogado",
//         telefono: "9611233361",
//         fecha: "04/06/2022",
//         email: "tiya@gmail.com",
//         avatar: "https://media.istockphoto.com/id/1300845620/es/vector/icono-de-usuario-plano-aislado-sobre-fondo-blanco-s%C3%ADmbolo-de-usuario-ilustraci%C3%B3n-vectorial.jpg?s=612x612&w=0&k=20&c=grBa1KTwfoWBOqu1n0ewyRXQnx59bNHtHjvbsFc82gk="
//     },
//     {
//         id: 2,
//         nombre: "Juan Pérez",
//         rol: "Asistente",
//         telefono: "9610001111",
//         fecha: "15/07/2023",
//         avatar: "https://via.placeholder.com/48"
//     }
// ];


async function ObtenerUsuarios(){
    try {
        const me = await fetch('/get-token')
        const res_me = await me.json()

        const get_clients = await fetch("https://api.lexialegal.site/api/usuarios/obtener/integrantes", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json",
                'Authorization': `Bearer ${res_me.token}`,
            }
        })

        const res_get_clients = await get_clients.json()

        if (get_clients.ok) {
            //creacion de cards
            console.log(res_get_clients)
            RenderizarUsuarios(res_get_clients.data)
            // RenderizarUsuarios(usuarios)
        }


    } catch (error) {
        showModal(modalError)
        hideModal(modalError, 2000)
    }
}


async function RenderizarUsuarios(list_users){
    const template = document.querySelector("#usuario-template");
    const contenedor = document.querySelector("#contenedor-usuarios");
    const mensajeVacio = document.querySelector("#mensaje-vacio");

    // limpiar antes de pintar
    contenedor.innerHTML = "";

    if (!list_users || list_users.length === 0) {
        mensajeVacio.style.display = "block";
        return;
    } else {
        mensajeVacio.style.display = "none";
    }

    list_users.forEach(usuario => {
        const clone = template.content.cloneNode(true);

        // Asignar datos dinámicos
        clone.querySelector(".avatar-usuario").src = usuario.avatar || "https://media.istockphoto.com/id/1300845620/es/vector/icono-de-usuario-plano-aislado-sobre-fondo-blanco-s%C3%ADmbolo-de-usuario-ilustraci%C3%B3n-vectorial.jpg?s=612x612&w=0&k=20&c=grBa1KTwfoWBOqu1n0ewyRXQnx59bNHtHjvbsFc82gk=";
        clone.querySelector(".nombre-usuario").textContent = usuario.nombre_cliente;
        clone.querySelector(".rol-usuario").textContent = usuario.roles[0].name;
        clone.querySelector(".telefono-usuario").textContent = usuario.profile.telefono;
        clone.querySelector(".fecha-usuario").textContent = "";

        // Eventos de botones
        // clone.querySelector(".btn-editar").addEventListener("click", () => {
        //     console.log("Editar usuario:", usuario.id);
        //     userId.value = usuario.id
        //     $("#modalEditarUsuario").modal("show")
        //     document.getElementById("nombre_cliente_edit").value = usuario.nombre_cliente
        //     document.getElementById("apellido_paterno_edit").value = usuario.profile.apellido_paterno
        //     document.getElementById("apellido_materno_edit").value = usuario.profile.apellido_materno
        //     // document.getElementById("area_code_edit").value =
        //     document.getElementById("telefono_edit").value = usuario.profile.telefono
        //     document.getElementById("email_edit").value = usuario.email
        //     // Aquí abres un modal, formulario, etc.
        // });

        clone.querySelector(".card").dataset.userId = usuario.id;

        // clone.querySelector(".btn-remover").addEventListener("click", () => {
        //     console.log("Remover usuario:", usuario.id);
        //     // Aquí lógica para eliminar o desactivar usuario
        //     userId.value = usuario.id
        //     tipo.innerHTML = "usuario?"
        //     titulo.innerHTML = usuario.nombre_cliente
        //     // EliminarUsuario(usuario.id)
        // });

        contenedor.appendChild(clone);
    });


}

document.getElementById("contenedor-usuarios").addEventListener("click", (e) => {
    const card = e.target.closest(".card");
    if (!card) return;

    const userIdSeleccionado = card.dataset.userId;

    // Editar
    if (e.target.classList.contains("btn-editar")) {
        console.log("Editar usuario:", userIdSeleccionado);
        $("#modalEditarUsuario").modal("show");

        // Aquí puedes rellenar el modal con los datos del card si los guardas en dataset
        // o volver a pedirlos a la API
    }

    // Remover
    if (e.target.classList.contains("btn-remover")) {
        console.log("Remover usuario:", userIdSeleccionado);
        userId.value = userIdSeleccionado;
        tipo.innerHTML = "usuario?";
        titulo.innerHTML = card.querySelector(".nombre-usuario").textContent;
        // Aquí llamas a EliminarUsuario(userIdSeleccionado);
    }
});


async function EliminarUsuario(id){
    showModal(modalCarga)
    await new Promise(r => setTimeout(r, 2000))
    hideModal(modalCarga)

    try {
        const me = await fetch('/get-token')
        const res_me = await me.json()

        let body_elim = {
            "id_user": id
        }

        const del_user = await fetch('https://api.lexialegal.site/api/usuarios/remove', {
            method: "POST",
            headers: {
                'Authorization': `Bearer ${res_me.token}`,
                "Content-Type": "application/json",
                "Accept": "application/json"
            },
            body: JSON.stringify(body_elim)
        })

        const res_del_user = await del_user.json()

        if (del_user.ok) {
            showModal(modalSuccess)
            successMsj.textContent = res_del_user.message
            hideModal(modalSuccess, 2000)

            ObtenerUsuarios()
        }

    } catch (error) {
        console.log(error)
        showModal(modalError)
        hideModal(modalError, 2000)
    }
}



BtnAgregarUsuario.addEventListener("click", async(e) => {
    const form = document.querySelector("#AltaUsuarios"),
    datos = new FormData(form)

    if (!form.checkValidity()) {
        console.log(form.checkValidity())
        form.reportValidity();
        return;
    }
    else{

        try {
            console.log("agregando")
            setTimeout(() => {
                $("#modalNuevoUsuario").modal('hide')
            }, 100);
            successMsj.textContent = ''
            showModal(modalCarga)
            await new Promise(r => setTimeout(r, 2000))
            hideModal(modalCarga)
            let formulario = document.querySelector("#AltaUsuarios"),
            datos = new FormData(formulario)

            let datosCompletos = Object.fromEntries(datos.entries())
            let datosJson = JSON.stringify(datosCompletos)

            const me = await fetch('/get-token')
            const res_me = await me.json()

    console.log(datosJson)
            const add_user = await fetch("https://api.lexialegal.site/api/usuarios/agregar/integrantes", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "Accept": "application/json",
                    'Authorization': `Bearer ${res_me.token}`,
                },
                body: datosJson
            })

            const res_add_user = await add_user.json()

            if (add_user.ok) {
                console.log(res_add_user.data)
                successMsj.textContent = res_add_user.message
                showModal(modalSuccess)
                // hideModal(modalSuccess, 2000, () => {
                    // $("#modalNuevoCaso").modal({
                    //     hide:true
                    // })
                    ObtenerUsuarios()
                // });
            }
            else{
                errorMsj.textContent = res_add_user.message
                showModal(modalError)
                hideModal(modalError, 4000)
            }

        } catch (error) {
            showModal(modalError)
            errorMsj.textContent = res_add_user.message
            hideModal(modalError, 2000)
        }

    }

})


BtnEditarUser.addEventListener("click", async(e) => {
    console.log("editar")
    const form = document.querySelector("#EditarUsuarios"),
    datos = new FormData(form)

    datos.append("user_id", userId.value)

    if (!form.checkValidity()) {
        console.log("alv")
        console.log(form.checkValidity())
        form.reportValidity();
        return;
    }

    else{
        try {
            setTimeout(() => {
                $("#modalEditarUsuario").modal('hide')
            }, 100);
            successMsj.textContent = ''
            showModal(modalCarga)
            await new Promise(r => setTimeout(r, 2000))
            hideModal(modalCarga)

            let datosCompletos = Object.fromEntries(datos.entries())
            let datosJson = JSON.stringify(datosCompletos)

            const me = await fetch('/get-token')
            const res_me = await me.json()

            const edit_user = await fetch("https://api.lexialegal.site/api/users/profile/update", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "Accept": "application/json",
                    'Authorization': `Bearer ${res_me.token}`,
                },
                body: datosJson
            })

            const res_edit_user = await edit_user.json()

            console.log(edit_user)
            console.log(res_edit_user)

            if (edit_user.ok) {
                successMsj.textContent = res_edit_user.message
                showModal(modalSuccess)
                hideModal(modalSuccess, 2000, () => {
                    // $("#modalEditarUsuario").modal({
                    //     hide:true
                    // })
                    ObtenerUsuarios()
                });
            }
            else{
            showModal(modalError)
            errorMsj.textContent = res_edit_user.message
            hideModal(modalError, 3000)
            }


        } catch (error) {
            showModal(modalError)
            hideModal(modalError, 2000)
        }
    }
})

BtnEliminar.addEventListener("click", async(e) => {
    EliminarUsuario(userId.value)
})
