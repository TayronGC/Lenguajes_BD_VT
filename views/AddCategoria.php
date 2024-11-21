<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Macrobiotica - Añadir Categoría</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.16/tailwind.min.css">
</head>
<body>
<header class="bg-green-500 text-white py-4">
    <nav class="container mx-auto flex justify-between items-center">
      <a href="/index.php" class="text-xl font-bold">Macrobiotica</a>
      <ul class="flex space-x-4">
        <li><a href="/index.php" class="hover:text-gray-300">Inicio</a></li>
        <li><a href="/views/ViewAllCategorias.php" class="hover:text-gray-300">Categorías</a></li>
        <li><a href="/views/register.php" class="hover:text-gray-300">Registrate</a></li>
      </ul>
    </nav>
  </header>
  <section class="bg-gray-100 py-12">
    <div class="container mx-auto max-w-md bg-white shadow-md rounded-lg p-6">
      <h2 class="text-2xl font-bold mb-4">Añadir Categorías</h2>
      <form action="../controllers/CategoriaController.php?action=insertarCategoria" method="post">
        <div class="mb-4">
          <label for="nombre_categoria" class="block font-medium mb-2">Nombre de la Categoría</label>
          <input type="text" id="nombre_categoria" name="nombre_categoria" class="w-full border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring-green-500" required>
        </div>
        <div class="mb-4">
          <label for="descripcion" class="block font-medium mb-2">Descripción</label>
          <input type="text" id="descripcion" name="descripcion" class="w-full border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring-green-500" required>
        </div>
        <button type="submit" class="bg-green-500 text-white py-2 px-4 rounded-md hover:bg-green-600">Añadir Categoría</button>
      </form>
    </div>
  </section>
  <footer class="bg-green-500 text-white py-4">
    <div class="container mx-auto text-center">
      <p>&copy; 2024 Macrobiotica. Todos los derechos reservados.</p>
    </div>
  </footer>
</body>
</html>