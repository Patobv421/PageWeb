<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>HealthSelf</title>
  <!-- Enlaza tu hoja de estilos -->
  @vite('resources/css/style.css')
</head>
<body>

  <!-- HEADER / NAVEGACIÓN -->
  <header class="header">
    <div class="container header-container">
      <!-- Logo e Identidad -->
      <div class="logo">
        <img src="{{ asset('images_doctores/logo.png') }}" alt="Logo HealthSelf" class="logo-img"/>
        <span class="logo-text">HealthSelf</span>
      </div>      

      <!-- Menú principal (píldoras blancas con texto turquesa) -->
      <nav class="nav-menu">
        <!-- Ajusta estos textos si lo deseas -->
        <a href="#" class="nav-link">Médico de Durango</a>
        <a href="#" class="nav-link">Condición</a>
        <a href="#" class="nav-link">Nombre de Docs</a>
        <a href="#" class="nav-link">El esquiD</a>
        <a href="#" class="nav-link">Contacta</a>
        <a href="#" class="nav-link">Gordic@ y Médico</a>
      </nav>

      <!-- Íconos (Usuario y Carrito) en círculos blancos -->
      <div class="header-icons">
        <!-- Ícono de Usuario en círculo blanco -->
        <button class="icon-btn" aria-label="Usuario">
          <svg viewBox="0 0 24 24" class="icon">
            <!-- Silueta de usuario -->
            <path d="M12 12c2.7 0 5-2.3 5-5S14.7 2 12 2 7 4.3 7 7s2.3 5 5 5zm0 2c-3 0-9 1.5-9 4.5V20h18v-1.5c0-3-6-4.5-9-4.5z"/>
          </svg>
        </button>
        <!-- Ícono de Carrito en círculo blanco -->
        <button class="icon-btn" aria-label="Carrito">
          <svg viewBox="0 0 24 24" class="icon">
            <!-- Silueta de carrito -->
            <path d="M7 4h10l1 2h3c.6 0 1 .4 1 1s-.4 1-1 1h-1l-2.2 7.3c-.1.3-.4.7-.8.7H8c-.4 
                     0-.7-.3-.8-.7L5 5H4c-.6 0-1-.4-1-1s.4-1 1-1h3zm0 0l2.2 8h5.6L17 6H7zM7 20
                     c-1.1 0-1.99-.9-1.99-2S5.9 16 7 16s2 .9 2 2-.9 2-2 2zm10 
                     0c-1.1 0-1.99-.9-1.99-2S15.9 16 17 16s2 .9 2 2-.9 2-2 2z"/>
          </svg>
        </button>
      </div>
    </div>
  </header>

  <!-- CONTENIDO PRINCIPAL -->
  <main class="container main-content">
    <!-- Filtro / Sort by -->
    <div class="sort-bar">
      <label for="sortBy" class="sort-label">Sort by Disease:</label>
      <select id="sortBy" name="sortBy" class="sort-select">
        <option value="default">Select Disease</option>
        <option value="cardiology">Cardiology</option>
        <option value="orthopedics">Orthopedics</option>
        <option value="dermatology">Dermatology</option>
      </select>
    </div>

    <!-- LISTADO DE MÉDICOS -->
    <div class="doctors-list">
      <!-- Card 1 -->
      <div class="doctor-card">
        <div class="doctor-img-container">
          <img src="{{ asset('images_doctores/WhatsApp Image 2025-03-07 at 19.05.06_db7c30a5.png') }}" 
               alt="Doctor 1" class="doctor-img"/>
        </div>
        <div class="doctor-info">
          <h2 class="doctor-name">Doc. Alvaro Quifones</h2>
          <p class="doctor-specialty">Family Medicine</p>
          <div class="doctor-rating">
            <span class="star-icon">&#9733;</span>
            <span class="rating-value">4.7 (13 ratings)</span>
          </div>
          <p class="doctor-address">
            #686 Street 20 of November<br/>
            Durango, Dgo. 34340
          </p>
          <div class="doctor-distance">
            <svg viewBox="0 0 512 512" width="16" height="16" fill="#777">
              <path d="M256 0C158.8 0 80 78.8 80 176c0 97.2 165.6 318.9 170.5 325.5 2.2 2.9 5.6 
                       4.5 9.2 4.5s7-1.6 9.2-4.5C266.4 494.9 432 273.2 432 176 432 78.8 
                       353.2 0 256 0zm0 256c-44.1 0-80-35.9-80-80 0-44.2 35.9-80 80-80 
                       44.2 0 80 35.8 80 80 0 44.1-35.8 80-80 80z"/>
            </svg>
            <span>8.6km</span>
          </div>
          <div class="doctor-actions">
            <button class="telehealth-btn">Offers Telehealth</button>
            <button class="profile-btn">View Profile</button>
          </div>
        </div>
      </div>

      <!-- Card 2 -->
      <div class="doctor-card">
        <div class="doctor-img-container">
          <img src="{{ asset('images_doctores/WhatsApp Image 2025-03-07 at 19.05.06_6f6f2614 1.png') }}" 
               alt="Doctor 2" class="doctor-img"/>
        </div>
        <div class="doctor-info">
          <h2 class="doctor-name">Doc. Riki Sánchez Cepedos</h2>
          <p class="doctor-specialty">Orthopedic Surgery</p>
          <div class="doctor-rating">
            <span class="star-icon">&#9733;</span>
            <span class="rating-value">4.1 (34 ratings)</span>
          </div>
          <p class="doctor-address">
            #686 Street 20 of November<br/>
            Durango, Dgo. 34340
          </p>
          <div class="doctor-distance">
            <svg viewBox="0 0 512 512" width="16" height="16" fill="#777">
              <path d="M256 0C158.8 0 80 78.8 80 176c0 97.2 165.6 318.9 170.5 325.5 2.2 2.9 
                       5.6 4.5 9.2 4.5s7-1.6 9.2-4.5C266.4 494.9 432 273.2 432 176 
                       432 78.8 353.2 0 256 0zm0 256c-44.1 0-80-35.9-80-80 0-44.2 35.9-80 
                       80-80 44.2 0 80 35.8 80 80 0 44.1-35.8 80-80 80z"/>
            </svg>
            <span>10.2km</span>
          </div>
          <div class="doctor-actions">
            <button class="telehealth-btn">Offers Telehealth</button>
            <button class="profile-btn">View Profile</button>
          </div>
        </div>
      </div>

      <!-- Card 3 -->
      <div class="doctor-card">
        <div class="doctor-img-container">
          <img src="{{ asset('images_doctores/WhatsApp Image 2025-03-07 at 10.48.00_1894065f 1.png') }}" 
               alt="Doctor 3" class="doctor-img"/>
        </div>
        <div class="doctor-info">
          <h2 class="doctor-name">Doc. Alvaro Quifones</h2>
          <p class="doctor-specialty">Internal Medicine</p>
          <div class="doctor-rating">
            <span class="star-icon">&#9733;</span>
            <span class="rating-value">4.3 (17 ratings)</span>
          </div>
          <p class="doctor-address">
            #686 Street 20 of November<br/>
            Durango, Dgo. 34340
          </p>
          <div class="doctor-distance">
            <svg viewBox="0 0 512 512" width="16" height="16" fill="#777">
              <path d="M256 0C158.8 0 80 78.8 80 176c0 97.2 165.6 318.9 170.5 325.5 
                       2.2 2.9 5.6 4.5 9.2 4.5s7-1.6 9.2-4.5C266.4 494.9 432 273.2 432 
                       176 432 78.8 353.2 0 256 0zm0 256c-44.1 0-80-35.9-80-80 
                       0-44.2 35.9-80 80-80 44.2 0 80 35.8 80 80 
                       0 44.1-35.8 80-80 80z"/>
            </svg>
            <span>8.6km</span>
          </div>
          <div class="doctor-actions">
            <button class="telehealth-btn">Offers Telehealth</button>
            <button class="profile-btn">View Profile</button>
          </div>
        </div>
      </div>
    </div>
  </main>

  <!-- FOOTER -->
  <footer class="footer">
    <div class="container footer-container">
      <div class="footer-columns">
        <!-- Logo + descripción -->
        <div class="footer-col">
          <div class="logo">
            <img src="{{ asset('images/logo.png') }}" alt="HealthSelf Logo" class="footer-logo" />
            <span class="logo-text">HealthSelf</span>
          </div>
          <p class="footer-text">
            Brindamos seguridad en tu historial médico, permitiendo conectar con doctores profesionales y acercándote a un mejor cuidado de tu salud.
          </p>
        </div>

        <!-- Helpful Link -->
        <div class="footer-col">
          <h3 class="footer-heading">Helpful Link</h3>
          <ul class="footer-list">
            <li><a href="#" class="footer-link">Privacy Policy</a></li>
            <li><a href="#" class="footer-link">Security</a></li>
            <li><a href="#" class="footer-link">FAQ</a></li>
            <li><a href="#" class="footer-link">Terms &amp; Conditions</a></li>
          </ul>
        </div>

        <!-- Support -->
        <div class="footer-col">
          <h3 class="footer-heading">Support</h3>
          <ul class="footer-list">
            <li><a href="#" class="footer-link">Privacy Policy</a></li>
            <li><a href="#" class="footer-link">Security</a></li>
            <li><a href="#" class="footer-link">FAQ</a></li>
            <li><a href="#" class="footer-link">Terms &amp; Conditions</a></li>
          </ul>
        </div>

        <!-- Contact -->
        <div class="footer-col">
          <h3 class="footer-heading">Contact Us</h3>
          <ul class="footer-list">
            <li><a href="#" class="footer-link">+1 555 123 4567</a></li>
            <li><a href="#" class="footer-link">help@healthself.com</a></li>
            <li><a href="#" class="footer-link">North St #235</a></li>
            <li><a href="#" class="footer-link">Health_self.io</a></li>
          </ul>
        </div>
      </div>

      <hr class="divider"/>
      <div class="copyright">
        © 2025 HealthSelf. All rights reserved.
      </div>
    </div>
  </footer>

</body>
</html>
