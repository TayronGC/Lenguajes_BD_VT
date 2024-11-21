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
        <li><a href="/views/AddCategoria.php" class="hover:text-gray-300">Añadir Categorías</a></li>
        <li><a href="/views/ViewAllCategorias.php" class="hover:text-gray-300">Categorías</a></li>
        <li><a href="/views/viewCategoria.php" class="hover:text-gray-300">Buscar</a></li>
        <li><a href="/views/register.php" class="hover:text-gray-300">Registrate</a></li>
        <li><a href="/views/dashboard.php" class="hover:text-gray-300">Pagina Principal</a></li>
      </ul>
    </nav>
  </header>

  <main>
    <section class="bg-gray-100 py-20">
      <div class="container mx-auto text-center">
        <h1 class="text-4xl font-bold mb-4">Bienvenido al Gestionador de Macrobiotica</h1>
      </div>
    </section>

    <section class="container mx-auto py-12">
     Aqui va el contenido de la pagina.
    </section>

    <section class="bg-gray-100 py-12">
      <div class="container mx-auto">
        <h2 class="text-3xl font-bold mb-8">Sobre Nosotros</h2>
        <div class="grid grid-cols-2 gap-8">
          <div>
            <p class="text-gray-600 mb-4">Somos una Macrobiotica dedicada a la venta de productos naturales y creemos en un estilo de vida saludable.</p>
          </div>
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



<?php
// Cargar los modelos y controladores automáticamente
spl_autoload_register(function ($class) {
    if (file_exists('controllers/' . $class . '.php')) {
        require_once 'controllers/' . $class . '.php';
    } elseif (file_exists('models/' . $class . '.php')) {
        require_once 'models/' . $class . '.php';
    }
});

// Conectar con la base de datos
require_once 'models/Database.php';
$database = new Database();
$db = $database->getConnection();

// Obtener el controlador y la acción desde la URL
$controller = isset($_GET['controller']) ? ucfirst($_GET['controller']) . 'Controller' : 'UsuarioController';
$action = isset($_GET['action']) ? $_GET['action'] : 'login';

// Instanciar el controlador y ejecutar la acción
if (class_exists($controller)) {
    $controllerInstance = new $controller($db);
    if (method_exists($controllerInstance, $action)) {
        $controllerInstance->$action();
    } else {
        //echo "La acción '$action' no existe en el controlador '$controller'.";
    }
} else {
    //echo "El controlador '$controller' no existe.";
}
?>
