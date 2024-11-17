<?php
require_once 'models/Database.php';
require_once 'models/Usuario.php';

class DashboardController {
    public function index() {
        session_start();
        
        if (!isset($_SESSION['user_id'])) {
            // Redirigir al inicio de sesión si el usuario no está autenticado
            header("Location: index.php?controller=Usuario&action=login");
            exit();
        }
    
        // Incluir la vista del dashboard
        include 'views/dashboard.php';
    }
}    
?>
