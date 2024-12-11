<?php
require_once "../models/DataBase.php";
require_once "../models/Persona.php";


class InicioSessionController {
    private $db;
    private $persona;

    public function __construct(){
        $this->db = new Database();
        $this->db = $this->db->getConnection();
        $this->persona = new Persona($this->db);
    }

    public function iniciarSesion(){
        if($_SERVER["REQUEST_METHOD"] == 'POST'){
            //if(!empty($_POST["IniciarSesion"])){
                if(empty($_POST["nombre_usuario"]) || empty($_POST["contrasena"])){
                    $message = "Uno de los campos esta vacio";
                }else{
                    $username = $_POST["nombre_usuario"];
                    $password = $_POST["contrasena"];

                    //Verificar que el usuario exista
                    if($this->persona->validarAll($username)){
                        //Verificar la contrasena
                        if ($this->persona->verifyPassword($password)){
                            //Iniciar la session
                            session_start();
                            $_SESSION['user_id'] = $this->persona->id_persona;
                            $_SESSION['role_id'] = $this->persona->id_rol;
                            //$message =  $_SESSION['user_id'];
                            header("Location: /views/dashboard.php");
                            echo  "Logeado";
                        }else{
                            echo  "datos incorrectos";
                            $message = "Datos incorrectos";
                        }
                    }else{
                        echo  "datos incorrectos";
                        $message = "Datos incorrectos";
                    }

                    /*
                    if($this->persona->validarUser($username)){
                        if($this->persona->verifyPassword($password)){
                            $message = "Todo bien";
                        }else{
                            $message = "Todo mal";
                        }
                    }else{
                        $message =  "Mal 1";
                    }
                    
                    
                    if($this->persona->iniciarSesion($username,$password)){
                        //$message = "Bien";
                        $id_prueba = $this->persona->getId($username);
                        //echo $id_prueba;
                        session_start();
                        $_SESSION['user_id'] = $id_prueba;
                        $message =  $_SESSION['user_id'];
                        /*
                        if($this->persona->verifyPassword($password)){
                            $message = "Todo bien";
                            //  header("Location: /index.php");
                        }else{
                            $message =  "Mal 1";
                        }
                            
                        
                    }else{
                        //$message = "Datos incorrectos";
                        $message =  "Mal";
                    } */
                //}
            }
        }else{
            echo  "datos incorrectos";
        }

        include "../views/login.php";
    }

}

$iniciarSession = new InicioSessionController;
$iniciarSession->iniciarSesion();

?>