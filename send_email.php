<?php

require_once "email/config.php";

$send = new Email();

if (isset($_POST['Send'])) {

	$email = $_POST['email'];

	// Se conseguir enviar o email
	if ($send->verificar_email($email) == true) {

		$link = 'localhost/Lammaaqui/reset_senha.php?tk='.$send->tk;


		$corpo = '<div class="total" style="margin-left: auto; margin-right: auto; width: 45%; font-family: Arial; padding: 0px; border: 2px solid #343a40; border-radius: 10px;">';
		$corpo .= '<div style="background-color: #343a40; padding: 10px 10px 5px 10px; border-radius: 5px 5px 0 0;">';
		$corpo .= '<h1 style="margin: 0px; font-size: 3em;"><span style="color: #ffc107;">LLama</span><span style="color: white;">Aqui</span></h1>';
		$corpo .= '<h2 style="color: #007bff; margin: 30px 0 0 0;">Redefinir senha</h2>';
		$corpo .= '</div>';
		$corpo .= '<div style="background-color: white; padding: 0px 10px 5px 10px; border-radius: 0 0 10px 10px;">';
		$corpo .= '<p style=" font-size: 1.5em; color: #343a40;">Olá, verificamos que você fez uma requisição para alterar sua senha.<br>Pressione o botão ou clique no link abaixo para ser redirecionado.<br></p>';
		$corpo .= '<p style="margin-bottom: 100px !important;"><a href="'.$link.'" style="color: #007bff; text-decoration: none;">'.$link.'</a></p>';
		$corpo .= '<a href="'.$link.'"><button style="width: 40% !important; height: 40px; border-radius: 5px; background-color: #007bff; border: 2px solid #007bff; color: white; font-size: 16px; font-weight: 400; margin: 0 2% 15px 2%; cursor: pointer;"><strong>Trocar senha</strong></button></a>';
		$corpo .= '</div>';
		$corpo .= '</div>';

		$assunto = "Confirmar redefinição de senha";
		enviar_email($email, 'contato@llamaaqui.ml', 'Lamma Aqui', $assunto, $corpo);

	}

}



?>
<!DOCTYPE html>
<html>
<head>
	<title>Enviar email de confirmação</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<?php require_once "include/links.html"; ?>

</head>
<body>

	<?php require_once "include/navbar.php"; ?>
	


	<div class="limiter">
		<div class="container-login100">		

			<form class="login100-form" action="" method="POST">

				<div class="login100-form-title p-b-43 text-warning">
					Email de verificação
				</div>

				<span class="p-b-43">
					<?php
					require_once "include/alertas.php";
					?>
				</span>

				<div class="wrap-input100 validate-input" >
					<input class="input100" type="email" name="email" placeholder="Digite seu email" value="<?php if (isset($_POST['email'])) {echo $_POST['email'];}?>">
				</div>

				<div class="container-login100-form-btn mt-5">
					<button class="btn btn-block btn-warning py-2 text-white" name="Send" type="submit">Enviar código de verificação</button>
				</div>

			</form>

		</div>
	</div>



	<?php require_once "include/footer.php"; ?>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

	<script src="media/js/main.js"></script>


</body>
</html>
