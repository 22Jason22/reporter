document.addEventListener("DOMContentLoaded", function() {
    const form = document.querySelector('form');
    const password = document.getElementById('user_pass');
    const confirmPassword = document.getElementById('conf_pass');
    const passwordError = document.getElementById('password-error');

    form.addEventListener('submit', function(event) {
        let valid = true;

        // Limpiar mensajes de error
        passwordError.textContent = '';

        // Validar que las contraseñas coincidan
        if (password.value !== confirmPassword.value) {
            passwordError.textContent = 'Las contraseñas no coinciden';
            valid = false;
        }

        // Validar longitud de la contraseña
        if (password.value.length < 6) {
            passwordError.textContent += ' La contraseña debe tener al menos 6 caracteres.';
            valid = false;
        }

        // Validar que todos los campos requeridos estén llenos
        const requiredFields = form.querySelectorAll('[required]');
        requiredFields.forEach(field => {
            if (!field.value.trim()) {
                valid = false;
                field.style.borderColor = 'red'; // Resaltar campo vacío
            } else {
                field.style.borderColor = ''; // Limpiar resaltado
            }
        });

        if (!valid) {
            event.preventDefault(); // Evitar el envío del formulario si hay errores
        }
    });
});

document.addEventListener("DOMContentLoaded", function() {
    const password = document.getElementById('user_pass');
    const confirmPassword = document.getElementById('conf_pass');
    const passwordError = document.getElementById('password-error');

    // Evento para verificar las contraseñas en tiempo real
    confirmPassword.addEventListener('input', function() {
        if (password.value !== confirmPassword.value) {
            passwordError.textContent = 'Las contraseñas no coinciden';
        } else {
            passwordError.textContent = ''; // Limpiar mensaje de error
        }
    });
});

$(function () {
	$('.form-holder').delegate("input", "focus", function () {
		$('.form-holder').removeClass("active");
		$(this).parent().addClass("active");
	})
})
// Get the input field for cedula
const cedulaInput = document.querySelector('input[name="cedula"]');

// Add event listener to the input field
cedulaInput.addEventListener('input', function () {
	// Add the prefix "V-" to the input value
	this.value = `V-${this.value.replace(/\D+/g, '')}`;
});

// Remove the spinner for the number input
cedulaInput.type = 'text';

// Add validation for the input value
cedulaInput.addEventListener('input', function () {
	const maxValue = 40000000;
	const minValue = 0;
	const currentValue = parseInt(this.value.replace(/\D+/g, ''));

	if (currentValue < minValue) {
		this.value = '';
	} else if (currentValue > maxValue) {
		this.value = `V-${maxValue}`;
	}
});




