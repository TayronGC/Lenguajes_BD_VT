<?php
session_start();
if($_SESSION['role_id'] != 1){
  header("Location: index.php");
  exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gestión de Promociones</title>
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

      <h2 class="text-2xl font-bold mb-6 text-center">Crear/Editar Promoción</h2>
      
      <form action="index.php?controller=Promocion&action=insertarPromocion" method="POST" class="bg-white shadow-md rounded-lg p-6">
        
        <div class="mb-4">
          <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción</label>
          <input type="text" id="descripcion" name="descripcion" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
        </div>

        <div class="mb-4">
          <label for="fechaInicio" class="block text-sm font-medium text-gray-700">Fecha Inicio</label>
          <input type="date" id="fechaInicio" name="fechaInicio" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
        </div>

        <div class="mb-4">
          <label for="fechaFin" class="block text-sm font-medium text-gray-700">Fecha Fin</label>
          <input type="date" id="fechaFin" name="fechaFin" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
        </div>

        <div class="mb-4">
          <label for="descuento" class="block text-sm font-medium text-gray-700">Descuento</label>
          <input type="number" id="descuento" name="descuento" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
        </div>

        <div class="mb-4">
          <label for="producto" class="block text-sm font-medium text-gray-700">Producto</label>
          <select id="producto" name="producto" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" >
            <?php foreach ($productos as $producto): ?>
              <option value="<?= $producto['ID_PRODUCTO'] ?>"><?= $producto['NOMBRE_PRODUCTO'] ?></option>
            <?php endforeach; ?>
          </select>
        </div>

        <div class="flex justify-end space-x-4">
        <button type="button" class="bg-gray-500 text-white px-4 py-2 rounded-md" onclick="window.location.href='index.php?controller=Admin&action=adminPage'">Cancelar</button>
          <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-md">Guardar Promoción</button>
        </div>
      </form>

      <h2 class="text-2xl font-bold mt-12 mb-6 text-center">Lista de Promociones</h2>
      <table class="min-w-full table-auto bg-white shadow-md rounded-lg">
        <thead class="bg-gray-200">
          <tr>
            <th class="px-4 py-2 text-left">ID</th>
            <th class="px-4 py-2 text-left">Descripción</th>
            <th class="px-4 py-2 text-left">Fecha Inicio</th>
            <th class="px-4 py-2 text-left">Fecha Fin</th>
            <th class="px-4 py-2 text-left">Descuento</th>
          </tr>
        </thead>
        <tbody>
        <?php
    while ($row = oci_fetch_assoc($stid)) {
        echo "<tr>";
        echo "<td>" . $row['ID_PROMOCION'] . "</td>";
        echo "<td>" . $row['NOMBRE'] . "</td>";
        echo "<td>" . $row['DESCRIPCION'] . "</td>";
        echo "<td>" . $row['DESCUENTO'] . "</td>";
        echo "<td>" . $row['FECHA_INICIO'] . "</td>";
        echo "<td>" . $row['FECHA_FIN'] . "</td>";
        echo "<td>
                <button class='btn btn-warning btn-sm' data-bs-toggle='modal' 
                        onclick='openEditModal(" . $row['ID_PROMOCION'] . ", \"" . $row['NOMBRE'] . "\", \"" . $row['DESCRIPCION'] . "\", " . $row['DESCUENTO'] . ", \"" . $row['FECHA_INICIO'] . "\", \"" . $row['FECHA_FIN'] . "\")'>
                    Editar
                </button>
                <button class='btn btn-danger btn-sm' onclick='eliminarPromocion(" . $row['ID_PROMOCION'] . ")'>
                    Eliminar
                </button>
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
</body>
</html>

<?php

oci_free_statement($stid);
oci_close($conn);
?>
