<?php
require_once 'models/DataBase.php';
require_once 'models/Promocion.php';

class PromocionController {
    private $db;
    private $promocion;
    private $usuario; 

    public function __construct() {
        // Crear la conexión a la base de datos
        $this->db = new Database();
        $this->db = $this->db->getConnection();

        $this->promocion = new Promocion($this->db);
    }
    public function index() {
        $promociones = $this->promocion->verTodasPromociones();
        include '/views/promociones/listarPromociones.php';
    }

    public function ver($id) {
        $this->promocion->verPromocion($id);
    }

    public function crear() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->promocion->descripcion = $_POST['descripcion'];
            $this->promocion->fecha_inicio = $_POST['fecha_inicio'];
            $this->promocion->fecha_fin = $_POST['fecha_fin'];
            $this->promocion->descuento = $_POST['descuento'];
            $this->promocion->id_producto= $_POST['id_producto'];

            if ($this->promocion->insertarPromocion($this->usuario)) {
                header('Location: index.php?controlador=Promocion&accion=PromocionPage');

            } else {
                echo "Error al crear la promoción";
            }
        } 
            
    }

    public function modificar($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->promocion->id_promocion = $id;
            $this->promocion->descripcion = $_POST['descripcion'];
            $this->promocion->fecha_inicio = $_POST['fecha_inicio'];
            $this->promocion->fecha_fin = $_POST['fecha_fin'];
            $this->promocion->descuento = $_POST['descuento'];
            $this->promocion->id_producto = $_POST['id_producto'];
            $this->promocion->id_estado = $_POST['id_estado'];

            if ($this->promocion->modificarPromocion($this->usuario)) {
                header('Location: index.php?controlador=Promocion&accion=PromocionPage');

            } else {
                echo "Error al modificar la promoción";
            }
        } else {
            // Cargar los datos actuales de la promoción para el formulario de edición
            $this->promocion->verPromocion($id);
            include '/views/CrearPromocion/modificar.php';
        }
    }

    public function inactivar($id) {
        $this->promocion->id_promocion = $id;
        if ($this->promocion->inactivarPromocion($this->usuario)) {
            header('Location: index.php?controlador=Promocion&accion=PromocionPage');
        } else {
            echo "Error al inactivar la promoción";
        }
    }


    public function PromocionPage(){
        include 'views/CrearPromocion.php';
    }
}
?>