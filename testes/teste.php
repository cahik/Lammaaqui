<!DOCTYPE html>
<html>
<head>
	<title>Teste alerts</title>
</head>
<body>

	<style type="text/css">
		
		.alerta {
			display: none;
			width: 200px;
			height: 20px;
			padding: 5px;
			border-radius: 4px 4px 0px 0px;
			border-bottom: 3px solid transparent;
			font-weight: 700;
			font-family: 'Poppins', sans-serif !important;
		}

		.alerta_erro {
			display: block !important;
			background-color: rgba(255, 0, 0, 0.2);
			border-color: darkred;			
		}

		.alerta_sucesso {
			display: block !important;
			background-color: rgba(0, 255, 0, 0.2);
			border-color: darkgreen;			
		}

	</style>

	<div class="alerta alerta_erro">
		Ocorreu um erro!
		<!-- <button></button> -->
	</div>



</body>
</html>