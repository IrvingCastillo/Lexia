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
VisualizarArchivos = document.querySelector("#visualizarArchivos")

const modalCarga = new bootstrap.Modal(document.getElementById('modalCarga'), { backdrop: 'static', keyboard: false }),
modalError  = new bootstrap.Modal(document.getElementById('modalError')),
modalSuccess = new bootstrap.Modal(document.getElementById('modalSuccess')),
modalCaso = new bootstrap.Modal(document.getElementById('modalNuevoCaso')),
successMsj = document.getElementById('mensajeExito'),
emptyMsj = document.getElementById('mensaje-vacio')

ObtenerListaCasos()

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
        list_res.data.forEach(el => {
            const clone = template.content.cloneNode(true);

            // Llenamos los valores dinámicos
            clone.querySelector(".titulo-caso").textContent = el.caso_nombre;
            clone.querySelector(".descripcion-caso").textContent = el.description;
            clone.querySelector(".estado-caso").textContent = el.status;

            // Ejemplo: agregar event listener al botón
            clone.querySelector(".gestionarCaso").addEventListener("click", () => {
                 idCase.value = el.id
                    setTimeout(()=> {
                        InfoSuperior.classList.add('cardHide')
                        TimeLine.classList.add('show')
                        //  setTimeout(()=> {
                            InfoInferior.classList.remove('cardHide')
                        // }, 300)
                        InfoHoras.classList.add('show')
                        ArchivosCasos.classList.add('show')
                        // ActualizarContador()
                        if(el.documents.length > 0){
                            console.log(el)
                            emptyMsj.style.display = "none";
                            RenderizarArchivos(el.documents)
                        }
                        else{
                            emptyMsj.style.display = "block";
                        }
                    }, 500)
            });

            contenedor.appendChild(clone);
        });

    } catch (error) {
        console.log(error)
        showModal(modalError)
        hideModal(modalError, 2000)
    }
}

function RenderizarArchivos(list_documents){
    const template = document.querySelector("#file-template");
    const contenedor = document.querySelector("#contenedor-archivos");

    // Limpiar contenedor antes de renderizar
    contenedor.innerHTML = "";

    list_documents.forEach(doc => {
console.log(doc)
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
        clone.querySelector(".fecha-archivo").textContent = doc.uploaded_at;

        // Event listener para borrar archivo
        clone.querySelector(".borrar-archivo").addEventListener("click", e => {
            e.preventDefault();
            console.log("Borrar archivo ID:", doc.id);
            // aquí podrías llamar a la API para eliminar
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

// GestionarCaso.addEventListener('click', function(){
//     setTimeout(()=> {
//         InfoSuperior.classList.add('cardHide')
//         TimeLine.classList.add('show')
//         //  setTimeout(()=> {
//             InfoInferior.classList.remove('cardHide')
//         // }, 300)
//         InfoHoras.classList.add('show')
//         ArchivosCasos.classList.add('show')
//         ActualizarContador()
//     }, 500)
// })

$('.dropdown-menu').on('click', function(e) {
  e.stopPropagation();
});

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

AgregarArchivo.addEventListener('click', async(e) => {
    let file = document.querySelector('input[name="documents[]"]').files[0]
    const me = await fetch('/get-token')
    const res_me = await me.json()

    const bodyForm = new FormData()

    bodyForm.append('legal_case_id', idCase.value)
    bodyForm.append('documents[]', file)

    const res_file = await fetch('https://api.lexialegal.site/api/legal-cases/upload/files', {
        method: "POST",
        headers: {
            'Authorization': `Bearer ${res_me.token}`,
            Accept: 'application/json'
        },
        body: bodyForm
    })

    const data = await res_file.json()
    if (res_file.ok) {
        console.log(data)
    }
})

AgregarCaso.addEventListener('click', async(e) => {
    successMsj.textContent = ''

    const form = document.querySelector("#AltaCaso"),
    datos = new FormData(form)

    // let datosCompletos = Object.fromEntries(datos.entries())
    // const attorneysRaw = datos.getAll("attorneys[]");
    // datosCompletos["attorneys"] = attorneysRaw.map(valor => parseInt(valor, 10));

    // // (opcional) Eliminamos el campo original con [] si ya no lo queremos
    // delete datosCompletos["attorneys[]"];

    // if (datosCompletos["notify_client"] === "false") {
    //     datosCompletos["notify_client"] = false;
    // }
    // if (datosCompletos["notify_attorneys"] === "false") {
    //     datosCompletos["notify_attorneys"] = false;
    // }
    // if (datosCompletos["notify_email"] === "false") {
    //     datosCompletos["notify_email"] = false;
    // }

    // const datosJson = JSON.stringify(datosCompletos)


    showModal(modalCarga)
    await new Promise(r => setTimeout(r, 2000))
    hideModal(modalCarga)

    // showModal(modalSuccess)
    // hideModal(modalSuccess, 2000, () => {
    //     $("#modalNuevoCaso").modal({
    //         hide:true
    //     })
    // });

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
