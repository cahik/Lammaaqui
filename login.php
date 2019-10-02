

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
	
	<?php require_once "include/links.html"; ?>

</head>

<body>	

	<?php require_once "include/navbar.php"; ?>

	<div class="limiter">
		<div class="container-login100">

			<form class="login100-form" method="POST">

				<span class="login100-form-title p-b-43 text-warning">
					Login
				</span>

				<?php
				require_once "include/alertas.php";
				?>

				<div class="wrap-input100 validate-input">
					<input class="input100" type="email" name="email" id="email" placeholder="Email">
				</div>


				<div class="wrap-input100 validate-input" data-validate="Password is required">
					<input class="input100" type="password" name="senha" id="senha" placeholder="Senha">
				</div>

				<big>

					<div class="container ">						
						<div class="row " >
							<div class="col-12 text-center">
								<button type="submit" name="logar" class="btn salvarDados mt-2">Entrar</button>
							</div>												
						</div>

						<div class="flex-sb-m w-full p-t-3 p-b-32 mt-3">
							<div>
								<a href="/Lammaaqui/send_email.php" class="txt1">
									Esqueceu sua senha?
								</a>
								<br>
								<a href="/Lammaaqui/cadastro.php" class="txt1">
									Cadastre-se
								</a>
							</div>
						</div>
					</div>
				</big>
			</form>			

		</div>	

	</div>	

	<!-- Footer -->
	<?php require_once "include/footer.php"; ?>

	<!-- Biblioteca Boostrap -->
	<script
	src="https://code.jquery.com/jquery-3.4.1.min.js"
	integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
	crossorigin="anonymous"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>		

</body>
</html>
