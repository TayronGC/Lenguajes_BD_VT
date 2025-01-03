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
  <title>Macrobiotica - Home</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.16/tailwind.min.css">
</head>

<body>
  <header class="bg-green-500 text-white py-4">
    <nav class="container mx-auto flex justify-between items-center">
      <a href="#" class="text-xl font-bold">Macrobiotica</a>
      <ul class="flex space-x-4">
        <li><a href="#" class="hover:text-gray-300">Inicio</a></li>
        <li><a href="index.php" class="hover:text-gray-300">Página Principal Cliente</a></li>

    </nav>
  </header>

  <main>
    <section class="bg-gray-100 py-20">
      <div class="container mx-auto text-center">
        <h1 class="text-4xl font-bold mb-4">Bienvenido al Gestionador de Macrobiotica</h1>
      </div>
    </section>

    <section class="container mx-auto py-12">
      <h2 class="text-3xl font-bold text-center mb-8">Secciones</h2>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

        <!-- Card para Productos -->
         
          <div class="bg-white p-6 rounded-lg shadow-lg">
          <h3 class="text-xl font-semibold mb-4">Crear Productos</h3>
          <a href="index.php?controller=Producto&action=insertarProductospage" class="bg-green-500 text-white py-2 px-4 rounded-full inline-block hover:bg-green-600">Acceder</a>
        </div>
        
        <!-- Card para Productos -->
        <div class="bg-white p-6 rounded-lg shadow-lg">
          <h3 class="text-xl font-semibold mb-4">Ver y Editar Productos</h3>
          <a href="index.php?controller=Producto&action=verTodosproductos" class="bg-green-500 text-white py-2 px-4 rounded-full inline-block hover:bg-green-600">Acceder</a> 
        </div>

        <!-- Card para Promociones -->
        <div class="bg-white p-6 rounded-lg shadow-lg">
          <h3 class="text-xl font-semibold mb-4">Promociones</h3>
          <a href="index.php?controller=Promocion&action=PromocionPage" class="bg-green-500 text-white py-2 px-4 rounded-full inline-block hover:bg-green-600">Acceder</a>
        </div>

        <!-- Card para Proveedores -->
        <div class="bg-white p-6 rounded-lg shadow-lg">
          <h3 class="text-xl font-semibold mb-4">Proveedores</h3>
          <a href="index.php?controller=Proveedores&action=insertarProveedorpage" class="bg-green-500 text-white py-2 px-4 rounded-full inline-block hover:bg-green-600">Acceder</a>
        </div>
        

        <!-- Card para Categorías -->
        <div class="bg-white p-6 rounded-lg shadow-lg">
          <h3 class="text-xl font-semibold mb-4">Categorías</h3>
          <a href="index.php?controller=Categoria&action=verTodasCategorias" class="bg-green-500 text-white py-2 px-4 rounded-full inline-block hover:bg-green-600">Acceder</a>
        </div>

        <!-- Card para Facturación -->
        <div class="bg-white p-6 rounded-lg shadow-lg">
          <h3 class="text-xl font-semibold mb-4">Facturación</h3>
          <a href="index.php?controller=Factura&action=verInfoFactura" class="bg-green-500 text-white py-2 px-4 rounded-full inline-block hover:bg-green-600">Acceder</a>
        </div>

       

        <!-- Card para Promociones -->
        <div class="bg-white p-6 rounded-lg shadow-lg">
          <h3 class="text-xl font-semibold mb-4">Análisis de Compras</h3>
          <a href="index.php?controller=HistorialCompras&action=verhistoralCompras" class="bg-green-500 text-white py-2 px-4 rounded-full inline-block hover:bg-green-600">Acceder</a>
        </div>

      

      </div>
    </section>
  </main>

  <footer class="bg-green-500 text-white py-4">
    <div class="container mx-auto text-center">
      <p>&copy; 2024 Macrobiotica. Todos los derechos reservados.</p>
    </div>
  </footer>
</body>

</html>



