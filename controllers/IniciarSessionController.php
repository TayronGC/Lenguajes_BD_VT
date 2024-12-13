<?php
//require_once "../models/DataBase.php";
//require_once "../models/Persona.php";
require_once "models/DataBase.php";
require_once "models/Persona.php";


class IniciarSessionController {
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
                            //echo "Persona_ID: ".$this->persona->id_persona;
                            //echo "Rol_ID: ". $this->persona->id_rol;
                            if($_SESSION['role_id'] == 1){
                                //echo "Admin";
                                header("Location: index.php?controller=Admin&action=adminPage");
                            }elseif($_SESSION['role_id'] == 2){
                                //echo "Cliente";
                                header("Location: index.php");
                            }else{
                                echo "Rol invalido";
                            }

                            //$message =  $_SESSION['user_id'];
                            //header("Location: /views/dashboard.php");
                            echo  $_SESSION['user_id'] . "<br>";
                            echo "rol".$_SESSION['role_id'];
                        }else{
                            //echo  "datos incorrectos";
                            $message = "Datos incorrectos";
                        }
                    }else{
                        //echo  "datos incorrectos";
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
        }
        include "views/login.php";
    }


    public function cerrarSession(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        session_start();
        session_unset();
        session_destroy();
        header ("Location: index.php?controller=IniciarSession&action=loginPage");
        exit;
        }else{
            echo "Error: método no permitido.";
        }
    }

    public function loginPage(){
        include "views/login.php";
    }

}

//$iniciarSession = new InicioSessionController;
//$iniciarSession->iniciarSesion();

?>