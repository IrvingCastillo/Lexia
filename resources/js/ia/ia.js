
const ExtraerCheck = document.querySelector("#resumen"),
ResumirCheck = document.querySelector("#resumir"),
PreguntaText = document.querySelector("#pregunta")

const Respuesta = document.querySelector("#editor")

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

Dropzone.options.myDropzone = {
  url: "/",
  dictDefaultMessage: "Arrastra aquí los archivos o haz clic para seleccionar",
  autoProcessQueue: false,
  acceptedFiles: "application/pdf,application/vnd.openxmlformats-officedocument.wordprocessingml.document,.txt",
  uploadMultiple: true,
  parallelUploads: 2,
  addRemoveLinks: true,
  dictRemoveFile: "✖️ Eliminar",
  maxFiles: 2,
  maxFilesize: 50, //MB
  init: function() {
    this.on("addedfile", function(file) {
      // Acciones al agregar un archivo
      console.log(file)
    });
    this.on("maxfilesexceeded", function (file) {
      this.removeFile(file);
      alert("Máximo de archivos excedido");
    });
    this.on("removedfile", function(file) {
      // file.name o un identificador personalizado desde response
      console.log("Se eliminó del front:", file.name);
    });
    //  this.on("removedfile", file => {  //eliminar del servidor
    //   const name = file.serverFilename || file.name;
    //   $.ajax({
    //     type: "POST",
    //     url: "/delete",
    //     data: { filename: name }
    //   })
    //   .done(() => console.log(`Eliminado: ${name}`))
    //   .fail(() => console.error(`Error eliminando ${name}`));
    // });

    document.getElementById("uploadBtn").addEventListener("click", () => { //boton de "Empezar"
      this.processQueue();
    });
  }
};

document.getElementById("startIA").addEventListener('click', async(e) => {
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
            setTimeout(EscribirLetra, velocidad + Math.random() * 60);
        }
        else{
            quill.setSelection(quill.getLength(), 0);
        }
    }

    setTimeout(() => {
        EscribirLetra();
    }, 1000);
}

async function ObtenerRespuesta(){
    try {
        const personal_t = await fetch('/get-token')
        const res_personal_t = await personal_t.json()

        console.log(PreguntaText.value)

        let body_ask = {
            "question" : PreguntaText.value
        }

        const askIA = await fetch('http://chat.lexialegal.site/analizar', {
            method: "POST",
            // headers:{
                'Authorization': `Bearer ${res_personal_t.token}`,
                // "Content-Type": "multipart/form-data"
            // },
            body: JSON.stringify(body_ask)
        })

        const res_askIA = await askIA.json()

        console.log(res_askIA)

        if(askIA.ok){
            EscribirTexto(res_askIA.answer, 60)
        }

    } catch (error) {
        // showModal(modalError)
        // hideModal(modalError, 2000)
    }
}
const respuestaBack = "Esta es la respuesta del back!!!"


