<?php

class Categoria {
    private $conn;
    private $id_categoria;
    private $nombre_categoria;
    private $descripcion;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function verCategoria($id){
        
        //LLamado al SP
        $stid = oci_parse($this->conn,'BEGIN ver_categoria(:p_id_categoria,:p_nombre_categoria, :p_descripcion); END;');
        
        oci_bind_by_name($stid, ":p_id_categoria",$id);
        oci_bind_by_name($stid, ":p_nombre_categoria",$nombre_categoria,100);
        oci_bind_by_name($stid, ":p_descripcion",$descripcion,255);
        
        //Ejecutar el sp
        oci_execute($stid);

        //Mostrar los resultados
        echo "Id Categoria: " . $id . "<br>";
        echo "Nombre Categoria: " . $nombre_categoria . "<br>";
        echo "Descripcion Categoria: " . $descripcion . "<br>";
        
        echo "Procedimiento almacenado ejecutado";

        //Liberar el statement
        oci_free_statement($stid);
    }
}

?>