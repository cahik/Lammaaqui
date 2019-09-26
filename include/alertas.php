<!-- set_cookie('Alerta', $tipo, time()+10)

 -->

<?php

	// Verificar se existe algum alerta via COOKIE
	if (isset($_COOKIE['alerta']) && !is_null($_COOKIE['alerta'])) {
		$alerta = unserialize($_COOKIE['alerta']);
		setcookie('alerta');
	}
	// Exibe o alerta em HTML caso exista
	if (isset($alerta)) {
?>

	<div class="alert alert-<?=$alerta['tipo']?>">
		<?=$alerta['mensagem']?>
	</div>

<?php

	}
	
?>