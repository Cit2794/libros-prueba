<?php
include ("conexion-pg.php");

 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<!-- Boostrap 4.1 -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

 	<meta charset="UTF-8">
 	<title>Selección</title>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

  <script>
      $(document).ready(function()
      {
        var hash = location.hash;
        if(hash === "#alerta"){
          $("#mostrarmodal").modal("show");
        }
      });
  </script>
 </head>
 	<body>

	<header>
		<div class="jumbotron" style="background-color: #21CAA0; color: white;">
			<h1 class="display-4">¡LIBROS!</h1>
		</div>
	</header>

  <nav aria-label="..." style="padding-left: 5%;">
    <ul class="pagination">
      <li class="page-item">
        <a class="page-link" href="index.php" tabindex="-1">Agregar Libro</a>
      </li>
      <li class="page-item active disabled"><a class="page-link" href="select-pg.php">Libros</a></li>
      <li class="page-item">
        <a class="page-link" href="addautor-pg.php">Agregar autor</a>
      </li>
    </ul>
  </nav>

	<table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
	  <thead>
	    <tr>
	      <th scope="col"> ID </th>
	      <th scope="col"> Título </th>
	      <th scope="col"> Opciones </th>
	      <th scope="col"> Autor </th>
	    </tr>
	  </thead>
	  <tbody>
	<?php
    $result = mysqli_query( $con, "SELECT a.lib_id, a.lib_titulo, b.aut_nom FROM libros AS a INNER JOIN autor AS b ON a.aut_id = b.aut_id;" ) or die ( "Algo ha ido mal en la consulta a la base de datos");
 		$numrows = mysqli_num_rows($result);

 		while( $row = mysqli_fetch_array($result) ){
 			$id = $row['lib_id'];
 			?>

	    <tr>
	      <th scope="row">
		      <a href="<?php echo 'delete-pg.php?id=' . $id ?>">
        	      	<?php echo $id; ?> .-
        	</a>
	      </th>
	      <td> <?php echo $row['lib_titulo']; ?> </td>
	      <td> <a href="<?php echo 'form-pg.php?id=' . $id ?>"> <button type="button" class="btn tbn-inf btn-xs">Modificar</button>
	      	</a> </td>
	      <td> <?php echo $row['aut_nom']; ?> </td>
	    </tr>

	<?php }
    mysqli_close( $con );?>
	  </tbody>
	</table>

  <div class="modal fade" id="mostrarmodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
             <div class="modal-body">
                ¡El libro ha sido eliminado!
              </div>
             <div class="modal-footer">
            <a href="#" data-dismiss="modal" class="btn btn-danger">Aceptar</a>
             </div>
        </div>
     </div>
  </div>

  </body>
</html>
