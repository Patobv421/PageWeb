<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>HealthSelf Landing</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />


  {{-- Vite: cargamos nuestros estilos y scripts (ajusta si no usas Vite) --}}
  @vite(['resources/css/homepage.css', 'resources/js/autor.js'])
    {{-- Vite: cargamos nuestros estilos y scripts (ajusta si no usas Vite) --}}
    @vite(['resources/css/homepage.css', 'resources/js/autor.js'])
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

  <!-- CABECERA -->
  <header>
    <div class="logo">
      <img src="{{ asset('images/logo.png') }}" alt="HealthSelf Logo" />
      HealthSelf
    </div>

    <nav>
      <a href="#">Shop</a>
      <a href="#">Services</a>
      <a href="#">About Us</a>
      <a href="#">Contact Us</a>

      @guest
        <!-- Si el usuario NO está logueado, muestra botón de registro -->
        <button class="btn-start" onclick="window.location.href='{{ route('register') }}'">
          Get Started
        </button>
      @endguest

      @auth
      <!-- Contenedor para la información de usuario, carrito y logout -->
      <div class="icon-nav">
        <!-- Contenedor para ícono de usuario y nombre -->
        <div class="user-info">
          <div class="icon-circle" aria-label="Usuario">
            <svg viewBox="0 0 24 24">
              <path d="M12 12c2.7 0 5-2.3 5-5S14.7 2 12 2 7 4.3 7 7s2.3 5 5 5zm0 2c-3 0-9 1.5-9 4.5V20h18v-1.5c0-3-6-4.5-9-4.5z"/>
            </svg>
          </div>
          <span class="username">{{ Auth::user()->name }}</span>
        </div>
    
        <!-- Ícono de carrito -->
        <div class="icon-circle" aria-label="Carrito">
          <svg viewBox="0 0 24 24">
            <path d="M7 4h10l1 2h3c.6 0 1 .4 1 1s-.4 1-1 1h-1l-2.2 7.3c-.1.3-.4.7-.8.7H8c-.4 
                     0-.7-.3-.8-.7L5 5H4c-.6 0-1-.4-1-1s.4-1 1-1h3zm0 0l2.2 8h5.6L17 6H7zM7 20
                     c-1.1 0-1.99-.9-1.99-2S5.9 16 7 16s2 .9 2 2-.9 2-2 2zm10 
                     0c-1.1 0-1.99-.9-1.99-2S15.9 16 17 16s2 .9 2 2-.9 2-2 2z"/>
          </svg>
        </div>
    
        <!-- Botón Logout -->
        <form action="{{ route('logout') }}" method="POST" style="display:inline;">
          @csrf
          <button type="submit" class="btn-logout">Logout</button>
        </form>
      </div>
      @endauth
    </nav>
  </header>
  <!-- SECCIÓN HERO -->
  <section class="hero">
    <!-- FORMA #1 (SVG #1) -->
    <div class="shape-1">
      <svg viewBox="0 0 1440 826" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path
          d="M282.502 794.178C116.179 814.881 18.1996 691.072 -10 626.58V-13H1583V203.89C1583 302.477 1380.07 579.752 1148.95 555.721C917.822 531.691 1002.97 940.825 761.342 794.178C519.71 647.53 490.404 768.299 282.502 794.178Z"
          fill="url(#paint0_linear_77_7)"
        />
        <defs>
          <linearGradient id="paint0_linear_77_7" x1="1583" y1="-13.0001" x2="-46.6063" y2="516.923" gradientUnits="userSpaceOnUse">
            <stop stop-color="#02C8BF" />
            <stop offset="1" stop-color="#02C8BF" />
          </linearGradient>
        </defs>
      </svg>
    </div>
        <!-- CONTENIDO HERO (texto y botón) -->
        <div class="hero-content">
            <h1>Health at your fingertips,<br />when you need it.</h1>
            <p>Medical consultations with specialists at your reach.</p>
            <button class="btn-start" onclick="window.location.href='{{ route('homepage') }}'">
                Start Now!
            </button>
        </div>


    <!-- FORMA #2 (SVG #2) -->
    <div class="shape-2">
      <svg viewBox="0 0 1440 844" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path
          opacity="0.5"
          d="M290.665 811.988C125.387 832.814 28.0226 708.268 0 643.392V0H1583V218.183C1583 317.357 1381.35 596.284 1151.67 572.111C921.997 547.937 1006.61 959.509 766.499 811.988C526.385 664.466 497.263 785.955 290.665 811.988Z"
          fill="#02C8BF"
          fill-opacity="0.7"
        />
      </svg>
    </div>

    <!-- CONTENIDO HERO (texto y botón) -->
    <div class="hero-content">
      <h1>Health at your fingertips,<br />when you need it.</h1>
      <p>Medical consultations with specialists at your reach.</p>
      <button class="btn-main" onclick="window.location.href='{{ route('login') }}'">
        Start Now!
      </button>
    </div>

    <!-- IMAGEN DEL ESTETOSCOPIO -->
    <img src="{{ asset('images/esteloscopio.png') }}" alt="Stethoscope" />
  </section>

  <br><br><br><br><br><br><br><br><br>

  <!-- SECCIÓN "OUR SERVICES" -->
  <section class="services">
    <h2>Our Services</h2>

    <div class="services-group">
      <div class="cards-column">
        <!-- Tarjeta #1 -->
        <div class="service-card">
          <div class="service-icon-container">
            <img src="{{ asset('images/shopping_cart.png') }}" alt="Easy and Fast Shopping" class="service-icon" />
          </div>
          <div class="service-card-content">
            <h3>Easy and Fast Shopping</h3>
            <p>
              Buy your medications and medical products quickly and hassle-free.
              Enjoy top-quality service with a provider you can trust.
            </p>
            <a class="buy-link" href="#">Buy now →</a>
          </div>
        </div>

        <!-- Tarjeta #2 -->
        <div class="service-card">
          <div class="service-icon-container">
            <img src="{{ asset('images/lupa.png') }}" alt="Everything for Your Well-Being" class="service-icon" />
          </div>
          <div class="service-card-content">
            <h3>Everything for Your Well-Being</h3>
            <p>
              Find all the products you need in one place, with the quality you deserve.
            </p>
            <a class="buy-link" href="#">Buy now →</a>
          </div>
        </div>
      </div>

      <div class="image-column">
        <img src="{{ asset('images/atendiendo.png') }}" alt="Pharmacist in a pharmacy" />
      </div>
    </div>

    <div class="services-group">
      <div class="image-column">
        <img src="{{ asset('images/doc1.png') }}" alt="Doctor consulting a patient" />
      </div>
      <div class="cards-column">
        <!-- Tarjeta #3 -->
        <div class="service-card">
          <div class="service-icon-container">
            <img src="{{ asset('images/clock.png') }}" alt="Schedule Easily and Quickly" class="service-icon" />
          </div>
          <div class="service-card-content">
            <h3>Schedule Easily and Quickly</h3>
            <p>
              Make your life easier by booking your appointments online in just a few clicks.
            </p>
            <a class="buy-link" href="#">Get started →</a>
          </div>
        </div>

        <!-- Tarjeta #4 -->
        <div class="service-card">
          <div class="service-icon-container">
            <img src="{{ asset('images/check.png') }}" alt="Convenience and Efficiency" class="service-icon" />
          </div>
          <div class="service-card-content">
            <h3>Convenience and Efficiency</h3>
            <p>
              Choose the time that suits you best and avoid long waits with our seamless system.
            </p>
            <!-- Botón mejorado: redirige a doctors.blade.php -->
            <a class="buy-link" href="{{ route('doctors') }}">Get started →</a>
          </div>
        </div>
      </div>
    </div>


    <div class="services-group">
      <div class="cards-column">
        <!-- Tarjeta #5 -->
        <div class="service-card">
          <div class="service-icon-container">
            <img src="{{ asset('images/easily_document.png') }}" alt="Easily Complete Your Medical Tests" class="service-icon" />
          </div>
          <div class="service-card-content">
            <h3>Easily Complete Your Medical Tests</h3>
            <p>
              Complete your medical tests with the confidence of trusted professionals.
            </p>
            <a class="buy-link" href="#">View details →</a>
          </div>
            <div class="stats">
                <div class="stat">
                    <strong>500K+</strong>
                    <p>Patients served</p>
                </div>
                <div class="stat">
                    <strong>40K+</strong>
                    <p>Healthcare professionals available</p>
                </div>
                <div class="stat">
                    <strong>5M+</strong>
                    <p>Online consultations and follow-ups</p>
                </div>
            </div>
        </div>

        <!-- Tarjeta #6 -->
        <div class="service-card">
          <div class="service-icon-container">
            <img src="{{ asset('images/idea.png') }}" alt="Quick and Reliable Results" class="service-icon" />
          </div>
          <div class="service-card-content">
            <h3>Quick and Reliable Results</h3>
            <p>
              Access your results quickly through our platform, designed to provide convenience and reliability at all times.
            </p>
            <a class="buy-link" href="#">View details →</a>
          </div>
        </div>
      </div>
      <div class="image-column">
        <img src="{{ asset('images/placental.png') }}" alt="Laboratory tests" />
      </div>
    </div>
  </section>

  <!-- SECCIÓN "WHY HEALTHSELF" -->
  <section class="why-healthself">
    <div class="scroll-down">Scroll down</div>
    <div class="why-container">
      <h2>HealthSelf: The best online healthcare service, always for you.</h2>
      <p>
        When you join HealthSelf, our goal is to provide you with access to certified healthcare professionals tailored to your needs and preferences. We have doctors, specialists, and wellness experts ready to support you every step of the way toward a healthier life.
      </p>

      <div class="stats">
        <div class="stat">
          <strong>500K+</strong>
          <span>Patients served</span>
        </div>
        <div class="stat">
          <strong>40K+</strong>
          <span>Healthcare professionals available</span>
        </div>
        <div class="stat">
          <strong>5M+</strong>
          <span>Online consultations and follow-ups</span>
        </div>
      </div>
    </div>
  </section>

  <!-- SECCIÓN "OUR SPECIALISTS" -->
  <section class="our-specialists">
    <h2>Our Specialists</h2>
    <div class="specialists-container">
      <!-- Especialista #1 -->
      <div class="specialist-card">
        <img src="{{ asset('images/neurotology.png') }}" alt="Doctor Alanea Quiñones" class="specialist-image" />
        <h3>Doc. Alanea Quiñones</h3>
        <p class="specialty">Neurotology</p>
        <p class="description">
          Treats inner ear, balance, and hearing disorders.
        </p>
        <div class="heart-icon">♥</div>
      </div>

      <!-- Especialista #2 -->
      <div class="specialist-card">
        <img src="{{ asset('images/hiperbaric.png') }}" alt="Doctor Rick Sanchez" class="specialist-image" />
        <h3>Doc. Rick Sanchez</h3>
        <p class="specialty">Hyperbaric Medicine</p>
        <p class="description">
          Studies the effects of pressure on the body.
        </p>
        <div class="heart-icon">♥</div>
      </div>

      <!-- Especialista #3 -->
      <div class="specialist-card">
        <img src="{{ asset('images/placental.png') }}" alt="Doctor David Medrano" class="specialist-image" />
        <h3>Doc. David Medrano</h3>
        <p class="specialty">Placental Pathology</p>
        <p class="description">
          Analyzes the placenta for complications.
        </p>
        <div class="heart-icon">♥</div>
      </div>
    </div>
  </section>

  <!-- FOOTER TURQUESA -->
  <footer class="footer">
    <div class="footer-content">
      <!-- Columna 1: Marca e información general -->
      <div class="footer-col brand-col">
        <img src="{{ asset('images/logo_big.png') }}" alt="HealthSelf Logo" class="footer-logo" />
        <p>
          We simplify healthcare with hospital connections, medication purchases, and appointment scheduling, aided by a chatbot that analyzes results.
        </p>
        <span>Medical</span>
      </div>

      <!-- Columna 2: Helpful Link -->
      <div class="footer-col helpful-col">
        <h3>Helpful Link</h3>
        <ul>
          <li><a href="#">Privacy Policy</a></li>
          <li><a href="#">Support</a></li>
          <li><a href="#">FAQ</a></li>
          <li><a href="#">Terms & Conditions</a></li>
          <li><a href="#">Change Language</a></li>
        </ul>
      </div>

      <!-- Columna 3: Support -->
      <div class="footer-col support-col">
        <h3>Support</h3>
        <ul>
          <li><a href="#">Privacy Policy</a></li>
          <li><a href="#">Support</a></li>
          <li><a href="#">FAQ</a></li>
          <li><a href="#">Terms & Conditions</a></li>
        </ul>
      </div>

      <!-- Columna 4: Contact Us -->
      <div class="footer-col contact-col">
        <h3>Contact Us</h3>
        <ul>
          <li>UNIPOLI</li>
          <li>Health Self PP</li>
          <li>+52 618 814 15 16</li>
          <li>health_self59</li>
        </ul>
      </div>
    </div>
  </footer>
            <!-- Columna 4: Contact Us -->
            <div class="footer-col contact-col">
                <h3>Contact Us</h3>
                <ul>
                    <li>UNIPOLI</li>
                    <li>Health Self PP</li>
                    <li>+52 618 814 15 16</li>
                    <li id="DerechosAutor">health_self59</li>
                </ul>
            </div>
        </div>
    </footer>

</body>
</html>
