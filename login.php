<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="utf-8">
	<title>System Fisio </title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

	<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

	<link href="../../../../css?family=Roboto:300,400,500,700,900" rel="stylesheet">

	<link rel="stylesheet" href="assets/css/bootstrap.min.css">

	<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
	<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">

	<link rel="stylesheet" href="assets/css/style.css">

	<link rel="stylesheet" href="assets/css/style-preload.css">
	<!--[if lt IE 9]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
	<![endif]-->

</head>

<body onload="loading()">

	<div class="box-load">
		<div class="pre"></div>
	</div>



	<div class="main-wrapper">
		<div class="account-page ">
			<div class="container ">
				<h3 class="account-title text-white"></h3>
				<div class="account-box" >
				<!-- style="border-radius: 5px;" -->
					<div class="account-wrapper ">
						<div class="account-logo">
							<a href="index.html"><img src="assets/img/logo.png" alt="SchoolAdmin"></a>
						</div>
						<?php

						//PARA NOTIFICAR SENHA INCORETA 
						if (isset($_SESSION['nao_autenticado']) == true) { ?>

							<div class="alert alert-warning" role="alert">
								Usuario ou senha incorreto.
							</div>

							<script>
								setTimeout(function() {
									document.querySelector(".alert").style.display = "none"
								}, 2000);
							</script>
						<?php  }

						session_destroy();


						?>
						<form action="View/autentication/login-autentication.php" method="post">
							<div class="form-group">
								<label> Usuário </label>
								<input type="text" name="usuario" class="form-control" required>
							</div>
							<div class="form-group">
								<label>Senha</label>
								<input type="password" class="form-control" name="senha" id="yourPassword" required>
							</div>
							<div class="form-check" style="top:-10px; margin-left: 5px;">
								<input style="background-color:aquamarine;  border-color: aquamarine;" class="form-check-input" type="checkbox" value="" id="MostraOcultaSenha" onclick="eyeSenha()">
								<label class="form-check-label" for="flexCheckDefault" id="desc">
									Mostrar senha
								</label>
							</div>
							<div class="form-group text-center custom-mt-form-group">
								<button class="btn btn-primary btn-block account-btn" style="border-radius: 3px;" type="submit">Login</button>
							</div>
							<div class="text-center">
								<a href="forgot-password.html">Esqueceu sua Senha?</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="assets/js/jquery-3.6.0.min.js"></script>

	<script src="assets/js/bootstrap.bundle.min.js"></script>

	<script src="assets/js/jquery.slimscroll.js"></script>

	<script src="assets/js/app.js"></script>

	<script src="assets/js/script-login.js"></script>

	<script src="assets/js/script-preload.js"></script>

	<script src="assets/js/sweetalert2.all.min.js"></script>


</body>

</html>