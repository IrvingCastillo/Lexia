console.log("hola")

document.querySelectorAll('.btn-toggle-group input').forEach(radio => {
    radio.addEventListener('change', () => {
        document.querySelectorAll('.btn-toggle').forEach(btn => btn.classList.remove('active'));
        radio.nextElementSibling.classList.add('active');
    });
});


const ctx = document.getElementById('grafica').getContext('2d');

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
