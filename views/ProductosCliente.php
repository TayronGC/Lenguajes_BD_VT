<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <link rel="stylesheet" href="/public/css/style.css">
    <style>
        .alert {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            padding: 10px 20px;
            margin-bottom: 20px;
            border-radius: 5px;
            text-align: center;
            display: none; /* Oculto inicialmente */
        }

        .alert.show {
            display: block; /* Mostrar mensaje cuando se añade el producto */
        }
    </style>
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
                        <li><a href="index.php">Inicio</a></li>
                        <li><a href="index.php?controller=Cliente&action=verTodosproductos">Productos</a></li>
                        <li><a href="index.php?controller=Cliente&action=verTodasPromociones">Promociones</a></li>
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

            <!-- Contenedor para el mensaje de éxito -->
            <div id="successMessage" class="alert"></div>

            <?php if (!empty($productos)) : ?>
                <?php foreach ($productos as $producto): ?>
                    <div class="about-content">
                        <div class="about-txt">
                          

                            
                            <h2><?= htmlspecialchars($producto['NOMBRE_PRODUCTO']) ?></h2>
                            <p><?= htmlspecialchars($producto['DESCRIPCION']) ?></p>
                            <p>Precio: ₡<?= htmlspecialchars($producto['PRECIO_UNITARIO']) ?></p>
                            <!-- Añadir producto con evento para evitar recarga -->
                            <button class="btn-2" onclick="addToCart(<?= htmlspecialchars($producto['ID_PRODUCTO']) ?>, '<?= htmlspecialchars($producto['NOMBRE_PRODUCTO']) ?>')">Comprar</button>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="about-content">
                    <div class="about-txt">
                        <h2>¡Ups!</h2>
                        <p>No hay productos disponibles</p>
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

    <script>
        // Función para añadir producto al carrito
        function addToCart(productId, productName) {
            const url = `index.php?controller=Carrito&action=agregarAlCarrito&id=${productId}&cantidad=1`;

            // Hacer la solicitud sin recargar la página
            fetch(url)
                .then(response => {
                    if (response.ok) {
                        // Mostrar mensaje de éxito
                        const message = document.getElementById('successMessage');
                        message.textContent = `¡Producto "${productName}" agregado al carrito correctamente!`;
                        message.classList.add('show');

                        // Ocultar mensaje después de 3 segundos
                        setTimeout(() => {
                            message.classList.remove('show');
                        }, 3000);
                    } else {
                        alert('Ocurrió un error al agregar el producto. Por favor, inténtalo nuevamente.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Hubo un problema al procesar la solicitud.');
                });
        }
    </script>
</body>
</html>
