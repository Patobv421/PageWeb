document.addEventListener("DOMContentLoaded", function() {
    let texto = document.getElementById("DerechosAutor");

    texto.addEventListener("click", function() {
        let autores = ["Alan Quiñones", "Emir Medrano", "David Ibarra", "Derek Martinez"];
        
        Swal.fire({
            title: 'Esta página fue creada por:',
            html: autores.join('<br>'),
            icon: 'info',
            confirmButtonText: 'Aceptar'
        });
    });
});
