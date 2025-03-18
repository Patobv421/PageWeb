<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>HealthSelf - Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    {{-- Vite: cargamos nuestros estilos y scripts --}}
    @vite(['resources/css/register.css', 'resources/js/register.js'])

    <!-- Importar la fuente "Inter" -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;900&display=swap" />
</head>
<body>
    <!-- Contenedor principal -->
    <div class="container">
        <!-- Columna Izquierda -->
        <div class="left-container">
            <div class="logo-container">
                <img src="{{ asset('images_register/logo.png') }}" alt="HealthSelf Logo" class="logo" />
                <span class="brand-text">HealthSelf</span>
            </div>

            <div class="content-container">
                <h1 class="title">Get Started Now!</h1>

                <!-- Formulario de registro -->
                <form class="form-box" method="POST" action="{{ route('register') }}">
                    @csrf
                    
                    <div class="field-container">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" placeholder="Name" value="{{ old('name') }}" required />
                        @error('name') <span class="error">{{ $message }}</span> @enderror
                    </div>

                    <div class="field-container">
                        <label for="email">Email address</label>
                        <input type="email" id="email" name="email" placeholder="Email address" value="{{ old('email') }}" required />
                        @error('email') <span class="error">{{ $message }}</span> @enderror
                    </div>

                    <div class="field-container">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" placeholder="Password" required />
                        @error('password') <span class="error">{{ $message }}</span> @enderror
                    </div>

                    <div class="field-container">
                        <label for="password_confirmation">Confirm Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" required />
                    </div>

                    <div class="terms-container">
                        <input type="checkbox" id="terms" required />
                        <label for="terms">I agree to the terms &amp; policy</label>
                    </div>

                    <div class="signup-container">
                        <button type="submit" class="signup-btn">Sign up</button>
                    </div>

                    <div class="divider-container">
                        <div class="divider">Or</div>
                    </div>

                    <div class="social-login">
                        <button class="social-btn">
                            <img src="{{ asset('images_register/icono_google.png') }}" alt="Google" />
                            Sign in with Google
                        </button>
                        <button class="social-btn">
                            <img src="{{ asset('images_register/icono_apple.png') }}" alt="Apple" />
                            Sign in with Apple
                        </button>
                        <button class="social-btn">
                            <img src="{{ asset('images_register/icono_microsoft.png') }}" alt="Microsoft" />
                            Sign in with Microsoft
                        </button>
                    </div>

                    <div class="signin-container">
                        <p class="signin-link">
                            Have an account?
                            <a href="{{ url('/login') }}">Sign in</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>

        <!-- Columna Derecha -->
        <div class="right-container">
            <img src="{{ asset('images_register/doc_register.png') }}" alt="Doctor" class="right-image" />
        </div>
    </div>
</body>
</html>
