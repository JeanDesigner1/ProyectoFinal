<?php require_once "vistas/parte_superiorUSUARIOS.php"?>

<!--INICIO del cont principal-->
<div class="container">
    <h1>Página de analisis</h1>

    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    
</head>
<body>
    <div class="container">
        <div class="header">
            <h1></h1>
        </div>

        <div class="row">
            <!-- Card 1 -->
            <div class="card">
                <img src="../assets/img/ventas.png" alt="Ventas Icono">
                
            </div>

            <!-- Card 2 -->
            <div class="card">
                
                <img src="../assets/img/pagos.png" alt="Pagos Icono">
            </div>

            <!-- Card 3 -->
            <div class="card">
                <img src="../assets/img/provedores.png" alt="proveedores icono">
            </div>
        </div>

        <div class="row">
            <!-- Graph Section -->
            <div class="graph-card card">
            <img src="../assets/img/estadisticas.png" alt="estadistica">
            </div>

            <!-- Alerts Section -->
            <div class="alerts card">
                
                    <img src="../assets/img/alertas.png" alt="Producto en Alerta">
                    
                </div>
            </div>
        </div>
    </div>

    <script>
        // Ejemplo de cómo puedes cargar datos en la gráfica usando Chart.js
        const ctx = document.getElementById('salesGraph').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo'],
                datasets: [{
                    label: 'Ventas',
                    data: [0, 500, 400, 1000, 300, 700, 2000],
                    borderColor: '#a028ff',
                    borderWidth: 2,
                    fill: false
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</body>
</html>



</div>
<!--FIN del cont principal-->

<?php require_once "vistas/parte_inferiorUSUARIOS.php"?>