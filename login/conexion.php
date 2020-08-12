<?php
    // Crear conexion
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $bd = 'torneo_box_olimpico';

    $conexion = mysqli_connect($host, $user, $password, $bd);
    //$conexion = mysqli_connect("localhost", "root", "12345", "abdarqueologia");
    // Checar conexion
    if ($conexion->connect_error) {
        //die("Conexion fallida: " . $conn->connect_error);
        header("Location: ../../pages/Otras/conexion-fallida.php");
    } 

?>