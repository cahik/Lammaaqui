<?php

require_once "site.class.php";

class Cidades extends Site {

	private $estado;
	private $sql;
	private $consulta;
	public $resultado;


	public function Mostrar_estados() {



	}


	public function Mostrar_cidades() {

		$this->estado = $_POST['estado'];

		$this->sql = "SELECT * FROM cidade where Estado = $this->estado";

		$query = mysqli_query($this->con, $this->sql);

		$this->resultado = array();

		while ($this->consulta = mysqli_fetch_array($query)) {

			$this->resultado[] = utf8_encode($this->consulta['Nome_cidade']);

		}

		$json = json_encode($this->resultado);

		echo $json;

	}


}







?>