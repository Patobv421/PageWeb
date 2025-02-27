document.addEventListener('DOMContentLoaded', () => {
  console.log('Script registro.js cargado');

  const form = document.querySelector('.form-box');
  if (!form) {
    console.error('No se encontró el formulario con la clase "form-box".');
    return;
  }

  form.addEventListener('submit', (event) => {
    event.preventDefault();
    console.log('Evento submit capturado');

    Swal.fire({
      icon: 'success',
      title: 'Registro exitoso',
      text: 'Su cuenta se ha creado con éxito',
      timer: 1000,
      showConfirmButton: false,
      timerProgressBar: true
    }).then(() => {
      window.location.href = '../homepage.html';
    });
  });
});
