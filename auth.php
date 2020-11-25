<?php
session_start();
require_once("php/Registro.php");

$registro = new Registro();
if (!empty($_POST['input-nombre']) && !empty($_POST['input-mail'])) {
	$_SESSION['user_name'] = $_POST['input-nombre'];
	$_SESSION['user_mail'] = $_POST['input-mail'];
	// var_dump("Entra");
}
if (!empty($_POST['input-codigo'])) {
	// $records = $conn->prepare('SELECT id, email, password FROM users WHERE email=:email');
	// $records->bindParam(':email', $_POST['email']);
	// $records->execute();
	// $results = $records->fetch(PDO::FETCH_ASSOC);

	// $message = '';

	// if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
	// $_SESSION['user_id'] = $results['id'];
	if ($_SESSION['codigo'] == $_POST['input-codigo']) {

		$_SESSION['user_id'] = $_POST['input-codigo'];
		header('Location: /primer_taller_bd');
	} else {
		$message = 'ESE CÓDIGO NO ES VÁLIDO';
	}

	// try {
	// } catch (PDOException $e) {
	// 	//throw $th;
	// }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
	<?php include 'header.php'; ?>
	<!-- Required meta tags -->
	<!-- <meta charset="utf-8" /> -->
	<!-- <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" /> -->

	<!-- Bootstrap CSS -->
	<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous" /> -->
	<!-- <link rel="stylesheet" href="assets/css/estilos.css" /> -->
	<!-- <title>TERPEL</title> -->
</head>

<body>

	<?php if (!empty($message)) : ?>
		<div class="container">
			<div class="col align-self-center">
				<p></p>
				<h2 class="titulo col-lg-6 offset-md-3 p-0">
					<strong>INGRESA EL CÓDIGO</strong><br />
					<strong>DE TU CORREO</strong>
				</h2>
				<p></p>
				<form method="post" action='auth.php'>
					<div class="form-group">
						<input type="text" name="input-codigo" class="form-control campo col-lg-6 offset-md-3" size="40" id="exampleFormControlInput1" placeholder="  CÓDIGO" required />
					</div>
					<!-- <div class="form-group"> -->
					<!-- <input type="email" name="input-mail" class="form-control campo col-lg-6 offset-md-3" size="40" id="exampleFormControlInput1" placeholder="  CORREO" required/> -->
					<!-- </div> -->
					<!-- <div class="form-group"> -->
					<!-- <textarea class="form-control campo col-lg-6 offset-md-3" name="input-texto" id="exampleFormControlTextarea1" cols="40" rows="10" placeholder="  PREGUNTA"></textarea> -->
					<!-- </div> -->
					<button type="submit" name="enviar-correo" class="btn btn-danger boton align-self-center col-lg-2 offset-md-5">
						Continuar
					</button>
					<label for=""><?= $message  ?></label>
				</form>
			</div>
		</div>
	<?php else : ?>
		<div class="container">
			<div class="col align-self-center">
				<p></p>
				<h2 class="titulo col-lg-6 offset-md-3 p-0">
					<strong>INGRESA EL CÓDIGO</strong><br />
					<strong>DE TU CORREO</strong>
				</h2>
				<p></p>
				<form method="post" action='auth.php'>
					<div class="form-group">
						<input type="text" name="input-codigo" class="form-control campo col-lg-6 offset-md-3" size="40" id="exampleFormControlInput1" placeholder="  CÓDIGO" required />
					</div>
					<!-- <div class="form-group"> -->
					<!-- <input type="email" name="input-mail" class="form-control campo col-lg-6 offset-md-3" size="40" id="exampleFormControlInput1" placeholder="  CORREO" required/> -->
					<!-- </div> -->
					<!-- <div class="form-group"> -->
					<!-- <textarea class="form-control campo col-lg-6 offset-md-3" name="input-texto" id="exampleFormControlTextarea1" cols="40" rows="10" placeholder="  PREGUNTA"></textarea> -->
					<!-- </div> -->
					<button type="submit" name="enviar-correo" class="btn btn-danger boton align-self-center col-lg-2 offset-md-5">
						Continuar
					</button>
				</form>
			</div>
		</div>
	<?php endif; ?>
	<!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
	<!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script> -->
	<!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script> -->
	<?php include 'scripts.php'; ?>
</body>

</html>