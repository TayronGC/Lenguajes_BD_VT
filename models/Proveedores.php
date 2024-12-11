<?php
class Proveedores {
    private $conn;
    //public $table_name = "proveedores";

    public $id_proveedor;
    public $nombre;
    public $apellido1;
    public $apellido2;
    public $ciudad;
    public $telefono;
    public $id_estado;
    public $id_direccion;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Obtener un proveedor por ID
    public function verProveedor($id) {
        try {
            $stid = oci_parse($this->conn, 'BEGIN FIDE_VER_PROVEEDOR_SP(:p_id_proveedor, :p_nombre, :p_apellido, :p_ciudad, :p_telefono, :p_estado); END;');

            oci_bind_by_name($stid, ':p_id_proveedor', $id);
            oci_bind_by_name($stid, ':p_nombre', $nombre, 100);
            oci_bind_by_name($stid, ':p_apellido', $apellido, 100);
            oci_bind_by_name($stid, ':p_ciudad', $ciudad, 100);
            oci_bind_by_name($stid, ':p_telefono', $telefono, 15);
            oci_bind_by_name($stid, ':p_estado', $estado, 100);

            oci_execute($stid);

            echo "Procedimiento realizado" . "<br>";
            echo "ID Proveedor: " . $id . "<br>";
            echo "Nombre: " . $nombre . "<br>";
            echo "Apellido: " . $apellido . "<br>";
            echo "Ciudad: " . $ciudad . "<br>";
            echo "Teléfono: " . $telefono . "<br>";
            echo "Estado: " . $estado . "<br>";

            oci_free_statement($stid);
        } catch (Exception $e) {
            echo "Error al obtener proveedor: " . $e->getMessage();
        }
    }

    //insertar Proveedor
     public function insertarProveedor(){
        try {
        $stid = oci_parse($this->conn,'BEGIN FIDE_PROYECTO_FINAL_SP_PKG.FIDE_PROVEEDOR_TB_INSERTAR_DATOS_SP(:p_nombre_proveedor, :p_apellido1,:p_apellido2,:p_telefono,:p_id_direccion); END;');

        oci_bind_by_name($stid, ":P_NOMBRE_PROVEEDOR",$this->nombre,100);
        oci_bind_by_name($stid, ":P_APELLIDO1",$this->apellido1,100);
        oci_bind_by_name($stid, ":P_APELLIDO2",$this->apellido2,100);
        oci_bind_by_name($stid, ":P_TELEFONO",$this->telefono,100);
        oci_bind_by_name($stid, ":P_ID_DIRECCION",$this->id_direccion);

        if (oci_execute($stid)) {
            oci_free_statement($stid);
            return true;
        } else {
            oci_free_statement($stid);
            return false;
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}

    // Obtener todos los proveedores
    public function verTodosProveedores() {
        $proveedores = [];
        try {
            $sp = 'BEGIN FIDE_VER_TODOS_PROVEEDORES_SP(:p_cursor); END;';
            $stid = oci_parse($this->conn, $sp);

            $resultados = oci_new_cursor($this->conn);
            oci_bind_by_name($stid, ':p_cursor', $resultados, -1, OCI_B_CURSOR);

            oci_execute($stid);
            oci_execute($resultados);

            while (($row = oci_fetch_assoc($resultados)) != false) {
                $proveedores[] = $row;
            }

            oci_free_statement($stid);
            oci_free_cursor($resultados);
        } catch (Exception $e) {
            echo "Error al obtener proveedores: " . $e->getMessage();
        }

        return $proveedores;
    }

    // Inactivar un proveedor
    public function inactivarProveedor($id) {
        try {
            $sp = 'BEGIN FIDE_INACTIVAR_PROVEEDOR_SP(:p_id_proveedor); END;';
            $stid = oci_parse($this->conn, $sp);

            oci_bind_by_name($stid, ':p_id_proveedor', $id);

            if (oci_execute($stid)) {
                oci_free_statement($stid);
                return true;
            } else {
                oci_free_statement($stid);
                return false;
            }
        } catch (Exception $e) {
            echo "Error al inactivar proveedor: " . $e->getMessage();
            return false;
        }
    }
}
?>
