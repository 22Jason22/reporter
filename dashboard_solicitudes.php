<!-- dashboard.php -->
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

    <style>
        h1 {
            color: #333; /* Cambia el color del texto de los títulos */
            font-size: 1.5rem; /* Tamaño de fuente */
            margin-bottom: 15px; /* Espacio debajo de los títulos */
        }

        canvas {
            width: 100% !important; /* Asegúrate de que el canvas ocupe el 100% del ancho */
            height: auto !important; /* Mantiene la relación de aspecto */
            background-color: #f8f9fa; /* Color de fondo para los gráficos */
            border-radius: 8px; /* Bordes redondeados */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Sombra para dar profundidad */
        }
    </style>
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
    include("acciones/consultas_3.php");

    $dataEstados = obtenerConteoPorEstado($conexion); // Obtener datos de estados
    $dataEdades = obtenerConteoPorEdad($conexion); // Obtener datos de edades
    $dataSedes = obtenerConteoPorSede($conexion); // Obtener datos de sedes
    $dataTipoSujeto = obtenerConteoPorTipoSujeto($conexion); // Obtener datos de tipo de sujeto

    // Procesa los datos para el gráfico de estados
    $labelsEstados = array_column($dataEstados, 'municipio'); // Etiquetas del gráfico
    $valuesEstados = array_column($dataEstados , 'total'); // Valores del gráfico

    // Procesa los datos para el gráfico de edades
    $labelsEdades = array_column($dataEdades, 'edad'); // Etiquetas del gráfico
    $valuesEdades = array_column($dataEdades, 'total'); // Valores del gráfico

    // Procesa los datos para el gráfico de sedes
    $labelsSedes = array_column($dataSedes, 'sede'); // Etiquetas del gráfico
    $valuesSedes = array_column($dataSedes, 'total'); // Valores del gráfico

    // Procesa los datos para el gráfico de tipo de sujeto
    $labelsTipoSujeto = array_column($dataTipoSujeto, 'tipo_sujeto'); // Etiquetas del gráfico
    $valuesTipoSujeto = array_column($dataTipoSujeto, 'total'); // Valores del gráfico

    // Definir colores para los gráficos
    $colors = ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF', '#FF9F40', '#FF5733', '#33FF57', '#3357FF', '#FF33A1'];
    ?>
    
    <div class="logo-container">
        <img src="assets/imgs/logo_univ.png" alt="Logo Universidad" class="logo-universidad">
    </div>
    <div class="logo-container_INTI">
        <img src="assets/imgs/Logo_inti.png" alt="Logo Instituto" class="logo-instituto">
    </div>

    <div class="container">
        <h1 class="text-center my-4">Dashboard de Reportes</h1>

        <div class="text-center mb-4">
        <a href="dashboard_trabajadas.php" class="btn btn-primary rounded-pill mx-2">Gráficos Trabajadas</a>
        <a href="dashboard_solicitudes.php" class="btn btn-success rounded-pill mx-2">Gráficos Solicitudes</a>
        <a href="dashboard.php" class="btn btn-info rounded-pill mx-2" style="margin-top: 10px;">Gráficos Totales</a>

        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="bg-light p-3 rounded">
                <h2 class="text-center">Dashboard de Estados</h2>
                <canvas id="myChart" width="400" height="200"></canvas>
                </div>
            </div>
            <div class="col-md-6">
                <div class="bg-light p-3 rounded">
                    <h2 class="text-center">Distribución de Edades</h2>
                    <canvas id="edadChart" width="400" height="400"></canvas>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-6">
                <div class="bg-light p-3 rounded">
                    <h2 class="text-center">Distribución por Sedes</h2>
                    <canvas id="sedeChart" width="400" height="200"></canvas>
                </div>
            </div>
            <div class="col-md-6">
                <div class="bg-light p-3 rounded">
                    <h2 class="text-center">Distribución por Tipo de Sujeto</h2>
                    <canvas id="tipoSujetoChart" width="400" height="200"></canvas>
                </div>
            </div>
        </div>

        <script>
            const ctxEstados = document.getElementById('myChart').getContext('2d');
            const myChart = new Chart(ctxEstados, {
                type: 'doughnut',
                data: {
                    labels: <?php echo json_encode($labelsEstados); ?>,
                    datasets: [{
                        label: 'Total por Estado',
                        data: <?php echo json_encode($valuesEstados); ?>,
                        backgroundColor: <?php echo json_encode($colors); ?>,
                        borderColor: 'rgba(255, 255, 255, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    plugins: {
                        tooltip: {
                            callbacks: {
                                label: function(tooltipItem) {
                                    return tooltipItem.label + ': ' + tooltipItem.raw;
                                }
                            }
                        }
                    }
                }
            });

            const ctxEdades = document.getElementById('edadChart').getContext('2d');
            const edadChart = new Chart(ctxEdades, {
                type: 'bar',
                data: {
                    labels: <?php echo json_encode($labelsEdades); ?>,
                    datasets: [{
                        label: 'Total por Edad',
                        data: <?php echo json_encode($valuesEdades); ?>,
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
                type: 'pie',
                data: {
                    labels: <?php echo json_encode($labelsSedes); ?>,
                    datasets: [{
                        label: 'Total por Sede',
                        data: <?php echo json_encode($valuesSedes); ?>,
                        backgroundColor: <?php echo json_encode($colors); ?>,
                        borderColor: 'rgba(255, 255, 255, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    plugins: {
                        tooltip: {
                            callbacks: {
                                label: function(tooltipItem) {
                                    return tooltipItem.label + ': ' + tooltipItem.raw;
                                }
                            }
                        }
                    }
                }
            });

            const ctxTipoSujeto = document.getElementById('tipoSujetoChart').getContext('2d');
            const tipoSujetoChart = new Chart(ctxTipoSujeto, {
                type: 'polarArea',
                data: {
                    labels: <?php echo json_encode($labelsTipoSujeto); ?>,
                    datasets: [{
                        label: 'Total por Tipo de Sujeto',
                        data: <?php echo json_encode($valuesTipoSujeto); ?>,
                        backgroundColor: <?php echo json_encode($colors); ?>,
                        borderColor: 'rgba(255, 255, 255, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    plugins: {
                        tooltip: {
                            callbacks: {
                                label: function(tooltipItem) {
                                    return tooltipItem.label + ': ' + tooltipItem.raw;
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
        <script src="assets/js/eliminarReporte.js"></script>
        <script src="assets/js/refreshTableAdd.js"></script>
        <script src="assets/js/refreshTableEdit.js"></script>
        <script src="assets/js/alertas.js"></script>
        <script src="js/navegacion.js"></script>
        <script src="assets/js/exportar.js"></script>

    </div>
</body>

</html>