<?php
require_once 'models/DataBase.php';
require_once 'models/Promocion.php';

class PromocionController {
    private $conn;
    private $promocion;
    private $usuario; 

    public function __construct($usuario = 'SISTEMA') {
        $database = new Database();
        $this->conn = $database->conectar();
        $this->promocion = new Promocion($this->conn);
        $this->usuario = $usuario;
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
            $this->promocion->id_promocion = $_POST['id_producto'];
            $this->promocion->------= 'CREAR'; 
            $this->promocion->id_estado = 1; 

            if ($this->promocion->insertarPromocion($this->usuario)) {
                header('Location: index.php?controlador=promocion&accion=index');
            } else {
                echo "Error al crear la promoción";
            }
        } else {
            include '../views/promociones/crear.php';
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
            $this->promocion->accion = 'MODIFICAR';
            $this->promocion->id_estado = $_POST['id_estado'];

            if ($this->promocion->modificarPromocion($this->usuario)) {
                header('Location: index.php?controlador=promocion&accion=index');
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
            header('Location: index.php?controlador=promocion&accion=index');
        } else {
            echo "Error al inactivar la promoción";
        }
    }
}
?>