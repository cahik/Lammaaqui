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
						Criando minha conta
					</span>
					
					
					
					<div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="nome" id="nome" required="" placeholder="Nome" value="<?=$Executar_cadastro->nome?>">	
					</div>
					

					<div class="wrap-input100 validate-input">
						<input class="input100" type="email" name="email" id="email" required="" placeholder="E-mail" value="<?=$Executar_cadastro->email?>">
					</div>
					
					
					<div class="wrap-input100 validate-input" >
						<input class="input100" type="password" name="senha" id="senha" required="" placeholder="Senha" value="<?=$Executar_cadastro->senha?>">
					</div>

					<div class="wrap-input100 validate-input" >
						<input class="input100" type="password" name="senha2" id="senha2" required="" placeholder="Repetir a senha">
					</div>


					<div class="wrap-input100 validate-input">
						<input class="input100" type="number" name="telefone" id="telefone" placeholder="Número de Telefone" value="<?=$Executar_cadastro->telefone?>">
					</div>
					



					<div class="wrap-input100 validate-input" >
						<input class="input100" type="number" name="celular" id="celular" placeholder="Número de celular" value="<?=$Executar_cadastro->celular?>">
					</div>


					<br><br>

					<p class="p_cadastro"><center><BIG>Sexo</BIG></center></p>	

					
						<div class=" input-group-text" style="float: left; margin-left: 20px;">
							<input class="" type="radio" id="masculino" name="sexo"  value="Masculino" required="" <?php if (isset($_POST['sexo']) and ($_POST['sexo'] == "Masculino")) {echo "checked=''";}?>>Masculino
							<label for="masculino"></label>
						</div>

						<div class="input-group-text" style="float: left; margin-left: 20px;">
							<input  type="radio" id="feminino" name="sexo"  value="Feminino" <?php if (isset($_POST['sexo']) and $_POST['sexo'] == "Feminino") {echo "checked=''";}?>>Feminino
							<label for="feminino"></label>
						</div>
	

					<br>

					<p><BIG>Data de nascimento:</BIG></p>

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
					<div class="container-login100-form-btn ">
						<button class="login100-form-btn btn-warning" name="cadastrar" type="submit">Enviar</button>
					</div>
				</form>
				<div class="login100-more" style="background-image: url('media/images/caixas.jpg');">
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