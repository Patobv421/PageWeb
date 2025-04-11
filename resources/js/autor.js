document.addEventListener("DOMContentLoaded", function() {
    let texto = document.getElementById("DerechosAutor");

    texto.addEventListener("click", function() {
        let autores = ["Alan Quiñones", "Emir Medrano", "Yafet Bueno", "Derek Martinez"];
        alert("Esta página fue creada por:\n" + autores.join("\n"));
    });
});

document.addEventListener('DOMContentLoaded', function() {
    const profileIcon = document.querySelector('.profile-icon');
    const dropdown = document.querySelector('.profile-dropdown');
  
    if (profileIcon && dropdown) {
      // Al hacer clic en el icono de perfil se alterna la visibilidad del menú
      profileIcon.addEventListener('click', function(e) {
        e.stopPropagation();
        dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
      });
  
      // Cierra el dropdown si se hace clic fuera
      document.addEventListener('click', function() {
        dropdown.style.display = 'none';
      });
    }
  });
  
