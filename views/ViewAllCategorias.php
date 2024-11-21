<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Categorías</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.16/tailwind.min.css">
</head>
<body>
<header class="bg-green-500 text-white py-4">
    <nav class="container mx-auto flex justify-between items-center">
      <a href="/index.php" class="text-xl font-bold">Macrobiotica</a>
      <ul class="flex space-x-4">
        <li><a href="/index.php" class="hover:text-gray-300">Inicio</a></li>
        <li><a href="/views/AddCategoria.php" class="hover:text-gray-300">Añadir Categorías</a></li>
        <li><a href="/views/register.php" class="hover:text-gray-300">Registrate</a></li>
      </ul>
    </nav>
  </header>
  <section class="bg-gray-100 py-12">
    <div class="container mx-auto">
      <?php if (!empty($categorias)): ?>
      <table class="table-auto w-full bg-white shadow-md rounded-lg overflow-hidden">
        <thead>
          <tr class="bg-green-500 text-white">
            <th class="px-4 py-3">#</th>
            <th class="px-4 py-3">Category ID</th>
            <th class="px-4 py-3">Category Name</th>
            <th class="px-4 py-3">Category Description</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($categorias as $categoria): ?>
          <tr class="border-b">
            <td class="px-4 py-3">1</td>
            <td class="px-4 py-3"><?php echo $categoria['ID_CATEGORIA']; ?></td>
            <td class="px-4 py-3"><?php echo $categoria['NOMBRE_CATEGORIA']; ?></td>
            <td class="px-4 py-3"><?php echo $categoria['DESCRIPCION']; ?></td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
      <?php else: ?>
      <p class="text-gray-600 text-center">No se han encontrado categorías</p>
      <?php endif; ?>
    </div>
  </section>
  <footer class="bg-green-500 text-white py-4">
    <div class="container mx-auto text-center">
      <p>&copy; 2024 Macrobiotica. Todos los derechos reservados.</p>
    </div>
  </footer>
</body>
</html>