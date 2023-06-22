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
       
        $minuto      = !empty($datos[0])  ? ($datos[0]) : '';
		$quince      = !empty($datos[1])  ? ($datos[1]) : '';
        $media       = !empty($datos[2])  ? ($datos[2]) : '';
       
    if( !empty($minuto) ){
        $checkemail_duplicidad = ("SELECT minuto FROM hora30 WHERE minuto='".($minuto)."' ");
                $ca_dupli = mysqli_query($conexion, $checkemail_duplicidad);
                $cant_duplicidad = mysqli_num_rows($ca_dupli);
            }   

    //No existe Registros Duplicados
    if ( $cant_duplicidad == 0 ) { 

        $insertarData = "INSERT INTO hora30 (minuto, quince, media) 
                            VALUES( '$minuto', '$quince', '$media')";
        mysqli_query($conexion, $insertarData);
                
    } 
/**Caso Contrario actualizo el o los Registros ya existentes*/
else{
    $updateData =  ("UPDATE hora30 SET 
        minuto='" .$minuto. "',
		quince='" .$quince. "',
        media='"  .$media. "',
    ");
    $result_update = mysqli_query($conexion, $updateData);
    } 
  }

 $i++;
}

?>

<a href="index_hora30.php">Atras</a>