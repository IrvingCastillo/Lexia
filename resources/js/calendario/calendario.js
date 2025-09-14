import { showModal, hideModal, sleep } from '@/modales/modalHelper';
import * as bootstrap from 'bootstrap';
window.bootstrap = bootstrap;


const modalCarga = new bootstrap.Modal(document.getElementById('modalCarga'), { backdrop: 'static', keyboard: false }),
modalError  = new bootstrap.Modal(document.getElementById('modalError'))

const diaEvento = document.querySelector("#fecha_evento"),

bntAgregarCita = document.querySelector("#agregarCita"),
bntEditarCita = document.querySelector("#editarCita"),
bntEliminarCita = document.querySelector("#btnEliminar"),
idCitaEdit = document.querySelector("#id_appointment_edit")

const tipo =  document.querySelector("#tipoEliminar"),
titulo = document.querySelector("#tituloEliminar")

const cargaMsj = document.getElementById('mensajeCarga'),
errorMsj = document.getElementById('mensajeError')


CalendarioEventos();
// ObtenerClientes()

async function ObtenerListaEventos(){
    const me = await fetch('/get-token')
    const res_me = await me.json()

    const get_appointments = await fetch("https://api.lexialegal.site/api/appointments", {
        method: "GET",
        headers: {
            "Content-Type": "application/json",
            "Accept": "application/json",
            'Authorization': `Bearer ${res_me.token}`,
        }
    })

    const res_get_appointments = await get_appointments.json()
console.log(get_appointments)
console.log(res_get_appointments)
    return res_get_appointments

}

async function CalendarioEventos() {
    await ObtenerListaEventos().then(response => {
        $('#calendar').fullCalendar( 'destroy' );
        $('#calendar').fullCalendar({
            locale: 'es-us',
            height: 800,
            header: {
                left: 'prev,next',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            // defaultDate: responseJSON.FechaActual,
            buttonIcons: true,
            weekNumbers: false,
            editable: false,
            eventLimit: true,
            events: response.data,
            // events: [
            //     { 'title': "Cita Miguel Alvarez", start: "2025-09-11" },
            //     { 'title': "Cita Luis Mendoza", start: "2025-09-11" },
            //     { 'title': "Cita Luis Perez", start: "2025-09-11" },
            //     { 'title': "Cita Luis Ramirez", start: "2025-09-11" },
            //     { 'title': "Cita Amanda Sanchez", start: "2025-09-11" },
            //     { 'title': "Cita Ana Torres", start: "2025-09-12" }
            // ],
            timeFormat: 'HH:mm',
            slotLabelFormat: [
                'MMMM YYYY', // top level of text
                'HH:mm'        // lower level of text
                ],
                eventDrop(event, delta, revertFunc, jsEvent, ui, view){
                    console.log(event)
                    console.log("Nueva fecha de fin:", event.start.format("YYYY-MM-DD"));
                    //para editar en caso de que se arrastre

                },
                eventClick: function (calEvent, jsEvent, view) {
                        console.log(calEvent)
                        idCitaEdit.value = calEvent.id
                        LlenarModal(calEvent)
                         $('.start_hour_edit').timepicker({
                        timeFormat: 'H:i',
                        stepMinute: 30 ,
                        minTime: '09',
                        maxTime: '6:00pm',
                        dynamic: false,
                        dropdown: true,
                        scrollbar: false
                    });
                    $('.end_hour_edit').timepicker({
                        timeFormat: 'H:i',
                        stepMinute: 30 ,
                        minTime: '09',
                        maxTime: '6:00pm',
                        dynamic: false,
                        dropdown: true,
                        scrollbar: false
                    });
                        $('#modalEditarEvento').modal('show')
                },
                dayClick: function(date, jsEvent, view) {
                    LimpiarModal()
                    $('.start_hour').timepicker({
                        timeFormat: 'H:i',
                        stepMinute: 30 ,
                        minTime: '09',
                        maxTime: '6:00pm',
                        dynamic: false,
                        dropdown: true,
                        scrollbar: false
                    });
                    $('.end_hour').timepicker({
                        timeFormat: 'H:i',
                        stepMinute: 30 ,
                        minTime: '09',
                        maxTime: '6:00pm',
                        dynamic: false,
                        dropdown: true,
                        scrollbar: false
                    });
                    setTimeout(() => {
                        document.querySelector("#date").value = date.format()
                        $('#modalAgregarEvento').modal('show');
                    }, 100);
                    diaEvento.innerHTML = date.format()
                    diaEvento.value = date.format()
                }
        });
    })
}

$('.start_hour').on('changeTime', function() {
  let startVal = $(this).val();
  console.log(startVal)
  if (startVal) {
    $('.end_hour').timepicker('option', 'minTime', startVal);
  }
});

async function ObtenerClientes(){
    const me = await fetch('/get-token')
    const res_me = await me.json()

    const get_clients = await fetch("https://api.lexialegal.site/api/clients", {
        method:"GET",
        headers: {
            "Content-Type": "application/json",
            "Accept": "application/json",
            'Authorization': `Bearer ${res_me.token}`,
        }
    })

    const res_get_clients = await get_clients.json()

    console.log(res_get_clients)
}

function LlenarModal(datos){
    console.log(datos.date)
    let d = new Date(datos.date)
    let fecha = d.toISOString().split("T")[0]

    $('.start_hour_edit').val('');
    $('.end_hour_edit').val('');
    document.querySelector("#body_asunto_edit").value = datos.body
    document.querySelector("#notes_edit").value = datos.notes
    document.querySelector("#date_edit").value = fecha
    document.querySelector("#startHour_edit").value = ""
    document.querySelector("#endHour_edit").value = ""
}
function LimpiarModal(){
    diaEvento.innerHTML = ''
    $('.start_hour').val('');
    $('.end_hour').val('');
    document.querySelector("#body_asunto").value = ""
    document.querySelector("#notes").value = ""
    document.querySelector("#notes").value = ""
    document.querySelector("#date").value = ""

}
bntAgregarCita.addEventListener("click", async(e) => {
    cargaMsj.textContent = ''
    $('#modalAgregarEvento').modal('hide');
    showModal(modalCarga)

    const form = document.querySelector("#AltaCita")
    // datos = new FormData(form)

    // let datosCompletos = Object.fromEntries(datos.entries());

    // console.log(datosCompletos)

    // const datosJson = JSON.stringify(datosCompletos);

    if (!form.checkValidity()) {
        form.reportValidity();
        return;
    }
    else{
        try {
            const me = await fetch('/get-token')
            const res_me = await me.json()

            const data_me = await fetch("https://api.lexialegal.site/api/me", {
            headers: {
                    "Content-Type": "application/json",
                    "Accept": "application/json",
                    'Authorization': `Bearer ${res_me.token}`,
                }
            })

            const res_data_me = await data_me.json()

            let fecha_local = `${diaEvento.value} ${document.querySelector("#startHour").value}`.toString()

            let body = {
                "user_id": res_data_me[0].id,
                "body": document.querySelector("#body_asunto").value,
                "status": "confirmed",
                "notes" : document.querySelector("#notes").value,
                "date_local" : fecha_local,
                "timezone": "America\/Mexico_City",
                "destinatario": document.querySelector("#destinatario").value
            }

            const make_appointment = await fetch("https://api.lexialegal.site/api/appointments/create", {
                method: "POST",
                headers: {
                    'Authorization': `Bearer ${res_me.token}`,
                    "Content-Type": "application/json",
                    "Accept": "application/json",
                },
                body: JSON.stringify(body)
            })

            const res_make_appointment = await make_appointment.json()

            if (make_appointment.ok) {
                cargaMsj.innerHTML = res_make_appointment.message
                hideModal(modalCarga, 2000, ()=> {
                    CalendarioEventos()
                })
            }
            else{
                hideModal(modalCarga)
                errorMsj.innerText = res_make_appointment.message
                showModal(modalError)
                hideModal(modalError, 2000)
            }

            console.log(make_appointment)
            console.log(res_make_appointment)

        } catch (error) {
            console.log(error)
            showModal(modalError)
            hideModal(modalError, 2000)
        }
    }

})


bntEditarCita.addEventListener("click", async(e) => {
    e.preventDefault()

    cargaMsj.textContent = ''
    $('#modalEditarEvento').modal('hide');
    showModal(modalCarga)

    try {
        const me = await fetch('/get-token')
        const res_me = await me.json()

        const data_me = await fetch("https://api.lexialegal.site/api/me", {
        headers: {
                "Content-Type": "application/json",
                "Accept": "application/json",
                'Authorization': `Bearer ${res_me.token}`,
            }
        })

        const res_data_me = await data_me.json()

        let fecha_local = `${document.querySelector("#date_edit").value} ${document.querySelector("#startHour_edit").value}`.toString()
console.log(res_data_me)
        let body = {
            "user_id": res_data_me[0].id,
            "body": document.querySelector("#body_asunto_edit").value,
            "status": "confirmed",
            "notes" : document.querySelector("#notes_edit").value,
            "date_local" : fecha_local,
            "timezone": "America\/Mexico_City",
            "destinatario": document.querySelector("#destinatario_edit").value,
            "appointment_id": idCitaEdit.value
        }

        const edit_appointment = await fetch("https://api.lexialegal.site/api/appointments/update", {
            method: "POST",
            headers: {
                'Authorization': `Bearer ${res_me.token}`,
                "Content-Type": "application/json",
                "Accept": "application/json",
            },
            body: JSON.stringify(body)
        })

        const res_edit_appointment = await edit_appointment.json()

        if (edit_appointment.ok) {
            cargaMsj.innerHTML = res_edit_appointment.message
            hideModal(modalCarga, 2000, ()=> {
                CalendarioEventos()
            })
        }
        else{
            hideModal(modalCarga)
            errorMsj.innerText = res_edit_appointment.message
            showModal(modalError)
            hideModal(modalError, 2000)
        }

    } catch (error) {
        showModal(modalError)
        hideModal(modalError, 2000)
    }
})

$("#showModalEliminar").on("click", function(){
    setTimeout(() => {
        $("#modalEliminar").modal("show")
    }, 100);
})

bntEliminarCita.addEventListener("click", async(e) => {
    e.preventDefault()

    cargaMsj.textContent = ''
    $('#modalEditarEvento').modal('hide');
    showModal(modalCarga)

    try {
        const me = await fetch('/get-token')
        const res_me = await me.json()

        let body = {
            "appointment_id" : idCitaEdit.value
        }

        const eliminar = await fetch("https://api.lexialegal.site/api/appointments/eliminar", {
            method: "POST",
            headers: {
                'Authorization': `Bearer ${res_me.token}`,
                "Content-Type": "application/json",
                "Accept": "application/json",
            },
            body: JSON.stringify(body)
        })

        const res_eliminar = await eliminar.json()

        if (eliminar.ok) {
            cargaMsj.innerHTML = res_eliminar.message
            hideModal(modalCarga, 2000, ()=> {
                CalendarioEventos()
            })
        }
        else{
            hideModal(modalCarga)
            errorMsj.innerText = res_eliminar.message
            showModal(modalError)
            hideModal(modalError, 2000)
        }

    } catch (error) {
        hideModal(modalCarga)
        showModal(modalError, 100)
        hideModal(modalError, 2000)
    }
})
