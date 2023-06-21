<?php
$franja = mb_strtoupper($_POST['franja']);
$descripcion = mb_strtoupper($_POST['descripcion']);
$has_franja = $_POST['has_franja'];

include "conexion.php";

$insertar ="INSERT INTO franja (franja, descripcion, has_franja) VALUES ('$franja','$descripcion','$has_franja')";

if ($conexion -> query($insertar)==true){
    header('location: ../registros.php');
}else{
    echo "No se guardo la informacion";
    header('location: ../index.php');
}

$conexion -> close();

?>