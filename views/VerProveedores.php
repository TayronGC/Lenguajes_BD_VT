<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ver Proveedores</title>
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
      <h2 class="text-2xl font-bold mb-6 text-center">Listado de Proveedores</h2>
      <table class="min-w-full bg-white shadow-md rounded-lg">
        <thead class="bg-green-500 text-white">
          <tr>
            <th class="py-3 px-6 text-left">ID</th>
            <th class="py-3 px-6 text-left">Nombre</th>
            <th class="py-3 px-6 text-left">Primer Apellido</th>
            <th class="py-3 px-6 text-left">Segundo Apellido</th>
            <th class="py-3 px-6 text-left">Teléfono</th>
          </tr>
        </thead>
        <tbody>
          <?php
          while ($row = oci_fetch_assoc($stid)) {
            echo "<tr class='border-b'>";
            echo "<td class='py-3 px-6'>" . $row['ID_PROVEEDOR'] . "</td>";
            echo "<td class='py-3 px-6'>" . $row['NOMBRE'] . "</td>";
            echo "<td class='py-3 px-6'>" . $row['APELLIDO1'] . "</td>";
            echo "<td class='py-3 px-6'>" . $row['APELLIDO2'] . "</td>";
            echo "<td class='py-3 px-6'>" . $row['TELEFONO'] . "</td>";
            echo "<td class='py-3 px-6'>" . $row['ESTADO'] . "</td>";
            echo "<td class='py-3 px-6 text-center'>
                    <a href='#' onclick='openEditModal(" . $row['ID_PROVEEDOR'] . ", \"" . $row['NOMBRE'] . "\", \"" . $row['APELLIDO1'] . "\", \"" . $row['APELLIDO2'] . "\", \"" . $row['TELEFONO'] . "\")' class='text-blue-500 hover:underline'>Editar</a> |
                    <a href='#' onclick='openDeleteModal(" . $row['ID_PROVEEDOR'] . ")' class='text-red-500 hover:underline'>Eliminar</a>
                  </td>";
            echo "</tr>";
          }
          ?>
        </tbody>
      </table>
    </div>
  </main>

  <footer class="bg-green-500 text-white py-4">
    <div class="container mx-auto text-center">
      <p>&copy; 2024 Macrobiotica. Todos los derechos reservados.</p>
    </div>
  </footer>

  <div id="editProveedorModal" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-gray-500 bg-opacity-75">
    <div class="bg-white p-6 rounded-lg shadow-lg w-1/3">
      <h3 class="text-xl font-semibold mb-4">Editar Proveedor</h3>
      <form action="/controllers/ProveedorController.php?action=editarProveedor" method="POST">
        <input type="hidden" id="editIdProveedor" name="id_proveedor">
        
        <label for="editNombre" class="block text-sm font-medium text-gray-700">Nombre</label>
        <input type="text" id="editNombre" name="nombre" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500" required>
        
        <label for="editApellido1" class="block text-sm font-medium text-gray-700 mt-4">Primer Apellido</label>
        <input type="text" id="editApellido1" name="apellido1" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500" required>
        
        <label for="editApellido2" class="block text-sm font-medium text-gray-700 mt-4">Segundo Apellido</label>
        <input type="text" id="editApellido2" name="apellido2" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500">
        
        <label for="editTelefono" class="block text-sm font-medium text-gray-700 mt-4">Teléfono</label>
        <input type="tel" id="editTelefono" name="telefono" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500" required>
        
        <div class="mt-6 flex justify-end space-x-4">
          <button type="button" class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400" onclick="closeModal('editProveedorModal')">Cancelar</button>
          <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600">Guardar Cambios</button>
        </div>
      </form>
    </div>
  </div>

  <!-- Modal Eliminar Proveedor -->
  <div id="deleteProveedorModal" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-gray-500 bg-opacity-75">
    <div class="bg-white p-6 rounded-lg shadow-lg w-1/3">
      <h3 class="text-xl font-semibold mb-4">Eliminar Proveedor</h3>
      <p class="mb-4">¿Estás seguro de que deseas eliminar este proveedor?</p>
      <form action="/controllers/ProveedorController.php?action=eliminarProveedor" method="POST">
        <input type="hidden" id="deleteIdProveedor" name="id_proveedor">
        
        <div class="mt-6 flex justify-end space-x-4">
          <button type="button" class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400" onclick="closeModal('deleteProveedorModal')">Cancelar</button>
          <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600">Eliminar</button>
        </div>
      </form>
    </div>
  </div>

  <script>
    function openEditModal(id, nombre, apellido1, apellido2, telefono) {
      document.getElementById('editIdProveedor').value = id;
      document.getElementById('editNombre').value = nombre;
      document.getElementById('editApellido1').value = apellido1;
      document.getElementById('editApellido2').value = apellido2;
      document.getElementById('editTelefono').value = telefono;
      document.getElementById('editProveedorModal').classList.remove('hidden');
    }

    function openDeleteModal(id) {
      document.getElementById('deleteIdProveedor').value = id;
      document.getElementById('deleteProveedorModal').classList.remove('hidden');
    }

    function closeModal(modalId) {
      document.getElementById(modalId).classList.add('hidden');
    }
  </script>

</body>
</html>

<?php

oci_free_statement($stid);
oci_close($conn);
?>
