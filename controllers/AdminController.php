<?php
//require_once 'models/DataBase.php';
class AdminController {
    //private $db;

    public function __construct() {
        // Crear la conexión a la base de datos
        //$this->db = new Database();
        //$this->db = $this->db->getConnection();
    }

    public function adminPage(){
        include "views/AdminPage.php";
    }
}


?>