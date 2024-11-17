<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <section>
    <form action="../controllers/CategoriaController.php" method="get">
    <input type="hidden" name="action" value="verCategoria">
    <label>Digita el id Categoria:</label>
    <input type="number" name="id_categoria" required>
    <button type="submit">Ver Categoría</button>
</form>
    </section>
</body>
</html>