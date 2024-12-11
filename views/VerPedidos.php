<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ver Pedidos</title>
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
      <h2 class="text-2xl font-bold mb-6 text-center">Listado de Pedidos</h2>
      <table class="min-w-full bg-white shadow-md rounded-lg">
        <thead class="bg-green-500 text-white">
          <tr>
            <th class="py-3 px-6 text-left">ID Pedido</th>
            <th class="py-3 px-6 text-left">Fecha Pedido</th>
            <th class="py-3 px-6 text-left">Proveedor</th>
            <th class="py-3 px-6 text-left">Persona</th>
            <th class="py-3 px-6 text-left">Creado Por</th>
            <th class="py-3 px-6 text-left">Fecha Creación</th>
            <th class="py-3 px-6 text-left">Acción</th>
            <th class="py-3 px-6 text-center">Acciones</th>
          </tr>
        </thead>
        <tbody>
          <tr class="border-b">
            <td class="py-3 px-6">1</td>
            <td class="py-3 px-6">2024-12-10</td>
            <td class="py-3 px-6">Proveedor A</td>
            <td class="py-3 px-6">Persona X</td>
            <td class="py-3 px-6">Admin</td>
            <td class="py-3 px-6">2024-12-10 10:00:00</td>
            <td class="py-3 px-6">Nuevo Pedido</td>
            <td class="py-3 px-6 text-center">
              <button class="text-blue-500 hover:underline" onclick="openEditModal()">Editar</button> |
              <a href="#" class="text-red-500 hover:underline">Eliminar</a>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </main>

  <div id="editModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex justify-center items-center hidden">
    <div class="bg-white rounded-lg w-1/3 p-6">
      <h3 class="text-xl font-semibold mb-4">Editar Pedido</h3>
      <form>
        <div class="mb-4">
          <label for="fechaPedido" class="block text-sm font-medium text-gray-700">Fecha Pedido</label>
          <input type="date" id="fechaPedido" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" value="2024-12-10">
        </div>
        <div class="mb-4">
          <label for="proveedor" class="block text-sm font-medium text-gray-700">Proveedor</label>
          <input type="text" id="proveedor" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" value="Proveedor A">
        </div>
        <div class="mb-4">
          <label for="persona" class="block text-sm font-medium text-gray-700">Persona</label>
          <input type="text" id="persona" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" value="Persona X">
        </div>
        <div class="mb-4">
          <label for="accion" class="block text-sm font-medium text-gray-700">Acción</label>
          <input type="text" id="accion" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" value="Nuevo Pedido">
        </div>
        <div class="mb-4">
          <label for="estado" class="block text-sm font-medium text-gray-700">Estado</label>
          <select id="estado" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
            <option value="1" selected>Activo</option>
            <option value="2">Inactivo</option>
          </select>
        </div>
        <div class="flex justify-end space-x-4">
          <button type="button" class="bg-gray-500 text-white px-4 py-2 rounded-md" onclick="closeModal()">Cancelar</button>
          <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-md">Guardar Cambios</button>
        </div>
      </form>
    </div>
  </div>

  <div id="deleteModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex justify-center items-center hidden">
    <div class="bg-white rounded-lg w-1/3 p-6">
      <h3 class="text-xl font-semibold mb-4">Eliminar Pedido</h3>
      <p class="mb-4">¿Estás seguro de que deseas eliminar este pedido?</p>
      <div class="flex justify-end space-x-4">
        <button type="button" class="bg-gray-500 text-white px-4 py-2 rounded-md" onclick="closeDeleteModal()">Cancelar</button>
        <button type="button" class="bg-red-500 text-white px-4 py-2 rounded-md">Eliminar</button>
      </div>
    </div>
  </div>

  <footer class="bg-green-500 text-white py-4">
    <div class="container mx-auto text-center">
      <p>&copy; 2024 Macrobiotica. Todos los derechos reservados.</p>
    </div>
  </footer>

  <script>
    function openEditModal() {
      document.getElementById('editModal').classList.remove('hidden');
    }

    function closeModal() {
      document.getElementById('editModal').classList.add('hidden');
    }

    function openDeleteModal() {
      document.getElementById('deleteModal').classList.remove('hidden');
    }

    function closeDeleteModal() {
      document.getElementById('deleteModal').classList.add('hidden');
    }
  </script>
</body>
</html>
