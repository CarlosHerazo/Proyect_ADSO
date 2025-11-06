const barCtx = document.getElementById('barChart').getContext('2d');
// const pieCtx = document.getElementById('pieChart').getContext('2d');
const cProductos = document.getElementById('cantidad-productos');

function CargarDatos() {
    $.ajax({
        url: 'https://agro.testbydevelopment.space/Admin_System/controllers/controlador_grafico.php',
        type: "POST"
    }).done(function (resp) {
        console.log(resp)
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
            titulo_circle.push(data.grafico_circular[i].nombre);
            cantidad_circle.push(data.grafico_circular[i].cantidad);

        }

        console.log(titulo_bar);
        console.log(cantidad_bar);

        // CARDS

        cardUser = document.getElementById("cantidad-usuarios").textContent = `${data.dataUser[0]['COUNT(*)']}`;
        cardUser = document.getElementById("cantidad-productos").textContent = `${data.dataProducts[0]['COUNT(*)']}`;
        cardUser = document.getElementById("cantidad-ventas").textContent = `$${data.dataVenta[0]['SUM( total )']}`;



        // CHART
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
        // new Chart(pieCtx, {
        //     type: 'pie',
        //     data: {
        //         labels: titulo_circle,
        //         datasets: [{
        //             data: cantidad_circle,
        //             backgroundColor: '#333',
        //             borderColor: '#fff',
        //             borderWidth: 1
        //         }]
        //     },
        //     options: {
        //         responsive: true,
        //         plugins: {
        //             legend: {
        //                 position: 'top',
        //             },
        //             tooltip: {
        //                 callbacks: {
        //                     label: function (tooltipItem) {
        //                         return `${tooltipItem.label}: ${tooltipItem.raw}`;
        //                     }
        //                 }
        //             }
        //         }
        //     }
        // });



    });
}

CargarDatos();