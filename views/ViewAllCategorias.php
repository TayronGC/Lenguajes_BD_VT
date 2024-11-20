<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todas las Categorias</title>
    <link rel="stylesheet" href="Styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php if (!empty($categorias)): ?>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Id Categoria</th>
      <th scope="col">Nombre de la Categoria</th>
      <th scope="col">Descripcion de la Categoria</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($categorias as $categoria): ?>
    <tr>
      <th scope="row">1</th>
      <td><?php echo $categoria['ID_CATEGORIA']; ?></td>
      <td><?php echo $categoria['NOMBRE_CATEGORIA']; ?></td>
      <td><?php echo $categoria['DESCRIPCION']; ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<?php else: ?>
    <p>No se encontraron categorías.</p>
<?php endif; ?>
</body>
</html>