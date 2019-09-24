<?php

require_once "teste.class.php";

$teste = new Mostrar_matches();
$teste->mostrar();


?>
<!DOCTYPE html>
<html>
<head>
	<title>Teste</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

	<style type="text/css">
		
		.match {
			width: 800px;
			background-color: lightgray;
			margin-right: auto;
			margin-left: auto;
			margin-top: 10px;
			padding: 10px;
		}

		.foto {
			width: 50px;
			height: 50px;
			border-radius: 100%;
		}

	</style>


	<div class="row">

		<?php foreach ($teste->resultado as $key => $value) { ?>

			<div class="row match">

				<div class="col col-1">
					<img class="foto" 
					src="
					<?php 

					if ($teste->resultado[$key]['Foto'] <> null) {

						if ($_SERVER["REQUEST_URI"] == '/Lammaaqui/testes/teste.php') {echo '../';} ?>media/images/fotos_usuarios/<?php echo $teste->resultado[$key]['Foto'];

						} else {

							if ($_SERVER["REQUEST_URI"] == '/Lammaaqui/testes/teste.php') {echo '../';} ?>media/images/fotos_usuarios/avatar.png

						<?php }	?>
						">
					</div>

					<div class="col col-3"><?=utf8_encode($teste->resultado[$key]['Nome'])?></div>

					<div class="col col-2"><?php if ($teste->resultado[$key]['Telefone'] <> null) {echo utf8_encode($teste->resultado[$key]['Telefone']);} else {echo "Não tem telefone";}?></div>

					<div class="col col-4"><?=utf8_encode($teste->resultado[$key]['Email'])?></div>

					<div id="des_match" onclick="" class="col col-2 btn btn-danger">Desfazer match</div>

				</div>

			<?php } ?>

		</div>


		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
		integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
		crossorigin="anonymous"></script>

		<script type="text/javascript">
			
			function desfazer() {

				var id = document.querySelector('#des_match').value;

				$.ajax({

					url: 'desfazer_match.php',
					type: 'POST',
					data: {'Id':id},


					success: function() {

						if (id.parentNode) {
							id.parentNode.removeChild(id);
						}

					}

				})

			}

		</script>


	</body>
	</html>