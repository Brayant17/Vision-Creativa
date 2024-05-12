<?php
    include_once 'autoload.php';

    $controller = $_POST['controller']; 
    $metodo = $_POST['metodo'];

    $data = $controller::$metodo();

    header('Content-Type: application/json');
    echo json_encode($data);