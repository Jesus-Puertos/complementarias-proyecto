import Swal from "sweetalert2";
(function () {
  let eventos = [];
  const resumen = document.querySelector("#registro-resumen");
  if (resumen) {
    const eventosBoton = document.querySelectorAll(".evento__agregar");
    eventosBoton.forEach((boton) =>
      boton.addEventListener("click", seleccionarEvento)
    );

    const formulario = document.querySelector("#registro");
    formulario.addEventListener("submit", submitFormulario);

    mostrarEventos();

    function seleccionarEvento({ target }) {
      if (eventos.length <= 0) {
        //Desabilitar evento
        target.disabled = true;
        eventos = [
          ...eventos,
          {
            id: target.dataset.id,
            titulo: target.parentElement
              .querySelector(".evento__nombre")
              .textContent.trim(),
          },
        ];

        mostrarEventos();
      } else {
        Swal.fire({
          title: "Error",
          text: "Solo puedes seleccionar una complementaria",
          icon: "error",
          confirmButtonText: "Aceptar",
          confirmButtonColor: "#007df4",
        });
      }
    }

    function mostrarEventos() {
      //LIMPIAR EVENTOS
      limpiarEventos();

      if (eventos.length > 0) {
        eventos.forEach((evento) => {
          const eventoDOM = document.createElement("DIV");
          eventoDOM.classList.add("registor__evento");

          const titulo = document.createElement("H3");
          titulo.classList.add("registro__nombre");
          titulo.textContent = evento.titulo;

          const botonEliminar = document.createElement("BUTTON");
          botonEliminar.classList.add("registro__eliminar");
          botonEliminar.innerHTML = `<i class="fa-solid fa-trash"></i> Eliminar`;
          botonEliminar.onclick = function () {
            eliminarEvento(evento.id);
          };

          //renderizar HTML
          eventoDOM.appendChild(titulo);
          eventoDOM.appendChild(botonEliminar);
          resumen.appendChild(eventoDOM);
        });
      } else {
        const noRegistro = document.createElement("P");
        noRegistro.textContent =
          "No has seleccionado ninguna complementaria, selecciona una complementaria para poder registrarte";
        noRegistro.classList.add("registro__texto");
        resumen.appendChild(noRegistro);
      }
    }
    function eliminarEvento(id) {
      Swal.fire({
        title: "¿Estás seguro?",
        text: "No podrás revertir esta acción",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Sí, eliminar",
        cancelButtonText: "Cancelar",
      }).then((result) => {
        if (result.isConfirmed) {
          eventos = eventos.filter((evento) => evento.id !== id);
          const botonAgregar = document.querySelector(`[data-id="${id}"]`);
          botonAgregar.disabled = false;
          mostrarEventos();
          Swal.fire(
            "Eliminado",
            "La complementaria ha sido eliminada.",
            "success"
          );
        }
      });
    }
    function limpiarEventos() {
      while (resumen.firstChild) {
        resumen.removeChild(resumen.firstChild);
      }
    }

    async function submitFormulario(e) {
      e.preventDefault();
      //Validar formulario
      const eventosId = eventos.map((evento) => evento.id);
      if (eventosId.length === 0) {
        Swal.fire({
          title: "Error",
          text: "Debes seleccionar una complementaria",
          icon: "error",
          confirmButtonText: "Aceptar",
          confirmButtonColor: "#007df4",
        });
        return;
      }

      // Objeto de formdata
      const datos = new FormData();
      datos.append("eventos", eventosId);

      const url = "/finalizar-registro/complementarias";
      const respuesta = await fetch(url, {
        method: "POST",
        body: datos,
      });
      const resultado = await respuesta.json();

      if (resultado.resultado) {
        Swal.fire(
          "Registro exitoso",
          "Te has registrado correctamente a la complementaria",
          "success"
        ).then(() => (location.href = `/boleto?id=${resultado.token}`));
      } else {
        Swal.fire({
          title: "Error",
          text: "Hubo un error al registrarte a la complementaria",
          icon: "error",
          confirmButtonText: "Aceptar",
          confirmButtonColor: "#007df4",
        }).then(() => location.reload());
      }
    }
  }
})();
