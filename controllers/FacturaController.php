<?php

require_once 'models/DataBase.php';
require_once 'models/Factura_header.php';
require_once 'models/FacturaDetalle.php';
require_once 'models/Item.php';
/*
require_once "../models/DataBase.php";
require_once '../models/Factura_header.php';
require_once '../models/FacturaDetalle.php';
require_once '../models/Item.php';
*/
class FacturaController{
    private $db;
    private $facturaH;
    private $facturaD;

    public function __construct() {
        // Crear la conexión a la base de datos
        $this->db = new Database();
        $this->db = $this->db->getConnection();

        $this->facturaH = new Factura_header($this->db);
        $this->facturaD = new FacturaDetalle($this->db);
    }

    public function insertarFactura(){
        session_start();
        //echo "ID de la session: " . $_SESSION['user_id'];
        //echo "Carrito: " . $_SESSION['carrito'];
        //echo "Carrito: " . "</br>";
        //print_r($_SESSION['carrito']);
        $subTotal = 0;
        $totalLineas = 0;
        
        
        foreach($_SESSION['carrito'] as $carritoItem){
            if(is_object($carritoItem)){
                $precio = $carritoItem->price ?? 0; // Precio unitario
                $cantidad = $carritoItem->cantidad ?? 0; // Cantidad

                $subTotal += $precio * $cantidad;
                $totalLineas++; // Cuenta los productos diferentes
            }
        }

        $impuestos = $subTotal * 0.13;

        // Calcula el total
        $total = $subTotal + $impuestos;

        $this->facturaH->subTotal = $subTotal;
        $this->facturaH->impuestos = $impuestos;//Session
        $this->facturaH->total = $total;//Session
        $this->facturaH->total_lineas = $totalLineas;//Session
        $this->facturaH->id_persona = $_SESSION['user_id'];
        $this->facturaH->id_sucursal = 1;
        $this->facturaH->id_metodo_pago = 1;
        
        $this->facturaH->insertarFactura();


        //$this->facturaD->id_factura = 1; $this->id_sucursal
        if ($this->facturaD->id_factura = $this->facturaH->id_factura){

        foreach ($_SESSION['carrito'] as $carritoItem) {
            if (is_object($carritoItem)) {
                $this->facturaD->id_producto = $carritoItem->id ?? 0;
                $this->facturaD->cantidad = $carritoItem->cantidad ?? 0;;

                $this->facturaD->insertarFacturaDetalle();
            }
        }
        unset($_SESSION['carrito']);
        header("Location: index.php?controller=Carrito&action=listarCarrito");
        //echo "compra realizada";
    }else{
        echo "Error al insertar la factura.";
    }

    }

    public function verInfoFactura(){
        $facturas = $this->facturaH->verInfoFactura();
        include 'views/Facturacion.php';
    }

}

//$f = new FacturaController;
//$f->insertarFactura();

?>