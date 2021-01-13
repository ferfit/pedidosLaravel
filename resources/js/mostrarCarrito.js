// variables
const carrito = document.querySelector("#carrito-icono ");


// Evento que se dispara cuando se hace scroll
window.addEventListener("scroll", function () {
  var posicion = window.scrollY;
  
  carrito.classList.remove("mostrarCarrito");
  // Muestra el carrito según la posición en la pantalla
  if (posicion > 600) {
    carrito.classList.add("mostrarCarrito");
  }

});
