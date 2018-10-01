<?php
include ("conexion-mysql.php");

$autor = $_POST['autor'];


$result = mysqli_query($con, "INSERT INTO autor (aut_nom) VALUES ( '$autor')") or die('La consulta fallo: ' . pg_last_error());
mysqli_close( $con );

header("Location: index.php");

 ?>
