<?php

require_once "classes/cadastro_login.class.php";
require_once "classes/estados.class.php";

$Executar_cadastro = new Cadastro_login();
$Executar_cadastro->cadastrar();


?>
<!DOCTYPE html>
<html>
<head>
	<title>Cadastro</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="icon" type="image/png" href="media/images/icons/favicon.ico"/>
	
	<link rel="stylesheet" type="text/css" href="lib/vendor/bootstrap/css/bootstrap.min.css">
	
	<link rel="stylesheet" type="text/css" href="media/css/util.css">
	<link rel="stylesheet" type="text/css" href="media/css/main.css">
	<link rel="stylesheet" type="text/css" href="media/css/style.css">
	<!--===============================================================================================-->
</head>
<body>

	<?php //require_once "include/navbar.php"; ?>
	
	<div class="limiter text-center">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form" method="POST">
					<span class="login100-form-title p-b-43 text-warning">
						Criando minha conta
					</span>
					
					
					
					<div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="nome" id="nome" required="" placeholder="Nome" value="<?=utf8_encode($Executar_cadastro->nome)?>">	
					</div>
					

					<div class="wrap-input100 validate-input">
						<input class="input100" type="email" name="email" id="email" required="" placeholder="E-mail" value="<?=utf8_encode($Executar_cadastro->email)?>">
					</div>
					
					
					<div class="wrap-input100 validate-input" >
						<input class="input100" type="password" name="senha" id="senha" required="" placeholder="Senha" value="<?=utf8_encode($Executar_cadastro->senha)?>">
					</div>

					<div class="wrap-input100 validate-input" >
						<input class="input100" type="password" name="senha2" id="senha2" required="" placeholder="Repetir a senha">
					</div>


					<div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="telefone" id="telefone" placeholder="Número de Telefone" value="<?=$Executar_cadastro->telefone?>" maxlength="10">
					</div>					



					<div class="wrap-input100 validate-input" >
						<input class="input100" type="text" name="celular" id="celular" placeholder="Número de celular" value="<?=$Executar_cadastro->celular?>" maxlength="11">
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
						<option value="01">Janeiro</option>
						<option value="02">Fevereiro</option>
						<option value="03">Março</option>
						<option value="04">Abril</option>
						<option value="05">Maio</option>
						<option value="06">Junho</option>
						<option value="07">Julho</option>
						<option value="08">Agosto</option>
						<option value="09">Setembro</option>
						<option value="10">Outubro</option>
						<option value="11">Novembro</option>
						<option value="12">Dezembro</option>
					</select>


					<select name="ano" class="select" required="">

						<option value="<?php if (isset($_POST['ano'])) { echo $_POST['ano'];} else { echo '';}?>"><?php if (isset($_POST['ano'])) { echo $_POST['ano'];} else { echo 'Ano';}?></option>
						<?php for ($i = date('Y'); $i >= (date('Y') - 100); $i--) {?>
							<option><?=$i?></option>
						<?php } ?>

					</select>

					<br><br>

					<select id="id_estado" name="estado" required onchange="executar_ajax()">
						<option value="">Estado</option>
						
						<?php foreach ($Mostrar_cid_est->resultado_estados as $chave => $valor) { ?>

							<option value="<?=$Mostrar_cid_est->resultado_estados[$chave]['Id_estado']?>"><?=utf8_encode($Mostrar_cid_est->resultado_estados[$chave]['Nome_estado'])?></option>

						<?php } ?>

					</select>

					<br><br>

					<select id="id_cidade" name="cidade" required disabled="">
						<option value="">Selecione a cidade</option>
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

	<script
	src="https://code.jquery.com/jquery-3.4.1.min.js"
	integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
	crossorigin="anonymous"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

	<script src="media/js/main.js"></script>

<<<<<<< HEAD
	<!-- Function Ajax cidade/estado -->
	<script src="media/js/ajax_cidades.js"></script>
=======
	<script type="text/javascript">

		// $(document).ready(function(){
		// 	$('#telefone').mask('(00) 0000-0000');
		// 	$('#celular').mask('(00) 0-0000-0000');
		// });


		jQuery("#telefone")
		.mask("(99) 9999-9999")
		.focusout(function (event) {  
			var target, phone, element;  
			target = (event.currentTarget) ? event.currentTarget : event.srcElement;  
			phone = target.value.replace(/\D/g, '');
			element = $(target);  
			element.unmask();
		});

		jQuery("#celular")
		.mask("(99) 9999?9-9999")
		.focusout(function (event) {  
			var target, phone, element;  
			target = (event.currentTarget) ? event.currentTarget : event.srcElement;  
			phone = target.value.replace(/\D/g, '');
			element = $(target);  
			element.unmask();  
			if(phone.length > 10) {  
				element.mask("(99) 9999?9-9999");  
			} else {  
				element.mask("(99) 9999?9-9999");  
			}  
		});


		function executar_ajax() {

			var estado = window.document.querySelector('#id_estado').value;
			var cidade = window.document.querySelector('#id_cidade');

			cidade.disabled = false;


			$.ajax ({

				url: 'cidades.php',
				type: 'POST',
				data: {estado:estado},
				dataType: 'HTML'

			}).done(function(mostrar){

				var mostrar = JSON.parse(mostrar);
				$('#id_cidade').empty();

				function alterar_selects(cid) {

					$('#id_cidade').append('<option value="' + cid + '">' + cid + '</option>');

				}

				mostrar.forEach(alterar_selects);

			});

		}

	</script>

>>>>>>> c1c45bd975f6695b60b1a036ed1df5ee2617b3af

</body>
</html>