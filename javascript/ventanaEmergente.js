// Obtener todos los contenedores de imágenes
//comentario de imagen arriba
const imagenContainers = document.querySelectorAll('.imagen__producto-container');

// Agregar eventos para mostrar y ocultar la descripción emergente
imagenContainers.forEach((container) => {
    let descripcionEmergente = container.querySelector('.descripcion-emergente');
    container.onmouseover = () => {
        descripcionEmergente.style.display = 'block';
    };
    container.onmouseout = () => {
        descripcionEmergente.style.display = 'none';
    };
});