boton.addEventListener("click", seleccionarProductos)

var productosagregados = []

function seleccionarProductos(){

    const producto = {
        titulo : document.getElementById("titulo-info-producto").textContent,
        precio : document.getElementById("precio-producto").textContent,
    }

    productosagregados.push(producto)


    console.log(producto)

    let divPadre = document.getElementById("contenido-carrito");
    let carrito = document.getElementById("carrito")
    let imagen = document.getElementById("imagen-carrito")
    let divhijo = document.createElement("div")
    let texto = document.createElement("p")
    let texto2 = document.createElement("p")
    let img = document.createElement("img")

    divhijo.id = "divhijo"
    carrito.style.width = "300px"
    carrito.style.backgroundColor = "white"
    carrito.style.position = "absolute"
    carrito.style.right = "0px"
    carrito.style.top = "35px "
    texto.innerHTML = producto.titulo
    texto2.innerHTML = producto.precio
    img.src = "/img/servicios/x.png"
    img.style.width = "33px"
    carrito.style.display = "flex"

    
    
    
    divhijo.appendChild(texto)
    divhijo.appendChild(texto2)
    imagen.appendChild(img)
    divPadre.appendChild(divhijo)
    carrito.appendChild(divPadre)

}


document.getElementById("div-carrito").addEventListener("click", carrito)




function carrito(event){

    

    for(let i=0 ; i<productosagregados.length ; i++){

        let titulo = productosagregados[i].titulo
        let precio = productosagregados[i].precio

    
    let divPadre = document.getElementById("contenido-carrito");
    let divhijo = document.createElement("div")
    let texto = document.createElement("p")
    let texto2 = document.createElement("p")

    divhijo.id = "divhijo"
    divPadre.style.width = "300px"
    divPadre.style.backgroundColor = "white"
    divPadre.style.position = "absolute"
    divPadre.style.right = "0px"
    divPadre.style.top = "35px "
    texto.innerHTML = titulo
    texto2.innerHTML = precio

    
    
    divhijo.appendChild(texto)
    divhijo.appendChild(texto2)
    divPadre.appendChild(divhijo)

    event.target.removeEventListener(event.type, carrito)
}
}
















































/*document.getElementById("contenedor-carrito").addEventListener("click",abrircarrito)
document.getElementById("contenedor-carrito").addEventListener("click",eliminarcarrito) 

function abrircarrito(borra){

    borra.target.removeEventListener(borra.type, abrircarrito);

    if(array == ""){
        let divPadre = document.getElementById("contenedor-carrito")
        let divinfo = document.createElement("div")
        let texto = document.createElement("p")

        divinfo.style.width = "300px"
        divinfo.style.height = "300px"
        divinfo.style.backgroundColor = "white"
        divinfo.style.position = "absolute"
        divinfo.style.top = "35px"
        divinfo.style.right = "0px"
        divinfo.style.borderRadius = "12px"
        divinfo.id = "div-info"
        texto.innerHTML = "No hay productos agregados"

        divinfo.appendChild(texto)
        divPadre.appendChild(divinfo)
    }

else{
   
   
    let divPadre = document.getElementById("contenedor-carrito")
    let divinfo = document.createElement("div")

        divinfo.style.width = "300px"
        divinfo.style.height = "300px"
        divinfo.style.backgroundColor = "red"
        divinfo.style.position = "absolute"
        divinfo.style.top = "35px"
        divinfo.style.right = "0px"
        divinfo.style.borderRadius = "12px"

        divPadre.appendChild(divinfo)
}
    }
        
/*
    function eliminarcarrito(){

        document.getElementById("contenedor-carrito").addEventListener("click",abrircarrito)
        const divPadre = document.getElementById("contenedor-carrito");
        const divinfo = document.getElementById("div-info");
      
        divPadre.removeChild(divinfo)
      }
      
*/