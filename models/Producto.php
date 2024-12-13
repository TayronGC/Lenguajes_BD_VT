<?php

class Producto {
    private $conn;
    public $id_producto;
    public $nombre_producto;
    public $descripcion;
    public $precio_unitario;
    public $fecha_vencimiento;
    public $id_categoria;
    public $id_proveedor;
    public $id_estado;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function verProducto($id){
        $sp ='BEGIN FIDE_PRODUCTO_TB_VER_PRODUCTO_SP(:p_id_producto,:p_nombre_producto,:p_precio_unitario); END;';
        //$sp ='BEGIN FIDE_PRODUCTO_TB_VER_PRODUCTO_SP(:P_ID_PRODUCTO,:P_NOMBRE_PRODUCTO,:P_DESCRIPCION,:P_PRECIO_UNITARIO,:P_FECHA_VENCIMIENTO,:P_ID_CATEGORIA,:P_ID_PROVEEDOR,:P_ID_ESTADO); END;';
        $stid = oci_parse($this->conn,$sp);

        oci_bind_by_name($stid,':p_id_producto',$id);
        oci_bind_by_name($stid,':p_nombre_producto',$this->nombre_producto,250);
        //oci_bind_by_name($stid,':P_DESCRIPCION',$this->descripcion,255);
        oci_bind_by_name($stid, ":p_precio_unitario",$this->precio_unitario,-1);
        /*
    oci_bind_by_name($stid,':P_FECHA_VENCIMIENTO',$this->fecha_vencimiento);
        oci_bind_by_name($stid,':P_ID_CATEGORIA',$this->id_categoria);
        oci_bind_by_name($stid,':P_ID_PROVEEDOR',$this->id_proveedor);
        oci_bind_by_name($stid,':P_ID_ESTADO',$this->id_estado);
        */
        $this->id_producto = $id;
        oci_execute($stid);
        /*
        echo "Procedimiento realizado" . "<br>";

        echo "Id Producto: " . $id . "<br>";
        echo "Nombre del producto: " . $nombre_producto . "<br>";
        echo "Descripcion: " . $descripcion . "<br>";
        echo "Id categoria: " . $id_categoria . "<br>";
        echo "Id estado: " . $id_estado . "<br>";
        */
        oci_free_statement($stid);
    }

    public function verTodosProductos() {
        $productos = [];
        try {
            // Procedimiento almacenado 
            $sp = 'BEGIN FIDE_PRODUCTO_VER_TODOS_SP(:p_cursor); END;';
            $stid = oci_parse($this->conn, $sp);
    
            
            $resultados = oci_new_cursor($this->conn);
            oci_bind_by_name($stid, ':p_cursor', $resultados, -1, OCI_B_CURSOR);
    
            
            oci_execute($stid);
            oci_execute($resultados);
    
            //vincular los datos
            while (($row = oci_fetch_assoc($resultados)) != false) {
                $productos[] = $row;
            }
    
            //cerrar cursor
            oci_free_statement($stid);
            oci_free_cursor($resultados);
    
        } catch (Exception $e) {
            echo "Error al obtener productos: " . $e->getMessage();
        }
    
        return $productos;
    }
    

    //insert 
    public function insertarProducto(){
        
        try {
        $stid = oci_parse($this->conn,'BEGIN FIDE_PROYECTO_FINAL_SP_PKG.FIDE_PRODUCTO_TB_INSERTAR_DATOS_SP(:p_nombre_producto, :p_descripcion, :p_precio_unitario, TO_DATE(:p_fecha_vencimiento, \'DD-MM-YYYY\') , :p_id_categoria, :p_id_proveedor); END;');
        //Para el formato de fecha
        $this->fecha_vencimiento = date('d-m-Y'); 

        oci_bind_by_name($stid, ":p_nombre_producto",$this->nombre_producto,100);
        oci_bind_by_name($stid, ":p_descripcion",$this->descripcion,255);
        oci_bind_by_name($stid, ":p_precio_unitario",$this->precio_unitario);
        oci_bind_by_name($stid, ":p_fecha_vencimiento",$this->fecha_vencimiento);
        oci_bind_by_name($stid, ":p_id_categoria",$this->id_categoria);
        oci_bind_by_name($stid, ":p_id_proveedor",$this->id_proveedor);
        

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

    public function inactivarProducto(){
        try {
            $sp = 'BEGIN FIDE_PROYECTO_FINAL_SP_PKG.FIDE_PRODUCTO_TB_DESACTIVAR_DATOS_SP(:P_ID_PRODUCTO); END;';
            $stid = oci_parse($this->conn,$sp);
    
            oci_bind_by_name($stid, ":P_ID_PRODUCTO",$this->id_producto);
    
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