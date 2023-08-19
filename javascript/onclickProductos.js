/*document.getElementById("Producto1").addEventListener("click", function(){
    let barra = document.getElementById("barra1")
    barra.style.background = "#72421E";
})
document.getElementById("Producto2").addEventListener("click", function(){
    let barra = document.getElementById("barra2")
    barra.style.background = "green";
})
document.getElementById("Producto3").addEventListener("click", function(){
    let barra = document.getElementById("barra3")
    barra.style.background = "black";
})
document.getElementById("Producto4").addEventListener("click", function(){
    let barra = document.getElementById("barra4")
    barra.style.background = "black";
})
document.getElementById("Producto5").addEventListener("click", function(){
    let barra = document.getElementById("barra5")
    barra.style.background = "black";
})
document.getElementById("Producto6").addEventListener("click", function(){
    let barra = document.getElementById("barra4")
    barra.style.background = "black";
})*/




document.getElementById("Producto1").addEventListener("click", yuca)
document.getElementById("Producto2").addEventListener("click", Platano)
document.getElementById("Producto3").addEventListener("click", auyama)
document.getElementById("Producto4").addEventListener("click", limon)
document.getElementById("Producto5").addEventListener("click", ñame)
document.getElementById("Producto6").addEventListener("click", guayaba)


function yuca(){
    let id = document.getElementsByClassName("producto-info")
    let titulo = document.getElementById("titulo-info-producto")
    let imagen = document.getElementById("producto-info")
    let textoInfo = document.getElementById("Texto-info-producto")
    let precio = document.getElementById("precio-producto")

    id.id = "producto1"
    titulo.innerHTML="Yuca"
    imagen.src = "/img/Productos/yuca (1).jpg"
    textoInfo.innerHTML="La yuca es un tubérculo del arbusto Manihot Esculenta, de aspecto leñoso por fuera, ya que está recubierto por una cáscara de gran dureza y de color marrón que no es comestible. Esta consistencia firme también se encuentra en su pulpa, de color blanco y que presenta fibras longitudinales."
    precio.innerHTML = "Precio por Unidad: $400 - Aplica para personas de la misma localidad <br> Precio por Bulto: $450"

    textoInfo.style.marginTop = "50px"
    precio.style.marginTop = "40px"
    precio.style.marginBottom = "60px"

}

function Platano(){
    let id = document.getElementsByClassName("producto-info")
    let titulo = document.getElementById("titulo-info-producto")
     let imagen = document.getElementById("producto-info")
     let textoInfo = document.getElementById("Texto-info-producto")
     let precio = document.getElementById("precio-producto")
     id.id = "producto2"
     titulo.innerHTML="Plátano verde"
     imagen.src = "/img/Productos/descarga.jfif"
     textoInfo.innerHTML="El plátano que ofrecemos es de la más alta calidad y frescura garantizada. Cada fruto de plátano es cuidadosamente seleccionado y cultivado en nuestras tierras, utilizando métodos sostenibles y respetuosos con el medio ambiente."
     precio.innerHTML = "Precio por Unidad: $500 - Aplica para personas de la misma localidad <br>  Precio por Bulto: $50,000 "
 
     textoInfo.style.marginTop = "50px"
     precio.style.marginTop = "40px"
     precio.style.marginBottom = "60px"
 }
 function auyama(){
    let id = document.getElementsByClassName("producto-info")
    let titulo = document.getElementById("titulo-info-producto")
     let imagen = document.getElementById("producto-info")
     let textoInfo = document.getElementById("Texto-info-producto")
     let precio = document.getElementById("precio-producto")
     id.id = "producto3"
     titulo.innerHTML="Auyama"
     imagen.src = "/img/Productos/istockphoto-471688238-612x612.jpg"
     textoInfo.innerHTML= "La auyama o ahuyama (ambas formas son correctas según la Real Academia de la Lengua Española-RAE) es uno de los alimentos con múltiples beneficios para el organismo. Este vegetal contiene calcio, sodio, magnesio, zinc, hierro, potasio, fósforo, vitaminas A, C y B."
     precio.innerHTML = "Precio por Unidad: $400 - Aplica para personas de la misma localidad <br> Precio por Bulto: $450"
 
     textoInfo.style.marginTop = "50px"
     precio.style.marginTop = "40px"
     precio.style.marginBottom = "60px"
 }
 function limon(){
    let id = document.getElementsByClassName("producto-info")
    let titulo = document.getElementById("titulo-info-producto")
     let imagen = document.getElementById("producto-info")
     let textoInfo = document.getElementById("Texto-info-producto")
     let precio = document.getElementById("precio-producto")
     id.id = "producto4"
     titulo.innerHTML="Limon"
     imagen.src = "/img/Productos/limón criollo.jpg"
     textoInfo.innerHTML="El limón es redondo y ligeramente alargado, pertenece a la familia de los agrios y por tanto comparte muchas de las características de otras especies de cítricos, como es tener una piel gruesa. La pulpa es color amarillo pálido, jugosa y de sabor ácido dividida en gajos. El color de la corteza es amarillo y especialmente brillante cuando está maduro."
     precio.innerHTML = "Precio por Unidad: $400 - Aplica para personas de la misma localidad <br> Precio por Bulto: $450"
 
     textoInfo.style.marginTop = "50px"
     precio.style.marginTop = "40px"
     precio.style.marginBottom = "60px"
 }
 function ñame(){
    let id = document.getElementsByClassName("producto-info")
    let titulo = document.getElementById("titulo-info-producto")
     let imagen = document.getElementById("producto-info")
     let textoInfo = document.getElementById("Texto-info-producto")
     let precio = document.getElementById("precio-producto")
     id.id = "producto5"
     titulo.innerHTML="Ñame"
     imagen.src = "/img/Productos/vegetales-dieta_vegetariana-nutricion_421718519_132322710_1706x960.jpg"
     textoInfo.innerHTML="Los ñames son tubérculos almidonados de origen africano que son un alimento básico en América del Sur, África, las Antillas y las Islas del Pacífico. Además, es un alimento popular en las Islas Canarias, donde además existen plantaciones. A pesar de su contenido en almidón, el ñame tiene un bajo índice glucémico pues aporta carbohidratos complejos y fibra dietética."
     precio.innerHTML = "Precio por Unidad: $400 - Aplica para personas de la misma localidad <br> Precio por Bulto: $450"
 
     textoInfo.style.marginTop = "50px"
     precio.style.marginTop = "40px"
     precio.style.marginBottom = "60px"
 }
 function guayaba(){
    let id = document.getElementsByClassName("producto-info")
    let titulo = document.getElementById("titulo-info-producto")
     let imagen = document.getElementById("producto-info")
     let textoInfo = document.getElementById("Texto-info-producto")
     let precio = document.getElementById("precio-producto")
     id.id = "producto6"
     titulo.innerHTML="Guayaba"
     imagen.src = "/img/Productos/NUTE7EOPZVG4TBLG5EXKA5GAIA.avif"
     textoInfo.innerHTML="Con el nombre científico de Psydium guajava se conoce el fruto del árbol guayabo. Este es originario de México, Brasil y el Perú; pero hoy en día se cultiva en países de clima tropical alrededor del mundo. Por este motivo, en zonas como América Central, India, Bangladés, Indonesia o China es muy conocida y consumida de forma habitual. La planta no solo se valora como alimento, sino que también cuenta con una larga historia de usos tradicionales como remedio natural para diversas condiciones de salud."
     precio.innerHTML = "Precio por Unidad: $400 - Aplica para personas de la misma localidad <br> Precio por Bulto: $450"
 
     textoInfo.style.marginTop = "50px"
     precio.style.marginTop = "40px"
     precio.style.marginBottom = "60px"
 }

