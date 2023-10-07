
document.querySelectorAll("#Producto1").forEach(informacion => {
    informacion.addEventListener("click", yuca);
});

document.querySelectorAll("#Producto2").forEach(informacion => {
    informacion.addEventListener("click", Platano);
})
document.querySelectorAll("#Producto3").forEach(informacion => {
    informacion.addEventListener("click", auyama);
})

document.querySelectorAll("#Producto4").forEach(informacion => {
    informacion.addEventListener("click", limon);
})

document.querySelectorAll("#Producto5").forEach(informacion => {
    informacion.addEventListener("click", ñame);
})

document.querySelectorAll("#Producto6").forEach(informacion => {
    informacion.addEventListener("click", guayaba);
})



function yuca(){

    let codigo = "1"

    console.log("codigo "+codigo)
    location.href = "../page/productos.php?codigo="+codigo;
}

function Platano(){
  
     let codigo = "3"

    console.log("codigo "+codigo)
    location.href = "../page/productos.php?codigo="+codigo;
 }
 function auyama(){

     let codigo = "4"

    console.log("codigo "+codigo)
    location.href = "../page/productos.php?codigo="+codigo;
 }
 function limon(){
   
     let codigo = "6"

    console.log("codigo "+codigo)
    location.href = "../page/productos.php?codigo="+codigo;
 }
 function ñame(){
   
     let codigo = "7"

    console.log("codigo "+codigo)
    location.href = "../page/productos.php?codigo="+codigo;
 }
 function guayaba(){

     let codigo = "8"

    console.log("codigo "+codigo)
    location.href = "../page/productos.php?codigo="+codigo;
 }

