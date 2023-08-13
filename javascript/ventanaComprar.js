/*Creacion de la ventana emergente de agregar al carrito*/ 

let boton = document.querySelector("#comprar"); 
const fondoDesenfocado = document.querySelector("body");
const main = document.querySelector(".main")

boton.addEventListener("click", () => {
    let ventanaEmergente = document.querySelector(".ventanaEmergente");
    ventanaEmergente.style.display = "block"; 
    main.style.filter = "blur(5px)";
    document.body.style.overflow = "hidden"; // Evita el desplazamiento mientras la ventana emergente está abierta

    // Retraso mínimo para activar la transición
    setTimeout(() => {
        ventanaEmergente.classList.add("mostrar");
        main.classList.add("main");
    }, 10);
})


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
