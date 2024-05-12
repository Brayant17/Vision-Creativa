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

        $sql = "UPDATE `inventario` SET `Nombre`='$nombre',`Descripcion`='$descripcion',`Stock`=$stock,`sku`='$sku' WHERE id_inventario = $idItem";
        $db->query($sql);
        $data = array('succes'=>'ok');
    }

    if($metodo == 'getEditInventario'){
        $idItem = intval($_POST['idItem']);
        $sql = "SELECT * FROM inventario WHERE id_inventario = $idItem";
        $result = $db->query($sql);
        $data = $result->fetch_assoc();
    }

    if($metodo == 'setNewInventario'){
        $nombre = $_POST['nombreItem'];
        $descripcion = $_POST['descripcion'];
        $stock = $_POST['stock'];
        $sku = $_POST['sku'];
        $sql = "INSERT INTO `inventario`(`Nombre`, `Descripcion`, `Stock`, `sku`) VALUES ('$nombre','$descripcion',$stock,'$sku')";
        $result = $db->query($sql);
        $data = array('succes'=>$result);
    }
    if($metodo == 'getAllData'){
        $sql = "SELECT * FROM inventario";
        $result = $db->query($sql);
        while($row = $result->fetch_assoc()){
            $data[] = array(
                'id' => $row['id_inventario'],
                'nombre' => $row['Nombre'],
                'descripcion' => $row['Descripcion'],
                'stock' => $row['Stock'],
                'sku' => $row['sku'],
            );
        }
        
    }

    if($metodo == 'deleteItem'){
        $idItem = intval($_POST['idItem']);
        $sql = "DELETE FROM `inventario` WHERE id_inventario = $idItem";
        $result = $db->query($sql);
        $data = array('succes'=>$result);
    }

    header('Content-Type: application/json');
    echo json_encode($data);