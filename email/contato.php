<?php

	require_once "funcoes.php";
	
	// Recebendo o formulário
	if (isset($_POST['enviar'])) {

		$nome = $_POST['nome'];
		$email = $_POST['email'];
		$mensagem = $_POST['mensagem'];

		$mensagem_html = "<h1>Agrecedemos seu contato $nome!</h1>";
		$mensagem_html .= "<p>Assim que possivel retornarmos seu contato:</p>";
		$mensagem_html .= "<p>$mensagem</p>";

		$assunto = "Contato Recebido - Padaria do Juka =)";

		if (enviar_email($email, 'contato@llamaaqui.ml', 'Padaria do Juka', $assunto, $mensagem_html) == true) {
			echo "Contato enviado com sucesso!";
		}

	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Enviando formulario via E-mail</title>
</head>
<body>

	<form action="" method="post">
		
		<label for="nome">Nome:</label>
		<input type="text" name="nome" id="nome">

		<label for="email">E-mail:</label>
		<input type="email" name="email" id="email">

		<label for="mensagem">Mensagem:</label>
		<textarea name="mensagem" id="mensagem"></textarea>

		<input type="submit" name="enviar" value="Enviar contato">

	</form>

</body>
</html>