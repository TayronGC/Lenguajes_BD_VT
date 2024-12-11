<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="../public/css/styles_aut.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="wrapper">
        <div class="container main">
            <div class="row">
                <!-- Imagen lateral -->
                <div class="col-md-6 side-image">
                <!--<img src="/public/img/logotipo_con_fondo.png" alt="Logo Macro" class="img-fluid" />-->
                </div>

                <!-- Formulario de inicio de sesión -->
                <div class="col-md-6 right">
                    <div class="input-box">
                        <header>Iniciar sesión</header>

                        <!-- Mensaje de error PHP -->
                        <?php if (!empty($error)) { ?>
                            <div class="alert alert-danger text-center" role="alert">
                                <?php echo $error; ?>
                            </div>
                        <?php } ?>

                        <form action="login.php" method="POST">
                            <div class="input-field">
                                <input type="text" class="input" id="nombre_usuario" name="nombre_usuario" required autocomplete="off">
                                <label for="nombre_usuario">Nombre de Usuario</label>
                            </div>
                            <div class="input-field">
                                <input type="password" class="input" id="contrasena" name="contrasena" required>
                                <label for="contrasena">Contraseña</label>
                            </div>
                            <div class="input-field">
                                <input type="submit" class="submit" value="Iniciar">
                            </div>
                        </form>

                        <div class="signin">
                            <span>¿No tienes una cuenta? <a href="register.php">Regístrate aquí</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>