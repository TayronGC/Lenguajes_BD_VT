<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <link rel="stylesheet" href="../public/css/Styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-black">

    <section class="d-flex align-items-center justify-content-center min-vh-100">
        <div class="card bg-dark text-light p-4 shadow-lg" style="max-width: 400px; width: 100%; border-radius: 10px;">
            <div class="text-center mb-4">
                <img src="https://cdn.gencraft.com/prod/user/7d8c2e13-44eb-4766-9844-f2b356a645fd/ddf12cda-f144-4bf8-990f-0faf09929a69/image/image0_0.jpg?Expires=1731806054&Signature=dUA~PFfdjV6iE48d4gb-572avO-7f64ipQBySOGiSoLsCoFYeD0hN8yVyGwnBpHb8g7EyX~CPGfcoZYZ5JYV8wDnbAq1y8Y1VhK61305n0lLO5Qr2nbTDvh5QCYH2Y~GzdhzIIe8oAZy4rsGihNkSCKvsK6SXxziFdj0Em5zubOj~0o-F-Na72OwHE5bv6LHIBkMYkPaE3fjkjanAClgKcrxr7XzGKql1sweRWVmr-QX3WnNJ9Xq6IR5UJMd~oCf9F6VKFSHgXZNSm8OYzyEMS~7ChR5JL7fVoqqmEi5qH6C1~hrAf1JQBulXIWCZ9ufXvSkf41QXg7ejHpkaUgekw__&Key-Pair-Id=K3RDDB1TZ8BHT8" class="img-fluid rounded-circle" style="max-width: 150px;" alt="Logo">
            </div>
            <h1 class="font-weight-bold text-center mb-4">Bienvenido, Regístrate</h1>
            <?php if (!empty($message)): ?>
            <p class="alert alert-warning"><?= $message; ?></p>
            <?php endif; ?>
            <form action="../controllers/RegistroController.php" method="POST">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre:</label>
                    <input type="text" class="form-control bg-dark text-light border-1" placeholder="Ingrese Nombre" id="nombre" name="nombre" >
                </div>
                <div class="mb-3">
                    <label for="apellido1" class="form-label">Apellido 1:</label>
                    <input type="text" class="form-control bg-dark text-light border-1" placeholder="Ingrese su Apellido1" id="apellido1" name="apellido1" >
                </div>
                <div class="mb-3">
                    <label for="apellido2" class="form-label">Apellido 2:</label>
                    <input type="text" class="form-control bg-dark text-light border-1" placeholder="Ingrese su Apellido2" id="apellido2" name="apellido2" >
                </div>
                <div class="mb-3">
                    <label for="correo" class="form-label">Correo Electrónico:</label>
                    <input type="email" class="form-control bg-dark text-light border-1" placeholder="Ingrese su Email" id="correo" name="correo" >
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="direccion_pais" class="form-label">Pais:</label>
                        <select class="form-select bg-dark text-light" aria-label="Default select example" name="direccion_pais" id="direccion_pais">
                        <option selected>Open this select menu</option>
                        <option value="1">Argentina</option>
                        <option value="2">Costa Rica</option>
                        <option value="3">Estados Unidos</option>
                        </select>
                    </div>
                    <div class="col">
                        <label for="direccion_provincia" class="form-label">Provincia:</label>
                        <select class="form-select bg-dark text-light" aria-label="Default select example" name="direccion_provincia" id="direccion_provincia">
                        <option selected>Selecciona la Provincia</option>
                        <option value="1">San José</option>
                        <option value="2">Alajuela</option>
                        <option value="3">Cartago</option>
                        <option value="4">Heredia</option>
                        <option value="5">Guanacaste</option>
                        <option value="6">Puntarenas</option>
                        <option value="7">Limón</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3 d-flex gap-3">
                    <div>
                        <label for="direccion_canton" class="form-label">Cantón:</label>
                        <select class="form-select bg-dark text-light" name="direccion_canton" id="direccion_canton">
                            <option selected>Open this select menu</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="otro">Otro</option>
                        </select>
                    </div>
                    <div>
                        <label for="direccion_distrito" class="form-label">Distrito:</label>
                        <select class="form-select bg-dark text-light" name="direccion_distrito" id="direccion_distrito">
                            <option selected>Open this select menu</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3" id="cantonCustom" style="display:none;">
    <label for="canton_especifico" class="form-label">Especifique el cantón:</label>
    <input type="text" id="canton_especifico" class="form-control" name="canton_especifico">
</div>
                <div class="mb-3">
                    <label for="telefono" class="form-label">Teléfono:</label>
                    <input type="tel" pattern:"[0-9]{3}-[0-9]{2}-[0-9]{3}" class="form-control bg-dark text-light border-1" placeholder="Ingrese su numero de telefono" id="telefono" name="telefono" >
                </div>
                <div class="mb-3">
                    <label for="direccion" class="form-label">Direccion:</label>
                    <input type="text" class="form-control bg-dark text-light border-1" placeholder="Ingrese su direccion" id="direccion" name="direccion">
                </div>
                <div class="mb-3">
                    <label for="nombre_usuario" class="form-label">Nombre de Usuario:</label>
                    <input type="text" class="form-control bg-dark text-light border-1" placeholder="Ingrese su usuario" id="nombre_usuario" name="nombre_usuario" >
                </div>
                <div class="mb-3">
                    <label for="contrasena" class="form-label">Contraseña:</label>
                    <input type="password" class="form-control bg-dark text-light border-1" placeholder="Ingrese su contraseña" id="contrasena" name="contrasena" >
                </div>
                <button type="submit" class="btn btn-primary w-100" name="Registro" value="Registrar">Registrar</button>
            </form>

            <div class="text-center pt-3">
                <p class="mb-0">¿Ya tienes una cuenta?</p>
                <a href="index.php?controller=Usuario&action=login" class="text-primary text-decoration-none font-weight-bold">Inicia Sesión</a>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>document.getElementById('direccion_canton').addEventListener('change', function() {
    const cantonCustom = document.getElementById('cantonCustom');
    if (this.value === 'otro') {
        cantonCustom.style.display = 'block';
    } else {
        cantonCustom.style.display = 'none';
    }
});</script>
</body>

</html>
