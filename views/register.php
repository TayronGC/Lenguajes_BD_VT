<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <link rel="stylesheet" href="../public/css/styles_aut.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="wrapper">
        <div class="container main">
            <div class="row">
                <!-- Imagen lateral -->
                <div class="col-md-6 side-image">

                </div>

                <!-- Formulario de registro -->
                <div class="col-md-6 right">
                    <div class="input-box">
                        <header>Bienvenido, Regístrate</header>

                        <?php if (!empty($message)): ?>
                            <div class="alert alert-warning text-center" role="alert">
                                <?= $message; ?>
                            </div>
                        <?php endif; ?>

                        <form action="../controllers/RegistroController.php" method="POST">
                            <div class="input-field">
                                <input type="text" class="input" id="nombre" name="nombre" required autocomplete="off">
                                <label for="nombre">Nombre</label>
                            </div>
                            <div class="input-field">
                                <input type="text" class="input" id="apellido1" name="apellido1" required>
                                <label for="apellido1">Apellido 1</label>
                            </div>
                            <div class="input-field">
                                <input type="text" class="input" id="apellido2" name="apellido2" required>
                                <label for="apellido2">Apellido 2</label>
                            </div>
                            <div class="input-field">
                                <input type="email" class="input" id="correo" name="correo" required>
                                <label for="correo">Correo Electrónico</label>
                            </div>
                            <div class="input-field">
                                <select class="input" name="direccion_pais" id="direccion_pais" required>
                                    <option value="" disabled selected>Selecciona el país</option>
                                    <option value="1">Argentina</option>
                                    <option value="2">Costa Rica</option>
                                    <option value="3">Estados Unidos</option>
                                </select>
                                <label for="direccion_pais">País</label>
                            </div>
                            <div class="input-field">
                                <select class="input" name="direccion_provincia" id="direccion_provincia" required>
                                    <option value="" disabled selected>Selecciona la provincia</option>
                                    <option value="1">San José</option>
                                    <option value="2">Alajuela</option>
                                    <option value="3">Cartago</option>
                                </select>
                                <label for="direccion_provincia">Provincia</label>
                            </div>
                            <div class="input-field">
                                <select class="input" name="direccion_canton" id="direccion_canton" required>
                                    <option value="" disabled selected>Selecciona el cantón</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="otro">Otro</option>
                                </select>
                                <label for="direccion_canton">Cantón</label>
                            </div>
                            <div class="input-field" id="cantonCustom" style="display:none;">
                                <input type="text" class="input" id="canton_especifico" name="canton_especifico" placeholder="Especifique el cantón">
                            </div>
                            <div class="input-field">
                                <input type="tel" class="input" id="telefono" name="telefono" required placeholder="Ingrese su número de teléfono">
                                <label for="telefono">Teléfono</label>
                            </div>
                            <div class="input-field">
                                <input type="text" class="input" id="direccion" name="direccion" required>
                                <label for="direccion">Dirección</label>
                            </div>
                            <div class="input-field">
                                <input type="text" class="input" id="nombre_usuario" name="nombre_usuario" required autocomplete="off">
                                <label for="nombre_usuario">Nombre de Usuario</label>
                            </div>
                            <div class="input-field">
                                <input type="password" class="input" id="contrasena" name="contrasena" required>
                                <label for="contrasena">Contraseña</label>
                            </div>
                            <div class="input-field">
                                <input type="submit" class="submit" value="Registrar">
                            </div>
                        </form>

                        <div class="signin">
                            <span>¿Ya tienes una cuenta? <a href="login.php">Inicia sesión aquí</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.getElementById('direccion_canton').addEventListener('change', function() {
            const cantonCustom = document.getElementById('cantonCustom');
            if (this.value === 'otro') {
                cantonCustom.style.display = 'block';
            } else {
                cantonCustom.style.display = 'none';
            }
        });
    </script>

</body>

</html>