<?php
class Persona {
    private $conn;
    public $id_persona;
    public $tipo_persona;
    public $nombre;
    public $apellido1;
    public $apellido2;
    public $correo;
    public $ciudad;
    public $telefono;
    public $nombre_usuario;
    public $contrasena;
    public $id_rol;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function insertUsuario(){
        try {
            //Llamado al Procedimiento Almacenado
            $sp='BEGIN FIDE_PERSONA_TB_INSERTAR_PERSONA_SP(:p_nombre, :p_apellido1,:p_apellido2, :p_correo,:p_telefono, :p_nombre_usuario, :p_contrasena); END;';
            $stid = oci_parse($this->conn,$sp);
    
            oci_bind_by_name($stid, ":p_nombre",$this->nombre,100);
            oci_bind_by_name($stid, ":p_apellido1",$this->apellido1,100);
            oci_bind_by_name($stid, ":p_apellido2",$this->apellido2,100);
            oci_bind_by_name($stid, ":p_correo",$this->correo,100);
            oci_bind_by_name($stid, ":p_telefono",$this->telefono,100);
            oci_bind_by_name($stid, ":p_nombre_usuario",$this->nombre_usuario,100);
            oci_bind_by_name($stid, ":p_contrasena",$this->contrasena,100);
    
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

    public function validarUser($username){
        //Lamado a la funcion
        $fn="BEGIN :P_RESULTADO := FIDE_PERSONA_TB_VALIDAR_NOMBRE_USUARIO_FN(:P_NOMBRE_USUARIO); END;";
        $stid = oci_parse($this->conn, $fn);

        oci_bind_by_name($stid, ":P_NOMBRE_USUARIO", $username);
        oci_bind_by_name($stid, ":P_RESULTADO", $resultado);

        oci_execute($stid);

        if($resultado == 0){
            oci_free_statement($stid);
            return false;
        }else{
            oci_free_statement($stid);
            return true;
        }
    
    }

    public function validarAll($username){
        $sp = 'BEGIN FIDE_PERSONA_TB_OBTENER_USUARIO_SP(:P_NOMBRE_USUARIO,:P_ID_PERSONA, :P_CONTRASENA, :P_ID_ROL); END;';
        $stid = oci_parse($this->conn,$sp);

        oci_bind_by_name($stid,'P_NOMBRE_USUARIO',$username,100);
        oci_bind_by_name($stid,'P_ID_PERSONA',$this->id_persona);
        oci_bind_by_name($stid,'P_CONTRASENA',$this->contrasena,100);
        oci_bind_by_name($stid,'P_ID_ROL',$this->id_rol);

        
        if(oci_execute($stid)){
            if($this->id_persona !== null){
                oci_free_statement($stid);
                return true;
            }
        }
            oci_free_statement($stid);
            return false;
    }
/*
    public function iniciarSesion($nombre_usuario, $contrasena) {
        // Llama a la función para obtener el hash almacenado
        $sql = "BEGIN :P_HASH := FIDE_PERSONA_TB_OBTENER_HASH_FN(:P_NOMBRE_USUARIO); END;";
        $stid = oci_parse($this->conn, $sql);
    
        oci_bind_by_name($stid, ":P_NOMBRE_USUARIO", $nombre_usuario,100);
        oci_bind_by_name($stid, ":P_HASH", $hash,150);
    
        oci_execute($stid);
    
        if ($hash === null) {
            // Usuario no encontrado o inactivo
            return false;
        }
    
        // Compara la contraseña proporcionada con el hash
        if (password_verify($contrasena, $hash)) {
            // Contraseña correcta
            return true;
        } else {
            // Contraseña incorrecta
            return false;
        }
    }

    public function getId($username){
        $sql = "BEGIN :P_ID_PERSONA := FIDE_PERSONA_TB_OBTENER_ID_FN(:P_NOMBRE_USUARIO); END;";
        $stid = oci_parse($this->conn, $sql);
    
        oci_bind_by_name($stid, ":P_NOMBRE_USUARIO", $username,100);
        oci_bind_by_name($stid, ":P_ID_PERSONA", $idPrueba);

        oci_execute($stid);

        oci_free_statement($stid);
        return $idPrueba;
        
        
        if($id_persona > 0){
            oci_free_statement($stid);
            return id_persona;
        }else{
            oci_free_statement($stid);
            return 0;
        }
            
    }
    */


    /*
    public function iniciarSesion($nombre_usuario,$contrasena){
        $fn="BEGIN :P_RESULTADO := FIDE_PERSONA_TB_USUARIO_EXISTE_FN(:P_NOMBRE_USUARIO,:P_CONTRASENA); END;";

        $stid = oci_parse($this->conn,$fn);
        
        oci_bind_by_name($stid, ":P_NOMBRE_USUARIO", $nombre_usuario);
        oci_bind_by_name($stid, ":P_CONTRASENA", $contrasena);
        oci_bind_by_name($stid, ":P_RESULTADO", $resultado);

        oci_execute($stid);

        if($resultado == 1){
            oci_free_statement($stid);
            return true;
        }else{
            oci_free_statement($stid);
            return false;
        }
    }
        */



    // Verificar la contraseña
    public function verifyPassword($password) {
        return password_verify($password, $this->contrasena);
    }
}

?>