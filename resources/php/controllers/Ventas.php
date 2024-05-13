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
}
