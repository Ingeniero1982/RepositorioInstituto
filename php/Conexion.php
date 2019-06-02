<?php
    $conn = mysqli_connect("localhost", "root", "", "instituto");
    $RespuestConexion="";
    if (!$conn) {
        $RespuestConexion=die("Falla conexión a base de datos: " . mysqli_connect_error());
    }
    else
    {
        $RespuestConexion="OK";
    }
    
?>