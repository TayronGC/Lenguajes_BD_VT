<?php
require_once 'models/DataBase.php';
require_once 'models/Proveedores.php';

class ProveedoresController {
    private $db;
    private $proveedor;

    public function __construct() {
        $this->db = new Database();
        $this->db = $this->db->getConnection();

        $this->proveedor = new Proveedores($this->db);
    }
    //INSERTAR
    public function insertarProveedor() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->proveedor->nombre = $_POST['nombre'];
            $this->proveedor->apellido1 = $_POST['apellido1'];
            $this->proveedor->apellido2 = $_POST['apellido2'];
            $this->proveedor->telefono = $_POST['telefono'];
            $this->proveedor->id_direccion = $_POST['id_direccion'];
         //   $this->proveedor-> = $_POST['descripcion'];

            if($this->proveedor->insertarProveedor()) {
                echo "proveedor creada con exito";
                //header ("Location: index.php?controller=Proveedor&action=verTodosProveedores");
                //echo "<script>window.location.href = 'index.php?controller=Categoria&action=list';</script>";
            }else {
                echo "Hubo un error al crear la proveedores.";
            }
    
        } 
        
        
    }


    public function insertarProveedorpage(){
        include 'views/CrearProveedor.php';
    }




    // Ver un proveedor por ID
    public function verProveedor($id) {
        $this->proveedor->verProveedor($id);
    }

    // Ver todos los proveedores
    public function verTodosProveedores() {
        $proveedores = $this->proveedor->verTodosProveedores();
        if (!empty($proveedores)) {
            include 'views/VerProveedores.php'; 
        } else {
            echo "No hay proveedores.";
        }
    }

    // Inactivar un proveedor
    public function inactivarProveedor() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id_proveedor'])) {
            $this->proveedor->id_proveedor = $_POST['id_proveedor'];

            if ($this->proveedor->inactivarProveedor($this->proveedor->id_proveedor)) {
                header("Location: index.php?controller=proveedores&action=verTodosProveedores");
                exit();
            } else {
                echo "Hubo un error al inactivar el proveedor.";
            }
        } else {
            echo "No se recibió el ID del proveedor.";
        }
    }
}
?>
