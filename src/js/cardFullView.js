const eventos = document.querySelectorAll(".evento__introduccion");

eventos.forEach((evento) => {
  evento.addEventListener("click", () => {
    // Si el evento ya tiene la clase activo, la removemos
    if (evento.classList.contains("evento__introduccion--activo")) {
      evento.classList.remove("evento__introduccion--activo");
    } else {
      // Remover la clase activo de todos los eventos
      eventos.forEach((e) =>
        e.classList.remove("evento__introduccion--activo")
      );

      // Añadir la clase activo al evento clickeado
      evento.classList.add("evento__introduccion--activo");
    }
  });
});
