<?php
include ("conexion-mysql.php");

if(isset ($_GET['tituloNuevo'])){
	$id = $_GET['id'];
	$tituloNuevo = $_GET['tituloNuevo'];
}

$modify = mysqli_query($con, "UPDATE libros SET lib_titulo='" . $tituloNuevo . "' WHERE lib_id='" . $id . "';");
mysqli_close( $con );

header("Location: select-mysql.php");

 ?>
