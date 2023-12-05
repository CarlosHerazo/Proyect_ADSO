function increment(productId, id) {
            var cantidadElemento = document.getElementById('cantidad_' + productId);
            var cantidad = parseInt(cantidadElemento.textContent);
            let cant = cantidadElemento.textContent = cantidad + 1;
            enviarDatos(productId, cant, id);
            
        }

        function decrement(productId, id) {
            var cantidadElemento = document.getElementById('cantidad_' + productId);
            var cantidad = parseInt(cantidadElemento.textContent);
            if (cantidad > 1) {
                let cant = cantidadElemento.textContent = cantidad - 1;
                
                enviarDatos(productId, cant, id);
                
            }
        }

        function enviarDatos(productId, cant, id) {

            var myHeaders = new Headers();
            myHeaders.append("Cookie", "PHPSESSID=64lsvf56ldb8ib5mh1971mma00");

            var formdata = new FormData();
            formdata.append("action", "agregar");
            formdata.append("id", productId);
            formdata.append("cantidad", cant);
            formdata.append("product_id", id);


            var requestOptions = {
                method: 'POST',
                headers: myHeaders,
                body: formdata,
                redirect: 'follow'
            };

            fetch("../ajax/actualizarCarrito.php", requestOptions)
                .then(response => response.text())
                .then(result => {
                    location.reload();
                    let sub = JSON.parse(result).sub
                })


        }