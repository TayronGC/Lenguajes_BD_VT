<?php

class Database {
    private $host = "localhost";
    private $port = "1521"; // Puerto de Oracle
    private $service_name = "XE"; //Cambiar a orcl si es necesario
    private $username = "PROYECTO_LBD"; // Nombre del usuario de sql
    private $password = "123"; // Contraseña
    private $conn;

    public function __construct() {
        // Cadena de conexión
        $connectionString = "$this->host:$this->port/$this->service_name";

        // Conexión 
        $this->conn = oci_connect($this->username, $this->password, $connectionString);

        // Verificar si la conexión fue exitosa
        if (!$this->conn) {
            $e = oci_error();
            echo "Error de conexión: " . $e['message'];
        } else {
            echo "Conexión exitosa a Oracle" . "<br>";
        }
    }

    // Método para obtener la conexión
    public function getConnection() {
        return $this->conn;
    }
}

/*
$host = 'localhost'; // O la dirección de tu servidor Oracle
$port = '1521'; // Puerto de Oracle
$service_name = 'XE'; // Nombre del servicio Oracle
$username = 'PROYECTO_LBD'; // Tu nombre de usuario de Oracle
$password = '123'; // Tu contraseña de Oracle

// Cadena de conexión PDO
$dsn = "oci:dbname=//$host:$port/$service_name";

try {
    // Crear una instancia de PDO
    $conn = new PDO($dsn, $username, $password);
    // Establecer el modo de error de PDO a Excepciones
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexión exitosa a Oracle!";
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}

*/


/*

$host = 'localhost';
$port = '1521';
$service_name = 'XE';
$username = 'usuario';
$password = 'contraseña';
$connection_string = "$host:$port/$service_name";

$conn = oci_connect($username, $password, $connection_string);

if (!$conn) {
    $e = oci_error();
    echo "Error de conexión: " . $e['message'];
} else {
    echo "Conexión exitosa a Oracle!";
}*/
?>


