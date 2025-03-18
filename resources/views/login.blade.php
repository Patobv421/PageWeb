<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>HealthSelf - Log in</title>
  <!-- FUENTES:
       Inter (peso 900) para "HealthSelf"
       Poppins (peso 400,600) para el resto -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link 
    href="https://fonts.googleapis.com/css2?family=Inter:wght@900&family=Poppins:wght@400;600&display=swap" 
    rel="stylesheet">
  <!-- Cargar el CSS usando Vite -->
  @vite('resources/css/login.css')
</head>
<body>
  <div class="container">
    
    <!-- Sección Izquierda (50%) -->
    <div class="left-container">
      <!-- Branding: Logo + Texto "HealthSelf" -->
      <div class="logo-container">
        <img src="{{ asset('images_login/logo.png') }}" alt="HealthSelf Logo" class="logo" />
        <div class="brand-text">HealthSelf</div>
      </div>

      <!-- Contenido principal (Welcome, formulario, etc.) -->
      <div class="main-content">
        <!-- Títulos -->
        <h2>Welcome!</h2>
        <p class="subtitle">Enter your Information to Log In</p>

        <!-- Formulario -->
        <form class="login-form" method="POST" action="{{ route('login') }}">
    @csrf

    <!-- Mostrar errores de validación -->
    @if ($errors->any())
        <div class="error-message">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <label for="email">Email address</label>
    <input type="email" id="email" name="email" placeholder="Enter your email" required />

    <label for="password">Password</label>
    <input type="password" id="password" name="password" placeholder="Password" required />

    <div class="forgot-password">
        <label for="forgot-password">Forgot your password?</label>
        <a href="{{ url('recoverypassword') }}"> Change it</a>
    </div>

    <button type="submit" class="login-btn">Login</button>
</form>


        <!-- Palabra "Or" -->
        <div class="separator">Or</div>

        <!-- Botones sociales -->
        <div class="social-login">
          <button class="social-btn google">
            <img src="{{ asset('images_login/icono_google.png') }}" alt="Google icon" />
            Sign in with Google
          </button>
          <button class="social-btn apple">
            <img src="{{ asset('images_login/icono_apple.png') }}" alt="Apple icon" />
            Sign in with Apple
          </button>
          <button class="social-btn microsoft">
            <img src="{{ asset('images_login/icono_microsoft.png') }}" alt="Microsoft icon" />
            Sign in with Microsoft
          </button>
        </div>

        <!-- Texto de registro -->
        <p class="signup-text">
          Don't have an account? <a href="#">Sign Up</a>
        </p>
      </div>
    </div>
    
    <!-- Sección Derecha (50%) -->
    <div class="right-section">
      <img src="{{ asset('images_login/doc_calar.png') }}" alt="Imagen Médico" class="hero-image" />
    </div>
  </div>
</body>
</html>
