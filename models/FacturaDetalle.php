<?php

class FacturaDetalle {
    private $conn;
    public $id_factura;
    public $id_producto;
    public $cantidad;
    //public $precio;

    //Contructor para establecer la conexion
    public function __construct($db) {
        $this->conn = $db;
    }

    public function insertarFacturaDetalle(){
        try {
            $sp = 'BEGIN FIDE_PROYECTO_FINAL_SP_PKG.FIDE_FACTURA_DETALLE_TB_INSERTAR_DATOS_SP(:P_CANTIDAD, :P_ID_PRODUCTO, :P_ID_FACTURA_HEADER); END;';
            $stid = oci_parse($this->conn,$sp);
    
            oci_bind_by_name($stid, ":P_CANTIDAD",$this->cantidad);
            oci_bind_by_name($stid, ":P_ID_PRODUCTO",$this->id_producto);
            oci_bind_by_name($stid, ":P_ID_FACTURA_HEADER",$this->id_factura);

    
            if (oci_execute($stid)) {
                oci_free_statement($stid);
                return true;
            } else {
                oci_free_statement($stid);
                $error = oci_error($stid);
                throw new Exception("Error al insertar en Factura_Detalle: " . $error['message']);
                return false;
            }
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
}
?>