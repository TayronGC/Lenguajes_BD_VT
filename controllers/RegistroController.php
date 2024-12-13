<?php
//require_once "../models/DataBase.php";
//require_once "../models/Persona.php";

require_once "models/DataBase.php";
require_once "models/Persona.php";
require_once "models/direcciones/Pais.php";
require_once "models/direcciones/Provincia.php";
require_once "models/direcciones/Canton.php";
require_once "models/direcciones/Distrito.php";
require_once "models/direcciones/Direccion.php";


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

                    $id_pais =  $_POST['pais'];
                    $id_provincia =  $_POST['provincia'];
                    $id_canton =  $_POST['canton'];
                    $id_distrito =  $_POST['distrito'];
                    $detalle =  'Direccion Cliente';
                    

                    $direccion = new Direccion($this->db);

                    if($this->persona->validarUser($username)){
                        $message = "El nombre de usuario ya está existe.";
                    }else{
                        $direccion->insertarDirecciones($detalle,$id_pais,$id_provincia,$id_canton,$id_distrito);
                        $this->persona->id_direccion = $direccion->id_direccion;
                        //echo "id direccion obtenido" . $this->persona->id_direccion;
                        if($this->persona->insertUsuario()){
                            //$direccion->insertarDirecciones($detalle,$id_pais,$id_provincia,$id_canton,$id_distrito);
                            header("Location: index.php?controller=IniciarSession&action=loginPage");
                        exit;
                        }else{
                            $message = "Error al registrar el usuario";
                        }
                    } 
                }
            //}
        }
        include "views/register.php";
    }

    public function registerPage(){
        $pais = new Pais($this->db);
        $provincia = new provincia($this->db);
        $canton = new Canton($this->db);
        $distrito = new Distrito($this->db);

        $paises = $pais->verPaises();
        $provincias = $provincia->verProvincias();
        $cantones = $canton->verCantones();
        $distritos = $distrito->verDistritos();
        include "views/register.php";
    }

    
}

//$registroContro = new RegistroController();
//$registroContro->registrarUser();
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