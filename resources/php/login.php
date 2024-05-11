<?php
    include_once '../../config/config.php';
    // var_dump($_POST);
  

    if(isset($_POST['register'])){
        $conexion = db();
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $email = $_POST['email'];
        $numero = $_POST['numero'];
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $direccion = $_POST['direccion'];
        $sql = "INSERT INTO empleado (nombre, apellido, email, numero, password, direccion) VALUES ('$nombre', '$apellido', '$email', '$numero', '$password', '$direccion')";
        $conexion->query($sql);
        header('Location: ../../index.php');
    }
    
    if(isset($_POST['login'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $conexion = db();
        $sql = "SELECT * FROM empleado WHERE email LIKE '%$email%'";
        $result = $conexion->query($sql);
        if($result->num_rows <= 0){
            header('Location: ../../index.php');
        }
        $dataUser = $result->fetch_assoc();
        if($dataUser['email'] == $email && password_verify($password, $dataUser['password'])){
            // var_dump($dataUser);
            header('Location: ../../src/pages/index.html');
        }else{
            header('Location: ../../index.php');
        }
    }