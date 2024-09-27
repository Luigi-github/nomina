<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
        body {
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Sección izquierda (imagen de fondo con overlay oscuro) */
        .left-side {
            background-image: url('/images/login_background.jpg');
            background-size: cover;
            background-position: center;
            position: relative;
            width: 70%;
            height: 100vh;
        }

        /* Overlay oscuro */
        .left-side::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5); /* Más oscuro */
        }

        /* Textos de bienvenida */
        .welcome-text {
            position: relative;
            color: white;
            text-align: left;
            padding-top: 50%; /* Ajustamos el padding para las letras */
            padding-left: 5%; /* Ajustamos el padding para las letras */
            z-index: 1;
        }

        .welcome-text h1 {
            font-size: 1.5rem; /* Tamaño de letra ajustado */
        }

        .welcome-text h1 .highlight {
            font-weight: bold; /* Negrita */
        }

        .welcome-text p {
            font-size: 1.3rem; /* Texto de "Gestión efectiva" un poco más pequeño */
        }

        /* Sección derecha (login sin fondo) */
        .right-side {
            width: 40%;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .login-container {
            width: 70%;
            padding: 20px;
            box-shadow: none; /* Sin fondo ni sombras */
        }

        .login-container h3 {
            text-align: center;
            margin-bottom: 20px;
        }

        /* Redondear botón y casilla */
        .btn-primary {
            background-color: #0a07c3;
            border: none;
            border-radius: 25px; /* Botón más redondeado */
            padding: 10px;
            width: 100%;
        }

        .form-check-input {
            border-radius: 50%; /* Casilla de "Recordarme" redondeada */
        }

        /* Imagen pequeña centrada */
        .login-container img {
            display: block;
            margin: 0 auto;
            width: 100%; /* Ajusta el tamaño de la imagen */
            height: 50%;
            margin-bottom: 20px; /* Espacio entre imagen y formulario */
        }

        /* Estilo del enlace de olvido de contraseña */
        .register {
            text-align: left;
            margin-top: 10px;
        }
    </style>
</head>
<body>

<div class="d-flex" style="width: 100%;">
    <!-- Sección izquierda (imagen de fondo oscurecida) -->
    <div class="left-side">
        <div class="welcome-text">
            <h1>
                Bienvenido a la mejor plataforma<br>
                <span class="highlight">organizacional online</span>
            </h1>
            <br>
            <p>Gestión efectiva del talento humano</p>
        </div>
    </div>

    <!-- Sección derecha (login sin fondo) -->
    <div class="right-side">
        <!-- Mensajes de éxito y error -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="login-container">
            <!-- Imagen pequeña centrada arriba del formulario -->
            <img src="images/logo.jpg" alt="Logo">

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Usuario -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email o usuario</label>
                    <input type="email" class="form-control" id="email" name="email" required autofocus>
                </div>

                <!-- Contraseña -->
                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>

                <!-- Recordarme -->
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" id="remember" name="remember">
                    <label class="form-check-label" for="remember">
                        Recordarme
                    </label>
                </div>

                <!-- Botón de login -->
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Iniciar sesión</button>
                </div>

                <!-- Enlace para olvidar la contraseña -->
                <div class="register">
                    <a href="{{ route('register') }}">Regístrate</a>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
