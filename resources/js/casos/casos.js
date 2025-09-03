import { showModal, hideModal, sleep } from '@/modales/modalHelper';
import * as bootstrap from 'bootstrap';
window.bootstrap = bootstrap;

const GestionarCaso = document.querySelector('#gestionarCaso'),
TimeLine = document.querySelector('#time-line'),
InfoInferior = document.querySelector('#DatosInf'),
InfoSuperior = document.querySelector('#DatosSup'),
InfoHoras = document.querySelector('.DatosHoras'),
ArchivosCasos = document.querySelector('.ArchivosCasos'),
AgregarCaso = document.querySelector("#agregarCaso"),
AgregarArchivo = document.querySelector("#agregarArchivo"),
template = document.querySelector("#card-template"),
contenedor = document.querySelector("#contenedor-casos"),
idCase = document.querySelector("#id_case"),
VisualizarArchivos = document.querySelector("#visualizarArchivos"),
TituloCasoSpan = document.querySelector("#span-titulo"),
BtnArchivos = document.querySelector('#btnArchivos'),
BtnEditStatus = document.querySelector("#edit-status"),
BtnEliminarCaso = document.querySelector("#btnEliminar"),
BtnModalEditCaso = document.querySelector("#btnEditCaso"),
BtnShowListaCasos = document.querySelector("#showListaCasos"),
BtnAltaCAso = document.querySelector("#btnAltaCaso"),
BarraBusqueda = document.querySelector("#barraBusqueda"),
tipo =  document.querySelector("#tipoEliminar"),
titulo = document.querySelector("#tituloEliminar")

const modalCarga = new bootstrap.Modal(document.getElementById('modalCarga'), { backdrop: 'static', keyboard: false }),
modalError  = new bootstrap.Modal(document.getElementById('modalError')),
modalSuccess = new bootstrap.Modal(document.getElementById('modalSuccess')),
modalCaso = new bootstrap.Modal(document.getElementById('modalNuevoCaso')),
successMsj = document.getElementById('mensajeExito'),
emptyMsj = document.getElementById('mensaje-vacio')

ObtenerListaCasos()
ObtenerListaAbogados()

async function ObtenerListaCasos(){
    try {
        const me = await fetch('/get-token')
        const res_me = await me.json()

        const get_cases = await fetch('https://api.lexialegal.site/api/legal-cases', {
            method:"GET",
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json",
                'Authorization': `Bearer ${res_me.token}`,
            }
        })
        const list_res = await get_cases.json()
        const list_elements = list_res.data[0]

        contenedor.innerHTML = "";
        idCase.value = ""
        BtnArchivos.style.display = "none"
        BarraBusqueda.style.display = "none"
        list_res.data.forEach(el => {
            const clone = template.content.cloneNode(true);

            const estadosRaw = ["inicio_caso", "revision_documentos", "proceso", "sentencia"]

            const estadosCustom = {
                inicio_caso: "Inicio de caso",
                revision_documentos: "En Revisión de documentos",
                proceso: "En Proceso",
                sentencia: "Caso sentenciado"

            }

            // Llenamos los valores dinámicos
            clone.querySelector(".titulo-caso").textContent = el.caso_nombre;
            clone.querySelector(".descripcion-caso").textContent = el.description;
            clone.querySelector(".estado-caso").textContent = estadosCustom[el.status];

            // Ejemplo: agregar event listener al botón
            clone.querySelector(".gestionarCaso").addEventListener("click", () => {
                 idCase.value = el.id
                    setTimeout(()=> {
                        showGestionarCaso(el)
                    }, 500)
            });

            clone.querySelector(".eliminarCaso").addEventListener("click", () => {
                 idCase.value = el.id
                 tipo.innerHTML = "caso?"
                 titulo.innerHTML = el.caso_nombre

            })

            contenedor.appendChild(clone);
        });

    } catch (error) {
        console.log(error)
        showModal(modalError)
        hideModal(modalError, 2000)
    }
}

async function ObtenerListaAbogados(){
    try {
        const me = await fetch('/get-token')
        const res_me = await me.json()

        const get_attorneys = await fetch('https://api.lexialegal.site/api/users/attorneys', {
            method:"GET",
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json",
                'Authorization': `Bearer ${res_me.token}`,
            }
        })

        const res_get_attorneys = await get_attorneys.json()

        console.log(res_get_attorneys)

        if (get_attorneys.ok) {
            res_get_attorneys.data.forEach(attorney => {
                $("#attorneys").append(`<option value="${attorney.id}">${attorney.nombre_cliente}</option>`)
            })
            $("#attorneys").multiselect({
                templates: {
                        li: '<li class="color-multiselect"><a href="javascript:void(0);"><label></label></a></li>'
                    },
                // numberDisplayed: 7,
                maxHeight: 150,
                enableCaseInsensitiveFiltering: true,
                nSelectedText: ' - Abogados seleccionados',
                buttonWidth: '100%',
                nonSelectedText: 'No hay abogados seleccionados',
                allSelectedText: 'Todos los abogados seleccionados',
                filterPlaceholder: 'Buscar'
            })
        }



    } catch (error) {
        showModal(modalError)
        hideModal(modalError, 2000)
    }
}

function showGestionarCaso(el){
    BtnShowListaCasos.style.display = "inline"
    BtnAltaCAso.style.display = "none"
    // BtnModalEditCaso.style.display = "block"
    TituloCasoSpan.innerHTML = el.caso_nombre
    InfoSuperior.classList.add('cardHide')
    //  setTimeout(()=> {
        InfoInferior.classList.remove('cardHide')
        // }, 300)
    InfoHoras.classList.add('show')
    ArchivosCasos.classList.add('show')
    BtnArchivos.style.display = "block"
    BarraBusqueda.style.display = "flex"
    TimeLine.classList.add('show')
    // renderTimeline("inicio_caso", {
    //     inicio_caso: "12 de marzo",
    //     revision_documentos: "25 de marzo"
    // });  forma de envio para renderizar el time line
    RenderizarTimeLine(el.status)
    RenderizarNotificaciones(el)
    // ActualizarContador()
    if(el.documents.length > 0){
        console.log(el)
        emptyMsj.style.display = "none";

        RenderizarArchivos(el.documents)
    }
    else{
        emptyMsj.style.display = "block";
    }
}

function RenderizarNotificaciones(element_case){
    console.log(element_case)
    const contenedor = document.getElementById("contenedor-toggles");
    contenedor.innerHTML = ""; // 🔹 Limpia valores previos

    const template = document.getElementById("toggles-template");
    const clone = template.content.cloneNode(true);

    // Setear los valores según la respuesta del back
    clone.querySelector("#config_notify_email").checked = !!element_case.notify_email;
    clone.querySelector("#config_notify_client").checked = !!element_case.notify_client;
    clone.querySelector("#config_notify_attorneys").checked = !!element_case.notify_attorneys;

    contenedor.appendChild(clone);
}

function RenderizarTimeLine(status) //status, fechas = {}  parametros
    {
    const contenedor = document.getElementById("timeline-container");
    contenedor.innerHTML = ""; // Limpia el timeline anterior

    // Clonamos el template
    const template = document.getElementById("timeline-template");
    const clone = template.content.cloneNode(true);

    // Obtenemos todos los <li>
    const steps = clone.querySelectorAll("li.time-line-item");

    let activeFound = false;
    steps.forEach(step => {
        const stepStatus = step.dataset.status;
        const content = step.querySelector(".content-time-line");
        const icon = step.querySelector(".icon, .icon-pending");
        const fecha = step.querySelector(".fecha");

        //  Resetear clases por si acaso (por limpieza extra)
        step.classList.remove("status-completed", "status-pending");
        content.classList.remove("active");
        if (icon) {
            icon.classList.remove("icon", "icon-pending");
            icon.classList.add("icon"); // default
        }

        //  Lógica para asignar clases dinámicamente
        if (!activeFound) {
            step.classList.add("status-completed");
            content.classList.add("active");

            if (stepStatus === status) {
                activeFound = true;
            }
        } else {
            step.classList.add("status-pending");
            if (icon) {
                icon.classList.remove("icon");
                icon.classList.add("icon-pending");
            }
        }

        //  Setear fecha si existe en la data
        // if (fecha && fechas[stepStatus]) {
        //     fecha.textContent = fechas[stepStatus];
        // } else if (fecha) {
        //     fecha.textContent = "";
        // }
    });
    if (status === "sentencia") {
        BtnEditStatus.disabled = true
    }
    else{
        BtnEditStatus.disabled = false
    }

    // Insertamos el nuevo timeline ya limpio
    contenedor.appendChild(clone);
}

function RenderizarArchivos(list_documents){
    const template = document.querySelector("#file-template");
    const contenedor = document.querySelector("#contenedor-archivos");

    // Limpiar contenedor antes de renderizar
    contenedor.innerHTML = "";

    if (!list_documents || list_documents.length === 0) {
        emptyMsj.style.display = "block";
        return;
    }
    emptyMsj.style.display = "none";

    list_documents.forEach(doc => {
        const clone = template.content.cloneNode(true);
        let visualizador;

        if (doc.type === "application/pdf") {
            visualizador = document.createElement("embed");
            visualizador.src = 'https://api.lexialegal.site/storage/' + doc.path;
            visualizador.type = "application/pdf";
            visualizador.width = "100%";
            visualizador.height = "500px";
       } else if (doc.type === "application/vnd.openxmlformats-officedocument.wordprocessingml.document") {
            // Usar <iframe> con Google Docs Viewer para DOCX
            const docUrl = encodeURIComponent('https://api.lexialegal.site/storage/' + doc.path);
            visualizador = document.createElement("iframe");
            visualizador.src = `https://docs.google.com/gview?url=${docUrl}&embedded=true`;
            visualizador.width = "100%";
            visualizador.height = "500px";
            visualizador.frameBorder = "0";
        } else {
            // Tipo no soportado
            visualizador = document.createElement("div");
            visualizador.textContent = "Tipo de archivo no soportado para vista previa.";
            visualizador.style.color = "red";
        }

        // Rellenar valores dinámicos
        clone.querySelector(".nombre-archivo").textContent = doc.name;
        // clone.querySelector(".tipo-archivo").textContent = doc.tipo;
        const fechaFormateada = formatearFecha(doc.uploaded_at);

        clone.querySelector(".fecha-archivo").textContent = fechaFormateada;

        // Event listener para borrar archivo
        clone.querySelector(".borrar-archivo").addEventListener("click", e => {
            e.preventDefault();
            console.log("Borrar archivo ID:", doc.id);
            EliminarArchivo(doc.id)
        });

        // Event listener para abrir modal si quieres
        clone.querySelector(".nombre-archivo").addEventListener("click", () => {
            console.log("Mostrar archivo ID:", doc.id);
            VisualizarArchivos.innerHTML = "";      // limpiar texto anterior si existe
            VisualizarArchivos.appendChild(visualizador);
            // aquí puedes cargar el archivo en el modal
        });

        contenedor.appendChild(clone);
    });
}

BarraBusqueda.addEventListener("input", async(e) => {
    const query = e.target.value.toLowerCase()

    const personal_t = await fetch('/get-token')
    const res_personal_t = await personal_t.json()

    let body_case = {
        "legal_case_id" : idCase.value
    }
    const queryParams = new URLSearchParams(body_case).toString();

    const case_info = await fetch(`https://api.lexialegal.site/api/legal-cases/show/cases?${queryParams}`, {
        method: "GET",
        headers: {
            "Content-Type": "application/json",
            "Accept": "application/json",
            'Authorization': `Bearer ${res_personal_t.token}`,
        }
    })
    const res_case_info = await case_info.json()

    const filtrados = res_case_info.data.documents.filter(item =>
        item.name.toLowerCase().includes(query)
    );
    RenderizarArchivos(filtrados);
})

$('.dropdown-menu').on('click', function(e) {
  e.stopPropagation();
});

async function EliminarArchivo(idArchivo){
    showModal(modalCarga)
    await new Promise(r => setTimeout(r, 2000))
    hideModal(modalCarga)
    try {
        const personal_t = await fetch('/get-token')
        const res_personal_t = await personal_t.json()

        let body_file = {
            "document_id" : idArchivo
        }

        const eliminar = await fetch('https://api.lexialegal.site/api/legal-cases/delete/file', {
            method: "POST",
            headers: {
                'Authorization': `Bearer ${res_personal_t.token}`,
                "Content-Type": "application/json",
                "Accept": "application/json",
            },
            body: JSON.stringify(body_file)
        })

        const res_eliminar = await eliminar.json()

        console.log(res_eliminar)

        if (eliminar.ok) {
            let body_case = {
                "legal_case_id" : idCase.value
            }
            const queryParams = new URLSearchParams(body_case).toString();

            const case_info = await fetch(`https://api.lexialegal.site/api/legal-cases/show/cases?${queryParams}`, {
                method: "GET",
                headers: {
                "Content-Type": "application/json",
                "Accept": "application/json",
                'Authorization': `Bearer ${res_personal_t.token}`,
                }
            })

            const res_case_info = await case_info.json()

            if (case_info.ok) {
                successMsj.textContent = res_eliminar.message
                showModal(modalSuccess)
                hideModal(modalSuccess, 2000, () => {
                    $("#modalNuevoCaso").modal({
                        hide:true
                    })
                    console.log(res_eliminar.data)
                    RenderizarArchivos(res_case_info.data.documents)
                });
            }
        }

    } catch (error) {
        showModal(modalError)
        hideModal(modalError, 2000)
    }
}

function formatearFecha(fechaStr) {
  const meses = ["ENE", "FEB", "MAR", "ABR", "MAY", "JUN", "JUL", "AGO", "SEP", "OCT", "NOV", "DIC"];

  // Convertir string a objeto Date
  const fecha = new Date(fechaStr);

  // Obtener partes de la fecha
  const dia = fecha.getDate().toString().padStart(2, '0');
  const mes = meses[fecha.getMonth()];
  const año = fecha.getFullYear();

  // Formato final
  return `${dia} ${mes} ${año}`;
}


function ActualizarContador() {
  const ahora = new Date();
  const horas = ahora.getHours();
  const minutos = ahora.getMinutes();
  const segundos = ahora.getSeconds();

  const tiempoFormateado = `${horas.toString().padStart(2, '0')}:${minutos.toString().padStart(2, '0')}:${segundos.toString().padStart(2, '0')}`;

  document.getElementById('reloj').textContent = tiempoFormateado;
}

setInterval(ActualizarContador, 1000);


$(".archivo").on('change', function() {
    let modulo = this.name
    let fileName = this.files[0]?.name
    if (fileName == undefined) {
        document.querySelector("#fileName").innerHTML = ''
    }
    else{
         document.querySelector(".showFile").style.display = "block"
        document.querySelector("#fileName").innerHTML = `${fileName}  <i class="fas fa-check text-success"></i>`
    }
})

// document.querySelector("#abrirModalCaso").addEventListener('click', function(){
//     console.log("hi")
//     $("#modalNuevoCaso").modal({ show: true})
//     // $("#attorneys").multiselect()
// })




BtnShowListaCasos.addEventListener("click", ()=> {
    BarraBusqueda.style.display = "none"
    BtnAltaCAso.style.display = "block"
    BtnModalEditCaso.style.display = "none"
    BtnArchivos.style.display = "none"
    InfoInferior.classList.add('cardHide')
    TimeLine.classList.remove('show')
    ArchivosCasos.classList.remove('show')
    InfoHoras.classList.remove('show')
    BtnShowListaCasos.style.display = "none"
    setTimeout(() => {
        InfoSuperior.classList.remove('cardHide')
    }, 2000);

})


BtnEditStatus.addEventListener('click', async(e) => {
    showModal(modalCarga)
    await new Promise(r => setTimeout(r, 2000))
    hideModal(modalCarga)


    try {
        const personal_t = await fetch('/get-token')
        const res_personal_t = await personal_t.json()

        let body_case = {
            "legal_case_id" : idCase.value
        }
        const queryParams = new URLSearchParams(body_case).toString();

        const case_info = await fetch(`https://api.lexialegal.site/api/legal-cases/show/cases?${queryParams}`, {
            method: "GET",
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json",
                'Authorization': `Bearer ${res_personal_t.token}`,
            }
        })
        const res_case_info = await case_info.json()

        let actual_status = ""

        if (res_case_info.data.status == "inicio_caso") {
            actual_status = "revision_documentos"
        }
        else if (res_case_info.data.status == "revision_documentos"){
            actual_status = "proceso"
        }
        else if (res_case_info.data.status == "proceso") {
            actual_status = "sentencia"
        }
        const legal_case_id = idCase.value,
        status = actual_status,
        notify_email = document.querySelector("#config_notify_email"),
        notify_client = document.querySelector("#config_notify_client"),
        notify_attorneys = document.querySelector("#config_notify_attorneys")
        let body_change = {
            "legal_case_id": legal_case_id,
            "status": actual_status,
            "config_notify_client": (notify_client.checked) ? true : false,
            "config_notify_attorneys": (notify_attorneys.checked) ? true : false,
            "config_notify_email": (notify_email.checked) ? true : false
        };
        const change_status = await fetch('https://api.lexialegal.site/api/legal-cases/change/status/cases', {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json",
                'Authorization': `Bearer ${res_personal_t.token}`,
            },
            body:  JSON.stringify(body_change)
        })

        const res_change_status = await change_status.json()
        if (change_status.ok) {
            successMsj.textContent = res_change_status.message
            showModal(modalSuccess)
            hideModal(modalSuccess, 2000, () => {
                $("#modalNuevoCaso").modal({
                    hide:true
                })
                console.log(res_change_status.data)
                RenderizarTimeLine(res_change_status.data.status)
            });
        }

    } catch (error) {
        showModal(modalError)
        hideModal(modalError, 2000)
    }
})

AgregarArchivo.addEventListener('click', async(e) => {

    showModal(modalCarga)
    await new Promise(r => setTimeout(r, 2000))
    hideModal(modalCarga)

    try {
        let file_field = document.querySelector('input[name="documents[]"]').files[0]
        const me = await fetch('/get-token')
        const res_me = await me.json()

        let body_case = {
            "legal_case_id" : idCase.value
        }
        const queryParams = new URLSearchParams(body_case).toString();

        const bodyForm = new FormData()

        bodyForm.append('legal_case_id', idCase.value)
        bodyForm.append('documents[]', file_field)

        const file = await fetch('https://api.lexialegal.site/api/legal-cases/upload/files', {
            method: "POST",
            headers: {
                'Authorization': `Bearer ${res_me.token}`,
                Accept: 'application/json'
            },
            body: bodyForm
        })

        const res_file = await file.json()

        if (file.ok) {
            const case_info = await fetch(`https://api.lexialegal.site/api/legal-cases/show/cases?${queryParams}`, {
            method: "GET",
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json",
                'Authorization': `Bearer ${res_me.token}`,
            }
        })
        const res_case_info = await case_info.json()

        if (case_info.ok) {
            successMsj.textContent = res_file.message
            showModal(modalSuccess)
            hideModal(modalSuccess, 2000, () => {
                $("#modalArchivoCaso").modal({
                    hide:true
                })
                RenderizarArchivos(res_case_info.data.documents)
            });
        }
    }


    } catch (error) {
        showModal(modalError)
        hideModal(modalError, 2000)
    }
})

AgregarCaso.addEventListener('click', async(e) => {
    successMsj.textContent = ''

    const form = document.querySelector("#AltaCaso"),
    datos = new FormData(form)

    showModal(modalCarga)
    await new Promise(r => setTimeout(r, 2000))
    hideModal(modalCarga)

    try {
        const me = await fetch('/get-token')
        const res_me = await me.json()


        const res = await fetch('https://api.lexialegal.site/api/legal-cases', {
            method: "POST",
            headers: {
                'Authorization': `Bearer ${res_me.token}`,
                // 'Content-Type': 'multipart/form-data',
                Accept: 'application/json'
            },
            body: datos
        })

        const data = await res.json()
        if (res.ok) {
            successMsj.textContent = data.message
            showModal(modalSuccess)
            hideModal(modalSuccess, 2000, () => {
                $("#modalNuevoCaso").modal({
                    hide:true
                })
                ObtenerListaCasos()
            });
        } else {
        showModal(modalError);
        hideModal(modalError, 2000, () => {
            // showModal(modalCaso)
        });

    }

    } catch (error) {
        showModal(modalError)
        hideModal(modalError, 2000)
    }
})


BtnEliminarCaso.addEventListener("click", async(e) => {
    showModal(modalCarga)
    await new Promise(r => setTimeout(r, 2000))
    hideModal(modalCarga)

    try {
        const me = await fetch('/get-token')
        const res_me = await me.json()

        let body_elim = {
            "legal_case_id": idCase.value
        }

        const res = await fetch('https://api.lexialegal.site/api/legal-cases/delete/case', {
            method: "POST",
            headers: {
                'Authorization': `Bearer ${res_me.token}`,
                "Content-Type": "application/json",
                "Accept": "application/json"
            },
            body: JSON.stringify(body_elim),
        })

        const res_delete_register = await res.json()

         if (res.ok) {
            successMsj.textContent = res_delete_register.message
            showModal(modalSuccess)
            hideModal(modalSuccess, 2000, () => {
            $("#modalEliminar").modal({
                hide:true
            })
            ObtenerListaCasos()
            });
        } else {
            showModal(modalError);
            hideModal(modalError, 2000, () => {
            // showModal(modalCaso)
            });
        }

    } catch (error) {
        showModal(modalError);
        hideModal(modalError, 2000, () => {
        // showModal(modalCaso)
        });
    }


})

BtnModalEditCaso.addEventListener("click", async(e) => {

    try {
        const personal_t = await fetch('/get-token')
        const res_personal_t = await personal_t.json()

        let body_case = {
            "legal_case_id" : idCase.value
        }
        const queryParams = new URLSearchParams(body_case).toString();

        const case_info = await fetch(`https://api.lexialegal.site/api/legal-cases/show/cases?${queryParams}`, {
            method: "GET",
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json",
                'Authorization': `Bearer ${res_personal_t.token}`,
            }
        })
        const res_case_info = await case_info.json()

        let caso_data = res_case_info.data
        console.log(res_case_info.data)

        document.getElementById("caso_nombre_edit").value = caso_data.caso_nombre
        document.getElementById("client_name_edit").value = ""
        document.getElementById("description_edit").value = caso_data.description
        // document.getElementById("case_date_edit").value = "vacio"
        document.getElementById("case_type_edit").value = caso_data.case_type

    } catch (error) {
        showModal(modalError);
        hideModal(modalError);
    }

})
