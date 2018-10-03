<?php
include ("conexion-mysql.php");
 ?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Boostrap 4.1 -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

		<meta charset="UTF-8">
		<title>Practica 01</title>
	</head>
	<body>

		<div class="jumbotron" style="background-color: #21CAA0; color: white;">
		  <h1 class="display-4">¡LIBROS!</h1>
		  <p class="lead">Ingresa un autor nuevo.</p>
		</div>

    <nav aria-label="..." style="padding-left: 5%;">
      <ul class="pagination">
        <li class="page-item">
          <a class="page-link" href="index.php" tabindex="-1">Agregar Libro</a>
        </li>
        <li class="page-item"><a class="page-link" href="select-mysql.php">Libros</a></li>
        <li class="page-item active disabled">
          <a class="page-link" href="addautor-mysql.php">Agregar autor</a>
        </li>
      </ul>
    </nav>

		<div class="container-fluid" style="padding: 5%;">
			<form action="insert-autor-mysql.php" method="POST">
			  <div class="form-group">
			    <label for="autor">Ingresa un autor nuevo:</label>
			    <input type="text" class="form-control" name="autor" placeholder="Nombre del autor" data-validation="required" data-validation-error-msg-container="#errorAutor">
          <div id="errorAutor" class="alert alert-danger" role="alert"> Debe ingresar un autor válido.</div>
			  </div>

			  <button type="submit" class="btn btn-dark btn-lg btn-block" style="align-items: right;" value="enviar">Agregar</button>
			</form>
		</div>


    <!-- JQuery Validator -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
    <script>
      $.validate({
        validateOnBlur : true,
        inlineErrorMessageCallback:  function($input, errorMessage, config) {
           if (errorMessage) {
            $('#errorAutor').show();
           } else {
            $('#errorAutor').hide();
           }
           return false;
        }
      });
      $( document ).ready(function() {
          $('#errorAutor').hide();
      });
    </script>
  </body>
</html>
