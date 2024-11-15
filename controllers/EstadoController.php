<?php
require_once '../models/DataBase.php';
require '../models/Estado.php';

class EstadoController {
    private $db;
    private $estado;

    public function __construct(){
        $this->db = new Database();
        $this->db = $this->db->getConnection();
        $this->estado = new Estado($this->db);
    }

    public function verEstado($id){
        $this->estado->verEstado($id);
    }
}

//Ejecutar el metodo
$estadoController = new EstadoController();
$idEstado = 1;
$estadoController->verEstado($idEstado);

?>