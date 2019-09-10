<?php

require_once "classes/cadastro_login.class.php";

$Executar_cadastro = new Cadastro_login();
$Executar_cadastro->cadastrar();


?>
<!DOCTYPE html>
<html>
<head>
	<title>Cadastro</title>
	<meta charset="utf-8">
	<!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
	<!--===============================================================================================-->	
	<!-- <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
		
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
		
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css"> -->
	
	<link rel="stylesheet" type="text/css" href="media/css/util.css">
	<link rel="stylesheet" type="text/css" href="media/css/main.css">
	<!--===============================================================================================-->
</head>
<body style="text-align: center;">
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form" method="POST">
					<span class="login100-form-title p-b-43 text-warning">
						Alterar senha
					</span>
					
					
					
								<div class="wrap-input100 validate-input" >
						<input class="input100" type="password" name="senha" id="senha" required="" placeholder="codigo de verificação" title="insira o código enviado para o seu endereço de email." value="">
					</div>	
					
					<div class="wrap-input100 validate-input" >
						<input class="input100" type="password" name="senha" id="senha" required="" placeholder="digite a nova senha" value="">
					</div>

					<div class="wrap-input100 validate-input" >
						<input class="input100" type="password" name="senha2" id="senha2" required="" placeholder="confirme a nova senha">
					</div>


					


					<br><br>

					

					<br><br>
					<div class="container-login100-form-btn ">
						<button class="login100-form-btn btn-warning" name="cadastrar" type="submit"  >Enviar</button>
					</div>
				</form>
				<div class="login100-more" style="background-image: url('media/images/cadeado.jpg');">
				</div>
			</div>


		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

	<script src="media/js/main.js"></script>


</body>
</html>
