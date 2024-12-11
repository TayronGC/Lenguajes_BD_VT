<?php

class Categoria {
    private $conn;
    public $id_categoria;
    public $nombre_categoria;
    public $descripcion;
    public $id_estado;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function verCategoria($id){
        try {

        //LLamado al SP
        $stid = oci_parse($this->conn,'BEGIN FIDE_PROYECTO_FINAL_SP_PKG.FIDE_CATEGORIA_TB_VER_DATOS_SP(:p_id_categoria,:p_nombre_categoria, :p_descripcion); END;');
    
        oci_bind_by_name($stid, ":p_id_categoria",$id);
        oci_bind_by_name($stid, ":p_nombre_categoria",$nombre_categoria,100);
        oci_bind_by_name($stid, ":p_descripcion",$descripcion,255);

        if (!oci_execute($stid)) { // El "@" oculta el warning de PHP
            $error = oci_error($stid); // Obtén el error específico de Oracle
            if (empty($nombre_categoria) && empty($descripcion)) {
                        throw new Exception("No se encontró la categoría con el ID proporcionado.<br>");
                        //echo "No se encontró la categoría con el ID proporcionado.<br>";
                        oci_free_statement($stid);
                        return false;
                    }

            throw new Exception("Error en la ejecución del procedimiento: " . $error['message']);
        }

        // Verificar si los valores esperados fueron encontrados
        

        echo "Id Categoria: " . $id . "<br>";
        echo "Nombre Categoria: " . $nombre_categoria . "<br>";
        echo "Descripcion Categoria: " . $descripcion . "<br>";
        echo "Procedimiento almacenado ejecutado" . "<br>";

        oci_free_statement($stid);
        return true;
        
        //Ejecutar el sp
        //oci_execute($stid);
        /*
        if (oci_execute($stid)) {
            echo "Id Categoria: " . $id . "<br>";
            echo "Nombre Categoria: " . $nombre_categoria . "<br>";
            echo "Descripcion Categoria: " . $descripcion . "<br>";
            echo "Procedimiento almacenado ejecutado";
            oci_free_statement($stid);
            return true;
        } else {
            echo "ERRORRR";
            oci_free_statement($stid);
            return false;
        }
*/
        //Mostrar los resultados
        

        //Liberar el statement
        //oci_free_statement($stid);
    }catch (Exception $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }

    }

    public function insertarCategoria(){
        try {
        $stid = oci_parse($this->conn,'BEGIN FIDE_PROYECTO_FINAL_SP_PKG.FIDE_CATEGORIA_TB_INSERTAR_DATOS_SP(:p_nombre_categoria, :p_descripcion); END;');

        oci_bind_by_name($stid, ":p_nombre_categoria",$this->nombre_categoria,100);
        oci_bind_by_name($stid, ":p_descripcion",$this->descripcion,255);

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
        
        //oci_execute($stid);
        //echo "Procedimiento almacenado ejecutado" . "<br>";
        //echo "Datos ingresados correctamente" . "<br>";

        //oci_free_statement($stid);
    }
    

    public function verTodasCategorias(){
        $categorias = [];
        try {
            $sp = 'BEGIN FIDE_CATEGORIA_VER_CATEGORIAS_SP(:p_cursor); END;';
            $stid = oci_parse($this->conn,$sp);

            $resultados = oci_new_cursor($this->conn);
            oci_bind_by_name($stid,'p_cursor', $resultados,-1,OCI_B_CURSOR);

            oci_execute($stid);
            oci_execute($resultados);

            //vincular datos
            while (($row = oci_fetch_assoc($resultados)) != false){


                $categorias[] = $row;
            }


            //Cerrar cursor
            oci_free_statement($stid);
            oci_free_cursor($resultados);

        } catch (Exception $e) {
            echo "Error al obtener categorias: " . $e->getMessage();
        }

        return $categorias;
    }


    public function inactivarCategoria(){
        try {
            $sp = 'BEGIN FIDE_PROYECTO_FINAL_SP_PKG.FIDE_CATEGORIA_TB_DESACTIVAR_DATOS_SP(:P_ID_CATEGORIRA); END;';
            $stid = oci_parse($this->conn,$sp);
    
            oci_bind_by_name($stid, ":P_ID_CATEGORIRA",$this->id_categoria);
    
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

    
        public function modificarCategoria(){
            try {
                $sp = 'BEGIN FIDE_PROYECTO_FINAL_SP_PKG.FIDE_CATEGORIA_TB_MODIFICAR_DATOS2_SP(:p_id_categoria,:p_nombre_categoria, :p_descripcion, :p_id_estado); END;';
                $stid = oci_parse($this->conn,$sp);
        
                oci_bind_by_name($stid, ":p_id_categoria",$this->id_categoria);
                oci_bind_by_name($stid, ":p_nombre_categoria",$this->nombre_categoria,100);
                oci_bind_by_name($stid, ":p_descripcion",$this->descripcion,255);
                oci_bind_by_name($stid, ":p_id_estado",$this->id_estado);
        
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