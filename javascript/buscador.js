// Obtén referencia al input de búsqueda
const filtroInput = document.getElementById('buscador');

// Agrega un evento de escucha para detectar cambios en el input
filtroInput.addEventListener('input', () => {
    // Obtén el valor actual del input y conviértelo a minúsculas para una búsqueda insensible a mayúsculas
    const filtroTexto = filtroInput.value.toLowerCase();

    // Obtén todos los elementos de producto
    const productos = document.querySelectorAll('.articulo');

    // Itera sobre los productos y muestra/oculta según coincidan con el filtro
    productos.forEach(producto => {
        const nombreProducto = producto.querySelector('span').textContent.toLowerCase();
        if (nombreProducto.includes(filtroTexto)) {
            producto.style.display = 'block';
        } else {
            producto.style.display = 'none'; 
        }
    });
});