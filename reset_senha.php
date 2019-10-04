<?php

require_once "classes/reset.class.php";

$Alterar = new Reset();
$Alterar->verificar_token($_GET['tk']);


if (isset($_POST['resetar'])) {

	$Alterar->alterar();

}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Redefinir senha</title>
	<meta charset="utf-8">
	
	<?php require_once "include/links.html"; ?>

</head>
<body>

	<?php require_once "include/navbar.php"; ?>
	
	<div class="limiter">
		<div class="container-login100">		

			<form class="login100-form" method="POST">

				<div class="login100-form-title p-b-43 text-warning">
					Alterar senha
				</div>

				<span class="p-b-43">
					<?php
					require_once "include/alertas.php";
					?>
				</span>

				<div class="wrap-input100 validate-input" >
					<input class="input100" type="password" minlength="8" name="senha" required="" placeholder="Digite a nova senha" value="">
				</div>

				<div class="wrap-input100 validate-input" >
					<input class="input100" type="password" minlength="8" name="senha2" required="" placeholder="Confirme a nova senha">
				</div>

				<br><br>

				<div class="container-login100-form-btn ">
					<button class="btn btn-block btn-warning py-2 text-white" name="resetar" type="submit">Enviar</button>
				</div>

			</form>

		</div>
	</div>

	<!-- Footer -->
	<?php require_once "include/footer.php"; ?>

	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

	<script src="media/js/main.js"></script>


</body>
</html>
