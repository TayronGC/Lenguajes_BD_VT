<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gestión de Categorías</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.16/tailwind.min.css">
  <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
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
      <h2 class="text-2xl font-bold mb-6 text-center">Listado de Categorías</h2>
      <table class="min-w-full bg-white shadow-md rounded-lg">
        <thead class="bg-green-500 text-white">
          <tr>
            <th class="py-3 px-6 text-left">ID Categoría</th>
            <th class="py-3 px-6 text-left">Nombre Categoría</th>
            <th class="py-3 px-6 text-left">Descripción</th>
            <th class="py-3 px-6 text-center">Acciones</th>
          </tr>
        </thead>
        <tbody>
          <tr class="border-b">
            <td class="py-3 px-6">1</td>
            <td class="py-3 px-6">Categoría A</td>
            <td class="py-3 px-6">Descripción de la categoría A</td>
            <td class="py-3 px-6 text-center">
              <button class="text-blue-500 hover:underline" onclick="openEditModal()">Editar</button> |
              <button class="text-red-500 hover:underline" onclick="openDeleteModal()">Eliminar</button>
            </td>
          </tr>
        </tbody>
      </table>

      <div class="text-center mt-6">
        <button class="bg-green-500 text-white px-4 py-2 rounded-md" onclick="openAddModal()">Agregar Categoría</button>
      </div>
    </div>
  </main>

  <div id="addModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex justify-center items-center hidden">
    <div class="bg-white rounded-lg w-1/3 p-6">
      <h3 class="text-xl font-semibold mb-4">Agregar Nueva Categoría</h3>
      <form>
        <div class="mb-4">
          <label for="nombreCategoria" class="block text-sm font-medium text-gray-700">Nombre Categoría</label>
          <input type="text" id="nombreCategoria" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
        </div>
        <div class="mb-4">
          <label for="descripcionCategoria" class="block text-sm font-medium text-gray-700">Descripción</label>
          <input type="text" id="descripcionCategoria" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
        </div>
        <div class="mb-4">
          <label for="estadoCategoria" class="block text-sm font-medium text-gray-700">Estado</label>
          <select id="estadoCategoria" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
            <option value="1">Activo</option>
            <option value="2">Inactivo</option>
          </select>
        </div>
        <div class="flex justify-end space-x-4">
          <button type="button" class="bg-gray-500 text-white px-4 py-2 rounded-md" onclick="closeAddModal()">Cancelar</button>
          <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-md">Agregar</button>
        </div>
      </form>
    </div>
  </div>

  <div id="editModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex justify-center items-center hidden">
    <div class="bg-white rounded-lg w-1/3 p-6">
      <h3 class="text-xl font-semibold mb-4">Editar Categoría</h3>
      <form>
        <div class="mb-4">
          <label for="editNombreCategoria" class="block text-sm font-medium text-gray-700">Nombre Categoría</label>
          <input type="text" id="editNombreCategoria" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" value="Categoría A">
        </div>
        <div class="mb-4">
          <label for="editDescripcionCategoria" class="block text-sm font-medium text-gray-700">Descripción</label>
          <input type="text" id="editDescripcionCategoria" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" value="Descripción de la categoría A">
        </div>
        <div class="mb-4">
          <label for="editEstadoCategoria" class="block text-sm font-medium text-gray-700">Estado</label>
          <select id="editEstadoCategoria" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
            <option value="1">Activo</option>
            <option value="2">Inactivo</option>
          </select>
        </div>
        <div class="flex justify-end space-x-4">
          <button type="button" class="bg-gray-500 text-white px-4 py-2 rounded-md" onclick="closeEditModal()">Cancelar</button>
          <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-md">Guardar Cambios</button>
        </div>
      </form>
    </div>
  </div>

  <div id="deleteModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex justify-center items-center hidden">
    <div class="bg-white rounded-lg w-1/3 p-6">
      <h3 class="text-xl font-semibold mb-4">Eliminar Categoría</h3>
      <p class="mb-4">¿Estás seguro de que deseas eliminar esta categoría?</p>
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
    function openAddModal() {
      document.getElementById('addModal').classList.remove('hidden');
    }

    function closeAddModal() {
      document.getElementById('addModal').classList.add('hidden');
    }

    function openEditModal() {
      document.getElementById('editModal').classList.remove('hidden');
    }

    function closeEditModal() {
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
