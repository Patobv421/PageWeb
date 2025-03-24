<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Recovery Password</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- Fuente y estilo base -->
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap');

    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }
    body {
      font-family: 'Poppins', sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      background-color: #f4f4f4;
      margin: 0;
      position: relative;
      overflow: hidden;
    }
    .wave {
      position: absolute;
      bottom: 0;
      left: 0;
      width: 100%;
      height: auto;
      z-index: -1;
    }
    .container {
      background: white;
      padding: 2rem;
      border-radius: 10px;
      box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
      text-align: center;
      width: 400px;
      display: none; /* Oculto por defecto */
    }
    /* Se muestra solo el contenedor con la clase "active" */
    .active {
      display: block;
    }
    .logo {
      width: 180px;
      position: absolute;
      top: 20px;
      left: 30px;
      display: flex;
      align-items: center;
    }
    .logo img {
      height: 40px;
      margin-right: 10px;
    }
    .logo-text {
      font-size: 20px;
      font-weight: 600;
      color: #02C8BF;
    }
    .form-container h2 {
      margin-bottom: 0.5rem;
      font-size: 24px;
      font-weight: 600;
    }
    .form-container p {
      color: #555;
      margin-bottom: 1.5rem;
      font-size: 14px;
      font-weight: 300;
    }
    form {
      display: flex;
      flex-direction: column;
    }
    label {
      text-align: left;
      margin-bottom: 0.5rem;
      font-weight: 400;
      font-size: 14px;
    }
    input {
      padding: 0.8rem;
      margin-bottom: 1rem;
      border-radius: 5px;
      border: 1px solid #ccc;
      width: 100%;
      font-family: 'Poppins', sans-serif;
    }
    button {
      padding: 0.8rem;
      background-color: #02C8BF;
      border: none;
      color: white;
      border-radius: 5px;
      cursor: pointer;
      transition: background 0.3s;
      font-size: 14px;
      font-weight: 600;
      font-family: 'Poppins', sans-serif;
    }
    button:hover {
      background-color: #029c99;
    }
    .error {
      color: red;
      font-size: 12px;
      margin-bottom: 1rem;
    }
    .status {
      color: green;
      font-size: 12px;
      margin-bottom: 1rem;
    }
    .resend-code {
      font-size: 13px;
    }
  </style>
</head>
<body>
  <!-- Logo (opcional) -->
  <div class="logo">
    <img src="{{ asset('images/yaaaaaa 3.png') }}" alt="HealthSelf Logo" />
    <span class="logo-text">HealthSelf</span>
  </div>

  <!-- Ola de fondo (opcional) -->
  <svg class="wave" width="1536" height="1042" viewBox="0 0 1536 1042" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path
      d="M1532 173.5C1659.57 -22.7877 1883.76 -115.723 1961.33 -64.3056L2374.32 651.252L344.81 1822.62C319.345 1778.5 282.977 1533.58 204.757 1598.86C-319.096 2036.05 -267.63 489.047 306.87 752.546C617.185 894.876 648.031 570.842 898.434 255.373C1155.04 -67.9147 1390.97 390.5 1532 173.5Z"
      fill="url(#paint0_linear_717_255)"
    />
    <defs>
      <linearGradient id="paint0_linear_717_255" x1="344.809" y1="1822.62" x2="1932.18" y2="-90.1889" gradientUnits="userSpaceOnUse">
        <stop stop-color="#02C8BF" />
        <stop offset="1" stop-color="#02C8BF" />
      </linearGradient>
    </defs>
  </svg>

  @php
    // Tomamos $step = 1 si no está definido en la sesión
    $step = isset($step) ? (int) $step : 1;
  @endphp

  <!-- Paso 1: Solicitar Email -->
  <div class="container @if($step === 1) active @endif">
    <div class="form-container">
      <h2>Recovery Password</h2>
      <p>Enter your email address to send you a code and recover your password</p>

      @if ($errors->any())
        <div class="error">
          @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
          @endforeach
        </div>
      @endif

      @if (session('status'))
        <div class="status">
          {{ session('status') }}
        </div>
      @endif

      <form action="{{ route('recovery') }}" method="POST">
        @csrf
        <input type="hidden" name="step" value="1" />

        <label for="email">Email address</label>
        <input
          type="email"
          id="email"
          name="email"
          placeholder="Enter your email"
          required
        />
        <button type="submit">Send Code</button>
      </form>
    </div>
  </div>

  <!-- Paso 2: Validar Código -->
  <div class="container @if($step === 2) active @endif">
    <div class="form-container">
      <h2>Recovery Password</h2>
      <p>Enter the code that you got</p>

      @if ($errors->any())
        <div class="error">
          @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
          @endforeach
        </div>
      @endif

      @if (session('status'))
        <div class="status">
          {{ session('status') }}
        </div>
      @endif

      <form action="{{ route('recovery') }}" method="POST">
        @csrf
        <input type="hidden" name="step" value="2" />

        <label for="code">Enter code</label>
        <input
          type="text"
          id="code"
          name="code"
          placeholder="Code"
          required
        />

        <p class="resend-code">
          Don’t you get the code?
          <!-- Enlace para reiniciar el envío del código (regresa a step 1) -->
          <a href="{{ route('recovery') }}">Send again</a>
        </p>
        <button type="submit">Validate</button>
      </form>
    </div>
  </div>

  <!-- Paso 3: Nueva Contraseña -->
  <div class="container @if($step === 3) active @endif">
    <div class="form-container">
      <h2>Recovery Password</h2>
      <p>Enter your new password</p>

      @if ($errors->any())
        <div class="error">
          @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
          @endforeach
        </div>
      @endif

      @if (session('status'))
        <div class="status">
          {{ session('status') }}
        </div>
      @endif

      <form action="{{ route('recovery') }}" method="POST">
        @csrf
        <input type="hidden" name="step" value="3" />

        <label for="password">New Password</label>
        <input
          type="password"
          id="password"
          name="password"
          placeholder="New Password"
          required
        />

        <label for="password_confirmation">Confirm Password</label>
        <input
          type="password"
          id="password_confirmation"
          name="password_confirmation"
          placeholder="Confirm Password"
          required
        />

        <button type="submit">Change Password</button>
      </form>
    </div>
  </div>
</body>
</html>
