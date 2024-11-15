<?php

class Estado {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function verEstado($id) {

        $descripcion;

        $stid = oci_parse($this->conn,'BEGIN ver_estado(:p_id_estado,:p_descripcion); END;');

        oci_bind_by_name($stid,'p_id_estado',$id);
        oci_bind_by_name($stid,'p_descripcion',$descripcion,100);

        oci_execute($stid);

        echo "Procedimiento Realizado" . "<br>";

        echo "Id estado: " . $id . "<br>";
        echo "Descripcion: " . $descripcion . "<br>";

        oci_free_statement($stid);
    }
}
?>