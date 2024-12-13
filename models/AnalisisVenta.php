<?php

class AnalisisVenta {
    private $conn;
    public $id_Analisis;
    public $id_persona;
    public $id_Producto;
    public $Total_ventas;
    public $Frecuencia;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function verhistoralCompras(){
        $ventas = [];
        try {
            $sp = 'BEGIN INFO_HISTORIAL_DE_COMPRAS_VM_SP(:p_cursor); END;';
            $stid = oci_parse($this->conn,$sp);

            $resultados = oci_new_cursor($this->conn);
            oci_bind_by_name($stid,'p_cursor', $resultados,-1,OCI_B_CURSOR);

            oci_execute($stid);
            oci_execute($resultados);

            //vincular datos
            while (($row = oci_fetch_assoc($resultados)) != false){


                $ventas[] = $row;
            }


            //Cerrar cursor
            oci_free_statement($stid);
            oci_free_cursor($resultados);

        } catch (Exception $e) {
            echo "Error al obtener categorias: " . $e->getMessage();
        }

        return $ventas;
    }
}

?>