
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
</head>
<body>
    <h1>Pagina de Inicio</h1>
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
        echo "La acción '$action' no existe en el controlador '$controller'.";
    }
} else {
    echo "El controlador '$controller' no existe.";
}
?>
