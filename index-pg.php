<?php
include ("conexion-pg.php");
 ?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Boostrap 4.1 -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<!--
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <script src="js/jquery.form.js" type="text/javascript"></script>
    <script src="js/jquery.validate.js" type="text/javascript"></script>
    <script type="text/javascript">
    $(document).ready(function(){
        $("#contact-form").validate({
            event: "blur",rules: {'titulo': "required"},
            messages: {'titulo': "Debes ingresar un titulo"},
            debug: true,errorElement: "label",
            submitHandler: function(form){
                $("#alert").show();
                $("#alert").html("<img src='images/ajax-loader.gif' style='vertical-align:middle;margin:0 10px 0 0' /><strong>Enviando mensaje...</strong>");
                setTimeout(function() {
                    $('#alert').fadeOut('slow');
                }, 5000);
            }
        });
    });
    </script> -->
		<meta charset="UTF-8">
		<title>Practica 01</title>
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
        <li class="page-item"><a class="page-link" href="select-pg.php">Libros</a></li>
        <li class="page-item">
          <a class="page-link" href="addautor-pg.php">Agregar autor</a>
        </li>
      </ul>
    </nav>

		<div class="container-fluid" style="padding: 5%;">
    <!--  <div class="alert alert-success" id="alert" style="display: none;">&nbsp;</div> -->
			<form action="insert-pg.php" method="POST" id="form-libro" name="form-libro">
			  <div class="form-group">
			    <label for="titulo">Título del libro:</label>
			    <input type="text" class="form-control required" name="titulo" placeholder="Titulo" minlength=”4”>
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

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
