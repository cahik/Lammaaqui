<?php 

require_once"site.class.php";

/**
* 
*/
class Perfilmatch extends Site {

	public $resultados;


	public function __construct() {

		parent::__construct();

		$this->permitir_acesso($_GET['id']);
		
	}

	public function perfilmatch($Id) {


		$sql = "SELECT * FROM dados_usuario join cidade on cidade.Id_cidade = dados_usuario.Fk_cidade join estado on estado.Id_estado = dados_usuario.Fk_estado WHERE Id = $Id";
		
		return mysqli_fetch_array(mysqli_query($this->con, $sql));

	}

	private function permitir_acesso($Id) {

		$sql = "SELECT * FROM matches WHERE (Usuario_1 = ".$_SESSION['dados']['Id']." and Usuario_2 = $Id) or (Usuario_2 = ".$_SESSION['dados']['Id']." and Usuario_1 = $Id)";

		if (mysqli_num_rows(mysqli_query($this->con, $sql)) == 0) {

			header('Location: perfil.php');

		}

	}

}


