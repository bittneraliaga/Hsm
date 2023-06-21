<?php
$host_name ='localhost';
$database ='db_ga';
$user_name ='root';
$password ='';

$conexion = mysqli_connect($host_name, $user_name, $password, $database);

if (mysqli_errno($conexion)) {
    echo "Error al conectarme";
}else{
    echo "Me conecte a la DB";
}

$acentos = $conexion -> query("SET NAMES 'utf8"); 

?>