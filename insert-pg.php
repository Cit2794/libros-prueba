<?php
include ("conexion-pg.php");

$titulo = $_POST['titulo'];
$autor = $_POST['autor'];


$result = mysqli_query($con, "INSERT INTO libros (lib_titulo, aut_id) VALUES ( '$titulo', (SELECT aut_id FROM autor WHERE aut_nom='$autor') )") or die('La consulta fallo: ' . pg_last_error());
mysqli_close( $con );

header("Location: select-pg.php");

 ?>
