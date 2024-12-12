<?php

class Promocion {
    private $conn;
    public $id_promocion;
    public $nombre_promocion;
    public $descripcion;
    public $fecha_inicio;
    public $fecha_fin;
    public $descuento;
    public $id_estado;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function verPromocion($id) {
        $stid = oci_parse($this->conn, 'BEGIN ver_promocion(:p_id_promocion, :p_nombre, :p_descripcion, :p_fecha_inicio, :p_fecha_fin, :p_descuento, :p_estado); END;');

        oci_bind_by_name($stid, 'p_id_promocion', $id);
        oci_bind_by_name($stid, 'p_nombre', $nombre_promocion, 100);
        oci_bind_by_name($stid, 'p_descripcion', $descripcion, 255);
        oci_bind_by_name($stid, 'p_fecha_inicio', $fecha_inicio, 50);
        oci_bind_by_name($stid, 'p_fecha_fin', $fecha_fin, 50);
        oci_bind_by_name($stid, 'p_descuento', $descuento);
        oci_bind_by_name($stid, 'p_estado', $id_estado, 100);

        oci_execute($stid);
        echo "Procedimiento realizado" . "<br>";

        echo "Id Promoción: " . $id . "<br>";
        echo "Nombre de la promoción: " . $nombre_promocion . "<br>";
        echo "Descripción: " . $descripcion . "<br>";
        echo "Fecha Inicio: " . $fecha_inicio . "<br>";
        echo "Fecha Fin: " . $fecha_fin . "<br>";
        echo "Descuento: " . $descuento . "<br>";
        echo "Estado: " . $id_estado . "<br>";
        
        oci_free_statement($stid);
    }

    public function verTodasPromociones() {
        $promociones = [];
        try {
            $sp = 'BEGIN ver_todas_promociones(:p_cursor); END;';
            $stid = oci_parse($this->conn, $sp);
    
            $resultados = oci_new_cursor($this->conn);
            oci_bind_by_name($stid, ':p_cursor', $resultados, -1, OCI_B_CURSOR);
    
            oci_execute($stid);
            oci_execute($resultados);
    
            while (($row = oci_fetch_assoc($resultados)) != false) {
                $promociones[] = $row;
            }
    
            oci_free_statement($stid);
            oci_free_cursor($resultados);
    
        } catch (Exception $e) {
            echo "Error al obtener promociones: " . $e->getMessage();
        }
    
        return $promociones;
    }

    public function insertarPromocion() {
        try {
            $stid = oci_parse($this->conn, 'BEGIN insertar_promocion(:p_nombre_promocion, :p_descripcion, :p_fecha_inicio, :p_fecha_fin, :p_descuento); END;');

            oci_bind_by_name($stid, ":p_nombre_promocion", $this->nombre_promocion, 100);
            oci_bind_by_name($stid, ":p_descripcion", $this->descripcion, 255);
            oci_bind_by_name($stid, ":p_fecha_inicio", $this->fecha_inicio);
            oci_bind_by_name($stid, ":p_fecha_fin", $this->fecha_fin);
            oci_bind_by_name($stid, ":p_descuento", $this->descuento);

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

    public function inactivarPromocion() {
        try {
            $sp = 'BEGIN desactivar_promocion(:p_id_promocion); END;';
            $stid = oci_parse($this->conn, $sp);
    
            oci_bind_by_name($stid, ":p_id_promocion", $this->id_promocion);
    
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