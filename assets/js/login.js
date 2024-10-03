const form = document.getElementById('login-form');
const mensajeError = document.getElementById('mensaje-error');

form.addEventListener('submit', (e) => {
    e.preventDefault();

    const usuario = document.getElementById('usuario').value;
    const contrasena = document.getElementById('contrasena').value;

    const datos = {
        usuario: usuario,
        contrasena: contrasena
    };

    fetch('/login', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(datos)
    })
    .then((response) => response.json())
    .then((data) => {
        if (data.estado === 'ok') {
            // Redireccionar al usuario a otra página
            window.location.href = '../../';
        } else {
            mensajeError.innerHTML = 'Usuario o contraseña incorrectos';
        }
    })
    .catch((error) => {
        console.error(error);
    });
});