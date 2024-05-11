<?php
    function db(){
        $conexion = new mysqli('localhost', 'root', '', 'bdvaleria');
        return$conexion;
    }