let totalNumero = (document.getElementById("totalPagar").getAttribute('data-total'));
// Eliminar la coma como separador de miles
var totalSinComas = totalNumero.replace(/,/g, '');

let total =  parseFloat(totalSinComas);
console.log(total);
paypal.Buttons({
    style: {
        color: 'blue',
        shape: 'pill',
        label: 'pay'
    },
    createOrder: function(data, actions) {
        return actions.order.create({
            purchase_units: [{
                amount: {
                    value:  total
                }
            }]
        });
    },

    onApprove: function(data, actions) {
        actions.order.capture().then(function(detalles) {
            if (data) {
                let url = '../checkout/captura_paypal.php';
                fetch(url, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({
                            detalles: detalles
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        // Manejar la respuesta del servidor
                        console.log(data);

                        Swal.fire({
                            title: "El Pago fue exitoso!",
                            text: "Gracias por su compra",
                            icon: "success"
                        });
                    })
                    .catch(error => {
                        // Manejar errores de la solicitud
                        console.error('Error en la solicitud:', error);
                    });
            }
        });
    },


    onCancel: function(data) {
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "TU PAGO FUE CANCELADO!",
            footer: '<a href="../index.php">Regrese al inicio</a>'
        })
    }
}).render('#paypal-button-container')