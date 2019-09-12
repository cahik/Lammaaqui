<?php

require_once "site.class.php";

class Cidades_estados extends Site {

	private $sql;
	private $query;
	private $consulta;
	public $resultado_estados;
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


}



$Mostrar_cid_est = new Cidades_estados();


?>