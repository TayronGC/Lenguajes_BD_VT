<?php
// Incluir el archivo de la clase Database
require_once '../models/Database.php';

// Instanciar la clase Database y conectar
$db = new Database();

// Obtener la conexión
$conn = $db->getConnection();
?>