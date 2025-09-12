import { showModal, hideModal, sleep } from '@/modales/modalHelper';
import * as bootstrap from 'bootstrap';
window.bootstrap = bootstrap;


const BusquedaPago = document.querySelector("#searchPayment"),
Monto = document.querySelector("#amount"),
TogglePorPagar = document.querySelector("#porPagar"),
TogglePagado = document.querySelector("#pagado"),
FechaPago = document.querySelector("#payment_date"),
// Caso = document.querySelector("#case"),
Descripcion = document.querySelector("#payment_description"),
LIstaPagos = document.querySelector("#ListaPagos"),
BtnAgregarPago = document.querySelector("#addPayment"),
BtnEliminar = document.querySelector("#btnEliminar"),
idPago = document.querySelector("#id_pago"),
tipo =  document.querySelector("#tipoEliminar"),
titulo = document.querySelector("#tituloEliminar")

const errorMsj = document.getElementById('mensajeError'),
cargaMsj = document.getElementById('mensajeCarga')


const modalCarga = new bootstrap.Modal(document.getElementById('modalCarga'), { backdrop: 'static', keyboard: false }),
modalError  = new bootstrap.Modal(document.getElementById('modalError'))

let chartInstance = null;
let todosLosPagos = [];
let pagosFiltrados = [];

$('html, body').animate({
    scrollTop: 0
}, 600);

ObtenerListaPagos()


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

        const get_payments = await fetch("https://api.lexialegal.site/api/financial/movements", {
            method: "GET",
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json",
                'Authorization': `Bearer ${res_me.token}`,
            }
        })

        const res_get_payments = await get_payments.json()

        if (get_payments.ok) {
            todosLosPagos = res_get_payments.data;
            RenderizarPagos(todosLosPagos);
            GenerarGrafica(todosLosPagos);
        }
        else{
            showModal(modalError)
            errorMsj.innerText = res_get_payments.message
            hideModal(modalError, 2000)
        }

    } catch (error) {
        showModal(modalError)
        console.log("error lista pagos")
        hideModal(modalError, 2000)
    }
}

document.querySelectorAll('.btn-toggle-group input').forEach(radio => {
    radio.addEventListener('change', () => {
        document.querySelectorAll('.btn-toggle').forEach(btn => btn.classList.remove('active'));
        radio.nextElementSibling.classList.add('active');
    });
});


document.querySelector("#searchPayment").addEventListener("input", (e) => {
    const texto = e.target.value.toLowerCase();
console.log(todosLosPagos)
    const filtrados = todosLosPagos.filter(pago =>
        pago.description.toLowerCase().includes(texto)
    );

    RenderizarPagos(filtrados);
});

function RenderizarPagos(todosLosPagos){
    console.log(todosLosPagos)
    const contenedorPagos = document.querySelector("#contenedor-pagos");
    contenedorPagos.innerHTML = "";

    if (todosLosPagos.length === 0) {
        document.querySelector("#mensaje-vacio-pagos").style.display = "block";
        return;
    } else {
        document.querySelector("#mensaje-vacio-pagos").style.display = "none";
    }


    todosLosPagos.forEach(el => {
        const templatePagos = document.querySelector("#pago-template").content.cloneNode(true);

        templatePagos.querySelector(".titulo-pago").textContent = el.description;
        templatePagos.querySelector(".caso-pago").textContent = `$${parseFloat(el.amount).toLocaleString()}`;
        const formatoFecha = formatearFecha(el.date)
        templatePagos.querySelector(".fecha-pago").textContent = formatoFecha;

        templatePagos.querySelector(".eliminarPago").addEventListener("click", () => {
            console.log(el.id)
                idPago.value = el.id
                tipo.innerHTML = "pago?"
                titulo.innerHTML = el.description
        });

        contenedorPagos.appendChild(templatePagos);
    })
}

function GenerarGrafica(datosGrafica){
    const montos = datosGrafica.map(p => parseFloat(p.amount));
    const montoTotal = montos.reduce((acc, val) => acc + val, 0);
    const montoMaximo = Math.max(...montos);
    const suggestedMax = Math.ceil(montoMaximo / 1000) * 1000;

    // Calcular stepSize dinámico (ej: 4 o 5 divisiones)
    const stepSize = Math.ceil(suggestedMax / 5);

    // Datos completos del año
    const labelsAnio = ["Enero", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"];
    const dataPagado = new Array(12).fill(0);
    // const dataPorPagar = [1800, 2200, 1900, 2500, 2000, 2700, 2600, 3000, 2800, 3200, 3100, 3400];

    datosGrafica.forEach(p => {
        const mes = new Date(p.date).getMonth(); // 0 = enero
        dataPagado[mes] += parseFloat(p.amount);
    });
    // Mes actual (0 = enero, 11 = diciembre)
    const mesActual = new Date().getMonth();

    // Si el mes actual está en la primera mitad del año → mostrar de enero a junio
    // Si está en la segunda mitad → mostrar de julio a diciembre
    const semestre = mesActual < 6 ? 0 : 1;

    // Cortamos los arrays dependiendo del semestre
    const labels = semestre === 0 ? labelsAnio.slice(0, 6) : labelsAnio.slice(6);
    const pagado = semestre === 0 ? dataPagado.slice(0, 6) : dataPagado.slice(6);
    // const porPagar = semestre === 0 ? dataPorPagar.slice(0, 6) : dataPorPagar.slice(6);

    const ctx = document.getElementById("grafica").getContext("2d");

    // 🧹 Si ya existe una gráfica, destruirla antes de crear la nueva
    if (chartInstance) {
        chartInstance.destroy();
    }

    chartInstance = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: labels,
        datasets: [
        {
            label: "Pagado",
            data: pagado,
            backgroundColor: "#0c2d48",
            barPercentage: 0.4,
            categoryPercentage: 0.6,
            borderRadius: 4
        },
        //   {
        //     label: "Por pagar",
        //     data: porPagar,
        //     backgroundColor: "#6c757d",
        //     barPercentage: 0.4,
        //     categoryPercentage: 0.6,
        //     borderRadius: 4
        //   }
        ]
    },
    options: {
        responsive: true,
        plugins: {
        legend: { display: false }
        },
        scales: {
        y: {
            beginAtZero: true,
            suggestedMax: suggestedMax,
            ticks: {
            stepSize: stepSize
            }
        }
        }
    }
    });
    document.getElementById("info-maximo").innerText = ` $${montoTotal.toLocaleString()}`;


}


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
            let body = {
                // invocar a la ruta api/me para enviar el id del usuario loggeado
                "user_id": res_data_me[0]['id'],
                "type": "income",
                "amount": Monto.value.replace(/,/g, ''),
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

            if (pago.ok) {
                cargaMsj.textContent = res_pago.message
                hideModal(modalCarga, 2000)
                ObtenerListaPagos()
                Monto.value = ""
                FechaPago.value = ""
                Descripcion.value = ""
            }
            else{
                hideModal(modalCarga)
                showModal(modalError, 100)
                errorMsj.textContent = res_pago.message
                hideModal(modalError, 2300)
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


BtnEliminar.addEventListener("click", async(e) => {
    cargaMsj.textContent = ""

    try {
        showModal(modalCarga)
        const me = await fetch('/get-token')
        const res_me = await me.json()

        let body_elim = {
            "financial_movements_id": idPago.value
        }

        const elim_pago = await fetch("https://api.lexialegal.site/api/financial/movements/delete", {
            method: "POST",
            headers: {
                'Authorization': `Bearer ${res_me.token}`,
                "Content-Type": "application/json",
                "Accept": "application/json"
            },
            body: JSON.stringify(body_elim),
        })

        const res_elim_pago = await elim_pago.json()

        if (elim_pago.ok) {
            cargaMsj.textContent = res_elim_pago.message
            hideModal(modalCarga, 2000, () => {
                $("#modalEliminar").modal({
                    hide:true
                })
                ObtenerListaPagos()
            })

        }
        else{
            showModal(modalError);
            errorMsj.textContent = res_elim_pago.message
            hideModal(modalError, 2000);
        }

    } catch (error) {
        showModal(modalError)
        errorMsj.textContent = error_response
        hideModal(modalError, 2000)
    }
})
