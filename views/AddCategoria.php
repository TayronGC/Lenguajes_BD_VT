<?php
session_start();
if($_SESSION['role_id'] != 1){
  header("Location: index.php");
  exit();
}
//echo "Bienvenido, Usuario ID: " . $_SESSION['user_id'] . " y el rol " . $_SESSION['role_id'];
?>

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
      <a href="index.php?controller=Admin&action=adminPage" class="text-xl font-bold">Macrobiotica</a>
      <ul class="flex space-x-4">
        <li><a href="index.php?controller=Admin&action=adminPage" class="hover:text-gray-300">Inicio</a></li>
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
            <th style="display:none;" class="py-3 px-6 text-left">ESTADO</th>
            <th class="py-3 px-6 text-center">Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php if (!empty($categorias)) : ?>
            <?php foreach ($categorias as $categoria): ?>
            <tr class="border-b">
              <td class="py-3 px-6"><?= $categoria['ID_CATEGORIA'] ?></td>
              <td class="py-3 px-6"><?= $categoria['NOMBRE_CATEGORIA'] ?></td>
              <td class="py-3 px-6"><?= $categoria['DESCRIPCION'] ?></td>
              <td style="display:none;" class="py-3 px-6"><?= $categoria['ID_ESTADO'] ?></td>
              <td class="py-3 px-6 text-center">
                <button class="text-blue-500 hover:underline" onclick="openEditModal(<?= $categoria['ID_CATEGORIA'] ?>, '<?= $categoria['NOMBRE_CATEGORIA'] ?>', '<?= $categoria['DESCRIPCION'] ?>', <?= $categoria['ID_ESTADO'] ?>)">Editar</button> |
                <button class="text-red-500 hover:underline" onclick="openDeleteModal(<?= $categoria['ID_CATEGORIA'] ?>, '<?= $categoria['NOMBRE_CATEGORIA'] ?>')">Eliminar</button>
              </td>
            </tr>
            <?php endforeach; ?>
          <?php else: ?>
            <tr class="border-b">
              <td class="py-3 px-6">No se encontraron categorías</td>
            </tr>
          <?php endif; ?>
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
      <form action="index.php?controller=Categoria&action=insertarCategoria" method="post">
        <div class="mb-4">
          <label for="nombreCategoria" class="block text-sm font-medium text-gray-700">Nombre Categoría</label>
          <input type="text" id="nombreCategoria" name="nombre_categoria" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
        </div>
        <div class="mb-4">
          <label for="descripcionCategoria" class="block text-sm font-medium text-gray-700">Descripción</label>
          <input type="text" id="descripcionCategoria" name="descripcion" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
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
      <form action="index.php?controller=Categoria&action=modificarCategoria" method="post">
      <input type="hidden" id="editCategoryId" name="id_categoria" value="">
        <div class="mb-4">
          <label for="editNombreCategoria" class="block text-sm font-medium text-gray-700">Nombre Categoría</label>
          <input type="text" id="editNombreCategoria" name="nombre_categoria" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" value="">
        </div>
        <div class="mb-4">
          <label for="editDescripcionCategoria" class="block text-sm font-medium text-gray-700">Descripción</label>
          <input type="text" id="editDescripcionCategoria" name="descripcion" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" value="">
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
    <form action="index.php?controller=Categoria&action=inactivarCategoria" method="post">
      <h3 class="text-xl font-semibold mb-4">Eliminar Categoría</h3>
      <p class="mb-4">¿Estás seguro de que deseas eliminar esta categoría?</p>
        <input type="hidden" id="deleteCategoryId" name="id_categoria" value="">
        <p id="categoryName" class="text-lg font-medium mb-4"></p>
      <div class="flex justify-end space-x-4">
        <button type="button" class="bg-gray-500 text-white px-4 py-2 rounded-md" onclick="closeDeleteModal()">Cancelar</button>
        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md">Eliminar</button>
      </div>
    </form>
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

    function openEditModal(categoryId, categoryName, categoryDescripcion,idEstado) {
      document.getElementById('editCategoryId').value = categoryId;
      document.getElementById('editNombreCategoria').value = categoryName;
      document.getElementById('editDescripcionCategoria').value = categoryDescripcion;
      //document.getElementById('editIdEstado').value = idEstado;
      //console.log('Eliminar ', categoryId);
      //document.getElementById('categoryName').value = categoryName;
      document.getElementById('editModal').classList.remove('hidden');
    }

    function closeEditModal() {
      document.getElementById('editModal').classList.add('hidden');
    }

    function openDeleteModal(categoryId, categoryName) {
      document.getElementById('deleteCategoryId').value = categoryId;
      //console.log('Eliminar ', categoryId);
      document.getElementById('categoryName').innerText = categoryName;
      
      document.getElementById('deleteModal').classList.remove('hidden');

    }

    function closeDeleteModal() {
      document.getElementById('deleteModal').classList.add('hidden');
    }
  </script>
</body>
</html>
