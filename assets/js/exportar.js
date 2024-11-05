/**
 * Función para cargar y mostrar la modal de exportación
 */
async function mostrarModalExportar(exportarModal) {
    try {
        // Ocultar modal existente si hay alguna
        const existingModal = document.getElementById("exportarModal");
        if (existingModal) {
            const modal = bootstrap.Modal.getInstance(existingModal);
            if (modal) {
                modal.hide();
            }
            existingModal.remove();
        }

        // Cargar la modal
        const response = await fetch("modales/modalExportar.php");
        if (!response.ok) {
            throw new Error("Error al cargar la modal de exportación");
        }

        // Obtener el contenido de la modal
        const modalHTML = await response.text();

        // Crear contenedor para la modal
        const modalContainer = document.createElement("div");
        modalContainer.innerHTML = modalHTML;

        // Agregar la modal al documento
        document.body.appendChild(modalContainer);

        // Configurar los eventos de los botones
        const botonesExportar = modalContainer.querySelectorAll('.btn-exportar');
        botonesExportar.forEach(boton => {
            boton.addEventListener('click', async function() {
                const formato = this.getAttribute('data-formato');
                try {
                    // Cerrar la modal
                    const modal = bootstrap.Modal.getInstance(modalContainer.querySelector('#exportarModal'));
                    modal.hide();

                    // Mostrar indicador de carga
                    if (window.toastrOptions) {
                        toastr.info('Preparando la exportación...');
                    }

                    // Realizar la exportación
                    window.location.href = `acciones/exportar.php?formato=${formato}&tabla=trabajadas`;
                    
                    // Mostrar mensaje de éxito después de un breve delay
                    setTimeout(() => {
                        if (window.toastrOptions) {
                            toastr.success('Archivo exportado correctamente');
                        }
                    }, 1000);
                } catch (error) {
                    console.error('Error en la exportación:', error);
                    if (window.toastrOptions) {
                        toastr.error('Error al exportar el archivo');
                    }
                }
            });
        });

        // Mostrar la modal
        const myModal = new bootstrap.Modal(modalContainer.querySelector('#exportarModal'));
        myModal.show();

    } catch (error) {
        console.error(error);
        if (window.toastrOptions) {
            toastr.error('Error al cargar las opciones de exportación');
        }
    }
}