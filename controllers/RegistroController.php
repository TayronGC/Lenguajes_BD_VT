<?php
require_once "../models/DataBase.php";
require_once "../models/Persona.php";


class RegistroController {
    private $db;
    private $persona;

    public function __construct(){
        $this->db = new Database();
        $this->db = $this->db->getConnection();
        $this->persona = new Persona($this->db);
    }

    public function registrarUser(){
        if($_SERVER["REQUEST_METHOD"] == 'POST'){
            //if(!empty($_POST["Registro"])){
                if(empty($_POST["nombre"]) || empty($_POST["apellido1"]) ||
                empty($_POST["apellido2"]) || empty($_POST["correo"]) ||
                empty($_POST["nombre_usuario"]) || empty($_POST["contrasena"])){
                    $message = "Uno de los campos esta vacio";
                }else{
                    $username = $_POST["nombre_usuario"];
                    $this->persona->nombre=$_POST["nombre"];
                    $this->persona->apellido1=$_POST["apellido1"];
                    $this->persona->apellido2=$_POST["apellido2"];
                    $this->persona->correo=$_POST["correo"];
                    $this->persona->telefono=$_POST["telefono"];
                    $this->persona->nombre_usuario=$_POST["nombre_usuario"];
                    $this->persona->contrasena = password_hash($_POST['contrasena'], PASSWORD_BCRYPT);
                    if($this->persona->validarUser($username)){
                        $message = "El nombre de usuario ya está existe.";
                    }else{
                        if($this->persona->insertUsuario()){
                            header("Location: /views/login.php");
                        exit;
                        }else{
                            $message = "Error al registrar el usuario";
                        }
                    } 
                }
            //}
        }
        include "../views/register.php";
    }

    
}

$registroContro = new RegistroController();
$registroContro->registrarUser();
/*
if ($_SERVER['REQUEST_URI'] == '/RegistroController.php') {
    // Muestra el formulario de registro
    include "../views/register.php";
} elseif ($_SERVER['REQUEST_URI'] == '/registro/registrar') {
    // Procesa el formulario de registro
    $registroContro->registrarUser();
}

$db = new Database();
$db = $db->getConnection();
$usuario = new Persona($db);

if($_SERVER["REQUEST_METHOD"] == 'POST'){
    if(!empty($_POST["Registro"])){
        if(empty($_POST["nombre"]) or empty($_POST["apellido1"]) or
        empty($_POST["nombre_usuario"]) or empty($_POST["contrasena"])){
            echo "Uno de los campos esta vacio";
        }else{
            $usuario->nombre=$_POST["nombre"];
            $usuario->apellido1=$_POST["apellido1"];
            $usuario->correo=$_POST["correo"];
            $usuario->telefono=$_POST["telefono"];
            $usuario->nombre_usuario=$_POST["nombre_usuario"];
            $usuario->contrasena=$_POST["contrasena"];
            if($usuario->insertUsuario()){
                //$message = "Usuario registrado con éxito";
                header("Location: /views/login.php");
                exit;
            }else{
                $message = "Error al registrar el usuario";
            }
        }
    }
}
include "../views/register.php";
*/
?>