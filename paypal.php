<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<div id="paypal-button-container"></div>

<script src="https://www.paypal.com/sdk/js?client-id=Ac8u12LEw7fPX4B2mBVc2YqsQr9AtTGWX6HLoD30Nf6wyKDjoA_PlBN7Pe5OO18-t46mvOMqBF2usgJa"></script>

<script>
    paypal.Buttons({
        style:{
            color:'blue',
            shape:'pill',
            label:'pay'
        },
        createOrder: function(data,actions){
            return actions.order.create({
                purchase_units:[{ 
                    amount: {
                        value: 100
                    }
                }]
            });
        },

        onApprove: function(data, actions){
            actions.order.capture().then(function(detalles){
                //redirection
            });
        },

        onCancel: function(data){
            alert("Pago Cancelado");
        }
    }).render('#paypal-button-container')
</script>

</body>
</html>