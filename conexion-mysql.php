<?php

    $host="127.0.0.1";
    $port="5432";
    $user="userp01";
    $pass="Ocampo:27";
    $dbname="dbpractica01"; //prac01

	$con = mysqli_connect( $host, $user, $pass ) or die ("No se ha podido conectar al servidor de Base de datos");
  $db = mysqli_select_db( $con, $dbname ) or die ( "Upps! Pues va a ser que no se ha podido conectar a la base de datos" );

?>
