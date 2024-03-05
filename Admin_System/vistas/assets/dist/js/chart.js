const ctx = document.getElementById('myChart');
const cProductos = document.getElementById('cantidad-productos');

function CargarDatos() {
    $.ajax({
        url: 'http://localhost/Proyect_ADSO/Admin_System/controllers/controlador_grafico.php',
        type: "POST"
    }).done(function (resp) {
        var data = JSON.parse(resp);
        var titulo = [];
        var cantidad = [];

        for (let i = 0; i < data.length; i++) {
            titulo.push(data[i].nombre);
            cantidad.push(data[i].cantidad);

        }

        console.log(titulo);
        console.log(cantidad);

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: titulo,
                datasets: [{
                    label: `cantidad de productos: ${data.length}`,
                    data: cantidad,
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
    });
}

CargarDatos();