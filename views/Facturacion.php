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
    <title>Crear Factura</title>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 p-6">

<header class="bg-green-500 text-white py-4">
    <nav class="container mx-auto flex justify-between items-center">
      <a href="index.php?controller=Admin&action=adminPage" class="text-xl font-bold">Macrobiotica</a>
      <ul class="flex space-x-4">
        <li><a href="index.php?controller=Admin&action=adminPage" class="hover:text-gray-300">Inicio</a></li>
      </ul>
    </nav>
  </header>

        <div class="bg-white p-6 rounded-lg shadow-lg max-w-3xl mx-auto">
            <h3 class="text-2xl font-bold mb-6">Generar Nueva Factura</h3>
<!--
            <form @submit.prevent="agregarProducto">
                <div class="mb-4">
                    <label for="cliente" class="block text-lg">Cliente</label>
                    <input type="text" x-model="cliente" id="cliente" class="w-full p-3 border border-gray-300 rounded-md" placeholder="Nombre del Cliente" required>
                </div>

                <div class="mb-4">
                    <label for="producto" class="block text-lg">Producto</label>
                    <select x-model="productoSeleccionado" id="producto" class="w-full p-3 border border-gray-300 rounded-md">
                        <template x-for="producto in productos" :key="producto.id">
                            <option :value="producto.id" x-text="producto.nombre"></option>
                        </template>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="cantidad" class="block text-lg">Cantidad</label>
                    <input type="number" x-model="cantidad" id="cantidad" class="w-full p-3 border border-gray-300 rounded-md" min="1" required>
                </div>

                <button type="button" @click="agregarProducto" class="bg-blue-500 text-white px-4 py-2 rounded-md">Agregar Producto</button>
            </form>
-->
            <div class="mt-6">
                <table class="table-auto w-full mb-6">
                    <thead>
                        <tr>
                            <th class="border px-4 py-2">Nombre Usuario</th>
                            <th class="border px-4 py-2">Producto</th>
                            <th class="border px-4 py-2">Fecha</th>
                            <th class="border px-4 py-2">Cantidad</th>
                            <th class="border px-4 py-2">Total</th>
                        </tr>
                    </thead>
                    <tbody><?php if (!empty($facturas)) : ?>
            <?php foreach ($facturas as $factura): ?>
            <tr class="border-b">
              <td class="py-3 px-6"><?= $factura['NOMBRE_USUARIO'] ?></td>
              <td class="py-3 px-6"><?= $factura['NOMBRE_PRODUCTO'] ?></td>
              <td class="py-3 px-6"><?= $factura['FECHA_CREACION'] ?></td>
              <td class="py-3 px-6"><?= $factura['CANTIDAD'] ?></td>
              <td class="py-3 px-6"><?= $factura['TOTAL'] ?></td>
            </tr>
            <?php endforeach; ?>
          <?php else: ?>
            <tr class="border-b">
              <td class="py-3 px-6">No se encontraron categorías</td>
            </tr>
          <?php endif; ?>
                        <template x-for="(item, index) in facturaProductos" :key="index">
                            <tr>
                                <td class="border px-4 py-2" x-text="item.producto.nombre"></td>
                                <td class="border px-4 py-2" x-text="item.cantidad"></td>
                                <td class="border px-4 py-2" x-text="item.totalProducto"></td>
                            </tr>
                        </template>
                    </tbody>
                </table>

                <div class="text-lg font-semibold">
                    <p>Subtotal: <span x-text="subtotal"></span></p>
                    <p>Impuesto (13%): <span x-text="impuestoTotal"></span></p>
                    <p>Total: <span x-text="total"></span></p>
                </div>
            </div>

                <div class="mt-4 flex justify-end">
                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-md">Guardar Factura</button>
                </div>
            </form>
<!--
            <form action="../models/generar_factura.php" method="post" target="_blank">
    <input type="hidden" name="facturas" value='<?= json_encode($facturas) ?>'>
    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-md">
        Guardar Factura
    </button>
</form>
          -->


        </div>
    </div>

</body>

</html>
