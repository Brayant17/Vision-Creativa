<?php

include '../../config/config.php';

class Ventas{
    public static function saludo(){
        return 'hola';
    }

    public static function getAllVentas(){
        $db = db();
        $sql = "SELECT venta.*, empleado.nombre AS nombreEmpleado, CONCAT(cliente.nombre, ' ', cliente.apellidos) AS NombreCliente FROM `venta` 
        LEFT JOIN empleado ON venta.empleadoID = empleado.empleadoID
        LEFT JOIN cliente ON venta.clienteID = cliente.clienteID;";
        $result = $db->query($sql);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $data[] = array(
                    'id' => $row['ventaID'],
                    'cliente' => $row['NombreCliente'],
                    'empleado' => $row['nombreEmpleado'],
                    'cantidad' => $row['cantidad'],
                );
            }
        }
        else{
            $data = null;
        }
        return $data;
    }

    public static function getVenta(){
        $idVenta = $_POST['idVenta'];
        $db = db();
        $sql = "SELECT venta.*, empleado.nombre AS nombreEmpleado, CONCAT(cliente.nombre, ' ', cliente.apellidos) AS NombreCliente FROM `venta` 
        LEFT JOIN empleado ON venta.empleadoID = empleado.empleadoID
        LEFT JOIN cliente ON venta.clienteID = cliente.clienteID
        WHERE ventaID = $idVenta;";
        $result = $db->query($sql);
        if($result->num_rows > 0){
            $data = $result->fetch_assoc();
        }
        else{
            $data = null;
        }
        return $data;
    }

    public static function updateVenta(){
        var_dump($_POST);
    }

    public static function setVenta(){
        $db = db();
        var_dump($_POST);
        $cliente = $_POST["cliente"];
        $empleado = $_POST["empleado"];
        $cantidad = $_POST["cantidad"];

        // creamos nuevo cliente
        $idCliente = self::setNewClient($cliente);

        // buscamos el empleado
        $idEmpleado = self::searchEmpleado($empleado);
        var_dump($idEmpleado);
        // $sql = "INSERT INTO `venta`(`clienteID`, `empleadoID`, `cantidad`) VALUES ($idCliente,'[value-2]','[value-3]','[value-4]')";

        


    }

    public static function setNewClient($nombre){
        $db = db();
        $sql = "INSERT INTO `cliente`(`nombre`) VALUES ('$nombre')";
        $result = $db->query($sql);
        $idCliente = $db->insert_id;
        return $idCliente;
    }


    public static function searchEmpleado($empleado){
        $db = db();
        $sql = "SELECT empleadoID FROM `empleado` WHERE nombre LIKE '%$empleado%'";
        $result = $db->query($sql);
        $result = $result->fetch_assoc();
        return $result['empleadoID'];
    }
}
