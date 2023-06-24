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
       
        $cod_producto   = !empty($datos[0])  ? ($datos[0]) : '';
		$descripcion    = !empty($datos[1])  ? ($datos[1]) : '';
        $und_med        = !empty($datos[2])  ? ($datos[2]) : '';
       
    if( !empty($cod_producto) ){
        $checkemail_duplicidad = ("SELECT cod_producto FROM productos WHERE cod_producto='".($cod_producto)."' ");
                $ca_dupli = mysqli_query($conexion, $checkemail_duplicidad);
                $cant_duplicidad = mysqli_num_rows($ca_dupli);
            }   

    //No existe Registros Duplicados
    if ( $cant_duplicidad == 0 ) { 

        $insertarData = "INSERT INTO productos (cod_producto, descripcion, und_med) 
                            VALUES( '$cod_producto', '$descripcion', '$und_med')";
        mysqli_query($conexion, $insertarData);
                
    } 
/**Caso Contrario actualizo el o los Registros ya existentes*/
else{
    $updateData =  ("UPDATE productos SET 
        cod_producto='" .$cod_producto. "',
		descripcion='" .$descripcion. "',
        und_med='" .$und_med. "',
        
    ");
    $result_update = mysqli_query($conexion, $updateData);
    } 
  }

 $i++;
}

?>

<a href="index_productos.php">Atras</a>