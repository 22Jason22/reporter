// dashboard.js

async function fetchData(endpoint) {
    const response = await fetch(endpoint);
    return await response.json();
}

// Gráfico de Barras: Empleados por Estado
fetchData('acciones/getdashestado.php').then(data => {
    const labels = data.map(item => item.estado); // Obtener los estados
    const empleadosData = data.map(item => item.numero_empleados); // Obtener el número de empleados por estado

    const barChartConfig = {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Número de Empleados por Estado',
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1,
                data: empleadosData,
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    };
    const barChart = new Chart(document.getElementById('barChart'), barChartConfig);
});