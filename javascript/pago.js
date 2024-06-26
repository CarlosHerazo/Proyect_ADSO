
document.addEventListener("DOMContentLoaded", function () {
    let total = document.getElementById('paypal-button-container').getAttribute('data-total')

    paypal.Buttons({
        style: {
            color: 'blue',
            shape: 'pill',
            label: 'pay'
        },
        createOrder: function (data, actions) {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: total
                    }
                }]
            });
        },

        onApprove: function (data, actions) {
            actions.order.capture().then(function (detalles) {
                if (data) {
                    let url = '../checkout/captura_paypal.php';
                    fetch(url, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({ detalles: detalles })
                    })
                        .then(data => {
                            if (data.error) {
                                console.error("Error desde el servidor:", data);
                                Swal.fire(
                                    'Error',
                                    'Hubo un problema con tu transacción: ' + data.error,
                                    'error'
                                );
                            } else {
                                console.log("Mensaje del servidor:", data);
                                console.log(detalles)
                                Swal.fire(
                                    '¡Éxito!',
                                    'Tu transacción se ha completado satisfactoriamente.',
                                    'success'
                                ).then(() => {

                                    var usuario = detalles.payer
                                    var correoUsuario = usuario.email_address

                                    console.log(usuario, correoUsuario)


                                    window.location.href = `../ticket/ticket_venta.php?id_venta=${detalles.id}&correo=${correoUsuario}`; // URL de redirección
                                    // Eliminar datos del carrito del almacenamiento local o de la sesión

                                });
                            }
                        })
                        .catch(error => {
                            console.error("Error al procesar la respuesta:", error);
                            Swal.fire(
                                'Error',
                                'Hubo un problema con tu transacción.',
                                'error'
                            );
                        });
                }
            });
        },


        onCancel: function (data) {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "TU PAGO FUE CANCELADO!",
                footer: '<a href="../index.php">Regrese al inicio</a>'
            })
        }
    }).render('#paypal-button-container');



});


