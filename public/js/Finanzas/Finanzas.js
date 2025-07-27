const pieCtx = document.getElementById('pieChart').getContext('2d');
    const barCtx1 = document.getElementById('barChart1').getContext('2d');
    const barCtx2 = document.getElementById('barChart2').getContext('2d');

    // Datos de ejemplo
    const labels = ['A', 'B', 'C'];
    const dataVal = [10, 20, 30];

    new Chart(pieCtx, {
      type: 'pie',
      data: {
        labels,
        datasets: [{ data: dataVal, backgroundColor: ['#ff6384','#36a2eb','#cc65fe'] }]
      }
    });

    new Chart(barCtx1, {
      type: 'bar',
      data: {
        labels,
        datasets: [{ label: 'Datos 1', data: dataVal, backgroundColor: '#36a2eb' }]
      },
      options: { scales: { y: { beginAtZero: true } } }
    });

    new Chart(barCtx2, {
      type: 'bar',
      data: {
        labels,
        datasets: [{ label: 'Datos 2', data: dataVal.map(v => v*1.5), backgroundColor: '#ff9f40' }]
      },
      options: { scales: { y: { beginAtZero: true } } }
    });
