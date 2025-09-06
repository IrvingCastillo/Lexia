import { showModal, hideModal, sleep } from '@/modales/modalHelper';
import * as bootstrap from 'bootstrap';
window.bootstrap = bootstrap;

const modalCarga = new bootstrap.Modal(document.getElementById('modalCarga'), { backdrop: 'static', keyboard: false }),
modalError  = new bootstrap.Modal(document.getElementById('modalError')),
modalSuccess = new bootstrap.Modal(document.getElementById('modalSuccess'))


const ExtraerCheck = document.querySelector("#resumen"),
ResumirCheck = document.querySelector("#resumir"),
PreguntaText = document.querySelector("#pregunta"),
dropZone = document.getElementById('dropZone'),
fileInput = document.getElementById('fileInput'),
fileList = document.getElementById('fileList'),
Respuesta = document.querySelector("#editor"),
BtnStart = document.getElementById("startIA"),
BtnDownloadPdf = document.querySelector("#downloadPdf"),
BtnShowDropFiles = document.querySelector("#showDropFiles")

const cargaMsj = document.getElementById('mensajeCarga'),
successMsj = document.getElementById('mensajeExito')



let selectedFiles = [];

ExtraerCheck.addEventListener('change', function(){
    if(this.checked == true){
        ResumirCheck.checked = false
        ResumirCheck.disabled = true
        PreguntaText.disabled = true
        PreguntaText.value = ""
        if (selectedFiles.length !== 0) {
            BtnStart.style.display = "block"
        }
        else{
            BtnStart.style.display = "none"
        }
    }
    else{
        BtnStart.style.display = "none"
        ResumirCheck.disabled = false
        PreguntaText.disabled = false
    }
})

ResumirCheck.addEventListener('change', function(){
    if(this.checked == true){
        ExtraerCheck.checked = false
        ExtraerCheck.disabled = true
        PreguntaText.disabled = true
        PreguntaText.value = ""
        if (selectedFiles.length !== 0) {
            BtnStart.style.display = "block"
        }
        else{
            BtnStart.style.display = "none"
        }
    }
    else{
        BtnStart.style.display = "none"
        ExtraerCheck.disabled = false
        PreguntaText.disabled = false
    }
})

PreguntaText.addEventListener('input', function(){
    if (this.value.length < 5) {
        ExtraerCheck.disabled = false
        ResumirCheck.disabled = false
        BtnStart.style.display = "none"
    }
    else{
        ExtraerCheck.checked = false
        ExtraerCheck.disabled = true
        ResumirCheck.checked = false
        ResumirCheck.disabled = true
        if (selectedFiles.length !== 0) {
            BtnStart.style.display = "block"
        }
        else{
            BtnStart.style.display = "none"
        }
        // BtnStart.style.display = "block"
    }
})


BtnStart.addEventListener('click', async(e) => {
    document.getElementById("listadoDocumento").classList.add('cardHide')
    setTimeout(()=> {
        document.getElementById("divEditor").classList.remove('cardHide')
        BtnShowDropFiles.style.display = "inline"
        // EscribirTexto(respuestaBack, 50)
    }, 2500)
    await ObtenerRespuesta()
})

BtnShowDropFiles.addEventListener("click", () => {
    document.getElementById("divEditor").classList.add('cardHide')
    setTimeout(()=> {
        document.getElementById("listadoDocumento").classList.remove('cardHide')
        BtnShowDropFiles.style.display = "none"
        // EscribirTexto(respuestaBack, 50)
    }, 1500)
})

 const quill = new Quill('#editor', {
    theme: 'snow'
  });

BtnDownloadPdf.addEventListener("click", async () => {
    successMsj.innerText = "En un momento se descarga el archivo"
    showModal(modalSuccess)
    const { jsPDF } = window.jspdf;
    const doc = new jsPDF();

    // Obtener texto plano del editor Quill
    const text = quill.getText();

    // === CONFIGURACIÓN DE ESTILO ===
    const marginLeft = 25;   // margen izquierdo
    const marginRight = 20;  // margen derecho
    const marginTop = 20;    // margen superior
    const marginBottom = 20; // margen inferior

    doc.setFont("times", "normal"); // fuente tipo Times
    doc.setFontSize(12);

    const pageWidth = doc.internal.pageSize.getWidth();
    const pageHeight = doc.internal.pageSize.getHeight();
    const usableWidth = pageWidth - marginLeft - marginRight;

    const lineHeight = 6;  // altura entre líneas
    const paragraphSpacing = 4; // espacio extra entre párrafos

    // Dividir texto en párrafos
    const paragraphs = text.split(/\n+/);

    let y = marginTop;

    paragraphs.forEach(paragraph => {
        const lines = doc.splitTextToSize(paragraph, usableWidth);

        lines.forEach(line => {
            if (y + lineHeight > pageHeight - marginBottom) {
                doc.addPage();
                y = marginTop;
            }
            doc.text(line, marginLeft, y);
            y += lineHeight;
        });

        // espacio extra después de cada párrafo
        y += paragraphSpacing;
    });

    setTimeout(() => {
        hideModal(modalSuccess)
        doc.save("contenido.pdf");
    }, 1000);
});


function EscribirTexto(texto, velocidad = 50) {
    quill.setText("");

    const cursor = document.createElement("span");
    cursor.classList.add("cursor");
    Respuesta.appendChild(cursor);

    let i = 0;
    function EscribirLetra() {
        if (i < texto.length) {
            quill.insertText(i, texto[i]); // insertar letra en la posición correspondiente
            i++;
            setTimeout(EscribirLetra, velocidad + Math.random() * 10);
        }
        else{
            quill.setSelection(quill.getLength(), 0);
            BtnDownloadPdf.style.display = "block"
        }
    }

    setTimeout(() => {
        EscribirLetra();
    }, 1000);
}

dropZone.addEventListener('click', () => fileInput.click());

dropZone.addEventListener('dragover', (e) => {
  e.preventDefault();
  dropZone.classList.add('dragover');
});

dropZone.addEventListener('dragleave', () => {
  dropZone.classList.remove('dragover');
});

dropZone.addEventListener('drop', (e) => {
  e.preventDefault();
  dropZone.classList.remove('dragover');
  handleFiles(e.dataTransfer.files);
});

// Input manual
fileInput.addEventListener('change', (e) => {
  handleFiles(e.target.files);
});


function handleFiles(files) {
    for (let file of files) {
        if (selectedFiles.length >= 2) {
            $("#modalMensajeArchivo").modal("show").on("shown.bs.modal", function () {
                document.getElementById("mensajeArchivo").innerHTML = "Solo puedes subir máximo 2 archivos"
                setTimeout(() => {
                    $("#modalMensajeArchivo").modal("hide");
                }, 2000);
            });
            break;
        }
        if (file.type === "application/pdf" || file.name.endsWith(".docx")) {
            selectedFiles.push(file);
        }
        else {
            $("#modalMensajeArchivo").modal("show").on("shown.bs.modal", function () {
                document.getElementById("mensajeArchivo").innerHTML = "Solo se permiten archivos PDF o DOCX"
                setTimeout(() => {
                    $("#modalMensajeArchivo").modal("hide");
                }, 2000);
            });

        }
    }
    renderFileList();
}

function renderFileList() {
  fileList.innerHTML = "";
  selectedFiles.forEach((file, index) => {
    const li = document.createElement("li");
    li.className = "list-group-item file-item-ia mt-1 normal-texto";
    li.style.borderColor = "#132c47"
    li.style.background = "#132c47"
    li.style.color = "#fff"
    // li.style.fontWeight = "bold"
    li.innerHTML = `
      <span>${file.name} (${(file.size/1024).toFixed(1)} KB)</span>
      <button class="btn btn-sm text-white"> <i class="fas fa-trash"></i> </button>
    `;
    li.querySelector("button").addEventListener("click", () => {
        if (selectedFiles.length === 1) {
            console.log(selectedFiles.length)
            BtnStart.style.display = "none"
            fileInput.value = ""
        }
      selectedFiles.splice(index, 1);
      renderFileList();
    });
    fileList.appendChild(li);
  });
}


async function ObtenerRespuesta(){
    quill.setText("");
    BtnDownloadPdf.style.display = "none"
    successMsj.innerText = "Espere un momento por favor"
    showModal(modalSuccess)
    setTimeout(() => {
        successMsj.innerText = "Estamos trabajando en ello..."
    }, 1500);

    try {

        let formData = new FormData(),
        pregunta
        selectedFiles.forEach(file => formData.append("files", file))

        if (PreguntaText.value.trim() === "") {
            if (ResumirCheck.checked) {
                pregunta = "Resume este archivo o archivos "
            }
            else if (ExtraerCheck.checked) {
                pregunta = "Extrae la información de este archivo o archivos "
            }
        }
        else{
            pregunta = PreguntaText.value.trim()
        }
        formData.append("question", pregunta)

        const askIA = await fetch('http://chat.lexialegal.site/analizar', {
            method: "POST",
            // headers:{
                // 'Authorization': `Bearer ${res_personal_t.token}`,
                // "Content-Type": "multipart/form-data"
            // },
            body: formData
        })

        const res_askIA = await askIA.json()

        if(askIA.ok){
            successMsj.innerText = ""
            successMsj.innerText = "¡Ya casi está listo!"
            setTimeout(() => {
                hideModal(modalSuccess)
                EscribirTexto(res_askIA.answer, 3)
            }, 1500);
        }

    } catch (error) {
        showModal(modalError)
        hideModal(modalError, 2000)
    }
}


