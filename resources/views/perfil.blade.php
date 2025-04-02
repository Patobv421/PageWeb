<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Landing Page - HealthSelf</title>
  @vite(['resources/css/landing.css', 'resources/js/landing.js'])
</head>
<body>

  <!-- Fondo SVG -->
  <div class="bg-svg">
    <svg width="1440" height="764" viewBox="0 0 1440 764" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M1446.78 459.729C1540.78 -15.7713 1578.28 1087.73 1231.78 664.228C885.277 240.728 241.278 905.229 -1.22225 327.729C-243.722 -249.771 -1.22225 111.728 -1.22225 111.728H1439.78L1446.78 459.729Z" fill="#4D4D4D" fill-opacity="0.08"/>
    </svg>
  </div>

  <!-- Encabezado teal -->
  <header class="header">
    <div class="header-top">
      <div class="logo">HealthSelf</div>
      <div class="search-bar">
        <input type="text" placeholder="What are you looking for?" />
        <button>
          <svg viewBox="0 0 24 24" fill="currentColor" width="20" height="20">
            <path d="M21.53 20.47l-5.73-5.73a7.25 7.25 0 1 0-1.06 1.06l5.73 5.73a.75.75 0 0 0 1.06-1.06zM4.75 10.25a5.5 5.5 0 1 1 11 0 5.5 5.5 0 0 1-11 0z"/>
          </svg>
        </button>
      </div>
    </div>
    <div class="chips">
      <button>Médico de Durango</button>
      <button>Consulta</button>
      <button>Nombre de Docs</button>
      <button>El Mequijibi</button>
      <button>Consultas</button>
      <button>Guadalupe Victoria</button>
    </div>
  </header>

  <!-- Sección principal con fondo blanco y onda a la derecha -->
  <section class="white-wave-container">
    <div class="white-wave-content">
      <!-- Sección del Doctor -->
      <div class="doctor-section">
        <div class="doctor-photo">
          <img src="{{ asset('images/doctor_photo.png') }}" alt="Doctor Photo">
        </div>
        <div class="doctor-info">
          <div class="doctor-header">
            <h2>Doc. Alanea Quiñones Cisneros</h2>
            <span class="rating">4.7 (30 ratings)</span>
            <div class="stars">
              <svg viewBox="0 0 24 24"><path d="M12 .587l3.668 7.431L24 9.752l-6 5.851 1.416 8.26L12 19.771l-7.416 3.92L6 15.603 0 9.752l8.332-1.734L12 .587z"/></svg>
              <svg viewBox="0 0 24 24"><path d="M12 .587l3.668 7.431L24 9.752l-6 5.851 1.416 8.26L12 19.771l-7.416 3.92L6 15.603 0 9.752l8.332-1.734L12 .587z"/></svg>
              <svg viewBox="0 0 24 24"><path d="M12 .587l3.668 7.431L24 9.752l-6 5.851 1.416 8.26L12 19.771l-7.416 3.92L6 15.603 0 9.752l8.332-1.734L12 .587z"/></svg>
              <svg viewBox="0 0 24 24"><path d="M12 .587l3.668 7.431L24 9.752l-6 5.851 1.416 8.26L12 19.771l-7.416 3.92L6 15.603 0 9.752l8.332-1.734L12 .587z"/></svg>
              <svg viewBox="0 0 24 24" fill="#ccc"><path d="M12 .587l3.668 7.431L24 9.752l-6 5.851 1.416 8.26L12 19.771l-7.416 3.92L6 15.603 0 9.752l8.332-1.734L12 .587z"/></svg>
            </div>
          </div>
          <p class="doctor-specialty">Family Medicine</p>
          <p class="doctor-description">
            Doc. Alanea Quiñones Cisneros is a family medicine specialist in Durango, Mexico.
            She is affiliated with Hospital General 450.
            She is currently accepting new patients and offers telehealth appointments.
          </p>
          <button class="appointment-button">Appointment now</button>
        </div>
      </div>

      <!-- Sección "At a Glance" -->
      <div class="glance-section">
        <h3>At a Glance</h3>
        <ul class="glance-list">
          <li>
            <img src="{{ asset('images/icon-expertise.png') }}" alt="icon">
            <strong>Area of expertise:</strong> Dr. Quinones specializes in Family Medicine.
          </li>
          <li>
            <img src="{{ asset('images/icon-schedule.png') }}" alt="icon">
            <strong>Easy Scheduling:</strong> Patients said scheduling was easy.
          </li>
          <li>
            <img src="{{ asset('images/icon-telehealth.png') }}" alt="icon">
            <strong>Offers Telehealth:</strong> This doctor offers telehealth appointments.
          </li>
          <li>
            <img src="{{ asset('images/icon-hospital.png') }}" alt="icon">
            <strong>Practices at Top Hospital:</strong> Patients Safety Excellent Award like San Jorge Clinic.
          </li>
        </ul>
      </div>

      <!-- Sección "Experience Check" -->
      <div class="experience-section">
        <h3>Experience Check</h3>
        <p>
          Based on treatment records, we have identified the following as areas of care 
          that Doc. Quinones treats most frequently.
        </p>
        <div class="progress-bar">
          <div class="progress-label">Thrush</div>
          <div class="progress-track">
            <div class="progress-fill" style="width: 70%;"></div>
          </div>
        </div>
        <div class="progress-bar">
          <div class="progress-label">Wellness Examination</div>
          <div class="progress-track">
            <div class="progress-fill" style="width: 60%;"></div>
          </div>
        </div>
        <div class="progress-bar">
          <div class="progress-label">Arterial Blood Gas Test (ABG)</div>
          <div class="progress-track">
            <div class="progress-fill" style="width: 80%;"></div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="footer">
    <p>© {{ date('Y') }} HealthSelf - Todos los derechos reservados</p>
  </footer>
  
</body>
</html>
