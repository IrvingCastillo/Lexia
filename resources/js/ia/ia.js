
const ExtraerCheck = document.querySelector("#resumen"),
ResumirCheck = document.querySelector("#resumir"),
PreguntaText = document.querySelector("#pregunta"),
dropZone = document.getElementById('dropZone'),
fileInput = document.getElementById('fileInput'),
fileList = document.getElementById('fileList'),
Respuesta = document.querySelector("#editor"),
BtnStart = document.getElementById("startIA")

let selectedFiles = [];

ExtraerCheck.addEventListener('change', function(){
    if(this.checked == true){
        ResumirCheck.checked = false
        ResumirCheck.disabled = true
        PreguntaText.disabled = true
        PreguntaText.value = ""
    }
    else{
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
    }
    else{
        ExtraerCheck.disabled = false
        PreguntaText.disabled = false
    }
})

PreguntaText.addEventListener('input', function(){
    if (this.value.length < 5) {
        ExtraerCheck.disabled = false
        ResumirCheck.disabled = false
    }
    else{
        ExtraerCheck.checked = false
        ExtraerCheck.disabled = true
        ResumirCheck.checked = false
        ResumirCheck.disabled = true
    }
})


BtnStart.addEventListener('click', async(e) => {
    document.getElementById("listadoDocumento").classList.add('cardHide')
    setTimeout(()=> {
        document.getElementById("divEditor").classList.remove('cardHide')
        // EscribirTexto(respuestaBack, 50)
    }, 2500)
    await ObtenerRespuesta()
})

 const quill = new Quill('#editor', {
    theme: 'snow'
  });

//   document.getElementById('startIA').addEventListener('click', () => {
//     console.log("editar")
//   const listado = document.getElementById('listadoDocumento');
//   const editor = document.getElementById('divEditor');

//   // Fade out listadoDocumento
//   listado.classList.remove('show');
//   listado.addEventListener('transitionend', function handler() {
//     listado.classList.add('d-none');

//     // Mostrar editor
//     editor.classList.remove('d-none');
//     void editor.offsetWidth; // forzar reflow
//     editor.classList.add('show');

//     listado.removeEventListener('transitionend', handler);
//   });
// });


  // Función que escribe letra por letra
function EscribirTexto(texto, velocidad = 50) {
    quill.setText(""); // limpiar contenido usando la API de Quill

    const cursor = document.createElement("span");
    cursor.classList.add("cursor");
    Respuesta.appendChild(cursor);

    let i = 0;
    function EscribirLetra() {
        if (i < texto.length) {
            quill.insertText(i, texto[i]); // insertar letra en la posición correspondiente
            i++;
            setTimeout(EscribirLetra, velocidad + Math.random() * 20);
        }
        else{
            quill.setSelection(quill.getLength(), 0);
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
      alert("Solo puedes subir máximo 2 archivos");
      break;
    }
    if (file.type === "application/pdf" || file.name.endsWith(".docx")) {
      selectedFiles.push(file);
    } else {
      alert("Solo se permiten archivos PDF o DOCX");
    }
  }
  renderFileList();
}

function renderFileList() {
    if (selectedFiles.length !== 0) {
        BtnStart.style.display = "block"
    }
    else{
        BtnStart.style.display = "none"
    }

  fileList.innerHTML = "";
  selectedFiles.forEach((file, index) => {
    const li = document.createElement("li");
    li.className = "list-group-item file-item";
    li.innerHTML = `
      <span>${file.name} (${(file.size/1024).toFixed(1)} KB)</span>
      <button class="btn btn-sm btn-danger">❌</button>
    `;
    li.querySelector("button").addEventListener("click", () => {
      selectedFiles.splice(index, 1);
      renderFileList();
    });
    fileList.appendChild(li);
  });
}


async function ObtenerRespuesta(){
    try {

        let formData = new FormData(),
        pregunta
        selectedFiles.forEach(file => formData.append("files", file))

        if (PreguntaText.value.trim() === "") {
            if (ResumirCheck.checked) {
                pregunta = "Resume este archivos o archivos "
            }
            else if (ExtraerCheck.checked) {
                pregunta = "Extrae la información de este archivo o archivos "
            }
        }
        else{
            pregunta = PreguntaText.value.trim()
        }

        formData.append("question", pregunta)

        console.log(formData)

        const askIA = await fetch('http://chat.lexialegal.site/analizar', {
            method: "POST",
            // headers:{
                // 'Authorization': `Bearer ${res_personal_t.token}`,
                // "Content-Type": "multipart/form-data"
            // },
            body: formData
        })

        const res_askIA = await askIA.json()

        console.log(res_askIA)

        if(askIA.ok){
            EscribirTexto(res_askIA.answer, 10)
        }

    } catch (error) {
        // showModal(modalError)
        // hideModal(modalError, 2000)
    }
}
const respuestaBack = "Esta es la respuesta del back!!!"


