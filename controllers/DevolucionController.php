<?php
require_once 'models/DataBase.php';
require_once 'models/Devolucion.php';

class DevolucionController {
    private $db;
    private $devolucion;
    private $usuario;

    public function __construct() {
        // Crear la conexión a la base de datos
        $this->db = new Database();
        $this->db = $this->db->getConnection();

        $this->devolucion = new Devolucion($this->db);
    }
  


 public function verTodasDevoluciones() {
        $devoluciones = $this->devolucion->verTodasDevoluciones();
        include '../views/devoluciones/listarDevoluciones.php';
    }

    public function ver($id) {
        $this->devolucion->verDevolucion($id);
    }

    public function crear() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->devolucion->id_venta = $_POST['id_venta'];
            $this->devolucion->id_producto = $_POST['id_producto'];
            $this->devolucion->cantidad = $_POST['cantidad'];
            $this->devolucion->motivo = $_POST['motivo'];
            $this->devolucion->fecha_devolucion = $_POST['fecha_devolucion'];
           

            if ($this->devolucion->insertarDevolucion($this->usuario)) {
                header('Location: index.php?controller=Devolucion&action=verTodosDevoluciones');
                exit();
            } else {
                echo "Error al crear la devolución";
            }   
        }
    }

    public function modificar($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->devolucion->id_devolucion = $id;
            $this->devolucion->id_venta = $_POST['id_venta'];
            $this->devolucion->id_producto = $_POST['id_producto'];
            $this->devolucion->cantidad = $_POST['cantidad'];
            $this->devolucion->motivo = $_POST['motivo'];
            $this->devolucion->fecha_devolucion = $_POST['fecha_devolucion'];
            $this->devolucion->accion = 'MODIFICAR';
            $this->devolucion->id_estado = $_POST['id_estado'];

            if ($this->devolucion->modificarDevolucion($this->usuario)) {
                header('Location: index.php?controller=Devolucion&action=verTodosDevoluciones');
                exit();
            } else {
                echo "Error al modificar la devolución";
            }
        } else {
            $this->devolucion->verDevolucion($id);
            include 'views/CrearDevolucion.php';
        }
    }

    public function inactivar($id) {
        $this->devolucion->id_devolucion = $id;
        if ($this->devolucion->inactivarDevolucion($this->usuario)) {
            header('Location: index.php?controller=Devolucion&action=verTodosDevoluciones');
            exit();
        } else {
            echo "Error al inactivar la devolución";
        }
    }


    //page
    public function devolucionPage(){
        include 'views/CrearDevolucion.php';
    }
}
?>