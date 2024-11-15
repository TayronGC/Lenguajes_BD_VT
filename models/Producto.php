<?php

class Producto {
    private $conn;
    private $id_producto;
    private $nombre_producto;
    private $descripcion;
    private $id_categoria;
    private $id_proveedor;
    private $id_estado;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function verProducto($id){
        $stid = oci_parse($this->conn,'BEGIN ver_producto2(:p_id_producto,:p_nombre,:p_descripcion,:p_categoria,:p_estado); END;');

        oci_bind_by_name($stid,'p_id_producto',$id);
        oci_bind_by_name($stid,'p_nombre',$nombre_producto,100);
        oci_bind_by_name($stid,'p_descripcion',$descripcion,255);
        oci_bind_by_name($stid,'p_categoria',$id_categoria,100);
        oci_bind_by_name($stid,'p_estado',$id_estado,100);

        oci_execute($stid);
        echo "Procedimiento realizado" . "<br>";

        echo "Id Producto: " . $id . "<br>";
        echo "Nombre del producto: " . $nombre_producto . "<br>";
        echo "Descripcion: " . $descripcion . "<br>";
        echo "Id categoria: " . $id_categoria . "<br>";
        echo "Id estado: " . $id_estado . "<br>";
        
        oci_free_statement($stid);
    }
}


?>