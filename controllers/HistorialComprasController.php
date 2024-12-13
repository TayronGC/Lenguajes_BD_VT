<?php
require_once 'models/DataBase.php';
require_once 'models/AnalisisVenta.php';

class HistorialComprasController {
    private $db;
    private $venta;

    public function __construct() {
        // Crear la conexión a la base de datos
        $this->db = new Database();
        $this->db = $this->db->getConnection();
        $this->venta = new AnalisisVenta($this->db);
    }

    public function verhistoralCompras(){
        $ventas = $this->venta->verhistoralCompras();
        if(!empty($ventas)){
            include 'views/HistorialComprasCliente.php';
            //var_dump($categorias); // Muestra el contenido de $categorias
            //return $categorias;
        }else{
            echo "No hay categorias";
            //return [];
        }
        //var_dump($categorias); // Muestra el contenido de $categorias
        
    }


}

?>
