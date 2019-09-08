<?php

require_once "site.class.php";


class Perfil extends Site {

	private $sql;
	private $id;
	private $estado;
	private $cidade;
	public $resultado_cidade;
	public $resultado_estado;


	public function __construct() {

		parent::__construct();
		$this->transformar_variaveis();

	}


	private function transformar_variaveis() {

		$this->id = $_SESSION['dados']['Id'];

		if (!isset($_POST['estado']) || $_POST['estado'] == $_SESSION['dados']['Id_estado']) {
			$this->estado = $_SESSION['dados']['Id_estado'];
		} else {
			$this->estado = $_POST['estado'];
		}

		if (!isset($_POST['cidade']) || $_POST['cidade'] == $_SESSION['dados']['Id_cidade']) {
			$this->cidade = $_SESSION['dados']['Id_cidade'];
		} else {
			$this->cidade = $_POST['cidade'];
		}

		

	}


	public function consulta() {


		$this->sql = "SELECT * FROM cidade where Estado = $this->estado";

		$query = mysqli_query($this->con, $this->sql);

		$this->resultado_cidade = mysqli_fetch_all($query, MYSQLI_ASSOC);

		// echo "<pre>";
		// var_dump($this->resultado_cidade);
		// echo "</pre>";

		$this->sql = "SELECT * FROM estado";

		$this->resultado_estado = mysqli_query($this->con, $this->sql);


	}



}


?>