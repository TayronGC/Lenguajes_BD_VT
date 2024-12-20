<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Promociones</title>
    <link rel="stylesheet" href="/public/css/style.css">
</head>

<body>

    <header class="header">
        <div class="container">
            <div class="menu">
                <div class="logo">
                    <img class="ml-2" src="/public/img/macrologo.png" alt="Logo">
                </div>
                <div class="navbar">
                    <ul>
                        <li><a href="index.php">Inicio</a></li>
                        <li><a href="index.php?controller=Cliente&action=verTodosproductos">Productos</a></li>
                        <li><a href="index.php?controller=Cliente&action=verTodasPromociones">Promociones</a></li>
                    </ul>
                </div>
            </div>

            <div class="header-content">
                <div class="header-txt">
                    <h1>Promociones</h1>
                    <p>Aprovecha nuestras ofertas y descuentos exclusivos</p>
                </div>
            </div>
        </div>
    </header>

    <section class="about">
        <div class="container">

        <?php if (!empty($promociones)) : ?>
            <?php foreach ($promociones as $promocion): ?>
            <div class="about-content">
                <div class="about-txt">
                    <h2><?= $promocion['DESCRIPCION'] ?></h2>
                    <p>Obtén un descuento del <?= $promocion['DESCUENTO'] ?>%</p>
                    <p>Aprovecha ahora porque acaba el <?= $promocion['FECHA_FIN'] ?></p>
                    <p>Producto: <?= $promocion['NOMBRE_PRODUCTO'] ?>, Precio antes: <?= $promocion['PRECIO_UNITARIO'] ?></p>
                    <p>Precio ahora: <?= $promocion['PRECIO_FINAL'] ?></p>
                    <button class="btn-2">Aprovechar</button>
                </div>
            </div>
            <?php endforeach; ?>
            <?php else: ?>
            <div class="about-content">
                <div class="about-txt">
                    <h2>Ups</h2>
                    <p>No hay Promociones Disponibles</p>
                </div>
            </div>
            </div>
            <?php endif; ?>

        </div>
    </section>
    
    <footer class="footer">
        <div class="footer-copy">
            <p>Lenguajes de Bases de Datos. Grupo 2. Todos los derechos reservados.</p>
        </div>
    </footer>

</body>

</html>