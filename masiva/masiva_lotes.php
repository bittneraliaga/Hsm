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
       
        $lote           = !empty($datos[0])  ? ($datos[0]) : '';
		$franja         = !empty($datos[1])  ? ($datos[1]) : '';
        $has_lote       = !empty($datos[2])  ? ($datos[2]) : '';
        $pep            = !empty($datos[3])  ? ($datos[3]) : '';
        $etapa1         = !empty($datos[4])  ? ($datos[4]) : '';
        $etapa2         = !empty($datos[5])  ? ($datos[5]) : '';
        $estado         = !empty($datos[6])  ? ($datos[6]) : '';
       
if( !empty($lote) ){
    $checkemail_duplicidad = ("SELECT lote FROM lote WHERE lote='".($lote)."' ");
            $ca_dupli = mysqli_query($conexion, $checkemail_duplicidad);
            $cant_duplicidad = mysqli_num_rows($ca_dupli);
        }   

//No existe Registros Duplicados
if ( $cant_duplicidad == 0 ) { 

    $insertarData = "INSERT INTO lote ( lote, franja, has_lote, pep, etapa1, etapa2, estado
    ) VALUES( '$lote', '$franja','$has_lote', '$pep', '$etapa1', '$etapa2', '$estado')";
    mysqli_query($conexion, $insertarData);
            
} 
/**Caso Contrario actualizo el o los Registros ya existentes*/
else{
    $updateData =  ("UPDATE lote SET 
        lote='" .$lote. "',
		franja='" .$franja. "',
        has_lote='" .$has_lote. "'
        pep = '" .$pep. "'
        etapa1 = '" .$etapa1. "'
        etapa2 = '" .$etapa2. "'
        estado = '" .$estado. "'
        WHERE lote='".$lote."'
    ");
    $result_update = mysqli_query($conexion, $updateData);
    } 
  }

 $i++;
}

?>

<a href="index_lotes.php">Atras</a>