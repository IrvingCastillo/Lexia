import { showModal, hideModal, sleep } from '@/modales/modalHelper';
import * as bootstrap from 'bootstrap';
window.bootstrap = bootstrap;


const BusquedaPago = document.querySelector("#searchPayment"),
Monto = document.querySelector("#ammount"),
TogglePorPagar = document.querySelector("#porPagar"),
TogglePagado = document.querySelector("#pagado"),
FechaPago = document.querySelector("#payment_date"),
Caso = document.querySelector("#case"),
Descripcion = document.querySelector("#payment_description"),
LIstaPagos = document.querySelector("#ListaPagos"),
BtnAgregarPago = document.querySelector("#addPayment")

const ctx = document.getElementById('grafica').getContext('2d')

const modalCarga = new bootstrap.Modal(document.getElementById('modalCarga'), { backdrop: 'static', keyboard: false }),
modalError  = new bootstrap.Modal(document.getElementById('modalError'))


// ObtenerListaPagos()
ObtenerCasos()


async function ObtenerListaPagos(){
    try {
        const me = await fetch('/get-token')
        const res_me = await me.json()

        const get_payments = await fetch('', {
            method: "GET",
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json",
                'Authorization': `Bearer ${res_me.token}`,
            }
        })

        const res_get_payments = await get_payments.json()

        if (get_payments.ok) {
            // renderizar lista de pagos
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
    console.log(Monto.value)
    console.log(FechaPago.value)
    console.log(TogglePorPagar.checked)
    console.log(TogglePagado.checked)

    if (Monto.value == "" && FechaPago.value == "" && TogglePorPagar.checked || Monto.value == "" && FechaPago.value == "" && TogglePagado.checked) {
        BtnAgregarPago.disabled = "true"
        BtnAgregarPago.style.opacity = ".3"
    }
    else{
        BtnAgregarPago.disabled = "false"
        BtnAgregarPago.style.opacity = "1"
    }
})

BtnAgregarPago.addEventListener("click", async(e) => {

    try {
        const me = await fetch('/get-token')
        const res_me = await me.json()

        console.log("agregar pago")

    } catch (error) {
        showModal(modalError)
        hideModal(modalError, 2000)
    }


})
