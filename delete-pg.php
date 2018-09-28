<?php
include ("conexion-pg.php");
$ide = $_GET["id"];

$delete = mysqli_query($con, "DELETE FROM libros WHERE lib_id ='" . $ide . "';");
mysqli_close( $con );

if($delete){
	header ("Location: select-pg.php#alerta");
}

?>
