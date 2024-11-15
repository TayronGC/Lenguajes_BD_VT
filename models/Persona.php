<?php
class Persona {
    $conn;
    $id_persona;
    $tipo_persona;
    $apellido1;
    $apellido2;
    $correo;
    $ciudad;
    $telefono;
    $nombre_usuario;
    $id_rol;

    public function __construct($db) {
        $this->conn = $db;
    }
}


/*
// Llamada al procedimiento almacenado
$stid = oci_parse($conn, "BEGIN ver_clientes(:p_cursor); END;");

// Preparar un parámetro para el REF CURSOR
$cursor = oci_new_cursor($conn);

// Vincular el parámetro del cursor
oci_bind_by_name($stid, ":p_cursor", $cursor, -1, OCI_B_CURSOR);

// Ejecutar el procedimiento almacenado
oci_execute($stid);

// Recorrer los resultados del REF CURSOR
oci_execute($cursor);

while ($row = oci_fetch_assoc($cursor)) {
    echo "ID Cliente: " . $row['ID_CLIENTE'] . "\n";
    echo "Nombre: " . $row['NOMBRE'] . "\n";
    echo "Apellido: " . $row['APELLIDO'] . "\n";
    echo "Teléfono: " . $row['TELEFONO'] . "\n";
    echo "Email: " . $row['EMAIL'] . "\n";
    echo "-----------------------------\n";
}

// Cerrar la conexión
oci_free_statement($stid);
oci_free_cursor($cursor);
oci_close($conn);
*/
?>