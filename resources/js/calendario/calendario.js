import { showModal, hideModal, sleep } from '@/modales/modalHelper';
import * as bootstrap from 'bootstrap';
window.bootstrap = bootstrap;


const modalCarga = new bootstrap.Modal(document.getElementById('modalCarga'), { backdrop: 'static', keyboard: false }),
modalError  = new bootstrap.Modal(document.getElementById('modalError'))

CalendarioEventos();


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
