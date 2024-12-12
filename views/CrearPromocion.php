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
      <a href="/index.php" class="text-xl font-bold">Macrobiotica</a>
      <ul class="flex space-x-4">
        <li><a href="/index.php" class="hover:text-gray-300">Inicio</a></li>
      </ul>
    </nav>
  </header>

  <main class="bg-gray-100 py-12">
    <div class="container mx-auto">

      <h2 class="text-2xl font-bold mb-6 text-center">Crear/Editar Promoción</h2>
      <form class="bg-white shadow-md rounded-lg p-6" action="index.php?controlador=Promocion&accion=crear" method="POST">
        <input type="hidden" name="idPromocion" value="">
        
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
          <label for="accion" class="block text-sm font-medium text-gray-700">Acción</label>
          <input type="text" id="accion" name="accion" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
        </div>

        <div class="mb-4">
          <label for="estado" class="block text-sm font-medium text-gray-700">Estado</label>
          <select id="estado" name="estado" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
            <option value="1" selected>Activo</option>
            <option value="2">Inactivo</option>
          </select>
        </div>

        <div class="flex justify-end space-x-4">
          <button type="button" class="bg-gray-500 text-white px-4 py-2 rounded-md" onclick="window.location.href='index.php?controlador=Promocion&accion=PromocionPage'">Cancelar</button>
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
            <th class="px-4 py-2 text-left">Acción</th>
            <th class="px-4 py-2 text-left">Estado</th>
            <th class="px-4 py-2 text-left">Acciones</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="px-4 py-2">1</td>
            <td class="px-4 py-2">Descuento de Navidad</td>
            <td class="px-4 py-2">2024-12-01</td>
            <td class="px-4 py-2">2024-12-25</td>
            <td class="px-4 py-2">15%</td>
            <td class="px-4 py-2">Regalo de Navidad</td>
            <td class="px-4 py-2">Activo</td>
            <td class="px-4 py-2">
              <a href="/promociones/editar/1" class="bg-yellow-500 text-white px-4 py-2 rounded-md">Editar</a>
              <a href="/promociones/eliminar/1" class="bg-red-500 text-white px-4 py-2 rounded-md" onclick="return confirm('¿Estás seguro de que deseas eliminar esta promoción?')">Eliminar</a>
            </td>
          </tr>
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
