<?php

CONST HOST = "llamaaqui.ml:3306";
CONST USER = "llamaaqui";
CONST PASS = "entra21@Blusoft";
CONST DB   = "llamaaqu_master";

$con = mysqli_connect(HOST, USER, PASS, DB);

$sql1 = "SELECT * FROM estado";

$query1 = mysqli_query($con, $sql1);

?>
<!DOCTYPE html>
<html>
<head>
	<title>Teste</title>
</head>
<body>

	Estado<br>
	<select id="id_estado" onchange="executar_ajax()">
		<option value="">Selecione o estado</option>

		<?php while ($resultado1 = mysqli_fetch_array($query1)) { ?>

			<option value="<?=$resultado1['Id_estado']?>"><?=utf8_encode($resultado1['Nome_estado'])?></option>

		<?php } ?>

	</select>

	<br><br>

	Cidade<br>
	<select id="id_cidade" disabled="">
		<option value="">Selecione a cidade</option>

	</select>


	<script
	src="https://code.jquery.com/jquery-3.4.1.min.js"
	integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
	crossorigin="anonymous"></script>

	<script type="text/javascript">
		

		function executar_ajax() {

			var estado = window.document.querySelector('#id_estado').value;
			var cidade = window.document.querySelector('#id_cidade');

			cidade.disabled = false;


			$.ajax ({

				url: 'cidades.php',
				type: 'POST',
				data: {estado:estado},
				dataType: 'HTML',

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


</body>
</html>