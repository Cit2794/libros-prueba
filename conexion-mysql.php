<?php
    $host="libros-prueba-mysqldbserver.mysql.database.azure.com";
   // $port="5432";
    $user="mysqldbuser@libros-prueba-mysqldbserver";
    $pass="Passpruebas123";
    $dbname="mysqldatabase27673";
	$con = mysqli_connect( $host, $user, $pass ) or die ("No se ha podido conectar al servidor de Base de datos");
  $db = mysqli_select_db( $con, $dbname ) or die ( "Upps! Pues va a ser que no se ha podido conectar a la base de datos" );
?>
