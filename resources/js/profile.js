// Importa Chart.js si lo instalaste vía npm
import Chart from 'chart.js/auto';

// Configuración de mapeo de íconos 
// Si necesitas actualizar las rutas a las imágenes en el JS, puedes usar rutas absolutas (por ejemplo, '/images_perfil/...').
const iconMapping = {
  review: {
    selected: '/images_perfil/icon_review_selected.png',
    unselected: '/images_perfil/icon_review_unselected.png'
  },
  vitals: {
    selected: '/images_perfil/icon_vitals_selected.png',
    unselected: '/images_perfil/icon_vitals_unselected.png'
  },
  drugs: {
    selected: '/images_perfil/icon_drugs_selected.png',
    unselected: '/images_perfil/icon_drugs_unselected.png'
  },
  appoinments: {
    selected: '/images_perfil/icon_appoinments_selected.png',
    unselected: '/images_perfil/icon_appoinments_unselected.png'
  }
};

const diagnosticsSection = document.getElementById('diagnostics-section');
const vitalsSection = document.getElementById('vitals-section');
const drugsSection = document.getElementById('drugs-section');
const appointmentsSection = document.getElementById('appoinments-section');

// MAIN TABS
document.querySelectorAll('.profile-tabs .tab').forEach(tab => {
  tab.addEventListener('click', function() {
    // Quitar 'selected' a todos los tabs y actualizar íconos
    document.querySelectorAll('.profile-tabs .tab').forEach(t => {
      t.classList.remove('selected');
      const tName = t.getAttribute('data-tab');
      const tImg = t.querySelector('img');
      if(iconMapping[tName]) {
        tImg.src = iconMapping[tName].unselected;
      }
    });

    // Marcar el tab clickeado y actualizar su imagen
    this.classList.add('selected');
    const tabName = this.getAttribute('data-tab');
    const thisImg = this.querySelector('img');
    if(iconMapping[tabName]){
      thisImg.src = iconMapping[tabName].selected;
    }

    // Ocultar todas las secciones y mostrar la correspondiente
    diagnosticsSection.style.display = 'none';
    vitalsSection.style.display = 'none';
    drugsSection.style.display = 'none';
    appointmentsSection.style.display = 'none';

    if(tabName === 'review') {
      diagnosticsSection.style.display = 'block';
    } else if(tabName === 'vitals'){
      vitalsSection.style.display = 'block';
    } else if(tabName === 'drugs'){
      drugsSection.style.display = 'block';
    } else if(tabName === 'appoinments'){
      appointmentsSection.style.display = 'block';
    }
  });
});

// SUB-TABS (Diagnostics)
document.querySelectorAll('.diagnostics-tabs .subtab').forEach(subtab => {
  subtab.addEventListener('click', function() {
    document.querySelectorAll('.diagnostics-tabs .subtab').forEach(st => st.classList.remove('selected'));
    this.classList.add('selected');
    const subtabName = this.getAttribute('data-subtab');
    document.querySelectorAll('.diagnostic-content').forEach(content => {
      content.style.display = (content.getAttribute('data-content') === subtabName) ? 'block' : 'none';
    });
  });
});

// Al cargar la página se muestra la sección activa según el tab seleccionado
window.addEventListener('DOMContentLoaded', () => {
  const selectedMainTab = document.querySelector('.profile-tabs .tab.selected');
  if(selectedMainTab){
    const tabName = selectedMainTab.getAttribute('data-tab');
    if(tabName === 'review'){
      diagnosticsSection.style.display = 'block';
    } else if(tabName === 'vitals'){
      vitalsSection.style.display = 'block';
    } else if(tabName === 'drugs'){
      drugsSection.style.display = 'block';
    } else if(tabName === 'appoinments'){
      appointmentsSection.style.display = 'block';
    }
  }
});

// Gráficos con Chart.js (ejemplo para Alternate Pressure)
const ctxPressure = document.getElementById('pressureChart')?.getContext('2d');
if(ctxPressure){
  new Chart(ctxPressure, {
    type: 'line',
    data: {
      labels: ['Jan','Feb','Mar','Apr','May','Jun'],
      datasets: [{
        label: 'Alternate Pressure',
        data: [120,125,122,130,128,123],
        borderColor: 'green',
        backgroundColor: 'rgba(0,200,179,0.1)',
        fill: true,
      }]
    },
    options: { responsive: true, maintainAspectRatio: false }
  });
}

// Gráficos para Heart Rate
const ctxHeart = document.getElementById('heartRateChart')?.getContext('2d');
if(ctxHeart){
  new Chart(ctxHeart, {
    type: 'line',
    data: {
      labels: ['Jan','Feb','Mar','Apr','May','Jun'],
      datasets: [{
        label: 'Heart Rate',
        data: [72,75,70,73,74,72],
        borderColor: 'red',
        backgroundColor: 'rgba(255,0,0,0.1)',
        fill: true,
      }]
    },
    options: { responsive: true, maintainAspectRatio: false }
  });
}

// Gráficos para Weight
const ctxWeight = document.getElementById('weightChart')?.getContext('2d');
if(ctxWeight){
  new Chart(ctxWeight, {
    type: 'line',
    data: {
      labels: ['Jan','Feb','Mar','Apr','May','Jun'],
      datasets: [{
        label: 'Weight',
        data: [75,74.5,75,74,73.5,74],
        borderColor: 'blue',
        backgroundColor: 'rgba(0,0,255,0.1)',
        fill: true,
      }]
    },
    options: { responsive: true, maintainAspectRatio: false }
  });
}
