<?php

include '../../config/config.php';

class Ventas{
    public static function saludo(){
        return 'hola';
    }

    public static function getAllUsers(){
        $db = db();
        $sql = "SELECT * FROM empleado";
        $result = $db->query($sql);
        while($row = $result->fetch_assoc()){
            $data[] = array(
                'id' => $row['empleadoID'],
                'nombre' => $row['nombre'],
                'apellido' => $row['apellido'],
                'email' => $row['email'],
                'numero' => $row['numero'],
                'direccion' => $row['direccion'],
            );
        }
        return $data;
    }
}
