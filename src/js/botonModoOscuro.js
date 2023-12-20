//Switch
// Obtén la referencia al elemento HTML con la clase "switch"
const switchElement = document.querySelector(".barra__switch");

// Agrega un evento de escucha al hacer clic en el interruptor
switchElement.addEventListener("click", (e) => {
  // Cambia la clase "active" del interruptor y del body
  switchElement.classList.toggle("active");
  document.body.classList.toggle("active");

  // Al hacer clic en el interruptor, guarda el estado en localStorage
  if (document.body.classList.contains("active")) {
    localStorage.setItem("activeMode", "enabled");
  } else {
    localStorage.setItem("activeMode", "disabled");
  }
});

// Comprueba si el modo activo estaba habilitado previamente en localStorage
if (localStorage.getItem("activeMode") === "enabled") {
  // Si estaba habilitado, establece la clase "active" en el body y el interruptor
  switchElement.classList.add("active");
  document.body.classList.add("active");
}
