<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <link rel="stylesheet" href="/public/css/style.css">
</head>

<body>

    <header class="header">
        <div class="container">
            <div class="menu">
                <div class="logo">
                    <img src="/public/img/macrologo.png" alt="Logo">
                </div>
                <div class="navbar">
                    <ul>
                        <li><a href="/views/dashboard.php">Inicio</a></li>
                        <li><a href="/views/ProductosCliente.php">Productos</a></li>
                        <li><a href="/views/PromocionesCliente.php">Promociones</a></li>
                    </ul>
                </div>
            </div>

            <div class="header-content">
                <div class="header-txt">
                    <h1>Productos</h1>
                    <p>Explora nuestros productos y encuentra lo que necesitas</p>
                </div>
            </div>
        </div>
    </header>

    <section class="about">
        <div class="container">
            <?php if (!empty($productos)) : ?>
                <?php foreach ($productos as $producto): ?>
            <div class="about-content">
                <div class="about-txt">
                    <h2><?= $producto['NOMBRE_PRODUCTO'] ?></h2>
                    <p><?= $producto['DESCRIPCION'] ?></p>
                    <p>Precio: ₡<?= $producto['PRECIO_UNITARIO'] ?></p>
                    <a class="btn-2" href="index.php?controller=Carrito&action=agregarAlCarritoBoton&id=<?= $producto['ID_PRODUCTO'] ?>" >Comprar</a>
                    <!--<input type="submit" class="submit">-->
                </div>
            </div>
            <?php endforeach; ?>
            <?php else: ?>
            <div class="about-content">
                <div class="about-txt">
                    <h2>¡Ups!</h2>
                    <p>No hay productos disponibles</p>
                    <button class="btn-2">Comprar</button>
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
<script>
    function addToCart(productId, price) {
        const url = `index.php?controller=Carrito&action=agregarAlCarrito&id=${productId}&cantidad=1`;
        console.log('idproducto: ',productId)
        console.log('Precio',price)
        window.location.href = url;
    }
</script>
</html>