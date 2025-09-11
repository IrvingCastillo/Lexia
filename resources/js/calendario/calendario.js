import { showModal, hideModal, sleep } from '@/modales/modalHelper';
import * as bootstrap from 'bootstrap';
window.bootstrap = bootstrap;


const modalCarga = new bootstrap.Modal(document.getElementById('modalCarga'), { backdrop: 'static', keyboard: false }),
modalError  = new bootstrap.Modal(document.getElementById('modalError'))

const bntAgregarCita = document.querySelector("#agregarCita")

const cargaMsj = document.getElementById('mensajeCarga')


CalendarioEventos();
ObtenerClientes()

function CalendarioEventos() {
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
        editable: true,
        eventLimit: true,
        // events: responseJSON.Eventos,
        timeFormat: 'HH:mm',
        slotLabelFormat: [
            'MMMM YYYY', // top level of text
            'HH:mm'        // lower level of text
            ],
            eventClick: function (calEvent, jsEvent, view) {
                alert("calendario_evento", calEvent)
            },
            dayClick: function(date, jsEvent, view) {
                // alert("calendario_dia", view)
                document.querySelector("#texto_evento").innerHTML = ''
                console.log("Se hizo clic en el día:", date.format());

                setTimeout(() => {
                    $('#modalAgregarEvento').modal('show');
                }, 200);
                document.querySelector("#texto_evento").innerHTML = date.format()
            }
    });
}


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

bntAgregarCita.addEventListener("click", async(e) => {
    cargaMsj.textContent = ''
    // showModal(modalCarga)
    // await new Promise(r => setTimeout(r, 2000))
    // hideModal(modalCarga)


    const form = document.querySelector("#AltaCita")

    if (!form.checkValidity()) {
        form.reportValidity();
        return;
    }
    else{
        try {
            const me = await fetch('/get-token')
            const res_me = await me.json()

            let body = {

            }

            const make_appointment = await fetch("https://api.lexialegal.site/api/appointments/create", {
                method: "POST",
                headers: {
                    'Authorization': `Bearer ${res_personal_t.token}`,
                    "Content-Type": "application/json",
                    "Accept": "application/json",
                },
                body: JSON.stringify(body)
            })

            const res_make_appointment = await make_appointment.json()

            console.log(make_appointment)
            console.log(res_make_appointment)

        } catch (error) {
            showModal(modalError)
            hideModal(modalError, 2000)
        }
    }

})
