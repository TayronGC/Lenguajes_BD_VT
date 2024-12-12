<?php

class Devolucion{
    private $conn;
    public $id_promocion;
    public $razon;
    public $fecha_creacion;
    public $id_producto;
    public $_id_factura_header;
    public $id_inventario;
    public $id_venta;
    public $cantidad;
    public $motivo;
    public $fecha_devolucion;
    public $accion;
    public $id_estado;
    public $id_devolucion;


    public function __construct($db) {
        $this->conn = $db;
    }


    //devolucion 
    public function verDevolucion($id) {
        $stid = oci_parse($this->conn, 'BEGIN FIDE_PROYECTO_FINAL_SP_PKG.FIDE_DEVOLUCION_VER_SP(:p_id_devolucion,:p_id_promocion,:p_razon,:p_fecha_creacion,:p_id_producto,:id_factura_header,:p_id_inventario); END;');

        oci_bind_by_name($stid, ':p_id_devolucion', $id);
        oci_bind_by_name($stid, ':p_id_promocion', $id_venta);
        oci_bind_by_name($stid, ':p_razon', $id_producto);
        oci_bind_by_name($stid, ':p_fecha_creacion', $cantidad);
        oci_bind_by_name($stid, ':p_id_producto', $motivo, 255);
        oci_bind_by_name($stid, ':id_factura_header', $fecha_devolucion, 50);
        oci_bind_by_name($stid, ':p_id_inventario', $creado_por, 100);
        oci_free_statement($stid);
    }

    //ver devolucion
    public function verTodasDevoluciones() {
        $devoluciones = [];
        try {
            $sp = 'BEGIN FIDE_PROYECTO_FINAL_SP_PKG.FIDE_DEVOLUCION_VER_TODOS_SP(:p_cursor); END;';
            $stid = oci_parse($this->conn, $sp);
    
            $resultados = oci_new_cursor($this->conn);
            oci_bind_by_name($stid, ':p_cursor', $resultados, -1, OCI_B_CURSOR);
    
            oci_execute($stid);
            oci_execute($resultados);
    
            while (($row = oci_fetch_assoc($resultados)) != false) {
                $devoluciones[] = $row;
            }
    
            oci_free_statement($stid);
            oci_free_cursor($resultados);
    
        } catch (Exception $e) {
            echo "Error al obtener devoluciones: " . $e->getMessage();
        }
    
        return $devoluciones;
    }

    //insertar
    public function insertarDevolucion($usuario) {
        try {
            $stid = oci_parse($this->conn, 'BEGIN FIDE_PROYECTO_FINAL_SP_PKG.FIDE_DEVOLUCION_INSERTAR_SP(:p_id_venta, :p_id_producto, :p_cantidad, :p_motivo, :p_fecha_devolucion, :p_creado_por, :p_accion, :p_id_estado); END;');

            oci_bind_by_name($stid, ":p_id_venta", $this->id_venta);
            oci_bind_by_name($stid, ":p_id_producto", $this->id_producto);
            oci_bind_by_name($stid, ":p_cantidad", $this->cantidad);
            oci_bind_by_name($stid, ":p_motivo", $this->motivo, 255);
            oci_bind_by_name($stid, ":p_fecha_devolucion", $this->fecha_devolucion);
            oci_bind_by_name($stid, ":p_creado_por", $usuario, 100);
            oci_bind_by_name($stid, ":p_accion", $this->accion, 50);
            oci_bind_by_name($stid, ":p_id_estado", $this->id_estado);

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

    public function modificarDevolucion($usuario) {
        try {
            $stid = oci_parse($this->conn, 'BEGIN FIDE_PROYECTO_FINAL_SP_PKG.FIDE_DEVOLUCION_MODIFICAR_SP(:p_id_devolucion, :p_id_venta, :p_id_producto, :p_cantidad, :p_motivo, :p_fecha_devolucion, :p_modificado_por, :p_accion, :p_id_estado); END;');

            oci_bind_by_name($stid, ":p_id_devolucion", $this->id_devolucion);
            oci_bind_by_name($stid, ":p_id_venta", $this->id_venta);
            oci_bind_by_name($stid, ":p_id_producto", $this->id_producto);
            oci_bind_by_name($stid, ":p_cantidad", $this->cantidad);
            oci_bind_by_name($stid, ":p_motivo", $this->motivo, 255);
            oci_bind_by_name($stid, ":p_fecha_devolucion", $this->fecha_devolucion);
            oci_bind_by_name($stid, ":p_modificado_por", $usuario, 100);
            oci_bind_by_name($stid, ":p_accion", $this->accion, 50);
            oci_bind_by_name($stid, ":p_id_estado", $this->id_estado);

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


    //eliminar
    public function inactivarDevolucion($usuario) {
        try {
            $sp = 'BEGIN FIDE_PROYECTO_FINAL_SP_PKG.FIDE_DEVOLUCION_INACTIVAR_SP(:p_id_devolucion, :p_modificado_por); END;';
            $stid = oci_parse($this->conn, $sp);
    
            oci_bind_by_name($stid, ":p_id_devolucion", $this->id_devolucion);
            oci_bind_by_name($stid, ":p_modificado_por", $usuario, 100);
    
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