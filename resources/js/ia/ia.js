
const ExtraerCheck = document.querySelector("#resumen"),
ResumirCheck = document.querySelector("#resumir"),
PreguntaText = document.querySelector("#pregunta")

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

document.getElementById("startIA").addEventListener('click', function(){
    setTimeout(()=> {
        document.getElementById("listadoDocumento").classList.add('hide')
        document.getElementById("divEditor").classList.add('show')
    }, 500)
})

 const quill = new Quill('#editor', {
    theme: 'snow'
  });
