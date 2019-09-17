

<?php

require_once "classes/cadastro_login.class.php";

$Executar_login = new Cadastro_login();

if (isset($_POST['logar'])) {
	$Executar_login->logar();
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
	<link rel="icon" type="image/png" href="media/images/icons/favicon.ico"/>	
	<link rel="stylesheet" type="text/css" href="lib/vendor/bootstrap/css/bootstrap.min.css">	
	<link rel="stylesheet" type="text/css" href="media/css/util.css">
	<link rel="stylesheet" type="text/css" href="media/css/main.css">
	<link rel="stylesheet" type="text/css" href="media/css/style.css">
	<!--===============================================================================================-->
</head>

<body>	
		
	<div class="limiter  ">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form" method="POST">
					<span class="login100-form-title p-b-43 text-warning">
						Login
					</span>
					
					
					<div class="wrap-input100 validate-input">
						<input class="input100" type="email" name="email" id="email" placeholder="Email">
					</div>
					
					
					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="senha" id="senha" placeholder="Senha">
					</div>

					<big>

						<div class="container ">						
							<div class="row" >
   								<button type="submit" name="logar" class="btn salvarDados mt-2 col-6 ">Entrar</button>
   								<a href="index.php" class="btn salvarDados mt-2 col-6 ">Voltar</a>
 							</div>

						<div class="flex-sb-m w-full p-t-3 p-b-32 mt-3 ">
							<div>
								<a href="/Lammaaqui/rebotsenha.php" class="txt1">
									Esqueceu sua senha?
								</a>
								<br>
								<a href="/Lammaaqui/cadastro.php" class="txt1">
									Cadastre-se
								</a>
							</div>

					</big>
						</div>
						</div>
					</div> 
				</form>

				<div class="login100-more" style="background-image: url('media/images/dedo.jpg');">
				</div>
			</div>
		</div>
	</div>

							
						

 
	<!--===============================================================================================-->
	<script src="lib/vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="lib/vendor/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
	<script src="lib/vendor/bootstrap/js/popper.js"></script>
	<script src="lib/vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="lib/vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="lib/vendor/daterangepicker/moment.min.js"></script>
	<script src="lib/vendor/daterangepicker/daterangepicker.js"></script>
	<!--===============================================================================================-->
	<script src="lib/vendor/countdowntime/countdowntime.js"></script>
	<!--===============================================================================================-->
	<script src="login/js/main.js"></script>

</body>

</html>
