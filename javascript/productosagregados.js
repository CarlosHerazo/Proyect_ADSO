boton.addEventListener("click", seleccionarProductos)

var productosagregados = []

function seleccionarProductos(){

    const producto = {
        titulo : document.getElementById("titulo-info-producto").textContent,
        precio : document.getElementById("precio-producto").textContent,
        imagen : document.getElementById("producto-info").getAttribute("src"),
    }

    productosagregados.push(producto)

    
/*
    console.log(producto)

    let divhijo = document.getElementById("lista-carrito")
    let texto = document.createElement("p")
    let texto2 = document.createElement("p")
    let imagenDelete = document.createElement("div")
    let div = document.createElement("div")

    texto.innerHTML = producto.titulo
    texto2.innerHTML = producto.precio
    imagenDelete.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#000000}</style><path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg>'
    div.style.display = "flex"    
    imagenDelete.id = "hola"

    
    
    div.appendChild(texto)
    div.appendChild(texto2)
    div.appendChild(imagenDelete)
    divhijo.appendChild(div)    
    
*/
}

/*
document.getElementById("div-carrito").addEventListener("click", carrito)


function carrito(){



    for(let i=0 ; i<productosagregados.length ; i++){

        let titulo = productosagregados[i].titulo
        let precio = productosagregados[i].precio
        let imagen = productosagregados[i].imagen
    
    const main = document.querySelector(".main");
    let divPadre = document.getElementById("contenido-carrito")
    let divhijo = document.getElementById("lista-carrito")
    let texto = document.createElement("p")
    let texto2 = document.createElement("p")
    let imagen1 = document.createElement("img")
    let select = document.createElement("select")
    let op1 = document.createElement("option")
    let op2 = document.createElement("option")
    let op3 = document.createElement("option")
    let div5 = document.createElement("div")
    let div4 = document.createElement("div")
    let div3 = document.createElement("div")
    let div2= document.createElement("div")
    let div = document.createElement("div")
    let img = document.createElement("p")

    img.id=i
    img.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" id='+i+' class="eliminar" onclick = borrar(this.id) height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>.eliminar{fill:#000000}</style><path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"  /></svg>'
    div2.setAttribute("id", i)  
    div2.className = "delete" 
    texto.innerHTML = titulo
    texto2.innerHTML = precio
    texto.style.margin = "10px"
    texto.style.fontSize = "25px"
    texto.style.color = "black"
    texto.style.fontWeight = "bold"
    texto2.style.margin = "10px"
    texto2.style.color = "black"
    imagen1.src = imagen
    imagen1.style.width = "150px"
    select.id = "select-carrito"
    op1.value = 1
    op2.value = 2
    op3.value = 3
    op1.innerHTML = "1"
    op2.innerHTML = "2"
    op3.innerHTML = "3"
    div5.style.display = "flex"
    div5.style.alignItems = "center"
    div4.style.marginLeft = "20px"
    div4.style.width = "300px"
    div.style.display = "flex" 
    div.style.justifyContent = "center"
    div.style.marginBottom = "30px"
    div.id = i
    divPadre.style.display = "block"
    main.style.filter = "blur(5px)";

    select.appendChild(op1)
    select.appendChild(op2)
    select.appendChild(op3)

    div2.appendChild(img)    
    div5.appendChild(select)
    div5.appendChild(div2)
    div3.appendChild(imagen1) 
    div4.appendChild(texto)
    div4.appendChild(texto2)   
    div.appendChild(div3)
    div.appendChild(div4)
    div4.appendChild(div5)
    //div.appendChild(div2)
    divhijo.appendChild(div)   
    
}
}
function borrar(botonid){
    productosagregados.splice(botonid, 1)
    totalClicks--
    contador.textContent = totalClicks;
    ContenedorCarrito.appendChild(contador);


    // Selecciona el elemento padre que contiene los productos agregados
    let contenedorCarrito = document.getElementById("lista-carrito");
    let divPadreCarrito = document.getElementById("contenido-carrito");

    // Intenta encontrar el elemento hijo que coincide con el ID proporcionado por el parámetro
    let productoAQuitar = document.getElementById(botonid);

    // Verifica si se encontró el elemento antes de intentar eliminarlo
    if (productoAQuitar) {
        // Si hay solo un hijo en el contenedor, elimina también el contenedor
        if (productoAQuitar) {
            // Si hay solo un hijo en el contenedor, elimina también el contenedor
            if (contenedorCarrito.children.length === 1) {
                divPadreCarrito.parentNode.removeChild(divPadreCarrito);
                const main = document.querySelector(".main");
                main.style.filter = "blur(0px)";
            } else {
                contenedorCarrito.removeChild(productoAQuitar);
            }
    }
}
}

document.getElementById("borrar-carrito").addEventListener("click", function eliminarVentanaEmergente(){
   
    const main = document.querySelector(".main");
    let divPadre = document.getElementById("contenido-carrito")
    
    
    divPadre.style.display = "none"
    main.style.filter = "blur(0px)";


}
)

/**logica del boton "ir al carrito"



document.getElementById("boton-ir-carrito").addEventListener("click", function enviardatos(){
    let agregados = productosagregados;
    window.location = "/page/carrito.html?productos ="+agregados;
})





/** 

function productosagregados(){

    alert("hola")   

    let texto = document.createElement("p");
    let divpadre = document.getElementById("Producto1");

    texto.innerText ="hola mundo"

    divpadre.appendChild(texto)



   for(i=0; i<productosagregados.length; i++){

       let divpadre = document.getElementById("Producto1");
       let nombreproducto = productosagregados[i].titulo;
       let texto = document.createElement("p");


       texto.appendChild(nombreproducto);
       divpadre.appendChild(texto);
   }
}


*/














































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