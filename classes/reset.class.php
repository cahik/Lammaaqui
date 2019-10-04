<?php

require_once "site.class.php";

// Verificando se o GET tk existe
if (!isset($_GET['tk'])) {

	$alerta['tipo'] = 'danger';
	$alerta['mensagem'] = "Você está tentando entrar em uma página sem permissão!";
	setcookie('alerta', serialize($alerta), time() + 10);
	header('Location: send_email.php');

}

class Reset extends Site {

	private $tk;
	private $senha1;
	private $senha2;

	
	public function __construct() {

		parent::__construct();


	}


	// Verificando se o token existe
	public function verificar_token($TK) {

		$sql = "SELECT * FROM dados_usuario where Token = $TK";

		// Se não existir
		if (mysqli_fetch_array(mysqli_query($this->con, $sql)) == 0) {

			$alerta['tipo'] = 'warning';
			$alerta['mensagem'] = "O token usado não existe ou foi expirado!";
			setcookie('alerta', serialize($alerta), time() + 10);
			header('Location: send_email.php');

		}

	}


	// Função para alterar a senha
	public function alterar() {

		$this->senha1 = $_POST['senha'];
		$this->senha2 = $_POST['senha2'];
		$this->tk = $_GET['tk'];


		// Se as senha forem iguais
		if ($this->senha1 == $this->senha2) {

		// Se a senha tiver menos de 8 digitos
			if (strlen($this->senha1) >= 8) {

				$sql = "UPDATE dados_usuario SET Senha = '$this->senha1', Token = null where Token = $this->tk";
				mysqli_query($this->con, $sql);
				$alerta['tipo'] = 'success';
				$alerta['mensagem'] = "Sua senha foi alterada com sucesso!";
				setcookie('alerta', serialize($alerta), time() + 10);
				header('location: perfil.php');

			} else {
				
				$alerta['tipo'] = 'warning';
				$alerta['mensagem'] = "A senha deve ter mais de 8 digitos!";
				setcookie('alerta', serialize($alerta), time() + 10);
				header('location: reset_senha.php?tk='.$this->tk);

			}

		} else {

			// Se as senhas forem diferentes
			$alerta['tipo'] = 'warning';
			$alerta['mensagem'] = "As senhas digitadas são diferentes!";
			setcookie('alerta', serialize($alerta), time() + 10);
			header('location: reset_senha.php?tk='.$this->tk);

		}

	}


}



?>