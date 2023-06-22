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
       
        $dni                = !empty($datos[0])  ? ($datos[0]) : '';
		$codigo             = !empty($datos[1])  ? ($datos[1]) : '';
        $apellidos          = !empty($datos[2])  ? ($datos[2]) : '';
        $nombres            = !empty($datos[3])  ? ($datos[3]) : '';
        $alias              = !empty($datos[4])  ? ($datos[4]) : '';
        $cargo              = !empty($datos[5])  ? ($datos[5]) : '';
       
if( !empty($dni) ){
    $checkemail_duplicidad = ("SELECT dni FROM personal WHERE dni='".($dni)."' ");
            $ca_dupli = mysqli_query($conexion, $checkemail_duplicidad);
            $cant_duplicidad = mysqli_num_rows($ca_dupli);
        }   

//No existe Registros Duplicados
if ( $cant_duplicidad == 0 ) { 

$insertarData = "INSERT INTO personal( dni, codigo, apellidos, nombres, alias, cargo
) VALUES( '$dni', '$codigo','$apellidos', '$nombres', '$alias', '$cargo')";
mysqli_query($conexion, $insertarData);
        
} 
/**Caso Contrario actualizo el o los Registros ya existentes*/
else{
    $updateData =  ("UPDATE personal SET 
        dni='" .$dni. "',
		codigo='" .$codigo. "',
        apellidos='" .$apellidos. "'
        nombres = '" .$nombres. "'
        alias = '" .$alias. "'
        cargo = '" .$cargo. "'
        WHERE dni='".$dni."'
    ");
    $result_update = mysqli_query($conexion, $updateData);
    } 
  }

 $i++;
}

?>

<a href="index_personal.php">Atras</a>