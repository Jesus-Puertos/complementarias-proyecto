addEventListener("DOMContentLoaded", () => {
  const contadores = document.querySelectorAll(".contador_cantidad");
  const velocidad = 1000;

  const animarContadores = () => {
    for (const contador of contadores) {
      const actualizar_contador = () => {
        let cantidad_maxima = +contador.dataset.cantidadTotal,
          valor_actual = +contador.innerText,
          incremento = cantidad_maxima / velocidad;

        if (valor_actual < cantidad_maxima) {
          contador.innerText = Math.ceil(valor_actual + incremento);
          setTimeout(actualizar_contador, 5);
        } else {
          contador.innerText = cantidad_maxima;
        }
      };
      actualizar_contador();
    }
  };
  const mostrarContadores = (elementos) => {
    elementos.forEach((elemento) => {
      if (elemento.isIntersecting) {
        elemento.target.classList.add("animar");
        elemento.target.classList.remove("ocultar");
        setTimeout(animarContadores, 300);
      }
    });
  };

  const observer = new IntersectionObserver(mostrarContadores, {
    threshold: 0.75, //valor de 0 a 1 que indica el porcentaje de visibilidad que debe tener el elemento para que se ejecute la funcion
  });

  const elementosHTML = document.querySelectorAll(".resumen__bloque");
  elementosHTML.forEach((elementoHTML) => {
    observer.observe(elementoHTML);
  });
});
