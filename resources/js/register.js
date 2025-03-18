import Swal from 'sweetalert2';

document.addEventListener('DOMContentLoaded', () => {
    console.log('Script register.js cargado');

    const form = document.querySelector('.form-box');
    if (!form) {
        console.error('No se encontró el formulario con la clase "form-box".');
        return;
    }

    form.addEventListener('submit', async (event) => {
        event.preventDefault();
        console.log('Evento submit capturado');

        const formData = new FormData(form);
        const csrfToken = document.querySelector('input[name="_token"]').value;

        Swal.fire({
            title: 'Registering...',
            text: 'Please wait while we create your account.',
            allowOutsideClick: false,
            showConfirmButton: false,
            willOpen: () => {
                Swal.showLoading();
            },
        });

        try {
            const response = await fetch(form.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json' // Asegura que Laravel devuelva JSON
                },
            });

            const result = await response.json();

            if (response.ok) {
                Swal.fire({
                    icon: 'success',
                    title: 'Registration Successful!',
                    text: result.message,
                    timer: 2000,
                    showConfirmButton: false,
                    timerProgressBar: true
                }).then(() => {
                    window.location.href = result.redirect; // Redirige a login después del mensaje
                });
            } else {
                throw new Error(result.errors ? JSON.stringify(result.errors) : 'Registration failed.');
            }
        } catch (error) {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: error.message || 'Something went wrong, please try again.',
            });

            console.error('Error en el registro:', error);
        }
    });
});
