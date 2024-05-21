<?php

include_once '../../config/config.php';

class Usuarios
{

    public static function getAllUsers()
    {
        $db = db();
        $sql = "SELECT * FROM empleado";
        $result = $db->query($sql);
        while ($row = $result->fetch_assoc()) {
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

    public static function getUser()
    {
        $idUser = $_POST['id'];
        $db = db();
        $sql = "SELECT * FROM empleado WHERE empleadoID = $idUser";
        $result = $db->query($sql);
        while ($row = $result->fetch_assoc()) {
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

    public static function updateUser(){
        $db = db();
        $id = $_POST['updateData']["idItem"];
        $nombre = $_POST['updateData']["nombreItem"];
        $apellido = $_POST['updateData']["apellido"];
        $email = $_POST['updateData']["email"];
        $numero = $_POST['updateData']["numero"];
        $direccion = $_POST['updateData']["direccion"];

        $sql = "UPDATE `empleado` SET `nombre`='$nombre',`apellido`='$apellido',`email`= '$email',`numero`='$numero',`direccion`='$direccion'  WHERE empleadoID = $id";
        $db->query($sql);
        $data = array('succes'=>'ok');
        return $data;
    }

    public static function setNewUser(){
        $db = db();
        $nombre = $_POST['dataUser']["nombreUsuario"];
        $apellido = $_POST['dataUser']["apellido"];
        $email = $_POST['dataUser']["emial"];
        $numero = $_POST['dataUser']["numero"];
        $password = password_hash($_POST['dataUser']["password"], PASSWORD_BCRYPT);
        $direccion = $_POST['dataUser']["direccion"];

        $sql = "INSERT INTO `empleado`(`nombre`, `apellido`, `email`, `numero`, `password`, `direccion`) VALUES ('$nombre','$apellido','$email','$numero','$password','$direccion')";
        $db->query($sql);
        $data = array('succes'=>'ok');
        return $data;
    }
}
