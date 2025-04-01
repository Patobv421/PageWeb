import './bootstrap';

document.addEventListener("DOMContentLoaded", function() {
    // Seleccionamos todos los <p> e <i> de la página
    const textos = document.querySelectorAll("p, i,a,h3");
  
    textos.forEach(function(texto) {
      // Evento al pasar el mouse
      texto.addEventListener("mouseover", function() {
        // Aplicamos un leve escalado y transición
        texto.style.transform = "scale(1.05)";
        texto.style.transition = "transform 0.2s ease-in-out";
      });
  
      // Evento al quitar el mouse
      texto.addEventListener("mouseout", function() {
        // Regresamos a la escala original
        texto.style.transform = "scale(1)";
      });
    });
  });
  