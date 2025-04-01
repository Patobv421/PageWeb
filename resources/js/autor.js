import Swal from 'sweetalert2';

document.addEventListener("DOMContentLoaded", function() {
    let texto = document.getElementById("DerechosAutor");

    texto.addEventListener("click", function() {
        let autores = ["Alan Quiñones", "Emir Medrano", "Yafet Bueno", "Derek Martinez"];
        Swal.fire({
            title: '© Derechos de Autor',
            html: "Esta página fue creada por:<br>" + autores.join("<br>"),
            icon: 'info',
            confirmButtonText: 'Aceptar'
        });
    });
});
