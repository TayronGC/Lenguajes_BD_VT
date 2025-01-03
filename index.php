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
$controller = isset($_GET['controller']) ? ucfirst($_GET['controller']) . 'Controller' : '';
$action = isset($_GET['action']) ? $_GET['action'] : '';

// Instanciar el controlador y ejecutar la acción
if (class_exists($controller)) {
  $controllerInstance = new $controller($db);
  if (method_exists($controllerInstance, $action)) {
    $controllerInstance->$action();
    //header("Location: AddCategoria.php");  // Redirige a la página de categorías
    exit();
exit();
  } else {
    //echo "La acción '$action' no existe en el controlador '$controller'.";
  }
} else {
  //echo "El controlador '$controller' no existe.";
}
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Macro Salud</title>
    <link rel="stylesheet" href="/public/css/style.css">
</head>

<body>

    <header class="header">


        <div class="menu container">

            <a href="#" class="logo"><img src="/public/img/macrologo.png"></a>
            <input type="checkbox" id="menu" />
            <label for="menu">
                <img src="/public/img/menu.svg" class="menu-icono" alt="">
            </label>

            <nav class="navbar">
                <ul>
                    <?php 
                    
                    if(!isset($_SESSION['user_id'])){ ?>

                    <li><a href="index.php?controller=IniciarSession&action=loginPage">Inicio de Sesion</a></li>
                    <?php }else{ ?>
                    <li><form action="index.php?controller=IniciarSession&action=cerrarSession" method="post">
                        <a ><button type="submit" id="boton-cerrar" class="link-style">Cerrar Sesion</button></a>
                    </form></li>
                    <?php }?>
                    <li><a href="index.php?controller=Cliente&action=verTodosproductos">Productos</a></li>
                    <li><a href="index.php?controller=Cliente&action=verTodasPromociones">Promociones</a></li>
                    <li><a href="index.php?controller=Carrito&action=listarCarrito">Carrito</a></li>
                    <?php if(isset($_SESSION['role_id']) && $_SESSION['role_id'] == 1){ ?>
                    <li><a href="index.php?controller=Admin&action=adminPage">Admin</a></li>
                    <?php } ?>
                </ul>
            </nav>
            <div class="socials-1">
                <a target="_blank" href="https://www.instagram.com/_macrosalud_/"><img src="/public/img/r1.svg" alt=""></a>
                <a href="#form"><img src="/public/img/r2.svg" alt=""></a>
                <a target="_blank" href="https://www.facebook.com/share/p/15DTKFsLLT/"><img src="/public/img/r3.svg" alt=""></a>
            </div>
        </div>

        <div class="header-content container">
            <div class="header-txt">
                <h1>!Bienvenido a Macro Salud!</h1>
                <p>"Explora nuestra amplia gama de productos y descubre cómo podemos ayudarte a alcanzar tus objetivos de salud. Desde suplementos alimenticios hasta productos de cuidado personal, tenemos todo lo que necesitas para sentirte mejor cada día."</p>
            </div>

            <div class="header-img">
                <img src="/public/img/sportmana-productos-1024x576.png" alt="">
            </div>

        </div>
    </header>

    <section class="about">
        <div class="about-content container">
            <img class="ab1" src="/public/img/ab1.png" alt="">
            <img class="ab2" src="/public/img/ab1.png" alt="">
            <img class="ab3" src="/public/img/ab1.png" alt="">

            <div class="about-img">
                <img src="/public/img/probioticos-capsulas-natural-systems.jpg" alt="">
            </div>
            <div class="about-txt">
                <h2>Sobre Nosotros</h2>
                <p>Ofrecemos una amplia variedad de productos naturales y saludables,
                    cuidadosamente seleccionados para mejorar tu bienestar.
                    Desde suplementos alimenticios hasta productos de cuidado personal,
                    todos nuestros artículos están diseñados para ayudarte a llevar una vida más saludable
                    y equilibrada.
                </p>
                <a href="#form" class="btn-2">Contáctenos</a>
            </div>
        </div>
    </section>

    <section class="information">

        <div class="information-content container">
            <img class="in1" src="/public/img/ab1.png" alt="">
            <img class="in2" src="/public/img/ab1.png" alt="">
            <img class="in3" src="/public/img/ab1.png" alt="">

            <h2>Informacion de los productos</h2>
            <p>Nuestros productos están elaborados con ingredientes de la más alta calidad, garantizando su efectividad y seguridad. Cada producto ha sido sometido a rigurosos controles de calidad para asegurar que cumplan con los estándares más exigentes. Además, contamos con un equipo de expertos en salud y nutrición que están disponibles para brindarte asesoría personalizada
                y ayudarte a elegir los productos que mejor se adapten a tus necesidades.
            </p>
        </div>
    </section>

    <main id="form" class="contact container">

        <div class="form-content">

            <h2>Contáctenos</h2>
            <form action="https://formsubmit.co/macrosalud29@gmail.com" method="POST">
                <input class="campo" type="text" name="name" placeholder="Nombre">
                <input class="campo" type="email" name="email" placeholder="Correo Electronico">
                <input class="campo" type="razon" name="razon" placeholder="Razón">
                <input class="btn-2" type="submit" value="Enviar">

                <input type="hidden" name="_next" value="http://localhost:3000/index.php">
                <input type="hidden" name="_captcha" value="false">
            </form>
        </div>
    </main>

    <footer class="footer">
        <div class="container">
            <div class="footer-links">
                <div class="link-img">
                    <img src="/public/img/macrologo.png" alt="">
                    <div class="socials-2">
                        <a target="_blank" href="https://www.instagram.com/_macrosalud_/"><img src="/public/img/r1.svg" alt=""></a>
                        <a href="#form"><img src="/public/img/r2.svg" alt=""></a>
                        <a target="_blank" href="https://www.facebook.com/share/p/15DTKFsLLT/"><img src="/public/img/r3.svg" alt=""></a>
                    </div>
                </div>
            </div>
            <div class="footer-copy">
                <p>Lenguajes de Bases de Datos. Grupo 2. Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>
</body>
</html>