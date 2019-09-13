<?php

require_once "site.class.php";

class Cidades_estados extends Site {

	private $sql;
	private $query;
	private $consulta;
	public $resultado_estados;
	public $resultado_cidades;
	public $json;


	public function __construct() {

		parent::__construct();
		$this->Mostrar_estados();

	}


	public function Mostrar_estados() {

		$this->sql = "SELECT * FROM estado";

		$this->query = mysqli_query($this->con, $this->sql);

		$this->resultado_estados = mysqli_fetch_all($this->query, MYSQLI_ASSOC);



	}


	public function Mostrar_cidades() {

		$estado = $_POST['estado'];

		$this->sql = "SELECT * FROM cidade where Estado = $estado";

		$this->query = mysqli_query($this->con, $this->sql);

		$this->resultado_cidades = array();

		while ($this->consulta = mysqli_fetch_array($this->query)) {

			$this->resultado_cidades[] = $this->consulta;

		}

	}


}



$Mostrar_cid_est = new Cidades_estados();

if (isset($_POST['estado'])) {
	$Mostrar_cid_est->Mostrar_cidades();
}


?>