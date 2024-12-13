<?php
session_start();
//$total = 0;
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

    <?php if (isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])): ?>
        <table>
            <thead>
                <tr>
                    <td>Producto</td>
                    <td>Cantidad</td>
                    <td>Precio</td>
                    <td>Subtotal</td>
                </tr>
            </thead>
            <tbody>
                <?php $total = 0;
                foreach ($_SESSION['carrito'] as $carritoItem): 
                    $subtotal = $carritoItem->price * $carritoItem->cantidad;
                    $total += $subtotal;
                ?>
                    <tr>
                        <td><?php echo $carritoItem->name; ?></td>
                        <td><?php echo $carritoItem->cantidad; ?></td>
                        <td><?php echo $carritoItem->price; ?></td>
                        <td>$<?php echo $subtotal; ?></td>
                        <td><a href="index.php?controller=Carrito&action=eliminarProducto&id=<?= $carritoItem->id ?>" >Eliminar Producto</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div class="total">
            <p>Total: $<?php echo $total; ?></p>
        </div>
    <?php else: ?>
        <p>El carrito está vacío</p>
    <?php endif; ?>

</div>

</body>
</html>
