<?php

class Inventario {
    private $conn;
    public $id_inventario;
    public $cantidad;
    public $id_producto;
    public $id_sucursal;
    public $id_estado;

    //Contructor para establecer la conexion
    public function __construct($db) {
        $this->conn = $db;
    }

    public function insertarInventario(){
        try {
        $sp = 'BEGIN FIDE_PROYECTO_FINAL_SP_PKG.FIDE_INVENTARIO_TB_INSERTAR_DATOS_SP(:p_cantidad, :p_id_producto, :p_id_sucursal); END;';
        $stid = oci_parse($this->conn,$sp);

        oci_bind_by_name($stid, ":p_cantidad",$this->cantidad);
        oci_bind_by_name($stid, ":p_id_producto",$this->id_producto);
        oci_bind_by_name($stid, ":p_id_sucursal",$this->id_sucursal);


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

    public function verTodosInventarios(){
        $inventarios = [];
        try {
            $sp = 'BEGIN FIDE_INVENTARIO_TB_VER_INVENTARIOS_SP(:p_cursor); END;';
            $stid = oci_parse($this->conn,$sp);

            $resultados = oci_new_cursor($this->conn);
            oci_bind_by_name($stid,'p_cursor', $resultados,-1,OCI_B_CURSOR);

            oci_execute($stid);
            oci_execute($resultados);

            //vincular datos
            while (($row = oci_fetch_assoc($resultados)) != false){


                $inventarios[] = $row;
            }


            //Cerrar cursor
            oci_free_statement($stid);
            oci_free_cursor($resultados);

        } catch (Exception $e) {
            echo "Error al obtener inventarios: " . $e->getMessage();
        }
        return $inventarios;
    }

    public function inactivarinventario(){
        try {
            $sp = 'BEGIN FIDE_PROYECTO_FINAL_SP_PKG.FIDE_INVENTARIO_TB_DESACTIVAR_DATOS_SP(:P_ID_INVENTARIO); END;';
            $stid = oci_parse($this->conn,$sp);
    
            oci_bind_by_name($stid, ":P_ID_INVENTARIO",$this->id_inventario);
    
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

        public function modificarInventario(){
            try {
                $sp = 'BEGIN FIDE_PROYECTO_FINAL_SP_PKG.FIDE_INVENTARIO_TB_MODIFICAR_DATOS_SP(:P_ID_INVENTARIO, :P_CANTIDAD, :P_ID_PRODUCTO, :P_ID_SUCURSAL,:P_ID_ESTADO); END;';
                $stid = oci_parse($this->conn,$sp);
        
                oci_bind_by_name($stid, ":P_ID_INVENTARIO",$this->id_inventario);
                oci_bind_by_name($stid, ":P_CANTIDAD",$this->cantidad);
                oci_bind_by_name($stid, ":P_ID_PRODUCTO",$this->id_producto);
                oci_bind_by_name($stid, ":P_ID_SUCURSAL",$this->id_sucursal);
                oci_bind_by_name($stid, ":P_ID_ESTADO",$this->id_estado);
        
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
}
?>