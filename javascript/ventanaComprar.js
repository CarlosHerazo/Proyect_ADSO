/*Creacion de la ventana emergente de agregar al carrito*/ 

const botonesComprar = document.querySelectorAll("#comprar");
const ventanaEmergente = document.querySelector(".ventanaEmergente");
const main = document.querySelector(".main");

botonesComprar.forEach(boton => {
    boton.addEventListener("click", () => {
        ventanaEmergente.style.display = "block";
        main.style.filter = "blur(5px)";

        setTimeout(() => {
            ventanaEmergente.classList.add("mostrar");
            main.classList.add("main");
        }, 10);
    });
});


/*Quitar ventana emergente*/ 
/*seleccionar el icono de la ventana Emergente*/ 
let icono =  document.querySelector(".icono__ventanaEmergente");

icono.addEventListener("click", () => {
    let ventanaEmergente = document.querySelector(".ventanaEmergente");
    ventanaEmergente.classList.remove("mostrar");
    main.style.filter = "blur(0px)"
    document.body.style.overflow = "auto"; // desplazamiento mientras la ventana emergente está cerrada


    // Retraso para dar tiempo a la transición antes de ocultar la ventana
    setTimeout(() => {
        ventanaEmergente.style.display = "none";
        main.style.overflow = "auto"
    }, 500); // Igual a la duración de la transición en CSS
    
})

//-------------------------------Fin del codigo de la ventana de agregar bultos-----------//


let boton = document.querySelector('.Boton_ventanaEmergente');
let ContenedorCarrito = document.querySelector('.contenedor-carrito');
let contador = document.getElementById("contador");

// Inicializamos el contador

    let totalClicks = 0;

    boton.addEventListener("click", () => {
        // Incrementar el contador y actualizar el elemento
        totalClicks++;
        contador.textContent = totalClicks;
        ContenedorCarrito.appendChild(contador);
        contador.style.display = "block";
        let ventanaEmergente = document.querySelector(".ventanaEmergente");
        ventanaEmergente.classList.remove("mostrar");
        main.style.filter = "blur(0px)"
        document.body.style.overflow = "auto"; // desplazamiento mientras la ventana emergente está cerrada
        
    
        // Retraso para dar tiempo a la transición antes de ocultar la ventana
        setTimeout(() => {
            ventanaEmergente.style.display = "none";
            main.style.overflow = "auto"
        }, 500); // Igual a la duración de la transición en CSS

    });
