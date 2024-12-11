<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Crear Proveedor</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.16/tailwind.min.css">
  <style>
    body {
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }
    main {
      flex: 1;
    }
  </style>
</head>
<body>
  <header class="bg-green-500 text-white py-4">
    <nav class="container mx-auto flex justify-between items-center">
      <a href="/index.php" class="text-xl font-bold">Macrobiotica</a>
      <ul class="flex space-x-4">
        <li><a href="/index.php" class="hover:text-gray-300">Inicio</a></li>
      </ul>
    </nav>
  </header>

  <main class="bg-gray-100 py-12">
    <div class="container mx-auto">
      <h2 class="text-2xl font-bold mb-6 text-center">Crear Proveedor</h2>
      <form action="index.php?controller=Proveedores&action=insertarProveedor" method="POST" class="bg-white p-8 shadow-md rounded-lg">
        <input type="hidden" name="action" value="crearProveedor">

        <div class="mb-4">
          <label for="nombre" class="block text-gray-700 font-bold">Nombre</label>
          <input type="text" id="nombre" name="nombre" class="w-full px-4 py-2 border rounded-lg" required>
        </div>

        <div class="mb-4">
          <label for="apellido1" class="block text-gray-700 font-bold">Primer Apellido</label>
          <input type="text" id="apellido1" name="apellido1" class="w-full px-4 py-2 border rounded-lg" required>
        </div>

        <div class="mb-4">
          <label for="apellido2" class="block text-gray-700 font-bold">Segundo Apellido</label>
          <input type="text" id="apellido2" name="apellido2" class="w-full px-4 py-2 border rounded-lg">
        </div>

        <div class="mb-4">
          <label for="telefono" class="block text-gray-700 font-bold">Teléfono</label>
          <input type="text" id="telefono" name="telefono" class="w-full px-4 py-2 border rounded-lg">
        </div>

        <div class="mb-4">
          <label for="id_direccion" class="block text-gray-700 font-bold">ID Dirección</label>
          <input type="number" id="id_direccion" name="id_direccion" class="w-full px-4 py-2 border rounded-lg">
        </div>

        

        <div class="text-center">
          <button type="submit" class="bg-green-500 text-white px-6 py-2 rounded-lg hover:bg-green-600">Guardar</button>
        </div>
      </form>
    </div>
  </main>

  <footer class="bg-green-500 text-white py-4">
    <div class="container mx-auto text-center">
      <p>&copy; 2024 Macrobiotica. Todos los derechos reservados.</p>
    </div>
  </footer>
</body>
</html>
