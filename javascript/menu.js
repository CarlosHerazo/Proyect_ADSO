function undir() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}

/*function undirLupaNavegacion(){
  let counter = 0
  counter++;
  if(counter == 1){
    const divPadre = document.querySelector(".lupa-nav")
    const elementInput = document.createElement("input")
 
  elementInput.className = "icon-nav-input"
  elementInput.placeholder ="Buscar"
  elementInput.style.width = "200px"
  elementInput.style.height = "30px"
  elementInput.style.borderRadius = "15px"
  elementInput.style.borderStyle = "none"
  elementInput.style.textAlign = "center"

  divPadre.appendChild(elementInput)
  } else if(counter == 2){

    
}
  }*/

function undirLupaNavegacion() {
  const divPadre = document.querySelector(".lupa-nav");
  const elementInput = document.createElement("input");
  elementInput.className = "icon-nav-input";
  elementInput.placeholder = "Buscar";
  elementInput.style.width = "200px";
  elementInput.style.height = "30px";
  elementInput.style.borderRadius = "15px";
  elementInput.style.borderStyle = "none";
  elementInput.style.textAlign = "center";
  divPadre.appendChild(elementInput);
}
