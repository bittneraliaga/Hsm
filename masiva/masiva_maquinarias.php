<?php
require('../controladores/conexion.php');
$tipo       = $_FILES['dataCliente']['type'];
$tamanio    = $_FILES['dataCliente']['size'];
$archivotmp = $_FILES['dataCliente']['tmp_name'];
$lineas     = file($archivotmp);

$i = 0;

foreach ($lineas as $linea) {
    $cantidad_registros = count($lineas);
    $cantidad_regist_agregados =  ($cantidad_registros - 1);

    if ($i != 0) {

        $datos = explode(";", $linea);
       
        $codigo           = !empty($datos[0])  ? ($datos[0]) : '';
		$descripcion      = !empty($datos[1])  ? ($datos[1]) : '';
       
    if( !empty($codigo) ){
        $checkemail_duplicidad = ("SELECT codigo FROM maquinaria WHERE codigo='".($codigo)."' ");
                $ca_dupli = mysqli_query($conexion, $checkemail_duplicidad);
                $cant_duplicidad = mysqli_num_rows($ca_dupli);
            }   

    //No existe Registros Duplicados
    if ( $cant_duplicidad == 0 ) { 

        $insertarData = "INSERT INTO maquinaria (codigo, descripcion) 
                            VALUES( '$codigo', '$descripcion')";
        mysqli_query($conexion, $insertarData);
                
    } 
/**Caso Contrario actualizo el o los Registros ya existentes*/
else{
    $updateData =  ("UPDATE maquinaria SET 
        codigo='" .$codigo. "',
		descripcion='" .$descripcion. "',

    ");
    $result_update = mysqli_query($conexion, $updateData);
    } 
  }

 $i++;
}

?>

<a href="index_maquinarias.php">Atras</a>