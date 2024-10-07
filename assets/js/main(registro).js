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


