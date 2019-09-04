<?php

require_once "site.class.php";

class Contato extends Site {

	private $Nome;
	private $Email;
	private $Assunto;
	private $Mensagem;


	public function __construct() {

		parent ::__construct();

		if (isset($_POST['Enviar'])) {

			$this->receber_posts_contato();

		}

	}


	private function receber_posts_contato() {

		$this->Nome = utf8_encode($_POST['nome']);
		$this->Email = utf8_encode($_POST['email']);
		$this->Assunto = utf8_encode($_POST['assunto']);
		$this->Mensagem = utf8_encode($_POST['mensagem']);

		var_dump(utf8_encode($_POST['nome']));

	}

	public function mandar_mensagem() {


		if ($this->Nome <> "" and $this->Email <> "" and $this->Assunto <> "" and $this->Mensagem <> "") {

			$sql = "INSERT INTO contato values('$this->Nome', '$this->Email', '$this->Assunto', '$this->Mensagem');";

			if (mysqli_query($this->con, $sql)) {

				// Se conseguir mandar a mensagem de contato

			}

		}


	}


}





?>