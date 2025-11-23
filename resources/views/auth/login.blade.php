<!DOCTYPE html>
<html lang="es-pe">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<body>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <section class="login-container">

        <div class="login-box">

            <!-- IMAGEN -->
            <div class="img-login">
                <img src="{{ asset('img/login/img-login.png') }}" alt="img-login">
            </div>

            <!-- FORMULARIO -->
            <div class="form-login">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <h1 class="titulo">¡Bienvenido(a)!</h1>
                    <p class="subtitulo">Qué bueno tenerte de vuelta. Inicia sesión para acceder a tu cuenta.</p>

                    <!-- Email -->
                    <div class="mt-4">
                        <x-input-label for="email" :value="__('Correo Electrónico')" /><br>
                        <x-text-input id="email" placeholder="Ingrese su correo@ejemplo.com" class="block mt-1 w-full" type="email" name="email"
                            :value="old('email')" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div><br>

                    <!-- Password -->
                    <div class="mt-4">
                        <x-input-label for="password" :value="__('Contraseña')" /><br>
                        <x-text-input id="password" class="block mt-1 w-full"
                            type="password" placeholder="Ingrese su contraseña" name="password" required autocomplete="current-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Enlaces -->
                    <div class="acciones">
                        @if (Route::has('password.request'))
                        <a class="forgot-link" href="{{ route('password.request') }}">
                            ¿Olvidaste tu contraseña?
                        </a>
                        @endif

                        <x-primary-button class="btn-login">Ingresar</x-primary-button>
                    </div>

                </form>
            </div>

        </div>

    </section>

</body>

</html>