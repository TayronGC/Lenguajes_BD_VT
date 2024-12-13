<?php
session_start();
if($_SESSION['role_id'] != 1){
  header("Location: index.php");
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gestión de Devoluciones</title>
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
      <a href="index.php?controller=Admin&action=adminPage" class="text-xl font-bold">Macrobiotica</a>
      <ul class="flex space-x-4">
        <li><a href="index.php?controller=Admin&action=adminPage" class="hover:text-gray-300">Inicio</a></li>
      </ul>
    </nav>
  </header>

  <main class="bg-gray-100 py-12">
    <div class="container mx-auto">
      <h2 class="text-2xl font-bold mb-6 text-center">Devoluciones</h2>

      <div class="mb-4 text-center">
        <button class="bg-green-500 text-white px-4 py-2 rounded-md" onclick="openCreateModal()">Agregar Devolución</button>
      </div>

      <table class="min-w-full bg-white shadow-md rounded-lg">
        <thead class="bg-green-500 text-white">
          <tr>
            <th class="py-3 px-6 text-left">ID Devolución</th>
            <th class="py-3 px-6 text-left">Razón</th>
            <th class="py-3 px-6 text-left">Fecha Devolución</th>
            <th class="py-3 px-6 text-left">Producto</th>
            <th class="py-3 px-6 text-left">Factura</th>
            <th class="py-3 px-6 text-left">Acción</th>
            <th class="py-3 px-6 text-center">Acciones</th>
          </tr>
        </thead>
        <tbody id="devolucionesTable">
          <tr data-id="1">
            <td class="py-3 px-6 text-left">1</td>
            <td class="py-3 px-6 text-left">Producto defectuoso</td>
            <td class="py-3 px-6 text-left">2024-12-10</td>
            <td class="py-3 px-6 text-left">Producto X</td>
            <td class="py-3 px-6 text-left">F123456</td>
            <td class="py-3 px-6 text-left">Devolución total</td>
            <td class="py-3 px-6 text-center">
              <button class="bg-yellow-500 text-white px-4 py-2 rounded-md" onclick="openEditModal(this)">Editar</button>
              <button class="bg-red-500 text-white px-4 py-2 rounded-md" onclick="openDeleteModal()">Eliminar</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </main>

  <div id="createModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex justify-center items-center hidden">
    <div class="bg-white rounded-lg w-1/3 p-6">
      <h3 class="text-xl font-semibold mb-4">Agregar Devolución</h3>
      <form id="createForm" onsubmit="handleCreateForm(event)">
        <div class="mb-4">
          <label for="razon" class="block text-sm font-medium text-gray-700">Razón</label>
          <input type="text" id="razon" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
        </div>
        <div class="mb-4">
          <label for="fechaDevolucion" class="block text-sm font-medium text-gray-700">Fecha Devolución</label>
          <input type="date" id="fechaDevolucion" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
        </div>
        <div class="mb-4">
          <label for="producto" class="block text-sm font-medium text-gray-700">Producto</label>
          <input type="text" id="producto" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
        </div>
        <div class="mb-4">
          <label for="factura" class="block text-sm font-medium text-gray-700">Factura</label>
          <input type="text" id="factura" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
        </div>
        <div class="mb-4">
          <label for="accion" class="block text-sm font-medium text-gray-700">Acción</label>
          <input type="text" id="accion" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
        </div>
        <div class="mb-4">
          <label for="estado" class="block text-sm font-medium text-gray-700">Estado</label>
          <select id="estado" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
            <option value="1">Activo</option>
            <option value="2">Inactivo</option>
          </select>
        </div>
        <div class="flex justify-end space-x-4">
          <button type="button" class="bg-gray-500 text-white px-4 py-2 rounded-md" onclick="closeCreateModal()">Cancelar</button>
          <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-md">Guardar</button>
        </div>
      </form>
    </div>
  </div>

  <div id="editModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex justify-center items-center hidden">
    <div class="bg-white rounded-lg w-1/3 p-6">
      <h3 class="text-xl font-semibold mb-4">Editar Devolución</h3>
      <form id="editForm">
        <div class="mb-4">
          <label for="editRazon" class="block text-sm font-medium text-gray-700">Razón</label>
          <input type="text" id="editRazon" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
        </div>
        <div class="mb-4">
          <label for="editFechaDevolucion" class="block text-sm font-medium text-gray-700">Fecha Devolución</label>
          <input type="date" id="editFechaDevolucion" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
        </div>
        <div class="mb-4">
          <label for="editProducto" class="block text-sm font-medium text-gray-700">Producto</label>
          <input type="text" id="editProducto" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
        </div>
        <div class="mb-4">
          <label for="editFactura" class="block text-sm font-medium text-gray-700">Factura</label>
          <input type="text" id="editFactura" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
        </div>
        <div class="flex justify-end space-x-4">
          <button type="button" class="bg-gray-500 text-white px-4 py-2 rounded-md" onclick="closeEditModal()">Cancelar</button>
          <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-md">Actualizar</button>
        </div>
      </form>
    </div>
  </div>

  <script>

    function openCreateModal() {
      document.getElementById("createModal").classList.remove("hidden");
    }

    function closeCreateModal() {
      document.getElementById("createModal").classList.add("hidden");
    }


    function openEditModal(button) {
      const row = button.closest("tr");

      const razon = row.querySelector("td:nth-child(2)").textContent;
      const fechaDevolucion = row.querySelector("td:nth-child(3)").textContent;
      const producto = row.querySelector("td:nth-child(4)").textContent;
      const factura = row.querySelector("td:nth-child(5)").textContent;
      const accion = row.querySelector("td:nth-child(6)").textContent;

      document.getElementById("editRazon").value = razon;
      document.getElementById("editFechaDevolucion").value = fechaDevolucion;
      document.getElementById("editProducto").value = producto;
      document.getElementById("editFactura").value = factura;


      document.getElementById("editModal").classList.remove("hidden");
    }

    function closeEditModal() {
      document.getElementById("editModal").classList.add("hidden");
    }

    function openDeleteModal() {
      alert("¿Estás seguro de eliminar esta devolución?");
    }

    function handleCreateForm(event) {
      event.preventDefault(); 

      const razon = document.getElementById("razon").value;
      const fechaDevolucion = document.getElementById("fechaDevolucion").value;
      const producto = document.getElementById("producto").value;
      const factura = document.getElementById("factura").value;
      const accion = document.getElementById("accion").value;
      const estado = document.getElementById("estado").value;

      console.log({
        razon,
        fechaDevolucion,
        producto,
        factura,
        accion,
        estado
      });

      closeCreateModal();
    }
  </script>
</body>
</html>
