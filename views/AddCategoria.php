<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <section>
        <form action="../controllers/CategoriaController.php?action=insertarCategoria" method="post">

            <label>Nombre Categoria
            <input type="text" name="nombre_categoria"></label>

            <label>Descripcion
            <input type="text" name="descripcion"></label>
            <button type="submit">Agregar Categoria</button>
            </form>
    </section>
</body>
</html>