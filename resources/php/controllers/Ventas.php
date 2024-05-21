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
                    'precio' => $row['precio'],
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
        $cliente = $_POST["cliente"];
        $empleado = $_POST["empleado"];
        $cantidad = intval($_POST["cantidad"]);
        $precio = intval($_POST["precio"]);

        // creamos nuevo cliente
        $idCliente = intval(self::setNewClient($cliente));

        // buscamos el empleado
        // $idEmpleado = intval(self::searchEmpleado($empleado));
        
        $sql = "INSERT INTO venta (`clienteID`, `empleadoID`, `cantidad`, `precio`) VALUES ($idCliente, $empleado, $cantidad, $precio)";
        
        $result = $db->query($sql);
        
        return $result;


    }

    public static function setNewClient($nombre){
        $db = db();
        $sql = "INSERT INTO `cliente`(`nombre`) VALUES ('$nombre')";
        $db->query($sql);
        $idCliente = $db->insert_id;
        return $idCliente;
    }


    public static function searchEmpleado($empleado){
        $db = db();
        $sql = "SELECT empleadoID FROM `empleado` WHERE nombre LIKE '%$empleado%'";
        $query = $db->query($sql);
        $result = $query->fetch_assoc();
        if(is_null($result)){
            return 1;
        }
        return $result['empleadoID'];
    }
}
