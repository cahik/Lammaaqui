<?php

require_once "site.class.php";

class Cidades_estados extends Site {

	private $estado;
	private $sql;
	private $query;
	private $consulta;
	public $resultado_cidades;
	public $resultado_estados;


	public function __construct() {

		parent::__construct();
		$this->Mostrar_estados();

	}


	public function Mostrar_estados() {

		$this->sql = "SELECT * FROM estado";

		$this->query = mysqli_query($this->con, $this->sql);

		$this->resultado_estados = mysqli_fetch_all($this->query, MYSQLI_ASSOC);



	}


	public function Mostrar_cidades($estado) {

		$this->estado = $_POST['estado'];

		$this->sql = "SELECT * FROM cidade where Estado = $this->estado";

		$this->query = mysqli_query($this->con, $this->sql);

		$this->resultado_cidades = array();

		while ($this->consulta = mysqli_fetch_array($this->query)) {

			$this->resultado_cidades[] = utf8_encode($this->consulta['Nome_cidade']);

		}

		$json = json_encode($this->resultado_cidades);

		echo $json;

	}


}



$Mostrar_cid_est = new Cidades_estados();

if (isset($_POST['estado'])) {

	$Mostrar_cid_est->Mostrar_cidades();

}


?>