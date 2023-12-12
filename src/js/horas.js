(function () {
  const horas = document.querySelector("#horas");

  if (horas) {
    const categoria = document.querySelector('[name="categoria_id"]');
    const dias = document.querySelectorAll('[name="dia"]');
    const inputHiddenDia = document.querySelector('[name="dia_id"]');
    const inputHiddenHora = document.querySelector('[name="hora_id"]');

    categoria.addEventListener("change", terminoBusqueda);
    dias.forEach((dia) => dia.addEventListener("change", terminoBusqueda));

    let busqueda = {
      categoria_id: +categoria.value || "",
      dia: +inputHiddenDia.value || "",
    };

    if (!Object.values(busqueda).includes("")) {
      (async () => {
        await buscarEventos();

        //resaltar la hora actual
        const horaSeleccionada = document.querySelector(
          `[data-hora-id="${inputHiddenHora.value}"]`
        );

        horaSeleccionada.classList.remove("horas__hora--desabilitada");
        horaSeleccionada.classList.add("horas__hora--seleccionada");

        horaSeleccionada.onclik = seleccionarHora;
      })();
    }

    function terminoBusqueda(e) {
      busqueda[e.target.name] = e.target.value;

      //Reiniciar los campos ocultos y el selector de horas
      inputHiddenHora.value = "";
      inputHiddenDia.value = "";

      const horaPrevia = document.querySelector(".horas__hora--seleccionada");
      if (horaPrevia) {
        horaPrevia.classList.remove("horas__hora--seleccionada");
      }

      if (Object.values(busqueda).includes("")) {
        return;
      }

      buscarEventos();
    }

    async function buscarEventos() {
      const { dia, categoria_id } = busqueda;

      const url = `/api/complementarias-horario?dia_id=${dia}&categoria_id=${categoria_id}`;

      const resultado = await fetch(url);
      const eventos = await resultado.json();

      obtenerHorasDisponibles(eventos);
    }

    function obtenerHorasDisponibles(eventos) {
      // Reiniciar las horas
      const listadoHoras = document.querySelectorAll("#horas li");
      listadoHoras.forEach((li) =>
        li.classList.remove("horas__hora--desabilitada")
      );

      const horasDisponibles = document.querySelectorAll(
        "#horas li:not(.horas__hora--desabilitada)"
      );
      horasDisponibles.forEach((hora) =>
        hora.addEventListener("click", seleccionarHora)
      );
    }

    function seleccionarHora(e) {
      //Desabilitar hora previa si hay un nuevo click
      const horaPrevia = document.querySelector(".horas__hora--seleccionada");
      if (horaPrevia) {
        horaPrevia.classList.remove("horas__hora--seleccionada");
      }
      // Agregar clase de seleccionado
      e.target.classList.add("horas__hora--seleccionada");

      inputHiddenHora.value = e.target.dataset.horaId;

      //Llenar el campo oculto con del dia
      inputHiddenDia.value = document.querySelector(
        '[name="dia"]:checked'
      ).value;
    }
  }
})();
