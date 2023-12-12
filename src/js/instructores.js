(function () {
  const instructoresInput = document.querySelector("#instructores");

  if (instructoresInput) {
    let instructores = [];
    let instructoresFiltrados = [];

    const listadoInstructores = document.querySelector("#listado-instructores");
    const instructorHidden = document.querySelector('[name="instructor_id"]');

    obtenerInstructores();

    instructoresInput.addEventListener("input", buscarInstructores);

    if (instructorHidden.value) {
      (async () => {
        const instructor = await obtenerInstructor(instructorHidden.value);
        //Insertar en el html
        const InstructorDOM = document.createElement("LI");
        InstructorDOM.classList.add(
          "listado-instructores__instructor",
          "listado-instructores__instructor--seleccionado"
        );
        InstructorDOM.textContent = `${instructor.nombre} ${instructor.apellido}`;

        listadoInstructores.appendChild(InstructorDOM);
      })();
    }

    async function obtenerInstructores() {
      const url = `/api/instructores`;
      const respuesta = await fetch(url);
      const resultado = await respuesta.json();
      formatearInstructores(resultado);
    }

    async function obtenerInstructor(id) {
      const url = `/api/instructor?id=${id}`;
      const respuesta = await fetch(url);
      const resultado = await respuesta.json();
      return resultado;
    }

    function formatearInstructores(arrayInstructores = []) {
      instructores = arrayInstructores.map((instructor) => {
        return {
          nombre: `${instructor.nombre.trim()} ${instructor.apellido.trim()}`,
          id: instructor.id,
        };
      });
    }
    function buscarInstructores(e) {
      const busqueda = e.target.value;

      if (busqueda.length > 3) {
        const expresion = new RegExp(
          busqueda.normalize("NFD").replace(/[\u0300-\u036f]/g, ""),
          "i"
        );
        instructoresFiltrados = instructores.filter((instructor) => {
          if (
            instructor.nombre
              .normalize("NFD")
              .replace(/[\u0300-\u036f]/g, "")
              .toLowerCase()
              .search(expresion) != -1
          ) {
            return instructor;
          }
        });
      } else {
        instructoresFiltrados = [];
      }

      mostrarInstructores();
    }

    function mostrarInstructores() {
      while (listadoInstructores.firstChild) {
        listadoInstructores.removeChild(listadoInstructores.firstChild);
      }

      if (instructoresFiltrados.length > 0) {
        instructoresFiltrados.forEach((instructor) => {
          const instructorHTML = document.createElement("LI");
          instructorHTML.classList.add("listado-instructores__instructor");
          instructorHTML.textContent = instructor.nombre;
          instructorHTML.dataset.instructorId = instructor.id;
          instructorHTML.onclick = seleccionarInstructor;

          //Agregar al DOM
          listadoInstructores.appendChild(instructorHTML);
        });
      } else {
        const noResultados = document.createElement("P");
        noResultados.classList.add("listado-instructores__no-resultados");
        noResultados.textContent = "No hay resultados para tu busqueda";
        listadoInstructores.appendChild(noResultados);
      }
    }
    function seleccionarInstructor(e) {
      const instructor = e.target;

      //remover la clase previa
      const instructorPrevio = document.querySelector(
        ".listado-instructores__instructor--seleccionado"
      );
      if (instructorPrevio) {
        instructorPrevio.classList.remove(
          "listado-instructores__instructor--seleccionado"
        );
      }

      instructor.classList.add(
        "listado-instructores__instructor--seleccionado"
      );

      instructorHidden.value = instructor.dataset.instructorId;
    }
  }
})();
