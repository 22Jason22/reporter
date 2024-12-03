<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Registro</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- STYLE CSS -->
	<link rel="stylesheet" href="assets/css/registro.css">
</head>

<body>

	<div class="cintillo">

		<img src="assets/imgs/cintillo.jpeg" alt="Imagen de la barra superior">

	</div>
	
	<div class="logo-container">
        <img src="assets/imgs/logo_univ.png" alt="Logo Universidad" class="logo-universidad">
    </div>
    <div class="logo-container_INTI">
        <img src="assets/imgs/Logo_inti.png" alt="Logo Instituto" class="logo-instituto">
    </div>

	<div class="wrapper">
		<div class="inner">

			<?php
			include "config/config.php";
			include "acciones/validar.php";
			?>
			<form action="" method="post">
				<h3>Ingresa Tus Datos</h3>
				
				<div class="preguntas">

					<div class="columna">

						<div class="form-holder active">
							<input type="text" placeholder="Nombre" class="form-control" name="nombre" maxlength="30" required>
						</div>

						<div class="form-holder active">
							<input type="text" placeholder="Apellido" class="form-control" name="apellido" maxlength="30" required>
						</div>

					</div>

					<div class="columna">


						<div class="form-holder active">
							<input type="number" placeholder="Cedula" class="form-control" name="cedula" maxlength="30" required>
						</div>

						<div class="form-holder active">
							<input type="input" placeholder="Usuario" class="form-control" name="user_nom" maxlength="30" required>
						</div>

					</div>

					<div class="columna">

						<div class="form-holder active">
							<input type="password" placeholder="Contraseña" class="form-control" name="user_pass" maxlength="30" id="user_pass" required>
						</div>

						<div class="form-holder active">
							<input type="password" placeholder="Confirmar Contraseña" class="form-control" name="conf_pass" maxlength="30" id="conf_pass" required>
							<span id="password-error" style="color: red;"></span>
						</div>

					</div>

					<div class="columna">

						<div class="form-holder active">
							<input type="text" placeholder="Gerencia" class="form-control" name="gerencia" maxlength="30" required>
						</div>

						<div class="form-holder active">
							<input type="text" placeholder="Area" class="form-control" name="area" maxlength="30" required>
						</div>

					</div>



				</div>

				<br>
				<div class="form-login">
					<button type="submit" name="registro">Registrar</button>
					<p>¿Ya Posees Una Cuenta? <a href="index.php">Inicia Sesion</a></p>
				</div>

				<br>
				<p></p>
			</form>
		</div>
	</div>

	<script src="assets/js/jquery-3.3.1(registro).min.js"></script>
	<script src="assets/js/main(registro).js"></script>
</body>

</html>