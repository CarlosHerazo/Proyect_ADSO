
document.addEventListener("DOMContentLoaded", function() {
let total = document.getElementById('paypal-button-container').getAttribute('data-total')
   
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
                            value: total
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
        }).render('#paypal-button-container');
});