document.addEventListener("keyup", (e) => {
  if (e.target.matches("#buscador")) {
    document.querySelectorAll(".articulo").forEach((tuberculos) => {
      const textoProducto = tuberculos.querySelector("h3").textContent.toLowerCase();
      if (textoProducto.includes(e.target.value.toLowerCase())) {
        tuberculos.classList.remove("filtro");
      } else {
        tuberculos.classList.add("filtro");
      }
    });
  }
});