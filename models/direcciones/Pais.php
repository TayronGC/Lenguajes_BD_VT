<?php

class Pais{
    private $db;

    public function __construct($db) {
        $this->conn = $db;
    }


    public function verPaises(){
        $paises = [];
        try {
            $sp = 'BEGIN FIDE_PROYECTO_FINAL_SP_PKG.FIDE_PAIS_VER_DATOS_SP(:p_cursor); END;';
            $stid = oci_parse($this->conn,$sp);

            $resultados = oci_new_cursor($this->conn);
            oci_bind_by_name($stid,'p_cursor', $resultados,-1,OCI_B_CURSOR);

            oci_execute($stid);
            oci_execute($resultados);

            //vincular datos
            while (($row = oci_fetch_assoc($resultados)) != false){


                $paises[] = $row;
            }


            //Cerrar cursor
            oci_free_statement($stid);
            oci_free_cursor($resultados);

        } catch (Exception $e) {
            echo "Error al obtener categorias: " . $e->getMessage();
        }

        return $paises;
    }
}

?>