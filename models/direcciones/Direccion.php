<?php

class Direccion{
    private $db;
    public $id_direccion;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function insertarDirecciones($detalle,$pais,$provincia,$canton,$distrito) {
        
        try {
            $sp = 'BEGIN FIDE_PROYECTO_FINAL_SP_PKG.FIDE_DIRECCION_TB_INSERTAR_DATOS_SP(:P_DETALLE, :P_ID_PAIS, :P_ID_PROVINCIA, :P_ID_CANTON, :P_ID_DISTRITO, :P_ID_DIRECCION); END;';
            $stid = oci_parse($this->conn,$sp);
            //Para el formato de fecha
            $this->fecha_vencimiento = date('d-m-Y'); 
            
            oci_bind_by_name($stid, ":P_DETALLE",$detalle,100);
            oci_bind_by_name($stid, ":P_ID_PAIS",$pais);
            oci_bind_by_name($stid, ":P_ID_PROVINCIA",$provincia);
            oci_bind_by_name($stid, ":P_ID_CANTON",$canton);
            oci_bind_by_name($stid, ":P_ID_DISTRITO",$distrito);

            oci_bind_by_name($stid, ":P_ID_DIRECCION", $this->id_direccion, -1, SQLT_INT);
            
    
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