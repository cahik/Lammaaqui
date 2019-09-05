<?php

require_once "classes/cadastro_login.class.php";

$Executar_cadastro = new Cadastro_login();
$Executar_cadastro->cadastrar();


var_dump($_SESSION['logado']);
?>


<!DOCTYPE html>
<html>
<head>
	<title>Cadastro</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="media/css/cadastro_login.css">
	<link rel="stylesheet" type="text/css" href="media/css/padrao.css">
	<link rel="stylesheet" type="text/css" href="media/css/media.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

	<?php 

	require_once "include/lhama.php"; 
	require_once "include/navbar.php"; 

	?>


	<div class="forms">
		<form class="form-group" method="post">

			<h1 class="titulo_padrao">Crie uma conta</h1>
			
			<input class="inputs" type="text" name="nome" id="nome" required="" placeholder="Nome" value="<?=$Executar_cadastro->nome?>">

			<br><br>

			<input class="inputs" type="email" name="email" id="email" required="" placeholder="E-mail" value="<?=$Executar_cadastro->email?>">

			<br><br>

			<input class="inputs" type="password" name="senha" id="senha" required="" placeholder="Senha" value="<?=$Executar_cadastro->senha?>">

			<br><br>

			<input class="inputs" type="password" name="senha2" id="senha2" required="" placeholder="Repetir a senha">

			<br><br>

			<p class="p_cadastro">Sexo</p>	

			<div style="text-align: center">
				<div class="custom-control custom-radio custom-control-inline">
					<input type="radio" id="masculino" name="sexo" class="custom-control-input radio" value="Masculino" required="" <?php if (isset($_POST['sexo']) and ($_POST['sexo'] == "Masculino")) {echo "checked=''";}?>>
					<label class="custom-control-label" for="masculino">Masculino</label>
				</div>
				<div class="custom-control custom-radio custom-control-inline">
					<input type="radio" id="feminino" name="sexo" class="custom-control-input radio" value="Feminino" <?php if (isset($_POST['sexo']) and $_POST['sexo'] == "Feminino") {echo "checked=''";}?>>
					<label class="custom-control-label" for="feminino">Feminino</label>
				</div>
			</div>

			<br>


			<select name="dia" class="select" required="">

				<option value="<?php if (isset($_POST['dia'])) { echo $_POST['dia'];} else { echo '';}?>"><?php if (isset($_POST['dia'])) { echo $_POST['dia'];} else { echo 'Dia';}?></option>

				<?php for ($i = 1; $i <= 31; $i++) {?>
				<option><?=$i?></option>
				<?php } ?>

			</select>


			<select name="mes" class="select" required="">
				<option value="<?php if (isset($_POST['mes'])) { echo $_POST['mes'];} else { echo '';}?>"><?php if (isset($_POST['mes'])) { echo $_POST['mes'];} else { echo 'Mês';}?></option>
				<option>01</option>
				<option>02</option>
				<option>03</option>
				<option>04</option>
				<option>05</option>
				<option>06</option>
				<option>07</option>
				<option>08</option>
				<option>09</option>
				<option>10</option>
				<option>11</option>
				<option>12</option>
			</select>


			<select name="ano" class="select" required="">

				<option value="<?php if (isset($_POST['ano'])) { echo $_POST['ano'];} else { echo '';}?>"><?php if (isset($_POST['ano'])) { echo $_POST['ano'];} else { echo 'Ano';}?></option>
				<?php for ($i = date('Y'); $i >= (date('Y') - 100); $i--) {?>
				<option><?=$i?></option>
				<?php } ?>

			</select>

			<br><br>

			<input class="inputs" type="number" name="telefone" id="telefone" placeholder="Número de Telefone" value="<?=$Executar_cadastro->telefone?>">

			<br><br>

			<input class="inputs" type="number" name="celular" id="celular" placeholder="Número de celular" value="<?=$Executar_cadastro->celular?>">


			<button class="btn btn-success btn-block mt-5 btn_padrao" name="cadastrar" type="submit">Enviar</button>

		</form>
	</div>

	<?php require_once "include/footer.php";  ?>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>