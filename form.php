<?php
// require_once("php/Registro.php");

// $registro = new Registro();
?>
<!DOCTYPE html>
<html lang="es">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous" />
	<link rel="stylesheet" href="assets/css/estilos.css" />
	<title>TALLER BD1</title>
	<?php
	// include 'header.php'; 
	?>
</head>

<body>
	<div class="container">
		<div class="col align-self-center">
			<p></p>
			<h2 class="titulo col-lg-6 offset-md-3 p-0">
				<strong>INGRESA TUS DATOS</strong><br />
			</h2>
			<p></p>
			<form method="post" action='auth.php'>
			<!-- <form method="post"> -->
				<div class="form-group">
					<input type="text" name="input-nombre" class="form-control campo col-lg-6 offset-md-3" size="40" id="exampleFormControlInput1" placeholder="  NOMBRE" required />
				</div>
				<div class="form-group">
					<input type="email" name="input-mail" class="form-control campo col-lg-6 offset-md-3" size="40" id="exampleFormControlInput1" placeholder="  CORREO" required />
				</div>
				<!-- <div class="form-group"> -->
				<!-- <textarea class="form-control campo col-lg-6 offset-md-3" name="input-texto" id="exampleFormControlTextarea1" cols="40" rows="10" placeholder="  PREGUNTA"></textarea> -->
				<!-- </div> -->
				<button type="submit" name="enviar-correo" class="btn btn-danger boton align-self-center col-lg-2 offset-md-5">
					Ingresar
				</button>
			</form>
		</div>
	</div>
	<!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
	<!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script> -->
	<!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script> -->
	<?php include 'scripts.php'; ?>
</body>

</html>