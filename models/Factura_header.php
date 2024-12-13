<?php

class Factura_header {
    private $conn;
    public $id_factura;
    public $fecha_factura;
    public $subTotal;
    public $impuestos;
    public $total;
    public $total_lineas;
    public $id_metodo_pago;
    public $id_persona;
    public $id_sucursal;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function insertarFactura(){
        try {
            $sp = 'BEGIN FIDE_PROYECTO_FINAL_SP_PKG.FIDE_FACTURA_HEADER_TB_INSERTAR_DATOS_SP(:P_SUBTOTAL, :P_IMPUESTO,:P_TOTAL, :P_TOTAL_LINEAS,:P_ID_METODO_PAGO ,:P_ID_PERSONA ,:P_ID_SUCURSAL,:P_ID_FACTURA); END;';
            $stid = oci_parse($this->conn,$sp);
    
            oci_bind_by_name($stid, ":P_SUBTOTAL",$this->subTotal);
            oci_bind_by_name($stid, ":P_IMPUESTO",$this->impuestos);
            oci_bind_by_name($stid, ":P_TOTAL",$this->total);
            oci_bind_by_name($stid, ":P_TOTAL_LINEAS",$this->total_lineas);
            oci_bind_by_name($stid, ":P_ID_METODO_PAGO",$this->id_metodo_pago);
            oci_bind_by_name($stid, ":P_ID_PERSONA",$this->id_persona);
            oci_bind_by_name($stid, ":P_ID_SUCURSAL",$this->id_sucursal);

            //$idFactura = null; // Variable para capturar el ID generado
            oci_bind_by_name($stid, ":P_ID_FACTURA", $this->id_factura, -1, SQLT_INT);

    
            if (oci_execute($stid)) {
                oci_free_statement($stid);
                return true;
            } else {
                oci_free_statement($stid);
                $error = oci_error($stid);
                throw new Exception("Error al insertar en Factura_Header: " . $error['message']);
            }
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
}
?>