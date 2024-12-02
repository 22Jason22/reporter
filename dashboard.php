<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de Reportes INTI</title>
    <link rel="stylesheet" href="assets/css/home.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/dataTables.bootstrap5.css">
    
    <!-- Libreria para esquemas -----> 
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Libreria para alertas -----> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
</head>

<body>

    <header>
        <h2 class="logo">Reportes INTI</h2>
        <nav class="navegation">
            <a href="dashboard.php" class="menu-item">Dashboard</a>
            <a href="principal.php" id="menuTrabajadas" class="menu-item active">Trabajadas</a>
            <a href="solicitudes.php" id="menuSolicitudes" class="menu-item">Solicitudes</a>
            <button class="btn center" onclick="cerrarSesion()">Cerrar sesión </button>
        </nav>
        <script>
            function cerrarSesion() {
                window.location.href = "index.php?";
            }
        </script>
    </header>

    <?php
    include("config/config.php");
    include("acciones/acciones.php");
    include("acciones/consultas.php");

    $dataEstados = obtenerConteoPorEstado($conexion); // Obtener datos de estados
    $dataEdades = obtenerConteoPorEdad($conexion); // Obtener datos de edades
    $dataSedes = obtenerConteoPorSede($conexion); // Obtener datos de sedes

    // Procesa los datos para el gráfico de estados
    $labelsEstados = array_column($dataEstados, 'estado'); // Etiquetas del gráfico
    $valuesEstados = array_column($dataEstados, 'total'); // Valores del gráfico

    // Procesa los datos para el gráfico de edades
    $labelsEdades = array_column($dataEdades, 'edad'); // Etiquetas del gráfico
    $valuesEdades = array_column($dataEdades, 'total'); // Valores del gráfico

    // Procesa los datos para el gráfico de sedes
    $labelsSedes = array_column($dataSedes, 'sede'); // Etiquetas del gráfico
    $valuesSedes = array_column($dataSedes, 'total'); // Valores del gráfico

    // Definir colores para los gráficos
    $colors = ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF', '#FF9F40', '#FF5733', '#33FF57', '#3357FF', '#FF33A1'];
    ?>
    
    <div ```php
    <div class="logo-container">
        <img src="assets/imgs/logo_univ.png" alt="Logo Universidad" class="logo-universidad">
    </div>
    <div class="logo-container_INTI">
        <img src="assets/imgs/Logo_inti.png" alt="Logo Instituto" class="logo-instituto">
    </div>

    <div class="container">
        <h1>Dashboard de Estados</h1>
        <canvas id="myChart" width="400" height="200"></canvas>

        <h1>Distribución de Edades</h1>
        <canvas id="edadChart" width="400" height="200"></canvas>

        <h1>Distribución por Sedes</h1>
        <canvas id="sedeChart" width="400" height="200"></canvas>

        <table class="table mt-4">
            <thead>
                <tr>
                    <th>Estado</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($dataEstados as $item): ?>
                    <tr>
                        <td><?php echo $item['estado']; ?></td>
                        <td><?php echo $item['total']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script>
        const ctxEstados = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctxEstados, {
            type: 'doughnut', // Tipo de gráfico para estados
            data: {
                labels: <?php echo json_encode($labelsEstados); ?>, // Etiquetas para el gráfico de estados
                datasets: [{
                    label: 'Total por Estado',
                    data: <?php echo json_encode($valuesEstados); ?>, // Valores para el gráfico de estados
                    backgroundColor: <?php echo json_encode($colors); ?>, // Colores para cada segmento
                    borderColor: 'rgba(255, 255, 255, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                return tooltipItem.label + ': ' + tooltipItem.raw; // Muestra el nombre del estado y su total
                            }
                        }
                    }
                }
            }
        });

        const ctxEdades = document.getElementById('edadChart').getContext('2d');
        const edadChart = new Chart(ctxEdades, {
            type: 'bar', // Tipo de gráfico para edades
            data: {
                labels: <?php echo json_encode($labelsEdades); ?>, // Etiquetas para el gráfico de edades
                datasets: [{
                    label: 'Total por Edad',
                    data: <?php echo json_encode($valuesEdades); ?>, // Valores para el gráfico de edades
                    backgroundColor: 'rgba(153, 102, 255, 0.2)',
                    borderColor: 'rgba(153, 102, 255, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: false
                    }
                }
            }
        });

        const ctxSedes = document.getElementById('sedeChart').getContext('2d');
        const sedeChart = new Chart(ctxSedes, {
            type: 'pie', // Tipo de gráfico para sedes
            data: {
                labels: <?php echo json_encode($labelsSedes); ?>, // Etiquetas para el gráfico de sedes
                datasets: [{
                    label: 'Total por Sede',
                    data: <?php echo json_encode($valuesSedes); ?>, // Valores para el gráfico de sedes
                    backgroundColor: <?php echo json_encode($colors); ?>, // Colores para cada segmento
                    borderColor: 'rgba(255, 255, 255, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                return tooltipItem.label + ': ' + tooltipItem.raw; // Muestra el nombre de la sede y su total
                            }
                        }
                    }
                }
            }
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="assets/js/detallesReporte.js"></script>
    <script src="assets/js /eliminarReporte.js"></script>
    <script src="assets/js/refreshTableAdd.js"></script>
    <script src="assets/js/refreshTableEdit.js"></script>
    <script src="assets/js/alertas.js"></script>
    <script src="js/navegacion.js"></script>
    <script src="assets/js/exportar.js"></script>

</body>

</html>