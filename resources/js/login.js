// resources/js/autor.js
document.addEventListener("DOMContentLoaded", function() {
    // Evento para mostrar información de los autores al hacer clic en el logo
    let texto = document.getElementById("hsrecovery");
    if (texto) {
        texto.addEventListener("click", function() {
            let autores = ["Alan Quiñones", "Emir Medrano", "David Ibarra", "Derek Martinez"];
            Swal.fire({
                title: 'Esta página fue creada por:',
                html: autores.join('<br>'),
                icon: 'info',
                confirmButtonText: 'Aceptar'
            });
        });
    }

    // Función para validar el formato del email
    function isValidEmail(email) {
        const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return re.test(email);
    }

    // Evento para el botón de recuperación de cuenta
    let recoveryButton = document.getElementById("hsrecovery2");
    if (recoveryButton) {
        recoveryButton.addEventListener("click", function(e) {
            e.preventDefault(); // Prevenir el envío del formulario
            let emailInput = document.getElementById("email");
            let email = emailInput.value.trim();

            // Validar el formato del correo
            if (!isValidEmail(email)) {
                Swal.fire({
                    icon: 'error',
                    title: 'Correo inválido',
                    text: 'Por favor, ingresa un correo electrónico válido.',
                    confirmButtonText: 'Aceptar'
                });
                return;
            }

            // Mostrar alerta de éxito y redirigir a la página de login al confirmar
            Swal.fire({
                title: 'Recuperación de cuenta',
                text: 'Se ha realizado la recuperación de tu cuenta. En breve recibirás un correo.',
                icon: 'success',
                confirmButtonText: 'Aceptar'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Redirige a la URL de login definida en la vista
                    window.location.href = loginUrl;
                }
            });
        });
    }
});
