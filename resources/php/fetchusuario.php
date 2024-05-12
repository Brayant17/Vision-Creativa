<?php
    include_once '../../config/config.php';
    $db = db();
    $metodo = $_POST['metodo'];
    if($metodo == 'setEditInventario'){
        $idItem = intval($_POST['idItem']);
        $nombre = $_POST['nombreItem'];
        $descripcion = $_POST['descripcion'];
        $stock = $_POST['stock'];
        $sku = $_POST['sku'];

        $sql = "UPDATE `empleado` SET `nombre`='$nombre',`apellido`='$apellido',`email`=$email,`numero`='$numero',`password`='$password',`direccion`='$direccion'  WHERE empleadoID = $idItem";
        $db->query($sql);
        $data = array('succes'=>'ok');
    }

    if($metodo == 'getEditInventario'){
        $idItem = intval($_POST['idItem']);
        $sql = "SELECT * FROM empleado WHERE empleadoID = $idItem";
        $result = $db->query($sql);
        $data = $result->fetch_assoc();
    }

    if($metodo == 'setNewInventario'){
        $nombre = $_POST['nombreUsuario'];
        $apellido = $_POST['apellido'];
        $email = $_POST['emial'];
        $numero = $_POST['numero'];
        $direccion = $_POST['direccion'];
        $sql = "INSERT INTO `empleado`(`nombre`, `apellido`, `email`, `numero`, `direccion`) VALUES ('$nombre','$apellido', '$email', '$numero', '$direccion')";
        $result = $db->query($sql);
        $data = array('succes'=>$result);
    }
    if($metodo == 'getAllData'){
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
        
    }

    if($metodo == 'deleteItem'){
        $idItem = intval($_POST['idItem']);
        $sql = "DELETE FROM `empleado` WHERE empleadoID = $idItem";
        $result = $db->query($sql);
        $data = array('succes'=>$result);
    }

    header('Content-Type: application/json');
    echo json_encode($data);