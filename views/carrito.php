<?php
session_start();
$total = 0;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        
        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: left;
            font-size: 16px;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .total {
            text-align: right;
            margin-top: 20px;
            font-size: 18px;
            font-weight: bold;
        }

        .btn-eliminar {
            color: #fff;
            background-color: #e74c3c;
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-eliminar:hover {
            background-color: #c0392b;
        }

        .btn-comprar {
            display: block;
            width: 100%;
            background-color: #27ae60;
            padding: 12px;
            text-align: center;
            color: #fff;
            font-size: 18px;
            border: none;
            border-radius: 5px;
            margin-top: 20px;
            cursor: pointer;
        }

        .btn-comprar:hover {
            background-color: #2ecc71;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Tu carrito de compras</h2>

    <?php
    if (isset($_SESSION['carrito']) && count($_SESSION['carrito']) > 0) {
        echo "<table>";
        echo "<tr><th>Producto</th><th>Cantidad</th><th>Precio</th><th>Total</th><th>Acción</th></tr>";
        foreach ($_SESSION['carrito'] as $producto) {
            $subtotal = $producto['precio'] * $producto['cantidad'];
            $total += $subtotal;
            echo "<tr>
                    <td>{$producto['nombre']}</td>
                    <td>{$producto['cantidad']}</td>
                    <td>\${$producto['precio']}</td>
                    <td>\${$subtotal}</td>
                    <td><a href='carrito.php?eliminar={$producto['id_producto']}' class='btn-eliminar'>Eliminar</a></td>
                </tr>";
        }
        echo "</table>";

        echo "<div class='total'>Total: \${$total}</div>";
        echo "<button class='btn-comprar'><a href='pago.php' style='color: #fff; text-decoration: none;'>Proceder a la compra</a></button>";
    } else {
        echo "<p>Tu carrito está vacío.</p>";
    }
    ?>
</div>

</body>
</html>
