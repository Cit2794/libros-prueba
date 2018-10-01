<?php
include ("conexion-mysql.php");
 ?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Boostrap 4.1 -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

		<meta charset="UTF-8">
		<title>Practica Biblioteca</title>
	</head>
	<body>

		<div class="jumbotron" style="background-color: #21CAA0; color: white;">
		  <h1 class="display-4">¡LIBROS!</h1>
		  <p class="lead">Agrega un libro a la lista.</p>
		</div>

		<nav aria-label="..." style="padding-left: 5%;">
      <ul class="pagination">
        <li class="page-item active disabled">
          <a class="page-link" href="index.php" tabindex="-1">Agregar Libro</a>
        </li>
        <li class="page-item"><a class="page-link" href="select-mysql.php">Libros</a></li>
        <li class="page-item">
          <a class="page-link" href="addautor-mysql.php">Agregar autor</a>
        </li>
      </ul>
    </nav>

		<div class="container-fluid" style="padding: 5%;">
			<form action="insert-mysql.php" method="POST" id="form-libro" name="form-libro">
			  <div class="form-group">
			    <label for="titulo">Título del libro:</label>
			    <input type="text" class="form-control" name="titulo" placeholder="Titulo" data-validation="required" data-validation-error-msg-container="#errorTitulo">
          <div id="errorTitulo" class="alert alert-danger" role="alert"> Debe ingresar un título válido.</div>
        </div>

				<div class="form-group">
			    <label for="exampleFormControlSelect1">Selecciona un autor</label>
			    <select class="form-control" name="autor">
						<?php
							$result = mysqli_query( $con, "SELECT * FROM autor" ) or die ( "Algo ha ido mal en la consulta a la base de datos");

							while( $row = mysqli_fetch_array($result) ){
								$aut_nom = $row['aut_nom'];
						?>
			      <option value="<?php echo $aut_nom; //autor ?>"> <?php echo $aut_nom; //autor ?> </option>
						<?php }
							mysqli_close( $con );
						?>
			    </select>
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
            $('#errorTitulo').show();
           } else {
            $('#errorTitulo').hide();
           }
           return false;
        }
      });
      $( document ).ready(function() {
          $('#errorTitulo').hide();
      });
    </script>
  </body>
</html>
