<?php

require_once "classes/cadastro_login.class.php";

$Executar_login = new Cadastro_login();
$Executar_login->logar();

?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta charset="utf-8">
	<!-- <meta name="viewport" content="width=device-width, initial-scale=1">
		
	<link rel="icon" type="image/png" href="media/images/icons/favicon.ico"/>
	
	<link rel="stylesheet" type="text/css" href="lib/vendor/bootstrap/css/bootstrap.min.css">
	
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	
	<link rel="stylesheet" type="text/css" href="lib/vendor/animate/animate.css">
		
	<link rel="stylesheet" type="text/css" href="lib/vendor/css-hamburgers/hamburgers.min.css">
	
	<link rel="stylesheet" type="text/css" href="lib/vendor/animsition/css/animsition.min.css">
	
	<link rel="stylesheet" type="text/css" href="lib/vendor/select2/select2.min.css">
		
	<link rel="stylesheet" type="text/css" href="lib/vendor/daterangepicker/daterangepicker.css"> -->
	
	<link rel="stylesheet" type="text/css" href="media/css/util.css">
	<link rel="stylesheet" type="text/css" href="media/css/main.css">
	<!--===============================================================================================-->
</head>
<body style="background-color: #666666;">
	
	<div class="limiter">
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
						<div class="flex-sb-m w-full p-t-3 p-b-32">
							<div class="contact100-form-checkbox">
								<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
								<label class="label-checkbox100" for="ckb1">
									Memorizar login e senha
								</label>
							</div>

							<div>
								<a href="#" class="txt1">
									Esqueceu sua senha?
								</a><br>
								<a href="#" class="txt1">
									Cadastre-se
								</a>
							</div>
						</div>
					</big>

					<div class="container-login100-form-btn ">
						<button class="login100-form-btn btn-warning" name="logar">
							Login
						</button>
					</div>
				</form>

				<div class="login100-more" style="background-image: url('media/images/net.png');">
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