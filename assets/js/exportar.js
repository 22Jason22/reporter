async function mostrarModalExportar() {
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

        const modalHTML = await response.text();
        const modalContainer = document.createElement("div");
        modalContainer.innerHTML = modalHTML;
        document.body.appendChild(modalContainer);

        // Configurar los eventos de los botones
        const botonesExportar = modalContainer.querySelectorAll('.btn-exportar');
        botonesExportar.forEach(boton => {
            boton.addEventListener('click', async function() {
                const formato = this.getAttribute('data-formato');
                try {
                    const modal = bootstrap.Modal.getInstance(modalContainer.querySelector('#exportarModal'));
                    modal.hide();

                    if (window.toastrOptions) {
                        toastr.info('Preparando la exportación...');
                    }

                    // Determinar la tabla actual basada en la URL
                    const paginaActual = window.location.pathname;
                    const tabla = paginaActual.includes('solicitudes.php') ? 'solicitudes' : 'trabajadas';
                    
                    window.location.href = `acciones/exportar.php?formato=${formato}&tabla=${tabla}`;
                    
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

        const myModal = new bootstrap.Modal(modalContainer.querySelector('#exportarModal'));
        myModal.show();

    } catch (error) {
        console.error(error);
        if (window.toastrOptions) {
            toastr.error('Error al cargar las opciones de exportación');
        }
    }
}