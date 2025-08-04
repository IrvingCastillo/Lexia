console.log("hola")

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
                alert("calendario_dia", view)
            }
    });
}
