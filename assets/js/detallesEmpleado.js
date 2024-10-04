/**
 * Función para mostrar la modal de detalles del empleado
 */
async function verDetallesEmpleado(idEmpleado) {
  try {
    // Ocultar la modal si está abierta
    const existingModal = document.getElementById("detalleEmpleadoModal");
    if (existingModal) {
      const modal = bootstrap.Modal.getInstance(existingModal);
      if (modal) {
        modal.hide();
      }
      existingModal.remove(); // Eliminar la modal existente
    }

    // Buscar la Modal de Detalles
    const response = await fetch("modales/modalDetalles.php");
    if (!response.ok) {
      throw new Error("Error al cargar la modal de detalles del empleado");
    }
    // response.text() es un método en programación que se utiliza para obtener el contenido de texto de una respuesta HTTP
    const modalHTML = await response.text();

    // Crear un elemento div para almacenar el contenido de la modal
    const modalContainer = document.createElement("div");
    modalContainer.innerHTML = modalHTML;

    // Agregar la modal al documento actual
    document.body.appendChild(modalContainer);

    // Mostrar la modal
    const myModal = new bootstrap.Modal(
      modalContainer.querySelector("#detalleEmpleadoModal")
    );
    myModal.show();

    await cargarDetalleEmpleado(idEmpleado);
  } catch (error) {
    console.error(error);
  }
}

/**
 * Función para cargar y mostrar los detalles del empleado en la modal
 */
async function cargarDetalleEmpleado(idEmpleado) {

  try {

    const response = await axios.get(

      `acciones/detallesEmpleado.php?id=${idEmpleado}`

    );

    if (response.status === 200) {

      console.log(response.data);

      const {

        id,

        tipo_sujeto,

        identificador,

        nombre,

        telefono,

        sexo,

        edad,

        hectareas,

        id_solicitud,

        id_expediente,

        id_punto_cuenta,

        estatus_punto_cuenta,

        cedula,

        estado,

        municipio,

        parroquia,

        sede,

        nro_expediente,

        mes,

      } = response.data;


      const ulDetalleEmpleado = document.querySelector(

        "#detalleEmpleadoContenido ul"

      );


      ulDetalleEmpleado.innerHTML = ` 

        <li class="list-group-item"><b>ID:</b> 

          ${id ? id : "No disponible"}

        </li>

        <li class="list-group-item"><b>Tipo de sujeto:</b> 

          ${tipo_sujeto ? tipo_sujeto : "No disponible"}

        </li>

        <li class="list-group-item"><b>Identificador:</b> 

          ${identificador ? identificador : "No disponible"}

        </li>

        <li class=" list-group-item"><b>Beneficiario:</b> 

          ${nombre ? nombre : "No disponible"}

        </li>

        <li class="list-group-item"><b>Teléfono:</b> 

          ${telefono ? telefono : "No disponible"}

        </li>

        <li class="list-group-item"><b>Sexo:</b> 

          ${sexo ? sexo : "No disponible"}

        </li>

        <li class="list-group-item"><b>Edad:</b> 

          ${edad ? edad : "No disponible"}

        </li>

        <li class="list-group-item"><b>Hectáreas:</b> 

          ${hectareas ? hectareas : "No disponible"}

        </li>

        <li class="list-group-item"><b>ID de solicitud:</b> 

          ${id_solicitud ? id_solicitud : "No disponible"}

        </li>

        <li class="list-group-item"><b>ID de expediente:</b> 

          ${id_expediente ? id_expediente : "No disponible"}

        </li>

        <li class="list-group-item"><b>ID de punto de cuenta:</b> 

          ${id_punto_cuenta ? id_punto_cuenta : "No disponible"}

        </li>

        <li class="list-group-item"><b>Estatus de punto de cuenta:</b> 

          ${estatus_punto_cuenta ? estatus_punto_cuenta : "No disponible"}

        </li>

        <li class="list-group-item"><b>Cédula:</b> 

          ${cedula ? cedula : "No disponible"}

        </li>

        <li class="list-group-item"><b>Estado:</b> 

          ${estado ? estado : "No disponible"}

        </li>

        <li class="list-group-item"><b>Municipio:</b> 

          ${municipio ? municipio : "No disponible"}

        </li>

        <li class="list-group-item"><b>Parroquia:</b> 

          ${parroquia ? parroquia : "No disponible"}

        </li>

        <li class="list-group-item"><b>Sede:</b> 

          ${sede ? sede : "No disponible"}

        </li>

        <li class="list-group-item"><b>Número de expediente:</b> 

          ${nro_expediente ? nro_expediente : "No disponible"}

        </li>

        <li class="list-group-item"><b>Mes:</b> 

          ${mes ? mes : "No disponible"}

        </li>

      `;


    } else {
      alert(`Error al cargar los detalles del empleado con ID ${idEmpleado}`);
    }
  } catch (error) {
    console.error(error);
    alert("Hubo un problema al cargar los detalles del empleado");
  }
}