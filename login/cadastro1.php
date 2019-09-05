<!DOCTYPE html>
<html lang="en">
<head>
	<title>cadastro</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form">
					<span class="login100-form-title p-b-43 text-warning">
						Criando minha conta
					</span>
					
					
					
<div class="wrap-input100 validate-input" type="text" name="nome" id="nome" required="" placeholder="Nome" value="<?=$Executar_cadastro->nome?>">
						<input class="input100" type="text" name="nome">
						<span class="focus-input100"></span>
						<span class="label-input100">Nome</span>
					</div>
					

<div class="wrap-input100 validate-input" type="email" name="email" id="email" required="" placeholder="E-mail" value="<?=$Executar_cadastro->email?>">
						<input class="input100" type="text" name="email">
						<span class="focus-input100"></span>
						<span class="label-input100">Email</span>
					</div>
					
					
					<div class="wrap-input100 validate-input" type="password" name="senha" id="senha" required="" placeholder="Senha" value="<?=$Executar_cadastro->senha?>">
						<input class="input100" type="password" name="pass">
						<span class="focus-input100"></span>
						<span class="label-input100">Senha</span>
					</div>

					<div class="wrap-input100 validate-input" type="password" name="senha2" id="senha2" required="" placeholder="Repetir a senha">
						<input class="input100" type="password" name="pass">
						<span class="focus-input100"></span>
						<span class="label-input100">Repita a Senha</span>
					</div>


					<div class="wrap-input100 validate-input"type="number" name="telefone" id="telefone" placeholder="Número de Telefone" value="<?=$Executar_cadastro->telefone?>">
						<input class="input100" type="text" name="nome">
						<span class="focus-input100"></span>
						<span class="label-input100">Telefone</span>
					</div>
					

		

			<div class="wrap-input100 validate-input" type="number" name="celular" id="celular" placeholder="Número de celular" value="<?=$Executar_cadastro->celular?>">
 
						<input class="input100" type="text" name="nome">
						<span class="focus-input100"></span>
						<span class="label-input100">Celular</span>
					</div>


					<br><br>

			<p class="p_cadastro"><BIG>Sexo</BIG></p>	

			<div class="row">
				<div class=" input-group-text  col-4  ml-2" >
					<input class="" type="radio" id="masculino" name="sexo"  value="Masculino" required="" <?php if (isset($_POST['sexo']) and ($_POST['sexo'] == "Masculino")) {echo "checked=''";}?>>Masculino
					<label class="custom-control-label" for="masculino"></label>
				</div>
				
				<div class="input-group-text col-4  ">
					<input  type="radio" id="feminino" name="sexo"  value="Feminino" <?php if (isset($_POST['sexo']) and $_POST['sexo'] == "Feminino") {echo "checked=''";}?>>Feminino
					<label class="custom-control-label" for="feminino"></label>
				</div>







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
		<div class="login100-more" style="background-image: url('images/caixas.jpg');">
				</div>
	</div>


</div>
		</div>
	</div>
	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

					

				
			
	

	
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>