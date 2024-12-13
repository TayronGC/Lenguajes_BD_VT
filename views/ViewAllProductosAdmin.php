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
  <title>Ver Productos</title>
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
      <h2 class="text-2xl font-bold mb-6 text-center">Listado de Productos</h2>
      <table class="min-w-full bg-white shadow-md rounded-lg">
        <thead class="bg-green-500 text-white">
          <tr>
            <th class="py-3 px-6 text-left">ID Producto</th>
            <th class="py-3 px-6 text-left">Nombre Producto</th>
            <th class="py-3 px-6 text-left">Descripción</th>
            <th class="py-3 px-6 text-left">Precio</th>
            <th class="py-3 px-6 text-left">Fecha vencimiento</th>
            <th class="py-3 px-6 text-left">Categoria</th>
            <th class="py-3 px-6 text-left">Proveedor</th>
            <th class="py-3 px-6 text-center">Acciones</th>
          </tr>
        </thead>
        <tbody> 
        <?php if (!empty($productos)) : ?>
            <?php foreach ($productos as $producto): ?>
            <tr class="border-b">
              <td class="py-3 px-6"><?= $producto['ID_PRODUCTO'] ?></td>
              <td class="py-3 px-6"><?= $producto['NOMBRE_PRODUCTO'] ?></td>
              <td class="py-3 px-6"><?= $producto['DESCRIPCION'] ?></td>
              <td class="py-3 px-6"><?= $producto['PRECIO_UNITARIO'] ?></td>
              <td class="py-3 px-6"><?= $producto['FECHA_VENCIMIENTO'] ?></td>
              <td class="py-3 px-6"><?= $producto['NOMBRE_CATEGORIA'] ?></td>
              <td class="py-3 px-6"><?= $producto['NOMBRE_PROVEEDOR'] ?></td>
              <td class="py-3 px-6 text-center">
                <button class="text-blue-500 hover:underline" onclick="openEditModal(
                <?= $producto['ID_PRODUCTO'] ?>, 
    '<?= $producto['NOMBRE_PRODUCTO'] ?>', 
    '<?= $producto['DESCRIPCION'] ?>', 
    <?= $producto['PRECIO_UNITARIO'] ?>, 
    '<?= $producto['FECHA_VENCIMIENTO'] ?>', 
    '<?= $producto['NOMBRE_CATEGORIA'] ?>', 
    '<?= $producto['NOMBRE_PROVEEDOR'] ?>', 
    <?= $producto['ID_ESTADO'] ?>, 
    <?= $producto['ID_CATEGORIA'] ?>, 
    <?= $producto['ID_PROVEEDOR'] ?>)">Editar</button> |
                <button class="text-red-500 hover:underline" onclick="openDeleteModal(<?= $producto['ID_PRODUCTO'] ?>, '<?= $producto['NOMBRE_PRODUCTO'] ?>')">Eliminar</button>
              </td>
            </tr>
            <?php endforeach; ?>
          <?php else: ?>
            <tr class="border-b">
              <td class="py-3 px-6">No se encontraron productos</td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </main>

  <div id="editModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex justify-center items-center hidden">
    <div class="bg-white rounded-lg w-1/3 p-6" x-data="{ isEditModalOpen: false }">
      <h3 class="text-xl font-semibold mb-4">Editar Producto</h3>
      <form>
        <input type="hidden" id="editProductoId">

        <input type="text" id="editProductoCategoryName">
        <input type="text" id="editProductoProviderName">
        <input type="text" id="editProductoCategoryId">
        <input type="text" id="editProductoProviderId">

        <div class="mb-4">
          <label for="nombreProducto" class="block text-sm font-medium text-gray-700">Nombre Producto</label>
          <input type="text" id="editProductoName" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" value="">
        </div>
        <div class="mb-4">
          <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción</label>
          <input type="text" id="editProductoDescription" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" value="">
        </div>
        <div class="mb-4">
          <label for="precio" class="block text-sm font-medium text-gray-700">Precio</label>
          <input type="number" id="editProductoPrice" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" value="">
        </div>
        <div class="mb-4">
          <label for="fechaVencimiento" class="block text-sm font-medium text-gray-700">Fecha de Vencimiento</label>
          <input type="date" min="2024-12-14" id="editProductoExpiryDate" name="fechaVencimiento" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
        </div>
        <div class="mb-4">
          <label for="categoria" class="block text-sm font-medium text-gray-700">Categoría</label>
          <select id="categoria" name="categoria" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" >
            <?php foreach ($categorias as $categoria): ?>
              <option value="<?= $categoria['ID_CATEGORIA'] ?>"><?= $categoria['NOMBRE_CATEGORIA'] ?></option>
            <?php endforeach; ?>
          </select>
        </div>

        <div class="mb-4">
          <label for="proveedor" class="block text-sm font-medium text-gray-700">Proveedor</label>
          <select id="proveedor" name="proveedor" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" >
            <?php foreach ($proveedores as $proveedor): ?>
              <option value="<?= $proveedor['ID_PROVEEDOR'] ?>"><?= $proveedor['NOMBRE_PROVEEDOR'] ?> <?= $proveedor['APELLIDO1'] ?></option>
            <?php endforeach; ?>
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
    <form action="index.php?controller=Producto&action=inactivarproducto" method="post">
      <h3 class="text-xl font-semibold mb-4">Eliminar Producto</h3>
      <input type="hidden" id="deleteProductoId" name="id_producto" value="">
      <p class="mb-4">¿Estás seguro de que deseas eliminar este producto?</p>
      <p id="productoName" class="text-lg font-medium mb-4"></p>
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
    function openEditModal(
      productId,
      productName,
      productDescription,
      productPrice,
      productExpiryDate,
      productCategoryName,
      productProviderName,
      productCategoryId,
      productProviderId
    ) {

      document.getElementById('editProductoId').value = productId;
    document.getElementById('editProductoName').value = productName;
    document.getElementById('editProductoDescription').value = productDescription;
    document.getElementById('editProductoPrice').value = productPrice;
    document.getElementById('editProductoExpiryDate').value = productExpiryDate;
    document.getElementById('editProductoCategoryName').value = productCategoryName;
    document.getElementById('editProductoProviderName').value = productProviderName;
    document.getElementById('editProductoCategoryId').value = productCategoryId;
    document.getElementById('editProductoProviderId').value = productProviderId;
      document.getElementById('editModal').classList.remove('hidden');
    }

    function closeModal() {
      document.getElementById('editModal').classList.add('hidden');
    }

    function openDeleteModal(productId,productName) {
      document.getElementById('deleteProductoId').value = productId;
      document.getElementById('productoName').innerText = productName;

      document.getElementById('deleteModal').classList.remove('hidden');
    }

    function closeDeleteModal() {
      document.getElementById('deleteModal').classList.add('hidden');
    }

    
  </script>
</body>
</html>
