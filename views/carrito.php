<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color:rgb(156, 153, 153);
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            animation: fadeIn 0.5s ease-in-out;
        }

        h2 {
            text-align: center;
            color: #333333;
            margin-bottom: 20px;
            font-weight: bold;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table,
        th,
        td {
            border: 1px solid #dddddd;
        }

        th,
        td {
            padding: 16px;
            text-align: center;
            font-size: 16px;
        }

        th {
            background-color: #0275d8;
            color: white;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #e9ecef;
        }

        .total {
            text-align: right;
            margin-top: 20px;
            font-size: 20px;
            font-weight: bold;
            color: #333333;
        }

        .btn-eliminar {
            color: #ffffff;
            background-color: #e74c3c;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            transition: background-color 0.3s;
        }

        .btn-eliminar:hover {
            background-color: #c0392b;
        }

        .btn-comprar {
            display: block;
            width: 100%;
            max-width: 300px;
            margin: 20px auto;
            background-color: #5cb85c;
            padding: 15px;
            text-align: center;
            color: white;
            font-size: 18px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .btn-comprar:hover {
            background-color: #4cae4c;
        }

        .empty-message {
            text-align: center;
            color: #888888;
            font-size: 18px;
            margin: 40px 0;
        }

        .alert {
            font-size: 16px;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
        }

        .alert-success {
            background-color: #dff0d8;
            color: #3c763d;
        }

        .alert-danger {
            background-color: #f2dede;
            color: #a94442;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (max-width: 768px) {
            table,
            th,
            td {
                font-size: 14px;
            }

            .btn-comprar {
                font-size: 16px;
            }
        }
    </style>
</head>

<body>
    <nav aria-label="breadcrumb" class="p-3">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
            <li class="breadcrumb-item active" aria-current="page">Carrito</li>
        </ol>
    </nav>

    <div class="container">
        <h2>Tu carrito de compras</h2>

        <?php if (isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])): ?>
            <div class="alert alert-success">
                ¡Has agregado productos a tu carrito! Finaliza tu compra cuando estés listo.
            </div>

            <table>
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Precio</th>
                        <th>Subtotal</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $total = 0;
                    foreach ($_SESSION['carrito'] as $carritoItem):
                        $subtotal = $carritoItem->price * $carritoItem->cantidad;
                        $total += $subtotal;
                    ?>
                        <tr>
                            <td><?php echo htmlspecialchars($carritoItem->name); ?></td>
                            <td><?php echo (int)$carritoItem->cantidad; ?></td>
                            <td>$<?php echo number_format($carritoItem->price, 2); ?></td>
                            <td>$<?php echo number_format($subtotal, 2); ?></td>
                            <td><button class="btn-eliminar" onclick="confirmarEliminacion('<?php echo $carritoItem->id; ?>')">Eliminar</button></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <div class="total">
                <p>Total: $<?php echo number_format($total, 2); ?></p>
            </div>

            <a href="index.php?controller=Factura&action=insertarFactura" class="btn-comprar">Finalizar Compra</a>
        <?php else: ?>
            <div class="alert alert-danger">
                Tu carrito está vacío. ¡Añade productos para comenzar tu compra!
            </div>
            <p class="empty-message">Parece que aún no has agregado productos. <a href="index.php">Volver a la tienda</a></p>
        <?php endif; ?>
    </div>

    <script>
        function confirmarEliminacion(productId) {
            if (confirm('¿Estás seguro de que deseas eliminar este producto del carrito?')) {
                window.location.href = `index.php?controller=Carrito&action=eliminarProducto&id=${productId}`;
            }
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>
