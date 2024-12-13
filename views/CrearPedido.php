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
  <title>Crear Pedido</title>
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
        <li><a href="/pedidos.php" class="hover:text-gray-300">Pedidos</a></li>
      </ul>
    </nav>
  </header>

  <main class="bg-gray-100 py-12">
    <div class="container mx-auto">
      <h2 class="text-2xl font-bold mb-6 text-center">Crear Pedido</h2>
      <form class="bg-white shadow-md rounded-lg p-6">
        <div class="mb-4">
          <label for="fechaPedido" class="block text-sm font-medium text-gray-700">Fecha del Pedido</label>
          <input type="date" id="fechaPedido" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
        </div>
        <div class="mb-4">
          <label for="proveedor" class="block text-sm font-medium text-gray-700">Proveedor</label>
          <select id="proveedor" name="proveedor" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" >
            <?php foreach ($proveedores as $proveedor): ?>
              <option value="<?= $proveedor['ID_PROVEEDOR'] ?>"><?= $proveedor['NOMBRE_PROVEEDOR'] ?> <?= $proveedor['APELLIDO1'] ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="mb-4">
          <label for="persona" class="block text-sm font-medium text-gray-700">Persona Responsable</label>
          <select id="persona" name="persona" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" >
            <?php foreach ($personas as $persona): ?>
              <option value="<?= $persona['ID_PERSONA'] ?>"><?= $persona['NOMBRE_USUARIO'] ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="flex justify-end space-x-4">
          <button type="button" class="bg-gray-500 text-white px-4 py-2 rounded-md" onclick="window.location.href='index.php?controller=Admin&action=adminPage'">Cancelar</button>
          <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-md">Crear Pedido</button>
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
