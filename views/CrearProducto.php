<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Crear Producto</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.16/tailwind.min.css">
</head>
<body>
  <header class="bg-green-500 text-white py-4">
    <nav class="container mx-auto flex justify-between items-center">
      <a href="/index.php" class="text-xl font-bold">Macrobiotica</a>
      <ul class="flex space-x-4">
      </ul>
    </nav>
  </header>

  <main class="bg-gray-100 py-12">
    <div class="container mx-auto">
      <h2 class="text-2xl font-bold mb-6 text-center">Crear Producto</h2>
      <form action="index.php?controller=Producto&action=insertarProducto" method="POST" class="bg-white shadow-md rounded-lg p-6">
        <div class="mb-4">
          <label for="nombreProducto" class="block text-sm font-medium text-gray-700">Nombre Producto</label>
          <input type="text" id="nombreProducto" name="nombreProducto" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
        </div>
        <div class="mb-4">
          <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción</label>
          <input type="text" id="descripcion" name="descripcion" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
        </div>
        <div class="mb-4">
          <label for="precioUnitario" class="block text-sm font-medium text-gray-700">Precio Unitario</label>
          <input type="number" id="precioUnitario" name="precioUnitario" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
        </div>
        <div class="mb-4">
          <label for="fechaVencimiento" class="block text-sm font-medium text-gray-700">Fecha de Vencimiento</label>
          <input type="date" id="fechaVencimiento" name="fechaVencimiento" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
        </div>
        <div class="mb-4">
          <label for="categoria" class="block text-sm font-medium text-gray-700">Categoría</label>
          <select id="categoria" name="categoria" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" >
          </select>
        </div>
        <div class="mb-4">
          <label for="proveedor" class="block text-sm font-medium text-gray-700">Proveedor</label>
          <select id="proveedor" name="proveedor" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" >
          </select>
        </div>
        <div class="mb-4">
          <label for="estado" class="block text-sm font-medium text-gray-700">Estado</label>
          <select id="estado" name="estado" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" >
          </select>
        </div>
        <div class="mb-4">
          <label for="accion" class="block text-sm font-medium text-gray-700">Acción</label>
          <input type="text" id="accion" name="accion" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
        </div>
        <div class="flex justify-end space-x-4">
          <button type="button" class="bg-gray-500 text-white px-4 py-2 rounded-md" onclick="window.location.href='/productos.php'">Cancelar</button>
          <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-md">Crear Producto</button>
        </div>
      </form>
    </div>
  </main>
</body>
</html>
