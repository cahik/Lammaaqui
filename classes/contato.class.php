<?php

require_once "site.class.php";

require_once "include/config.php";

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

		$this->Nome = utf8_decode($_POST['nome']);
		$this->Email = utf8_decode($_POST['email']);
		$this->Assunto = utf8_decode($_POST['assunto']);
		$this->Mensagem = utf8_decode($_POST['mensagem']);

	}

	public function mandar_mensagem() {


		if ($this->Nome <> "" and $this->Email <> "" and $this->Assunto <> "" and $this->Mensagem <> "") {

			$sql = "INSERT INTO contato values(DEFAULT, '$this->Nome', '$this->Email', '$this->Assunto', '$this->Mensagem');";

			if (mysqli_query($this->con, $sql)) {

				// Se conseguir mandar a mensagem de contato
				$alerta['tipo'] = 'success';
				$alerta['mensagem'] = "Mensagem enviada com sucesso!";
				setcookie('alerta', serialize($alerta), time() + 10);
				
				header("location: /Lammaaqui/contato.php"); 

			}

		}


	}


}





?>