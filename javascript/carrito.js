boton.addEventListener("click", seleccionarProductos)

var productosagregados = []

function seleccionarProductos(){

    const producto = {
        titulo : document.getElementById("titulo-info-producto").textContent,
        precio : document.getElementById("precio-producto").textContent,
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


document.getElementById("div-carrito").addEventListener("click", carrito)


function carrito(){



    for(let i=0 ; i<productosagregados.length ; i++){

        let titulo = productosagregados[i].titulo
        let precio = productosagregados[i].precio

    let divPadre = document.getElementById("contenido-carrito")
    let divhijo = document.getElementById("lista-carrito")
    let texto = document.createElement("p")
    let texto2 = document.createElement("p")
    let div2= document.createElement("div")
    let div = document.createElement("div")
    let img = document.createElement("p")

    img.id=i
    img.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" id='+i+' onclick = borrar(this.id) height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#}</style><path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"  /></svg>'
    div2.setAttribute("id", i)  
    div2.className = "delete" 
    texto.innerHTML = titulo
    texto2.innerHTML = precio
    div.style.display = "flex" 
    div.id = i
    texto.style.margin = "10px"
    texto2.style.margin = "10px"
    divPadre.style.display = "block"


    div2.appendChild(img)    
    div.appendChild(texto)
    div.appendChild(texto2)
    div.appendChild(div2)
    divhijo.appendChild(div)    
    
}
}
function borrar(botonid){
    productosagregados.splice(botonid, 1)
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