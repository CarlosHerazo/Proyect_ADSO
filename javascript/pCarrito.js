function increment(productId, id, cantidadId) {
    var cantidadElemento = document.getElementById('cantidad_' + productId);
    var cantidad = parseInt(cantidadElemento.textContent);

    if (cantidad < cantidadId) {
        let cant = cantidadElemento.textContent = cantidad + 1;
        enviarDatos(productId, cant, id);
        console.log("Aumento")
    } else {

        Swal.fire({
            title: '¡Upss!',
            text: 'Límite máximo disponible',
            showConfirmButton: false,  // Oculta el botón de confirmación
            timer: 2000,  // Especifica la duración en milisegundos (en este caso, 2000 ms o 2 segundos)
            position: 'top-end'
        });

    }


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


var elementosDeshabilitados = document.querySelectorAll('.disabled');


elementosDeshabilitados.forEach(function (elemento) {
    elemento.style.pointerEvents = 'none';
});
