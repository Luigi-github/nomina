<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>

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

        /* Sección del formulario de registro */
        .register-container {
            width: 30%;
            padding: 20px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            background-color: #ffffff; /* Fondo blanco para el formulario */
        }

        .register-container h3 {
            text-align: center;
            margin-bottom: 20px;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            border-radius: 25px; /* Botón más redondeado */
            padding: 10px;
            width: 100%;
        }
    </style>
</head>
<body>

<div class="register-container">
    <h3>Registro</h3>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Nombres -->
        <div class="mb-3">
            <label for="name" class="form-label">Nombres</label>
            <input type="text" class="form-control" id="name" name="name" required autofocus>
        </div>

        <!-- Correo electrónico -->
        <div class="mb-3">
            <label for="email" class="form-label">Correo electrónico</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>

        <!-- Contraseña -->
        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>

        <!-- Confirmación de contraseña -->
        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirmar contraseña</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
        </div>

        <!-- Botón de registro -->
        <div class="d-grid">
            <button type="submit" class="btn btn-primary">Registrarse</button>
        </div>

        <div class="text-center mt-3">
            <a href="{{ route('welcome') }}">¿Ya tienes cuenta? Inicia sesión</a>
        </div>
    </form>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
