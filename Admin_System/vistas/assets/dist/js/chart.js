const barCtx = document.getElementById('barChart').getContext('2d');
const pieCtx = document.getElementById('pieChart').getContext('2d');
const cProductos = document.getElementById('cantidad-productos');

function CargarDatos() {
    $.ajax({
        url: 'http://localhost/Proyect_ADSO/Admin_System/controllers/controlador_grafico.php',
        type: "POST"
    }).done(function (resp) {
        var data = JSON.parse(resp);
        titulo_bar = []
        cantidad_bar = []

        titulo_circle = []
        cantidad_circle = []
        console.log(data)
        for (let i = 0; i < data.grafico_bar.length; i++) {
            titulo_bar.push(data.grafico_bar[i].nombre);
            cantidad_bar.push(data.grafico_bar[i].cantidad);

        }

        for (let i = 0; i < data.grafico_circular.length; i++) {
            titulo_bar.push(data.grafico_circular[i].nombre);
            cantidad_bar.push(data.total_cantidad[i].cantidad);

        }

        console.log(titulo_bar);
        console.log(cantidad_bar);

        new Chart(barCtx, {
            type: 'bar',
            data: {
                labels: titulo_bar,
                datasets: [{
                    label: `cantidad de productos: ${data.grafico_bar.length}`,
                    data: cantidad_bar,
                    borderColor: '#fff',
                    backgroundColor: '#333',
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // fin graficoo de barras
        // Crear el gráfico circular
        new Chart(pieCtx, {
            type: 'pie',
            data: {
                labels: titulo_bar,
                datasets: [{
                    data: cantidad_bar,
                    backgroundColor: '#333',
                    borderColor: '#fff',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function (tooltipItem) {
                                return `${tooltipItem.label}: ${tooltipItem.raw}`;
                            }
                        }
                    }
                }
            }
        });



    });
}

CargarDatos();