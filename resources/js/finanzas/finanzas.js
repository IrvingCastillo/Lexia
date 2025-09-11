import { showModal, hideModal, sleep } from '@/modales/modalHelper';
import * as bootstrap from 'bootstrap';
window.bootstrap = bootstrap;


const BusquedaPago = document.querySelector("#searchPayment"),
Monto = document.querySelector("#amount"),
TogglePorPagar = document.querySelector("#porPagar"),
TogglePagado = document.querySelector("#pagado"),
FechaPago = document.querySelector("#payment_date"),
Caso = document.querySelector("#case"),
Descripcion = document.querySelector("#payment_description"),
LIstaPagos = document.querySelector("#ListaPagos"),
BtnAgregarPago = document.querySelector("#addPayment")

const ctx = document.getElementById('grafica').getContext('2d')

const errorMsj = document.getElementById('mensajeError'),
cargaMsj = document.getElementById('mensajeCarga')


const modalCarga = new bootstrap.Modal(document.getElementById('modalCarga'), { backdrop: 'static', keyboard: false }),
modalError  = new bootstrap.Modal(document.getElementById('modalError'))

$('html, body').animate({
    scrollTop: 0
}, 600);

ObtenerListaPagos()
// ObtenerCasos()


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

async function ObtenerListaPagos(){
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

        let body = {
            "user_id": 28,
            // "type": "income",
            // "status": "completed",
            "date_from": "2025-09-08",
            "date_to": "2023-09-10",
            "per_page": 1,
        }

        const get_payments = await fetch("https://api.lexialegal.site/api/financial/movements?page=1&limit=1", {
            method: "GET",
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json",
                'Authorization': `Bearer ${res_me.token}`,
            }
        })

        console.log(get_payments)
        const res_get_payments = await get_payments.json()

    console.log(res_get_payments)
        if (get_payments.ok) {
            // renderizar lista de pagos
            if (res_get_payments.data.length > 0){
                document.querySelector("#mensaje-vacio-pagos").style.display = "none";

                res_get_payments.data.forEach(el => {
                    const templatePagos = document.querySelector("#pago-template").content.cloneNode(true);

                    templatePagos.querySelector(".titulo-pago").textContent = el.description;
                    templatePagos.querySelector(".caso-pago").textContent = el.amount;
                    const formatoFecha = formatearFecha(el.date)
                    templatePagos.querySelector(".fecha-pago").textContent = formatoFecha;

                    document.querySelector("#contenedor-pagos").appendChild(templatePagos);
                })
            }
            else{
                document.querySelector("#mensaje-vacio-pagos").style.display = "block";
            }
        }

    } catch (error) {
        showModal(modalError)
        hideModal(modalError, 2000)
    }
}

async function ObtenerCasos(){
    TogglePagado.checked = true
    try {
        const me = await fetch('/get-token')
        const res_me = await me.json()

        const get_cases = await fetch("https://api.lexialegal.site/api/legal-cases", {
            method: "GET",
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json",
                'Authorization': `Bearer ${res_me.token}`,
            }
        })

        const res_get_cases = await get_cases.json()

        if (get_cases.ok) {
            console.log(res_get_cases.data)

            // Caso.innerHTML = ""

            $("#case").append("<option selected disabled>Selecciona un caso</option>")
            res_get_cases.data.forEach(caso => {
                $("#case").append(`<option class="option" value="${caso.id}">${caso.caso_nombre}</option>`)
            })
        }

    } catch (error) {
        showModal(modalError)
        hideModal(modalError, 2000)
    }
}

document.querySelectorAll('.btn-toggle-group input').forEach(radio => {
    radio.addEventListener('change', () => {
        document.querySelectorAll('.btn-toggle').forEach(btn => btn.classList.remove('active'));
        radio.nextElementSibling.classList.add('active');
    });
});


// function GenerarGrafica(){
    new Chart(ctx, {
        type: 'bar',
        data: {
        labels: ["Enero", "Feb", "Mar", "Abr", "May", "Jun"],
        datasets: [
            {
            label: "Pagado",
            data: [2500, 3000, 2800, 3500, 2900, 3700],
            backgroundColor: "#0c2d48",
            barPercentage: 0.4,
            categoryPercentage: 0.6,
            borderRadius: 4
            },
            {
            label: "Por pagar",
            data: [1800, 2200, 1900, 2500, 2000, 2700],
            backgroundColor: "#6c757d",
            barPercentage: 0.4,
            categoryPercentage: 0.6,
            borderRadius: 4
            }
        ]
        },
        options: {
        responsive: true,
        plugins: {
            legend: { display: false } // ocultamos la leyenda por defecto
        },
        scales: {
            y: {
            beginAtZero: true,
            ticks: {
                stepSize: 900 // como en la imagen: 0, 900, 1800, ...
            }
            }
        }
        }
    });
// }

Caso.addEventListener("change", () => {
    if (Monto.value == "" && FechaPago.value == "" && TogglePorPagar.checked || Monto.value == "" && FechaPago.value == "" && TogglePagado.checked) {
        BtnAgregarPago.disabled = true
        BtnAgregarPago.style.opacity = ".3"
    }
    else{
        BtnAgregarPago.disabled = false
        BtnAgregarPago.style.opacity = "1"
    }
})

BtnAgregarPago.addEventListener("click", async(e) => {
    const form = document.querySelector("#AltaPago"),
    datos = new FormData(form)

    if (!form.checkValidity()) {
        form.reportValidity();
        return;
    }
    else{
        try {
            showModal(modalCarga)

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

console.log(res_data_me)
            let body = {
                // invocar a la ruta api/me para enviar el id del usuario loggeado
                "user_id": res_data_me[0]['id'],
                "type": "income",
                "amount": Monto.value,
                "date": FechaPago.value,
                "description": Descripcion.value,
                "currency": "MXN",
                "status": "completed"
            }

            const pago = await fetch("https://api.lexialegal.site/api/financial/movements", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "Accept": "application/json",
                    'Authorization': `Bearer ${res_me.token}`,
                },
                body: JSON.stringify(body)
            })

            const res_pago = await pago.json()

            console.log(pago)
            console.log(res_pago)
            if (pago.ok) {
                cargaMsj.textContent = res_pago.message
                hideModal(modalCarga, 2000)
            }
            else{
                showModal(modalError)
                errorMsj.textContent = res_pago.message
                hideModal(modalError, 2000)
            }



        } catch (error) {
            let error_response = error
            console.log(error_response)
            showModal(modalError)
            errorMsj.textContent = error_response
            hideModal(modalError, 2000)
        }
    }



})
