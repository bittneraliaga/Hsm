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
       
        $id             = !empty($datos[0])  ? ($datos[0]) : '';
		$estado_fenol   = !empty($datos[1])  ? ($datos[1]) : '';
       
    if( !empty($estado_fenol) ){
        $checkemail_duplicidad = ("SELECT estado_fenol FROM fenologia WHERE estado_fenol='".($estado_fenol)."' ");
                $ca_dupli = mysqli_query($conexion, $checkemail_duplicidad);
                $cant_duplicidad = mysqli_num_rows($ca_dupli);
            }   

    //No existe Registros Duplicados
    if ( $cant_duplicidad == 0 ) { 

        $insertarData = "INSERT INTO fenologia (id, estado_fenol) 
                            VALUES( '$id', '$estado_fenol')";
        mysqli_query($conexion, $insertarData);
                
    } 
/**Caso Contrario actualizo el o los Registros ya existentes*/
else{
    $updateData =  ("UPDATE fenologia SET 
        id='" .$id. "',
		estado_fenol='" .$estado_fenol. "',
        
    ");
    $result_update = mysqli_query($conexion, $updateData);
    } 
  }

 $i++;
}

?>

<a href="index_fenologia.php">Atras</a>