/**
 * Modal para confirmar la eliminación de un empleado
 */
async function cargarModalConfirmacion() {
  try {
    const existingModal = document.getElementById("editarEmpleadoModal");
    if (existingModal) {
      const modal = bootstrap.Modal.getInstance(existingModal);
      if (modal) {
        modal.hide();
      }
      existingModal.remove(); // Eliminar la modal existente
    }

    // Realizar una solicitud GET usando Fetch para obtener el contenido de la modal
    const response = await fetch("modales/modalDelete.php");

    if (!response.ok) {
      throw new Error("Error al cargar la modal de confirmación");
    }

    // Obtener el contenido de la modal
    const modalHTML = await response.text();

    // Crear un elemento div para almacenar el contenido de la modal
    const modalContainer = document.createElement("div");
    modalContainer.innerHTML = modalHTML;

    // Agregar la modal al documento actual
    document.body.appendChild(modalContainer);

    // Mostrar la modal
    const myModal = new bootstrap.Modal(modalContainer.querySelector(".modal"));
    myModal.show();
  } catch (error) {
    console.error(error);
  }
}

/**
 * Función para eliminar un empleado desde la modal
 */
async function EliminarReporte(idEmpleado, avatarEmpleado) {
  try {
    await cargarModalConfirmacion();

    const confirmDeleteBtn = document.getElementById("confirmDeleteBtn");
    confirmDeleteBtn.setAttribute("data-id", idEmpleado);
    confirmDeleteBtn.setAttribute("data-tipo", avatarEmpleado);

    confirmDeleteBtn.onclick = async function () {
      try {
        const response = await axios.post("acciones/delete.php", {
          id: idEmpleado,
          tipo: avatarEmpleado
        });

        if (response.data.success) {
          let elementId;
          if (avatarEmpleado === 'solicitud') {
            elementId = `solicitud_${idEmpleado}`;
          } else {
            elementId = `empleado_${idEmpleado}`;
          }
          const elementToRemove = document.getElementById(elementId);
          if (elementToRemove) {
            elementToRemove.remove();
            if (window.toastrOptions) {
              toastr.options = window.toastrOptions;
              toastr.success(response.data.message);
            }
          } else {
            console.error(`Elemento con id ${elementId} no encontrado`);
            console.log("DOM actual:", document.body.innerHTML);
            alert(`El elemento ${elementId} no se encontró en la página. El registro se eliminó de la base de datos, pero la interfaz no se actualizó. Por favor, recargue la página.`);
          }
        } else {
          alert(response.data.message);
        }
      } catch (error) {
        console.error("Error completo:", error);
        alert("Hubo un problema al eliminar el registro");
      } finally {
        const confirmModal = bootstrap.Modal.getInstance(document.getElementById("confirmModal"));
        if (confirmModal) {
          confirmModal.hide();
        }
      }
    };
  } catch (error) {
    console.error("Error al cargar la modal:", error);
    alert("Hubo un problema al cargar la modal de confirmación");
  }
}
