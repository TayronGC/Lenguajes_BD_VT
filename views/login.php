<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="../public/css/Styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-black">

    <section class="d-flex align-items-center justify-content-center min-vh-100">
        <div class="card bg-dark text-light p-4 shadow-lg" style="max-width: 400px; width: 100%; border-radius: 10px;">
            <div class="text-center mb-4">
                <img src="../public/img/macrologo.png" class="img-fluid rounded-circle" style="max-width: 150px;" alt="Logo">
            </div>
            <h1 class="font-weight-bold text-center mb-4">Bienvenido, Inicia Sesión</h1>
            <?php if (!empty($message)): ?>
            <p class="alert alert-warning"><?= $message; ?></p>
            <?php endif; ?>
            <form action="../controllers/IniciarSessionController.php" method="POST">
                <div class="mb-3">
                    <label for="nombre_usuario" class="form-label">Nombre de Usuario:</label>
                    <input type="text" class="form-control bg-dark text-light border-1" placeholder="Ingrese su usuario" id="nombre_usuario" name="nombre_usuario" >
                </div>
                <div class="mb-3">
                    <label for="contrasena" class="form-label">Contraseña:</label>
                    <input type="password" class="form-control bg-dark text-light border-1" placeholder="Ingrese su contraseña" id="contrasena" name="contrasena" >
                </div>
                <button type="submit" class="btn btn-primary w-100" name="IniciarSesion" values="IniciarSesion">Iniciar Sesión</button>
            </form>

            <div class="text-center pt-3">
                <p class="mb-0">¿No tienes una cuenta?</p>
                <a href="/views/register.php" class="text-primary text-decoration-none font-weight-bold">Regístrate</a>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
