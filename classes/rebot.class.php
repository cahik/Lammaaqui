<?php

require_once "site.class.php";

class Rebot extends Site {

	private $email;
	private $codigo;
	private $senha_atual;
	private $senha_nova1;
	private $senha_nova2;


	public function __construct() {

		parent::__construct();

		$this->Transformar_variaveis();
		$this->Verificar_email();

	}


	private function Transformar_variaveis() {

		if (isset($_SESSION['logado']) and $_SESSION['logado'] == true) { $this->senha_atual = $_SESSION['dados']['Senha']; }
		if (isset($_POST['codigo'])) { $this->codigo = $_POST['codigo']; }
		if (isset($_POST['senha1'])) { $this->senha_nova1 = $_POST['senha1']; }
		if (isset($_POST['senha2'])) { $this->senha_nova2 = $_POST['senha2']; }

	}



	private function Verificar_email() {

		if (isset($_SESSION['logado']) and $_SESSION['logado'] == true) {

			$this->email = $_SESSION['dados']['Email'];

		} else {

			$this->email = $_POST['email'];
			
		}

		$sql = "SELECT * FROM dados_usuario where Email = $this->email;";
		$query = mysqli_fetch_array($this->con, $sql);

		if (mysqli_num_rows($query) == 1) {


			$this->email = $_POST['email'];

		} else {

			$this->email = $_SESSION['dados']['Email'];

		}

	}



	private function Enviar_email() {



	}

}



?>