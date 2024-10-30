document.addEventListener('DOMContentLoaded', function() {
    const menuTrabajadas = document.getElementById('menuTrabajadas');
    const menuSolicitudes = document.getElementById('menuSolicitudes');
    const seccionTrabajadas = document.getElementById('sec_trab');
    const seccionSolicitudes = document.getElementById('sec_sol');

    function mostrarSeccion(seccionMostrar, seccionOcultar, menuActivo, menuInactivo) {
        seccionMostrar.style.display = 'block';
        seccionOcultar.style.display = 'none';
        menuActivo.classList.add('active');
        menuInactivo.classList.remove('active');
    }

    menuTrabajadas.addEventListener('click', function(e) {
        e.preventDefault();
        mostrarSeccion(seccionTrabajadas , seccionSolicitudes, menuTrabajadas, menuSolicitudes);
    });

    menuSolicitudes.addEventListener('click', function(e) {
        e.preventDefault();
        mostrarSeccion(seccionSolicitudes, seccionTrabajadas, menuSolicitudes, menuTrabajadas);
    });
});